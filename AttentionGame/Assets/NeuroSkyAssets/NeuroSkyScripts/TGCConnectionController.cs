using UnityEngine;
using System.Collections;
using System.Collections.Generic;
using Jayrock.Json;
using Jayrock.Json.Conversion;
using System.Net.Sockets;
using System.Text;
using System.IO;

using System.Threading;


public class TGCConnectionController : MonoBehaviour {
	private TcpClient client; 
  	private Stream stream;
  	private byte[] buffer;
    private Thread thread;
    private Thread neuroSkyThread;
    private bool isRunning = false;
    public DatabaseManager database;


    public delegate void UpdateIntValueDelegate(int value);
	public delegate void UpdateFloatValueDelegate(float value);
	
	public event UpdateIntValueDelegate UpdatePoorSignalEvent;
	public event UpdateIntValueDelegate UpdateAttentionEvent;
	public event UpdateIntValueDelegate UpdateMeditationEvent;
	public event UpdateIntValueDelegate UpdateRawdataEvent;
	public event UpdateIntValueDelegate UpdateBlinkEvent;
	
	public event UpdateFloatValueDelegate UpdateDeltaEvent;
	public event UpdateFloatValueDelegate UpdateThetaEvent;
	public event UpdateFloatValueDelegate UpdateLowAlphaEvent;
	public event UpdateFloatValueDelegate UpdateHighAlphaEvent;
	public event UpdateFloatValueDelegate UpdateLowBetaEvent;
	public event UpdateFloatValueDelegate UpdateHighBetaEvent;
	public event UpdateFloatValueDelegate UpdateLowGammaEvent;
	public event UpdateFloatValueDelegate UpdateHighGammaEvent;

    private static float theta;
    private static float alpha;
    private static float low_beta;
    private static float high_beta;
    private static float gamma;



    void Start () {

        database = GetComponent<DatabaseManager>();

        thread = new Thread(Connect);
        thread.Start();
        //Connect();
    }
    

    public void Disconnect(){
		if(IsInvoking("ParseData")){
			CancelInvoke("ParseData");
			stream.Close();

        }
        neuroSkyThread.Abort();
        thread.Abort();
    }

    //public void Connect()
    //{
    //    if (!IsInvoking("ParseData"))
    //    {

    //        client = new TcpClient("127.0.0.1", 13854);
    //        stream = client.GetStream();
    //        buffer = new byte[1024];
    //        byte[] myWriteBuffer = Encoding.ASCII.GetBytes(@"{""enableRawOutput"": true, ""format"": ""Json""}");
    //        stream.Write(myWriteBuffer, 0, myWriteBuffer.Length);

    //        InvokeRepeating("ParseData", 0.1f, 0.02f);
    //    }
    //}
    public void Connect()
    {

        if (!isRunning)
        {
            isRunning = true;
            neuroSkyThread = new Thread(new ThreadStart(NeuroSkyThreadFunc));
            neuroSkyThread.Start();

        }

    }
    private void NeuroSkyThreadFunc()
    {
        client = new TcpClient("127.0.0.1", 13854);
        stream = client.GetStream();
        buffer = new byte[1024];
        byte[] myWriteBuffer = Encoding.ASCII.GetBytes(@"{""enableRawOutput"": true, ""format"": ""Json""}");
        stream.Write(myWriteBuffer, 0, myWriteBuffer.Length);

        while (isRunning)
        {
            ParseData();
            Thread.Sleep(20);
        }
    }
    private void OnDisable()
    {
        if (neuroSkyThread != null)
        {
            isRunning = false;
            neuroSkyThread.Join();
        }
    }
    void ParseData()
    {
        if (stream.CanRead)
        {

            try
            {
                int bytesRead = stream.Read(buffer, 0, buffer.Length);

                string[] packets = Encoding.ASCII.GetString(buffer, 0, bytesRead).Split('\r');

                foreach (string packet in packets)
                {

                    if (packet.Length == 0)
                        continue;

                    IDictionary primary = (IDictionary)JsonConvert.Import(typeof(IDictionary), packet);
                    //print(primary["eegPower"].ToString());


                    IDictionary eeg = (IDictionary)primary["eegPower"];
                    theta = float.Parse(eeg["delta"].ToString());
                    alpha = float.Parse(eeg["lowAlpha"].ToString()) + float.Parse(eeg["highAlpha"].ToString());
                    low_beta = float.Parse(eeg["lowBeta"].ToString());
                    high_beta = float.Parse(eeg["highBeta"].ToString());
                    gamma = float.Parse(eeg["lowGamma"].ToString()) + float.Parse(eeg["highGamma"].ToString());

                    //print("theta: " + theta+"   "+ "alpha: " + alpha+"  "+ "low_beta: " + low_beta+"    "+ "high_beta: " + high_beta+"  "+ "gamma: " + gamma);

                    if(theta!=null && alpha!=null && low_beta!=null && high_beta!=null && gamma!=null)
                    {
                        database.Save_EEG_ToDataBase(theta.ToString(), alpha.ToString(), low_beta.ToString(), 
                        high_beta.ToString(), gamma.ToString());
                    }
                    

                    //print(primary["eSense"].ToString());

                    if (primary.Contains("poorSignalLevel"))
                    {

                        if (UpdatePoorSignalEvent != null)
                        {
                            UpdatePoorSignalEvent(int.Parse(primary["poorSignalLevel"].ToString()));
                        }

                        if (primary.Contains("eSense"))
                        {
                            IDictionary eSense = (IDictionary)primary["eSense"];

                            if (UpdateAttentionEvent != null)
                            {
                                UpdateAttentionEvent(int.Parse(eSense["attention"].ToString()));
                            }
                            if (UpdateMeditationEvent != null)
                            {
                                UpdateMeditationEvent(int.Parse(eSense["meditation"].ToString()));
                            }
                        }

                        if (primary.Contains("eegPower"))
                        {
                            IDictionary eegPowers = (IDictionary)primary["eegPower"];

                            if (UpdateDeltaEvent != null)
                            {
                                UpdateDeltaEvent(float.Parse(eegPowers["delta"].ToString()));

                                //print("delta: " +float.Parse(eegPowers["delta"].ToString()));
                            }
                            if (UpdateThetaEvent != null)
                            {
                                UpdateThetaEvent(float.Parse(eegPowers["theta"].ToString()));
                                //print("theta: " + float.Parse(eegPowers["theta"].ToString()));
                            }
                            if (UpdateLowAlphaEvent != null)
                            {
                                UpdateLowAlphaEvent(float.Parse(eegPowers["lowAlpha"].ToString()));
                                //print("low_alpha: " + float.Parse(eegPowers["lowAlpha"].ToString()));
                            }
                            if (UpdateHighAlphaEvent != null)
                            {
                                UpdateHighAlphaEvent(float.Parse(eegPowers["highAlpha"].ToString()));
                                //print("high_alpha: " + float.Parse(eegPowers["highAlpha"].ToString()));
                            }
                            if (UpdateLowBetaEvent != null)
                            {
                                UpdateLowBetaEvent(float.Parse(eegPowers["lowBeta"].ToString()));
                                //print("loa_beta: " + float.Parse(eegPowers["lowBeta"].ToString()));
                            }
                            if (UpdateHighBetaEvent != null)
                            {
                                UpdateHighBetaEvent(float.Parse(eegPowers["highBeta"].ToString()));
                                //print("high_beta: "+ float.Parse(eegPowers["highBeta"].ToString()));
                            }
                            if (UpdateLowGammaEvent != null)
                            {
                                UpdateLowGammaEvent(float.Parse(eegPowers["lowGamma"].ToString()));
                                //print("loa_gamma: " + float.Parse(eegPowers["lowGamma"].ToString()));
                            }
                            if (UpdateHighGammaEvent != null)
                            {
                                UpdateHighGammaEvent(float.Parse(eegPowers["highGamma"].ToString()));
                                //print("high_gamma: " + float.Parse(eegPowers["highGamma"].ToString()));
                            }
                            //database.SaveTherapistDataBase(
                            //    float.Parse(eegPowers["delta"].ToString()), 
                            //    float.Parse(eegPowers["theta"].ToString()),
                            //      float.Parse(eegPowers["lowAlpha"].ToString()),
                            //      float.Parse(eegPowers["highAlpha"].ToString()),
                            //      float.Parse(eegPowers["lowBeta"].ToString()),
                            //      float.Parse(eegPowers["highBeta"].ToString()),
                            //      float.Parse(eegPowers["lowGamma"].ToString()),
                            //      float.Parse(eegPowers["highGamma"].ToString()));
                        }
                    }
                    else if (primary.Contains("rawEeg") && UpdateRawdataEvent != null)
                    {
                        UpdateRawdataEvent(int.Parse(primary["rawEeg"].ToString()));
                    }
                    else if (primary.Contains("blinkStrength") && UpdateBlinkEvent != null)
                    {
                        UpdateBlinkEvent(int.Parse(primary["blinkStrength"].ToString()));
                    }
                }
            }
            catch (IOException e) { Debug.Log("IOException " + e); }
            catch (System.Exception e) { Debug.Log("Exception " + e); }
        }

    }// end ParseData

    void OnApplicationQuit(){
		Disconnect();
	}


}

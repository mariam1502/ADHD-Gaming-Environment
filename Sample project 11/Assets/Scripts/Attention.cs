using UnityEngine;
using UnityEngine.UI;

using System.Threading;
using System;
using Random = UnityEngine.Random;

using System.Collections;
using System.Collections.Generic;
using System.Net;
using System.Net.Sockets;
using System.Text;



public class Attention : MonoBehaviour
{
    public Vector3 cube;


    Thread mThread;
    public string connectionIP = "127.0.0.1";
    public int connectionPort = 25001;
    IPAddress localAdd;
    TcpListener listener;
    TcpClient client;
    string receivedPos;
    [SerializeField]
    public countdown ob;

    public static string time = "wait";
    bool running;
    // Start is called before the first frame update
    void Start()
    {

        Debug.Log("hello");

        ThreadStart ts = new ThreadStart(GetInfo);
        mThread = new Thread(ts);
        mThread.Start();
    }

    void GetInfo()
    {
        localAdd = IPAddress.Parse(connectionIP);
        listener = new TcpListener(IPAddress.Any, connectionPort);
        listener.Start();

        client = listener.AcceptTcpClient();

        running = true;
        while (running)
        {
            SendAndReceiveData();
        }
        listener.Stop();
    }

    void SendAndReceiveData()
    {
        NetworkStream nwStream = client.GetStream();
        byte[] buffer = new byte[client.ReceiveBufferSize];

        //---receiving Data from the Host----
        int bytesRead = nwStream.Read(buffer, 0, client.ReceiveBufferSize); //Getting data in Bytes from Python
        string dataReceived = Encoding.UTF8.GetString(buffer, 0, bytesRead); //Converting byte data to string

        if (dataReceived != null)
        {
            //---Using received data---
            //receivedPos = StringToVector(dataReceived); //<-- assigning receivedPos value from Python
            //receivedPos = Convert.ToInt32(dataReceived);
            receivedPos = dataReceived;
            print(receivedPos);
            print("received pos data, and moved the Cube!");

            //---Sending Data to Host----
            byte[] myWriteBuffer = Encoding.ASCII.GetBytes(time); //Converting string to byte data
            nwStream.Write(myWriteBuffer, 0, myWriteBuffer.Length); //Sending the data in Bytes to Python
        }
    }


    // Update is called once per frame
    void Update()
    {
        //gameObject.transform.position = cube;
        if (receivedPos == "high attention" || receivedPos== "normal attention")
        {
            //Heal(10);
            gameObject.SetActive(true);


            print("high attention");
            receivedPos = "";
        }
        else if (receivedPos == "low attention" )
        {
            //Damage(10);
            gameObject.SetActive(false);

            print("low attention");
            receivedPos = "";
        }

    }
}

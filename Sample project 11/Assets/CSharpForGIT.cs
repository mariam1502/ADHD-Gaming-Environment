using System.Collections;
using System.Collections.Generic;
using System.Net;
using System.Net.Sockets;
using System.Text;
using UnityEngine;
using System.Threading;
using System;


public class CSharpForGIT : MonoBehaviour
{
    Thread mThread;
    public string connectionIP = "127.0.0.1";
    public int connectionPort = 25001;
    IPAddress localAdd;
    TcpListener listener;
    TcpClient client;
    int receivedPos=5;



    bool running;

    private void Update()
    {
        //transform.position = receivedPos; //assigning receivedPos in SendAndReceiveData()
        if(receivedPos== 1)
        { 
        GetComponent<Renderer>().material.color = new Color(255, 0, 0); //convert to red if 1
        }
        else if(receivedPos == 0)
        {
            GetComponent<Renderer>().material.color = new Color(0, 255, 0); //convert to green if 0
            print(receivedPos);
        }
    }

    private void Start()
    {
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
            receivedPos = Convert.ToInt32(dataReceived);
            print("received pos data, and moved the Cube!");

            //---Sending Data to Host----
            byte[] myWriteBuffer = Encoding.ASCII.GetBytes("Hey I got your message Python! Do You see this massage?"); //Converting string to byte data
            nwStream.Write(myWriteBuffer, 0, myWriteBuffer.Length); //Sending the data in Bytes to Python
        }
    }

    //public static Vector3 StringToVector3(string sVector)
    //{
    //    // Remove the parentheses
    //    if (sVector.StartsWith("(") && sVector.EndsWith(")"))
    //    {
    //        sVector = sVector.Substring(1, sVector.Length - 2);
    //    }

    //    // split the items
    //    string[] sArray = sVector.Split(',');

    //    // store as a Vector3
    //    Vector3 result = new Vector3(
    //        float.Parse(sArray[0]),
    //        float.Parse(sArray[1]),
    //        float.Parse(sArray[2]));

    //    return result;
    //}
    /*
    public static string GetLocalIPAddress()
    {
        var host = Dns.GetHostEntry(Dns.GetHostName());
        foreach (var ip in host.AddressList)
        {
            if (ip.AddressFamily == AddressFamily.InterNetwork)
            {
                return ip.ToString();
            }
        }
        throw new System.Exception("No network adapters with an IPv4 address in the system!");
    }
    */
}
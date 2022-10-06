using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using System.Net;
using System.Net.Sockets;
using System.Text;

using System.Threading;
using System;
using Random = UnityEngine.Random;


public class pieceScripe : MonoBehaviour
{
    private Vector3 RightPosition;
    public bool InRightPosition;
    public bool Selected;
    public static int counter;

    Thread mThread;
    public string connectionIP = "127.0.0.1";
    public int connectionPort = 25001;
    IPAddress localAdd;
    TcpListener listener;
    TcpClient client;
    //int receivedPos = 5;
    string receivedPos;
    [SerializeField]
    public  countdown ob;
    /*    float time;
     *  
    */
    public static string time="wait";
    bool running;



    void Start()
    {

        ThreadStart ts = new ThreadStart(GetInfo);
        mThread = new Thread(ts);
        mThread.Start();

        RightPosition = transform.position;

        transform.position = new Vector3(Random.Range(2f,4f),Random.Range(6f,-2f));

         
        //print(ob.timepass);

    }

    void Update()
    {
        //transform.position = receivedPos; //assigning receivedPos in SendAndReceiveData()
        //if (receivedPos == 1)
        //{
        //    GetComponent<Renderer>().material.color = new Color(255, 0, 0); //convert to red if 1
        //}
        //else if (receivedPos == 0)
        //{
        //    GetComponent<Renderer>().material.color = new Color(0, 255, 0); //convert to green if 0
        //    print(receivedPos);
        //}

 

        if (Vector3.Distance(transform.position,RightPosition)<0.5f)
        {
 


            if (!Selected)
            {
               
                transform.position = RightPosition;
                InRightPosition = true;
                counter++;
                if (counter == 16)
                {
                    print("You won!!! congrats");
                    time = ob.GetComponent<countdown>().timepass;
                    print(time);

                }

                Selected = true;


            }
        }



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
            print("received pos data, and moved the Cube!");

            //---Sending Data to Host----
            byte[] myWriteBuffer = Encoding.ASCII.GetBytes(time); //Converting string to byte data
            nwStream.Write(myWriteBuffer, 0, myWriteBuffer.Length); //Sending the data in Bytes to Python
        }
    }




}



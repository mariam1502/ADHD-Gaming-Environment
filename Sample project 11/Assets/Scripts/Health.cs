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

public class Health : MonoBehaviour
{
    public Text healthText;
    public Image healthBar, ringHealthBar;
    public Image[] healthPoints;

    float health, maxHealth = 100;  // health is the chosen health    ...   max_health is always =100
    float lerpSpeed;

    /// ////////////////////////
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

    /// ////////////////////


    private void Start()
    {
        ThreadStart ts = new ThreadStart(GetInfo);
        mThread = new Thread(ts);
        mThread.Start();

        health = maxHealth;


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



    private void Update()
    {
        healthText.text = "Attention Level: " + health + "%";  //the text that is shown 
        if (health > maxHealth) health = maxHealth;  // to not get over results

        lerpSpeed = 3f * Time.deltaTime;  //to make the speed smoother

        HealthBarFiller(); //increasing or decreasing of bars
        ColorChanger();  //color changing of bars


        if(receivedPos== "high attention")
        {
            Heal(10);
            receivedPos = "";
        }
        else if(receivedPos == "low attention")
        {
            Damage(10);
            receivedPos = "";
        }
    }

    void HealthBarFiller()
    {
        healthBar.fillAmount = Mathf.Lerp(healthBar.fillAmount, (health / maxHealth), lerpSpeed);   //responsible for the increasing o decreaing of the rectangular bar
        ringHealthBar.fillAmount = Mathf.Lerp(healthBar.fillAmount, (health / maxHealth), lerpSpeed);  //responsible for the increasing o decreaing of the circular bar

        for (int i = 0; i < healthPoints.Length; i++)   //responsible for the increasing o decreaing of the colored bar
        {
            healthPoints[i].enabled = !DisplayHealthPoint(health, i);   //here point by point
        }
    }
    void ColorChanger()
    {
        Color healthColor = Color.Lerp(Color.red, Color.green, (health / maxHealth));   // here the color changes between red and green .. depending on the amount of health chosen
        healthBar.color = healthColor;  //color changing for rectangular bar to be displayed in UI screen
        ringHealthBar.color = healthColor;  //color changing of the circular bar to be displayed in UI screen
    }

    bool DisplayHealthPoint(float _health, int pointNumber)
    {
        return ((pointNumber * 10) >= _health);
    }

    public void Damage(float damagePoints)
    {
        if (health > 0)
            health -= damagePoints;
    }
    public void Heal(float healingPoints)
    {
        if (health < maxHealth)
            health += healingPoints;
    }
}

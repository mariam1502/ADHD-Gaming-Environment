
//using UnityEngine;
//using System.Collections;
//using System.Collections.Generic;
//using System.Text;
//using System.IO;


//public class NeuroskyController : MonoBehaviour
//{

//    // Public variables
//    public float meditation;
//    public float attention;

//    // Private variables
//    private bool isConnecting;
//    private bool isConnected;
//    private bool isReading;

//    // Neurosky variables
//    private ThinkGear thinkGear;
//    private int lastUpdate;

//    void Start()
//    {
//        isConnecting = true;
//        isConnected = false;
//        isReading = false;
//        lastUpdate = 0;

//        // Initialize ThinkGear object
//        thinkGear = new ThinkGear();
//        thinkGear.updateMeditationEvent += new ThinkGear.UpdateMeditationEventHandler(UpdateMeditation);
//        thinkGear.updateAttentionEvent += new ThinkGear.UpdateAttentionEventHandler(UpdateAttention);
//    }

//    void Update()
//    {
//        if (isConnecting && !isConnected)
//        {
//            Connect();
//        }

//        if (isConnected && !isReading)
//        {
//            StartReading();
//        }

//        if (isConnected && isReading)
//        {
//            UpdateNeurosky();
//        }
//    }

//    void Connect()
//    {
//        Debug.Log("Connecting to Neurosky headset...");
//        thinkGear.Connect();
//        isConnecting = false;
//        isConnected = true;
//        Debug.Log("Connected!");
//    }

//    void StartReading()
//    {
//        Debug.Log("Starting to read data from Neurosky headset...");
//        thinkGear.StartReading();
//        isReading = true;
//        Debug.Log("Reading data...");
//    }

//    void UpdateNeurosky()
//    {
//        thinkGear.Update();
//    }

//    void UpdateMeditation(float value)
//    {
//        meditation = value;
//    }

//    void UpdateAttention(float value)
//    {
//        attention = value;
//    }
//}

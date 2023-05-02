//using UnityEngine;
//using System.Collections;
//using NeuroSky;
//using System;

//public class EEGReader : MonoBehaviour
//{
//    private NeuroSkySocket neuroSocket;
//    private int attentionValue;
//    private int meditationValue;
//    private int rawValue;

//    void Start()
//    {
//        neuroSocket = new NeuroSkySocket();
//        neuroSocket.Start();

//        neuroSocket.attentionEvent += HandleAttentionEvent;
//        neuroSocket.meditationEvent += HandleMeditationEvent;
//        neuroSocket.rawValueEvent += HandleRawValueEvent;
//    }

//    void Update()
//    {
//        Debug.Log("Attention: " + attentionValue);
//        Debug.Log("Meditation: " + meditationValue);
//        Debug.Log("Raw Value: " + rawValue);
//    }

//    void OnApplicationQuit()
//    {
//        neuroSocket.Stop();
//    }

//    void HandleAttentionEvent(int value)
//    {
//        attentionValue = value;
//    }

//    void HandleMeditationEvent(int value)
//    {
//        meditationValue = value;
//    }

//    void HandleRawValueEvent(int value)
//    {
//        rawValue = value;
//    }
//}

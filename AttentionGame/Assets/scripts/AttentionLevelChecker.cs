//using System.Collections;
//using System.Collections.Generic;
//using UnityEngine;

//public class AttentionLevelChecker : MonoBehaviour
//{
//    TGCConnectionController controller;
//    private int attention1;

//    public int attentionThreshold = 70;

//    void Start()
//    {
//        controller = GameObject.Find("NeuroSkyTGCController").GetComponent<TGCConnectionController>();
//        controller.UpdateAttentionEvent += OnUpdateAttention;

//    }
//    void OnUpdateAttention(int value)
//    {
//        attention1 = value;
//    }

//    void Update()
//    {

//        if (attention1 >= attentionThreshold)
//        {
//            // Trigger the action that you want to take when the attention level reaches the threshold.
//            // For example, you might want to play a sound or show a message.
//            Debug.Log("Attention level is above threshold!");
//        }
//    }
//}

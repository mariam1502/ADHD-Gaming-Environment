using System.Collections;
using System.Collections.Generic;
using UnityEngine;


public class PreventPass : MonoBehaviour
{
    private void OnTriggerEnter(Collider other)
    {
        if (other.gameObject.tag == "Obstacle")
        {
            Vector3 moveDirection = transform.position - other.transform.position;
            transform.position =  moveDirection.normalized * 0.5f;
            print("mariam");
        }
    }
}


using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Diamond : MonoBehaviour
{
   private void OnTriggerEnter(Collider other)
    {
        Debug.Log("Collision");
        Playerinventory player = other.GetComponent<Playerinventory>();
        if(player != null)
        {
            player.DiamondCollected();
            gameObject.SetActive(false);
        }
    }
}

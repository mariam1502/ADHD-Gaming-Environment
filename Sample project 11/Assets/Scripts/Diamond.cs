using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Diamond : MonoBehaviour
{
    public GameObject confetti;
   private void OnTriggerEnter(Collider other)
    {
        Debug.Log("Collision");
        Playerinventory player = other.GetComponent<Playerinventory>();
        if(player != null)
        {
            player.DiamondCollected();
            confetti.SetActive(true);
            confetti.transform.position = gameObject.transform.position;
            gameObject.SetActive(false);
        }
    }
}

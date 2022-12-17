using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class DestroyDiamonds : MonoBehaviour
{
    void OnCollisionEnter(Collision col)
    {
        if(col.gameObject.name == "Diamonds")
        {
            Destroy(col.gameObject);
        }
    }
}

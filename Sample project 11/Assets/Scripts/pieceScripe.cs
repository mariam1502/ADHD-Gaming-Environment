using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class pieceScripe : MonoBehaviour
{
    private Vector3 RightPosition;
    public bool InRightPosition;
    public bool Selected;
    void Start()
    {
        RightPosition = transform.position;
        transform.position = new Vector3(Random.Range(2f,4f),Random.Range(6f,-2f));
    }

    void Update()
    {
   
        print(Vector3.Distance(transform.position, RightPosition));
     if(Vector3.Distance(transform.position,RightPosition)<0.5f)
        {
            if (!Selected)
            {
                transform.position = RightPosition;
                InRightPosition = true;
            }

        }
    }
}

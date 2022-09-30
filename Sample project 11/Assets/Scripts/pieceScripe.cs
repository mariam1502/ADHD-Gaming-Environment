using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class pieceScripe : MonoBehaviour
{
    private Vector3 RightPosition;
    public bool InRightPosition;
    public bool Selected;
    public int counter;
    void Start()
    {
        RightPosition = transform.position;
        transform.position = new Vector3(Random.Range(2f,4f),Random.Range(6f,-2f));
    }

    void Update()
    {
   
     if(Vector3.Distance(transform.position,RightPosition)<0.5f)
        {
            if (!Selected)
            {
                transform.position = RightPosition;
                InRightPosition = true;
                Selected = true;


            }
            counter++;
            if (counter == 15)
            {
                print("You won!!! congrats");
            }

        }
        print(counter);

    }
}

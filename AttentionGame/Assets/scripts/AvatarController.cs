using UnityEngine;

using System.Threading; 
    public class AvatarController : MonoBehaviour
{

    public float speed = 2.0f;
    public float rotationSpeed = 100.0f;
    //public AudioSource walk;



    // Update is called once per frame
    void Update()
    {
        float horizontal = Input.GetAxis("Horizontal");
        float vertical = Input.GetAxis("Vertical");
        float horizontalInput = Input.GetAxis("Horizontal");
        transform.Rotate(Vector3.up, horizontalInput * rotationSpeed * Time.deltaTime);
        transform.position += new Vector3(horizontal, 0, vertical) * speed * Time.deltaTime;


        //walk.Play();




    }

}
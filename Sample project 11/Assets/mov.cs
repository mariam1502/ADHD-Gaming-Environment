
using UnityEngine;

public class mov : MonoBehaviour

{
    public Rigidbody rb;
    // Start is called before the first frame update
    void Start()
    {
        Debug.Log("Hello World!");
        rb.AddForce(0, 200, 500);
    }

    // Update is called once per frame
    void Update()
    {
        
    }
}

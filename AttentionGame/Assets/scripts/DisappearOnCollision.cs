using UnityEngine;

public class DisappearOnCollision : MonoBehaviour
{
    public AudioSource coin;
    public AudioSource background;
    //public TextMesh myTextElement;

    private static int counter ;
    private static bool win = false;

    //private void OnCollisionEnter(Collision collision)
    //{
    //    // This code will run when the object collides with another object.
    //    if (collision.gameObject.tag == "player")
    //    {
    //        gameObject.SetActive(false);
    //    }
    //}
    public void Start()
    {
        background.Play();
        //myTextElement.text = "You Won!";

    }
    void Update()
    {

        // Check if the game is won

    }

    private void OnTriggerEnter(Collider other)
    {

        if (gameObject.tag == "veggies" && transform.position.y > 0.5)
        {
            gameObject.SetActive(false);
            coin.Play();

            counter++;

            if(counter==20)
            {
                win = true;;
                counter++;
                Time.timeScale = 0;


            }

        }

    }

    void OnGUI()
    {
        if (win)
        {

            GUI.contentColor = Color.black;



            // Display the "You Won!" text
            // Create a centered label with a large font size
            GUIStyle style = new GUIStyle(GUI.skin.label);
            style.fontSize = 30;
            style.alignment = TextAnchor.MiddleCenter;
            style.fontStyle = FontStyle.Bold;

            // Display the "You Won!" text
            GUI.Label(new Rect(0, 0, Screen.width, Screen.height), "YOU WON !", style);


        }
    }
}

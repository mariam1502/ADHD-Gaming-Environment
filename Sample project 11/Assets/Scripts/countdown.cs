using System.Collections;
using System.Collections.Generic;
using UnityEngine;
//using UnityEditor.UI;
using UnityEngine.UI;
using TMPro;


public class countdown : MonoBehaviour
{
    public float timeStart = 0;
    public TextMeshProUGUI textBox;
    public string timepass;
    // Start is called before the first frame update
    void Start()
    {
        textBox.text = timeStart.ToString();
    }

    // Update is called once per frame
    void Update()
    {

        {
            timeStart += Time.deltaTime;
           
            textBox.text = Mathf.Round(timeStart).ToString();
            timepass=Mathf.Round(timeStart).ToString();
        }
    }
}

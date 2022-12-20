using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class ConfettiController : MonoBehaviour
{
    public float timer = 3;

    private float counter;

    private void OnEnable()
    {
        counter = timer;
        //StartCoroutine(HideConfetti());
    }

    private void Update()
    {
        counter -= Time.deltaTime;
        if(counter < 0)
        {
            gameObject.SetActive(false);
        }
    }

    private IEnumerator HideConfetti()
    {
        yield return new WaitForSeconds(timer);
        gameObject.SetActive(false);
    }
}

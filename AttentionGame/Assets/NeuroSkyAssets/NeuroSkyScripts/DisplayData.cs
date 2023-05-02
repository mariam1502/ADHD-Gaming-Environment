using UnityEngine;
using System.Collections;

public class DisplayData : MonoBehaviour
{

	public Transform objectToMove;
	public static Vector3 startPosition = new Vector3((float)-0.5625193, (float)0.66, (float)-0.06437713);
	public static Vector3 endPosition = new Vector3((float)-0.5625193, (float)1.53, (float)-0.06437713);
	public bool space = false;
	public float duration = (float)1.0f;
	private float startTime;
	private float prevTimestamp;
	private float deltaTime;

	public Texture2D[] signalIcons;

    private int indexSignalIcons = 1;
	
    TGCConnectionController controller;

    private int poorSignal1;
    private int attention1;
    private int meditation1;

	public float delta;





	void Start()
    {
		startTime = Time.time;
		prevTimestamp = Time.realtimeSinceStartup;



		controller = GameObject.Find("NeuroSkyTGCController").GetComponent<TGCConnectionController>();
		
		controller.UpdatePoorSignalEvent += OnUpdatePoorSignal;
		controller.UpdateAttentionEvent += OnUpdateAttention;
		controller.UpdateMeditationEvent += OnUpdateMeditation;
		
		controller.UpdateDeltaEvent += OnUpdateDelta;



	}




	void OnUpdatePoorSignal(int value){
		poorSignal1 = value;
		if(value < 25){
			indexSignalIcons = 0;
		}else if(value >= 25 && value < 51){
      		indexSignalIcons = 4;
		}else if(value >= 51 && value < 78){
      		indexSignalIcons = 3;
		}else if(value >= 78 && value < 107){
      		indexSignalIcons = 2;
		}else if(value >= 107){
      		indexSignalIcons = 1;
		}
	}
    private void Update()
    {
		float currentTimestamp = Time.realtimeSinceStartup;
		deltaTime = currentTimestamp - prevTimestamp;
		prevTimestamp = currentTimestamp;
		if (attention1 >= 40 && attention1 <= 100)
		{
			objectToMove.transform.position = Vector3.Lerp(endPosition, startPosition, 1.0f * deltaTime);


		}
		else
		{
			objectToMove.transform.position = Vector3.Lerp(startPosition, endPosition, 1.0f * deltaTime);



		}
	}
    void OnUpdateAttention(int value){

		attention1 = value;




	}
	void OnUpdateMeditation(int value){

		meditation1 = value;


	}
	void OnUpdateDelta(float value){

		delta = value;
	}


    void OnGUI()
    {
		GUILayout.BeginHorizontal();
        GUI.backgroundColor = Color.white;

        GUI.contentColor = Color.black;
		GUI.skin.label.fontSize = 15;
		GUI.skin.label.alignment = TextAnchor.UpperLeft;

		GUI.skin.label.fontStyle = FontStyle.Bold;

		//GUI.skin.button.normal.background = MakeTex(600, 400, Color.white);

		GUI.skin.button.fontSize = 15;

		if (GUILayout.Button("Connect"))
        {
            controller.Connect();
        }
        if (GUILayout.Button("DisConnect"))
        {
            controller.Disconnect();
			indexSignalIcons = 1;
        }
		
		GUILayout.Space(Screen.width-250);
		//GUILayout.Label(signalIcons[indexSignalIcons]);
		
		GUILayout.EndHorizontal();

		
        GUILayout.Label("PoorSignal1:" + poorSignal1);
        GUILayout.Label("Attention1:" + attention1);
        //GUILayout.Label("Meditation1:" + meditation1);
		//GUILayout.Label("Delta:" + delta);




    }

}


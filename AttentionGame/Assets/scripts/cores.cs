using System.Collections;
using System.Collections.Generic;
using Unity.Jobs;
using UnityEngine;

public class cores : MonoBehaviour
{
    // Start is called before the first frame update
    void Start()
    {
        // Create an array of Vector3 positions
        Vector3[] positions = new Vector3[1000];
        for (int i = 0; i < positions.Length; i++)
        {
            positions[i] = new Vector3(i, 0, 0);
        }

        // Create a new job that updates the position of a Unity object
        UpdatePositionJob job = new UpdatePositionJob
        {
            positions = positions,
            transform = transform
        };

        // Schedule the job to run in parallel across multiple CPU cores
        JobHandle handle = job.Schedule(positions.Length, 32);

        // Wait for the job to complete
        handle.Complete();
    }

    // This struct represents the data for the job
    struct UpdatePositionJob : IJobParallelFor
    {
        public Vector3[] positions;
        public Transform transform;

        // This method will be executed for each element in the array
        public void Execute(int index)
        {
            // Update the position of the Unity object
            transform.position = positions[index];
        }
    }
}

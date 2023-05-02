using UnityEngine;
using MongoDB.Driver;
using MongoDB.Bson;

public class DatabaseManager : MonoBehaviour
{
    private MongoClient client;
    private IMongoDatabase database;
    private IMongoCollection<BsonDocument> collection;

    // Use this for initialization



    async void Start()
    {
        //client = new MongoClient("mongodb://localhost:27017/");
        //database = client.GetDatabase("ADHD_GAMES");
        //collection = database.GetCollection<BsonDocument>("Therapist");

        //// Test connection
        //print("Connected to MongoDB!");
        //BsonDocument document = new BsonDocument
        //{
        //    {"name", "Ahmed"},
        //    { "username","Ahmed123"},
        //    {"password","12345" }

        //};
        //collection.InsertOne(document);


        client = new MongoClient("mongodb+srv://mariamismail152001:D4CBfuOFa5OnMxHb@cluster0.pr8kbyx.mongodb.net/?retryWrites=true&w=majority");
        database = client.GetDatabase("ADHD_GAMES");

        collection = database.GetCollection<BsonDocument>("EEG_signals");
        //BsonDocument document = new BsonDocument
        //{
        //    {"name", "Mariam Ismil"},
        //    { "username","Mariam1502"},
        //    {"password","678910" }

        //};
        //await collection.InsertOneAsync(document);




    }
    //to add to database
    public async void Save_EEG_ToDataBase(string theta, string alpha, string low_beta, string high_beta , string gamma)
    {
        var document = new BsonDocument { { "theta", theta },
            { "alpha", alpha },
            { "low_beta", low_beta },
            { "high_beta", high_beta },
            { "gamma", gamma }
        };
        await collection.InsertOneAsync(document);

    }




    // Update is called once per frame
    void Update()
    {



    }



}






const { MongoClient } = require("mongodb");

const mongoURI = 'mongodb://localhost:27017';
const dbName = 'kesehatan_mental';
const collectionName = 'registrasi';

async function connectToDatabase() {
  const client = new MongoClient(mongoURI, { useNewUrlParser: true, useUnifiedTopology: true });
  await client.connect();
  const db = client.db(dbName);
  const ordersCollection = db.collection(collectionName);

  return { client, ordersCollection };
}

module.exports = { connectToDatabase };

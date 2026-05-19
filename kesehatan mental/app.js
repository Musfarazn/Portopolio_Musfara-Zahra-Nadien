const express = require('express');
const path = require('path');
const { connectToDatabase } = require('./public/database');

const app = express();

app.use(express.static(path.join(__dirname, 'public')));
app.use(express.json());

app.post('/registrasi', async (req, res) => {
  const { name, email, phone, dokter, pesan } = req.body;

  try {
    const { client, ordersCollection } = await connectToDatabase();

    const result = await ordersCollection.insertOne({
      name,
      email,
      phone,
      dokter,
      pesan,
    });

    await client.close();

    res.status(201).json({
      status: 'success',
      message: 'Registrasi berhasil',
      orderID: result.insertedId.toString(), // Convert ObjectId to string
    });
  } catch (error) {
    console.error('Terjadi kesalahan:', error);
    res.status(500).json({
      status: 'error',
      message: 'Terjadi kesalahan dalam registrasi',
    });
  }
});

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
  console.log(`Server is running on port ${PORT}`);
});

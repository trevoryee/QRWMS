const express = require('express');
const mysql = require('mysql');
const app = express();
const port = 3000;

app.use(express.json()); // Enable JSON body parsing middleware

const connection = mysql.createConnection({
  host: 'localhost',
  user: 'yeet_inventory',
  password: 'Guestuser22@',
  database: 'yeet_inventory',
});

connection.connect((err) => {
  if (err) {
    console.error('Error connecting to MySQL:', err);
    return;
  }
  console.log('Connected to MySQL database');
});

app.post('/add-entry', (req, res) => {
  const { database, make, model, sn } = req.body;

  if (!make || !model || !sn) {
    res.status(400).send('WARNING: Missing entry data.');
    return;
  }

  const sql = `INSERT INTO ${database} (primary_id, make, model, sn, timestamp) VALUES (NULL, ?, ?, ?, NOW())`;
  const values = [make, model, sn];

  connection.query(sql, values, (error, results) => {
    if (error) {
      console.error('Error adding entry:', error);
      res.status(500).send('Error adding entry!');
      return;
    }

    if (results.affectedRows === 1) {
      res.status(200).send('Record added');
    } else {
      res.status(500).send('Error adding entry!');
    }
  });
});

app.listen(port, () => {
  console.log(`Server listening on port ${port}`);
});

const express = require("express");
const bodyParser = require("body-parser");
const sqlite3 = require("sqlite3").verbose();
const app = express();
const port = 3000;

// Set up SQLite database
let db = new sqlite3.Database("./database.db", (err) => {
  if (err) {
    console.error(err.message);
  }
  console.log("Connected to the SQLite database.");
});

// Create table if it doesn't exist
db.run(`CREATE TABLE IF NOT EXISTS messages (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name TEXT NOT NULL,
  email TEXT NOT NULL,
  subject TEXT NOT NULL,
  message TEXT NOT NULL
)`);

// Middleware
app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static("public"));

// Serve the form
app.get("/", (req, res) => {
  res.sendFile(__dirname + "/public/index.html");
});

// Handle form submission
app.post("/submit", (req, res) => {
  const { name, email, subject, message } = req.body;
  db.run(
    `INSERT INTO messages (name, email, subject, message) VALUES (?, ?, ?, ?)`,
    [name, email, subject, message],
    (err) => {
      if (err) {
        return console.log(err.message);
      }
      res.send("Message received!");
    }
  );
});

// Start server
app.listen(port, () => {
  console.log(`Server running at http://localhost:${port}/`);
});

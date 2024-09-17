<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Highest Average Cricketer</title>
  <style>
    
        .container {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #f9f9f9;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .container p {
        margin: 5px 0;
        font-weight: bold;
        }

        .container p:last-child {
        margin-bottom: 0;
        }
        body{
          background-image: url(cric3.jpg);
          background-size: cover;
        }
        h1{
          color: white;
        }

  </style>
</head>
<body>
  <center><h1>Highest Average of Cricketer</h1></center>
  <div class="container">
  <?php
  $servername = "localhost:3306";
  $username = "root";
  $password = "dhilipdk18";
  $database = "cricket";

  $conn = new mysqli($servername, $username, $password, $database);

  if ($conn->connect_error) {
      die('Connection failed: ' . $conn->connect_error);
  }

  $sql = "SELECT *, (Run / Matches) AS Average FROM players ORDER BY Average DESC LIMIT 1";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      echo "<p>Highest Average of Cricketer:</p>";
      echo "<p>Player ID: " . $row["Jno"] . "</p>";
      echo "<p>Name: " . $row["Name"] . "</p>";
      echo "<p>Age: " . $row["Age"] . "</p>";
      echo "<p>Matches: " . $row["Matches"] . "</p>";
      echo "<p>Runs: " . $row["Run"] . "</p>";
      echo "<p>Country: " . $row["Country"] . "</p>";
      echo "<p>Average: " . $row["Average"] . "</p>";
  } else {
      echo "No records found.";
  }

  $conn->close();
  ?>
  
  <br>
  <link rel="stylesheet" href="styles.css">
  <a href="view.php"><button>Back</button></a>
  </div>
</body>
</html>

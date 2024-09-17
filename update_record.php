<?php
$servername = "localhost";
$username = "root";
$password = "dhilipdk18";
$database = "cricket";

$conn = new mysqli($servername, $username, $password, $database, 3306);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$jno = $_POST['jno'];
$name = $_POST['name'];
$age = $_POST['age'];
$matches = $_POST['matches'];
$run = $_POST['run'];
$country = $_POST['country'];

// Update the record using an UPDATE query
$sql_update = "UPDATE players SET Name='$name', Age='$age', Matches='$matches', Run='$run', Country='$country' WHERE Jno='$jno'";

if ($conn->query($sql_update) === TRUE) {
    echo "<div class='success-message'>Record updated successfully.</div>"; // Added 'echo'
} else {
    echo "<div class='error-message'>Error: " . $conn->error . "</div>"; // Added 'echo'
}

$conn->close();
?>


<br><br>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Cricketer Record Management</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    .success-message {
      background-color: #4CAF50;
      color: white;
      padding: 10px;
      text-align: center;
    }

    .error-message {
      background-color: #FF5733;
      color: white;
      padding: 10px;
      text-align: center;
    }
    body{
        background-image: url(v.webp);
        background-size: cover;
    }
  </style>
</head>
<body>
  <br><br><center>
  <a href="index.php"><button class="back-button">Back to Home Page</button></a></center>
</body>
</html>



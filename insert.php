<?php
$servername = "localhost";
$username = "root";
$password = "dhilipdk18";
$database = "cricket";

$conn = new mysqli($servername, $username, $password, $database, 3306);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$name = $_POST['name'];
$age = $_POST['age'];
$jno = $_POST['jno'];
$matches = $_POST['matches'];
$run = $_POST['run'];
$country = $_POST['country'];

$sql = "INSERT INTO players (Name, Jno, Age, Matches, Run, Country) VALUES ('$name', '$jno', '$age', '$matches', '$run', '$country')";

if ($conn->query($sql) === TRUE) {
    echo "<div class='success-message'>Data inserted successfully.</div>";
} else {
    echo "<div class='error-message'>Error: " . $conn->error . "</div>";
}

$conn->close();
?>

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

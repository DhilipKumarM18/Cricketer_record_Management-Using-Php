<!-- edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Cricketer Record</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    body{
      background-image: url(cric3.jpg);
      background-size: cover;
    }
  </style>

</head>
<body>
  <center><h1>Edit Cricketer Record</h1></center>
  <div class="form-container">
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "dhilipdk18";
  $database = "cricket";

  $conn = new mysqli($servername, $username, $password, $database,3306);

  if ($conn->connect_error) {
      die('Connection failed: ' . $conn->connect_error);
  }

  $jno = $_POST['jno'];
  $sql_select = "SELECT * FROM players WHERE Jno='$jno'";
  $result_select = $conn->query($sql_select);

  if ($result_select->num_rows > 0) {
      $row = $result_select->fetch_assoc();
      echo "<form action='update_record.php' method='post'>";
      echo "Player ID: <input type='number' name='jno' value='" . $row["Jno"] . "' readonly><br>";
      echo "Name: <input type='text' name='name' value='" . $row["Name"] . "'><br>";
      echo "Age: <input type='number' name='age' value='" . $row["Age"] . "'><br>";
      echo "Matches: <input type='number' name='matches' value='" . $row["Matches"] . "'><br>";
      echo "Runs: <input type='number' name='run' value='" . $row["Run"] . "'><br>";
      echo "Country: <input type='text' name='country' value='" . $row["Country"] . "'><br>";
      echo "<input type='submit' value='Update'>";
      echo "</form>";
  } else {
      echo "No records found for the given Player ID.";
  }

  $conn->close();
  ?>
  </div>
  
  <br>
  <center><a href="index.php"><button>Back to Home Page</button></a></center>
</body>
</html>

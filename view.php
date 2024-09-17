<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Cricketer Records</title>
  <link rel="stylesheet" href="styles.css">

</head>
<body>
  <center><h1>View Cricketer Records</h1></center>
  <?php
  $servername = "localhost:3306";
  $username = "root";
  $password = "dhilipdk18";
  $database = "cricket";

  $conn = new mysqli($servername, $username, $password, $database);

  if ($conn->connect_error) {
      die('Connection failed: ' . $conn->connect_error);
  }

  $sql = "SELECT * FROM players";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      echo "<table>";
      echo "<tr><th>Player ID</th><th>Name</th><th>Age</th><th>Matches</th><th>Runs</th><th>Country</th><th>Average Runs</th></tr>";

      while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["Jno"] . "</td>";
          echo "<td>" . $row["Name"] . "</td>";
          echo "<td>" . $row["Age"] . "</td>";
          echo "<td>" . $row["Matches"] . "</td>";
          echo "<td>" . $row["Run"] . "</td>";
          echo "<td>" . $row["Country"] . "</td>";

          // Calculate average runs
          $averageRuns = ($row["Matches"] > 0) ? ($row["Run"] / $row["Matches"]) : 0;
          echo "<td>" . $averageRuns . "</td>";

          echo "</tr>";
      }

      echo "</table>";
  } else {
      echo "No records found.";
  }

  $conn->close();
  ?>
  
  <br>
  <center>
  <a href="index.php"><button>Back to Home</button></a>
  <a href="highest_average.php"><button>Highest_Average</button>
  <a href="generate_pdf.php" target="_blank"><button>Download PDF</button></a>
</center>
</body>
</html>

<!-- graph.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Player Average Runs per Match Graph</title>
  <!-- Include Chart.js library -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="styles.css">
  <style>
    h1{
      color: blue;
      text-align: center;
    }
  </style>
</head>
<body>
  <h1>Player Average Runs per Match Graph</h1>
  <canvas id="averageGraph"></canvas>
  
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "dhilipdk18";
  $database = "cricket";

  $conn = new mysqli($servername, $username, $password, $database, 3306);

  if ($conn->connect_error) {
      die('Connection failed: ' . $conn->connect_error);
  }

  $sql = "SELECT Jno, Name, Matches, Run FROM players";
  $result = $conn->query($sql);

  $playerNames = [];
  $averages = [];

  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          $playerNames[] = $row["Name"];
          $average = ($row["Matches"] > 0) ? ($row["Run"] / $row["Matches"]) : 0;
          $averages[] = $average;
      }
  }

  $conn->close();
  ?>

  <script>
    var ctx = document.getElementById('averageGraph').getContext('2d');
    var averageGraph = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: <?php echo json_encode($playerNames); ?>,
        datasets: [{
          label: 'Average Runs per Match',
          data: <?php echo json_encode($averages); ?>,
          backgroundColor: 'red',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
            x: {
            beginAtZero: true,
            title: {
              display: true,
              text: 'Player Name'
            }
        },
          y: {
            beginAtZero: true,
            title: {
              display: true,
              text: 'Average Runs per Match'
            }
          }
        },
        plugins: {
          title: {
            display: true,
            text: 'Player Average Runs per Match'
          }
        }
      }
    });
  </script>
  <br><br><center>
  <a href="index.php"><button>Back to Home Page</button></a>
  </center>
</body>
</html>

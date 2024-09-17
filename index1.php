<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <style>
    
      body {
          font-family: 'Times New Roman', Times, serif;
          background-color: #f0f0f0;
          background-image: url(cric3.jpg);
          margin: 0;
          padding: 0;
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
          background-repeat: no-repeat;
          background-size: cover;
          
      }

      .container {
          background-color: #ffffff;
          border-radius: 8px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
          padding: 20px;
          text-align: center;
          border:5px solid black;
          border-radius: 30px;
      }

      .container h1 {
          color: blue;
          margin-bottom: 20px;
      }

      .container p {
          font-size: 18px;
          margin-bottom: 20px;
      }

      .container a {
          color: #007bff;
          text-decoration: none;
          font-weight: bold;
      }

      .success {
          color: green;
          margin-top: 10px;
      }

  </style>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <h1>CRICKETER RECORD MANAGEMENT SYSTEM</h1>
    <p>Please <a href="login.php">log in</a> or <a href="signup.php">sign up</a> to access the system.</p>
    <?php
    if (isset($_GET['login_success'])) {
        echo "<p class='success'>Login successful!</p>";
    }
    ?>
  </div>
</body>
</html>

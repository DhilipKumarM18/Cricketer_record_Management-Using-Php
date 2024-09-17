<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Cricketer Record Management</title>
  <link rel="stylesheet" href="styles.css">
 <style>
  h1{
    text-align: center;
    color: white;
    background-color: black;
    display: flex;
    width: 50%;
    justify-content: center;
    border: 5px solid white;
    border-radius: 30px;
    padding: 20px;
    margin: auto;
    
  }
  body{
    background-image: url(cricket_result.png);
    background-size: cover;
  }
 </style>
</head>
<body>
  <h1> Cricketer Record Management</h1>
  <div class="form-container">
  <form action="insert.php" method="post">
    <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>
    <label for="age">Age:</label>
    <input type="number" id="age" name="age" required><br>
    <label for="jno">Player Id:</label>
    <input type="number" id="jno" name="jno" required><br>
    <label for="matches">Matches:</label>
    <input type="number" id="matches" name="matches" required><br>
    <label for="run">Runs:</label>
    <input type="number" id="run" name="run" required><br>
    <label for="country">Country:</label>
    <input type="text" id="country" name="country" required><br>
    <input type="submit" value="Submit">
    </div>
  </form>
</div>
</body>
</html>

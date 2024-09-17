<!-- delete.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Cricketer Record</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    /* styles.css */
/* ... (other styles) */

/* Style for the form container */
.form-container {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ddd;
  border-radius: 5px;
  background-color: #f9f9f9;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

/* Style for form fields and labels */
.form-container label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

.form-container input[type="text"],
.form-container input[type="number"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.form-container input[type="submit"] {
  padding: 10px 20px;
  background-color: #007bff;
  color: white;
  border: none;
  cursor: pointer;
}

.form-container input[type="submit"]:hover {
  background-color: #0056b3;
}
body{
  background-image: url(v.webp);
  background-size: cover;
}
  </style>

</head>
<body>
<div class="form-container">
  <h1>Delete Cricketer Record</h1>
  <form action="delete_record.php" method="post">
    <div class="form-class">
    <label for="jno">Player Id:</label>
    <input type="number" id="jno" name="jno" required>
    <input type="submit" value="Delete">
    </div>
  </form>
</div>
</body>
</html>

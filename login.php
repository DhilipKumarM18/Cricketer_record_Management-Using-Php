<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "dhilipdk18";
$database = "cricket";

$conn = new mysqli($servername, $username, $password, $database, 3306);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$loginError = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"])) {
        // Handle login
        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($query);
        

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row["password"])) {
                $_SESSION["username"] = $username;
                header("Location: index.php");
                exit();
            } else {
                $loginError = "Invalid username or password.";
            }
        } else {
            $loginError = "Invalid username or password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-image: url(v.webp);
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        .form {
            display: flex;
            flex-direction: column;
        }

        .form input {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .form button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .error {
            color: red;
            margin-top: 10px;
        }

        .signup-link {
            margin-top: 10px;
        }

        .signup-link a {
            color: #007bff;
            text-decoration: none;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cricketers Record</h1>
        <div class="error"><?php echo $loginError; ?></div>

        <!-- Login Form -->
        <form method="post" class="form">
            <h2>Login</h2>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>

        <div class="signup-link">
            Don't have an account yet? <a href="signup.php">Sign up here</a>
        </div>
    </div>
</body>
</html>


<?php
    session_start();
    if (!isset($_SESSION["username"])) {
        header("Location: login.php");
        exit();
    }
    ?>
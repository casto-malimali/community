
<?php
$title = "Login Page";
session_start();
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}
require_once 'includes/db.php';

if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
}

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (!$username && !$password) {
        $username_error = 'Please enter a valid username address';
    }

    if (strlen($password) < 6) {
        $password_error = 'Password must be at least 6 characters long';
    }

    $result = mysqli_query($conn, "SELECT * FROM adminlogin WHERE username = '$username' AND password = '$password'");
    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['user_id'] = $row['uid'];
        $_SESSION['username'] = $row['username'];
        header('Location: dashboard.php');
    } else {
        $error_message = 'Incorrect username or password';
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("../images/image4.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: bold;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
            font-size: 14px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border 0.3s, box-shadow 0.3s;
        }
        input[type="text"]:focus, input[type="password"]:focus {
            border: 1px solid #00f2fe;
            box-shadow: 0 0 5px rgba(0, 242, 254, 0.5);
            outline: none;
        }
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #4facfe;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #00f2fe;
        }
        .navbar {
            position: absolute;
            top: 20px;
            left: 20px;
        }
        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        .navbar a {
            text-decoration: none;
            color: white;
            background-color: #333;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .navbar a:hover {
            background-color: #555;
        }
        .error {
            color: red;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="navbar">
    <ul>
    <a class="uli" href="../index.php">HOME</a>
    </ul>
</div>
<div class="container">
    <h2>ADMIN LOGIN HERE</h2>
   
    <form action="process.php" method="post">
        <input type="text" name="username" placeholder="username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="submit" name="login">
        
    </form>
</div>
</body>
</html>

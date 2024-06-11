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
        <a class="uli" href="index.php">HOME</a>
    </ul>
</div>
<div class="container">
    <h2>USER LOGIN HERE</h2>
    
    <!-- PHP logic to display error message if login fails -->
    <?php
    session_start();
    if (!empty($_SESSION['error'])) {
        echo '<div class="error"><p>' . $_SESSION['error'] . '</p></div>';
        unset($_SESSION['error']);
    }
    ?>
    
    <form action="login_process.php" method="post">
        <input type="text" name="username" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login" name="us_login">
        
        <!-- Forgot Password link -->
        <p style="text-align: right;">Forgot your password? <a class="uli" href="forgot_password.php">Reset here</a></p>
        <!-- New user registration link -->
        <p style="text-align: right;">NEW USER: <a class="uli" href="register.php">Register here</a></p>
    </form>
</div>
</body>
</html>

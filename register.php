

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-image: url("../images/image4.jpg") ;
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
    input[type="text"], input[type="email"], input[type="password"], input[type="number"], input[type="text"], select, textarea {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        transition: border 0.3s, box-shadow 0.3s;
    }
    input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus, input[type="number"]:focus, select:focus, textarea:focus {
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
        <h2>REGISTRATION</h2>
        <?php if (!empty($errors)) : ?>
            <div class="error">
                <?php foreach ($errors as $error) : ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <form action="register_process.php" method="post">
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="number" name="number" placeholder="Phone Number" required>
            <input type="password" name="password" placeholder="Password" required>
            <select name="gender" required>
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            <textarea name="address" placeholder="Address" required></textarea>
            <input type="submit" value="Register" name="register">
        </form>
    </div>
</body>
</html>

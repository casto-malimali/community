<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: us_dashboard.php");
    exit;
}


require_once 'botho.php';

if (isset($_SESSION['user_id'])) {
    header('Location: us_dashboard.php');
}

if (isset($_POST['us_login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (!$username && !$password) {
        $username_error = 'Please enter a valid username address';
    }

    if (strlen($password) < 6) {
        $password_error = 'Password must be at least 6 characters long';
    }

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$username' AND password = '$password'");
if ($row = mysqli_fetch_array($result)) {
    // If the query returns a row, it means the username and password are correct
    $_SESSION['user_id'] = $row['uid'];
    $_SESSION['name'] = $row['username'];
    header('Location: us_dashboard.php');
} else {
    // If the query doesn't return a row, it means the username or password is incorrect
    $error_message = 'Incorrect username or password';
}

}
?>
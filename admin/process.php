<?php
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
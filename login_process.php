<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: us_dashboard.php");
    exit;
}

require_once 'botho.php';

if (isset($_SESSION['user_id'])) {
    header('Location: us_dashboard.php');
    exit;
}

if (isset($_POST['us_login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $errors = [];

    if (empty($username)) {
        $errors[] = 'Please enter a valid email address.';
    }

    if (strlen($password) < 6) {
        $errors[] = 'Password must be at least 6 characters long.';
    }

    if (empty($errors)) {
        $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$username'");
        if ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['email'];
                if ($row['user'] == 'admin'){
                    header('Location: admin/dashboard.php');
                    exit;

                }
                else{
                    header('Location: us_dashboard.php');
                exit;
                }
                
            } else {
                $errors[] = 'Incorrect password.';
            }
        } else {
            $errors[] = 'No user found with this email address.';
        }
    }

    $_SESSION['errors'] = $errors;
    header('Location: us_dashboard.php');
    exit;
}
?>

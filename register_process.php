<?php
session_start();
require_once 'botho.php';

if (isset($_POST['register'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $errors = [];

    if (!$name) {
        $errors[] = 'Please enter a valid name';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address';
    }

    if (strlen($password) < 6) {
        $errors[] = 'Password must be at least 6 characters long';
    }

    if (empty($errors)) {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO users (name, email, number, password, gender, address) VALUES ('$name', '$email', '$number', '$password_hash', '$gender', '$address')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Your Successfully Registered'); window.location='us_login.php';</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        }
    } else {
        // File upload failed
        echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
    }
}
?>
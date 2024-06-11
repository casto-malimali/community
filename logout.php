<?php
// Start the session (if not already started)
if (!isset($_SESSION)) {
    session_start();
}

// Clear all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page (or any other desired location)
header('Location: us_login.php');
exit();
?>

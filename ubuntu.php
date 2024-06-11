<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include ('config/connection.php');

if(isset($_POST['submit'])){
    $eventname = $_POST["eventname"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $location = $_POST["location"];
    $description = $_POST["description"];
    $file = $_FILES["file"]["name"];
    $target_dir = "upload/"; // Directory to save the uploaded file
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Check if the uploads directory exists, if not create it
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Escape special characters to prevent SQL injection
    $eventname = mysqli_real_escape_string($conn, $eventname);
    $date = mysqli_real_escape_string($conn, $date);
    $time = mysqli_real_escape_string($conn, $time);
    $location = mysqli_real_escape_string($conn, $location);
    $description = mysqli_real_escape_string($conn, $description);

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        // File upload successful, save the file path in the database
        $query = "INSERT INTO events (eventname, date, time, location, description, file) VALUES ('$eventname', '$date', '$time', '$location', '$description', '$target_file')";

        $result = mysqli_query($conn, $query);
        
        if($result){
            echo "<script>alert('Your Event Submitted Successfully'); window.location='us_dashboard.php';</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        }
    } else {
        // File upload failed
        echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
    }
}
?>

<?php
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}
?>
<?php
$title = 'Community Events';
require ('includes/header.php');
require ('includes/sidebar.php');
require ('includes/navbar.php');
require('includes/db.php');

?>

<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Update Events</h1> 
</div>

<div class="card shadow mb-4">
    <div class="card-header">
        <div class="card-body">
        <?php require "includes/db.php";

$id = $_GET['id'];
$select = "SELECT * FROM events WHERE id = '$id'";
    $data=mysqli_query($conn,$select);
    $result=mysqli_num_rows($data);
    
    if($result){
        while($row=mysqli_fetch_array($data)){
        
            ?>
            
            <form action="" method="post">
            <input type="hidden" name="id" id="bb-name" value="<?= $row['id'] ?>" class="form-control">
                <div class="col-md-6">
                <label for="">Event Name</label>
                <input type="text" name="eventname" id="bb-name" value="<?= $row['eventname'] ?>" class="form-control">
                </div>

                <div class="col-md-6">
                <label for="">Date</label>
                <input type="text" name="date" id="bb-date" value="<?= $row['date'] ?>" class="form-control">
</div>

                <div class="col-md-6">
                <label for="">Time</label>
                <input type="time" value="<?= $row['time'] ?>" name="time" class="form-control">
</div>

                <div class="col-md-6">
                <label for="" class="form-label">Location</label>
                <input type="text" name="location" id="bb-location" value="<?= $row['location'] ?>" class="form-control">
</div>

                <div class="col-md-6">
                <label for="">description</label>
                <input type="text" name="description" rows="3" id="bb-description"  value="<?= $row['description'] ?>" class="form-control">
</div>
                <div class="col-md-6">
                <label for="">Photo</label>
                <input type="file" class="form-control" value="<?= $row['file'] ?>" name="file" class="form-control">

</div>
<br>
                <div>
                <button class="btn btn-primary" type="submit" name="update_btn" >Update Event</button>
                </div>
                
            </form>
            <?php
        }
}
else{
    echo 'No ID Found';
}
 ?>
           
        </div>
    </div>
</div>
<?php 
if(isset($_POST['update_btn'])){
    $id = $_POST['id'];
    $eventname = $_POST['eventname'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $file = $_FILES["file"]["name"];
    $target_dir = "upload/"; // Directory to save the uploaded file
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Check if the uploads directory exists, if not create it
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $update= "UPDATE events SET eventname = '$eventname', date ='$date', time= '$time', location='$location', description='$description', file= '$targe_file' WHERE id = '$id'";
    $data=mysqli_query($conn, $update);
    if($data){
        ?>
        <script type ="text/javascript"> alert("Event updated successfuly");
        window.open("http://localhost/PROJECT/admin/view.php", "_self");
    </script>
        <?php
    }
    else{
        ?>
        <script type ="text/javascript"> alert("please try again") </script>
        <?php 
    }
};
?>

</div>
</div>
<?php

require ('includes/footer.php');



?>
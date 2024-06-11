<?php
include ('config.php');

if(isset($_POST['submit'])){
    $event_name = $_POST["name"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $location = $_POST["location"];
    $description = $_POST["description"];
    $file = $_POST["image"];

    $query = mysqli_query($conn, "INSERT INTO events (event_name, date, time, location, description, image) VALUES ($name, $date, $time, $location, $description, $file)")
    or die ('insert error:'. mysql_report());
    
    if($data){
        ?>
        <script>alert("Your Event Submition successfully");
        window.open("http://locslhost/PROJECT/form.php", "_self");</script>

        <?php
    }
    else{
        ?>
        <script>alert("Please try again")</script>
        <?php
    }
}
?>
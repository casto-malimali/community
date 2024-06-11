<?php require "includes/botho.php";
$id = $_GET['id'];
$delete = "DELETE FROM events WHERE id='$id'";
$data = mysqli_query($conn, $delete);

if($data){
    ?>
    <script>
        alert("Delete Successfuly");
        window.open("view.php", "_self");
    </script>
    <?php
}
else{
    ?>
        <script>
        alert("Please try Again");
        
    </script>
    <?php
}
?>
<?php
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}
?>
<?php
$title = 'Community events';
require ('includes/header.php');
require ('includes/sidebar.php');
require ('includes/navbar.php');
require('includes/botho.php');

?>

<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">All Events</h1>
    
</div>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Events</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                 
<table class="table table-bordered"  width="100%" cellspacing="0">
<tr>
                            <th>#</th>
                            <th>Event Name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Location</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
            <?php
                        $query = "SELECT * FROM events";
                        $data = mysqli_query($conn, $query);
                        $result = mysqli_num_rows($data);
                        $i = 1;
                        if ($result) {
                            while ($row = mysqli_fetch_array($data)) {
                        ?>

<tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $row['eventname'] ?></td>
                                    <td><?php echo $row['date'] ?></td>
                                    <td><?php echo $row['time'] ?></td>
                                    <td><?php echo $row['location'] ?></td>
                                    <td><?php echo $row['description'] ?></td>
                                    <td>
    <?php if (!empty($row["file"])) { ?>
        <img src="<?php echo htmlspecialchars($row["file"]); ?>" alt="<?php echo htmlspecialchars($row["eventname"]); ?>" class="event-image" style="max-width: 50px; max-height: 50px;">
    <?php } else { ?>
        <p>No image available</p>
    <?php } ?>
</td>

<td>
                                        <div class="btn-group">
                                            <button  class="btn btn-info"><a style="color: black;" href="update.php?id=<?php echo $row['id'] ?>">EDIT</a></button> <br>
                                            <button class="btn btn-danger"><a style="color: black;" onclick="return confirm('Are you sure, you want to delete?')" href="delete.php?id=<?php echo $row['id'] ?>">DELETE</a></button>
                                        </div>
                                    </td>
                                    
                                </tr>
                                        <?php
        }
    }
    else{
       echo 'no data found';
    }
    ?>
                                </table>
                            </div>
                        </div>
                    </div>




</div>
</div>
<?php

require ('includes/footer.php');



?>
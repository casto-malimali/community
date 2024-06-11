<?php
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}
?>
<?php
$title = 'Community events';
require('header.php');
require('sidebar.php');
require('navbar.php');
require('botho.php');

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

                <table class="table table-bordered" width="100%" cellspacing="0">
                    <tr>
                        <th>#</th>
                        <th>Event Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Location</th>
                        <th>Description</th>
                        <th>Image</th>
                    </tr>
                    <?php
                    $query = "SELECT * FROM events";
                    $data = mysqli_query($conn, $query);
                    if ($data) {
                        $i = 1;
                        while ($row = mysqli_fetch_array($data)) {
                            ?>

                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row['eventname']; ?></td>
                                <td><?php echo $row['date']; ?></td>
                                <td><?php echo $row['time']; ?></td>
                                <td><?php echo $row['location']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td>
                                    <?php if (!empty($row["file"])) { ?>
                                        <img src="PROJECT/upload/<?php echo htmlspecialchars($row["file"]); ?>" alt="<?php echo htmlspecialchars($row["eventname"]); ?>" class="event-image" style="max-width: 50px; max-height: 50px;">
                                    <?php } else { ?>
                                        <p>No image available</p>
                                    <?php } ?>
                                </td>
                            </tr>

                            <?php
                        }
                    } else {
                        echo 'No data found';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
require('footer.php');
?>

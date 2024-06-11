<?php
$title = 'Weekly Events';
require('includes/header.php');
require('includes/sidebar.php');
require('includes/navbar.php');

// Include the database connection file
require('../botho.php');

// Function to fetch the seven most recently added events with their images
function getWeeklyEvents($conn) {
    $sql = "SELECT * FROM events ORDER BY id DESC LIMIT 7";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Get weekly events
$weeklyEvents = getWeeklyEvents($conn);

?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Weekly Events</h1>

    <!-- Display weekly events -->
    <div class="table-responsive">
        <table class="table table-bordered bg-light">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Event Name</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Location</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php $serial = 1; ?>
                <?php foreach ($weeklyEvents as $event) : ?>
                    <tr>
                        <td><?php echo $serial++; ?></td>
                        <td><?php echo $event['eventname']; ?></td>
                        <td><?php echo $event['description']; ?></td>
                        <td><?php echo $event['date']; ?></td>
                        <td><?php echo $event['location']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<?php
// Close connection
$conn->close();
require('includes/footer.php');
?>

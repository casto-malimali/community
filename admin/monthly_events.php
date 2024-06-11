<?php
$title = 'Monthly Events';
require('includes/header.php');
require('includes/sidebar.php');
require('includes/navbar.php');

// Include the database connection file
require('botho.php');

// Function to fetch the 30 most recently added events
function getMonthlyEvents($conn) {
    $sql = "SELECT * FROM events ORDER BY id DESC LIMIT 30";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Get monthly events
$monthlyEvents = getMonthlyEvents($conn);

?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Monthly Events</h1>

    <!-- Display monthly events -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
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
                <?php foreach ($monthlyEvents as $event) : ?>
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

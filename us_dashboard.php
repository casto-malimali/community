<?php
$title = 'Community Events';
require ('header.php');
require ('sidebar.php');
require ('navbar.php');

// Include the database connection file
require ('botho.php');

// Query to fetch recent events
$query = "SELECT * FROM events ORDER BY date DESC LIMIT 5"; // Adjust limit as needed

// Perform the query
$result = mysqli_query($conn, $query);

// Initialize an empty array to store recent events
$recentEvents = array();

// Check if query was successful
if ($result) {
    // Fetch all rows as an associative array
    while ($row = mysqli_fetch_assoc($result)) {
        $recentEvents[] = $row;
    }
} else {
    // Handle query failure
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>

<div id="mainContent" class="container-fluid" style="min-height: 70vh;">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Recent Events Section -->
        <div class="col mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Recent Events</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="recentEventsTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    
                                    <th>Event Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Location</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recentEvents as $event) : ?>
                                    <tr>
                                        
                                        <td><?php echo $event['eventname']; ?></td>
                                        <td><?php echo $event['date']; ?></td>
                                        <td><?php echo $event['time']; ?></td>
                                        <td><?php echo $event['location']; ?></td>
                                        <td><?php echo $event['description']; ?></td>
                                        <td>
                                            <?php if (!empty($event["file"])) { ?>
                                                <img src="<?php echo htmlspecialchars($event["file"]); ?>" alt="<?php echo htmlspecialchars($event["eventname"]); ?>" class="event-image" style="max-width: 50px; max-height: 50px;">
                                            <?php } else { ?>
                                                <p>No image available</p>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Another Card Here -->

    </div>

</div>

<?php
require ('footer.php');
?>

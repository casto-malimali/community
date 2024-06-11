<?php
$title = 'Community Events';
require('includes/header.php');
require('includes/sidebar.php');
require('includes/navbar.php');

// Include the database connection file
require('botho.php');

// Function to fetch count of weekly events from the database
function getWeeklyEventCount($conn) {
    $sql = "SELECT COUNT(*) AS count FROM events WHERE YEAR(date) = YEAR(CURRENT_DATE())";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['count'];
}

// Function to fetch count of monthly events from the database
function getMonthlyEventCount($conn) {
    $sql = "SELECT COUNT(*) AS count FROM events WHERE YEAR(date) = YEAR(CURRENT_DATE())";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['count'];
}

// Function to fetch count of users from the database
function getUserCount($conn) {
    $sql = "SELECT COUNT(*) AS count FROM users";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['count'];
}

?>

<div class="container-fluid" style="min-height: 70vh;">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Weekly Events Card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <a href="weekly_events.php" style="text-decoration: none;">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Weekly Events</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo getWeeklyEventCount($conn); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-700"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Monthly Events Card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <a href="monthly_events.php" style="text-decoration: none;">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Monthly Events</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo getMonthlyEventCount($conn); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-700"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- User Management Card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <a href="users.php" style="text-decoration: none;">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Users</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo getUserCount($conn); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-700"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>


        
        <!-- Add more cards for additional features -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->

<?php
// Close connection
$conn->close();

require('includes/footer.php');
?>

<?php
$title = 'Users';
require('includes/header.php');
require('includes/sidebar.php');
require('includes/navbar.php');

// Include the database connection file
require('botho.php');

// Function to fetch all users
function getAllUsers($conn) {
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Get all users
$users = getAllUsers($conn);

?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">USERS OF THIS SYSTEM</h1>

    <!-- Display users in a table -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>ACTION</th>
                    <!-- Add more columns for additional user details if needed -->
                </tr>
            </thead>
            <tbody>
                <?php $serial = 1; ?>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?php echo $serial++; ?></td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td>
                        <div class="btn-group">
                                            
                        <button class="btn btn-danger"><a style="color: black;" onclick="return confirm('Are you sure, you want to delete?')" href="user-delete.php?id=<?php echo $user['id'] ?>">DELETE</a></button>

                                        </div>
                        </td>
                        <!-- Add more columns for additional user details if needed -->
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

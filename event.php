<?php
include_once('botho.php'); // Ensure this file sets up the $conn variable correctly

// Check if the event ID is provided in the URL
if (isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $event_id = mysqli_real_escape_string($conn, $_GET['id']);

    // Query to select event details based on the provided event ID
    $query = "SELECT * FROM events WHERE id = $event_id";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        // Fetch event details
        $row = $result->fetch_assoc();

        // Display event details
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo htmlspecialchars($row["eventname"]); ?></title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: grey;
                    margin: 0;
                    padding: 0;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    min-height: 100vh;
                    
                }

                .container {
                    max-width: 800px;
                    width: 100%;
                    background-color: #ffffff; /* Added background color */
                    border-radius: 10px; /* Rounded corners for a modern look */
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Added shadow for depth */
                }

                .event-image {
                    width: 100%;
                    height: auto;
                    max-height: calc(100vh - 140px); /* Adjusted height to fit the screen */
                    object-fit: contain; /* Ensure image doesn't stretch */
                    border-radius: 10px 10px 0 0; /* Rounded top corners */
                }

                .event-details {
                    padding: 20px;
                    text-align: center;
                }

                .event-details h2 {
                    color: #007bff;
                    margin-top: 0; /* Remove default margin */
                }

                .event-details p {
                    line-height: 1.6;
                }
            </style>
        </head>

        <body>
            <div class="container">
                <img src="<?php echo htmlspecialchars($row["file"]); ?>" alt="<?php echo htmlspecialchars($row["eventname"]); ?>" class="event-image">
                <div class="event-details">
                    <h2><?php echo htmlspecialchars($row["eventname"]); ?></h2>
                    <p><strong>Date:</strong> <?php echo htmlspecialchars($row["date"]); ?></p>
                    <p><strong>Location:</strong> <?php echo htmlspecialchars($row["location"]); ?></p>
                    <p><?php echo htmlspecialchars($row["description"]); ?></p>
                </div>
            </div>
        </body>

        </html>
<?php
    } else {
        // Event not found
        echo "Event not found.";
    }
} else {
    // Event ID not provided
    echo "Event ID not provided.";
}
?>

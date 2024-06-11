<!DOCTYPE html>
<html lang="en">
<head>
    <title>event form</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section id="contact" class="contact input">
        <div class="container">
            <div class="row">
                <div class="wow fadeInUp col-md-5 col-sm-6" data-wow-delay="0.9s">
                    <div class="contact_detail">
                        <div class="section-title">
                            <h2>ADD YOUR EVENTS</h2>
                        </div>
                        
                        <form action="ubuntu.php" method="post" enctype="multipart/form-data">
                            <label for="eventName">Event Name:</label>
                            <input type="text" name="eventname" id="bb-name" class="form-control" placeholder="Event name" required>
                            <label for="eventDate">Date:</label>
                            <input type="date" name="date" id="bb-date" class="form-control" placeholder="Date" required>
                            <label for="eventTime">Time:</label>
                            <input class="form-control" type="time" name="time" value="08:30" />
                            <label for="eventLocation">Location:</label>
                            <input type="location" name="location" id="bb-location" class="form-control" placeholder="location" required>
                            <label for="eventDescription">Description:</label>
                            <textarea name="description" rows="3" class="form-control" id="bb-description" placeholder="description" required></textarea>							
                            <label for="image">Image</label>
                            <input type="file" name="file" id="bb-file" class="form-control" placeholder="image of the events" required>
                            <div class="col-md-6 col-sm-10">
                                <input name="submit" type="submit" class="form-control" id="submit" value="UPLOAD">
                            </div>
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Get today's date in YYYY-MM-DD format
        var today = new Date().toISOString().split('T')[0];
        // Set the min attribute of the date input field to today
        document.getElementById('bb-date').setAttribute('min', today);
    </script>
</body>
</html>

<?php 
include ('./config/header.php');
?>
<body data-spy="scroll" data-offset="50" data-target=".navbar-collapse">


<div class="preloader">

	<div class="sk-rotating-plane"></div>

</div>


<!-- =========================
     NAVIGATION LINKS     
============================== -->
<div class="navbar navbar-fixed-top custom-navbar" role="navigation">
	<div class="container">

		<!-- navbar header -->
		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			<a href="#" class="navbar-brand">Community Events</a>
		</div>

		<div class="collapse navbar-collapse">

			<ul class="nav navbar-nav navbar-right">
				<li><a href="#intro" class="smoothScroll">home</a></li>
				<li><a href="#overview" class="smoothScroll">Overview</a></li>
				<li><a href="#event" class="smoothScroll">events</a></li>
				<li><a href="us_login.php" class="smoothScroll">Sign In</a></li>
                <li><a href="admin/login1.php" class="smoothScroll">Admin</a></li>
			</ul>

		</div>

	</div>
</div>


<!-- =========================
    INTRO SECTION   
============================== -->
<section id="intro" 
class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="col-md-12 col-sm-12">
				<h1 class="wow fadeInUp" data-wow-delay="1.6s">COMMUNITY EVENTS MANAGEMENT SYSTEM</h1>
				
			</div>


		</div>
	</div>
</section>


<!-- =========================
    OVERVIEW SECTION   
============================== -->
<section id="overview" class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="wow fadeInUp col-md-6 col-sm-6" data-wow-delay="0.6s">
				<h3>Welcome to our Community Event.</h3>
				<p style="color:black">We are thrilled to invite you to join us for a day of celebration, connection,
				   and unity at the Community Event.This event is a testament to the vibrant spirit
				   and diversity of our community,bringing together residents, businesses,
				   and organizations to foster relationships and create lasting memories.</p>
				<p style="color:black">Through a lineup of engaging activities, live performances, and interactive workshops,
				    we aim to provide a platform for individuals of all ages to come together,
					share experiences, and build a stronger sense of community. Whether you're
					a long-time resident or a newcomer, there's something for everyone at this event.</p>
			</div>
					
			<div class="wow fadeInUp col-md-6 col-sm-6" data-wow-delay="0.9s">
				<img src="images/back.jpg" class="img-responsive" alt="Overview">
			</div>

		</div>
	</div>
</section>



<!-- =========================
    EVENTS SECTION   
============================== -->
<section id="event" class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="wow fadeInUp col-md-12 col-sm-12" data-wow-delay="0.6s">
				<div class="section-title">
					<h2>UPCOMING EVENTS</h2>
					<p>The following are some events which have already done in our community.
						Also welcome to see the upcoming event which we wish to do in our community:</p>
				</div>
			</div>

			<section class="w3l-recent-work-hobbies" > 
			<div class="recent-work">
    <div class="mahady">
        <?php
        include_once('./config/connection.php'); 

        // Query to select all events
		$query = "SELECT * FROM events WHERE status = 1 ORDER BY date";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
			// Output data of each row
			while ($row = $result->fetch_assoc()) {
				?>
				
				<div class="card">
    <div class="card-header " style="background-color: black;">
        <h2><a href="event.php?id=<?php echo $row["id"]; ?>"><?php echo htmlspecialchars($row["eventname"]); ?></a></h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>DATE:</strong> <?php echo htmlspecialchars($row["date"]); ?></p>
                <p><strong>TIME:</strong> <?php echo htmlspecialchars($row["time"]); ?></p>
                <p><strong>LOCATION:</strong> <?php echo htmlspecialchars($row["location"]); ?></p>
                <p><strong>DESCRIPTION:</strong> <?php echo htmlspecialchars($row["eventDescription"]); ?></p>
            </div>
            <div class="col-md-6">
                <?php if (!empty($row["image"])) { ?>
                    <img src="upload/<?php echo htmlspecialchars($row["image"]); ?>" alt="<?php echo htmlspecialchars($row["eventname"]); ?>" class="event-image">
                <?php } else { ?>
                    <p>No image available</p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

				<?php
			}
		} else {
			echo "0 results";
		}
		?>
    </div>
</div>

	</div>



<!-- =========================
    ADDITION SECTION   
============================== -->


	<div class="container">
		<div class="row">

			<div class="wow fadeInUp col-md-5 col-sm-6" data-wow-delay="0.9s">
				<div class="contact_detail">
					<div class="section-title">
						<h2><button style="margin-left:400px; border-radius: 10PX; border-color: #666;
						width: 80%; background:transparent; color: white; "><a href="us_login.php"class= "smoothcontroll btn custom-btn-italic mt-3">ADD YOUR EVENT</a></button></h2>
						
					</div>
					
				</div>
			</div>

		</div>
	</div>
</section>


<!-- =========================
    FOOTER SECTION   
============================== -->
<footer>
	<div class="container">
		<div class="row">

			<div class="col-md-12 col-sm-12">
				<p class="wow fadeInUp" data-wow-delay="0.6s">Copyright &copy; 2024 
                    
                    | Design: By Almahadi</a></p>

				<ul class="social-icon">
				<li><a href="#" class="fa fa-whatsapp wow fadeInUp" data-wow-delay="1s"></a></li>
					<li><a href="#" class="fa fa-facebook wow fadeInUp" data-wow-delay="1s"></a></li>
					<li><a href="#" class="fa fa-twitter wow fadeInUp" data-wow-delay="1.3s"></a></li>
					<li><a href="#" class="fa fa-google-plus wow fadeInUp" data-wow-delay="2s"></a></li>
					
				</ul>

			</div>
			
		</div>
	</div>
</footer>


<!-- Back top -->
<a href="#back-top" class="go-top"><i class="fa fa-angle-up"></i></a>


<!-- =========================
     SCRIPTS   
============================== -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.parallax.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>
<?php
	require("../util.php");
	configSession();
?>

<!DOCTYPE html>
<head>

<!-- Basic Page Needs
================================================== -->
<title>Listeo</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/colors/main.css" id="colors">
<link rel="shortcut icon" href="../images/favicon-32x32.ico" />

</head>

<body>

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
<header id="header-container" class="fixed fullwidth dashboard">
	<?php include("nav.php"); ?>
</header>
<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Dashboard -->
<div id="dashboard">

	<!-- Navigation
	================================================== -->

	<!-- Responsive Navigation Trigger -->
	<a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>

	<div class="dashboard-nav">
		<div class="dashboard-nav-inner">

			<ul data-submenu-title="Main">
				<li><a href="dashboard.php"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
				<li><a href="dashboard-messages.php"><i class="sl sl-icon-envelope-open"></i> Messages <span class="nav-tag messages">2</span></a></li>
			</ul>

			<ul data-submenu-title="Listings">
				<li><a><i class="sl sl-icon-layers"></i> My Listings</a>
					<ul>
						<li><a href="dashboard-my-listings.php">Active <span class="nav-tag green">6</span></a></li>
						<li><a href="dashboard-my-listings.php">Pending <span class="nav-tag yellow">1</span></a></li>
						<li><a href="dashboard-my-listings.php">Expired <span class="nav-tag red">2</span></a></li>
					</ul>
				</li>
				<li><a href="dashboard-reviews.php"><i class="sl sl-icon-star"></i> Reviews</a></li>
				<li><a href="dashboard-bookmarks.php"><i class="sl sl-icon-heart"></i> Bookmarks</a></li>
				<li><a href="dashboard-add-listing.php"><i class="sl sl-icon-plus"></i> Add Listing</a></li>
			</ul>

			<ul data-submenu-title="Account">
				<li class="active"><a href="dashboard-my-profile.php"><i class="sl sl-icon-user"></i> My Profile</a></li>
				<li><a href="../index.php"><i class="sl sl-icon-power"></i> Logout</a></li>
			</ul>

	</div>
	</div>
	<!-- Navigation / End -->


	<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>My Profile</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>My Profile</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">

			<!-- Profile -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4 class="gray">Profile Details</h4>
					<div class="dashboard-list-box-static">

						<!-- Avatar -->
						<div class="edit-profile-photo">
							<img src="../images/user-avatar.jpg" alt="">
							<div class="change-photo-btn">
								<div class="photoUpload">
								    <span><i class="fa fa-upload"></i> Upload Photo</span>
								    <input type="file" class="upload" />
								</div>
							</div>
						</div>

						<!-- Details -->
						<div class="my-profile">

							<label>Your Name</label>
							<input value="Tom Perrin" type="text">

							<label>Phone</label>
							<input value="(123) 123-456" type="text">

							<label>Email</label>
							<input value="tom@example.com" type="text">

							<label>Notes</label>
							<textarea name="notes" id="notes" cols="30" rows="10">Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper</textarea>

							<label><i class="fa fa-twitter"></i> Twitter</label>
							<input placeholder="https://www.twitter.com/" type="text">

							<label><i class="fa fa-facebook-square"></i> Facebook</label>
							<input placeholder="https://www.facebook.com/" type="text">

							<label><i class="fa fa-google-plus"></i> Google+</label>
							<input placeholder="https://www.google.com/" type="text">
						</div>

						<button class="button margin-top-15">Save Changes</button>

					</div>
				</div>
			</div>

			<!-- Change Password -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4 class="gray">Change Password</h4>
					<div class="dashboard-list-box-static">

						<!-- Change Password -->
						<div class="my-profile">
							<label class="margin-top-0">Current Password</label>
							<input type="password">

							<label>New Password</label>
							<input type="password">

							<label>Confirm New Password</label>
							<input type="password">

							<button class="button margin-top-15">Change Password</button>
						</div>

					</div>
				</div>
			</div>


			<!-- Copyrights -->
			<div class="col-md-12">
				<div class="copyrights">© 2017 ALFAR. All Rights Reserved.</div>
			</div>

		</div>

	</div>
	<!-- Content / End -->


</div>
<!-- Dashboard / End -->


</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
<script type="text/javascript" src="../scripts/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="../scripts/jpanelmenu.min.js"></script>
<script type="text/javascript" src="../scripts/chosen.min.js"></script>
<script type="text/javascript" src="../scripts/slick.min.js"></script>
<script type="text/javascript" src="../scripts/rangeslider.min.js"></script>
<script type="text/javascript" src="../scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="../scripts/waypoints.min.js"></script>
<script type="text/javascript" src="../scripts/counterup.min.js"></script>
<script type="text/javascript" src="../scripts/jquery-ui.min.js"></script>
<script type="text/javascript" src="../scripts/tooltips.min.js"></script>
<script type="text/javascript" src="../scripts/custom.js"></script>


</body>
</html>

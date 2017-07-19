<?php
	require("../util.php");
	configSession();
	$currentUser = $_SESSION['login_user'];
	$currentID = getSingleValue('accounts', 'username', $currentUser, 'userID');
	//$sql = "SELECT U.houseID, L.address, L.city, L.province FROM usr_likes U, house_loc L WHERE U.user_id = '$currentID'";
	$sql = "SELECT U.house_ID, L.address, L.city, L.province FROM usr_likes AS U JOIN house_loc AS L ON U.house_ID = L.houseID WHERE U.user_id = '$currentID'";
	$result = mysqli_query($db, $sql);
?>

<!DOCTYPE html>
<head>

<!-- Basic Page Needs
================================================== -->
<title>我的收藏 - ALFAR合租平台</title>
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

			<ul data-submenu-title="主要">
				<li><a href="dashboard.php"><i class="sl sl-icon-settings"></i> 用户中心</a></li>
				<li><a href="dashboard-messages.php"><i class="sl sl-icon-envelope-open"></i> 我的信息 <span class="nav-tag messages">2</span></a></li>
			</ul>

			<ul data-submenu-title="房屋">
				<li><a><i class="sl sl-icon-layers"></i> 我的房屋</a>
					<ul>
						<li><a href="dashboard-my-listings.php">Active <span class="nav-tag green">6</span></a></li>
						<li><a href="dashboard-my-listings.php">Pending <span class="nav-tag yellow">1</span></a></li>
						<li><a href="dashboard-my-listings.php">Expired <span class="nav-tag red">2</span></a></li>
					</ul>
				</li>
				<li class="active"><a href="dashboard-bookmarks.php"><i class="sl sl-icon-heart"></i> 我的收藏</a></li>
				<li><a href="dashboard-add-listing.php"><i class="sl sl-icon-plus"></i> 登记房屋</a></li>
			</ul>

			<ul data-submenu-title="账户">
				<li><a href="dashboard-my-profile.php"><i class="sl sl-icon-user"></i> 更改信息</a></li>
				<li><a href="../index.php"><i class="sl sl-icon-power"></i> 登出</a></li>
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
					<h2>我的收藏</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">首页</a></li>
							<li><a href="#">用户中心</a></li>
							<li>我的收藏</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">

			<!-- Listings -->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4>Bookmarked Listings</h4>
					<ul>

						<?php
							if($result){
								while($row = mysqli_fetch_array($result)) {
									$id = $row['house_ID'];
									$addr = $row['address'];
									$city = $row['city'];
									$prov = $row['province'];


									echo "<li>
										<div class='list-box-listing'>
											<div class='list-box-listing-img'><a href='../listings-single-page.php?id=$id'><img src='../images/listing-item-02.jpg' alt=''></a></div>
											<div class='list-box-listing-content'>
												<div class='inner'>
													<h3>$addr</h3>
													<span>$city, $prov</span>
													<br>
													<span>房屋编号 - $id</span>
												</div>
											</div>
										</div>
										<div class='buttons-to-right'>
											<a href='#' class='button gray'><i class='sl sl-icon-close'></i> Delete</a>
										</div>
									</li>";

								}
							}
						?>
					</ul>
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

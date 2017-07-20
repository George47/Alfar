<?php
	require("util.php");
	configSession();

	// get location from posted
	if(isset($_GET['loc'])){
		$location = $_GET['loc'];
		// get lat and lng from the input search loc
		$sql2 = "SELECT lat, lng FROM search_loc WHERE loc_option = '$location'";
		$result4=mysqli_query($db, $sql2);
		$loc_result=mysqli_fetch_assoc($result4);
		$loc_lat = $loc_result['lat'];
		$loc_lng = $loc_result['lng'];

		// use the searched lat and lng to return

		$sql = "SELECT G.houseID, L.address, L.city, L.province ,3956*2*ASIN(SQRT(POWER(SIN(('$loc_lat' - lat)*pi()/180/2),2)+COS('$loc_lat' * pi()/180)
						*COS(lat * pi()/180)*POWER(SIN(('$loc_lng' -lng)* pi()/180/2),2)))
						as distance
						FROM house_geo AS G JOIN house_loc AS L ON G.houseID = L.houseID
						having distance < 10
						ORDER BY distance
						LIMIT 30;";
		$result = mysqli_query($db, $sql);
	} else {
		$sql = "SELECT houseID, address, city, province FROM house_loc;";
		$result = mysqli_query($db, $sql);
	}
	//SELECT houseID,3956*2*ASIN(SQRT(POWER(SIN(('43.83379' - lat)*pi()/180/2),2)+COS('43.83379' * pi()/180) *COS(lat * pi()/180)*POWER(SIN(('-79.30405' -lng)* pi()/180/2),2))) as distance FROM house_geo having distance < 10 ORDER BY distance



	//$sql = "SELECT houseID, address, city, province FROM house-loc WHERE username='".$_SESSION['login_user']."'    ;"  ;
	//$sql = "SELECT houseID, address, city, province FROM house_loc;";
	//$result = mysqli_query($db, $sql);
	// UNION ALL TO GET user's

?>

<!DOCTYPE html>
<head>

<!-- Basic Page Needs
================================================== -->
<title>搜索结果 - ALFAR合租</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/colors/main.css" id="colors">
<link rel="shortcut icon" href="images/favicon-32x32.ico" />

</head>

<body>

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
<header id="header-container" class="fixed fullwidth">
	<!-- Header -->
	<?php include("header.php") ?>
</header>
<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Content
================================================== -->
<div class="fs-container">

	<div class="fs-inner-container content">
		<div class="fs-content">

			<!-- Search -->
			<section class="search">

				<div class="row">
					<div class="col-md-12">

							<!-- Row With Forms -->
							<div class="row with-forms">

								<!-- Main Search Input -->
								<div class="col-fs-6">
									<div class="input-with-icon">
										<i class="sl sl-icon-magnifier"></i>
										<input type="text" placeholder="输入搜索 .." value=""/>
									</div>
								</div>

								<!-- Main Search Input -->
								<div class="col-fs-6">
									<div class="input-with-icon location">

										<input type="text" placeholder="输入学校或城市 .." value=""/>
										<a href="#"><i class="fa fa-dot-circle-o"></i></a>
									</div>
								</div>


								<!-- Filters -->
								<div class="col-fs-12">

									<!-- Panel Dropdown / End -->
									<div class="panel-dropdown">
										<a href="#">房屋种类</a>
										<div class="panel-dropdown-content checkboxes categories">

											<!-- Checkboxes -->
											<div class="row">
												<div class="col-md-6">
													<input id="check-1" type="checkbox" name="check" checked class="all">
													<label for="check-1">所有</label>

													<input id="check-2" type="checkbox" name="check">
													<label for="check-2">独立屋</label>


												</div>

												<div class="col-md-6">
													<input id="check-3" type="checkbox" name="check" >
													<label for="check-3">Semi</label>

													<input id="check-4" type="checkbox" name="check">
													<label for="check-4">公寓</label>

													<!--<input id="check-5" type="checkbox" name="check">
													<label for="check-5">Fitness</label>

													<input id="check-6" type="checkbox" name="check">
													<label for="check-6">Events</label>-->
												</div>
											</div>

											<!-- Buttons -->
											<div class="panel-buttons">
												<button class="panel-cancel">取消</button>
												<button class="panel-apply">搜索</button>
											</div>

										</div>
									</div>
									<!-- Panel Dropdown / End -->

									<!-- Panel Dropdown -->
									<div class="panel-dropdown wide">
										<a href="#">更多分类</a>
										<div class="panel-dropdown-content checkboxes">

											<!-- Checkboxes -->
											<div class="row">
												<div class="col-md-6">
													<input id="check-a" type="checkbox" name="check">
													<label for="check-a">Elevator in building</label>

													<input id="check-b" type="checkbox" name="check">
													<label for="check-b">Friendly workspace</label>

													<input id="check-c" type="checkbox" name="check">
													<label for="check-c">Instant Book</label>

													<input id="check-d" type="checkbox" name="check">
													<label for="check-d">Wireless Internet</label>
												</div>

												<div class="col-md-6">
													<input id="check-e" type="checkbox" name="check" >
													<label for="check-e">Free parking on premises</label>

													<input id="check-f" type="checkbox" name="check" >
													<label for="check-f">Free parking on street</label>

													<input id="check-g" type="checkbox" name="check">
													<label for="check-g">Smoking allowed</label>

													<input id="check-h" type="checkbox" name="check">
													<label for="check-h">Events</label>
												</div>
											</div>

											<!-- Buttons -->
											<div class="panel-buttons">
												<button class="panel-cancel">取消</button>
												<button class="panel-apply">搜索</button>
											</div>

										</div>
									</div>
									<!-- Panel Dropdown / End -->

									<!-- Panel Dropdown -->
									<div class="panel-dropdown">
										<a href="#">搜索距离</a>
										<div class="panel-dropdown-content">
											<input class="distance-radius" type="range" min="1" max="100" step="1" value="50" data-title="希望搜索的距离">
											<div class="panel-buttons">
												<button class="panel-cancel">取消</button>
												<button class="panel-apply">搜索</button>
											</div>
										</div>
									</div>
									<!-- Panel Dropdown / End -->

								</div>
								<!-- Filters / End -->

							</div>
							<!-- Row With Forms / End -->

					</div>
				</div>

			</section>
			<!-- Search / End -->


		<section class="listings-container margin-top-30">
			<!-- Sorting / Layout Switcher -->
			<div class="row fs-switcher">

				<div class="col-md-6">
					<!-- Showing Results -->
					<p class="showing-results">14 个搜索结果 </p>
				</div>

			</div>


			<!-- Listings -->
			<div class="row fs-listings">

				<?php

					// outputs the houseID of the searches within 10km
					if($result){
						while($row = mysqli_fetch_array($result)) {
							$id = $row['houseID'];
							$addr = $row['address'];
							$city = $row['city'];
							$prov = $row['province'];

							echo "<div class='col-lg-12 col-md-12'>
								<div class='listing-item-container list-layout' data-marker-id='1'>
									<a href='listings-single-page.php?id=$id' class='listing-item'>

										<!-- Image -->
										<div class='listing-item-image'>
											<img src='images/listing-item-01.jpg' alt=''>
											<span class='tag'>Condo</span>
										</div>

										<!-- Content -->
										<div class='listing-item-content'>


											<div class='listing-item-inner'>
												<h3>$addr</h3>
												<span>$city, $prov</span>
												<br>
												<span'>房屋编号 - $id</span>
											</div>

											<span class='like-icon'></span>

											<div class='listing-item-details'>2 人正在找室友
												<i class='fa fa-angle-right'></i>
											</div>
										</div>
									</a>
								</div>
							</div>";
						}
					} else {
						echo "No data right now";
					}
				?>
				<!-- Listing Item / End -->

			</div>
			<!-- Listings Container / End -->


			<!-- Pagination Container -->
			<div class="row fs-listings">
				<div class="col-md-12">

					<!-- Pagination -->
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12">
							<!-- Pagination -->
							<div class="pagination-container margin-top-15 margin-bottom-40">
								<nav class="pagination">
									<ul>
										<li><a href="#" class="current-page">1</a></li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<!-- Pagination / End -->

					<!-- Copyrights -->
					<div class="copyrights margin-top-0">© 2017 ALFAR. All Rights Reserved.</div>

				</div>
			</div>
			<!-- Pagination Container / End -->
		</section>

		</div>
	</div>
	<div class="fs-inner-container map-fixed">

		<!-- Map -->
		<div id="map-container">
		    <div id="map" data-map-zoom="9" data-map-scroll="true">
		        <!-- map goes here -->
		    </div>
		</div>

	</div>
</div>


</div>
<!-- Wrapper / End -->

<!-- Scripts
================================================== -->
<script type="text/javascript" src="scripts/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="scripts/jpanelmenu.min.js"></script>
<script type="text/javascript" src="scripts/chosen.min.js"></script>
<script type="text/javascript" src="scripts/slick.min.js"></script>
<script type="text/javascript" src="scripts/rangeslider.min.js"></script>
<script type="text/javascript" src="scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="scripts/waypoints.min.js"></script>
<script type="text/javascript" src="scripts/counterup.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
<script type="text/javascript" src="scripts/tooltips.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>

<!-- Maps -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAnsr-uSrhCSfnLXOrADz9cv9ATXiLazKU"></script>
<script type="text/javascript" src="scripts/infobox.min.js"></script>
<script type="text/javascript" src="scripts/markerclusterer.js"></script>
<script type="text/javascript" src="scripts/maps.js"></script>


</body>
</html>

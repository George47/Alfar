<?php
	require("util.php");
	configSession();

	$sql = "SELECT houseID, address, city, province FROM house_loc LIMIT 10;";
	$result = mysqli_query($db, $sql);


	// distance for all results within 10km range, lan lon variable from search
	$sqll = "SELECT *,3956*2*ASIN(SQRT(POWER(SIN((19.286558 - lat)*pi()/180/2),2)+COS(19.286558 * pi()/180)
					*COS(lat * pi()/180)*POWER(SIN((-99.612494 -lng)* pi()/180/2),2)))
					as distance
					FROM table
					having distance < 10
					ORDER BY distance;";
?>

<!DOCTYPE html>
<head>

<!-- Basic Page Needs
================================================== -->
<title>ALFAR - 留学生合租平台</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/tweaks.css">
<link href="select2/css/select2.css" rel="stylesheet" />
<link rel="stylesheet" href="css/colors/main.css" id="colors">
<link rel="shortcut icon" href="images/favicon-32x32.ico" />

</head>

<body>

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
<header id="header-container">
	<?php include("header.php") ?>
</header>
<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Banner
================================================== -->
<div class="main-search-container" data-background-image="images/background.jpg">
	<div class="main-search-inner">

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div id="index_page_entry">
					<h2>留学生合租平台</h2>
					<h4>寻找与你课程兴趣相同的室友</h4>

					<div class="main-search-input">

						<!--<div class="main-search-input-item">
							<input type="text" placeholder="输入城市或学校.." value=""/>
						</div>-->

						<div class="main-search-input-item">
							<form method="get" action="listings-half-screen-map-list.php" id="searchForm">
								<select name="loc" id="loc" class="loc" data-width="100%">
									<option disabled selected value></option>
								  <option value="toronto">Toronto</option>
								  <option value="markham">Markham</option>
									<option value="utsg">University of Toronto St. George</option>
									<option value="utsc">University of Toronto Scarborough</option>
									<option value="bank">218 Timberbank</option>
									<option value="kenn">7373 Kennedy</option>
								</select>
							</form>
						</div>




						<!-- GET LOCATION FROM BROWSER
						<div class="main-search-input-item location">
							<input type="text" placeholder="Location" value=""/>
							<a href="#"><i class="fa fa-dot-circle-o"></i></a>
						</div>-->
						<button class="button" onclick="submitSearch()">搜索</button>

						<!--<button class="button" onclick="window.location.href='listings-half-screen-map-list.php'">搜索</button>-->

					</div>
				</div>
			</div>
			</div>
		</div>

	</div>
</div>


<!-- Fullwidth Section -->
<section class="fullwidth margin-top-65">
	<div class="container">
		<div class="row">


			<div class="col-md-12">
				<h3 class="headline centered margin-bottom-45">
					最新房源
					<!--<span>Discover top-rated local businesses</span>-->
				</h3>
			</div>

			<div class="col-md-12">
				<div class="simple-slick-carousel dots-nav">

				<?php
					if($result){
						while($row = mysqli_fetch_array($result)) {
							$id = $row['houseID'];
							$addr = $row['address'];
							$city = $row['city'];
							$prov = $row['province'];

							$result4=mysqli_query($db, "SELECT count(*) as total from usr_likes WHERE house_ID = '$id';");
							$user_likes=mysqli_fetch_assoc($result4);
							$total_likes = $user_likes['total'];


					echo "<div class='carousel-item'>
						<a href='listings-single-page.php?id=$id' class='listing-item-container'>
							<div class='listing-item'>
								<img src='images/listing-item-01.jpg' alt=''>

								<div class='listing-item-details'>
									<ul>
										<li>$total_likes 人喜欢</li>
									</ul>
								</div>


								<div class='listing-item-content'>
									<span class='tag'>Condo</span>
									<h3>$addr</h3>
									<span>$city, $prov</span>
								</div>
								<span class='like-icon'></span>
							</div>
						</a>
					</div>";
				}
			} else {
				echo "No data right now";
			}
				?>

				<!-- Listing Item / End -->
				</div>

			</div>

		</div>
	</div>
</section>

<!-- Fullwidth Section / End -->


<!-- Info Section -->
<section class="fullwidth margin-top-65 padding-bottom-70" data-background-color="#f8f8f8">
<div class="container">

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2 class="headline centered margin-top-80">
				ALFAR提供的服务
				<!-- <span class="margin-top-25">Explore some of the best tips from around the world from our partners and friends.  Discover some of the most popular listings in Sydney.</span> -->
			</h2>
		</div>
	</div>

	<div class="row icons-container">

		<!-- Stage -->
		<div class="col-md-4">
			<div class="icon-box-2 with-line">
				<i class="im im-icon-Map2"></i>
				<h3>寻找房源</h3>
				<p>最新最完整的房源</p>
			</div>
		</div>

		<!-- Stage -->
		<div class="col-md-4">
			<div class="icon-box-2 with-line">
				<!--<i class="im im-icon-Friendster"></i>-->
				<i class="im im-icon-Happy"></i>
				<h3>配对室友</h3>
				<p>在房源中寻找相似的室友</p>
			</div>
		</div>

		<!-- Stage -->
		<div class="col-md-4">
			<div class="icon-box-2">
				<i class="im im-icon-Checked-User"></i>
				<h3>拿下房子</h3>
				<p>与你新的室友谈下房子</p>
			</div>
		</div>
	</div>

</div>
</section>
<!-- Info Section / End -->


<!-- Footer
================================================== -->
<div id="footer" class="sticky-footer">
	<?php include("footer.php"); ?>
</div>
<!-- Footer / End -->


<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>


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
<script src="select2/js/select2.min.js"></script>

<!-- script.js for cms -->
<script type="text/javascript" src="scripts/scripts.js"></script>

<script type="text/javascript">
	function submitSearch() {
		document.getElementById("searchForm").submit();
	}
</script>



<!-- Style Switcher
================================================== -->
<!-- NOT USED FOR NOW

<script src="scripts/switcher.js"></script>

<div id="style-switcher">
	<h2>Color Switcher <a href="#"><i class="sl sl-icon-settings"></i></a></h2>

	<div>
		<ul class="colors" id="color1">
			<li><a href="#" class="main" title="Main"></a></li>
			<li><a href="#" class="blue" title="Blue"></a></li>
			<li><a href="#" class="green" title="Green"></a></li>
			<li><a href="#" class="orange" title="Orange"></a></li>
			<li><a href="#" class="navy" title="Navy"></a></li>
			<li><a href="#" class="yellow" title="Yellow"></a></li>
			<li><a href="#" class="peach" title="Peach"></a></li>
			<li><a href="#" class="beige" title="Beige"></a></li>
			<li><a href="#" class="purple" title="Purple"></a></li>
			<li><a href="#" class="celadon" title="Celadon"></a></li>
			<li><a href="#" class="red" title="Red"></a></li>
			<li><a href="#" class="brown" title="Brown"></a></li>
			<li><a href="#" class="cherry" title="Cherry"></a></li>
			<li><a href="#" class="cyan" title="Cyan"></a></li>
			<li><a href="#" class="gray" title="Gray"></a></li>
			<li><a href="#" class="olive" title="Olive"></a></li>
		</ul>
	</div>

</div>-->
<!-- Style Switcher / End -->


</body>
</html>

<?php
	require("../util.php");
	configSession();

	if (isset($_SESSION['login_user'])) {
		$currentUser = $_SESSION['login_user'];
		$sql = "SELECT userID FROM accounts WHERE username = '".$currentUser."'";
		$result = mysqli_query($db, $sql);
		$usr_fetch=mysqli_fetch_assoc($result);
		$usr_name = $usr_fetch['userID'];
	}
?>

<!DOCTYPE html>
<head>

<!-- Basic Page Needs
================================================== -->
<title>更改信息 - ALFAR租房平台</title>
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
				<li><a href="dashboard.php"><i class="sl sl-icon-settings"></i> 用户中心</a></li>
				<li><a href="dashboard-messages.php"><i class="sl sl-icon-envelope-open"></i> 我的信息 <span class="nav-tag messages">2</span></a></li>
			</ul>

			<ul data-submenu-title="Listings">
				<li><a><i class="sl sl-icon-layers"></i> 我的房屋</a>
					<ul>
						<li><a href="dashboard-my-listings.php">Active <span class="nav-tag green">6</span></a></li>
						<li><a href="dashboard-my-listings.php">Pending <span class="nav-tag yellow">1</span></a></li>
						<li><a href="dashboard-my-listings.php">Expired <span class="nav-tag red">2</span></a></li>
					</ul>
				</li>
				<li><a href="dashboard-bookmarks.php"><i class="sl sl-icon-heart"></i> 我的收藏</a></li>
				<li><a href="dashboard-add-listing.php"><i class="sl sl-icon-plus"></i> 登记房屋</a></li>
			</ul>

			<ul data-submenu-title="Account">
				<li class="active"><a href="dashboard-my-profile.php"><i class="sl sl-icon-user"></i> 更改信息</a></li>
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
					<h2>更改信息</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">首页</a></li>
							<li><a href="#">用户中心</a></li>
							<li>更改信息</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">

			<!-- Profile -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4 class="gray">我的信息</h4>
					<div class="dashboard-list-box-static">

						<!-- Avatar -->
						<div class="edit-profile-photo">
							<img src="../images/user-avatar2.jpg" alt="">
							<div class="change-photo-btn">
								<div class="photoUpload">
								    <span><i class="fa fa-upload"></i> 上传图片</span>
								    <input type="file" class="upload" />
								</div>
							</div>
						</div>

						<!-- Details -->
						<!-- <form action="../server/usr_profile_info.php" method="post">-->
						<form id="usr_details">
							<div class="my-profile">

								<label><i class="sl sl-icon-user"></i> 姓名</label>
								<input value="<?php echo (isset($usr_name)? $usr_name : "") ?>" name="name" id="name" type="text">

								<label><i class="sl sl-icon-phone"></i> 电话</label>
								<input value="(123) 123-456" type="text">

								<label><i class="fa fa-envelope-o"></i> Email</label>
								<input value="tom@example.com" type="text">

								<label><i class="sl sl-icon-doc"></i>简介</label>
								<textarea name="notes" id="notes" cols="30" rows="10">这是一个个人介绍</textarea>
							</div>
							<!-- <button class="button margin-top-15" type="submit">保存</button> -->
						</form>
						<button class="button margin-top-15" id="save-info">保存更新</button>
					</div>
				</div>
			</div>

			<!-- Right column -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box margin-top-0 margin-bottom-30">
					<h4 class="gray">个人爱好</h4>
					<div class="dashboard-list-box-static">

						<!-- Change Password -->
						<div class="my-profile">
							<label class="margin-top-0"><i class="fa fa-graduation-cap"></i> 学校</label>
							<input value="University Of Toronto" type="text">

							<label><i class="fa fa-gamepad"></i> 兴趣</label>
							<input value="Fishing" type="text">

							<label><i class="fa fa-hotel"></i> 希望的地点</label>
							<input value="Toronto" type="text">

							<div class="col-md-6 padding-left-0">
								<label><i class="fa fa-money"></i> 预算</label>
								<input value="$0-$3000" type="text">
							</div>

							<div class="col-md-6 padding-right-0">
								<label><i class="fa fa-calendar-check-o"></i> 入住时间</label>
								<input type="text" id="desired-date" data-lang="en" data-large-mode="true" data-min-year="2017" data-max-year="2020">
							</div>

							<button class="button margin-top-15">保存更新(分开)</button>
						</div>

					</div>
				</div>



				<div class="dashboard-list-box margin-top-0">
					<h4 class="gray">更改密码</h4>
					<div class="dashboard-list-box-static">

						<!-- Change Password -->
						<div class="my-profile">
							<label class="margin-top-0">旧密码</label>
							<input type="password">

							<label>新密码</label>
							<input type="password">

							<label>确认新密码</label>
							<input type="password">

							<button class="button margin-top-15">更改密码</button>
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
<script type="text/javascript" src="../scripts/scripts.js"></script>
<script>
	$("#save-info").click(function(){saveInfo()});
</script>
<!-- Date Picker - docs: http://www.vasterad.com/docs/listeo/#!/date_picker -->
<link href="../css/plugins/datedropper.css" rel="stylesheet" type="text/css">
<script src="../scripts/datedropper.js"></script>
<script>$('#desired-date').dateDropper();</script>

</body>
</html>

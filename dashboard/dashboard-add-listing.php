<?php
	require("../util.php");
	configSession();
?>

<!DOCTYPE html>
<head>

<!-- Basic Page Needs
================================================== -->
<title>登记房屋 - ALFAR合租平台</title>
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

	<?php //include("left-nav.php"); ?>

	<!-- Change -->
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
	      <li><a href="dashboard-bookmarks.php"><i class="sl sl-icon-heart"></i> 我的收藏</a></li>
	      <li class="active"><a href="dashboard-add-listing.php"><i class="sl sl-icon-plus"></i> 登记房屋</a></li>
	    </ul>

	    <ul data-submenu-title="账户">
	      <li><a href="dashboard-my-profile.php"><i class="sl sl-icon-user"></i> 更改信息</a></li>
	      <li><a href="../logout.php"><i class="sl sl-icon-power"></i> 登出</a></li>
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
					<h2>登记房屋</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">首页</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>登记房屋</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">

				<div id="add-listing">


					<!-- Section -->
					<div class="add-listing-section">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-location"></i> 房屋地点</h3>
						</div>

						<div class="submit-section">
							<form id="house-loc">

								<!-- Row -->
								<div class="row with-forms">

									<!-- City -->
									<div class="col-md-6">
										<h5>地区</h5>
										<select name="loc-city" class="chosen-select-no-single" >
											<option label="blank">选择地区</option>
											<option>Toronto</option>
											<option>Markham</option>
											<option>North York</option>
											<option>Scarborough</option>
											<option>Richmond Hill</option>
										</select>
									</div>

									<!-- Address -->
									<div class="col-md-6">
										<h5>地址</h5>
										<input type="text" name="loc-address" placeholder="如 964 School St.">
									</div>
								</div>

								<div class="row with-forms">

									<!-- Province -->
									<div class="col-md-6">
										<h5>省份</h5>
										<select name="loc-province" class="chosen-select-no-single" >
											<option label="blank">选择省份</option>
											<option>Ontario</option>
											<option>British Columbia</option>
										</select>
									</div>

									<!-- Postal-Code -->
									<div class="col-md-6">
										<h5>邮编</h5>
										<input type="text" name="loc-poscode" placeholder="如M1C 2A3">
									</div>

								</div>
								<!-- Row / End -->
							</form>
						</div>
					</div>
					<!-- Section / End -->



					<!-- Section -->
					<div class="add-listing-section margin-top-45">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-docs"></i> 房屋信息</h3>
						</div>



						<!-- Description -->
						<div class="form">
							<form id="house-des">
								<h5>房屋介绍<span> (填写越多越容易找到房客)</span></h5>
								<textarea class="WYSIWYG" name="des-summary" cols="40" rows="3" id="summary" spellcheck="true" placeholder="请介绍您的房屋 .."></textarea>
							</form>
						</div>

						<!-- Row -->
						<div class="row with-forms">
							<form id= "house-info">
								<!-- Phone -->
								<div class="col-md-4">
									<h5>电话<span style="color:red"> *</span></h5>
									<input type="text" name="info-tel">
								</div>

								<!-- Website -->
								<div class="col-md-4">
									<h5>微信 <span>(可填写)</span></h5>
									<input type="text" name="info-wechat">
								</div>

								<!-- Email Address -->
								<div class="col-md-4">
									<h5>E-mail <span>(可填写)</span></h5>
									<input type="text" name="info-email">
								</div>
							</form>
						</div>
						<!-- Row / End -->


						<!-- Checkboxes -->
						<h5 class="margin-top-30 margin-bottom-10">房屋设施 <span>(可选择)</span></h5>
						<p>选择到的会被展示</p>
						<div class="checkboxes in-row margin-bottom-20">

							<input id="check-a" type="checkbox" name="check">
							<label for="check-a"><i class="im im-icon-Knife"></i> 厨房</label>

							<input id="check-b" type="checkbox" name="check">
							<label for="check-b"><i class="im im-icon-Wifi"></i> 网络</label>

							<!-- ADD -->

							<input id="check-g" type="checkbox" name="check">
							<label for="check-g"><i class="im im-icon-Dog"></i> 不允许宠物</label>

							<input id="check-h" type="checkbox" name="check">
							<label for="check-h"><i class="im im-icon-No-Smoking"></i> 不允许吸烟</label>

						</div>
						<!-- Checkboxes / End -->

					</div>
					<!-- Section / End -->

					<!-- Section -->
					<div class="add-listing-section margin-top-45">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-book-open"></i> 房间价位</h3>
							<!-- Switcher -->
							<label class="switch"><input type="checkbox" checked><span class="slider round"></span></label>
						</div>

						<!-- Switcher ON-OFF Content -->
						<div class="switcher-content">

							<div class="row">
								<div class="col-md-12">
									<table id="pricing-list-container">
										<tr class="pricing-list-item pattern">
											<td>
												<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
												<div class="fm-input pricing-name"><input type="text" placeholder="房间类型" /></div>
												<div class="fm-input pricing-ingredients"><input type="text" placeholder="房间简介" /></div>
												<div class="fm-input pricing-price"><input type="text" placeholder="价格" data-unit="CAD" /></div>
												<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
											</td>
										</tr>
									</table>
									<a href="#" class="button add-pricing-list-item">添加房间</a>
								</div>
							</div>

						</div>
						<!-- Switcher ON-OFF Content / End -->

					</div>
					<!-- Section / End -->

					<!-- Section -->
					<div class="add-listing-section margin-top-45">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-picture"></i> 房屋图片</h3>
						</div>

						<!-- Dropzone -->
						<div class="submit-section">
							<form action="../server/file-upload.php" class="dropzone"> </form>
						</div>

					</div>
					<!-- Section / End -->

					<a class="button preview" id="submit-listing">发布房源 <i class="fa fa-arrow-circle-right"></i></a>

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

<!-- DropZone | Documentation: http://dropzonejs.com -->
<script type="text/javascript" src="../scripts/dropzone.js"></script>


</body>
</html>

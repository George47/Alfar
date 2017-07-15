<?php
	include("../util.php");
	configSession();

  $currentUser = $_SESSION['login_user'];
  // Obtains current userID
  $currentID = getSingleValue('accounts', 'username', $currentUser, 'userID');
	//$sql = "SELECT c_id FROM conversation WHERE user_one='$currentID' OR user_two='$currentID'";
 	$sql = "SELECT C.user_one, C.user_two, R.reply, R.replyTime FROM conversation C, conversation_reply R WHERE (C.user_one='$currentID' OR C.user_two='$currentID') AND C.c_id = R.c_id_fk ORDER BY R.replyTime DESC LIMIT 1";
	$sql3 = "SELECT R.reply FROM conversation C, conversation_reply R WHERE (C.user_one='$currentID' OR C.user_two='$currentID') AND C.c_id = R.c_id_fk ORDER BY R.replyTime ASC";
	$result = mysqli_query($db, $sql);
	$result3 = mysqli_query($db, $sql3);

?>

<!DOCTYPE html>
<head>

<!-- Basic Page Needs
================================================== -->
<title>我的信息 - ALFAR合租平台</title>
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
				<li class="active"><a href="dashboard-messages.php"><i class="sl sl-icon-envelope-open"></i> 我的信息 <span class="nav-tag messages">2</span></a></li>
			</ul>

			<ul data-submenu-title="Listings">
				<li><a><i class="sl sl-icon-layers"></i> 我的房屋</a>
					<ul>
						<li><a href="dashboard-my-listings.php">Active <span class="nav-tag green">6</span></a></li>
						<li><a href="dashboard-my-listings.php">Pending <span class="nav-tag yellow">1</span></a></li>
						<li><a href="dashboard-my-listings.php">Expired <span class="nav-tag red">2</span></a></li>
					</ul>
				</li>
				<li><a href="dashboard-reviews.php"><i class="sl sl-icon-star"></i> 房屋评价</a></li>
				<li><a href="dashboard-bookmarks.php"><i class="sl sl-icon-heart"></i> 我的收藏</a></li>
				<li><a href="dashboard-add-listing.php"><i class="sl sl-icon-plus"></i> 登记房屋</a></li>
			</ul>

			<ul data-submenu-title="Account">
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
					<h2>Messages</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>Messages</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">

			<!-- Listings -->
			<div class="col-lg-12 col-md-12">

				<div class="messages-container margin-top-0">
					<div class="messages-headline">
						<h4>Kathy Brown</h4>
						<a href="#" class="message-action"><i class="sl sl-icon-trash"></i> Delete Conversation</a>
					</div>

					<div class="messages-container-inner">

						<!-- Messages -->
						<div class="messages-inbox">
							<ul>

								<?php
									if($result){
										while($row = mysqli_fetch_array($result)) {
											//$member = $row['user_one'];

											$id = $row['user_two'];
											$msg = $row['reply'];
											$date = $row['replyTime'];

											$sql2 = "SELECT username FROM accounts WHERE userid = '$id'";
											$result2 = mysqli_query($db, $sql2);
											$varray=mysqli_fetch_array($result2,MYSQLI_ASSOC);
											$username = $varray['username'];

											echo "<li class='active-message'>
												<a href='dashboard-messages-conversation.php'>
													<div class='message-avatar'><img src='http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70' alt='' /></div>

													<div class='message-by'>
														<div class='message-by-headline'>
															<h5>$username</h5>
															<span>$date</span>
														</div>
														<p>$msg</p>
													</div>
												</a>
											</li>";

										}
									}
								?>


								<li class="active-message">
									<a href="dashboard-messages-conversation.php">
										<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>

										<div class="message-by">
											<div class="message-by-headline">
												<h5>Kathy Brown</h5>
												<span>2 hours ago</span>
											</div>
											<p>Hello, I want to talk about your great listing! Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor lacinia neque imperdiet vitae...</p>
										</div>
									</a>
								</li>

								<li>
									<a href="dashboard-messages-conversation.php">
										<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>

										<div class="message-by">
											<div class="message-by-headline">
												<h5>John Doe <i>Unread</i></h5>
												<span>4 hours ago</span>
											</div>
											<p>Hello, I want to talk about your great listing! Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor lacinia neque imperdiet vitae...</p>
										</div>
									</a>
								</li>

							</ul>
						</div>
						<!-- Messages / End -->

						<!-- Message Content -->
						<div class="message-content">
							<div class="message-bubble">
								<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
								<div class="message-text"><p>Hello, I want to talk about your great listing! Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor lacinia neque imperdiet vitae.</p></div>
							</div>

							<div class="message-bubble me">
								<div class="message-avatar"><img src="../images/dashboard-avatar.jpg" alt="" /></div>
								<div class="message-text"><p>Nam ut hendrerit orci, ac gravida orci. Cras tristique rutrum libero at consequat. Vestibulum vehicula neque maximus sapien iaculis, nec vehicula sapien fringilla.</p></div>
							</div>

							<div class="message-bubble me">
								<div class="message-avatar"><img src="../images/dashboard-avatar.jpg" alt="" /></div>
								<div class="message-text"><p>Accumsan et porta ac, volutpat id ligula. Donec neque neque, blandit eu pharetra in, tristique id enim.</p></div>
							</div>

							<div class="message-bubble">
								<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
								<div class="message-text"><p>Vivamus lobortis vel nibh nec maximus. Donec dolor erat, rutrum ut feugiat sed, ornare vitae nunc. Donec massa nisl, bibendum id ultrices sed, accumsan sed dolor.</p></div>
							</div>

							<?php
								if($result3){
									while($row3 = mysqli_fetch_array($result3)) {

										$message = $row3['reply'];

										echo "<div class='message-bubble me'>
											<div class='message-avatar'><img src='../images/dashboard-avatar.jpg' alt='' /></div>
											<div class='message-text'><p>$message</p></div>
										</div>";
									}
								}
							?>

							<!-- Reply Area -->
							<div class="clearfix"></div>
							<div class="message-reply">
								<textarea cols="40" rows="3" placeholder="Your Message"></textarea>
								<button class="button">Send Message</button>
							</div>

						</div>
						<!-- Message Content -->

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


<!-- Header -->
<div id="header" class="not-sticky">
	<div class="container">

		<!-- Left Side Content -->
		<div class="left-side">

			<!-- Logo -->
			<div id="logo">
				<a href="../index.php"><img src="../images/logo.png" alt=""></a>
				<a href="../index.php" class="dashboard-logo"><img src="../images/logo2.png" alt=""></a>
			</div>

			<!-- Mobile Navigation -->
			<div class="menu-responsive">
				<i class="fa fa-reorder menu-trigger"></i>
			</div>

			<!-- Main Navigation -->
			<nav id="navigation" class="style-1">
				<ul id="responsive">

          <li><a href="#">DOCUMENTATIONS</a>
						<ul>
							<li><a href="../pages/pages-blog.html">Blog</a>
								<ul>
									<li><a href="../pages/pages-blog.html">Blog</a></li>
									<li><a href="../pages/pages-blog-post.html">Blog Post</a></li>
								</ul>
							</li>
							<li><a href="../pages/pages-contact.html">Contact</a></li>
							<li><a href="../pages/pages-elements.html">Elements</a></li>
							<li><a href="../pages/pages-typography.html">Typography</a></li>
							<li><a href="../pages/pages-404.html">404 Page</a></li>
							<li><a href="../pages/pages-icons.html">Icons</a></li>
						</ul>
					</li>

				</ul>
			</nav>
			<div class="clearfix"></div>
			<!-- Main Navigation / End -->

		</div>
		<!-- Left Side Content / End -->

		<!-- Right Side Content / End -->
		<div class="right-side">
			<!-- Header Widget -->
			<div class="header-widget">

        <?php
				  if (isset($_SESSION['login_user'])) {
				    $username = $_SESSION['login_user'];
						// Considering adding "Welcome, user"
				    echo "<div class='user-menu'>
						<div class='user-name'>$username</div>
				    <ul>
				      <li><a href='dashboard.html'><i class='sl sl-icon-settings'></i> Dashboard</a></li>
				      <li><a href='dashboard-messages.html'><i class='sl sl-icon-envelope-open'></i> Messages</a></li>
				      <li><a href='dashboard-my-profile.html'><i class='sl sl-icon-user'></i> My Profile</a></li>
				      <li><a href='../logout.php'></i> Logout</a></li>
				    </ul>
						</div>";
				  } else {
				    echo "没有登录";
				  }
				?>

				<a href="dashboard-add-listing.php" class="button border with-icon">登记房屋 <i class="sl sl-icon-plus"></i></a>
			</div>
			<!-- Header Widget / End -->
		</div>
		<!-- Right Side Content / End -->

	</div>
</div>
<!-- Header / End -->

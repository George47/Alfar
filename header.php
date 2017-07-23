<!-- Header -->
<div id="header">
	<div class="container">

		<!-- Left Side Content -->
		<div class="left-side">

			<!-- Logo -->
			<div id="logo">
				<a href="index.php"><img src="images/logo.png" alt=""></a>
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
							<li><a href="pages/pages-blog.html">Blog</a>
								<ul>
									<li><a href="pages/pages-blog.html">Blog</a></li>
									<li><a href="pages/pages-blog-post.html">Blog Post</a></li>
								</ul>
							</li>
							<li><a href="pages/pages-contact.html">Contact</a></li>
							<li><a href="pages/pages-elements.html">Elements</a></li>
							<li><a href="pages/pages-typography.html">Typography</a></li>
							<li><a href="pages/pages-404.html">404 Page</a></li>
							<li><a href="pages/pages-icons.html">Icons</a></li>
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
			<div class="header-widget">

				<?php
				  if (isset($_SESSION['login_user'])) {
				    $username = $_SESSION['login_user'];
						// Considering adding "Welcome, user"
				    echo "<div class='user-menu'>
						<div class='user-name'>$username</div>
				    <ul>
				      <li><a href='dashboard/dashboard.php'><i class='sl sl-icon-settings'></i> 用户中心</a></li>
				      <li><a href='dashboard/dashboard-messages.php'><i class='sl sl-icon-envelope-open'></i> 我的信息</a></li>
				      <li><a href='dashboard/dashboard-my-profile.php'><i class='sl sl-icon-user'></i> 个人页面</a></li>
				      <li><a href='logout.php'></i> 登出</a></li>
				    </ul>
						</div>";
				  } else {
				    echo "<a href='#sign-in-dialog' class='sign-in popup-with-zoom-anim'>
				      <i class='sl sl-icon-login'></i>登录账号</a>";
				  }

				if(!isset($_SESSION['login_user'])){
					echo "<a href='#sign-in-dialog' class='button border with-icon popup-with-zoom-anim'>登记房屋 <i class='sl sl-icon-plus'></i></a>";
				} else {
					echo "<a href='dashboard/dashboard-add-listing.php' class='button border with-icon'>登记房屋 <i class='sl sl-icon-plus'></i></a>
";
				}



				?>
			</div>
		</div>
		<!-- Right Side Content / End -->

		<!-- Sign In Popup -->
		<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">

			<div class="small-dialog-header">
				<h3>登录账号</h3>
			</div>

			<!--Tabs -->
			<div class="sign-in-form style-1">

				<ul class="tabs-nav">
					<li class=""><a href="#tab1">登录</a></li>
					<li><a href="#tab2">注册</a></li>
				</ul>

				<div class="tabs-container alt">

					<!-- Login -->
					<div class="tab-content" id="tab1" style="display: none;">

						<!-- Login retrieve from database -->
						<!-- <form action="server/login_form.php" method="post" class="login"> -->
						<form id="usr-login">

							<!-- Display error message -->
							<div class="notification error closeable" id="noti-error">
								<p>请输入正确的账号和密码</p>
								<a class="close" href="#"></a>
							</div>

							<p class="form-row form-row-wide">
								<label for="username">用户名:
									<i class="im im-icon-Male"></i>
									<input type="text" class="input-text" name="username" id="username" value="" />
								</label>
							</p>

							<p class="form-row form-row-wide">
								<label for="password">密码:
									<i class="im im-icon-Lock-2"></i>
									<input class="input-text" type="password" name="password" id="password"/>
								</label>
								<span class="lost_password">
									<a href="#" >忘记密码?</a>
								</span>
							</p>

							<div class="form-row">
								<!-- <input type="submit" class="button border margin-top-5" name="login" id="loginSubmit" value="登录" /> -->
								<input type="submit" class="button border margin-top-5" name="login" id="loginSubmit" value="登录" />

								<div class="checkboxes margin-top-10">
									<input id="remember-me" type="checkbox" name="check">
									<label for="remember-me">记住我</label>
								</div>
							</div>

						</form>
					</div>

					<!-- Register -->
					<div class="tab-content" id="tab2" style="display: none;">

						<!-- <form action="server/register_form.php" method="post" class="register"> -->
						<form id="user-register" >

						<p class="form-row form-row-wide">
							<label for="username2">用户名:
								<i class="im im-icon-Male"></i>
								<input type="text" class="input-text" name="username" id="username2" value="" />
							</label>
						</p>

						<p class="form-row form-row-wide">
							<label for="email2">邮箱:
								<i class="im im-icon-Mail"></i>
								<input type="text" class="input-text" name="email" id="email2" value="" />
							</label>
						</p>

						<p class="form-row form-row-wide">
							<label for="password1">密码:
								<i class="im im-icon-Lock-2"></i>
								<input class="input-text" type="password" name="password1" id="password1"/>
							</label>
						</p>

						<p class="form-row form-row-wide">
							<label for="password2">重复密码:
								<i class="im im-icon-Lock-2"></i>
								<input class="input-text" type="password" name="password2" id="password2"/>
							</label>
						</p>

						<input type="submit" class="button border fw margin-top-10" id="registerForm" value="注册" />

						</form>
						<!-- <input type="submit" class="button border fw margin-top-10" name="register" id="registerForm" value="注册" /> -->

					</div>

				</div>
			</div>
		</div>
		<!-- Sign In Popup / End -->

	</div>
</div>
<!-- Header / End -->

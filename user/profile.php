<?php
  include("../util.php");
  configSession();
?>

<!DOCTYPE html>
<head>

<!-- Basic Page Needs
================================================== -->
<title>Mark Zuckerberg (Toronto) - ALFAR留学生合租平台</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/tweaks.css">
<link rel="stylesheet" href="../css/colors/main.css" id="colors">
<link rel="shortcut icon" href="../images/favicon-32x32.ico" />

</head>

<body>
  <!-- Wrapper -->
  <div id="wrapper">

  <!-- Header Container
  ================================================== -->
  <header id="header-container">
    <!-- Header -->
    <div id="header">
    	<div class="container">

    		<!-- Left Side Content -->
    		<div class="left-side">

    			<!-- Logo -->
    			<div id="logo">
    				<a href="index.php"><img src="../images/logo.png" alt=""></a>
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
    			<div class="header-widget">

    				<?php
    				  if (isset($_SESSION['login_user'])) {
    				    $username = $_SESSION['login_user'];
    						// Considering adding "Welcome, user"
    				    echo "<div class='user-menu'>
    						<div class='user-name'>$username</div>
    				    <ul>
    				      <li><a href='../dashboard/dashboard.php'><i class='sl sl-icon-settings'></i> 用户中心</a></li>
    				      <li><a href='../dashboard/dashboard-messages.php'><i class='sl sl-icon-envelope-open'></i> 我的信息</a></li>
    				      <li><a href='../dashboard/dashboard-my-profile.php'><i class='sl sl-icon-user'></i> 个人页面</a></li>
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
    					echo "<a href='../dashboard/dashboard-add-listing.php' class='button border with-icon'>登记房屋 <i class='sl sl-icon-plus'></i></a>
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

    						<!-- Login retrieve from database
    						<form action ="server/login_form.php" method="post" class="login">-->
    						<form action="../server/login_form.php" method="post" class="login">

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

    						<form action="../server/register_form.php" method="post" class="register">

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

    						<input type="submit" class="button border fw margin-top-10" name="register" id="registerForm" value="注册" />

    						</form>
    					</div>

    				</div>
    			</div>
    		</div>
    		<!-- Sign In Popup / End -->

    	</div>
    </div>
    <!-- Header / End -->
  </header>
  <div class="clearfix"></div>
  <!-- Header Container / End -->



  <div class="container">
    <div class="user-profile margin-top-65">
      <img src="../images/user-avatar2.jpg" class="img-circle" alt="" />
      <h3>Mark Zuckerberg</h3>
      <div class="user-profile-msg">
        <a href="#" class="button medium"><i class="fa fa-send"></i> 发送信息</a>
      </div>
    </div>

    <div class="col-md-12 margin-top-35">
      <div class="col-md-2"></div>

      <div class="col-md-4">
        <div class="user-profile-info">
          <h4><i class="fa fa-hotel"></i> 希望的地点</h4>
          <br>
          <h4><i class="fa fa-money"></i> 预算</h4>
          <br>
          <h4><i class="fa fa-calendar-check-o"></i> 入住时间</h4>
        </div>
      </div>

      <div class="col-md-4">
        <div class="user-profile-info">
          <h4><i class="fa fa-graduation-cap"></i> 学校</h4>
          <br>
          <h4><i class="fa fa-gamepad"></i> 兴趣</h4>
        </div>
      </div>

      <div class="col-md-2"></div>
    </div>

    <div class="col-md-12 margin-top-35 margin-bottom-65">
      <div class="col-md-2"></div>

      <div class="col-md-8">
        <div class="user-profile-bookmarks">
          <h4>收藏的房屋: </h4>
        </div>
      </div>

      <div class="col-md-2"></div>
    </div>


    </div>

  <!-- Footer
  ================================================== -->
  <div id="footer" class="sticky-footer">
    <!-- Main -->
    <div class="container">
      <div class="row">
        <div class="col-md-5 col-sm-6">
          <img class="footer-logo" src="../images/logo.png" alt="">
          <br><br>
          <p>ALFAR是一个以学期制的合租系统</p>
        </div>

        <div class="col-md-4 col-sm-6 ">
          <h4>快速链接</h4>
          <ul class="footer-links">
            <li><a href="#">关于我们</a></li>
            <li><a href="#">常见问题</a></li>
            <li><a href="#">登记房源</a></li>
            <li><a href="#">加入我们</a></li>
          </ul>

          <ul class="footer-links">
            <li><a href="#">我的账号</a></li>
            <li><a href="#">操作流程</a></li>
          </ul>
          <div class="clearfix"></div>
        </div>

        <div class="col-md-3  col-sm-12">
          <h4>联系我们</h4>
          <div class="text-widget">
            <!-- <span>xxx road</span> <br>-->
            微信: <span>alfar_toronto</span><br>
            电话: <span>(647) 123-4567 </span><br>
            E-Mail:<span> <a href="#">contact@alfar.ca</a> </span><br>
          </div>

          <ul class="social-icons margin-top-20">
            <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
            <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
            <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
          </ul>

        </div>

      </div>

      <!-- Copyright -->
      <div class="row">
        <div class="col-md-12">
          <div class="copyrights">© 2017 ALFAR. All Rights Reserved.</div>
        </div>
      </div>

    </div>
  </div>
  <!-- Footer / End -->


  <!-- Back To Top Button -->
  <div id="backtotop"><a href="#"></a></div>

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

  <!-- script.js for cms -->
  <script type="text/javascript" src="../scripts/scripts.js"></script>

</body>
</html>

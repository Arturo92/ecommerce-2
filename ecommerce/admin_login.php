<?php  include('config.php'); ?>
<?php  include('admin_inc/registration_login.php'); ?>
<?php  include('admin_inc/head_section.php'); ?>
	<title>LifeBlog | Sign in </title>
</head>
<body>
<div class="container">
	<!-- Navbar -->
	<?php include( ROOT_PATH . '/admin_inc/navbar.php'); ?>
	<!-- // Navbar -->

	<div style="width: 40%; margin: 20px auto;">
		<form method="post" action="admin_login.php" >
			<h2>Login</h2>
			<?php include(ROOT_PATH . '/admin_inc/errors.php') ?>
			<input type="text" name="username" value="<?php echo $username; ?>" value="" placeholder="Username">
			<input type="password" name="password" placeholder="Password">
			<button type="submit" class="btn" name="login_btn">Login</button>
			<p>
				Not yet a member? <a href="register.php">Sign up</a>
			</p>
		</form>
	</div>
</div>
<!-- // container -->

<!-- Footer -->
	<?php include( ROOT_PATH . '/admin_inc/footer.php'); ?>
<!-- // Footer -->

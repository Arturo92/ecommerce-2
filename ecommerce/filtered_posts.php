<?php include("arrays.php"); ?>
    <!DOCTYPE html>
	<html>
	    <head>
		<title>Fashion Boutique | Store</title>
		    <meta name="viewport" content="width=device-width, initial-scale=1.0">
			<?php foreach($stylesheets as $stylesheet){
				echo "<link rel='stylesheet' type='text/css' href='static/stylesheets/".$stylesheet."'>";
			} ?>
			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		</head>
		<body>
		    <div class="wrapper">
<?php include("logger.php"); ?>
<div class="toolbar" style="height:85px;">
    <div class="toolbar-holder">
	<div class="menu-links-divs">
		    <a id="dl" class="menu-links" href="#">Shop Women</a>
			<a id="ml" class="menu-links" href="#">Shop Men</a>
			<a id="cl" class="menu-links" href="#">Collections</a>
			<a class="menu-links" href="stores.php">Store Locator</a>
			<a class="menu-links" href="blog.php">Blog</a>
		</div>
		<?php if(!empty($_SESSION['username'])) { echo "<p id='session_user_id' style='float:left; color:white;'>" . "Welcome " . $_SESSION['username'] . "</p>";  echo "<script> $(document).ready(function(){ $('.logouts').show(); $('.logins').hide(); }); </script>"; } ?>
			
	    <div style="float:right;">
		<?php include("search.php"); ?>
		    <form method="post" action="index.php">
		        <input type="text name="keywords" id="searchbar" placeholder="Search store">
			</form>
			<ul id="content"></ul>
		</div>
		<br/>
		<br/>
		<br/>
	    
	</div>
	<br/>
	<br/>
	<div class="logo-holder">
	    <h1 style="font-size:82px;" id="logo"><a style="color:black; text-decoration:none;" href="index.php">Fashion Boutique</a></h1>
	</div>

    <a id="login" class="logins" href="login.php">Login</a>
	<a id="logout" style="display:none;transform: rotate(-90deg); float:right; position:absolute; color:black; text-decoration:none; margin-left:96%; font-family: 'Prata', serif;" class="logouts" href="<?php echo $_SERVER['PHP_SELF']; ?>?logout='1'">Logout</a>
	<?php if(isset($_GET['logout'])){ echo "<script> $(document).ready(function(){ $('.logins').hide(); }); </script>"; session_destroy(); unset($_SESSION['username']); header("location: index.php"); } ?>
	<a id="bag" href="bag.php"><img src="images/bag.png" height="24px" width="24px"></a>
</div>

<div class="menu">
    <div id="designerlink" class="menu-link">
	<h1 id="featureddesigners">Womens Store</h1>
	<a href="womenpumps.php">Shoes</a>
    <a href="womenhandbags.php">Hand bags</a>
	<a href="womenminibags.php">Mini bags</a>
	<a href="womenjewlary.php">Jewlary</a>
	</div>
	
    <div id="designerlink2" class="menu-link">
	<h1 id="featureddesigners">Mens Store</h1>
	<a href="menshoes.php">Shoes</a>
    <a href="menhandbags.php">Hand bags</a>
	<a href="menminibags.php">Mini bags</a>
	<a href="menjewlary.php">Jewlary</a>
	</div>
	
	 <div id="designerlink3" class="menu-link">
	<h1 id="featureddesigners">Fashion catalogs</h1>
	<a href="menssummerspring20.php">Men's Summer Spring 20</a>
    <a href="womenswinter19.php">Womens Winter 19</a>
	<a href="womenssummer19.php">Womens Summer 19</a>
	<a href="womenspring19.php">Womens Spring 19</a>
	</div>
<?php include('admin_inc/public_functions.php'); ?>
<?php include('admin_inc/head_section.php'); ?>
<?php $conn = mysqli_connect("localhost", "root", "Csharp92", "db");

	if (!$conn) {
		die("Error connecting to database: " . mysqli_connect_error());
	} ?>
<?php 
	// Get posts under a particular topic
	if (isset($_GET['topic'])) {
		$topic_id = $_GET['topic'];
		$posts = getPublishedPostsByTopic($topic_id);
	}
?>
	<div class="content">
	<h2 class="content-title">
		Articles on <u><?php echo getTopicNameById($topic_id); ?></u>
	</h2>
	<hr>
	<?php foreach ($posts as $post): ?>
		<div class="post" style="margin-left: 0px;">
			<img src="<?php echo 'adminstatic/images/' . $post['image']; ?>" class="post_image" alt="">
			<a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
				<div class="post_info">
					<h3><?php echo $post['title'] ?></h3>
					<div class="info">
						<span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
						<span class="read_more">Read more...</span>
					</div>
				</div>
			</a>
		</div>
	<?php endforeach ?>
</div>
<!-- // content -->
</div>
<!-- // container -->
</div>
<script>
    $(document).ready(function(){

		$("#dl").hover(function(){
			$("#designerlink").show();
			$("#designerlink2, #designerlink3").hide();
		});
		
		$("#dl").mouseleave(function(){
			$("#designerlink").show();
		});
		
		$("#ml").hover(function(){
			$("#designerlink, #designerlink3").hide();
			$("#designerlink2").show();
		});
		
		$("#ml").mouseleave(function(){
			$("#designerlink2").show();
		});
		
		$("#cl").hover(function(){
			$("#designerlink, #designerlink2").hide();
			$("#designerlink3").show();
		});
		
		$("#cl").mouseleave(function(){
			$("#designerlink3").show();
		});
		
		$("#designerlink, #designerlink2, #designerlink3").mouseleave(function(){
			$("#designerlink, #designerlink2, #designerlink3").hide();
		});
		
		$(".login-form").hide();
		
	});
</script>
			
<script type="text/javascript">
	$(document).ready(function() {
		$('#searchbar').on('input', function() {
			var searchKeyword = $(this).val();
			if (searchKeyword.length >= 2) {
				$.post('search.php', { keywords: searchKeyword }, function(data) {
					$('ul#content').empty()
					$.each(data, function() {
						$('ul#content').append('<li><a style="color:black; float:left;" href="' + this.page_name + '.php?id=' + this.id + '">' + this.title + '</a></li>');
					});
				}, "json");
			}
		});
	});
	</script>
			            <?php
			foreach($scripts as $script){
				echo "<script src='static/js/".$script."'></script>";
			}
			?>
			</div>
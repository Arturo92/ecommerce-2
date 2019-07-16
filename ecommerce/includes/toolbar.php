<?php include("signup.php"); ?>
<?php include("login.php"); ?>
<div class="toolbar">
    <div class="toolbar-holder">
	    <div style="float:right;">
		    <input type="text" id="searchbar" placeholder="Search store">
			<?php if(!empty($_SESSION['username'])) { echo "<p id='session_user_id' style='float:left; padding-right:6px;'>" . $_SESSION['username'] . "</p>"; } ?>
	    </div>
		<br/>
		<br/>
		<br/>
	    <div class="menu-links-divs">
		    <a id="dl" class="menu-links" href="shopwomen.php">Shop Women</a>
			<a id="ml" class="menu-links" href="shopmen.php">Shop Men</a>
			<a id="cl" class="menu-links" href="collections.php">Collections</a>
			<a class="menu-links" href="stores.php">Store Locator</a>
			<a class="menu-links" href="handbags.php">Client Service</a>
		</div>
	</div>
	<br/>
	<br/>
	<div class="logo-holder">
	    <h1 style="font-size:82px;" id="logo"><a style="color:black; text-decoration:none;" href="index.php">Saint Laurent</a></h1>
	</div>

    <a id="login" class="logins" href="login.php">Login</a>
	<a id="logout" style="display:none;" href="<?php echo $_SERVER['PHP_SELF']; ?>?logout='1'">Logout</a>
	<?php if(isset($_GET['logout'])){ session_destroy(); unset($_SESSION['username']); header("location: index.php"); } ?>
	<a id="bag" href="bag.php"><img src="images/bag.png" height="24px" width="24px"></a>
</div>

<div class="menu">
    <div id="designerlink" class="menu-link">
	<h1 id="featureddesigners">Womens Store</h1>
	<a href="womenshoes.php">Shoes</a>
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
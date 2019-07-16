
<?php include("arrays.php"); ?>
    <!DOCTYPE html>
	<html>
	    <head>
		<title>Saint Laurent | Store</title>
		    <meta name="viewport" content="width=device-width, initial-scale=1.0">
			<?php foreach($stylesheets as $stylesheet){
				echo "<link rel='stylesheet' type='text/css' href='static/stylesheets/".$stylesheet."'>";
			} ?>
			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		</head>
		<body>
		    <div class="wrapper">
			    <?php include("includes/toolbar.php"); ?>
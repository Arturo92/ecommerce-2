<?php 
    include("logger.php");
	// connect to database
	$conn = mysqli_connect("localhost", "root", "Csharp92", "db");

	if (!$conn) {
		die("Error connecting to database: " . mysqli_connect_error());
	}
    // define global constants
	define ('ROOT_PATH', realpath(dirname(__FILE__)));
	define('BASE_URL', 'http://localhost/ecommerce/');
?>
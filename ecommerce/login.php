<?php include("arrays.php"); ?>
<?php
session_start();
$db = mysqli_connect('localhost', 'root', 'Csharp92', 'db');

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
		//session_id("login");
		//session_start();
	  $_SESSION['username'] = $username;
  	  header('location: index.php');
	  //session_write_close();
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>
<!DOCTYPE html>
<html>
    <head>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link rel="stylesheet" href="static/stylesheets/credentials.css">
	</head>
	<body>
	
        <div class="login-form">
	        <div class="login-form-holder">
			<?php foreach($errors as $error){ echo "<p>" . $error . "</p>"; } ?>
		        <form method="post" action=<?php echo $_SERVER['PHP_SELF']; ?>>
			        <span>Username:<input type="text" name="username" id="login" class="credentials_fields"/></span>
				    <span>Password:<input type="password" name="password" id="pword" class="credentials_fields"/></span>
					<p style="padding-top:32px;">Create an <a href="signup.php"/>account</a></p>
					<p>or</p>
				    <input type="submit" name="login_user" id="login_submit" value="Login" class="submit_buttons"/>
			    </form>
		    </div>
	    </div>
    </body>
</html>
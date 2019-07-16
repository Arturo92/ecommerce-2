<?php
include("arrays.php");
$username = "";
$email    = "";
// connect to the database
$db = mysqli_connect('localhost', 'root', 'Csharp92', 'db');

// REGISTER USER
if (isset($_POST['register_submit'])) {
  // receive all input values from the form
  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if(empty($firstname)) { array_push($errors, "Firstname is required"); }
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password_e = md5($password);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (firstname, username, email, password) 
  			  VALUES('$firstname', '$username', '$email', '$password_e')";
  	mysqli_query($db, $query);
	//session_id("signup");
	//session_start();
  	$_SESSION['username'] = $username;
  	header('location: login.php');
	//session_write_close();
	session_destroy();
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
			        <span>First name:<input type="text" name="firstname" id="login" class="credentials_fields"/></span>
				    <span>Email:<input type="text" name="email" id="email" class="credentials_fields"/></span>
					<br/>
					<br/>
					<div style="margin-left:3%;"><span>Username:<input input type="text" name="username" id="uname" class="credentials_fields"/></span>
				    <span>Password:<input type="password" name="password" id="pword" class="credentials_fields"/></span>
					</div>
					<p style="padding-top:32px;"><a href="login.php">Login</a></p>
					<p>or</p>
				    <input type="submit" name="register_submit" id="login_submit" value="Register" class="submit_buttons"/>
			    </form>
		    </div>
	    </div>
    </body>
</html>
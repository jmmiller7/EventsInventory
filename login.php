<?php
session_start();
include("../config.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
	// username and password from form
	$myusername = addslashes($_POST['username']);
	//$mypassword = md5(addslashes($_POST['username']));
	$mypassword = addslashes($_POST['password']);
	
	$sql = "SELECT id FROM users WHERE username='$myusername' and password='$mypassword'";
	$result = mysql_query($sql);
	$count = mysql_num_rows($result);
	
	// make sure only one record was returned
	if($count==1){
		//$_SESSION['login_admin']=$myusername;
		$_SESSION['loggedIn'] = true;
		header("location: admin/index.php");
	}
	else
		echo "<p style='color:red; text-align:center;'>Invalid username or password.</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/culogo.png">

    <title>CU RES | Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body>
	<div class="container">
		<div align="center" class="header">
			<img src="images/cuhorizontal.png" alt="Carroll University Logo" />
		</div>
	</div>
    <div class="container">

      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Please Sign In</h2>
        <label for="inputUsername" class="sr-only">Username</label>
        <input name="username" type="text" id="inputUsername" class="form-control" placeholder="Email address" required autofocus>
        <label for="password" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
      </form>

    </div> <!-- /container -->
  </body>
</html>

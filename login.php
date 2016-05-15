<?php
session_start();
include("../config.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
	// username and password from form
	$myusername = addslashes($_POST['username']);
	//$mypassword = md5(addslashes($_POST['username']));
	$mypassword = addslashes($_POST['password']);
	
	$sql = "SELECT u.id, p.groupname privilege FROM users u inner join groups p on u.privilege = p.ID where u.username = '$myusername' and u.password = '$mypassword'";
	$result = mysql_query($sql);
	$count = mysql_num_rows($result);
	
	// make sure only one record was returned
	if($count==1){
			
		$row = mysql_fetch_assoc($result);
		$_SESSION['loggedIn'] = true;
		$_SESSION['privilege'] = (isset($row['privilege']) ? $row['privilege'] : null);
				
		if($_SESSION['privilege'] == 'Admin')	
			header("location: dashboard/admin/index.php");
		else if($_SESSION['privilege'] == "Manager")
			header("location: dashboard/manager/index.php");
		else if($_SESSION['privilege'] == "User")
			header("location: dashboard/user/index.php");
		
	}
	else
		echo "<p style='color:red; text-align:center;'>Invalid username or password.</p>";
}
?>

<!DOCTYPE html>
<html >
  <head>
	<meta charset="UTF-8">
	<title>Log-in</title>
	<link rel='stylesheet prefetch' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
	<link rel="stylesheet" href="css/signin.css">
	<link rel="icon" href="images/culogo.png">
  </head>

  <body>

	<div class="login-card">
	<img src="images/reslogo.png" alt="Carroll University Logo" />
	<h1>Please Log In.</h1><br>
		<form method="post">
			<input type="text" name="username" placeholder="Username">
			<input type="password" name="password" placeholder="Password">
			<input type="submit" name="login" class="login login-submit" value="Login">
		</form>
		
		<div class="login-help">
			<a href="forgotpass.php">Forgot Password</a>
		</div>
	</div>

	<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
	   
  </body>
</html>
<?php
	session_start();
	include("auth.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/culogo.png">

    <title>CU RES | Inventory Dashboard</title>

	<link href="css/reset.css" rel="stylesheet">
    <link href="css/mainstylesheet.css" rel="stylesheet">
	
  </head>

	<body>

		<header class="header primary-header container group">
			
			<img class="col-1-3 logo" src="images/reslogo_horizontal.png">
			
			<nav class="col-2-3 nav primary-nav">
				<ul>
					<li class="selected"><a href="#">Home</a></li>
					<li><a href="inventory.php">Inventory</a></li>
					<li><a href="logout.php">Log Out</a></li>
				<ul>
			</nav>
		
		</header>

	</body>
</html>

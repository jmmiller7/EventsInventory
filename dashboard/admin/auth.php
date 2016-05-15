<?php

	if(!$_SESSION["loggedIn"]){
		header("location: ../login.php");
	}
	else{
		if($_SESSION['privilege'] != "Admin"){
			header("location: ../".$_SESSION['privilege']."/index.php");
		}
	}
	
?>
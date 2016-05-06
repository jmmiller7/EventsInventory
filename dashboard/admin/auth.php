<?php

	if(!$_SESSION["loggedIn"]){
		header("location: ../index.php");
	}
	else{
		if($_SESSION['privilege'] != "admin"){
			header("location: ../".$_SESSION['privilege']."/index.php");
		}
	}
	
?>
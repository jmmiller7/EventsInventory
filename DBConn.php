<?php

require_once('protected/config.php');

try{
	$connString = "mysql:host=" . DBHOST . "; dbname=" . DBNAME;
	
	$pdo = new PDO($connString, DBUSER, DBPASS);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$sql = "select s.name as 'ss', r.name as rr, i.qty as qq from storagespace s, inventory i, resource r where i.storageid = s.id and i.resourceid = r.id and r.name like '%brown%'";
	$result = $pdo->query($sql);
	
	echo "<table><tr><td width=200>Storage Space</td><td width=200>Resource</td><td width=50>Qty</td></tr>";
	
	while($row = $result->fetch()) {
		echo "<tr><td>" . $row['ss'] . "</td><td>" . $row['rr'] . "</td><td>" . $row['qq'] . "</td></tr>";
	}
	
	echo "</table>";
	
	$pdo=null;
}
catch (PDOException $e){
	die( $e -> getMessage() );
}

	
?>
<?php
	$dbhost = 'parking-system.cmsnlbdux8it.us-east-1.rds.amazonaws.com';
	$username = 'admin';
	$password = 'parking_system';
	$dbname = 'parking';

	$conn = new mysqli($dbhost, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: ". $conn->connect_error);
	}
	
?>
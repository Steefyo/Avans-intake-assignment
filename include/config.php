<?php
	// Database settings
	$db_hostname = 'localhost';
	$db_username = 'root';
	$db_password = 'usbw';
	$db_database = 'planner';

	// Make a database connection
	$mysqli = mysqli_connect($db_hostname, $db_username, $db_password, $db_database) or die("Can't connect to the database!");
?>
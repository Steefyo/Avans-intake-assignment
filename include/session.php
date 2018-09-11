<?php
	session_start();	//Start session

	// Check if the user is already logged in
	if (!isset($_SESSION['username']) || strlen($_SESSION['username']) == 0) {
		header("Location:index.php?login");	// Not logged in
		exit;
	}
?>
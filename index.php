<?php
	// Include the database connection
	require 'include/config.php';

	// Set root-folder and directory seperator
	define('ROOT', dirname(__FILE__));
	define('DS', DIRECTORY_SEPARATOR);
	
	spl_autoload_register(function ($class)	{
		// Include all php files from the folder
		if (file_exists(ROOT . DS . 'controllers' . DS . $class . '.php')) {
			include ROOT . DS . 'controllers' . DS . $class . '.php';
		}

		// Include all php files from the folder
		if (file_exists(ROOT . DS . 'models' . DS . $class . '.php')) {
			include ROOT . DS . 'models' . DS . $class . '.php';
		}
	});

	// Instantiate the controller
	$EC = new EventController();

	// what should be shown
	if (isset($_GET["planning"])) {							// Solo view		
		$EC->showact($_GET["planning"]);
	} 
	else if (isset($_GET["type"]) && isset($_GET["id"])) {	// Remove item
		$EC->delete($_GET["type"], $_GET["id"]);
	} 
	else if (isset($_GET["type"]) && isset($_GET["edit"])) {// Edit item
		$EC->edit($_GET["type"], $_GET["edit"]);
	} 
	else if (isset($_GET["new"])) {// Edit item
		$EC->newitem($_GET["new"]);
	} 

	else if (isset($_GET["login"])) {// Edit item
		$EC->login($_GET["login"]);
	} 
	else if (isset($_GET["logout"])) {// Edit item
		$EC->logout($_GET["logout"]);
	} 


	else if (isset($_GET["validate"])) {// Edit item
		$EC->validate($_GET["validate"]);
	} 


	else {													// Home page
		$EC->index();
	}
?>
<?php
	include 'inc/constants.php';
	$location = SCRIPT_ROOT.'/admin/login.php';
	// echo $location;
	session_start();
	if (isset($_SESSION['login'])) {
		session_unset();
		session_destroy();
		header('Location: '.$location);
		exit();
	} else {
		session_unset();
		session_destroy();
	    header('Location: '.$location);
	    exit(); 
	}

	
?>
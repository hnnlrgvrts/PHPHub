<?php
	if (!isset($_SESSION)) {
		session_start();
	}

	// remove all session variables
	session_unset(); 

	// destroy the session
	if(session_destroy()) {
		header("Location: index.php"); // Redirecting to homepage
	}
?>
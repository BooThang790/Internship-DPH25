<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "attendancemsystem";
	
	// Create a mysqli connection but guard against uncaught exceptions
	try {
		$conn = new mysqli($host, $user, $pass, $db);
		if ($conn->connect_error) {
			// This branch may not run if mysqli is configured to throw exceptions,
			// but keep it as a fallback.
			throw new Exception($conn->connect_error);
		}
	} catch (Exception $e) {
		// Do not expose sensitive details in production.
		// Provide a helpful, actionable message for local/dev environments.
		$msg = "Database connection failed. The database 'attendancemsystem' was not found or cannot be reached.\n";
		$msg .= "If you haven't created the database yet, import the SQL dump file: 'DATABASE FILE/attendancemsystem.sql'.\n";
		$msg .= "On XAMPP you can use phpMyAdmin (http://localhost/phpmyadmin) or the mysql client.\n";
		// Append a short diagnostic (no credentials)
		$msg .= "Reason: " . $e->getMessage();
		// Stop execution with the clear message
		die(nl2br(htmlspecialchars($msg)));
	}
?>
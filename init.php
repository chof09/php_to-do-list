<?php

	// Create connection
	$connection = new mysqli('localhost', 'root', '', 'to-do');
	mysqli_set_charset($connection, "utf8");    

	// Check connection
	if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error . "<br />");
	}

	// echo "Connected successfully<br />";
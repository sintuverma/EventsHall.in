<?php 
	// this Script run only first time to create db and table //
	
	$host = "localhost";
	$user = "root";
	$password = "";

	// Create connection
	$conn = mysqli_connect($host, $user, $password);
	// Check connection
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}

	// Create database
	$sql = "CREATE DATABASE myeventshall_db";
	if (mysqli_query($conn, $sql)) {
    	echo "Database created successfully";
	} else {
    	echo "Error creating database: " . mysqli_error($conn);
	}

	mysqli_select_db($conn, 'myeventshall_db');
	 
	 // sql to create table

	$table = "CREATE TABLE users (
		id INT(6) PRIMARY KEY AUTO_INCREMENT NOT NULL, 
		name VARCHAR(50) NOT NULL,
		mobile BIGINT(10) NOT NULL,
		email VARCHAR(50) UNIQUE KEY NOT NULL,
		password VARCHAR(50) NOT NULL,
		activated TINYINT(2) default 0 NOT NULL,
		token VARCHAR(100) NULL,
		created_on TIMESTAMP
	)";

	if (mysqli_query($conn, $table)) {
		echo "Table users created successfully";
	} else {
		echo "Error creating table: " . mysqli_error($conn);
	}

	$table = "CREATE TABLE guest_house (
		id INT(6) PRIMARY KEY AUTO_INCREMENT NOT NULL, 
		name VARCHAR(250) NOT NULL,
		address VARCHAR(250) NOT NULL,
		area varchar(250),
		pincode BIGINT(6) NOT NULL,
		city VARCHAR(50) NOT NULL,
		state VARCHAR(50) NOT NULL,
		url varchar(250),
		info VARCHAR(250) NOT NULL,
		email VARCHAR(50) NOT NULL,
		FOREIGN KEY(email) REFERENCES users(email)
		
	)";
	if (mysqli_query($conn, $table)) {
		echo "Table guest_house created successfully";
	} else {
		echo "Error creating table: " . mysqli_error($conn);
	}


	$table = "CREATE TABLE catering (
		id INT(6) PRIMARY KEY AUTO_INCREMENT NOT NULL, 
		name VARCHAR(250) NOT NULL,
		address VARCHAR(250) NOT NULL,
		area varchar(250),
		pincode BIGINT(6) NOT NULL,
		city VARCHAR(50) NOT NULL,
		state VARCHAR(50) NOT NULL,
		info VARCHAR(250) NOT NULL,
		email VARCHAR(50) NOT NULL,
		FOREIGN KEY(email) REFERENCES users(email)
		
	)";
	if (mysqli_query($conn, $table)) {
		echo "Table catering created successfully";
	} else {
		echo "Error creating table: " . mysqli_error($conn);
	}


	$table = "CREATE TABLE `guestHouse_image` (
				  `image_id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
				  `image_name` varchar(250) NOT NULL,
				   email VARCHAR(50) NOT NULL,
					FOREIGN KEY(email) REFERENCES users(email)
				)";

	if (mysqli_query($conn, $table)) {
		echo "Table guestHouse_image created successfully";
	} else {
		echo "Error creating table: " . mysqli_error($conn);
	}

	$table = "CREATE TABLE contactUs (
		contactUsId INT(6) PRIMARY KEY AUTO_INCREMENT NOT NULL, 
		visiterName VARCHAR(250) NOT NULL,
		visiterEmail VARCHAR(50) NOT NULL,
		visiterMobile BIGINT(10) NOT NULL,
		visiterRequest VARCHAR(250) NOT NULL
		
		
	)";
	if (mysqli_query($conn, $table)) {
		echo "Table contactUs created successfully";
	} else {
		echo "Error creating table: " . mysqli_error($conn);
	}



	mysqli_close($conn);
	 
?>
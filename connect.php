<?php
ob_start();


//CREATING DATABASE ONCE

			$servername = 'localhost';
			$username = 'root';
			$password = '';
	
		$connection = mysqli_connect($servername, $username, $password);

		$query = "CREATE DATABASE IF NOT EXISTS ajax";
		$query_run = mysqli_query($connection, $query);

			$servername = 'localhost';
			$username = 'root';
			$password = '';
			$dbname = 'ajax';


// Create Connection

			$connection = mysqli_connect($servername, $username, $password, $dbname);

			// Check Connection 



			// sql to create table
			$query = "CREATE TABLE IF NOT EXISTS cars (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
			title VARCHAR(255) NOT NULL
			)";

			$query_run = mysqli_query($connection, $query);

			

?>
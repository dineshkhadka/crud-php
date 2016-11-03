<?php 
	$username = 'root';
	$password = '';
	$host = 'localhost';
	$dbName = 'quest_db';


	$connection = mysqli_connect($host, $username, $password, $dbName);
	if (!$connection) {
		die('connection failed:'. mysqli_connect_error());
	}
	
 ?>
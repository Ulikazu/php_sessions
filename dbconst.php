<?php

$server = 'YOUR_HOST_HERE';
$db_username = 'YOUR_USERNAME_HERE';
$db_password = 'YOUR_PASSWORD_HERE';
$database = 'YOUR_DATABASE_NAME_HERE';


try {
	$link = new PDO("mysql:host=$server;dbname=$database;", $db_username, $db_password);

} catch (PDOException $e) {
	die("Connection failed".$e->getMessage());
	
}
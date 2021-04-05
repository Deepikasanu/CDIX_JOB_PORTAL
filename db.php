<?php

//Your Mysql Config
$servername = "localhost";
$username = "u159492942_athell";
$password = "KIKIKIhahaha@123";
$dbname = "u159492942_hellobrother";

//Create New Database Connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check Connection
if($conn->connect_error) {
	die("Connection Failed: ". $conn->connect_error);
}
<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName="cafe_house";
// Create connection
$conn =mysqli_connect($dbServername, $dbUsername, $dbPassword ,$dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}

echo "";
?>
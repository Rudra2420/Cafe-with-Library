<?php  

$severname = 'localhost';
$username  = 'root';
$password  = '';
$database  = 'cafe_house';

$conn	=	mysqli_connect($severname, $username, $password, $database);

if (!$conn) {
	die("Database connection is failed:".mysqli_conncet_error()." ".mysqli_connect_errno());
}

?>
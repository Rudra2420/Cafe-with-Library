<?php 
	
	session_start();
	unset($_SESSION['IS_LOGIN']);
	session_destroy();
	
	header("location: ../index.php");
	
?>
<?php
include_once('database/dbconn.php');
include_once('database/function.php');

session_start();
unset($_SESSION['STF_LOGIN']);
session_destroy();
header('location:../index.php');
?>
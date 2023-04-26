<?php
session_start();
require "conn/dbconn.php";

$ID=$_REQUEST['id'];


$query="DELETE FROM food_items WHERE fitem_id=$ID;";
$result=mysqli_query($conn,$query);


 if(!$result){
 	
	echo "<script> alert('data deleted'); </script>";
 	
 }
 else{
 	
	echo "<script> alert('data not deleted'); </script>";
      
}
header('location:manage_menu.php');

?>
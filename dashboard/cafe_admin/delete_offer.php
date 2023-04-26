<?php
session_start();
require "conn/dbconn.php";

$ID=$_REQUEST['id'];


$query="DELETE FROM offers WHERE offer_id=$ID;";
$result=mysqli_query($conn,$query);


 if(!$result){
 	
	echo "<script> alert('data deleted'); </script>";
 	
 }
 else{
 	
	echo "<script> alert('data not deleted'); </script>";
      
}
header('location:offer.php');

?>
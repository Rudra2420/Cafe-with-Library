<?php
session_start();
require "conn/dbconn.php";

$ID=$_REQUEST['id'];


$query="DELETE FROM books WHERE book_id=$ID;";
$result=mysqli_query($conn,$query);


 if($result){
 	
	?>
	<script>
		alert("data deleted");
	</script>
    <?php
 	
 }
 else{
 	
	?>
	<script>
		alert("data not deleted");
	</script>
    <?php
      
}
header('location:lib_manage.php');

?>
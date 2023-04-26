<?php 
session_start();
ob_start();
include ('conn/dbconn.php');
include ('include/header_admin.php');
?>

<link rel="stylesheet" type="text/css" href="css/update.css">

<?php


$ID=$_REQUEST['id'];


$name = $email= $contact =$password="";

$name="SELECT * FROM customer WHERE cust_id=$ID;";

$result = mysqli_query($conn,$name);
$row = mysqli_fetch_assoc($result);




if ($_SERVER["REQUEST_METHOD"] == "POST") {


if(isset($_POST["name"]))
{
  $name = $_POST["name"];
}

if(isset($_POST["email"]))
{
  $email =$_POST["email"];
}

if(isset($_POST["contact"]))
{
   $contact = $_POST["contact"];
}



  if(!empty($_POST["contact"])&&!empty($_POST["name"])&&!empty($_POST["email"]))
  {

   $sql="UPDATE  customer SET cust_name='$name',cust_email='$email',cust_mob='$contact' WHERE cust_id=$ID;";
   $result=mysqli_query($conn,$sql);

   if ($conn->query($sql) === TRUE) 
    {
      
      ?>
        <script>
            alert("data updated");
        </script>
      <?php
      
    } 
  else 
    {
      ?>
        <script>
            alert("data not updated");
        </script>
      <?php
    }  

  }
  header("Location:manage_user.php");
  
}
$conn->close();

?>

<div >

<form method="post" action="" class="container" >  


<div class="mx-5 mt-1 mb-2 text-center">
  <p class="bg-dark text-white p-2"> Update Details</p>
</div>
    <br>
    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" value="<?php echo $row["cust_name"];?>" required>


    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" value="<?php echo $row["cust_email"];?>" required>

    <label for="contact"><b>Contact</b></label>
    <input type="text" placeholder="Enter Contact" name="contact" value="<?php echo $row["cust_mob"];?>" required>
   

<center><button type="submit" class="btn" onclick="Return_message()"><b>Update</b></button></center>

<script>

  function Return_message(){

  	if(!empty($_POST["contact"])&&!empty($_POST["name"])&&!empty($_POST["email"])){
    
    alert("your Record Updated Successfully.");
     header("location:manage_user.php");
    }

  }


</script>


</form>
</div>
</body>
</html>



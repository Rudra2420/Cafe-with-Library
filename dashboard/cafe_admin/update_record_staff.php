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

$name="SELECT * FROM staff WHERE stf_id=$ID;";

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

if(isset($_POST["password"]))
{
   $password = $_POST["password"];
}


  if(!empty($_POST["contact"])&&!empty($_POST["name"])&&!empty($_POST["email"]))
  {

   $sql="UPDATE  staff SET stf_name='$name',stf_email='$email',stf_mob='$contact',stf_pwd='$password' WHERE stf_id=$ID";
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
    header("Location:manage_staff.php");
  }

  else{
    return true;
  }

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
    <input type="text" placeholder="Enter Name" name="name" value="<?php echo $row["stf_name"];?>" required>


    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" value="<?php echo $row["stf_email"];?>" required>

    <label for="contact"><b>Contact</b></label>
    <input type="text" placeholder="Enter Contact" name="contact" value="<?php echo $row["stf_mob"];?>" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter New Password" name="password" >


   
<div class="bttn">
<button type="submit" class="btn" onclick="Return_message()"><b>Update</b></button>
</div>

<script >

  function Return_message(){

  	if(!empty($_POST["contact"])&&!empty($_POST["name"])&&!empty($_POST["email"])){
    
    alert("your Record Updated Successfully.");
    // header('location:manage_user.php');
    }

  }


</script>


</form>
</div>
</body>
</html>



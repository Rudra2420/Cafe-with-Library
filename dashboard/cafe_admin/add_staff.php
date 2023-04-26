<?php 
ob_start();
session_start();
include ('conn/dbconn.php');
include ('include/header_admin.php');
?> 

<link rel="stylesheet" type="text/css" href="css/add.css">

<?php

require "conn/dbconn.php";

$name = $email = $contact =$password="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

if(isset($_POST["name"]))
{

  if(!empty($_POST["name"]))
  $name = $_POST["name"];
 }

if(isset($_POST["email"]))
{
  if(!empty($_POST["email"]))
  $email =$_POST["email"];
 }

if(isset($_POST["contact"]))
{
  if(!empty($_POST["contact"]))
  $contact = $_POST["contact"];
 }

if(isset($_POST["password"]))
{
  

  if(!empty($_POST["password"]))

  $password = $_POST["password"];
 
}


   




  if(!empty($_POST["contact"])&&!empty($_POST["name"])&&!empty($_POST["email"])&&!empty($_POST["password"])){

    
    $result=mysqli_query($conn,"SELECT * FROM staff Where stf_email='$email' ");

  
    if(mysqli_num_rows($result)>0){
      
     echo "email in already use";
    }  
       

        else{
          
          

            $sql="INSERT into staff (stf_name,stf_email,stf_mob,stf_pwd) VALUES ('$name','$email','$contact','$password');";
            
  
  
         if (mysqli_query($conn,$sql)) {
          
          echo '<script type="javascript" > alert("your Record Successfully saved") </script>';
              header("Location:manage_staff.php");
        
              
   
          } 
          
          else 
          {
      
              echo "Error: " . $sql . "<br>" . $conn->error;
  
          }
  
          }
  
          
        

    }
 }

 

$conn->close();

?>


<br><br><br>

<div>

<form method="post" action="add_staff.php" class="container">  


<div class="h"><h1>Enter Staff Details</h1></div>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="contact"><b>Contact</b></label>
    <input type="text" placeholder="Enter Contact" name="contact" required>
 
    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter New Password" name="password" required>

    <div class="bttn">
    <button type="submit" class="btn" onclick="Return_message()">Add New Record</button>
    </div>
<script >

  function Return_message(){

    if(!empty($_POST["contact"])&&!empty($_POST["name"])&&!empty($_POST["email"])){
    
    alert("your Record Successfully saved.");
  
    return true;
    }
  }

</script>


</form>

</div>


</body>
</html>
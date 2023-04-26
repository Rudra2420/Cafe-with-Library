<?php
session_start();
ob_start();
include ('conn/dbconn.php');
include ('include/header_staff.php');
?>

<link rel="stylesheet" type="text/css" href="css/update.css">
<?php


//  $aname=$_REQUEST['name'];


//  $name = $password="";

// $name="SELECT * FROM cafe_admin WHERE adm_name=$aname";

// $result = mysqli_query($conn,$name);
// $row = mysqli_fetch_assoc($result);




if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if(isset($_POST["name"]))
  {
    $name = $_POST["name"];
  }
  if(isset($_POST["password"]))
  {
    $password = $_POST["password"];
  }


  if(!empty($_POST["password"]))
  {
      $sql="UPDATE cafe_admin SET adm_pwd='$password'WHERE adm_name=$aname;";
      $result=mysqli_query($conn,$sql);

        if ($conn->query($sql) === TRUE)
        {
            ?>
              <script>
                alert("Password updated");
              </script>
            <?php
        } 
        else 
        {
            ?>
              <script>
                  alert("Password not updated");
              </script>
            <?php
        }
         
   }
   header("Location:changepwd.php");

$conn->close();
}
?> 

<div >

<form method="post" action="" class="container" >  


<div class="mx-5 mt-1 mb-2 text-center">
  <p class="bg-dark text-white p-2"> Update Details</p>
</div>
    <br>
    

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter New Password" name="password" >


   

<center><button type="submit" class="btn" onclick="Return_message()"><b>Update</b></button></center>

<script >

  function Return_message(){

  	if(!empty($_POST["password"])){
    
    alert("Your Password is Updated Successfully.");
    return true;
    }

  }


</script>


</form>
</div>
</body>
</html>
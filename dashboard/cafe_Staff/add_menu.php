<?php 
session_start();
ob_start();
include ('conn/dbconn.php');
include ('include/header_staff.php');
?> 

<link rel="stylesheet" type="text/css" href="css/add.css">

<?php

$i_name = $f_price = $f_cat = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

    if(isset($_POST["fi_name"]))
    {
      if(!empty($_POST["fi_name"]))
      $i_name = $_POST["fi_name"];
    }

    if(isset($_POST["fprice"]))
    {
      if(!empty($_POST["fprice"]))
      $f_price =$_POST["fprice"];
    }

    if(isset($_POST["fcat"]))
    {
      if(!empty($_POST["fcat"]))
      $f_cat = $_POST["fcat"];
    }

    if(isset($_FILES['file']))
    {
  
      $errors= array();
      
      $filename = $_FILES['file']['name'];
      $filesize = $_FILES['file']['size'];
      $filetmp = $_FILES['file']['tmp_name'];
      $filetype = $_FILES['file']['type'];
      
      $file_r = explode('.',$filename);
      $file_ext=strtolower(end($file_r));
      
      $extensions= array("jpeg","jpg","png");


      if(in_array($file_ext,$extensions) === false)
      {
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size < 5242880)
      {
         $errors[]='File size must be less than 5 MB';
      }
    
    }


      if(!empty($_POST["fi_name"])&&!empty($_POST["fprice"])&&!empty($_POST["fcat"]))
      {          
          
        $destinationfile = 'assets/img/food-items/'.$filename;
        move_uploaded_file($file_tmp,$destinationfile);
        
        $sql="INSERT into food_items (fitem_name,fitem_price,fitem_img,fcat_id) VALUES ('$i_name','$f_price','$destinationfile','$f_cat');";
      
        if (mysqli_query($conn,$sql)) 
        {
          move_uploaded_file($_FILES["image"]["tmp_name"],"assets/img/food-items/".$_FILES["image"]["name"]);
          echo '<script type="javascript" > alert("your Record Successfully saved") </script>';
          header("Location:manage_menu_a.php");
        
        } 
        else 
        {
      
          echo "Error: " . $sql . "<br>" . $conn->error;
  
        }
  
      }

}


 

$conn->close();

?>


<br><br><br>

<div>

<form method="post" action="add_menu.php" class="container"  enctype="multipart/form-data">  


<div class="h"><h1>Enter Item Details</h1></div>

    <label for="fi_name"><b>Item Name</b></label>
    <input type="text" placeholder="Enter Item Name" name="fi_name" required>

    <label for="fprice"><b>Food Price</b></label>
    <input type="text" placeholder="Enter Price" name="fprice" required>

    <label for="fcat"><b>Food Category</b></label>
    <input type="text" placeholder="Enter Category" name="fcat" required>
    
    <lable for="image"><b>Upload Image</b></lable><br>
    <input type="file" name="file">
    
    <div class="bttn">
    <button type="submit" class="btn" onclick="Return_message()">Add New Item</button>
    </div>
<script >

  function Return_message(){

    if(!empty($_POST["fcat"])&&!empty($_POST["i_name"])&&!empty($_POST["fprice"])){
    
    alert("your Record Successfully saved.");
  
    return true;
    }
  }

</script>


</form>

</div>


</body>
</html>
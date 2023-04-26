<?php 
session_start();
ob_start();
include ('conn/dbconn.php');
include ('include/header_staff.php');
?>

<link rel="stylesheet" type="text/css" href="css/update.css">

<?php


$ID=$_REQUEST['id'];


//$name = $email= $contact =$password="";

$name="SELECT * FROM food_items INNER JOIN food_category on food_items.fcat_id = food_category.fcat_id WHERE fitem_id=$ID ;";

$result = mysqli_query($conn,$name);
$row = mysqli_fetch_assoc($result);




if ($_SERVER["REQUEST_METHOD"] == "POST") {


if(isset($_POST["name"]))
{
  $f_name = $_POST["name"];
}

if(isset($_POST["price"]))
{
  $f_price =$_POST["price"];
}

if(isset($_POST["f_cat"]))
{
  $f_category = $_POST["f_cat"];
}

if(isset($_FILES['image']))
      {
  
        
        
          $file_name = $_FILES['image']['name'];
          $file_size = $_FILES['image']['size'];
          $file_tmp = $_FILES['image']['tmp_name'];
          $file_type = $_FILES['image']['type'];
        
      }

  if(!empty($_POST["name"])&&!empty($_POST["price"])&&!empty($_POST["f_cat"]))
  {
        $img_destination = 'assets/img/food-items/'.$file_name;
        move_uploaded_file($file_tmp,$img_destination);

   $sql="UPDATE food_items SET fitem_name='$f_name',fitem_price='$f_price',fcat_id='$f_category',fitem_img='$img_destination' WHERE fitem_id=$ID";
   $result=mysqli_query($conn,$sql);

   if ($conn->query($sql) === TRUE) 
    {
        
        //move_uploaded_file($_FILES["image"]["tmp_name"],"assets/img/food-items/".$_FILES["image"]["name"]);
      ?>
      <?php
          echo "<script>alert('Data Updated Successfully') </script>";

    } 
  else 
    {
      ?>
        <script>
            alert("data not updated");
        </script>
      <?php
    }  
    header("Location:manage_menu.php");
  }

  else{
    return true;
  }

}

$conn->close();

?>

<div>

<form method="post" action="" class="container" enctype="multipart/form-data">  


<div class="mx-5 mt-1 mb-2 text-center">
  <p class="bg-dark text-white p-2"> Update Details</p>
</div>
    <br>
    <label for="name"><b>Food Item Name</b></label>
    <input type="text" placeholder="Enter Item Name" name="name" value="<?php echo $row["fitem_name"];?>" required>

    <label for="email"><b>Item Price</b></label>
    <input type="text" placeholder="Enter Item Price" name="price" value="<?php echo $row["fitem_price"];?>" required>

    <label for="contact"><b>Food Category</b></label>
    <input type="text" placeholder="Enter Item Category" name="f_cat" value="<?php echo $row["fcat_id"];?>" required>

    <lable for="image"><b>Upload Image</b></lable><br>
    <input type="file" name="image">
   
<div class="bttn">
<button type="submit" class="btn" onclick="Return_message()"><b>Update</b></button>
</div>

 <!-- <script> 

  function Return_message(){

  	if(!empty($_POST["contact"])&&!empty($_POST["name"])&&!empty($_POST["email"])){
    
    alert("your Record Updated Successfully.");
    // header('location:manage_user.php');
    }

  }


</script>  -->


</form>
</div>
</body>
</html>



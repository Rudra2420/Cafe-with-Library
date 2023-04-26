<?php 
session_start();
ob_start();
include ('conn/dbconn.php');
include ('include/header_admin.php');
?>

<link rel="stylesheet" type="text/css" href="css/update.css">

<?php


$ID=$_REQUEST['id'];


//$name = $email= $contact =$password="";

$b_name="SELECT * FROM books INNER JOIN book_category on books.bcat_id = book_category.bcat_id WHERE book_id=$ID ";

$result = mysqli_query($conn,$b_name);
$row = mysqli_fetch_assoc($result);




if ($_SERVER["REQUEST_METHOD"] == "POST") {


if(isset($_POST["name"]))
{
  $b_name = $_POST["name"];
}

if(isset($_POST["author"]))
{
  $b_auth =$_POST["author"];
}

if(isset($_POST["b_cat"]))
{
  $b_category = $_POST["b_cat"];
}

if(isset($_FILES['image']))
      {
  
        //   $errors= array();
        
          $file_name = $_FILES['image']['name'];
        //   $file_size = $_FILES['image']['size'];
        //   $file_tmp = $_FILES['image']['tmp_name'];
        //   $file_type = $_FILES['image']['type'];
        
        //   $file_r = explode('.',$file_name);
        //   $file_ext=strtolower(end($file_r));
        
        //   $extensions= array("jpeg","jpg","png");


        //   if(in_array($file_ext,$extensions) === false)
        //   {
        //      $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        //   }
        
        //   if($file_size < 5242880)
        //   {
        //      $errors[]='File size must be less than 5 MB';
        //   }
      }

  if(!empty($_POST["name"])&&!empty($_POST["author"])&&!empty($_POST["b_cat"]))
  {

    $destinationfile = 'assets/img/books/'.$file_name;
    move_uploaded_file($file_tmp,$destinationfile);

   $sql="UPDATE books SET book_name='$b_name',bauth_name='$b_auth',bcat_id='$b_category',book_img='$destinationfile' WHERE book_id=$ID";
   $result=mysqli_query($conn,$sql);

   if ($conn->query($sql) === TRUE) 
    {
        
        move_uploaded_file($_FILES["image"]["tmp_name"],"assets/img/books/".$_FILES["image"]["name"]);
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
    header("Location:lib_manage.php");
  }

  else{
    return true;
  }

}

$conn->close();

?>

<div >

<form method="post" action="" class="container" enctype="multipart/form-data">  


<div class="mx-5 mt-1 mb-2 text-center">
  <p class="bg-dark text-white p-2"> Update Details</p>
</div>
    <br>
    <label for="name"><b>Book Name</b></label>
    <input type="text" placeholder="Enter Book_Name" name="name" value="<?php echo $row["book_name"];?>" required>

    <label for="email"><b>Book Author</b></label>
    <input type="text" placeholder="Enter Book_Author" name="author" value="<?php echo $row["bauth_name"];?>" required>

    <label for="contact"><b>Book Category</b></label>
    <input type="text" placeholder="Enter Book_Category" name="b_cat" value="<?php echo $row["bcat_id"];?>" required>

    <lable for="image"><b>Upload Image</b></lable><br>
    <input type="file" name="image">
   
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



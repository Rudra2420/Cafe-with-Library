<?php 
ob_start();
session_start();
include ('conn/dbconn.php');
include ('include/header_admin.php');
?> 

<link rel="stylesheet" type="text/css" href="css/add.css">

<?php

$b_name = $b_auth = $b_category = "";

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
      
              $errors= array();
            
              $file_name = $_FILES['image']['name'];
              $file_size = $_FILES['image']['size'];
              $file_tmp = $_FILES['image']['tmp_name'];
              $file_type = $_FILES['image']['type'];
            
              $file_r = explode('.',$file_name);
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


      if(!empty($_POST["name"])&&!empty($_POST["author"])&&!empty($_POST["b_cat"]))
      {          
          
        $destinationfile = 'assets/img/books/'.$file_name;
        move_uploaded_file($file_tmp,$destinationfile);
        
        $sql="INSERT into books (book_name,bauth_name,bcat_id,book_img ) VALUES ('$b_name','$b_auth','$b_category','$destinationfile');";
      
        if (mysqli_query($conn,$sql)) 
        {
          move_uploaded_file($_FILES["image"]["tmp_name"],"assets/img/books/".$_FILES["image"]["name"]);
          echo '<script type="javascript" > alert("your Record Successfully saved") </script>';
          header("Location:add_books.php");
        
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

<form method="post" action="add_books.php" class="container"  enctype="multipart/form-data">  


<div class="h"><h1>Enter Item Details</h1></div>

    <label for="fi_name"><b>Item Name</b></label>
    <input type="text" placeholder="Enter Book Name" name="name" required>

    <label for="fprice"><b>Food Price</b></label>
    <input type="text" placeholder="Author Name" name="author" required>

    <label for="fcat"><b>Food Category</b></label>
    <input type="text" placeholder="Enter Category" name="b_cat" required>
    
    <lable for="image"><b>Upload Image</b></lable><br>
    <input type="file" name="image">
    
    <div class="bttn">
    <button type="submit" class="btn" onclick="Return_message()">Add New Item</button>
    </div>
<!-- <script >

  function Return_message(){

    if(!empty($_POST["fcat"])&&!empty($_POST["i_name"])&&!empty($_POST["fprice"])){
    
    alert("your Record Successfully saved.");
  
    return true;
    }
  }

</script> -->


</form>

</div>


</body>
</html>
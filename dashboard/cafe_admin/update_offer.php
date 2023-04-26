<?php 
session_start();
ob_start();
include ('conn/dbconn.php');
include ('include/header_admin.php');
?>

<link rel="stylesheet" type="text/css" href="css/update.css">

<?php


$ID=$_REQUEST['id'];


$name = $code = $category = $description = $min_ord = $discount = $exp_dat = "";

$select="SELECT * FROM offers WHERE offer_id=$ID;";

$result = mysqli_query($conn,$select);
$row = mysqli_fetch_assoc($result);




if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST["name"]))
    {
      if(!empty($_POST["name"]))
      $name = $_POST["name"];
     }
    
    if(isset($_POST["code"]))
    {
      if(!empty($_POST["code"]))
      $code =$_POST["code"];
     }
    
    if(isset($_POST["category"]))
    {
      if(!empty($_POST["category"]))
      $category = $_POST["category"];
     }
    
    if(isset($_POST["desc"]))
    {
       if(!empty($_POST["desc"]))
       $description = $_POST["desc"];
     }
    
    if(isset($_POST["min_ord"]))
    {
      if(!empty($_POST["min_ord"]))
      $min_ord = $_POST["min_ord"];
     }
    
    if(isset($_POST["discount"]))
    {
      if(!empty($_POST["discount"]))
      $discount = $_POST["discount"];
     }
    
    if(isset($_POST["exp_dat"]))
    {
      if(!empty($_POST["exp_dat"]))
      $exp_date = $_POST["exp_dat"];
     }


    if(!empty($_POST["code"])&&!empty($_POST["name"])&&!empty($_POST["category"])&&!empty($_POST["desc"])&&!empty($_POST["min_ord"])&&!empty($_POST["discount"])&&!empty($_POST["exp_dat"]))
    {
        $originalDate = $_POST["exp_dat"];
        $newDate = date("d-m-Y", strtotime($originalDate));

        $sql="UPDATE offers SET offer_name='$name',offer_category='$category',offer_code='$code',offer_desc='$description',min_ord_amt='$min_ord',disc_per='$discount',offer_expr_date='$originalDate' WHERE offer_id = $ID";
        $result=mysqli_query($conn,$sql);
        
        if ($result) 
            {
            
                echo "<script> alert('data updated'); </script>";
                header("Location:offer.php");
            } 
        else 
            {
            
                echo "<script> alert('data not updated'); </script>";
                header("Location:offer.php");
            }  
    
  }

  else{
    return true;
  }

}

$conn->close();

?>

<div >

<form method="post" action="update_offer.php" class="container">  


<div class="mx-5 mt-1 mb-2 text-center">
  <p class="bg-dark text-white p-2"> Update Details</p>
</div>
    <br>
    <label for="name"><b>Offer Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" value="<?php echo $row["offer_name"];?>" required/>

    <label for="name"><b>Offer Code</b></label>
    <input type="text" placeholder="Enter Code" name="code" value="<?php echo $row["offer_code"];?>" required/>

    <label for="name"><b>Offer Category</b></label>
    <!-- <input type="text" placeholder="Enter " name="name" required/> -->
    <br>
    <select name='category'>
      <option value='cafe_offer' selected>Cafe Offer</option>
      <option value='library_offer'>Library Offer</option>
    </select>
    <br>
    <br>
    <label for="text"><b>Description</b></label><br>
    <input type="text" placeholder="Enter Offer Description" name="desc" value="<?php echo $row["offer_desc"];?>" required/>
    
    <label for="amount"><b>Minimun Order Amount</b></label>
    <input type="text" placeholder="Enter Amount" name="min_ord" value="<?php echo $row["min_ord_amt"];?>" required/>
 
    <label for="discount"><b>Discount</b></label>
    <input type="text" placeholder="Enter Discount %" name="discount" value="<?php echo $row["disc_per"];?>" required/>

    <label for="date"><b>Expiry Date</b></label>
    <input type="date" placeholder="Enter Expiry Date" name="exp_dat" value="<?php echo $row["offer_expr_date"];?>" required/>


   
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



<?php 
ob_start();
session_start();
include ('conn/dbconn.php');
include ('include/header_admin.php');
?> 

<link rel="stylesheet" type="text/css" href="css/add.css">

<?php



$name = $code = $category = $description = $min_ord = $discount = $exp_dat = "";

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
        $new_date = date("Y-m-d",strtotime($_POST["exp_dat"]));
        $sql="INSERT INTO  offers ( offer_name ,  offer_category ,  offer_code ,  offer_desc ,  min_ord_amt ,  disc_per ,  offer_expr_date ) VALUES ('$name','$category','$code','$description','$min_ord','$discount','$new_date')";
        $result = mysqli_query($conn,$sql);   
        if (!$result) 
        {
          
            echo "<script> alert('your Record not saved...') </script>";
            header("Location:offer.php");
        
        } 
        else 
        {
      
            echo "<script>alert('Record is successfully saved...')</script>";
            header("Location:offer.php");
        }
  
    }
  
}

?>


<div>

<form method="post" action="add_offer.php" class="container">  


<div class="h"><h1>Enter Offer Details</h1></div>

    <label for="name"><b>Offer Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required/>

    <label for="name"><b>Offer Code</b></label>
    <input type="text" placeholder="Enter Code" name="code" required/>

    <label for="name"><b>Offer Category</b></label>
    <!-- <input type="text" placeholder="Enter " name="name" required/> -->
    <br>
    <select name='category'>
		<option value='Cafe Offer' selected>Cafe Offer</option>
		<option value='Library Offer'>Library Offer</option>
	</select>
    <br>
    <br>
    <label for="txtarea"><b>Description</b></label><br>
    <textarea rows="2" cols="100" placeholder="Enter Offer description" name="desc" required></textarea>
    <br>
    <br>
    <label for="amount"><b>Minimun Order Amount</b></label>
    <input type="text" placeholder="Enter Amount" name="min_ord" required/>
 
    <label for="discount"><b>Discount</b></label>
    <input type="text" placeholder="Enter Discount %" name="discount" required/>

    <label for="date"><b>Expiry Date</b></label>
    <input type="date" placeholder="Enter Expiry Date" name="exp_dat" required/>

    <div class="bttn">
        <button type="submit" class="btn" onclick="Return_message()">Add New Record</button>
    </div>

<!-- <script >

  function Return_message(){

    if(!empty($_POST["contact"])&&!empty($_POST["name"])&&!empty($_POST["email"])){
    
    alert("your Record Successfully saved.");
  
    return true;
    }
  }

</script> -->


</form>

</div>

</body>
</html>
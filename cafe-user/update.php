<?php 
	ob_start();
    session_start();
    require "includes/db.php";
	require "includes/functions.php";
    
    //require "conn/dbconn.php";
    
    $lusername2 = $_SESSION['IS_LOGIN'];
	$userqry2 = "SELECT * FROM customer WHERE cust_name = '$lusername2'";
	$userdataexe2 = mysqli_query($conn,$userqry2);
	$luserdata2 = mysqli_fetch_assoc($userdataexe2);
	$luserid2 = $luserdata2['cust_id'];
?>

<?php

$ID=$_REQUEST['id'];


$name = $email= $contact ="";

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
  header("Location:profile.php");
  
}
$conn->close();

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Cafe House</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	
	
    <link href="assets/css/style.css" rel="stylesheet" />
	

	
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="#f8f9fa">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    <?php require "includes/side_wrapper.php"; ?>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed" style="background: #F8f9fa;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar" style="background: #000;"></span>
                        <span class="icon-bar" style="background: #000;"></span>
                        <span class="icon-bar" style="background: #000;"></span>
                    </button>
                    <?php
                        // $namequery = "SELECT *FROM customer WHERE cust_id = $_SESSION[$luserid]";
                    ?>
                    <a class="navbar-brand" style="color: #000;font-family: 'satisfy'; font-size: 28px;">Hello <?php echo $lusername2 ?> ?></a>
                </div>
                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="logout.php" style="color: #000;">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">Update Form</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="">
                                    
									
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="color: #333">Name</label>
                                                <input type="text" autofocus name="name" class="form-control" value="<?php echo $row["cust_name"];?>" placeholder="Enter Name" />
                                            </div>
                                        </div>
                                    </div>
									
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="color: #333">Email ID</label>
                                                <input type="text" name="email" class="form-control" value="<?php echo $row["cust_email"];?>" placeholder="Enter Email Price" />
                                            </div>
                                        </div>
                                    </div>
									
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="color: #333">Mobile Number</label>
                                                <input type="text" name="contact" class="form-control" value="<?php echo $row["cust_mob"];?>" placeholder="Enter Mobile No." />
                                            </div>
                                        </div>
                                    </div>
									
                                    <input type="submit" name="submit" style="background: #FF5722; border: 1px solid #FF5722" value="Update Details" class="btn btn-info btn-fill pull-right" />
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        

        

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!-- <script src="assets/js/bootstrap-notify.js"></script>                            -->
    <!--  Notifications Plugin    -->
    <script src="assets/js/chartist.min.js"></script>

    <!--  Google Maps Plugin    -->
    <script src="https://kit.fontawesome.com/d65000b73d.js" crossorigin="anonymous"></script>
    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
	
	<!-- <script type="text/javascript">
    	$(document).ready(function(){
			
			/*notice = $("#notify").val();
			
			//alert(notice);
			
        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: notice

            },{
                type: 'danger',
                timer: 7000
            });

    	});*/
	</script> -->

</html>

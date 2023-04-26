<?php
session_start();
include_once('../database/dbconn.php');
include_once('../database/function.php');
?>

<!doctype html>
<html lang="en">
<head>

	<meta charset="utf-8" />

	<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> -->
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<title>Admin_Staff</title>

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

<div class="login_wrapper">
	
	<div class="login_holder">
			
		<form method = "post">
			
			<div class="header">
				<h4 style="border-bottom: 1px solid #FF5722;" class="title">Login Form</h4>
			</div>
			
			<div class="form-group" method="post" action="#">
				<label>Useremail</label>
				<input type="text" name="luseremail" class="form-control" placeholder="Enter Useremail" autofocus>
			</div>
			
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="luserpass" class="form-control" placeholder="Enter your password">
			</div>
			
		
			<input type="submit" name="login" value="Login" class="btn btn-info btn-fill pull-right" style="background: #FF5722; border-color: #FF5722;" />
			<div class="clearfix"></div>
			
		</form>
		
	</div>
	
</div>

<?php

if(isset($_POST['login']))
    {
		$lusername2	= $_POST['luseremail'];
		$luserpass2	= $_POST['luserpass'];
		
		$sql1 = "SELECT * FROM cafe_admin WHERE adm_email='$lusername2' AND adm_pwd='$luserpass2' ";
		$res1 = mysqli_query($conn,$sql1);
		
		if(mysqli_num_rows($res1)>0)
		{
			$row1 = mysqli_fetch_assoc($res1);
			$_SESSION['ADM_LOGIN'] = $row1['adm_email'];
			redirect('cafe_admin/index.php');
		}
		else if(isset($_POST['login']))
		{		
			$sql2 = "SELECT * FROM staff WHERE stf_email='$lusername2' AND stf_pwd='$luserpass2' ";
			$res2 = mysqli_query($conn,$sql2);
		
			if(mysqli_num_rows($res2)>0)
			{
				$row2 = mysqli_fetch_assoc($res2);
				$_SESSION['STF_LOGIN'] = $row2['stf_email'];
				redirect('cafe_staff/index.php');
			}
			else
			{
				echo"<script>";
				echo"alert('Please enter valid login details')";
				echo"</script>";
			}
		}
		
    }
    

?>

</body>
</html>
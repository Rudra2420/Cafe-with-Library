<?php 
	
	session_start();
	require "includes/functions.php";
    require "includes/db.php";
    //require "conn/dbconn.php";
    
    $lusername2 = $_SESSION['IS_LOGIN'];
	$userqry2 = "SELECT * FROM customer WHERE cust_name = '$lusername2'";
	$userdataexe2 = mysqli_query($conn,$userqry2);
	$luserdata2 = mysqli_fetch_assoc($userdataexe2);
	$luserid2 = $luserdata2['cust_id'];
	
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
                    <a class="navbar-brand" style="color: #000;font-family: 'satisfy'; font-size: 28px;">Hello <?php echo $lusername2 ?></a>
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
                                <h4 class="title text-center">Subscription Details</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                            <form method="post" action="">
                            <table class='table table-hover'>
                                <thead>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Order Date</th>
                                    <th>Expiry</th>
                                </thead>
						    <tbody> 
                                <?php 

                                    $sql_query2 = "SELECT * FROM cust_subs_ord WHERE cust_id = $luserid2";
                                    $sql_query2exe = mysqli_query($conn,$sql_query2);
                                    $fetchcust = mysqli_fetch_assoc($sql_query2exe);
                                    $cust_subs_id = $fetchcust['subs_id'];

                                    // $sql_query = "SELECT * from lib_subscription INNER JOIN cust_subs_ord on lib_subscription.subs_id = (cust_subs_ord.subs_id = $cust_subs_id)";
                                   if(isset($cust_subs_id))
                                   {

                                   
                                    $subs_name_qry = "SELECT subs_plan_name FROM lib_subscription WHERE subs_id = $cust_subs_id";
                                    $result6 = mysqli_query($conn,$subs_name_qry);
                                    $name = mysqli_fetch_assoc($result6);
                                    $subs_name = $name['subs_plan_name'];


                                    $sql_query ="SELECT * FROM cust_subs_ord WHERE subs_id = $cust_subs_id";
                                    
                                    $result = mysqli_query($conn,$sql_query);
                                   
                                    if(mysqli_num_rows($result) > 0)
                                    {

                                    
                                    while($row = mysqli_fetch_assoc($result)) 
                                    {
                                        $new_ord_date = date("d-m-Y", strtotime($row["subs_ord_date"]));
                                        $ord_expr_date = date("d-m-Y", strtotime($row["cust_subs_epr_date"]));
                                    ?>
                                    <tr>
                                        
                                        <th scope="col"><?php echo $subs_name; ?></th>
                                        <th scope="col"><?php echo $row["subs_ord_amt"]; ?></th>
                                        <th scope="col"><?php echo $new_ord_date; ?></th>
                                        <th scope="col"><?php echo $ord_expr_date; ?></th>
                                               
                                    </tr>
                                    <?php    
                                }
                            }
                        }
                            else
                            {
                                echo "<p class='text-center'>You have no subscription right now<p>";
                            }
                                ?>
                            </tbody>
                            <table>  
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
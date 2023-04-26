<?php
session_start();
include_once('../database/dbconn.php');
include_once('../database/function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/login-registration.css">

    <title>Sign in & Sign up Form</title>
    

</head>

<body>
    <div class="main_container">
        <div class="forms-container">
            <div class="signin-signup">

                <form id="signinfrm" method="post" class="sign-in-form">

                    <h2 class="title">Sign in</h2>

                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="email" placeholder="Email" name="luseremail" required />
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="luserpass" required />
                    </div>

                    <input type="submit" value="Login" name="login" class="btn">

                </form>




                <form id="signupfrm" method="post" class="sign-up-form">

                    <h2 class="title">Registration</h2>

                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" id="uname" placeholder="Username" name="username" autocomplete="off"
                            required />
                    </div>
                    <span id="username" style="color: red; font-weight: bold;" ></span>

                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="uemail" placeholder="Email" name="useremail" autocomplete="off"
                            required />
                    </div>
                     <span id="useremail" style="color: red; font-weight: bold;" ></span>

                    <div class="input-field">
                        <i class="fas fa-phone-alt"></i>
                        <input type="text" maxlength="10" id="uphone" placeholder="Phone Number" name="userphn" autocomplete="off"
                            required />
                    </div>
                    <span id="userphoneno" style="color: red; font-weight: bold;" ></span>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="upass" placeholder="Password" name="userpass" autocomplete="off"
                            required />
                    </div>
                    <span id="userpass" style="color: red; font-weight: bold;" ></span>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="ucfpass" placeholder="Confirm Password" name="usercfpass"
                            autocomplete="off" required />
                    </div>
                    <span id="usercfpass" style="color: red; font-weight: bold;" ></span>

                    <input type="submit" id="rgistbtn" class="btn" name="registration" value="Registration">

                </form>
            </div>
        </div>




        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here ?</h3><br>

                    <button class="btn transparent" id="sign-up-btn">
                        Sign up
                    </button>
                </div>
                <img src="img/hot-beverage.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One Of Our User?</h3><br>

                    <button class="btn transparent" id="sign-in-btn">
                        Sign in
                    </button>
                </div>
                <img src="img/coffee-break.svg" class="image" alt="" />
            </div>
        </div>
    </div>

    <?php
	

	if (isset($_POST['registration'])) {
		$uname 		= mysqli_real_escape_string($conn,$_POST['username']);
		$uemail 	= mysqli_real_escape_string($conn,$_POST['useremail']);
		$uphn 		= mysqli_real_escape_string($conn,$_POST['userphn']);
		$upass 		= mysqli_real_escape_string($conn,$_POST['userpass']);
        $ucfpass    = mysqli_real_escape_string($conn,$_POST['usercfpass']);
		
		$pass = password_hash($upass,PASSWORD_BCRYPT);
        $cfpass = password_hash($ucfpass,PASSWORD_BCRYPT);

        $emailqry = "SELECT * FROM customer WHERE cust_email='$uemail'";
        $emailqryexe = mysqli_query($conn,$emailqry);

        $emailcount = mysqli_num_rows($emailqryexe);
    
    if ($emailcount>0) {
            echo"<script>";
            echo "alert('Email is already exists')";
            echo"</script>";
    }
    else{
      if($upass === $ucfpass){

        $insqry  =  "INSERT INTO customer (cust_name, cust_mob, cust_email, cust_pwd) VALUES ('$uname', $uphn, '$uemail', '$pass')"; 

        $exe = mysqli_query($conn,$insqry);

        if (!$exe) {
            // echo"<script>";
            echo "<script>alert('Registration is Failed')</script>";
            // echo"</script>";
          }
          else{
            // echo"<script>";
            echo "<script>alert('Registration Successful')</script>";
            // echo"</script>";
          }

      }else{
            // echo"<script>";
            echo "<script>alert('Passwords are not matching')</script>";
            // echo"</script>";
      }
    }
		
	}


    if(isset($_POST['login']))
    {
		$luseremail	= $_POST['luseremail'];
		$luserpass	= $_POST['luserpass'];

        $email_search = "SELECT * from customer WHERE cust_email = '$luseremail'";

        $exeqry = mysqli_query($conn, $email_search);

        $email_count = mysqli_num_rows($exeqry);
    
        if ($email_count) 
        {
            $email_pass = mysqli_fetch_assoc($exeqry);

            $db_pass = $email_pass['cust_pwd'];

            $pass_decode = password_verify($luserpass, $db_pass);
            
            $_SESSION['IS_LOGIN'] = $email_pass['cust_name'];

            if ($pass_decode) 
            {
            //   echo"<script>"; 
            echo"<script>alert('Login Successful')</script>";
            //   echo "<script>location.replace('../indexex.php')</script>";
            //   echo"</script>";
            redirect('../index.php');

            }
            else
            {
            //   echo"<script>";
            echo"<script>alert('Password is incorrect')</script>";
            //   echo"</script>";
            }
        }else
        {
            // echo"<script>";
            echo"<script>alert('Email is invalid')</script>";
            // echo"</script>";
        } 
		
	}

	
    
	
	
 ?>


    <script>
    
    const sign_in_btn = document.querySelector("#sign-in-btn");
    const sign_up_btn = document.querySelector("#sign-up-btn");
    const container = document.querySelector(".main_container");

    sign_up_btn.addEventListener("click", () => {
        container.classList.add("sign-up-mode");
    });

    sign_in_btn.addEventListener("click", () => {
        container.classList.remove("sign-up-mode");
    });

    </script>






</body>
</html>
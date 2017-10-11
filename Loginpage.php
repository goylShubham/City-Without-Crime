<!DOCTYPE html>
<html>
<?php
	include("config.php");
	session_start();
    include("signup.php");
	
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form 
      if(isset($_POST['signin'])){
      $username = mysqli_real_escape_string($db,$_POST['username']);
      $password = mysqli_real_escape_string($db,$_POST['password']); 
            $sql = "SELECT userid FROM userinfo WHERE usermail = '$username' and password = '$password'";
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
            $count = mysqli_num_rows($result);
            if($count == 1) {
            $_SESSION['login_user'] = $username;
            header("location:Homepage.php");
            }else {
                $login_error = "Your E-mail or Password is invalid";
               // echo "<meta http-equiv=\"refresh\" content=\"2;URL=Loginpage.php\">";
            }
      }
      }
?>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>login- City Without Crime</title>

	<link rel="stylesheet" href="css/Loginpage.css">
	<script src="jquery-1.2.6.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){

                $("#create").click(function(){
                    if ($("#signupform").is(":hidden")){
                        $("#signupform").slideDown("slow");
                        $("#signinform").slideUp("slow");
                    
                    }
                    else{
                        $("#signupform").slideUp("slow");
                        $("#signinform").slideDown("slow");
                        
                    }
                });
                
            });
			function closeForm(){
                setTimeout('$("#signupform").slideUp("slow")', 10000);
           }
            
            
        </script>
		<style>
			
            #signupform
            {
            	display:none;
            }
            
		</style>

</head>
<body style="background-image:url('images/city.jpg');">


	<header>
		<h1>City Without Crime</h1>
		<a href="adminloginpage.php">Admin Login</a>
    </header>

    <div class="main-content">

        <!-- You only need this form and the form-login.css -->

        <div class="form-login-container">
        

            <div id="signinform">
            <h1>Login</h1>

            <form class="form-login" method="post" action="#">

                <div class="form-row">
                    <input type="email" name="username" required="true" placeholder="Enter Your E-mail Here" />
                </div>

                <div class="form-row">
                    <input type="password" name="password" required="true" placeholder="Enter Your Password Here" />
                </div>

                <div class="form-row form-last-row">
                    <button name="signin" type="submit">Sign in</button>
                </div>
                <p style="color:red;"><?php if(isset($login_error)){ echo $login_error; } ?></p>
				<p style="color:greenyellow;"><?php if(isset($msg)){ echo $msg; } ?></p>
                <p style="color:red;"><?php if(isset($error_msg)){ echo $error_msg; } ?></p>

            </form>
            </div>
			<a href="#" class="form-create-an-account" id="create">Create an account &rarr;</a>
			<div id="signupform">
			<form class="form-login" method="post">
				<div class="form-row">
                    <input type="email" name="uusername" required="true" placeholder="Enter Your E-mail " />
                </div>
				
				<div class="form-row">
                    <input type="password" name="upassword" required="true" placeholder="Enter Your Password " />
                </div>
				
				<div class="form-row">
                    <input type="text" name="ufullname" required="true" placeholder="Enter Your Full Name " />
                </div>
				
				<div class="form-row">
                    <input type="text" name="umobile" required="true" placeholder="Enter Your Mobile Number " />
                </div>
				
				<div class="form-row">
                    <textarea type="address" name="uaddress" rows="5" required="true" placeholder="Enter Your Address"></textarea>
                </div>
				
				<div class="form-row form-last-row">
                    <button name="usignup" type="submit" onClick="closeForm();">Sign up</button>
                </div>
                <p style="color:green;"><?php if(isset($msg)){ echo $msg; } ?></p>
                <p style="color:red;"><?php if(isset($error_msg)){ echo $error_msg; } ?></p>
                
			</form>
			</div >
			</div>
        </div>
		<footer>
			&copy;All right resrved to CWC.
	</footer>


    </div>
	

</body>
</html>
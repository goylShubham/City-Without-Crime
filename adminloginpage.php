<!DOCTYPE html>
<html>
<?php
	include("config.php");
	session_start();
    include("PStationlogin.php");
	
    
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
                    if ($("#adminform").is(":hidden")){
                        $("#adminform").show("slow");
                        $("#stationform").hide("slow");
                    }
                    else{
                        $("#adminform").hide("slow");
                        $("#stationform").show("slow");
                    }
                });
                
            });
            
            
        </script>
		<style>
			
            #adminform
            {
            	display:none;
            }
		</style>

</head>
<body style="background-image:url('images/1.jpg');">


	<header>
		<h1>City Without Crime</h1>
		<a href="Loginpage.php">Back</a>
    </header>

    <div class="main-content">

        <!-- You only need this form and the form-login.css -->

        <div class="form-login-container">

            <div id="stationform">
            <h1>Station Login</h1>

            <form class="form-login" method="post" action="#">
			
				<div class="form-row">
                        <select name="police_station">
                        <option selected value="" >Select Police Station</option>
                        <?php
                        $query = 'SELECT `PStation_Id`,`PStation_Name`FROM `police_station_master`';
                        $result = mysqli_query($db,$query);
                        while ($row = mysqli_fetch_array($result)) {
                            echo ' <option value="' . $row[0] . '">' . $row[1] . '</option>';
                        }
                        ?>
                        </select>
                </div>

                <div class="form-row">
                    <input type="text" name="stationid" required="true" placeholder="Enter Station ID" />
                </div>

                <div class="form-row">
                    <input type="password" name="stationpassword" required="true" placeholder="Enter Password" />
                </div>

                <div class="form-row form-last-row">
                    <button name="stationin" type="submit">Sign in</button>
                </div>
                <p style="color:red;"><?php if(isset($slogin_error)){ echo $slogin_error; } ?></p>
                <p style="color:red;"><?php if(isset($login_error)){ echo $login_error; } ?></p>

            </form>
            </div>
			<a href="#" class="form-create-an-account" id="create">Admin Login &rarr;</a>
			<div id="adminform">
			<form class="form-login" id="" method="post" action="#">
				<div class="form-row">
                    <input type="text" name="adminid" required="true" placeholder="Enter Your ID  " />
                </div>
				
				<div class="form-row">
                    <input type="password" name="adminpassword" required="true" placeholder="Enter Your Password " />
                </div>
				
				<div class="form-row form-last-row">
                    <button name="adminin" type="submit" onclick="closeForm()">Sign in</button>
                </div>
				
			</div >
			</div>
        </div>
		<footer style="margin-top:17%">
			&copy;All right resrved to CWC.
	</footer>


    </div>
	

</body>
</html>
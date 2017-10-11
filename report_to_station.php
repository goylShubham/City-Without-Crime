<!DOCTYPE html>
<html>

<head>
<?php
    
    include('adminsession.php');
	if($_SERVER["REQUEST_METHOD"] == "POST"){ 
		if(isset($_POST['send_report'])){
		$Report = mysqli_real_escape_string($db,$_POST['Report']); 
		$police_station=$_POST['police_station'];
		$sql="INSERT INTO `reports`(`from_id`, `to_id`, `report`,`date`) VALUES ('adminhq','$police_station','$Report',now())";
		$result=mysqli_query($db,$sql);
		if($result){
			$msg= "Report sends successfully";
			echo "<meta http-equiv=\"refresh\" content=\"2;URL=report_to_station.php\">";
		}else{
			$error_msg="Report Not sends successfully";
			echo "<meta http-equiv=\"refresh\" content=\"2;URL=report_to_station.php\">";
		}
		}
mysqli_close($db);		
	}

?>

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<title>Report To Station - City Without Criminals</title>

	<link rel="stylesheet" href="css/admin_report.css" />
	

</head>
<body style="background-image:url('images/1.jpg');">

	<header>
		<?php echo "<h1>".$login_session."&nbsp;Admin</h1>"; ?><br />
        <a href="logout.php" title="logout">logout</a>
    </header>

    <ul>
        <li><a href="admin.php">Complaints</a></li>
        <li><a href="admin_add_station.php">Police Station</a></li>
        <li><a class="active">Reports</a></li>
        <li><a href="manage_records.php">Manage Records</a></li>
        <li><a href="emergency.php">Emergency</a></li>
    </ul>

    <div class="main-content">

        <div class="form-mini-container">


            <h1>Report To Stations</h1>

            <form class="form-mini" method="post" action="#">

                <div class="form-row">
                    <label>
                        <select name="police_station" required="true">
							<option selected value="" >select police station</option>
							<option value="mt1" >Model Town</option>
							<option value="cl2" >Civil Lines</option>
							<option value="ml3" >Multaniya</option>
							<option value="pt4" >Purana Thana</option>
							<option value="tr5" >Tharmal</option>
						</select>
                    </label>
                </div>

                

                        <div>
                            <label>
                                <textarea name="Report" rows="10" cols="20"required="true" placeholder="Enter text here" ></textarea>
                            </label>
                        </div>


                <div class="form-row form-last-row">
                    <button type="submit" name="send_report">Send</button>
                </div>
				<div class="form-row">
					<p style="color:yellowgreen;"><?php if(!empty($msg)){ echo $msg;} ?></p>
					<p style="color:red;"><?php if(!empty($error_msg)){ echo $error_msg;} ?></p>
				</div>

            </form>
        </div>


    </div>
	 <footer>
        &copy;All right resrved to CWC.
    </footer>

</body>

</html>

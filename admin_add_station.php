<!DOCTYPE html>
<html lang="en">  
<?php
include('adminsession.php');

if (isset($_POST['add']))  {
            $pstation_id = $_POST['pstation_id'];
            $pstation_name = $_POST['pstation_name'];
            $pstation_head = $_POST['pstation_head'];
            $pstation_phone = $_POST['pstation_phone'];
            $pstation_mobile = $_POST['pstation_mobile'];
            $pstation_address = $_POST['pstation_address'];
            $pstation_password = $_POST['pstation_password'];
            
            $query = "INSERT INTO `police_station_master`(`PStation_Id`, `PStation_Name`, `Address`, `Phone`, `Mobile`, `PStation_Head`, `Password`) 
            VALUES ('$pstation_id','$pstation_name','$pstation_address','$pstation_phone','$pstation_mobile','$pstation_head','$pstation_password')";
            $result = mysqli_query($db, $query);
            if ($result) {
                $msg = 'Police Station Added Succesfully';
                echo "<meta http-equiv=\"refresh\" content=\"3;URL=admin_add_station.php\">";
            } else {
                $error_msg = 'Can\'t added. Already Existed';
                echo "<meta http-equiv=\"refresh\" content=\"3;URL=admin_add_station.php\">";
            }
}

if (isset($_POST['find'])) {
    $pstation_id = mysqli_real_escape_string($db, $_POST['pstation_id']);
    $query = "SELECT * FROM `police_station_master` WHERE `PStation_Id` ='$pstation_id'";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    $row = mysqli_fetch_array($result);
    if (!$row) {
        $error_msg = 'Record Not Found';
        echo "<meta http-equiv=\"refresh\" content=\"3;URL=admin_add_station.php\">";
    }

}

if (isset($_POST['update'])) {
    $pstation_id = $_POST['pstation_id'];
    $pstation_name = $_POST['pstation_name'];
    $pstation_head = $_POST['pstation_head'];
    $pstation_phone = $_POST['pstation_phone'];
    $pstation_mobile = $_POST['pstation_mobile'];
    $pstation_address = $_POST['pstation_address'];
    $pstation_password = $_POST['pstation_password'];

$query = "UPDATE `police_station_master` SET `PStation_Id`='$pstation_id',`PStation_Name`='$pstation_name',`Address`='$pstation_address',
        `Phone`='$pstation_phone',`Mobile`='$pstation_mobile',`PStation_Head`='$pstation_head',`Password`='$pstation_id'";
$result = mysqli_query($db, $query) or die(mysqli_error($db));
if ($result) {
    $msg = 'Record updated succesfully.';
    echo "<meta http-equiv=\"refresh\" content=\"3;URL=admin_add_station.php\">";
    } else {
        $error_msg = 'Update cannot completed.';
        echo "<meta http-equiv=\"refresh\" content=\"3;URL=admin_add_station.php\">";
    }
}

if(isset($_POST['delete'])) {
    $pstation_id = $_POST['$pstation_id'];
    $query = "DELETE FROM `police_station_master` WHERE  `police_station_master`.`PStation_Id` = '$pstation_id'";
    $result = mysqli_query($db,$query) or die(mysqli_error($db));
    if ($result) {
        $msg = 'Deleted Successfully!.';
        echo "<meta http-equiv=\"refresh\" content=\"3;URL=admin_add_station.php\">";
    } else {
        $error_msg = 'Not Deleted!';
        echo "<meta http-equiv=\"refresh\" content=\"3;URL=admin_add_station.php\">";
    }
}

?>
<head>    
<meta charset="utf-8" />
    <title>Manage Police Station-City Without Crime</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <link rel="stylesheet" href="css/admin_record.css"/>
     <link rel="stylesheet" href="css/w3.css"/>
<script type="text/javascript">
function validate() {
    if(document.stationForm.pstation_id.value == "") {
        alert("Please provide police station ID!");
        document.stationForm.pstation_id.focus();
        return false;
    }
    if(document.stationForm.pstation_name.value == "") {
        alert("Please provide police station name!");
        document.stationForm.pstation_name.focus();
        return false;
    }
    if(document.stationForm.pstation_head.value == "") {
        alert("Please provide police station Head name!");
        document.stationForm.pstation_head.focus();
        return false;
    }
    if(document.stationForm.pstation_phone.value == "") {
        alert("Please provide police station phone number!");
        document.stationForm.pstation_phone.focus();
        return false;
    }
    if(document.stationForm.pstation_address.value == "") {
        alert("Please provide police station Address!");
        document.stationForm.pstation_address.focus();
        return false;
    }
    if(document.stationForm.pstation_mobile.value == "") {
        alert("Please select police station MObile No.!");
        document.stationForm.pstation_mobile.focus();
        return false;
    }
    if(document.stationForm.pstation_password.value == "") {
        alert("Please provide police station Password!");
        document.stationForm.pstation_password.focus();
        return false;
    }
    return(true);
}

function see_detail() {
    if(document.stationForm.pstation_id.value == "") {
        alert("Please provide police station ID!");
        document.stationForm.pstation_id.focus();
        return false;
    }
    return (true);
} 
function del_detail() {
    if(document.stationForm.pstation_id.value == "") {
        alert("Please provide police station ID!");
        document.stationForm.pstation_id.focus();
        return false;
    }
    return (true);
} 


</script>
</head>
<body style="background-image:url('images/1.jpg');">
    <header>
		<?php echo "<h1>".$login_session."&nbsp;Admin</h1>"; ?><br />
        <a href="logout.php" title="logout">logout</a>
    </header>
    
    <ul>
        <li><a href="admin.php">Complaints</a></li>
        <li><a class="active">Police Station</a></li>
        <li><a href="report_to_station.php">Reports</a></li>
        <li><a href="manage_records.php">Manage Records</a></li>
        <li><a href="emergency.php">Emergency</a></li>
    </ul>
    
    <div class="main-content">
    
        <form  class="form-register" method="post" action="#" name="stationForm">

            <div class="form-register-with-email">

                <div class="form-white-background">

                    <div class="form-title-row">
                        <h2>Manage Police Stations</h2>
    
                    </div>
                    <?php  if(!empty($msg)) { ?>
                            <p class="w3-green"><?php  echo $msg; ?></p>
                    <?php } ?>
                    <?php  if(!empty($error_msg)) { ?>
                            <p class="w3-red"><?php echo $error_msg;   ?></p>
                    <?php } ?>
    
                    <div class="form-row">
                        <label>
                            <span>Police Station ID</span>
                            <input type="text" name="pstation_id" value="<?php if (!empty($row[0])) { echo $row[0]; } ?>" />
                            <button type="submit" name="find" onclick="return(see_detail());" style="position: relative;">Find</button>
                            
                        </label>
                    </div>
                    
                    <div class="form-row">
                        <label>
                            <span>Police Station Name</span>
                            <input type="text" name="pstation_name" id="pstation_name"value="<?php if (!empty($row[1])) { echo ucwords($row[1]); } ?>"/>
                        </label>
                    </div>
                    
                    <div class="form-row">
                        <label>
                            <span>Police Station Head</span>
                            <input type="text" name="pstation_head" id="pstation_head" value="<?php if (!empty($row[5])) { echo ucwords($row[5]); } ?>"/>
                        </label>
                    </div>
                    
                    <div class="form-row">
                        <label>
                            <span>Police Station Phone</span>
                            <input type="tel" name="pstation_phone" id="pstation_phone" value="<?php if (!empty($row[3])) { echo $row[3]; } ?>"/>
                        </label>
                    </div>
                    
                    <div class="form-row">
                        <label>
                            <span>Police Station Mobile</span>
                            <input type="tel" name="pstation_mobile" id="pstation_phone" value="<?php if (!empty($row[4])) { echo $row[4]; } ?>"/>
                        </label>
                    </div>
                    
                    <div class="form-row">
                        <label>
                            <span>Police Station Address</span>
                            <textarea name="pstation_address" id="pstation_address" rows="3" cols="26" style="resize: none;"><?php if (!empty($row[2])) { echo ucwords($row[2]); } ?></textarea>
                        </label>
                    </div>
                    
                    <div class="form-row">
                        <label>
                            <span>Police Station Password</span>
                            <input type="text" name="pstation_password" id="pstation_password" value="<?php if (!empty($row[6])) { echo ucwords($row[6]); } ?>" autocomplete="off"/>
                        </label>
                    </div>
                    
                    <div class="form-row w3-center">
                        <button type="submit" name="add" value="Add" onclick="return(validate());">Add</button>
                        <button type="submit" name="update" value="Update" onclick="return(validate());">Update</button>
                        <button type="submit" name="delete" value="Delete" onclick="return(del_detail());">Delete</button>
                    </div>
                    
                    </div>

                </div>

        </form>

    </div>

    </section>
    <footer>
        <div class="footer">
			&copy;All right resrved to CWC.
		</div>
    </footer>
</body>
</html>
   
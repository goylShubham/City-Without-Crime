<!doctype html>
<html>
<head>
<?php
    
    include('adminsession.php');
    include('admin_manage_record.php');
    
?>
    <title>Manage Record-City Without Crime</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <link rel="stylesheet" href="css/admin_record.css"/>
     <link rel="stylesheet" href="css/w3.css"/>
     <script>
        function clearform()
{
    document.getElementById("CriminalID").value=""; //don't forget to set the textbox id
    document.getElementById("CriminalName").value="";
    document.getElementById("gender").value="";
    document.getElementById("height").value="";
    document.getElementById("weight").value="";
    document.getElementById("PStationId").value="";
    document.getElementById("level").value="";
    document.getElementById("status").value="";
    document.getElementById("gender").value="";
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
        <li><a href="admin_add_station.php">Police Station</a></li>
        <li><a href="report_to_station.php">Reports</a></li>
        <li><a class="active">Manage Records</a></li>
        <li><a href="emergency.php">Emergency</a></li>
    </ul>
         <div class="main-content">

        <form  class="form-register" method="post" action="#" enctype="multipart/form-data">

            <div class="form-register-with-email">

                <div class="form-white-background">

                    <div class="form-title-row">
                        <h1>Manage Criminal Records</h1>
                    </div>
                    <?php  if(!empty($msg)) { ?>
                            <p class="w3-green"><?php  echo $msg; ?></p>
                    <?php } ?>
                    <?php  if(!empty($error_msg)) { ?>
                            <p class="w3-red"><?php echo $error_msg;   ?></p>
                    <?php } ?>
                    <div class="form-row">
                        <label>
                            <span>Criminal ID</span>
                            <input type="text" name="CriminalID" id="CriminalID" required="true" value="<?php if(isset($row[0])){ echo $row[0]; } ?>" />
                            <button type="submit" name="find" style="position: relative;">Find</button>
                            
                        </label>
                        
                    </div>
                        
                    <div class="form-row">
                        <label>
                            <span>Criminal Name</span>
                            <input type="text" name="CriminalName" id="CriminalName" value="<?php if(isset($row[1])){ echo $row[1]; } ?>" />
                        </label>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>Gender</span>
                            <select name="gender">
                                <option>Select gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Others</option>
                            </select>
                            <input id="gender" readonly  value="<?php if(isset($row[2])){ echo $row[2]; } ?>" />
                        </label>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>Height</span>
                            <input type="number" name="height" placeholder="In inches" id="height" value="<?php if(isset($row[3])){ echo $row[3]; } ?>" />
                        </label>
                    </div>
                    
                    <div class="form-row">
                        <label>
                            <span>Weight</span>
                            <input type="number" name="weight" placeholder="In Kg" id="weight" value="<?php if(isset($row[4])){ echo $row[4]; } ?>" />
                        </label>
                    </div>
                    
                    <div class="form-row">
                        <label>
                            <span>PStation ID</span>
                            <input type="text" name="PStationID" id="PStationId" value="<?php if(isset($row[5])){ echo $row[5]; } ?>" />
                        </label>
                    </div>
                    
                    <div class="form-row">
                        <label>
                            <span>Crime Level</span>
                            <input type="text" name="crimelevel" id="level" value="<?php if(isset($row[6])){ echo $row[6]; } ?>" />
                        </label>
                    </div>
                    
                    <div class="form-row">
                        <label>
                            <span>Status</span>
                            <input type="text" name="status" id="status"  value="<?php if(isset($row[7])){ echo $row[7]; } ?>" />
                        </label>
                    </div>
                    
                    <div class="form-row">
                        <div id="picture" class="form-row w3-center"><?php if(isset($row[8])){ echo '<img height="200" width="200" src="data:image;base64,'.$row[8].' ">';} ?></div>
                        <label>
                            <span>Picture</span>
                            <input type="file" name="image" value="browse"/>
                        </label>
                    </div>

                    <div class="form-row w3-center">
                        <button type="submit" name="add">Add</button>
                        <button type="submit" name="update">Update</button>
                        <button type="submit" name="delete">Delete</button>
                        <button type="submit" name="updatepic">Update Picture</button>
                        <input type="submit" value="Clear" onClick="clearform();"/>
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

 
 


</div>
</body>
</html>
   
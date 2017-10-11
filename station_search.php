<!DOCTYPE html>
<html>

<head>
    <?php
    include('adminsession.php');
    if(isset($_POST['find'])){
        $CriminalID = mysqli_real_escape_string($db,$_POST['search']);
        $qry = "select * from criminal_master where Criminal_ID = '$CriminalID' or Name = '$CriminalID'";
        $result = mysqli_query($db,$qry);
        $row = @mysqli_fetch_array($result);
        if($row){
            
        }else{
            $error_msg = "Record Not found";
             echo "<meta http-equiv=\"refresh\" content=\"2;URL=station_search.php\">";
        }
    }
?>

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/station_search.css"/>
  

	<title>Search Criminal - <?php echo $login_session ?></title>
    

</head>
<body style="background-image:url('images/wood.jpg');">


	<header>
		<?php echo "<h1>".$login_session."&nbsp;Police Station</h1>"; ?><br />
        <a href="logout.php" title="logout">logout</a>
        
    </header>

    <ul>
        <li><a href="station_criminals.php">&#8678;</a></li>
        
    </ul>
    
        
        <form  class="form-basic" method="post" action="#" enctype="multipart/form-data">

          
                    <div class="form-title-row">
                       <input type="search" name="search" placeholder="Enter Criminal ID or Full Name" />
                       <button type="submit" name="find">Search</button><br />
                       <?php if(!empty($error_msg)){echo $error_msg;} ?>
                    </div>
                    
                   
                        
                    </div>
                    
                    <div class="form-row">
                       <div class="form-row"><?php if(isset($row[8])){ echo '<img height="200" width="200" src="data:image;base64,'.$row[8].' ">';} ?></div>
                    </div>
                    <div class="form-row">
                    <table cellspacing="25" cellpadding="20" style="display:inline-block;" class="form-row">
                    <?php if(isset($row[1])){ echo "<tr><td style='text-align:right;'>Criminal ID:</td><td style='color:#4c565e; text-align:left;'>". $row[0]."</td></tr>"; } ?>                        
                    <?php if(isset($row[1])){ echo "<tr><td style='text-align:right;'>Criminal Name:</td><td style='color:#4c565e; text-align:left;'>". $row[1]."</td></tr>"; } ?>                        
                    <?php if(isset($row[2])){ echo "<tr><td style='text-align:right;'>Gender:</td><td style='color:#4c565e; text-align:left;'>". $row[2]."</td></tr>"; } ?>                    
                    <?php if(isset($row[3])){ echo "<tr><td style='text-align:right;'>Height:</td><td style='color:#4c565e; text-align:left;'>" .$row[3]."&nbsp;inch</td></tr>"; } ?>                     
                   	<?php if(isset($row[4])){ echo "<tr><td style='text-align:right;'>Weight:</td><td style='color:#4c565e; text-align:left;'>". $row[4]."&nbsp;Kg</td></tr>"; } ?>                        
                    <?php if(isset($row[5])){ echo "<tr><td style='text-align:right;'>PStation ID:</td><td style='color:#4c565e; text-align:left;'>". $row[5]."</td></tr>"; } ?>                      
                    <?php if(isset($row[6])){ echo "<tr><td style='text-align:right;'>Crime Level:</td><td style='color:#4c565e; text-align:left;'>". $row[6]."</td></tr>"; } ?>                        
                    <?php if(isset($row[7])){ echo "<tr><td style='text-align:right;'>Status:</td><td style='color:#4c565e; text-align:left;'>". $row[7]."</td></tr>"; } ?>
                    </table>
                    </div>
        </form> 

    

    <footer>
        &copy;All right resrved to CWC.
    </footer>

 
 



</body>
</html>
   
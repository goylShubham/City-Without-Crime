<!DOCTYPE html>
<html>

<head>
    <?php
    include('adminsession.php');
?>

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/adminmain.css"/>
    
    <title>Admin Page:City Without Crime</title>
    

</head>
<body style="background-image:url('images/1.jpg');">


	<header>
		<?php echo "<h1>".$login_session."&nbsp;Admin</h1>"; ?><br />
        <a href="logout.php" title="logout">logout</a>
    </header>

     <ul>
        <li><a class="active">Complaints</a></li>
        <li><a href="admin_add_station.php">Police Station</a></li>
        <li><a href="report_to_station.php">Reports</a></li>
        <li><a href="manage_records.php">Manage Records</a></li>
        <li><a href="emergency.php">Emergency</a></li>
    </ul>

           
             
                 <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="form-basic">
					 <div class="form-title-row">
						<h1>Complaints</h1>
					</div>
					<div class="form-row">
					<input type="submit" name="del" value="Delete"/>
					</div>
            <?php
                $qry=mysqli_query($db,"SELECT * FROM complaint");
            
                $count=mysqli_num_rows($qry);
            
                echo "<table class='form-background'>";
				echo "<thead><tr>";
                echo "<th>Select</th>"; 
                echo "<th>complaint ID</th>";
                echo "<th>PStation ID</th>";
                echo "<th>Topic</th>";
                echo "<th>Complator</th>"; 
                echo "<th>Date/Time</th>";
				echo "</tr></thead>";
                
            
                while($row=mysqli_fetch_array($qry))
                {
                    $complaintid = $row['complaint_Id'];
                echo "<tr>";?>
                <td><input name='checkbox[]' type='checkbox' id='checkbox[]' value="<?php echo $row['complaint_Id']; ?>" />
                <?php
                echo "<td>".$row['complaint_Id']."</td>";
                echo "<td>".$row['PStation_Id']."</td>";
                 echo "<td><a href='see_complaint.php?complaint_Id=".$complaintid."' title='click to se complaint details' target='_blank'>".$row['Topic']."</a></td>";
                echo "<td style='overflow:auto;'><a href='see_complaint.php?complaint_Id=".$complaintid."' title='click to se complaint details' target='_blank'>".$row['complator']."</a></td>"; 
                echo "<td>".$row['date']."</td>"; 
                echo "</tr>";
                }
                echo "</table>";
            
                if(array_key_exists('del',$_POST))
                {
                    $i=0;
                for($i=0;$i<$count;$i++)
                {
                $id=$_POST['checkbox'][$i];
                $dels=mysqli_query($db,"DELETE FROM complaint WHERE complaint_Id='$id'");
                }
                // if successful redirect to delete_multiple.php 
                if($dels){
                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin.php\">";
                }
            
                }
            
                ?>

    </form>
    
    <footer>
        &copy;All right resrved to CWC.
    </footer>
                

</body>

</html>



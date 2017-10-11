<!DOCTYPE html>
<html>

<head>
    <?php
    include('adminsession.php');
?>

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/Modeltown.css"/>
    <link rel="stylesheet" href="css/complaint_table.css"/>
    <title><?php echo $login_session ?>- City Without Crime </title>
    

</head>
<body style="background-image:url('images/wood.jpg');">


	<header>
		<?php echo "<h1>".$login_session."&nbsp;Police Station</h1>"; ?><br />
        <a href="logout.php" title="logout">logout</a>
    </header>

    <ul>
        <li><a class="active">Complaints</a></li>
        <li><a href="station_criminals.php">Criminals</a></li>
        <li><a href="station_report.php">Reports</a></li>
        <li><a href="station_news.php">News</a></li>
    </ul>


            <div class="form-title-row">
                <h1>Complaints</h1>
            </div>
             
                 <?php
                $qry=mysqli_query($db,"SELECT * FROM complaint where PStation_Id = '$user_check' ORDER BY PStation_Id ASC ");
            
                $count=mysqli_num_rows($qry);
            
                echo "<table class='form-basic'>"; 
                echo "<thead><tr>";
                echo "<th>Complaint_Id</th>";
                echo "<th>Topic</th>"; 
                echo "<th>Complator</th>";
				echo "<th>Date/Time</th>"; 
                echo "</tr></thead>";
            
                while($row=mysqli_fetch_array($qry))
                    {
                         $complaintid = $row['complaint_Id'];;
                echo "<tr>";?>
                <?php
                echo "<td>".$row['complaint_Id']."</td>";
                echo "<td><a href='see_complaint.php?complaint_Id=".$complaintid."' title='click to se complaint details' target='_blank'>".$row['Topic']."</a></td>";
                echo "<td style='overflow:auto;'><a href='see_complaint.php?complaint_Id=".$complaintid."' title='click to se complaint details' target='_blank'>".$row['complator']."</a></td>";
                echo "<td>".$row['date']."</td>"; 
                echo "</tr>";
                }
                echo "</table>";
            
            
                ?>
    <footer>
        &copy;All right resrved to CWC.
    </footer>
                

</body>

</html>



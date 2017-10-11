<!DOCTYPE html>
<html>

<head>
    <?php
    include('adminsession.php');
?>

	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/Modeltown.css"/>
    <link rel="stylesheet" href="css/criminal_table.css"/>

	<title>Criminals - <?php echo $login_session ?></title>
    

</head>
<body style="background-image: url('images/wood.jpg');">


	<header>
		 <?php echo "<h1>".$login_session."&nbsp;Police Station</h1>"; ?><br />
        <a href="logout.php" title="logout">logout</a>
       
    </header>

    <ul>
        <li><a href="PStations.php">Complaints</a></li>
        <li><a class="active">Criminals</a></li>
        <li><a href="station_report.php">Reports</a></li>
        <li><a href="station_news.php">News</a></li>
        <li><a href="Station_search.php">Searh</a></li>
    </ul>
		<div class="form-basic">

            <div class="form-title-row">
				<h1>Criminals</h1>
            </div>
            
                <?php
                $qry=mysqli_query($db,"SELECT * FROM `criminal_master` where `PStation_Id` = '$user_check' order by Criminal_Id ASC");
            
                echo "<table class='form-background'>";
                echo "<thead><tr>";
                echo "<th>Criminal_Id</th>";
               // echo "<th>PStation_Id</th>";
                echo "<th>Criminal_Name</th>";
                //echo "<th>Gender</th>";
                //echo "<th>height</th>";
                //echo "<th>weight</th>";
                //echo "<th>Crime Level</th>";
                echo "<th>Status</th>";
                echo "<th>Criminal_Picture</th>";
                echo "</tr></thead>";
                
            
                while($row=mysqli_fetch_array($qry))
                {
                    $id = $row['Criminal_Id'];
                $name = $row['Name'];
                echo '<tr>'; ?>
                <?php
                echo'<td>'.$row[0].'</td>';
               // echo'<td>'.$row[5].'</td>';
                echo '<td><a href="station_detail.php?Criminal_Id=' . $id . '" title="Click to see more details" target="_blank">' . $name . '</a></td>';
               // echo'<td>'.$row[2].'</td>';
                //echo'<td>'.$row[3].'</td>';
                //echo'<td>'.$row[4].'</td>';
                //echo'<td>'.$row[6].'</td>';
                echo'<td>'.$row[7].'</td>';
                echo '<td><a href="station_detail.php?Criminal_Id=' . $id . '" title="Click to see more details" target="_blank"><img height="100px" width="100px" src="data:image;base64,'.$row[8].' " /></a></td>';
                echo '</tr>';
                }
                echo "</table>";
               
                ?>
		</div>
    <footer>
        &copy;All right resrved to CWC.
    </footer>
</body>

</html>



<!DOCTYPE html>
<html>
	<?php
   include('adminsession.php');
             if($_SERVER["REQUEST_METHOD"] == "POST") {
      if(isset($_POST['report_sbt'])){
      $police_station = $_POST['police_station']; 
      $report = $_POST['report'];
      $qry="INSERT INTO `reports`(`from_id`, `to_id`, `report`,`date`) VALUES ('$user_check','$police_station','$report',now())";
      $result=mysqli_query($db,$qry);
      if($result){
        $msg="Report Sends Successfully";
        echo "<meta http-equiv=\"refresh\" content=\"3;URL=station_report.php\">";
      }else{
        $error_msg="Report Not Sends Successfully";
        echo "<meta http-equiv=\"refresh\" content=\"3;URL=station_report.php\">";
      }
    }}
?>

<head>

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<title>Reports - <?php echo $login_session ?></title>
	<link rel="stylesheet" href="css/station_report.css" />

</head>

<body style="background-image:url('images/wood.jpg');">
	<header>
		<?php echo "<h1>".$login_session."&nbsp;Police Station</h1>"; ?><br />
        <a href="logout.php" title="logout">logout</a>
    </header>

     <ul>
        <li><a href="PStations.php">Complaints</a></li>
        <li><a href="station_criminals.php">Criminals</a></li>
        <li><a class="active">Reports</a></li>
        <li><a href="station_news.php">News</a></li>
    </ul>


    

        <form class="form-login" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

            <div class="form-login-center">
				<div class="form_row">
				<input type="submit" name="del" value="Delete" class=""/>
				</div>
				<?php
                $qry=mysqli_query($db,"SELECT * FROM reports where to_id = '$user_check' ORDER BY report_id ASC ");
            
                $count=mysqli_num_rows($qry);
            
                echo "<table class='form-background'>";
				echo "<thead><tr>";
                echo "<th>Select</th>"; 
                echo "<th>Report ID</th>";
                echo "<th>FROM</th>";
                echo "<th>Report</th>";
                echo "<th>Date/Time</th>"; 
				echo "</tr></thead>";
                
            
                while($row=mysqli_fetch_array($qry))
                {
                echo "<tr>";?>
                <td><input name='checkbox[]' type='checkbox' id='checkbox[]' value="<?php echo $row['report_id']; ?>">
                <?php
                echo "<td>".$row['report_id']."</td>";
                echo "<td>".$row['from_id']."</td>";
                echo "<td>".$row['report']."</td>";
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
                $dels=mysqli_query($db,"DELETE FROM reports WHERE report_id='$id'");
                }
                // if successful redirect to delete_multiple.php 
                if($dels){
                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=station_report.php\">";
                }
            
                }
            
                ?>

            </div>

            <div class="form-login-side">

                <div class="form-row form-title-row">
                    <center><span class="form-title">Send Report</span></center>
                </div>
                <div class="form-row">
                    <label>
                        <select name="police_station">
                           <option selected value="" >Select Police Station</option>
                           <option value="mt1" >Model Town</option>
						   <option value="cl2" >Civil Lines</option>
						   <option value="ml3" >Multaniya</option>
						   <option value="pt4" >Purana Thana</option>
						   <option value="tr5" >Tharmal</option>
                        </select>
                    </label>
                </div>

                <div class="form-row">
                    <textarea name="report" rows="5"></textarea>
                </div>

                <div class="form-row form-last-row">
                    <button name="report_sbt" type="submit">Send</button>
                </div>
                <p style="color:greenyellow;"><?php if(isset($msg)){ echo $msg; } ?></p>
                <p style="color:red;"><?php if(isset($error_msg)){ echo $error_msg; } ?></p>

            </div>

        </form>
		<footer>
			&copy;All right resrved to CWC.
		</footer>

</body>

</html>

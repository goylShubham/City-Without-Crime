<!DOCTYPE html>
<html>
	<?php
   include('adminsession.php');
             if($_SERVER["REQUEST_METHOD"] == "POST") {
      if(isset($_POST['emergency_sbt'])){
      $emergency_name = $_POST['emergency_name']; 
      $emergency_number = $_POST['emergency_number'];
      $qry="INSERT INTO `emergency`(`emergency_name`,`emergency_number`) VALUES ('$emergency_name','$emergency_number')";
      $result=mysqli_query($db,$qry);
      if($result){
        $msg="Emergency added Successfully";
        echo "<meta http-equiv=\"refresh\" content=\"3;URL=emergency.php\">";
      }else{
        $error_msg="Emergency Not added Successfully";
        echo "<meta http-equiv=\"refresh\" content=\"3;URL=emergency.php\">";
      }
    }}
?>

<head>

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<title>Emergency<?php echo $login_session ?></title>
	<link rel="stylesheet" href="css/emergency.css" />

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
        <li><a href="manage_records.php">Manage Records</a></li>
        <li><a class="active">Emergency</a></li>
    </ul>



    

        <form class="form-login" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

            <div class="form-login-center">
				<div class="form_row">
				<input type="submit" name="del" value="Delete" class=""/>
				</div>
				<?php
                $qry=mysqli_query($db,"SELECT * FROM emergency ORDER BY emergency_id ASC ");
            
                $count=mysqli_num_rows($qry);
            
                echo "<table class='form-background'>";
				echo "<thead><tr>";
                echo "<th>Select</th>"; 
                echo "<th>ID</th>";
                echo "<th>Emergency</th>";
                echo "<th>Number</th>";
				echo "</tr></thead>";
                
            
                while($row=mysqli_fetch_array($qry))
                {
                echo "<tr>";?>
                <td><input name='checkbox[]' type='checkbox' id='checkbox[]' value="<?php echo $row['emergency_id']; ?>">
                <?php
                echo "<td>".$row[0]."</td>";
                echo "<td>".$row[1]."</td>";
                echo "<td>".$row[2]."</td>"; 
                echo "</tr>";
                }
                echo "</table>";
            
                if(array_key_exists('del',$_POST))
                {
                    $i=0;
                for($i=0;$i<$count;$i++)
                {
                $id=$_POST['checkbox'][$i];
                $dels=mysqli_query($db,"DELETE FROM emergency WHERE emergency_id='$id'");
                }
                // if successful redirect to delete_multiple.php 
                if($dels){
                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=emergency.php\">";
                }
            
                }
            
                ?>

            </div>

            <div class="form-login-side">

                <div class="form-row form-title-row">
                    <center><span class="form-title">Emergency No.</span></center>
                </div>
                <div class="form-row">
                    <label>
                        <input type="text" name="emergency_name" placeholder="Enter Emergency Name"/>
                    </label>
                </div>

                <div class="form-row">
                    <input  type="text" name="emergency_number" placeholder="Enter Emergency Number"/>
                </div>

                <div class="form-row form-last-row">
                    <button name="emergency_sbt" type="submit">Add</button>
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

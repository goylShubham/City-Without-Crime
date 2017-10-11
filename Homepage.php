<!DOCTYPE html>
<html>
	<?php
   include('session.php');
             if($_SERVER["REQUEST_METHOD"] == "POST") {
      if(isset($_POST['complaint_sbt'])){
      $topic = $_POST['topic'];
      $police_station = $_POST['police_station']; 
      $description = $_POST['description'];
      
      $qry="INSERT INTO `complaint`(`PStation_Id`, `Topic`, `Description`,`complator`,`date`) VALUES ('$police_station','$topic','$description','$user_check',now())";
      $result=mysqli_query($db,$qry);
      if($result){
        $msg="Your Complaint is submitted successfully";
        echo "<meta http-equiv=\"refresh\" content=\"3;URL=Homepage.php\">";
      }else{
        $error_msg="Complaint Cannot submitted.Please try again.";
        echo "<meta http-equiv=\"refresh\" content=\"3;URL=Homepage.php\">";
      }
    }}
?>

<head>

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<title>Home Page- City Without Crime</title>

	<link rel="stylesheet" href="css/homepage.css" />

</head>

<body style="background-image:url('images/2.jpg');">
	<header>
		<h1>City Without Crime</h1>
        <a href="logout.php" title="logout">logout</a>
		<strong>Welcome <?php echo $login_session; ?></strong>
    </header>

    <ul>
        <li><a class="active">Home</a></li>
        <li><a href="news.php">News</a></li>
        <li><a href="view_complaint.php">View Complaint</a></li><br />
        <li><a><?php
                    $sql=mysqli_query($db,"SELECT * FROM emergency");
                    echo "<marquee scrollamount='5' onmouseover='stop();' onmouseout='start();'><table>";
                    echo "<tr>";
                    echo "<td>In Emergency: </td>";
                    while($r=mysqli_fetch_assoc($sql)){
                        
                        echo "<td style='padding-left:20px;'>".$r['emergency_name']."&nbsp;:&nbsp;".$r['emergency_number']."</td>"; 
                     
                        }
                           echo "</tr>";
                        echo "</table></marquee>";
					?></a></li>
    </ul>


    

        <form class="form-login" method="post" action="#">

            <div class="form-login-center">

                <div class="form-background">
                <p style="color: aliceblue; font-size: medium;">News Update</p>
                    <?php
                    $qry=mysqli_query($db,"SELECT * FROM news ");
                    echo "<marquee direction='up' scrollamount='3' onmouseover='stop();' onmouseout='start();'><table cellpadding='40' cellspacing='25'>";
                    while($row=mysqli_fetch_assoc($qry)){
                        $newsid=$row['news_id'];
                        $title=$row['title'];
                        echo "<tr>";
                        echo "<td><a href='view_news.php?news_id=".$newsid."' title='click to see news detail' target='_blank'>".$title."</a></td>";
                        echo "</tr>";
                        }
                        echo "</table></marquee>";
                    ?>
                    
					

                </div>

                

            </div>

            <div class="form-login-side">

                <div class="form-row form-title-row">
                    <center><span class="form-title">Complaint</span></center>
                </div>
				
                <div class="form-row">
                    <label>
                        <select name="topic" required="true">
                            <option selected value="" >Select a Topic</option>
							<option value="Child labor" >Child labor</option>
							<option value="Corruption" >Corruption</option>
							<option value="Domestic violence" >Domestic violence</option>
							<option value="Extortion" >Extortion</option>
							<option value="Goods Stolen" >Goods Stolen</option>
							<option value="Harrassment">Harrassment</option>
							<option value="Kidnapping">Kidnapping</option>
							<option value="Mobile Theft">Mobile Theft</option>
							<option value="Murder">Murder</option>
							<option value="Rape">Rape</option>
							<option value="Roberry">Roberry</option>
                        </select>
                    </label>
                </div>

                <div class="form-row">
                    <label>
                        <select name="police_station" required="true">
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
                    <textarea name="description" rows="5";></textarea>
                </div>

                <div class="form-row form-last-row">
                    <button name="complaint_sbt" type="submit">Submit</button>
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

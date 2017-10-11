<!DOCTYPE html>
<html>
	<?php
    include('adminsession.php');
             if($_SERVER["REQUEST_METHOD"] == "POST") {
      if(isset($_POST['news_sbt'])){
      $title = $_POST['news_title']; 
      $description = $_POST['news_description'];
      
      $qry="INSERT INTO `news`(`title`,`news_date`,`news`) VALUES ('$title',now(),'$description')";
      $result=mysqli_query($db,$qry);
      if($result){
        $msg="News is Posted successfully";
        echo "<meta http-equiv=\"refresh\" content=\"2;URL=station_news.php\">";
      }else{
        $error_msg="News can not Posted. Try again..";
        echo "<meta http-equiv=\"refresh\" content=\"2;URL=station_news.php\">";
      }
    }}
    
?>

<head>

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<title>News - <?php echo $login_session ?></title>

	<link rel="stylesheet" href="css/station_news.css" />

</head>

<body style="background-image:url('images/wood.jpg');">
	<header>
		<?php echo "<h1>".$login_session."&nbsp;Police Station</h1>"; ?><br />
        <a href="logout.php" title="logout">logout</a>
    </header>
    
    <ul>
        <li><a href="PStations.php">Complaints</a></li>
        <li><a href="station_criminals.php">Criminals</a></li>
        <li><a href="station_report.php">Reports</a></li>
        <li><a class="active">News</a></li>
    </ul>
        <form class="form-login" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

            <div class="form-login-center">
				<div class="form_row">
				<input type="submit" name="del" value="Delete" class=""/>
				</div>

            
                <?php
                $qry = mysqli_query($db,"SELECT * FROM news ORDER BY news_id ASC");
                $count=mysqli_num_rows($qry);
            
                echo "<table class='form-background'>";
				echo "<thead><tr>";
                echo "<th>Select</th>"; 
                echo "<th>News ID</th>";
                echo "<th>News Date</th>";
                echo "<th>News Title</th>"; 
				echo "</tr></thead>";
                while($row = mysqli_fetch_array($qry)) {
                        $news_id=$row['news_id'];
                        $date = $row['news_date'];
                        $title = $row['title'];
                        //$news = $row['news'];
                echo "<tr>";?>
                <td><input name='checkbox[]' type='checkbox' id='checkbox[]' value="<?php echo $news_id; ?>">
                <?php
                echo "<td>".$news_id."</td>";
                echo "<td>".$date."</td>";
                echo '<td><a href="view_news.php?news_id=' . $news_id . '" title="Click to see News details" target="_blank">' . $title . '</a></td>'; 
                echo "</tr>";
                }
                echo "</table>";
            
                if(array_key_exists('del',$_POST))
                {
                    $i=0;
                for($i=0;$i<$count;$i++)
                {
                $id=$_POST['checkbox'][$i];
                $dels=mysqli_query($db,"DELETE FROM news WHERE news_id='$id'");
                }
                // if successful redirect to delete_multiple.php 
                if($dels){
                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=station_news.php\">";
                }
            
                }
            
                ?>
            </div>
            

            <div class="form-login-side">

                <div class="form-row form-title-row">
                    <center><span class="form-title">Post News</span></center>
                </div>
				
                <div class="form-row">
                    <label>
                        <input type="text" name="news_title" placeholder="Enter News Title" />
                    </label>
                </div>

                <div class="form-row">
                    <textarea name="news_description" rows="5" placeholder="Enter News Detail"></textarea>
                </div>

                <div class="form-row form-last-row">
                    <button name="news_sbt" type="submit">Post</button>
                </div>
                <div class="form-row">
                <p style="color:greenyellow;"><?php if(isset($msg)){ echo $msg; } ?></p>
                <p style="color:red;"><?php if(isset($error_msg)){ echo $error_msg; } ?></p>
                </div>

            </div>

        </form>
		<footer>
			&copy;All right resrved to CWC.
		</footer>

</body>

</html>

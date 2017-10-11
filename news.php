<!doctype html>
<html>
<head>
<?php
    
    include('session.php');
    
?>
    <title>News-City Without Crime</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <link rel="stylesheet" href="css/admin_record.css"/>
    
</head>
<body style="background-image:url('images/2.jpg');">

	<header>
		<h1>City Without Crime</h1>
        <a href="logout.php" title="logout">logout</a>
		<strong>Welcome <?php echo $login_session; ?></strong>
    </header>

    <ul>
        <li><a href="Homepage.php">Home</a></li>
        <li><a class="active">News</a></li>
        <li><a href="view_complaint.php">View Complaint</a></li>
    </ul>
         <div class="main-content">

        <form  class="form-register" method="post" action="#" enctype="multipart/form-data">

            <div class="form-register-with-email">

                <div class="form-white-background">
                <?php 
                    $qry = mysqli_query($db,"SELECT * FROM `news` ORDER BY `news_id` ASC");
                    echo "<table>";
                    echo "<caption>News</caption>";
                    
                    while($row = mysqli_fetch_array($qry)){
                        $newsid = $row['0'];
                        echo "<tr>";
                        echo "<td><a href='view_news.php?news_id=".$newsid."' title='click to see news detail' target='_blank'>".$row[1]."</td>";
                        echo "<td>".$row[2]."</td>";
                        echo "</tr>";
                        }
                        echo "</table>";
                
                
                ?>

                   
                   
                    
                </div>

            </div>

           

        </form>

    </div>
    <footer>
			&copy;All right resrved to CWC.
    </footer>
</body>
</html>
   
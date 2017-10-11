<!doctype html>
<html>
<head>
<?php
    
    include('session.php');
    $sql = mysqli_query($db,"SELECT * FROM complaint WHERE complator = '$user_check'");
    $r = mysqli_fetch_array($sql);
    $complaint_number = $r[0];
    $police_station = $r[1];
    $topic = $r[2];
    $description = $r[3];
    $complator = $r[4];
    $date = $r[5];
    
?>
<?php
    $q = mysqli_query($db,"SELECT fullname FROM userinfo WHERE usermail = '$user_check'");
    $ro = mysqli_fetch_array($q);
    $username = $ro[0];
?>
<?php
    
    $sql = mysqli_query($db,"SELECT * FROM police_station_master WHERE PStation_Id = '$police_station'");
    $row = mysqli_fetch_array($sql);
    $psname = $row[1];
    $psaddress = $row[2];
    $psphone = $row[3];
    $psmobile = $row[4];
    $pshead = $row[5];
?>
    <title>View Complaint-City Without Crime</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <link rel="stylesheet" href="css/view_complaint.css"/>
    
</head>
<body style="background-image:url('images/2.jpg');">

	<header>
		<h1>City Without Crime</h1>
        <a href="logout.php" title="logout">logout</a>
		<strong>Welcome <?php echo $login_session; ?></strong>
    </header>

    <ul>
        <li><a href="Homepage.php">Home</a></li>
        <li><a href="news.php">News</a></li>
        <li><a class="active">View Complaint</a></li>
    </ul>
         <div class="main-content">

        <form  class="form-register" method="post" action="#" enctype="multipart/form-data">

            <div class="form-register-with-email">

                <div class="form-white-background">
                    <div class="form-title-row">
                        <?php echo "<h1>Complaint No. ".$complaint_number."</h1>"; ?>
                    </div>
                    
                    <div class="form-row">
                        <label>
                            <span>To</span>
                        </label>
                    </div>
                    <div class="form-row">
                        <label>
                            <span><?php echo "Police Station Head: ".$pshead;  ?></span><br />
                        </label>
                    </div>
                    <div class="form-row">
                        <label>
                            <span><?php echo "Police Station: ".$psname;  ?></span><br />
                        </label>
                    </div>
                    <div class="form-row">
                        <label>
                            <span><?php echo "Mobile No. : ".$psmobile;  ?></span><br />
                        </label>
                    </div>
                    <div class="form-row">
                        <label>
                            <span><?php echo "Phone No. : ".$psphone;  ?></span><br />
                        </label>
                    </div>
                    <div class="form-row">
                        <label>
                            <span><?php echo "Address: ".$psaddress;  ?></span><br />
                        </label>
                    </div>
                    <div class="form-row">
                        <label>
                            <span><br /></span>
                        </label>
                    </div>
                    <div class="form-row">
                        <label>
                            <span><?php echo "Subject: ".$topic; ?></span>
                        </label>
                    </div>
                    <div class="form-row">
                        <label>
                            <span><?php echo "Description: ".$description; ?></span>
                        </label>
                    </div>
                    <div class="form-row">
                        <label>
                            <span><br /></span>
                        </label>
                    </div>
                    <div class="form-row">
                        <label>
                            <span><?php echo $username; ?></span>
                        </label>
                    </div>
                    <div class="form-row">
                        <label>
                            <span><?php echo "Date: ".$date; ?></span>
                        </label>
                    </div>
                    
                </div>

            </div>

           

        </form>

    </div>
    <footer>
			&copy;All right resrved to CWC.
    </footer>
</body>
</html>
   
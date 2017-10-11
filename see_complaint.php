<!doctype html>
<html>
<head>
<?php
    
    include('adminsession.php');
    $complaintid = $_GET['complaint_Id'];
    $qry=mysqli_query($db,"SELECT * FROM `complaint` where complaint_Id = '$complaintid'");
    $r = mysqli_fetch_array($qry);
    $complaint_number = $r[0];
    $police_station = $r[1];
    $topic = $r[2];
    $description = $r[3];
    $complator = $r[4];
    $date = $r[5];
    
?>
<?php
    $q = mysqli_query($db,"SELECT * FROM userinfo WHERE usermail = '$complator'");
    $ro = mysqli_fetch_array($q);
    $username = $ro[4];
    $usermobile = $ro[3];
    $useraddress = $ro[5];
?>

    <title>View Complaint- <?php echo $login_session ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <link rel="stylesheet" href="css/view_complaint.css"/>
    
</head>
<body style="background-image:url('images/1.jpg');">

	<header>
		<?php echo "<h1>".$login_session."</h1>"; ?><br />
        <a href="logout.php" title="logout">logout</a>
    </header>

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
                            <span><?php echo "Police Station ID: ".$police_station;  ?></span><br />
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
                            <span><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$description; ?></span>
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
                            <span><?php echo $usermobile; ?></span>
                        </label>
                    </div>
                    <div class="form-row">
                        <label>
                            <span><?php echo $complator; ?></span>
                        </label>
                    </div>
                    <div class="form-row">
                        <label>
                            <span><?php echo $useraddress; ?></span>
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
   
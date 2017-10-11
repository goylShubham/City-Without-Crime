<!doctype html>
<html>
<head>
<?php
    
    include('session.php');
    $newsid=$_GET['news_id'];
    $sql=mysqli_query($db,"SELECT * FROM news WHERE news_id = '$newsid'");
    $row=mysqli_fetch_array($sql)
    
?>
    <title>News Detail-City Without Crime</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <link rel="stylesheet" href="css/admin_record.css"/>
     <link rel="stylesheet" href="css/w3.css"/>
</head>
<body style="background-image:url('images/wood.jpg');">

		<header>
		<h1>City Without Crime</h1>
        <a href="logout.php" title="logout">logout</a>
    </header>

         <div class="main-content">

        <form  class="form-register" method="post" action="#" enctype="multipart/form-data">

            <div class="form-register-with-email">

                <div class="form-white-background">

                    <div class="form-title-row">
                        <h1><?php echo $row[1]; ?></h1>
                    </div>
                    <div class="form-row">
                        <br />
                    </div>

                    <div class="form-row">
                        <p style="padding: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row[3]; ?></p>
                    </div>

                    
                        
                </div>

            </div>

           

        </form>

    </div>

    </section>
    <footer>
        <div class="footer">
			&copy;All right resrved to CWC.
		</div>
    </footer>

 
 


</div>
</body>
</html>
   
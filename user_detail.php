<!DOCTYPE html>
<html>

<head>
<?php
    include('adminsession.php');
	$complator = $_GET['complator'];
    $qry=mysqli_query($db,"SELECT * FROM `userinfo` where usermail = '$complator'");
    $row=mysqli_fetch_array($qry);
?>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Mini Form</title>

	<link rel="stylesheet" href="css/admin_report.css">
	

</head>
<body style="background-image:url('images/wood.jpg');">

	<header>
		<?php echo "<h1>".$login_session."&nbsp;Police Station</h1>"; ?><br />
        <a href="logout.php" title="logout">logout</a>
    </header>


    <div class="main-content">

        <div class="form-mini-container">


            <h1>Complator's Detail</h1>

            <form class="form-mini" method="post" action="#">

                <div class="form-row">
                    <label>
                        <strong>Name:&nbsp;</strong><?php if(isset($row[4])){ echo $row[4]; } ?>
                    </label>
                </div>
				<div class="form-row">
                    <label>
                        <strong>Mobile:&nbsp;</strong><?php if(isset($row[3])){ echo $row[3]; } ?>
                    </label>
                </div>
				<div class="form-row">
                    <label>
                        <strong>email:&nbsp;</strong><?php if(isset($row[1])){ echo $row[1]; } ?>
                    </label>
                </div>
				<div class="form-row">
                    <label>
                        <strong>Address:&nbsp;</strong><?php if(isset($row[5])){ echo $row[5]; } ?>
                    </label>
                </div>

            </form>
        </div>


    </div>
	 <footer>
        &copy;All right resrved to CWC.
    </footer>

</body>

</html>

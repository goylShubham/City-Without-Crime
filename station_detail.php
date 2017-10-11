<!DOCTYPE html>
<html>

<head>
    <?php
    include('adminsession.php');
    $id = $_GET['Criminal_Id'];
$qry=mysqli_query($db,"SELECT * FROM `criminal_master` where Criminal_Id = $id");
$row=mysqli_fetch_array($qry);
        
   
?>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/detail.css"/>
  

	<title>Criminal Detail - <?php echo $login_session ?></title>
    

</head>
<body style="background-image:url('images/wood.jpg');">


	<header>
		<?php echo "<h1>".$login_session."&nbsp;Police Station</h1>"; ?><br />
        <a href="logout.php" title="logout">logout</a>
        
    </header>        
        <form  class="form-basic" method="post" action="#" enctype="multipart/form-data">

          
                    <div class="form-title-row">
                        <h1>Criminal Details</h1>
                    </div>
                    
                    <div class="form-row">
                       
                          
                            <div class="form-row"><?php if(isset($row[8])){ echo '<img height="200" width="200" src="data:image;base64,'.$row[8].' ">';} ?></div>
                        
                    </div>
                    
                    <div class="form-row">
                        <label>
                            <span>Criminal ID</span>
                            <input readonly value="<?php if(isset($row[0])){ echo $row[0]; } ?>" />
                        </label>
                        
                    </div>
                        
                    <div class="form-row">
                        <label>
                            <span>Criminal Name</span>
							<input readonly  value="<?php if(isset($row[1])){ echo $row[1]; } ?>" />                        
						</label>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>Gender</span>
							<input  readonly  value="<?php if(isset($row[2])){ echo $row[2]; } ?>" />                        
						</label>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>Height</span>
							<input  readonly  value="<?php if(isset($row[3])){ echo $row[3].'&nbsp;inch'; } ?>" />                        
						</label>
                    </div>
                    
                    <div class="form-row">
                        <label>
                            <span>Weight</span>
							<input  readonly  value="<?php if(isset($row[4])){ echo $row[4].'&nbsp;Kg'; } ?>" />                        
						</label>
                    </div>
                    
                    <div class="form-row">
                        <label>
                            <span>PStation ID</span>
							<input  readonly  value="<?php if(isset($row[5])){ echo $row[5]; } ?>" />                        
						</label>
                    </div>
                    
                    <div class="form-row">
                        <label>
                            <span>Crime Level</span>
							<input  readonly  value="<?php if(isset($row[6])){ echo $row[6]; } ?>" />                        
						</label>
                    </div>
                    
                    <div class="form-row">
                        <label>
                            <span>Status</span>
							<input  readonly  value="<?php if(isset($row[7])){ echo $row[7]; } ?>" />                        
						</label>
                    </div> 

        </form> 

    

    <footer>
        &copy;All right resrved to CWC.
    </footer>

 
 



</body>
</html>
   
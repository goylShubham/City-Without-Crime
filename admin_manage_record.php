<?php
if(isset($_POST['find'])){
        $CriminalID = mysqli_real_escape_string($db,$_POST['CriminalID']);
        $qry = "select * from criminal_master where Criminal_ID = $CriminalID";
        $result = mysqli_query($db,$qry);
        $row = @mysqli_fetch_array($result);
        if($row){
            
        }else{
            $error_msg = "Record Not found";
             echo "<meta http-equiv=\"refresh\" content=\"2;URL=manage_records.php\">";
        }
    }
        
    if(isset($_POST['delete'])){
        $CriminalID = mysqli_real_escape_string($db,$_POST['CriminalID']);
        $qry = "DELETE FROM `criminal_master` WHERE Criminal_ID = $CriminalID";
        $result = mysqli_query($db,$qry);
        if($result){
            echo "<meta http-equiv=\"refresh\" content=\"2;URL=manage_records.php\">";
            $msg = "Record Deleted Successfully";
        }else{
            $error_msg = "Record Not Deleted";
             echo "<meta http-equiv=\"refresh\" content=\"2;URL=manage_records.php\">";
        }
    }
    if(isset($_POST['update'])){
        $CriminalID = mysqli_real_escape_string($db,$_POST['CriminalID']);
        $CriminalName = mysqli_real_escape_string($db,$_POST['CriminalName']);
        $gender = mysqli_real_escape_string($db,$_POST['gender']);
        $height = mysqli_real_escape_string($db,$_POST['height']);
        $weight = mysqli_real_escape_string($db,$_POST['weight']);
        $PStationID = mysqli_real_escape_string($db,$_POST['PStationID']);
        $crimelevel = mysqli_real_escape_string($db,$_POST['crimelevel']);
        $status = mysqli_real_escape_string($db,$_POST['status']);
        
        $qry = "UPDATE `criminal_master` SET `Criminal_Id`= '$CriminalID',`Name`='$CriminalName',`Gender`='$gender',`Height`='$height',`Weight`='$weight',`PStation_Id`='$PStationID',`Crime level`='$crimelevel',`Status`='$status' WHERE Criminal_Id = '$CriminalID'";
        $result = mysqli_query($db,$qry);
        if($result){
            $msg = "Record Updated Successfully";
             echo "<meta http-equiv=\"refresh\" content=\"2;URL=manage_records.php\">";
        }else{
            $error_msg = "Record Not Updated";
             echo "<meta http-equiv=\"refresh\" content=\"2;URL=manage_records.php\">";
        }
    }
    if(isset($_POST['updatepic'])){
        $CriminalID = mysqli_real_escape_string($db,$_POST['CriminalID']);
        $image="";
        $name="";
        if(!empty($_FILES["image"]["name"])){     
            $name = mysqli_real_escape_string($db,$_FILES["image"]["name"]);
            $image =file_get_contents($_FILES["image"]["tmp_name"]);
        }
        $image= base64_encode($image);
        $qry = "UPDATE `criminal_master` SET Criminal_Picture='$image',path='$name' WHERE Criminal_Id = '$CriminalID'";
        $result = mysqli_query($db,$qry);
        if($result){
            $msg = "Image Updated Successfully";
            echo "<meta http-equiv=\"refresh\" content=\"2;URL=manage_records.php\">";
        }else{
            $error_msg = "Image Not Updated";
            echo "<meta http-equiv=\"refresh\" content=\"2;URL=manage_records.php\">";
        }
    }
    
    if(isset($_POST['add'])){
        $CriminalID = mysqli_real_escape_string($db,$_POST['CriminalID']);
        $CriminalName = mysqli_real_escape_string($db,$_POST['CriminalName']);
        $gender = mysqli_real_escape_string($db,$_POST['gender']);
        $height = mysqli_real_escape_string($db,$_POST['height']);
        $weight = mysqli_real_escape_string($db,$_POST['weight']);
        $PStationID = mysqli_real_escape_string($db,$_POST['PStationID']);
        $crimelevel = mysqli_real_escape_string($db,$_POST['crimelevel']);
        $status = mysqli_real_escape_string($db,$_POST['status']);
        $image="";
        $name="";
        if(!empty($_FILES["image"]["name"])){     
            $name = mysqli_real_escape_string($db,$_FILES["image"]["name"]);
            $image =file_get_contents($_FILES["image"]["tmp_name"]);
        }
        $image= base64_encode($image);
        $qry = "INSERT INTO `criminal_master`(`Criminal_Id`, `Name`, `Gender`, `Height`, `Weight`, `PStation_Id`, `Crime level`, `Status`, `Criminal_Picture`, `path`) 
                VALUES ('$CriminalID','$CriminalName','$gender','$height','$weight','$PStationID','$crimelevel','$status','$image','$name')";
        $result=mysqli_query($db,$qry);
    
        if($result){
            echo "<meta http-equiv=\"refresh\" content=\"2;URL=manage_records.php\">";
            $msg = "Record Added Successfully";
        }else{
            echo "<meta http-equiv=\"refresh\" content=\"2;URL=manage_records.php\">";
            $error_msg = "Record Not Added";
        }
    }
    if(isset($_POST['reset'])){
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=manage_records.php\">";
    }
    ?>
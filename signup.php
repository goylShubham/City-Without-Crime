<?php
    if(isset($_POST['usignup'])){
        $usermail=$_POST['uusername'];
        $upassword=$_POST['upassword'];
        $umobile=$_POST['umobile'];
        $ufullname=$_POST['ufullname'];
        $address=$_POST['uaddress'];
        $qry="INSERT INTO `userinfo`(`usermail`, `password`, `mobile`, `fullname`, `address`) VALUES ('$usermail','$upassword','$umobile','$ufullname','$address')";
        $result=mysqli_query($db,$qry);
        if($result){
            $msg="Account Created Successfully";
            echo "<meta http-equiv=\"refresh\" content=\"5;URL=Loginpage.php\">";
        }else{
            $error_msg="Account cannot Created";
            echo "<meta http-equiv=\"refresh\" content=\"5;URL=Loginpage.php\">";
        }
            
    }



?>
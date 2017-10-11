<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form 
      if(isset($_POST['adminin'])){
      $username = mysqli_real_escape_string($db,$_POST['adminid']);
      $password = mysqli_real_escape_string($db,$_POST['adminpassword']); 
            $sql = "SELECT PStation_Id FROM police_station_master WHERE PStation_Id='$username' AND Password='$password' AND PStation_Name='Head Quarter'";
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
            $count = mysqli_num_rows($result);
            if($count == 1) {
            $_SESSION['login_user'] = $username;
            header("location:admin.php");
            }else {
                $login_error = "Your Id or Password is invalid";
                echo "<meta http-equiv=\"refresh\" content=\"2;URL=adminloginpage.php\">";
            }
      }
      }
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form 
      if(isset($_POST['stationin'])){
      $stationid = mysqli_real_escape_string($db,$_POST['stationid']);
      $stationpassword = mysqli_real_escape_string($db,$_POST['stationpassword']); 
      $police_station=$_POST['police_station'];
            $sql = "SELECT PStation_Id FROM police_station_master WHERE PStation_Id = '$stationid' and password = '$stationpassword' and PStation_Id = '$police_station'";
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
            $count = mysqli_num_rows($result);
            if($count == 1) {
            $_SESSION['login_user'] = $stationid;
            header("location:PStations.php");
            }else {
           $slogin_error = "Your Station Id or Password is invalid";
           echo "<meta http-equiv=\"refresh\" content=\"2;URL=adminloginpage.php\">";
            } 
            }
      }
           

?>
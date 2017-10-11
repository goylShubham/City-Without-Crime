<?php
      if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form 
      if(isset($_POST['usignin'])){
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT userid FROM userinfo WHERE usermail = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
    
      if($count == 1) {
        $_SESSION['login_user'] = $myusername;
         header("location: complaint.php");
      }else {
          $login_error = "Your UserEmail or Password is invalid";}
   }
   }



?>
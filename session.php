<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select fullname from userinfo where usermail = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['fullname'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:Loginpage.php");
   }
?>
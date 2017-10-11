<?php
include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select PStation_Name from police_station_master where PStation_Id = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['PStation_Name'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:adminloginpage.php");
   }
   ?>
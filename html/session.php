<?php
   include('config.php');
   if(!isset($_SESSION))
   {
   session_start();
   }

   $user_check = $_SESSION['login_user'];
   
     $ses_sql = mysqli_query($conn,"select * from user where email = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['fullname'];
    $login_sess=$row['user_id'];
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>
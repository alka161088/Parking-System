<?php
   include('config.php');
<<<<<<< HEAD
   if(!isset($_SESSION))
   {
   session_start();
   }

   $user_check = $_SESSION['login_user'];
   
     $ses_sql = mysqli_query($conn,"select * from user where email = '$user_check' ");
=======
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"select fullname from user where email = '$user_check' ");
>>>>>>> 5fc4a028f82d639276f922aa520e41acae4c659c
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['fullname'];
<<<<<<< HEAD
    $login_sess=$row['user_id'];
=======
   
>>>>>>> 5fc4a028f82d639276f922aa520e41acae4c659c
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>
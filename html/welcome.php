<?php
   include('session.php');
  ?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SpotOn</title>
  
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Satisfy|Bree+Serif|Candal|PT+Sans">
  <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="../css/my-login.css">
</head>

<body>
	
      <header >
	<h3>Welcome <?php echo $login_session; ?></h3> 
<<<<<<< HEAD
      <a style ="font-size:100%; color:#FFFFFF;" href="welcome.php">SpotOn</a>
        <a style ="float: right;" href="logout.php">Logout</a>      
        <a style ="float: right;" href="edit_user_profile.php">Edit Profile</a>      
        
        <a style ="float: right;" href="contact_us.html">Contact</a> 
        <a style ="float: right;" href="about_us.html">About Us</a>                         
    </header> 
      <form action = "select_parking_spot_welcome.php" class="search-section" method="POST" novalidate="">
=======
      SpotOn  
        <a style ="float: right;" href="logout.php">Logout</a>      
        <a style ="float: right;" href="contact_us.html">Contact</a> 
        <a style ="float: right;" href="about_us.html">About Us</a>                         
    </header> 
      <form action = "select_parking_spot.php" class="search-section" method="POST" novalidate="">
>>>>>>> 5fc4a028f82d639276f922aa520e41acae4c659c
        <div>
          <label style="padding-left: 30px;" for="name">Where you want to park?</label>
          <input style="width: 270px; margin-right: 0px; margin-left: 40px" id="city" type="text" placeholder="My favorite parking location"  name="city" required>
        </div>
        <div>
          <label style="padding-left: 0px;" for="arrival">Arrival</label>
          <input style="margin-left: 10px" id="arrival" type="datetime-local" name="arrival" required>
        </div>
        <div >
          <label for="departure">Departure</label>
          <input id="departure" type="datetime-local" name="departure" required>
        </div>

        <div >
          <button type="submit" class="btn btn-primary btn-block">
              SEARCH
          </button>
        </div>             
<<<<<<< HEAD
      </form> 

<script type="text/javascript">

var today = new Date().toISOString().split('T')[0];
document.getElementsByName("arrival")[0].setAttribute('min', today)
document.getElementsByName("departure")[0].setAttribute('min', today)
</script>

             
=======
      </form>              
>>>>>>> 5fc4a028f82d639276f922aa520e41acae4c659c
</body>
</html>
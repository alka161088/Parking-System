<?php
   include("config.php");
   session_start();
   $error ="";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['email']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT c_name FROM company WHERE email = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['user_id'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Email or Password is invalid";
      }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/my-login.css">
</head>
<body class="my-login-page">

  <header >  
      <a style ="font-size:100%; color:#FFFFFF;" href="../index.html">SpotOn</a>
        <a style ="float: right; color:#FFFFFF;" href="login_check.html">Login</a>      
        <a style ="float: right; color:#FFFFFF;" href="contact_us.html">Contact</a> 
        <a style ="float: right; color:#FFFFFF;" href="about_us.html">About Us</a>                         
    </header>


    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Parking Owner Login</h4>
                            <form method="POST" class="my-login-validation" novalidate="">                              

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" required>
                                    <div class="invalid-feedback">
                                        Your email is invalid
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>

                                <div class="form-group m-0">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        LOGIN
                                    </button>
                                </div>

                                <div class="form-group m-0">
                                    <button onclick="location.href = 'parkingowner_register.html';" type="button" class="btn btn-primary btn-block">
                                        SIGN UP
                                    </button>
                                </div>

                                <div class="mt-4 text-center">
                                    <a href="forgot.html">Forgot Password</a>
                                </div>
                            </form>
							 <div style = "font-size:17px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    
    <script src="../js/my-login.js"></script>
</body>
</html>

<?php
   include('session.php');
  ?>

  <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>User Profile Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/my-login.css">
</head>

<body class="my-login-page">
	 <header >  
	 	<h3>Welcome <?php echo $login_session; ?></h3>
    <a style ="font-size:100%; color:#FFFFFF;" href="../index.html">SpotOn</a>
        <a style ="float: right; color:#FFFFFF;" href="logout.php">Logout</a>      
        <a style ="float: right; color:#FFFFFF;" href="contact_us.html">Contact</a> 
        <a style ="float: right; color:#FFFFFF;" href="about_us.html">About Us</a>                      
  </header> 

	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">My Details</h4>
							<form action ="updateinfo.php" method="POST" class="my-login-validation" novalidate="">
								
								<div class="form-group">
									<label for="email">Email</label>
									<input id="email" type="email" class="form-control" name="email" placeholder="">
								</div>

								<div class="form-group">
									<label for="name">Full Name</label>
									<input id="name" type="text" class="form-control" name="name" placeholder="" autofocus>
								</div>

								

								<div class="form-group">
									<label for="city">City of Residence</label>
									<input id="city" type="text" class="form-control" name="city" placeholder="">
								</div>

								<div class="form-group">
									<label for="name">Area Code</label>
									<input id="area" type="text" class="form-control" name="area" placeholder="">
								</div>

								<div class="form-group">
									<label for="name">Phone</label>
									<input id="phone" type="number" class="form-control" name="phone" placeholder="">
								</div>
								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
										Save
									</button>
								</div>								
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	<script src="../js/my-login.js"></script>
</body>
</html>
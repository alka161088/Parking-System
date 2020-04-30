<?php
   include('session.php');
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Book Parking Spot Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/my-login.css">
  
    
</head>

<body class="my-login-page">

    <header >  
      <!-- <h4>Welcome <?php echo $login_session; ?></h4> -->
      <a style ="font-size:100%; color:#FFFFFF;" href="welcome.php">SpotOn</a>
        <a style ="float: right; color:#FFFFFF;" href="logout.php">Logout</a>      
        <a style ="float: right; color:#FFFFFF;" href="contact_us.html">Contact</a> 
        <a style ="float: right; color:#FFFFFF;" href="about_us.html">About Us</a>                         
    </header>

    <?php
      include 'config.php';
      include('session.php');

      // var_dump($_POST);
      // echo $myarrival;
      // $parking_location = mysqli_real_escape_string($conn,$_POST['city']);

      // $parking_locations = mysqli_real_escape_string($conn,$_POST['parking_locations']); 
      // echo $parking_locations;
      $arrival = mysqli_real_escape_string($conn,$_POST['arrival']); 
      $departure = mysqli_real_escape_string($conn,$_POST['departure']); 
      // $booking_fee = 2; 
      // $parking_fee = mysqli_real_escape_string($conn,$_POST['price']);
      // $parking_fee = str_replace("/","",$parking_fee); 
      // $parking_location = mysqli_real_escape_string($conn,$_POST['parking_location']); 
      // $parking_location = str_replace("/","",$parking_location);

      // if (empty($parking_location)) {$parking_location = 'Value not entered';}

      // if (empty($parking_fee)) 
      //   {$parking_fee = 'Parking fee not available';
      //    $parking_fee_total = 'Total not available';
      //   }
      //   else {
      //   $parking_fee_total = $parking_fee + $booking_fee; 
      //   }


      if (empty($arrival)) 
        {$arrival = 'Value not entered';}
      else {
        $arrival = str_replace("/","",$arrival);
        $arrival_date = new DateTime($arrival); 
        }

      if (empty($departure)) 
        {$departure = 'Value not entered';}
      else {
        $departure = str_replace("/","",$departure);
        $departure_date = new DateTime($departure); 
        }     

      if (empty($arrival) || empty($departure)) 
        {$diff = 'Value not entered';}
      else {
        $diff=date_diff($arrival_date,$departure_date);
        }   

      // echo $login_session;
      $sql = "select * from user where user_id =$login_sess";
      
      $result = $conn->query($sql) or die (mysqli_error($conn));

      if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $fullname =  $row["fullname"]; 
        $email =  $row["email"]; 
        $city =  $row["city"]; 
        $zipcode =  $row["zipcode"]; 
        $phone =  $row["phone"]; 
      }

      } 
      else { echo "0 results"; }
      $conn->close();

    ?>


            <section style="float: left; margin: 0px; margin-left: 80px;  margin-right: 0px; width: 40% ">

                <div class="card fat">
                    <div class="card-body">
                        <h4 class="card-title">Your Details</h4>
                    <div > 
                                              
                        <div class="form-group">
                            <label for="Full Name">Full Name</label>
                            <label class="form-control"><?php echo $fullname ?></label> 
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <label class="form-control"><?php echo $email ?></label> 
                        </div>
                                              
                        <div class="form-group">
                            <label for="city">City of Residence</label>
                            <label class="form-control"><?php echo $city ?></label> 
                        </div>

                        <div class="form-group">
                            <label for="zip">Area Code</label>
                            <label class="form-control"><?php echo $zipcode ?></label> 
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <label class="form-control"><?php echo $phone ?></label> 
                        </div>

                    </div>

                    </div>
                </div>
                
            </section>
        

        <section style="float: left; margin: 0px; margin-left: 100px; width: 40%; ">
                <div class="card fat" style="margin-left: 20px">
                    <div class="card-body">
                        <h4 class="card-title">Your Booking Details</h4>

                    <div > 
                                              
                        <div class="form-group" style="display: block;">
                            <label for="parking_location">Parking Location</label>
                            <label class="form-control" id="parking_location"></label>
                        </div>

                        <div class="form-group">
                            <label for="parking_duration">Parking Duration</label>
                            <label class="form-control"><?php 
                            if (empty($arrival) || empty($departure)) 
                                {echo $diff;}
                            else {
                                echo $diff->format('%d days');
                                }    
                            ?></label>
                        </div>
                                              
                        <div class="form-group">
                            <label for="parking_fee">Parking Fee</label>
                            <label class="form-control" id="parking_fee" ></label>
                        </div>

                        <div class="form-group">
                            <label for="booking_fee">Booking Fee</label>
                            <label class="form-control" id="booking_fee"></label>
                        </div>

                        <div class="form-group">
                            <label for="total">Total</label>
                            <label class="form-control" id="total_parking_fee"></label>
                        </div>

                    </div>

                    </div>
                </div>
                
            </section>
   
   <section >

        <div class="container">
            <div class="row justify-content-md-center">
                <div class="card-wrapper">
                  <form action = "insertparking.php"  method="POST" >

                    <div class="form-group m-0">
                        <div>
                        <input type="hidden" name='parking_location_data' id="parking_location_data" value="" />
                        <input type="hidden" name='parking_fee_data' id="parking_fee_data" value="" />
                        <input type="hidden" name='booking_fee_data' id="booking_fee_data" value="" />
                        <input type="hidden" name='total_parking_fee_data' id="total_parking_fee_data" value="" />
                                                 
                        </div> 

                        <button style="margin-top:10px" type="submit" class="btn btn-primary btn-block">
                            BOOK
                        </button>
                    </div>


                    
                </form>
            </div>
                
            </div>
        </div>
    </section>
    
</div>

    <script>
        var selected_parking = JSON.parse(sessionStorage.getItem("selected_parking"));

        var parking_duration = <?php echo json_encode($diff, JSON_PRETTY_PRINT) ?>;

        
        var booking_fee = 2;
        var parking_location = selected_parking.area
        if (!parking_location) {
            parking_location = "Value not entered";
        }

        var parking_fee = selected_parking.price
        var total_parking_fee = 0;
        if (!parking_fee) {
            parking_fee = "Value not entered";
            total_parking_fee = "Value not available";
        } else {
            total_parking_fee = Number(selected_parking.price)*Number(parking_duration.d) + Number(booking_fee);
        }

        document.getElementById("parking_location").innerHTML = parking_location;
        document.getElementById("parking_fee").innerHTML = parking_fee;
        document.getElementById("booking_fee").innerHTML = booking_fee;
        document.getElementById("total_parking_fee").innerHTML = total_parking_fee;


        

        var book_parking = {parking_location: parking_location, 
                            parking_duration: parking_duration,
                            parking_fee: parking_fee, 
                            booking_fee: booking_fee,
                            total_parking_fee: total_parking_fee
                        };
        sessionStorage.setItem("book_parking", JSON.stringify(book_parking));
        

        // send parking data 
        document.getElementById('parking_location_data').value = parking_location;
        document.getElementById('parking_fee_data').value = parking_fee;
        document.getElementById('booking_fee_data').value = booking_fee;
        document.getElementById('total_parking_fee_data').value = total_parking_fee;


      
    </script>
    

</body>
</html>
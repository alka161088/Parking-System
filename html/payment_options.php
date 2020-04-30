<?php
   include('session.php');
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Payment Options Page</title>
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

       
            <section style="float: left; margin: 0px; margin-left: 80px;  margin-right: 0px; width: 40% ">

                <div class="card fat">
                    <div class="card-body">
                        <h4 style="margin-bottom: 0px; margin-top: 0px" class="card-title success-checkmark">Your Details</h4>
                    </div>
                </div>

                <div style="margin: 0px" class="card fat">
                    <div style="padding-top: 0px" class="card-body">
                        <h4 style="margin-bottom: 0px; margin-top: 0px" class="card-title">Select Your Payment Method</h4>

                        <label style="margin:20px">
                          <input type="radio" name="test" value="small" checked>
                          <img src="../img/payment_credit_card.png">
                        </label>

                        <label style="margin:20px">
                          <input type="radio" name="test" value="big">
                          <img src="../img/pp-acceptance-large.png">
                        </label>

                        <div class="form-group">
                            <label for="cardholder_name">Name of Cardholder</label>
                            <input id="cardholder_name" type="text" class="form-control" name="cardholder_name" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="card_number">Card Number</label>
                            <input id="card_number" type="text" class="form-control" name="card_number" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="expiry">Expiry and CVV</label>
                            <input id="expiry" type="text" class="form-control" name="expiry" placeholder="">
                        </div>
                    </div>
                </div>
                
            </section> 

        <section style="float: left; margin: 0px; margin-left: 100px; width: 40%; ">
                <div class="card fat" style="margin-left: 20px">
                    <div class="card-body">
                        <h4 class="card-title">Your Booking Details</h4>

                    <div > 
                                              
                        <div class="form-group">
                            <label for="parking_location">Parking Location</label>
                            <label class="form-control" id="parking_location"></label>
                        </div>

                        <div class="form-group">
                            <label for="parking_duration">Parking Duration</label>
                            <label class="form-control" id="parking_duration"></label>
                        </div>
                                              
                        <div class="form-group">
                            <label for="parking_fee">Parking Fee</label>
                            <label class="form-control" id="parking_fee"></label>
                        </div>

                        <div class="form-group">
                            <label for="booking_fee">Booking Fee</label>
                            <label class="form-control" id="booking_fee"></label>
                        </div>

                        <div class="form-group">
                            <label for="total" style="font-weight: bold;">Total</label>
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

                    <div class="form-group m-0">
                        <button style="margin-top:10px" onclick="alert('Booking Confirmed. Thanks for booking with us!')" id = "button_click" type="button" class="btn btn-primary btn-block">
                            COMPLETE
                        </button>
                    </div>

                    
                </form>
            </div>
                
            </div>
        </div>
    </section>


    <script>


        var book_parking = JSON.parse(sessionStorage.getItem("book_parking"));
        console.log(book_parking.parking_duration)

        var parking_duration = book_parking.parking_duration;
        if (parking_duration != 'Value not entered') {
            parking_duration = parking_duration.days + ' days';
        }

        document.getElementById("parking_location").innerHTML = book_parking.parking_location;
        document.getElementById("parking_duration").innerHTML = parking_duration;
        document.getElementById("parking_fee").innerHTML = book_parking.parking_fee;
        document.getElementById("booking_fee").innerHTML = book_parking.booking_fee;
        document.getElementById("total_parking_fee").innerHTML = book_parking.total_parking_fee;
        
    </script>
    
    
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SpotOn</title>
  
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Satisfy|Bree+Serif|Candal|PT+Sans">
  <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
</script>

  <!-- <script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script> -->
  <!-- <link rel="stylesheet" type="text/css" href="../css/my-login.css"> -->

  <!-- <script data-main="../js/app.js" src="../js/require.js"></script> -->
</head>

<body>
  <header >  
<<<<<<< HEAD
    <a style ="font-size:100%; " href="../index.html">SpotOn</a>
      <a style ="float: right;" href="login_check.html">Login</a>     
=======
    SpotOn  
      <a style ="float: right;" href="login.php">Login</a>      
>>>>>>> 5fc4a028f82d639276f922aa520e41acae4c659c
      <a style ="float: right;" href="contact_us.html">Contact</a> 
      <a style ="float: right;" href="about_us.html">About Us</a>                         
  </header> 
  <?php
  include 'config.php';
      // var_dump($_POST);
      $mycity = mysqli_real_escape_string($conn,$_POST['city']);
      $myarrival = mysqli_real_escape_string($conn,$_POST['arrival']); 
      $mydeparture = mysqli_real_escape_string($conn,$_POST['departure']); 

      if (empty($mycity)) {$mycity = 'Value not entered';}
      if (empty($myarrival)) {$myarrival = 'Value not entered';}
      if (empty($mydeparture)) {$mydeparture = 'Value not entered';}

  ?>
  <div class="search-section" style="margin-top: 10px; margin: 0px" >
    <div>
      <label style="padding-left: 30px;" for="name">Where you want to park?</label>          
      <label style="width: 270px; margin-left: 40px; color: #000000 ; background: #fff ;"><?php echo $mycity ?></label>
    </div>
    <div>
      <label style="padding-left: 0px;" for="name">Arrival</label>
      <label style="width: 270px; color: #000000 ; background: #fff ;"><?php echo $myarrival ?></label>
    </div>
    <div >
      <label for="name">Departure</label>
      <label style="width: 270px; color: #000000 ; background: #fff ;"><?php echo $mydeparture ?></label>
    </div>            
  </div>   

  <div class="select-parking-section">
    <!-- <div style="margin-left: 20px; margin-top: 20px">
      Car Parking near Domain Drive, Austin, TX, USA
    </div>
     --><div style="margin-left: 20px; margin: 20px">
      <h3>Select your parking from below options</h3>
          
      <!-- <style>
      table {
      border-collapse: collapse;
      width: 100%;
      color: #588c7e;
      font-family: monospace;
      font-size: 25px;
      text-align: left;
      }
      th {
      background-color: #588c7e;
      color: white;
      }
      tr:nth-child(even) {background-color: #f2f2f2}
      </style> -->
<<<<<<< HEAD
      <form action = "login_check.html"  method="POST" >
        <!-- <form method="POST" > -->
=======
      <form action = "book_parking_spot.php"  method="POST" >
>>>>>>> 5fc4a028f82d639276f922aa520e41acae4c659c
      <table>
        <tr>
          <th></th>
          <th>Company Name</th>
          <th>Location</th>
<<<<<<< HEAD
          <th>Price (USD)</th>
=======
          <th>Price</th>
>>>>>>> 5fc4a028f82d639276f922aa520e41acae4c659c
        </tr>
      <?php
      $sql = "SET @row := 0";
      $conn->query($sql) or die (mysqli_error($conn));
      $sql = "select @row := @row + 1 as rec_id, c.c_name,a.area,a.price,a.day,a.spots_covered,a.spots_uncovered, a.lat, a.long from availability a join company c on c.company_id = a.company_id  where day between '$myarrival' and '$mydeparture' and lower(a.city) = lower('$mycity') limit 6";
      $result = $conn->query($sql) or die (mysqli_error($conn));

      if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $parking_locations[] = $row;
        echo "</td><td>";
        echo "<input type='radio' name='parking' id="  . $row["rec_id"] . "value=" . $row["rec_id"] . "/>";
        echo "</td><td>" . $row["c_name"]. "</td><td>" . $row["area"] . "</td><td>" . $row["price"]. "</td></tr>";
        
        // echo "<input type='hidden' name='select_parking' value=" . $row["c_name"] . "/>";        
        // echo "<input type='hidden' name='c_name' value=" . $row["c_name"] . "/>";        
        // echo "<input type='hidden' name='parking_location' value=" . $row["area"] . "/>";        
        // echo "<input type='hidden' name='price' value=" . $row["price"] . "/>";   
        echo "<input type='hidden' name='arrival' value=" . $myarrival . "/>";   
        echo "<input type='hidden' name='departure' value=" . $mydeparture . "/>";        
      }

      } 
      else { echo "0 results"; }
      $conn->close();
      
      ?>
      </table>

      <div style="text-align:center;" >
<<<<<<< HEAD
          <button style="margin-top:10px; background-color: #008000; margin-top: 40px;  padding-left: 70px; padding-right: 70px"  type="submit" class="btn btn-primary ">
=======
          <button style="margin-top:10px; background-color: #008000; margin-top: 40px;" type="submit" class="btn btn-primary ">
>>>>>>> 5fc4a028f82d639276f922aa520e41acae4c659c
              NEXT
          </button>
      </div>   
      </form>     


 
         <script> 

          jQuery(function() {
  jQuery("input:radio[name=parking]").on("change", function() {
      if (jQuery(this).is(":checked")) {
        // do stuff
        var ele = document.getElementsByName('parking'); 
              
            for(i = 0; i < ele.length; i++) { 

              console.log(ele[i].checked);
                if(ele[i].checked) {
                var selected_parking = parking_locations[i];
                sessionStorage.setItem("selected_parking", JSON.stringify(selected_parking));
                }
            } 
      }
    })
    // trigger `change` event at page load
    .change();
})

    </script> 
    
     <!--  <script>
        document.addEventListener("DOMContentLoader", () => {
        	const rows = document.querySelectorAll("tr[data-href]");
        //	console.log(rows);
        	rows.forEach(row =>{
        		row.addEventListener("click", () => {      			
        			window.location.href = row.dataset.href;      			
        		});      		
        	});      	
        });
      </script> -->
    </div>
  </div>   

   
  <div class="map-section" id="map">  
    
    <script>

    var parking_locations = <?php echo json_encode($parking_locations, JSON_PRETTY_PRINT) ?>;
      
      console.log(parking_locations);

      function initMap() {

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: new google.maps.LatLng(30.407268, -97.683398),
          mapTypeId: google.maps.MapTypeId.ROADMAP,
        })

        var infowindow = new google.maps.InfoWindow({})

        var marker, i

        for (i = 0; i < parking_locations.length; i++) {
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(parking_locations[i].lat, parking_locations[i].long),
            map: map,
          })

          google.maps.event.addListener(
            marker,
            'click',
            (function(marker, i) {
              return function() {
                infowindow.setContent(''.concat('<strong>', parking_locations[i].area,'</strong><br>Company Name:',
<<<<<<< HEAD
            parking_locations[i].c_name,'<br>Price $', parking_locations[i].price))
=======
            parking_locations[i].c_name,'<br>Day', parking_locations[i].day ,'<br>Price', parking_locations[i].price))
>>>>>>> 5fc4a028f82d639276f922aa520e41acae4c659c
                infowindow.open(map, marker)
              }
            })(marker, i)
          )
        }
      }      
    </script>


      <!--Load the API from the specified URL
      * The async attribute allows the browser to render the page while the API loads
      * The key parameter will contain your own API key (which is not needed for this tutorial)
      * The callback parameter executes the initMap() function
      -->
    <script async defer
<<<<<<< HEAD
      src="https://maps.googleapis.com/maps/api/js?key=API_KEY&callback=initMap">
=======
      src="https://maps.googleapis.com/maps/api/js?key=<APIKEY>&callback=initMap">
>>>>>>> 5fc4a028f82d639276f922aa520e41acae4c659c
    </script>        
  </div>  
  
</body>
</html>
<?php
$email = $_POST['email'];
$city = $_POST['city'];
$area = $_POST['area'];
$day = $_POST['day'];
$covered = $_POST['covered'];
$price = $_POST['price'];
$spot_covered = $_POST['Spot_covered'];
$spot_uncovered = $_POST['Spot_uncovered'];


 if(!empty($covered)||!empty($email)||!empty($city)||!empty($area)||!empty($price)||!empty($spot_covered)||!empty($spot_uncovered))
{
	$dbhost = 'parking-system.cmsnlbdux8it.us-east-1.rds.amazonaws.com';
	$username = 'admin';
	$password = 'parking_system';
	$dbname = 'parking';

//create connection
$conn = new mysqli($dbhost, $username, $password, $dbname);
if(mysqli_connect_error()){
die('Connect Error('.mysqli_connect_errno().')'. mysql_connect_error());
}
else{
$SELECT ="SELECT email From user Where email = ? Limit 1";
$company ="SELECT company_id From company Where email ='$email' Limit 1";
$INSERT = "INSERT Into availability(company_id,day,city,area,covered_fl,price,spots_covered,spots_uncovered) values(?,?,?,?,?,?,?,?)";


$result =$conn->query($company);
$row=$result->fetch_assoc();
$company_id=$row["company_id"];



//prepare statement
$stmt = $conn->prepare($SELECT);
$stmt->bind_param("s",$email);
$stmt->execute();
$stmt->bind_result($email);
$stmt->store_result();
$rnum=$stmt->num_rows;




if($rnum==0){
$stmt->close();
$stmt =$conn->prepare($INSERT);

$stmt->bind_param("isssiiii",$company_id,$day,$city,$area,$covered,$price,$spot_covered,$spot_uncovered);
//echo $stmt;
$stmt->execute();

echo "Parking details submitted !";


//echo "Thanks for signing up with us, ".$name . " Please wait as you will be redirected to login page";
echo "<script>setTimeout(\"location.href = 'parking_owner_details_add.html';\",5000);</script>";



//header('location: login.php');
}
else {
echo "Someone already register using this email";
}
$stmt->close();
$conn->close();
}
}
else{
echo"All fields are required";
die();
}
?>

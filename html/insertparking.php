<?php
include('session.php');
$pl = $_POST['parking_location_data'];
$pf = $_POST['parking_fee_data'];
$bf = $_POST['booking_fee_data'];
$tp = $_POST['total_parking_fee_data'];
$userid = $login_sess;
//if(filter_var($user_id, FILTER_VALIDATE_STRING)=== false){
//	echo "Not int";
//}
//else{
//	echo "int";
//}
//echo "userid is ". is_string($userid);

 if(!empty($pl)||!empty($pf)||!empty($bf)||!empty($tp)||!empty($user_id))
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
$SELECT ="SELECT user_id From user Where user_id = ? Limit 1";
$INSERT = "INSERT Into res_test(user_id,parking_loc,parking_fee,booking_fee,total_fee) values(?,?,?,?,?)";
//prepare statement
$stmt = $conn->prepare($SELECT);
$stmt->bind_param("s",$userid);
$stmt->execute();
$stmt->bind_result($userid);
$stmt->store_result();
$rnum=$stmt->num_rows;

$stmt->close();
$stmt =$conn->prepare($INSERT);
$stmt->bind_param("ssiii",$userid,$pl,$pf,$bf,$tp);
$stmt->execute();


header('location: payment_options.php');

$stmt->close();
$conn->close();
}
}
else{
echo"All fields are required";
die();
}
?>

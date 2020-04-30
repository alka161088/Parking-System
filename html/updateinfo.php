<?php
$email = $_POST['email'];
$name = $_POST['name'];
$city = $_POST['city'];
$area = $_POST['area'];
$phone = $_POST['phone'];


 if(!empty($name)||!empty($email)||!empty($city)||!empty($area)||!empty($phone))
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
$UPDATE = "update user set fullname = ?, city = ?, zipcode = ?, phone = ? where email = ?";

//prepare statement
$stmt = $conn->prepare($SELECT);
$stmt->bind_param("s",$email);
$stmt->execute();
$stmt->bind_result($email);
$stmt->store_result();
$rnum=$stmt->num_rows;
if($rnum==1){
$stmt->close();
$stmt =$conn->prepare($UPDATE);

$stmt->bind_param("sssis",$name,$city,$area,$phone,$email);
//echo $stmt;
$stmt->execute();

echo "success";
//echo "Thanks for signing up with us, ".$name . " Please wait as you will be redirected to login page";
// echo "<script>setTimeout(\"location.href = 'login.php';\",10000);</script>";



header('location: welcome.php');
}
else {
echo "email cannot be changed";
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

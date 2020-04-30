<?php
$name = $_POST['name'];
$email = $_POST['email'];
$state = $_POST['state'];
$zipcode = $_POST['zipcode'];
$city = $_POST['city'];
$area = $_POST['parking_location'];
$phone = $_POST['phone'];
$password = $_POST['password'];
 if(!empty($name)||!empty($email)||!empty($city)||!empty($area)||!empty($phone)||!empty($state)||!empty($zipcode)||!empty($password))
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
$INSERT = "INSERT Into company(c_name,email,phone,address,city,state,zip_code,password) values(?,?,?,?,?,?,?,?)";
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
$stmt->bind_param("ssisssss",$name,$email,$phone,$area,$city,$state,$zipcode,$password);
$stmt->execute();

echo "Thanks for signing up with us, ".$name . "\n Please wait as you will be redirected to login page";
echo "<script>setTimeout(\"location.href = 'login1.php';\",10000);</script>";



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

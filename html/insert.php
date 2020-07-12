<?php
$name = $_POST['name'];
$email = $_POST['email'];
$city = $_POST['city'];
$area = $_POST['area'];
$phone = $_POST['phone'];
$password = $_POST['password'];
 if(!empty($name)||!empty($email)||!empty($city)||!empty($area)||!empty($phone)||!empty($password))
{
	$dbhost = 'parking-system.cmsnlbdux8it.us-east-1.rds.amazonaws.com';
	$username = 'admin';
<<<<<<< HEAD
	$dbpassword = 'parking_system';
	$dbname = 'parking';

//create connection
$conn = new mysqli($dbhost, $username, $dbpassword, $dbname);
=======
	$password = 'parking_system';
	$dbname = 'parking';

//create connection
$conn = new mysqli($dbhost, $username, $password, $dbname);
>>>>>>> 5fc4a028f82d639276f922aa520e41acae4c659c
if(mysqli_connect_error()){
die('Connect Error('.mysqli_connect_errno().')'. mysql_connect_error());
}
else{
$SELECT ="SELECT email From user Where email = ? Limit 1";
$INSERT = "INSERT Into user(email,fullname,phone,zipcode,city,password) values(?,?,?,?,?,?)";
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
$stmt->bind_param("ssisss",$email,$name,$phone,$area,$city,$password);
$stmt->execute();

echo "Thanks for signing up with us, ".$name . " Please wait as you will be redirected to login page";
<<<<<<< HEAD
echo "<script>setTimeout(\"location.href = 'login.php';\",5000);</script>";
=======
echo "<script>setTimeout(\"location.href = 'login.php';\",10000);</script>";
>>>>>>> 5fc4a028f82d639276f922aa520e41acae4c659c



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

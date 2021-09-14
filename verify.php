<?php
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
session_start();
$sql="UPDATE `login` SET `User Type`='$_POST[verify]',`Verification`='Verified'  WHERE `Matric Number`='$_POST[matric_number]'";

if (!mysqli_query($con,$sql)){
	echo "User record doesn't exist";
}else{
	echo "You have successfully verified the user!";
}
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="Assets/logo.png"></head>
<body>
<button onclick="document.location='admin.php'">Home</button>
</body>
</html>
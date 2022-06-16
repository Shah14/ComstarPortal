<?php
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
session_start();
$sql="UPDATE `login` SET `User Type`='$_POST[verify]',`Verification`='Verified'  WHERE `Email`='$_POST[email]'";

if (!mysqli_query($con,$sql)){
	echo "User record doesn't exist";
}header("Location: admin_verify.php");
$_SESSION["Alert"] = "You have successfully verified a user!"; //for alert 
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../assets/logo/logo.png"></head>
<body>
<button class="btn btn-outline-danger"onclick="document.location='admin_verify.php'">Home</button>
</body>
</html>
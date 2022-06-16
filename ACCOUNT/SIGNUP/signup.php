<?php
session_start();
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

$sql="INSERT INTO `login`(`Email`,`Password`,`Full Name`,`Name`,`Verification`,`User Type`,`Matric Number`,`Image`) 
VALUES('$_POST[email]',MD5('$_POST[pass]'),'$_POST[fname]','$_POST[name]','Unverified','Public','None','default.png')";

if (!mysqli_query($con,$sql)){
	$_SESSION["Alert"] = "Account creation failed!"; //for alert 
}else{
	$_SESSION["Alert"] = "Account creation successful!"; //for alert 
}header("Location: ../login/login.php");

mysqli_close($con);
?>
<html>
<head><link rel="icon" href="assets/logo/logo.png"></head>
<body>
<button onclick="document.location='../../USER/Home/home.php'">Log In</button>
</body>
</html>
<?php
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

$sql="INSERT INTO `login`(`Email`,`Password`,`Name`,`Verification`,`User Type`,`Matric Number`,`Image`) 
VALUES('$_POST[email]',MD5('$_POST[pass]'),'User','Unverified','Public','None','default')";

if (!mysqli_query($con,$sql)){
	echo "This user already signed up!";
	return;
}echo "You have successfully signed up!";
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="Assets/logo.png"></head>
<body>
<button onclick="document.location='home.php'">Log In</button>
</body>
</html>
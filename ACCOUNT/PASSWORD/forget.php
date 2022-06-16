<?php
session_start();
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}


$sql="UPDATE `login` SET `Password`=MD5('$_POST[pass]')
WHERE `Email`='$_POST[email]'";

$sql1="UPDATE `admin` SET `Password`=MD5('$_POST[pass]')
WHERE `Email`='$_POST[email]'";

if (!mysqli_query($con,$sql)){
}header("Location: ../login/login.php");
$_SESSION["Alert"] = "You have successfully reset the password!"; //for alert 
$con->query($sql1);
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="assets/logo/logo.png"></head>
<body>
<button onclick="document.location='../../USER/Home/home.php'">Log In</button>
</body>
</html>

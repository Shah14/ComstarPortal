<?php
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
session_start();

$q=$_SESSION["User"];
$sql="UPDATE `login`SET `Password`=MD5('$_POST[password]') WHERE Email='$q'";

if (!mysqli_query($con,$sql)){
}header("Location: profile.php");
$_SESSION["Alert"] = "You have successfully updated your password!"; //for alert 
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../assets/logo/logo.png"></head>
<body>
<button class="btn btn-outline-danger"onclick="document.location='profile.php'">Back</button>
</body>
</html>
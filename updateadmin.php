<?php
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
session_start();
$q=$_SESSION["Admin"];
$sql="UPDATE `admin` SET `Name`='$_POST[name]' WHERE Email='$q'";

if (!mysqli_query($con,$sql)){
}echo "You have successfully updated!";
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="Assets/logo.png"></head>
<body>
<button onclick="document.location='adminprofile.php'">Back</button>
</body>
</html>
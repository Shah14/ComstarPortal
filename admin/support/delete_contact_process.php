<?php
session_start();
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

$sql="DELETE FROM `contact` WHERE `ID`='$_POST[id]'";

if (!mysqli_query($con,$sql)){
}header("Location: admin_contact.php");
$_SESSION["Alert"] = "You have successfully deletd a user message!"; //for alert 
mysqli_close($con);

?>
<html>
<head><link rel="icon" href="../../assets/logo/logo.png"></head>
<body>
<button class="btn btn-outline-danger" onclick="document.location='admin_contact.php'">Back</button>
</body>
</html>
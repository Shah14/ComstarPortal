<?php
session_start();
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
$sql="UPDATE `homepage` 
SET `About`='$_POST[about]',`Date Updated`=now()
WHERE `ID`='1';";

if (!mysqli_query($con,$sql)){
}header("Location: edit_homepage.php?id=about&name=aboutus");
$_SESSION["Alert"] = "You have successfully edited the About Us Section!"; //for alert 
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../assets/logo/logo.png"></head>
<body>
<button class="btn btn-outline-danger" onclick="document.location='edit_homepage.php'">Back</button>
</body>
</html>
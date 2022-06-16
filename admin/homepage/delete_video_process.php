<?php
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
session_start();
$sql="DELETE FROM `homepage` WHERE `ID`='$_POST[id]'";

if (!mysqli_query($con,$sql)){
}header("Location: edit_homepage.php?id=video");
$_SESSION["Alert"] = "You have successfully deleted a video!"; //for alert 

mysqli_close($con);

?>
<html>
<head><link rel="icon" href="../../assets/logo/logo.png"></head>
<body>
<button  class="btn btn-outline-danger"onclick="document.location='edit_homepage.php'">Back</button>
</body>
</html>
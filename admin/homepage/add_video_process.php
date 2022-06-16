<?php
$con = new mysqli("localhost","root","","comstar_portal");
date_default_timezone_set('Asia/Kuala_Lumpur');

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
session_start();
$q=$_SESSION["Admin"];
$sql="INSERT INTO `homepage` (`About`,`Year`,`Image`,`Type`)  VALUES('$_POST[name]','$_POST[year]','$_POST[video]','Video')";

if (!mysqli_query($con,$sql)){
}header("Location: edit_homepage.php?id=video&name=$_POST[name] ".date('Y-m-d H:i:s')."");
$_SESSION["Alert"] = "You have successfully added a new video!"; //for alert 
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../assets/logo/logo.png"></head>
<body>
<button class="btn btn-outline-danger" onclick="document.location='edit_homepage.php'">Back</button>
</body>
</html>
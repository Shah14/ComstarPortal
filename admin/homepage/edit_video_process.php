<?php
$con = new mysqli("localhost","root","","comstar_portal");
date_default_timezone_set('Asia/Kuala_Lumpur');

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
session_start();
$sql="UPDATE `homepage` SET `About`='$_POST[about]',`Year`='$_POST[year]',`Image`='$_POST[image]',`Date Updated`=now() WHERE ID='$_POST[id]'";

if (!mysqli_query($con,$sql)){
}header("Location: edit_homepage.php?id=video&name=$_POST[about] ".date('Y-m-d H:i:s')."");
$_SESSION["Alert"] = "You have successfully updated a video!"; //for alert 
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../assets/logo/logo.png"></head>
<body>
<button  class="btn btn-outline-danger"onclick="document.location='edit_homepage.php'">Back</button>
</body>
</html>
<?php
$con = new mysqli("localhost","root","","comstar_portal");
date_default_timezone_set('Asia/Kuala_Lumpur');

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
session_start();
$q=$_SESSION["Admin"];
$sql="UPDATE `advertisement`SET `Visibility`='$_POST[visibility]',`Date Updated`=now() WHERE ID='$_POST[id]'";


if (!mysqli_query($con,$sql)){
}header("Location: advertisement.php?name=$_POST[title] ".date('Y-m-d H:i:s')."");
$visibility = strtolower($_POST['visibility']);
$_SESSION["Alert"] = "An advertisement is now $visibility" ; //for alert 
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../assets/logo/logo.png"></head>
<body>
<button class="btn btn-outline-danger" onclick="document.location='advertisement.php'">Back</button>
</body>
</html>
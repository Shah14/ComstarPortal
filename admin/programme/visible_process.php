<?php
$con = new mysqli("localhost","root","","comstar_portal");
date_default_timezone_set('Asia/Kuala_Lumpur');

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
session_start();
$q=$_SESSION["Admin"];
$sql="UPDATE `programme`SET `Attendance`='$_POST[visibility]',`Date Updated`=now() WHERE `Programme ID`='$_POST[id]'";


if (!mysqli_query($con,$sql)){
}header("Location: admin_programme.php?name=$_POST[programme] ".date('Y-m-d H:i:s')."");
$_SESSION["Alert"] = "A programme is now ".strtolower($_POST['visibility'])."!"; //for alert 
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../assets/logo/logo.png"></head>
<body>
<button class="btn btn-outline-danger"onclick="document.location='admin_programme.php'">Back</button>
</body>
</html>
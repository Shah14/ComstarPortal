<?php
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
session_start();
$q=$_SESSION["User"];

$sql="UPDATE `list`SET `Attend Status`='$_POST[attend]',`Present Time`=now() WHERE (Student='$q' AND `Programme ID`='$_POST[programme]')";


if (!mysqli_query($con,$sql)){
}header("Location: programme.php");
$_SESSION["Alert"] = "You have successfully attended a programme!"; //for alert 
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../assets/logo/logo.png"></head>
<body>
<button class="btn btn-outline-danger" onclick="document.location='programme.php'">Back</button>
</body>
</html>
<?php
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
session_start();
$q=$_SESSION["User"];

$sql="UPDATE `list`SET `Attend Status`='$_POST[attend]',`Present Time`=now() WHERE (Student='$q' AND Programme='$_POST[programme]')";


if (!mysqli_query($con,$sql)){
}echo "You have successfully updated!";
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="Assets/logo.png"></head>
<body>
<button onclick="document.location='programme.php'">Back</button>
</body>
</html>
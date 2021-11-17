<?php
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
session_start();
$q=$_SESSION["User"];
$sql="UPDATE `login`SET `Verification`='Pending',`Matric Number`='$_POST[matric_number]' WHERE Email='$q'";

if (!mysqli_query($con,$sql)){
}echo "You have successfully request verification!";
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../Assets/logo.png"></head>
<body>
<button onclick="document.location='../Profile/profile.php'">Home</button>
</body>
</html>
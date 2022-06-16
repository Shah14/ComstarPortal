<?php
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
session_start();
$q=$_SESSION["User"];
$sql="UPDATE `login`SET `Verification`='Pending',`Matric Number`='$_POST[matric]',`Date Status`= now() WHERE Email='$q'";

if (!mysqli_query($con,$sql)){
}header("Location: ../Profile/profile.php");
$_SESSION["Alert"] = "You have successfully sent an account verification request!"; //for alert 
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../assets/logo/logo.png"></head>
<body>
<button class="btn btn-outline-danger" onclick="document.location='../Profile/profile.php'">Home</button>
</body>
</html>
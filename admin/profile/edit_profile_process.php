<?php
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
session_start();
$q=$_SESSION["Admin"];
$sql="UPDATE `admin` SET `Name`='$_POST[name]',`Phone`='$_POST[phone]',`Education`='$_POST[education]',`Location`='$_POST[location]',`Skills`='$_POST[skills]',`Quote`='$_POST[quote]' WHERE Email='$q'";

if (!mysqli_query($con,$sql)){
}header("Location: admin_profile.php?id=update");
$_SESSION["Alert"] = "You have successfully edited your profile details!"; //for alert 
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../assets/logo/logo.png"></head>
<body>
<button  class="btn btn-outline-danger"onclick="document.location='admin_profile.php'">Back</button>
</body>
</html>
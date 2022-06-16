<?php
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
session_start();
$sql="UPDATE `committee` SET `Name`='$_POST[name]',`Role`='$_POST[role]',`Social 1`='$_POST[social1]',`Link 1`='$_POST[link1]',`Social 2`='$_POST[social2]',`Link 2`='$_POST[link2]',`Social 3`='$_POST[social3]',`Link 3`='$_POST[link3]'
,`Social 4`='$_POST[social4]',`Link 4`='$_POST[link4]' WHERE ID='$_POST[id]'";

if (!mysqli_query($con,$sql)){
}header("Location: admin.php?name=$_POST[name]#$_POST[name]");
$_SESSION["Alert"] = "You have successfully edited a committee member!"; //for alert 
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../assets/logo/logo.png"></head>
<body>
<button  class="btn btn-outline-danger"onclick="document.location='admin.php'">Back</button>
</body>
</html>
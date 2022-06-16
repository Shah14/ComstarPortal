<?php
session_start();
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

$sql="DELETE FROM `programme` WHERE `Programme ID`='$_POST[id]'";

$sql1="DELETE FROM `list` WHERE `Programme ID`='$_POST[id]'";

$result=mysqli_query($con,"SELECT * FROM `programme` WHERE `Programme ID`='$_POST[id]'");
while($row = $result->fetch_assoc()) {
  unlink('../../assets/programme/'.$row["Image"]) ; //remove file from folder
}

if (!mysqli_query($con,$sql)){
}
if (!mysqli_query($con,$sql1)){
}header("Location: admin_programme.php");
$_SESSION["Alert"] = "You have successfully deleted a programme!"; //for alert 
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../assets/logo/logo.png"></head>
<body>
<button class="btn btn-outline-danger"onclick="document.location='admin_programme.php'">Back</button>
</body>
</html>
<?php
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
session_start();
$sql="DELETE FROM `committee` WHERE `ID`='$_POST[id]'";

$result1=mysqli_query($con,"SELECT * FROM `committee` WHERE `ID`='$_POST[id]'");
while($row = $result1->fetch_assoc()) {
  unlink('../../COMSTAR Committee/MT BARU/'.$row["Picture"]) ; //remove file from folder
}

if (!mysqli_query($con,$sql)){
}header("Location: admin.php#committee");
$_SESSION["Alert"] = "You have successfully deleted a committee member!"; //for alert 
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../assets/logo/logo.png"></head>
<body>
<button  class="btn btn-outline-danger"onclick="document.location='admin.php'">Back</button>
</body>
</html>
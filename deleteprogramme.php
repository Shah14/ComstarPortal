<?php
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
$sql="DELETE FROM `programme` WHERE `Programme ID`='$_POST[id]'";


if (!mysqli_query($con,$sql)){
}echo "You have successfully deleted!";
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="Assets/logo.png"></head>
<body>
<button onclick="document.location='adminprogramme.php'">Back</button>
</body>
</html>
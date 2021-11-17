<?php
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
$sql="UPDATE `homepage` 
SET `About`='$_POST[about]'
WHERE `ID`='1';";

if (!mysqli_query($con,$sql)){
}echo "You have successfully updated!";
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../Assets/logo.png"></head>
<body>
<button onclick="document.location='adminhomeedit.php'">Back</button>
</body>
</html>
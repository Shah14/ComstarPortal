<?php
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
$sql="INSERT INTO `programme`(`Programme ID`,`Name`,`Date`,`Venue`,`Fee Price`,`Status`,`Attendance`) 
VALUES('$_POST[id]','$_POST[name]','$_POST[date]','$_POST[venue]','$_POST[fee]','$_POST[status]','Hidden')";

if (!mysqli_query($con,$sql)){
}echo "You have successfully updated!";
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../Assets/logo.png"></head>
<body>
<button onclick="document.location='adminprogramme.php'">Back</button>
</body>
</html>
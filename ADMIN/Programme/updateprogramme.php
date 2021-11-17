<?php
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
$sql="UPDATE `programme` 
SET `Name`='$_POST[name]',`Date`='$_POST[date]',`Venue`='$_POST[venue]' ,`Fee Price`='$_POST[fee]',`Status`='$_POST[status]' 
WHERE `Programme ID`='$_POST[id]';";

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
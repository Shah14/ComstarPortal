<?php
session_start();
$con = new mysqli("localhost","root","","comstar_portal");
date_default_timezone_set('Asia/Kuala_Lumpur');

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
$sql="UPDATE `programme` 
SET `Name`='$_POST[name]',`Date`='$_POST[date]',`Venue`='$_POST[venue]' ,`Fee Price`='$_POST[fee]',`Status`='$_POST[status]', `Date Updated`=now()
WHERE `Programme ID`='$_POST[id]';";

if (!mysqli_query($con,$sql)){
}header("Location: admin_programme.php?name=$_POST[name] ".date('Y-m-d H:i:s')."");
$_SESSION["Alert"] = "You have successfully updated a programme!"; //for alert 
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../assets/logo/logo.png"></head>
<body>
<button class="btn btn-outline-danger" onclick="document.location='admin_programme.php'">Back</button>
</body>
</html>
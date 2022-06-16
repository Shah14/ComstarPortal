<?php
session_start();
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

$q=$_SESSION["User"];
$sql="INSERT INTO `technical`(`Email`,`Type`,`Description`,`Date`) 
VALUES('$q','$_POST[type]','$_POST[description]',now())";

if (!mysqli_query($con,$sql)){
}header("Location: ../home/home.php");
$_SESSION["Alert"] = "You have successfully sent a report!"; //for alert 
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../assets/logo/logo.png"></head>
<body>
<button class="btn btn-outline-danger"onclick="goBack()">Back</button>
</body>

<script>
function goBack() {
  window.history.go(-2);
}
</script>
</html>
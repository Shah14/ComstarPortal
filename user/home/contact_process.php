<?php
session_start();
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

$q=$_SESSION["User"];
$sql="INSERT INTO `contact`(`Email`,`Name`,`Subject`,`Message`,`Date`) 
VALUES('$_POST[email]','$_POST[name]','$_POST[subject]','$_POST[message]',now())";

if (!mysqli_query($con,$sql)){
}header("Location: home.php");
$_SESSION["Alert"] = "You have successfully sent a message!"; //for alert 
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../assets/logo/logo.png"></head>
<body>
<a href="home.php"><button class="btn btn-outline-danger">Back</button></a>
</body>

<script>
function goBack() {
  window.history.go(-2);
}
</script>
</html>
<?php
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
session_start();
$sql="DELETE FROM `homepage` WHERE `ID`='$_POST[id]'";


$result=mysqli_query($con,"SELECT * FROM `homepage` WHERE `ID`='$_POST[id]'");
while($row = $result->fetch_assoc()) {
  unlink('../../assets/event/'.$row["Image"]) ; //remove file from folder
}


if (!mysqli_query($con,$sql)){
}header("Location: edit_homepage.php?id=gallery");
$_SESSION["Alert"] = "You have successfully deleted an image from the gallery!"; //for alert 

mysqli_close($con);

?>
<html>
<head><link rel="icon" href="../../assets/logo/logo.png"></head>
<body>
<button  class="btn btn-outline-danger"onclick="document.location='edit_homepage.php'">Back</button>
</body>
</html>
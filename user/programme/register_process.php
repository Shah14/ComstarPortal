<?php
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
session_start();
$q=$_SESSION["User"];
$result=mysqli_query($con,"SELECT * FROM `login` WHERE Email='$q'");
if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$name=$row["Full Name"];
						$matric=$row["Matric Number"];
						}
					}
$sql="INSERT INTO `list` (`Student`,`Name`,`Matric Number`,`Programme ID`,`Attend Status`,`Button`) 
VALUES('$q','$name','$matric','$_POST[register]','Not Present','hidden')";

if (!mysqli_query($con,$sql)){
}header("Location: programme.php");
$_SESSION["Alert"] = "You have successfully registered for a programme!"; //for alert 
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../assets/logo/logo.png"></head>
<body>
<button class="btn btn-outline-danger" onclick="document.location='programme.php'">Back</button>
</body>
</html>
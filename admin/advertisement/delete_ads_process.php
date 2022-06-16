<?php
session_start();
?>
<?php
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
$q=$_SESSION["Admin"];
$result=mysqli_query($con,"SELECT * FROM `admin` WHERE Email='$q'");
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$name=$row["Name"];		
		}
	}

$sql="DELETE FROM `advertisement` WHERE `ID`='$_POST[id]'";

$result1=mysqli_query($con,"SELECT * FROM `advertisement` WHERE `ID`='$_POST[id]'");
while($row = $result1->fetch_assoc()) {
  unlink('../../assets/advertisement/'.$row["Banner"]) ; //remove file from folder
}

if (!mysqli_query($con,$sql)){
}header("Location: advertisement.php");
$_SESSION["Alert"] = "You have successfully deleted an advertisement!"; //for alert 
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../assets/logo/logo.png"></head>
<body>
<button class="btn btn-outline-danger"onclick="document.location='advertisement.php'">Back</button>
</body>
</html>
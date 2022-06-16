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

$sql="DELETE FROM `forum` WHERE `Post ID`='$_POST[id]'";

$sql1="DELETE FROM `reply` WHERE `Post ID`='$_POST[id]'";

$sql2="DELETE FROM `likes` WHERE `Post ID`='$_POST[id]'";

$sql3="DELETE FROM `report` WHERE `Post ID`='$_POST[id]'";

if (!mysqli_query($con,$sql)){
}
if (!mysqli_query($con,$sql1)){	
}
if (!mysqli_query($con,$sql2)){
}
if (!mysqli_query($con,$sql3)){
}header("Location: admin_forum.php");
$_SESSION["Alert"] = "You have successfully deleted a post!"; //for alert 
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../assets/logo/logo.png"></head>
<body>
<button onclick="document.location='admin_forum.php'">Back</button>
</body>
</html>
<?php
session_start();

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

$result1=mysqli_query($con,"SELECT * FROM `forum` WHERE `Post ID`='$_POST[id]'");
if ($result1->num_rows > 0) {
	while($row = $result1->fetch_assoc()) {
		$num=$row["Replies"];
		$num=$num+1;		
		}
	}

$sql="INSERT INTO `reply`(`Post ID`,`Reply`,`Reply Number`,`Date`,`Poster`,`Poster Type`) 
VALUES('$_POST[id]','$_POST[reply]','$num',now(),'$q','Admin')";

$sql1="UPDATE `forum` 
SET `Replies`='$num',`Date Updated`=now()
WHERE `Post ID`='$_POST[id]'";


if (!mysqli_query($con,$sql)){
}
if (!mysqli_query($con,$sql1)){
}header("Location: view_post.php?name=$_POST[reply]$num&id=$_POST[id]#$_POST[reply]$num");
$_SESSION["Alert"] = "You have successfully replied to a post!"; //for alert 
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../assets/logo/logo.png"></head>
<body>
<button onclick="document.location='admin_forum.php'">Back</button>
</body>
</html>
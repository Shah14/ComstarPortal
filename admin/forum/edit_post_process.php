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
$sql="UPDATE `forum` 
SET `Title`='$_POST[title]',`Description`='$_POST[about]',`Date Updated`=now()
WHERE `Post ID`='$_POST[id]'";

$sql1="UPDATE `reply` 
SET `Title`='$_POST[title]'
WHERE `Post ID`='$_POST[id]'";

if (!mysqli_query($con,$sql)){
}
if (!mysqli_query($con,$sql1)){
}header("Location: view_post.php?name=$_POST[title]&id=$_POST[id]");
$_SESSION["Alert"] = "You have successfully edited a post!"; //for alert 
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../assets/logo/logo.png"></head>
<body>
<button onclick="document.location='admin_forum.php'">Back</button>
</body>
</html>
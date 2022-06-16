<?php
session_start();
?>
<?php
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
$q=$_SESSION["User"];
$result=mysqli_query($con,"SELECT * FROM `login` WHERE Email='$q'");
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$name=$row["Name"];		
		}
	}
$sql="UPDATE `forum` 
SET `Title`='$_POST[title]',`Description`='$_POST[about]'
WHERE `Post ID`='$_POST[id]'";

$sql1="UPDATE `reply` 
SET `Title`='$_POST[title]'
WHERE `Post ID`='$_POST[id]'";

if (!mysqli_query($con,$sql)){
}
if (!mysqli_query($con,$sql1)){
}header("Location: forum.php");
$_SESSION["Alert"] = "You have successfully edited your post!"; //for alert 
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../assets/logo/logo.png"></head>
<body>
<button class="btn btn-outline-danger" onclick="document.location='forum.php'">Back</button>
</body>
</html>
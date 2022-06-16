<?php
session_start();
?>
<?php
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
$q=$_SESSION["User"];
$result=mysqli_query($con,"SELECT * FROM `forum` WHERE `Post ID`='$_POST[id]'");
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$num=$row["Upvote"];
		$num=$num-1;		
		}
	}
$sql="UPDATE `forum` 
SET `Upvote`='$num'
WHERE `Post ID`='$_POST[id]'";

$sql2="DELETE FROM `likes` WHERE `Post ID`='$_POST[id]' AND `User`='$q'";

if (!mysqli_query($con,$sql)){
}header("Location: forum.php");
$_SESSION["Alert"] = "You have successfully unliked a post!"; //for alert 
if (!mysqli_query($con,$sql2)){
}
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../assets/logo/logo.png"></head>
<body>
<button class="btn btn-outline-danger" onclick="document.location='forum.php'">Back</button>
</body>
</html>
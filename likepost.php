<?php
session_start();
?>
<?php
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
$q=$_SESSION["User"];
$result=mysqli_query($con,"SELECT * FROM `forum` WHERE Title='$_POST[title]'");
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$num=$row["Upvote"];
		$num=$num+1;		
		}
	}
$sql="UPDATE `forum` 
SET `Upvote`='$num'
WHERE `Title`='$_POST[title]'";

if (!mysqli_query($con,$sql)){
}echo "You have successfully liked a post!";
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="Assets/logo.png"></head>
<body>
<button onclick="document.location='forum.php'">Back</button>
</body>
</html>
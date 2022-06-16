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
		$name=$row["Full Name"];		
		}
	}

$result1=mysqli_query($con,"SELECT * FROM `forum` WHERE `Post ID`='$_POST[id]'");
if ($result1->num_rows > 0) {
	while($row = $result1->fetch_assoc()) {
		$num=$row["Replies"];
		$num=$num+1;
		$id=$row["Post ID"];
		}
	}
	
$sql="INSERT INTO `reply`(`Post ID`,`Reply`,`Date`,`Poster`,`Poster Type`) 
VALUES('$_POST[id]','$_POST[reply]',now(),'$q','User')";

$sql1="UPDATE `forum` 
SET `Replies`='$num'
WHERE `Post ID`='$_POST[id]'";


if (!mysqli_query($con,$sql)){
}
if (!mysqli_query($con,$sql1)){
}header("Location: forum.php");
$_SESSION["Alert"] = "You have successfully replied to a post!"; //for alert 
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../assets/logo/logo.png"></head>
<body>
<button class="btn btn-outline-danger" onclick="document.location='forum.php'">Back</button>
</body>
</html>
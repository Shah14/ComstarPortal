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

$sql="INSERT INTO `reply`(`Title`,`Reply`,`Date`,`Poster`) 
VALUES('$_POST[title]','$_POST[reply]',now(),'$name')";

$result1=mysqli_query($con,"SELECT * FROM `forum` WHERE Title='$_POST[title]'");
if ($result1->num_rows > 0) {
	while($row = $result1->fetch_assoc()) {
		$num=$row["Replies"];
		$num=$num+1;		
		}
	}
$sql1="UPDATE `forum` 
SET `Replies`='$num'
WHERE `Title`='$_POST[title]'";


if (!mysqli_query($con,$sql)){
}echo "You have successfully added a reply!";
if (!mysqli_query($con,$sql1)){
}
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../Assets/logo.png"></head>
<body>
<button onclick="document.location='forum.php'">Back</button>
</body>
</html>
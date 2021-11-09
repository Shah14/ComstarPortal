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
WHERE `Title`='$_POST[name]'";

if (!mysqli_query($con,$sql)){
}echo "You have successfully edited a post!";
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="Assets/logo.png"></head>
<body>
<button onclick="document.location='forum.php'">Back</button>
</body>
</html>
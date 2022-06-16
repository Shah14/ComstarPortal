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
		$email=$row["Email"];		
		}
	}

$sql="INSERT INTO `forum`(`Title`,`Description`,`Date`,`Poster`,`Poster Type`) 
VALUES('$_POST[title]','$_POST[about]',now(),'$email','User')";

if (!mysqli_query($con,$sql)){
}header("Location: forum.php");
$_SESSION["Alert"] = "You have successfully added a new post!"; //for alert 
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../assets/logo/logo.png"></head>
<body>
<button class="btn btn-outline-danger" onclick="document.location='forum.php'">Back</button>
</body>
</html>
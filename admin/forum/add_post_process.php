<?php
session_start();
?>
<?php
$con = new mysqli("localhost","root","","comstar_portal");
date_default_timezone_set('Asia/Kuala_Lumpur');

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
$sql="INSERT INTO `forum`(`Title`,`Description`,`Date`,`Poster`,`Poster Type`,`User Update`,`Action Update`) 
VALUES('$_POST[title]','$_POST[about]',now(),'$q','Admin', '$q', 'Posted By')";

if (!mysqli_query($con,$sql)){
}header("Location: admin_forum.php?name=$_POST[title] ".date('Y-m-d H:i:s')."");
$_SESSION["Alert"] = "You have successfully added a post!"; //for alert 
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../assets/logo/logo.png"></head>
<body>
<button class="btn btn-outline-danger" onclick="document.location='admin_forum.php'">Back</button>
</body>
</html>
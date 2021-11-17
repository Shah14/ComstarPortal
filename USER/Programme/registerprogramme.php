<?php
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
session_start();
$q=$_SESSION["User"];
$result=mysqli_query($con,"SELECT * FROM `login` WHERE Email='$q'");
if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$name=$row["Name"];
						}
					}
$result=mysqli_query($con,"SELECT * FROM `programme` WHERE Name='$_POST[register]'");
if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$date=$row["Date"];
						$venue=$row["Venue"];	
						$fee=$row["Fee Price"];	
						$status=$row["Status"];	
						$attendance=$row["Attendance"];
						}
					}
$sql="INSERT INTO `list` (`Student`,`Name`,`Programme`,`Date`,`Venue`,`Fee Price`,`Status`,`Attend Status`) 
VALUES('$q','$name','$_POST[register]','$date','$venue','$fee','$status','Not Present')";

if (!mysqli_query($con,$sql)){
}echo "You have successfully updated!";
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../Assets/logo.png"></head>
<body>
<button onclick="document.location='programme.php'">Back</button>
</body>
</html>
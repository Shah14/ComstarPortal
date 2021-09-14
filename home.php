<?php
session_start();
if(isset($_SESSION["login"]) === true){
}else{
	header("Location: login.html");
}
print_r($_SESSION);
$q=$_SESSION["User"];
$con = new mysqli("localhost","root","","comstar_portal");
$result=mysqli_query($con,"SELECT * FROM `login` WHERE Email='$q'");
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
	  echo "<br><br>View Profile<table border='1'>
<tr>
	<td>NAME</td>
	<td>EMAIL</td>
	<td>MATRIC NUMBER</td>
	<td>ACCOUNT TYPE</td>
	<td>PASSWORD</td>
</tr><td>"
	.$row["Name"]."</td><td>" 
	.$row["Email"]."</td><td>" 
	.$row["Matric Number"]."</td><td>" 
	.$row["User Type"]."</td><td>" 
	.$row["Password"]."</td></table>
	<br><br>View Verification<table border='1'>
<tr>
	<td>NAME</td>
	<td>VERIFICATION</td>
	<td>ACCOUNT TYPE</td>
</tr><td>"
	.$row["Name"]."</td><td>" 
	.$row["Verification"]."</td><td>"
	.$row["User Type"]."</td></table>";
  }
}

?>
<!DOCTYPE html>
<html>
<title>COMSTAR Portal Home</title>
<head>
<link rel="icon" href="Assets/logo.png">
</head>
<br><br>Request Verification
<form action="requestverify.php" method="post">
<input class="text" placeholder="Enter Matric Number" required name="matric_number">
<input type="submit"value="Enter">
</form>
<h1>This is homepage</h1>


	
	
	


<button onclick="document.location='logout.php'" style="float:left">Log Out</button>
</html>
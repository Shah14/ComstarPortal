<?php
session_start();
if(isset($_SESSION["admin"]) === true){
}else{
	header("Location: login.html");
}
print_r($_SESSION);
$q=$_SESSION["Admin"];

?>
<!DOCTYPE html>
<html>
<title>COMSTAR Portal Admin Dashboard</title>
<head>
<link rel="icon" href="Assets/logo.png">
</head>
<h1>This is admin dashboard</h1>
<button onclick="document.location='logout.php'" style="float:left">Log Out</button>
<?php
$con = new mysqli("localhost","root","","comstar_portal");


$result=mysqli_query($con,"SELECT * FROM `admin` WHERE Email='$q'");
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
	  echo "<br><br>View Profile<table border='1'>
<tr>
	<td>NAME</td>
	<td>EMAIL</td>
	<td>PASSWORD</td>
</tr><td>"
	.$row["Name"]."</td><td>" 
	.$row["Email"]."</td><td>" 
	.$row["Password"]."</td></table>";
  }
}
$result1=mysqli_query($con,"SELECT * FROM `login` WHERE `Verification`='Pending'");
    echo "<br><br>Verify User<br><table border='1'>
<tr>
	<td>NAME</td>
	<td>EMAIL</td>
	<td>MATRIC NUMBER</td>
	<td>VERIFICATION</td>
</tr>";
if ($result1->num_rows > 0) {
  while($row = $result1->fetch_assoc()) {
	echo "<tr>";
	echo "<td>".$row["Name"]."</td><td>" 
	. $row["Email"]. "</td><td>" 
	. $row["Matric Number"]. "</td><td>" 
	. $row["Verification"]."</td>";
  }
} 
?>
<body>
<form action="verify.php" method="post">
<input class="text" placeholder="Enter Matric Number" required name="matric_number">
<br><input type="radio" required checked id="UTM" name="verify" value="UTM">UTM
<br><input type="radio" required id="COMSTAR" name="verify" value="COMSTAR">COMSTAR
<br><input type="radio" required id="Non-Student" name="verify" value="Non-Student">Non-Student
<br><input type="submit"value="Verify">
</form>
</html>
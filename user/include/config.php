<?php
session_start();
if(isset($_SESSION["login"]) === true){
}else{
	header("Location: ../../ACCOUNT/LOGIN/login.php");
}
//print_r($_SESSION);
$q=$_SESSION["User"];
$con = new mysqli("localhost","root","","comstar_portal");

$result=mysqli_query($con,"SELECT * FROM `login` WHERE Email='$q'");
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$name = $row["Name"];
		}
	}
$result=mysqli_query($con,"SELECT * FROM `homepage` WHERE ID='1'");
    while($row = $result->fetch_assoc()) {
        $about = $row["About"];
    }
?>
<?php
session_start();
if(isset($_SESSION["admin"]) === true){
}else{
	header("Location: login.html");
}
print_r($_SESSION);
?>
<!DOCTYPE html>
<html>
<title>COMSTAR Portal Admin Dashboard</title>
<head>
<link rel="icon" href="Assets/logo.png">
</head>
<h1>This is admin dashboard</h1>
<button onclick="document.location='logout.php'" style="float:left">Log Out</button>
</html>
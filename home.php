<?php
session_start();
if(isset($_SESSION["login"]) === true){
}else{
	header("Location: login.html");
}
?>
<!DOCTYPE html>
<html>
<title>COMSTAR Portal Home</title>
<head>
<link rel="icon" href="Assets/logo.png">
</head>
<h1>This is homepage</h1>
<button onclick="document.location='logout.php'" style="float:left">Log Out</button>
</html>
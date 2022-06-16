<?php
// Initialize the session
session_start();
 
if(isset($_SESSION["admin"]) === true){
	unset($_SESSION["admin"]);
	unset($_SESSION["Admin"]);
	header("Location: login.php");
}if(isset($_SESSION["login"]) === true){
	unset($_SESSION["login"]);
	unset($_SESSION["User"]);
	header("Location: login.php");
}else{
	header("Location: login.php");
}
exit;
?>
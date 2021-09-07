<?php
// Initialize the session
session_start();
 
if(isset($_SESSION["admin"]) === true){
	unset($_SESSION["admin"]);
	header("Location: login.html");
}elseif(isset($_SESSION["login"]) === true){
	unset($_SESSION["login"]);
	header("Location: login.html");
}else{
	header("Location: login.html");
}
exit;
?>
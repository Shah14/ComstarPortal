<?php
session_start();

if(isset($_SESSION["admin"]) === true){
}else{
	header("Location: ../../ACCOUNT/LOGIN/login.php");
}
//print_r($_SESSION);
$q=$_SESSION["Admin"];

$con = new mysqli("localhost","root","","comstar_portal");

$home = " ";
$profile = " ";
$verify = " ";
$programme = " ";
$payment = " ";
$support = " ";
$edit = " ";
$forum = " ";
$advertisement = " ";
$contact = " ";

if(isset($_SESSION['Alert'])){
	$alert = $_SESSION["Alert"];
	unset($_SESSION['Alert']);
}else{
	$alert = "None";
}

?>
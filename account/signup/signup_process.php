<?php
session_start();
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

$sql="INSERT INTO `login`(`Email`,`Password`,`Full Name`,`Name`,`Verification`,`User Type`,`Matric Number`,`Image`) 
VALUES('$_POST[email]',MD5('$_POST[pass]'),'$_POST[fname]','$_POST[name]','Unverified','Public','None','default.png')";

if (!mysqli_query($con,$sql)){
	if($con->errno == 1062){ //duplicate entry error
		$_SESSION["Alert"] = "Account already exist!"; //for alert 
		header("Location: signup.php?fname=$_POST[fname]&name=$_POST[name]&email=$_POST[email]");
	}else if($con->errno == 1064){ //sql syntax error
		$_SESSION["Alert"] = "Special characters [!,#,$,*,..] are not allowed!"; //for alert 
		header("Location: signup.php?fname=$_POST[fname]&name=$_POST[name]&email=$_POST[email]");
	}else{
		$_SESSION["Alert"] = "Account creation failed!"; //for alert 
		header("Location: signup.php?fname=$_POST[fname]&name=$_POST[name]&email=$_POST[email]");
	}
	
}else{
	$_SESSION["Alert"] = "Account creation successful!"; //for alert 
	header("Location: ../login/verify_account.php?email=$_POST[email]");
}

mysqli_close($con);
?>
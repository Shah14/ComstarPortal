<?php
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
session_start();
$q=$_SESSION["User"];
$sql="UPDATE `login` SET `Name`='$_POST[name]',`Full Name`='$_POST[fname]',`Matric Number`='$_POST[matric]',`Phone`='$_POST[phone]',`Address`='$_POST[address]',
`Date Of Birth`='$_POST[dob]',`Hobby`='$_POST[hobby]',`Interest`='$_POST[interest]',`Status`='$_POST[status]',`Skill1`='$_POST[skill1]',`Skill2`='$_POST[skill2]',
`Skill3`='$_POST[skill3]',`Skill4`='$_POST[skill4]',`Skill5`='$_POST[skill5]',`Person1`='$_POST[person1]',`Person2`='$_POST[person2]',`Person3`='$_POST[person3]',
`Person4`='$_POST[person4]',`Person5`='$_POST[person5]',`Rate1`='$_POST[rate1]',`Rate2`='$_POST[rate2]',`Rate3`='$_POST[rate3]',`Rate4`='$_POST[rate4]',`Rate5`='$_POST[rate5]',
`Rate6`='$_POST[rate6]',`Rate7`='$_POST[rate7]',`Rate8`='$_POST[rate8]',`Rate9`='$_POST[rate9]' ,`Rate10`='$_POST[rate10]' WHERE Email='$q'";

if (!mysqli_query($con,$sql)){
}header("Location: profile.php");
$_SESSION["Alert"] = "You have successfully edited your profile!"; //for alert 
mysqli_close($con);
?>
<html>
<head><link rel="icon" href="../../assets/logo/logo.png"></head>
<body>
<button class="btn btn-outline-danger" class="btn btn-outline-danger" onclick="document.location='profile.php'">Back</button>
</body>
</html>
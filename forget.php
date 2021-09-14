<?php
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}


$sql="UPDATE `login` SET `Password`=MD5('$_POST[pass]')
WHERE `Email`='$_POST[email]'";

$sql="UPDATE `admin` SET `Password`='$_POST[pass]'
WHERE `Email`='$_POST[email]'";

if ($con->query($sql) === TRUE) {
  echo "You have successfully reset your password!";
} else {
  echo "Error updating record: " . $con->error;
}

mysqli_close($con);
?>
<html>
<head><link rel="icon" href="Assets/logo.png"></head>
<body>
<button onclick="document.location='home.php'">Log In</button>
</body>
</html>

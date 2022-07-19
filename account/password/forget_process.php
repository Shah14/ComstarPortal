<?php
session_start();
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

$sql = "SELECT * FROM `login` WHERE `Email`='$_POST[email]'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
  $code = rand(100000,999999);
  $sql="UPDATE `login` SET `Reset Password`= $code
  WHERE `Email`='$_POST[email]'";

  if ($con->query($sql) === TRUE) {
    $_SESSION["Alert"] = "Password Reset Code sent!"; //for alert 
    
    $to = $_POST["email"];
    $subject = "Password Reset Verification Code";
    
    $message = "<p>Your password reset verification code is ".$code.". Click on this <a href='http://localhost/MasterComstarPortal/ACCOUNT/password/new_password.php?email=$_POST[email]&pin=".$code."'>link</a> to verify.</p>";
    
    $header = "From:comstar@portal.com \r\n";
    //$header .= "Cc:afgh@somedomain.com \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";

    $retval = mail ($to,$subject,$message,$header);
    
    if( $retval == true ) {
      echo "Message sent successfully...";
    }else {
      echo "Message could not be sent...";
    }
    header("Location: new_password.php?email=$_POST[email]");

  } else {
    $_SESSION["Alert"] = "You have not successfully reset the password!"; //for alert 
    header("Location: ../login/login.php");

  }

} else {
  $_SESSION["Alert"] = "Account does not exist!"; //for alert 
  header("Location: ../login/login.php");
}

?>
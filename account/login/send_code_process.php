<?php
session_start();
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

$sql = "SELECT * FROM `login` WHERE `Email`='$_GET[email]'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0 && $_GET["status"] == "send") {
  $code = rand(100000,999999);
  $sql="UPDATE `login` SET `Account Verification`= $code
  WHERE `Email`='$_GET[email]'";

  if ($con->query($sql) === TRUE) {
    $_SESSION["Alert"] = "Verification Code sent!"; //for alert 
    
    $to = $_GET["email"];
    $subject = "Account Verification Code";
    
    $message = "<p>Your account verification code is ".$code.". Click on this <a href='http://localhost/MasterComstarPortal/ACCOUNT/login/verify_account.php?email=$_GET[email]&pin=".$code."'>link</a> to verify.</p>";
    
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
    header("Location: verify_account.php?email=$_GET[email]");

  } else {
    $_SESSION["Alert"] = "Verification code is not sent!"; //for alert 
    header("Location: ../login/login.php");

  }

} else if (mysqli_num_rows($result) > 0 && $_GET["status"] == "resend") {
  while($row = mysqli_fetch_assoc($result)) {
    $_SESSION["Alert"] = "Verification Code resent!"; //for alert 
    
    $to = $_GET["email"];
    $subject = "Account Verification Code";
    
    $message = "<p>Your account verification code is ".$row["Account Verification"].". Click on this <a href='http://localhost/MasterComstarPortal/ACCOUNT/login/verify_account.php?email=$_GET[email]&pin=".$row["Account Verification"]."'>link</a> to verify.</p>";
    
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
    header("Location: verify_account.php?email=$_GET[email]");
  }
} else {
  $_SESSION["Alert"] = "Account does not exist!"; //for alert 
  header("Location: ../login/login.php");
}

?>
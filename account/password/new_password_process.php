<?php
session_start();
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

$sql = "SELECT * FROM `login` WHERE `Email`='$_POST[email]'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    if($row["Reset Password"] == $_POST["pin"]){
      $sql="UPDATE `login` SET `Password`= MD5('$_POST[pass]')
      WHERE `Email`='$_POST[email]'";

      if ($con->query($sql) === TRUE) {
        $_SESSION["Alert"] = "You have successfully reset the password!"; //for alert 
        header("Location: ../login/login.php");
      } else {
        $_SESSION["Alert"] = "You have not successfully reset the password!"; //for alert 
        //header("Location: ../login/login.php");
        echo $con->error;
      }

    }else{
      $_SESSION["Alert"] = "Incorrect verification Code!"; //for alert 
      echo $row["Reset Password"];
      header("Location: new_password.php?email=$_POST[email]");
    }
  }



} else {
  $_SESSION["Alert"] = "Account does not exist!"; //for alert 
  header("Location: ../login/login.php");
}

?>
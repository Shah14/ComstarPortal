<?php
session_start();
$con = new mysqli("localhost","root","","comstar_portal");

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

$sql = "SELECT * FROM `login` WHERE `Email`='$_POST[email]'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result)) {
    while($row = mysqli_fetch_assoc($result)) {
        if ($row["Account Verification"] == $_POST["pin"]){
            $sql="UPDATE `login` SET `Account Verification`= 'Verified', `Date Verified`= now()
            WHERE `Email`='$_POST[email]'";

             if ($con->query($sql) === TRUE) {
                $_SESSION["Alert"] = "Account successfully verified!"; //for alert 
                header("Location: login.php?email=$_POST[email]");
             }else{
                $_SESSION["Alert"] = "Account verification failed!"; //for alert 
                 header("Location: verify_account.php?email=$_POST[email]");
             }
        }else{
            $_SESSION["Alert"] = "Expired or invalid verification code!"; //for alert 
            header("Location: verify_account.php?email=$_POST[email]");
        }
    }
}else{
    $_SESSION["Alert"] = "Account does not exist!"; //for alert 
    header("Location: ../login/login.php");
}

?>
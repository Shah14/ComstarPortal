<html>
<head>
<script src="jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="icon" href="Assets/logo.png">
</head>
<?php
session_start();
$_SESSION["login"]="active";
$con = new mysqli("localhost","root","","comstar_portal");
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
$login='$_POST[email]';
$pass='$_POST[pass]';
        //to prevent from mysqli injection  
        $username = stripcslashes('$_POST[email]');  
        $password = stripcslashes(MD5('$_POST[pass]'));  
        $username = mysqli_real_escape_string($con, '$_POST[email]');  
        $password = mysqli_real_escape_string($con, MD5('$_POST[pass]'));  
		
		$sql = "select *from login where Email = '$_POST[email]' and Password = MD5('$_POST[pass]')";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
			header("Location: home.php");
        }  
        else{  
			echo '<script>alert("Incorrect e-mail or password entered!")</script>'; 
			$_SESSION = array();
			session_destroy();	
        } 			
?>  

</html>

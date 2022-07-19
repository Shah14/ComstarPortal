<?php
session_start();
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
          
		$sql1 = "select *from admin where Email = '$_POST[email]' and Password =MD5('$_POST[pass]')";  
        $result1 = mysqli_query($con, $sql1);  
        $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);  
        $count1 = mysqli_num_rows($result1); 
		

		
        if($count == 1){  
			if($row["Account Verification"] == "Verified"){
				$_SESSION["login"]="active";
				$_SESSION["User"]=strtolower($_POST["email"]);
				$_SESSION["User Type"]="$type";
				$_SESSION["Alert"] = "None";
				header("Location: ../../USER/Home/home.php");
			}else{
				$_SESSION["Alert"] = "Please verify your account to procceed!";
				header("Location: verify_account.php?email=$_POST[email]");
			}
        } 
		else if($count1 ==1){
			if($row1["Account Verification"] == "Verified"){
				$_SESSION["admin"]="active";
				$_SESSION["Admin"]=strtolower($_POST["email"]);
				$_SESSION["Alert"] = "None";
				header("Location: ../../ADMIN/Home/admin.php");
			}else{
				$_SESSION["Alert"] = "Please verify your account to procceed!";
				header("Location: verify_account.php?email=$_POST[email]");
			}
		}
        else{  
			$_SESSION["Alert"] = "Invalid e-mail or password!"; //for alert 
			header("Location: login.php?email=$_POST[email]");
        } 			
?>  
<script>

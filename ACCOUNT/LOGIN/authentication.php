<html>
<head>
<script src="jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="icon" href="assets/logo/logo.png">
</head>
<?php
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
		
		$result3=mysqli_query($con,"SELECT * FROM `login` WHERE Email='$_POST[email]'");
		if ($result3->num_rows > 0) {
			while($row = $result3->fetch_assoc()) {
				$type=$row["User Type"];
				echo $type;
								
				}
			}
		
        if($count == 1){  
			session_start();
			$_SESSION["login"]="active";
			$_SESSION["User"]=strtolower($_POST["email"]);
			$_SESSION["User Type"]="$type";
			$_SESSION["Alert"] = "None";
			header("Location: ../../USER/Home/home.php");
        } 
		elseif($count1 ==1){
			session_start();
			$_SESSION["admin"]="active";
			$_SESSION["Admin"]=strtolower($_POST["email"]);
			$_SESSION["Alert"] = "None";
			header("Location: ../../ADMIN/Home/admin.php");
		}
        else{  
			echo '<p id="demo"></p>';
			
        } 			
?>  
<script>
function sweet(){
	swal({
			  title: "Oops",
			  text: "Invalid e-mail or password!",
			  icon: "error",
			})
			.then((error) => {
			  if (error) {
				history.back();
			  } else {
				history.back();
			  }
			});
			return no;
	}
	document.getElementById("demo").innerHTML = sweet();
</script>
</html>

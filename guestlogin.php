<html>
<head>
<script src="jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="icon" href="Assets/logo.png">
</head>
<?php
session_start();
$_SESSION["guest"]="active";
$_SESSION["User"]="Guest". rand(1000000000,1999999999);;
header("Location: guest.php");		
?>  

</html>

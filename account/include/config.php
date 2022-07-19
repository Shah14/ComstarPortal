<?php
session_start();
if(isset($_SESSION["login"]) == true){
  header("Location: ../../USER/Home/home.php");
}else if(isset($_SESSION["admin"]) == true){
  header("Location: ../../admin/Home/admin.php");
}
?>
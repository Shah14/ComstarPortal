<?php
         $to = "shaheqmal82@gmail.com";
         $subject = "This is subject";
         
         $message = "<b>This is HTML message.</b>";
         $message .= "<h1>This is headline.</h1>";
         
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
      ?>

<?php
session_start();
if(isset($_SESSION["login"]) == true){
  header("Location: ../../USER/Home/home.php");
}else if(isset($_SESSION["admin"]) == true){
  header("Location: ../../admin/Home/admin.php");
}
?>

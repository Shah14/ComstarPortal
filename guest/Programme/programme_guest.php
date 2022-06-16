<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>COMSTAR Portal Programme</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" href="../../assets/logo/logo.png">
  <link href="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Tempo - v4.5.0
  * Template URL: https://bootstrapmade.com/tempo-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style>
.collapsible {
  background-color: #777;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

.active1, .collapsible:hover {
  background-color: #555;
}

.content {
  padding: 0 18px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  background-color: #f1f1f1;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: 10px;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}
</style>
<?php
if(isset($_SESSION["guest"]) === true){
}else{
	header("Location: ../../ACCOUNT/LOGIN/login.php");
}
print_r($_SESSION);
$q=$_SESSION["guest"];
$con = new mysqli("localhost","root","","comstar_portal");
?>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="../Home/guest.php">COMSTAR UTMKL</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
       <ul>
          <li><a class="nav-link scrollto" href="../Home/guest.php#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="../Home/guest.php#about">About</a></li>
          <li><a class="nav-link scrollto" href="../Home/guest.php#services">Services</a></li>
          <li><a class="nav-link scrollto" href="../Home/guest.php#portfolio">Gallery</a></li>
          <li><a class="nav-link scrollto" href="../Home/guest.php#team">Member</a></li>
          <li class="dropdown"><a class="nav-link scrollto active" href="../Programme/programme_guest.php"><span>Programme</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="../Programme/programme_guest.php#UTM">UTM</a></li>
              <li><a href="../Programme/programme_guest.php#COMSTAR">COMSTAR</a></li>
              <li><a href="../Programme/programme_guest.php#Public">Public</a></li>
            </ul>
          </li>
		  <li><a href="../../ACCOUNT/Login/login.php">Login</a></li>
		  <li><a href="../Forum/forum_guest.php">Forum</a></li>
          <li><a class="nav-link scrollto" href="../Home/guest.php#contact">Contact</a></li>
		  <style>
			  body {
			  background-color: white;
			  color: black;
			}

			.dark-mode {
			  background-color: #404040;
			  color: black;
			}
			</style>
			<li><button class="btn btn-danger" data-toggle="button" aria-pressed="false" autocomplete="off" onclick="Function()"><i class="bi bi-moon"></i>Dark Mode</button></li>
			<li><br><div id="google_translate_element"></div></li>

			<script type="text/javascript">
			function googleTranslateElementInit() {
			  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
			}
			</script>

			<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

			<script>
			function Function() {
			   var element = document.body;
			   element.classList.toggle("dark-mode");
			}
			</script>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="../Home/guest.php">Home</a></li>
          <li>Programme</li>
        </ol>
        <h2>Programme</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
	
    <section id="UTM" class="blog">
      <div class="container" data-aos="fade-up">
	  <h1>UTM</h1>

       
			  <div class="row">
		
                <?php
				$result=mysqli_query($con,"SELECT * FROM `programme` WHERE Status='Open To UTM'");
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$id=$row["Programme ID"];
						echo "<div class='card'>
							  <img src='../../assets/programme/".$row["Image"]."' alt='Avatar' style='width:100%;height:375px'>
							  <h5>".$row["Name"]."</h5>
							  Fee:<p style='color:blue;'>RM" .$row["Fee Price"] ."</p>
							  Venue:<p style='color:blue;'>" .$row["Venue"] ."</p>
							  Date:<p style='color:blue;'>" .$row["Date"] ."</p>
							  Status:<p style='color:blue;'>" .$row["Status"] ."</p>
							  <a href='../../ACCOUNT/LOGIN/login.php'><button style='margin:10px'class='btn btn-outline-primary'>Login to Join</button></a>";
							echo "</div>";
						}
					}else {
						echo '<div class="col-lg-12 entries">
							   <article class="entry">
							   <div class="entry-content">';
						echo "<center>There is no programme to join yet:(</center>";
						echo "</div></article></div>";
						}

				?>
				
              </div>       
           
          </div><!-- End blog entries list -->

        </div>

      </div>
    </section><!-- End Blog Section -->
	
	<section id="COMSTAR" class="blog">
      <div class="container" data-aos="fade-up">
	  <h1>COMSTAR</h1>
       
			  <div class="row">
		
                <?php
				$result=mysqli_query($con,"SELECT * FROM `programme` WHERE Status='Open To COMSTAR'");
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$id=$row["Programme ID"];
						echo "<div class='card'>
							  <img src='../../assets/programme/".$row["Image"]."' alt='Avatar' style='width:100%;height:375px'>
							  <h5>".$row["Name"]."</h5>
							  Fee:<p style='color:blue;'>RM" .$row["Fee Price"] ."</p>
							  Venue:<p style='color:blue;'>" .$row["Venue"] ."</p>
							  Date:<p style='color:blue;'>" .$row["Date"] ."</p>
							  Status:<p style='color:blue;'>" .$row["Status"] ."</p>
							  <a href='../../ACCOUNT/LOGIN/login.php'><button style='margin:10px'class='btn btn-outline-primary'>Login to Join</button></a>";
							echo "</div>";
						}
					}else {
						echo '<div class="col-lg-12 entries">
							   <article class="entry">
							   <div class="entry-content">';
						echo "<center>There is no programme to join yet:(</center>";
						echo "</div></article></div>";
						}

				?>
              </div>       
           
          </div><!-- End blog entries list -->

        </div>

      </div>
    </section><!-- End Blog Section -->
	
	<section id="Public" class="blog">
      <div class="container" data-aos="fade-up">
	  <h1>Public</h1>
       
			  <div class="row">
		
                <?php
				$con = new mysqli("localhost","root","","comstar_portal");
				$result=mysqli_query($con,"SELECT * FROM `programme` WHERE Status='Open To Public'");
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$id=$row["Programme ID"];
						echo "<div class='card'>
							  <img src='../../assets/programme/".$row["Image"]."' alt='Avatar' style='width:100%;height:375px'>
							  <h5>".$row["Name"]."</h5>
							  Fee:<p style='color:blue;'>RM" .$row["Fee Price"] ."</p>
							  Venue:<p style='color:blue;'>" .$row["Venue"] ."</p>
							  Date:<p style='color:blue;'>" .$row["Date"] ."</p>
							  Status:<p style='color:blue;'>" .$row["Status"] ."</p>
							  <a href='../../ACCOUNT/LOGIN/login.php'><button style='margin:10px'class='btn btn-outline-primary'>Login to Join</button></a>";
							echo "</div>";
						}
					}else {
						echo '<div class="col-lg-12 entries">
							   <article class="entry">
							   <div class="entry-content">';
						echo "<center>There is no programme to join yet:(</center>";
						echo "</div></article></div>";
						}

				?>
              </div>       
           
          </div><!-- End blog entries list -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

 <!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>COMSTAR UTMKL</h3>
            <p>
                Jalan Sultan Yahya Petra<br>
                54100, Kuala Lumpur<br>
                Malaysia <br><br>
                <strong>Email:</strong> utmklcomstar@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../../ACCOUNT/SIGNUP/Terms and Condition.html">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>&emsp;</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="https://www.utm.my/">UTM</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://en.wikipedia.org/wiki/University_of_Technology_Malaysia">Wikipedia</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://sso.utm.my/login">MyUTM</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://utmspace.blackboard.com/">Blackboard</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://www.topuniversities.com/">QS Top University</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>COMSTAR UTMKL</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/tempo-free-onepage-bootstrap-theme/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="https://www.facebook.com/COMSTAR.UTMKL/" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="https://www.instagram.com/comstar.utmkl/?hl=en" class="instagram"><i class="bx bxl-instagram"></i></a>
		<a href="https://www.youtube.com/channel/UCkagvAQ9G15bj63Z9CUYL_g?view_as=subscriber" class="youtube"><i class="bx bxl-youtube"></i></a>
		<a href="https://t.me/officialcomstar" class="telegram"><i class="bx bxl-telegram"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../../OMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/vendor/php-email-form/validate.js"></script>
  <script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/js/main.js"></script>

</body>
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
function verifyPassword() {  
  var pw = document.getElementById("password").value; 
  var cf= document.getElementById("confirm").value;
  if(pw !== cf) {  
     document.getElementById("message").innerHTML = "**Passwords are not matched!";  
     return false;  
  } 
   
 //minimum password length validation  
  if(pw.length < 8) {  
     document.getElementById("message").innerHTML = "**Password length must be at least 8 characters";  
     return false;  
  }  
  
//maximum length of password validation  
  if(pw.length > 15) {  
     document.getElementById("message").innerHTML = "**Password length must not exceed 15 characters";  
     return false;  
  } 
}  
</script>
</html>
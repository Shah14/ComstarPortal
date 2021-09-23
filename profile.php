<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>COMSTAR Portal User Profile</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" href="Assets/logo.png">
  <link href="COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/css/style.css" rel="stylesheet">

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

</style>
<?php
if(isset($_SESSION["login"]) === true){
}else{
	header("Location: login.html");
}
print_r($_SESSION);
$q=$_SESSION["User"];
?>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="home.php">COMSTAR UTMKL</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="home.php">Home</a></li>
          <li><a class="nav-link scrollto" href="home.php#about">About</a></li>
          <li><a class="nav-link scrollto" href="home.php#services">Services</a></li>
          <li><a class="nav-link scrollto " href="home.php#portfolio">Gallery</a></li>
          <li><a class="nav-link scrollto" href="home.php#team">Member</a></li>
          <li class="dropdown"><a href="#"><span>Programme</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Comstar AGM</a></li>
              <li class="dropdown"><a href="#"><span>Workshop</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Adobe Photoshop</a></li>
                  <li><a href="#">Adobe Premiere</a></li>
                  <li><a href="#">Adobe After Effects</a></li>
                  <li><a href="#">Framework Website</a></li>
                  <li><a href="#">Data Cloud</a></li>
                </ul>
              </li>
              <li><a href="#">Comsport</a></li>
              <li><a href="#">Comstarian Days</a></li>
              <li><a href="#">Hackathon</a></li>
            </ul>
          </li>
		  <li><a href="blog.html">Forum</a></li>
          <li><a class="nav-link scrollto" href="home.php#contact">Contact</a></li>
		  <li><a class="nav-link scrollto active" href="profile.php">Profile</a></li>
          <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
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
          <li><a href="home.php">Home</a></li>
          <li>Profile</li>
        </ol>
        <h2>Profile</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry">

              <div class="entry-img">
                <center><img src="Assets/logo.png"alt="Avatar" class="avatar"></center>
              </div>

              <div class="entry-content">
                <?php
				$con = new mysqli("localhost","root","","comstar_portal");
				$result=mysqli_query($con,"SELECT * FROM `login` WHERE Email='$q'");
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						echo "Name						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:" .$row["Name"];
						echo "<br>Email					&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:" .$row["Email"];
						echo "<br>Matric Number			&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:" .$row["Matric Number"];
						echo "<br>Password				&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:" .$row["Password"];
						echo "<br>Verification			&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:" .$row["Verification"];
						echo "<br>User Type				&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:" .$row["User Type"];
						}
					}

				?>
              </div>

            </article><!-- End blog entry -->          
           
          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">User Dashboard</h3>
<button class="collapsible">Request Verification</button>
<div class="content">
<br>
<form action="requestverify.php" method="post">
<input class="text" placeholder="Enter Matric Number" required name="matric_number">
<input type="submit"value="Enter">
</form>
<br>
</div><br>
<button class="collapsible">Update Profile</button>
<div class="content">
<br>
  <p>Progress In Work.</p>
</div>
<br>
<button class="collapsible">Change Password</button>
<div class="content">
<br>
  <p>Progress In Work.</p>
</div>
              

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

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
              <strong>Phone:</strong> +60 10 5890509<br>
              <strong>Email:</strong> info@example.com<br>
          </p>
        </div>

        <div class="col-lg-2 col-md-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="home.php">Home</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="home.php#about">About us</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="home.php#services">Services</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="Terms and Condition.html">Terms and Conditions</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Source</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Last Year Project</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Last Year Final</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Last Year Test</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Last Year Quiz</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Last Year Exercise</a></li>
            </ul>
        </div>

        <div class="col-lg-4 col-md-6 footer-newsletter">
          <h4>Join Our Community</h4>
          <p>This form does nothing :(</p>
          <form action="" method="post">
            <input type="email" name="email"><input type="submit" value="Subscribe">
          </form>
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
      <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
      <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
      <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
      <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
      <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
    </div>
  </div>
</footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/vendor/php-email-form/validate.js"></script>
  <script src="COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/js/main.js"></script>

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
</script>
</html>
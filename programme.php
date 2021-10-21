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
$con = new mysqli("localhost","root","","comstar_portal");
$result=mysqli_query($con,"SELECT * FROM `login` WHERE Email='$q'");
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$name=$row["Name"];
						
		}
	}
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
          <li class="dropdown "><a class="nav-link scrollto active" href="#"><span>Programme</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#UTM">UTM</a></li>
              <li><a href="#COMSTAR">COMSTAR</a></li>
              <li><a href="#Public">Public</a></li>
            </ul>
          </li>
		 <li class="dropdown"><a class="nav-link scrollto" href="#"><span>Profile</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
               <li><center><b><?php echo $name; ?></b></center></li>
               <li><a class="nav-link scrollto" href="profile.php">View Profile</a></li>
			   <li><a class="nav-link scrollto" href="https://www.sandbox.paypal.com/myaccount/transactions/?free_text_search=&filter_id=&currency=ALL&issuance_product_name=&asset_names=&asset_symbols=&type=&status=&start_date=2021-07-23&end_date=2021-10-21">View Payment History</a></li>
               <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
            </ul>
          </li>
		  <li><a href="blog.html">Forum</a></li>
          <li><a class="nav-link scrollto" href="home.php#contact">Contact</a></li>
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
          <li>Programme</li>
        </ol>
        <h2>Programme</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
	<section id="Joined" class="blog">
      <div class="container" data-aos="fade-up">
	  <h1>Joined</h1>
       
			  <div class="row">
		
                <?php
				$result=mysqli_query($con,"SELECT * FROM `list` WHERE Student='$q'");
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
							   echo '<div class="col-lg-3 entries">
							   <article class="entry">
							   <div class="entry-content">';
						echo "Name:<p style='color:purple;'>" .$row["Programme"] ."<br></p>";
						echo "Date:<p style='color:purple;'>" .$row["Date"] ."<br></p>";
						echo "Venue:<p style='color:purple;'>" .$row["Venue"] ."<br></p>";
						echo "Fee Price:<p style='color:purple;'>RM" .$row["Fee Price"] ."<br></p>";
						echo "Status:<p style='color:purple;'>" .$row["Status"] ."<br></p>";
						$name=$row["Programme"];
							$result1=mysqli_query($con,"SELECT * FROM `programme` WHERE Name='$name'");
							if ($result1->num_rows > 0) {
							while($row = $result1->fetch_assoc()) {
								echo "Attendance:<p style='color:purple;'>" .$row["Attendance"] ."<br></p>";
							$stat=$row["Attendance"];
							$programme=$row["Name"];
							echo "<form action='attendance.php' method='post'>
							<input type='hidden' name='programme' value='$programme'>
							<button $stat name='attend' type='submit' value='Present'>Attend</button><br><br>
							  </form>
							  <form action='https://www.sandbox.paypal.com/cgi-bin/webscr' method='post' target='_top'>
								<input type='hidden' name='cmd' value='_s-xclick'>
								<input type='hidden' name='hosted_button_id' value='49N77PA82NTY8'>
								<input type='image' src='https://www.sandbox.paypal.com/en_US/i/btn/btn_paynow_SM.gif' border='0' name='submit' alt='PayPal - The safer, easier way to pay online!'>
								<img alt='' border='0' src='https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif' width='1' height='1'>
								</form>";

								}
							}
						echo "</div></article></div>";
						}
					}else {
						echo '<div class="col-lg-12 entries">
							   <article class="entry">
							   <div class="entry-content">';
						echo "<center>You have not joined any programme:(</center>";
						echo "</div></article></div>";
						}

				?>
              </div>       
           
          </div><!-- End blog entries list -->

        </div>

      </div>
    </section><!-- End Blog Section -->
	
    <section id="UTM" class="blog">
      <div class="container" data-aos="fade-up">
	  <h1>UTM</h1>

       
			  <div class="row">
		
                <?php
				$result=mysqli_query($con,"SELECT * FROM `programme` WHERE Status='Open To UTM'");
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
							   echo '<div class="col-lg-3 entries">
							   <article class="entry">
							   <div class="entry-content">';
						echo "Name:<p style='color:red;'>" .$row["Name"] ."<br></p>";
						echo "Date:<p style='color:red;'>" .$row["Date"] ."<br></p>";
						echo "Venue:<p style='color:red;'>" .$row["Venue"] ."<br></p>";
						echo "Fee Price:<p style='color:red;'>RM" .$row["Fee Price"] ."<br></p>";
						echo "Status:<p style='color:red;'>" .$row["Status"] ."<br></p>";
						$name=$row["Name"];
						echo "<form action='registerprogramme.php' method='post'>
							  <button name='register' type='submit' value='$name'>Register</button>
							  </form>";
						echo "</div></article></div>";						
						}
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
							   echo '<div class="col-lg-3 entries">
							   <article class="entry">
							   <div class="entry-content">';
						echo "Name:<p style='color:green;'>" .$row["Name"] ."<br></p>";
						echo "Date:<p style='color:green;'>" .$row["Date"] ."<br></p>";
						echo "Venue:<p style='color:green;'>" .$row["Venue"] ."<br></p>";
						echo "Fee Price:<p style='color:green;'>RM" .$row["Fee Price"] ."<br></p>";
						echo "Status:<p style='color:green;'>" .$row["Status"] ."<br></p>";
						$name=$row["Name"];
						echo "<form action='registerprogramme.php' method='post'>
							  <button name='register' type='submit' value='$name'>Register</button>
							  </form>";
						echo "</div></article></div>";
						}
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
							   echo '<div class="col-lg-3 entries">
							   <article class="entry">
							   <div class="entry-content">';
						echo "Name:<p style='color:blue;'>" .$row["Name"] ."<br></p>";
						echo "Date:<p style='color:blue;'>" .$row["Date"] ."<br></p>";
						echo "Venue:<p style='color:blue;'>" .$row["Venue"] ."<br></p>";
						echo "Fee Price:<p style='color:blue;'>RM" .$row["Fee Price"] ."<br></p>";
						echo "Status:<p style='color:blue;'>" .$row["Status"] ."<br></p>";
						$name=$row["Name"];
						echo "<form action='registerprogramme.php' method='post'>
							  <button name='register' type='submit' value='$name'>Register</button>
							  </form>";
						echo "</div></article></div>";
						}
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
          <h4>&emsp;</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="https://www.utm.my/">UTM</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://en.wikipedia.org/wiki/University_of_Technology_Malaysia">Wikipedia</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://sso.utm.my/login">MyUTM</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://utmspace.blackboard.com/">Blackboard</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://www.topuniversities.com/">QS Top University</a></li>
            </ul>
        </div>

        <div class="col-lg-4 col-md-6 footer-newsletter">
          <h4>Join Our Community</h4>
          <p>Subscribe to our newsletter to get updates and information regarding COMSTAR Club</p>
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
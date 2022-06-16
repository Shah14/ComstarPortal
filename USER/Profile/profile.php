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

</style>
<?php
if(isset($_SESSION["login"]) === true){
}else{
	header("Location: ../../ACCOUNT/LOGIN/login.php");
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

      <h1 class="logo"><a href="../Home/home.php">COMSTAR UTMKL</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="../Home/home.php">Home</a></li>
          <li><a class="nav-link scrollto" href="../Home/home.php#about">About</a></li>
          <li><a class="nav-link scrollto" href="../Home/home.php#services">Services</a></li>
          <li><a class="nav-link scrollto " href="../Home/home.php#portfolio">Gallery</a></li>
          <li><a class="nav-link scrollto" href="../Home/home.php#team">Member</a></li>
          <li class="dropdown "><a class="nav-link scrollto" href="../Programme/programme.php"><span>Programme</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="../Programme/programme.php#UTM">UTM</a></li>
              <li><a href="../Programme/programme.php#COMSTAR">COMSTAR</a></li>
              <li><a href="../Programme/programme.php#Public">Public</a></li>
            </ul>
          </li>
		 <li class="dropdown"><a class="nav-link active scrollto" href="../Profile/profile.php"><span>Profile</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
               <li><center><b><?php echo $name; ?></b></center></li>
               <li><a class="nav-link scrollto active" href="../Profile/profile.php">View Profile</a></li>
			   <li><a class="nav-link scrollto" href="https://www.sandbox.paypal.com/myaccount/transactions/?free_text_search=&filter_id=&currency=ALL&issuance_product_name=&asset_names=&asset_symbols=&type=&status=&start_date=2021-07-23&end_date=2021-10-21">View Payment History</a></li>
               <li><a class="nav-link scrollto" href="../../ACCOUNT/Login/logout.php">Logout</a></li>
            </ul>
          </li>
		  <li><a class="nav-link scrollto" href="../Forum/forum.php">Forum</a></li>
          <li><a class="nav-link scrollto" href="../Home/home.php#contact">Contact</a></li>
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
          <li><a href="../Home/home.php">Home</a></li>
          <li>Profile</li>
        </ol>
        <h2>Profile</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">


		  <section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
		  <?php
            $con = new mysqli("localhost","root","","comstar_portal");
				  $result=mysqli_query($con,"SELECT * FROM `login` WHERE Email='$q'");
				  if ($result->num_rows > 0) {
				  while($row = $result->fetch_assoc()) {
				  $image=$row["Image"];
				  $skill1=$row["Skill1"];
				  $skill2=$row["Skill2"];
				  $skill3=$row["Skill3"];
				  $skill4=$row["Skill4"];
				  $skill5=$row["Skill5"];
				  $rate1=$row["Rate1"];
				  $rate2=$row["Rate2"];
				  $rate3=$row["Rate3"];
				  $rate4=$row["Rate4"];
				  $rate5=$row["Rate5"];
				  $rate6=$row["Rate6"];
				  $rate7=$row["Rate7"];
				  $rate8=$row["Rate8"];
				  $rate9=$row["Rate9"];
				  $rate10=$row["Rate10"];
				  $person1=$row["Person1"];
				  $person2=$row["Person2"];
				  $person3=$row["Person3"];
				  $person4=$row["Person4"];
				  $person5=$row["Person5"];
			  
				  $name=$row["Name"];
				  $fname=$row["Full Name"];
				  $email=$row["Email"];
				  $verify=$row["Verification"];
				  $matric=$row["Matric Number"];
				  $phone=$row["Phone"];
				  $type=$row["User Type"];
				  $address=$row["Address"];
				  $dob=$row["Date Of Birth"];
				  $interest=$row["Interest"];
				  $hobby=$row["Hobby"];
				  $status=$row["Status"];
						
		}
	}
					echo "<img src='../../assets/profile picture/".$image."'alt='avatar' class='rounded-circle img-fluid' style='width: 150px;'>";
			?> 
            <h5 class="my-3"><?php echo $name; ?></h5>
            <p class="text-muted mb-1"><?php echo $address; ?></p>
            <p class="text-muted mb-4"><?php echo $type; ?></p>
            <div class="d-flex justify-content-center mb-2">				
			  <a href="edit_profile.php">
			  <button type="button" class="btn btn-outline-primary">Edit Profile</button>
			  </a>
			  <form action="../Verify/request_verify_process.php" method="post">
			  <input type="hidden" class='form-control'id="confirm" value="<?php echo $matric; ?>" required name="matric">
				<button type="submit" class="btn btn-outline-primary ms-1">Verify Account</button>
			  </form>
			  
            </div>
          </div>
        </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0"><div class="col-sm-3">
                <p class="mb-0"><i class="bi bi-pencil"></i> Hobby</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $hobby; ?></p>
              </div></p>
              </li>
			  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0"><div class="col-sm-3">
                <p class="mb-0"><i class="bi bi-controller"></i> Interest</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $interest; ?></p>
              </div></p>
              </li>
			  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0"><div class="col-sm-3">
                <p class="mb-0"><i class="bi bi-person"></i> Status</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $status; ?></p>
              </div></p>
              </li>
			  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0"><div class="col-sm-3">
                <p class="mb-0"><i class="bi bi-calendar-date"></i> Birthday</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $dob; ?></p>
              </div></p>
              </li>
            </ul>
          </div>
        </div>
		
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0"><i class="bi bi-text"></i> Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $fname; ?></p>
              </div>
            </div>
            <hr>
			<div class="row">
              <div class="col-sm-3">
                <p class="mb-0"><i class="bi bi-person-badge-fill"></i> Matric Number</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $matric; ?></p>
              </div>
            </div>
			<hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0"><i class="bi bi-envelope"></i> Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $email; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0"><i class="bi bi-phone"></i> Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $phone; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0"><i class="bi bi-house-door"></i> Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $address; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0"><i class="bi bi-check-circle"></i> Account Status</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $verify; ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><i class="bi bi-lightbulb"></i><span class="text-primary font-italic me-1"> <?php echo $name; ?>'s</span> Skill Sets</p>
                <p class="mb-1" style="font-size: .77rem;"><?php echo $skill1; ?></p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: <?php echo $rate1; ?>0%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;"><?php echo $skill2; ?></p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: <?php echo $rate2; ?>0%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;"><?php echo $skill3; ?></p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: <?php echo $rate3; ?>0%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;"><?php echo $skill4; ?></p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: <?php echo $rate4; ?>0%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;"><?php echo $skill5; ?></p>
                <div class="progress rounded mb-2" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: <?php echo $rate5; ?>0%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><i class="bi bi-eyeglasses"></i><span class="text-primary font-italic me-1"> <?php echo $name; ?>'s</span> Personality</p>
                <p class="mb-1" style="font-size: .77rem;"><?php echo $person1; ?></p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: <?php echo $rate6; ?>0%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;"><?php echo $person2; ?></p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: <?php echo $rate7; ?>0%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;"><?php echo $person3; ?></p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: <?php echo $rate8; ?>0%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;"><?php echo $person4; ?></p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: <?php echo $rate9; ?>0%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;"><?php echo $person5; ?></p>
                <div class="progress rounded mb-2" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: <?php echo $rate10; ?>0%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<script>
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
</fieldset>
</form>
<br>
</div><br>
              

            </div><!-- End sidebar -->

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
              <li><i class="bx bx-chevron-right"></i> <a href="Terms and Condition.html">Terms of service</a></li>
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
  <script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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

</script>
</html>
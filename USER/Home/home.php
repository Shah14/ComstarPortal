<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>COMSTAR Portal Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" href="../../Assets/logo.png">
  <link href="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
  * Template Name: Tempo - v4.3.0
  * Template URL: https://bootstrapmade.com/tempo-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<?php
if(isset($_SESSION["login"]) === true){
}else{
	header("Location: ../../ACCOUNT/LOGIN/login.html");
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
<style>
b {
  text-align: justify;
  text-justify: inter-word;
}
* {
  box-sizing: border-box;
}
/* Create four equal columns that floats next to each other */
.column {
  float: left;
  width: 20%;
}
/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
/* Header/Logo Title */
.header {
  padding: 60px;
  text-align: center;
  background: black;
  color: white;
  font-size: 30px;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active1 {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: 0.6} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: 0.6} 
  to {opacity: 1}
}
.align-right {
  text-align: right;
}


</style>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="../Home/home.php">COMSTAR UTMKL</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Gallery</a></li>
          <li><a class="nav-link scrollto" href="#team">Member</a></li>
          <li class="dropdown "><a class="nav-link scrollto" href="../Programme/programme.php"><span>Programme</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="../Programme/programme.php#UTM">UTM</a></li>
              <li><a href="../Programme/programme.php#COMSTAR">COMSTAR</a></li>
              <li><a href="../Programme/programme.php#Public">Public</a></li>
            </ul>
          </li>
		 <li class="dropdown"><a class="nav-link scrollto" href="#"><span>Profile</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
               <li><center><b><?php echo $name; ?></b></center></li>
               <li><a class="nav-link scrollto" href="../Profile/profile.php">View Profile</a></li>
			   <li><a class="nav-link scrollto" href="https://www.sandbox.paypal.com/myaccount/transactions/?free_text_search=&filter_id=&currency=ALL&issuance_product_name=&asset_names=&asset_symbols=&type=&status=&start_date=2021-07-23&end_date=2021-10-21">View Payment History</a></li>
               <li><a class="nav-link scrollto" href="../../ACCOUNT/Login/logout.php">Logout</a></li>
            </ul>
          </li>
		  <li><a class="nav-link scrollto active" href="../Forum/forum.php">Forum</a></li>
          <li><a class="nav-link scrollto" href="../Home/home.php#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <h3>Welcome <strong>COMSTARIANS !</strong></h3>
      <h1>COMSTAR PORTAL</h1>
      <h2>Get upcoming updates on our programme and event!</h2>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About Comstar</h2>
          <h3>Learn More <span>About Us</span></h3>
          <p style="text-align: justify"><?php 
						$con = new mysqli("localhost","root","","comstar_portal");
						$result=mysqli_query($con,"SELECT * FROM `homepage` WHERE ID='1'");
						while($row = $result->fetch_assoc()) {
						
						echo $row["About"];
						}
						?></p>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
              As part of realizing COMSTAR Vision and Mission, club members also enjoy several benefits offered by the club such as;
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Being one of the biggest club in UTMKL</li>
              <li><i class="ri-check-double-line"></i> Consisting of many successful alumni</li>
              <li><i class="ri-check-double-line"></i> Plenty of interactive programme</li>
			  <li><i class="ri-check-double-line"></i> More opportunities to skill-up</li>
			  <li><i class="ri-check-double-line"></i> Provide valuable certifications</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p style="text-align: justify">
              Universiti Teknologi Malaysia (UTM) is a leading innovation-driven entrepreneurial research university in 
			  engineering science and technology. Ranked 187th in the world by QS University rankings and fifth in Malaysia, 
			  UTM practices its own core value; Integrity, Synergy, Excellence and Sustainability. UTM is located 
			  both in Kuala Lumpur, the capital city of Malaysia and Johor Bahru, the southern  city in Malaysia.
            </p>
            <a href="https://www.utm.my/about/" class="btn-learn-more">Learn More</a>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
          <h3>We do indeed offer awesome <span>Services</span></h3>
          <p>COMSTAR Portal provides access to several services at the tip of your gaming fingertip or a single click of your gaming mouse.</p>
        </div>

        <div class="row">
		<div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
			  <a href="#cta">
              <div class="icon"><i class="bx bx-dollar-circle"></i></div>
              <h4 class="title">Advertisement</a></h4>
              <p class="description">View promotions and offers provided by COMSTAR members.</p>
            </div>
          </div>
		
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
			  <a href="#portfolio">
              <div class="icon"><i class="bx bx-photo-album"></i></div>
              <h4 class="title">Gallery</a></h4>
              <p class="description">View pictures and photographic memories from our past programme and events.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
			  <a href="../Programme/programme.php">
              <div class="icon"><i class="bx bx-calendar-star"></i></div>
              <h4 class="title">Programme</a></h4>
              <p class="description">View ongoing and upcoming programme available to join. Browse anonymously or simply sign in and register!</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
			  <a href="#video">
              <div class="icon"><i class="bx bx-movie-play"></i></div>
              <h4 class="title">Video</a></h4>
              <p class="description">View moving pictures provided by our committee or tune in to our tutorials.</p>
            </div>
          </div>

        </div>
		<br>
		<div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
			  <a href="">
              <div class="icon"><i class="bx bx-group"> </i></div>
              <h4 class="title">Forum</a></h4>
              <p class="description">Engage with other users in the community or browse informational posts.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
			  <a href="#pricing">
              <div class="icon"><i class="bx bx-coin-stack"></i></div>
              <h4 class="title">Fee</a></h4>
              <p class="description">View and pay COMSTAR membership fee.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
			  <a href="#faq">
              <div class="icon"><i class="bx bx-question-mark"></i></div>
              <h4 class="title">Frequently Asked Questions</a></h4>
              <p class="description">View questions COMSTARIANS asked the most daily.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
			  <a href="../Support/supportuser.php">
              <div class="icon"><i class="bx bx-support"> </i></div>
              <h4 class="title">Technical Support</a></h4>
              <p class="description">Found bugs? Glitches? Nonsense from your auntie? Report them here.</p>
            </div>
          </div>

        </div>
      </div>
    </section><!-- End Services Section -->

    <!-- ======= Cta Section ======= -->

    <section id="cta" class="blog">
	 <div class="section-title">
          <h2>Advertisements</h2>
          <h3>Check out our <span>Advertisements</span></h3>
          <p>View promotions and offers provided by COMSTAR members.</p>
        </div>
	<div class="container">

        <div class="text-center">
          
<div class="slideshow-container">

<?php
$con = new mysqli("localhost","root","","comstar_portal");
$result=mysqli_query($con,"SELECT * FROM `advertisement` ");
$count=0;
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
	  $count=$count+1;
echo "<div class='mySlides fade'>";

	  
	  echo "<div class='header'>";
	  echo "<h1>".$row["Title"]."</h1>";
	  echo "<p>".$row["Description"]."</p>";
							

					
	  echo "<div class='align-right'>
	  <a href='' class='btn-learn-more'>Learn More</a>
	  </div>
	  
	</div>
	</div>";
  }
}
?>

</div>

<br>

<div style="text-align:center">
  <span hidden class="dot"></span> 
  <span hidden class="dot"></span> 
  <span hidden class="dot"></span>
  <span hidden class="dot"></span> 
  <span hidden class="dot"></span>
</div>
	</div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2>Gallery</h2>
          <h3>Check our <span>Gallery</span></h3>
          <p>View pictures and photographic memories from our past programme and events.</p>
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">2021</li>
              <li data-filter=".filter-card">2020</li>
              <li data-filter=".filter-web">2019</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app filter-1">
            <img src="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>COMSPORT</h4>
              <p>2021</p>
              <a href="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="COMSPORT 2021"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app filter-1">
            <img src="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>COMSTARIAN Day</h4>
              <p>2021</p>
              <a href="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="COMSTARIAN Day 2021"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app filter-1">
            <img src="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>COMSTAR AGM</h4>
              <p>2021</p>
              <a href="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="COMSTAR AGM 2021"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card filter-1">
            <img src="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>COMSPORT</h4>
              <p>2020</p>
              <a href="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="COMSPORT 2020"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card filter-1">
            <img src="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>COMSTARIAN Day</h4>
              <p>2020</p>
              <a href="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="COMSTARIAN Day 2020"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card filter-1">
            <img src="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>COMSTAR AGM</h4>
              <p>2020</p>
              <a href="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="COMSTAR AGM 2020"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web filter-1">
            <img src="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Adobe Photoshop Workshop</h4>
              <p>2019</p>
              <a href="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Adobe Photoshop Workshop 2019"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web filter-1">
            <img src="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Hackathon</h4>
              <p>2019</p>
              <a href="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Hackathon 2019"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web filter-1">
            <img src="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Framework Workshop</h4>
              <p>2019</p>
              <a href="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Framework Workshop 2019"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

        </div>
		
		

      </div>
    </section><!-- End Portfolio Section -->
	
	   <!-- ======= Portfolio Section ======= -->
    <section id="video" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2>Video</h2>
          <h3>Check our <span>Video</span></h3>
          <p>View moving pictures provided by our committee or tune in to our tutorials. More on our <a href="https://www.youtube.com/channel/UCkagvAQ9G15bj63Z9CUYL_g/videos">Youtube</a>.</p>
        </div>

        

        <div class="row portfolio-container">

		  <div class="col-lg-4 col-md-6 portfolio-item filter-app filter-1">
		  <iframe width="420" height="345" src="https://www.youtube.com/embed/_rr1jJJuztQ" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="COMSPORT 2021"><i class="bx bx-plus"></i>>
		  </iframe>
            <div class="portfolio-info">
            </div>
          </div>

		  <div class="col-lg-4 col-md-6 portfolio-item filter-app filter-1">
		  <iframe width="420" height="345" src="https://www.youtube.com/embed/JJbvIAiJe-0" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="COMSPORT 2021"><i class="bx bx-plus"></i>>
		  </iframe>
            <div class="portfolio-info">
            </div>
          </div>
		  
		  <div class="col-lg-4 col-md-6 portfolio-item filter-app filter-1">
		  <iframe width="420" height="345" src="https://www.youtube.com/embed/iiyctdcgMWo" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="COMSPORT 2021"><i class="bx bx-plus"></i>>
		  </iframe>
            <div class="portfolio-info">
            </div>
          </div>
		  
		  <div class="col-lg-4 col-md-6 portfolio-item filter-app filter-1">
		  <iframe width="420" height="345" src="https://www.youtube.com/embed/ELwNmy5u_Ug" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="COMSPORT 2021"><i class="bx bx-plus"></i>>
		  </iframe>
            <div class="portfolio-info">
            </div>
          </div>

		  <div class="col-lg-4 col-md-6 portfolio-item filter-app filter-1">
		  <iframe width="420" height="345" src="https://www.youtube.com/embed/nJM4W7KcAfA" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="COMSPORT 2021"><i class="bx bx-plus"></i>>
		  </iframe>
            <div class="portfolio-info">
              
            </div>
          </div>

		  <div class="col-lg-4 col-md-6 portfolio-item filter-app filter-1">
		  <iframe width="420" height="345" src="https://www.youtube.com/embed/02RhnrLjTGQ" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="COMSPORT 2021"><i class="bx bx-plus"></i>>
		  </iframe>
            <div class="portfolio-info">
            </div>
          </div>	
		  
        </div>
		

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container">

        <div class="section-title">
          <h2>Fees</h2>
          <h3>Our COMSTAR <span>Fees</span></h3>
          <p>View and pay COMSTAR membership fee.</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
		  <div class="box recommended">
          <span class="recommended-badge">First-Year Only</span>
              <h3>Fee Package A</h3>
              <h4><sup>RM</sup>90-100<span> / year</span></h4>
              <ul>
                <li>COMSTAR AGM Dinner</li>
                <li>COMSTAR T-Shirt</li>
                <li>COMSTAR Corporate Shirt	</li>
                <li>COMSTAR Lanyard</li>
                <li>COMSTARIAN Day</li>
              </ul>
              <div class="btn-wrap">
                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="UQ2JUVGPN7BAG">
				<table>
				<tr><td><input type="hidden" name="on0" value="Category">Category</td></tr><tr><td><select name="os0">
					<option value="Male">Male RM90.00 MYR</option>
					<option value="Female">Female RM100.00 MYR</option>
				</select> </td></tr>
				</table>
				<input type="hidden" name="currency_code" value="MYR">
				<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_paynow_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>

              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
            <div class="box">            
              <h3>Fee Package B</h3>
              <h4><sup>RM</sup>60-70<span> / year</span></h4>
              <ul>
                <li>COMSTAR AGM Dinner</li>
                <li>COMSTAR T-Shirt</li>
                <li>COMSTAR Corporate Shirt</li>
                <li>COMSTAR Lanyard</li>
                <li class="na">COMSTARIAN Day</li>
              </ul>
              <div class="btn-wrap">
                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="6YZVGAHT8E5SJ">
				<table>
				<tr><td><input type="hidden" name="on0" value="Category">Category</td></tr><tr><td><select name="os0">
					<option value="Male">Male RM60.00 MYR</option>
					<option value="Female">Female RM70.00 MYR</option>
				</select> </td></tr>
				</table>
				<input type="hidden" name="currency_code" value="MYR">
				<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_paynow_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>

              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
            <div class="box">
              <h3>Fee Package C</h3>
              <h4><sup>RM</sup>30-35<span> / year</span></h4>
              <ul>
                <li>COMSTAR AGM Dinner</li>
                <li >COMSTAR T-Shirt</li>
                <li class="na">COMSTAR Corporate Shirt</li>
                <li class="na">COMSTAR Lanyard</li>
                <li class="na">COMSTARIAN Day</li>
              </ul>
              <div class="btn-wrap">
                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="VR5MXSNQEX9Q4">
				<table>
				<tr><td><input type="hidden" name="on0" value="Category">Category</td></tr><tr><td><select name="os0">
					<option value="Male">Male RM30.00 MYR</option>
					<option value="Female">Female RM35.00 MYR</option>
				</select> </td></tr>
				</table>
				<input type="hidden" name="currency_code" value="MYR">
				<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_paynow_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>

              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Pricing Section -->

    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">
      <div class="container">

        <div class="section-title">
          <h2>F.A.Q</h2>
          <h3>Frequently Asked <span>Questions</span></h3>
        </div>

        <ul class="faq-list">

          <li>
            <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">How do I register for COMSTAR-exclusive programme or event? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq1" class="collapse" data-bs-parent=".faq-list">
              <p>
                You need to be verified as a COMSTAR student first. Proceed to your profile and click Request Verification. Enter YOUR valid Matric Number and wait for admin verification.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">How long do I have to wait for my account to be verified? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq2" class="collapse" data-bs-parent=".faq-list">
              <p>
                Usually within 1 to 5 working days depending on the verification request traffic.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq3" class="collapsed question"> Why have I been verified but listed as a Public user? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq3" class="collapse" data-bs-parent=".faq-list">
              <p>
                 Either you have entered an invalid matric card or you are neither a UTM student nor a COMSTARIAN.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Are my family and friends outside of UTM allowed to join any programme or events by COMSTAR? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq4" class="collapse" data-bs-parent=".faq-list">
              <p>
                Only programme or events open to public are available for them to join. To register, they are required to create an account on this website.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">Can I share my personal login details with friends and family? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq5" class="collapse" data-bs-parent=".faq-list">
              <p>
                Risk of losing your account is not OUR RESPONSIBILITY. No ban would be applied to the stolen account unless requested.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">Am I able to become a COMSTAR member if I was from another university or club within UTM? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq6" class="collapse" data-bs-parent=".faq-list">
              <p>
                No, COMSTARIAN membership is only for Computer Science UTM students only.
              </p>
            </div>
          </li>

        </ul>

      </div>
    </section><!-- End F.A.Q Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title">
          <h2>Member</h2>
          <h3>Our Hardworking <span>COMSTAR Committee</span></h3>
          <p>These are the responsible committee members that administers and manage the COMSTAR Club and its activities.</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <div class="member-img">
                <img src="Assets/zuhair.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Zuhair Isyraq</h4>
                <span>Leader</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <div class="member-img">
                <img src="Assets/shah.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info" >
                <h4>Shah Eq'mal</h4>
                <span>Back-End Programmer</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <div class="member-img">
                <img src="Assets/danish.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Danish Haqime</h4>
                <span>Front-End Programmer</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <div class="member-img">
                <img src="Assets/abid.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Nik Nur Abid</h4>
                <span>Documentation</span>
              </div>
            </div>
          </div>
		  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
		  <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <div class="member-img">
                <img src="Assets/haziq.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Muhammad Haziq</h4>
                <span>Documentation</span>
              </div>
            </div>
          </div>
		  
		  <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <div class="member-img">
                <img src="Assets/haiqal.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Muhammad Haiqal</h4>
                <span>Documentation</span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <h3>Contact <span>Us</span></h3>
          <p>Have any enquiries? Suggestions? Want to tell someone about your grandparents' stories? Do submit them here. Maybe not the grandparents' stories.</p>
        </div>

        <div>
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/place/UTM+Kuala+Lumpur/@3.1729407,101.7187344,17z/data=!3m1!4b1!4m5!3m4!1s0x31cc37e8de0a443f:0x9e772d5b7ac66d27!8m2!3d3.1729407!4d101.7209231" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Jalan Sultan Yahya Petra, Kampung Datuk Keramat, 54100 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+60 10 5890509s</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

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
  <script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/vendor/php-email-form/validate.js"></script>
  <script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/js/main.js"></script>
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
window.onscroll = function() {myFunction()};

function myFunction() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("myBar").style.width = scrolled + "%";
}
</script>
</body>

</html>
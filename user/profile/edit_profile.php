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
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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
		  <li>Edit Profile</li>
        </ol>
        <h2> Edit Profile</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
	
      <div class="container" data-aos="fade-up">

        <div class="row">
		
		  <div class="w3-container">
			  <div class="w3-bar w3-black">
				<button class="w3-bar-item w3-button tablink w3-red" onclick="openCity(event,'London')">Update Profile Details</button>
				<button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Paris')">Update Profile Picture</button>
				<button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Tokyo')">Update Password</button>
			  </div>
			  
			  <div id="London" class="w3-container w3-border city"><br>
				<section style="background-color: #eee;">
		  
  <div class="container py-5">
  
			
			<script>
			function openCity(evt, cityName) {
			  var i, x, tablinks;
			  x = document.getElementsByClassName("city");
			  for (i = 0; i < x.length; i++) {
				x[i].style.display = "none";
			  }
			  tablinks = document.getElementsByClassName("tablink");
			  for (i = 0; i < x.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
			  }
			  document.getElementById(cityName).style.display = "block";
			  evt.currentTarget.className += " w3-red";
			}
			</script>
			
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
			<form action='edit_profile_process.php' class='form-horizontal' method='post' ">
			<p class="mb-0">Nickname</p>
           <p class="text-muted mb-0">
					<input type='text' style="text-align:center" class='form-control' required name='name' value='<?php echo $name; ?>'>
				</p>
            <br><br>
            <div class="d-flex justify-content-center mb-2">
              <button type="submit" class="btn btn-outline-primary"><i class='fas fa-pen'></i> Edit</button>
              <button type="reset" class="btn btn-outline-primary ms-1">Reset</button>
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
                <p class="text-muted mb-0">
					<input type='text' class='form-control' name='hobby' placeholder="Example : Reading, Writing" value='<?php echo $hobby; ?>'>
				</p>
              </div></p>
              </li>
			  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0"><div class="col-sm-3">
                <p class="mb-0"><i class="bi bi-controller"></i> Interest</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
				 <input type='text' class='form-control' name='interest'placeholder="Example : Music, Video Games" value='<?php echo $interest; ?>'>
				</p>
              </div></p>
              </li>
			  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0"><div class="col-sm-3">
                <p class="mb-0"><i class="bi bi-person"></i> Status</p>
              </div>
              <div class="col-sm-9">
                <input type='text' class='form-control' name='status' placeholder="Example : Single, Married, Bored"value='<?php echo $status; ?>'>
              </div></p>
              </li>
			  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0"><div class="col-sm-3">
                <p class="mb-0"><i class="bi bi-calendar-date"></i> Birthday</p>
              </div>
              <div class="col-sm-9">
                <input type='date' class='form-control'  name='dob' value='<?php echo $dob; ?>'>
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
                <p class="mb-0"><i class="bi bi-type"></i> Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
					<input type='text' class='form-control' required name='fname' value='<?php echo $fname; ?>'>
				</p>
              </div>
            </div>
            <hr>
			<div class="row">
              <div class="col-sm-3">
                <p class="mb-0"><i class="bi bi-person-badge-fill"></i> Matric Number</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
					<input type='text' class='form-control' maxlength="9" name='matric' value='<?php echo $matric; ?>'>
				</p>
              </div>
            </div>
			<hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0"><i class="bi bi-envelope"></i> Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
					<input type='text' class='form-control' disabled required name='email' value='<?php echo $email; ?>'>
				</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0"><i class="bi bi-phone"></i> Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
					<input type='number' class='form-control'  name='phone'placeholder="Example : 01234567890" value='<?php echo $phone; ?>'>
				</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0"><i class="bi bi-house-door"></i> Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
					<input type='text' class='form-control' name='address' placeholder="Example : Ipoh, Perak"value='<?php echo $address; ?>'>
				</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0"><i class="bi bi-check-circle"></i> Account Status</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
					<input type='text' class='form-control' disabled required name='verify' value='<?php echo $verify; ?>'>
				</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
		  <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0"><div class="col-sm-3">
                <p class="mb-0">Skill 1</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
					<input type='text' class='form-control' placeholder="Example : Gaming" name='skill1' value='<?php echo $skill1; ?>'>
				</p>
              </div></p>
			  
              </li>
			  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0"><div class="col-sm-3">
                <p class="mb-0">Skill 1 Rating</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
					<input type='number' class='form-control' min="0" max="10"  name='rate1' value='<?php echo $rate1; ?>'>
				</p>
              </div></p>
			  
              </li>
			  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0"><div class="col-sm-3">
                <p class="mb-0">Skill 2</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
				 <input type='text' class='form-control'  name='skill2' placeholder="Example : Coding"value='<?php echo $skill2; ?>'>
				</p>
              </div></p>
              </li>
			  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0"><div class="col-sm-3">
                <p class="mb-0">Skill 2 Rating</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
					<input type='number' class='form-control' min="0" max="10" name='rate2' value='<?php echo $rate2; ?>'>
				</p>
              </div></p>
			  
              </li>
			  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0"><div class="col-sm-3">
                <p class="mb-0">Skill 3</p>
              </div>
              <div class="col-sm-9">
                <input type='text' class='form-control'  name='skill3'placeholder="Example : Sports" value='<?php echo $skill3; ?>'>
              </div></p>
              </li>
			  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0"><div class="col-sm-3">
                <p class="mb-0">Skill 3 Rating</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
					<input type='number' class='form-control' min="0" max="10" name='rate3' value='<?php echo $rate3; ?>'>
				</p>
              </div></p>
			  
              </li>
			  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0"><div class="col-sm-3">
                <p class="mb-0">Skill 4</p>
              </div>
              <div class="col-sm-9">
                <input type='text' class='form-control' name='skill4' placeholder="Example : Study"value='<?php echo $skill4; ?>'>
              </div></p>
              </li>
			  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0"><div class="col-sm-3">
                <p class="mb-0">Skill 4 Rating</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
					<input type='number' class='form-control'min="0" max="10" name='rate4' value='<?php echo $rate4; ?>'>
				</p>
              </div></p>
			  
              </li>
			  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0"><div class="col-sm-3">
                <p class="mb-0">Skill 5</p>
              </div>
              <div class="col-sm-9">
                <input type='text' class='form-control' name='skill5' placeholder="Example : Singing"value='<?php echo $skill5; ?>'>
              </div></p>
              </li>
			  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0"><div class="col-sm-3">
                <p class="mb-0">Skill 5 Rating</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
					<input type='number' class='form-control' min="0" max="10" name='rate5' value='<?php echo $rate5; ?>'>
				</p>
              </div></p>
			  
              </li>
            </ul>
          </div>
        </div>
          </div>
          <div class="col-md-6">
		  <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
         <ul class="list-group list-group-flush rounded-3">
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0"><div class="col-sm-3">
                <p class="mb-0">Personality 1</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
					<input type='text' class='form-control' placeholder="Example : Caring" name='person1' value='<?php echo $person1; ?>'>
				</p>
              </div></p>
			  
              </li>
			  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0"><div class="col-sm-3">
                <p class="mb-0">Personality 1 Rating</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
					<input type='number' class='form-control' min="0" max="10" name='rate6' value='<?php echo $rate6; ?>'>
				</p>
              </div></p>
			  
              </li>
			  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0"><div class="col-sm-3">
                <p class="mb-0">Personality 2</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
				 <input type='text' class='form-control'  name='person2' placeholder="Example : Athletic" value='<?php echo $person2; ?>'>
				</p>
              </div></p>
              </li>
			  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0"><div class="col-sm-3">
                <p class="mb-0">Personality 2 Rating</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
					<input type='number' class='form-control'min="0" max="10"  name='rate7' value='<?php echo $rate7; ?>'>
				</p>
              </div></p>
			  
              </li>
			  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0"><div class="col-sm-3">
                <p class="mb-0">Personality 3</p>
              </div>
              <div class="col-sm-9">
                <input type='text' class='form-control'  name='person3' placeholder="Example : Energetic" value='<?php echo $person3; ?>'>
              </div></p>
              </li>
			  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0"><div class="col-sm-3">
                <p class="mb-0">Personality 3 Rating</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
					<input type='number' class='form-control' min="0" max="10" name='rate8' value='<?php echo $rate8; ?>'>
				</p>
              </div></p>
			  
              </li>
			  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0"><div class="col-sm-3">
                <p class="mb-0">Personality 4</p>
              </div>
              <div class="col-sm-9">
                <input type='text' class='form-control' name='person4' placeholder="Example : Sporting" value='<?php echo $person4; ?>'>
              </div></p>
              </li>
			  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0"><div class="col-sm-3">
                <p class="mb-0">Personality 4 Rating</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
					<input type='number' class='form-control' min="0" max="10" name='rate9' value='<?php echo $rate9; ?>'>
				</p>
              </div></p>
			  
              </li>
			  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0"><div class="col-sm-3">
                <p class="mb-0">Personality 5</p>
              </div>
              <div class="col-sm-9">
                <input type='text' class='form-control'  placeholder="Example : Playful" name='person5' value='<?php echo $person5; ?>'>
              </div></p>
              </li>
			  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0"><div class="col-sm-3">
                <p class="mb-0">Personality 5 Rating</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
					<input type='number' class='form-control'min="0" max="10"name='rate10'value='<?php echo $rate10; ?>'>
				</p>
              </div></p>
			  
              </li>
            </ul>
          </div>
        </div>
		</form>
		

          </div>
        </div>
      </div>
    </div>
  </div>
  
</section>
			  <br>
			  </div>
			  

			  <div id="Paris" class="w3-container w3-border city" style="display:none"><br>
				<section style="background-color: #eee;">
				  <div class="container py-5">		
					<div class="row">
					  <div class="col-lg-12">
						<div class="card mb-4">
						  <div class="card-body text-center">
							<img src='../../assets/profile picture/<?php echo $image; ?>'alt='avatar' class='rounded-circle img-fluid' style='width: 150px;'>
							<div class='alert alert-warning' role='alert'>
							  <center><i class='fa fa-exclamation-circle'></i>Important! Please select image with dimension of 500x500!</center>
							</div>
							<form action="../Profile/edit_image_process.php" method="post" enctype="multipart/form-data">
							<i class="bi bi-person-circle"></i> Select image to upload:
						   <p class="text-muted mb-0">
									<input type="file" required name="fileToUpload" id="fileToUpload">
								</p>
							<br><br>
							<div class="d-flex justify-content-center mb-2">
							  <button type="submit" class="btn btn-outline-primary"><i class='fas fa-pen'></i> Edit</button>
							  <button type="reset" class="btn btn-outline-primary ms-1">Reset</button>
							</div>
							</form>
						  </div>
						</div>
						
						
					  </div>
					</div>
				  </div>
				  
				</section>
			  <br>
			  </div>

			  <div id="Tokyo" class="w3-container w3-border city" style="display:none">
				<section style="background-color: #eee;">
				  <div class="container py-5">		
					<div class="row">
					  <div class="col-lg-12">
						<div class="card mb-4">
						  <div class="card-body text-center">
						  <form action="../Profile/edit_password_process.php" method="post" onsubmit="return verifyPassword()">
							<li class="list-group-item d-flex justify-content-between align-items-center p-3">
							<i class="fas fa-globe fa-lg text-warning"></i>
							<p class="mb-0"><div class="col-sm-3">
							<p class="mb-0"><i class="bi bi-lock"></i> Password</p>
						  </div>
						  <div class="col-sm-9">
							<p class="text-muted mb-0">
							<input type="password" class='form-control' id="password" placeholder="Enter New Password" required name="password" >
							</p>
						  </div></p>
						  </li>
						  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
							<i class="fas fa-globe fa-lg text-warning"></i>
							<p class="mb-0"><div class="col-sm-3">
							<p class="mb-0"><i class="bi bi-lock"></i> Confirm Password</p> 
						  </div>
						  <div class="col-sm-9">
							<p class="text-muted mb-0">
							<input type="password" class='form-control'id="confirm" placeholder="Confirm New Password" required name="confirm"><br>
							</p>
						  </div></p>
						  </li>
						  </ul>
						  <span id = "message" style="color:red"> </span>
						  <div class="d-flex justify-content-center mb-2">
							  <button type="submit" class="btn btn-outline-primary"><i class='fas fa-pen'></i> Edit</button>
							  <button type="reset" class="btn btn-outline-primary ms-1">Reset</button>
							</div>
							</form>
						  </div>
						</div>
						
					  </div>
					</div>
				  </div>
				  
				</section>
			  </div>
			</div>





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
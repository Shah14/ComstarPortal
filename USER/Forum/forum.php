<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>COMSTAR Portal Forum</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" href="../../assets/logo/logo.png">
  <link href="../../COMSTAR_INTERFACE_FIRST_SPRINT/Home/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!--DataTable-->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">  
  <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">    


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
  width: 25%;
  border: none;
  text-align: center;
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
	header("Location: ../../ACCOUNT/Login/login.php");
}
print_r($_SESSION);
$q=$_SESSION["User"];
$con = new mysqli("localhost","root","","comstar_portal");
$result=mysqli_query($con,"SELECT * FROM `login` WHERE Email='$q'");
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$name=$row["Full Name"];
						
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
		 <li class="dropdown"><a class="nav-link scrollto" href="../Profile/profile.php"><span>Profile</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
               <li><center><b><?php echo $name; ?></b></center></li>
               <li><a class="nav-link scrollto" href="../Profile/profile.php">View Profile</a></li>
			   <li><a class="nav-link scrollto" href="https://www.sandbox.paypal.com/myaccount/transactions/?free_text_search=&filter_id=&currency=ALL&issuance_product_name=&asset_names=&asset_symbols=&type=&status=&start_date=2021-07-23&end_date=2021-10-21">View Payment History</a></li>
               <li><a class="nav-link scrollto" href="../../ACCOUNT/Login/logout.php">Logout</a></li>
            </ul>
          </li>
		  <li><a class="nav-link scrollto active" href="../Forum/forum.php">Forum</a></li>
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
          <li>Forum</li>
        </ol>
        <h2>Forum</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
<section>
      <div class="container-fluid">
        <div class="row" >
		<center>
          <div class="col-md-9">

            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title" style="text-align:left">Posts</h3>
              </div>
              <!-- /.card-header -->
			  
              <div class="table-responsive">
			  <center><a href='add_post.php'><button class='btn btn-outline-danger form-control' style="margin-bottom:1%;width:75px"><i class='fas fa-plus-circle'></i> Add</button></a></center>
        
        <table id="example" class="table m-0">
        <?php
				$con = new mysqli("localhost","root","","comstar_portal");
				$result=mysqli_query($con,"SELECT * FROM `forum` INNER JOIN login ORDER BY Date DESC");
        $result1=mysqli_query($con,"SELECT * FROM `forum` INNER JOIN admin ORDER BY Date DESC");
        echo"
          <thead>
              <tr>
                <th>TITLE</th>
                <th>DATE POSTED</th>
                <th>POSTED BY</th>
                <th>UPVOTE</th>
                <th>REPLIES</th>
                <th style='text-align:center'>ACTION</th>
              </tr>
          </thead>
          <tbody>";
              if ($result1->num_rows > 0) {
                while($row = $result1->fetch_assoc()) {
                  if($row["Poster"]== $row["Email"]){
                    $title=$row["Title"];
                    $desc=$row["Description"];
                    $id=$row["Post ID"];
                    echo"<tr style='height:200px'>
                      <td>".$row["Title"]."</td>
                      <td>".$row["Date"]."</td>
                      <td>".$row["Name"]."</td>
                      <td>".$row["Upvote"]."</td>
                      <td>".$row["Replies"]."</td>
                      <td style='text-align:center'>
                        <form action='../Forum/view_post.php' method='post'>
                          <input type='hidden' id='id' value='$id' name='id'>
                          <button class='btn btn-outline-danger' style='width:75px'name='id' type='submit' value='$id'><i class='fas fa-book-open'></i> View</button>
                        </form>
                      </td>
                   </tr>";
                  }                    
                }
              }
              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  if($row["Poster"]==$q){
                    if($row["Poster"]== $row["Email"]){
                      $title=$row["Title"];
                      $desc=$row["Description"];
                      $id=$row["Post ID"];
                      echo"<tr style='height:200px'>
                        <td>".$row["Title"]."</td>
                        <td>".$row["Date"]."</td>
                        <td>Me</td>
                        <td>".$row["Upvote"]."</td>
                        <td>".$row["Replies"]."</td>
                        <td style='text-align:center'>
                          <form action='../Forum/view_post.php' method='post'>
                            <input type='hidden' id='id' value='$id' name='id'>
                            <button class='btn btn-outline-danger' style='width:75px'name='id' type='submit' value='$id'><i class='fas fa-book-open'></i> View</button>
                          </form>
                          <form action='../Forum/edit_post.php' method='post'>
                            <button class='btn btn-outline-danger' style='width:75px'name='id' type='submit' value='$id'><i class='fas fa-pen'></i> Edit</button>
                          </form>
                          <form action='../Forum/delete_process.php' method='post'>
                            <button class='btn btn-outline-danger' style='width:75px'name='id' type='submit' value='$id'><i class='fas fa-trash'></i> Delete</button>
                          </form>
                        </td>
                      </tr>";
                    }
                  }else{
                    if($row["Poster"]== $row["Email"]){
                      $title=$row["Title"];
                      $desc=$row["Description"];
                      $id=$row["Post ID"];
                      echo"<tr style='height:200px'>
                        <td>".$row["Title"]."</td>
                        <td>".$row["Date"]."</td>
                        <td>".$row["Full Name"]."</td>
                        <td>".$row["Upvote"]."</td>
                        <td>".$row["Replies"]."</td>
                        <td style='text-align:center'>
                          <form action='../Forum/view_post.php' method='post'>
                            <input type='hidden' id='id' value='$id' name='id'>
                            <button class='btn btn-outline-danger' style='width:75px'name='id' type='submit' value='$id'><i class='fas fa-book-open'></i> View</button>
                          </form>
                        </td>
                      </tr>";
                    }
                  }
                }
              }else{
                echo"<tr>
                      <td>There are no posts.</td>
                   </tr>";
              }   
              echo "</table>";
        ?>

              <div class="card-footer clearfix">
              </div>
			

            
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

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
  </footer>

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
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</html>
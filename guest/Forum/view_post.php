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
          <li class="dropdown"><a class="nav-link scrollto" href="../Programme/programme_guest.php"><span>Programme</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="../Programme/programme_guest.php#UTM">UTM</a></li>
              <li><a href="../Programme/programme_guest.php#COMSTAR">COMSTAR</a></li>
              <li><a href="../Programme/programme_guest.php#Public">Public</a></li>
            </ul>
          </li>
		  <li><a href="../../ACCOUNT/Login/login.php">Login</a></li>
		  <li><a class="nav-link scrollto active"href="../Forum/forum_guest.php">Forum</a></li>
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


              <!-- /.card-header -->

				<?php
				$con = new mysqli("localhost","root","","comstar_portal");
				$result=mysqli_query($con,"SELECT * FROM `forum` WHERE `Post ID`='$_POST[id]'ORDER BY Date DESC");
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
								$title=$row["Title"];
								$name=$row["Poster"];
								$desc=$row["Description"];
								$date=$row["Date"];
								$id=$row["Post ID"];
								$type=$row["Poster Type"];
								echo '<div class="card">
									  <div class="card-header">
										<h3 style="text-align:left;"class="card-title">'.$title.'</h3>
									  </div>
									  <!-- /.card-header -->
									  <div class="card-body p-0">
										<table class="table table-sm">
										  <thead>
											<tr>
											  <th style="width:100px">Poster</th>
											  <th>Description</th>
											</tr>
											<th>'.$date.'</th>
											<th></th>
										  </thead>
										  <tbody>
											';	if($type=="Admin"){
													$result1=mysqli_query($con,"SELECT * FROM `admin` WHERE `Name`='$name'");
												if ($result1->num_rows > 0) {
													while($row = $result1->fetch_assoc()) {
														$image=$row["Image"];
														echo '<tr>
														<td style="width:200px"><center><img src="../../assets/profile picture/'.$image.'" class="img-circle elevation-2" style="width:100px;border-radius:50%;box-shadow: 0 3px 6px #888888;"><br>';
														echo $row["Name"];
														echo "<br>Admin</center>";
														$result2=mysqli_query($con,"SELECT * FROM `likes` WHERE `Post ID`='$id' AND `User`='$q'");
														if ($result2->num_rows > 0) {
															while($row = $result2->fetch_assoc()) {
																echo "<center><form action='../../account/login/login.php' method='post'>
																<button style='width:112px;' class='btn btn-outline-danger bi bi-hand-thumbs-up' name='id' type='submit' value='".$id."'>Unlike</button>
																</form>";
															}
														}else{
														echo "<center><form action='../../account/login/login.php' method='post'>
												   	    <button style='width:112px;' class='btn btn-outline-danger bi bi-hand-thumbs-up' name='id' type='submit' value='".$id."'>Login to like</button>
														</form>";
														}
														$result3=mysqli_query($con,"SELECT * FROM `report` WHERE `Post ID`='$id' AND `User`='$q'");
														if ($result3->num_rows > 0) {
															while($row = $result3->fetch_assoc()) {
																echo '<button style="width:112px;" disabled class="btn btn-outline-danger bi bi-exclamation-triangle" name="id" type="submit" value="'.$id.'">Reported</button>';
															}
														}else {
															echo '<form action="../../account/login/login.php" method="post">
																	<button style="width:112px;" class="btn btn-outline-danger bi bi-exclamation-triangle" name="id" type="submit" value="'.$id.'">Login to report</button>
																	</form>
																  </div>

																</div>';
														}
														
														echo "";
													}
												}
												}else{
												
												$result1=mysqli_query($con,"SELECT * FROM `login` WHERE `Full Name`='$name'");
												if ($result1->num_rows > 0) {
													while($row = $result1->fetch_assoc()) {
														$image=$row["Image"];
														echo '<tr>
											  <td style="width:200px"><center><img src="../../assets/profile picture/'.$image.'" class="img-circle elevation-2" style="width:100px;border-radius:50%;box-shadow: 0 3px 6px #888888;"><br>';
														echo $row["Full Name"];
														echo "<br>Poster</center>";
														$result2=mysqli_query($con,"SELECT * FROM `likes` WHERE `Post ID`='$id' AND `User`='$q'");
														if ($result2->num_rows > 0) {
															while($row = $result2->fetch_assoc()) {
																echo "<center><form action='../../account/login/login.php' method='post'>
																<button style='width:112px;' class='btn btn-outline-danger bi bi-hand-thumbs-up' name='id' type='submit' value='".$id."'>Unlike</button>
																</form>";
															}
														}else{
														echo "<center><form action='../../account/login/login.php' method='post'>
												   	    <button style='width:112px;' class='btn btn-outline-danger bi bi-hand-thumbs-up' name='id' type='submit' value='".$id."'>Login to like</button>
														</form>";
														}
														$result3=mysqli_query($con,"SELECT * FROM `report` WHERE `Post ID`='$id' AND `User`='$q'");
														if ($result3->num_rows > 0) {
															while($row = $result3->fetch_assoc()) {
																echo '<button style="width:112px;" disabled class="btn btn-outline-danger bi bi-exclamation-triangle" name="id" type="submit" value="'.$id.'">Reported</button>';
															}
														}else {
															echo '<form action="../../account/login/login.php" method="post">
																	<button style="width:112px;" class="btn btn-outline-danger bi bi-exclamation-triangle" name="id" type="submit" value="'.$id.'">Login to report</button>
																	</form>
																	</center>
																  </div>

																</div>';
														}
													}
												}
												}
											 echo '</td>
											  <td><p style="background-color: #eee;
												  text-align:justify;
												  padding:10px;
												  width: 1200px;
												  height: 400px;
												  border: 1px solid gray;
												  overflow: auto;">'.$desc.'</p></td>
											</tr>';
											$result=mysqli_query($con,"SELECT * FROM `reply` WHERE `Post ID`='$_POST[id]'ORDER BY Date ASC");
											if ($result->num_rows > 0) {
												while($row = $result->fetch_assoc()) {
													$date=$row["Date"];
													$name=$row["Poster"];
													$reply=$row["Reply"];
													$type=$row["Poster Type"];
													echo'
											<th>'.$date.'</th>
											<th></th>
											<tr>
											  <td style="width:200px">';
											  if($type=="Admin"){
												  $result1=mysqli_query($con,"SELECT * FROM `admin` WHERE `Name`='$name'");
												if ($result1->num_rows > 0) {
													while($row = $result1->fetch_assoc()) {
														$image=$row["Image"];
														echo '<center><img src="../../assets/profile picture/'.$image.'" class="img-circle elevation-2" style="width:100px;border-radius:50%;box-shadow: 0 3px 6px #888888;"><br>';
														echo $row["Name"];
														echo "<br>Admin</center>";
													}
												}
											  }else{
												  $result1=mysqli_query($con,"SELECT * FROM `login` WHERE `Full Name`='$name'");
												if ($result1->num_rows > 0) {
													while($row = $result1->fetch_assoc()) {
														$image=$row["Image"];
														echo '<center><img src="../../assets/profile picture/'.$image.'" class="img-circle elevation-2" style="width:100px;border-radius:50%;box-shadow: 0 3px 6px #888888;"><br>';
														echo $row["Full Name"];
														echo "<br>Participant</center>";
													}
												}
											  }
												
											 echo '</td>
											  <td><p style="background-color: #eee;
											      text-align:justify;
												  padding:10px;
												  width: 1200px;
												  height: 400px;
												  border: 1px solid gray;
												  overflow: auto;">'.$reply.'</p></td>
											</tr>';
												}
											}
										  echo '
										  <th>Reply</th>
										  <th></th>
										  <tr>';
										  

											  echo '<tr>
											  <td style="width:200px"><center><img src="../../assets/profile picture/default.png" class="img-circle elevation-2" style="width:100px;border-radius:50%;box-shadow: 0 3px 6px #888888;"><br>';
											  echo $_SESSION["User"];
											  echo "<br>Guest</center>";
											 echo '</td>
										  </td>
										  <td>';
											echo '<form action="../../account/login/login.php" class="form-horizontal" method="post" >
												  <div class="form-group row">
													<div class="col-sm-10">
													  <textarea class="form-control" name="reply" rows="5" cols="60" placeholder="Enter your reply here"></textarea>
													</div>
												  </div>	
												 <div class="form-group row">
													<div class="offset-sm-2 col-sm-10">
													  <button type="submit" name="id"class="btn btn-danger" value="'.$id.'">Login to reply</button>
													</div>
												  </div>
												</form>
										  </td>
										  </tr>
										  </tbody>
										</table>
									  </div>
									  <!-- /.card-body -->
									</div>';
					}
				}

				?>        
                  </tbody>
                </table>
              </div>

              <!-- /.card-body -->

              <!-- /.card-footer -->
            </div>
            <!-- /.card -->

            
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
</script>
</html>
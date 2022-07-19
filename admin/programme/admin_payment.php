<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Payment | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="icon" href="../../assets/logo/logo.png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../template/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../template/AdminLTE-3.2.0/dist/css/adminlte.min.css">

</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<?php
if(isset($_SESSION["admin"]) === true){
}else{
	header("Location: ../../ACCOUNT/LOGIN/login.php");
}
print_r($_SESSION);
$q=$_SESSION["Admin"];
?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../Home/admin.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../USER/Home/home.php" class="brand-link">
      <img src="../../assets/logo/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">COMSTAR Portal</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
                  <a href="../Profile/admin_profile.php"><img  class="img-circle elevation-2" alt="User Image"
				  <?php 
				  $con = new mysqli("localhost","root","","comstar_portal");
				  $result=mysqli_query($con,"SELECT * FROM `admin` WHERE Email='$q'");
				  if ($result->num_rows > 0) {
				  while($row = $result->fetch_assoc()) {
				  $image=$row["Image"];
						
		}
	}
					echo 'src="../../assets/profile picture/'.$image.'" >'
					?> 
        </a></div>
        <div class="info">
          <a href="../Profile/admin_profile.php" class="d-block">
		  <?php 
				  $con = new mysqli("localhost","root","","comstar_portal");
				  $result=mysqli_query($con,"SELECT * FROM `admin` WHERE Email='$q'");
				  if ($result->num_rows > 0) {
				  while($row = $result->fetch_assoc()) {
				  echo $row["Name"];
						
		}
	}
		  ?>
		  </a>
		  
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../Home/admin.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Home</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="../Profile/admin_profile.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../Verify/admin_verify.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Verification 
                    <?php
                    $con = new mysqli("localhost","root","","comstar_portal");
                    $count=0;
                    $result=mysqli_query($con,"SELECT Name FROM `login` WHERE `Verification`='Pending'");
                      while($row = $result->fetch_assoc()) {
                        $count++;
                      }
                            echo '<span class="badge badge-info right">'.$count.'</span>';
                    ?>
                  </p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="../Programme/admin_programme.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Programme</p>
                </a>

			  <li class="nav-item">
                <a href="https://www.sandbox.paypal.com/activities/?fromDate=2021-09-21&toDate=2021-10-21" class="nav-link  active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin Payment</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="../Support/admin_support.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Technical Support
                  <?php
                    $con = new mysqli("localhost","root","","comstar_portal");
                    $count=0;
                    $result=mysqli_query($con,"SELECT * FROM `technical`");
                      while($row = $result->fetch_assoc()) {
                        $count++;
                      }
                            echo '<span class="badge badge-info right">'.$count.'</span>';
                    ?></p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="../Homepage/edit_homepage.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Homepage</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="../Forum/admin_forum.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin Forum</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="../advertisement/advertisement.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin Advertisement</p>
                </a>
              </li>
            </ul>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Payment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../Home/admin.php">Home</a></li>
              <li class="breadcrumb-item active">Payment</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row" >
          <div class="col-md-12">

            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Payment Details</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">			  
					  <iframe frameborder="1" width="420" height="345" src="https://www.sandbox.paypal.com/activities/?fromDate=2021-09-21&toDate=2021-10-21"></iframe> 
                  </tbody>
                </table>
                    
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
			  
                <button class="btn btn-outline-danger" onclick="window.print()">Generate Attendance Report</button>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
			

            
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../../template/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../template/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="../../template/AdminLTE-3.2.0/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../../template/AdminLTE-3.2.0/plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../template/AdminLTE-3.2.0/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../template/AdminLTE-3.2.0/dist/js/pages/dashboard3.js"></script>


</body>
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
</html>


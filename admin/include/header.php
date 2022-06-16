<?php
date_default_timezone_set("Asia/Kuala_Lumpur");

function get_time_ago($time)
{
    date_default_timezone_set("Asia/Kuala_Lumpur");
    
    $time_difference = time() - $time;

    if( $time_difference < 1 ) { return 'less than 1 second ago'; }
    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $time_difference / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            return 'about ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
        }
    }
}
?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../home/admin.php" class="nav-link">Home</a>
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
                <a href="../Home/admin.php" class="nav-link <?php echo $home; ?>">
                  <i class="fa-solid fa-house-lock nav-icon"></i>
                  <p>Home</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="../Profile/admin_profile.php" class="nav-link <?php echo $profile; ?>">
                  <i class="fa fa-circle-user nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../Verify/admin_verify.php" class="nav-link <?php echo $verify; ?>">
                  <i class="fa fa-user-check nav-icon"></i>
                  <p>User Verification 
                    <?php
                    
                    $count=0;
                    $result=mysqli_query($con,"SELECT Name FROM `login` WHERE `Verification`='Pending'");
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                         $count++;
                        }echo '<span class="badge badge-pill badge-danger right">'.$count.'</span>';
                      }
                    ?>
                  </p>
                </a>
              </li>
			   <li class="nav-item">
                <a href="../Programme/admin_programme.php" class="nav-link <?php echo $programme; ?>">
                  <i class="fa fa-calendar-days nav-icon"></i>
                  <p>Programme</p>
                </a>

			  <li class="nav-item">
                <a href="https://www.sandbox.paypal.com/activities/?fromDate=2021-09-21&toDate=2021-10-21" class="nav-link <?php echo $payment; ?>">
                  <i class="fa fa-coins nav-icon"></i>
                  <p>Payment</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="../Support/admin_support.php" class="nav-link <?php echo $support; ?>">
                  <i class="fa fa-headset nav-icon"></i>
                  <p>Technical Support
                  <?php
                    
                    $count=0;
                    $result=mysqli_query($con,"SELECT * FROM `technical`");
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                        $count++;
                        }echo '<span class="badge badge-pill badge-danger right">'.$count.'</span>';
                      }
                    ?>
                  </p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="../Homepage/edit_homepage.php" class="nav-link <?php echo $edit; ?>">
                  <i class="fa fa-house-chimney-window nav-icon"></i>
                  <p>Edit Homepage</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="../Forum/admin_forum.php" class="nav-link <?php echo $forum; ?>">
                  <i class="fa fa-comments nav-icon"></i>
                  <p>Forum</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="../advertisement/advertisement.php" class="nav-link <?php echo $advertisement; ?>">
                  <i class="fa fa-rectangle-ad nav-icon"></i>
                  <p>Advertisement</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="../Support/admin_contact.php" class="nav-link <?php echo $contact; ?>">
                  <i class="fa fa-message nav-icon"></i>
                  <p>Contact Us
                  <?php
                    
                    $count=0;
                    $result=mysqli_query($con,"SELECT * FROM `contact`");
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                        $count++;
                        }echo '<span class="badge badge-pill badge-danger right">'.$count.'</span>';
                      }
                    ?>
                  </p>
                </a>
              </li>
            </ul>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
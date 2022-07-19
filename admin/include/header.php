<?php
date_default_timezone_set("Asia/Kuala_Lumpur");

function get_time_ago($time,$length)
{
    date_default_timezone_set("Asia/Kuala_Lumpur");
    
    $time_difference = time() - $time;

    if( $time_difference < 1 ) 
    { 
      if($length != "short")
      {
        return 'less than 1 second ago'; 
      }
      else
      {
        return '1 s';
      }
    }
    if($length != "short")
    {
      $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
      30 * 24 * 60 * 60       =>  'month',
      24 * 60 * 60            =>  'day',
      60 * 60                 =>  'hour',
      60                      =>  'minute',
      1                       =>  'second'
    );
    }
    else
    {
      $condition = array( 12 * 30 * 24 * 60 * 60 =>  'y',
      30 * 24 * 60 * 60       =>  'mon',
      24 * 60 * 60            =>  'd',
      60 * 60                 =>  'hr',
      60                      =>  'min',
      1                       =>  'sec'
    );
    }


    foreach( $condition as $secs => $str )
    {
        $d = $time_difference / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            if($length != "short")
            {
              return 'about ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
            }
            else
            {
              return $t . ' ' . $str ;
            }
            
        }
    }
}
$result = mysqli_query($con,"SELECT * FROM `admin` WHERE Email='$q'");
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $image = $row["Image"];
    $name = $row["Name"];
    $admin_update = $row["Date Verified"];
  }
}
$verify_count = 0;
$verify_update = $admin_update;
$verify_show = "";
$result2 = mysqli_query($con,"SELECT * FROM `login` WHERE `Verification`='Pending'");
if ($result2->num_rows > 0) {
  while($row = $result2->fetch_assoc()) {
    if( strtotime($verify_update) < strtotime($row["Date Status"]) ){
      $verify_update = $row["Date Status"];
    }
    $verify_count++;
  }
}else{
  $verify_show = "hidden";
}
$technical_count = 0;
$technical_update = $admin_update;
$technical_show = "";
$result3 = mysqli_query($con,"SELECT * FROM `technical`");
if ($result3->num_rows > 0) {
  while($row = $result3->fetch_assoc()) {
    if( strtotime($technical_update) < strtotime($row["Date"]) ){
      $technical_update = $row["Date"];
    }
    $technical_count++;
  }
}else{
  $technical_show = "hidden";
}
                    
$contact_count = 0;
$contact_update = $admin_update;
$contact_show = "";
$result4=mysqli_query($con,"SELECT * FROM `contact`");
if ($result4->num_rows > 0) {
  while($row = $result4->fetch_assoc()) {
    if( strtotime($contact_update) < strtotime($row["Date"]) ){
      $contact_update = $row["Date"];
    }
    $contact_count++;
  }
}else{
  $contact_show = "hidden";
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
      <a href="../../account/login/logout.php" class="nav-link">Log Out</a>
      </li> 
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span <?php echo $contact_show ?> class="badge badge-danger navbar-badge"><?php echo $contact_count ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <?php
              $result4=mysqli_query($con,"SELECT * FROM `contact`");
              if ($result4->num_rows > 0) {
                $limit = 0;
                while($row = $result4->fetch_assoc()) {
                  if($limit ==3){
                    break;
                  }
                  $limit++;
                  $dots = "";
                  if(strlen($row["Message"])>25) {
                    $dots = "...";
                  }
            ?>
            <a href="../support/admin_contact.php" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="../../template/AdminLTE-3.2.0/dist/img/AdminLTELogo.png" alt="User Avatar" class="img-size-50 mr-3 img-circle img-bordered-sm">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    <?php echo $row["Name"] ?>
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm"><?php echo substr($row["Message"],0,25).$dots; ?></p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i><?php echo get_time_ago(strtotime($row["Date"]),"long")?></p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <?php
                }
              }
            ?>

          <div class="dropdown-divider"></div>
          <a href="../support/admin_contact.php" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span <?php if($verify_count + $technical_count + $contact_count == 0){echo "hidden";}?> class="badge badge-warning navbar-badge"><?php echo $verify_count+$technical_count+$contact_count?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span <?php if($verify_count + $technical_count + $contact_count == 0){echo "hidden";}?> class="dropdown-header"><?php echo $verify_count+$technical_count+$contact_count?> Notifications</span>
          <div class="dropdown-divider"></div>
          <a <?php echo $verify_show ?> href="../verify/admin_verify.php" class="dropdown-item">
            <i class="fas fa-user-check mr-2"></i> <?php echo $verify_count?> new verify requests
            <span class="float-right text-muted text-sm"><?php echo get_time_ago(strtotime($verify_update),"short")?></span>
          </a>
          <div class="dropdown-divider"></div>
          <a <?php echo $technical_show ?> href="../support/admin_support.php" class="dropdown-item">
            <i class="fas fa-headset mr-2"></i> <?php echo $technical_count?> new techical requests
            <span class="float-right text-muted text-sm"><?php echo get_time_ago(strtotime($technical_update),"short")?></span>
          </a>
          <div class="dropdown-divider"></div>
          <a <?php echo $contact_show ?> href="../support/admin_contact.php" class="dropdown-item">
            <i class="fas fa-message mr-2"></i> <?php echo $contact_count?> new messages
            <span class="float-right text-muted text-sm"><?php echo get_time_ago(strtotime($contact_update),"short")?></span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer" data-toggle="modal" data-target="#modal-xl">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <!--<li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>-->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../USER/Home/home.php" class="brand-link">
      <img src="../../assets/logo/logo.png" alt="COMSTAR Portal Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">COMSTAR Portal</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <a href="../Profile/admin_profile.php"><img  class="img-circle elevation-2" alt="User Image" src="../../assets/profile picture/<?php echo $image?>"></a>
        </div>
        <div class="info">
          <a href="../Profile/admin_profile.php" class="d-block"><?php echo $name?></a>
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
                  <p>User Verification <span <?php echo $verify_show ?> class="badge badge-pill badge-danger right"><?php echo $verify_count ?></span></p>
                </a>
              </li>
			        <li class="nav-item">
                <a href="../Programme/admin_programme.php" class="nav-link <?php echo $programme; ?>">
                  <i class="fa fa-calendar-days nav-icon"></i>
                  <p>Programme</p>
                </a>
              </li>
			        <li class="nav-item">
                <a href="https://www.sandbox.paypal.com/activities/?fromDate=2021-09-21&toDate=2021-10-21" class="nav-link <?php echo $payment; ?>">
                  <i class="fa fa-coins nav-icon"></i>
                  <p>Payment</p>
                </a>
              </li>
			        <li class="nav-item">
                <a href="../Support/admin_support.php" class="nav-link <?php echo $support; ?>">
                  <i class="fa fa-headset nav-icon"></i>
                  <p>Technical Support<span <?php echo $technical_show ?> class="badge badge-pill badge-danger right"><?php echo $technical_count ?></span></p>
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
                  <p>Contact Us<span <?php echo $contact_show ?> class="badge badge-pill badge-danger right"><?php echo $contact_count ?></span></p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

      <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">See All Notifications</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="col-12 col-sm-12">
                <div class="card card-primary card-outline card-tabs">
                  <div class="card-header p-0 pt-1 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-three-verify-tab" data-toggle="pill" href="#custom-tabs-three-verify" role="tab" aria-controls="custom-tabs-three-verify" aria-selected="true">User Verification</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-technical-tab" data-toggle="pill" href="#custom-tabs-three-technical" role="tab" aria-controls="custom-tabs-three-technical" aria-selected="false">Technical Support</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-contact-tab" data-toggle="pill" href="#custom-tabs-three-contact" role="tab" aria-controls="custom-tabs-three-contact" aria-selected="false">Contact Us</a>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <div class="tab-content" id="custom-tabs-three-tabContent">
                      <div class="tab-pane fade show active" id="custom-tabs-three-verify" role="tabpanel" aria-labelledby="custom-tabs-three-verify-tab">
                        <?php
                          $result2=mysqli_query($con,"SELECT * FROM `login` WHERE `Verification`='Pending' ORDER BY `Date Status` DESC");
                          if ($result2->num_rows > 0) {
                            $limit = 0;
                            while($row = $result2->fetch_assoc()) {
                              if($limit ==10){
                                break;
                              }
                              $limit++;
                        ?>
                        <a href="../support/admin_verify.php" class="dropdown-item">
                          <!-- Message Start -->
                          <div class="media">
                            <img src="../../assets/profile picture/<?php echo $row["Image"]?>" alt="User Avatar" class="img-size-50 mr-3 img-circle img-bordered-sm">
                            <div class="media-body">
                              <h3 class="dropdown-item-title">
                                <span style="color:blue"><?php echo $row["Full Name"] ?></span> has requested for account verification.
                                <span class="float-right text-sm text-dark"><i class="fas fa-star"></i></span>
                              </h3>
                              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i><?php echo get_time_ago(strtotime($row["Date Status"]),"long")?></p>
                            </div>
                          </div>
                          <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <?php
                            }
                          }
                        ?>
                      </div>
                      <div class="tab-pane fade" id="custom-tabs-three-technical" role="tabpanel" aria-labelledby="custom-tabs-three-technical-tab">
                        <?php
                          $result3=mysqli_query($con,"SELECT * FROM `technical` LEFT JOIN `login` ON login.Email=technical.email  ORDER BY `Date` DESC");
                          if ($result3->num_rows > 0) {
                            $limit = 0;
                            while($row = $result3->fetch_assoc()) {
                              if($limit ==10){
                                break;
                              }
                              if($row["Type"]=="Suggestion"){
                                $type_badge = "success";
                              }else if($row["Type"]=="Feedback"){
                                $type_badge = "primary";
                              }else{
                                $type_badge = "dark";
                              }
                              $limit++;
                        ?>
                        <a href="../support/admin_support.php" class="dropdown-item">
                          <!-- Message Start -->
                          <div class="media">
                            <img src="../../assets/profile picture/<?php echo $row["Image"]?>" alt="User Avatar" class="img-size-50 mr-3 img-circle img-bordered-sm">
                            <div class="media-body">
                              <h3 class="dropdown-item-title">
                              <span style="color:blue"><?php echo $row["Full Name"] ?></span> has sent you a <span class="badge badge-<?php echo $type_badge?>"><?php echo $row["Type"] ?></span>.
                                <span class="float-right text-sm text-primary"><i class="fas fa-star"></i></span>
                              </h3>
                              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i><?php echo get_time_ago(strtotime($row["Date"]),"long")?></p>
                            </div>
                          </div>
                          <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <?php
                            }
                          }
                        ?>
                      </div>
                      <div class="tab-pane fade" id="custom-tabs-three-contact" role="tabpanel" aria-labelledby="custom-tabs-three-contact-tab">
                        <?php
                          $result4=mysqli_query($con,"SELECT * FROM `contact`");
                          if ($result4->num_rows > 0) {
                            $limit = 0;
                            while($row = $result4->fetch_assoc()) {
                              if($limit ==10){
                                break;
                              }
                              $limit++;
                        ?>
                        <a href="../support/admin_contact.php" class="dropdown-item">
                          <!-- Message Start -->
                          <div class="media">
                            <img src="../../template/AdminLTE-3.2.0/dist/img/AdminLTELogo.png" alt="User Avatar" class="img-size-50 mr-3 img-circle img-bordered-sm">
                            <div class="media-body">
                              <h3 class="dropdown-item-title">
                                <span style="color:blue"><?php echo $row["Name"] ?></span> has sent you a message.
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                              </h3>
                              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i><?php echo get_time_ago(strtotime($row["Date"]),"long")?></p>
                            </div>
                          </div>
                          <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <?php
                            }
                          }
                        ?>
                      </div>
                    </div>
                  </div>
                  <!-- /.card -->
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
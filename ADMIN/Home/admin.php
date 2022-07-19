<?php require '../include/css.php';?>

<head>
  <?php $page = "Home"; ?>

  <title><?php echo $page; ?> | Dashboard</title>

  <link rel="icon" href="../../assets/logo/logo.png">

</head>

<?php require '../include/config.php';?>

<?php $home = "active"; ?>

<?php


$user_count=0;
$admin_count=0;
$committee_count=0;

$result=mysqli_query($con,"SELECT Name FROM `login`");
  while($row = $result->fetch_assoc()) {
    $user_count++;
  }

$result=mysqli_query($con,"SELECT Name FROM `admin`");
  while($row = $result->fetch_assoc()) {
    $admin_count++;
  }

$result=mysqli_query($con,"SELECT Name FROM `committee`");
  while($row = $result->fetch_assoc()) {
    $committee_count++;
  }
?>

<body class="hold-transition sidebar-mini">

  <?php
  if(isset($_GET["name"])){
    echo "
    <script>
      function flash(){
        setTimeout(function(){
          const queryString = window.location.search;
          const urlParams = new URLSearchParams(queryString);
          const name = urlParams.get('name')
          document.getElementById(name).classList.remove('blink_me');
          console.log(name)
        }, 5000)
      }
      flash();
    </script>";
  }
  ?>

<div class="wrapper">
  
<?php require '../include/header.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Home</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Admin</li>
              <li class="breadcrumb-item active">Home</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Website Completion Progress</span>
                  <span class="info-box-number">100 <small>%</small></span>
                </div>
              </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-tag"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Sprint 3 Progress</span>
                  <span class="info-box-number">100<small>%</small></span>
                </div>
              </div>
            </div>

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Registered Users</span>
                  <span class="info-box-number"><?php echo $user_count;?></span>
                </div>
              </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Website Admin</span>
                  <span class="info-box-number"><?php echo $admin_count ?></span>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Website Progress Report</h5>
                </div>

                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <p class="text-center">
                        <strong>Website Completion</strong>
                      </p>

                      <div class="progress-group">
                        Sprint 1
                        <span class="float-right"><b>18</b>/18</span>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-primary" style="width: 100%"></div>
                        </div>
                      </div>

                      <div class="progress-group">
                        Sprint 2
                        <span class="float-right"><b>32</b>/32</span>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-danger" style="width: 100%"></div>
                        </div>
                      </div>

                      <div class="progress-group">
                        <span class="progress-text">Sprint 3</span>
                        <span class="float-right"><b>22</b>/22</span>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-success" style="width: 100%"></div>
                        </div>
                      </div>

                      <div class="progress-group">
                        Total Progress
                        <span class="float-right"><b>72</b>/72</span>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-warning" style="width: 100%"></div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>

                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm-3 col-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 25%</span>
                        <h5 class="description-header">18/18</h5>
                        <span class="description-text">Sprint 1</span>
                      </div>
                    </div>

                    <div class="col-sm-3 col-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 44%</span>
                        <h5 class="description-header">32/32</h5>
                        <span class="description-text">Sprint 2</span>
                      </div>
                    </div>

                    <div class="col-sm-3 col-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 31%</span>
                        <h5 class="description-header">22/22</h5>
                        <span class="description-text">Sprint 3</span>
                      </div>
                    </div>

                    <div class="col-sm-3 col-6">
                      <div class="description-block">
                        <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 100%</span>
                        <h5 class="description-header">72/72</h5>
                        <span class="description-text">Total Progress</span>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Main row -->
          <div class="row">
            <div class="col-12 col-sm-6 col-md-6">
              <div class="card">
                <div class="card-header border-transparent">
                  <h3 class="card-title"><i class='fas fa-user-check'></i> Registered Users</h3>
                  <div class="card-tools">
                      <span class="badge badge-danger"><?php echo $user_count ?> User(s)</span>
                  </div>
                </div>

                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table id="example3" class="table m-0">			
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>NAME</th>
                          <th>DATE REGISTERED</th>
                          <th>DATE ACCOUNT VERIFIED</th>
                          <th>MATRIC NUMBER</th>
                          <th>USER TYPE</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $result=mysqli_query($con,"SELECT * FROM `login` WHERE `Date Verified` IS NOT NULL ORDER BY `Date Registered` DESC");
                        if ($result->num_rows > 0) {
                          $no = 0;
                          while($row = $result->fetch_assoc()) {
                            if($row["User Type"]=="COMSTARIAN"){
                              $badge = "dark";
                            }else if($row["User Type"]=="UTM Student"){
                              $badge = "danger";
                            }else{
                              $badge = "primary";
                            }
                            if($row["Date Verified"]!=NULL){
                              $date = date("j/m/Y H:i:s",strtotime($row["Date Verified"]));
                            }else{
                              $date = "Not Yet";
                            }
                            $no++
                        ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td style="width:30%">
                              <div class="user-block">
                                <img class="img-circle img-bordered-sm" src="../../assets/profile picture/<?php echo $row["Image"]?>" alt="user image">
                                <span class="username">
                                  <a href="#"><?php echo $row["Full Name"] ?></a>
                                </span>
                                <span class="description"><?php echo $row["Email"] ?></span>
                              </div>
                          </td>
                          <td><span hidden><?php echo $row["Date Registered"] ?></span><?php echo date("j F Y",strtotime($row["Date Registered"])) ?></td>
                          <td><span hidden><?php echo $row["Date Verified"] ?></span><?php echo date("j F Y",strtotime($row["Date Verified"])) ?></td>
                          <td><?php echo $row["Matric Number"] ?></td>
                          <td><span class="badge badge-<?php echo $badge?>"><?php echo $row["User Type"] ?></span></td>
                          
                        </tr>
                        <?php
                          }
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer clearfix"></div>
              </div>
            </div>
            
            <div class="col-md-6">
              <div class="card" id="committee">
                <span class="badge badge">Click on Members to <i class='fas fa-pen'></i> Edit</span>
                <div class="card-header">
                  <h3 class="card-title"><i class='fas fa-sitemap'></i> COMSTAR Committee</h3>
                  <div class="card-tools">
                    <span class="badge badge-danger"><?php echo $committee_count ?> Committee Member(s)</span>
                  </div>
                </div> <!--card-header-->

                <div class="card-body p-0">
                  <div class="col-12">
                    <ul class="nav nav-tabs justify-content-center" id="custom-tabs-four-tab" role="tablist">
                      <?php
                      $value=array();
                      $array=array();
                      $i = 0;
                      $result=mysqli_query($con,"SELECT *  FROM `committee` ORDER BY `Session` DESC");
                      while($row = $result->fetch_assoc()) {
                        //echo $row["Session"]."<br>";
                        if($row["Session"]!=NULL){
                          if (!array_key_exists($row["Session"],$value)){
                            $i = 0;
                            array_push($array,$row["Session"]);
                          }
                            $value[$row["Session"]][$i]["ID"] = $row["ID"];
                            $value[$row["Session"]][$i]["Name"] = $row["Name"];
                            $value[$row["Session"]][$i]["Role"] = $row["Role"];
                            $value[$row["Session"]][$i]["Picture"] = $row["Picture"];
                            $i++;
                        }
                      }
                      for ($i = 0; $i <= count($array)-1; $i++){

                      ?>
                      <li class="nav-item">
                        <a class="nav-link <?php if(substr($array[$i],0,4) == date("Y") ){echo "active";}?>" id="custom-tabs-four-<?php echo substr($array[$i],0,4)?>-tab" data-toggle="pill" href="#custom-tabs-four-<?php echo substr($array[$i],0,4)?>" role="tab" aria-controls="custom-tabs-four-<?php echo substr($array[$i],0,4)?>" aria-selected="true"><?php echo $array[$i]?></a>
                      </li>
                      <?php
                      }
                      ?>
                    </ul>
                  </div>
                  <ul class="users-list clearfix">
                    <div class="row">
                      <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                          <?php
                          for ($i = 0; $i <= count($array)-1; $i++){
                          ?>
                          <div class="tab-pane fade <?php if(substr($array[$i],0,4) == date("Y") ){echo "show active";}?>" id="custom-tabs-four-<?php echo substr($array[$i],0,4)?>" role="tabpanel" aria-labelledby="custom-tabs-four-<?php echo substr($array[$i],0,4)?>-tab">
                            <div class="row">
                            
                              <?php 
                              for($y = 0; $y <= count($value[$array[$i]])-1; $y++){
                                $class = " ";
                                if(isset($_GET['name'])){
                                  if($_GET['name']==$value[$array[$i]][$y]["Name"]){
                                    $class = "blink_me";
                                  }else{
                                    $class = " ";
                                  }
                                }
                              ?>
                              <div class='col-lg-3 col-md-6 d-flex align-items-stretch'>
                                <div class='member <?php echo $class ?>' id="<?php echo $value[$array[$i]][$y]["Name"] ?>" >
                                  <div class='member-img'>
                                    <a href="edit_committee.php?id=<?php echo $value[$array[$i]][$y]["ID"] ?>">
                                      <img src='../../COMSTAR Committee/MT BARU/<?php echo $value[$array[$i]][$y]["Picture"];?>' id="<?php echo $value[$array[$i]][$y]["Name"];?>" width='160px'class='img-circle elevation-2 ' alt='User Image'></img>
                                    </a>
                                  </div> <!--member-img-->
                                  <div class='member-info' >
                                    <center>
                                      <a href="edit_committee.php?id=<?php echo $value[$array[$i]][$y]["ID"] ?>" class='users-list-name'><?php echo $value[$array[$i]][$y]["Name"];?></a>
                                      <span class="badge badge-dark text-wrap" style="width: 10rem;"><?php echo $value[$array[$i]][$y]["Role"];?></span>
                                    </center>
                                  </div> <!--member-info-->
                                </div> <!--member-->
                              </div> <!--col-lg-3-->
                              <?php
                              } 
                              ?>
                              <div class='col-lg-3 col-md-6 d-flex align-items-stretch'>
                                <div class='member'>
                                  <div class='member-img'>
                                    <a href='add_committee.php'><i class='fa fa-plus-circle'style='font-size:160px;color:gray''></i></a>
                                  </div><!--member-img-->
                                  <div class='member-info' >
                                    <center>
                                      <a class='users-list-name' href='add_committee.php'>Add New Member</a>
                                    </center>
                                  </div><!--member-info-->
                                </div><!--member-->
                              </div><!--col-lg-3-->
                              
                            </div>
                          </div>
                          <?php
                          }
                          ?>
                        </div>
                      </div>
                      
                    </div> <!--row-->     
                  </ul> <!-- users-list-->
                </div> <!--card-body-->
                
                <div class="card-footer text-center"></div>
              </div><!--card-->
            </div> <!--col-md-6-->


            
            
          </div>
        </div>
      </section>
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->


<?php require '../include/footer.php';?>

<?php require '../include/script.php';?>

</body>
</html>


<?php require '../include/css.php';?>

<head>
  <?php $page = "Home"; ?>

  <title><?php echo $page; ?> | Dashboard</title>

  <link rel="icon" href="../../assets/logo/logo.png">

</head>

<?php require '../include/config.php';?>

<?php $home = "active"; ?>

<?php

if(isset($_GET["name"])){
  $body = "onload='flash()'";
}else{
  $body = " ";
}

?>

<body <?php echo $body ?> class="hold-transition sidebar-mini">

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
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Admin</li>
              <li class="breadcrumb-item active">Home</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

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

          <?php
            $count=0;
            $result=mysqli_query($con,"SELECT Name FROM `login`");
              while($row = $result->fetch_assoc()) {
                $count++;
              }
          ?>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Registered Users</span>
                <span class="info-box-number"><?php echo $count;?></span>
              </div>
            </div>
          </div>

          <?php
            $count=0;
            $result=mysqli_query($con,"SELECT Name FROM `admin`");
              while($row = $result->fetch_assoc()) {
                $count++;
               }
          ?>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Website Admin</span>
                <span class="info-box-number"><?php echo $count ?></span>
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

                <?php
                  $count=0;
                  $result=mysqli_query($con,"SELECT * FROM `login`");
                    while($row = $result->fetch_assoc()) {
                      $count++;
                    }
                ?>
                <div class="card-tools">
                    <span class="badge badge-danger"><?php echo $count ?> User(s)</span>
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
                      $result=mysqli_query($con,"SELECT * FROM `login` ORDER BY `Date Registered` DESC");
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
                      }else{
                      ?>
                      <tr>
                        <td>No data</td>
                        <td>No data</td>
                        <td>No data</td>
                        <td>No data</td>
                        <td>No data</td>
                        <td>No data</td>
                        <td>No data</td>
                      </tr>
                      <?php      
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

                <?php
                $count=0;
                $result=mysqli_query($con,"SELECT Name FROM `committee`");
                  while($row = $result->fetch_assoc()) {
                    $count++;
                  }
                ?>
                <div class="card-tools">
                  <span class="badge badge-danger"><?php echo $count ?> Committee Member(s)</span>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="users-list clearfix">
					        <div class="row">
                    <?php
                    $result=mysqli_query($con,"SELECT * FROM `committee` ");
                      while($row = $result->fetch_assoc()) {
                        $id=$row["ID"];
                        $class = " ";
                        if(isset($_GET['name'])){
                          if($_GET['name']==$row["Name"]){
                            $class = "blink_me";
                          }else{
                            $class = " ";
                          }
                        }
                    ?>
								    <div class='col-lg-3 col-md-6 d-flex align-items-stretch'>
									    <div id="<?php echo $row["Name"] ?>" class='member <?php echo $class ?>'>
									      <div class='member-img'>
                          <a href="edit_committee.php?id=<?php echo $id;?>">
                            <img src='../../COMSTAR Committee/MT BARU/<?php echo $row["Picture"];?>' id="<?php echo $row["Name"];?>" width='160px'class='img-circle elevation-2 ' alt='User Image'></img>
                          </a>
									      </div>
									      <div class='member-info' >
                          <center>
                            <a class='users-list-name'><?php echo $row["Name"];?></a>
                            <span class='users-list-date'><?php echo $row["Role"];?></span>
                          </center>
									      </div>
									    </div>
								    </div>
                    <?php
                      }
                    ?>
                  
                    <div class='col-lg-3 col-md-6 d-flex align-items-stretch'>
                      <div class='member'>
                        <div class='member-img'>
                          <a href='add_committee.php'><i class='fa fa-plus-circle'style='font-size:160px;color:gray''></i></a>
                        </div>
                        <div class='member-info' >
                          <center>
                            <a class='users-list-name' href='#'>Add New Member</a>
                          </center>
                        </div>
                      </div>
                    </div>
							    </div>        
                </ul>
              </div>
            <div class="card-footer text-center"></div>
          </div>
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


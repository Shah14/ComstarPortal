<?php require '../include/css.php';?>

<head>
  <?php $page = "Verify"; ?>

  <title><?php echo $page; ?> | Dashboard</title>

  <link rel="icon" href="../../assets/logo/logo.png">

</head>

<?php require '../include/config.php';?>

<?php $verify = "active"; ?>

<body class="hold-transition sidebar-mini">

<div class="wrapper">
  
<?php require '../include/header.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User Verification</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Admin</li>
              <li class="breadcrumb-item active">Verify</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <?php
			$count=0;
			$result=mysqli_query($con,"SELECT * FROM `login` WHERE Verification='Pending'");
				while($row = $result->fetch_assoc()) {
					$count++;
				}
		?>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title"><i class='fas fa-users'></i> Pending Users</h3>
                <div class="card-tools">
                  <span class="badge badge-danger"><?php echo $count ?> Pending Request(s)</span>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table m-0">	
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>NAME</th>
                          <th>VERIFY REQUEST DATE</th>
                          <th>VERIFY REQUEST TIME</th>
                          <th>MATRIC NUMBER</th>
                          <th>USER TYPE</th>
                          <th>STATUS</th>
                          <th style='text-align:center'>VERIFY</th>
                        </tr>
                      </thead>

                      <tbody>
                      <?php
                      $result=mysqli_query($con,"SELECT * FROM `login` WHERE `Verification`='Pending' ORDER BY `Date Status` DESC");
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
                          $email=$row["Email"];
                          $no++;
                      ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td style="width:20%">
                            <div class="user-block">
                              <img class="img-circle img-bordered-sm" src="../../assets/profile picture/<?php echo $row["Image"]?>" alt="user image">
                              <span class="username">
                                <a href="#"><?php echo $row["Full Name"] ?></a>
                              </span>
                              <span class="description"><?php echo $row["Email"] ?></span>
                            </div>
                          </td>
                          <td><span hidden><?php echo $row["Date Status"] ?></span><?php echo date("j F Y",strtotime($row["Date Status"])) ?></td>
                          <td><span hidden><?php echo $row["Date Status"] ?></span><?php echo date("h:i:s a",strtotime($row["Date Status"])) ?></td>
                          <td><?php echo $row["Matric Number"] ?></td>
                          <td><span class="badge badge-<?php echo $badge?>"><?php echo $row["User Type"] ?></span</td>
                          <td><span class="badge badge-pill badge-danger"><?php echo $row["Verification"] ?></span></td>
                          <td style='text-align:center;width:20%'>
                            <form id="verify" action='../Verify/verify_process.php' method='post'>
                              <input type='hidden' name='email' value='<?php echo $email ?>'>
                              <span hidden>
                                <button id="comstar_<?php echo $email ?>" name='verify'type='submit'value='COMSTARIAN'><i class='fas fa-user-check'></i> COMSTARIAN</button><br>
                                <button id="utm_<?php echo $email ?>" name='verify'type='submit'value='UTM Student'><i class='fas fa-user-graduate'></i> UTM Student</button><br>
                                <button id="public_<?php echo $email ?>" name='verify'type='submit'value='Public'><i class='fas fa-user'></i> Public</button>
                              </span>
                              <button onclick="alert('Are you sure?','Do you want to verify this student?','info','comstar_<?php echo $email ?>','verify')" type='button' class='btn btn-danger form-control' style='width:50%;margin-bottom:1%;'><small><i class='fas fa-user-check'></i> COMSTARIAN</small></button><br>
                              <button onclick="alert('Are you sure?','Do you want to verify this student?','info','utm_<?php echo $email ?>','verify')" type='button' class='btn btn-danger form-control' style='width:50%;margin-bottom:1%;'><small><i class='fas fa-user-check'></i> UTM Student</small></button><br>
                              <button onclick="alert('Are you sure?','Do you want to verify this student?','info','public_<?php echo $email ?>','verify')" type='button' class='btn btn-danger form-control' style='width:50%;margin-bottom:1%;'><small><i class='fas fa-user-check'></i> Public</small></button><br>
                            </form>
                          </td>
                        </tr>
                      <?php
                        }
                      }
                      ?>         
                        </tbody>
                      </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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


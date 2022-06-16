<?php require '../include/css.php';?>

<head>
  <?php $page = "Programme"; ?>

  <title><?php echo $page; ?> | Dashboard</title>

  <link rel="icon" href="../../assets/logo/logo.png">

</head>

<?php require '../include/config.php';?>

<?php $programme = "active"; ?>

<body class="hold-transition sidebar-mini">

<div class="wrapper">
  
<?php require '../include/header.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Attendance</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Admin</li>
              <li class="breadcrumb-item active"><a href="admin_programme.php">Programme</a></li>
              <li class="breadcrumb-item active">View Attendance</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

        <!-- Main content -->
				<?php
        $id=$_GET['id'];
        $result=mysqli_query($con,"SELECT * FROM `programme`  WHERE `Programme ID`='$id'");
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$title=$row["Name"];
          }
        }
        ?>
				<section class='content'>
				  <div class='container-fluid'>
						<div class='col-md-12'>

							<div class='card'>
							  <div class='card-header border-transparent'>
								  <h3 class='card-title'><?php echo $title ?></h3>
							  </div>
                <div class='card-body'>
                  <table id='example1' class='table m-0'>
                    <thead>
                        <tr>
                          <th>E-MAIL</th>
                          <th>STUDENT</th>
                          <th>ATTEND STATUS</th>
                          <th>LAST UPDATED</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $result=mysqli_query($con,"SELECT * FROM `list` WHERE `Programme ID`='$id'");
                    if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                      <td><?php echo $row["Student"] ?></td>
                      <td><?php echo $row["Name"] ?></td>
                      <td><?php echo $row["Attend Status"] ?></td>
                      <td><?php echo $row["Present Time"] ?></td>
                    </tr>
                    <?php
                      }
                    } 
                    ?>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer clearfix">
                  <button class="btn btn-outline-danger" onclick="window.print()">Generate Attendance Report</button>
                </div>
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
</html>


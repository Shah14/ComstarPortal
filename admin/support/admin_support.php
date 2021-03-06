<?php require '../include/css.php';?>

<head>
  <?php $page = "Support"; ?>

  <title><?php echo $page; ?> | Dashboard</title>

  <link rel="icon" href="../../assets/logo/logo.png">

</head>

<?php require '../include/config.php';?>

<?php $support = "active"; ?>

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
            <h1>Technical Support</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Admin</li>
              <li class="breadcrumb-item active">Support</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <?php
		$count=0;
		$result=mysqli_query($con,"SELECT * FROM `technical`");
			while($row = $result->fetch_assoc()) {
				$count++;
			}					
		?>
    <section class="content">
      <div class="container-fluid">
        <div class="row" >
          <div class="col-md-12">
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title"><i class='fas fa-headset'></i> Support Requests</h3>
                <div class="card-tools">
                  <span class="badge badge-danger"><?php echo $count ?> Request(s)</span>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="example2" class="table m-0">			  
                    <?php
                    $result=mysqli_query($con,"SELECT * FROM `technical` LEFT JOIN `login` ON login.Email=technical.email  ORDER BY `Date` DESC");
                    ?>
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>USER</th>
                        <th>REQUESTED DATE</th>
                        <th>SUPPORT TYPE</th>
                        <th>DESCRIPTION</th>
                        <th style='text-align:center'>ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                      $no = 0;
                      while($row = $result->fetch_assoc()) {
                        if($row["Type"]=="Suggestion"){
                          $badge = "success";
                        }else if($row["Type"]=="Feedback"){
                          $badge = "primary";
                        }else{
                          $badge = "dark";
                        }
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
                        <td><span hidden><?php echo $row["Date"] ?></span><?php echo date("j F Y",strtotime($row["Date"])) ?></td>
                        <td><span class="badge badge-pill badge-<?php echo $badge?>"><?php echo $row["Type"] ?></span></td>
                        <td><?php echo $row["Description"] ?></td>
                        <td style='text-align:center'>
                          <form id="delete" action='../Support/delete_support_process.php' class='form-horizontal' method='post'>
                            <input type='hidden' class='form-control' required name='id' value='<?php echo $row["Email"] ?>'>
                            <button hidden id="delete_<?php echo $row['Email'] ?>" class='btn btn-danger'><i class='fas fa-trash'></i> Delete</button>
                            <button onclick="alert('Are you sure?','Do you want to delete this request?','warning','delete_<?php echo $row['Email'] ?>','delete')" type='button' class='btn btn-danger'><i class='fas fa-trash'></i> Delete</button>
                          </form>
                        </td>
                      </tr>
						        <?php }
					          }
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-footer clearfix"></div>
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


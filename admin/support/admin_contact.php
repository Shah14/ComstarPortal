<?php require '../include/css.php';?>

<head>
  <?php $page = "Contact"; ?>

  <title><?php echo $page; ?> | Dashboard</title>

  <link rel="icon" href="../../assets/logo/logo.png">

</head>

<?php require '../include/config.php';?>

<?php $contact = "active"; ?>

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
            <h1>Contact Us</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Admin</li>
              <li class="breadcrumb-item active">Contact</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <?php
				$con = new mysqli("localhost","root","","comstar_portal");
				$count=0;
				$result=mysqli_query($con,"SELECT * FROM `contact`");
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
                <h3 class="card-title"><i class='fas fa-message'></i> Received Messages</h3>
					      <div class="card-tools">
				          <span class="badge badge-danger"><?php echo $count ?> Message(s)</span>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="example2" class="table m-0">
                    <thead>
                      <tr>
                        <th>NAME</th>
                        <th>DATE RECEIVED</th>
                        <th>EMAIL</th>
                        <th>SUBJECT</th>
                        <th>MESSAGE</th>
                        <th style='text-align:center'>ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $result=mysqli_query($con,"SELECT * FROM `contact`");
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          $id=$row["ID"];
                      ?>
                
                        <tr>
                          <td><?php echo $row["Name"] ?></td>
                          <td><span hidden><?php echo $row["Date"] ?></span><?php echo date("j/m/Y H:i:s",strtotime($row["Date"])) ?></td>
                          <td><?php echo $row["Email"] ?></td>
                          <td><?php echo $row["Subject"] ?></td>
                          <td><?php echo $row["Message"] ?></td>
                          <td style='text-align:center'>
                            <form action='delete_contact_process.php' method='post'>
                              <button hidden id="delete_<?php echo $id ?>" class='btn btn-danger' value='<?php echo $id ?>' name="id"><i class='fas fa-trash'></i> Delete</button>
                              <button onclick="alert('Are you sure?','Do you want to delete this message?','warning','delete_<?php echo $id ?>','delete')" type='button' class='btn btn-danger'><i class='fas fa-trash'></i> Delete</button>
                            </form>
                          </td>
                        </tr>
                      <?php
                        }
                      }else{
                      ?>
                        <tr>
                          <td>No data</td>
                        <tr>
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


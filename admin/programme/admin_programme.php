<?php require '../include/css.php';?>

<head>
  <?php $page = "Programme"; ?>

  <title><?php echo $page; ?> | Dashboard</title>

  <link rel="icon" href="../../assets/logo/logo.png">

</head>

<?php require '../include/config.php';?>

<?php $programme = "active"; ?>

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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Programme</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Admin</li>
              <li class="breadcrumb-item active">Programme</li>
            </ol>
          </div>
        </div>
    </section>

    <!-- Main content -->
    <?php
				$count=0;
				$result=mysqli_query($con,"SELECT * FROM `programme`");
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
                <h3 class="card-title"><i class='fas fa-calendar-days'></i> Added Programme</h3>
                <div class="card-tools">
                    <span class="badge badge-danger"><?php echo $count ?> Programme(s)</span>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
				          <center>
                    <a href='add_programme.php'><button class='btn btn-outline-danger form-control' style="margin-bottom:1%;width:75px"><i class='fas fa-plus-circle'></i> Add</button></a>
                  </center>
                  <table id="example2" class="table m-0">	
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>PROGRAMME NAME</th>
                        <th>LAST UPDATED</th>
                        <th>DATE ADDED</th>
                        <th>POSTER</th>
                        <th>PROGRAMME DATE</th>
                        <th>VENUE</th>
                        <th>FEE PRICE</th>
                        <th>STATUS</th>
                        <th>Attendance</th>
                        <th style='text-align:center'>ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
				            $result=mysqli_query($con,"SELECT * FROM `programme` ORDER BY `Date Updated` DESC");
                    if ($result->num_rows > 0) {
                      $no = 0;
                      while($row = $result->fetch_assoc()) {
                        if($row["Status"]=="Open To COMSTAR"){
                          $status_badge = "dark";
                        }else if($row["Status"]=="Open To UTM"){
                          $status_badge = "danger";
                        }else{
                          $status_badge = "primary";
                        }
                        if($row["Attendance"]=="Hidden"){
                        $attendance_badge = "danger";
                        }else{
                        $attendance_badge = "success";
                        }
                        $no++;
                        $programme=$row["Name"];
                        $class = " ";
                        if(isset($_GET['name'])){
                          if($_GET['name']==$row["Name"]." ".$row["Date Updated"]){
                            $class = "class='blink_me'";
                          }else{
                            $class = " ";
                          }
                        }
                    ?>
                    <tr id="<?php echo $row["Name"]." ".$row["Date Updated"] ?>"<?php echo $class ?> >
                      <td><?php echo $no ?></td>
                      <td><?php echo $row["Name"] ?></td>
                      <td><span hidden><?php echo $row["Date Updated"] ?></span><?php echo get_time_ago(strtotime($row["Date Updated"])) ?></td>
                      <td><span hidden><?php echo $row["Date Created"] ?></span><?php echo date("j F Y",strtotime($row["Date Created"])) ?></td>

                      <td>
                        <img src='../../assets/programme/<?php echo $row["Image"] ?>'style='border: 1px solid #ddd;border-radius: 4px;padding: 5px;width: 150px;height:200px'>
                      </td>
                      <td><span hidden><?php echo $row["Date"] ?></span><?php echo date("l, j F Y",strtotime($row["Date"])) ?></td>
                      <td><?php echo $row["Venue"] ?></td>
                      <td>RM <?php echo $row["Fee Price"] ?></td>
                      <td><span class="badge badge-<?php echo $status_badge?>"><?php echo $row["Status"] ?></span></td>
                      <td><span class="badge badge-pill badge-<?php echo $attendance_badge?>"><?php echo $row["Attendance"] ?></span></td>
                      <td style='text-align:center'>
                        <a href='edit_programme.php?id=<?php echo $row["Programme ID"] ?>'>
                          <button class='btn btn-outline-danger form-control' style='width:70%;margin:1%'><i class='fas fa-pen'></i> Edit</button>
                        </a>
                        <a href='admin_attendance.php?id=<?php echo $row["Programme ID"] ?>'>
                          <button style='width:70%;margin:1%' class='btn btn-outline-danger'><i class='fas fa-clipboard'></i> Attendance</button>
                        </a>
                        <form id="visible" action='../Programme/visible_process.php' method='post'>
                          <input type='hidden' name='programme' value='<?php echo $programme ?>'>
                          <?php if($row['Attendance']=="Hidden"){ ?>
                            <button hidden id="visible_<?php echo $programme ?>" name='visibility' value='Visible'></button>
                            <button onclick="alert('Are you sure?','Do you want to enable attendance?','info','visible_<?php echo $programme ?>','visible')" type='button' class='btn btn-danger form-control' name='visibility' style='width:70%;margin:1%'><i class='fas fa-eye'></i> Show</button>
                          <?php }else{ ?>
                            <button hidden id="hidden_<?php echo $programme ?>" name='visibility' value='Hidden'></button>
                            <button onclick="alert('Are you sure?','Do you want to disable attendance?','info','hidden_<?php echo $programme ?>','visible')" type='button' class='btn btn-danger form-control' name='visibility' style='width:70%;margin:1%'><i class='fas fa-eye-slash'></i> Hide</button>
                          <?php } ?>
                        </form>
                        <form id="delete" action='../Programme/delete_programme_process.php' class='form-horizontal' method='post'>
                          <input type='hidden' class='form-control' required name='id' value='<?php echo $row["Programme ID"] ?>'>
                          <button hidden id="delete_<?php echo $row["Programme ID"] ?>"></button>
                          <button onclick="alert('Are you sure?','Do you want to delete this programme?','warning','delete_<?php echo $row['Programme ID'] ?>','delete')" type='button' class='btn btn-danger form-control' style='width:70%;margin:1%'><i class='fas fa-trash'></i> Delete</button>
                        </form>
                      </td>
                    </tr>
                      <?php } ?>
                    <?php }else{ ?>
                    <tr>
                      <td>No data</td>
                      <td>No data</td>
                      <td>No data</td>
                      <td>No data</td>
                      <td>No data</td>
                      <td>No data</td>
                      <td>No data</td>
                    </tr>
                    <?php } ?>
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


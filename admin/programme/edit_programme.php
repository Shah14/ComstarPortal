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
            <h1>Programme</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Admin</li>
              <li class="breadcrumb-item active"><a href="admin_programme.php">Programme</a></li>
              <li class="breadcrumb-item active">Edit Programme</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row" >
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#update" data-toggle="tab"><i class='fas fa-edit'></i> Edit Programme</a></li>
				          <li class="nav-item"><a class="nav-link" href="#image" data-toggle="tab"><i class='fas fa-file-image'></i> Edit Programme Image</a></li>
                </ul>
              </div>
              <?php
              $con = new mysqli("localhost","root","","comstar_portal");
              $result=mysqli_query($con,"SELECT * FROM `programme` WHERE `Programme ID`='$_GET[id]'");
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                  $id=$row["Programme ID"];	
                  $name=$row["Name"];
                  $date=$row["Date"];
                  $venue=$row["Venue"];
                  $fee=$row["Fee Price"];
                  $status=$row["Status"];
                  $image=$row["Image"];
                  if($status == "Open To Public"){
                    $select1 = "selected";
                    $select2 = "";
                    $select3 = "";
                    $select4 = "";
                  }elseif($status == "Open To UTM"){
                    $select1 = "";
                    $select2 = "selected";
                    $select3 = "";
                    $select4 = "";
                  }else if($status == "Open To COMSTAR"){
                    $select1 = "";
                    $select2 = "";
                    $select3 = "selected";
                    $select4 = "";
                  }else{
                    $select1 = "";
                    $select2 = "";
                    $select3 = "";
                    $select4 = "selected";
                  }
                }
              }
              ?>
              <div class="card-body">
                <div class="tab-content">
                  <div class="text-center">
                    <img src='../../assets/programme/<?php echo $image;?>' id="changeImage" style='border: 1px solid #ddd;border-radius: 4px;padding: 5px;width: 300px;height:400px'>
                  </div>
                  <br>
				          <div class=" active tab-pane" id="update">
                    <form id="edit_programme" action="../Programme/edit_programme_process.php" class="form-horizontal" method="post">
                      <input type='hidden' id='fileToUpload_edit' value='fileToUpload' name='fileToUpload'>
					            <input type="hidden" class="form-control" required name="id" value="<?php echo $id;?>">
					            <div class="form-group row">
                        <label for="name_edit" class="col-sm-2 col-form-label">Name</label>
                        <div class='col-sm-10 input-group'>
														<div class="input-group-prepend">
													  	<span class="input-group-text"><i class="fas fa-calendar-plus"></i></span>
														</div>
                          <input type="text" class="form-control" id="name_edit" required name="name" value="<?php echo $name;?>" oninvalid="this.setCustomValidity('Please Enter the Programme Name')" oninput="this.setCustomValidity('')">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="date_edit" class="col-sm-2 col-form-label">Date</label>
                        <div class='col-sm-10 input-group'>
														<div class="input-group-prepend">
													  	<span class="input-group-text"><i class="fas fa-calendar"></i></span>
														</div>
                          <input type="date" class="form-control" id="date_edit" required name="date" value="<?php echo $date;?>" oninvalid="this.setCustomValidity('Please Enter the Programme Date')" oninput="this.setCustomValidity('')">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="venue_edit" class="col-sm-2 col-form-label">Venue</label>
                        <div class='col-sm-10 input-group'>
														<div class="input-group-prepend">
													  	<span class="input-group-text"><i class="fas fa-building"></i></span>
														</div>
                          <input type="text" class="form-control" id="venue_edit" required name="venue" value="<?php echo $venue;?>" oninvalid="this.setCustomValidity('Please Enter the Programme Venue')" oninput="this.setCustomValidity('')">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="fee_edit" class="col-sm-2 col-form-label">Fee Price (RM)</label>
                        <div class='col-sm-10 input-group'>
														<div class="input-group-prepend">
													  	<span class="input-group-text"><i class="fa-solid fa-sack-dollar"></i></span>
														</div>
                          <input type="number" class="form-control" id="fee_edit" required name="fee" step='any' value="<?php echo $fee;?>" oninvalid="this.setCustomValidity('Please Enter the Programme Fee')" oninput="this.setCustomValidity('')">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="status_edit" class="col-sm-2 col-form-label">Status</label>
                        <div class='col-sm-10 input-group'>
														<div class="input-group-prepend">
													  	<span class="input-group-text"><i class="fas fa-check-circle"></i></span>
														</div>
                          <select class="form-control" id="status_edit" name="status" oninvalid="this.setCustomValidity('Please Enter the Programme Status')" oninput="this.setCustomValidity('')">
                            <option <?php echo $select1 ?> value="Open To Public">Open To Public</option>
                            <option <?php echo $select2 ?> value="Open To UTM">Open To UTM</option>
                            <option <?php echo $select3 ?> value="Open To COMSTAR">Open To COMSTAR</option>
                            <option <?php echo $select4 ?> value="Closed">Closed</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button hidden id="edit">Test</button>
                          <button onclick="validateForm('Are you sure?','Do you want to update this programme?','info','edit','edit_programme')" type='button' class='btn btn-danger'><i class='fas fa-pen'></i> Edit</button>
                          <button type='reset' class='btn btn-danger'><i class='fas fa-rotate-left'></i> Reset</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane" id="image">
                    	
                    <div class='alert alert-warning' role='alert'>
                      <div class="text-center">
                        <i class='fa fa-exclamation-circle'></i>Important! Please select image with dimension of 600x700! 
                        <a href="https://www.iloveimg.com/resize-image" target="blank" >Resize image here!</a>
                      </div>
                    </div>
                    <form id="edit_image" action="../Programme/edit_image_process.php" class="form-horizontal" method="post" enctype='multipart/form-data'>
                      <input type="hidden" class="form-control" required name="id" value="<?php echo $id;?>">	
                      <input type="hidden" id ="name_edit_pic"class="form-control" required name="name" value="<?php echo $name;?>">	
                      <input type='hidden' id='venue_edit_pic' value='venue' name='venue'>
                      <input type='hidden' id='date_edit_pic' value='date' name='date'>
                      <input type='hidden' id='fee_edit_pic' value='fee' name='fee'>
                      <input type='hidden' id='status_edit_pic' value='status' name='status'>
                      <div class='form-group row'>
												<label for='fileToUpload_edit_pic' class='col-sm-2 col-form-label'>Select Image To Upload</label>
												<div class="col-sm-10 input-group">
													<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-file-image"></i></span>
													</div>
                          <div class='custom-file'>
                            <input type='file' class="custom-file-input" id='fileToUpload_edit_pic' required name='fileToUpload' oninvalid="this.setCustomValidity('Please Insert an Image File')" oninput="this.setCustomValidity('')">
                            <label class="custom-file-label" for="fileToUpload_edit_pic">Choose file</label>
                          </div>
												</div>
											</div>	  
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button hidden id="edit_pic">Test</button>
                          <button onclick="validateForm('Are you sure?','Do you want to update this programme?','info','edit_pic','edit_image')" type='button' class='btn btn-danger'><i class='fas fa-pen'></i> Edit</button>
                          <button type='reset' onclick="test()" class='btn btn-danger'><i class='fas fa-rotate-left'></i> Reset</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card-footer clearfix"></div>
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

<script>

  function validateForm(title,text,icon,action,form) { //alert title, alert text, alert icon, action id and form id
    let u = document.forms[form]["name_"+action].value;
    let v = document.forms[form]["date_"+action].value;
    let w = document.forms[form]["venue_"+action].value;
    let x = document.forms[form]["fee_"+action].value;
    let y = document.forms[form]["status_"+action].value;
    let z = document.forms[form]["fileToUpload_"+action].value;
    console.log(u,v,w,x,y,z)
    if (u == "" || v == "" ||w == "" || x == "" || y == "" || z == "") {
      document.getElementById(action).click();
    }else{
      alert(title,text,icon,action)
    }
  }

  fileToUpload_edit_pic.onchange = evt => {
  const [file] =fileToUpload_edit_pic.files
    if (file) {
      changeImage.src = URL.createObjectURL(file)
    }
  }

  function test(){
    document.getElementById("changeImage").src = "../../assets/programme/<?php echo $image;?>";
  }
</script>

<?php require '../include/script.php';?>
</html>


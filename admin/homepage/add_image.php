<?php require '../include/css.php';?>

<head>
  <?php $page = "Edit Homepage"; ?>

  <title><?php echo $page; ?> | Dashboard</title>

  <link rel="icon" href="../../assets/logo/logo.png">

</head>

<?php require '../include/config.php';?>

<?php $edit = "active"; ?>

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
            <h1 class="m-0">Add Picture</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Admin</li>
              <li class="breadcrumb-item active"><a href="edit_homepage.php">Edit Homepage</a></li>
              <li class="breadcrumb-item active">Add Image</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
			 <div class="col-md-12">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#update" data-toggle="tab"><i class='fa fa-file-image'></i> Add Picture Details</a></li>
              </ul>
            </div>
            <div class="card-body p-0">
              <ul class="users-list clearfix">
								<center>
                  <div class='col-lg-3 col-md-6 d-flex align-items-stretch'>
                    <div class='member'>
                      <div class='member-img'>
                        <a><img src='../../assets/event/default.png' width='100%'></a>
                      </div>
                    </div>
                  </div>
								</center>	  
								<div class='card-body'>
									<div class='tab-content'>
									  <div class='active tab-pane' id='update'>
                      <form id="add_image" action='add_image_process.php'class='form-horizontal' method='post' enctype='multipart/form-data'>
                        <div class='form-group row'>
                          <label for='name_add' class='col-sm-2 col-form-label'>Name</label>
                          <div class='col-sm-10 input-group'>
														<div class="input-group-prepend">
														  <span class="input-group-text"><i class="fas fa-image"></i></span>
														</div>
                            <input type='text' class='form-control' id="name_add" required name='name' placeholder='Example : COMSTARIAN Day' oninvalid="this.setCustomValidity('Please Enter the Image Title')" oninput="this.setCustomValidity('')">
                          </div>
                        </div>
                        <div class='form-group row'>
                          <label for='year_add' class='col-sm-2 col-form-label'>Year</label>
                          <div class='col-sm-10 input-group'>
														<div class="input-group-prepend">
														  <span class="input-group-text"><i class="fas fa-calendar"></i></span>
														</div>
                            <input type='text' class='form-control' id="year_add" required name='year' placeholder='Example : 2022' oninvalid="this.setCustomValidity('Please Enter the Image Year')" oninput="this.setCustomValidity('')">
                          </div>
                        </div>
                        <div class='alert alert-warning' role='alert'>
                          <center>
                            <i class='fa fa-exclamation-circle'></i>Important! Please select image with dimension of 500x300! 
                            <a href='https://www.iloveimg.com/resize-image' target='blank' >Resize image here!</a>
                          </center>
                        </div>
                        <div class='form-group row'>
                          <label for='fileToUpload_add' class='col-sm-2 col-form-label'>Select Image To Upload</label>
                          <div class="col-sm-10 input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-file-image"></i></span>
                            </div>
                            <div class='custom-file'>
                              <input type='file' class="custom-file-input" id='fileToUpload_add' required name='fileToUpload' oninvalid="this.setCustomValidity('Please Enter an Image File')" oninput="this.setCustomValidity('')">
                              <label class="custom-file-label" for="fileToUpload">Choose file</label>
                            </div>
                          </div>
                        </div>
                        <div class='form-group row'>
                          <div class='offset-sm-2 col-sm-10'>
                            <button hidden id="add">Test</button>
                            <button onclick="validateForm('Are you sure?','Do you want to add this image?','info','add','add_image')" type='button' class='btn btn-danger'><i class='fas fa-plus-circle'></i> Add</button>
                        </div>
                      </form>
										</div>
              </ul>
              <div class="card-footer text-center"></div>
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

<script>

  function validateForm(title,text,icon,action,form) { //alert title, alert text, alert icon, action id and form id
    let x = document.forms[form]["name_"+action].value;
    let y = document.forms[form]["year_"+action].value;
    let z = document.forms[form]["fileToUpload_"+action].value;
    if (x == "" || y == "" || z == "") {
      document.getElementById(action).click();
    }else{
      alert(title,text,icon,action)
    }
  }

</script>

<?php require '../include/script.php';?>
</body>
</html>


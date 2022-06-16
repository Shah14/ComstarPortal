<?php require '../include/css.php';?>

<head>
  <?php $page = "Advertisement"; ?>

  <title><?php echo $page; ?> | Dashboard</title>

  <link rel="icon" href="../../assets/logo/logo.png">

</head>

<?php require '../include/config.php';?>

<?php $advertisement = "active"; ?>

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
            <h1>Advertisement</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Admin</a></li>
              <li class="breadcrumb-item active"><a href="advertisement.php">Advertisement</a></li>
              <li class="breadcrumb-item active">Add Advertisement</a></li>
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
                  <li class="nav-item"><a class="nav-link active" href="#update" data-toggle="tab"><i class='fas fa-plus-circle'></i> Add Advertisement</a></li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="add">
                    <form id="add_ads" action="../advertisement/add_ads_process.php" class="form-horizontal" method="post" enctype="multipart/form-data">
                      <div class="form-group row">
                        <label for="title_add_action" class="col-sm-2 col-form-label">Enter Advertisement Title</label>
                        <div class='col-sm-10 input-group'>
													<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-font"></i></span>
													</div>
                          <input type="text" class="form-control" id="title_add_action" required name="title" placeholder="COMSTAR Event" oninvalid="this.setCustomValidity('Please Enter the Advertisement Title')" oninput="this.setCustomValidity('')">
                        </div>
                      </div>
					            <div class="form-group row">
                        <label for="link_add_action" class="col-sm-2 col-form-label">Enter Advertisement Link</label>
                        <div class='col-sm-10 input-group'>
													<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-link"></i></span>
													</div>
                          <input type="text" class="form-control" id="link_add_action" required name="link" placeholder="www.comstarevent/portal.com" oninvalid="this.setCustomValidity('Please Provide a Page Link')" oninput="this.setCustomValidity('')">
                        </div>
                      </div>
                      <div class='alert alert-warning' role='alert'>
                        <center>
                          <i class='fa fa-exclamation-circle'></i>Important! Please select image with dimension of 1200x320! 
                          <a href='https://www.iloveimg.com/resize-image' target='blank' >Resize image here!</a>
                        </center>
                      </div>										  
                      <div class='form-group row'>
                        <label for='fileToUpload_add_action' class='col-sm-2 col-form-label'>Select Image To Upload</label>
                        <div class="col-sm-10 input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-image"></i></span>
                          </div>
                          <div class='custom-file'>
                            <input type='file' class="custom-file-input" id='fileToUpload_add_action' required name='fileToUpload' oninvalid="this.setCustomValidity('Please Insert an Image File')" oninput="this.setCustomValidity('')">
                            <label class="custom-file-label" for="fileToUpload_add_action">Choose file</label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button hidden id="add_action">Test</button>
                          <button onclick="validateForm('Are you sure?','Do you want to add this programme?','info','add_action','add_ads')" type='button' class='btn btn-danger'><i class='fas fa-plus-circle'></i> Add</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
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
    let x = document.forms[form]["title_"+action].value;
    let y = document.forms[form]["link_"+action].value;
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


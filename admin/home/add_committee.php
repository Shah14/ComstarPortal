<?php require '../include/css.php';?>

<head>
  <?php $page = "Home"; ?>

  <title><?php echo $page; ?> | Dashboard</title>

  <link rel="icon" href="../../assets/logo/logo.png">

</head>

<?php require '../include/config.php';?>

<?php $home = "active"; ?>

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
            <h1 class="m-0">Add Committee</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Admin</li>
              <li class="breadcrumb-item active"><a href="admin.php">Home</a></li>
              <li class="breadcrumb-item active">Add Committee</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
			 <div class="col-md-12">
          <!-- USERS LIST -->
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#update" data-toggle="tab"><i class='fas fa-id-card'></i> Add Committee</a></li>
              </ul>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <ul class="users-list clearfix">
								    <center>
								<div class='col-lg-3 col-md-6 d-flex align-items-stretch'>
									<div class='member'>
									  <div class='member-img'>
											<a>
                        <img src='../../COMSTAR Committee/MT BARU/default1.png' id="changeProfile" width='160px'class='img-circle elevation-2' alt='User Image'>
                      </a>
									  </div>
							  	  </center>	  
                    <div class='card-body'>
                      <div class='tab-content'>
                        <div class='active tab-pane' id='update'>
                          <form id="add_committee" action='add_committee_process.php' class='form-horizontal' method='post' enctype='multipart/form-data'>
                            <div class='row'>
                              <label for='name_add' class='col-sm-2 col-form-label'>Name</label>
                              <div class='col-sm-10 input-group form-group '>
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                </div>
                                <input type='text' class='form-control' id="name_add" required name='name' placeholder='Example : Muhammad Ali' oninvalid="this.setCustomValidity('Please Enter the Committee Name')" oninput="this.setCustomValidity('')">
                              </div>
                            </div>
                            <div class='row'>
                              <label for='role_add' class='col-sm-2 col-form-label'>Role</label>
                              <div class='col-sm-10 input-group form-group '>
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                </div>
                                <select class='form-control a' required name='role' id='role_add' oninvalid="this.setCustomValidity('Please Select the Committee Role')" oninput="this.setCustomValidity('')">
																	<option disabled selected value="">Select One</option>
																	<option value='01Club Advisor'> Club Advisor</option>
																	<option value='02President'> President</option>
																	<option value='03Vice President(Management)'> Vice President(Management)</option>
																	<option value='04Vice President (External Relation Affairs)'> Vice President (External Relation Affairs)</option>
																	<option value='05Secretary'> Secretary</option>
																	<option value='06Vice Secretary'> Vice Secretary</option>
																	<option value='07Treasurer'> Treasurer</option>
																	<option value='08Vice Treasurer'> Vice Treasurer</option>
																	<option value='09Exco Academic'> Exco Academic</option>
																	<option value='10Exco Multimedia 1'> Exco Multimedia 1</option>
																	<option value='11Exco Multimedia 2'> Exco Multimedia 2</option>
																	<option value='12Exco Publicity'> Exco Publicity</option>
																	<option value='13Exco Sports & Activity'> Exco Sports & Activity</option>
																	<option value='14Exco Welfare & Spiritual'> Exco Welfare & Spiritual</option>
																	<option value='15Exco Protocol'> Exco Protocol</option>
																	<option value='16Exco Website Manager 1'> Exco Website Manager 1</option>
																	<option value='17Exco Website Manager 2'> Exco Website Manager 2</option>
																</select>
                              </div>
                            </div>	
                            
                            <div class='row'>
															<label for='session' class='col-sm-2 col-form-label'>Session <small class="text-primary"></small></label>
															<div class='col-sm-10 input-group form-group '>
																<div class="input-group-prepend">
																	<span class="input-group-text"><i class="fas fa-calendar"></i></span>
																</div>
																<select class='form-control a' required name='session' id='session_add' oninvalid="this.setCustomValidity('Please Select the Session')" oninput="this.setCustomValidity('')">
																	<option disabled selected value="">Select One</option>
																	<?php 
																	for ($x = 0; $x <= 10; $x++){
																		$session1 = date("Y")-$x ;
																		$session1 .= "/".date("Y")-$x+1 ;
																	?>
																		<option value='<?php echo $session1 ?>'> <?php echo $session1 ?></option>
																	<?php 
																	}
																	?>
																</select>
															</div>
														</div>
                            <div class='alert alert-warning' role='alert'>
                              <center>
                                <i class='fa fa-exclamation-circle'></i>Important! Please select image with dimension of 500x500! 
                                <a href='https://www.iloveimg.com/resize-image' target='blank' >Resize image here!</a>
                              </center>
                            </div>			
                            <div class='row'>
															<label for='fileToUpload_add' class='col-sm-2 col-form-label'>Select Image To Upload</label>
                              <div class="col-sm-10 input-group form-group ">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-file-image"></i></span>
                                </div>
															  <div class='custom-file'>
																  <input type='file' class="custom-file-input" id='fileToUpload_add' required name='fileToUpload' oninvalid="this.setCustomValidity('Please Insert an Image File')" oninput="this.setCustomValidity('')">
																  <label class="custom-file-label" for="fileToUpload">Choose file</label>
															  </div>
                              </div>
														</div>
                            <div class='form-group row'>
                              <div class='offset-sm-2 col-sm-10'>
                                <button hidden id="add">Test</button>
                                <button onclick="validateForm('Are you sure?','Do you want to add this committee?','info','add','add_committee')" type='button' class='btn btn-danger'><i class='fas fa-plus-circle'></i> Add</button>
                                <button type='reset' onclick="resetPic()" class='btn btn-danger'><i class='fas fa-rotate-left'></i> Reset</button>
                              </div>
                            </div>   
                          </form>
                        </div>
                      </div>
                    </div>  
                </div>    
              </ul>
              <div class="card-footer text-center"></div>
            </div>
          </div>
        </div>
    </section>
    <!-- /.content -->
	
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

<?php require '../include/footer.php';?>

<script>

  function validateForm(title,text,icon,action,form) { //alert title, alert text, alert icon, action id and form id
    let w = document.forms[form]["name_"+action].value;
    let x = document.forms[form]["role_"+action].value;
    let y = document.forms[form]["session_"+action].value;
    let z = document.forms[form]["fileToUpload_"+action].value;
    if (w == "" || x == "" || y == "" || z == "") {
      document.getElementById(action).click();
    }else{
      alert(title,text,icon,action)
    }
  }

  fileToUpload_add.onchange = evt => {
  const [file] =fileToUpload_add.files
    if (file) {
      changeProfile.src = URL.createObjectURL(file)
    }
  }

  function resetPic(){
    document.getElementById("changeProfile").src = "../../COMSTAR Committee/MT BARU/default1.png";
  }

</script>
<?php require '../include/script.php';?>

<script>
    $(function () {
    $('#add_committee').validate({
      rules: {
        name: {
          required: true,
        },
        role: {
          required: true,
        },
        session: {
          required: true,
        },
        fileToUpload: {
          required: true,
        },
      },
      messages: {
        name: {
          required: "Please enter the committee name",
        },
        role: {
          required: "Please select the committee role",
        },
        session: {
          required: "Please select the committee session",
        },
        fileToUpload: {
          required: "Please select an image file",
        },
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
</script>

</body>
</html>


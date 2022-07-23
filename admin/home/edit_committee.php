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
            <h1 class="m-0">Edit Committee</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Admin</li>
              <li class="breadcrumb-item active"><a href="admin.php">Home</a></li>
              <li class="breadcrumb-item active">Edit Committee</li>
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
							<li class="nav-item"><a class="nav-link active" href="#update" data-toggle="tab"><i class='fas fa-id-card'></i> Update Profile Details</a></li>
							<li class="nav-item"><a class="nav-link" href="#image" data-toggle="tab"><i class='fas fa-user-circle'></i> Update Profile Picture</a></li>
							<li class="nav-item"><a class="nav-link" href="#delete" data-toggle="tab"><i class='fas fa-trash'></i> Delete Committee</a></li>
						</ul>
              		</div>
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
						<?php
							$con = new mysqli("localhost","root","","comstar_portal");
							$result=mysqli_query($con,"SELECT * FROM `committee` WHERE ID='$_GET[id]'");
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
								$id=$row["ID"];
								$name=$row["Name"];
								$role=$row["Role"];
								$session=$row["Session"];
								$image=$row["Picture"];
									if($id==1){
										$hide="hidden";
										$show="";
									}else{
										$hide="";
										$show="hidden";
									}
						?>
										<center>
								<div class='col-lg-3 col-md-6 d-flex align-items-stretch'>
									<div class='member'>
									  	<div class='member-img'>
											<a>
												<img src='../../COMSTAR Committee/MT BARU/<?php echo $row["Picture"] ?>' id="changeProfile" width='160px'class='img-circle elevation-2' alt='User Image'>
											</a>
									  	</div>
										<div class='member-info' >
											<a class='users-list-name'><?php echo $row["Name"] ?></a>
											<span class='users-list-date'><?php echo $row["Role"] ?></span>
										</div>
										</center>	  
										<div class='card-body'>
											<div class='tab-content'>
												<div class='active tab-pane' id='update'>
													<form id="edit_committee" action='edit_committee_process.php' class='form-horizontal' method='post'>
														<div class='row'>
															<input type='hidden' id='id_edit' value=<?php echo $id ?> name='id'>
															<input type='hidden' id='fileToUpload_edit' value='fileToUpload' name='fileToUpload'>
															<label for='name_edit' class='col-sm-2 col-form-label'>Name</label>
															<div class='col-sm-10 input-group form-group'>
																<div class="input-group-prepend">
																	<span class="input-group-text"><i class="fas fa-user-circle"></i></span>
																</div>
																<input type='text' class='form-control' id="name_edit" required name='name' value='<?php echo $row["Name"] ?>' oninvalid="this.setCustomValidity('Please Enter the Committee Name')" oninput="this.setCustomValidity('')"/>
															</div>
														</div>
														<div class='row'>
															<label for='role_edit' class='col-sm-2 col-form-label'>Role</label>
															<div class='col-sm-10 input-group form-group'>
																<div class="input-group-prepend">
																	<span class="input-group-text"><i class="fas fa-briefcase"></i></span>
																</div>
																<select class='form-control a' required name='role' id='role_edit' oninvalid="this.setCustomValidity('Please Select the Committee Role')" oninput="this.setCustomValidity('')">
																	<option disabled value="">Select One</option>
																	<option <?php if($row["Role"]=="Club Advisor") {echo "selected";} ?> value='01Club Advisor'> Club Advisor</option>
																	<option <?php if($row["Role"]=="President") {echo "selected";} ?> value='02President'> President</option>
																	<option <?php if($row["Role"]=="Vice President (Management)") {echo "selected";} ?> value='03Vice President (Management)'> Vice President (Management)</option>
																	<option <?php if($row["Role"]=="Vice President (External Relation Affairs)") {echo "selected";} ?> value='04Vice President (External Relation Affairs)'> Vice President (External Relation Affairs)</option>
																	<option <?php if($row["Role"]=="Secretary") {echo "selected";} ?> value='05Secretary'> Secretary</option>
																	<option <?php if($row["Role"]=="Vice Secretary") {echo "selected";} ?> value='06Vice Secretary'> Vice Secretary</option>
																	<option <?php if($row["Role"]=="Treasurer") {echo "selected";} ?> value='07Treasurer'> Treasurer</option>
																	<option <?php if($row["Role"]=="Vice Treasurer") {echo "selected";} ?> value='08Vice Treasurer'> Vice Treasurer</option>
																	<option <?php if($row["Role"]=="Exco Academic") {echo "selected";} ?> value='09Exco Academic'> Exco Academic</option>
																	<option <?php if($row["Role"]=="Exco Multimedia 1") {echo "selected";} ?> value='10Exco Multimedia 1'> Exco Multimedia 1</option>
																	<option <?php if($row["Role"]=="Exco Multimedia 2") {echo "selected";} ?> value='11Exco Multimedia 2'> Exco Multimedia 2</option>
																	<option <?php if($row["Role"]=="Exco Publicity") {echo "selected";} ?> value='12Exco Publicity'> Exco Publicity</option>
																	<option <?php if($row["Role"]=="Exco Sports & Activity") {echo "selected";} ?> value='13Exco Sports & Activity'> Exco Sports & Activity</option>
																	<option <?php if($row["Role"]=="Exco Welfare & Spiritual") {echo "selected";} ?> value='14Exco Welfare & Spiritual'> Exco Welfare & Spiritual</option>
																	<option <?php if($row["Role"]=="Exco Protocol") {echo "selected";} ?> value='15Exco Protocol'> Exco Protocol</option>
																	<option <?php if($row["Role"]=="Exco Website Manager 1") {echo "selected";} ?> value='16Exco Website Manager 1'> Exco Website Manager 1</option>
																	<option <?php if($row["Role"]=="Exco Website Manager 2") {echo "selected";} ?> value='17Exco Website Manager 2'> Exco Website Manager 2</option>
																</select>
															</div>
														</div>
														<div class='row'>
															<label for='session' class='col-sm-2 col-form-label'>Session <small class="text-primary"></small></label>
															<div class='col-sm-10 input-group form-group'>
																<div class="input-group-prepend">
																	<span class="input-group-text"><i class="fas fa-calendar"></i></span>
																</div>
																<select class='form-control a' required name='session' id='session_edit'>
																	<option disabled <?php if($row["Session"] == NULL){echo "selected";}?> value="">Select One</option>
																	<?php 
																	for ($x = 0; $x <= 10; $x++){
																		$session1 = date("Y")-$x ;
																		$session1 .= "/".date("Y")-$x+1 ;
																	?>
																		<option <?php if($row["Session"] == $session1){echo "selected";}?> value='<?php echo $session1 ?>'> <?php echo $session1 ?></option>
																	<?php 
																	}
																	?>
																</select>
															</div>
														</div>
														<div class='row'>
															<label for='social1' class='col-sm-2 col-form-label'>Social Media 1 <small class="text-primary">[Optional]</small></label>
															<div class='col-sm-10 input-group form-group'>
																<div class="input-group-prepend">
																	<span class="input-group-text"><i class="fas fa-paper-plane"></i></span>
																</div>
																<select class='form-control a' name='social1' id='social1'>
																	<option <?php if($row["Social 1"]=="facebook"){echo "selected";}?> value='facebook'> Facebook</option>
																	<option <?php if($row["Social 1"]=="instagram"){echo "selected";}?> value='instagram'>Instagram</option>
																	<option <?php if($row["Social 1"]=="linkedin"){echo "selected";}?> value='linkedin'>Linkedin</option>
																	<option <?php if($row["Social 1"]=="reddit"){echo "selected";}?> value='reddit'>Reddit</option>
																	<option <?php if($row["Social 1"]=="telegram"){echo "selected";}?> value='telegram'>Telegram</option>
																	<option <?php if($row["Social 1"]=="twitter"){echo "selected";}?> value='twitter'>Twitter</option>
																	<option <?php if($row["Social 1"]=="youtube"){echo "selected";}?> value='youtube'>Youtube</option>
																	<option <?php if($row["Social 1"]=="none" or $row["Social 1"]==NULL){echo "selected";}?> value='none'>None</option>
																</select>
															</div>
														</div>
														<div class='row'>
															<label for='link1' class='col-sm-2 col-form-label'>Social Media Link 1 <small class="text-primary">[Optional]</small></label>
															<div class='col-sm-10 input-group form-group'>
																<div class="input-group-prepend">
																	<span class="input-group-text"><i class="fas fa-link"></i></span>
																</div>
																<input type='text' class='form-control' name='link1' id="link1" value=<?php echo $row["Link 1"] ?>>
															</div>
														</div>
														<div class='row'>
															<label for='social2' class='col-sm-2 col-form-label'>Social Media 2 <small class="text-primary">[Optional]</small></label>
															<div class='col-sm-10 input-group form-group'>
																<div class="input-group-prepend">
																	<span class="input-group-text"><i class="fas fa-paper-plane"></i></span>
																</div>
																<select class='form-control a' name='social2' id='social2'>
																	<option <?php if($row["Social 2"]=="facebook"){echo "selected";}?> value='facebook'>Facebook</option>
																	<option <?php if($row["Social 2"]=="instagram"){echo "selected";}?> value='instagram'>Instagram</option>
																	<option <?php if($row["Social 2"]=="linkedin"){echo "selected";}?> value='linkedin'>LinkedIn</option>
																	<option <?php if($row["Social 2"]=="reddit"){echo "selected";}?> value='reddit'>Reddit</option>
																	<option <?php if($row["Social 2"]=="telegram"){echo "selected";}?> value='telegram'>Telegram</option>
																	<option <?php if($row["Social 2"]=="twitter"){echo "selected";}?> value='twitter'>Twitter</option>
																	<option <?php if($row["Social 2"]=="youtube"){echo "selected";}?> value='youtube'>Youtube</option>
																	<option <?php if($row["Social 2"]=="none" or $row["Social 2"]==NULL){echo "selected";}?> value='none'>None</option>
																</select>
															</div>
														</div>
														<div class='row'>
															<label for='link2' class='col-sm-2 col-form-label'>Social Media Link 2 <small class="text-primary">[Optional]</small></label>
															<div class='col-sm-10 input-group form-group'>
																<div class="input-group-prepend">
																	<span class="input-group-text"><i class="fas fa-link"></i></span>
																</div>
																<input type='text' class='form-control' name='link2' id="link2" value=<?php echo $row["Link 2"] ?>>
															</div>
														</div>
														<div class='row'>
															<label for='social3' class='col-sm-2 col-form-label'>Social Media 3 <small class="text-primary">[Optional]</small></label>
															<div class='col-sm-10 input-group form-group'>
																<div class="input-group-prepend">
																	<span class="input-group-text"><i class="fas fa-paper-plane"></i></span>
																</div>
																<select class='form-control a' name='social3' id='social3'>
																	<option <?php if($row["Social 3"]=="facebook"){echo "selected";}?> value='facebook'>Facebook</option>
																	<option <?php if($row["Social 3"]=="instagram"){echo "selected";}?> value='instagram'>Instagram</option>
																	<option <?php if($row["Social 3"]=="linkedin"){echo "selected";}?> value='linkedin'>LinkedIn</option>
																	<option <?php if($row["Social 3"]=="reddit"){echo "selected";}?> value='reddit'>Reddit</option>
																	<option <?php if($row["Social 3"]=="telegram"){echo "selected";}?> value='telegram'>Telegram</option>
																	<option <?php if($row["Social 3"]=="twitter"){echo "selected";}?> value='twitter'>Twitter</option>
																	<option <?php if($row["Social 3"]=="youtube"){echo "selected";}?> value='youtube'>Youtube</option>
																	<option <?php if($row["Social 3"]=="none" or $row["Social 3"]==NULL){echo "selected";}?> value='none'>None</option>
																</select>
															</div>
														</div>
														<div class='row'>
															<label for='link3' class='col-sm-2 col-form-label'>Social Media Link 3 <small class="text-primary">[Optional]</small></label>
															<div class='col-sm-10 input-group form-group'>
																<div class="input-group-prepend">
																	<span class="input-group-text"><i class="fas fa-link"></i></span>
																</div>
																<input type='text' class='form-control' name='link3' id="link3" value=<?php echo $row["Link 3"] ?>>
															</div>
														</div>
														<div class='row'>
															<label for='social4' class='col-sm-2 col-form-label'>Social Media 4 <small class="text-primary">[Optional]</small></label>
															<div class='col-sm-10 input-group form-group'>
																<div class="input-group-prepend">
																	<span class="input-group-text"><i class="fas fa-paper-plane"></i></span>
																</div>
																<select class='form-control a' name='social4' id='social4'>
																	<option <?php if($row["Social 4"]=="facebook"){echo "selected";}?> value='facebook'>Facebook</option>
																	<option <?php if($row["Social 4"]=="instagram"){echo "selected";}?> value='instagram'>Instagram</option>
																	<option <?php if($row["Social 4"]=="linkedin"){echo "selected";}?> value='linkedin'>LinkedIn</option>
																	<option <?php if($row["Social 4"]=="reddit"){echo "selected";}?> value='reddit'>Reddit</option>
																	<option <?php if($row["Social 4"]=="telegram"){echo "selected";}?> value='telegram'>Telegram</option>
																	<option <?php if($row["Social 4"]=="twitter"){echo "selected";}?> value='twitter'>Twitter</option>
																	<option <?php if($row["Social 4"]=="youtube"){echo "selected";}?> value='youtube'>Youtube</option>
																	<option <?php if($row["Social 4"]=="none" or $row["Social 4"]==NULL){echo "selected";}?> value='none'>None</option>
																</select>
															</div>
														</div>
														<div class='row'>
															<label for='link4' class='col-sm-2 col-form-label'>Social Media Link 4 <small class="text-primary">[Optional]</small></label>
															<div class='col-sm-10 input-group form-group'>
																<div class="input-group-prepend">
																	<span class="input-group-text"><i class="fas fa-link"></i></span>
																</div>
																<input type='text' class='form-control' name='link4' id="link4" value=<?php echo $row["Link 4"] ?>>
															</div>
														</div>
														<div class='row'>
															<div class='offset-sm-2 col-sm-10'>
																<button hidden id="edit">Test</button>
                                								<button onclick="validateForm('Are you sure?','Do you want to save changes?','info','edit','edit_committee')" type='button' class='btn btn-danger'><i class='fas fa-pen'></i> Edit</button>
																<button type='reset' class='btn btn-danger'><i class='fas fa-rotate-left'></i> Reset</button>
															</div>
														</div>
													</form>
												</div>
												<!-- /.tab-pane -->
										
												<div class='tab-pane' id='image'>
													<div class='alert alert-warning' role='alert'>
														<center>
															<i class='fa fa-exclamation-circle'></i>Important! Please select image with dimension of 500x500! 
															<a href='https://www.iloveimg.com/resize-image' target='blank' >Resize image here!</a>
														</center>
													</div>
													<form id="edit_pic" action='edit_pic_process.php'class='form-horizontal' method='post' enctype='multipart/form-data'>
														<div class='row'>
															<input type='hidden' id='name_edit_image' value='<?php echo $name ?>' name='name'>
															<input type='hidden' id='role_edit_image' value='<?php echo $role ?>' name='role'>
															<input type='hidden' id='session_edit_image' value='<?php echo $session ?>' name='session'>
															<input type='hidden' id='id_edit_image' value=<?php echo $id ?> name='id'>
															<label for='fileToUpload_edit_image' class='col-sm-2 col-form-label'>Select Image To Upload</label>
															<div class="col-sm-10 input-group form-group">
																<div class="input-group-prepend">
																	<span class="input-group-text"><i class="fas fa-file-image"></i></span>
																</div>
																<div class='custom-file'>
																	<input type='file' class="custom-file-input" id='fileToUpload_edit_image' required name='fileToUpload' oninvalid="this.setCustomValidity('Please Insert an Image File')" oninput="this.setCustomValidity('')">
																	<label class="custom-file-label" for="fileToUpload_edit_image">Choose file</label>
																</div>
															</div>
														</div>
														<div class='row'>
															<div class='offset-sm-2 col-sm-10'>
																<button hidden id="edit_image">Test</button>
																<button onclick="validateForm('Are you sure?','Do you want to save changes?','info','edit_image','edit_pic')" type='button' class='btn btn-danger'><i class='fas fa-pen'></i> Edit</button>
																<button type='reset' onclick="resetPic()" class='btn btn-danger'><i class='fas fa-rotate-left'></i> Reset</button>
															</div>
														</div>
													</form>
												</div>
												<!-- /.tab-pane -->

												<div class='tab-pane' id='delete'>
													<div class='alert alert-warning' role='alert' <?php echo $show ?>>
														<center>
															<i class='fa fa-exclamation-circle'></i>You cannot delete this committee!
														</center>
													</div>
													<form id="delete_committee" action='delete_committee_process.php' class='form-horizontal' method='post' <?php echo $hide ?>>
														<input type='hidden' id='id_delete_action' value=<?php echo $id ?> name='id'>											
														<div class='row'>
															<div class='offset-sm-2 col-sm-10'>
																<button hidden id="delete_action">Test</button>
                                								<button onclick="alert('Are you sure?','Do you want to delete this committee?','warning','delete_action','delete_committee')" type='button' class='btn btn-danger'><i class='fas fa-trash'></i> Delete</button>
															</div>
														</div>
													</form>
												</div>
												<!-- /.tab-pane -->
											</div>
										</div>
									</div>
									<div class="card-footer text-center"></div>
								</div>
						<?php
								}
							}
						?>                   
					</ul>
                </div>
              </div>
			</div>
      	</div>
    </section>
 </div>
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

  fileToUpload_edit_image.onchange = evt => {
  const [file] =fileToUpload_edit_image.files
    if (file) {
      changeProfile.src = URL.createObjectURL(file)
    }
  }

  function resetPic(){
    document.getElementById("changeProfile").src = "../../COMSTAR Committee/MT BARU/<?php echo $image ?>";
  }

</script>

<?php require '../include/script.php';?>

<script>
$(function () {
    $('#edit_committee').validate({
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
	
	$('#edit_pic').validate({
      rules: {
        fileToUpload: {
          required: true,
        },
      },
      messages: {
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


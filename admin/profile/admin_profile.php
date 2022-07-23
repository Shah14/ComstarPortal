<?php require '../include/css.php';?>

<head>
  <?php $page = "Profile"; ?>

  <title><?php echo $page; ?> | Dashboard</title>

  <link rel="icon" href="../../assets/logo/logo.png">

</head>

<?php require '../include/config.php';?>

<?php
if(isset($_GET["id"])){
  $tab = 'onload = changeTab("'.$_GET["id"].'")';
}else{
  $tab = "";
}
?>

<?php $profile = "active"; ?>

<body <?php echo $tab ?> class="hold-transition sidebar-mini">

<div class="wrapper">
  
<?php require '../include/header.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Admin</li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row" >
          <div class="col-md-3">

            <!-- Profile Image -->
            <?php 
              $con = new mysqli("localhost","root","","comstar_portal");
              $result=mysqli_query($con,"SELECT * FROM `admin` WHERE Email='$q'");
              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                $name=$row["Name"];
                $image=$row["Image"];
                $uni=$row["Education"];
                $location=$row["Location"];
                $skill=$row["Skills"];
                $quote=$row["Quote"];
                $phone=$row["Phone"];     
                $register=$row["Date Registered"];  
                $verify=$row["Date Verified"];                  
                  }
                }
            ?>
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
					        <img class="profile-user-img img-fluid img-circle" alt="User profile picture" src="../../assets/profile picture/<?php echo $image ?>" >
                </div>

		            <h3 class="profile-username text-center"><?php echo $name ?></h3>
                <p class="text-muted text-center">Administrator</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b><i class="fas fa-user-circle mr-1"></i> Name</b> <a class="float-right"><?php echo $name ?></a>
                  </li>
                  <li class="list-group-item">
                    <b><i class="fas fa-envelope mr-1"></i> E-mail</b> <a class="float-right"><?php echo $q ?></a>
                  </li>
                  <li class="list-group-item">
                    <b><i class="fas fa-phone mr-1"></i> Phone Number</b> <a class="float-right"><?php echo $phone ?></a>
                  </li>
                  <li class="list-group-item">
                    <b><i class="fas fa-calendar-plus mr-1"></i> Date Registered</b> <a class="float-right"><?php echo date("j F Y",strtotime($register)) ?></a>
                  </li>
                  <li class="list-group-item">
                    <b><i class="fas fa-calendar-check mr-1"></i> Date Verified</b> <a class="float-right"><?php echo date("j F Y",strtotime($verify)) ?></a>
                  </li>
                </ul>

                <a href="../../ACCOUNT/LOGIN/logout.php" class="btn btn-outline-primary btn-block"><b><i class='fas fa-arrow-circle-left'></i> Log Out</b></a>
              </div>
            </div>
			

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class='fas fa-id-card'></i> About Me</h3>
              </div>

              <div class="card-body">
                <strong><i class="fas fa-graduation-cap mr-1"></i> Education</strong>
                <p class="text-muted"><?php echo $uni;?></p>
                <hr>

                <strong><i class="fas fa-map mr-1"></i> Location</strong>
                <p class="text-muted"><?php echo $location;?></p>
                <hr>

                <strong><i class="fas fa-trophy mr-1"></i> Skills</strong>
                <p class="text-muted"><?php echo $skill;?></p>
                <hr>

                <strong><i class="fas fa-quote-right mr-1"></i> Quote</strong>
                <p class="text-muted"><?php echo $quote;?></p>
              </div>
            </div>
          </div>

          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills" id="myTab">
                  <li class="nav-item"><a class="nav-link active" href="#update" data-toggle="tab"><i class='fas fa-id-card'></i> Update Profile Details</a></li>
				          <li class="nav-item"><a class="nav-link" href="#image" data-toggle="tab"><i class='fas fa-user-circle'></i> Update Profile Picture</a></li>
                  <li class="nav-item"><a class="nav-link" href="#change" data-toggle="tab"><i class='fas fa-key'></i> Change Password</a></li>
                </ul>
              </div>

              <!-- tab-pane -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="update">
                    <form id="edit_details" action="../Profile/edit_profile_process.php" class="form-horizontal" method="post">
                      <input type='hidden' id='password_edit' value='password' name='password'>	
                      <input type='hidden' id='confirm_edit' value='confirm' name='confirm'>	
                      <input type='hidden' id='fileToUpload_edit' value='fileToUpload' name='fileToUpload'>	
                      <div class="row">
                        <label for="name_edit" class="col-sm-2 col-form-label">Name</label>
                        <div class='col-sm-10 input-group form-group'>
													<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-user-circle"></i></span>
													</div>
                          <input type="text" class="form-control" id="name_edit" required name="name" value="<?php echo $name; ?>"placeholder="Example : John Bin Doe" oninvalid="this.setCustomValidity('Please Enter Your Name')" oninput="this.setCustomValidity('')">
                        </div>
                      </div>

					            <div class="row">
                        <label for="phone" class="col-sm-2 col-form-label">Phone Number <small class="text-primary">[Optional]</small></label>
                        <div class='col-sm-10 input-group form-group'>
													<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-phone"></i></span>
													</div>
                          <input type="number" class="form-control" id="phone" name="phone" maxlength="10" value="<?php echo $phone; ?>"placeholder="Example : 01234567890">
                        </div>
                      </div>

                      <div class="row">
                        <label for="education" class="col-sm-2 col-form-label">Education <small class="text-primary">[Optional]</small></label>
                        <div class='col-sm-10 input-group form-group'>
													<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
													</div>
                          <input type="text" class="form-control" id="education" name="education" value="<?php echo $uni; ?>" placeholder="Example : Universiti Malaya">
                        </div>
                      </div>

                      <div class="row">
                        <label for="location" class="col-sm-2 col-form-label">Location <small class="text-primary">[Optional]</small></label>
                        <div class='col-sm-10 input-group form-group'>
													<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-map"></i></span>
													</div>
                          <input type="text" class="form-control" id="location" name="location" value="<?php echo $location; ?>"placeholder="Example : Petaling Jaya, Selangor">
                        </div>
                      </div>

                      <div class="row">
                        <label for="skill" class="col-sm-2 col-form-label">Skills <small class="text-primary">[Optional]</small></label>
                        <div class='col-sm-10 input-group form-group'>
													<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-trophy"></i></span>
													</div>
                          <input type="text" class="form-control" id="skill" name="skills"value="<?php echo $skill; ?>" placeholder="Example : Cooking">
                        </div>
                      </div>

                      <div class="row">
                        <label for="quote" class="col-sm-2 col-form-label">Quote <small class="text-primary">[Optional]</small></label>
                        <div class='col-sm-10 input-group form-group'>
													<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-quote-right"></i></span>
													</div>
                          <input type="text" class="form-control" id="quote" name="quote"value="<?php echo $quote; ?>" placeholder="Example : I love UTM">
                        </div>
                      </div>

                      <div class="row">
                        <div class="offset-sm-2 col-sm-10">
                          <button hidden id="edit" type="submit">Test</button>
                          <button onclick="validateForm('Are you sure?','Do you want to save changes?','info','edit','edit_details')" type='button' class='btn btn-danger'><i class='fas fa-pen'></i> Edit</button>
                          <button type='reset' class='btn btn-danger'><i class='fas fa-rotate-left'></i> Reset</button>

                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
				  
                  <div class="tab-pane" id="image">
                  <div class="text-center">
					          <img class="profile-user-img img-fluid img-circle" id="changeProfile" alt="User profile picture" src="../../assets/profile picture/<?php echo $image ?>" >
                  </div>
                    <div class='alert alert-warning' role='alert'>
                      <center><i class='fa fa-exclamation-circle'></i>Important! Please select image with dimension of 500x500! <a href='https://www.iloveimg.com/resize-image' target='blank' >Resize image here!</a></center>
                    </div>

                    <form id="edit_image" action="../Profile/edit_image_process.php"class="form-horizontal" method="post" enctype="multipart/form-data">
                      <input type='hidden' id='name_edit_pic' value='name' name='name'>	
                      <input type='hidden' id='password_edit_pic' value='password' name='password'>	
                      <input type='hidden' id='confirm_edit_pic' value='confirm' name='confirm'>	
                      <div class='row'>
												<label for='fileToUpload_edit_pic' class='col-sm-2 col-form-label'>Select Image To Upload</label>
												<div class="col-sm-10 input-group form-group">
													<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-file-image"></i></span>
													</div>
                          <div class='custom-file'>
                            <input type='file' class="custom-file-input" id='fileToUpload_edit_pic' required name='fileToUpload' oninvalid="this.setCustomValidity('Please Insert an Image File')" oninput="this.setCustomValidity('')">
                            <label class="custom-file-label" for="fileToUpload_edit_pic">Choose file</label>
                          </div>
												</div>
											</div>

                      <div class="row">
                        <div class="offset-sm-2 col-sm-10">
                          <button hidden id="edit_pic">Test</button>
                          <button onclick="validateForm('Are you sure?','Do you want to save changes?','info','edit_pic','edit_image')" type='button' class='btn btn-danger'><i class='fas fa-pen'></i> Edit</button>
                          <button type='reset' onclick="test()" class='btn btn-danger'><i class='fas fa-rotate-left'></i> Reset</button>
                        </div>
                      </div>
                    </form>
                  </div>
				  
				          <div class="tab-pane" id="change">
                    <form id="edit_password" action="../Profile/edit_password_process.php"class="form-horizontal" method="post">
                      <input type='hidden' id='name_change_password' value='name' name='name'>	
                      <input type='hidden' id='fileToUpload_change_password' value='fileToUpload' name='fileToUpload'>	
                      <div class="row">
                        <label for="password_change_password" class="col-sm-2 col-form-label">New Password</label>
                        <div class='col-sm-10 input-group form-group'>
													<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-key"></i></span>
													</div>
                          <input type="password" id="password_change_password" class="form-control" required name="password"  placeholder="Example : 12345678" minlength="8" maxlength="15" oninvalid="this.setCustomValidity('Please Enter Your Password')" oninput="this.setCustomValidity('')">
                        </div>
                      </div>

                      <div class="row">
                        <label for="confirm_change_password" class="col-sm-2 col-form-label">Confirm New Password</label>
                        <div class='col-sm-10 input-group form-group'>
													<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-key"></i></span>
													</div>
                          <input type="password" id="confirm_change_password" class="form-control" required name="confirm" placeholder="Example : 12345678" minlength="8" maxlength="15" oninvalid="this.setCustomValidity('Please Re-enter Your Password')" oninput="this.setCustomValidity('')">
                        </div>
                      </div>
                      <div class="row">
                      <label for="confirm_change_password" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10 input-group form-group">
                          <div class="icheck-primary">
                            <input onchange="visiblePassword('password_change_password');visiblePassword('confirm_change_password')" type="checkbox" id="remember">
                            <label for="remember">
                              Show Password
                            </label>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="offset-sm-2 col-sm-10">
                          <button hidden id="change_password">Test</button>
                          <button onclick="validateForm('Are you sure?','Do you want to save changes?','info','change_password','edit_password')" type='button' class='btn btn-danger'><i class='fas fa-pen'></i> Edit</button>
                          <button type='reset' class='btn btn-danger'><i class='fas fa-rotate-left'></i> Reset</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
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
    let w = document.forms[form]["name_"+action].value;
    let x = document.forms[form]["password_"+action].value;
    let y = document.forms[form]["confirm_"+action].value;
    let z = document.forms[form]["fileToUpload_"+action].value;
    if (w == "" ||x == "" || y == "" || z == "") {
      document.getElementById(action).click();
    }else{
      alert(title,text,icon,action,form)
    }
  }

 fileToUpload_edit_pic.onchange = evt => {
  const [file] =fileToUpload_edit_pic.files
    if (file) {
      changeProfile.src = URL.createObjectURL(file)
    }
  }

  function test(){
    document.getElementById("changeProfile").src = "../../assets/profile picture/<?php echo $image ?>";
  }
</script>

<?php require '../include/script.php';?>

<script>

function visiblePassword(id) {
  var x = document.getElementById(id);
  var y = document.getElementById("remember").checked;
  console.log(y)
  if (y === true) {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

$(function () {
    $('#edit_details').validate({
      rules: {
        name: {
          required: true,
        },
      },
      messages: {
        name: {
          required: "Please enter your name",
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
	
	$('#edit_image').validate({
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

    $('#edit_password').validate({
      rules: {
        password: {
          required: true,
          minlength: 8
        },
        confirm: {
        required: true,
        minlength: 8,
        equalTo:"#password_change_password",
      },
      },
      messages: {
        password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 8 characters long"
        },
        confirm: {
          required: "Please retype the password",
          minlength: "Your password must be at least 8 characters long",
          equalTo: "Your password must be matched"
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
</html>


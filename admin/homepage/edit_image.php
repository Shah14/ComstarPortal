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
            <h1 class="m-0">Edit Picture</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Admin</li>
              <li class="breadcrumb-item active"><a href="edit_homepage.php">Edit Homepage</a></li>
              <li class="breadcrumb-item active">Edit Image</li>
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
							<li class="nav-item"><a class="nav-link active" href="#update" data-toggle="tab"><i class='fa fa-edit'></i> Update Picture Details</a></li>
							<li class="nav-item"><a class="nav-link" href="#image" data-toggle="tab"><i class='fa fa-file-image'></i> Update Picture</a></li>
							<li class="nav-item"><a class="nav-link" href="#delete" data-toggle="tab"><i class='fa fa-trash'></i> Delete Picture</a></li>
						</ul>
              		</div>
                  	<div class="card-body p-0">
                    	<ul class="users-list clearfix">
							<?php
							$result=mysqli_query($con,"SELECT * FROM `homepage` WHERE ID='$_GET[id]'");
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
								$id = $row["ID"];
								$about = $row["About"];
								$year = $row["Year"];
								$image = $row["Image"];
								$date = $row["Date Updated"];
								}
							}
							?>   
								<center>
								<div class='col-lg-3 col-md-6 d-flex align-items-stretch'>
									<div class='member'>
										<div class='member-img'>
											<a><img src='../../assets/event/<?php echo $image ?>' width='100%'></a>
										</div>
								  	<div class='member-info' >
										<center>
											<a class='users-list-name'><?php echo $about ?></a>
											<span class='users-list-date'><?php echo $year ?></span>
										</center>
								  	</div>
								</div>
								</center>	  
								<div class='card-body'>
									<div class='tab-content'>
									  	<div class='active tab-pane' id='update'>
											<form id="edit_image" action='edit_image_process.php' class='form-horizontal' method='post'>
												<div class='form-group row'>
													<input type='hidden' id='id' value='<?php echo $id ?>' name='id'>
													<input type='hidden' id='fileToUpload_edit' value='fileToUpload' name='fileToUpload'>
													<label for='name_edit' class='col-sm-2 col-form-label'>Name</label>
													<div class='col-sm-10 input-group'>
														<div class="input-group-prepend">
														  <span class="input-group-text"><i class="fas fa-image"></i></span>
														</div>
													<input type='text' class='form-control' id="name_edit" required name='about' value='<?php echo $about ?>' oninvalid="this.setCustomValidity('Please Enter the Image Name')" oninput="this.setCustomValidity('')">
													</div>
												</div>
												<div class='form-group row'>
													<label for='year_edit' class='col-sm-2 col-form-label'>Year</label>
													<div class='col-sm-10 input-group'>
														<div class="input-group-prepend">
														  <span class="input-group-text"><i class="fas fa-calendar"></i></span>
														</div>
													<input type='text' class='form-control' id="year_edit" required name='year' value='<?php echo $year ?>' oninvalid="this.setCustomValidity('Please Enter the Image Year')" oninput="this.setCustomValidity('')">
													</div>
												</div>
												<div class='form-group row'>
													<div class='offset-sm-2 col-sm-10'>
														<button hidden id="edit">Test</button>
														<button onclick="validateForm('Are you sure?','Do you want to update this image?','info','edit','edit_image')" type='button' class='btn btn-danger'><i class='fas fa-pen'></i> Edit</button>										  
													</div>
												</div>
											</form>										 
										</div>
								  
								  		<div class='tab-pane' id='image'>
								  			<div class='alert alert-warning' role='alert'>
												<center>
													<i class='fa fa-exclamation-circle'></i>Important! Please select image with dimension of 500x300! 
													<a href='https://www.iloveimg.com/resize-image' target='blank' >Resize image here!</a>
												</center>
											</div>
											<form id="edit_image2" action='edit_image2_process.php'class='form-horizontal' method='post' enctype='multipart/form-data'>
												<input type='hidden' id='id' value='<?php echo $id ?>' name='id'>
												<input type='hidden' id='name_edit2' value='name' name='name'>
												<input type='hidden' id='year_edit2' value='year' name='year'>
												<div class='form-group row'>
													<label for='fileToUpload_edit2' class='col-sm-2 col-form-label'>Select Image To Upload</label>
													<div class="col-sm-10 input-group">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-file-image"></i></span>
														</div>
														<div class='custom-file'>
															<input type='file' class="custom-file-input" id='fileToUpload_edit2' required name='fileToUpload' oninvalid="this.setCustomValidity('Please Insert an Image File')" oninput="this.setCustomValidity('')">
															<label class="custom-file-label" for="fileToUpload_edit2">Choose file</label>
														</div>
													</div>
												</div>
												<div class='form-group row'>
													<div class='offset-sm-2 col-sm-10'>
														<button hidden id="edit2">Test</button>
                          								<button onclick="validateForm('Are you sure?','Do you want to update this image?','info','edit2','edit_image2')" type='button' class='btn btn-danger'><i class='fas fa-pen'></i> Edit</button>										  
													</div>
												</div>										  
											</form>
								  		</div>
								  
										<div class='tab-pane' id='delete'>
											<form id="delete" action='delete_image_process.php' class='form-horizontal' method='post'>
												<input type='hidden' id='id' value='<?php echo $id ?>' name='id'>											
												<div class='form-group row'>
													<div class='offset-sm-2 col-sm-10'>
														<button hidden id="delete_action"></button>
                          								<button onclick="alert('Are you sure?','Do you want to delete this image?','warning','delete_action','delete')" type='button' class='btn btn-danger'><i class='fas fa-trash'></i> Delete</button>
													</div>
												</div>
											</form>
										</div>
									</div>    
								</div>   
							</div>         
                    	</ul>
                  		<div class="card-footer text-center">
						  Last Updated : <span style="color:#007bff"><?php echo get_time_ago(strtotime($date)) ?></span>
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


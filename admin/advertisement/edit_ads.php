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
            <h1>Edit Advertisement</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Admin</li>
              <li class="breadcrumb-item active"><a href="advertisement.php">Advertisement</a></li>
              <li class="breadcrumb-item active">Edit Advertisement</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      	<div class="container-fluid">
        	<div class="row" >
		  		<div class="col-md-12">
            		<div class="card">
              			<div class="card-header p-2">
							<ul class="nav nav-pills">
								<li class="nav-item"><a class="nav-link active" href="#update" data-toggle="tab"><i class='fas fa-edit'></i> Update Advertisement Details</a></li>
								<li class="nav-item"><a class="nav-link" href="#image" data-toggle="tab"><i class='fas fa-file-image'></i> Update Advertisement Banner</a></li>
							</ul>
              			</div>
						<div class="card-body">			  
							<div class="tab-content">
								<?php
								$result=mysqli_query($con,"SELECT * FROM `advertisement` WHERE ID='$_GET[id]'");
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										$id=$row["ID"];
										$title=$row["Title"];
										$image=$row["Banner"];

								?>
								<div class='card-body'>
									<div class='tab-content'>
										<div class="text-center">
											<img src='../../assets/advertisement/<?php echo $row["Banner"] ?>' id="changeImage" style='border: 1px solid #ddd;border-radius: 4px;padding: 5px;width:500px;height:200px'>
										</div>
										<br>
										<div class='active tab-pane' id='update'>
											<form id="edit_ads" action='../advertisement/edit_ads_process.php' method='post'>
												<div class='form-group row'>
													<input type='hidden' class='form-control'name='id' value='<?php echo $row["ID"] ?>'>
													<input type='hidden' id='fileToUpload_edit' value='fileToUpload' name='fileToUpload'>
													<label for='title_edit' class='col-sm-2 col-form-label'>Enter Advertisement Title</label>
													<div class='col-sm-10 input-group'>
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-font"></i></span>
														</div>
														<input type='text' class='form-control' id="title_edit" required name='title' value='<?php echo $row["Title"] ?>' oninvalid="this.setCustomValidity('Please Enter the Advertisement Title')" oninput="this.setCustomValidity('')">
													</div>
												</div>
												<div class='form-group row'>
													<label for='link_edit' class='col-sm-2 col-form-label'>Enter Advertisement Link</label>
													<div class='col-sm-10 input-group'>
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-link"></i></span>
														</div>
														<input type='text' class='form-control' id="link_edit" required name='link' value='<?php echo $row["Link"] ?>' oninvalid="this.setCustomValidity('Please Provide a Page Link')" oninput="this.setCustomValidity('')"><br>
													</div>
												</div>
												<div class='form-group row'>
													<div class='offset-sm-2 col-sm-10'>
														<button hidden id="edit">Test</button>
                          								<button onclick="validateForm('Are you sure?','Do you want to update this advertisement?','info','edit','edit_ads')" type='button' class='btn btn-danger'><i class='fas fa-pen'></i> Edit</button>
														<button type='reset' class='btn btn-danger'><i class='fas fa-rotate-left'></i> Reset</button>
													</div>
												</div>
											</form>
										</div>
										<div class='tab-pane' id='image'>
											<div class='alert alert-warning' role='alert'>
												<center>
													<i class='fa fa-exclamation-circle'></i>Important! Please select image with dimension of 1200x400! 
													<a href='https://www.iloveimg.com/resize-image' target='blank' >Resize image here!</a>
												</center>
											</div>
											<form id="edit_banner" action='edit_banner_process.php'class='form-horizontal' method='post' enctype='multipart/form-data'>
												<input type='hidden' id='id' value=<?php echo $id ?> name='id'>
												<input type='hidden' id='title_edit2' value='<?php echo $title ?>' name='title'>
												<input type='hidden' id='link_edit2' value='link' name='link'>
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
                          								<button onclick="validateForm('Are you sure?','Do you want to update this advertisement?','info','edit2','edit_banner')" type='button' class='btn btn-danger'><i class='fas fa-pen'></i> Edit</button>
														<button type='reset' onclick="test()" class='btn btn-danger'><i class='fas fa-rotate-left'></i> Reset</button>
													</div>
												</div>
											</form>
										</div>
												
										<div class='tab-pane' id='delete'>
											<form action='delete_ads_process.php' class='form-horizontal' method='post'>
												<input type='hidden' id='id' value='<?php echo $id ?>' name='id'>											
												<div class='form-group row'>
													<div class='offset-sm-2 col-sm-10'>
														<button type='submit' class='btn btn-danger'><i class='fas fa-trash'></i> Delete</button>
													</div>
												</div>
											</form>
										</div>
								<?php
									}
								}
								?>         
									</div>
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

  fileToUpload_edit2.onchange = evt => {
  const [file] =fileToUpload_edit2.files
    if (file) {
      changeImage.src = URL.createObjectURL(file)
    }
  }

  function test(){
    document.getElementById("changeImage").src = "../../assets/advertisement/<?php echo $image ?>";
  }
</script>

<?php require '../include/script.php';?>
</html>


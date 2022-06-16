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
            <h1 class="m-0">Edit Video</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Admin</li>
              <li class="breadcrumb-item active"><a href="edit_homepage.php">Edit Homepage</a></li>
              <li class="breadcrumb-item active">Edit Video</li>
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
                  		<li class="nav-item"><a class="nav-link active" href="#update" data-toggle="tab"><i class='fas fa-file-video'></i> Update Video Details</a></li>
				        <li class="nav-item"><a class="nav-link" href="#delete" data-toggle="tab"><i class='fas fa-trash'></i> Delete Video</a></li>
                	</ul>
              		</div>
                  	<div class="card-body p-0">
                    	<ul class="users-list clearfix">
							<?php
							$result=mysqli_query($con,"SELECT * FROM `homepage` WHERE ID='$_GET[id]'");
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
								$id=$row["ID"];
								$image=$row["Image"];
								$about=$row["About"];
								$year=$row["Year"];
								$date=$row["Date Updated"];
								}
							}
							?>
								<center>
									<div class='col-lg-3 col-md-6 d-flex align-items-stretch'>
										<div class='member'>
											<div class='member-img'>
												<iframe width='350' height='200' src='https://www.youtube.com/embed/<?php echo $image ?>' data-gallery='portfolioGallery' class='portfolio-lightbox preview-link'><i class='bx bx-plus'></i></iframe>
											</div>
											<div class='member-info' >
												<center>
													<a class='users-list-name'><?php echo $about ?></a>
													<span class='users-list-date'><?php echo $year ?></span>
												</center>
											</div>
										</div>
									</div>
								</center>	  
								<div class='card-body'>
									<div class='tab-content'>
										<div class='active tab-pane' id='update'>
											<form id="edit_video" action='edit_video_process.php' class='form-horizontal' method='post'>
												<div class='form-group row'>
													<input type='hidden' id='id' value='<?php echo $id ?>' name='id'>
													<label for='name_edit' class='col-sm-2 col-form-label'>Name</label>
													<div class='col-sm-10 input-group'>
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-video"></i></span>
														</div>
													<input type='text' class='form-control' id="name_edit" required name='about' value='<?php echo $about ?>' oninvalid="this.setCustomValidity('Please Enter the Video Name')" oninput="this.setCustomValidity('')">
													</div>
												</div>
												<div class='form-group row'>
													<label for='year_edit' class='col-sm-2 col-form-label'>Year</label>
													<div class='col-sm-10 input-group'>
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-calendar"></i></span>
														</div>
													<input type='text' class='form-control' id="year_edit" required name='year' value='<?php echo $year ?>' oninvalid="this.setCustomValidity('Please Enter the Video Year')" oninput="this.setCustomValidity('')">
													</div>
												</div>
												<div class='form-group row'>
													<label for='video_edit' class='col-sm-2 col-form-label'>Video ID</label>
													<div class='col-sm-10 input-group'>
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-link"></i></span>
														</div>
													<input type='text' class='form-control' id="video_edit" required name='image' value='<?php echo $image ?>' oninvalid="this.setCustomValidity('Please Enter the Youtube Video ID')" oninput="this.setCustomValidity('')">
													</div>
												</div>
												<div class='form-group row'>
													<div class='offset-sm-2 col-sm-10'>
													<button hidden id="edit">Test</button>
                          							<button onclick="validateForm('Are you sure?','Do you want to update this video?','info','edit','edit_video')" type='button' class='btn btn-danger'><i class='fas fa-pen'></i> Edit</button>										  									  
													</div>
												</div>
											</form>										 
										</div>
								  
										<div class='tab-pane' id='delete'>
											<form id="delete" action='delete_video_process.php' class='form-horizontal' method='post'>
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
    let z = document.forms[form]["video_"+action].value;
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


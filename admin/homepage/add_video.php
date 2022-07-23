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
            <h1 class="m-0">Add Video</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Admin</li>
              <li class="breadcrumb-item active"><a href="edit_homepage.php">Edit Homepage</a></li>
              <li class="breadcrumb-item active">Add Video</li>
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
                <li class="nav-item"><a class="nav-link active" href="#update" data-toggle="tab"><i class='fas fa-file-video'></i>  Add Video Details</a></li>
              </ul>
            </div>
            <div class="card-body p-0">
              <ul class="users-list clearfix">
								<center>
                  <div class='col-lg-3 col-md-6 d-flex align-items-stretch'>
                    <div class='member'>
                      <div class='member-img'>
                        <a>
                          <iframe width='350' height='200' id="changeImage" src='https://www.youtube.com/embed/' data-gallery='portfolioGallery' class='portfolio-lightbox preview-link'><i class='bx bx-plus'></i></iframe>
                        </a>
                      </div>
                    </div>
                  </div>
								</center>	  
								<div class='card-body'>
									<div class='tab-content'>
									  <div class='active tab-pane' id='update'>
                      <form id="add_video" action='add_video_process.php'class='form-horizontal' method='post' enctype='multipart/form-data'>
                        <div class='row'>
                          <label for='name_add' class='col-sm-2 col-form-label'>Name</label>
                          <div class='col-sm-10 input-group form-group'>
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-video"></i></span>
														</div>
                            <input type='text' class='form-control' id="name_add" required name='name' placeholder='Example : COMSTARIAN Day' oninvalid="this.setCustomValidity('Please Enter the Video Name')" oninput="this.setCustomValidity('')">
                          </div>
                        </div>
                        <div class='row'>
                          <label for='year_add' class='col-sm-2 col-form-label'>Year</label>
                          <div class='col-sm-10 input-group form-group'>
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-calendar"></i></span>
														</div>
                            <input type='number' min="2000" max="2100" step="1" class='form-control' id="year_add" required name='year' placeholder='Example : 2022' oninvalid="this.setCustomValidity('Please Enter the Video Year')" oninput="this.setCustomValidity('')">
                          </div>
                        </div>
                        <div class='row'>
                          <label for='video_add' class='col-sm-2 col-form-label'>Video ID</label>
                          <div class='col-sm-10 input-group form-group'>
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-link"></i></span>
														</div>
                            <input type='text' onchange="changeThumbnail()" class='form-control' id="video_add" required name='video' placeholder='Example : dQw4w9WgXcQ' oninvalid="this.setCustomValidity('Please Enter the Youtube Video ID')" oninput="this.setCustomValidity('')">
                          </div>
                        </div>
                        <div class='row'>
                          <div class='offset-sm-2 col-sm-10'>
                            <button hidden id="add">Test</button>
                            <button onclick="validateForm('Are you sure?','Do you want to add this programme?','info','add','add_video')" type='button' class='btn btn-danger'><i class='fas fa-plus-circle'></i> Add</button>
                            <button type='reset' onclick="test()" class='btn btn-danger'><i class='fas fa-rotate-left'></i> Reset</button>
                          </div>
                        </div>
                      </form>
										</div> 
                  </div>  
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
    let z = document.forms[form]["video_"+action].value;
    if (x == "" || y == "" || z == "") {
      document.getElementById(action).click();
    }else{
      alert(title,text,icon,action)
    }
  }

  function changeThumbnail(){
    document.getElementById("changeImage").src = 'https://www.youtube.com/embed/'+document.getElementById("video_add").value
  }

  function test(){
    document.getElementById("changeImage").src = "https://www.youtube.com/embed/";
  }
</script>

<?php require '../include/script.php';?>

<script>
    $(function () {
    $('#add_video').validate({
      rules: {
        name: {
          required: true,
        },
        year: {
          required: true,
        },
        video: {
          required: true,
        },
      },
      messages: {
        name: {
          required: "Please enter the video name",
        },
        year: {
          required: "Please enter the image year",
        },
        video: {
          required: "Please enter the video ID",
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


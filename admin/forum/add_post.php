<?php require '../include/css.php';?>

<head>
  <?php $page = "Forum"; ?>

  <title><?php echo $page; ?> | Dashboard</title>

  <link rel="icon" href="../../assets/logo/logo.png">

</head>

<?php require '../include/config.php';?>

<?php $forum = "active"; ?>

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
            <h1>Forum</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Admin</li>
              <li class="breadcrumb-item active"><a href="admin_forum.php">Forum</a></li>
              <li class="breadcrumb-item active">Add Post</li>
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
                  <li class="nav-item"><a class="nav-link active" href="#add" data-toggle="tab"><i class='fas fa-comments'></i> Add Post</a></li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="add">
                    <form id="add_post" action="../Forum/add_post_process.php" class="form-horizontal" method="post" enctype='multipart/form-data'>
                      <div class="form-group row">
                        <label for="title_add_action" class="col-sm-2 col-form-label">Enter Post Title</label>
                        <div class='col-sm-10 input-group'>
													<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-font"></i></span>
													</div>
                          <input type="text" class="form-control" id="title_add_action" required name="title" placeholder="COMSTAR Event" oninvalid="this.setCustomValidity('Please Enter the Post Title')" oninput="this.setCustomValidity('')">
                        </div>
                      </div>
					            <div class="form-group row">
                        <label for="about_add_action" class="col-sm-2 col-form-label">Enter Post Description</label>
                        <div class='col-sm-10 input-group'>
													<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-keyboard"></i></span>
													</div>
                          <textarea class="form-control" id="about_add_action" required name="about" rows="10" cols="50" placeholder="COMSTAR Event Description" oninvalid="this.setCustomValidity('Please Enter the Post Description')" oninput="this.setCustomValidity('')"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button hidden id="add_action">Test</button>
                          <button onclick="validateForm('Are you sure?','Do you want to add this post?','info','add_action','add_post')" type='button' class='btn btn-danger'><i class='fas fa-plus-circle'></i> Add</button>
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
    let y = document.forms[form]["about_"+action].value;
    if (x == "" || y == "" ) {
      document.getElementById(action).click();
    }else{
      alert(title,text,icon,action)
    }
  }

</script>

<?php require '../include/script.php';?>
</html>


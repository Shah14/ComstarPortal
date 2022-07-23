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
              <li class="breadcrumb-item active">Edit Post</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
		
		<?php
				$con = new mysqli("localhost","root","","comstar_portal");
				$result=mysqli_query($con,"SELECT * FROM `forum` WHERE `Post ID`='$_GET[id]'");
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
						$id=$row["Post ID"];	
						$title=$row["Title"];
						$desc=$row["Description"];
						$image=$row["Image"];
						}
					}
		?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row" >
		      <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#add" data-toggle="tab"><i class='fas fa-comments'></i> Edit Post</a></li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="add">
                    <form id="edit_post" action='../Forum/edit_post_process.php' method='post'>
                      <div class="row">
                        <label for="title_edit" class="col-sm-2 col-form-label">Enter Post Title</label>
                        <div class='col-sm-10 input-group form-group'>
													<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-font"></i></span>
													</div>
                          <input type="text" class="form-control" id="title_edit" required name="title" value="<?php echo $title;?>"placeholder="COMSTAR Event" oninvalid="this.setCustomValidity('Please Enter the Post Title')" oninput="this.setCustomValidity('')">
                        </div>
                      </div>
					            <div class="row">
                        <label for="about_edit" class="col-sm-2 col-form-label">Enter Post Description</label>
                        <div class='col-sm-10 input-group form-group'>
													<div class="input-group-prepend">
														<span class="input-group-text"><i class="fas fa-keyboard"></i></span>
													</div>
                          <textarea class="form-control" id="about_edit" required name="about" rows="10" cols="50"placeholder="COMSTAR Event Description" oninvalid="this.setCustomValidity('Please Enter the Post Description')" oninput="this.setCustomValidity('')"><?php echo $desc;?></textarea>
                        </div>
                      </div>
                      <div class="row">
                        <div class="offset-sm-2 col-sm-10">
                          <button hidden value="<?php echo $id?>" name="id" id="edit">Test</button>
                          <button onclick="validateForm('Are you sure?','Do you want to update this programme?','info','edit','edit_post')" type='button' class='btn btn-danger'><i class='fas fa-pen'></i> Edit</button>
                          <button type='reset' class='btn btn-danger'><i class='fas fa-rotate-left'></i> Reset</button>
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

<script>
  $(function () {
    $('#edit_post').validate({
      rules: {
        title: {
          required: true,
        },
        about: {
          required: true,
        },
      },
      messages: {
        title: {
          required: "Please enter the post title",
        },
        about: {
          required: "Please select the post description",
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


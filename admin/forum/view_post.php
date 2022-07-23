<?php require '../include/css.php';?>

<head>
  <?php $page = "Forum"; ?>

  <title><?php echo $page; ?> | Dashboard</title>

  <link rel="icon" href="../../assets/logo/logo.png">

</head>

<?php require '../include/config.php';?>

<?php $forum = "active"; ?>

<body class="hold-transition sidebar-mini">

	<?php
	if(isset($_GET["name"])){
	echo "
	<script>
		function flash(){
		setTimeout(function(){
			const queryString = window.location.search;
			const urlParams = new URLSearchParams(queryString);
			const name = urlParams.get('name')
			document.getElementById(name).classList.remove('blink_me');
			console.log(name)
		}, 5000)
		}
		flash();
	</script>";
	}
	?>

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
              <li class="breadcrumb-item active">View Post</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
	<?php
	$result=mysqli_query($con,"SELECT *, login.`Full Name` AS Username, login.Image AS User_image, admin.Name AS Admin_name, admin.Image AS Admin_image FROM `forum` 
							   LEFT JOIN login ON forum.Poster=login.Email  
							   LEFT JOIN admin ON forum.Poster=admin.Email 
							   WHERE `Post ID`='$_GET[id]' ORDER BY Date DESC"); //display post
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$title=$row["Title"];
				$email=$row["Poster"];
				$desc=$row["Description"];
				$date=$row["Date"];
				$id=$row["Post ID"];
				$type=$row["Poster Type"];
				$upvote=$row["Upvote"];
				$report=$row["Report"];
				$replies=$row["Replies"];
				if($type == "User"){
					$name = $row["Username"];
					$image = $row["User_image"];
					$badge = "success";
				}else{
					$name = $row["Admin_name"];
					$image = $row["Admin_image"];
					$badge = "danger";
				}
				$class = " ";
				if(isset($_GET['name'])){
				if($_GET['name']==$row["Title"]){
					$class = "class='blink_me'";
				}else{
					$class = " ";
				}
				}

				$report  = 0;
				$report1 = 0;
				$report2 = 0;
				$result1=mysqli_query($con,"SELECT * FROM `report` WHERE `Post ID`='$_GET[id]'"); //display number of reports
				if ($result1->num_rows > 0) {
					while($row1 = $result1->fetch_assoc()) {
						if($row1["Reason"]=='spam'){
							$report=$report+1;
						}else if($row1["Reason"]=='controversional'){
							$report1=$report1+1;
						}else{
							$report2=$report2+1;
						}
					}
				}
			}
		}
	?>
    <section class="content">
      	<div class="container-fluid">
        	<div class="row" >
          		<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title"><?php echo $title ?></h3>
						</div>
						<div class="card-body p-0">
							<table class="table table-sm">
								<thead>
									<tr>
										<th>Poster</th>
										<th>Description</th>
									</tr>
										<th>
											<span class="badge badge-primary"><i class='fas fa-thumbs-up'></i> <?php echo $upvote?> </span>
											<span class="badge badge-danger"><i class='fas fa-bullhorn'></i> <?php echo $report?> </span>
											<span class="badge badge-success"><i class='fas fa-comment-dots'></i> <?php echo $replies?> </span>
										</th>
										<th>
										<?php echo $report ?> user(s) reported this as <span class="badge badge-dark">spam</span> , 
										<?php echo $report1 ?> user(s) reported this as <span class="badge badge-warning">controversional</span>, 
										<?php echo $report2 ?></span> user(s) reported this as <span class="badge badge-danger">misinformational</span>.
										</th>
								</thead>
								<tbody>
									<tr id="<?php echo $title ?>" <?php echo $class ?>>
										<td style="width:200px">
											<div class="text-center">
												<img class="profile-user-img img-fluid img-circle" alt="User profile picture" src="../../assets/profile picture/<?php echo $image ?>" >
												<br><?php echo $name ?><br>
												<span class="badge badge-<?php echo $badge?>"><?php echo $type ?></span>
												<p class="text-muted"><?php echo date("j F Y h:i a",strtotime($date)) ?></p>
											</div>
										</td>
										<td>
											<p style="background-color: #eee;text-align:justify;padding:10px;width: 100%;height: 400px;border: 1px solid gray;overflow: auto;">
												<?php echo $desc ?>
											</p>
										</td>
									</tr>
									<?php
									$result=mysqli_query($con,"SELECT *, login.`Full Name` AS Username, login.Image AS User_image, admin.Name AS Admin_name, admin.Image AS Admin_image FROM `reply`
															LEFT JOIN login ON reply.Poster=login.Email  
															LEFT JOIN admin ON reply.Poster=admin.Email 
															WHERE `Post ID`='$_GET[id]'ORDER BY Date ASC"); //display replies
										if ($result->num_rows > 0) {
											$no = 0;
											while($row = $result->fetch_assoc()) {
												$date=$row["Date"];
												$email=$row["Poster"];
												$reply=$row["Reply"];
												$type=$row["Poster Type"];
												$no ++;
												if($type == "User"){
													$name = $row["Username"];
													$image = $row["User_image"];
													$badge = "success";
								
												}else{
													$name = $row["Admin_name"];
													$image = $row["Admin_image"];
													$badge = "danger";
												}
												$class = " ";
												if(isset($_GET['name'])){
													$replyid=$row["Reply"].$row["Reply Number"];
													if($_GET['name']==$replyid){
														$class = "class='blink_me'";
													}else{
														$class = " ";
													}
												}
									?>
										<th>Reply #<?php echo $no?></th>
										<th></th>
									<tr id="<?php echo $row["Reply"].$row["Reply Number"]; ?>" <?php echo $class ?>>
										<td style="width:200px">
											<div class="text-center">
												<img class="profile-user-img img-fluid img-circle" alt="User profile picture" src="../../assets/profile picture/<?php echo $image ?>" >
												<br><?php echo $name ?><br>
												<span class="badge badge-<?php echo $badge?>"><?php echo $type ?></span>
												<p class="text-muted"><?php echo date("j F Y h:i a",strtotime($date)) ?></p>
											</div>
										</td>
										<td>
											<p style="background-color: #eee;text-align:justify;padding:10px;width: 100%;height: 400px;border: 1px solid gray;overflow: auto;">
												<?php echo $reply ?>
											</p>
										</td>
									</tr>
									<?php
											}
										}
									?>
								
									<?php
									$result=mysqli_query($con,"SELECT * FROM `admin` WHERE `Email`='$q'");
										if ($result->num_rows > 0) {
											while($row = $result->fetch_assoc()) {
												$image=$row["Image"];
												$name=$row["Name"];
									?>
										<th>Reply</th>
										<th></th>
									<tr>
										<td style="width:200px">
											<center>
												<img src="../../assets/profile picture/<?php echo $image ?>" class="img-circle elevation-2" style="width:100px">
												<br>
												<?php echo $name ?>
												<br><span class="badge badge-danger">Admin</span>
											</center>
										</td>
										<td>
											<form id="reply_post" action="../Forum/reply_post_process.php" class="form-horizontal" method="post" >
												<div class="row">
													<div class='col-sm-10 input-group form-group '>
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-comment-dots"></i></span>
														</div>
														<textarea id="post_reply" class="form-control" required name="reply" rows="5" cols="60" placeholder="Enter your reply here" oninvalid="this.setCustomValidity('Please Enter the Reply')" oninput="this.setCustomValidity('')"></textarea>
													</div>
												</div>	
												<div class="form-group row">
													<div class="offset-sm-0 col-sm-12">
														<button hidden value="<?php echo $id ?>" name="id" id="reply">Test</button>
                          								<button onclick="validateForm('Are you sure?','Do you want to add this reply?','info','reply','reply_post')" type='button' class='btn btn-danger'><i class='fas fa-comment'></i> Reply</button>
													</div>
												</div>
											</form>
										</td>
									</tr>
									<?php
											}
										}
									?>
								</tbody>
							</table>
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
    let x = document.forms[form]["post_"+action].value;
    if (x == "") {
      document.getElementById(action).click();
    }else{
      alert(title,text,icon,action)
    }
  }

</script>

<?php require '../include/script.php';?>

<script>
  $(function () {
    $('#reply_post').validate({
      rules: {
        reply: {
          required: true,
        },
      },
      messages: {
        reply: {
          required: "Please enter your reply",
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


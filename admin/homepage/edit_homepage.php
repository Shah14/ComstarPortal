<?php require '../include/css.php';?>

<head>
  <?php $page = "Edit Homepage"; ?>

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

<?php $edit = "active"; ?>

<body <?php echo $tab ?> class="hold-transition sidebar-mini">
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
            <h1>Edit HomePage</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Admin</li>
              <li class="breadcrumb-item active">Edit Homepage</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="about-tab" data-toggle="pill" href="#about" role="tab" aria-controls="about" aria-selected="true"><i class="fas fa-info-circle"></i> About Us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="gallery-tab" data-toggle="pill" href="#gallery" role="tab" aria-controls="gallery" aria-selected="false"><i class="fas fa-images"></i> Gallery</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="video-tab" data-toggle="pill" href="#video" role="tab" aria-controls="video" aria-selected="false"><i class="fas fa-video"></i> Video</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="setting-tab" data-toggle="pill" href="#setting" role="tab" aria-controls="setting" aria-selected="false">Settings</a>
                  </li>
                </ul>
              </div>
              <?php
                $result=mysqli_query($con,"SELECT * FROM `homepage` WHERE ID='1'");
                  while($row = $result->fetch_assoc()) {
                    $date = $row["Date Updated"];
                    $about = $row["About"];
                    $class = " ";
                      if(isset($_GET['name'])){
                        if($_GET['name']=="aboutus"){
                          $class = "blink_me";
                        }else{
                          $class = " ";
                        }
                      }
                  }
              ?>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                    <div class="card-header">
                        <h3 class="card-title">Edit About Us Section</h3>
                        <div class="card-tools">
                          <h3 class="card-title">Last Updated : <span style="color:#007bff"><span class="badge badge-success"><?php echo get_time_ago(strtotime($date),"long") ?></span></span></h3>
                          
                        </div>
                      </div>
                    <div class="card-body">			 
                        <form id="edit_homepage" action="../Homepage/edit_homepage_process.php" class="form-horizontal" method="post">
                          <div class="form-group row">
                            <label for="aboutus" class="col-sm-2 col-form-label">Description</label>
                            <div class='col-sm-10 input-group'>
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-font"></i></span>
                              </div>
                                <textarea class='form-control <?php echo $class ?>' id='aboutus' required name='about' rows='7' cols='20' oninvalid="this.setCustomValidity('Please Enter the About Us Description')" oninput="this.setCustomValidity('')"><?php echo $about ?></textarea>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <button hidden id="edit_action"></button>
                              <button onclick="alert('Are you sure?','Do you want to edit the description?','info','edit_action','edit_homepage')" type='button' class="btn btn-danger"><i class='fas fa-pen'></i> Edit</button>
                            </div>
                          </div>
                        </form>
                    </div>
                  </div>

                  <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
                    <?php
                    $count=0;
                    $result=mysqli_query($con,"SELECT * FROM `homepage` WHERE `Type`='Image'");
                      while($row = $result->fetch_assoc()) {
                        $count++;
                      }					
                    ?>
                      <div class="card-header">
                        <h3 class="card-title">Gallery</h3>
                        <div class="card-tools">
                          <span class="badge badge-danger"><?php echo $count;?> Picture(s)</span>
                        </div>
                      </div>
                      <div class="card-body">
                        <ul class="users-list clearfix">
                          <div class="row">
                            <div class='col-lg-3 col-md-6 d-flex align-items-stretch'>
                              <div class='member'>
                                <div class='member-img'>
                                  <a href='add_image.php'><image src='../../assets/event/default.png' style='border: 1px solid #ddd;border-radius: 4px;padding: 5px;width: 350px;height:200px' alt='User Image'></a>
                                </div>
                                <div class='member-info' >
                                  <center>
                                    <a class='users-list-name' href='#'>Add New Picture</a>
                                  </center>
                                </div>
                              </div>
                            </div>

                            <?php
                            $result=mysqli_query($con,"SELECT * FROM `homepage` WHERE `Type`= 'Image' ORDER BY Year DESC");
                              while($row = $result->fetch_assoc()) {
                                $id=$row["ID"];
                                $class1 = " ";
                                if(isset($_GET['name'])){
                                  if($_GET['name']==$row["About"]." ".$row["Date Updated"]){
                                    $class1 = "blink_me";
                                  }else{
                                    $class1 = " ";
                                  }
                                }
                            ?>
                                <div class='col-lg-3 col-md-6 d-flex align-items-stretch'>
                                  <div class='member'>
                                    <div id="<?php echo $row['About']." ".$row["Date Updated"] ?>" class='member-img <?php echo $class1 ?>'>
                                      <a href='edit_image.php?id=<?php echo $id ?>'>
                                        <img src='../../assets/event/<?php echo $row["Image"] ?>' style='border: 1px solid #ddd;border-radius: 4px;padding: 5px;width: 350px;height:200px' alt='User Image'>
                                      </a>
                                      <div class='member-info' >
                                        <center>
                                          <a class='users-list-name'><?php echo $row["About"] ?></a>
                                          <span class="badge badge-pill badge-primary"><?php echo $row["Year"] ?></span>
                                        </center>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            <?php  
                            }
                            ?>            
                          </div>       
                        </ul>
                        <div class='alert alert-info' role='alert'>
                          <center>
                            <i class='fa fa-info-circle'></i><span class="badge badge">Click on the Picture to <i class='fas fa-pen'></i> Edit</span>
                          </center>
                        </div>
                      </div>
                  </div>

                  <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="video-tab">
                    <?php                
                    $count=0;
                    $result=mysqli_query($con,"SELECT * FROM `homepage` WHERE `Type`= 'Video'");
                      while($row = $result->fetch_assoc()) {
                        $count++;
                        //echo $row["Date Updated"]."<br>";
                        //echo date("Y-m-d h:i:s")."<br>";
                      }					
                    ?>
                      <div class="card-header">
                        <h3 class="card-title">Video</h3>
                        <div class="card-tools">
                          <span class="badge badge-danger"><?php echo $count;?> Video(s)</span>
                        </div>
                      </div>
                      <div class="card-body">
                        <ul class="users-list clearfix">
                          <div class="row">
                            <div class='col-lg-3 col-md-6 d-flex align-items-stretch'>
                              <div class='member'>
                                <div class='member-img'>
                                  <a href='add_video.php'><image src='../../assets/video/default.png' style='border: 1px solid #ddd;border-radius: 4px;padding: 5px;width: 350px;height:200px' alt='User Image'></a>
                                </div>
                                <div class='member-info' >
                                  <center>
                                    <a class='users-list-name' href='#'>Add New Video</a>
                                  </center>
                                </div>
                              </div>
                            </div>
                            <?php
                            $result=mysqli_query($con,"SELECT * FROM `homepage` WHERE `Type`= 'Video' ORDER BY Year DESC");
                              while($row = $result->fetch_assoc()) {
                                $id=$row["ID"];
                                $class2 = " ";
                                if(isset($_GET['name'])){
                                  if($_GET['name']==$row["About"]." ".$row["Date Updated"]){
                                    $class2 = "blink_me";
                                  }else{
                                    $class2 = " ";
                                  }
                                }
                            ?>
                                <div class='col-lg-3 col-md-6 d-flex align-items-stretch'>
                                  <div class='member'>
                                    <div id="<?php echo $row["About"]." ".$row["Date Updated"] ?>" class='member-img <?php echo $class2 ?>'>
                                      <a href='edit_video.php?id=<?php echo $id ?>'>
                                        <img src='https://img.youtube.com/vi/<?php echo $row["Image"] ?>/hqdefault.jpg' style='border: 1px solid #ddd;border-radius: 4px;padding: 5px;width: 350px;height:200px;' alt='User Image'/>
                                      </a>
                                      <div class='member-info' >
                                          <center>
                                            <h1 class='users-list-name'><?php echo $row["About"] ?></h1>
                                            <span class="badge badge-pill badge-primary"><?php echo $row["Year"] ?></span>
                                          </center>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                            <?php
                              }
                            ?>   
                          </div>                
                        </ul>
                        <div class='alert alert-info' role='alert'>
                        <center>
                          <i class='fa fa-info-circle'></i><span class="badge badge">Click on the Video Thumbnail to <i class='fas fa-pen'></i> Edit</span>
                        </center>
                      </div>
                      </div>
                  </div>

                  <div class="tab-pane fade" id="setting" role="tabpanel" aria-labelledby="setting-tab">
                     Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
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

<?php require '../include/script.php';?>
</html>


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
              <li class="breadcrumb-item active">Forum</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <?php
      $count=0;
      $result=mysqli_query($con,"SELECT * FROM `forum`");
        while($row = $result->fetch_assoc()) {
          $count++;
        }
    ?>
    <section class="content">
      <div class="container-fluid">
        <div class="row" >
          <div class="col-md-12">
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title"><i class='fas fa-comments'></i> Forum Posts</h3>
                <div class="card-tools">
                    <span class="badge badge-danger"><?php echo $count ?> Post(s)</span>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <center>
                    <a href='add_post.php'>
                      <button class='btn btn-outline-danger form-control' style="margin-bottom:1%;width:90px"><i class='fas fa-plus-circle'></i> Add</button>
                    </a>
                  </center>
                  <table id="example2" class="table m-0">	
                    <?php
                    $result=mysqli_query($con,"SELECT *, 
                                               admin.Image AS 'admin_image', 
                                               login.Image AS 'user_image', 
                                               admin2.Name AS 'admin_name2', 
                                               login2.`Full Name` AS 'user_name2', 
                                               admin2.Image AS 'admin_image2', 
                                               login2.Image AS 'user_image2',
                                               admin2.`User Type` AS 'admin_type2', 
                                               login2.`User Type` AS 'user_type2'
                                               FROM `forum` 
                                               LEFT JOIN login ON forum.Poster=login.Email 
                                               LEFT JOIN admin ON forum.Poster=admin.Email 
                                               LEFT JOIN login AS login2 ON `User Update`=login2.Email 
                                               LEFT JOIN admin AS admin2 ON `User Update`=admin2.Email 
                                               ORDER BY `Date Updated` DESC");
                    ?>
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>TITLE</th>
                        <th>LAST UPDATED</th>
                        <th>POSTED</th>
                        <th>POSTED BY</th>
                        <th>UPVOTE</th>
                        <th>REPORT</th>
                        <th>REPLIES</th>
                        <th style='text-align:center'>ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      if ($result->num_rows > 0) {
                        $no = 0;
                        while($row = $result->fetch_assoc()) {
                            $no++;
                            $title=$row["Title"];
                            $desc=$row["Description"];
                            $id=$row["Post ID"];
                            if($row["Poster"] == $q){
                              $poster = "<span hidden>aaaaaaaaaaaaaaaaaa</span>Me";
                              $color = "#28a745";
                            }else if($row["Poster Type"] == "Admin"){
                              $poster = $row["Poster"];
                              $color = "#dc3545";
                            }else{
                              $poster = $row["Poster"];
                              $color = "#007bff";
                            }
                            if($row["User Update"] == $q){
                              $updater = "Me";
                              $update_color = "#28a745";
                            }else if($row["admin_type2"] != NULL){
                              $updater = $row["admin_name2"];
                              $update_color = "#dc3545";
                            }else{
                              $updater = $row["user_name2"];
                              $update_color = "#007bff";
                            }
                            $class = " ";
                            if(isset($_GET['name'])){
                              if($_GET['name']==$row["Title"]." ".$row["Date Updated"]){
                                $class = "class='blink_me'";
                              }else{
                                $class = " ";
                              }
                            }
                            if($row["Poster Type"]=="Admin"){
                              $poster_image = $row["admin_image"];
                            }else{
                              $poster_image = $row["user_image"];
                            }
                            if($row["admin_type2"]!=NULL){
                              $updater_image = $row["admin_image2"];
                            }else{
                              $updater_image = $row["user_image2"];
                            }
                    ?>
                      <tr id="<?php echo $row["Title"]." ".$row["Date Updated"]?>"<?php echo $class ?>>
                        <td><?php echo $no?></td>
                        <td><?php echo $row["Title"]?></td>
                        <td>
                          <span hidden><?php echo $row["Date Updated"]?></span>
                          <div class="user-block">
                              <img class="img-circle img-bordered-sm" src="../../assets/profile picture/<?php echo $updater_image?>" alt="user image">
                              <span class="username">
                               <?php echo $row["Action Update"] ?> <a style="color:<?php echo $update_color?>"><?php echo $updater ?></a> 
                              </span>
                              <span class="description"><?php echo get_time_ago(strtotime($row["Date Updated"]),"long") ?></span>
                            </div>
                        </td>
                        <td><span hidden><?php echo $row["Date"]?></span><?php echo  date("j F Y",strtotime($row["Date"])) ?></td>
                        <td style="width:30%">
                            <div class="user-block">
                              <img class="img-circle img-bordered-sm" src="../../assets/profile picture/<?php echo $poster_image?>" alt="user image">
                              <span class="username">
                                <a style="color:<?php echo $color?>"><?php echo $poster ?></a>
                              </span>
                              <span class="description"><?php echo get_time_ago(strtotime($row["Date"]),"long") ?></span>
                            </div>
                          </td>
                        <td><span class="badge badge-primary"><i class='fas fa-thumbs-up'></i> <?php echo $row["Upvote"]?> </span></td>
                        <td><span class="badge badge-danger"><i class='fas fa-bullhorn'></i> <?php echo $row["Report"]?> </span></td>
                        <td><span class="badge badge-success"><i class='fas fa-comment-dots'></i> <?php echo $row["Replies"]?> </span></td>
                        <td style='text-align:center'>
                          <a href='view_post.php?id=<?php echo $id ?>'>
                            <button class='btn btn-outline-danger' style='width:90px;margin-bottom:1%'><i class='fas fa-book-open'></i> View</button>
                          </a>
                          <br>
                          <a href='edit_post.php?id=<?php echo $id ?>'>
                            <button class='btn btn-outline-danger' style='width:90px;margin-bottom:1%'><i class='fas fa-pen'></i> Edit</button>
                          </a> 
                          <form id="delete" action='../Forum/delete_post_process.php' method='post'>
                            <button hidden id="<?php echo $id ?>" name='id' type='submit' value='<?php echo $id ?>'></button>
                            <button onclick="alert('Are you sure?','Do you want to delete this post?','warning','<?php echo $id ?>','delete')" type='button' class='btn btn-danger' style='width:90px;margin-bottom:1%'><i class='fas fa-trash'></i> Delete</button>
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
              </div>
              <div class="card-footer clearfix"></div>
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


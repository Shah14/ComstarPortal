<?php require '../include/css.php';?>

<head>
  <?php $page = "Forum"; ?>

  <title><?php echo $page; ?> | Dashboard</title>

  <link rel="icon" href="../../assets/logo/logo.png">

</head>

<?php require '../include/config.php';?>

<?php $forum = "active"; ?>

<?php 

if(isset($_GET["name"])){
  $body = "onload='flash()'";
}else{
  $body = " ";
}

?>

<body <?php echo $body ?> class="hold-transition sidebar-mini">

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
                    $result=mysqli_query($con,"SELECT * FROM `forum` LEFT JOIN login ON forum.Poster=login.Email LEFT JOIN admin ON forum.Poster=admin.Email");
                    ?>
                    <thead>
                      <tr>
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
                        while($row = $result->fetch_assoc()) {
                            $title=$row["Title"];
                            $desc=$row["Description"];
                            $id=$row["Post ID"];
                            if($row["Poster"] == $q){
                              $poster = "<span hidden>aaaaaaaaaaaaaaaaaa</span>Me";
                              $color = "#28a745";
                              
                            }else{
                              $poster = $row["Poster"];
                              $color = "#007bff";
                            }
                            $class = " ";
                            if(isset($_GET['name'])){
                              if($_GET['name']==$row["Title"]." ".$row["Date Updated"]){
                                $class = "class='blink_me'";
                              }else{
                                $class = " ";
                              }
                            }
                    ?>
                      <tr id="<?php echo $row["Title"]." ".$row["Date Updated"]?>"<?php echo $class ?>>
                        <td><?php echo $row["Title"]?></td>
                        <td><span hidden><?php echo $row["Date Updated"]?></span><?php echo get_time_ago(strtotime($row["Date Updated"])) ?></td>
                        <td><span hidden><?php echo $row["Date"]?></span><?php echo get_time_ago(strtotime($row["Date"])) ?></td>
                        <td><span style="color:<?php echo $color ?>"><?php echo $poster?></span> on <?php echo date("l, j/m/Y",strtotime($row["Date"]))?></td>
                        <td><?php echo $row["Upvote"]?></td>
                        <td><?php echo $row["Report"]?></td>
                        <td><?php echo $row["Replies"]?></td>
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
                    }else{
                    ?>
                      <tr>
                        <td>No data</td>
                        <td>No data</td>
                        <td>No data</td>
                        <td>No data</td>
                        <td>No data</td>
                        <td>No data</td>
                      <tr>
                    <?php
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


<?php require '../include/css.php';?>

<head>
  <?php $page = "Advertisement"; ?>

  <title><?php echo $page; ?> | Dashboard</title>

  <link rel="icon" href="../../assets/logo/logo.png">

</head>

<?php require '../include/config.php';?>

<?php $advertisement = "active"; ?>

<?php

?>
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
            <h1>Advertisement</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Admin</li>
              <li class="breadcrumb-item active">Advertisement</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <?php
				$count=0;
				$result=mysqli_query($con,"SELECT * FROM `advertisement`");
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
                <h3 class="card-title"><i class='fas fa-rectangle-ad'></i>Advertisements</h3>
                <div class="card-tools">
				          <span class="badge badge-danger"><?php echo $count ?>	Advertisement(s)</span>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <center>
                    <a href='add_ads.php'>
                      <button class='btn btn-outline-danger form-control saiz' style="margin-bottom:1%"><i class='fas fa-plus-circle'></i> Add</button>
                    </a>
                  </center>
                  <table id="example2" class="table m-0">	
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>TITLE</th>
                        <th>LAST UPDATED</th>
                        <th>DATE ADDED</th>
                        <th>IMAGE</th>
                        <th>LINK</th>
                        <th>VISIBILITY</th>
                        <th style='text-align:center'>ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $result=mysqli_query($con,"SELECT * FROM `advertisement` ORDER BY `Date Updated` DESC");
                        if ($result->num_rows > 0) {
                          $no = 0;
                          while($row = $result->fetch_assoc()) {
                            $no++;
                            $id=$row["ID"];
                            if($row['Visibility']=="Hidden"){
                              $value = "Visible";
                              $icon = "eye";
                              $text = "Show";
                              $badge = "danger";
                            }else{
                              $value = "Hidden";
                              $icon = "eye-slash";
                              $text = "Hide";
                              $badge = "success";
                            }
                            $class = " ";
                            if(isset($_GET['name'])){
                              if($_GET['name']==$row["Title"]." ".$row["Date Updated"] ){
                                $class = "class='blink_me'";
                              }else{
                                $class = " ";
                              }
                            }
                      ?>
                      <tr id="<?php echo $row["Title"]." ".$row["Date Updated"]  ?>" <?php echo $class ?>>
                          <td><?php echo $no ?></td>
                          <td><?php echo $row["Title"] ?></td>
                          <td><span hidden><?php echo $row["Date Updated"]?></span><span class="badge badge-success"><?php echo get_time_ago(strtotime($row["Date Updated"]),"long") ?></span></td>
                          <td><span hidden><?php echo $row["Date"] ?></span><?php echo date("j F Y",strtotime($row["Date"])) ?></td>
                          <td>
                            <img src='../../assets/advertisement/<?php echo $row["Banner"]?>'style='border: 1px solid #ddd;border-radius: 4px;padding: 5px;width:500px;height:200px'>
                          </td>
                          <td><small><a target="_blank" href="<?php echo $row["Link"] ?>"><u><?php echo $row["Link"] ?></u></a></small></td>
                          <td><span class="badge badge-pill badge-<?php echo $badge?>"><?php echo $row["Visibility"] ?></span></td>
                          <td style='text-align:center'>
                              <a href="edit_ads.php?id=<?php echo $id ?>">
                                <button class='btn btn-outline-danger form-control saiz'><i class='fas fa-pen'></i> Edit</button>
                              </a>
                              <form action='../advertisement/visible_process.php' method='post'>
                                <input type='hidden' name='id' value=<?php echo $id ?>>
                                <input type='hidden' id='title' value='<?php echo $row["Title"] ?>' name='title'>
                                <button hidden id="hidden_<?php echo $id ?>" name='visibility' value='<?php echo $value ?>'></button>
                                <button onclick="alert('Are you sure?','Do you want to <?php echo strtolower($text) ?> this advertisement?','info','hidden_<?php echo $id ?>','visible')" type='button' class='btn btn-danger form-control saiz'><i class='fas fa-<?php echo $icon ?>'></i> <?php echo $text ?></button>
                              </form>  
                              <form action='../advertisement/delete_ads_process.php' method='post'>
                                <button hidden id="delete_<?php echo $id ?>" name='id' value=<?php echo $id ?>></button>
                                <button onclick="alert('Are you sure?','Do you want to delete this advertisement?','warning','delete_<?php echo $id ?>','delete')" type='button' class='btn btn-danger form-control saiz'><i class='fas fa-trash'></i> Delete</button>
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


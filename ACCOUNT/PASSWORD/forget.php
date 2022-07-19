<?php require '../include/css.php';?>

<?php require '../include/config.php';?>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../login/login.php" class="h1"><b>COMSTAR</b>Portal</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily reset your password.</p>
      <form action="forget_process.php" id="quickForm" method="post">
        <div class="input-group mb-3 form-group">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mt-3 mb-1">
        <a href="../login/login.php">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
</body>

<?php require '../include/script.php';?>

</html>  
<?php require '../include/css.php';?>

<?php require '../include/config.php';?>

<body class="hold-transition login-page">
  
  <?php echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>';?>
  <?php
  if(isset($_SESSION['Alert'])){
      if($_SESSION['Alert']=="Password Reset Code sent!"){
          echo "<script>Swal.fire('$_SESSION[Alert]','Check your e-mail spam message folder!','success');</script>";
      }else if($_SESSION['Alert']=="Password Reset Code resent!"){
        echo "<script>Swal.fire('$_SESSION[Alert]','Check your e-mail spam message folder!','success');</script>";
      }else{
        echo "<script>Swal.fire('Error','$_SESSION[Alert]','error');</script>";
      }
      unset($_SESSION['Alert']);
  }
    ?>

  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="../login/login.php" class="h1"><b>COMSTAR</b>Portal</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">You are only one step a way from your new password, reset your password now.</p>
        <form action="new_password_process.php" id="quickForm" method="post">
          <div class="input-group mb-3 form-group">
            <input readonly type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $_GET['email']?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3 form-group">
            <input oninput="visiblePassword('pin')" type="password" name="pin" pattern="[0-9]{6}" maxlength="6" class="form-control" placeholder="Verification Code" id="pin" 
            value="<?php if(isset($_GET['pin'])){echo $_GET['pin'];} ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-key"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3 form-group">
            <input oninput="visiblePassword('pass')" type="password" class="form-control" name="pass" placeholder="New Password" id="pass">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3 form-group">
            <input oninput="visiblePassword('confirm')" type="password" class="form-control" name="confirm" placeholder="Confirm Password" id="confirm">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
            
          <p class="mt-3 mb-1 text-center">
            <a href="resent_password_process.php?email=<?php echo $_GET['email']?>">Didn't receive code? Click here</a>
          </p>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input onchange="visiblePassword('pass');visiblePassword('confirm');visiblePassword('pin')" type="checkbox" id="remember">
                <label for="remember">
                  Show Password
                </label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Change password</button>
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
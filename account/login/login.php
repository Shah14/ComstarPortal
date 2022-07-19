<?php require '../include/css.php';?>

<?php require '../include/config.php';?>

  <body class="hold-transition login-page">

    <?php echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>';?>
    <?php
    if(isset($_SESSION['Alert'])){
        if($_SESSION['Alert']=="Account successfully verified!"){
          echo "<script>Swal.fire('$_SESSION[Alert]','Please login to procceed!','success');</script>";
        }
        else if($_SESSION['Alert']=="You have successfully reset the password!"){
          echo "<script>Swal.fire('Success','$_SESSION[Alert]','success');</script>";
        }
        else{
            echo "<script>Swal.fire('Error','$_SESSION[Alert]','error');</script>";
        }
        unset($_SESSION['Alert']);
    }
    ?>
    
    <div class="login-box">
      <!-- /.login-logo -->
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <a class="h1"><b>COMSTAR</b>Portal</a>
        </div>
        <div class="card-body">
          <p class="login-box-msg">Welcome to COMSTAR UTMKL Official Website. Please log in to proceed</p>

          <form name="f1" id="quickForm" action = "login_process.php" method = "POST">  
            <div class="input-group mb-3 form-group">
              <input type = "email" id ="email"  class="form-control" name  = "email" placeholder = "E-mail" value="<?php if(isset($_GET["email"])){echo $_GET["email"];} ?>" />  
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3 form-group">
              <input oninput="visiblePassword('pass')" type = "password" id ="pass" class="form-control"  name  = "pass" placeholder = "Password" />  
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input onchange="visiblePassword('pass')" type="checkbox" id="remember">
                  <label for="remember">
                    Show Password
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-success btn-block">Log In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>

          <div class="social-auth-links text-center mt-2 mb-3">
            <a href="../signup/signup.php" class="btn btn-block btn-primary">
              <i class="fa-solid fa-user-plus"></i> Create New Account
            </a>
            <a href="guestlogin.php" class="btn btn-block btn-info">
              <i class="fa-solid fa-user-clock"></i> Continue As Guest
            </a>
          </div>
          <!-- /.social-auth-links -->

          <p class="mb-1">
            <a href="../password/forget.php">I forgot my password</a>
          </p>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.login-box -->
  </body>

<?php require '../include/script.php';?>

</html>  
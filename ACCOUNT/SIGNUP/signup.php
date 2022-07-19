<?php require '../include/css.php';?>

<?php require '../include/config.php';?>

  <body class="hold-transition login-page">

    <?php echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>';?>
    <?php
      if(isset($_SESSION['Alert'])){
          echo "<script>Swal.fire('Error','$_SESSION[Alert]','error');</script>";
          unset($_SESSION['Alert']);
      }
    ?>

    <div class="register-box">
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <a class="h1"><b>COMSTAR</b>Portal</a>
        </div>
        <div class="card-body">
          <p class="login-box-msg">Register a new account</p>

          <form action="signup_process.php" id="quickForm" method="post">
            <div class="input-group mb-3 form-group">
              <input type="text" class="form-control" placeholder="Full name" name="fname" value="<?php if(isset($_GET["fname"])){echo $_GET["fname"];} ?>">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-id-card"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3 form-group">
              <input type="text" class="form-control" placeholder="Nickname" name="name" value="<?php if(isset($_GET["name"])){echo $_GET["name"];} ?>">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3 form-group">
              <input type="email" class="form-control" placeholder="Email" name="email" value="<?php if(isset($_GET["email"])){echo $_GET["email"];} ?>">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3 form-group">
              <input oninput="visiblePassword('pass')" type="password" class="form-control" placeholder="Password" name="pass" id="pass">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3 form-group">
              <input oninput="visiblePassword('confirm')" type="password" class="form-control" placeholder="Retype password" name="confirm" id="confirm">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-key"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input onchange="visiblePassword('pass');visiblePassword('confirm')" type="checkbox" id="remember">
                  <label for="remember">
                    Show Password
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group mb-0">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                <label class="custom-control-label" for="exampleCheck1">I agree to the <a target="_blank" href="terms and condition.html">terms of service</a>.</label>
              </div>
            </div>
            <div class="social-auth-links text-center">
              <button type="submit" class="btn btn-block btn-primary">
                <i class="fa-solid fa-user-plus"></i>
                Register
              </button>
            </div>
          </form>


          <!--COMING SOON?
          <div class="social-auth-links text-center">
            <a href="#" class="btn btn-block btn-primary">
              <i class="fab fa-facebook mr-2"></i>
              Sign up using Facebook
            </a>
            <a href="#" class="btn btn-block btn-danger">
              <i class="fab fa-google-plus mr-2"></i>
              Sign up using Google+
            </a>
          </div>
          -->

          <a href="../login/login.php" class="text-center">I already have an account</a>
        </div>
        <!-- /.form-box -->
      </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
  </body>

<?php require '../include/script.php';?>

</html>  
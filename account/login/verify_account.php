<?php require '../include/css.php';?>

<?php require '../include/config.php';?>

<body class="hold-transition login-page">
  
  <?php echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>';?>
  <?php
  $hidden = "";
  $hidden1 = "hidden";
  if(isset($_SESSION['Alert'])){
      if($_SESSION['Alert']=="Verification Code sent!"){
        $hidden = "hidden";
        $hidden1 = "";
        echo "<script>Swal.fire('$_SESSION[Alert]','Check your e-mail spam message folder!','success');</script>";
      }else if($_SESSION['Alert']=="Verification Code resent!"){
        $hidden = "hidden";
        $hidden1 = "";
        echo "<script>Swal.fire('$_SESSION[Alert]','Check your e-mail spam message folder!','success');</script>";
      }else if($_SESSION['Alert']=="Account creation successful!"){
        echo "<script>Swal.fire('Success','$_SESSION[Alert]','success');</script>";
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
        <p class="login-box-msg">Verify your account now.</p>
        <form action="verify_account_process.php" id="quickForm" method="post">
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
             value="<?php if(isset($_GET['pin'])){echo $_GET['pin'];} ?>" >
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-key"></span>
              </div>
            </div>
          </div>

          <p class="mt-3 mb-1 text-center" <?php echo $hidden ?>>
            <a href="send_code_process.php?email=<?php echo $_GET['email']?>&status=send">Send verification code</a>
          </p>
          <p class="mt-3 mb-1 text-center" <?php echo $hidden1 ?>>
            <a href="send_code_process.php?email=<?php echo $_GET['email']?>&status=resend">Resend verification code</a>
          </p>

          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input onchange="visiblePassword('pin')" type="checkbox" id="remember">
                <label for="remember">
                  Show Code
                </label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Verify Account</button>
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
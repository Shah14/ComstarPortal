<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../COMSTAR_INTERFACE_FIRST_SPRINT/Login/Login_interface_1/fonts/icomoon/style.css">

    <link rel="stylesheet" href="../../COMSTAR_INTERFACE_FIRST_SPRINT/Login/Login_interface_1/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../COMSTAR_INTERFACE_FIRST_SPRINT/Login/Login_interface_1/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="../../COMSTAR_INTERFACE_FIRST_SPRINT/Login/Login_interface_1/css/style.css">
	<link rel="icon" href="../../assets/logo/logo.png">
    <title>COMSTAR Portal Login</title>
  </head>
  <body>
  
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('../../COMSTAR_INTERFACE_FIRST_SPRINT/Login/Login_interface_1/images/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <div class="mb-4">
              <h3>Login to COMSTAR Portal</h3>
              <p class="mb-4">Welcome to COMSTAR UTMKL Official Website. Get updates on our upcoming programme and events!</p>
            </div>
			
<fieldset>  
        <form name="f1" action = "authentication.php" onsubmit = "return validation()" method = "POST">  
				<div class="form-group first">           
					<label for="email">E-mail </label>
					<input type = "email" id ="email"  class="form-control" name  = "email" />  
				</div>
				<div class="form-group last mb-3">
					<label for="password">Password </label>
					<input type = "password" id ="pass" class="form-control"  name  = "pass" />  
				</div>        
</fieldset>
		 <span class="ml-auto"><a href="../PASSWORD/forget.html" class="forgot-pass">Forgot Password</a></span><br>
		 <span id = "message" style="color:red"> </span> 
		 <input type =  "submit" id = "btn" value = "Login" class="btn btn-block btn-primary" />  
           
              <span class="d-block text-center my-4 text-muted">&mdash; or &mdash;</span>
              
              <div class="social-login">
                <a href="../SIGNUP/signup.html" class="btn btn-block btn-primary">Create Account</a>       
				<span class="d-block text-center my-4 text-muted">&mdash; or &mdash;</span>		
				<a href="guestlogin.php" class="btn btn-block btn-primary">Continue As Guest</a>    		
              </div>
            </form>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/Login/Login_interface_1/js/jquery-3.3.1.min.js"></script>
    <script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/Login/Login_interface_1/js/popper.min.js"></script>
    <script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/Login/Login_interface_1/js/bootstrap.min.js"></script>
    <script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/Login/Login_interface_1/js/main.js"></script>
  </body>
</html>

<html>  
<head>  
	   
	<script src="jquery-3.3.1.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head> 
<style>
h1 {text-align: center;}
p {text-align: center;}
div {text-align: center;}
</style> 
<body>  
   
    <script>  
            function validation()  
            {  
                var id=document.f1.email.value;  
                var ps=document.f1.pass.value;  
                if(id.length=="" && ps.length=="") {  
				swal ( "Oops" ,  "E-mail and Password fields are empty!" ,  "error" )
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
						swal ( "Oops" ,  "E-mail field is empty!" ,  "error" )
                        return false;  
                    }   
                    if (ps.length=="") {  
						swal ( "Oops" ,  "Password field is empty!" ,  "error" )
						return false;  
                    }  
                } 
				
var pw = document.getElementById("pass").value; 
 //minimum password length validation  
  if(pw.length < 8) {  
     document.getElementById("message").innerHTML = "**Password length must be at least 8 characters";  
     return false;  
  }
  
//maximum length of password validation  
  if(pw.length > 15) {  
     document.getElementById("message").innerHTML = "**Password length must not exceed 15 characters";  
     return false;  
  } 				
            }  
</script>  
</body>     
</html>  
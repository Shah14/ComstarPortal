<!-- jQuery -->
<script src="../../template/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../template/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="../../template/AdminLTE-3.2.0/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../../template/AdminLTE-3.2.0/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="../../template/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      pass: {
        required: true,
        minlength: 8
      },
      confirm: {
        required: true,
        minlength: 8,
        equalTo:"#pass",
      },
      pin: {
        required: true,
        minlength: 6,
      },
      terms: {
        required: true
      },
      fname: {
        required: true
      },
      name: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      pass: {
        required: "Please provide a password",
        minlength: "Your password must be at least 8 characters long"
      },
      confirm: {
        required: "Please retype the password",
        minlength: "Your password must be at least 8 characters long",
        equalTo: "Your password must be matched"
      },
      pin: {
        required: "Please provide the verification code",
        minlength: "Your code must be at least 6 characters long"
      },
      fname: {
        required: "Please enter your full name",
      },
      name: {
        required: "Please enter your nickname",
      },
      terms: "Please accept our terms of service to proceed"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});

function visiblePassword(id) {
  var x = document.getElementById(id);
  var y = document.getElementById("remember").checked;
  console.log(y)
  if (y === true) {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/AdminLTE-3.1.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/AdminLTE-3.1.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/AdminLTE-3.1.0/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/AdminLTE-3.1.0/plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/AdminLTE-3.1.0/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/AdminLTE-3.1.0/dist/js/pages/dashboard3.js"></script>
<!-- SweetAlert2 -->
<script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/AdminLTE-3.1.0/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/AdminLTE-3.1.0/plugins/toastr/toastr.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/AdminLTE-3.1.0/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/AdminLTE-3.1.0/dist/js/adminlte.min.js"></script>


<!-- DataTables  & Plugins -->
<script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/AdminLTE-3.1.0/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/AdminLTE-3.1.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/AdminLTE-3.1.0/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/AdminLTE-3.1.0/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/AdminLTE-3.1.0/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/AdminLTE-3.1.0/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/AdminLTE-3.1.0/plugins/jszip/jszip.min.js"></script>
<script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/AdminLTE-3.1.0/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/AdminLTE-3.1.0/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/AdminLTE-3.1.0/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/AdminLTE-3.1.0/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../COMSTAR_INTERFACE_FIRST_SPRINT/AdminLTE-3.1.0/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
$(function () {
  bsCustomFileInput.init();
});
</script>

<script>
  $(function () {
    $("#example1").DataTable({ //attendance table
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({ //general table
      "order": [[2, 'desc']],
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('#example3').DataTable({ //user table 
      "order": [[2, 'desc']],
      "pageLength": 10,
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  var coll = document.getElementsByClassName("btn btn-outline-danger");
  var i;

  for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var isi = this.nextElementSibling;
      if (isi.style.maxHeight){
        isi.style.maxHeight = null;
      } else {
        isi.style.maxHeight = isi.scrollHeight + "px";
      } 
    });
  }

  function verifyPassword() {  
    var pw = document.getElementById("password").value; 
    var cf= document.getElementById("confirm").value;
    if(pw !== cf) {  
      document.getElementById("message").innerHTML = "**Passwords are not matched!";  
      return false;  
    } 
    
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

<!-- Page specific script -->
<script>
  <?php if($alert!='None'){ //toast alert
    echo "setTimeout(function () {
      toastr['success'](
        '".$alert."',
        {
          closeButton: true,
          tapToDismiss: false,
        }
      );
    }, 2000);";
  }
  ?>

  function changeTab(id){ //change tab
    console.log(id)
    $('#myTab a[href="#'+id+'"]').tab('show')
  }
  
  function alert(title,text,icon,action){
            Swal.fire({
                title: title,
                text: text,
                icon: icon,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-outline-danger ms-1'
                },
                buttonsStyling: true
            }).then(function (result) {
                if (result.value) {
                  document.getElementById(action).click();
                }
            });
        }

  function flash(){
    setTimeout(function(){
      const queryString = window.location.search;
      const urlParams = new URLSearchParams(queryString);
      const name = urlParams.get('name')
      document.getElementById(name).classList.remove("blink_me");
      console.log(name)
    }, 5000)
  }
</script>
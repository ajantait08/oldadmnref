</div>
</div><!--row content end -->
 <!-- Footer start-->
  <div class="row">
    <div class="col-md-12">
      <p class="text-center" style="position:fixed;bottom:0px; width:100%">&copy; Copyright.IIT (ISM), Dhanbad</p>
    </div>
  </div> 
  <!-- Footer end-->
</div>
<script src="<?php echo base_url();?>themes/plugins/sweetalert2/sweetalert2.js"></script>
<!-- <script type="text/javascript">
$(document).ready(function(){
  Swal.fire({
  title: 'Error!',
  text: 'Do you want to continue',
  icon: 'success',
  confirmButtonText: 'Cool'
})
  $("#registerButton").click(function(){
    
    // start
  const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
  confirmButton: 'btn btn-success',
  cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
  })

swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    swalWithBootstrapButtons.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    )
  }
})
    // end
  });
});
</script> -->
</body>
</html>
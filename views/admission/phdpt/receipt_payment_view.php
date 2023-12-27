<?php defined('BASEPATH') or exit('No, direct script access allowed');
if(empty($receipt_payment))
{
    echo "No payment found. Please try again";
    exit;
}
else
{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Payment Details | IITISM</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url() ?>assests/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="assets/img/favicon.png" />

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>assests/datetimepicker/css/bootstrap-datetimepicker.css" />

  <!-- CSS Files -->
  <link href="<?php echo base_url() ?>assests/css/bootstrap.min.css" rel="stylesheet" />

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->

<!--   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" />

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>


  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script> -->

  <!-- <script src="<?php // echo base_url() ?>assests/js/secure.js"></script> -->
  <style>

.palel-primary
{
    /* border-color:  #5161ce; */
    border-color:  #B31312;
}
.panel-primary>.panel-heading
{
    text-align:center;
    /* background: #5161ce; */
    background: #B31312;

}
.panel-primary>.panel-body
{
    background-color: #EDEDED;
}
</style>
</head>
<body>

<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">

		</div>

		</div><!-- /.container-fluid -->
	</nav>


<div class="container">
  <!-- Content here -->

  <div>
  <h4 class='alert alert-default' style="font-weight:bold;">Please keep payment receipt for future use.</h4>
  </div>

    <div class="panel-group">
    <div class="panel panel-primary">

      <div class="panel-heading">Receipt</div>

        <div class="panel-body">
<div class="row">
        <div class="col-md-12">
        <div class="col-md-4"></div>
        <div class="col-md-4"><h4 style="font-weight:bold;">Payment Receipt</h4></div>
        <div class="col-md-4"></div>
        </div>
</div>

          <div class="row">
            <div class="col-md-12">

  <?php // echo validation_errors(); ?>
  <!-- <form action="#" method="POST" enctype="multipart/form-data" > -->

                    <table class="table table-striped table-bordered" cellpadding="0" style="font-size:15px; font-weight: bold; backgroud" cellspacing="0">
                                <thead>
                                </thead>
                                    <tbody>
                                        <tr>
  <td width="50%">Order ID : <?php echo $receipt_payment['order_id']; ?></td>
  <td width="50%">Payment : Rs. <strong style="<?php if($receipt_payment['payment_status']==1) { echo 'color: #4BB543'; } else { echo 'color: #CA0B00'; } ?>"><?php echo $receipt_payment['total_to_be_paid']; ?></strong></td>
                                        </tr>
                                        <tr>
  <td width="50%">Bank ref no : <?php echo $receipt_payment['bank_ref_no']; ?></td>
  <td width="50%">Payment Details : <strong><?php echo $receipt_payment['payment_msg']; ?></strong></td>
                                        </tr>
                                        <tr>
  <td width="50%">Payment mode : <?php echo $receipt_payment['payment_mode']; ?></td>
  <td width="50%">Amount : Rs.<strong> <?php echo $receipt_payment['total_to_be_paid']; ?></strong></td>
                                        </tr>
                                        <tr>
  <td width="50%">Name : <?php echo $receipt_payment['name']; ?></td>
  <td width="50%">Admission type : <strong><?php echo strtoupper($receipt_payment['admn_type']); ?></strong></td>
                                        </tr>
                                        <tr>
  <td width="50%">Registration no : <?php echo $receipt_payment['user_id']; ?></td>
  <td width="50%">Contact no : <strong><?php echo $receipt_payment['contact']; ?></strong></td>
                                        </tr>
                                        <tr>
  <td width="50%">Email id : <?php echo $receipt_payment['email']; ?></td>
  <td width="50%">D.O.B : <strong><?php echo date("d-m-Y", strtotime($receipt_payment['dob'])); ?></strong></td>
                                        </tr>


                                        </tbody>
                        </table>


            <div class="col-md-4">
              <button class="btn btn-primary" onclick="window.print()">Print</button>
              <a href="https://admission.iitism.ac.in/index.php/admission/phdpt/Adm_phdpt_application_preview" class="btn btn-info">Back To Applicant Home</a>
              <!-- <a href="https://admissiondev.iitism.ac.in/index.php/admission/phdpt/Adm_phdpt_application_preview" class="btn btn-info">Back To Applicant Home</a> -->
            </div>

  <!-- </form> -->

            </div>
          </div>

        </div>

    </div>
  </div><!-- /.panel-group -->

</div>

</body>

  <!--   Core JS Files   -->


  <script src="<?php echo base_url()?>assests/js/jquery-2.2.4.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url()?>assests/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url()?>assests/js/jquery.bootstrap.js" type="text/javascript"></script>

  <!--  Plugin for the Wizard -->
  <script src="<?php echo base_url()?>assests/js/material-bootstrap-wizard.js"></script>

    <!--  More information about jquery.validate here: http://jqueryvalidation.org/  -->
  <script src="<?php echo base_url()?>assests/js/jquery.validate.min.js"></script>
  <script src="<?php echo base_url()?>assests/js/jquery.validate.min.js"></script>
  <script src="<?php echo base_url()?>assests/datetimepicker/js/moment-with-locales.js"></script>
  <script src="<?php echo base_url()?>assests/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script>
    $(document).mousedown(function(e){
    if( e.button == 2 ) {
      alert('You can not allow right click !');
      return false;
    }
    return true;
  });

document.onkeydown = function(e) {
        if (e.ctrlKey &&
             (e.keyCode === 67 ||
             e.keyCode === 86 ||
             e.keyCode === 85 ||
             e.keyCode === 117)) {
            return false;
        } else {
            return true;
        }
};

document.onkeydown(function (e) {
    if (e.keyCode == 93) {
        return false;
    }
});

$(document).keypress("u",function(e) {
  if(e.ctrlKey)
  {
return false;
}
else
{
return true;
}
});

$(document).ready(function () {
    //Disable cut copy paste
    $('body').bind('cut paste', function (e) {
        e.preventDefault();
    });

    //Disable mouse right click
    $("body").on("contextmenu",function(e){
        return false;
    });

//Disable part of page
    $("#id").on("contextmenu",function(e){
        return false;
    });


});

$(document).keydown(function(event){
    if(event.keyCode==123){
        return false;
    }
    else if (event.ctrlKey && event.shiftKey && event.keyCode==73){
             return false;
    }
});

$(document).on("contextmenu",function(e){
   e.preventDefault();
});


  </script>
  </html>

<?php
}
?>
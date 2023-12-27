
<style>

.blink_click {
    animation-duration: 1200ms !important;
    animation-name: blink;
    animation-iteration-count: infinite !important;
    animation-direction: alternate !important;
    -webkit-animation:blink 1200ms infinite !important; /* Safari and Chrome */
}

@keyframes blink {

    from {

    color:#6b95e7;

    }

    to {
        color:green;
    }
}

@-webkit-keyframes blink {

        from {

    color:#6b95e7;

    }

    to {
        color:green;
    }
}

</style>


<link href="<?php echo base_url();?>themes/dist/css/adm_mba/adm_mba_personal_details.css" rel="stylesheet" media="screen">
<?php 
if(!($this->session->has_userdata('login_type'))) {
redirect('admission/Add_mba/adm_mba_login');
} ?>
<div class="row"> <!--row start  -->
    <div class="col-sm-2 col-md-2 col-lg-2"> <!--row col-md-4 start  -->
        <div class="notice"> <!--notice start  -->
            <div class="row">
                <div class="col-md-12">
                   
                </div>
            </div>
        </div><!--notice end -->
        <div class="info"> <!--info start  -->
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <!--start  -->
                    <div class="panel panel-primary news_back">
                        <div class="panel-heading">Activity
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                <input class="btn btn-info" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/Adm_mba_applicant_home'" value="Back applicant home" />
                                <input class="btn btn-warning" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/Adm_mba_complain_register'" value="Complaint Register" />
                                <input class="btn btn-primary" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/Adm_mba_complain_register/track_status'" value="Tracking Complaint" />
                                <?php if(!empty($tab))
                                {
                                    if($tab=='4')
                                    { ?>
                                         <input class="btn btn-secondary" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/Adm_mba_payment'" value="Back to Payment " />
                                    <?php }
                                } ?>
                               
                                <input class="btn btn-danger" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/Adm_registration/logout'" value="Logout" />
                                    
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <!--end  -->
                </div>
            </div>
        </div><!--info end -->
    </div> <!--row col-md-4 end  -->
    <div class="col-sm-8 col-md-8 col-lg-8"><!--row col-md-8 start  -->
       <div class="home"><!--home start  -->
            <div class="row"><!--home row start  -->
                <div class="col-md-12 col-lg-12 col-sm-12"><!--home col-md-12 start  -->
                    <!--start  -->
                    <div class="panel panel-primary news_back">
                        
                        <div class="panel-body">
                            <section class="signup-step-container">
                                                                <?php if(validation_errors() != '') { ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong><?php echo validation_errors(); ?></strong>
                                    </div>

                                    <?php } elseif($this->session->flashdata('error') != '') { ?>

                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong><?php echo $this->session->flashdata('failed_upload'); ?></strong>
                                    </div>


                                    <?php } elseif ($this->session->flashdata('amount_error') != '') { ?>

                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong><?php echo $this->session->flashdata('amount_error'); ?></strong>
                                    </div>

                                    <?php } else {
                                    # code...
                                    } ?>


                                   
                                            <div class="container-fluid">

                                            <!-- Page Heading -->
                                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                                <h1 class="h3 mb-0 text-gray-800" style="text-align:center;"><strong>Register</strong> <strong style="color:green">Complaint</strong></h1>
                                            </div>



                                            <!-- DataTales Example -->
                                            <!-- <div class="col-md-6"></div> -->
                                            <div class="card shadow mb-4 col-md-12">
                                                <div class="card-header py-3">


                                                <center>
                                                <h5 align="center" style="color:red;">
                                                <b>N.B : Kindly track your payment here <a href="https://www.sbiepay.sbi/secure/transactionTrack" target="_blank">Track payment . </a>
                                                If you are not getting any payment status then fill "complaint register" form.
                                                </b>
                                                </h5>
                                                <h5 align="center" style="color:red;">
                                                Register complaint only related to MBA application fee payment.
                                                </h5>
                                                </center>

                                                <?php if($this->session->flashdata('message_error')){?>
                                                <div class="alert alert-danger alert-dismissible">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <center> <strong><?php echo $this->session->flashdata('message_error')?></strong> </center>
                                                </div> 
                                                <?php }?>

                                                </div>
                                                <div class="card-body">
                                                <?php
                                                    $attributes = array('id' => 'uploadform','name'=>'uploadform','enctype'=>'multipart/form-data');
                                                    echo form_open('admission/Adm_mba_complain_register/save', $attributes); 
                                             
                                                 ?>
                                                

                                                <div class="col-md-6">

                                                <div class="form-group mb-6">
                                                <label>Order no ( Pl enter NA if not available order no ) <span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" name="order_no" id="order_no" placeholder="Please enter order no *" required/>
                                                </div>

                                                <div class="form-group mb-6">

                                                <label>Registered Contact no<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" name="contact_no" id="contact_no" maxlength="10" placeholder="Please enter contact no *" required/>

                                                </div>

                                                <div class="form-group mb-6">

                                                <label>Complaint type<span style="color:red;">*</span></label>
                                                <select class="form-control" name="complain_type" id="complain_type" required>
                                                    <option>---Select problem---</option>
                                                    <option>Amount deducted but payment failed</option>
                                                    <option>Showing Wrong Amount</option>
                                                    <option>Payment website not working</option>
                                                </select>

                                                </div>

                                                <div class="form-group mb-6">

                                                <label>Complaint Details<span style="color:red;">*</span></label>
                                                <textarea rows="5" class="form-control" name="complain_details" id="complain_details" placeholder="Please enter complain details *" required></textarea>

                                                </div>
                                                </div>

                                                <div class="col-md-6">

                                                <div class="form-group mb-6">

                                                <label>Registered Email id<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" name="email" id="email" placeholder="Please enter email id *" required/>

                                            </div>



                                            <div class="form-group mb-6">

                                            <label>Payment type<span style="color:red;">*</span></label>
                                            <select class="form-control" name="payment_type" id="payment_type" required>
                                                <option>---Select type---</option>
                                                <!-- <option value="newadmission_fee">Newadmission Fee (JEE)</option> -->
                                            <option value="MBA Application Fee">MBA Application Fee</option>
                                                <!--<option value="other_fee">Other Fee</option>
                                            -->
                                            </select>
                                            </div>

                                                <div class="form-group mb-6">

                                                <label>Upload screenshot ( image or pdf ) ( max size 1 mb ) <span style="color:red;">*</span></label>
                                                <input type="file" class="form-control" name="complain_img" id="complain_img" placeholder="Please enter contact no *" required/>

                                            </div>



                                                </div>


                                                <!-- <input type="hidden" name="passingparameters" value="<?php echo $requestParameter; ?>"> -->
                                                <div class="col-md-12"><?php if(isset($msg)) { echo $msg; } ?><hr></div>

                                                    <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                    <button type="reset" class="btn btn-danger">Reset</button>
                                                    </div>
                                                    </form>

                                                </div>
                                            </div>

                                            </div>

                                        </div>
                                        <!-- End of Main Content -->

                                        <!-- Footer -->
                                        <footer class="sticky-footer bg-white">
                                            <div class="container my-auto">
                                            <!-- <div class="copyright text-center my-auto">
                                                <span>Copyright &copy; IIT (ISM)</span>
                                            </div> -->
                                            </div>
                                        </footer>
                                        <!-- End of Footer -->

                                        </div>
                                        <!-- End of Content Wrapper -->

                                    </div>
                                    <!-- End of Page Wrapper -->

                                    <!-- Scroll to Top Button-->
                                    <!-- <a class="scroll-to-top rounded" href="#page-top">
                                        <i class="fas fa-angle-up"></i>
                                    </a> -->
                            </section>
                            <!-- <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">Candidates can now check their admission status.</marquee> -->
                        </div> <!-- panel body end  -->
                    </div>  <!-- panel end  -->
                    <!--end  -->
                </div><!--home col-md-12 end  -->
            </div><!--home row end  -->
        </div><!--home end  -->
    </div><!--row col-md-8 end  -->
   
</div><!--row start  -->
<!-- <script type="text/javascript" src="<?php echo base_url();?>themes/dist/js/adm_mba/adm_mba_education.js"></script> -->
<script type="text/javascript">
// function disableF5(e) { if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) e.preventDefault(); };

$(document).ready(function(){
     $(document).on("keydown", disableF5);
});
</script>

  <script>

  $("#dateofPayment" ).datepicker({

    dateFormat: 'dd-mm-yy'

    });

    </script>

    <script>

    function filePreview(input){

      if(input.files && input.files['0'])
      {
        var reader = new FileReader();
        reader.onload = function(e)
        {
            $("#uploadform + img").remove();
            $("#uploadform").after('<a href="'+e.target.result+'"/>View PDF</a>');
        };
        reader.readAsDataURL(input.files[0]);
      }

    }

    $("#transaction_receipt").change(function(){

      filePreview(this);

    });



    </script> 



   <script>
    $(document).mousedown(function(e){
    if( e.button == 2 ) {
      alert('You can not allow right click !');
      return false;
    }
    return true;
  });

// document.onkeydown = function(e) {
//         if (e.ctrlKey &&
//             (e.keyCode === 67 ||
//              e.keyCode === 86 ||
//              e.keyCode === 85 ||
//              e.keyCode === 117)) {
//             return false;
//         } else {
//             return true;
//         }
// };

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
    // $('body').bind('cut copy paste', function (e) {
    //     e.preventDefault();
    // });

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

// $(document).on("contextmenu",function(e){
//    e.preventDefault();
// });


  </script> 


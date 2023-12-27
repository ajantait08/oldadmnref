<link href="<?php echo base_url();?>themes/dist/css/phdpt/adm_phdpt_personal_details.css" rel="stylesheet" media="screen">
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



<?php
if(!($this->session->has_userdata('login_type'))) {
redirect('admission/phdpt/Add_phdpt/adm_phdpt_login');
} ?>
<div class="row"> <!--row start  -->
    <div class="col-sm-2 col-md-2 col-lg-2"> <!--row col-md-4 start  -->
        <div class="notice"> <!--notice start  -->
            <div class="row">
                <div class="col-md-12">
                    <!--start  -->
                    <div class="panel panel-primary news_back">
                        <!-- <div class="panel-heading">NEWS AND EVENTS
                        </div>
                        <div class="panel-body">
                           <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">Candidates can now check their admission status.</marquee>
                        </div> -->
                    </div>
                    <!--end  -->
                </div>
            </div>
        </div><!--notice end -->
        <div class="info"> <!--info start  -->
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <!--start  -->
                    <div class="panel panel-primary news_back">
                        <div class="panel-heading">Important Information
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-lg-12">

                                <input class="btn btn-primary" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/phdpt/Adm_phd_ptcomplain_register/track_status'" value="Tracking Complain" />
                                <!-- <input class="btn btn-secondary" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/Adm_mba_payment'" value="Back to Payment"/> -->
                                <?php if(!empty($tab))
                                {
                                    if($tab=='4')
                                    { ?>
                                         <input class="btn btn-secondary" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/phdpt/Adm_phdpt_payment'" value="Back to Payment " />
                                    <?php }
                                } ?>
                                <input class="btn btn-danger" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/phdpt/Adm_phdpt_registration/logout'" value="Logout" />

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

                        </div>
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

                                    <?php } elseif (!empty($cmsg)){ ?>

                                        <div class="alert alert-success alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <strong><?php echo $cmsg; ?></strong>
                                        </div>

                                        <?php }


                                    else {
                                    # code...
                                    } ?>


                                        <div class="container-fluid">

                                        <!-- Page Heading -->
                                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                            <h1 class="h3 mb-0 text-gray-800" style="text-align:center;"><strong>Complaint</strong> <strong style="color:green">Details</strong></h1>
                                        </div>

                                        <table id="example123"  class="table table-striped table-bordered dt-responsive nowrap" >
                                        <thead>
                                        </thead>
                                        <tbody>
                                        <tr>
                                                <td>Complain id :</td>
                                                <td><strong id="com_id"><?php echo $com_id; ?></strong></td>
                                            </tr>
                                            <tr>
                                                <td>Order no :</td>
                                                <td><strong id="ref_no"><?php echo $ref_no; ?></strong></td>
                                            </tr>
                                            <tr>
                                                <td>Email :</td>
                                                <td><strong id="status"><?php echo $email; ?></strong></td>
                                            </tr>
                                            <tr>
                                                <td>Contact no :</td>
                                                <td><strong id="remarks"><?php echo $contact_no; ?></strong></td>
                                            </tr>
                                            <tr>
                                                <td>Complain type :</td>
                                                <td><strong id="complain_type"><?php echo $complain_type; ?></strong></td>
                                            </tr>
                                            <tr>
                                                <td>Complain details :</td>
                                                <td><strong id="complain_details"><?php echo $complain_details; ?></strong></td>
                                            </tr>
                                            <tr>
                                                <td>Complain date :</td>
                                                <td><strong id="created_at"><?php echo $created_at; ?></strong></td>
                                            </tr>
                                        </tbody>
                                </table>

                                    <div class="col-md-12"><?php if(isset($msg)) { echo $msg; } ?><hr></div>


                            <!--<button class="btn btn-success" onclick="window.print()">Print this page</button>-->



                                <!-- DataTales Example -->
                                <!-- <div class="col-md-6"></div> -->







                                    <!-- <input type="hidden" name="passingparameters" value="<?php echo $requestParameter; ?>"> -->



                                                                </div>


                                    <!-- End of Main Content -->

                                    <!-- Footer -->

                                    <!-- End of Footer -->

                                    </div>
                                    <!-- End of Content Wrapper -->

                                </div>
                                <!-- End of Page Wrapper -->

                                <!-- Scroll to Top Button-->

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
<!-- <script type="text/javascript" src="<?php echo base_url();?>themes/dist/js/phdpt/adm_phdpt/adm_phdpt_education.js"></script> -->
<script type="text/javascript">
function disableF5(e) { if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) e.preventDefault(); };

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
    $('body').bind('cut copy paste', function (e) {
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
</body>

</html>



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



    </script> -->



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
    $('body').bind('cut copy paste', function (e) {
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


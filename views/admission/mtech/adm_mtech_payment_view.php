<link href="<?php echo base_url();?>themes/dist/css/mtech/adm_mtech_personal_details.css" rel="stylesheet" media="screen">
<?php 
if(!($this->session->has_userdata('login_type'))) {
redirect('admission/mtech/Add_mtech/adm_mtech_login');
} ?>
<div class="row"> <!--row start  -->
    <div class="col-sm-2 col-md-2 col-lg-2"> <!--row col-md-4 start  -->
        <div class="notice"> <!--notice start  -->
            <div class="row">
                <div class="col-md-12">
                   
                    <!-- <div class="panel panel-primary news_back">
                        <div class="panel-heading">NEWS AND EVENTS
                        </div>
                        <div class="panel-body">
                           <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">Candidates can now check their admission status.</marquee>
                        </div>
                    </div> -->
                   
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
                                <input class="btn btn-warning" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/mtech/Adm_mtech_complain_register'" value="Complain Register" />
                                <input class="btn btn-primary" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/mtech/Adm_mtech_complain_register/track_status'" value="Tracking Complain" />
                                <input class="btn btn-danger" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/mtech/Adm_mtech_registration/logout'" value="Logout" />
                                    
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
                        <div class="panel-heading">Please proceed for payment
                        </div>
                        <div class="panel-body">
                            <section class="signup-step-container">
                                <div class="">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-12">
                                            <div class="wizard">
                                                <div class="wizard-inner">
                                                    <div class="connecting-line"></div>
                                                    <ul class="nav nav-tabs" role="tablist">
                                                        <li role="presentation" class="disabled"> <a href="#"><span class="round-tab">PD </span> <i>Personal details</i></a>
                                                           
                                                        </li>
                                                        <li role="presentation" class="disabled">
                                                            <a href="#"><span class="round-tab">QN</span> <i>Qualification</i></a>
                                                        </li>
                                                        <li role="presentation" class="disabled">
                                                            <a href="#" ><span class="round-tab">WE</span> <i>Work Experience</i></a>
                                                        </li>
                                                        <li role="presentation" class="disabled">
                                                            <a href="#"><span class="round-tab">DU</span> <i>Document upload</i></a>
                                                        </li>
                                                        <li role="presentation" class="active">
                                                            <a href="#step5" data-toggle="tab" aria-controls="step5" role="tab"><span class="round-tab">PT</span> <i>Payment</i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- <form role="form" action="index.html" class="login-box register"> -->
                                                    <div class="tab-content" id="main_form">
                                                        <!-- first tab personal detail start -->
        
                                                       
                                                        <!-- fifth tab Payment start -->
                                                        <div class="tab-pane active" role="tabpanel" id="step5">
                                                            <h4 class="text-center" style="text-decoration: underline;">Payment Details</h4>
                                                             <div class="row">
                                                             
                                                                  <div class="col-md-12" class="text-center">
                                                                        
                                                                        <div>
                                                                        <?php if($this->session->flashdata('msg')){?>
                                                                        <div class="alert alert-danger alert-dismissible">
                                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                        <strong>Info!</strong> <?php echo $this->session->flashdata('msg')?>
                                                                        </div> 
                                                                        <?php }?>
                                                                        <h4 class='alert alert-warning'>Alert : if amount is debited but transaction failed then wait for T + 3 working days excluding Saturday,Sunday and Holidays. </h4>
                                                                        </div>
                                                                       
                                                                        <?php if($this->session->flashdata('success')){?>
                                                                        <div class="alert alert-success alert-dismissible">
                                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                        <strong>Info!</strong> <?php echo $this->session->flashdata('success')?>
                                                                        </div> 
                                                                        <?php }?>
                                                                        <?php if($this->session->flashdata('error')){?>
                                                                        <div class="alert alert-danger alert-dismissible">
                                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                        <strong>Info!</strong> <?php echo $this->session->flashdata('error')?>
                                                                        </div> 
                                                                        <?php }?>
                                                                        <div class="table-responsive"> 
                                                                        <?php 
                                                                           $attributes = array('class' => 'formd', 'id' => 'p_details','name'=>'p_details','enctype'=>'multipart/form-data');
                                                                           echo form_open('admission/mtech/Adm_mtech_payment/proceed_to_payment', $attributes); ?>
                                                                                <table class="table table-striped table-hover">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                           
                                                                                            <!-- <td  style="font-size:15px; font-weight: bold;" class="alert alert-danger" width="50%">Order No : <?php if(!empty($personal_details)){ echo $order_no; }?><input type="hidden" name="order_no" value="<?php if(!empty($personal_details)){ echo $order_no; } ?>"></td> -->
                                                                                            <td  style="font-size:15px; font-weight: bold;" class="alert alert-success" width="50%">Date : <?php echo date("d-m-Y"); ?><input type="hidden" name="dt"></td>
                                                                                            <td style="font-size:15px; font-weight: bold;" width="50%">Fee :<?php if(!empty($personal_details)){ echo $personal_details[0]['application_fee']; }?><input type="hidden" name="fee_to_be_paid" value="<?php if(!empty($personal_details)){ echo $personal_details[0]['application_fee']; }?>"></td>
                                                                                           
                                                                                            </tr>
                                                                                            <tr>
                                                                                            <td style="font-size:15px; font-weight: bold;" width="50%">Name : <?php if(!empty($personal_details)){ echo $personal_details[0]['first_name']." ".$personal_details[0]['middle_name']." ".$personal_details[0]['last_name']; }?></td>
                                                                                            <td style="font-size:15px; font-weight: bold;" width="50%">Email ID : <?php if(!empty($personal_details)){ echo $personal_details[0]['email']; }?>
                                                                                            <input type="hidden" name="first_name" value="<?php if(!empty($personal_details)){ echo $personal_details[0]['first_name']; }?>">
                                                                                            <input type="hidden" name="middle_name" value="<?php if(!empty($personal_details)){ echo $personal_details[0]['middle_name']; }?>">
                                                                                            <input type="hidden" name="last_name" value="<?php if(!empty($personal_details)){ echo $personal_details[0]['last_name']; }?>">
                                                                                            <input type="hidden" name="category" value="<?php if(!empty($personal_details)){ echo $personal_details[0]['category']; }?>">
                                                                                            <input type="hidden" name="dob" value="<?php if(!empty($personal_details)){ echo $personal_details[0]['dob']; }?>">
                                                                                            <input type="hidden" name="email" value="<?php if(!empty($personal_details)){ echo $personal_details[0]['email']; }?>"></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                            <td style="font-size:15px; font-weight: bold;" width="50%">Contact No : <?php if(!empty($personal_details)){ echo $personal_details[0]['mobile']; }?><input type="hidden" name="contact_no" value="<?php if(!empty($personal_details)){ echo $personal_details[0]['mobile']; }?>"></td>
                                                                                            <td style="font-size:15px; font-weight: bold;" width="50%">Registration : <?php if(!empty($personal_details)){ echo $personal_details[0]['registration_no']; }?><input type="hidden" name="reg_id" value="<?php if(!empty($personal_details)){ echo $personal_details[0]['registration_no']; }?>"></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                            <td style="font-size:15px; font-weight: bold;" width="50%">Category : <?php if(!empty($personal_details)){ echo $personal_details[0]['category']; }?></td>
                                                                                            <td style="font-size:15px; font-weight: bold;" width="50%">D.O.B : <?php if(!empty($personal_details)){ echo $personal_details[0]['dob']; }?></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                           
                                                                        </div>
                                                                        <div class="table-responsive">   
                                                                            <table class="table table-striped table-hover" cellpadding="0" style="font-size:15px; font-weight: bold; backgroud" cellspacing="0">
                                                                                <tr>
                                                                                
                                                                                <th>Sl.No</th>
                                                                                <th> Programme Applying For</th>
                                                                                <th>Amount</th>
                                                                            
                                                                                </tr>
                                                                                <tbody>
                                                                                  <?php 
                                                                                    $i=1;
                                                                                    foreach($program_apply as $row)
                                                                                    {?>
                                                                                        <tr>
                                                                                            <td><?php echo $i;?></td>
                                                                                            <td><?php echo $row['program_desc'];?></td>
                                                                                            <td><?php echo $row['fee_amount'];?></td>
                                                                                        
                                                                                        </tr>
                                                                                     <?php  $i++;
                                                                                    }
                                                                                    ?>
                                                                                </tbody>
                                                                            </table>
                                                                            <div style="margin-bottom: 67px;">
                                                                                <center><h5>Total Amount To be Paid:<?php if(!empty($personal_details)){ echo $personal_details[0]['application_fee']; }?></h5></center>
                                                                            </div>
                                                                        </div>
                                                                  </div>
                                                             </div>
                                                             <div class="row">
                                                                <div class="col-md-3 col-sm-3 col-lg-3 col-md-offset-3">
                                                                    <div class="form-group">
                                                                        <label class="text-center">Payment Gateway Mode: <span style="color:red;">*</span></label>
                                                                       
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-lg-4">
                                                                    <div class="form-group">
                                                                        
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-hand-right"></i></span>
                                                                            
                                                                            <select class="form-control" id="pay_mode" name="pay_mode" required>
                                                                                <option value="">Select Payment Gateway Mode</option> 
                                                                                <option value="Sbi" <?php echo  set_select('pay_mode', 'SBI'); ?>>SBI</option>
                                                                                <!-- <option value="Hdfc" <?php echo  set_select('pay_mode', 'HDFC');?>>HDFC</option> -->
                                                                            </select>

                                                                            <?php if(validation_errors()){?>
                                                                            <div class ="myalert">
                                                                            <?php echo form_error('pay_mode') ?>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                             </div>
                                                             <!-- Term & condition modal -->
                                                             <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                                                                            <!-- <span aria-hidden="true">&times;</span> -->
                                                                            </button>
                                                                        </div>

                                                                    <h4><center><strong>Payment</strong> <strong style="color:green">Form</strong></center></h4>
                                                                    <div class="panel panel-info">
                                                                        <div class="panel-body">
                                                                        
                                                                    <p>
                                                                    <b>
                                                                    Name :  <?php if(!empty($personal_details)){ echo $personal_details[0]['first_name']." ".$personal_details[0]['middle_name']." ".$personal_details[0]['last_name']; }?><br>
                                                                    Amount : <?php if(!empty($personal_details)){ echo $personal_details[0]['application_fee']; }?>
                                                                    </b>
                                                                    </p>

                                                                    <h5><center><u>Terms & Conditions</u></center></h5>

                                                                    <p>
                                                                        <h5> 1. Candidate should go through the detailed notification and ensure the eligibility before making payment.</h5> 
                                                                        <h5> 2. For any payment related issue, please register a complaint which is provided in applicant home dashboard within seven days of payment. Any kind of requests beyond these 7 days period will not be entertained. The refund process for double payment cases will be initiated in due course of time after receiving the complaint and after proper verification at IIT(ISM). This is applicable only in case of multiple payments by a candidate.</h5> 
                                                                        <h5> 3. If the money is deducted from the candidate’s account during the process of making payment towards the application fee and the receipt is not generated, the candidates are requested to wait for three working days. In case the data is not uploaded on their portal,  they may register complain as mentioned above. In case of Failed transaction the candidate can contact their bank for refund.</h5>  

                                                                    </p>

                                                                    </div>
                                                                    </div>

                                                                        <label class="control-label"></label>
                                                                    <input type="checkbox" name="modal_ck" id="modal_ck" required><strong> I accept Terms & conditions</strong>
                                                                    <?php // echo form_error('check1'); ?>
                                                                    <br><br>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                   <!-- Term & condition modal -->
                                                            <ul class="text-center">
                                                                <li style="list-style: none;"><button type="submit" class="default-btn next-step">Proceed to payment</button></li>
                                                                
                                                            </ul>
                                                            </form>
                                                        </div>
                                                        <!-- fifth tab Payment end-->
                                                        <div class="clearfix"></div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">Candidates can now check their admission status.</marquee> -->
                        </div> <!-- panel body end  -->
                    </div>  <!-- panel end  -->
                    <!--end  -->
                </div><!--home col-md-12 end  -->
            </div><!--home row end  -->
        </div><!--home end  -->
    </div><!--row col-md-8 end  -->
    <div class="col-sm-2"> <!--row col-md-2 start  -->
        <div class="notice"> <!--notice start  -->
            <div class="row">
                <div class="col-md-12">
                    <!--start  -->
                    <div class="panel panel-primary news_back">
                        <div class="panel-heading">Applicant home
                        </div>
                        <div class="panel-body">
                        <input class="btn btn-info" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/mtech/Adm_mtech_applicant_home'" value="Back applicant home" />
                        </div>
                    </div>
                    <!--end  -->
                </div>
            </div>
        </div><!--notice end -->
    </div> <!--row col-md-2 end  -->
</div><!--row start  -->
<script type="text/javascript" src="<?php echo base_url();?>themes/dist/js/mtech/adm_mtech_education.js"></script>
<script type="text/javascript">
function disableF5(e) { if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) e.preventDefault(); };

$(document).ready(function(){
     $(document).on("keydown", disableF5);
});
</script>

<script type="text/javascript">
    $(window).on('load', function() {
        $('#myModal').modal('show');
    });

    $('#modal_ck').click(function() {
    $('#myModal').modal('hide');
});

$('#myModal').modal({
    backdrop: 'static',
    keyboard: false
})


</script>








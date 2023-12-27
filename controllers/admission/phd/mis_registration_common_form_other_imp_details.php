<link rel="stylesheet" href="<?php echo base_url()."assets/css/multi_step.css" ?>">

<style>
  #error_form_val p {
    font-size: 12px;
    color:red !important;
  }
  #error_remove_file {
    font-size: 12px;
    color:red !important;
    display:none !important;
  }
</style>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2 id="heading">Registration Form</h2>
                <!-- <p>Fill all form field to go to next step</p> -->

                    <!-- progressbar -->

                    <ul id="progressbar">
                        <li id="personal"><strong>Personal Details</strong></li>
                        <li id="education"><strong>Education Details</strong></li>
                        <li id="parent"><strong>Parent Account Details</strong></li>
                        <li id="personal" class="active">Student Other Important Details</li>
                        <!-- <li id="confirm"><strong>Finish</strong></li> -->
                    </ul>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> <br> <!-- fieldsets -->
                    <fieldset>
                    <form id="msform" class="form-horizontal" method="post" accept-charset="utf-8" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/admission/phd/Adm_phd_mis_registration_education/mis_registration_save_education_details">
                    <h3 align="center">Important Information for Hostel</h3>
    <div class="panel panel-default">
    <div class="panel-body">

    <input type="hidden" class="form-control" name="institute_name" value='IIT(ISM) DHANBAD' readonly>
      <input type="hidden" name="admn_no" value = "<?php echo $admn_no; ?>">
      <input type="hidden" name="admn_type" id="admn_type" value="<?php echo $admn_type; ?>">

    <div class="form-group row">
    <div class="required">
      <label class="control-label col-sm-2" for="food_habit">Food Habit:</label>
      </div>
      <div class="col-xs-4">
      <select class="form-control" name="food_habit" required>
      <option>select</option>
      <option value="veg" <?php echo set_select('food_habit', 'veg'); ?>>Veg</option>
      <option value="non-veg" <?php echo set_select('food_habit', 'non-veg'); ?>>Non-Veg</option>
      <option value="NA" <?php echo set_select('food_habit', 'NA'); ?>>NA</option>
      </select>
     <?php echo form_error('food_habit'); ?>
   </div>

   <label class="control-label col-sm-2" for="laptop_make">if Having laptop(Give Details):Make</label>
      <div class="col-xs-4">
      <input type="text" class="form-control" name="laptop_make" value="<?php echo set_value('laptop_make'); ?>" placeholder="">

   </div>

    </div>

    <div class="form-group row">
      <label class="control-label col-sm-2" for="laptop_model">Model No:</label>
      <div class="col-xs-4">
      <input type="text" class="form-control" name="laptop_model" value="<?php echo set_value('laptop_model'); ?>" placeholder="">

   </div>

   <label class="control-label col-sm-2" for="laptop_sl_no">Serial number:</label>
      <div class="col-xs-4">
      <input type="text" class="form-control" name="laptop_sl_no" value="<?php echo set_value('laptop_sl_no'); ?>" placeholder="">

   </div>

    </div>

   </div>
   </div>
<!-- End Hostel info -->

<!-- Email Registration || IITISM Email -->
<h3 align="center">Email Registration </h3>
<h5 align="center">( Your email will be created On IITISM domain , adm_no@iitism.ac.in )</h5>
<h5 align="center" >
Your default temporary password is shown in the form, all official communication will be sent on your this email only.
</h5>
<!-- <h5 align="center">Ex :  abc@deptcode.iitism.ac.in ( You have only enter abc ) </h6> -->
    <div class="panel panel-default">
    <div class="panel-body">


    <div class="form-group row">
    <div class="required">
      <label class="control-label col-sm-2" for="iitism_email">Email Username:</label>
    </div>
      <div class="col-xs-4">
<input type="text" class="form-control" name="iitism_email" value="admission_no@iitism.ac.in"  placeholder="Enter admission_no" required readonly>
<!-- pattern="[^@'\x22\s]+" -->

   </div>
   <div class="required">
   <label class="control-label col-sm-2" for="iitism_password">Email Password:</label>
   </div>
      <div class="col-xs-4">
<input type="text" class="form-control" name="iitism_password" value="<?php echo $contact_no; // set_value('iitism_password'); ?>" minlength="8" maxlength="8" placeholder="Temporary Password" required readonly>

   </div>

    </div>

   </div>
   </div>
<!-- End Email Registration || IITISM Email -->


<!--4th Block -->
 <h3 align="center">Fee Details</h3>
    <div class="panel panel-default">


    <div class="panel-body">
    <!-- 5th line -->
    <div class="form-group row required">
      <label class="control-label col-sm-2" for="fee_amount">Fee Amount:</label>
      <div class="col-xs-4">
      <input type="text" class="form-control" name="fee_amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" value="<?php echo $fee_to_be_paid; //set_value('fee_amount'); ?>" placeholder="In Rupees(without comma)" required readonly>

     <?php echo form_error('fee_amount'); ?>
   </div>

      <label class="control-label col-sm-2" for="fee_date">Fee date:</label>
      <div class="col-xs-4">
        <div class="input-group date">
    <input class="form-control" name="fee_date" type="text" value="<?php echo date('d/m/Y', strtotime($fee_payment_at)); //set_value('fee_date'); ?>"  required readonly/>
    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
    <!--<input class="form-control" type="text" ="fee_date">-->
    <!--
    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>-->
    <?php echo form_error('fee_date'); ?>
</div>



    </div>
    <!-- 6th line-->
    <div class="form-group row required">
      <label class="control-label col-sm-2" for="fee_mode">Fee Mode:</label>
      <div class="col-xs-4">
  <select class="form-control" name="fee_mode"  required readonly>
    <option name="fee_mode" value='online' <?php if(isset($fee_mode)) echo ($fee_mode== 'online') ?  "selected" : "";?> >Online</option>
    <option name="fee_mode" value='dd' <?php if(isset($fee_mode)) echo ($fee_mode== 'dd') ?  "selected" : "";?> >DD</option>
    <option name="fee_mode" value='cash' <?php if(isset($fee_mode)) echo ($fee_mode== 'cash') ?  "selected" : "";?> >Cash</option>
    <option name="fee_mode" value='none' <?php if(isset($fee_mode)) echo ($fee_mode== 'none') ?  "selected" : "";?> >None</option>
  </select>

</div>


      <label class="control-label col-sm-2" for="transaction_id">Transaction Id:</label>
      <div class="col-xs-4">

      <input type="text" class="form-control" name="transaction_id" value="<?php echo $fee_order_no; // set_value('transaction_id'); ?>" required readonly>

       <?php echo form_error('transaction_id'); ?>
     </div>
    </div>

     <div class="form-group row required">
      <label class="control-label col-sm-2" for="receipt">Receipt:</label>
  <div class="col-xs-4">
  <!--
             <div class="input-group">
  <span class="input-group-btn">
    <span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();">Browse</span>
    <input name="receipt" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());" style="display: none;" type="file"  value="<?php //echo set_value('receipt'); ?>">
  </span>
  <span class="form-control"></span>
</div>-->
<input type="hidden" name="receipt" id="receipt" value="<?php echo $receipt_name_order_no; ?>" >

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  View Receipt
</button>
<!-- <a class="form-control" href="<?php //echo base_url($receipt_path) ?>">View Receipt</a> -->

      <!-- <input type="file" name="receipt" value="<?php // echo set_value('receipt'); ?>" required>
      <p style="color:#0000FF;font-size:12px;">Size should be less than 200KB and format should be pdf.</p>
 <?php // if(isset($receipt_error)) echo '<p style="color:red;font-size:12px;">'.$receipt_error.'</p>'; ?> -->

</div>
    </div>


  </div>
</div>

<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx User Account Details xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<?php if($admn_type!='jee') { ?>
<h3 align="center">Student Account Details</h3>
    <div class="panel panel-default">
    <div class="panel-body">

    <div class="form-group row">
    <div class="required">
      <label class="control-label col-sm-2" for="user_bank_name">Bank Name:</label>
      </div>
      <div class="col-xs-4">
      <input type="text" class="form-control" name="user_bank_name" value="<?php echo set_value('user_bank_name'); ?>" placeholder="Enter bank name" required>
     <?php echo form_error('food_habit'); ?>
   </div>

   <div class="required">
   <label class="control-label col-sm-2" for="user_account_no">Account No:</label>
   </div>
      <div class="col-xs-4">
      <input type="number" class="form-control" name="user_account_no" id="user_account_no" value="<?php echo set_value('user_account_no'); ?>" placeholder="Enter account no" required>

   </div>

    </div>

    <div class="form-group row">
    <div class="required">
      <label class="control-label col-sm-2" for="c_user_account_no">Confirm Account No:</label>
      </div>
      <div class="col-xs-4">
      <input type="number" class="form-control" name="c_user_account_no" id="c_user_account_no" value="<?php echo set_value('c_user_account_no'); ?>" placeholder="Enter confirm account no" required>

   </div>

   <div class="required">
   <label class="control-label col-sm-2" for="user_ifsc_code">IFSC Code:</label>
   </div>
      <div class="col-xs-4">
      <input type="text" class="form-control" name="user_ifsc_code" value="<?php echo set_value('user_ifsc_code'); ?>" placeholder="Enter ifsc code" required>

   </div>

    </div>

   </div>
   </div>
   <?php } ?>
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx User Account Details xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->

<div class="row" >
  <div class="col-sm-10 required" >
    <label class="control-label"></label>
  <input type="checkbox" name="check1" required><strong> I hereby declare that all the above  information given by me is true and correct to the best of my knowledge and belief.</strong>
  <?php echo form_error('check1'); ?>
</div>
</div>
<h4 style="color:red;">Important Notes:-</h4>
<h5 align="left">For domain email all terms and conditions applied on domain email users of IIT (ISM) will also be applicable on you.</h5>
<h5 align="left">Fee Details : If you are a sponsored candidate please upload, self attested paper or sponsorship certificate and amount 0 , Transaction id 0, Select today's date</h5>
  <h5 align="left">In Case of any issue while filling this form please send the details including your mobile no with screenshot to <b>concerned admission committee</b></h5>
  <h5 align="left">In Case your Date of Birth is showing wrong please submit print out of this form alongwith proof of your DoB in the Office of DR (Academic) after your admission process is over </h5>
  <h5 align="left">Parent Mobile no and Bank Account no is used in parent portal also, all parents are requested to give their mobile no and remember both mobile no and account no. </h5>
   <h5 align="left">Your Admission Number will become your MIS(Our Inhouse ERP is know as MIS) user name and your <?php if($admn_type!='jee'){?>Registration ID<?php }else{?>JEE Main Roll No<?php }?> will be your default password. In case you have any issue with your password you may contact at Computer Centre with ID Proof </h5>
   <h5 align="left">Parent A/c no and Mobile no will be used as credentials of parent portal and parent can use this portal for various purposes. It is ,therefore, requested to please remember these nos for future use.</h5>
   <br>


                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    <input type="submit" name="next" class="next action-button" value="Next" />

                    </form>
                </fieldset>


</div>
</div>
</div>
</div>

<link rel="stylesheet" href="<?php echo base_url()."assets/css/multi_step.css" ?>">
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/#[[latestVersion]]#/mdb.min.css"
  rel="stylesheet"
/>

<style>
    #error_field p {
        color:red !important;
        font-size:14px;
    }

    #error_form_val p {
    font-size: 12px;
    color:red !important;
  }
</style>

<!-- <script src="<?= base_url() ?>assets/js/multi_step.js"></script> -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/#[[latestVersion]]#/mdb.min.js"
></script>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2 id="heading">Registration Form</h2>

                <?php
if($this->session->flashdata('flashError'))
{
    $message = $this->session->flashdata('flashError');
    //echo $message['success'];
?>
<center>
<div class="alert alert-danger alert-dismissible" style="width:65%;" role="alert">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error!</strong>
<?php echo $message; ?>
</div>
</center>
<?php
} elseif($this->session->flashdata('flashSuccess')){

    $message = $this->session->flashdata('flashSuccess');
    //echo $message['success'];
?>
<center>
<div class="alert alert-success alert-dismissible" style="width:65%;" role="alert">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Success!</strong>
<?php echo $message; ?>
</div>
</center>
<?php
}
?>

                <!-- <p>Fill all form field to go to next step</p> -->
                <form id="msform" class="form-horizontal" method="post" accept-charset="utf-8" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/admission/phdpt/Adm_phdpt_mis_registration_education/mis_reg_save_parent_details" onsubmit="return submitForm(this);">
                    <!-- progressbar -->

                    <ul id="progressbar">
                    <li id="personal"><strong>Personal Details</strong></li>
                        <!--<li id="education" class="active"><strong>Education Details</strong></li>
                        <li id="parent"><strong>Parent Account Details</strong></li>
                        <li id="confirm"><strong>Finish</strong></li> -->
                        <li id="education"><strong>Education Details</strong></li>
                        <li id="parent" class="active"><strong>Parent Account Details</strong></li>
                        <li id="parent"><strong>Student Other Important Details</strong></li>
                        <li id="personal"><strong>Form Preview</strong></li>
                    </ul>
                    <!-- <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="25"></div>
                    </div>  -->

                    <br> <!-- fieldsets -->

    <fieldset>
                        <div class="form-card">
                            <!-- <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Personal Information:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 2 - 4</h2>
                                </div>
                            </div> -->
                            <h3 align="center">Parent Details</h3>
    <!--2nd Block-->
<div class="panel panel-default">
<!---------------------------                    ------------------------------------------->
  <div class="panel-body">

      <input type="hidden" class="form-control" name="institute_name" value='IIT(ISM) DHANBAD' readonly>
      <input type="hidden" name="admn_no" value = "<?php echo $admn_no; ?>">
      <input type="hidden" name="admn_type" id="admn_type" value="<?php echo $admn_type; ?>">

   <div class="form-group row required">

      <label class="control-label col-md-2" for="father_name">Father's Name:</label>
      <div class="col-md-4">
      <input type="text"  class="form-control" name="father_name" value="<?php if($get_mis_reg_parent_details[0]['father_name'] != ''){ echo $get_mis_reg_parent_details[0]['father_name']; } else { echo set_value('father_name', $father_name); } ?>" required>

      <span id="error_form_val"><?php echo form_error('father_name'); ?></span>
     </div>
      <label class="control-label col-md-2" for="mother_name">Mother's Name:</label>
      <div class="col-md-4">
      <input type="text"  class="form-control" name="mother_name" value="<?php if($get_mis_reg_parent_details[0]['mother_name'] != ''){ echo $get_mis_reg_parent_details[0]['mother_name']; } else { echo set_value('mother_name', $mother_name); } ?>" required>


      <span id="error_form_val"><?php echo form_error('mother_name'); ?></span>
     </div>

    </div>


    <div class="form-group row required">

      <label class="control-label col-md-2" for="father_occupation">Father's Occupation:</label>
      <div class="col-md-4">
      <input type="text"  class="form-control" name="father_occupation" value="<?php if($get_mis_reg_parent_details[0]['father_occupation'] != ''){ echo $get_mis_reg_parent_details[0]['father_occupation']; } else {  echo set_value('father_occupation'); } ?>" required>

      <span id="error_form_val"><?php echo form_error('father_occupation'); ?></span>
     </div>
      <label class="control-label col-md-2" for="mother_occupation">Mother's Occupation:</label>
      <div class="col-md-4">
      <input type="text"  class="form-control" name="mother_occupation" value="<?php if($get_mis_reg_parent_details[0]['mother_occupation'] != ''){ echo $get_mis_reg_parent_details[0]['mother_occupation']; } else { echo set_value('mother_occupation'); } ?>" required>


      <span id="error_field"><?php echo form_error('mother_occupation'); ?></span>
     </div>

    </div>

     <div class="form-group row required">
      <label class="control-label col-md-2" for="father_income">Father's Income(yearly):</label>
      <div class="col-md-4">
      <input type="text"  class="form-control" name="father_income" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" value="<?php if($get_mis_reg_parent_details[0]['father_income'] != ''){ echo $get_mis_reg_parent_details[0]['father_income']; } else {  echo set_value('father_income'); } ?>"placeholder="In Rupees(without comma)" required>


      <span id="error_field"><?php echo form_error('father_income'); ?></span>
     </div>
      <label class="control-label col-md-2" for="mother_income">Mother's Income(yearly):</label>
      <div class="col-md-4">
        <input type="text"  class="form-control" name="mother_income" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" value="<?php if($get_mis_reg_parent_details[0]['mother_income'] != ''){ echo $get_mis_reg_parent_details[0]['mother_income']; } else {echo set_value('mother_income'); }?>" placeholder="In Rupees(without comma)" required>

        <span id="error_field"><?php echo form_error('mother_income'); ?></span>
     </div>
    </div>


     <div class="form-group row required">
      <label class="control-label col-md-2" for="parent_mobile_no">Parent Mobile Number: ( Cannot be changed and used in Parent portal also)</label>
      <div class="col-md-4">

      <input type="text"  class="form-control" name="parent_mobile_no" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" value="<?php if($get_mis_reg_parent_details[0]['parent_mobile_no'] != ''){ echo $get_mis_reg_parent_details[0]['parent_mobile_no']; } else { echo set_value('parent_mobile_no'); } ?>" placeholder="10 digit Mobile Number" required>


       <span><?php echo form_error('parent_mobile_no'); ?></span>
     </div>
      <label class="control-label col-md-2" for="parent_email_id">Parent Email Id:</label>
      <div class="col-md-4">
       <input type="text"  class="form-control" name="parent_email_id" value="<?php if($get_mis_reg_parent_details[0]['parent_email_id'] != ''){ echo $get_mis_reg_parent_details[0]['parent_email_id']; } else { echo set_value('parent_email_id'); } ?>" required>

       <span id="error_field"><?php echo form_error('parent_email_id'); ?></span>
     </div>
    </div>


     <div class="form-group row">
        <label class="control-label col-md-2" for="guardian_name">Guardian Name:</label>
      <div class="col-md-4">
         <input type="text"  class="form-control" name="guardian_name" value="<?php if($get_mis_reg_parent_details[0]['guardian_name'] != ''){ echo $get_mis_reg_parent_details[0]['guardian_name']; } elseif($guardian_name != ''){ echo $guardian_name; } else { echo set_value('guardian_name'); } ?>" >

         <span id="error_field"><?php echo form_error('guardian_name'); ?></span>
</div>
      <label class="control-label col-md-2" for="guardian_relation">Guardian Relation:</label>
      <div class="col-md-4">
         <input type="text"  class="form-control" name="guardian_relation" value="<?php if($get_mis_reg_parent_details[0]['guardian_relation'] != ''){ echo $get_mis_reg_parent_details[0]['guardian_relation']; } elseif($guardian_relation != ''){ echo $guardian_relation;} else { echo set_value('guardian_relation'); } ?>" >


         <span id="error_field"><?php echo form_error('guardian_relation'); ?></span>
    </div>
  </div>


   <div class="form-group row">
      <label class="control-label col-md-2" for="alternate_mobile_no">Alternate Mobile No:</label>
      <div class="col-md-4">
         <input type="text"  class="form-control" name="alternate_mobile_no" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" value="<?php if($get_mis_reg_parent_details[0]['alternate_mobile_no'] != ''){ echo $get_mis_reg_parent_details[0]['alternate_mobile_no']; } else { echo set_value('alternate_mobile_no'); } ?>" placeholder="10 digit Mobile Number">

         <span id="error_field"><?php echo form_error('alternate_mobile_no'); ?></span>
     </div>

      <label class="control-label col-md-2" for="alternate_email_id">Alternate Email Id:</label>
      <div class="col-md-4">
        <input type="text"  class="form-control" name="alternate_email_id" value="<?php if($get_mis_reg_parent_details[0]['alternate_email_id'] != ''){ echo $get_mis_reg_parent_details[0]['alternate_email_id']; } else { echo set_value('alternate_email_id'); } ?>" >

        <span id="error_field"><?php echo form_error('alternate_email_id'); ?></span>
      </div>
    </div>

    </div>
  </div>
</div>
                        <input type="submit" name="next" class="next action-button" value="Next" />
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>

                    <br><br>

                    </form>
            </div>
        </div>
    </div>
</div>

<script>
  //$("#next_submit").find('[type="submit"]').trigger('click');
      function submitForm(form) {
      if (confirm("Are You Sure , you want to submit Parent Details ?")){
          form.submit();
      }
      else{
        event.preventDefault();
        return false;
      }
      //return false;
    }
</script>

<script>
  $(document).ready(function(){
    $(".previous").click(function(){
      window.location.href = "<?php echo base_url().'index.php/admission/phdpt/Adm_phdpt_mis_registration_education/manage_previous_education_details'; ?>";
    });
  });
</script>
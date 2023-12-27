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

  .form-horizontal .form-group {
  margin-right: -10px !important;
  margin-left: -10px !important;
}
</style>

<!-- <?php echo  'reached here2'; ?> -->

<div class="container-fluid">
    <div class="row">


    <div class="col-sm-2 col-md-2 col-lg-2">
        <div class="info">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="panel panel-primary news_back">
                        <div class="panel-heading">Activity
                        </div>
                        <div class="panel-body">


                            <div class="row" style="margin-top:5px;">
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <!-- <button class="btn btn-info" style="width:100%;"><a href="<?php echo base_url() ?>index.php/admission/Adm_mba_application_preview/"><b style="text-decoration: none; color: white;">My Application Status</b></a> </button> -->
                                    <!-- <input class="btn btn-info" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/phdef/Adm_phdef_applicant_home'" value="Back to Applicant Home"/> -->
                                    <input class="btn btn-danger" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/phdef/Adm_phdef_registration/logout'" value="Logout"/>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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

                    <!-- progressbar -->

                    <ul id="progressbar">
                        <li id="personal"><strong>Personal Details</strong></li>
                        <!--<li id="education" class="active"><strong>Education Details</strong></li>
                        <li id="parent"><strong>Parent Account Details</strong></li>
                        <li id="confirm"><strong>Finish</strong></li> -->
                        <li id="education" class="active"><strong>Education Details</strong></li>
                        <li id="parent"><strong>Parent Account Details</strong></li>
                        <li id="parent"><strong>Student Other Important Details</strong></li>
                        <li id="personal"><strong>Form Preview</strong></li>
                    </ul>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> <br> <!-- fieldsets -->
                    <fieldset>
                    <form id="msform" class="form-horizontal" method="post" accept-charset="utf-8" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/admission/phdef/Adm_phdef_mis_registration_education/mis_registration_save_education_details" onsubmit="return submitForm(this);">
                        <div class="form-card">
                            <div class="row">
                                <!-- <div class="col-7">
                                    <h2 class="fs-title">Account Information:</h2>
                                </div> -->
                                <!-- <div class="col-5">
                                    <h2 class="steps">Step 1 - 4</h2>
                                </div> -->
                            </div>
                            <h3 align="center">Education Details </h3>
<p align="center"><b>Please do not use Autofill. </p>

                           <div class="panel panel-default">
   <div class="panel-heading" id="disabledbutton" >

   <div class="form-group">
      <label class="control-label col-md-2" for="admn_based_on">Admission Based on:<strong  style="color: red;">*</strong></label>
      <div class="col-md-4">
        <?php if($admn_type=='jee') {?>
      <input type="text" class="form-control" name="admn_based_on" value="<?php echo strtoupper ($admn_based_on); ?>" readonly>
       <?php }
    else if($admn_type=='msc'){?>
       <input type="text" class="form-control" name="admn_based_on" value="<?php echo strtoupper ($admn_based_on); ?>" readonly>
         <?php }
    else if($admn_type=='msctech'){?>
       <input type="text" class="form-control" name="admn_based_on" value="<?php echo strtoupper ($admn_based_on); ?>" readonly>
       <?php }
    else if($admn_type=='mba'){ ?>
      <input type="text" class="form-control" name="admn_based_on" value="<?php echo strtoupper($admn_based_on); ?>" readonly>
         <?php }
    else if($admn_type=='jrf'){?>
      <input type="text" class="form-control" name="admn_based_on" value="<?php echo strtoupper($admn_based_on); ?>" readonly>
       <?php }
    else if($admn_type=='mtech'){?>
      <input type="text" class="form-control" name="admn_based_on" value="<?php echo strtoupper($admn_based_on); ?>" readonly>
       <?php }
    else if($admn_type=='mtech_3yr'){?>
    <input type="text" class="form-control" name="admn_based_on" value="<?php echo strtoupper($admn_based_on); ?>" readonly>
    <?php }
    else if($admn_type=='foreign'){?>
    <input type="text" class="form-control" name="admn_based_on" value="<?php echo strtoupper("OTHERS"); ?>" readonly>
    <?php } ?>

      </div>

      <!-- <?php echo  'reached here2'; ?> -->

      <input type="hidden" class="form-control" name="institute_name" value='IIT(ISM) DHANBAD' readonly>
      <input type="hidden" name="admn_no" value = "<?php echo $admn_no; ?>">
      <input type="hidden" name="admn_type" id="admn_type" value="<?php echo $admn_type; ?>">


    <?php if($admn_type=='jee'){ ?>

      <label class="control-label col-md-2" for="course_code">Course Code:<strong  style="color: red;">*</strong></label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="course_code" value='<?php echo $course_code?>' readonly>
      </div>
    </div>
    <!-- for jee student-->

  <?php }
  else if($admn_type=='msc'){?>
 <label class="control-label col-md-2" for="other_rank">Rank:<strong  style="color: red;">*</strong></label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="other_rank" value='<?php  echo $other_rank;?>' readonly>
      </div>
    </div>
    <?php }
    else if($admn_type=='msctech'){?>

 <label class="control-label col-md-2" for="other_rank">Rank:<strong  style="color: red;">*</strong></label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="other_rank" value='<?php  echo $other_rank;?>' readonly>
      </div>
    </div>
    <?php }
     else if($admn_type=='mtech'){
      //echo 'entered mtech';
      if($admn_based_on=='gate' || $admn_based_on=='spon'){?>
 <label class="control-label col-md-2" for="gate_score">Gate Score:<strong  style="color: red;">*</strong></label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="gate_score" value='<?php echo $gate_score?>' readonly>
      </div>
    </div>
  <?php }
  else if($admn_based_on=='ismee'){?>
     <label class="control-label col-md-2" for="other_rank">Rank:<strong  style="color: red;">*</strong></label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="other_rank" value='<?php echo $other_rank?>' readonly>
      </div>
    </div>
    <?php
       }
       else { ?>
        <div class="form-group">

          <input type="hidden" class="form-control" name="gate_score" value="<?php if($gate_score != ''){ echo $gate_score;} else { echo 0;} ?>">
       <label class="control-label col-md-2" for="other_rank">Rank:<strong  style="color: red;">*</strong></label>
        <div class="col-md-4">
        <input type="text" class="form-control" name="other_rank" maxlength="5" required oninput="this.value = this.value.replace(/[^0-9.]/g, '');" value='<?php if($get_mis_reg_education_details[0]['other_rank'] != '') {
          echo $get_mis_reg_education_details[0]['other_rank'];
        } elseif ($other_rank != '') {
          echo $other_rank;
        } else { /*set_value($other_rank);*/ echo set_value('other_rank'); } ?>'>
         <?php echo form_error('other_rank'); ?>
        </div>
      </div>
  <?php }
     }
    else if($admn_type=='jrf' || $admn_type=='mba'){?>
      <!--
 <label class="control-label col-md-2" for="course_code">Course Code:<strong  style="color: red;">*</strong></label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="course_code" value='<?php //echo $course_code?>'>
      </div>-->

      <label class="control-label col-md-2" for="Department">Department:<strong  style="color: red;">*</strong></label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="department" value='<?php echo $department?>' readonly>
      </div>
    </div><!--row close -->
    <?php } else if($admn_type=='jrf'){ ?>
      <div class="form-group row required">
      <label class="control-label col-md-2" for="branch">Category(JRF):<strong  style="color: red;">*</strong></label>
      <div class="col-md-4">
        <?php echo form_textarea(['name'=>'branch','readonly'=>'readonly','class'=>'form-control','id'=>'branch','rows'=>'3','value'=> strtoupper($branch_id) ] );?> <!-- FULLTIME PARTTIME INSERTED as branch in csv then make it branch_id-->
      </div>
    </div>

    <?php }

    else if($admn_type=='mtech_3yr'){
if($admn_based_on=='gate'){?>
 <label class="control-label col-md-2" for="gate_score">Gate Score:<strong  style="color: red;">*</strong></label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="gate_score" value='<?php echo $gate_score?>' readonly>
      </div>
    </div>
  <?php }
  else if($admn_based_on=='ismee'){?>
     <label class="control-label col-md-2" for="other_rank">Rank:<strong  style="color: red;">*</strong></label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="other_rank" value='<?php echo $other_rank?>' readonly>
      </div>
    </div>
    <?php
       } }
       else {?>
       </div>
       <?php }?>


    <!--  -->
    <?php if($admn_type!='jrf'){?>
     <div class="form-group">
      <label class="control-label col-md-2" for="course">Course:<strong  style="color: red;">*</strong></label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="course" value='<?php echo $course?>' readonly>
      </div>
      <label class="control-label col-md-2" for="branch">Branch:<strong  style="color: red;">*</strong></label>
      <div class="col-md-4">

        <?php echo form_textarea(['name'=>'branch','readonly'=>'readonly','class'=>'form-control','id'=>'branch','rows'=>'3','value'=> $branch] );?>
      </div>
    </div>
  <?php }?>
  </div>
  <div class="panel-body">
  <?php if($admn_type=='jee'){?>
   <div class="form-group">
      <label class="control-label col-md-2" for="iit_jee_rank">JEE Rank:<strong  style="color: red;">*</strong></label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="iit_jee_rank" maxlength="8" oninput="this.value = this.value.replace(/[^0-9.]/g, '');"  value='<?php echo set_value('iit_jee_rank'); ?>'>
      </div>

      <label class="control-label col-md-2" for="iit_jee_cat_rank">JEE Category Rank:<strong  style="color: red;">*</strong></label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="iit_jee_cat_rank" maxlength="8" oninput="this.value = this.value.replace(/[^0-9.]/g, '');"  value='<?php echo set_value('iit_jee_cat_rank'); ?>'>
      </div>
    </div>
<?php }
else if($admn_type=='mba'){

      if($admn_based_on=='cat'){?>
<div class="form-group">
 <label class="control-label col-md-2" for="cat_score">Cat Score:<strong  style="color: red;">*</strong></label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="cat_score" maxlength="5" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" value='<?php if($get_mis_reg_education_details[0]['cat_score'] != ''){ echo $get_mis_reg_education_details[0]['cat_score']; } elseif($cat_score != '') {
        echo $cat_score;
      } else { set_value('cat_score'); } ?>'>
       <?php echo form_error('cat_score'); ?>
      </div>
    </div>
    <?php }
    else { ?>
      <div class="form-group">
     <label class="control-label col-md-2" for="other_rank">Rank:<strong  style="color: red;">*</strong><strong  style="color: red;">*</strong></label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="other_rank" maxlength="5" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" value='<?php echo set_value($other_rank);?>'>
       <?php echo form_error('other_rank'); ?>
      </div>
    </div>
<?php } }

else if($admn_type=='jrf'){
if(strtolower($admn_based_on)=='gate'){?>

<div class="form-group">

        <input type="hidden" class="form-control" name="other_rank" value='0'>
        <input type="hidden" name="gate_score" value="<?php if($gate_score != ''){ echo $gate_score;} else { echo 0;} ?>">
 <label class="control-label col-md-2" for="gate_score">Gate Score:<strong  style="color: red;">*</strong></label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="gate_score_new" disabled maxlength="5" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" value='<?php if($get_mis_reg_education_details[0]['gate_score'] != ''){ echo $get_mis_reg_education_details[0]['gate_score']; } elseif($gate_score != '') {
        echo $gate_score;
      } else { set_value('gate_score'); } ?>'>
       <?php echo form_error('gate_score'); ?>
      </div>
    </div>
    <?php }
    else { ?>
      <div class="form-group">

        <input type="hidden" class="form-control" name="gate_score" value="<?php if($gate_score != ''){ echo $gate_score;} else { echo 0;} ?>">
     <label class="control-label col-md-2" for="other_rank">Rank:<strong  style="color: red;">*</strong><strong  style="color: red;">*</strong></label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="other_rank" maxlength="5" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" value='<?php if($get_mis_reg_education_details[0]['other_rank'] != '') {
        echo $get_mis_reg_education_details[0]['other_rank'];
      } elseif ($other_rank != '') {
        echo $other_rank;
      } else { /*set_value($other_rank);*/ echo set_value('other_rank'); } ?>'>
       <?php echo form_error('other_rank'); ?>
      </div>
    </div>
<?php } }
else if($admn_type=='mtech'){ ?>

    <div class="form-group">
    <label class="control-label col-md-2" for="Department">Department:<strong  style="color: red;">*</strong></label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="department" value='<?php echo $department?>' readonly>
      </div>
      </div>
      <?php }

?>
<br>
<div class="form-group">
 <label class="control-label col-md-2" for="cat_score">ABC ID:<strong  style="color: red;">*</strong></label>
      <div class="col-md-4">
      <input type="text" class="form-control" id="abc_id" name="abc_id" required placeholder="Please Enter the ABC ID" value="<?php if($get_mis_reg_education_details[0]['abc_id'] != '') {
        echo $get_mis_reg_education_details[0]['abc_id'];
      } elseif ($abc_id != '') {
        echo $abc_id;
      } else { /*set_value($other_rank);*/ echo set_value('abc_id'); } ?>">
      <small><span style="margin-top:6px;margin-bottom:5px;font-weight:bold;">Please enter the same ABC ID as in <u>https://www.abc.gov.in/</u> <a target="_blank" href="https://www.abc.gov.in/">Click Here For Further Details</a></span></small>
       <?php echo form_error('abc_id'); ?>
      </div>
    </div>

    <br>

<!-- <?php echo  'reached here'; ?> -->


<!------------------------ 10th Details section Start                        -->
<?php if (!empty($education_details)) { ?>

<h3 align="center">Education Details</h3>
<h5 align="center" style="color:red;"><b>For final UG/PG Marksheet & Degree use "Add Academic"</b></h5>
<h4 align="center">Examination</h4>

<div class="form-group">
<label class="control-label col-md-2">Name of Examination:<strong  style="color: red;">*</strong></label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="specialization0" value="10th<?php echo set_value('specialization0'); ?>" readonly required>

       <?php echo form_error('specialization0'); ?>
     </div>

     <label class="control-label col-md-2">University/Board:<strong  style="color: red;">*</strong></label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="exam0" value="<?php if ($get_mis_reg_prev_edu_details[0]['exam'] != '') {
            echo $get_mis_reg_prev_edu_details[0]['exam'];
        } else { echo set_value('exam0'); } ?>" required>
        <?php echo form_error('exam0'); ?>
     </div>
  </div>

  <div class="form-group">
  <label class="control-label col-md-2" >Year:<strong  style="color: red;">*</strong></label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="year0" maxlength="4" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" value="<?php if ($get_mis_reg_prev_edu_details[0]['year'] != '') {
            echo $get_mis_reg_prev_edu_details[0]['year'];
        } else { echo (!empty($education_details[0]['year_of_passing'])) ? $education_details[0]['year_of_passing']: set_value('year0'); } ?><?php // echo set_value('year0'); ?>" placeholder="Passing Year e.g. 2017" required>
       <?php echo form_error('year0'); ?>
     </div>

      <label class="control-label col-md-2" >Institution/School:<strong  style="color: red;">*</strong></label>
        <div class="col-md-4">
          <input type="text" class="form-control" name="institute0" value="<?php if ($get_mis_reg_prev_edu_details[0]['institute'] != '') {
           echo $get_mis_reg_prev_edu_details[0]['institute'];
          } else { echo (!empty($education_details[0]['institue_name'])) ? $education_details[0]['institue_name']: set_value('institute0'); } ?>" required>
    <?php echo form_error('institute0'); ?>
        </div>
  </div>

     <div class="form-group">

     <label class="control-label col-md-2" >Grade/Percentage:<strong  style="color: red;">*</strong></label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="grade0" value="<?php if ($get_mis_reg_prev_edu_details[0]['grade'] != '') {
       echo $get_mis_reg_prev_edu_details[0]['grade'];
      } else { echo (!empty($education_details[0]['mark_cgpa_percenatge'])) ? $education_details[0]['mark_cgpa_percenatge']: set_value('grade0'); } ?>" required>
       <?php echo form_error('grade0'); ?>
     </div>

     <label class="control-label col-md-2" >Marksheet:<strong  style="color: red;">*</strong></label>
      <div class="col-md-4">

      <?php if(!empty($education_details[0]['doc_path'])) { ?>
        <input type="hidden" name="marksheet0" value="<?php echo 'https://admission.iitism.ac.in/'.$education_details[0]['doc_path']; ?>" >
      <a href="https://admission.iitism.ac.in/<?php echo $education_details[0]['doc_path']; ?>" class="btn btn-primary" target='_blank'>View Marksheet</a>
      <?php }
      else
      { ?>
        <input type="file" name="marksheet0" value="<?php echo set_value('marksheet0'); ?>" required>
      <p style="color:#0000FF;font-size:12px;">Size should be less than 200KB and format should be pdf.</p>
       <?php if(isset($marksheet0_error)) echo '<p style="color:red;font-size:12px;">'.$marksheet0_error.'</p>'; ?>
       <?php
      } ?>

     </div>

    </div>


     <div class="form-group">

     <label class="control-label col-md-2">Division:<strong  style="color: red;">*</strong></label>
      <div class="col-md-4">
      <select class="form-control" name="division0" required>
      <option value="">select</option>
      <option value="First" <?php if ($get_mis_reg_prev_edu_details[0]['division'] == 'First') {
        echo 'selected';
      } else { echo set_select('division0', 'First'); } ?>>First</option>
      <option value="Second" <?php if ($get_mis_reg_prev_edu_details[0]['division'] == 'Second') {
        echo 'selected';
      } else { echo set_select('division0', 'Second'); } ?>>Second</option>
      <option value="Third" <?php if ($get_mis_reg_prev_edu_details[0]['division'] == 'Third') {
        echo 'selected';
      } else { echo set_select('division0', 'Third'); } ?>>Third</option>
      <option value="NA" <?php if ($get_mis_reg_prev_edu_details[0]['division'] == 'NA') {
        echo 'selected';
      } else { echo set_select('division0', 'NA'); } ?>>NA</option>
      </select>
       <?php echo form_error('division0'); ?>
     </div>

     <label class="control-label col-md-2" >Certificate:<strong  style="color: red;">*</strong></label>
      <div class="col-md-4">
      <?php if(!empty($education_details[0]['doc_path'])) { ?>
        <input type="hidden" name="certificate0" value="<?php echo 'https://admission.iitism.ac.in/'.$education_details[0]['doc_path']; ?>" >
      <a href="https://admission.iitism.ac.in/<?php echo $education_details[0]['doc_path']; ?>" class="btn btn-primary" target='_blank'>View Certificate</a>
      <?php }
      else
      { ?>
        <input type="file" name="certificate0" value="<?php echo set_value('certificate0'); ?>" required>
      <p style="color:#0000FF;font-size:12px;">Size should be less than 200KB and format should be pdf.</p>
       <?php if(isset($certificate0_error)) echo '<p style="color:red;font-size:12px;">'.$certificate0_error.'</p>'; ?>
        <?php } ?>
     </div>

   </div>

   <div class="form-group">
   <label class="control-label col-md-2">Major Subjects:<strong  style="color: red;">*</strong></label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="sub0" value="<?php if ($get_mis_reg_prev_cert_details[0]['sub'] != '') {
            echo $get_mis_reg_prev_cert_details[0]['sub'];
        } else {  echo set_value('sub0'); } ?>" required>

       <?php echo form_error('sub0'); ?>
     </div>


    </div>

<h4 align="center">Examination</h4>


<div class="form-group">
<label class="control-label col-md-2">Name of Examination:<strong  style="color: red;">*</strong></label>
  <div class="col-md-4">
  <input type="text" class="form-control" name="specialization1" value="12th<?php echo set_value('specialization1'); ?>" readonly required>
   <?php  echo form_error('specialization1'); ?>
 </div>

  <label class="control-label col-md-2">University/Board:<strong  style="color: red;">*</strong></label>
  <div class="col-md-4">
  <input type="text" class="form-control"  name="exam1" value="<?php if ($get_mis_reg_prev_edu_details[1]['exam'] != '') {
            echo $get_mis_reg_prev_edu_details[1]['exam'];
        } else { echo set_value('exam1'); } ?>" required>
   <?php echo form_error('exam1'); ?>
 </div>

</div>

 <div class="form-group">
  <label class="control-label col-md-2" >Year:<strong  style="color: red;">*</strong></label>
  <div class="col-md-4">
    <input type="text" class="form-control" name="year1" maxlength="4" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" value="<?php  if ($get_mis_reg_prev_edu_details[1]['year'] != '') {
            echo $get_mis_reg_prev_edu_details[1]['year'];
        } else { echo (!empty($education_details[1]['year_of_passing'])) ? $education_details[1]['year_of_passing']: set_value('year1'); } ?>" placeholder="Passing Year e.g. 2019" required>
   <?php echo form_error('year1'); ?>
 </div>

 <label class="control-label col-md-2" >Institution/School:<strong  style="color: red;">*</strong></label>
  <div class="col-md-4">
    <input type="text" class="form-control" name="institute1" value="<?php if ($get_mis_reg_prev_edu_details[1]['institute'] != '') {
           echo $get_mis_reg_prev_edu_details[1]['institute'];
          } else { echo (!empty($education_details[1]['institue_name'])) ? $education_details[1]['institue_name']: set_value('institute1'); } ?>" required>
    <?php echo form_error('institute1'); ?>
</div>

</div>


 <div class="form-group">
  <label class="control-label col-md-2" >Grade/Percentage:<strong  style="color: red;">*</strong></label>
  <div class="col-md-4">
  <input type="text" class="form-control" name="grade1" value="<?php if ($get_mis_reg_prev_edu_details[1]['grade'] != '') {
       echo $get_mis_reg_prev_edu_details[1]['grade'];
      } else {  echo (!empty($education_details[1]['mark_cgpa_percenatge'])) ? $education_details[1]['mark_cgpa_percenatge']: set_value('grade1'); } ?>" required>
   <?php echo form_error('grade1'); ?>
 </div>

 <label class="control-label col-md-2" >Marksheet:<strong  style="color: red;">*</strong></label>
  <div class="col-md-4">
  <?php if(!empty($education_details[1]['doc_path'])) { ?>
    <input type="hidden" name="marksheet1" value="<?php echo 'https://admission.iitism.ac.in/'.$education_details[1]['doc_path']; ?>" >
  <a href="https://admission.iitism.ac.in/<?php echo $education_details[1]['doc_path']; ?>" class="btn btn-primary" target='_blank'>View Marksheet</a>
  <?php }
  else
  { ?>
  <input type="file" name="marksheet1" value="<?php echo set_value('marksheet1'); ?>" required>
  <p style="color:#0000FF;font-size:12px;">Size should be less than 200KB and format should be pdf.</p>
   <?php if(isset($marksheet1_error)) echo '<p style="color:red;font-size:12px;">'.$marksheet1_error.'</p>'; ?>
   <?php } ?>
 </div>

</div>

 <div class="form-group">
  <label class="control-label col-md-2">Division:<strong  style="color: red;">*</strong></label>
  <div class="col-md-4">
    <select class="form-control" name="division1" required>
  <option value="">select</option>
  <option value="First" <?php if ($get_mis_reg_prev_edu_details[1]['division'] == 'First') {
        echo 'selected';
      } else { echo set_select('division1', 'First'); } ?>>First</option>
  <option value="Second" <?php if ($get_mis_reg_prev_edu_details[1]['division'] == 'Second') {
        echo 'selected';
      } else { echo set_select('division1', 'Second'); } ?>>Second</option>
  <option value="Third" <?php if ($get_mis_reg_prev_edu_details[1]['division'] == 'Third') {
        echo 'selected';
      } else { echo set_select('division1', 'Third'); } ?>>Third</option>
  <option value="NA" <?php if ($get_mis_reg_prev_edu_details[1]['division'] == 'NA') {
        echo 'selected';
      } else { set_select('division1', 'NA'); } ?>>NA</option>
  </select>
   <?php echo form_error('division1'); ?>
 </div>

 <label class="control-label col-md-2" >Certificate:<strong  style="color: red;">*</strong></label>
  <div class="col-md-4">
  <?php if(!empty($education_details[1]['doc_path'])) { ?>
    <input type="hidden" name="certificate1" value="<?php echo 'https://admission.iitism.ac.in/'.$education_details[1]['doc_path']; ?>" >
  <a href="https://admission.iitism.ac.in/<?php echo $education_details[1]['doc_path']; ?>" class="btn btn-primary" target='_blank'>View Certificate</a>
  <?php }
  else
  { ?>
    <input type="file" name="certificate1" value="<?php echo set_value('certificate1'); ?>" required>
  <p style="color:#0000FF;font-size:12px;">Size should be less than 200KB and format should be pdf.</p>
   <?php if(isset($certificate1_error)) echo  '<p style="color:red;font-size:12px;">'.$certificate1_error.'</p>'; ?>
   <?php } ?>
 </div>

</div>

<div class="form-group">

 <label class="control-label col-md-2">Major Subjects:<strong  style="color: red;">*</strong></label>
  <div class="col-md-4">
    <input type="text" class="form-control" name="sub1" value="<?php if ($get_mis_reg_prev_cert_details[1]['sub'] != '') {
            echo $get_mis_reg_prev_cert_details[1]['sub'];
        } else { echo set_value('sub1'); } ?>" required>
   <?php echo form_error('sub1'); ?>
 </div>


</div>

<?php  } ?>

<hr>
<!----------------   GRADUATION ------------------------------>
<?php if($admn_type!='jee') {

  // echo '<pre>';
  // print_r($array_dynamic_education_new);
  // echo '</pre>';
  //exit;
  foreach($array_dynamic_education_new as $key => $dynamic_edu){
    //echo $key.$dynamic_edu['exam_type'];
  ?>

  <div class="form-group fieldGroup">
<!-- Start fieldGroup for add/remove -->

<h4 align="center">Examination</h4>
<div class="form-group">
<label class="control-label col-md-2">Name of Examination:<strong  style="color: red;">*</strong></label>
  <div class="col-md-4">
  <input type="text" class="form-control" name="specialization[]" value="<?php echo (!empty($dynamic_edu['exam_type']))  ? $dynamic_edu['exam_type']: set_value('specialization'); ?>" required>
   <?php  echo form_error('specialization'); ?>
 </div>

  <label class="control-label col-md-2">University/Board:<strong  style="color: red;">*</strong></label>
  <div class="col-md-4">
  <input type="text" class="form-control"  name="exam[]" value="<?php echo (!empty($dynamic_edu['exam'])) ? $dynamic_edu['exam'] : set_value('exam');  ?>" required>
   <?php echo form_error('exam'); ?>
 </div>

</div>

 <div class="form-group">
  <label class="control-label col-md-2" >Year:<strong  style="color: red;">*</strong></label>
  <div class="col-md-4">
    <input type="text" class="form-control" name="year[]" maxlength="4" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" value="<?php if ($dynamic_edu['year'] != '') {
            echo $dynamic_edu['year'];
        } else { echo (!empty($dynamic_edu['year_of_passing'])) ? $dynamic_edu['year_of_passing']: set_value('year'); } ?>" placeholder="Passing Year e.g. 2019" required>
   <?php echo form_error('year'); ?>
 </div>

 <label class="control-label col-md-2" >Institution/School:<strong  style="color: red;">*</strong></label>
  <div class="col-md-4">
    <input type="text" class="form-control" name="institute[]" value="<?php if ($dynamic_edu['institute'] != '') {
            echo $dynamic_edu['institute'];
        } else { echo (!empty($dynamic_edu['institue_name'])) ? $dynamic_edu['institue_name']: set_value('institute'); } ?>" required>
 <?php echo form_error('institute'); ?>
  </div>

</div>


 <div class="form-group">
  <label class="control-label col-md-2" >Grade/Percentage:<strong  style="color: red;">*</strong></label>
  <div class="col-md-4">
  <input type="text" class="form-control" name="grade[]" value="<?php if ($dynamic_edu['grade'] != '') {
            echo $dynamic_edu['grade'];
        } else { echo (!empty($dynamic_edu['mark_cgpa_percenatge'])) ? $dynamic_edu['mark_cgpa_percenatge']: set_value('grade'); } ?>" required>
   <?php echo form_error('grade'); ?>
 </div>

 <label class="control-label col-md-2" >Marksheet:<strong  style="color: red;">*</strong></label>
  <div class="col-md-4">
  <?php if(!empty($dynamic_edu['doc_path'])) {
    //echo 'entered marks 1'; ?>
    <input type="hidden" name="marksheet[]" value="<?php echo 'https://admission.iitism.ac.in/'.$dynamic_edu['doc_path']; ?>" >
    <input type="hidden" name="verified_marksheet[]" value="<?php echo 'https://admission.iitism.ac.in/'.$dynamic_edu['doc_path']; ?>" >
  <a href="https://admission.iitism.ac.in/<?php echo $dynamic_edu['doc_path']; ?>" class="btn btn-primary" target='_blank'>View Marksheet</a>
  <?php }
  elseif(!empty($this->Phdef_mis_reg->get_marksheet_by_sno($dynamic_edu['sno'],$reg_id))){ ?>
   <input type="hidden" name="marksheet[]" value="<?php echo $this->Phdef_mis_reg->get_marksheet_by_sno($dynamic_edu['sno'],$reg_id); ?>" >
    <input type="hidden" name="verified_marksheet[]" value="<?php echo $this->Phdef_mis_reg->get_marksheet_by_sno($dynamic_edu['sno'],$reg_id); ?>" >
  <a href="<?php echo $this->Phdef_mis_reg->get_marksheet_by_sno($dynamic_edu['sno'],$reg_id); ?>" class="btn btn-primary" target='_blank'>View Marksheet</a>
  <?php }
  else
  { ?>
  <input type="file" name="marksheet[]" value="<?php echo set_value('marksheet'); ?>" required>
  <p style="color:#0000FF;font-size:12px;">Size should be less than 200KB and format should be pdf.</p>
   <?php if(isset($marksheet_error)) echo '<p style="color:red;font-size:12px;">'.$marksheet_error.'</p>'; ?>
    <?php } ?>
 </div>

</div>

 <div class="form-group">
  <label class="control-label col-md-2">Division:<strong  style="color: red;">*</strong></label>
  <div class="col-md-4">
    <select class="form-control" name="division[]" required>
  <option value="">select</option>
  <option value="First" <?php if($dynamic_edu['division'] != '') { if($dynamic_edu['division'] == 'First') { echo 'selected';} } elseif ($get_mis_reg_prev_edu_details[2]['division']) {
        if($get_mis_reg_prev_edu_details[2]['division'] == 'First') echo 'selected';
      } else { echo set_select('division', 'First'); } ?>>First</option>
  <option value="Second" <?php if($dynamic_edu['division'] != '') { if($dynamic_edu['division'] == 'Second') { echo 'selected';} } elseif ($get_mis_reg_prev_edu_details[2]['division']) {
        if($get_mis_reg_prev_edu_details[2]['division'] == 'Second') echo 'selected';
      } else { echo set_select('division', 'Second'); } ?>>Second</option>
  <option value="Third" <?php if($dynamic_edu['division'] != '') { if($dynamic_edu['division'] == 'Third') { echo 'selected';} } elseif ($get_mis_reg_prev_edu_details[2]['division']) {
        if($get_mis_reg_prev_edu_details[2]['division'] == 'Third') echo 'selected';
      } else { echo set_select('division', 'Third'); } ?>>Third</option>
  <option value="NA" <?php if($dynamic_edu['division'] != '') { if($dynamic_edu['division'] == 'NA') { echo 'selected';} } elseif ($get_mis_reg_prev_edu_details[2]['division']) {
        if($get_mis_reg_prev_edu_details[2]['division'] == 'NA') echo 'selected';
      } else { echo set_select('division', 'NA'); } ?>>NA</option>
  </select>
   <?php echo form_error('division'); ?>
 </div>

 <label class="control-label col-md-2" >Certificate:<strong  style="color: red;">*</strong></label>
  <div class="col-md-4">
  <?php if(!empty($dynamic_edu['doc_path'])) { ?>
    <input type="hidden" name="certificate[]" value="<?php echo 'https://admission.iitism.ac.in/'.$dynamic_edu['doc_path']; ?>" >
      <input type="hidden" name="verified_certificate[]" value="<?php echo 'https://admission.iitism.ac.in/'.$dynamic_edu['doc_path']; ?>" >
  <a href="https://admission.iitism.ac.in/<?php echo $dynamic_edu['doc_path']; ?>" class="btn btn-primary" target='_blank'>View Certificate</a>
  <?php }
  elseif(!empty($this->Phdef_mis_reg->get_certificate_by_sno($dynamic_edu['sno'],$reg_id))){?>
   <input type="hidden" name="certificate[]" value="<?php echo $this->Phdef_mis_reg->get_certificate_by_sno($dynamic_edu['sno'],$reg_id); ?>" >
    <input type="hidden" name="verified_certificate[]" value="<?php echo $this->Phdef_mis_reg->get_certificate_by_sno($dynamic_edu['sno'],$reg_id); ?>" >
  <a href="<?php echo $this->Phdef_mis_reg->get_certificate_by_sno($dynamic_edu['sno'],$reg_id); ?>" class="btn btn-primary" target='_blank'>View Certificate</a>
  <?php }
  else
  { ?>
    <input type="file" name="certificate[]" value="<?php echo set_value('certificate'); ?>" required>
  <p style="color:#0000FF;font-size:12px;">Size should be less than 200KB and format should be pdf.</p>
   <?php if(isset($certificate_error)) echo  '<p style="color:red;font-size:12px;">'.$certificate_error.'</p>'; ?>
    <?php } ?>
 </div>

</div>

<div class="form-group">
<div class="required">
<label class="control-label col-md-2">Major Subjects:<strong  style="color: red;">*</strong></label>
</div>
  <div class="col-md-4">
    <input type="text" class="form-control" name="sub[]" value="<?php if ($this->Phdef_mis_reg->get_dynamic_sub_by_sno($dynamic_edu['sno'] != '',$reg_id)) {
        echo $this->Phdef_mis_reg->get_dynamic_sub_by_sno($dynamic_edu['sno'],$reg_id);
    } elseif ($get_mis_reg_prev_cert_details[2]['sub'] != '') {
            echo $get_mis_reg_prev_cert_details[2]['sub'];
        } else { echo set_value('sub'); } ?>" required>
   <?php echo form_error('sub'); ?>
 </div>

    </div>

    </div>

    <?php } ?>

    <!-- end dynamic education block here -->


<?php
if (!empty($dynamic_prev_edu_details) && !empty($dynamic_prev_cert_details)) {

foreach($dynamic_prev_edu_details as $prev_edu_details){ ?>
<div class="form-group fieldGroup show">

<h4 align="center">Examination</h4>
<?php if($admn_type=='jrf'){?>
<?php }?>
<div class="form-group">
<label class="control-label col-md-2">Name of Examination:<strong  style="color: red;">*</strong></label>
<div class="col-md-4">
<input type="text" class="form-control" name="specialization[]" value="<?php if ($prev_edu_details['exam_type'] != '') {
   echo $prev_edu_details['exam_type'];
} else { echo set_value('specialization'); } ?>">

<?php echo form_error('specialization'); ?>
</div>

<label class="control-label col-md-2">University/Board:<strong  style="color: red;">*</strong></label>
<div class="col-md-4">
<input type="text" class="form-control"  name="exam[]" value="<?php if ($prev_edu_details['exam'] != '') {
   echo $prev_edu_details['exam'];
} else { set_value('exam'); } ?>">
<?php echo form_error('exam'); ?>
</div>

</div>

<div class="form-group">
<label class="control-label col-md-2" >Year:<strong  style="color: red;">*</strong></label>
<div class="col-md-4">
<input type="text" class="form-control" name="year[]" maxlength="4" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" value="<?php if ($prev_edu_details['year'] != '') {
   echo $prev_edu_details['year'];
} else { echo set_value('year'); } ?>" placeholder="Passing Year e.g. 2019">
<?php echo form_error('year'); ?>
</div>

<label class="control-label col-md-2" >Institution/School:<strong  style="color: red;">*</strong></label>
<div class="col-md-4">
<input type="text" class="form-control" name="institute[]" value="<?php if ($prev_edu_details['institute'] != '') {
   echo $prev_edu_details['institute'];
} else { echo set_value('institute'); } ?>">
<?php echo form_error('institute'); ?>
</div>

</div>


<div class="form-group">
<label class="control-label col-md-2" >Grade/Percentage:<strong  style="color: red;">*</strong></label>
<div class="col-md-4">
<input type="text" class="form-control" name="grade[]" value="<?php if ($prev_edu_details['grade'] != '') {
   echo $prev_edu_details['grade'];
} else { echo set_value('grade'); } ?>">
<?php echo form_error('grade'); ?>
</div>

<label class="control-label col-md-2" >Marksheet:<strong  style="color: red;">*</strong></label>

<div class="col-md-4" id="marksheet<?php echo $prev_edu_details['sno']; ?>">

<?php if($this->Phdef_mis_reg->get_marksheet_by_sno($prev_edu_details['sno'],$reg_id)) { ?>
    <input type="hidden" name="marksheet[]" value="<?php echo $this->Phdef_mis_reg->get_marksheet_by_sno($prev_edu_details['sno'],$reg_id); ?>" >
    <input type="hidden" name="verified_marksheet[]" value="<?php echo $this->Phdef_mis_reg->get_marksheet_by_sno($prev_edu_details['sno'],$reg_id); ?>" >
  <a href="<?php echo $this->Phdef_mis_reg->get_marksheet_by_sno($prev_edu_details['sno'],$reg_id); ?>" class="btn btn-primary" target='_blank'>View Marksheet</a>
  <!-- <button type="button" id="remove_marksheet" data-id = <?php echo $prev_edu_details['sno'] ?> class="btn btn-danger remove_marksheet"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> &nbsp;Remove Marksheet</button> -->
  <br>
  <!-- <div>
  <label class="control-label col-md-2" >Upload New Marksheet:<strong  style="color: red;">*</strong></label>
  <input type="file" name="marksheet[]" multiple value="<?php echo set_value('marksheet'); ?>" required>
  </div> -->
  <?php }
  else
  { ?>
  <input type="file" name="marksheet[]" value="<?php echo set_value('marksheet'); ?>" required>
  <p style="color:#0000FF;font-size:12px;">Size should be less than 200KB and format should be pdf.</p>
   <?php if(isset($marksheet_error)) echo '<p style="color:red;font-size:12px;">'.$marksheet_error.'</p>'; ?>
    <?php } ?>
    <span id="error_remove_file">Sorry the file cannot be removed</span>

<!-- <input type="file" name="marksheet[]" multiple value="<?php echo set_value('marksheet'); ?>"> -->
<!--     <div class="input-group">
<span class="input-group-btn">
<span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();">Browse</span>
<input name="marksheet1" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());" style="display: none;" type="file" value="<?php //echo set_value('marksheet1'); ?>">
</span>
<span class="form-control"></span>
</div>
-->
<!-- <p style="color:#0000FF;font-size:12px;">Size should be less than 200KB and format should be pdf.</p> -->
<?php /* if(isset($marksheet_error)) echo '<p style="color:red;font-size:12px;">'.$marksheet_error.'</p>'; */ ?>
</div>

</div>

<div class="form-group">
<label class="control-label col-md-2">Division:<strong  style="color: red;">*</strong></label>
<div class="col-md-4">
<select class="form-control" name="division[]">
<option value="">select</option>
<option value="First" <?php if ($prev_edu_details['division'] == 'First') {
   echo 'selected';
} else { echo set_select('division', 'First'); } ?>>First</option>
<option value="Second" <?php if ($prev_edu_details['division'] == 'Second') {
   echo 'selected';
} else { echo set_select('division', 'Second'); } ?>>Second</option>
<option value="Third" <?php if ($prev_edu_details['division'] == 'Third') {
   echo 'selected';
} else { echo set_select('division', 'Third'); } ?>>Third</option>
<option value="NA" <?php if ($prev_edu_details['division'] == 'NA') {
   echo 'selected';
} else { echo set_select('division', 'NA'); } ?>>NA</option>
</select>
<?php echo form_error('division'); ?>
</div>

<!-- <label class="control-label col-md-2" >Certificate:<strong  style="color: red;">*</strong></label>
<div class="col-md-4">
<input type="file" name="certificate[]" multiple value="<?php echo set_value('certificate'); ?>"> -->
<!--
     <div class="input-group">
<span class="input-group-btn">
<span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();">Browse</span>
<input name="certificate1" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());" style="display: none;" type="file" value="<?php //echo set_value('certificate1'); ?>">
</span>
<span class="form-control"></span>
</div> -->
<!-- <p style="color:#0000FF;font-size:12px;">Size should be less than 200KB and format should be pdf.</p>
<?php if(isset($certificate_error)) echo  '<p style="color:red;font-size:12px;">'.$certificate_error.'</p>'; ?> -->

<label class="control-label col-md-2" >Certificate:<strong  style="color: red;">*</strong></label>
  <div class="col-md-4" id="certificate<?php echo $prev_edu_details['sno']; ?>">
  <?php if($this->Phdef_mis_reg->get_certificate_by_sno($prev_edu_details['sno'],$reg_id)) { ?>
    <input type="hidden" name="certificate[]" value="<?php echo $this->Phdef_mis_reg->get_certificate_by_sno($prev_edu_details['sno'],$reg_id); ?>" >
      <input type="hidden" name="verified_certificate[]" value="<?php echo $this->Phdef_mis_reg->get_certificate_by_sno($prev_edu_details['sno'],$reg_id); ?>">
  <a href="<?php echo $this->Phdef_mis_reg->get_certificate_by_sno($prev_edu_details['sno'],$reg_id); ?>" class="btn btn-primary" target='_blank'>View Certificate</a>
  <!-- <button type="button" id="remove_certificate" data-id = "<?php echo $prev_edu_details['sno'];  ?>" class="remove_certificate btn btn-danger"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> &nbsp;Remove Certificate</button> -->
  <?php }
  else
  { ?>
    <input type="file" name="certificate[]" value="<?php echo set_value('certificate'); ?>" required>
  <p style="color:#0000FF;font-size:12px;">Size should be less than 200KB and format should be pdf.</p>
   <?php if(isset($certificate_error)) echo  '<p style="color:red;font-size:12px;">'.$certificate_error.'</p>'; ?>
    <?php } ?>
 </div>
 <span id="error_remove_file">Sorry the file cannot be removed</span>
</div>
<!--
</div> -->

<div class="form-group">
<div class="required">
<label class="control-label col-md-2">Major Subjects:<strong  style="color: red;">*</strong></label>
</div>
<div class="col-md-4">
<input type="text" class="form-control" name="sub[]" value="<?php if ($this->Phdef_mis_reg->get_dynamic_sub_by_sno($prev_edu_details['sno'],$reg_id) != '') {
   echo $this->Phdef_mis_reg->get_dynamic_sub_by_sno($prev_edu_details['sno'],$reg_id);
} else {  echo set_value('sub'); } ?>">
<?php echo form_error('sub'); ?>
</div>

<br>
<label class="control-label col-md-2"></label>
<div class="col-md-4">
<div class="input-group-addon" style="background-color: #fff; border: 0px solid #ccc;">
    <a href="javascript:void(0)" class="btn btn-danger remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>
</div>
  </div>
</div>
<hr>

</div>
<?php } ?>

<?php }
} ?>

<?php if (empty($array_dynamic_education_new) && empty($dynamic_prev_edu_details)) { ?>
<p align="center"><strong>*Please fill the details in chronological order starting from 10th upto higher education for MBA</p>

<div class="form-group fieldGroup">

</div>

<?php } ?>

<!-- <div class="form-group fieldGroup">

</div> -->



 <label class="control-label col-md-2"></label>
 <div class="col-md-4">
 <div class="input-group-addon" style="background-color: #fff; border: 0px solid #ccc;">
            <a href="javascript:void(0)" class="btn btn-success addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add Academic</a>
        </div>
      </div>

</div>


</div>

<p align="center"><strong>View Marksheet and View Certificate buttons will show the same certificate as only marksheet was required at the time of initial registration.</strong></p>
<p align="center"><strong>*Incase of Non-Availabilty of Marksheet and Certificate of <?php if($admn_type=='jee')echo "12th"; else echo "Graduation";?>, you need to submit Self-Declaration and Undertaking. </strong> <a href="<?=base_url ()?>/assets/images/self-declaration.pdf" download="declaration form" target="_blank">click here to download</a></p>
  <!-- <p align="center"><strong>*Incase of Non-Availabilty of Current Migration Certificate Number of <?php if($admn_type=='jee')echo "12th"; else echo "Graduation";?>, you need to fill "NA-<?php if($admn_type=='jee')echo "JEE Main Roll No"; else echo "Registration No";?>" in that field </strong></p> -->

</div>
<br>


<!-- End 10th Details section Start -->



<input type="button" name="previous" class="previous action-button-previous" value="Previous" id="previous_personal_details" />
<input type="submit" id="next_submit" name="next" class="next action-button" value="Next" />

<br><br><br><br>

</form>


<div class="form-group fieldGroupCopy" style="display: none;">

<h4 align="center">Examination</h4>
<?php if($admn_type=='jrf'){?>
<?php }?>
<div class="form-group">
<label class="control-label col-md-2">Name of Examination:<strong  style="color: red;">*</strong></label>
<div class="col-md-4">
<input type="text" class="form-control" name="specialization[]" value="<?php echo set_value('specialization'); ?>">

<?php echo form_error('specialization'); ?>
</div>

<label class="control-label col-md-2">University/Board:<strong  style="color: red;">*</strong></label>
<div class="col-md-4">
<input type="text" class="form-control"  name="exam[]" value="<?php echo set_value('exam'); ?>">
<?php echo form_error('exam'); ?>
</div>

</div>

<div class="form-group">
<label class="control-label col-md-2" >Year:<strong  style="color: red;">*</strong></label>
<div class="col-md-4">
<input type="text" class="form-control" name="year[]" maxlength="4" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" value="<?php echo set_value('year'); ?>" placeholder="Passing Year e.g. 2019">
<?php echo form_error('year'); ?>
</div>

<label class="control-label col-md-2" >Institution/School:<strong  style="color: red;">*</strong></label>
<div class="col-md-4">
<input type="text" class="form-control" name="institute[]" value="<?php echo set_value('institute'); ?>">
<?php echo form_error('institute'); ?>
</div>

</div>


<div class="form-group">
<label class="control-label col-md-2" >Grade/Percentage:<strong  style="color: red;">*</strong></label>
<div class="col-md-4">
<input type="text" class="form-control" name="grade[]" value="<?php echo set_value('grade'); ?>">
<?php echo form_error('grade'); ?>
</div>

<label class="control-label col-md-2" >Marksheet:<strong  style="color: red;">*</strong></label>
<div class="col-md-4">
<input type="file" name="marksheet[]" value="<?php echo set_value('marksheet'); ?>">
<!--     <div class="input-group">
<span class="input-group-btn">
<span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();">Browse</span>
<input name="marksheet1" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());" style="display: none;" type="file" value="<?php //echo set_value('marksheet1'); ?>">
</span>
<span class="form-control"></span>
</div>
-->
<p style="color:#0000FF;font-size:12px;">Size should be less than 200KB and format should be pdf.</p>
<?php if(isset($marksheet_error)) echo '<p style="color:red;font-size:12px;">'.$marksheet_error.'</p>'; ?>
</div>

</div>

<div class="form-group">
<label class="control-label col-md-2">Division:<strong  style="color: red;">*</strong></label>
<div class="col-md-4">
<select class="form-control" name="division[]">
<option value="">select</option>
<option value="First" <?php echo set_select('division', 'First'); ?>>First</option>
<option value="Second" <?php echo set_select('division', 'Second'); ?>>Second</option>
<option value="Third" <?php echo set_select('division', 'Third'); ?>>Third</option>
<option value="NA" <?php echo set_select('division', 'NA'); ?>>NA</option>
</select>
<?php echo form_error('division'); ?>
</div>

<label class="control-label col-md-2" >Certificate:<strong  style="color: red;">*</strong></label>
<div class="col-md-4">
<input type="file" name="certificate[]" value="<?php echo set_value('certificate'); ?>">
<!--
     <div class="input-group">
<span class="input-group-btn">
<span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();">Browse</span>
<input name="certificate1" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());" style="display: none;" type="file" value="<?php //echo set_value('certificate1'); ?>">
</span>
<span class="form-control"></span>
</div> -->
<p style="color:#0000FF;font-size:12px;">Size should be less than 200KB and format should be pdf.</p>
<?php if(isset($certificate_error)) echo  '<p style="color:red;font-size:12px;">'.$certificate_error.'</p>'; ?>
</div>

</div>

<div class="form-group">
<div class="required">
<label class="control-label col-md-2">Major Subjects:<strong  style="color: red;">*</strong></label>
</div>
<div class="col-md-4">
<input type="text" class="form-control" name="sub[]" value="<?php echo set_value('sub'); ?>">
<?php echo form_error('sub'); ?>
</div>

<label class="control-label col-md-2"></label>
<div class="col-md-4">
<div class="input-group-addon" style="background-color: #fff; border: 0px solid #ccc;">
    <a href="javascript:void(0)" class="btn btn-danger remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>
</div>
  </div>
</div>
<hr>

</div>



                        <!-- <input type="button" name="next" class="next action-button" value="Submit" /> -->
  <script type="text/javascript">
	$(document).ready(function(){
    //group add limit
    var maxGroup = 6;
    //var minGroup = 1;

    //add more fields group
    $(".addMore").click(function(){
      //alert('hii add more');
        if($('body').find('.fieldGroup').length < maxGroup){
          if($('body').find('.fieldGroup:last')){
            //alert('fieldgroup exists');
             var fieldHTML = '<div class="form-group fieldGroup show">'+$(".fieldGroupCopy").html()+'</div>';
              $('body').find('.fieldGroup:last').after(fieldHTML);
              setRequired(true);
            }

        }
        else{
            alert('Maximum '+maxGroup+' groups are allowed.');
        }
    });

    function setRequired(val){
    $(".show input").attr("required", "true");
   // }
}

    //remove fields group
    $("body").on("click",".remove",function(){
      //alert($('body').find('.fieldGroup').length);
      if ($('body').find('.fieldGroup').length > 1) {
      $(".show input").attr("required", "false");
        $(this).parents(".fieldGroup").remove();
      }
      else{
        alert('You are required to add minimum qualification');
      }
    });
});
</script>

<script>
    $(document).ready(function(){
     $('.remove_marksheet').click(function(){
        var sno = $(this).data('id');
        var html = "";
        $.ajax ({
            url : "remove_marksheeet",
            method : "POST",
            data : {sno : sno},
            success : function(data){
              if (data == '1') {
                html = "<input type=file name=marksheet[] value=<?php echo set_value('marksheet'); ?> required>";
                html += "<p style=color:#0000FF;font-size:12px;>Size should be less than 200KB and format should be pdf.</p>";
                html += <?php if(isset($marksheet_error)) echo '<p style="color:red;font-size:12px;">'.$marksheet_error.'</p>'; ?>
                $('#marksheet'+sno).html(html);
              }
              else{
                $('#error_remove_file').css('display','block');
              }
            }
        });
    });
    });
</script>

<script>
    $(document).ready(function(){
     $('.remove_certificate').click(function(){
        var sno = $(this).data('id');
        var html = "";
        $.ajax ({
            url : "remove_certificate",
            method : "POST",
            data : {sno : sno},
            success : function(data){
              if (data == '1') {
                html = "<input type=file name=certificate[] value=<?php echo set_value('certificate'); ?> required>";
                html += "<p style=color:#0000FF;font-size:12px;>Size should be less than 200KB and format should be pdf.</p>";
                html += <?php if(isset($certificate_error)) echo '<p style="color:red;font-size:12px;">'.$certificate_error.'</p>'; ?>
                $('#certificate'+sno).html(html);
              }
              else{
                $('#error_remove_file').css('display','block');
              }
            }
        });
    });
    });
</script>

<script>
  $('#previous_personal_details').click(function(){
    //alert('hii');
   window.location.href = "<?php echo base_url(); ?>index.php/admission/phdef/Adm_phdef_mis_registration/manage_personal_details";
  });
</script>

<script>
  //$("#next_submit").find('[type="submit"]').trigger('click');
      function submitForm(form) {
        //alert($('body').find('.fieldGroup').length);
        if ($('body').find('.fieldGroup').length < 1) {
          alert('Minimum Qualification is required , Use "Add Academic" to add necessary details')
          event.preventDefault();
          return false;
        }
        else{
          var abc_id = $("#abc_id").val();
          var abcid_pattern = /^[0-9-]+$/;
          if (!abcid_pattern.test(abc_id)) {
            alert('Please enter a valid ABC ID');
            event.preventDefault();
            return false;
          }
          else{
          if (confirm("Are You Sure , you want to submit Education Details ?")){
          form.submit();
          }
          else{
        event.preventDefault();
        return false;
        }
        }
      }
      //return false;
    }
</script>

<script>
function previewImg(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $("#imageBox").show("slow");

            reader.onload = function (e) {
                $('#stu_img')
                    .attr('src', e.target.result)
                    .width(100)
                    .height(120);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script>
function previewSign(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $("#signBox").show("slow");

            reader.onload = function (e) {
                $('#stu_sign')
                    .attr('src', e.target.result)
                    .width(180)
                    .height(80);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <img src="<?php echo base_url() ?>assets/images/ism/img_sign_format.jpg" style="height: 500px; width: 890px;"  />
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade modal-xl" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-xl-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Receipt View</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <iframe id="iframepdf" width="100%" height="600px" src="<?php echo base_url($receipt_path) ?>"></iframe>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>



<script type="text/javascript">
   let input3 = document.getElementById("name_in_hindi");
        enableTransliteration(input3, "hi");
		var control = new google.elements.transliteration.TransliterationControl(options);
        control.makeTransliteratable(['name_in_hindi']);
		control.c.qc.t13n.c[3].c.d.keyup[0].ia.F.p = 'https://www.google.com';
</script>
</body>
</html>
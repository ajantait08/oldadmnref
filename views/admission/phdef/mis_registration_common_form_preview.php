<link rel="stylesheet" href="<?php echo base_url()."assets/css/multi_step.css" ?>">

<!-- <link rel="stylesheet" href="<?php echo base_url()."assets/md5_ui_kit/css/mdb.min.css" ?>">
<script src="<?php echo base_url()."assets/md5_ui_kit/js/mdb.min.js" ?>"></script> -->

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


  #overlay
{
    display:none;
    position: fixed;
    top: 0px;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
    width: 100%;
    height: 100%;
    z-index: 999;
    background-color: rgba(0,0,0,0.85);

}

#overlay #loading {
    z-index: 9999;
    position: fixed;
    top: 0px;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
    width: 300px;
    height: 300px;
    background-size: 100% 100%;
    opacity: 1;
}
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

#overlay1
{
    display:none;
    position: fixed;
    top: 0px;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
    width: 100%;
    height: 100%;
    z-index: 999;
    background-color: rgba(0,0,0,0.85);

}

#overlay1 #loading1 {
    z-index: 9999;
    position: fixed;
    top: 0px;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
    width: 300px;
    height: 300px;
    background-size: 100% 100%;
    opacity: 1;
}
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.loading:after {
  content: ' .';
  animation: dots 1s steps(5, end) infinite;
}
@keyframes dots {
  0%, 20% {
    color: rgba(0,0,0,0);
    text-shadow:
      .25em 0 0 rgba(0,0,0,0),
      .5em 0 0 rgba(0,0,0,0);}
  40% {
    color: white;
    text-shadow:
      .25em 0 0 rgba(0,0,0,0),
      .5em 0 0 rgba(0,0,0,0);}
  60% {
    text-shadow:
      .25em 0 0 white,
      .5em 0 0 rgba(0,0,0,0);}
  80%, 100% {
    text-shadow:
      .25em 0 0 white,
      .5em 0 0 white;}}
</style>




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

            <?php

if ($this->session->flashdata('flashError') != '') { ?>
<div class="alert alert-danger alert-dismissible show" role="alert">
  <strong>Sorry ! &nbsp;</strong> <?php echo $this->session->flashdata('flashError'); ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<br>
<?php } elseif ($this->session->flashdata('flashSuccess') != '') { ?>
 <div class="alert alert-success alert-dismissible show" role="alert">
 <strong>Congrats ! &nbsp;</strong> <?php echo $this->session->flashdata('flashSuccess'); ?>
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
 </button>
</div>
<br>
<?php } else {

} ?>


                <h2 id="heading">Registration Form</h2>
                <!-- <p>Fill all form field to go to next step</p> -->

                    <!-- progressbar -->

                    <ul id="progressbar">
                        <li id="personal"><strong>Personal Details</strong></li>
                        <li id="education"><strong>Education Details</strong></li>
                        <li id="parent"><strong>Parent Account Details</strong></li>
                        <li id="parent"><strong>Student Other Important Details</strong></li>
                        <li id="personal" class="active"><strong>Form Preview</strong></li>
                        <!-- <li id="confirm"><strong>Finish</strong></li> -->
                    </ul>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> <br> <!-- fieldsets -->
                    <fieldset>
                    <form id="msform" class="form-horizontal" method="post" accept-charset="utf-8" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/admission/phdef/Adm_phdef_admisison_payment/adm_phdef_payment" onsubmit="return submitForm(this);">
                    <!-- <h3 align="center">Important Information for Hostel</h3> -->
                    <h3 align="center">Personal Details</h3>
    <div class="panel panel-default">
    <div class="panel-body">

    <input type="hidden" class="form-control" name="institute_name" value='IIT(ISM) DHANBAD' readonly>
      <input type="hidden" name="admn_no" value = "<?php echo $admn_no; ?>">
      <input type="hidden" name="admn_type" id="admn_type" value="<?php echo $admn_type; ?>">


  <div class="panel panel-default">
   <div class="panel-heading">
      <div class="form-group">
        <?php if ($photo_signature[0]['doc_path'] != '') { ?>
         <img src="<?php echo base_url().$photo_signature[0]['doc_path']; ?>" width="80" height="180" class="center">
       <?php } else { ?>
        <img src="<?php echo $get_personal_details[0]['photo_path']; ?>"width="80" height="180" class="center">
        <?php } ?>
      </div>

      <div class="form-group">
      <?php if ($photo_signature[1]['doc_path'] != '') { ?>
        <img src="<?php echo base_url().$photo_signature[1]['doc_path']; ?>" width="80" height="60" class="center">
        <?php } else { ?>
          <img src="<?php echo $get_personal_details[0]['signature_path']; ?>"width="80" height="180" class="center">
          <?php } ?>
      </div>

    <div class="form-group row">
<?php if($admn_type=='jee') {?>
      <label class="control-label" for="reg_id">JEE Main Roll No:</label>
       <?php }
    else if($admn_type=='msc'){?>
       <label class="control-label col-md-2" for="reg_id">Registration No:</label>
         <?php }
    else if($admn_type=='msctech'){?>
       <label class="control-label col-md-2" for="reg_id">Registration No:</label>
       <?php }
    else if($admn_type=='mba'){?>
       <label class="control-label col-md-2" for="reg_id">Registration No:</label>
         <?php }
    else if($admn_type=='jrf'){?>
      <label class="control-label col-md-2" for="reg_id">Registration No:</label>
       <?php }
    else if($admn_type=='mtech'){?>
      <label class="control-label col-md-2" for="reg_id">Registration No:</label>
       <?php }
    else if($admn_type=='mtech_3yr'){?>
      <label class="control-label col-md-2" for="reg_id">Registration No:</label>
    <?php }
    else if($admn_type=='foreign') {?>
      <label class="control-label col-md-2" for="reg_id">Passport No:</label>
    <?php } ?>
      <div class="col-md-4">
        <input type="text" class="form-control" name="reg_id" value='<?php echo $reg_id?>' readonly>
      </div>

   <?php if($admn_type=='jee') {?>
      <label class="control-label col-md-2" for="reg_id">Institute Name:</label>
       <?php }
    else if($admn_type=='msc'){?>
       <label class="control-label col-md-2" for="reg_id">Enrollment No:</label>
         <?php }
    else if($admn_type=='msctech'){?>
       <label class="control-label col-md-2" for="reg_id">Enrollment No:</label>
       <?php }
    else if($admn_type=='mba'){?>
       <label class="control-label col-md-2" for="reg_id">Institute Name:</label>
         <?php }
    else if($admn_type=='jrf'){?>
      <label class="control-label col-md-2" for="reg_id">Institute Name:</label>
       <?php }
    else if($admn_type=='mtech'){?>
      <label class="control-label col-md-2" for="reg_id">Application Id:</label>
       <?php }
    else if($admn_type=='mtech_3yr'){?>
      <label class="control-label col-md-2" for="reg_id">Enrollment No:</label>
    <?php }
    else if($admn_type=='foreign'){?>
      <label class="control-label col-md-2" for="reg_id">Enrollment No:</label>
    <?php } ?>
      <div class="col-md-4">
        <?php if($admn_type=='jee' || $admn_type=='mba' || $admn_type=='jrf'){?>
               <input type="hidden" name="auth1" value='<?php echo $auth1;?>'>
          <input type="text" class="form-control" name="institute_name" value='<?php echo $get_personal_details[0]['institute_name'];?>' readonly>
        <?php }
        else {?>
        <input type="text" class="form-control" name="auth1" value='<?php echo $auth1;?>' readonly>
      <?php }?>
      </div>
    </div>


    <div class="form-group row required">

      <label class="control-label col-md-2" for="name" >Name:</label>
      <div class="col-md-4">
        <?php if(!isset($name))$name= $first_name." ".$middle_name." ".$last_name; ?>
        <input type="text" class="form-control" name="name" value='<?php echo $name;?>' readonly>
      </div>


      <label class="control-label col-md-2" for="email">Email:</label>
      <div class="col-md-4">
        <input type="email" class="form-control" name="email" value='<?php echo $email;?>' readonly>
      </div>

    </div>

    <div class="form-group row required">

      <label class="control-label col-md-2" for="dob">Date of Birth:<br>(YYYY-MM-DD) </label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="dob" value='<?php echo $dob;?>' readonly>
      </div>

      <label class="control-label col-md-2" for="sex">Gender:</label>
      <div class="col-md-4">
         <label class="radio-inline"><input type="radio" disabled  name="sex" value='m' <?php echo ($sex== 'm') ?  "checked" : ""?> readonly>Male</label>
         <label class="radio-inline"><input type="radio" disabled  name="sex" value='f'<?php echo ($sex== 'f') ? "checked" : ""?> readonly>Female</label>
         <label class="radio-inline"><input type="radio" disabled name="sex" value='o' <?php echo ($sex== 'o') ? "checked" : ""?> readonly>Transgender</label>
      </div>

    </div>

     <div class="form-group row required">
      <label class="control-label col-md-2" for="category">Category:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="category" value='<?php echo $category;?>' readonly>
      </div>

      <label class="control-label col-md-2" for="allocated_category">Allocated Category:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="allocated_category" value='<?php echo $allocated_category;?>' readonly>
      </div>
    </div>

    <div class="form-group row required">
      <label class="control-label col-md-2" for="nationality">Nationality:</label>
      <div class="col-md-4">

        <input type="text" class="form-control" name="nationality" value='<?php if (!empty($nationality)) {
          echo ucwords($nationality);
        } else { echo ucwords($get_personal_details[0]['nationality']); }?>' readonly>
      </div>

      <label class="control-label col-md-2" for="pd_status">Divyang:</label>
      <div class="col-md-4">

         <label class="radio-inline"><input type="radio" disabled name="pd_status" value="yes" <?php echo ($pd_status== 'yes') ?  "checked" : ""?> >Yes</label>
         <label class="radio-inline"><input type="radio" disabled  name="pd_status"  value="no" <?php echo ($pd_status== 'no') ? "checked" : ""?> >No</label>
      </div>
    </div>
    <?php if($admn_type!='mba' && $admn_type!='mtech' && $admn_type!='jrf'){?>
    <div class="form-group row required">
      <label class="control-label col-md-2">Permanent Address:</label>
      <div class="col-md-4">
        <textarea  class="form-control" name="permanent_address_line1" rows="3"  readonly> <?php echo ucwords($get_personal_details[0]['permanent_address']);?></textarea>
      </div>
       <label class="control-label col-md-2" >Street/Locality:</label>
      <div class="col-md-4">
        <textarea  class="form-control" name="permanent_address_line2" readonly> <?php echo ucwords($get_personal_details[0]['street_locality']);?> </textarea>

      </div>
    </div>
    <div class="form-group row required">

      <label class="control-label col-md-2" for="permanent_address_city">City:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="permanent_address_city" value='<?php echo ucwords($get_personal_details[0]['city']);?>' readonly>
      </div>

      <label class="control-label col-md-2" for="permanent_address_state">State:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="permanent_address_state" value='<?php echo ucwords($get_personal_details[0]['state']);?>' readonly>
      </div>
    </div>
      <div class="form-group row required">
          <label class="control-label col-md-2" for="permanent_address_pincode">Pincode:</label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="permanent_address_pincode" value='<?php echo $get_personal_details[0]['pincode'];?>' readonly>
      </div>
        <label class="control-label col-md-2" >Country:</label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="country" value='<?php echo ucwords($get_personal_details[0]['country']);?>' readonly>
      </div>
      </div>
    <?php }?>
    <div class="form-group row required">
      <label class="control-label col-md-2" for="contact_no">Contact Number:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="contact_no" value='<?php echo $contact_no;?>' readonly>
      </div>

 <?php if($admn_type=='jee'){ ?>

         <label class="control-label col-md-2" for="is_prep">Preparatory:</label>
      <div class="col-md-4">

         <label class="radio-inline"><input type="radio" name="is_prep" <?php echo ($is_prep== 'yes') ?  "checked" : ""?> >Yes</label>
         <label class="radio-inline"><input type="radio"  name="is_prep" <?php echo ($is_prep== 'no') ? "checked" : ""?> >No</label>


    </div>
  <?php } ?>



    </div>


  </div>
<!--------------------------------------------------                                           --------------------------------->
<div class="panel-body">

<?php if($admn_type=='mba' || $admn_type=='mtech' || $admn_type=='jrf'){?>

   <div class="form-group row required">
      <label class="control-label col-md-2">Permanent Address:</label>
      <div class="col-md-4">
        <textarea  class="form-control" name="permanent_address_line1" readonly> <?php echo ucwords($get_personal_details[0]['permanent_address']);?></textarea>
      </div>
       <label class="control-label col-md-2" >Street/Locality:</label>
      <div class="col-md-4">
        <textarea  class="form-control" name="permanent_address_line2" readonly> <?php echo ucwords($get_personal_details[0]['street_locality']);?> </textarea>

      </div>
    </div>
    <div class="form-group row required">

      <label class="control-label col-md-2" for="permanent_address_city">City:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="permanent_address_city" value='<?php echo ucwords($get_personal_details[0]['city']);?>' readonly>
      </div>

      <label class="control-label col-md-2" for="permanent_address_state">State:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="permanent_address_state" value='<?php echo ucwords($get_personal_details[0]['state']);?>' readonly>
      </div>
    </div>
      <div class="form-group row required">
          <label class="control-label col-md-2" for="permanent_address_pincode">Pincode:</label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="permanent_address_pincode" value='<?php echo $get_personal_details[0]['pincode'];?>' readonly>
      </div>
        <label class="control-label col-md-2" >Country:</label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="country" value='<?php echo ucwords($get_personal_details[0]['country']);?>' readonly>
      </div>
      </div>

<?php }?>
    <div class="form-group row required">

      <label class="control-label col-md-2" for="marital_status">Marital Status:</label>
      <div class="col-md-4">
        <!-- IF not given by JEE -->
         <label class="radio-inline"><input type="radio" disabled name="marital_status" value="married" <?php echo ($get_personal_details[0]['martial_status']== "married") ?  "checked" : ""?> >Married</label>
         <label class="radio-inline"><input type="radio" disabled name="marital_status" value="unmarried" <?php echo ($get_personal_details[0]['martial_status']== "unmarried") ?  "checked" : ""?> >Unmarried</label>
         <!-- IF marital_status is given by JEE
         <label class="radio-inline"><input type="radio"  <?php// echo ($marital_status== 'yes') ?  "checked" : ""?> >Yes</label>
         <label class="radio-inline"><input type="radio"  <?php// echo ($marital_status== 'no') ? "checked" : ""?> >No</label>
       -->
      </div>
       <label class="control-label col-md-2" for="religion">Religion:</label>
      <div class="col-md-4">
          <select class="form-control" name="religion" readonly>
    <option  name="religion" value="HINDU"<?php echo ($get_personal_details[0]['religion']== 'HINDU') ?  "seleted" : "";?> >HINDU</option>
    <option  name="religion" value="MUSLIM"<?php echo ($get_personal_details[0]['religion']== 'MUSLIM') ?  "selected" : "";?> >MUSLIM</option>
    <option  name="religion" value="CHRISTIAN"<?php echo ($get_personal_details[0]['religion']== 'CHRISTIAN') ?  "selected" : "";?> >CHRISTIAN</option>
    <option  name="religion" value="SIKH"<?php echo ($get_personal_details[0]['religion']== 'SIKH') ?  "selected" : "";?> >SIKH</option>
    <option  name="religion" value="BAUDHH"<?php echo ($get_personal_details[0]['religion']== 'BAUDHH') ?  "selected" : "";?> >BAUDHH</option>
    <option  name="religion" value="JAIN"<?php echo ($get_personal_details[0]['religion']== 'JAIN') ?  "selected" : "";?> >JAIN</option>
    <option  name="religion" value="PARSI"<?php echo ($get_personal_details[0]['religion']== 'PARSI') ?  "selected" : "";?> >PARSI</option>
    <option  name="religion" value="YAHUDI"<?php echo ($get_personal_details[0]['religion']== 'YAHUDI') ?  "selected" : "";?> >YAHUDI</option>
    <option  name="religion" value="OTHERS"<?php echo ($get_personal_details[0]['religion']== 'OTHERS') ?  "selected" : "";?> >OTHERS</option>
  </select>
      </div>

    </div>



     <div class="form-group row required">

    <label class="control-label col-md-2" for="blood_group">Blood Group:</label>
      <div class="col-md-4">
    <select class="form-control" name="blood_group" readonly>
    <option  name="blood_group" value="A+"<?php echo ($get_personal_details[0]['blood_group']== 'A+') ?  "seleted" : "";?> >A+</option>
    <option  name="blood_group" value="B+"<?php echo ($get_personal_details[0]['blood_group']== 'B+') ?  "selected" : "";?> >B+</option>
    <option  name="blood_group" value="AB+"<?php echo ($get_personal_details[0]['blood_group']== 'AB+') ?  "selected" : "";?> >AB+</option>
    <option  name="blood_group" value="O+"<?php echo ($get_personal_details[0]['blood_group']== 'O+') ?  "selected" : "";?> >O+</option>
    <option  name="blood_group" value="A-"<?php echo ($get_personal_details[0]['blood_group']== 'A-') ?  "selected" : "";?> >A-</option>
    <option  name="blood_group" value="B-"<?php echo ($get_personal_details[0]['blood_group']== 'B-') ?  "selected" : "";?> >B-</option>
    <option  name="blood_group" value="AB-"<?php echo ($get_personal_details[0]['blood_group']== 'AB-') ?  "selected" : "";?> >AB-</option>
    <option  name="blood_group" value="O-"<?php echo ($get_personal_details[0]['blood_group']== 'O-') ?  "selected" : "";?> >O-</option>
  </select>
      </div>

      <label class="control-label col-md-2" for="kashmiri_immigrant">Kashmiri Immigrant:</label>
      <div class="col-md-4">

         <label class="radio-inline"><input type="radio" disabled name="kashmiri_immigrant" value='yes'<?php echo ($get_personal_details[0]['kashmiri_immigrant']== 'yes') ?  "checked" : ""?> >Yes</label>
         <label class="radio-inline"><input type="radio" disabled name="kashmiri_immigrant" value='no'<?php echo ($get_personal_details[0]['kashmiri_immigrant']== 'no') ?  "checked" : ""?> >No</label>
      </div>

    </div>


    <div class="form-group row required">

      <label class="control-label col-md-2">पूरा नाम हिन्दी में:
        <!--<span>
    <a href="https://translate.google.com/#view=home&op=translate&sl=en&tl=hi" target="_blank">Translate</a>
</span>
--></label>

      <div class="col-md-4">
        <input type="text" class="form-control" name="name_in_hindi" value='<?php echo $get_personal_details[0]['name_in_hindi'];?>' readonly>
      </div>

      <label class="control-label col-md-2">Birth Place:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="birth_place" value='<?php echo $get_personal_details[0]['birth_place'];?>' readonly>
      </div>

    </div>



     <div class="form-group row">

      <label class="control-label col-md-2">Identification Mark:</label>

      <div class="col-md-4">

         <textarea class="form-control" name="identification_mark" readonly> <?php echo $get_personal_details[0]['identification_mark']?> </textarea>
      </div>
         <label class="control-label col-md-2" for="hobbies">Hobbies:</label>
      <div class="col-md-4">

         <textarea class="form-control" name="hobbies" readonly> <?php echo $get_personal_details[0]['hobbies'];?></textarea>
      </div>
    </div>



     <div class="form-group row">

     <label class="control-label col-md-2" for="extra_curricular_activity">Extra Curricular Activities:</label>
      <div class="col-md-4">

         <textarea class="form-control" rows="3" name="extra_curricular_activity" readonly><?php echo $get_personal_details[0]['extra_curriculam_activities'];?></textarea>
      </div>

      <label class="control-label col-md-2" for="other_relavant_info">Other Relevent Info:</label>
      <div class="col-md-4">
         <textarea class="form-control" rows="3"name="other_relavant_info" readonly> <?php echo $get_personal_details[0]['other_relevant_info'];?> </textarea>
      </div>

    </div>
      <div class="form-group row">
      <label class="control-label col-md-2">Bank Name:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="bank_name" value='<?php echo $get_personal_details[0]['parent_bank_name'];?>' readonly>
      </div>
      <label class="control-label col-md-2">Account Number:</label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="account_no" value='<?php echo $get_personal_details[0]['parent_account_number'];?>' readonly>
      </div>
    </div>

  <div class="form-group row">
      <label class="control-label col-md-2" for="ifsc">IFSC Code:</label>
      <div class="col-md-4">
       <input type="text"  class="form-control" name="ifsc" value="<?php echo $get_personal_details[0]['parent_bank_ifsc_code']; ?>" readonly>
      </div>
      <label class="control-label col-md-2" for="fav_past_time">Favourite Past time:</label>
        <div class="col-md-4">
        <textarea name="fav_past_time" class="form-control " rows="3" readonly><?php echo $get_personal_details[0]['fav_past_time']; ?></textarea>

</div>
  </div>

  <?php if(!empty($get_personal_details[0]['stu_aadhar_no'])){?>
  <div class="form-group row">
    <label class="control-label col-md-2" for="aadhar_no">Aadhar Number:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="aadhar_no" value='<?php echo $get_personal_details[0]['stu_aadhar_no'];?>' readonly>
      </div>
  </div>
  <?php } ?>

  <?php if(!empty($get_personal_details[0]['stu_passport_no'])){?>
  <div class="form-group row">
    <label class="control-label col-md-2" for="passport_no">Passport Number:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="passport_no" value='<?php echo $get_personal_details[0]['stu_passport_no'];?>' readonly>
      </div>
  </div>
  <?php } ?>

  <div class="form-group row">
    <label class="control-label col-md-2" for="aadhar_no">Migration Certificate:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="aadhar_no" value='<?php echo $get_personal_details[0]['migration_certificate'];?>' readonly>
      </div>
  </div>

  </div>
</div>

    <!------------------------------------                            ------------------------------------->
     <h3 align="center">Parent Details</h3>
    <!--2nd Block-->
<div class="panel panel-default">
  <?php if($admn_type!='msc' && $admn_type!='msctech' && $admn_type!='mtech' && $admn_type!='mba' && $admn_type!='jrf'){?>
  <div class="panel-heading">

    <!-- 2 (1/2) -->
    <div class="form-group row required">

      <label class="control-label col-md-2" >Father Name:</label>
      <div class="col-md-4">

      <input type="text" class="form-control"  name="father_name" value='<?php echo ucwords($get_parent_details[0]['father_name']);?>' readonly>

      </div>


      <label class="control-label col-md-2" >Mother Name:</label>
      <div class="col-md-4">
      <input type="text" class="form-control"  name="mother_name" value='<?php echo ucwords($get_parent_details[0]['mother_name']);?>' readonly>
      </div>

    </div>

 </div>
<?php } ?>
<!---------------------------                    ------------------------------------------->
  <div class="panel-body">
    <?php if($admn_type=='msc'|| $admn_type=='msctech' || $admn_type=='mba' || $admn_type=='mtech' || $admn_type=='jrf'){?>
     <div class="form-group row required">
      <label class="control-label col-md-2" >Father Name:</label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="father_name" value='<?php echo $get_parent_details[0]['father_name'];?>' readonly>
      </div>

      <label class="control-label col-md-2">Mother Name:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="mother_name" value='<?php echo $get_parent_details[0]['mother_name'];?>' readonly>

      </div>

    </div>
  <?php }?>
    <div class="form-group row required">

      <label class="control-label col-md-2" >Father Occupation:</label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="father_occupation" value='<?php echo $get_parent_details[0]['father_occupation'];?>' readonly>
      </div>

      <label class="control-label col-md-2">Mother Occupation:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="mother_occupation" value='<?php echo $get_parent_details[0]['mother_occupation'];?>' readonly>

      </div>

    </div>

     <div class="form-group row required">
      <label class="control-label col-md-2">Father Income:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="father_income" value='<?php echo $get_parent_details[0]['father_income'];?>' readonly>

      </div>

      <label class="control-label col-md-2" >Mother Income:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="mother_income" value='<?php echo $get_parent_details[0]['mother_income'];?>' readonly>

      </div>
    </div>


     <div class="form-group row required">
      <label class="control-label col-md-2" >Parent Mobile No.:</label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="parent_mobile_no" value='<?php echo $get_parent_details[0]['parent_mobile_no'];?>' readonly>

      </div>

      <label class="control-label col-md-2" >Parent Email Id:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="parent_email_id" value='<?php echo $get_parent_details[0]['parent_email_id'];?>' readonly>
      </div>
    </div>

     <div class="form-group row">
        <label class="control-label col-md-2" >Guardian Name:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="guardian_name" value='<?php echo $get_parent_details[0]['guardian_name'];?>' readonly>
      </div>

      <label class="control-label col-md-2" >Guardian Relation:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="guardian_relation" value='<?php echo $get_parent_details[0]['guardian_relation'];?>' readonly>

      </div>
    </div>

     <div class="form-group row">
      <label class="control-label col-md-2" >Alternate Mobile No.:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="alternate_mobile_no" value='<?php echo $get_parent_details[0]['alternate_mobile_no'];?>' readonly>
      </div>
       <label class="control-label col-md-2" >Alternate Email Id:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="alternate_email_id" value='<?php echo $get_parent_details[0]['alternate_email_id'];?>' readonly>
      </div>

      </div>
    </div>
  </div>


<!-----------------------------                                 --------------------------------------------->
  <h3 align="center">Education Details</h3>
 <div class="panel panel-default">
  <div class="panel-body">

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
        <input type="text" class="form-control" name="other_rank" maxlength="5" required readonly oninput="this.value = this.value.replace(/[^0-9.]/g, '');" value='<?php if($get_education_details[0]['other_rank'] != '') {
          echo $get_education_details[0]['other_rank'];
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
      <input type="text" class="form-control" name="cat_score" maxlength="5" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" value='<?php echo $get_education_details[0]['cat_score'];?>' readonly>
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
      <input type="text" class="form-control" name="department" value='<?php echo $department?>'>
      </div>
      </div>
      <?php }

?>

<br>
<div class="form-group">
 <label class="control-label col-md-2" for="cat_score">ABC ID:<strong  style="color: red;">*</strong></label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="abc_id" readonly placeholder="Please Enter the ABC ID" value="<?php if($get_education_details[0]['abc_id'] != '') {
        echo $get_education_details[0]['abc_id'];
      } elseif ($abc_id != '') {
        echo $abc_id;
      } else { /*set_value($other_rank);*/ echo set_value('abc_id'); } ?>">
      <!-- <small><span style="margin-top:5px;margin-bottom:5px;font-weight:bold;"><a href="https://www.abc.gov.in/">Click Here For Further Details</a></span></small> -->
       <?php echo form_error('abc_id'); ?>

    <span><small style="color:red;font-weight:600;">NOTE : ABC ID must be the same as in <u>https://www.abc.gov.in/</u> , any other value is not acceptable ,  in case you have entered a random value then please update the same by moving to the previous education details Section (currently you are in Form Preview Section).</small></span>
      </div>

    </div>



    <br>

    <!-- <h4 align="center">Academic Examination</h4> -->

    <?php /*
    <div class="form-group row required">

      <label class="control-label col-md-2">University/Board:</label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="exam0" value='<?php echo $get_prev_education_details[0]['exam'];?>' readonly>
      </div>

      <label class="control-label col-md-2">Institution:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="institute0" value='<?php echo $get_prev_education_details[0]['institute'];?>' readonly>

      </div>

    </div>

     <div class="form-group row required">
      <label class="control-label col-md-2">Year:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="year0" value='<?php echo $get_prev_education_details[0]['year'];?>' readonly>

      </div>
      <!--
      <label class="control-label col-md-2" >Marksheet:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" value='<?php //echo $marksheet0;?>'>

      </div>
    -->
     <label class="control-label col-md-2" >Grade/Percentage:</label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="grade0" value='<?php echo $get_prev_education_details[0]['grade'];?>' readonly>

      </div>
    </div>

<!--
     <div class="form-group row required">
      <label class="control-label col-md-2" >Grade:</label>
      <div class="col-md-4">
      <input type="text" class="form-control" value='<?php //echo $grade0;?>'>

      </div>

      <label class="control-label col-md-2" >certificate:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" value='<?php //echo $certificate0;?>'>
      </div>
    </div>
-->
     <div class="form-group row required">
      <label class="control-label col-md-2">Division:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="division0" value='<?php echo $get_prev_education_details[0]['division'];?>' readonly>
      </div>

      <label class="control-label col-md-2">Subject:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="sub0" value='<?php echo $get_prev_certificate_details[0]['sub'];?>' readonly>
      </div>
    </div>

    <div class="form-group row required">
       <label class="control-label col-md-2">Specialization:</label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="specialization0" value='<?php echo $get_prev_education_details[0]['specialization'];?>' readonly>
    </div>
  </div>

 <h4 align="center">Academic Examination</h4>

    <div class="form-group row required">

      <label class="control-label col-md-2">University/Board:</label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="exam1" value='<?php echo $get_prev_education_details[1]['exam'];?>' readonly>
      </div>

      <label class="control-label col-md-2" >Institution:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="institute1" value='<?php echo $get_prev_education_details[1]['institute'];?>' readonly>

      </div>

    </div>

     <div class="form-group row required">
      <label class="control-label col-md-2" >Year:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="year1" value='<?php echo $get_prev_education_details[1]['year'];?>' readonly>

      </div>
    <label class="control-label col-md-2" >Grade/Percentage:</label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="grade1" value='<?php echo $get_prev_education_details[1]['grade'];?>' readonly>

      </div>
    </div>
     <div class="form-group row required">
      <label class="control-label col-md-2">Division:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="division1" value='<?php echo $get_prev_education_details[1]['division'];?>' readonly>
      </div>

      <label class="control-label col-md-2">Subject:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="sub1" value='<?php echo $get_prev_certificate_details[1]['sub'];?>' readonly>
      </div>
    </div>

     <div class="form-group row required">
      <!-- <label class="control-label col-md-2">Migration Certificate No.:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="migration_cert1" value='<?php echo $migration_cert1;?>' readonly>
      </div> -->


       <label class="control-label col-md-2">Specialization:</label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="specialization1" value='<?php echo $get_prev_education_details[1]['specialization'];?>' readonly>

  </div>
    </div>

    <?php */ ?>

    <?php
  /*
    foreach($array_dynamic_education_new as $key => $education)
  {

  ?>

   <h4 align="center">Academic Examination</h4>

      <div class="form-group row required">

        <label class="control-label col-md-2">Board:</label>
        <div class="col-md-4">
        <input type="text" class="form-control" name="exam[]" value='<?php echo $education['exam'];?>' readonly>
        </div>

        <label class="control-label col-md-2" >Institution:</label>
        <div class="col-md-4">
          <input type="text" class="form-control" name="institute[]" value='<?php echo $education['institute'];?>' readonly>

        </div>

      </div>

       <div class="form-group row required">
        <label class="control-label col-md-2" >Year:</label>
        <div class="col-md-4">
          <input type="text" class="form-control" name="year[]" value='<?php echo $education['year'];?>' readonly>

        </div>
      <label class="control-label col-md-2" >Grade/Percentage:</label>
        <div class="col-md-4">
        <input type="text" class="form-control" name="grade[]" value='<?php echo $education['grade'];?>' readonly>

        </div>
      </div>
       <div class="form-group row required">
        <label class="control-label col-md-2">Division:</label>
        <div class="col-md-4">
          <input type="text" class="form-control" name="division[]" value='<?php echo $education['division'];?>' readonly>
        </div>

        <label class="control-label col-md-2">Subject:</label>
        <div class="col-md-4">
          <input type="text" class="form-control" name="sub[]" value='<?php echo $this->Phd_mis_reg->get_dynamic_sub_by_sno($education['sno'],$reg_id);?>' readonly>
        </div>
      </div>

       <div class="form-group row">
         <label class="control-label col-md-2">Specialization:</label>
        <div class="col-md-4">
        <input type="text" class="form-control" name="specialization[]" value='<?php echo $education['specialization'];?>' readonly>
      </div>
    </div>

    <input type="hidden" name="certificate[]" value='<?php echo $this->Phd_mis_reg->get_certificate_by_sno($education['sno'],$reg_id);?>'>
  <input type="hidden" name="marksheet[]" value='<?php echo $this->Phd_mis_reg->get_marksheet_by_sno($education['sno'],$reg_id);?>'>

  <?php
  } ?>

  <?php */ ?>





<?php if($admn_type!='jee')
{
  foreach($get_prev_education_details as $key => $education)
  {

  ?>

   <h4 align="center">Academic Examination</h4>

      <div class="form-group row required">

        <label class="control-label col-md-2">Board:</label>
        <div class="col-md-4">
        <input type="text" class="form-control" name="exam[]" value='<?php echo $education['exam'];?>' readonly>
        </div>

        <label class="control-label col-md-2" >Institution:</label>
        <div class="col-md-4">
          <input type="text" class="form-control" name="institute[]" value='<?php echo $education['institute'];?>' readonly>

        </div>

      </div>

       <div class="form-group row required">
        <label class="control-label col-md-2" >Year:</label>
        <div class="col-md-4">
          <input type="text" class="form-control" name="year[]" value='<?php echo $education['year'];?>' readonly>

        </div>
      <label class="control-label col-md-2" >Grade/Percentage:</label>
        <div class="col-md-4">
        <input type="text" class="form-control" name="grade[]" value='<?php echo $education['grade'];?>' readonly>

        </div>
      </div>
       <div class="form-group row required">
        <label class="control-label col-md-2">Division:</label>
        <div class="col-md-4">
          <input type="text" class="form-control" name="division[]" value='<?php echo $education['division'];?>' readonly>
        </div>

        <label class="control-label col-md-2">Subject:</label>
        <div class="col-md-4">
          <input type="text" class="form-control" name="sub[]" value='<?php echo $this->Phdef_mis_reg->get_dynamic_sub_by_sno($education['sno'],$reg_id);?>' readonly>
        </div>
      </div>

       <div class="form-group row">
         <label class="control-label col-md-2">Specialization:</label>
        <div class="col-md-4">
        <input type="text" class="form-control" name="specialization[]" value='<?php echo $education['specialization'];?>' readonly>
      </div>
    </div>

    <input type="hidden" name="certificate[]" value='<?php echo $this->Phdef_mis_reg->get_certificate_by_sno($education['sno'],$reg_id);?>'>
  <input type="hidden" name="marksheet[]" value='<?php echo $this->Phdef_mis_reg->get_marksheet_by_sno($education['sno'],$reg_id);?>'>

  <?php
  } // enf education foreach
}
 ?>
<?php /*?>
 <h3 align="center">Graduation Details</h3>

    <div class="form-group row required">

      <label class="control-label col-md-2">University/Board:</label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="exam2" value='<?php echo $exam2;?>' readonly>
      </div>

      <label class="control-label col-md-2" >Institution:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="institute2" value='<?php echo $institute2;?>' readonly>

      </div>

    </div>

     <div class="form-group row required">
      <label class="control-label col-md-2" >Year:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="year2" value='<?php echo $year2;?>' readonly>

      </div>
    <label class="control-label col-md-2" >Grade/Percentage:</label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="grade2" value='<?php echo $grade2;?>' readonly>

      </div>
    </div>
     <div class="form-group row required">
      <label class="control-label col-md-2">Division:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="division2" value='<?php echo $division2;?>' readonly>
      </div>

      <label class="control-label col-md-2">Subject:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="sub2" value='<?php echo $sub2;?>' readonly>
      </div>
    </div>

     <div class="form-group row required">
       <label class="control-label col-md-2">Specialization:</label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="specialization2" value='<?php echo $specialization2;?>' readonly>
    </div>
  </div>
<?php }?>
   <?php if($admn_type=='mba' || $admn_type=='jrf'){?>
 <h3 align="center">Post Graduation Details</h3>

    <div class="form-group row required">

      <label class="control-label col-md-2">University/Board:</label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="exam3" value='<?php echo $exam3;?>' readonly>
      </div>

      <label class="control-label col-md-2" >Institution:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="institute3" value='<?php echo $institute3;?>' readonly>

      </div>

    </div>

     <div class="form-group row required">
      <label class="control-label col-md-2" >Year:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="year3" value='<?php echo $year3;?>' readonly>

      </div>
    <label class="control-label col-md-2" >Grade/Percentage:</label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="grade3" value='<?php echo $grade3;?>' readonly>

      </div>
    </div>
     <div class="form-group row required">
      <label class="control-label col-md-2">Division:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="division3" value='<?php echo $division3;?>' readonly>
      </div>

      <label class="control-label col-md-2">Subject:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="sub3" value='<?php echo $sub3;?>' readonly>
      </div>
    </div>

     <div class="form-group row required">
       <label class="control-label col-md-2">Specialization:</label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="specialization3" value='<?php echo $specialization3;?>' readonly>
    </div>
  </div> <?php */ ?>

   <?php// } ?>


</div>
</div>

    <!----------------------          ------------------->
<br>

<!-- Hostel Info -->
<h3 align="center">Hostel Info</h3>
    <div class="panel panel-default">
    <div class="panel-body">

    <div class="form-group row required">
      <label class="control-label col-md-2" for="food_habit">Food Habit:</label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="food_habit" value="<?php echo $get_hostel_details[0]['food_habit']; ?>" readonly>

     <?php echo form_error('food_habit'); ?>
   </div>

   <label class="control-label col-md-2" for="laptop_make">if Having laptop(Give Details):Make</label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="laptop_make" value="<?php echo $get_hostel_details[0]['laptop_details']; ?>" readonly>

   </div>

    </div>

    <div class="form-group row">
      <label class="control-label col-md-2" for="laptop_model">if Having laptop(Give Details):</label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="laptop_model" value="<?php echo $get_hostel_details[0]['model_no']; ?>" readonly>

   </div>

   <label class="control-label col-md-2" for="laptop_sl_no">Model No:</label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="laptop_sl_no" value="<?php echo $get_hostel_details[0]['serial_no']; ?>" readonly>

   </div>

    </div>

   </div>
   </div>
<!-- End Hostel info -->

<!-- Email Registration || IITISM Email -->
<h3 align="center">Email Registration</h3>
    <div class="panel panel-default">
    <div class="panel-body">


    <div class="form-group row">
      <label class="control-label col-md-2" for="iitism_email">Email Username:</label>
      <div class="col-md-4">
<input type="text" class="form-control" name="iitism_email" value="<?php echo $iitism_email; ?>" readonly>

   </div>

   <label class="control-label col-md-2" for="iitism_password">Email Password:</label>
      <div class="col-md-4">
<input type="text" class="form-control" name="iitism_password" value="<?php echo $iitism_password; ?>" readonly>

   </div>

    </div>

   </div>
   </div>
<!-- End Email Registration || IITISM Email -->

<!--4th Block -->

<?php /*
 <h3 align="center">Fee Details</h3>
    <div class="panel panel-default">


    <div class="panel-body">

    <div class="form-group row required">
      <label class="control-label col-md-2" for="fee_amount">Fee Amount:</label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="fee_amount" value='<?php echo $get_fee_details[0]['fee_amount'];?>' readonly>
      </div>


      <label class="control-label col-md-2" for="fee_date">Fee date:</label>
      <div class="col-md-4">
        <input type="text" class="form-control" name="fee_date" value='<?php echo $get_fee_details[0]['fee_date'];?>' readonly>
      </div>
    </div>

    <div class="form-group row required">
      <label class="control-label col-md-2" for="fee_mode">Fee Mode:</label>
      <div class="col-md-4">
  <select class="form-control" name="fee_mode" readonly>
    <option name="fee_mode" value='online' <?php echo ($get_fee_details[0]['fee_mode']== 'online') ?  "selected" : "";?> >Online</option>
    <option name="fee_mode" value='dd' <?php echo ($get_fee_details[0]['fee_mode']== 'dd') ?  "selected" : "";?> >DD</option>
    <option name="fee_mode" value='cash' <?php echo ($get_fee_details[0]['fee_mode']== 'cash') ?  "selected" : "";?> >Cash</option>
    <option name="fee_mode" value='none' <?php echo ($get_fee_details[0]['fee_mode']== 'none') ?  "selected" : "";?> >None</option>
  </select>

</div>


      <label class="control-label col-md-2">Transaction Id:</label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="transaction_id" value='<?php echo $get_fee_details[0]['transaction_id'];?>' readonly>

      </div>

</div>
<!--
     <div class="form-group row required">
      <label class="control-label col-md-2" for="receipt">Receipt:</label>
      <div class="col-md-">
        <div class="input-group">
   <span class="input-group-btn">
    <span class="btn btn-primary" disabled>Browse</span>
    <input type="text" value='<?php //echo $receipt;?>'>
</span>
  <span class="form-control"></span>
      </div>
     </div>

  </div>

   -->
  </div>
</div>

*/ ?>

<input type="hidden" name="photo" value='<?php echo $get_personal_details[0]['photo_path'];?>'>
<input type="hidden" name="sign" value='<?php echo $get_personal_details[0]['signature_path'];?>'>
<input type="hidden" name="certificate0" value='<?php echo $get_prev_certificate_details[0]['certificate'];?>'>
<input type="hidden" name="marksheet0" value='<?php echo $get_prev_certificate_details[0]['marks_sheet']; ?>'>
<input type="hidden" name="certificate1" value='<?php echo $get_prev_certificate_details[1]['certificate'];?>'>
<input type="hidden" name="marksheet1" value='<?php echo $get_prev_certificate_details[1]['marks_sheet']; ?>'>
<!-- <input type="hidden" name="certificate2" value='<?php echo $get_prev_certificate_details[2]['certificate'];;?>'>
<input type="hidden" name="marksheet2" value='<?php echo $get_prev_certificate_details[2]['marks_sheet'];;?>'> -->

<?php
/*
  foreach($array_dynamic_education_new as $education_dynamic)
  { ?>

        <input type="hidden" name="verified_certificate[]" value='<?php echo $this->Phd_mis_reg->get_certificate_by_sno($education_dynamic['sno'],$reg_id);?>'>
        <input type="hidden" name="verified_marksheet[]" value='<?php echo $this->Phd_mis_reg->get_marksheet_by_sno($education_dynamic['sno'],$reg_id);?>'>

        <?php }

$count_edu = count($dynamic_prev_edu_details);
$count_cert = count($dynamic_prev_cert_details);
    // echo '<pre>';
    // print_r($dynamic_prev_edu_details);
    // print_r($dynamic_prev_cert_details);
    // echo '</pre>';

    */

foreach($get_prev_education_details as $key => $education)
  { ?>

        <input type="hidden" name="verified_certificate[]" value='<?php echo $this->Phdef_mis_reg->get_certificate_by_sno($education['sno'],$reg_id);?>'>
        <input type="hidden" name="verified_marksheet[]" value='<?php echo $this->Phdef_mis_reg->get_marksheet_by_sno($education['sno'],$reg_id);?>'>

        <?php }
        ?>

<?php
/* if($admn_type!='jee'){?>
<input type="hidden" name="certificate2" value='<?php echo $certificate2;?>'>
<input type="hidden" name="marksheet2" value='<?php echo $marksheet2;?>'>

  <?php
 }?>

  <?php if($admn_type=='mba' || $admn_type=='jrf'){?>
<input type="hidden" name="certificate3" value='<?php echo $certificate3;?>'>
<input type="hidden" name="marksheet3" value='<?php echo $marksheet3;?>'>
  <?php }
  */?>
<!-- <input type="hidden" name="receipt" value='<?php echo $get_fee_details[0]['receipt_path'];?>'> -->
</div>

</div>

<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx User Account Details xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<?php if($admn_type!='jee') { ?>
<h3 align="center">Account Details</h3>
    <div class="panel panel-default">
    <div class="panel-body">

    <div class="form-group row required">
      <label class="control-label col-md-2" for="user_bank_name">Bank Name:</label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="user_bank_name" value="<?php echo $get_student_account_details[0]['bank_name']; ?>" readonly>

     <?php echo form_error('user_bank_name'); ?>
   </div>

   <label class="control-label col-md-2" for="user_account_no">Account No:</label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="user_account_no" value="<?php echo $get_student_account_details[0]['account_no']; ?>" readonly>

   </div>

    </div>

    <div class="form-group row">
      <label class="control-label col-md-2" for="c_user_account_no">Confirm Account No:</label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="c_user_account_no" value="<?php echo $get_student_account_details[0]['account_no']; ?>" readonly>

   </div>

   <label class="control-label col-md-2" for="user_ifsc_code">IFSC Code:</label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="user_ifsc_code" value="<?php echo $get_student_account_details[0]['ifsc_code']; ?>" readonly>

   </div>

    </div>

   </div>
   </div>
   <?php } ?>
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx User Account Details xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->

        <!-- <div class="modal-footer"> -->

          <div class="form-group row" align="center">
              <!-- <a href="<?php echo $get_prev_certificate_details[0]['marks_sheet'] ?>" download="Marksheet_10th" class="btn btn-primary" target="_blank">
         Marksheet 10th
           </a>
            <a href="<?php echo $get_prev_certificate_details[0]['certificate'] ?>" download="Certificate_10th" class="btn btn-primary" target="_blank">
        Certificate 10th
           </a>


                   <a href="<?php echo $get_prev_certificate_details[1]['marks_sheet'] ?>" download="Marksheet_12th" class="btn btn-primary" target="_blank">
         Marksheet 12th
           </a>
            <a href="<?php echo $get_prev_certificate_details[1]['certificate'] ?>" download="Certificate_12th" class="btn btn-primary" target="_blank">
         Certificate 12th
           </a>

           <!-- <a href="<?php echo $get_prev_certificate_details[2]['marks_sheet'] ?>" download="Marksheet_12th" class="btn btn-primary" target="_blank">
         Marksheet Graduation
           </a>
            <a href="<?php echo $get_prev_certificate_details[2]['certificate'] ?>" download="Certificate_12th" class="btn btn-primary" target="_blank">
         Certificate Graduation
           </a> -->
          <?php

  if($admn_type!='jee')
  {
  foreach($get_prev_certificate_details as $certificate_list)
  {
?>
    <a href="<?php echo $certificate_list['marks_sheet']; ?>" download="Marksheet_grad" class="btn btn-primary" target="_blank">
    Marksheet File &nbsp; <?php echo $certificate_list['specialization']; ?>
           </a>
    <a href="<?php echo $certificate_list['certificate']; ?>" download="Certificate_grad" class="btn btn-primary" target="_blank">
     Certificate File &nbsp; <?php echo $certificate_list['specialization']; ?>
    </a>
<?php
  } // end foreach for certificates link
}
?>

                <!-- <a href="<?=base_url ()?>/assets/admission/phd/<?php echo $reg_id;?>/<?php echo $get_fee_details[0]['receipt_path'];?>" download="Fee_Receipt" class="btn btn-primary" target="_blank">
         Receipt
           </a> -->

          </div>


          <!-- <div class="form-group">
      <div class="col-md-offset-2 col-md-10" align="center">
        <button type="submit" name="action" value="submit" class="btn btn-primary">Submit</button>


        <button type="submit" name="action" value="back" class="btn btn-default">Edit</button>

      </div>
    </div> -->

    <input type="button" name="previous" id="previous_other_details" class="previous action-button-previous" value="Previous" />
    <input type="submit" name="next" class="next action-button" value="Proceed For Payment" />
    <input type="hidden" name="admn_type" value='<?php echo $admn_type;?>'>
        <!-- </div> -->

        <br><br><br><br>

</form>
</div>

</div>
</div>
</div>
</div>

<div id="overlay">
       <br><br><br><br>
         <div id="loading" class="text-center" style="color:white;">
          <i class="fa fa-spinner fa-spin" style="font-size: 70px;"></i>
          <br><h3>Please wait<br>while loading MIS Registration </h3>
         </div>
     </div>

     <div id="overlay1">
       <br><br><br><br>
         <div id="loading" class="text-center" style="color:white;">
          <i class="fa fa-spinner fa-spin" style="font-size: 70px;"></i>
          <br><h3>Please wait<br>Getting Payment Sink Details</h3>
         </div>
     </div>

<script>
  //$("#next_submit").find('[type="submit"]').trigger('click');
      function submitForm(form) {
      if (confirm("Are You Sure ,  you want to proceed to final Form Submission ?")){
          // $('#overlay').css('display', 'block');
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
  $('#previous_other_details').click(function(){
    //alert('hii');
   window.location.href = "<?php echo base_url(); ?>index.php/admission/phdef/Adm_phdef_mis_registration_other_details/manage_previous_other_details";
  });
</script>
</body>
</html>


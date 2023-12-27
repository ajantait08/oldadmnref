<link href="<?php echo base_url();?>themes/dist/css/phd/adm_phd_personal_details.css" rel="stylesheet" media="screen">
<script type="text/javascript">

// ------------step-wizard-------------
$(document).ready(function () {
    
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

        var target = $(e.target);
    
        if (target.parent().hasClass('disabled')) {
            return false;
        }
    });

});

</script>
<div class="row"> <!--row start  -->
    <div class="col-sm-2 col-md-2 col-lg-2"> <!--row col-md-4 start  -->
         <!--notice start  -->
           
        <!--notice end -->
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
                                <?php if(!empty($curr_appl_no)) { ?>
                                <div class="well well-sm">Current application No</div>
                                <div class="well well-sm" style="margin-top: -21px;"><?php echo $curr_appl_no; ?></div>
                                <?php } ?>
                               </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                   
                                <input class="btn btn-danger" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/phd/Adm_phd_registration/logout'" value="Logout" />
                                    
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
                        <div class="panel-heading">Please fill up your application details
                        </div>
                        <div class="panel-body">
                            <section class="signup-step-container">
                                <div class="">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-12">
                                            <div class="wizard">
                                                <div class="wizard-inner">
                                                    <div class="connecting-line"></div>
                                                    <ul class="nav nav-tabs " role="tablist">
                                                        <li role="presentation" id="tab1">
                                                            <a href="#" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">PD </span> <i>Personal details</i></a>
                                                        </li>
                                                        <li role="presentation" class="disabled" id="tab2">
                                                            <a href="#" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">QN</span> <i>Qualification</i></a>
                                                        </li>
                                                        <li role="presentation" class="disabled" id="tab3">
                                                            <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" aria-expanded="false"><span class="round-tab">WE</span> <i>Work Experience</i></a>
                                                        </li>
                                                        <li role="presentation" class="disabled" id="tab4">
                                                            <a href="#" data-toggle="tab" aria-controls="step4" role="tab" aria-expanded="false"><span class="round-tab">DU</span> <i>Document upload</i></a>
                                                        </li>
                                                        <li role="presentation" class="disabled" id="tab5">
                                                            <a href="#"><span class="round-tab">PT</span> <i>Payment</i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- <form role="form" action="index.html" class="login-box register"> -->
                                                    <div class="tab-content" id="main_form">
                                                        <!-- first tab personal detail start -->
                                                        <div class="tab-pane active" role="tabpanel" id="step1">
                                                           
                                                            <?php if($this->session->flashdata('apply_success_education')){?>
                                                            <div class="alert alert-success alert-dismissible">
                                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                             <?php echo $this->session->flashdata('apply_success_education')?>
                                                            </div> 
                                                            <?php }?>
                                                            <?php if($this->session->flashdata('success')){?>
                                                            <div class="alert alert-success alert-dismissible">
                                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                            <?php echo $this->session->flashdata('success')?>
                                                            </div> 
                                                            <?php }?>
                                                            <?php if($this->session->flashdata('error_personal')){?>
                                                            <div class="alert alert-danger alert-dismissible">
                                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                            <?php echo $this->session->flashdata('error_personal')?>
                                                            </div> 
                                                            <?php }?>
                                                            <h4 class="text-center" style="text-decoration: underline;">Personal details</h4>
                                                           
                                                            <?php 
                                                            
                                                             
                                                            $attributes = array('class' => 'email', 'id' => 'p_details','name'=>'p_details','enctype'=>'multipart/form-data');
                                                            echo form_open('admission/phd/Adm_phd_personal_details/get_personal_details', $attributes); ?>
                                                                <div class="row">
                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Applicant's Name:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="application_no" type="text" name="application_no" class="form-control" value=" <?php if(!empty($registration_detail)) { echo $registration_detail[0]->first_name." ".$registration_detail[0]->middle_name." ".$registration_detail[0]->last_name ;}?>"  readonly>
                                                                                <input id="app_type_part_full" name="app_type_part_full" type="hidden" value="<?php if(!empty($full_partime)) { echo $full_partime;}?>">
                                                                                <input id="from_iit" name="from_iit" type="hidden" value="<?php if(!empty($application_details_ms[0]['betch_iit'])) { echo $application_details_ms[0]['betch_iit'];}?>">
                                                                                <input id="emp_project_ism" name="emp_project_ism" type="hidden" value="<?php if(!empty($application_details_ms[0]['ism_proj_emp'])) { echo $application_details_ms[0]['ism_proj_emp'];}?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                
                                                                        <div class="form-group">
                                                                            <label>Registration No:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="registration_no" name="registration_no" type="text" class="form-control" value="<?php if(!empty($registration_detail)) { echo $registration_detail[0]->registration_no;}?>" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Name of the Parent/Guardian: <span style="color:red;">*</span></label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="parent_name" name="parent_name" onkeyup="capital(this.id)" value="<?php echo set_value('parent_name');?><?php if(!empty($application_details_ms[0]['guardian_name'])){ echo $application_details_ms[0]['guardian_name'];}?>" onkeypress="return IsSpecificSpecialCharacter(event);" type="text" class="form-control" placeholder="Enter Name of the Parent/Guardian" maxlength="49">
                                                                                <?php if(validation_errors()){?>
                                                                                <div class ="myalert">
                                                                                <?php echo form_error('parent_name') ?>
                                                                                </div>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6 col-sm-12 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Guardian's Mobile Number: <span style="color:red;">*</span></label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input  id="guardian_mobile_no" name="guardian_mobile_no" type="text" value="<?php echo set_value('guardian_mobile_no');?><?php if(!empty($application_details_ms[0]['guardian_mobile'])){ echo $application_details_ms[0]['guardian_mobile'];}?>" class="form-control" maxlength="10" placeholder="Enter Guardian Mobile Number">
                                                                                <?php if(validation_errors()){?>
                                                                                <div class ="myalert">
                                                                                <?php echo form_error('guardian_mobile_no');?>
                                                                                </div>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Relationship with Parent/Guardian: <span style="color:red;">*</span></label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input  id="parent_relation" name="parent_relation" value="<?php echo set_value('parent_relation');?><?php if(!empty($application_details_ms[0]['guardian_realtion'])){ echo $application_details_ms[0]['guardian_realtion'];}?>" onkeypress="return IsSpecificSpecialCharacter(event);"  onkeyup="capital(this.id)" type="text" class="form-control" placeholder="Enter Relationship with Parent/Guardian" maxlength="49">
                                                                                <?php if(validation_errors()){?>
                                                                                <div class ="myalert">
                                                                                <?php echo form_error('parent_relation') ?>
                                                                                </div>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Category:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="category" name="category" type="text" class="form-control" value="<?php if(!empty($registration_detail)) { echo $registration_detail[0]->category ;}?>" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Divyang (PwD):</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="pwd" name="pwd" type="text" value="<?php if(!empty($registration_detail)) { if($registration_detail[0]->pwd=='Y'){ echo "Yes";} else {echo "No";} } ?>" class="form-control" name="divyang" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Nationality: <span style="color:red;">*</span></label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="nationality" name="nationality" type="text" value="<?php echo set_value('nationality','INDIAN'); ?>" class="form-control" readonly>
                                                                                <?php if(validation_errors()){?>
                                                                                <div class ="myalert">
                                                                                <?php echo form_error('nationality') ?>
                                                                                </div>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Religion: <span style="color:red;">*</span></label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                
                                                                                <select class="form-control" id="religion" name="religion" required>

                                                                                <?php if(!empty($application_details_ms[0]['religion']))
                                                                                    {?>
                                                                                
                                                                        
                                                                                    <option value="<?php echo $application_details_ms[0]['religion']; ?>"><?php echo $application_details_ms[0]['religion']; ?></option>
                                                                                
                                                                                    <option value="Hindu" <?php echo  set_select('religion', 'Hindu'); ?>>Hindu</option>
                                                                                    <option value="Christian" <?php echo  set_select('religion', 'Christian'); ?>>Christian</option>
                                                                                    <option value="Buddhist" <?php echo  set_select('religion', 'Buddhist'); ?>>Buddhist</option>
                                                                                    <option value="Muslim" <?php echo  set_select('religion', 'Muslim'); ?>>Muslim</option>
                                                                                    <option value="Sikh" <?php echo  set_select('religion', 'Sikh'); ?>>Sikh</option>
                                                                                    <option value="Other" <?php echo  set_select('religion', 'Other'); ?>>Other</option>

                                                                                    <?php 
                                                                                    }
                                                                                    else 
                                                                                    {?>
                                                                                    
                                                                                    <option value="">Please Select Religion</option> 
                                                                                    <option value="Hindu" <?php echo  set_select('religion', 'Hindu'); ?>>Hindu</option>
                                                                                    <option value="Christian" <?php echo  set_select('religion', 'Christian'); ?>>Christian</option>
                                                                                    <option value="Buddhist" <?php echo  set_select('religion', 'Buddhist'); ?>>Buddhist</option>
                                                                                    <option value="Muslim" <?php echo  set_select('religion', 'Muslim'); ?>>Muslim</option>
                                                                                    <option value="Sikh" <?php echo  set_select('religion', 'Sikh'); ?>>Sikh</option>
                                                                                    <option value="Other" <?php echo  set_select('religion', 'Other'); ?>>Other</option>
                                                                                    <?php
                                                                                    }?>
                                                                                    
                                                                                    
                                                                                </select>
                                                                                <?php if(validation_errors()){?>
                                                                                <div class ="myalert">
                                                                                <?php echo form_error('religion') ?>
                                                                                </div>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Martial Status <span style="color:red;">*</span></label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <select id="martial" name="martial" class="form-select" aria-label="Default select example">
                                                                                    <?php if(!empty($application_details_ms[0]['maritial_status']))
                                                                                    {?>
                                                                                
                                                                                    <option value="<?php echo $application_details_ms[0]['maritial_status']; ?>"><?php echo $application_details_ms[0]['maritial_status']; ?></option>
                                                                                    <option value="Married" <?php echo  set_select('martial', 'Married'); ?> >Married</option>
                                                                                    <option value="Unmarried" <?php echo  set_select('martial', 'Unmarried'); ?>>Unmarried</option>
                                                                                    <option value="Widowed" <?php echo  set_select('martial', 'Widowed'); ?>>Widowed</option>
                                                                                    <option value="Divorced" <?php echo  set_select('martial', 'Divorced'); ?>>Divorced</option>
                                                                                    <option value="Other" <?php echo  set_select('martial', 'Other'); ?>>Other</option>

                                                                                    <?php 
                                                                                    }
                                                                                    else 
                                                                                    {?>
                                                                                    
                                                                                    <option value=""> Please Select Martial Status</option>
                                                                                    <option value="Married" <?php echo  set_select('martial', 'Married'); ?> >Married</option>
                                                                                    <option value="Unmarried" <?php echo  set_select('martial', 'Unmarried'); ?>>Unmarried</option>
                                                                                    <option value="Widowed" <?php echo  set_select('martial', 'Widowed'); ?>>Widowed</option>
                                                                                    <option value="Divorced" <?php echo  set_select('martial', 'Divorced'); ?>>Divorced</option>
                                                                                    <option value="Other" <?php echo  set_select('martial', 'Other'); ?>>Other</option>
                                                                                    <?php
                                                                                    }?>
                                                                                    
                                                                                </select>
                                                                                <?php if(validation_errors()){?>
                                                                                <div class ="myalert">
                                                                                <?php echo form_error('martial') ?>
                                                                                </div>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>DOB: <span style="color:red;">*</span></label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="dob" name="dob" type="text" class="form-control" value ="<?php if(!empty($registration_detail)) { echo $registration_detail[0]->dob ;}?>"  readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Email: <span style="color:red;">*</span></label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="email" name="email" type="text" class="form-control"  value ="<?php if(!empty($registration_detail)) { echo $registration_detail[0]->email ;}?>" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Mobile Number:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="mobile" name="mobile" type="text"  value ="<?php if(!empty($registration_detail)) { echo $registration_detail[0]->mobile ;}?>" class="form-control"  readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Aadhaar Number: <span style="color:red;">*</span></label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="adhar" name="adhar" value="<?php echo set_value('adhar'); ?><?php if(!empty($application_details_ms[0]['adhar'])){ echo $application_details_ms[0]['adhar'];} ?>"  maxlength="12" type="text" class="form-control" placeholder="">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Gender: <span style="color:red;">*</span></label>
                                                                            <div class="input-group">
                                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="gender" name="gender" value="<?php echo set_value('gender'); ?> <?php if(!empty($registration_detail[0]->gender)){ echo $registration_detail[0]->gender;} ?>"  maxlength="12" type="text" class="form-control" placeholder="" readonly>
                                                                                
                                                                                <?php if(validation_errors()){?>
                                                                                <div class ="myalert">
                                                                                <?php echo form_error('martial') ?>
                                                                                </div>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                
                                                                    
                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Application Type:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="department" name="department" type="text"  value ="<?php if(!empty($registration_detail)) { echo ucwords($registration_detail[0]->appl_type); }?>" class="form-control" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                            
                                                                          
                                                                            
                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Course:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="course" name="course" value ="Ph.D." type="text" maxlength="8"class="form-control" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Color blindness/uniocularity:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="course" name="course" value ="<?php if(!empty($registration_detail)) { if($registration_detail[0]->color_blind =='Y'){ echo "Yes"; } else { echo "No"; } }?>" type="text" class="form-control" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php 
                                                                    if($registration_detail[0]->category=='OBC' || $registration_detail[0]->category=='EWS')
                                                                    {
                                                                     ?>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Date of Issue of cast certificate(OBC-NCL/EWS)(Cut off date of issue of caste certificate is 01-04-2021)<span id='doprof' style="color:red;">*</span></label>
                                                        
                                                                            <div class="input-group">
                                                                                        
                                                                                <input id="date_of_issue" type="text" name="date_of_issue" class="form-control" value="<?php if (!empty($application_details_ms[0]['ews_obc_doc_date'])){ echo $application_details_ms[0]['ews_obc_doc_date']; } ?>" readonly>
                                                                                <?php if (validation_errors()){ ?>
                                                                                    <div class="myalert">
                                                                                        <?php echo form_error('date_of_issue') ?>
                                                                                    </div>
                                                                                    <?php } ?>                                                                                               
                                                                                                                                                                                  
                                                                                      
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                   <?php } ?>
      
                                                                </div>
                                                                

                                                                <div class="row">
                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label>Correspondence Address:<span style="color:red;">*</span></label>
                                                                                    <p style="float:left"><span style="color:red;">*Line1 Address, City and District, State, Pincode are mandatory</span></p>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <div class="form-group purple-border">
                                                                                        <input  onkeypress="return IsSpecificSpecialCharacter(event);" value="<?php echo set_value('c_line1')?><?php if(!empty($c_addr_details[0]->line_1)){ echo $c_addr_details[0]->line_1;}?>" id="c_line1" name="c_line1" type="text" class="form-control"  placeholder="Enter Line 1 address" maxlength="49">
                                                                                        <input  value="<?php if(!empty($c_addr_details[0]->addr_id)){ echo $c_addr_details[0]->addr_id;}?>" id="c_line4" name="c_line4" type="hidden" class="form-control" maxlength="49">
                                                                                        <?php if(validation_errors()){?>
                                                                                        <div class ="myalert">
                                                                                        <?php echo form_error('c_line1') ?>
                                                                                        </div>
                                                                                        <?php } ?>
                                                                                        <input  onkeypress="return IsSpecificSpecialCharacter(event);"  value="<?php echo set_value('c_line2')?><?php if(!empty($c_addr_details[0]->line_2)){ echo $c_addr_details[0]->line_2;}?>"  id="c_line2" name="c_line2" type="text" class="form-control"  placeholder="Enter Line 2 address " maxlength="49">
                                                                                        <input  onkeypress="return IsSpecificSpecialCharacter(event);" value="<?php echo set_value('c_line3')?><?php if(!empty($c_addr_details[0]->line_3)){ echo $c_addr_details[0]->line_3;}?>"   id="c_line3" name="c_line3" type="text" class="form-control"  placeholder="Enter Line 3 address " maxlength="49">
                                                                                        <input  onkeypress="return IsSpecificSpecialCharacter(event);" value="<?php echo set_value('c_city')?><?php if(!empty($c_addr_details[0]->city)){ echo $c_addr_details[0]->city;}?>"  id="c_city" name="c_city" type="text" class="form-control"  placeholder="Enter City and District " maxlength="49">
                                                                                        <?php if(validation_errors()){?>
                                                                                        <div class ="myalert">
                                                                                        <?php echo form_error('c_city') ?>
                                                                                        </div>
                                                                                        <?php } ?> 
                                                                                        <select class="form-control" id="c_state" name="c_state">

                                                                                            <?php if(!empty($c_addr_details[0]->state))
                                                                                                {?>
                                                                                            
                                                                                                <option value="<?php echo $c_addr_details[0]->state?>"><?php echo $c_addr_details[0]->state; ?></option>
                                                                                            
                                                                                                
                                                                                                <?php if(!empty($state)){ foreach ($state as $value) {?>
                                                                                                <option value="<?php echo $value->state_name?> <?php echo  set_select('c_state',$value->state_name);?>"><?php echo $value->state_name?></option>
                                                                                                <?php }}?>

                                                                                                <?php 
                                                                                                }
                                                                                                else 
                                                                                                {?>
                                                                                                
                                                                                                <option value="">Please Select State</option>
                                                                                                <?php if(!empty($state)){ foreach ($state as $value) {?>
                                                                                                <option value="<?php echo $value->state_name?> <?php echo  set_select('c_state',$value->state_name);?>"><?php echo $value->state_name?></option>
                                                                                                <?php }}?>

                                                                                                <?php
                                                                                                }?>

                                                                                        </select>
                                                                                        <?php if(validation_errors()){?>
                                                                                        <div class ="myalert">
                                                                                        <?php echo form_error('c_state') ?>
                                                                                        </div>
                                                                                        <?php } ?>
                                                                                        <input id="c_pincode" name="c_pincode" value="<?php echo set_value('c_pincode')?><?php if(!empty($c_addr_details[0]->pincode)){ echo $c_addr_details[0]->pincode;}?>" maxlength="6" type="text" class="form-control" placeholder="Enter Pincode">
                                                                                        <?php if(validation_errors()){?>
                                                                                        <div class ="myalert">
                                                                                        <?php echo form_error('c_pincode') ?>
                                                                                        </div>
                                                                                        <?php } ?>
                                                                                        <input  id="c_country" name="c_country"  value="INDIA"  maxlength="6" type="text" class="form-control" readonly>
                                                                                        <?php if(validation_errors()){?>
                                                                                        <div class ="myalert">
                                                                                        <?php echo form_error('c_country') ?>
                                                                                        </div>
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                </div>        
                                                                            </div>
                                                                        </div> 
                                                                    </div>
                                                                                                           
                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                                
                                                                                <div class="form-group">
                                                                                    <label>Permanent Address <span style="color:red;">* </span><input type="checkbox" class="form-check-input" id="same_p_c_add" name="same_p_c_add"> (same as Correspondence)</label>
                                                                                    <p style="float:left"><span style="color:red;">* Line1 Address, City and District, State, Pincode are mandatory</span></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12  col-sm-12 col-lg-12">
                                                                                <div class="form-group">
                                                                                    <div class="form-group purple-border">
                                                                                    <input  onkeypress="return IsSpecificSpecialCharacter(event);" value="<?php echo set_value('p_line1')?><?php if(!empty($p_addr_details[0]->line_1)){ echo $p_addr_details[0]->line_1;} ?>"  id="p_line1" name="p_line1" type="text" class="form-control"  placeholder="Enter Line 1 address " maxlength="49">
                                                                                    <input  value="<?php if(!empty($p_addr_details[0]->addr_id)){ echo $p_addr_details[0]->addr_id;} ?>"  id="p_line4" name="p_line4" type="hidden">
                                                                                    <?php if(validation_errors()){?>
                                                                                        <div class ="myalert">
                                                                                        <?php echo form_error('p_line1') ?>
                                                                                        </div>
                                                                                    <?php } ?> 
                                                                                    <input  onkeypress="return IsSpecificSpecialCharacter(event);" id="p_line2" value="<?php echo set_value('p_line2')?><?php if(!empty($p_addr_details[0]->line_2)){ echo $p_addr_details[0]->line_2;} ?>"  name="p_line2" type="text" class="form-control"  placeholder="Enter Line 2 address " maxlength="49">
                                                                                    <input  onkeypress="return IsSpecificSpecialCharacter(event);" id="p_line3" value="<?php echo set_value('p_line3')?><?php if(!empty($p_addr_details[0]->line_3)){ echo $p_addr_details[0]->line_3;} ?>"  name="p_line3" type="text" class="form-control"  placeholder="Enter Line 3 address " maxlength="49">
                                                                                    <input  onkeypress="return IsSpecificSpecialCharacter(event);" id="p_city" value="<?php echo set_value('p_city')?><?php if(!empty($p_addr_details[0]->city)){ echo $p_addr_details[0]->city;} ?>" name="p_city"  type="text" class="form-control"  placeholder="Enter City and District" maxlength="49">
                                                                                    <?php if(validation_errors()){?>
                                                                                        <div class ="myalert">
                                                                                        <?php echo form_error('p_city') ?>
                                                                                        </div>
                                                                                    <?php } ?> 
                                                                                    <select class="form-control" id="p_state" name="p_state">
                                                                                            

                                                                                            <?php if(!empty($p_addr_details[0]->state))
                                                                                            {?>
                                                                                        
                                                                                            <option value="<?php echo $p_addr_details[0]->state;?>"><?php echo $p_addr_details[0]->state; ?></option>
                                                                                        
                                                                                            
                                                                                            <?php if(!empty($state)){ foreach ($state as $value) {?>
                                                                                            <option value="<?php echo $value->state_name?> <?php echo  set_select('p_state',$value->state_name);?>"><?php echo $value->state_name?></option>
                                                                                            <?php }}?>

                                                                                            <?php 
                                                                                            }
                                                                                            else 
                                                                                            {?>
                                                                                            
                                                                                            <option value="">Please Select State</option>
                                                                                            <?php if(!empty($state)){ foreach ($state as $value) {?>
                                                                                            <option value="<?php echo $value->state_name?> <?php echo  set_select('p_state',$value->state_name);?>"><?php echo $value->state_name?></option>
                                                                                            <?php }}?>

                                                                                            <?php
                                                                                            }?>
                                                                                        

                                                                                    </select>
                                                                                    <?php if(validation_errors()){?>
                                                                                        <div class ="myalert">
                                                                                        <?php echo form_error('p_state') ?>
                                                                                        </div>
                                                                                    <?php } ?> 
                                                                                    <input id="p_pincode" name="p_pincode" value="<?php echo set_value('p_pincode')?><?php if(!empty($p_addr_details[0]->pincode)){ echo $p_addr_details[0]->pincode;} ?>"  maxlength="6" type="text" class="form-control"  placeholder="Enter Pincode">
                                                                                    <?php if(validation_errors()){?>
                                                                                        <div class ="myalert">
                                                                                        <?php echo form_error('p_pincode') ?>
                                                                                        </div>
                                                                                    <?php } ?> 
                                                                                    <input id="p_country" name="p_country" maxlength="6"  value="INDIA" class="form-control" readonly>
                                                                                    <?php if(validation_errors()){?>
                                                                                        <div class ="myalert">
                                                                                        <?php echo form_error('p_country') ?>
                                                                                        </div>
                                                                                    <?php } ?> 
                                                                                </div>
                                                                            </div>        
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                
                                                                <p><span style="color:red;">NOTE: No special characters are allowed in address</span></p>
                                                                <?php 
                                                                if(!empty($full_partime))
                                                                {    
                                                                  if($full_partime=='Full time')  
                                                                  {?>

                                                                
                                                                <div class="row">
                                                                   <div class="col-md-6 col-sm-6 col-lg-6">
                                                                       <div id="yes_no_institue">
                                                                            <div class="form-group">
                                                                                <label>Are you working in IIT(ISM) Project<span style="color:red;">*</span></label>
                                                                                <div class="input-group">
                                                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                        <select id="working_project" name="working_project" class="form-select" aria-label="Default select example">
                                                                                        
                                                                                        <!-- start -->
                                                                                        <?php if(!empty($application_details_ms[0]['ism_proj_emp']))
                                                                                        { 
                                                                                            if($application_details_ms[0]['ism_proj_emp']=='Y')
                                                                                                                                                                    
                                                                                            {?>
                                                                                                <option value="<?php if($application_details_ms[0]['ism_proj_emp']=='Y'){echo "Y";} ?>" <?php echo  set_select('btech_cgpa', 'Yes');?> selected><?php if($application_details_ms[0]['ism_proj_emp']=='Y'){echo "Yes";} ?></option>
                                                                                                <option value="N" <?php echo  set_select('working_project', 'No'); ?>>No</option> 

                                                                                            <?php }
                                                                                            else 
                                                                                            {?>
                                                                                            
                                                                                            <option value="N" <?php echo  set_select('working_project', 'No'); ?> selected>No</option>
                                                                                            <option value="Y" <?php echo  set_select('working_project', 'No'); ?>>Yes</option>
                                                                                        
                                                                                            <?php 
                                                                                            }?>
                                                                                        
                                                                                        <?php }
                                                                                        else 
                                                                                        {?>
                                                                                            <option value="">---Please Select---</option>
                                                                                            <option value="Y" <?php echo  set_select('working_project', 'No'); ?>>Yes</option>
                                                                                            <option value="N" <?php echo  set_select('working_project', 'No'); ?>>No</option>

                                                                                        <?php }?>
                                                                                          <!-- end -->

                                                                                    </select>
                                                                                    <?php if (validation_errors()) { ?>
                                                                                        <div class="myalert">
                                                                                            <?php echo form_error('working_project') ?>
                                                                                        </div>
                                                                                    <?php } ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group" id="assi_ext_type">
                                                                            <label>Assistantship Type<span style="color:red;">*</span></label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <select id="assistant_type" name="assistant_type" class="form-select" aria-label="Default select example">
                                                                                    

                                                                                      <!-- start -->
                                                                                      <?php if(!empty($application_details_ms[0]['assistance_type']))
                                                                                        { 
                                                                                            if($application_details_ms[0]['assistance_type']=='IA')
                                                                                                                                                                    
                                                                                            {?>
                                                                                                <option value="<?php if($application_details_ms[0]['assistance_type']=='IA'){echo "IA";} ?>" <?php echo  set_select('assistant_type', 'Yes');?> selected><?php if($application_details_ms[0]['assistance_type']=='IA'){echo "Institue Assistantship";} ?></option>
                                                                                                <option value="EXT" <?php echo  set_select('assistant_type', 'External Fellowship'); ?>>External Fellowship</option>

                                                                                            <?php }
                                                                                            else 
                                                                                            {?>
                                                                                            
                                                                                            <option value="EXT" <?php echo  set_select('assistant_type', 'External Fellowship'); ?> selected>External Fellowship</option>
                                                                                            <option value="IA" <?php echo  set_select('assistant_type', 'Institue Assistantship'); ?>>Institue Assistantship</option>
                                                                                        
                                                                                            <?php 
                                                                                            }?>
                                                                                        
                                                                                        <?php }
                                                                                        else 
                                                                                        {?>
                                                                                            <option value="">---Please Select--</option>
                                                                                            <option value="IA" <?php echo  set_select('assistant_type', 'Institue Assistantship'); ?>>Institue Assistantship</option>
                                                                                            <option value="EXT" <?php echo  set_select('assistant_type', 'External Fellowship'); ?>>External Fellowship</option>

                                                                                        <?php }?>
                                                                                        <!-- end -->




                                                                                </select>
                                                                                <?php if (validation_errors()) { ?>
                                                                                    <div class="myalert">
                                                                                        <?php echo form_error('assistant_type') ?>
                                                                                    </div>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                          
                                                                </div>

                                                                <div class="row" id="project_details">
                                                                    <div class="col-md-12">
                                                                        <table>
                                                                            <tr>

                                                                                <td>
                                                                                    <div class="form-group">
                                                                                        <label>Project Designation</label>
                                                                                        <div class="input-group">
                                                                                            
                                                                                            <input id="project_designation" maxlength="48" type="text" name="project_designation" class="form-control" value="<?php if (!empty($application_details_ms[0]['proj_designation'])){ echo $application_details_ms[0]['proj_designation']; }?>">
                                                                                            <?php if (validation_errors()){ ?>
                                                                                                <div class="myalert">
                                                                                                    <?php echo form_error('project_designation') ?>
                                                                                                </div>
                                                                                             <?php } ?>                                                                                             
                                                                                                                                                                                       
                                                                                           
                                                                                        </div>
                                                                                    </div>
                                                                                </td>

                                                                                <td>
                                                                                    <div class="form-group">
                                                                                        <label>Project No</label>
                                                                                        <div class="input-group">
                                                                                            
                                                                                            <input id="project_no" type="text" maxlength="48" name="project_no" class="form-control" value="<?php if (!empty($application_details_ms[0]['proj_no'])){ echo $application_details_ms[0]['proj_no']; } ?>">
                                                                                            <?php if (validation_errors()){ ?>
                                                                                                <div class="myalert">
                                                                                                    <?php echo form_error('project_no') ?>
                                                                                                </div>
                                                                                             <?php } ?>                                                                                                
                                                                                                                                                                                       
                                                                                           
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                        
                                                                                <td>
                                                                                    <div class="form-group">
                                                                                        <label>Project Name</label>
                                                                                        <div class="input-group">
                                                                                        
                                                                                            <input id="project_name" maxlength="98" type="text" name="project_name" class="form-control" value="<?php if (!empty($application_details_ms[0]['proj_name'])){ echo $application_details_ms[0]['proj_name']; } ?>">
                                                                                            <?php if (validation_errors()){ ?>
                                                                                                <div class="myalert">
                                                                                                    <?php echo form_error('project_name') ?>
                                                                                                </div>
                                                                                             <?php } ?>                                                                                              
                                                                                                                                                                                        
                                                                                           
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                        
                                                                                <td>
                                                                                    <div class="form-group">
                                                                                        <label>Project supervisor</label>
                                                                                        <div class="input-group">
                                                                                        
                                                                                            <input id="project_investing" maxlength="98" type="text" name="project_investing" class="form-control" value="<?php if (!empty($application_details_ms[0]['proj_pi'])){ echo $application_details_ms[0]['proj_pi']; } ?>">
                                                                                            <?php if (validation_errors()){ ?>
                                                                                                <div class="myalert">
                                                                                                    <?php echo form_error('project_investing') ?>
                                                                                                </div>
                                                                                             <?php } ?>                                                                                                 
                                                                                                                                                                                        
                                                                                            
                                                                                        </div>
                                                                                    </div>
                                                                                </td>

                                                                                <td>
                                                                                    <div class="form-group">
                                                                                        <label>Project Department</label>
                                                                                        <div class="input-group">
                                                                                        
                                                                                            <input id="project_dept" type="text" maxlength="10" name="project_dept" class="form-control" value="<?php if (!empty($application_details_ms[0]['proj_dept'])){ echo $application_details_ms[0]['proj_dept']; } ?>">
                                                                                            <?php if (validation_errors()){ ?>
                                                                                                <div class="myalert">
                                                                                                    <?php echo form_error('project_dept') ?>
                                                                                                </div>
                                                                                             <?php } ?>                                                                                                 
                                                                                                                                                                                                       
                                                                                                                                                                                        
                                                                                        </div>
                                                                                    </div>
                                                                                </td>

                                                                                <td>
                                                                                    <div class="form-group">
                                                                                        <label>Start Date</label>
                                                                                        <div class="input-group">
                                                                                        
                                                                                            <input id="start_date" type="text" name="start_date" class="form-control" value="<?php if (!empty($application_details_ms[0]['proj_start_date'])){ echo $application_details_ms[0]['proj_start_date']; } ?>" readonly>
                                                                                            <?php if (validation_errors()){ ?>
                                                                                                <div class="myalert">
                                                                                                    <?php echo form_error('start_date') ?>
                                                                                                </div>
                                                                                             <?php } ?>                                                                                               
                                                                                                                                                                                      
                                                                                          
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="form-group">
                                                                                        <label>End date</label>
                                                                                        <div class="input-group">
                                                                                        
                                                                                            <input id="end_date" type="text" name="end_date" class="form-control" value="<?php if (!empty($application_details_ms[0]['proj_end_date'])){ echo $application_details_ms[0]['proj_end_date']; } ?>">
                                                                                                <?php if (validation_errors()){ ?>
                                                                                                    <div class="myalert">
                                                                                                        <?php echo form_error('end_date') ?>
                                                                                                    </div>
                                                                                                <?php } ?>                                                                                               
                                                                                         
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <?php } }
                                                                ?>      
                                                                <div class='row'>
                                                                   <div class="col-md-12 col-sm-12 col-lg-12">
                                                                       
                                                                                

                                                                      <table id="table_programme" class="table table-responsive">
                                                                            <thead>
                                                                                <tr> 
                                                                                    <th style="font-size: 10px;">SL.No</th>
                                                                                   
                                                                                    <th style="font-size: 10px;">Programme Applying</th>
                                                                                    <th style="font-size: 10px;">Qualifying Degree</th>                   
                                                                                    <th style="font-size: 10px;">Ph.D. In</th> 
                                                                                    <th style="font-size: 10px;">Amount Rs.</th>                                                                                                                                               
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php  
                                                                                $i=1;
                                                                                foreach($fill_appl_details as $row){ ?>
                                                                                    <tr>
                                                                                        <td><?php echo $i;?> </td>
                                                                                        
                                                                                        <td class="valprog"><?php echo $row->program_desc;?>(<?php echo $row->program_id;?>)</td>
                                                                                        <td><?php echo $this->Add_phd_registration_model->get_degree_desc_by_program_id($row->degree_id);?></td>
                                                                                        <td><?php if(!empty($row->phd_in)){ echo $row->phd_in; }?></td>
                                                                                        <td><?php if(!empty($row->phd_in)) echo $row->fee_amount; ?></td>
                                                                                       
                                                                                        
                                                                                    
                                                                                    </tr>
                                                                                        <?php $i++; }
                                                                                    ?>
                                                                            </tbody>
                                                                       </table>
                                                                                  
                                                                    </div>
                                                                </div>
                                                                <ul class="list-inline pull-right">
                                                                  <li><button type="button" class ="btn btn-primary" style="background-color: #5161ce;" id="btn_personal_details">Save & Next</button></li>
                                                                </ul>
                                                           </form>
                                                        </div>
                                                        <!-- first tab personal detail end -->
                                                        <!-- second tab Qualification start -->
                                                        <div class="tab-pane" role="tabpanel" id="step2">
                                                            <h4 class="text-center" style="text-decoration: underline;">Qualifiying Exam</h4>
                                                            <?php if($this->session->flashdata('apply_success_education')){?>
                                                            <div class="alert alert-success alert-dismissible">
                                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                             <?php echo $this->session->flashdata('apply_success_education')?>
                                                            </div> 
                                                            <?php }?>
                                                        <?php if($this->session->flashdata('apply_success_pd')){?>
                                                        <div class="alert alert-success alert-dismissible">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                        <strong></strong> <?php echo $this->session->flashdata('apply_success_pd')?>
                                                        </div> 
                                                        <?php }?>
                                                        <?php if($this->session->flashdata('error_educationa')){?>
                                                        <div class="alert alert-danger alert-dismissible">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                         <?php echo $this->session->flashdata('error_educationa')?>
                                                        </div> 
                                                        <?php }?>
                                                             <?php 
                                                              $attributes = array('class' => 'email', 'id' => 'e_details','name'=>'e_details','enctype'=>'multipart/form-data');
                                                             echo form_open('admission/phd/Adm_phd_personal_details/get_education_detail', $attributes); ?>
                                                             <input id="app_type_e" name="app_type_e" type="hidden" value="<?php if(!empty($candidate_type)) { echo $candidate_type;}?>">
                                                             
                                                             
                                                             <div class="row">
                                                                <div class="col-md-6">
                                                                    <p>Are you applying as IIT graduate (Masters/ Bachelor’s degree)?<span style="color:red;">*</span></p>
                                                                </div>
                                                                <div class="col-md-4  col-sm-4 col-lg-4">
                                                                    <div class="form-group">
                                                                        <!-- <label for="sel1">Select list:</label> -->
                                                                        <select class="form-control" id="btech_cgpa" name="btech_cgpa">

                                                                            <?php if(!empty($application_details_ms[0]['betch_iit']))
                                                                            { 
                                                                                 if($application_details_ms[0]['betch_iit']=='Y')
                                                                                                                                                        
                                                                                {?>
                                                                                    <option value="<?php if($application_details_ms[0]['betch_iit']=='Y'){echo "Y";} ?>" <?php echo  set_select('btech_cgpa', 'Yes');?> selected><?php if($application_details_ms[0]['betch_iit']=='Y'){echo "Yes";} ?></option>
                                                                                    <option value="N" <?php echo  set_select('btech_cgpa', 'N'); ?>>No</option> 

                                                                                <?php }
                                                                                else 
                                                                                {?>
                                                                                
                                                                                  <option value="<?php if($application_details_ms[0]['betch_iit']=='N'){echo "N";} ?>"  <?php echo  set_select('btech_cgpa', 'No'); ?> selected><?php if($application_details_ms[0]['betch_iit']=='N'){echo "No";} ?></option>
                                                                                  <option value="Y" <?php echo  set_select('btech_cgpa', 'Y'); ?>>Yes</option>  
                                                                            
                                                                                <?php 
                                                                                }?>
                                                                            
                                                                            <?php }
                                                                            else 
                                                                            {?>
                                                                                <option value="">--Please Select --</option> 
                                                                                <option value="Y" <?php echo  set_select('btech_cgpa', 'Y'); ?>>Yes</option>
                                                                                <option value="N" <?php echo  set_select('btech_cgpa', 'N'); ?>>No</option> 

                                                                            <?php }?>
                                                                        
                                                                           
                                                                        </select>
                                                                        <?php if(validation_errors()){?>
                                                                        <div class ="myalert">
                                                                        <?php echo form_error('btech_cgpa') ?>
                                                                        </div>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        
                                                            <div id="iit_name_yes_no">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <p> Select name of IIT <span style="color:red;">*</span></p>
                                                                    </div>
                                                                    <div class="col-md-4  col-sm-4 col-lg-4">
                                                                        <div class="form-group">
                                                                                <!-- <label for="sel1">Select list:</label> -->
                                                                                <select class="form-control" id="iit_names" name="iit_names">
                                                                                    <?php if(!empty($application_details_ms[0]['betch_iit_name']))
                                                                                    {?>
                                                                                
                                                                                    <option value="<?php echo $application_details_ms[0]['betch_iit_name'];?>"><?php echo $application_details_ms[0]['betch_iit_name'];?></option>
                                                                                
                                                                                    
                                                                                    <?php if(!empty($iit_details)){ foreach ($iit_details as $value) {?>
                                                                                    <option value="<?php echo $value->iit_desc?> <?php echo  set_select('iit_names',$value->iit_desc);?>"><?php echo $value->iit_desc?></option>
                                                                                    <?php }}?> 

                                                                                    <?php 
                                                                                    }
                                                                                    else 
                                                                                    {?>
                                                                                    
                                                                                    <option value="">Please Select IIT Name</option>
                                                                                    <?php if(!empty($iit_details)){ foreach ($iit_details as $value) {?>
                                                                                    <option value="<?php echo $value->iit_desc;?><?php echo  set_select('iit_names',$value->iit_desc)?>"><?php echo $value->iit_desc;?></option>
                                                                                    <?php }}?>

                                                                                    <?php
                                                                                    }?>
                                                                                
                                                                                </select>
                                                                                <?php if(validation_errors()){?>
                                                                                <div class ="myalert">
                                                                                <?php echo form_error('iit_names') ?>
                                                                                </div>
                                                                                <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p> Enter CGPA OF IIT<span style="color:red;">*</span></p>
                                                                    </div>
                                                                    <div class="col-md-4  col-sm-4 col-lg-4">
                                                                        <div class="form-group">
                                                                            <!-- <label for="sel1">Select list:</label> -->
                                                                            <input class="form-control" id="iit_cgpa_case" name="iit_cgpa_case" type="text" value="<?php if(!empty($phd_fello_details_iit)) { echo $phd_fello_details_iit[0]['cgpa'];}?>" maxlength="5">
                                                                            <?php if(validation_errors()){?>
                                                                            <div class ="iit_cgpa_case">
                                                                            <?php echo form_error('iit_cgpa_case') ?>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p> Enter Year of passing UG/PG<span style="color:red;">*</span></p>
                                                                    </div>
                                                                    <div class="col-md-4  col-sm-4 col-lg-4">
                                                                        <div class="form-group">
                                                                            <!-- <label for="sel1">Select list:</label> -->
                                                                            <input class="form-control" id="iit_year_of_passing" name="iit_year_of_passing" type="text" value="<?php if(!empty($phd_fello_details_iit)) { echo $phd_fello_details_iit[0]['year_pass'];} ?>" maxlength="4">
                                                                            <?php if(validation_errors()){?>
                                                                           
                                                                            <?php echo form_error('iit_year_of_passing') ?>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                
                                                                <div class="col-md-6">
                                                                    <p> Please Select Qualifiying Degree<span style="color:red;">*</span></p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <select style="width: 128px;" id="qualifying_degree_new" name="qualifying_degree_new">           
                                                                        <?php if(!empty($application_details_ms[0]['qualifying_degree']))
                                                                        { 
                                                                            if($application_details_ms[0]['qualifying_degree']=='UG')
                                                                            {?>                                                                                
                                                                                <option value="<?php echo $application_details_ms[0]['qualifying_degree'];?>"><?php echo $application_details_ms[0]['qualifying_degree'];?></option>
                                                                                <option value="PG" <?php echo  set_select('qualifying_degree_new', 'PG');?>>PG</option>
                                                                            <?php 
                                                                            } 
                                                                            else
                                                                            { ?>
                                                                                <option value="<?php echo $application_details_ms[0]['qualifying_degree'];?>"><?php echo $application_details_ms[0]['qualifying_degree'];?></option>
                                                                                <option value="UG" <?php echo  set_select('qualifying_degree_new', 'UG');?>>UG</option>
                                                                              
                                                                                

                                                                            <?php }
                                                                            
                                                                        }

                                                                        else 
                                                                         {?>      
                                                                            <option value="">---Please select--</option>
                                                                            <option value="UG" <?php echo  set_select('qualifying_degree_new', 'UG');?>>UG</option>
                                                                            <option value="PG" <?php echo  set_select('qualifying_degree_new', 'PG');?>>PG</option>
                                                                                    
                                                                        <?php }?>
                                                                        <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('qualifying_degree_new') ?> </div> <?php } ?>
                                                                    </select> 
                                                                </div>
                                                               

                                                            </div>
                                                            
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                              
                                                                    <h5 class="text-center" style="text-decoration: underline;">Add Qualifiying Examination</h5>
                                                                    <!-- <h5>Note :All <span style="color:red;">*</span> are mandatory to fill</h5> -->
                                                                    <!-- <h5><span style="color:red;">"All appearing student has to give tentative year of passing and marks obtained till date."</span> </h5> -->
                                                                    <table id="fell" class="table table-responsive">
                                                                        <thead>
                                                                            <tr>
                                                                                <th style="width: 12%;">Qualifiying Exam<span style="color:red;">*</span></th>
                                                                                <th>Qualifiying Exam Registration No <span style="color:red;">*</span></th>
                                                                                <th>Result Status<span style="color:red;">*</span></th>
                                                                                <th>Score<span style="color:red;">*</span></th>
                                                                                <th width="40">Percentile<span style="color:red;">*</span></th>
                                                                                <th>Rank<span style="color:red;">*</span></th>
                                                                                <th>Exam Qualified Category<span style="color:red;">*</span></th>
                                                                                <th>Year of passing<span style="color:red;">*</span></th>
                                                                                <th style="width: 7%;">Total Marks<span style="color:red;">*</span></th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            
                                                                            <tr>
                                                                                <td data-column="Exam type">
                                                                                    <select style="width: 224px;" id="fellowship_type_f1" name="fellowship_type_f1">
                                                                                    <?php if(!empty($phd_fello_details1[0]['fellowship_type']))
                                                                                    {?>
                                                                                
                                                                                    <option value="<?php echo $phd_fello_details1[0]['fellowship_type'];?>"><?php  echo $phd_fello_details1[0]['fellowship_type'];;?></option>
                                                                                    
                                                                                    
                                                                                    <?php if(!empty($fellowship_type_list)){ foreach ($fellowship_type_list as $value) {?>
                                                                                    <option value="<?php echo $value->fellowship_type?> <?php echo  set_select('fellowship_type_f1',$value->fellowship_desc);?>"><?php echo $value->fellowship_desc?></option>
                                                                                    <?php }}?> 
                                                                                    <option value="">---Please Select--</option>
                                                                                    <?php 
                                                                                    }
                                                                                    else 
                                                                                    {?>
                                                                                    
                                                                                    <option value="">---Please Select--</option>
                                                                                    <?php if(!empty($fellowship_type_list)){ foreach ($fellowship_type_list as $value) {?>
                                                                                    <option value="<?php echo $value->fellowship_type;?><?php echo  set_select('fellowship_type_f1',$value->fellowship_desc)?>"><?php echo $value->fellowship_desc;?></option>
                                                                                    <?php }}?>

                                                                                    <?php
                                                                                    }?>
                                                                                         
                                                                                    
                                                                                    </select> 
                                                                                <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('fellowship_type_f1') ?> </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="fellow_reg_no">
                                                                                   <input id="fellow_reg_no_f1" name="fellow_reg_no_f1" type="text" value="<?php if(!empty($phd_fello_details1[0]['fellow_reg_no'])) { echo $phd_fello_details1[0]['fellow_reg_no']; } ?><?php echo set_value('fellow_reg_no_f1')?>" maxlength="50" >
                                                                                   <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('fellow_reg_no_f1') ?> </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="fellow_result_status">

                                                                                   
                                                                                    <select style="width: 128px;" id="fellow_result_status_f1" name="fellow_result_status_f1">
                                                                                    
                                                                                    <?php if(!empty($phd_fello_details1[0]['fellow_result_status']))
                                                                                    { 
                                                                                         if($phd_fello_details1[0]['fellow_result_status']=='Pass')
                                                                                        {?>
                                                                                                

                                                                                                <option value="<?php echo $phd_fello_details1[0]['fellow_result_status'];?>"><?php echo $phd_fello_details1[0]['fellow_result_status'];?></option>
                                                                                                <option value="Fail" <?php echo  set_select('fellow_result_status_f1', 'Fail');?>>Fail</option>
                                                                                                <option value="NA" <?php echo  set_select('fellow_result_status_f1', 'NA');?>>NA</option>
                                                                                        <?php }
                                                                                        else if($phd_fello_details1[0]['fellow_result_status']=='Fail')
                                                                                        {?>
                                                                                            
                                                                                            <option value="<?php echo $phd_fello_details1[0]['fellow_result_status'];?>"><?php echo $phd_fello_details1[0]['fellow_result_status'];?></option>
                                                                                            <option value="Pass" <?php echo  set_select('fellow_result_status_f1', 'Pass');?>>Pass</option>
                                                                                                
                                                                                            <option value="NA" <?php echo  set_select('fellow_result_status_f1', 'NA');?>>NA</option>
                                                                                            
                                                                                        <?php 
                                                                                        } 
                                                                                        else
                                                                                        { ?>
                                                                                              <option value="<?php echo $phd_fello_details1[0]['fellow_result_status'];?>"><?php echo $phd_fello_details1[0]['fellow_result_status'];?></option>
                                                                                              <option value="Pass" <?php echo  set_select('fellow_result_status_f1', 'Pass');?>>Pass</option>
                                                                                              <option value="Fail" <?php echo  set_select('fellow_result_status_f1', 'Fail');?>>Fail</option> 
                                                                                           

                                                                                        <?php }
                                                                                        ?>
                                                                                    
                                                                                    <?php }

                                                                                    else 
                                                                                        {?>      
                                                                                                <option value="">---Please Select--</option>
                                                                                                <option value="Pass" <?php echo  set_select('fellow_result_status_f1', 'Pass');?>>Pass</option>
                                                                                                <option value="Fail" <?php echo  set_select('fellow_result_status_f1', 'Fail');?>>Fail</option>
                                                                                                <option value="NA" <?php echo  set_select('fellow_result_status_f1', 'NA');?>>NA</option>
                                                                                        <?php }?>
                                                                                    </select> 

                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('fellow_result_status_f1') ?> </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="fellow_score">

                                                                                <input id="fellow_score_f1" name="fellow_score_f1" type="text" value="<?php if(!empty($phd_fello_details1[0]['fellow_score'])) echo $phd_fello_details1[0]['fellow_score'];?><?php echo set_value('fellow_score_f1')?>" style="width: 70px;"  placeholder="" maxlength="7">

                                                                                <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('fellow_score_f1') ?> </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="fellow_percentile">
                                                                                  <input id="fellow_percentile_f1" name="fellow_percentile_f1" type="text" value="<?php if(!empty($phd_fello_details1[0]['fellow_percentile'])) echo $phd_fello_details1[0]['fellow_percentile'];?><?php echo set_value('fellow_percentile_f1')?>" style="width: 70px;" placeholder="" maxlength="8">
                                                                                  <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('fellow_percentile_f1')?></div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="fellow_rank">

                                                                                  <input id="fellow_rank_f1" name="fellow_rank_f1" type="text" value="<?php if(!empty($phd_fello_details1[0]['fellow_rank'])) echo $phd_fello_details1[0]['fellow_rank'];?><?php echo set_value('fellow_rank_f1')?>" style="width: 70px;"  placeholder="" maxlength="6">
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('fellow_rank_f1')?></div> <?php } ?>
                                                                                </td>


                                                                                <td data-column="exam_category">

                                                                                 
                                                                                  <select  style="width: 162px;" id="exam_category_f1" name="exam_category_f1" class="form-select" aria-label="Default select example">
                                                                                    <?php if(!empty($phd_fello_details1[0]['exam_category']))
                                                                                    {?>
                                                                                
                                                                                    <option value="<?php echo $phd_fello_details1[0]['exam_category']; ?>"><?php echo $phd_fello_details1[0]['exam_category']; ?></option>
                                                                                    <option value="General" <?php echo  set_select('exam_category_f1', 'General'); ?> >General</option>
                                                                                    <option value="OBC" <?php echo  set_select('exam_category_f1', 'OBC'); ?>>OBC</option>
                                                                                    <option value="SC" <?php echo  set_select('exam_category_f1', 'Widowed'); ?>>SC</option>
                                                                                    <option value="ST" <?php echo  set_select('exam_category_f1', 'Divorced'); ?>>ST</option>
                                                                                    <option value="EWS" <?php echo  set_select('exam_category_f1', 'EWS'); ?>>EWS</option>
                                                                                    <option value="NA" <?php echo  set_select('exam_category_f1', 'Other'); ?>>NA</option>

                                                                                    <?php 
                                                                                    }
                                                                                    else 
                                                                                    {?>
                                                                                    
                                                                                    <option value=""> Please Select Category</option>
                                                                                    <option value="General" <?php echo  set_select('exam_category_f1', 'General'); ?> >General</option>
                                                                                    <option value="OBC" <?php echo  set_select('exam_category_f1', 'OBC'); ?>>OBC</option>
                                                                                    <option value="SC" <?php echo  set_select('exam_category_f1', 'Widowed'); ?>>SC</option>
                                                                                    <option value="ST" <?php echo  set_select('exam_category_f1', 'Divorced'); ?>>ST</option>
                                                                                    <option value="EWS" <?php echo  set_select('exam_category_f1', 'EWS'); ?>>EWS</option>
                                                                                    <option value="NA" <?php echo  set_select('exam_category_f1', 'Other'); ?>>NA</option>
                                                                                    <?php
                                                                                    }?>
                                                                                    
                                                                                 </select>
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('exam_category_f1')?></div> <?php } ?>
                                                                                </td>




                                                                                <td data-column="year_pass">
                                                                                    <input onchange="year_check(this.id)" value="<?php echo set_value('year_pass_f1')?><?php if(!empty($phd_fello_details1[0]['year_pass'])) echo $phd_fello_details1[0]['year_pass'];?>" maxlength="4" style="width: 101px;"  id="year_pass_f1" name="year_pass_f1"   type="text">
                                                                                   
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('year_pass_f1') ?></div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="total_marks">
                                                                                    <input  id="total_marks_f1" name="total_marks_f1"  style="width: 72px;" value="<?php echo set_value('total_marks')?><?php if(!empty($phd_fello_details1[0]['total_marks'])) {echo $phd_fello_details1[0]['total_marks'];}?>"  maxlength="5"  placeholder="Enter Total mark" type="text">
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('total_marks_f1') ?></div> <?php } ?>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td data-column="Exam type">
                                                                                <select  class="f2" style="width: 224px;" id="fellowship_type_f2" name="fellowship_type_f2">
                                                                                    <?php if(!empty($phd_fello_details2[0]['fellowship_type']))
                                                                                    {?>
                                                                                
                                                                                    <option value="<?php echo $phd_fello_details2[0]['fellowship_type'];?>"><?php  echo $phd_fello_details2[0]['fellowship_type'];;?></option>
                                                                                
                                                                                    
                                                                                    <?php if(!empty($fellowship_type_list)){ foreach ($fellowship_type_list as $value) {?>
                                                                                    <option value="<?php echo $value->fellowship_type?> <?php echo  set_select('fellowship_type_f2',$value->fellowship_desc);?>"><?php echo $value->fellowship_desc?></option>
                                                                                    <?php }}?> 
                                                                                    <option value="">---Please Select--</option>
                                                                                    <?php 
                                                                                    }
                                                                                    else 
                                                                                    {?>
                                                                                    
                                                                                    <option value="">---Please Select--</option>
                                                                                    <?php if(!empty($fellowship_type_list)){ foreach ($fellowship_type_list as $value) {?>
                                                                                    <option value="<?php echo $value->fellowship_type;?><?php echo  set_select('fellowship_type_f2',$value->fellowship_desc)?>"><?php echo $value->fellowship_desc;?></option>
                                                                                    <?php }}?>

                                                                                    <?php
                                                                                    }?>
                                                                                
                                                                                </select> 
                                                                                <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('fellowship_type_f2') ?> </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="fellow_reg_no">
                                                                                   <input class="f2" id="fellow_reg_no_f2" name="fellow_reg_no_f2" type="text" value="<?php if(!empty($phd_fello_details2[0]['fellow_reg_no'])) { echo $phd_fello_details2[0]['fellow_reg_no']; } ?><?php echo set_value('fellow_reg_no_f2')?>" maxlength="50" >
                                                                                   <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('fellow_reg_no_f2') ?> </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="fellow_result_status">

                                                                                  
                                                                                    <select style="width: 128px;" class="f2" id="fellow_result_status_f2" name="fellow_result_status_f2">
                                                                                    
                                                                                    <?php if(!empty($phd_fello_details2[0]['fellow_result_status']))
                                                                                    { 
                                                                                         if($phd_fello_details2[0]['fellow_result_status']=='Pass')
                                                                                        {?>
                                                                                                

                                                                                                <option value="<?php echo $phd_fello_details2[0]['fellow_result_status'];?>"><?php echo $phd_fello_details2[0]['fellow_result_status'];?></option>
                                                                                                <option value="Fail" <?php echo  set_select('fellow_result_status_f2', 'Fail');?>>Fail</option>
                                                                                                <option value="NA" <?php echo  set_select('fellow_result_status_f2', 'NA');?>>NA</option>
                                                                                        <?php }
                                                                                        else if($phd_fello_details2[0]['fellow_result_status']=='Fail')
                                                                                        {?>
                                                                                            
                                                                                            <option value="<?php echo $phd_fello_details2[0]['fellow_result_status'];?>"><?php echo $phd_fello_details2[0]['fellow_result_status'];?></option>
                                                                                            <option value="Pass" <?php echo  set_select('fellow_result_status_f2', 'Pass');?>>Pass</option>
                                                                                                
                                                                                            <option value="NA" <?php echo  set_select('fellow_result_status_f2', 'NA');?>>NA</option>
                                                                                            
                                                                                        <?php 
                                                                                        } 
                                                                                        else
                                                                                        { ?>
                                                                                              <option value="<?php echo $phd_fello_details2[0]['fellow_result_status'];?>"><?php echo $phd_fello_details2[0]['fellow_result_status'];?></option>
                                                                                              <option value="Pass" <?php echo  set_select('fellow_result_status_f2', 'Pass');?>>Pass</option>
                                                                                              <option value="Fail" <?php echo  set_select('fellow_result_status_f2', 'Fail');?>>Fail</option> 
                                                                                           

                                                                                        <?php }
                                                                                        ?>
                                                                                    
                                                                                    <?php }

                                                                                    else 
                                                                                        {?>      
                                                                                                <option value="">---Please Select--</option>
                                                                                                <option value="Pass" <?php echo  set_select('fellow_result_status_f2', 'Pass');?>>Pass</option>
                                                                                                <option value="Fail" <?php echo  set_select('fellow_result_status_f2', 'Fail');?>>Fail</option>
                                                                                                <option value="NA" <?php echo  set_select('fellow_result_status_f2', 'NA');?>>NA</option>
                                                                                        <?php }?>
                                                                                    </select>

                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('fellow_result_status_f2') ?> </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="fellow_score">

                                                                                <input class="f2" id="fellow_score_f2" name="fellow_score_f2" type="text" value="<?php if(!empty($phd_fello_details2[0]['fellow_score'])) echo $phd_fello_details2[0]['fellow_score'];?><?php echo set_value('fellow_score_f2')?>" style="width: 70px;"  placeholder="" maxlength="7">

                                                                                <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('fellow_score_f2') ?> </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="fellow_percentile">
                                                                                  <input class="f2" id="fellow_percentile_f2" name="fellow_percentile_f2" type="text" value="<?php if(!empty($phd_fello_details2[0]['fellow_percentile'])) echo $phd_fello_details2[0]['fellow_percentile'];?><?php echo set_value('fellow_percentile_f2')?>" style="width: 70px;" placeholder="" maxlength="8">
                                                                                  <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('fellow_percentile_f2')?></div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="fellow_rank">

                                                                                  <input class="f2" id="fellow_rank_f2" name="fellow_rank_f2" type="text" value="<?php if(!empty($phd_fello_details2[0]['fellow_rank'])) echo $phd_fello_details2[0]['fellow_rank'];?><?php echo set_value('fellow_rank_f2')?>" style="width: 70px;"  placeholder="" maxlength="6">
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('fellow_rank_f2')?></div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="exam_category">
                                                                                  <select  style="width: 162px;" class="f2" id="exam_category_f2" name="exam_category_f2" class="form-select" aria-label="Default select example">
                                                                                    <?php if(!empty($phd_fello_details2[0]['exam_category']))
                                                                                    {?>
                                                                                
                                                                                    <option value="<?php echo $phd_fello_details2[0]['exam_category']; ?>"><?php echo $phd_fello_details1[0]['exam_category']; ?></option>
                                                                                    <option value="General" <?php echo  set_select('exam_category_f2', 'General'); ?> >General</option>
                                                                                    <option value="OBC" <?php echo  set_select('exam_category_f2', 'OBC'); ?>>OBC</option>
                                                                                    <option value="SC" <?php echo  set_select('exam_category_f2', 'Widowed'); ?>>SC</option>
                                                                                    <option value="ST" <?php echo  set_select('exam_category_f2', 'Divorced'); ?>>ST</option>
                                                                                    <option value="EWS" <?php echo  set_select('exam_category_f2', 'EWS'); ?>>EWS</option>
                                                                                    <option value="NA" <?php echo  set_select('exam_category_f2', 'Other'); ?>>NA</option>

                                                                                    <?php 
                                                                                    }
                                                                                    else 
                                                                                    {?>
                                                                                    
                                                                                    <option value=""> Please Select Category</option>
                                                                                    <option value="General" <?php echo  set_select('exam_category_f2', 'General'); ?> >General</option>
                                                                                    <option value="OBC" <?php echo  set_select('exam_category_f2', 'OBC'); ?>>OBC</option>
                                                                                    <option value="SC" <?php echo  set_select('exam_category_f2', 'Widowed'); ?>>SC</option>
                                                                                    <option value="ST" <?php echo  set_select('exam_category_f2', 'Divorced'); ?>>ST</option>
                                                                                    <option value="EWS" <?php echo  set_select('exam_category_f2', 'EWS'); ?>>EWS</option>
                                                                                    <option value="NA" <?php echo  set_select('exam_category_f2', 'Other'); ?>>NA</option>
                                                                                    <?php
                                                                                    }?>
                                                                                    
                                                                                 </select>
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('exam_category_f2')?></div> <?php } ?>
                                                                                </td>


                                                                                <td data-column="year_pass">
                                                                                    <input class="f2" onchange="year_check(this.id)" value="<?php echo set_value('year_pass_f2')?><?php if(!empty($phd_fello_details2[0]['year_pass'])) echo $phd_fello_details2[0]['year_pass'];?>" maxlength="4" style="width: 101px;"  id="year_pass_f2" name="year_pass_f2"   type="text">
                                                                                   
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('year_pass_f2') ?></div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="total_marks">
                                                                                    <input class="f2"  id="total_marks_f2" name="total_marks_f2"  style="width: 72px;" value="<?php echo set_value('total_marks_f2')?><?php if(!empty($phd_fello_details2[0]['total_marks'])) {echo $phd_fello_details2[0]['total_marks'];}?>"  maxlength="5"  placeholder="Enter Total mark" type="text">
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('total_marks_f2') ?></div> <?php } ?>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td data-column="Exam type">
                                                                                 <select  class="f3" style="width: 224px;" id="fellowship_type_f3" name="fellowship_type_f3">
                                                                                     <?php if(!empty($phd_fello_details3[0]['fellowship_type']))
                                                                                    {?>
                                                                                
                                                                                    <option value="<?php echo $phd_fello_details3[0]['fellowship_type'];?>"><?php  echo $phd_fello_details3[0]['fellowship_type'];;?></option>
                                                                                
                                                                                    
                                                                                    <?php if(!empty($fellowship_type_list)){ foreach ($fellowship_type_list as $value) {?>
                                                                                    <option value="<?php echo $value->fellowship_type?> <?php echo  set_select('fellowship_type_f3',$value->fellowship_desc);?>"><?php echo $value->fellowship_desc?></option>
                                                                                    <?php }}?> 
                                                                                    <option value="">---Please Select--</option>

                                                                                    <?php 
                                                                                    }
                                                                                    else 
                                                                                    {?>
                                                                                    
                                                                                    <option value="">---Please Select--</option>
                                                                                    <?php if(!empty($fellowship_type_list)){ foreach ($fellowship_type_list as $value) {?>
                                                                                    <option value="<?php echo $value->fellowship_type;?><?php echo  set_select('fellowship_type_f3',$value->fellowship_desc)?>"><?php echo $value->fellowship_desc;?></option>
                                                                                    <?php }}?>

                                                                                    <?php
                                                                                    }?>
                                                                                
                                                                                </select> 
                                                                                <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('fellowship_type_f3') ?> </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="fellow_reg_no">
                                                                                   <input class="f3" id="fellow_reg_no_f3" name="fellow_reg_no_f3" type="text" value="<?php if(!empty($phd_fello_details3[0]['fellow_reg_no'])) { echo $phd_fello_details3[0]['fellow_reg_no']; } ?><?php echo set_value('fellow_reg_no_f3')?>" maxlength="50" >
                                                                                   <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('fellow_reg_no_f3') ?> </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="fellow_result_status">

                                                                                    
                                                                                    <select style="width: 128px;" class="f3" id="fellow_result_status_f3" name="fellow_result_status_f3">
                                                                                    
                                                                                    <?php if(!empty($phd_fello_details3[0]['fellow_result_status']))
                                                                                    { 
                                                                                         if($phd_fello_details3[0]['fellow_result_status']=='Pass')
                                                                                        {?>
                                                                                                

                                                                                                <option value="<?php echo $phd_fello_details3[0]['fellow_result_status'];?>"><?php echo $phd_fello_details3[0]['fellow_result_status'];?></option>
                                                                                                <option value="Fail" <?php echo  set_select('fellow_result_status_f3', 'Fail');?>>Fail</option>
                                                                                                <option value="NA" <?php echo  set_select('fellow_result_status_f3', 'NA');?>>NA</option>
                                                                                        <?php }
                                                                                        else if($phd_fello_details3[0]['fellow_result_status']=='Fail')
                                                                                        {?>
                                                                                            
                                                                                            <option value="<?php echo $phd_fello_details3[0]['fellow_result_status'];?>"><?php echo $phd_fello_details3[0]['fellow_result_status'];?></option>
                                                                                            <option value="Pass" <?php echo  set_select('fellow_result_status_f3', 'Pass');?>>Pass</option>
                                                                                                
                                                                                            <option value="NA" <?php echo  set_select('fellow_result_status_f3', 'NA');?>>NA</option>
                                                                                            
                                                                                        <?php 
                                                                                        } 
                                                                                        else
                                                                                        { ?>
                                                                                              <option value="<?php echo $phd_fello_details3[0]['fellow_result_status'];?>"><?php echo $phd_fello_details3[0]['fellow_result_status'];?></option>
                                                                                              <option value="Pass" <?php echo  set_select('fellow_result_status_f3', 'Pass');?>>Pass</option>
                                                                                              <option value="Fail" <?php echo  set_select('fellow_result_status_f3', 'Fail');?>>Fail</option> 
                                                                                           

                                                                                        <?php }
                                                                                        ?>
                                                                                    
                                                                                    <?php }

                                                                                    else 
                                                                                        {?>      
                                                                                                <option value="">---Please Select--</option>
                                                                                                <option value="Pass" <?php echo  set_select('fellow_result_status_f3', 'Pass');?>>Pass</option>
                                                                                                <option value="Fail" <?php echo  set_select('fellow_result_status_f3', 'Fail');?>>Fail</option>
                                                                                                <option value="NA" <?php echo  set_select('fellow_result_status_f3', 'NA');?>>NA</option>
                                                                                        <?php }?>
                                                                                    </select>


                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('fellow_result_status_f3') ?> </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="fellow_score">

                                                                                <input class="f3" id="fellow_score_f3" name="fellow_score_f3" type="text" value="<?php if(!empty($phd_fello_details3[0]['fellow_score'])) echo $phd_fello_details3[0]['fellow_score'];?><?php echo set_value('fellow_score_f3')?>" style="width: 70px;"  placeholder="" maxlength="7">

                                                                                <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('fellow_score_f3') ?> </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="fellow_percentile">
                                                                                  <input class="f3" id="fellow_percentile_f3" name="fellow_percentile_f3" type="text" value="<?php if(!empty($phd_fello_details3[0]['fellow_percentile'])) echo $phd_fello_details3[0]['fellow_percentile'];?><?php echo set_value('fellow_percentile_f3')?>" style="width: 70px;" placeholder="" maxlength="8">
                                                                                  <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('fellow_percentile_f3')?></div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="fellow_rank">

                                                                                  <input class="f3" id="fellow_rank_f3" name="fellow_rank_f3" type="text" value="<?php if(!empty($phd_fello_details3[0]['fellow_rank'])) echo $phd_fello_details3[0]['fellow_rank'];?><?php echo set_value('fellow_rank_f3')?>" style="width: 70px;"  placeholder="" maxlength="6">
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('fellow_rank_f3')?></div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="exam_category">
                                                                                  <select  style="width: 162px;" class="f3" id="exam_category_f3" name="exam_category_f3" class="form-select" aria-label="Default select example">
                                                                                    <?php if(!empty($phd_fello_details3[0]['exam_category']))
                                                                                    {?>
                                                                                
                                                                                    <option value="<?php echo $phd_fello_details3[0]['exam_category']; ?>"><?php echo $phd_fello_details3[0]['exam_category']; ?></option>
                                                                                    <option value="General" <?php echo  set_select('exam_category_f3', 'General'); ?> >General</option>
                                                                                    <option value="OBC" <?php echo  set_select('exam_category_f3', 'OBC'); ?>>OBC</option>
                                                                                    <option value="SC" <?php echo  set_select('exam_category_f3', 'Widowed'); ?>>SC</option>
                                                                                    <option value="ST" <?php echo  set_select('exam_category_f3', 'Divorced'); ?>>ST</option>
                                                                                    <option value="EWS" <?php echo  set_select('exam_category_f3', 'EWS'); ?>>EWS</option>
                                                                                    <option value="NA" <?php echo  set_select('exam_category_f3', 'Other'); ?>>NA</option>

                                                                                    <?php 
                                                                                    }
                                                                                    else 
                                                                                    {?>
                                                                                    
                                                                                    <option value=""> Please Select Category</option>
                                                                                    <option value="General" <?php echo  set_select('exam_category_f3', 'General'); ?> >General</option>
                                                                                    <option value="OBC" <?php echo  set_select('exam_category_f3', 'OBC'); ?>>OBC</option>
                                                                                    <option value="SC" <?php echo  set_select('exam_category_f3', 'Widowed'); ?>>SC</option>
                                                                                    <option value="ST" <?php echo  set_select('exam_category_f3', 'Divorced'); ?>>ST</option>
                                                                                    <option value="EWS" <?php echo  set_select('exam_category_f3', 'EWS'); ?>>EWS</option>
                                                                                    <option value="NA" <?php echo  set_select('exam_category_f3', 'Other'); ?>>NA</option>
                                                                                    <?php
                                                                                    }?>
                                                                                    
                                                                                 </select>
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('exam_category_f3')?></div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="year_pass">
                                                                                    <input class="f3" onchange="year_check(this.id)" value="<?php echo set_value('year_pass_f3')?><?php if(!empty($phd_fello_details3[0]['year_pass'])) echo $phd_fello_details3[0]['year_pass'];?>" maxlength="4" style="width: 101px;"  id="year_pass_f3" name="year_pass_f3"   type="text">
                                                                                   
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('year_pass_f3') ?></div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="total_marks">
                                                                                    <input class="f3"  id="total_marks_f3" name="total_marks_f3"  style="width: 73px;" value="<?php echo set_value('total_marks_f3')?><?php if(!empty($phd_fello_details3[0]['total_marks'])) {echo $phd_fello_details3[0]['total_marks'];}?>"  maxlength="5"  placeholder="Enter Total mark" type="text">
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('total_marks_f3') ?></div> <?php } ?>
                                                                                </td>
                                                                            </tr>
                                                                             
                                                                            <tr>
                                                                                <td data-column="Exam type">
                                                                               
                                                                                <select  style="width: 224px;" id="fellowship_type_f4" name="fellowship_type_f4">
                                                                            
                                                                                    <option value="Other" selected>Other</option>
                                                                                    
                                                                                
                                                                                </select> 

                                                                                <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('fellowship_type_f4') ?> </div> <?php } ?>
                                                                                 <label for="sel1">Other Qualifiying Exam :</label>
                                                                                <input class="f4" style="width: 224px;" class="form-control" id="fellowship_type_other" name="fellowship_type_other" type="text" value="<?php if(!empty($phd_fello_details4[0]['fellowship_name'])) { echo $phd_fello_details4[0]['fellowship_name']; }?><?php echo set_value('fellowship_type_f4')?>" maxlength="15">
                                                                                </td>
                                                                                 
                                                                                <td data-column="fellow_reg_no">
                                                                                   <input class="f4" id="fellow_reg_no_f4" name="fellow_reg_no_f4" type="text" value="<?php if(!empty($phd_fello_details4[0]['fellow_reg_no'])) { echo $phd_fello_details4[0]['fellow_reg_no']; }?><?php echo set_value('fellow_reg_no_f4')?>" maxlength="50" >
                                                                                   <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('fellow_reg_no_f4') ?> </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="fellow_result_status">
                                                                                    

                                                                                    <select style="width: 128px;" class="f4" id="fellow_result_status_f4" name="fellow_result_status_f4">
                                                                                    
                                                                                    <?php if(!empty($phd_fello_details4[0]['fellow_result_status']))
                                                                                    { 
                                                                                         if($phd_fello_details4[0]['fellow_result_status']=='Pass')
                                                                                        {?>
                                                                                                

                                                                                                <option value="<?php echo $phd_fello_details4[0]['fellow_result_status'];?>"><?php echo $phd_fello_details4[0]['fellow_result_status'];?></option>
                                                                                                <option value="Fail" <?php echo  set_select('fellow_result_status_f4', 'Fail');?>>Fail</option>
                                                                                                <option value="NA" <?php echo  set_select('fellow_result_status_f4', 'NA');?>>NA</option>
                                                                                        <?php }
                                                                                        else if($phd_fello_details4[0]['fellow_result_status']=='Fail')
                                                                                        {?>
                                                                                            
                                                                                            <option value="<?php echo $phd_fello_details4[0]['fellow_result_status'];?>"><?php echo $phd_fello_details4[0]['fellow_result_status'];?></option>
                                                                                            <option value="Pass" <?php echo  set_select('fellow_result_status_f4', 'Pass');?>>Pass</option>
                                                                                                
                                                                                            <option value="NA" <?php echo  set_select('fellow_result_status_f4', 'NA');?>>NA</option>
                                                                                            
                                                                                        <?php 
                                                                                        } 
                                                                                        else
                                                                                        { ?>
                                                                                              <option value="<?php echo $phd_fello_details4[0]['fellow_result_status'];?>"><?php echo $phd_fello_details4[0]['fellow_result_status'];?></option>
                                                                                              <option value="Pass" <?php echo  set_select('fellow_result_status_f4', 'Pass');?>>Pass</option>
                                                                                              <option value="Fail" <?php echo  set_select('fellow_result_status_f4', 'Fail');?>>Fail</option> 
                                                                                           

                                                                                        <?php }
                                                                                        ?>
                                                                                    
                                                                                    <?php }

                                                                                    else 
                                                                                        {?>      
                                                                                                <option value="">---Please Select--</option>
                                                                                                <option value="Pass" <?php echo  set_select('fellow_result_status_f4', 'Pass');?>>Pass</option>
                                                                                                <option value="Fail" <?php echo  set_select('fellow_result_status_f4', 'Fail');?>>Fail</option>
                                                                                                <option value="NA" <?php echo  set_select('fellow_result_status_f4', 'NA');?>>NA</option>
                                                                                        <?php }?>
                                                                                    </select>
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('fellow_result_status_f4') ?> </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="fellow_score">

                                                                                <input class="f4"  id="fellow_score_f4" name="fellow_score_f4" type="text" value="<?php if(!empty($phd_fello_details4[0]['fellow_score'])) echo $phd_fello_details4[0]['fellow_score'];?><?php echo set_value('fellow_score_f4')?>" style="width: 70px;"  placeholder="" maxlength="7">

                                                                                <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('fellow_score_f4') ?> </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="fellow_percentile">
                                                                                  <input class="f4"  id="fellow_percentile_f4" name="fellow_percentile_f4" type="text" value="<?php if(!empty($phd_fello_details4[0]['fellow_percentile'])) echo $phd_fello_details4[0]['fellow_percentile'];?><?php echo set_value('fellow_percentile_f4')?>" style="width: 70px;" placeholder="" maxlength="8">
                                                                                  <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('fellow_percentile_f4')?></div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="fellow_rank">

                                                                                  <input class="f4"  id="fellow_rank_f4" name="fellow_rank_f4" type="text" value="<?php if(!empty($phd_fello_details4[0]['fellow_rank'])) echo $phd_fello_details4[0]['fellow_rank'];?>" style="width: 70px;"  placeholder="" maxlength="6">
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('fellow_rank_f4')?></div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="exam_category">
                                                                                  <select  style="width: 162px;" class="f4" id="exam_category_f4" name="exam_category_f4" class="form-select" aria-label="Default select example">
                                                                                    <?php if(!empty($phd_fello_details4[0]['exam_category']))
                                                                                    {?>
                                                                                
                                                                                    <option value="<?php echo $phd_fello_details4[0]['exam_category']; ?>"><?php echo $phd_fello_details4[0]['exam_category']; ?></option>
                                                                                    <option value="General" <?php echo  set_select('exam_category_f4', 'General'); ?> >General</option>
                                                                                    <option value="OBC" <?php echo  set_select('exam_category_f4', 'OBC'); ?>>OBC</option>
                                                                                    <option value="SC" <?php echo  set_select('exam_category_f4', 'Widowed'); ?>>SC</option>
                                                                                    <option value="ST" <?php echo  set_select('exam_category_f4', 'Divorced'); ?>>ST</option>
                                                                                    <option value="EWS" <?php echo  set_select('exam_category_f4', 'EWS'); ?>>EWS</option>
                                                                                    <option value="NA" <?php echo  set_select('exam_category_f4', 'Other'); ?>>NA</option>

                                                                                    <?php 
                                                                                    }
                                                                                    else 
                                                                                    {?>
                                                                                    
                                                                                    <option value=""> Please Select Category</option>
                                                                                    <option value="General" <?php echo  set_select('exam_category_f4', 'General'); ?> >General</option>
                                                                                    <option value="OBC" <?php echo  set_select('exam_category_f4', 'OBC'); ?>>OBC</option>
                                                                                    <option value="SC" <?php echo  set_select('exam_category_f4', 'Widowed'); ?>>SC</option>
                                                                                    <option value="ST" <?php echo  set_select('exam_category_f4', 'Divorced'); ?>>ST</option>
                                                                                    <option value="EWS" <?php echo  set_select('exam_category_f4', 'EWS'); ?>>EWS</option>
                                                                                    <option value="NA" <?php echo  set_select('exam_category_f4', 'Other'); ?>>NA</option>
                                                                                    <?php
                                                                                    }?>
                                                                                    
                                                                                 </select>
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('exam_category_f4')?></div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="year_pass">
                                                                                    <input class="f4"  onchange="year_check(this.id)" value="<?php echo set_value('year_pass_f4')?><?php if(!empty($phd_fello_details4[0]['year_pass'])) echo $phd_fello_details4[0]['year_pass'];?>" maxlength="4" style="width: 101px;"  id="year_pass_f4" name="year_pass_f4"   type="text">
                                                                                   
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('year_pass_f4') ?></div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="total_marks">
                                                                                    <input class="f4"  id="total_marks_f4" name="total_marks_f4"  style="width: 74px;" value="<?php echo set_value('total_marks_f4')?><?php if(!empty($phd_fello_details4[0]['total_marks'])) {echo $phd_fello_details4[0]['total_marks'];}?>"  maxlength="5"  placeholder="Enter Total mark" type="text">
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('total_marks_f4') ?></div> <?php } ?>
                                                                                </td>
                                                                            </tr>

                                                                           
                                                                              
                                                                        </tbody>
                                                                    </table>
                                                                    <h5>Note :<span style="color:red;"> All * are mandatory to fill</span></h5>
                                                                    <h5>Note :<span style="color:red;">All fields are mandatory for qualifying exams.please write "NA" wherever not applicable</span> </h5> 
                                                                    <h5>Note :<span style="color:red;">Atleast one row is mandatory for qualifying examination except graduate from IITs</span> </h5> 
                                                                    <h5>Note :<span style="color:red;">Visvesvaraya Scheme is applicable for Electronics & Communication.Please fill up Gate details and upload Gate score.</span> </h5> 
                                                                    
                                                                    <!-- <input type="hidden" id="countfell" name="countfell" value="">
                                                                    <input type="button" id="addfell" name="addmore" value="Add More" style="float:right; margin-top: -10px;" class="btn btn-primary btn-sm"> -->
                                                                </div>

                                                             </div>

                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                                                        
                                                                    <h5 class="text-center" style="text-decoration: underline;">Add Qualifiying Degree</h5>
                                                                   
                                                                    <table id="qual" class="table-responsive">
                                                                        <thead>
                                                                            <tr> 
                                                                                <th>Exam Type<span style="color:red;">*</span></th>
                                                                                <th>Name of Exam <span style="color:red;">*</span></th>
                                                                                <th>Discipline <span style="color:red;">*</span></th>
                                                                                <th>Qualifying degree <span style="color:red;">*</span></th>
                                                                                <th width="40">Institute/University Name<span style="color:red;">*</span></th>
                                                                                <th>Result Status<span style="color:red;">*</span></th>
                                                                                <th>Marks<span style="color:red;">*</span></th>
                                                                                <th>Year of Passing<span style="color:red;">*</span></th>
                                                                                <th width="20">Percentage/CGPA<span style="color:red;">*</span></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td data-column="Exam type">
                                                                                 <select style="width: 78px;" id="examtype10" name="examtype10">
                                                                                
                                                                                <?php if(!empty($qual10_details[0]['exam_type']))
                                                                                { ?>
                                                                                    <option value="<?php echo $qual10_details[0]['exam_type'];?>" <?php echo  set_select('examtype10', '10 th'); ?>><?php echo $qual10_details[0]['exam_type'];?></option>
                                                                               <?php }
                                                                                else 
                                                                                {?>
                                                                                    <option value="10th" <?php echo  set_select('examtype10', '10 th'); ?>>10th</option>
                                                                              <?php }?>
                                                                                
                                                                                </select> 
                                                                                <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('examtype10') ?> </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="Name of exam">
                                                                                    <select  id="name_of_exam10" name="name_of_exam10" >

                                                                                    <?php if(!empty($qual10_details[0]['exam_name']))
                                                                                    { ?>
                                                                                        
                                                                                        <option value="<?php echo $qual10_details[0]['exam_name']; ?>"<?php echo  set_select('name_of_exam10', '10 th')?>><?php echo $qual10_details[0]['exam_name']; ?></option>
                                                                                    <?php }
                                                                                    else 
                                                                                    {?>
                                                                                        <option value="10 th"<?php echo  set_select('name_of_exam10', '10 th'); ?>>10 th</option>
                                                                                    <?php }?>
                                                                                    
                                                                                    
                                                                                    </select>
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('name_of_exam10') ?> </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="discipline">
                                                                                   <input id="discipline10" name="discipline10" type="text" value="NA" maxlength="99" readonly>
                                                                                   <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('discipline10') ?> </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="qualifying_degree10">
                                                                                   <input id="qualifying_degree10" name="qualifying_degree10" type="text" value="NA" maxlength="99" readonly>
                                                                                   <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('qualifying_degree10') ?> </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="Institute/university name">

                                                                                  <input id="Institute_exam10" name="Institute_exam10" type="text" value="<?php if(!empty($qual10_details)) echo $qual10_details[0]['institue_name'];?><?php echo set_value('Institute_exam10')?>" placeholder="Institute/university name" maxlength="49">

                                                                                <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('Institute_exam10') ?> </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="result Status">
                                                                                    <select  style="width: 85px;" id="10passed" name="10passed" >
                                                                                    <?php if(!empty($qual10_details[0]['result_status']))
                                                                                    { ?>
                                                                                        
                                                                                        <option value="<?php echo $qual10_details[0]['result_status'];?>"<?php echo set_select('10passed', 'Passed')?>><?php echo $qual10_details[0]['result_status']; ?></option>
                                                                                    <?php }
                                                                                    else 
                                                                                        {?>
                                                                                        <option value="Passed" <?php echo set_select('10passed', 'Passed'); ?>>Passed</option>
                                                                                        <?php }?>

                                                                                        
                                                                                    </select>
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('Institute_exam10') ?> </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="marks System">

                                                                                    <select style="width: 85px;" onchange="percentage_10cgpa(this.value)" id="10percentage" name="10percentage">

                                                                                        <?php if(!empty($qual10_details[0]['marks_perc_type']))
                                                                                    {  if($qual10_details[0]['marks_perc_type']=='Percentage')
                                                                                        {?>
                                                                                                <option value="<?php echo $qual10_details[0]['marks_perc_type']; ?>" <?php echo set_select('10percentage', 'Percentage')?>><?php echo strtoupper($qual10_details[0]['marks_perc_type']); ?></option>
                                                                                            <option  value="Cgpa" <?php echo set_select('10percentage', 'Cgpa'); ?>>CGPA</option>
                                                                                        <?php }
                                                                                        else 
                                                                                        {?>
                                                                                            <option value="<?php echo $qual10_details[0]['marks_perc_type']; ?>" <?php echo set_select('10percentage', 'Percentage')?>><?php echo strtoupper($qual10_details[0]['marks_perc_type']); ?></option>
                                                                                            <option value="Percentage" <?php echo set_select('10percentage', 'Percentage'); ?>>Percentage </option>
                                                                                        <?php 
                                                                                        }?>
                                                                                    
                                                                                    <?php }
                                                                                    else 
                                                                                        {?>
                                                                                        <option value="Percentage" <?php echo set_select('10percentage', 'Percentage'); ?>>Percentage </option>
                                                                                        <option  value="Cgpa" <?php echo set_select('10percentage', 'Cgpa'); ?>>CGPA</option>
                                                                                        <?php }?>
                                                                                    
                                                                                    </select>
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('10percentage')?></div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="year of passing">
                                                                                    <input onchange="year_check(this.id)" value="<?php echo set_value('10_y_pass')?><?php if(!empty($qual10_details[0]['year_of_passing'])) echo $qual10_details[0]['year_of_passing'];?>" maxlength="4" id="10_y_pass" name="10_y_pass" type="text">
                                                                                    <input value="<?php if(!empty($qual10_details[0]['id'])) echo $qual10_details[0]['id'];?>" maxlength="4" id="10_y_pass_" name="10_y_pass_"  type="hidden">
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('10_y_pass') ?></div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="percentage/CGPA">
                                                                                    <input onchange="validate_cgpa1(this.id,'10percentage');" id="10_p_cgpa" name="10_p_cgpa"  style="width: 158px;" value="<?php echo set_value('10_p_cgpa')?><?php if(!empty($qual10_details[0]['mark_cgpa_percenatge'])) {echo $qual10_details[0]['mark_cgpa_percenatge'];}?>"  maxlength="5"  placeholder="%" type="text">
                                                                                    <?php 
                                                                                      if(empty($qual10_details[0]['marks_perc_type']))
                                                                                      {?>
                                                                                        <div id="nor_cgpa1">
                                                                                        <div>  

                                                                                     <?php }
                                                                                      else
                                                                                      { if($qual10_details[0]['marks_perc_type']=='Cgpa') { ?>
                                                                                        <div id="nor_cgpa1">
                                                                                            <div id="add_nor_cgpa1" style="margin-top: 13px;">
                                                                                                <label>Out of CGPA</label>
                                                                                                <select id="out_of_cgpa1"  onchange="calculate_normal1()" name="out_of_cgpa1" class="form-select">
                                                                                                 <option value="<?php if(!empty($qual10_details[0]['out_of_cgpa'])) echo $qual10_details[0]['out_of_cgpa'];?>"><?php if(!empty($qual10_details[0]['out_of_cgpa'])) echo $qual10_details[0]['out_of_cgpa'];?></option>
                                                                                                 <option value="1">1</option>
                                                                                                 <option value="2">2</option>
                                                                                                 <option value="3">3</option>
                                                                                                 <option value="4">4</option>
                                                                                                 <option value="5">5</option> 
                                                                                                 <option value="6">6</option>
                                                                                                 <option value="7">7</option>
                                                                                                 <option value="8">8</option>
                                                                                                 <option value="9">9</option>
                                                                                                 <option value="10">10</option>
                                                                                                </select>
                                                                                                <div id="inner_normal1"> 
                                                                                                    <div id="remove_normal1" style="margin-top: 15px;">
                                                                                                    <label>Normalize CGPA</label>
                                                                                                    <input id="normal1" name="normal1" maxlength="5" type="text" value="<?php if(!empty($qual10_details[0]['orginal_cgpa'])) echo $qual10_details[0]['orginal_cgpa'];?>" readonly></input>
                                                                                                </div>

                                                                                                </div>
                                                                                            </div>
                                                                                        <div> 

                                                                                      <?php } 
                                                                                         ?>
                                                                                      
                                                                                         <div id="nor_cgpa1">
                                                                                           <div>  
                                                                                        <?php
                                                                                    
                                                                                     }
                                                                                     ?> 
                                                                                    
                                                                                    
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('10_p_cgpa') ?></div> <?php } ?>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td data-column="Exam type"> 
                                                                                    <select style="width: 78px;" id="examtype12" name="examtype12">

                                                                                    <?php if(!empty($qual12_details[0]['exam_type']))
                                                                                    { ?>
                                                                                        <option value="<?php echo $qual12_details[0]['exam_type']; ?>" <?php echo  set_select('examtype12', '12 th'); ?>><?php echo $qual12_details[0]['exam_type']; ?></option>
                                                                                    
                                                                                    <?php }
                                                                                    else 
                                                                                    {?>
                                                                                    <option value="12 th" <?php echo  set_select('examtype12', '12 th'); ?>>12 th</option>
                                                                                    <?php }?>

                                                                                    </select>
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('examtype12') ?> </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="Name of exam">
                                                                                    <select  id="name_of_exam12" name="name_of_exam12">

                                                                                        <?php if(!empty($qual12_details[0]['exam_name']))
                                                                                        { ?>
                                                                                            
                                                                                            <option value="<?php echo $qual12_details[0]['exam_name']; ?>" <?php echo  set_select('name_of_exam12', '12 th'); ?>><?php echo $qual12_details[0]['exam_name']; ?></option>

                                                                                        <?php }
                                                                                        else 
                                                                                        {?>
                                                                                            <option value="12 th" <?php echo  set_select('name_of_exam12', '12 th'); ?>>12 th</option>

                                                                                        <?php }?>

                                                                                    </select>
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('name_of_exam12') ?> </div> <?php } ?>
                                                                                </td>
                                                                                <td data-column="discipline12">
                                                                                    <input id="discipline12" name="discipline12" type="text"  value="NA" maxlength="99" readonly>
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('discipline12') ?> </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="qualifying_degree12">
                                                                                   <input id="qualifying_degree12" name="qualifying_degree12" type="text" value="NA" maxlength="99" readonly>
                                                                                   <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('qualifying_degree12') ?> </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="Institute/university name">
                                                                                 <input id="Institute12" name="Institute12" type="text"  value="<?php echo set_value('Institute12'); ?><?php if(!empty($qual12_details[0]['institue_name'])){ echo $qual12_details[0]['institue_name'];} ?>" placeholder="Institute/university name" maxlength="49">
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('Institute12') ?> </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="result Status">
                                                                                    <select style="width: 85px;" id="12passed" name="12passed">
                                                                                    <?php if(!empty($qual12_details[0]['result_status']))
                                                                                    { ?>
                                                                                        
                                                                                        
                                                                                        <option value="<?php echo $qual12_details[0]['result_status']; ?>"  <?php echo  set_select('12passed', 'Passed'); ?>><?php echo $qual12_details[0]['result_status']; ?></option>

                                                                                    <?php }
                                                                                    else 
                                                                                        {?>
                                                                                        <option value="Passed"  <?php echo  set_select('12passed', 'Passed'); ?>>Passed</option>
                                                                                        <?php }?>
                                                                                    
                                                                                    </select>
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('12passed') ?> </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="marks System">
                                                                                    <select  style="width: 85px;" onchange="percentage_12cgpa(this.value)"  id="12percentage"  value="<?php echo set_value('12percentage'); ?>" name="12percentage">
                                                                                    
                                                                                    <?php if(!empty($qual12_details))
                                                                                    {  if($qual12_details[0]['marks_perc_type']=='Percentage')
                                                                                        {?>
                                                                                                

                                                                                                <option value="<?php echo $qual12_details[0]['marks_perc_type'];?>" <?php echo  set_select('12percentage', 'Percentage');?>><?php echo strtoupper($qual12_details[0]['marks_perc_type']);?></option>
                                                                                                <option value="Cgpa" <?php echo  set_select('12percentage', 'Cgpa');?>>CGPA</option>
                                                                                        <?php }
                                                                                        else 
                                                                                        {?>
                                                                                            
                                                                                            <option value="<?php echo $qual12_details[0]['marks_perc_type']; ?>"<?php echo  set_select('12percentage', 'Cgpa');?>><?php echo strtoupper($qual12_details[0]['marks_perc_type']);?></option>
                                                                                            <option value="Percentage" <?php echo  set_select('12percentage', 'Percentage'); ?>>Percentage</option>
                                                                                            
                                                                                        <?php 
                                                                                        }?>
                                                                                    
                                                                                    <?php }
                                                                                    else 
                                                                                        {?>
                                                                                        <option value="Percentage" <?php echo  set_select('12percentage', 'Percentage'); ?>>Percentage</option>
                                                                                        <option value="Cgpa" <?php echo  set_select('12percentage', 'Cgpa'); ?>>CGPA</option>
                                                                                        <?php }?>
                                                                                    

                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('12percentage') ?> </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="year of passing">
                                                                                    <input onchange="year_check(this.id)"  value="<?php echo set_value('12_y_pass');?><?php if(!empty($qual12_details[0]['year_of_passing'])){ echo $qual12_details[0]['year_of_passing'];} ?>" maxlength="4" id="12_y_pass" name="12_y_pass"  type="text">
                                                                                    <input  value="<?php if(!empty($qual12_details[0]['id'])){ echo $qual12_details[0]['id'];} ?>" id="12_y_pass_" name="12_y_pass_" type="hidden">
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('12_y_pass') ?>  </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="percentage/CGPA">
                                                                                <input  onchange="validate_cgpa2(this.id,'12percentage');"  value="<?php echo set_value('12_p_cgpa');?><?php if(!empty($qual12_details[0]['mark_cgpa_percenatge'])){ echo $qual12_details[0]['mark_cgpa_percenatge'];} ?>" maxlength="5" id="12_p_cgpa" placeholder="%" name="12_p_cgpa" style="width: 158px;" type="text">
                                                                                 
                                                                                   <?php 
                                                                                      if(empty($qual12_details[0]['marks_perc_type']))
                                                                                      {?>
                                                                                        <div id="nor_cgpa2">
                                                                                        <div>  

                                                                                     <?php }
                                                                                      else
                                                                                      { if($qual12_details[0]['marks_perc_type']=='Cgpa') { ?>
                                                                                        <div id="nor_cgpa2">
                                                                                            <div id="add_nor_cgpa2" style="margin-top: 13px;">
                                                                                                <label>Out of CGPA</label>
                                                                                                <select id="out_of_cgpa2"  onchange="calculate_normal2()" name="out_of_cgpa2" class="form-select">
                                                                                                <option value="<?php if(!empty($qual12_details[0]['out_of_cgpa'])) echo $qual12_details[0]['out_of_cgpa'];?>"><?php if(!empty($qual12_details[0]['out_of_cgpa'])) echo $qual12_details[0]['out_of_cgpa'];?></option>
                                                                                                 <option value="1">1</option>
                                                                                                 <option value="2">2</option>
                                                                                                 <option value="3">3</option>
                                                                                                 <option value="4">4</option>
                                                                                                 <option value="5">5</option> 
                                                                                                 <option value="6">6</option>
                                                                                                 <option value="7">7</option>
                                                                                                 <option value="8">8</option>
                                                                                                 <option value="9">9</option>
                                                                                                 <option value="10">10</option>
                                                                                                </select>
                                                                                                <div id="inner_normal2"> 
                                                                                                    <div id="remove_normal2" style="margin-top: 15px;">
                                                                                                    <label>Normalize CGPA</label>
                                                                                                    <input id="normal2" name="normal2" maxlength="5" type="text" value="<?php if(!empty($qual12_details[0]['orginal_cgpa'])) echo $qual12_details[0]['orginal_cgpa'];?>" readonly></input>
                                                                                                </div>

                                                                                                </div>
                                                                                            </div>
                                                                                        <div> 

                                                                                      <?php } ?>
                                                                                      
                                                                                      <div id="nor_cgpa2">
                                                                                        <div>  
                                                                                     <?php }
                                                                                     ?> 

                                                                                <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('12_p_cgpa') ?> </div> <?php } ?>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td data-column="Exam type"> 
                                                                                    <select style="width: 78px;" id="examtypeug" name="examtypeug">
                                                                                        
                                                                                        <?php if(!empty($qualug_details))
                                                                                        { ?>
                                                                                        
                                                                                            <option value="<?php  if(!empty($qualug_details[0]['exam_type']))  echo $qualug_details[0]['exam_type']; ?>"  <?php echo  set_select('examtypeug', 'UG Exam'); ?>><?php  if(!empty($qualug_details[0]['exam_type']))  echo $qualug_details[0]['exam_type']; ?></option>
                                                                                        <?php }
                                                                                        else 
                                                                                        {?>
                                                                                        <option value="UG Exam"<?php echo  set_select('examtypeug', 'UG Exam');?>>UG Exam</option>
                                                                                        <?php }?>
                                                                                        

                                                                                    </select>

                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('examtypeug') ?> </div> <?php } ?> 
                                                                                </td>
                                                                               

                                                                                <td data-column="Name of exam">
                                                                                    <input  id="name_of_ugexam" name="name_of_ugexam"  value="<?php echo set_value('name_of_ugexam'); ?><?php if(!empty($qualug_details[0]['exam_name'])) echo $qualug_details[0]['exam_name'];?>" type="text" placeholder="UG Exam Name" maxlength="49">
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('name_of_ugexam') ?> </div> <?php } ?>
                                                                                </td>
                                                                                <td data-column="discipline">
                                                                                    <input id="disciplineug"  value="<?php echo set_value('disciplineug');?><?php  if(!empty($qualug_details[0]['discipline'])) echo $qualug_details[0]['discipline'];?>" name="disciplineug" type="text" placeholder="Enter discipline" maxlength="99">
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('disciplineug') ?>  </div> <?php } ?>
                                                                                </td>
                                                                                <td data-column="qualifying_degreeug">
                                                                                    <select class="qd" id="qualifying_degreeug" name="qualifying_degreeug">
                                                                                        <?php if(!empty($qualug_details[0]['qual_flag']))
                                                                                        {  if($qualug_details[0]['qual_flag']=='Y')
                                                                                            {?>
                                                                                                    
                                                                                                    <option value="<?php  if($qualug_details[0]['qual_flag']=='Y') echo "Y"; ?>" <?php echo  set_select('qualifying_degreeug', 'Yes'); ?>><?php  if($qualug_details[0]['qual_flag']=="Y")  echo "Yes"; ?></option>
                                                                                                    <option value="N" <?php echo  set_select('qualifying_degreeug', 'No'); ?>>No</option>
                                                                                                    
                                                                                             <?php 
                                                                                            }
                                                                                            else 
                                                                                            {?>
                                                                                            
                                                                                                <option value="<?php  if($qualug_details[0]['qual_flag']=='N')  echo "N"; ?>" <?php echo  set_select('ug_appearing', 'Appearing'); ?>><?php  if($qualug_details[0]['qual_flag']=="N")  echo "No"; ?></option>
                                                                                                <option value="Y" <?php echo  set_select('qualifying_degreeug', 'Yes'); ?>>Yes</option>  
                                                                                            <?php 
                                                                                            }?>
                                                                                        
                                                                                        <?php }
                                                                                        else 
                                                                                        {?>
                                                                                         <option value="N"  <?php echo  set_select('qualifying_degreeug', 'No'); ?>>No</option>
                                                                                        <option value="Y" <?php echo  set_select('qualifying_degreeug', 'Yes'); ?>>Yes</option>
                                                                                       
                                                                                        <?php }?>
                                                                                        
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('qualifying_degreeug') ?>  </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="Institute/university name">
                                                                                    <input id="Institute_examug"  value="<?php echo set_value('Institute_examug');?><?php  if(!empty($qualug_details[0]['institue_name'])) echo $qualug_details[0]['institue_name'];?>" name="Institute_examug" type="text" placeholder="Institute/university name" maxlength="49">
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('Institute_examug') ?>  </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="result Status">
                                                                                    <select style="width: 85px;" id="ug_appearing" name="ug_appearing">
                                                                                    <?php if(!empty($qualug_details[0]['result_status']))
                                                                                    {  if($qualug_details[0]['result_status']=='Passed')
                                                                                        {?>
                                                                                                
                                                                                                <option value="<?php  if(!empty($qualug_details[0]['result_status'])) echo $qualug_details[0]['result_status']; ?>" <?php echo  set_select('ug_appearing', 'Passed'); ?>><?php  if(!empty($qualug_details[0]['result_status']))  echo $qualug_details[0]['result_status']; ?></option>
                                                                                                <!-- <option value="Appearing" <?php echo  set_select('ug_appearing', 'Appearing'); ?>>Appearing</option> -->
                                                                                                
                                                                                        <?php }
                                                                                        else 
                                                                                        {?>
                                                                                        
                                                                                            <option value="<?php  if(!empty($qualug_details[0]['result_status']))  echo $qualug_details[0]['result_status']; ?>" <?php echo  set_select('ug_appearing', 'Appearing'); ?>><?php  if(!empty($qualug_details[0]['result_status']))  echo $qualug_details[0]['result_status']; ?></option>
                                                                                            <option value="Passed" <?php echo  set_select('ug_appearing', 'Passed'); ?>>Passed</option>  
                                                                                        <?php 
                                                                                        }?>
                                                                                    
                                                                                    <?php }
                                                                                    else 
                                                                                        {?>
                                                                                        <option value="Passed" <?php echo  set_select('ug_appearing', 'Passed'); ?>>Passed</option>
                                                                                        <!-- <option value="Appearing" <?php echo  set_select('ug_appearing', 'Appearing'); ?>>Appearing</option> -->
                                                                                        <?php }?>
                                                                                    
                                                                                

                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('ug_appearing') ?>  </div> <?php } ?>
                                                                                </td>
                                                                                <td data-column="marks System">
                                                                                    <select style="width: 85px;" onchange="percentage_ugcgpa(this.value)" id="ug_percentage" name="ug_percentage">


                                                                                    <?php  if(!empty($qualug_details))
                                                                                    {  if($qualug_details[0]['marks_perc_type']=='Percentage')
                                                                                        {?>
                                                                                                
                                                                                            <option value="<?php if (!empty($qualug_details[0]['marks_perc_type'])) {echo $qualug_details[0]['marks_perc_type']; }?>"  <?php echo  set_select('ug_percentage', 'Percentage'); ?>><?php if (!empty($qualug_details[0]['marks_perc_type'])){ echo strtoupper($qualug_details[0]['marks_perc_type']); } ?></option>
                                                                                            <option value="Cgpa"  <?php echo  set_select('ug_percentage', 'Cgpa'); ?>>CGPA</option>

                                                                                        <?php }
                                                                                        else 
                                                                                        {?>
                                                                                            
                                                                                            <option value="<?php if(!empty($qualug_details[0]['marks_perc_type'])) { echo $qualug_details[0]['marks_perc_type']; }?>"  <?php echo  set_select('ug_percentage', 'Cgpa'); ?>><?php if(!empty($qualug_details[0]['marks_perc_type'])) { echo strtoupper($qualug_details[0]['marks_perc_type']); }?></option>
                                                                                            <option value="Percentage"  <?php echo  set_select('ug_percentage', 'Percentage'); ?>>Percentage</option>
                                                                                        <?php 
                                                                                        }?>
                                                                                    
                                                                                    <?php }
                                                                                    else 
                                                                                        {?>
                                                                                        <option value="Percentage"  <?php echo  set_select('ug_percentage', 'Percentage'); ?>>Percentage</option>
                                                                                        <option value="Cgpa"  <?php echo  set_select('ug_percentage', 'Cgpa'); ?>>CGPA</option>
                                                                                        <?php }?>
                                                                                    
                                                                                    </select>
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('ug_percentage') ?> </div> <?php } ?>
                                                                                </td>
                                                                                <td data-column="year of passing">
                                                                                    <input onchange="year_checkug(this.id,'ug_appearing')"  value="<?php echo set_value('ug_y_passing');?><?php if(!empty($qualug_details[0]['year_of_passing'])) echo $qualug_details[0]['year_of_passing'];?>" maxlength="4" id="ug_y_passing" name="ug_y_passing" type="text">
                                                                                    <input  value="<?php if(!empty($qualug_details[0]['id'])) echo $qualug_details[0]['id'];?>" maxlength="4" id="ug_y_passing_" name="ug_y_passing_"type="hidden">
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('ug_y_passing') ?> </div> <?php } ?>
                                                                                </td>
                                                                                <td data-column="percentage/CGPA">

                                                                                <input onchange="validate_cgpa3(this.id,'ug_percentage');" maxlength="5"  value="<?php echo set_value('ug_p_cgpa');?><?php if(!empty($qualug_details[0]['mark_cgpa_percenatge'])) echo $qualug_details[0]['mark_cgpa_percenatge'];?>" id="ug_p_cgpa" name="ug_p_cgpa" placeholder="%" style="width: 158px;" type="text">
                                                                                
                                                                                    <?php 
                                                                                      if(empty($qualug_details[0]['marks_perc_type']))
                                                                                      {?>
                                                                                        <div id="nor_cgpa3">
                                                                                        <div>  

                                                                                     <?php }
                                                                                      else
                                                                                      { if($qualug_details[0]['marks_perc_type']=='Cgpa') { ?>
                                                                                        <div id="nor_cgpa3">
                                                                                            <div id="add_nor_cgpa3" style="margin-top: 13px;">
                                                                                                <label>Out of CGPA</label>
                                                                                                <select id="out_of_cgpa3"  onchange="calculate_normal3()" name="out_of_cgpa3" class="form-select">
                                                                                                <option value="<?php if(!empty($qualug_details[0]['out_of_cgpa'])) echo $qualug_details[0]['out_of_cgpa'];?>"><?php if(!empty($qualug_details[0]['out_of_cgpa'])) echo $qualug_details[0]['out_of_cgpa'];?></option>
                                                                                                 <option value="1">1</option>
                                                                                                 <option value="2">2</option>
                                                                                                 <option value="3">3</option>
                                                                                                 <option value="4">4</option>
                                                                                                 <option value="5">5</option> 
                                                                                                 <option value="6">6</option>
                                                                                                 <option value="7">7</option>
                                                                                                 <option value="8">8</option>
                                                                                                 <option value="9">9</option>
                                                                                                 <option value="10">10</option>
                                                                                                </select>
                                                                                                <div id="inner_normal3"> 
                                                                                                    <div id="remove_normal3" style="margin-top: 15px;">
                                                                                                    <label>Normalize CGPA</label>
                                                                                                    <input id="normal3" name="normal3" maxlength="5" type="text" value="<?php if(!empty($qualug_details[0]['orginal_cgpa'])) echo $qualug_details[0]['orginal_cgpa'];?>" readonly></input>
                                                                                                </div>

                                                                                                </div>
                                                                                            </div>
                                                                                        <div> 

                                                                                      <?php }
                                                                                         
                                                                                         ?>
                                                                                      
                                                                                         <div id="nor_cgpa3">
                                                                                           <div>  
                                                                                        <?php
                                                                                     }
                                                                                     ?> 

                                                                                <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('ug_p_cgpa') ?> </div> <?php } ?>
                                                                                </td>
                                                                            </tr>   
                                                                            
                                                                            <tr>
                                                                                <td data-column="Exam type"> 
                                                                                    <select style="width: 78px;" id="examtypepg1" name="examtypepg1">
                                                                                        
                                                                                        <?php if(!empty($qualpg1_details))
                                                                                        { ?>
                                                                                        
                                                                                            <option value="<?php  if(!empty($qualpg1_details[0]['exam_type']))  echo $qualpg1_details[0]['exam_type']; ?>"  <?php echo  set_select('examtypepg1', 'PG1 Exam'); ?>><?php  if(!empty($qualpg1_details[0]['exam_type']))  echo $qualpg1_details[0]['exam_type']; ?></option>
                                                                                        <?php }
                                                                                        else 
                                                                                        {?>
                                                                                        <option value="PG1 Exam"<?php echo  set_select('examtypepg1', 'PG1 Exam');?>>PG1 Exam</option>
                                                                                        <?php }?>
                                                                                        

                                                                                    </select>

                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('examtypepg1') ?> </div> <?php } ?> 
                                                                                </td>
                                                                               

                                                                                <td data-column="Name of exam">
                                                                                    <input  class="fpg1" id="name_of_pg1exam" name="name_of_pg1exam"  value="<?php echo set_value('name_of_pg1exam'); ?><?php if(!empty($qualpg1_details[0]['exam_name'])) echo $qualpg1_details[0]['exam_name'];?>" type="text" placeholder="PG1 Exam Name" maxlength="49">
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('name_of_pg1exam') ?> </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="discipline">
                                                                                    <input  class="fpg1" id="disciplinepg1"  value="<?php echo set_value('disciplinepg1');?><?php  if(!empty($qualpg1_details[0]['discipline'])) echo $qualpg1_details[0]['discipline'];?>" name="disciplinepg1" type="text" placeholder="Enter discipline" maxlength="99">
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('disciplinepg1') ?>  </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="qualifying_degreepg1">
                                                                                    <select class="qd" class="fpg1" id="qualifying_degreepg1" name="qualifying_degreepg1">
                                                                                        <?php if(!empty($qualpg1_details[0]['qual_flag']))
                                                                                        {  if($qualpg1_details[0]['qual_flag']=='Y')
                                                                                            {?>
                                                                                                    
                                                                                                    <option value="<?php  if($qualpg1_details[0]['qual_flag']=='Y') echo "Y"; ?>" <?php echo  set_select('qualifying_degreepg1', 'Yes'); ?>><?php  if($qualpg1_details[0]['qual_flag']=="Y")  echo "Yes"; ?></option>
                                                                                                    <option value="N" <?php echo  set_select('qualifying_degreepg1', 'No'); ?>>No</option>
                                                                                                    
                                                                                             <?php 
                                                                                            }
                                                                                            else 
                                                                                            {?>
                                                                                            
                                                                                                <option value="<?php  if($qualpg1_details[0]['qual_flag']=="N")  echo "N"; ?>" <?php echo  set_select('qualifying_degreepg1', 'Appearing'); ?>><?php  if($qualpg1_details[0]['qual_flag']=="N")  echo "No"; ?></option>
                                                                                                <option value="Y" <?php echo  set_select('qualifying_degreepg1', 'Yes'); ?>>Yes</option>  
                                                                                            <?php 
                                                                                            }?>
                                                                                        
                                                                                        <?php }
                                                                                        else 
                                                                                        {?>
                                                                                        <option value="N"  <?php echo  set_select('qualifying_degreepg1', 'No'); ?>>No</option>
                                                                                        <option value="Y" <?php echo  set_select('qualifying_degreepg1', 'Yes'); ?>>Yes</option>
                                                                                       
                                                                                        <?php }?>
                                                                                        
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('qualifying_degreepg1') ?>  </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="Institute/university name">
                                                                                    <input  class="fpg1" id="Institute_exampg1"  value="<?php echo set_value('Institute_exampg1');?><?php  if(!empty($qualpg1_details[0]['institue_name'])) echo $qualpg1_details[0]['institue_name'];?>" name="Institute_exampg1" type="text" placeholder="Institute/university name" maxlength="49">
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('Institute_exampg1') ?>  </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="result Status">
                                                                                    <select style="width: 85px;" id="pg1_appearing" name="pg1_appearing">
                                                                                    <?php if(!empty($qualpg1_details[0]['result_status']))
                                                                                    {  if($qualpg1_details[0]['result_status']=='Passed')
                                                                                        {?>
                                                                                                
                                                                                                <option value="<?php  if(!empty($qualpg1_details[0]['result_status'])) echo $qualpg1_details[0]['result_status']; ?>" <?php echo  set_select('pg1_appearing', 'Passed'); ?>><?php  if(!empty($qualpg1_details[0]['result_status']))  echo $qualpg1_details[0]['result_status']; ?></option>
                                                                                                <!-- <option value="Appearing" <?php echo  set_select('pg1_appearing', 'Appearing'); ?>>Appearing</option> -->
                                                                                                
                                                                                        <?php }
                                                                                        else 
                                                                                        {?>
                                                                                        
                                                                                            <option value="<?php  if(!empty($qualpg1_details[0]['result_status']))  echo $qualpg1_details[0]['result_status']; ?>" <?php echo  set_select('pg1_appearing', 'Appearing'); ?>><?php  if(!empty($qualpg1_details[0]['result_status']))  echo $qualpg1_details[0]['result_status']; ?></option>
                                                                                            <option value="Passed" <?php echo  set_select('pg1_appearing', 'Passed'); ?>>Passed</option>  
                                                                                        <?php 
                                                                                        }?>
                                                                                    
                                                                                    <?php }
                                                                                    else 
                                                                                        {?>
                                                                                        <option value="Passed" <?php echo  set_select('pg1_appearing', 'Passed'); ?>>Passed</option>
                                                                                        <!-- <option value="Appearing" <?php echo  set_select('pg1_appearing', 'Appearing'); ?>>Appearing</option> -->
                                                                                        <?php }?>
                                                                                    
                                                                                

                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('pg1_appearing') ?>  </div> <?php } ?>
                                                                                </td>
                                                                                <td data-column="marks System">
                                                                                    <select style="width: 85px;" onchange="percentage_pg1cgpa(this.value)" id="pg1_percentage" name="pg1_percentage">


                                                                                    <?php  if(!empty($qualpg1_details))
                                                                                    {  if($qualpg1_details[0]['marks_perc_type']=='Percentage')
                                                                                        {?>
                                                                                                
                                                                                            <option value="<?php if (!empty($qualpg1_details[0]['marks_perc_type'])) {echo $qualpg1_details[0]['marks_perc_type']; }?>"  <?php echo  set_select('pg1_percentage', 'Percentage'); ?>><?php if (!empty($qualpg1_details[0]['marks_perc_type'])){ echo strtoupper($qualpg1_details[0]['marks_perc_type']); } ?></option>
                                                                                            <option value="Cgpa"  <?php echo  set_select('ug_percentage', 'Cgpa'); ?>>CGPA</option>

                                                                                        <?php }
                                                                                        else 
                                                                                        {?>
                                                                                            
                                                                                            <option value="<?php if(!empty($qualpg1_details[0]['marks_perc_type'])) { echo $qualpg1_details[0]['marks_perc_type']; }?>"  <?php echo  set_select('pg1_percentage', 'Cgpa'); ?>><?php if(!empty($qualpg1_details[0]['marks_perc_type'])) { echo strtoupper($qualpg1_details[0]['marks_perc_type']); }?></option>
                                                                                            <option value="Percentage"  <?php echo  set_select('pg1_percentage', 'Percentage'); ?>>Percentage</option>
                                                                                        <?php 
                                                                                        }?>
                                                                                    
                                                                                    <?php }
                                                                                    else 
                                                                                        {?>
                                                                                        <option value="Percentage"  <?php echo  set_select('pg1_percentage', 'Percentage'); ?>>Percentage</option>
                                                                                        <option value="Cgpa"  <?php echo  set_select('pg1_percentage', 'Cgpa'); ?>>CGPA</option>
                                                                                        <?php }?>
                                                                                    
                                                                                    </select>
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('ug_percentage') ?> </div> <?php } ?>
                                                                                </td>
                                                                                <td data-column="year of passing">
                                                                                    <input  class="fpg1" onchange="year_checkpg1(this.id,'pg1_appearing')"  value="<?php echo set_value('pg1_y_passing');?><?php if(!empty($qualpg1_details[0]['year_of_passing'])) echo $qualpg1_details[0]['year_of_passing'];?>" maxlength="4" id="pg1_y_passing" name="pg1_y_passing" type="text">
                                                                                    <input  value="<?php if(!empty($qualpg1_details[0]['id'])) echo $qualpg1_details[0]['id'];?>" maxlength="4" id="pg1_y_passing_" name="pg1_y_passing_"type="hidden">
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('pg1_y_passing') ?> </div> <?php } ?>
                                                                                </td>
                                                                                <td data-column="percentage/CGPA">

                                                                                <input  class="fpg1" onchange="validate_cgpa4(this.id,'pg1_percentage');" maxlength="5"  value="<?php echo set_value('pg1_p_cgpa');?><?php if(!empty($qualpg1_details[0]['mark_cgpa_percenatge'])) echo $qualpg1_details[0]['mark_cgpa_percenatge'];?>" id="pg1_p_cgpa" name="pg1_p_cgpa" placeholder="%" style="width: 158px;" type="text">
                                                                                <?php 
                                                                                      if(empty($qualpg1_details[0]['marks_perc_type']))
                                                                                      {?>
                                                                                        <div id="nor_cgpa4">
                                                                                        <div>  

                                                                                     <?php }
                                                                                      else
                                                                                      { if($qualpg1_details[0]['marks_perc_type']=='Cgpa') { ?>
                                                                                        <div id="nor_cgpa4">
                                                                                            <div id="add_nor_cgpa4" style="margin-top: 13px;">
                                                                                                <label>Out of CGPA</label>
                                                                                                <select id="out_of_cgpa4"  onchange="calculate_normal4()" name="out_of_cgpa4" class="form-select">
                                                                                                <option value="<?php if(!empty($qualpg1_details[0]['out_of_cgpa'])) echo $qualpg1_details[0]['out_of_cgpa'];?>"><?php if(!empty($qualpg1_details[0]['out_of_cgpa'])) echo $qualpg1_details[0]['out_of_cgpa'];?></option>
                                                                                                 <option value="1">1</option>
                                                                                                 <option value="2">2</option>
                                                                                                 <option value="3">3</option>
                                                                                                 <option value="4">4</option>
                                                                                                 <option value="5">5</option> 
                                                                                                 <option value="6">6</option>
                                                                                                 <option value="7">7</option>
                                                                                                 <option value="8">8</option>
                                                                                                 <option value="9">9</option>
                                                                                                 <option value="10">10</option>
                                                                                                </select>
                                                                                                <div id="inner_normal4"> 
                                                                                                    <div id="remove_normal4" style="margin-top: 15px;">
                                                                                                    <label>Normalize CGPA</label>
                                                                                                    <input id="normal4" name="normal4" maxlength="5" type="text" value="<?php if(!empty($qualpg1_details[0]['orginal_cgpa'])) echo $qualpg1_details[0]['orginal_cgpa'];?>" readonly></input>
                                                                                                </div>

                                                                                                </div>
                                                                                            </div>
                                                                                        <div> 

                                                                                      <?php } 
                                                                                        
                                                                                        ?>
                                                                                      
                                                                                        <div id="nor_cgpa4">
                                                                                          <div>  
                                                                                       <?php
                                                                                     }
                                                                                     ?> 
                                                                                <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('pg1_p_cgpa') ?> </div> <?php } ?>
                                                                                </td>
                                                                            </tr> 
                                                                             
                                                                            <tr>
                                                                                <td data-column="Exam type"> 
                                                                                    <select style="width: 78px;" id="examtypepg2" name="examtypepg2">
                                                                                        
                                                                                        <?php if(!empty($qualpg2_details))
                                                                                        { ?>
                                                                                        
                                                                                            <option value="<?php  if(!empty($qualpg2_details[0]['exam_type']))  echo $qualpg2_details[0]['exam_type']; ?>"  <?php echo  set_select('examtypepg2', 'PG1 Exam'); ?>><?php  if(!empty($qualpg2_details[0]['exam_type']))  echo $qualpg2_details[0]['exam_type']; ?></option>
                                                                                        <?php }
                                                                                        else 
                                                                                        {?>
                                                                                        <option value="PG2 Exam"<?php echo  set_select('examtypepg2', 'PG2 Exam');?>>PG2 Exam</option>
                                                                                        <?php }?>
                                                                                        

                                                                                    </select>

                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('examtypepg2') ?> </div> <?php } ?> 
                                                                                </td>
                                                                               

                                                                                <td data-column="Name of exam">
                                                                                    <input  class="fpg2" id="name_of_pg2exam" name="name_of_pg2exam"  value="<?php echo set_value('name_of_pg2exam'); ?><?php if(!empty($qualpg2_details[0]['exam_name'])) echo $qualpg2_details[0]['exam_name'];?>" type="text" placeholder="PG2 Exam Name" maxlength="49">
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('name_of_pg2exam') ?> </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="discipline">
                                                                                    <input  class="fpg2" id="disciplinepg2"  value="<?php echo set_value('disciplinepg2');?><?php  if(!empty($qualpg2_details[0]['discipline'])) echo $qualpg2_details[0]['discipline'];?>" name="disciplinepg2" type="text" placeholder="Enter discipline" maxlength="99">
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('disciplineug') ?>  </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="qualifying_degreepg2">
                                                                                    <select  class="qd" class="fpg2" id="qualifying_degreepg2" name="qualifying_degreepg2">
                                                                                        <?php if(!empty($qualpg2_details[0]['qual_flag']))
                                                                                        {  if($qualpg2_details[0]['qual_flag']=='Y')
                                                                                            {?>
                                                                                                    
                                                                                                    <option value="<?php  if($qualpg2_details[0]['qual_flag']=='Y') echo "Y"; ?>" <?php echo  set_select('qualifying_degreepg2', 'Yes'); ?>><?php  if($qualpg2_details[0]['qual_flag']=="Y")  echo "Yes"; ?></option>
                                                                                                    <option value="N" <?php echo  set_select('qualifying_degreepg2', 'No'); ?>>No</option>
                                                                                                    
                                                                                             <?php 
                                                                                            }
                                                                                            else 
                                                                                            {?>
                                                                                            
                                                                                                <option value="<?php  if($qualpg2_details[0]['qual_flag']=="N")  echo "N"; ?>" <?php echo  set_select('qualifying_degreepg2', 'Appearing'); ?>><?php  if($qualpg2_details[0]['qual_flag']=='N')  echo "No"; ?></option>
                                                                                                 
                                                                                            <?php 
                                                                                            }?>
                                                                                        
                                                                                        <?php }
                                                                                        else 
                                                                                        {?>
                                                                                        <option value="N"  <?php echo  set_select('qualifying_degreepg2', 'No'); ?>>No</option>
                                                                                       
                                                                                        
                                                                                        <?php }?>
                                                                                        
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('qualifying_degreepg2') ?>  </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="Institute/university name">
                                                                                    <input  class="fpg2" id="Institute_exampg2"  value="<?php echo set_value('Institute_exampg2');?><?php  if(!empty($qualpg2_details[0]['institue_name'])) echo $qualpg2_details[0]['institue_name'];?>" name="Institute_exampg2" type="text" placeholder="Institute/university name" maxlength="49">
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('Institute_exampg2') ?>  </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="result Status">
                                                                                    <select style="width: 85px;" id="pg2_appearing" name="pg2_appearing">
                                                                                    <?php if(!empty($qualpg2_details[0]['result_status']))
                                                                                    {  if($qualpg2_details[0]['result_status']=='Passed')
                                                                                        {?>
                                                                                                
                                                                                                <option value="<?php  if(!empty($qualpg2_details[0]['result_status'])) echo $qualpg2_details[0]['result_status']; ?>" <?php echo  set_select('pg2_appearing', 'Passed'); ?>><?php  if(!empty($qualpg2_details[0]['result_status']))  echo $qualpg2_details[0]['result_status']; ?></option>
                                                                                                <!-- <option value="Appearing" <?php echo  set_select('pg2_appearing', 'Appearing'); ?>>Appearing</option> -->
                                                                                                
                                                                                        <?php }
                                                                                        else 
                                                                                        {?>
                                                                                        
                                                                                            <option value="<?php  if(!empty($qualpg2_details[0]['result_status']))  echo $qualpg2_details[0]['result_status']; ?>" <?php echo  set_select('pg2_appearing', 'Appearing'); ?>><?php  if(!empty($qualpg2_details[0]['result_status']))  echo $qualpg2_details[0]['result_status']; ?></option>
                                                                                            <option value="Passed" <?php echo  set_select('pg2_appearing', 'Passed'); ?>>Passed</option>  
                                                                                        <?php 
                                                                                        }?>
                                                                                    
                                                                                    <?php }
                                                                                    else 
                                                                                        {?>
                                                                                        <option value="Passed" <?php echo  set_select('pg2_appearing', 'Passed'); ?>>Passed</option>
                                                                                        <!-- <option value="Appearing" <?php echo  set_select('pg2_appearing', 'Appearing'); ?>>Appearing</option> -->
                                                                                        <?php }?>
                                                                                    
                                                                                

                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('pg2_appearing') ?>  </div> <?php } ?>
                                                                                </td>
                                                                                <td data-column="marks System">
                                                                                    <select style="width: 85px;" onchange="percentage_pg2cgpa(this.value)" id="pg2_percentage" name="pg2_percentage">


                                                                                    <?php  if(!empty($qualpg2_details))
                                                                                    {  if($qualpg2_details[0]['marks_perc_type']=='Percentage')
                                                                                        {?>
                                                                                                
                                                                                            <option value="<?php if (!empty($qualpg2_details[0]['marks_perc_type'])) {echo $qualpg2_details[0]['marks_perc_type']; }?>"  <?php echo  set_select('pg2_percentage', 'Percentage'); ?>><?php if (!empty($qualpg2_details[0]['marks_perc_type'])){ echo $qualpg2_details[0]['marks_perc_type']; } ?></option>
                                                                                            <option value="Cgpa"  <?php echo  set_select('ug_percentage', 'Cgpa'); ?>>CGPA</option>

                                                                                        <?php }
                                                                                        else 
                                                                                        {?>
                                                                                            
                                                                                            <option value="<?php if(!empty($qualpg2_details[0]['marks_perc_type'])) { echo $qualpg2_details[0]['marks_perc_type']; }?>"  <?php echo  set_select('pg2_percentage', 'Cgpa'); ?>><?php if(!empty($qualpg2_details[0]['marks_perc_type'])) { echo $qualpg2_details[0]['marks_perc_type']; }?></option>
                                                                                            <option value="Percentage"  <?php echo  set_select('pg2_percentage', 'Percentage'); ?>>Percentage</option>
                                                                                        <?php 
                                                                                        }?>
                                                                                    
                                                                                    <?php }
                                                                                    else 
                                                                                        {?>
                                                                                        <option value="Percentage"  <?php echo  set_select('pg2_percentage', 'Percentage'); ?>>Percentage</option>
                                                                                        <option value="Cgpa"  <?php echo  set_select('pg2_percentage', 'Cgpa'); ?>>CGPA</option>
                                                                                        <?php }?>
                                                                                    
                                                                                    </select>
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('ug_percentage') ?> </div> <?php } ?>
                                                                                </td>
                                                                                <td data-column="year of passing">
                                                                                    <input class="fpg2" onchange="year_checkpg2(this.id,'pg2_appearing')"  value="<?php echo set_value('pg2_y_passing');?><?php if(!empty($qualpg2_details[0]['year_of_passing'])) echo $qualpg2_details[0]['year_of_passing'];?>" maxlength="4" id="pg2_y_passing" name="pg2_y_passing" type="text">
                                                                                    <input  value="<?php if(!empty($qualpg2_details[0]['id'])) echo $qualpg2_details[0]['id'];?>" maxlength="4" id="pg2_y_passing_" name="pg2_y_passing_"type="hidden">
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('pg2_y_passing') ?> </div> <?php } ?>
                                                                                </td>
                                                                                <td data-column="percentage/CGPA">

                                                                                <input class="fpg2" onchange="validate_cgpa5(this.id,'pg2_percentage');" maxlength="5"  value="<?php echo set_value('pg2_p_cgpa');?><?php if(!empty($qualpg2_details[0]['mark_cgpa_percenatge'])) echo $qualpg2_details[0]['mark_cgpa_percenatge'];?>" id="pg2_p_cgpa" name="pg2_p_cgpa" placeholder="%" style="width: 158px;" type="text">
                                                                                   <?php 
                                                                                      if(empty($qualpg2_details[0]['marks_perc_type']))
                                                                                      {?>
                                                                                        <div id="nor_cgpa5">
                                                                                        <div>  

                                                                                     <?php }
                                                                                      else
                                                                                      { if($qualpg2_details[0]['marks_perc_type']=='Cgpa') { ?>
                                                                                        <div id="nor_cgpa5">
                                                                                            <div id="add_nor_cgpa5" style="margin-top: 13px;">
                                                                                                <label>Out of CGPA</label>
                                                                                                <select id="out_of_cgpa5"  onchange="calculate_normal5()" name="out_of_cgpa5" class="form-select">
                                                                                                <option value="<?php if(!empty($qualpg2_details[0]['out_of_cgpa'])) { echo $qualpg2_details[0]['out_of_cgpa']; } ?>"><?php if(!empty($qualpg2_details[0]['out_of_cgpa'])) { echo $qualpg2_details[0]['out_of_cgpa']; }?></option>
                                                                                                 <option value="1">1</option>
                                                                                                 <option value="2">2</option>
                                                                                                 <option value="3">3</option>
                                                                                                 <option value="4">4</option>
                                                                                                 <option value="5">5</option> 
                                                                                                 <option value="6">6</option>
                                                                                                 <option value="7">7</option>
                                                                                                 <option value="8">8</option>
                                                                                                 <option value="9">9</option>
                                                                                                 <option value="10">10</option>
                                                                                                </select>
                                                                                                <div id="inner_normal5"> 
                                                                                                    <div id="remove_normal5" style="margin-top: 15px;">
                                                                                                    <label>Normalize CGPA</label>
                                                                                                    <input id="normal5" name="normal5" maxlength="5" type="text" value="<?php if(!empty($qualpg2_details[0]['orginal_cgpa'])) echo $qualpg2_details[0]['orginal_cgpa'];?>" readonly></input>
                                                                                                </div>

                                                                                                </div>
                                                                                            </div>
                                                                                        <div> 

                                                                                      <?php } 
                                                                                      
                                                                                      ?>
                                                                                      
                                                                                      <div id="nor_cgpa5">
                                                                                        <div>  
                                                                                     <?php
                                                                                    }
                                                                                     ?> 
                                                                                <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('pg2_p_cgpa') ?> </div> <?php } ?>
                                                                                </td>
                                                                            </tr> 

                                                                         
                                                                        </tbody>
                                                                    </table>
                                                                    <h5>Note :<span style="color:red;"> All * are mandatory to fill</span></h5>
                                                                    <!-- <h5>Note :<span style="color:red;">For appearing - Upload from first semester upto previous semester marksheet</span> </h5> -->
                                                                    <h5>Note :<span style="color:red;">For passed out - Upload marksheet reflecting cumulative percentage/CGPA and passed division.</span> </h5>
                                                                    <h5>Note :<span style="color:red;">PG2 exam fields are optional, please enter the details of a Masters degree other than PG1 if any.</span></h5>
                                                                   
                                                                    
                                                                </div>

                                                            </div>
                                                           
                                                            <ul class="list-inline pull-right">
                                                               
                                                                <li><button type="button" class="default-btn next-step" id="btnbackpersonal">Back</button></li>
                                                                <li><button type="button" id="btn_qualification" class="btn btn-primary">Save & Next</button></li>
                                                            </ul>
                                                          </form>
                                                        </div>
                                                        <!-- second tab Qualification end -->
                                                        <!-- third tab Work Experience start -->
                                                        <div class="tab-pane" role="tabpanel" id="step3">
                                                            
                                                        <?php if($this->session->flashdata('experror')){?>
                                                            <div class="alert alert-danger alert-dismissible">
                                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                          <?php echo $this->session->flashdata('experror')?>
                                                            </div> 
                                                            <?php }?>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                            <?php if($this->session->flashdata('apply_success_education')){?>
                                                            <div class="alert alert-success alert-dismissible">
                                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                           <?php echo $this->session->flashdata('apply_success_education')?>
                                                            </div> 
                                                            <?php }?>
                                                            <?php  $attributes = array('class' => 'email', 'id' => 'w_details','name'=>'w_details','enctype'=>'multipart/form-data');
                                                            echo form_open('admission/phd/Adm_phd_personal_details/get_work_experience_detail', $attributes); ?>
                                                             <input id="pro_wrk_yes_no" name="pro_wrk_yes_no" type="hidden" value="<?php if(!empty($pro_work_yes_no)) { echo $pro_work_yes_no;}?>">
                                                            <h4 class="text-center" style="text-decoration: underline;">Work Experience</h4>
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                                    
                                                                <div class="form-group">
                                                                <h5> Do You have an work Experience? <span style="color:red;">*</span></h5>
                                                                </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="work_exp" name="work_exp">

                                                                        <?php if(!empty($application_details_ms[0]['work_expreince']))
                                                                        {  if($application_details_ms[0]['work_expreince']=='Yes')
                                                                            {?>
                                                                                     
                                                                                <option value="<?php echo $application_details_ms[0]['work_expreince']; ?>" <?php echo  set_select('work_exp', 'Yes'); ?>><?php echo $application_details_ms[0]['work_expreince']; ?></option>
                                                                                <option value="No" <?php echo  set_select('work_exp', 'No'); ?>>No</option>

                                                                            <?php }
                                                                            else 
                                                                            {?>
                                                                            
                                                                            <option value="<?php echo $application_details_ms[0]['work_expreince'];?>"  <?php echo  set_select('ug_percentage', 'Cgpa'); ?>><?php echo $application_details_ms[0]['work_expreince']; ?></option>
                                                                            <option value="Yes" <?php echo  set_select('work_exp', 'Yes'); ?>>Yes</option>
                                                                           
                                                                            <?php 
                                                                            }?>
                                                                        
                                                                        <?php }
                                                                        else 
                                                                        {?>
                                                                           <option value="">--Please Select --</option>
                                                                           <option value="No" <?php echo  set_select('work_exp', 'No')?>>No</option>
                                                                           <option value="Yes" <?php echo  set_select('work_exp', 'Yes')?>>Yes</option>
                                                                          

                                                                        <?php }?>
                                                                        
                                                                    </select>
                                                                    <?php if(validation_errors()){?>
                                                                        <div class ="myalert"><?php echo form_error('ug_p_cgpa') ?> </div>
                                                                    <?php } ?>
                                                                </div>
                                                                </div>
                                                            </div>
                                                           
                                                           
                                                              <table id="workexp"  class="table work_exp_h_s">
                                                                
                                                                <thead>
                                                                    <tr>
                                                                        <th>Position<span style="color:red;">*</span> </th>
                                                                        <th>Organization <span style="color:red;">*</span></th>
                                                                       
                                                                        <th>Duration(in months) <span style="color:red;">*</span></th>
                                                                        
                                                                        <!-- <th>From</th> 
                                                                        <th>To</th>    -->
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php  $sum_of_month=0;
                                                                       if(!empty($exp_details)){
                                                                           $single=$exp_details[0]['duration_in_month'];
                                                                           $sum_of_month+=$exp_details[0]['duration_in_month'];
                                                                       }
                                                                           
                                                                    ?>
                                                                    <tr>
                                                                       <td data-column="Designation">
                                                                           <input id="degination1" name="degination1" value="<?php echo set_value('degination1');?><?php if(!empty($exp_details[0]['designation_no'])) echo $exp_details[0]['designation_no']; ?>"  type="text" class="form-control" placeholder="Position" maxlength="199">
                                                                           <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('degination1') ?> </div> <?php } ?>
                                                                       </td>
                                                                       <td data-column="organization">
                                                                           <input  id="organization1" name="organization1" value="<?php echo set_value('organization1')?><?php if(!empty($exp_details[0]['designation_organistion'])) echo $exp_details[0]['designation_organistion'];?>" type="text" class="form-control"  placeholder="1st Organisation " maxlength="199">
                                                                           <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('organization1')?> </div> <?php } ?>
                                                                       </td>
                                                                      
                                                                       <td data-column="Duration(in month)">
                                                                           <input  id="duration1" name="duration1" type="number"  value="<?php if(!empty($exp_details[0]['duration_in_month'])) echo trim($exp_details[0]['duration_in_month']);?><?php echo set_value('duration1');?>" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" onchange="get_month(this.id)" class="form-control">
                                                                           <input  id="firstd" name="firstd" type="hidden" value="0"><input  id="secondd" name="secondd" type="hidden" value="<?php if (!empty($exp_details[0]['duration_in_month'])) { echo $exp_details[0]['duration_in_month'];} else { echo "0";} ?> ">
                                                                           <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('duration1') ?> </div> <?php } ?>
                                                                       </td>
                                                             
                                                                       <!-- <td data-column="From"><input id="from1" name="from1"  type="date" class="form-control"></td>
                                                                       <td data-column="To"><input id="to1" name="to1"  type="date" class="form-control"></td> -->
                                                                    </tr>

                                                                    <?php  
                                                                        $x=0;
                                                                       
                                                                        if(!empty($exp_details_d))
                                                                        {   
                                                                            foreach ($exp_details_d as $value) {
                                                                                $sum_of_month+=$value['duration_in_month'];
                                                                                                  
                                                                            ?>
                                                                         
                                                                            <tr id="row<?php echo $value['id'];?>">
                                                                                <td>
                                                                                    <input class="valdegination form-control" value="<?php if(!empty($value['designation_no'])){ echo $value['designation_no'];} ?>" onkeypress="return IsSpecificSpecialCharacter(event);" id="degination1<?php echo $x;?>" name="degination[]" type="text" class="form-control" placeholder="Designation " required maxlength="199">
                                                                                </td>
                                                                                <td>
                                                                                    <input class="valorganization form-control" value="<?php if(!empty($value['designation_organistion'])){ echo $value['designation_organistion'];} ?>" onkeypress="return IsSpecificSpecialCharacter(event);" id="organization<?php echo $x;?>" name="organization[]" type="text" class="form-control"  placeholder="Organisation " required maxlength="199">
                                                                                </td>
                                                                               
                                                                                <td>
                                                                                   <input class="valduration1 form-control"  name="duration_in_monthd[]"  value="<?php if(!empty($value['duration_in_month'])){ echo $value['duration_in_month'];}?>" onkeypress="return acceptnumber(event)" id="duration1<?php echo $x;?>" onchange="editget_month_d(this.id,<?php echo $value['id'];?>)"  type="text" class="form-control" maxlength="2" required maxlength="199">
                                                                                    <input  id="editfirstt<?php echo $value['id'];?>" name="editfirstt<?php echo $value['id'];?>" type="hidden" value="0">
                                                                                    <input  id="editsecondt<?php echo $value['id'];?>" name="editsecondt<?php echo $value['id'];?>" type="hidden" value="<?php if(!empty($value['duration_in_month'])){ echo $value['duration_in_month'];} ?>">
                                                                                    <button class="btn-danger" type="button" name="<?php echo $value['id'];?>" onclick="display_work(this.id)"  id="worke<?php echo $value['id'];?>" >Remove</button>
                                                                                </td>
                                                                                
                                                                            </tr>
                                                                          <?php  $x++; } }?> 

                                                                    </tbody>
                                                                </table>
                                                                <input type="hidden"  id="countexp"  name="countexp"  value="">
                                                                <input type="hidden"  id="tab_id"  name="tab_id"  value="<?php echo $tab ;?>">
                                                               <div> <input type="button" id="addexp"  name="addmore" value="Add More" style="float:right; margin-top: 9px;" class="btn btn-primary btn-sm work_exp_h_s"></div>
                                                                <div class="work_exp_h_s"><center>Total Experince in month:<input type="text" id="sum_of_month" name="sum_of_month" value="<?php if(!empty($sum_of_month)){ echo $sum_of_month;} else {echo "0";} ?>" readonly/></center></div>
                                                            </div>
                                                        </div>
                                                        <ul class="list-inline pull-right">
                                                            <li><button type="button" class="default-btn next-step" id="btnbackeducation">Back</button></li>
                                                            <!-- <li><button type="button" class="default-btn next-step skip-btn">Skip</button></li> -->
                                                            <li><button type="button" id="btn_work_experince" class="btn btn-secondary">Save</button></li>
                                                            <li><button type="button" name="fianl_submit" value="final_submit" id="btn_work_experince_f" class="btn btn-primary">Final Submit</button></li>
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
                            
                        </div> <!-- panel body end  -->
                    </div>  <!-- panel end  -->
                    <!--end  -->
                </div><!--home col-md-12 end  -->
            </div><!--home row end  -->
        </div><!--home end  -->
    </div><!--row col-md-8 end  -->
    <div  class="col-sm-2 col-md-2 col-lg-2"> <!--row col-md-2 start  -->
        <div class="notice"> <!--notice start  -->
            <div class="row">
                <div class="col-md-12">
                    <!--start  -->
                    <div class="panel panel-primary news_back">
                        <div class="panel-heading">Applicant home
                        </div>
                        <div class="panel-body">
                        <input class="btn btn-info" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/phd/Adm_phd_applicant_home'" value="Back applicant home" />
                        </div>
                    </div>
                    <!--end  -->
                </div>
            </div>
        </div><!--notice end -->
    </div> <!--row col-md-2 end  -->
</div><!--row start  -->
<!-- <script type="text/javascript" src="<?php echo base_url();?>themes/dist/js/phd/adm_phd_education.js"></script>  -->
<script type="text/javascript" src="<?php echo base_url();?>themes/dist/js/phd/adm_phd_personal_detail.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url();?>themes/dist/js/phd/adm_phd_education.js"></script>  -->
<script type="text/javascript">
//  $("#btechyes").hide();
//  $("#hide_yes_no_gate").hide();
   
  $(document).ready(function (e)
   { 

    var tabbb = $("#tab_id").val();
    
    });

$(document).ready(function() 
{
    $("#same_p_c_add").click(function()
    {
        if (this.checked) 
        { 
        $("#p_line1").val($("#c_line1").val());
        $("#p_line2").val($("#c_line2").val());
        $("#p_line3").val($("#c_line3").val());
        $("#p_city").val($("#c_city").val());
        $("#p_state").val($("#c_state").val());
        $("#p_pincode").val($("#c_pincode").val());
        $("#p_country").val($("#c_country").val());                       
        }
        else 
        {
        $("#p_line1").val('');
        $("#p_line2").val('');
        $("#p_line3").val('');
        $("#p_city").val('');
        $("#p_state").val('');
        $("#p_pincode").val('');
        // $("#p_country").val('');            
        } 

    });
   
});












</script>
 
</script>







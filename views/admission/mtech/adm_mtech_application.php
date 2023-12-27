<link href="<?php echo base_url();?>themes/dist/css/mtech/adm_mtech_personal_details.css" rel="stylesheet" media="screen">
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
                        <div class="panel-heading">Please fill yopur application detail
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
                                                            <a href="#" data-toggle="tab" aria-controls="step3" role="tab" aria-expanded="false"><span class="round-tab">WE</span> <i>Work Experience</i></a>
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
                                                            echo form_open('admission/mtech/Adm_mtech_personal_details/get_personal_details', $attributes); ?>
                                                                <div class="row">
                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Applicant's Name:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="application_no" type="text" name="application_no" class="form-control" value=" <?php if(!empty($registration_detail)) { echo $registration_detail[0]->first_name." ".$registration_detail[0]->middle_name." ".$registration_detail[0]->last_name ;}?>"  readonly>
                                                                                <input id="app_type_p" name="app_type_p" type="hidden" value="<?php if(!empty($candidate_type)) { echo $candidate_type;}?>">
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
                                                                            <label>Guardian Mobile Number: <span style="color:red;">*</span></label>
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
                                                                            <label>Relationship of Parent/Guardian: <span style="color:red;">*</span></label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input  id="parent_relation" name="parent_relation" value="<?php echo set_value('parent_relation');?><?php if(!empty($application_details_ms[0]['guardian_realtion'])){ echo $application_details_ms[0]['guardian_realtion'];}?>" onkeypress="return IsSpecificSpecialCharacter(event);"  onkeyup="capital(this.id)" type="text" class="form-control" placeholder="Enter Relationship of Parent/Guardian" maxlength="49">
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
                                                                            <label>Divyang(PWD):</label>
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
                                                                            <label>Marital Status <span style="color:red;">*</span></label>
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
                                                                                    
                                                                                    <option value=""> Please Select Marital Status</option>
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
                                                                                <input id="department" name="department" type="text"  value ="<?php if(!empty($registration_detail)) { echo $registration_detail[0]->appl_type ;}?>" class="form-control" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                            
                                                                   
                                                                            
                                                                            
                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Course:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="course" name="course" value ="M.TECH" type="text" maxlength="8"class="form-control" readonly>
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
                                                                     
                                                            

                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label>Correspondence Address:<span style="color:red;">*</span></label>
                                                                                    <p><span style="color:red;">*Line1 Address,City And District,State,Pincode are mandatory</span></p>
                                                                                    
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
                                                                                        <input  onkeypress="return IsSpecificSpecialCharacter(event);" value="<?php echo set_value('c_city')?><?php if(!empty($c_addr_details[0]->city)){ echo $c_addr_details[0]->city;}?>"  id="c_city" name="c_city" type="text" class="form-control"  placeholder="Enter City And District " maxlength="49">
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
                                                                                    <p><span style="color:red;">* Line1 Address,City And District,State,Pincode are mandatory</span></p>
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
                                                                
                                                                <p><span style="color:red;">NOTE: No special characters allowed in address</span></p>
                                                                        
                                                                <div class='row'>
                                                                   <div class="col-md-12 col-sm-12 col-lg-12">
                                                                       
                                                                                

                                                                      <table id="table_programme" class=".table-sm table-responsive">
                                                                            <thead>
                                                                                <tr> 
                                                                                    <th style="font-size: 10px;">Preference No</th>
                                                                                   
                                                                                    <th style="font-size: 10px;">Programme Applying</th>
                                                                                    <th style="font-size: 10px;">Qualifying Degree</th>
                                                                                    <th style="font-size: 10px;">Mathematics and statistics as subject</th>
                                                                                    <th style="font-size: 10px;">Two year Work Experince</th>
                                                                                   
                                                                                    
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php  
                                                                                $i=1;
                                                                                foreach($fill_appl_details as $row){ ?>
                                                                                    <tr>
                                                                                        <td><?php echo $i;?> </td>
                                                                                        
                                                                                        <td class="valprog"><?php echo $row->program_desc;?>(<?php echo $row->program_id;?>)</td>
                                                                                        <td><?php echo $this->Add_mtech_registration_model->get_degree_desc_by_program_id($row->degree_id);?></td>
                                                                                        <td><?php if($row->sub_math_12th=='Y'){ echo "Required"; } else { echo "Not Required"; }?></td>
                                                                                        <td><?php if($row->non_min_work_exp=='Y'){ echo "Required"; } else { echo "Not Required"; } ?></td>
                                                                                        
                                                                                    
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
                                                            <h4 class="text-center" style="text-decoration: underline;">Qualification</h4>
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
                                                             echo form_open('admission/mtech/Adm_mtech_personal_details/get_education_detail', $attributes); ?>
                                                             <input id="app_type_e" name="app_type_e" type="hidden" value="<?php if(!empty($candidate_type)) { echo $candidate_type;}?>">
                                                             <input id="cfti_yes_no" name="cfti_yes_no" type="hidden" value="<?php if(!empty($cfti_yes)) { echo $cfti_yes;}?>">
                                                            
                                                             <?php if(!empty($candidate_type))
                                                            {
                                                            if($candidate_type=='IIT Graduates')
                                                            {?>
                                                            <div id="">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <p> Enter name of IIT <span style="color:red;">*</span></p>
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
                                                                </div>
                                                            </div>
                                                            <?php }
                                                                    
                                                            } ?>

                                                            
                                                            <?php if(!empty($candidate_type))
                                                            {
                                                              if($candidate_type=='GATE Candidates' OR $cfti_yes=='No')
                                                              {?>
                                                             
                                                             <div id="">
                                                            
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                      <!-- <p> Enter your Gate Registration Number</p> -->
                                                                    </div>
                                                                    <div class="col-md-4  col-sm-4 col-lg-4">
                                                                       <div class="form-group">
                                                                            <!-- <label for="sel1">Select list:</label> -->
   
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            
                                                                <div class="row">
                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Enter your Gate Registration Number:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input type="text" class="form-control" value="<?php if(!empty($gate_details)) { echo $gate_details[0]->gate_reg_no;}?>" id="gate_reg_no" name="gate_reg_no" maxlength="13">
                                                                                <?php if(validation_errors()){?>
                                                                                <div class ="myalert">
                                                                                <?php echo form_error('gate_reg_no') ?>
                                                                                </div>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Re-enter your Gate Registration Number:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input type="text" class="form-control"  value="<?php if(!empty($gate_details)) { echo $gate_details[0]->gate_reg_no;}?>" id="gate_reg_no_re" name="gate_reg_no_re" maxlength="13">
                                                                                <?php if(validation_errors()){?>
                                                                                <div class ="myalert">
                                                                                <?php echo form_error('gate_reg_no_re') ?>
                                                                                </div>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                   <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Gate Score:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="gate_score" name="gate_score" value="<?php if(!empty($gate_details)) { echo $gate_details[0]->gate_score;}?>" type="text" class="form-control" placeholder="Enter Gate Score" maxlength="4">
                                                                                <?php if(validation_errors()){?>
                                                                                <div class ="myalert">
                                                                                <?php echo form_error('gate_score') ?>
                                                                                </div>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6  col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Gate year of passing:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <?php 
                                                                                 if(!empty($gate_details[0]->year_pass))
                                                                                 {?>
                                                                                       <input id="gate_y_passing" name="gate_y_passing" type="text" value="<?php if(!empty($gate_details)) { echo $gate_details[0]->year_pass;}?>" class="form-control"  placeholder="Enter Gate year of passing">
                                                                                 <?php }
                                                                                 else { ?>
                                                                                    <select class="form-control" id="gate_y_passing" name="gate_y_passing">
                                                                                    <option value="">--Please Select --</option>
                                                                                    <option value="2020">2020</option>
                                                                                    <option value="2021">2021</option>
                                                                                    <option value="2022">2022</option>
                                                                                    </select>
                                                                                 <?php }
                                                                                ?>
                                                                               
                                                                                


                                                                                <?php if(validation_errors()){?>
                                                                                <div class ="myalert">
                                                                                <?php echo form_error('gate_y_passing') ?>
                                                                                </div>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6  col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Score card valid upto:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="gate_score_valid" name="gate_score_valid" value="<?php if(!empty($gate_details)) { echo $gate_details[0]->valid_upto;}?>"  type="text" class="form-control" readonly>
                                                                                <?php if(validation_errors()){?>
                                                                                <div class ="myalert">
                                                                                <?php echo form_error('gate_score_valid') ?>
                                                                                </div>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- <div class="col-md-6  col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Result status in qualifying degree:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="gate_result_status" name="gate_result_status" value="<?php if(!empty($gate_details)) { echo $gate_details[0]->gate_result_status;}?>" type="text" class="form-control" placeholder="">
                                                                                <?php if(validation_errors()){?>
                                                                                <div class ="myalert">
                                                                                <?php echo form_error('gate_result_status') ?>
                                                                                </div>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div> -->
                                                                </div>
                                                             </div>
                                                             <?php }
                                                                    
                                                            } ?>

                                                           
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                                                        
                                                                    <h5 class="text-center" style="text-decoration: underline;">Academic Details</h5>
                                                                    <h5>Note :<span style="color:red;"> All * are mandatory to fill</span></h5>
                                                                    <h5>Note :<span style="color:red;">For appearing - Upload previous semester marksheet</span> </h5>
                                                                    <h5>Note :<span style="color:red;">For passed out - Upload marksheet reflecting cumulative percentage/CGPA and passed division.</span> </h5>
                                                                    <h5><span style="color:red;">"All appearing student has to give tentative year of passing and marks % or CGPA upto last semester."</span> </h5>

                                                                    <h5><span style="color:red;font-size:20px;"><strong>"Please Enter correct discipline for UG Exam not NA. EX-Mechanical,electrical,BSC etc."</strong></span> </h5>
                                                                    <table id="qual" class="table-responsive">
                                                                        <thead>
                                                                            <tr> 
                                                                                <th>Exam Type<span style="color:red;">*</span></th>
                                                                                <th>Name of Exam <span style="color:red;">*</span></th>
                                                                                <th>Discipline <span style="color:red;">*</span></th>
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
                                                                                <select  id="examtype10" name="examtype10">
                                                                                
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
                                                                                   <input id="discipline10" name="discipline10" type="text" value="<?php if(!empty($qual10_details)) { echo $qual10_details[0]['discipline']; } else { echo "NA" ;}?><?php echo set_value('discipline10')?>" maxlength="99" readonly>
                                                                                   <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('discipline10') ?> </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="Institute/university name">

                                                                                <input id="Institute_exam10" name="Institute_exam10" type="text" value="<?php if(!empty($qual10_details)) echo $qual10_details[0]['institue_name'];?><?php echo set_value('Institute_exam10')?>" placeholder="Institute/university name" maxlength="49">

                                                                                <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('Institute_exam10') ?> </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="result Status">
                                                                                    <select  id="10passed" name="10passed" >
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

                                                                                    <select  onchange="percentage_10cgpa(this.value)" id="10percentage" name="10percentage">

                                                                                        <?php if(!empty($qual10_details[0]['marks_perc_type']))
                                                                                    {  if($qual10_details[0]['marks_perc_type']=='Percentage')
                                                                                        {?>
                                                                                                <option value="<?php echo $qual10_details[0]['marks_perc_type']; ?>" <?php echo set_select('10percentage', 'Percentage')?>><?php echo $qual10_details[0]['marks_perc_type']; ?></option>
                                                                                            <option  value="Cgpa" <?php echo set_select('10percentage', 'Cgpa'); ?>>Cgpa</option>
                                                                                        <?php }
                                                                                        else 
                                                                                        {?>
                                                                                            <option value="<?php echo $qual10_details[0]['marks_perc_type']; ?>" <?php echo set_select('10percentage', 'Percentage')?>><?php echo $qual10_details[0]['marks_perc_type']; ?></option>
                                                                                            <option value="Percentage" <?php echo set_select('10percentage', 'Percentage'); ?>>Percentage </option>
                                                                                        <?php 
                                                                                        }?>
                                                                                    
                                                                                    <?php }
                                                                                    else 
                                                                                        {?>
                                                                                        <option value="Percentage" <?php echo set_select('10percentage', 'Percentage'); ?>>Percentage </option>
                                                                                        <option  value="Cgpa" <?php echo set_select('10percentage', 'Cgpa'); ?>>Cgpa</option>
                                                                                        <?php }?>
                                                                                    
                                                                                    </select>
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('10percentage')?></div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="year of passing">
                                                                                    <input onchange="year_check(this.id)" value="<?php echo set_value('10_y_pass')?><?php if(!empty($qual10_details[0]['year_of_passing'])) echo $qual10_details[0]['year_of_passing'];?>" maxlength="4" id="10_y_pass" name="10_y_pass" style="width: 71%;"  type="text">
                                                                                    <input value="<?php if(!empty($qual10_details[0]['id'])) echo $qual10_details[0]['id'];?>" maxlength="4" id="10_y_pass_" name="10_y_pass_"  type="hidden">
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('10_y_pass') ?></div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="percentage/CGPA">
                                                                                    <input onchange="validate_cgpa(this.id,'10percentage');" id="10_p_cgpa" name="10_p_cgpa"  style="width: 71%;" value="<?php echo set_value('10_p_cgpa')?><?php if(!empty($qual10_details[0]['mark_cgpa_percenatge'])) {echo $qual10_details[0]['mark_cgpa_percenatge'];}?>"  maxlength="5"  placeholder="%" type="text">
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('10_p_cgpa') ?></div> <?php } ?>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td data-column="Exam type"> 
                                                                                    <select  id="examtype12" name="examtype12">

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
                                                                                    <input id="discipline12" name="discipline12" type="text"  value="<?php if(!empty($qual12_details[0]['discipline'])){ echo $qual12_details[0]['discipline']; } else { echo "NA"; } ?>" maxlength="99" readonly>
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('discipline12') ?> </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="Institute/university name">
                                                                                <input id="Institute12" name="Institute12" type="text"  value="<?php echo set_value('Institute12'); ?><?php if(!empty($qual12_details[0]['institue_name'])){ echo $qual12_details[0]['institue_name'];} ?>" placeholder="Institute/university name" maxlength="49">
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('Institute12') ?> </div> <?php } ?>
                                                                                </td>
                                                                                <td data-column="result Status">
                                                                                    <select  id="12passed" name="12passed">
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
                                                                                    <select   onchange="percentage_12cgpa(this.value)"  id="12percentage"  value="<?php echo set_value('12percentage'); ?>" name="12percentage">
                                                                                    
                                                                                    <?php if(!empty($qual12_details))
                                                                                    {  if($qual12_details[0]['marks_perc_type']=='Percentage')
                                                                                        {?>
                                                                                                

                                                                                                <option value="<?php echo $qual12_details[0]['marks_perc_type'];?>" <?php echo  set_select('12percentage', 'Percentage');?>><?php echo $qual12_details[0]['marks_perc_type'];?></option>
                                                                                                <option value="Cgpa" <?php echo  set_select('12percentage', 'Cgpa');?>>Cgpa</option>
                                                                                        <?php }
                                                                                        else 
                                                                                        {?>
                                                                                            
                                                                                            <option value="<?php echo $qual12_details[0]['marks_perc_type']; ?>"<?php echo  set_select('12percentage', 'Cgpa');?>><?php echo $qual12_details[0]['marks_perc_type'];?></option>
                                                                                            <option value="Percentage" <?php echo  set_select('12percentage', 'Percentage'); ?>>Percentage</option>
                                                                                            
                                                                                        <?php 
                                                                                        }?>
                                                                                    
                                                                                    <?php }
                                                                                    else 
                                                                                        {?>
                                                                                        <option value="Percentage" <?php echo  set_select('12percentage', 'Percentage'); ?>>Percentage</option>
                                                                                        <option value="Cgpa" <?php echo  set_select('12percentage', 'Cgpa'); ?>>Cgpa</option>
                                                                                        <?php }?>
                                                                                    

                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('12percentage') ?> </div> <?php } ?>
                                                                            </td>

                                                                                <td data-column="year of passing">
                                                                                    <input onchange="year_check(this.id)"  value="<?php echo set_value('12_y_pass');?><?php if(!empty($qual12_details[0]['year_of_passing'])){ echo $qual12_details[0]['year_of_passing'];} ?>" maxlength="4" id="12_y_pass" name="12_y_pass"  style="width: 71%;" type="text">
                                                                                    <input  value="<?php if(!empty($qual12_details[0]['id'])){ echo $qual12_details[0]['id'];} ?>" id="12_y_pass_" name="12_y_pass_" type="hidden">
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('12_y_pass') ?>  </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="percentage/CGPA">
                                                                                <input  onchange="validate_cgpa(this.id,'12percentage');"  value="<?php echo set_value('12_p_cgpa');?><?php if(!empty($qual12_details[0]['mark_cgpa_percenatge'])){ echo $qual12_details[0]['mark_cgpa_percenatge'];} ?>" maxlength="5" id="12_p_cgpa" placeholder="%" name="12_p_cgpa" style="width: 71%;" type="text">
                                                                                <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('12_p_cgpa') ?> </div> <?php } ?>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td data-column="Exam type"> 
                                                                                    <select  id="examtypeug" name="examtypeug">
                                                                                        
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

                                                                                <td data-column="Institute/university name">
                                                                                    <input id="Institute_examug"  value="<?php echo set_value('Institute_examug');?><?php  if(!empty($qualug_details[0]['institue_name'])) echo $qualug_details[0]['institue_name'];?>" name="Institute_examug" type="text" placeholder="Institute/university name" maxlength="49">
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('Institute_examug') ?>  </div> <?php } ?>
                                                                                </td>

                                                                                <td data-column="result Status">
                                                                                    <select  id="ug_appearing" name="ug_appearing">
                                                                                    <?php if(!empty($qual12_details[0]['result_status']))
                                                                                    {  if($qual12_details[0]['result_status']=='Passed')
                                                                                        {?>
                                                                                                
                                                                                                <option value="<?php  if(!empty($qualug_details[0]['result_status'])) echo $qualug_details[0]['result_status']; ?>" <?php echo  set_select('ug_appearing', 'Passed'); ?>><?php  if(!empty($qualug_details[0]['result_status']))  echo $qualug_details[0]['result_status']; ?></option>
                                                                                                <option value="Appearing" <?php echo  set_select('ug_appearing', 'Appearing'); ?>>Appearing</option>
                                                                                                
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
                                                                                        <option value="Appearing" <?php echo  set_select('ug_appearing', 'Appearing'); ?>>Appearing</option>
                                                                                        <?php }?>
                                                                                    
                                                                                

                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('ug_appearing') ?>  </div> <?php } ?>
                                                                                </td>
                                                                                <td data-column="marks System">
                                                                                    <select  onchange="percentage_ugcgpa(this.value)" id="ug_percentage" name="ug_percentage">


                                                                                    <?php  if(!empty($qualug_details))
                                                                                    {  if($qualug_details[0]['marks_perc_type']=='Percentage')
                                                                                        {?>
                                                                                                
                                                                                            <option value="<?php if (!empty($qualug_details[0]['marks_perc_type'])) {echo $qualug_details[0]['marks_perc_type']; }?>"  <?php echo  set_select('ug_percentage', 'Percentage'); ?>><?php if (!empty($qualug_details[0]['marks_perc_type'])){ echo $qualug_details[0]['marks_perc_type']; } ?></option>
                                                                                            <option value="Cgpa"  <?php echo  set_select('ug_percentage', 'Cgpa'); ?>>Cgpa</option>

                                                                                        <?php }
                                                                                        else 
                                                                                        {?>
                                                                                            
                                                                                            <option value="<?php if(!empty($qualug_details[0]['marks_perc_type'])) { echo $qualug_details[0]['marks_perc_type']; }?>"  <?php echo  set_select('ug_percentage', 'Cgpa'); ?>><?php if(!empty($qualug_details[0]['marks_perc_type'])) { echo $qualug_details[0]['marks_perc_type']; }?></option>
                                                                                            <option value="Percentage"  <?php echo  set_select('ug_percentage', 'Percentage'); ?>>Percentage</option>
                                                                                        <?php 
                                                                                        }?>
                                                                                    
                                                                                    <?php }
                                                                                    else 
                                                                                        {?>
                                                                                        <option value="Percentage"  <?php echo  set_select('ug_percentage', 'Percentage'); ?>>Percentage</option>
                                                                                        <option value="Cgpa"  <?php echo  set_select('ug_percentage', 'Cgpa'); ?>>Cgpa</option>
                                                                                        <?php }?>
                                                                                    
                                                                                    </select>
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('ug_percentage') ?> </div> <?php } ?>
                                                                                </td>
                                                                                <td data-column="year of passing">
                                                                                    <input onchange="year_checkug(this.id,'ug_appearing')"  value="<?php echo set_value('ug_y_passing');?><?php if(!empty($qualug_details[0]['year_of_passing'])) echo $qualug_details[0]['year_of_passing'];?>" maxlength="4" id="ug_y_passing" name="ug_y_passing" style="width: 71%;"  type="text">
                                                                                    <input  value="<?php if(!empty($qualug_details[0]['id'])) echo $qualug_details[0]['id'];?>" maxlength="4" id="ug_y_passing_" name="ug_y_passing_"type="hidden">
                                                                                    <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('ug_y_passing') ?> </div> <?php } ?>
                                                                                </td>
                                                                                <td data-column="percentage/CGPA">
                                                                                <input onchange="validate_cgpa(this.id,'ug_percentage');" maxlength="5"  value="<?php echo set_value('ug_p_cgpa');?><?php if(!empty($qualug_details[0]['mark_cgpa_percenatge'])) echo $qualug_details[0]['mark_cgpa_percenatge'];?>" id="ug_p_cgpa" name="ug_p_cgpa" placeholder="%" style="width: 71%;"  type="text">
                                                                                <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('ug_p_cgpa') ?> </div> <?php } ?>
                                                                                </td>
                                                                            </tr>


                                                                            <?php  
                                                                            $x=0;
                                                                        
                                                                            if(!empty($pg_details))
                                                                            {    
                                                                                foreach ($pg_details as $value) {
                                                                                
                                                                                                    
                                                                                ?>
                                                                            
                                                                            <tr id="row<?php echo $x;?>">
                                                                            <td>
                                                                                <select class="pgexamtype" onkeypress="return IsSpecificSpecialCharacter(event);"  id="examtypepg<?php echo $x;?>" name="examtypepg[]"  required>
                                                                            
                                                                                <?php if(!empty($value['exam_type']))
                                                                                        { ?>
                                                                                            <option value="<?php echo $value['exam_type']; ?>"  <?php echo  set_select('examtypeug', 'UG Exam'); ?>><?php echo $value['exam_type']; ?></option>
                                                                                        <?php }
                                                                                    ?>
                                                                                        
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input  onkeypress="return IsSpecificSpecialCharacter(event);"  value="<?php echo set_value("name_of_pgexam[$x]"); ?><?php echo $value['exam_name']; ?>" id="name_of_pgexam<?php echo $x;?>" name="name_of_pgexam[]" type="text" placeholder="PG Exam Name" class="namepgexam" required maxlength="49">
                                                                                <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error("name_of_pgexam[$x]"); ?> </div> <?php } ?>
                                                                            </td> 

                                                                            <td>
                                                                                <input  onkeypress="return IsSpecificSpecialCharacter(event);"  value="<?php echo set_value("discipline[$x]"); ?><?php echo $value['discipline']; ?>" id="disciplinepg<?php echo $x;?>" name="disciplinepg[]" type="text" placeholder="Enter PG discipline" class="disciplinepg" required maxlength="99">
                                                                                <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error("disciplinepg[$x]"); ?> </div> <?php } ?>
                                                                            </td> 
                                                                            <td>
                                                                                <input  onkeypress="return IsSpecificSpecialCharacter(event);"  id="Institute_examug<?php echo $x;?>" value="<?php echo $value['institue_name']; ?>" class="insti_exampg" name="Institute_exampg[]" type="text" placeholder="Institute/university name" required maxlength="49">
                                                                            </td>
                                                                            <td>
                                                                                <select class="pg_appear" id="pg_appearing<?php echo $x;?>" name="pg_appearing[]" required>
                                                                                
                                                                                <?php if(!empty($value['result_status']))
                                                                                    {  if($value['result_status']=='Passed')
                                                                                        {?>
                                                                                                
                                                                                                <option value="<?php echo $value['result_status']; ?>" <?php echo  set_select('ug_appearing', 'Passed'); ?>><?php echo $value['result_status']; ?></option>
                                                                                                <option value="Appearing" <?php echo  set_select('pg_appearing', 'Appearing'); ?>>Appearing</option>
                                                                                                
                                                                                        <?php }
                                                                                        else 
                                                                                        {?>
                                                                                        
                                                                                            <option value="<?php echo $value['result_status']; ?>" <?php echo  set_select('ug_appearing', 'Appearing'); ?>><?php echo $value['result_status']; ?></option>
                                                                                            <option value="Passed" <?php echo  set_select('pg_appearing', 'Passed'); ?>>Passed</option>  
                                                                                        <?php 
                                                                                        }?>
                                                                                    
                                                                                    <?php }
                                                                                    
                                                                                        ?>
                                                                                        
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select onchange="percentage_pgcgpa(this.id,<?php echo $x;?>)" class="pg_pertage" id="pg_percentage<?php echo $x;?>" name="pg_percentage[]" required>
                                                                                <?php if(!empty($value['marks_perc_type']))
                                                                                    {  if($value['marks_perc_type']=='Percentage')
                                                                                        {?>
                                                                                                
                                                                                            <option value="<?php echo $value['marks_perc_type']; ?>"  <?php echo  set_select('pg_percentage', 'Percentage'); ?>><?php echo $value['marks_perc_type']; ?></option>
                                                                                            <option value="Cgpa"  <?php echo  set_select('pg_percentage', 'Cgpa'); ?>>Cgpa</option>

                                                                                        <?php }
                                                                                        else 
                                                                                        {?>
                                                                                            
                                                                                            <option value="<?php echo $value['marks_perc_type']; ?>"  <?php echo  set_select('pg_percentage', 'Cgpa'); ?>><?php echo $value['marks_perc_type']; ?></option>
                                                                                            <option value="Percentage"  <?php echo  set_select('pg_percentage', 'Percentage'); ?>>Percentage</option>
                                                                                        <?php 
                                                                                        }?>
                                                                                    
                                                                                    <?php } ?>
                                                                                    
                                                                                

                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input  onkeypress="return acceptnumber(event)" class="pg_y_pass"  value="<?php echo $value['year_of_passing']; ?>" id="pg_y_passing<?php echo $x;?>" maxlength="5" name="pg_y_passing[]"  type="text" style="width: 71%;" onchange="year_checkpg(this.id,<?php echo $x;?>)">
                                                                                <input  class="pg_y_pass"  value="<?php echo $value['id']; ?>" id="pg_y_passing_<?php echo $x;?>" name="pg_y_passing_[]"  type="hidden">
                                                                            </td>
                                                                            <td>
                                                                                <input  onchange="validate_cgpad(this.id,<?php echo $x;?>);" class="pg_per_cgpa" value="<?php echo $value['mark_cgpa_percenatge']; ?>"  maxlength="4" id="pg_p_cgpa<?php echo $x;?>" name="pg_p_cgpa[]" type="text" style="width: 71%;"  placeholder="%" required><br>
                                                                                <button class="btn-danger ram" name="<?php echo $value['id'];?>" type="button" onclick="display_view(this.id)" id="qual<?php echo $value['id'];?>">Remove</button>
                                                                            </td>
                                                                            </tr>
                                                                            <?php  $x++; } }?> 

                                                                            
                                                                            <?php if(!empty($dy)) { if(validation_errors()){?><div class ="myalert"><?php echo "ERROR:please input All filed of dynamic row which is mandatory."; ?>  </div> <?php } }?>
                                                                        </tbody>
                                                                    </table>
                                                                    <input type="hidden"  id="countqual"  name="countqual"  value="">
                                                                    <input type="button"  id="addqual"  name="addmore"  value="Add More" style="float:right; margin-top: -40px;" class="btn btn-primary btn-sm">
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
                                                            echo form_open('admission/mtech/Adm_mtech_personal_details/get_work_experience_detail', $attributes); ?>
                                                             <input id="pro_wrk_yes_no" name="pro_wrk_yes_no" type="hidden" value="<?php if(!empty($pro_work_yes_no)) { echo $pro_work_yes_no;}?>">
                                                            <h4 class="text-center" style="text-decoration: underline;">Work Experience</h4>

                                                            <h5 class="">Work Experience is not needed for GATE candidate</h5>
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
                                                           
                                                           
                                                              <table id="workexp"  class="table-responsive work_exp_h_s">
                                                                
                                                                <thead>
                                                                    <tr>
                                                                        <th>Designation <span style="color:red;">*</span> </th>
                                                                        <th>Organization <span style="color:red;">*</span></th>
                                                                        <th>Nature of work <span style="color:red;">*</span></th>
                                                                        <th>Duration(in months) <span style="color:red;">*</span></th>
                                                                        <th>Sector <span style="color:red;">*</span></th> 
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
                                                                           <input id="degination1" name="degination1" value="<?php echo set_value('degination1');?><?php if(!empty($exp_details[0]['designation_no'])) echo $exp_details[0]['designation_no']; ?>"  type="text" class="form-control" placeholder="1st Designation " maxlength="199">
                                                                           <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('degination1') ?> </div> <?php } ?>
                                                                       </td>
                                                                       <td data-column="organization">
                                                                           <input  id="organization1" name="organization1" value="<?php echo set_value('organization1')?><?php if(!empty($exp_details[0]['designation_organistion'])) echo $exp_details[0]['designation_organistion'];?>" type="text" class="form-control"  placeholder="1st Organisation " maxlength="199">
                                                                           <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('organization1')?> </div> <?php } ?>
                                                                       </td>
                                                                       <td data-column="Nature of work">
                                                                           <input id="nature_of_work1" name="nature_of_work1"  value="<?php echo set_value('nature_of_work1')?><?php if(!empty($exp_details[0]['nature_of_work'])) echo $exp_details[0]['nature_of_work']; ?>"type="text" class="form-control" maxlength="199">
                                                                           <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('nature_of_work1') ?> </div> <?php } ?>
                                                                        </td>
                                                                       <td data-column="Duration(in month)">
                                                                           <input  id="duration1" name="duration1" type="number"  value="<?php if(!empty($exp_details[0]['duration_in_month'])) echo trim($exp_details[0]['duration_in_month']);?><?php echo set_value('duration1');?>" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" onchange="get_month(this.id)" class="form-control">
                                                                           <input  id="firstd" name="firstd" type="hidden" value="0"><input  id="secondd" name="secondd" type="hidden" value="<?php if (!empty($exp_details[0]['duration_in_month'])) { echo $exp_details[0]['duration_in_month'];} else { echo "0";} ?> ">
                                                                           <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('duration1') ?> </div> <?php } ?>
                                                                       </td>
                                                                       <td data-column="sector">
                                                                           <!-- <input id="sector1" name="sector1" type="text" value="<?php echo set_value('sector1'); ?><?php if(!empty($exp_details[0]['sector'])) echo $exp_details[0]['sector']; ?>" class="form-control"> -->
                                                                           <select class="form-control" id="sector1" name="sector1">
                                                                                <?php 
                                                                                  if(!empty($exp_details[0]['sector']))
                                                                                  {
                                                                                     if($exp_details[0]['sector']=='PSU')
                                                                                     { ?>
                                                                                       
                                                                                       <option value='<?php echo $exp_details[0]['sector']; ?>' selected><?php echo $exp_details[0]['sector']; ?></option>
                                                                                       <option value='Academic institution'>Academic institution</option>
                                                                                        
                                                                                        <option value="Govt.R&D orginizations">Govt.R&D orginizations</option>
                                                                                        <option value="Govt. recognized private R&D orginizations">Govt. recognized private R&D orginizations</option>
                                                                                        <option value="Industry">Industry</option>

                                                                                     <?php }
                                                                                     else if($exp_details[0]['sector']=='Govt.R&D orginizations')
                                                                                     { ?>
                                                                                        <option value='Academic institution'>Academic institution</option>
                                                                                        <option value="PSU">PSU</option>
                                                                                       
                                                                                        <option value="Govt. recognized private R&D orginizations">Govt. recognized private R&D orginizations</option>
                                                                                        <option value="Industry">Industry</option>
                                                                                       <option value='<?php echo $exp_details[0]['sector']; ?>' selected><?php echo $exp_details[0]['sector']; ?></option>

                                                                                    <?php }
                                                                                     else if($exp_details[0]['sector']=='Govt. recognized private R&D orginizations')
                                                                                     { ?>
                                                                                      
                                                                                      <option value='<?php echo $exp_details[0]['sector']; ?>' selected><?php echo $exp_details[0]['sector']; ?></option>
                                                                                      <option value='Academic institution'>Academic institution</option>
                                                                                        <option value="PSU">PSU</option>
                                                                                        <option value="Govt.R&D orginizations">Govt.R&D orginizations</option>
                                                                                       
                                                                                        <option value="Industry">Industry</option>
                                                                                     <?php }
                                                                                     else
                                                                                     { ?>
                                                                                        
                                                                                         <option value='<?php echo $exp_details[0]['sector']; ?>' selected><?php echo $exp_details[0]['sector']; ?></option>
                                                                                         <option value='Academic institution'>Academic institution</option>
                                                                                         <option value="PSU">PSU</option>
                                                                                         <option value="Govt.R&D orginizations">Govt.R&D orginizations</option>
                                                                                         <option value="Govt. recognized private R&D orginizations">Govt. recognized private R&D orginizations</option>
                                                                                        

                                                                                     <?php }
                                                                                  }
                                                                                  else
                                                                                  { ?> 
                                                                                         <option value=''>Please select</option>
                                                                                        <option value='Academic institution'>Academic institution</option>
                                                                                        <option value="PSU">PSU</option>
                                                                                        <option value="Govt.R&D orginizations">Govt.R&D orginizations</option>
                                                                                        <option value="Govt. recognized private R&D orginizations">Govt. recognized private R&D orginizations</option>
                                                                                        <option value="Industry">Industry</option>

                                                                                  <?php } ?>
                                                                                
                                                                                
                                                                                ?>
                                                                               
                                                                          </select>
                                                                           <input id="sector1_" name="sector1_" type="hidden" value="<?php if(!empty($exp_details[0]['id'])) echo $exp_details[0]['id']; ?>">
                                                                           <?php if(validation_errors()){?><div class ="myalert"><?php echo form_error('sector1') ?> </div> <?php } ?>
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
                                                                                    <input class="valdegination" value="<?php if(!empty($value['designation_no'])){ echo $value['designation_no'];} ?>" onkeypress="return IsSpecificSpecialCharacter(event);" id="degination1<?php echo $x;?>" name="degination[]" type="text" class="form-control" placeholder="Designation " required maxlength="199">
                                                                                </td>
                                                                                <td>
                                                                                    <input class="valorganization" value="<?php if(!empty($value['designation_organistion'])){ echo $value['designation_organistion'];} ?>" onkeypress="return IsSpecificSpecialCharacter(event);" id="organization<?php echo $x;?>" name="organization[]" type="text" class="form-control"  placeholder="Organisation " required maxlength="199">
                                                                                </td>
                                                                                <td>
                                                                                    <input class="valnature_of_work" value="<?php if(!empty($value['nature_of_work'])){ echo $value['nature_of_work'];} ?>" onkeypress="return IsSpecificSpecialCharacter(event);" id="nature_of_work<?php echo $x;?>" name="nature_of_work[]" type="text" class="form-control" required>
                                                                                </td>
                                                                                <td>
                                                                                   <input class="valduration1"  name="duration_in_monthd[]"  value="<?php if(!empty($value['duration_in_month'])){ echo $value['duration_in_month'];}?>" onkeypress="return acceptnumber(event)" id="duration1<?php echo $x;?>" onchange="editget_month_d(this.id,<?php echo $value['id'];?>)"  type="text" class="form-control" maxlength="2" required maxlength="199">
                                                                                    <input  id="editfirstt<?php echo $value['id'];?>" name="editfirstt<?php echo $value['id'];?>" type="hidden" value="0">
                                                                                    <input  id="editsecondt<?php echo $value['id'];?>" name="editsecondt<?php echo $value['id'];?>" type="hidden" value="<?php if(!empty($value['duration_in_month'])){ echo $value['duration_in_month'];} ?>">
                                                                                </td>
                                                                                <td>
                                                                                    <input class="valsector" value="<?php if(!empty($value['sector'])){ echo $value['sector'];} ?>" onkeypress="return IsSpecificSpecialCharacter(event);" type="text" class="form-control" id="sector<?php echo $x;?>" name="sector[]" required maxlength="49"><br>
                                                                                    <input value="<?php if(!empty($value['id'])){ echo $value['id'];} ?>"  type="hidden"  id="sector_<?php echo $x;?>" name="sector_[]"><br>
                                                                                    <button class="btn-danger" type="button" name="<?php echo $value['id'];?>" onclick="display_work(this.id)"  id="worke<?php echo $value['id'];?>" >Remove</button>
                                                                                </td>
                                                                            </tr>
                                                                          <?php  $x++; } }?> 

                                                                    </tbody>
                                                                </table>
                                                                <input type="hidden"  id="countexp"  name="countexp"  value="">
                                                                <input type="hidden"  id="tab_id"  name="tab_id"  value="<?php echo $tab ;?>">
                                                               <div> <input type="button" id="addexp"  name="addmore" value="Add More" style="float:right; margin-top: -40px;" class="btn btn-primary btn-sm work_exp_h_s"></div>
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
                        <input class="btn btn-info" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/mtech/Adm_mtech_applicant_home'" value="Back applicant home" />
                        </div>
                    </div>
                    <!--end  -->
                </div>
            </div>
        </div><!--notice end -->
    </div> <!--row col-md-2 end  -->
</div><!--row start  -->
<script type="text/javascript" src="<?php echo base_url();?>themes/dist/js/mtech/adm_mtech_personal_detail.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url();?>themes/dist/js/mtech/adm_mtech_education.js"></script>  -->
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
<script type="text/javascript">
$("#gate_reg_no").keydown(function (e){

		var k = e.keyCode || e.which;
		var ok = k >= 65 && k <= 90 || // A-Z
			k >= 96 && k <= 105 || // a-z
			k >= 35 && k <= 40 || // arrows
			k == 9 || //tab
			k == 46 || //del
			k == 8 || // backspaces
			(!e.shiftKey && k >= 48 && k <= 57); // only 0-9 (ignore SHIFT options)

		if(!ok || (e.ctrlKey && e.altKey)){
			e.preventDefault();
		}
	});

    $("#gate_reg_no_re").keydown(function (e){

var k = e.keyCode || e.which;
var ok = k >= 65 && k <= 90 || // A-Z
    k >= 96 && k <= 105 || // a-z
    k >= 35 && k <= 40 || // arrows
    k == 9 || //tab
    k == 46 || //del
    k == 8 || // backspaces
    (!e.shiftKey && k >= 48 && k <= 57); // only 0-9 (ignore SHIFT options)

if(!ok || (e.ctrlKey && e.altKey)){
    e.preventDefault();
}
});



$("#gate_reg_no").change(function (e){

    var val=$("#gate_reg_no").val()
    var cityArray = [];
    for(var i = 0; i < val.length; i++) {
        cityArray.push(val[i]);
    }
    var num1 = 100;
    if(isNaN(cityArray[0])){  
    }
    else
    {
        alert("The first word must be letter");
    } 
    
    if(isNaN(cityArray[1])){  
    }
    else
    {
        alert("The second word must be letter");
    } 
})



</script>








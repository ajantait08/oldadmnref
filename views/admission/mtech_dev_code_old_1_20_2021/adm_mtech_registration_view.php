<link href="<?php echo base_url();?>themes/dist/css/mtech/adm_mtech_registration.css" rel="stylesheet" media="screen">
<div class="row"> <!--row start  -->
    <div class="col-md-2"> <!--row col-md-4 start  -->
        <div class="notice"> <!--notice start  -->
            <div class="row">
                <div class="col-md-12">
                    <!--start  -->
                    <div class="panel panel-primary news_back">
                        <div class="panel-heading">NEWS AND EVENTS
                        </div>
                        <div class="panel-body">
                           <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">Candidates can now check their admission status.</marquee>
                        </div>
                    </div>
                    <!--end  -->
                </div>
            </div>
        </div><!--notice end -->
    </div> <!--row col-md-4 end  -->
    <div class="col-md-8"><!--row col-md-8 start  -->
       <div class="home"><!--home start  -->
            <div class="row"><!--home row start  -->
                <div class="col-md-12"><!--home col-md-12 start  -->
                    <!--start  -->
                    <div class="panel panel-primary news_back">
                        <div class="panel-heading">PLEASE FILL UP ALL THE FIELD
                        </div>
                        <div class="panel-body">
                           <div id="newUser">
                               <div class="row">
                                   <div class="col-md-8 col-md-offset-2">
                                        <form name="newUser" class="register" id="sub" action="<?php echo base_url() ?>index.php/admission/mtech/Adm_mtech_registration/get_registration" method="POST"control="" class="form-group" method="post" enctype="multipart/form-data">
                                        <?php if($this->session->flashdata('message')){?>
                                        <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Info!</strong> <?php echo $this->session->flashdata('message')?>
                                        </div> 
                                        <?php }?> 
                                        <?php if(!empty($verification))
                                        {?>
                                          <?php if($verification=="done"){ ?>
                                         <div class=row>
                                            <div class="col-md-12">
                                                <h5 style="text-align: center;">THANK YOU FOR REGISTRATING</h5>
                                                <div style="color:green;">
                                                    <h5 id="">Your registration Number is :<?php echo $reg_num; ?> please save for the futrue use</h5>
                                                    <h5>You are Successfully Registered! Please confirm the mail sent to your Email-ID!</h5>
                                                </div>
                                            </div>
                                          </div>
                                         <?php }?>
                                       <?php }
                                        else
                                        { ?>                                           
                                        <h1>REGISTRATION  FORM</h1>
                                        <?php if($this->session->flashdata('error')){?>
                                        <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Info!</strong> <?php echo $this->session->flashdata('error')?>
                                        </div> 
                                        <?php }?> 
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <!-- NAME -->
                                                    <div class="form-group">
                                                        <label>First Name<span style= "color:red;">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                            <input value="<?php echo set_value('first_name');?>" id="first_name" type="text" onkeyup="capital(this.id)" class="form-control" name="first_name" placeholder="Enter Your First Name ">
                                                            <?php if(validation_errors()){?>
                                                                <div class ="myalert">
                                                                  <?php echo form_error('first_name') ?>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- NAME -->
                                                    <div class="form-group">
                                                        <label>Middle Name </label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                            <input  value="<?php echo set_value('middle_name');?>" id="middle_name" type="text" class="form-control" onkeyup="capital(this.id)" name="middle_name" placeholder="Enter Your Middle Name">
                                                            <?php if(validation_errors()){?>
                                                                <div class ="myalert">
                                                                  <?php echo form_error('middle_name') ?>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <!-- NAME -->
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                            <input  value="<?php echo set_value('last_name');?>" id="last_name" type="text" onkeyup="capital(this.id)" class="form-control" name="last_name" placeholder="Enter Your Last Name">
                                                            <?php if(validation_errors()){?>
                                                                <div class ="myalert">
                                                                  <?php echo form_error('last_name') ?>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- NAME -->
                                                    <div class="form-group">
                                                        <label>Category <span style= "color:red;">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                            <select id="category" name="category" class="form-select" aria-label="Default select example">
                                                                <!-- <option value=""> Please select Category</option>
                                                                <option value="Male" <?= set_select('category', 'Male') ?>>Male</option>
                                                                <option value="Female" <?= set_select('category', 'Female') ?>>Female</option>
                                                                <option value="Female" <?= set_select('category', 'Transgender') ?>>Transgender</option>   -->
                                                                <option value=""> Please select Category</option>
                                                                <option value='General'>General</option>
                                                                <option value='OBC'<?= set_select('category', 'OBC') ?>>OBC</option>
                                                                <option value='EWS'<?= set_select('category', 'EWS') ?>>EWS</option>
                                                                <option value='SC'<?= set_select('category', 'SC') ?>>SC</option>
                                                                <option value='ST'<?= set_select('category', 'ST') ?>>ST</option>
                                                            </select>
                                                            <?php if(validation_errors()){?>
                                                                <div class ="myalert">
                                                                  <?php echo form_error('category') ?>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <!-- NAME -->
                                                    <div class="form-group">
                                                        <label>Divyang <span style= "color:red;">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
                                                            <select id="pwd" name="pwd" class="form-select" aria-label="Default select example">
                                                                 <option value=""> please select Divyang</option>
                                                                <option value="Y"<?= set_select('pwd', 'Y') ?>>Yes</option>
                                                                <option value="N"<?= set_select('pwd', 'N') ?>>No</option>
                                                            </select>
                                                            <?php if(validation_errors()){?>
                                                                <div class ="myalert">
                                                                  <?php echo form_error('pwd') ?>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- NAME -->
                                                    <div class="form-group">
                                                        <label>Mobile Number<span style= "color:red;">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                                                            <input  value="<?php echo set_value('mobile');?>" maxlength="10" id="mobile" type="text" class="form-control"  max-="10" name="mobile" placeholder="Enter Your Number">
                                                            <?php if(validation_errors()){?>
                                                                <div class ="myalert">
                                                                  <?php echo form_error('mobile') ?>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-md-6">
                                                  
                                                    <div class="form-group">
                                                        <label>Email<span style= "color:red;">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                            <input value="<?php echo set_value('email');?>" id="email" type="text" class="form-control" name="email" placeholder="Enter Your Email">
                                                            <?php if(validation_errors()){?>
                                                                <div class ="myalert">
                                                                  <?php echo form_error('email') ?>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Dob <span style= "color:red;">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                            <input value="<?php echo set_value('dob');?>" id="dob" type="dob" class="form-control" name="dob" placeholder="Enter Your Dob">
                                                            <?php if(validation_errors()){?>
                                                                <div class ="myalert">
                                                                  <?php echo form_error('dob') ?>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Application Type<span style= "color:red;">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
                                                            <select id="appl_type" name="appl_type" class="form-select" aria-label="Default select example">
                                                                 <option value="">--please select ---</option>
                                                                <option value="IIT Graduates"<?= set_select('appl_type', 'IIT Graduates') ?>>IIT Graduates</option>
                                                                <option value="GATE Candidates"<?= set_select('appl_type', 'Gate qualified') ?>>GATE Candidates </option>
                                                                <option value="Sponsored Candidates"<?= set_select('appl_type', 'Sponsored Candidates') ?>>Sponsored Candidates</option>
                                                            </select>
                                                            <?php if(validation_errors()){?>
                                                                <div class ="myalert">
                                                                  <?php echo form_error('pwd') ?>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="gate_cfti_sponser">
                                                    <div classs="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label>Do you have CPI greater than equal to 8 CFTI <span style= "color:red;">*</span></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <select id="yes_no_cfti" name="yes_no_cfti">
                                                                    <option value="">--please select ---</option>
                                                                    <option value="Yes"<?= set_select('yes_no_cfti', 'Yes') ?>>Yes</option>
                                                                    <option value="No"<?= set_select('yes_no_cfti', 'No') ?>>No</option>
                                                                </select>
                                                                <?php if(validation_errors()){?>
                                                                    <div class ="myalert">
                                                                    <?php echo form_error('yes_no_cfti') ?>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Do you have Color Blindness/Uniocularity <span style= "color:red;">*</span></label>
                                                        <div class="form-check form-check-inline">
                                                           <input class="form-check-input c_blind" type="radio" onclick="handleClick(this.id);" name="c_blind_yes" id="c_blind_yes" value="Y" /> <label class="form-check-label" for="inlineRadio1yes">Yes</label>
                                                        </div> 
                                                        <div class="form-check form-check-inline">
                                                          <input class="form-check-input c_blind" type="radio" name="c_blind_yes" id="c_blind_no" value="N " /> <label class="form-check-label" for="inlineRadio1no">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Do you have Bachelor’s degree with Mathematics or statistics as subject<span style= "color:red;">*</span></label>
                                                        <div class="form-check form-check-inline">
                                                          <input class="form-check-input" type="radio" name="math_stat" id="math_stat_yes" value="Y" /> <label class="form-check-label" for="inlineRadio2yes">Yes</label>
                                                        </div> 
                                                        <div class="form-check form-check-inline">
                                                         <input class="form-check-input" type="radio" name="math_stat" id="math_stat_no" value="N" /> <label class="form-check-label" for="inlineRadio2no">No</label>
                                                       </div>
                                                    </div>
                                                </div> -->
                                            </div> 
                                            <div>
                                                <button type="submit" id="registerButton">Submit &raquo;</button>
                                            </div>
                                            <?php } 
                                             ?> 
                                      </form>
                                   </div>
                               </div>
                               
	                        </div> <!-- New User end --> 
                            <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">Candidates can now check their admission status.</marquee>
                        </div> <!-- panel body end  -->
                    </div>  <!-- panel end  -->
                    <!--end  -->
                </div><!--home col-md-12 end  -->
            </div><!--home row end  -->
        </div><!--home end  -->
    </div><!--row col-md-8 end  -->
    <div class="col-md-2"> <!--row col-md-4 start  -->
        <div class="notice"> <!--notice start  -->
            <div class="row">
                <div class="col-md-12">
                    <!--start  -->
                    <div class="panel panel-primary news_back">
                        <div class="panel-heading">Notics
                        </div>
                        <div class="panel-body">
                           <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">Candidates can now check their admission status.</marquee>
                        </div>
                    </div>
                    <!--end  -->
                </div>
            </div>
        </div><!--notice end -->
    </div> <!--row col-md-4 end  -->
</div><!--row start  -->
<script type="text/javascript" src="<?php echo base_url();?>themes/dist/js/mtech/adm_mtech_registration.js"></script>






<link href="<?php echo base_url();?>themes/dist/css/adm_mba/adm_mba_personal_details.css" rel="stylesheet" media="screen">
<?php 
if(!($this->session->has_userdata('login_type'))) {
redirect('admission/Add_mba/adm_mba_login');
} ?>
<div class="row"> <!--row start  -->
    <div class="col-sm-2 col-md-2 col-lg-2"> <!--row col-md-4 start  -->
        <div class="notice"> <!--notice start  -->
            <div class="row">
                <!-- <div class="col-md-12">
                  
                    <div class="panel panel-primary news_back">
                        <div class="panel-heading">NEWS AND EVENTS
                        </div>
                        <div class="panel-body">
                           <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">Candidates can now check their admission status.</marquee>
                        </div>
                    </div>
                   
                </div> -->
            </div>
        </div><!--notice end -->
        <div class="info"> <!--info start  -->
            <div class="row">
                <div class="col-md-12">
                    <!--start  -->
                    <div class="panel panel-primary news_back">
                        <div class="panel-heading">Activity
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                <!-- <button class="btn btn-info" style="width:100%;"><a href="<?php echo base_url() ?>index.php/admission/Adm_mba_user_dashboard/logout"><b style="text-decoration: none; color: white;">Apply</b></a> </button> -->
                                  <!-- <button class="btn btn-primary" style="width:100%;"> Apply</button>
                                  <button class="btn btn-info" style="width:100%;"> My Application status</button> -->
                                  <input class="btn btn-danger" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/Adm_registration/logout'" value="Logout" />
                                    <!--end  -->
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
                           <?php if($this->session->flashdata('error')){?>
                            <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong> <?php echo $this->session->flashdata('error')?> </strong>
                            </div> 
                            <?php }?>
                            <?php if($this->session->flashdata('apply_success')){?>
                            <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong> <?php echo $this->session->flashdata('apply_success')?></strong>
                            </div> 
                            <?php }?>
                                    
                            <section class="signup-step-container">
                                <div id="sponserd">
                                    <?php
                                         $attributes = array('id' => 'apply_post','class'=>'form-group register','enctype'=>'multipart/form-data');
                                         echo form_open('admission/Adm_mba_user_dashboard/get_apply_post', $attributes); 
                                             
                                    ?>
                                    <!-- <form id="apply_post" action="<?php echo base_url() ?>index.php/admission/Adm_mba_user_dashboard/get_apply_post" method="POST"control="" class="form-group register" method="post" enctype="multipart/form-data"> -->
                                        <?php if(empty($betch_math_statics)){
                                            echo "your program apply information data not found please contact adminstrtion";
                                            exit;
                                        } ?>
                                        <div class="row">  
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Department <span style= "color:red;">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
                                                        <select id="department" name="department" class="form-select" aria-label="Default select example">
                                                                <option value=""> Please Select Department</option>
                                                                <?php if(!empty($department))
                                                                { ?>
                                                                   <option value="<?php echo $department[0]['dept_id']; ?>"<?= set_select('pwd', 'Department of Management Studies') ?> selected><?php echo $department[0]['desc']; ?></option>
                                                                <?php }
                                                                ?>
                                                           
                                                        </select>
                                                        <?php if(validation_errors()){?>
                                                            <div class ="myalert">
                                                                <?php echo form_error('department') ?>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <!-- NAME -->
                                                <div class="form-group">
                                                    <label>Programme<span style= "color:red;">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
                                                        <select id="branch" name="branch" class="form-select" aria-label="Default select example">
                                                            <option value=""> Please Select Programme</option>
                                                               <?php foreach ($programe as $svalues){?>
                                                                 <option value="<?php echo  $svalues['program_id'] ?>"> <?php echo $svalues['program_desc'] ?></option>
                                                               <?php }?>
                                                            <!-- <option value="MBA"<?= set_select('branch', 'MBA') ?>>MBA</option>
                                                            <option value="BA"<?= set_select('branch', 'BA') ?>>BA</option> -->
                                                            
                                                        </select>
                                                        <?php if(validation_errors()){?>
                                                            <div class ="myalert">
                                                                <?php echo form_error('branch') ?>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="math_stat">
                                                <div class="form-group">
                                                    <label>Course<span style= "color:red;">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
                                                        <select id="course" name="course" class="form-select" aria-label="Default select example">
                                                            <option value="MBA"<?= set_select('course', 'MBA') ?>selected>MBA</option>
                                                        </select>
                                                        <?php if(validation_errors()){?>
                                                            <div class ="myalert">
                                                                <?php echo form_error('course') ?>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>   
                                            <input type="hidden" id="apl" name="apl" value=" <?php if(!empty($candidate_type)){ echo $candidate_type; } ?>">
                                            <button type="submit" id="apply_post" class="btn btn-primary g" style="background-color:#7f42b7;float:right;">Add</button>
                                        </div>                  
                                    </form>
                                </section>
                                <section>
                                          <?php if(!empty($fill_appl_details)){?>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                    <h5 class="text-center" style="text-decoration: underline;">Programme you wish to apply for</h5>
                                                    <table id="table_programme">
                                                        <thead>
                                                            <tr> 
                                                                <th>SI No</th>
                                                                <th>Department</th>
                                                                <th>Programme Applying</th>
                                                                <th>Course</th>
                                                                <Th>Delete
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php  
                                                            $i=1;
                                                            foreach($fill_appl_details as $row){ ?>
                                                                <tr>
                                                                    <td><?php echo $i;?> </td>
                                                                    <td><?php echo "Management Studies";?></td>
                                                                    <td class="valprog"><?php if($row->program_id=='ba'){echo "MBA (Business Analytics)";} if($row->program_id=='mba') {echo "Master of Business Administration";}?></td>
                                                                    <td><?php echo $row->program_desc;?></td>
                                                                
                                                                    <td>
                                                                    <button type="button" class="btn btn-danger btn_sm"data-toggle="modal" data-target="#form1<?= $i ?>">
                                          			                       Delete
                                                                    </button>
                                                                    <div class="modal fade text-left" id="form1<?= $i ?>" data-backdrop="static" style="padding-right: 0">
                                                                        <div class="modal-dialog modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" style="text-align: left; font-size: 22px; font-weight: 700">Delete Information:-</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" style="margin-top: -35px;font-size: 35px">&times;</button>
                                                                                </div>

                                                                                <div class="modal-body">
                                                                                <div class="box-body ">
                                                                                <?php
                                                                                     $attributes = array('id' => 'p_app','class'=>'form-group register','enctype'=>'multipart/form-data');
                                                                                     echo form_open('admission/Adm_mba_user_dashboard/education_apply_post', $attributes); 
                                             
                                                                                     ?>
                                                                                    <!-- <form method="POST" action="<?php echo base_url() ?>index.php/admission/Adm_mba_user_dashboard/education_apply_post" method="POST" > -->
                                                                                        <p>Do you  want to delete ? Please confirm </p>
                                                                                        <!-- Modal footer -->
                                                                                        <input type="hidden" id="redirect_to_image_folder" name="redirect_to_image_icon" value="<?php echo $row->id?>">
                                                                                        <input type="hidden" id="redirect_to_image_folder1" name="redirect_to_image_icon2" value="<?php echo  $row->program_desc;?>">
                                                                                        <input type="hidden" id="redirect_to_image_folder2" name="redirect_to_image_icon3" value="<?php echo $row->program_id;?>">
                                                                                        <div class="modal-footer">
                                                                                            <button type="submit" class="btn btn-danger">Yes</button>
                                                                                            <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                                                                                        </div>
                                                                                        
                                                                                    </form>
                                                                                    
                                                                                </div> 
                                                                                    
                                                                                </div>

                                                                                
                                                                            </div>
                                                                        
                                                                        </div>	
                                                                    </div>
                                                                    
                                                                <!-- </form> -->
                                                                    </td>
                                                                
                                                                </tr>
                                                                    <?php $i++; }
                                                                ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col">
                                                     <div>
                                                     <h4 class='alert alert-danger'><center>Disclaimer :Once you click on "Final Programme selection Submit", you cannot change the programme later. </center></h4>
                                                       
                                                    </div>
                                                 </div>
                                             </div> 
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <center>
                                                         <button type="button" class="btn-primary" id="final_submit">Final Programme selection Submit</button>
                                                    </center>
                                                    

                                                </div>

                                            </div>
                                        <?php } ?> 
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
                        <div class="panel-heading">Applicant home</div>
                         <div class="panel-body">
                           <input class="btn btn-info" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/Adm_mba_applicant_home'" value="Back applicant home" />
                          
                        </div>
                    </div>
                    <!--end  -->
                </div>
            </div>
        </div><!--notice end -->
    </div> <!--row col-md-2 end  -->
</div><!--row start  -->
<script type="text/javascript" src="<?php echo base_url();?>themes/dist/js/adm_mba/adm_mba_apply.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>themes/dist/js/adm_mba/adm_mba_education.js"></script> 









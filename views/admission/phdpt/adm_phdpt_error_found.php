<link href="<?php echo base_url();?>themes/dist/css/phdpt/adm_phdpt_personal_details.css" rel="stylesheet" media="screen">
<?php 
if(!($this->session->has_userdata('login_type'))) {
redirect('admission/phdpt/Add_phdpt/adm_phdpt_login');
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
                        <div class="panel-heading">Error Found in the details information
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
                                                                        <h1 class='alert alert-danger'>Dear Applicant Error found in your previous information please send mail to /contact-> admission_phd@iitism.ac.in</h1>
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
                                                                        <div class=""> 
                                                                          <?php 
                                                                           $attributes = array('class' => 'formd', 'id' => 'p_details','name'=>'p_details','enctype'=>'multipart/form-data');
                                                                           echo form_open('admission/phdpt/Adm_phdpt_error/error', $attributes); ?>
                                                                             <div style="display:none">
                                                                               
                                                                             <?php
                                                                              
                                                                                   if(!empty($qualificationug_blank))
                                                                                   {   
                                                                                      
                                                                                        echo $qualificationug_blank;
                                                                                   } 
                                                                                   if(!empty($personal_blank))
                                                                                   {   
                                                                                      
                                                                                        echo $personal_blank;
                                                                                   } 
                                                                                   if(!empty($gate_detail_blank))
                                                                                   {   
                                                                                      
                                                                                        echo $gate_detail_blank;
                                                                                   } 
                                                                                   if(!empty($coap_blank))
                                                                                   {   
                                                                                      
                                                                                        echo $coap_blank;
                                                                                   } 
                                                                                   if(!empty($qualification12_blank))
                                                                                   {   
                                                                                      
                                                                                        echo $qualification12_blank;
                                                                                   } 
                                                                                   if(!empty($qualification10_blank))
                                                                                   {   
                                                                                      
                                                                                        echo $qualification10_blank;
                                                                                   } 
                                                                                   if(!empty($per_add_blank))
                                                                                   {   
                                                                                      
                                                                                        echo $per_add_blank;
                                                                                   } 
                                                                                   if(!empty($cur_add_blank))
                                                                                   {   
                                                                                      
                                                                                        echo $cur_add_blank;
                                                                                   } 
                                                                                   if(!empty($Tab_blank))
                                                                                   {   
                                                                                      
                                                                                        echo $Tab_blank;
                                                                                   } 
                                                                                   if(!empty($doc_blank))
                                                                                   {   
                                                                                      
                                                                                        echo $doc_blank;
                                                                                   } 


                                                                    
                                                                             ?>
                                                                            </div>
                                                                         
                                                                              
                                                                  </div>
                                                             </div>
                                                             
                                                             <!-- Term & condition modal -->
                                                            
                                                                   <!-- Term & condition modal -->
                                                            
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
                        <input class="btn btn-info" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/phdpt/Adm_phdpt_applicant_home'" value="Back applicant home" />
                        </div>
                    </div>
                    <!--end  -->
                </div>
            </div>
        </div><!--notice end -->
    </div> <!--row col-md-2 end  -->
</div><!--row start  -->
<script type="text/javascript" src="<?php echo base_url();?>themes/dist/js/phdpt/adm_phdpt_education.js"></script>
<script type="text/javascript">
function disableF5(e) { if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) e.preventDefault(); };

$(document).ready(function(){
     $(document).on("keydown", disableF5);
});
</script>










<link href="<?php echo base_url();?>themes/dist/css/mtech/login.css" rel="stylesheet" media="screen">
<style>
.myalert
{
  color:white;
}
.faler{
    color:red; 
}

</style>
<div class="row"> <!--row start  -->
    <div class="col-md-3"> <!--row col-md-4 start  -->
        <div class="notice"> <!--notice start  -->
            <div class="row">
                <div class="col-md-12">
                  
                    <!-- <div class="panel panel-primary news_back">
                        <div class="panel-heading">NEWS AND EVENTS
                        </div>
                        <div class="panel-body">
                        <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">Candidates can now check their admission status.</marquee>
                        
                        </div>
                    </div>
                    -->
                </div>
            </div>
        </div><!--notice end -->
    </div> <!--row col-md-4 end  -->
  
    <div class="col-md-8" ><!--forget col-md-8 start  -->
        <div class="forget"><!--forget start  -->
            <div class="row"><!--forget row start  -->
                <div class="col-md-8">
                    <div style="margin-top: 481px;">
                        <div class="container-center"> 
                            <?php if($this->session->flashdata('msg')){?>
                                <div class="alert alert-info alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Info!</strong> <?php echo $this->session->flashdata('msg')?>
                                </div> 
                            <?php }?> 
                            <?php
                                $attributes = array('id' => 'f_form','name'=>'f_form','enctype'=>'multipart/form-data');
                                echo form_open('admission/mtech/Adm_mtech_forgetp/forget_password', $attributes); 
                                             
                            ?>
                            <!-- <form id="f_form" name="f_form" action="<?php echo base_url() ?>index.php/admission/Adm_mba_forgetp/forget_password" method="POST" class="form-group" enctype="multipart/form-data"> -->
                                <h4>
                                <b> Please fill details</b>
                                </h4>
                                <formgroup>
                                <input type="text" name="forget_email" maxlength="60" id="forget_email" value="" />
                                <input type="hidden" name="flag" id="flag" value="<?php if(!empty($flags)){ echo $flags;} ?>" />
                                <label for="email"><br><b>Email</b></label>
                                <span><b>Enter your email</b></span>
                                </formgroup>
                                <?php if(validation_errors()){?>
                                    <div class ="faler">
                                     <?php echo form_error('forget_email');?>
                                    </div>
                                <?php } ?>
                                <formgroup>
                               
                                <input type="text" name="forget_registration" maxlength="10" id="forget_registration" value="" />
                                <label for="Registration No"><br><b>Mobile No</b></label>
                                <span><b>Enter your Mobile No</b></span>
                                </formgroup>
                                <?php if(validation_errors()){?>
                                    <div class ="faler">
                                     <?php echo form_error('forget_registration');?>
                                    </div>
                                <?php } ?>
                                <button type="submit" class="btn btn-primary" id="flogin">Next</button>

                                <p><strong>Note:You will have  only three time privilege to get forget password throughtout after that you not allow to recover your password</strong></p>
                            </form>
                            <!-- <p>Did you remember? <a href="" id="login_sign">Sign In</a> -->
                            <input class="btn btn-danger" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/mtech/add_mtech/adm_mtech_login'" value="Did you remember? Sign In" />
                           </p>
                        </div>
                    </div> 
                </div>
            </div><!--forget row end  -->
        </div><!--forget start end  -->
    </div><!--forget col-md-8 end  -->
</div><!--row start  -->
</div><!--row start  -->
<script type="text/javascript" >
    $(document).ready(function() {
	
	document.getElementById("forget_registration").addEventListener('input', restrictToInteger);
	function restrictToInteger()
	{

	this.value = this.value.replace(/[^\d]/g, '');

	}
	
});
</script>
<!-- <script type="text/javascript" src="<?php echo base_url();?>themes/dist/js/mtech/adm_mtech_education.js"></script>  -->









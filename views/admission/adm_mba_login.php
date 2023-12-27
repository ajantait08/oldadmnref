<link href="<?php echo base_url();?>themes/dist/css/adm_mba/login.css" rel="stylesheet" media="screen">
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
    <div class="col-md-8" id="hide_login"><!--row col-md-8 start  -->
       <div class="login"><!--login start  -->
            <div class="row">
                <div class="col-md-8">
                <!-- <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();" style="font-size: 20pt; font-weight: bold">
                                MBA result is published now.Applicants can check and download offer letter by log in to application web page.
                                </marquee> -->
                    <?php if($this->session->flashdata('success')){?>
                        <center>
                    <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Info!</strong> <?php echo $this->session->flashdata('success')?>
                    </div>
                    <?php }?>
                    </center>
                    <?php if($this->session->flashdata('loginfail')){?>
                        <center>
                    <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Info!</strong> <?php echo $this->session->flashdata('loginfail')?>
                    </div>
                    <?php }?>
                    </center>
                    <?php if($this->session->flashdata('registration_no')){?>
                        <center>
                    <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Info!</strong> <?php echo $this->session->flashdata('registration_no')?>
                    </div>
                    <?php }?>
                    </center>
                   <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                    <div class=" h-100">
                        <div class="d-flex justify-content-center h-100">
                            <div class="user_card">
                                <div class="d-flex justify-content-center">
                                    <div class="brand_logo_container">
                                        <img src="https://www.iitism.ac.in/assets/img/logo.png" class="brand_logo" alt="Logo">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center form_container">
                                    <div class="hide_login">
                                        <?php
                                         $attributes = array('id' => 'loginsub','name'=>'loginf','enctype'=>'multipart/form-data');
                                         echo form_open('admission/Adm_registration/user_login', $attributes);

                                        ?>


                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" name="user_name" id="user_name" class="form-control input_user" value="" placeholder=" Enter Your Registration Number">
                                              <?php if(validation_errors()){?>
                                                <div class ="myalert">
                                                <?php echo form_error('user_name');?>
                                                </div>
                                              <?php } ?>
                                        </div>
                                        <div class="input-group mb-2">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                            </div>
                                            <input type="password" name="user_pass" id="user_pass" class="form-control input_pass" value="" placeholder="Enter Your password">
                                            <?php if(validation_errors()){?>
                                                <div class ="myalert">
                                                <?php echo form_error('user_pass');?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="input-group mb-2">
                                            <div class="input-group-append">

                                            </div>
                                            <div class="g-recaptcha" data-sitekey="6LdRAokdAAAAAPzpLEre4KfqwOdYBuR830eOc0c3">

                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                                <!-- <label class="custom-control-label" for="customControlInline">Remember me</label> -->
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mt-3 login_container">
                                            <button type="submit" name="button" class="btn login_btn">Login</button>
                                        </div>
                                  </form>
                                  </div>
                                </div>
                                <div class="hide_login">
                                <div class="mt-4">
                                    <div class="d-flex justify-content-center links">
                                    <input class="btn btn-danger" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/Adm_mba_forgetp'" value="Forgot your password?" />
                                        <!-- <button id="password_forget" style="color: black;">Forgot your password?</button> -->
                                    </div>
                                    <div class="d-flex justify-content-center links" style="color: white;">
                                        Don't have an account? <a href="<?php echo base_url();?>index.php/admission/add_mba/adm_mba_registration" class="ml-2" style="color: white;">Sign Up</a>
                                    </div>

                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!--login end  -->
        </div><!--row col-md-8 end  -->
    </div><!--row col-md-8 end  -->


</div><!--row start  -->
<!-- <script type="text/javascript" src="<?php echo base_url();?>assets/js/editexpedu.js"></script> -->
<script type="text/javascript" src="<?php echo base_url();?>themes/dist/js/adm_mba/adm_mba_login.js"></script>
</div><!--row start  --><script type="text/javascript" src="<?php echo base_url();?>themes/dist/js/adm_mba/adm_mba_education.js"></script>








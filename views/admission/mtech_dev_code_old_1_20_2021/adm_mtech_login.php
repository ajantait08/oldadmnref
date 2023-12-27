<style>

.user_card {
			height: 467px;
			width: 350px;
			margin-top: 12px;
			margin-bottom: auto;
			background: #e47781;
			position: relative;
			display: flex;
			justify-content: center;
			flex-direction: column;
			padding: 10px;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			border-radius: 5px;

		}
		.brand_logo_container {
			position: absolute;
			height: 123px;
            width: 118px;
            top: -26px;
			border-radius: 50%;
			background: #ffffff;
			padding: 10px;
			text-align: center;
		}
		.brand_logo {
			height: 106px;
            width: 93px;
			border-radius: 50%;
			border: 2px solid #ffffff;
		}
		.form_container {
			margin-top: 100px;
		}
		.login_btn {
			width: 100%;
			background: #272525  !important;
			color: white !important;
		}
		.login_btn:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
		.login_container {
			padding: 0 2rem;
		}
		.input-group-text {
			background: #c0392b !important;
			color: white !important;
			border: 0 !important;
			border-radius: 0.25rem 0 0 0.25rem !important;
		}
		.input_user,
		.input_pass:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
		.custom-checkbox .custom-control-input:checked~.custom-control-label::before {
			background-color: #c0392b !important;
		}
        /* notice css  start*/
        .palel-primary
	{
		border-color: #e47781;
	}
	.panel-primary>.panel-heading
	{  
        text-align:center;
		background:#e47781;
		
	}
	.panel-primary>.panel-body
	{
		background-color: #EDEDED;
	}
     /* notice css end*/
     marquee{
      font-size: 15px;
      font-weight: 300;
      color: #ff5200;
      font-family: sans-serif;
      }
      .news_back{
        border-radius: 5px; 
      border: solid 1px #ccc;
      box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
      background: #ebebeb; 
  }
  /* css start for forget password  */
  /***** For Smartphones *******/
.container-center {
  position: absolute;
  left: 50%;
  width: 85%;
  height: auto;
  background-color: transparent;
  -webkit-transition: all 0.1s;
  transition: all 0.1s;
  bottom: 50%;
  -webkit-transform: translateX(-50%) translateY(50%);
          transform: translateX(-50%) translateY(50%);
}

h2, img {
  text-align: center;
  color: white;
  font-weight: 10;
  text-shadow: 0px 1px rgba(0, 0, 0, 0.3);
}
h4{
  text-align: center;
  color:black;
  font-size: 1.1em;
  font-family: times;
  font-style:normal;
  line-height: 130%;
 opacity: .6;
}

#forget {
  width: 100%;
  overflow: hidden;
  background-color: #FEFEFE;
  padding: 21px 13px;
  border-radius: 21px;
  -webkit-box-shadow: 0px 5px 34px rgba(0, 0, 0, 0.1);
          box-shadow: 0px 5px 34px rgba(0, 0, 0, 0.1);
}

formgroup {
  position: relative;
  width: 100%;
  display: block;
  margin: 1em 0;
  font-size: 1em;
}
formgroup input {
  width: 100%;
  border: none;
  border-bottom: 1px solid #888888;
  padding: 8px 0;
  font-size: inherit !important;
  margin-bottom: 13px;
  outline: none;
  opacity: 0.7;
  font-weight: 600;
}
formgroup input:focus {
  opacity: 1;
  border-bottom: 2px solid #F71442;
  color: #F71442;
}
formgroup label {
  position: absolute;
  font-size: 0.8em;
  top: -1em;
  left: 0;
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
  opacity: 0.7;
  color: #888888;
  text-transform: uppercase;
}
formgroup span {
  position: absolute;
  top: -1em;
  left: -500px;
  opacity: 0;
  color: #333333;
  font-weight: bold;
  text-transform: uppercase;
  font-size: 0.8em;
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
}
formgroup input:focus + label {
  left: 500px;
  opacity: 0;
}
formgroup input:focus ~ span {
  left: 0;
  opacity: 1;
}

.forgot {
  display: block;
  width: 100%;
  text-align: center;
  font-size: 1em;
  font-weight: bold;
  margin-top: 21px;
  opacity: 0.8;
}

#login-btn {
  border: none;
  color: #FEFEFE;
  padding: 0.8em 0;
  font-size: 1em;
  font-weight: 300;
  width: 100%;
  border-radius: 55px;
  -webkit-box-shadow: 0px 3px 21px rgba(81 97 206);
          box-shadow: 0px 3px 21px rgba(81 97 206);
  background: -webkit-gradient(linear, left top, right top, from(#e47781), to(#e47781));
  background: linear-gradient(to right, #e47781, #e47781);
  background-size: 100%;
  text-shadow: 0px 1px 2px rgba(0, 0, 0, 0.2);
}

.social {
  margin-top: 1.8em;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
}
.social button {
  width: 50%;
  margin: 0 8px;
  padding: 10px 0;
  font-size: 0.9em;
  border: none;
  border-radius: 34px;
  -webkit-box-shadow: 0px 1px 13px rgba(0, 0, 0, 0.2);
          box-shadow: 0px 1px 13px rgba(0, 0, 0, 0.2);
  color: white;
  font-weight: bold;
  cursor: pointer;
}
.social #facebook {
  background: #1F4788;
  background: -webkit-gradient(linear, left top, right top, from(#4B77BE), to(#1F4788));
  background: linear-gradient(to right, #4B77BE, #1F4788);
  background-size: 100%;
}
.social #google {
  background: #FEFEFE;
  background: -webkit-gradient(linear, left top, right top, from(#FEFEFE), to(#f1f1f1));
  background: linear-gradient(to right, #FEFEFE, #f1f1f1);
  background-size: 100%;
  color: #F71442;
}

p {
  color:#157ad2;
  text-align: center;
}
p a {
  color: inherit;
  text-decoration: none;
  font-weight: bold;
}

/***** For Tablets *******/
@media screen and (min-width: 480px) {
  .container-center {
    width: 70%;
  }

  #login-btn {
    padding: 0.8em 0;
    font-size: 1.2em;
  }
}
/***** For Desktop Monitors *******/
@media screen and (min-width: 768px) {
  .container-center {
    width: 500px;
  }
}
  /* css end for forget password */

</style>
<div class="row"> <!--row start  -->
    <div class="col-md-3"> <!--row col-md-4 start  -->
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
    <div class="col-md-8" id="hide_login"><!--row col-md-8 start  -->
       <div class="login"><!--login start  -->
            <div class="row">
                <div class="col-md-8">
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
                                    <form  name="loginf" id="loginsub" action="<?php echo base_url() ?>index.php/admission/mtech/Adm_mtech_registration/user_login" method="POST"control="" class="form-group" method="post" enctype="multipart/form-data">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" name="user_name" id="user_name" class="form-control input_user" value="" placeholder=" Enter Your Registration Number">
                                        </div>
                                        <div class="input-group mb-2">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                            </div>
                                            <input type="password" name="user_pass" id="user_pass" class="form-control input_pass" value="" placeholder="Enter Your password">
                                        </div>
                                        <div class="input-group mb-2">
                                            <div class="input-group-append">
                                               
                                            </div>
                                            <div class="g-recaptcha" data-sitekey="6LchRQIaAAAAAAii2cHJZ1z3rb_qTDDJcgambclr">
                                                 
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
                                        <button id="password_forget" style="color: black;">Forgot your password?</button>
                                    </div>
                                    <div class="d-flex justify-content-center links" style="color: white;">
                                        Don't have an account? <a href="<?php echo base_url();?>index.php/admission/mtech/add_mtech/adm_mtech_registration" class="ml-2" style="color: white;">Sign Up</a>
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
    <div class="col-md-8" id="show_forget"><!--forget col-md-8 start  -->
        <div class="forget"><!--forget start  -->
            <div class="row"><!--forget row start  -->
                <div class="col-md-8">
                    <div style="margin-top: 238px;">
                        <div class="container-center"> 
                            <center>
                            <!-- <img src = "https://i.imgur.com/LaimZqD.png" width="30%" > -->
                            <h5>Enter email with which you had registered!</h5>
                            </center>
                            <form id="f_forget" name="f_forget" action="<?php echo base_url() ?>index.php/admission/mtech/Adm_mtech_registration/forget_password" method="POST" class="form-group" enctype="multipart/form-data">
                                <!-- <h4>
                                <b> Just provide your email and we can do the password rest</b>
                                </h4> -->
                                <formgroup>
                                <input type="text" name="forget_email" id="forget_email" value="" />
                                <label for="email"><br><b>Email</b></label>
                                <span><b>Enter your email</b></span>
                                </formgroup>
                                <formgroup>
                                <input type="text" name="registration_id" id="registration_id" value="" />
                                <label for="Registration No"><br><b>Registration No</b></label>
                                <span><b>Enter your Registration No</b></span>
                                </formgroup>
                                <button type="submit" id="login-btn">Next</button>
                            </form>
                            <p>Did you remember? <a href="" id="login_sign">Sign In</a></p>
                        </div>
                    </div> 
                </div>
            </div><!--forget row end  -->
        </div><!--forget start end  -->
    </div><!--forget col-md-8 end  -->
</div><!--row start  -->
<!-- <script type="text/javascript" src="<?php echo base_url();?>assets/js/editexpedu.js"></script> -->
<script type="text/javascript" src="<?php echo base_url();?>themes/dist/js/mtech/adm_mtech_login.js"></script>
<script type="text/javascript">
$( document ).ready(function() {
    $("#show_forget").hide();
    $("#password_forget").click(function(){
        $("#show_forget").show();
        $("#hide_login").hide();
    })
    $("#login_sign").click(function(){
        $("#show_forget").hide();
        $("#hide_login").show();
    })
});

</script>







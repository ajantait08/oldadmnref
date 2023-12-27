<style>

.user_card {
			height: 400px;
			width: 350px;
			margin-top: 12px;
			margin-bottom: auto;
			background: #70ce51;
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
			background: black !important;
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
		border-color: #5161ce;
	}
	.panel-primary>.panel-heading
	{  
        text-align:center;
		background:#5161ce;
		
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
</style>
<div class="row"> <!--row start  -->
    <div class="col-md-4"> <!--row col-md-4 start  -->
        <div class="notice"> <!--notice start  -->
            <div class="row">
                <div class="col-md-12">
                    <!--start  -->
                    <div class="panel panel-primary news_back">
                        <div class="panel-heading">NEWS AND EVENTS
                        </div>
                        <div class="panel-body">
                        <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">Candidates can now check their admission status.</marquee>
                            <!-- <form name="myform">
                                <div class="form-group">
                                    <label for="myName">First Name *</label>
                                    <input id="myName" name="myName" class="form-control" type="text" data-validation="required">
                                    <span id="error_name" class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Last Name *</label>
                                    <input id="lastname" name="lastname" class="form-control" type="text" data-validation="email">
                                    <span id="error_lastname" class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="age">Age *</label>
                                    <input id="age" name="age"  class="form-control" type="number" min="1" >
                                    <span id="error_age" class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="dob">Date Of Birth *</label>
                                    <input type="date" name="dob" id="dob" class="form-control">
                                    <span id="error_dob" class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option selected>Male</option>
                                        <option>Female</option>
                                        <option>Other</option>
                                    </select>
                                    <span id="error_gender" class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number *</label>
                                    <input type="text" id="phone" name="phone" class="form-control" >
                                    <span id="error_phone" class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="disc">Discription</label>
                                    <textarea class="form-control" rows="3"></textarea>
                                </div>
                                
                                <button id="submit" type="submit" value="submit" class="btn btn-primary center">Submit</button>
                        
                            </form> -->

                        </div>
                    </div>
                    <!--end  -->
                </div>
            </div>
        </div><!--notice end -->
    </div> <!--row col-md-4 end  -->
    <div class="col-md-8"><!--row col-md-8 start  -->
       <div class="login"><!--login start  -->
            <div class="row">
                <div class="col-md-8">
                    <div class="container h-100">
                        <div class="d-flex justify-content-center h-100">
                            <div class="user_card">
                                <div class="d-flex justify-content-center">
                                    <div class="brand_logo_container">
                                        <img src="https://www.iitism.ac.in/assets/img/logo.png" class="brand_logo" alt="Logo">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center form_container">
                                    <form>
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" name="" class="form-control input_user" value="" placeholder=" Enter Your username">
                                        </div>
                                        <div class="input-group mb-2">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                            </div>
                                            <input type="password" name="" class="form-control input_pass" value="" placeholder="Enter Your password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                                <!-- <label class="custom-control-label" for="customControlInline">Remember me</label> -->
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mt-3 login_container">
                                            <button type="button" name="button" class="btn login_btn">Login</button>
                                        </div>
                                  </form>
                                </div>
                                <div class="mt-4">
                                    <div class="d-flex justify-content-center links" style="color: white;">
                                        Don't have an account? <a href="#" class="ml-2" style="color: white;">Sign Up</a>
                                    </div>
                                    <div class="d-flex justify-content-center links">
                                        <a href="#" style="color: white;">Forgot your password?</a>
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







<style>
/* notice css  start*/
body{
    margin:0;
    padding:0;
}
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
 /* tab css application start*/
 @import url('https://fonts.googleapis.com/css?family=Roboto');

body{
	font-family: 'Roboto', sans-serif;
}
* {
	margin: 0;
	padding: 0;
}
i {
	margin-right: 10px;
}

/*------------------------*/
input:focus,
button:focus,
.form-control:focus{
	outline: none;
	box-shadow: none;
}
.form-control:disabled, .form-control[readonly]{
	background-color: #fff;
}
/*----------step-wizard------------*/
.d-flex{
	display: flex;
}
.justify-content-center{
	justify-content: center;
}
.align-items-center{
	align-items: center;
}

/*---------signup-step-------------*/
.bg-color{
	background-color: #333;
}
.signup-step-container{
	padding: 0px 0px;
	padding-bottom: 60px;
}

.wizard .nav-tabs {
    position: relative;
    margin-bottom: 0;
    border-bottom-color: transparent;
}

.wizard > div.wizard-inner {
        position: relative;
margin-bottom: 0;
text-align: center;
}

.connecting-line {
    height: 2px;
    background: #e0e0e0;
    position: absolute;
    width: 100%;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: 15px;
    z-index: 1;
}

.wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
    color: #555555;
    cursor: default;
    border: 0;
    border-bottom-color: transparent;
}

span.round-tab {
    width: 30px;
    height: 30px;
    line-height: 30px;
    display: inline-block;
    border-radius: 50%;
    background: #fff;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 16px;
    color: #0e214b;
    font-weight: 500;
    border: 1px solid #ddd;
}

span.round-tab i{
    color:#555555;
}

.wizard li.active span.round-tab {
        background: #0db02b;
    color: #fff;
    border-color: #0db02b;
}

.wizard li.active span.round-tab i{
    color: #5bc0de;
}

.wizard .nav-tabs > li.active > a i{
	color: #0db02b;
}

.wizard .nav-tabs > li {
    width: 19%;
}

.wizard li:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 0;
    margin: 0 auto;
    bottom: 0px;
    border: 5px solid transparent;
    border-bottom-color: red;
    transition: 0.1s ease-in-out;
}



.wizard .nav-tabs > li a {
    width: 30px;
    height: 30px;
    margin: 20px auto;
    border-radius: 100%;
    padding: 0;
    background-color: transparent;
    position: relative;
    top: 0;
}
.wizard .nav-tabs > li a i{
	position: absolute;
    top: -15px;
    font-style: normal;
    font-weight: 400;
    white-space: nowrap;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 12px;
    font-weight: 700;
    color: #000;
}

    .wizard .nav-tabs > li a:hover {
        background: transparent;
    }

.wizard .tab-pane {
    position: relative;
    padding-top: 20px;
}


.wizard h3 {
    margin-top: 0;
}
.prev-step,
.next-step{
    font-size: 13px;
    padding: 8px 24px;
    border: none;
    border-radius: 4px;
    margin-top: 30px;
}
.next-step{
	background-color: #0db02b;
}
.skip-btn{
	background-color: #cec12d;
}
.step-head{
    font-size: 20px;
    text-align: center;
    font-weight: 500;
    margin-bottom: 20px;
}
.term-check{
	font-size: 14px;
	font-weight: 400;
}
.custom-file {
    position: relative;
    display: inline-block;
    width: 100%;
    height: 40px;
    margin-bottom: 0;
}
.custom-file-input {
    position: relative;
    z-index: 2;
    width: 100%;
    height: 40px;
    margin: 0;
    opacity: 0;
}
.custom-file-label {
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    z-index: 1;
    height: 40px;
    padding: .375rem .75rem;
    font-weight: 400;
    line-height: 2;
    color: #495057;
    background-color: #fff;
    border: 1px solid #ced4da;
    border-radius: .25rem;
}
.custom-file-label::after {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    z-index: 3;
    display: block;
    height: 38px;
    padding: .375rem .75rem;
    line-height: 2;
    color: #495057;
    content: "Browse";
    background-color: #e9ecef;
    border-left: inherit;
    border-radius: 0 .25rem .25rem 0;
}
.footer-link{
	margin-top: 30px;
}
.all-info-container{

}
.list-content{
	margin-bottom: 10px;
}
.list-content a{
	padding: 10px 15px;
    width: 100%;
    display: inline-block;
    background-color: #f5f5f5;
    position: relative;
    color: #565656;
    font-weight: 400;
    border-radius: 4px;
}
.list-content a[aria-expanded="true"] i{
	transform: rotate(180deg);
}
.list-content a i{
	text-align: right;
    position: absolute;
    top: 15px;
    right: 10px;
    transition: 0.5s;
}
.form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
    background-color: #fdfdfd;
}
.list-box{
	padding: 10px;
}
.signup-logo-header .logo_area{
	width: 200px;
}
.signup-logo-header .nav > li{
	padding: 0;
}
.signup-logo-header .header-flex{
	display: flex;
	justify-content: center;
	align-items: center;
}
.list-inline li{
    display: inline-block;
}
.pull-right{
    float: right;
}
/*-----------custom-checkbox-----------*/
/*----------Custom-Checkbox---------*/
input[type="checkbox"]{
    position: relative;
    display: inline-block;
    margin-right: 5px;
}
input[type="checkbox"]::before,
input[type="checkbox"]::after {
    position: absolute;
    content: "";
    display: inline-block;   
}
input[type="checkbox"]::before{
    height: 16px;
    width: 16px;
    border: 1px solid #999;
    left: 0px;
    top: 0px;
    background-color: #fff;
    border-radius: 2px;
}
input[type="checkbox"]::after{
    height: 5px;
    width: 9px;
    left: 4px;
    top: 4px;
}
input[type="checkbox"]:checked::after{
    content: "";
    border-left: 1px solid #fff;
    border-bottom: 1px solid #fff;
    transform: rotate(-45deg);
}
input[type="checkbox"]:checked::before{
    background-color: #18ba60;
    border-color: #18ba60;
}
select 
{
    height:29px;
    width:100%;
}

@media (max-width: 767px){
	.sign-content h3{
		font-size: 40px;
	}
	.wizard .nav-tabs > li a i{
		display: none;
	}
	.signup-logo-header .navbar-toggle{
		margin: 0;
		margin-top: 8px;
	}
	.signup-logo-header .logo_area{
		margin-top: 0;
	}
	.signup-logo-header .header-flex{
		display: block;
	}
}

    /* tab css application end*/

/* application form css start application end*/
form.register {
margin: 20px auto 0px auto;
background-color: #fff;
padding: 20px;
-moz-border-radius: 20px;
-webkit-border-radius: 20px;
}
label{
    color:#5161ce;
}
/* application form css end*/
table { 
	width: 100%; 
	border-collapse: collapse; 
	margin:50px auto;
	}

/* Zebra striping */
tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: #5161ce; 
	color: white; 
	font-weight: bold; 
	}

td, th { 
	padding: 10px; 
	border: 1px solid #ccc; 
	text-align: left; 
	font-size: 12px;;
	}

/* 
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/

     /* // Small devices (landscape phones, 576px and up) */
@media (min-width: 576px) {  

    .panel{
        width: 100%;
}
}

/* // Medium devices (tablets, 768px and up) */
@media (min-width: 768px) {
    .panel{
        width: 100%;
}

 }

/* // Large devices (desktops, 992px and up) */
@media (min-width: 992px) {  
.panel{
    width: 100%;
}

}

/* // Extra large devices (large desktops, 1200px and up) */
@media (min-width: 1200px) { 
.panel{
    
}
    
}

}
</style>
<script type="text/javascript">

// ------------step-wizard-------------
$(document).ready(function () {
    
    // $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

        var target = $(e.target);
    
        if (target.parent().hasClass('disabled')) {
            return false;
        }
    });

    // $(".next-step").click(function (e) {
    //     alert("hello");

    //     var active = $('.wizard .nav-tabs li.active');
    //     active.next().removeClass('disabled');
    //     nextTab(active);

    // });
    // $(".prev-step").click(function (e) {

    //     var active = $('.wizard .nav-tabs li.active');
    //     prevTab(active);

    // });
});

// function nextTab(elem) {
//     $(elem).next().find('a[data-toggle="tab"]').click();
// }
// function prevTab(elem) {
//     $(elem).prev().find('a[data-toggle="tab"]').click();
// }


// $('.nav-tabs').on('click', 'li', function() {
//     alert("hello");

//     // $('.nav-tabs li.active').removeClass('active');
//     // $(this).addClass('active');
// });

</script>
<div class="row"> <!--row start  -->
    <div class="col-sm-2 col-md-2 col-lg-2"> <!--row col-md-4 start  -->
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
        <div class="info"> <!--info start  -->
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <!--start  -->
                    <div class="panel panel-primary news_back">
                        <div class="panel-heading">Important Information
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
                                  <button class="btn btn-primary" style="width:100%;"> Apply</button>
                                  <button class="btn btn-info" style="width:100%;"> My Application status</button>
                                  <button class="btn btn-danger" style="width:100%;"><a href="<?php echo base_url() ?>index.php/admission/mtech/Adm_mtech_registration/logout"><b style="text-decoration: none; color: white;">Logout</b></a> </button>
                                    
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
                                                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">PD </span> <i>Personal details</i></a>
                                                        </li>
                                                        <li role="presentation" class="disabled" id="tab2">
                                                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">QN</span> <i>Qualification</i></a>
                                                        </li>
                                                        <li role="presentation" class="disabled" id="tab3">
                                                            <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" aria-expanded="false"><span class="round-tab">WE</span> <i>Work Experience</i></a>
                                                        </li>
                                                        <li role="presentation" class="disabled" id="tab4">
                                                            <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" aria-expanded="false"><span class="round-tab">DU</span> <i>Document upload</i></a>
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
                                                            <?php if($this->session->flashdata('success')){?>
                                                            <div class="alert alert-success alert-dismissible">
                                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                            <strong>Info!</strong> <?php echo $this->session->flashdata('success')?>
                                                            </div> 
                                                            <?php }?>
                                                            <h4 class="text-center" style="text-decoration: underline;">Personal details</h4>
                                                            <div class="row">
                                                                <?php 
                                                                $attributes = array('class' => 'email', 'id' => 'p_details','name'=>'p_details','enctype'=>'multipart/form-data');
                                                                echo form_open('admission/mtech/Adm_mtech_personal_details/get_personal_details', $attributes); ?>
                                                                    <div class="col-md-6 col-sm-12 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Applicant's Name:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="application_no" type="text" name="application_no" class="form-control" value=" <?php if(!empty($registration_detail)) { echo $registration_detail[0]->first_name." ".$registration_detail[0]->middle_name." ".$registration_detail[0]->last_name ;}?>"  readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12 col-lg-6">
                                                                
                                                                        <div class="form-group">
                                                                            <label>Registration No:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="registration_no" name="registration_no" type="text" class="form-control" value="<?php if(!empty($registration_detail)) { echo $registration_detail[0]->registration_no;}?>" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12 col-lg-6">
                                                                    <div class="form-group">
                                                                            <label>Name of the Parent/Guardian: <span style="color:red;">*</span></label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="parent_name" name="parent_name" type="text" class="form-control" placeholder="Enter Name of the Parent/Guardian">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Relationship of Parent/Guardian: <span style="color:red;">*</span></label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input  id="parent_relation" name="parent_relation" type="text" class="form-control" placeholder="Enter Relationship of Parent/Guardian ">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                     <div class="col-md-6 col-sm-12 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Guardian Mobile Number: <span style="color:red;">*</span></label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input  id="guardian_mobile_no" name="guardian_mobile_no" type="number" class="form-control" placeholder="Enter Relationship of Parent/Guardian ">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Category:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="category" name="category" type="text" class="form-control" value="<?php if(!empty($registration_detail)) { echo $registration_detail[0]->category ;}?>" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>PWD:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="pwd" name="pwd" type="text" value="<?php if(!empty($registration_detail)) { if($registration_detail[0]->pwd==''){ echo "Yes";} else {echo "No";} } ?>" class="form-control" name="divyang" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Nationality: <span style="color:red;">*</span></label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="nationality" name="nationality" type="text" class="form-control"  placeholder="Enter Your Nationality">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Religion: <span style="color:red;">*</span></label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                               <select class="form-control" id="religion" name="religion">
                                                                                <!-- <?php if(!empty($basic_details[0]->religion)) {?> -->
                                                                                <!-- <option value="<?php if(!empty($basic_details)){echo $basic_details[0]->religion;} ?>"><?php if(!empty($basic_details)){echo $basic_details[0]->religion;} ?></option> <?php }?> -->
                                                                                    <option value="">--Please select --</option>
                                                                                    <option value="Hindu" >Hindu</option>
                                                                                    <option value="Christian">Christian</option>
                                                                                    <option value="Buddhist">Buddhist</option>
                                                                                    <option value="Muslim">Muslim</option>
                                                                                    <option value="Sikh">Sikh</option>
                                                                                    <option value="Other">Other</option>
                                                                                </select>
                                                                                <!-- <input id="religion" name="nationality" class="form-control"  placeholder="Enter Your Religion "> -->
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Martial Status <span style="color:red;">*</span></label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <select id="martial" name="martial" class="form-select" aria-label="Default select example">
                                                                                    <option value=""> please select Martial Status</option>
                                                                                    <option value="Married" >Married</option>
                                                                                    <option value="Unmarried">Unmarried</option>
                                                                                    <option value="Widowed">Widowed</option>
                                                                                    <option value="Divorced">Divorced</option>
                                                                                    <option value="Other">Other</option>  
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Gender: <span style="color:red;">*</span></label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <select id="gender" name="gender" class="form-select" aria-label="Default select example">
                                                                                    <option value=""> please select Gender</option>
                                                                                    <option value="Married" >Male</option>
                                                                                    <option value="Unmarried">Female</option>
                                                                                    <option value="Widowed">Transgender</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>DOB: <span style="color:red;">*</span></label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="dob" name="dob" type="text" class="form-control" value ="<?php if(!empty($registration_detail)) { echo $registration_detail[0]->dob ;}?>"  readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Email: <span style="color:red;">*</span></label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="email" name="email" type="text" class="form-control"  value ="<?php if(!empty($registration_detail)) { echo $registration_detail[0]->email ;}?>"  readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Mobile Number:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="mobile" name="mobile" type="text"  value ="<?php if(!empty($registration_detail)) { echo $registration_detail[0]->mobile ;}?>" class="form-control" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Adhar Number:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="adhar" name="adhar" type="text" class="form-control" placeholder="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Sponser:</label>
                                                                            <select class="form-control" id="sponsored_yes_no" name="sponsored_yes_no">

                                                                            <?php if(!empty($registration_detail))
                                                                            {
                                                                             if($registration_detail[0]->appl_type=='Sponsored Candidates')
                                                                             {?>
                                                                                 <option value="Yes" selected>Yes</option>  
                                                                            <?php }
                                                                             else
                                                                             {?>

                                                                                <option value="No" selected>No</option>
                                                                            <?php }

                                                                            }?>
                                                                                
                                                                               
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Application Type:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="department" name="department" type="text"  value ="<?php if(!empty($registration_detail)) { echo $registration_detail[0]->appl_type ;}?>" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Admission Type:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <select class="form-control" id="adm_type" name="adm_type">
                                                                                    <option value="">--Please Select --</option>
                                                                                    <option value="Yes">Part time</option>
                                                                                    <option value="No">Full time</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- <?php
                                                                    ?> -->
                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Gate Subject and Code:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="department" name="department" type="text"  value ="<?php if(!empty($application_details)) { echo $application_details[0]->gate_paper_code;}?>" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <!-- <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Programme applying for:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="department" name="department" type="text"  value ="<?php if(!empty($application_details)) { echo $application_details[0]->programm_apply; }?>" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Programme Elligibilty:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="department" name="department" type="text"  value ="<?php if(!empty($registration_detail)) { echo $application_details[0]->elligibility; }?>" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div> -->
                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Course:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="course" name="course" value ="M.TECH" type="text" class="form-control" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Color blindness/uniocularity:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="course" name="course" value ="<?php if(!empty($registration_detail)) { if($registration_detail[0]->color_blind =='Y'){ echo "Yes"; } else { echo "No"; } }?>" type="text" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="row">
                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                    <div class="form-group">
                                                                    <h5> Do You have an work Experience? <span style="color:red;">*</span></h5>
                                                                    </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                    <div class="form-group">
                                                                            <select class="form-control" id="work_exp" name="work_exp">
                                                                                <option value="">--Please Select --</option>
                                                                                <option value="Yes">Yes</option>
                                                                                <option value="No">No</option>
                                                                            </select>
                                                                    </div>
                                                                    </div>
                                                                </div>  -->
                                                                <div class="row">
                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="row">
                                                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                    <div class="form-group">
                                                                                        <label>Correspondence Address:</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <div class="form-group purple-border">
                                                                                        <label>Line1 adresss:</label>
                                                                                        <input  id="c_line1" name="c_line1" type="text" class="form-control"  placeholder="Enter Line 1 address ">
                                                                                        <label>Line2 adresss:</label>
                                                                                        <input  id="c_line2" name="c_line2" type="text" class="form-control"  placeholder="Enter Line 2 address ">
                                                                                        <label>Line3 adresss:</label>
                                                                                        <input  id="c_line3" name="c_line3" type="text" class="form-control"  placeholder="Enter Line 3 address ">
                                                                                        <label>City:</label>    
                                                                                        <input  id="c_city" name="c_city" type="text" class="form-control"  placeholder="Enter City ">
                                                                                        <label>State:</label>   
                                                                                        <select class="form-control" id="c_state" name="c_state">
                                                                                                <option value="">Please Select State</option>
                                                                                                <!-- <option value="Yes">Yes</option>
                                                                                                <option value="No">No</option> -->
                                                                                         </select>
                                                                                         <label>Pincode:</label>   
                                                                                         <input id="c_pincode" name="c_pincode" type="text" class="form-control" placeholder="Enter Pincode">
                                                                                         <label>Country:</label>  
                                                                                         <input  id="c_country" name="c_country" type="text" class="form-control" value="India" placeholder="Enter Country">
                                                                                        </div>
                                                                                    </div>        
                                                                                </div>
                                                                        </div> 
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                                
                                                                            <div class="form-group">
                                                                                <label>Permanent Address <span style="color:red;">*</span>  <input type="checkbox" class="form-check-input" id="same_p_c_add" name="same_p_c_add"> (same as Correspondence)</label>
                                                                                </div>
                                                                            </div>
                                                                        <div class="col-md-12  col-sm-12 col-lg-12">
                                                                            <div class="form-group">
                                                                                    <div class="form-group purple-border">
                                                                                    <label>Line1 adresss:<span style="color:red;">*</span></label>
                                                                                    <input  id="p_line1" name="p_line1" type="text" class="form-control"  placeholder="Enter Line 1 address ">
                                                                                    <label>Line2 adresss:<span style="color:red;">*</span></label>
                                                                                    <input  id="p_line2" name="p_line2" type="text" class="form-control"  placeholder="Enter Line 2 address ">
                                                                                    <label>Line3 adresss:</span></label>
                                                                                    <input  id="p_line3" name="p_line3" type="text" class="form-control"  placeholder="Enter Line 3 address ">
                                                                                    <label>City:<span style="color:red;">*</span></label>    
                                                                                    <input  id="p_city" name="p_city"  type="text" class="form-control"  placeholder="Enter City ">
                                                                                    <label>State:<span style="color:red;">*</span></label>    
                                                                                    <select class="form-control" id="p_state" name="p_state">
                                                                                        <option value="">Please Select State</option>
                                                                                        <option value="Yes">Yes</option>
                                                                                        <option value="No">No</option>
                                                                                    </select>
                                                                                    <label>Pincode:<span style="color:red;">*</span></label>
                                                                                    <input id="p_pincode" name="p_pincode" type="text" class="form-control"  placeholder="Enter Pincode">
                                                                                    <label>Country:<span style="color:red;">*</span></label>
                                                                                    <input id="p_country" name="p_country" class="form-control" value="India" placeholder="Enter Country">
                                                                                    </div>
                                                                                </div>        
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                                <div class='row'>
                                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                                        <table class="table-responsive">
                                                                               <tr>
                                                                                
                                                                                <th>Perefence No</th>
                                                                                <th> Programme Applying For</th>
                                                                                <th> Qualifying Degree</th>
                                                                               
                                                                                <?php if(!empty($conditon[0])){ if($conditon[0]=='yes') 
                                                                                ?>
                                                                                    <th> Math And Statics</th>
                                                                                <?php 
                                                                                }  ?>
                                                                                <?php if(!empty($conditon[0])){ if($conditon[1]=='yes') 
                                                                                ?>
                                                                                     <th> 2 year Work Experince</th>
                                                                                <?php 
                                                                                } ?>
                                                                                </tr>
                                                                                <?php 
                                                                                $i=1;
                                                                                 foreach($application_details as $row)
                                                                                 {?>
                                                                                    <tr>
                                                                                      <td><?php echo $i;?></td>
                                                                                      <td><?php echo $row->program_desc;?></td>
                                                                                      <td><?php echo $this->Add_mtech_registration_model->get_degree_desc_by_program_id($row->degree_id);?></td>
                                                                                      <td><?php if(!empty($row->sub_math_12th)) { if($row->sub_math_12th=='Y'){ echo "Yes";} }?></td>
                                                                                      <td><?php if(!empty($row->non_min_work_exp)) { if($row->non_min_work_exp=='Y'){ echo "Yes";} }?></td>
                                                                                    </tr>
                                                                                 <?php  $i++;
                                                                                }
                                                                                ?>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <ul class="list-inline pull-right">
                                                                    <li><button type="submit" id="btn_personal_details" class="default-btn next-step">Save&Next</button></li>
                                                                </ul>
                                                           </form>
                                                        </div>
                                                        <!-- first tab personal detail end -->
                                                        <!-- second tab Qualification start -->
                                                        <div class="tab-pane" role="tabpanel" id="step2">
                                                            <h4 class="text-center" style="text-decoration: underline;">Qualification</h4>
                                                            <!-- <div class="row">
                                                                <div class="col-md-6 col-md-offset-3">
                                                                    <div class="form-group">
                                                                       <label>COAP registration:</label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                            <input id="course" name="coap_reg" value =" " type="text" class="form-control">
                                                                        </div>
                                                                        <p> If you not filled then please submit COAP Registration no before due date 14/09/2021. otherwise your registration will be cancel</p>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div> -->
                                                            <!-- <div class="row">
                                                                <div class="col-md-8">
                                                                   <p> Do You have B.tech degree from IIT with *.8 CGPA out of 10 ?</p>
                                                                </div>
                                                                <div class="col-md-4  col-sm-4 col-lg-4">
                                                                   <div class="form-group">
                                                                        
                                                                        <select class="form-control" id="btech_cgpa" name="btech_cgpa">
                                                                            <option value="">--Please Select --</option>
                                                                            <option value="Yes">Yes</option>
                                                                            <option value="No">No</option> 
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div> -->
                                                            <!-- <div id="btechyes">
                                                                <div class="row">
                                                                    <div class="col-md-8">
                                                                    <p> Are you Gate qualifiying candidate ?</p>
                                                                    </div>
                                                                    <div class="col-md-4  col-sm-4 col-lg-4">
                                                                    <div class="form-group"> 
                                                                            <select class="form-control" id="btech_gate_qual" name="btech_gate_qual">
                                                                                <option value="">--Please Select --</option>
                                                                                <option value="Yes">Yes</option>
                                                                                <option value="No">No</option> 
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> -->
                                                            <!-- if yes then show this for form  start-->
                                                             <?php 
                                                             $attributes = array('class' => 'email', 'id' => 'p_details','name'=>'p_details','enctype'=>'multipart/form-data');
                                                             echo form_open('admission/mtech/Adm_mtech_personal_details/get_education_detail', $attributes); ?>
                                                            <div id="hide_yes_no_gate">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                     <p> Enter your Gate Registration Number</p>
                                                                    </div>
                                                                    <div class="col-md-4  col-sm-4 col-lg-4">
                                                                    <div class="form-group">
                                                                            <!-- <label for="sel1">Select list:</label> -->
                                                                            <input type="text" class="form-control" id="gate_reg_no" name="gate_reg_no">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            
                                                                <div class="row">
                                                                   <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Gate Score:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="gate_score" name="gate_score" type="text" class="form-control" placeholder="Enter Gate Score">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6  col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Gate year of passing:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="gate_y_passing" name="gate_y_passing" type="text" class="form-control"  placeholder="Enter Gate year of passing">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6  col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Score card valid upto:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="gate_score_valid" name="gate_score_valid"type="text" class="form-control" placeholder=" ">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6  col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Result status in qualifying degree:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="gate_result_status" name="gate_result_status" type="text" class="form-control" placeholder="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                                   <h5 class="text-center" style="text-decoration: underline;">ACADEMIC DETAILS</h5>
                                                                   <table  id="qual" class="table-responsive">
                                                                    <thead>
                                                                       <tr> 
                                                                            <th>Exam type</th>
                                                                            <th>Name of exam </th>
                                                                            <th width="40">Institute/university name</th>
                                                                            <th>result Status</th>
                                                                            <th>marks</th>
                                                                            <th>year of passing</th>
                                                                            <th width="20">percentage/CGPA</th>
                                                                      </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                        <td data-column="Exam type"> <select  id="examtype10" name="examtype10"><option>10 th</option></select></td>
                                                                        <td data-column="Name of exam"><select  id="name_of_exam10" name="name_of_exam10"><option>10 th</option></td>
                                                                        <td data-column="Institute/university name"><input id="Institute_exam10" name="Institute_exam10" type="text" placeholder="Institute/university name"></td>
                                                                        <td data-column="result Status"><select  id="10passed" name="10passed"><option>Passed</option></td>
                                                                        <td data-column="marks System"><select  id="10percentage" name="10percentage"><option>Percentage</option></td>
                                                                        <td data-column="year of passing"><input id="10_y_pass" name="10_y_pass" style="width: 71%;"  type="text"></td>
                                                                        <td data-column="percentage/CGPA"><input id="10_p_cgpa" name="10_p_cgpa"  style="width: 71%;"  id="first_name" type="text"></td>
                                                                        </tr>
                                                                        <tr>
                                                                        <td data-column="Exam type"> <select  id="examtype12" name="examtype12"><option>12 th</option></select></td>
                                                                        <td data-column="Name of exam"><select  id="name_of_exam12" name="name_of_exam12"><option>12 th</option></td>
                                                                        <td data-column="Institute/university name"><input id="Institute12" name="Institute12" type="text" placeholder="Institute/university name"></td>
                                                                        <td data-column="result Status"><select  id="12passed" name="12passed"><option>Passed</option></td>
                                                                        <td data-column="marks System"><select   id="12percentage" name="12percentage"><option>Percentage</option></td>
                                                                        <td data-column="year of passing"><input id="12_y_pass" name="12_y_pass"  style="width: 71%;" type="text"></td>
                                                                        <td data-column="percentage/CGPA"><input id="12_p_cgpa" name="12_p_cgpa" style="width: 71%;" type="text"></td>
                                                                        </tr>
                                                                        <tr>
                                                                        <td data-column="Exam type"> <select  id="examtypeug" name="examtypeug"><option>UG Exam</option></select></td>
                                                                        <td data-column="Name of exam"><input  id="name_of_ugexam" name="name_of_ugexam" type="text" placeholder="UG Exam Name"></td>
                                                                        <td data-column="Institute/university name"><input id="Institute_examug" name="Institute_examug" type="text" placeholder="Institute/university name"></td>
                                                                        <td data-column="result Status"><select  id="ug_appearing" name="ug_appearing"><option>Appearing</option><option>Passed</option></td>
                                                                        <td data-column="marks System"><select  id="ug_percentage" name="ug_percentage"><option>Percentage</option></td>
                                                                        <td data-column="year of passing"><input id="ug_y_passing" name="ug_y_passing" style="width: 71%;"  type="text"></td>
                                                                        <td data-column="percentage/CGPA"><input id="ug_p_cgpa" name="ug_p_cgpa" style="width: 71%;"  type="text"></td>
                                                                        </tr>
                                                                         <!-- <tr>
                                                                        <td data-column="Exam type"> <select  id="examtypepg" name="examtypepg"><option>PG Exam</option></select></td>
                                                                        <td data-column="Name of exam"><input id="name_of_pgexam" name="name_of_pgexam" type="text" placeholder="PG Exam Name"></td>
                                                                        <td data-column="Institute/university name"><input id="Institute_exampg" name="Institute_examug" type="text" placeholder="Institute/university name"></td>
                                                                        <td data-column="result Status"><select id="pg_appearing" name="pg_appearing"><option>Appearing</option><option>Passed</option></td>
                                                                        <td data-column="marks System"><select id="pg_percentage" name="pg_percentage"><option>Percentage</option></td>
                                                                        <td data-column="year of passing"><input id="pg_y_passing" name="pg_y_passing" style="width: 71%;" type="text"></td>
                                                                        <td data-column="percentage/CGPA"><input id="pg_p_cgpa" name="pg_p_cgpa" style="width: 71%;" type="text"></td>
                                                                        </tr>
                                                                        <tr> -->
                                                                      
                                                                        
                                                                    </tbody>
                                                                
                                                                    </table>
                                                                    <input type="hidden"  id="countqual"  name="countqual"  value="">
                                                                    <input type="button"  id="addqual"  name="addmore"  value="Add More" style="float:right; margin-top: -40px;" class="btn btn-primary btn-sm">
                                                                </div>

                                                            </div>
                                                            <!-- if yes then show this for form end-->
                                                            <ul class="list-inline pull-right">
                                                                <!-- <li><button type="button" class="default-btn next-step">Back</button></li>
                                                                <li><button type="button" class="default-btn next-step skip-btn">Skip</button></li> -->
                                                                <li><button type="button" class="default-btn next-step" id="btnbackpersonal">Back</button></li>
                                                                <li><button type="Submit" id="btn_qualification" class="default-btn  next-step">Save&next</button></li>
                                                            </ul>
                                                          </form>
                                                        </div>
                                                        <!-- second tab Qualification end -->
                                                        <!-- third tab Work Experience start -->
                                                        <div class="tab-pane" role="tabpanel" id="step3">
                                                            
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                                <?php  $attributes = array('class' => 'email', 'id' => 'p_details','name'=>'p_details','enctype'=>'multipart/form-data');
                                                                echo form_open('admission/mtech/Adm_mtech_personal_details/get_work_experience_detail', $attributes); ?>
                                                                <h4 class="text-center" style="text-decoration: underline;">Work Experience</h4>
                                                                   <table id="workexp"  class="table-responsive">
                                                                    <thead>
                                                                       <tr>
                                                                            <th>Designation </th>
                                                                            <th>Organization</th>
                                                                            <th>Nature of work</th>
                                                                            <th>Duration(in month)</th>
                                                                            <th>Sector</th> 
                                                                            <th>From</th> 
                                                                            <th>To</th>   
                                                                      </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                        <td data-column="Designation"><input id="degination1" name="degination1" type="text" class="form-control" placeholder="1st Designation "></td>
                                                                        <td data-column="organization"><input  id="organization1" name="organization1" type="text" class="form-control"  placeholder="1st Organisation "></td>
                                                                        <td data-column="Nature of work"><input id="nature_of_work1" name="nature_of_work1" type="text" class="form-control" ></td>
                                                                        <td data-column="Duration(in month)"><input  id="duration1" name="duration1" type="text" class="form-control"></td>
                                                                        <td data-column="sector"><select class="form-control" id="sector1" name="sector1"><option value='Academic institution'>Academic institution</option><option value="PSU">PSU</option><option value="Govt.R&D orginizations">Govt.R&D orginizations</option><option value="Govt. recognized private R&D orginizations">Govt. recognized private R&D orginizations</option><option value="Industry">Industry</option></select></td>
                                                                        <td data-column="From"><input id="from1" name="from1"  type="date" class="form-control"></td>
                                                                        <td data-column="To"><input id="to1" name="to1"  type="date" class="form-control"></td>
                                                                        </tr>
                                                                        <!-- <tr>
                                                                        <td data-column="Designation"><input id="degination2" name="degination2" type="text" class="form-control"  placeholder="2nd Designation"></td>
                                                                        <td data-column="organization"><input id="organization2" name="organization2" type="text" class="form-control"  placeholder="2nd Organisation"></td>
                                                                        <td data-column="Nature of work"><input id="nature_of_work2" name="nature_of_work2" type="text" class="form-control" ></td>
                                                                        <td data-column="Duration(in month)"><input id="duration2" name="duration2" type="text" class="form-control" ></td>
                                                                        <td data-column="sector"><select class="form-control" id="sector2" name="sector2"><option value='Academic institution'>Academic institution</option><option value="PSU">PSU</option><option value="Govt.R&D orginizations">Govt.R&D orginizations</option><option value="Govt. recognized private R&D orginizations">Govt. recognized private R&D orginizations</option><option value="Industry">Industry</option></select></td>
                                                                        <td data-column="From"><input id="from2" name="from2"  type="date" class="form-control"></td>
                                                                        <td data-column="To"><input id="to2" name="to2"  type="date" class="form-control"></td>
                                                                        </tr>
                                                                        <tr>
                                                                        <td data-column="Designation"><input id="degination3" name="degination3" type="text" class="form-control"  placeholder="3rd Designation"></td>
                                                                        <td data-column="organization"><input id="organization3" name="organization3" type="text" class="form-control" placeholder="3rd Organisation"></td>
                                                                        <td data-column="Nature of work"><input id="nature_of_work3" name="nature_of_work3" type="text" class="form-control" ></td>
                                                                        <td data-column="Duration(in month)"><input id="duration3" name="duration3" type="text" class="form-control" ></td>
                                                                        <td data-column="sector"><select class="form-control" id="sector3" name="sector3"><option value='Academic institution'>Academic institution</option><option value="PSU">PSU</option><option value="Govt.R&D orginizations">Govt.R&D orginizations</option><option value="Govt. recognized private R&D orginizations">Govt. recognized private R&D orginizations</option><option value="Industry">Industry</option></select></td>
                                                                        <td data-column="From"><input id="from3" name="from3"  type="date" class="form-control"></td>
                                                                        <td data-column="To"><input id="to3" name="to3"  type="date" class="form-control"></td>
                                                                        </tr>
                                                                        <tr>
                                                                        <td data-column="Designation"><input id="degination4" name="degination4" type="text" class="form-control"  placeholder="4th Designation"></td>
                                                                        <td data-column="organization"><input id="organization4" name="organization4" type="text" class="form-control"  placeholder="4th Organisation "></td>
                                                                        <td data-column="Nature of work"><input id="nature_of_work4" name="nature_of_work4" type="text" class="form-control" ></td>
                                                                        <td data-column="Duration(in month)"><input  id="duration4" name="duration4" type="text" class="form-control" ></td>
                                                                        <td data-column="Sector"><select class="form-control" id="sector4" name="sector4"><option value='Academic institution'>Academic institution</option><option value="PSU">PSU</option><option value="Govt.R&D orginizations">Govt.R&D orginizations</option><option value="Govt. recognized private R&D orginizations">Govt. recognized private R&D orginizations</option><option value="Industry">Industry</option></select></td>
                                                                        <td data-column="From"><input id="from4" name="from4"  type="date" class="form-control"></td>
                                                                        <td data-column="To"><input id="to4" name="to4"  type="date" class="form-control"></td>
                                                                        
                                                                        </tr> -->
                                                                        
                                                                        
                                                                        
                                                                    </tbody>
                                                                    </table>
                                                                    <input type="hidden"  id="countexp"  name="countexp"  value="">
                                                                    <input type="hidden"  id="tab_id"  name="tab_id"  value="<?php echo $tab ; ?>">
                                                                    <input type="button" id="addexp"  name="addmore" value="Add More" style="float:right; margin-top: -40px;" class="btn btn-primary btn-sm">
                                                                </div>

                                                            </div>
                                                            <ul class="list-inline pull-right">
                                                                <li><button type="button" class="default-btn next-step" id="btnbackeducation">Back</button></li>
                                                                <!-- <li><button type="button" class="default-btn next-step skip-btn">Skip</button></li> -->
                                                                <li><button type="submit" id="btn_work_experince" class="default-btn next-step">submit</button></li>
                                                            </ul>
                                                            </form>
                                                        </div>
                                                        <!-- third tab Work Experience end -->
                                                        <!-- fourth tab document upload start -->
                                                        <div class="tab-pane" role="tabpanel" id="step4">
                                                            
                                                            <h4 class="text-center" style="text-decoration: underline;">document upload</h4>
                                                            <div class="row">
                                                             <?php  $attributes = array('class' => 'email', 'id' => 'p_details','name'=>'p_details','enctype'=>'multipart/form-data');
                                                                echo form_open('admission/mtech/Adm_mtech_personal_details/insert_document', $attributes); ?>
                                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                                    <div class="row">
                                                                        <!-- <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">Qualifiying 10th mark-sheet</label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="ten_mark_sheet" name="ten_mark_sheet" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" type="button">Remove</button>
                                                                                        <button class="btn btn-primary" type="button">Preview</button>
                                                                                    </div>
                                                                                </div>  
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">Qualifiying 12th mark-sheet</label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="twl_mark_sheet" name="twl_mark_sheet" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" type="button">Remove</button>
                                                                                        <button class="btn btn-primary" type="button">Preview</button>
                                                                                    </div>
                                                                                </div>  
                                                                            </div>
                                                                        </div> -->
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">UG Marksheet</label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="ug_mark_sheet" value="dsfsdf" name="ug_mark_sheet" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploadug" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removeug" type="button">Remove</button>
                                                                                        <!-- <button class="btn btn-primary" type="button">Preview</button> -->
                                                                                        <?php  
                                                                                         function checking($upload_document,$flag)
                                                                                         {
                                                                                            $m=''; 
                                                                                            foreach ($upload_document as $value) {
                                                                                                 $to = $value['doc_id'];
                                                                                                 if($to==$flag)
                                                                                                 {
                                                                                                   $m=base_url().$value['doc_path'];
                                                                                                 
                                                                                                 }
                                                                                                 
                                                                                                }
                                                                                                return $m;
                                                                                         }
                                                                                         if(!empty($upload_document))
                                                                                         {
                                                                                            $v=checking($upload_document,'ugm');
                                                                                         }
                                                                                        
                                                                                             ?>
                                                                                        <a id="uglink" href="<?php if(!empty($v)) {echo $v;}?>" <?php if(!empty($v)) {echo 'target="iframed"';} else {echo '"#"';}?>><button id="ugpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div> 
                                                                                <p style="color: green" id="msgug"><?php if(!empty($v)) {echo "You was Uploaded file UG Marksheet can be viewed using Preview button";}?></p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">DOB</label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-6">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="filedob" name="file_dob" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        
                                                                                        <button id="uploadob" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="dobrem" type="button">Remove</button>
                                                                                        <?php  
                                                                                        
                                                                                         if(!empty($upload_document))
                                                                                         {
                                                                                            $v=checking($upload_document,'dob');
                                                                                         }
                                                                                        
                                                                                             ?>
                                                                                        <a id="link1" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="dobpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div> 
                                                                                <p style="color: green" id="msg"><?php if(!empty($v)) {echo "You was Uploaded file DOB can be viewed using Preview button";}?></p> 
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">Colour Blindness</label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="colour_blindness_doc" name="colour_blindness_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploadcb" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removecb" type="button">Remove</button>
                                                                                        <!-- <button class="btn btn-primary" type="button">Preview</button> -->
                                                                                        <?php  
                                                                                        
                                                                                        if(!empty($upload_document))
                                                                                        {
                                                                                           $v=checking($upload_document,'col');
                                                                                        }
                                                                                       
                                                                                            ?>
                                                                                        <a id="cblink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="cbpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div> 
                                                                                <p style="color: green" id="msgcb"><?php if(!empty($v)) {echo "You was Uploaded file Colour Blindness can be viewed using Preview button";}?></p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">Gate Score Card</label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="gate_score_card_doc" name="gate_score_card_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploadgsc" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removegsc" type="button">Remove</button>
                                                                                        <?php  
                                                                                        
                                                                                        if(!empty($upload_document))
                                                                                        {
                                                                                           $v=checking($upload_document,'gate');
                                                                                        }
                                                                                       
                                                                                            ?>
                                                                                        <a id="gsclink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="gscpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div> 
                                                                                <p style="color: green" id="msggsc"><?php if(!empty($v)) {echo "You was Uploaded file Gate Score Card can be viewed using Preview button";}?></p> 
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">PWD certificate</label>
                                                                            <div class="form-group">
                                                                               <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="pwd_certificate_doc" name="pwd_certificate_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploadpwd" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removepwd" type="button">Remove</button>
                                                                                        <?php  
                                                                                        
                                                                                        if(!empty($upload_document))
                                                                                        {
                                                                                           $v=checking($upload_document,'pwd');
                                                                                        }
                                                                                       
                                                                                            ?>
                                                                                        <a id="pwdlink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="pwdpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div> 
                                                                                <p style="color: green" id="msgpwd"><?php if(!empty($v)) {echo "You was Uploaded file PWD certificate can be viewed using Preview button";}?></p> 
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">Category certificate</label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="cat_certificate_doc" name="cat_certificate_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploadcat" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removecat" type="button">Remove</button>
                                                                                        <?php  
                                                                                        
                                                                                        if(!empty($upload_document))
                                                                                        {
                                                                                           $v=checking($upload_document,'caste');
                                                                                        }
                                                                                       
                                                                                            ?>
                                                                                        <a id="catlink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="catpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div> 
                                                                                <p style="color: green" id="msgcat"><?php if(!empty($v)) {echo "You was Uploaded file Category certificate can be viewed using Preview button";}?></p> 
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">PG Marksheet</label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="pg_marksheet_doc" name="pg_marksheet_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploadpg" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removepg" type="button">Remove</button>
                                                                                        <?php  
                                                                
                                                                                            if(!empty($upload_document))
                                                                                            {
                                                                                            $v=checking($upload_document,'pgm');
                                                                                            }
                                                                                       
                                                                                            ?>
                                                                                        <a id="pglink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="pgpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div> 
                                                                                <p style="color: green" id="msgpg"><?php if(!empty($v)) {echo "You was Uploaded file PG Marksheet can be viewed using Preview button";}?></p>   
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">Work Experience</label>
                                                                            <div class="form-group">
                                                                               <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="work_experience_doc" name="work_experience_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploadwor" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removewor" type="button">Remove</button>
                                                                                        <?php  
                                                                                            if(!empty($upload_document))
                                                                                            {
                                                                                            $v=checking($upload_document,'work');
                                                                                            }
                                                                                            ?>
                                                                                        <a id="worlink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?><button id="workpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div> 
                                                                                <p style="color: green" id="msgwork"><?php if(!empty($v)) {echo "You was Uploaded file Work Experience can be viewed using Preview button";}?></p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                  <?php  
                                                                                    if(!empty($upload_document))
                                                                                    {
                                                                                    $v=checking($upload_document,'photo');
                                                                                    }
                                                                                   ?>   
                                                                                   <label class="control-label">Photo</label>
                                                                                    <div class="form-group">
                                                                                        
                                                                                                <input accept="image/x-png,image/gif,image/jpeg"  type="file" name="photo" id="photo" placeholder="choose file" class="form-control">
                                                                                                <p style="color: green" id="msgph"><?php if(!empty($v)) {echo "Image was Uploaded";}?></p>
                                                                                                <button  id="uploadph" class="btn btn-success" type="button">Upload <button id="removeph" class="btn btn-danger" type="button">Remove</button></button>
                                                                                     
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                 
                                                                                  <img src="<?Php if(!empty($v)) { echo $v; } else { echo base_url().'assets/images/photo.png';} ?>" id="p" style='width:159px;height:181px;'>
                                                                    
                                                                                  
                                                                            </div>
                                                                               
                                                                                </div>

                                                                            </div>
                                                            
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <?php  
                                                                                    if(!empty($upload_document))
                                                                                    {
                                                                                      $v=checking($upload_document,'signature');
                                                                                    }
                                                                                   ?>   
                                                                                   <label class="control-label">Signature</label>
                                                                                    <div class="form-group">                                  
                                                                                            <input accept="image/x-png,image/gif,image/jpeg"  type="file" name="signature" id="signature" class="form-control">
                                                                                            <p style="color: green" id="msgsg"><?php if(!empty($v)) {echo "Image was Uploaded";}?></p>
                                                                                            <button  id="uploadsg" class="btn btn-success" type="button">Upload <button  id="removesg" class="btn btn-danger" type="button">Remove</button></button>
                                                                                            <!-- <button  id="uploadpg" class="btn btn-success" type="button">Upload</button> -->
                                                                                
                                                                                    </div>

                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                     <div class="form-group"> 
                                                                                       <img src="<?Php if(!empty($v)) {echo $v;} else {  echo base_url().'assets/images/photo.png';} ?>" id="q" style='width:158px;;height:70px;'>
                                                                                     </div>
                                                                                    
                                                                                </div>

                                                                            </div>
                                                            
                                                                        </div>
                                                                    </div>                                                                   
                                                                </div>
                                                                <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>COAP registration:</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                                <input id="coap_reg" name="coap_reg" value =" " type="text" class="form-control">
                                                                            </div>
                                                                            <p> If you not filled then please submit COAP Registration no before due date 14/09/2021. otherwise your registration will be cancel</p>
                                                                        </div>
                                                                    </div>
                                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                                   <div class="conatinerg">
                                                                   <div class="frame">
                                                                       <div class="resp-container">
                                                                          <!-- <p style="color: red"><span style= "color:red;">*<strong>Your documents should be in pdf format and size should be maximum 1 MB</strong></span></p> -->
                                                                           <!-- <p style="color: red"><span style= "color:red;">*<strong>Load single qualification file for multiple qualifications.</strong></strong></span></p> -->
                                                                           <!-- <p style="color: red"><span style= "color:red;">*<strong>Load single experience file for multiple experiences with maximum size 2 MB.</strong></span></p> -->
                                                                
                                                                            <iframe  style="width: 417px;;height: 480px;"  class="resp-iframe" srcdoc="<p> Please click on “Preview” to view the uploaded document</p>" name="iframed" src=" " id="iframed"></iframe>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                               
                                                                   
                                                                
                                                               
                                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                                   <div class="row">
                                                                       <div class="col-md-3">
                                                                          <label class="checkbox-inline"><input type="checkbox" value="">Declaration:</label>
                                                                       </div>
                                                                       

                                                                   </div>
                                                                   <div class="row">
                                                                       <div class="col-md-11 col-md-offset-1">
                                                                        <p>I hereby declare that I have read and understood the conditions of eligibilty for 2 Years MBA / MBA in Business Analytics admission 2021.I fulfill the minimum eligibility criteria and I have provided the necessary information in this regard. In the event of the information being found incorrect or misleading, my candidature shall be liable to cancellation at any time. Further, I have carefully read all the instructions and I accept them and shall not raise any dispute in future over the same.</p>
                                                                       </div>

                                                                   </div>
                                                                </div>
                                                            </div>
                                                            <ul class="list-inline pull-right">
                                                                <li><button type="submit" class="default-btn next-step">Submit</button></li>
                                                               
                                                            </ul>
                                                         </form>
                                                        </div>
                                                        <!-- fourth tab document upload end -->
                                                        <!-- fifth tab Payment start -->
                                                        
                                                        <!-- fifth tab Payment end-->
                                                        <div class="clearfix"></div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">Candidates can now check their admission status.</marquee>
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
    </div> <!--row col-md-2 end  -->
</div><!--row start  -->
<script type="text/javascript">
//  $("#btechyes").hide();
//  $("#hide_yes_no_gate").hide();
   
  $(document).ready(function (e)
   { 
    var tabbb = $("#tab_id").val();
    if(tabbb=='personal_details')
    {
        $('.nav-tabs li.active').removeClass('active');
        $('#tab1').addClass('active');
        $('#step1').addClass('active');
    }
    if(tabbb=='education')
    {
        $('.nav-tabs li.active').removeClass('active');
        $("#step1").removeClass('active');
        $('#tab2').addClass('active');
        $('#step2').addClass('active');
    }
    if(tabbb=='work_experience')
    {
        $('.nav-tabs li.active').removeClass('active');
        $("#step1").removeClass('active');
        $('#tab3').addClass('active');
        $('#step3').addClass('active');
    }
    $('#btnbackpersonal').click(function(e){
        e.preventDefault();
        $('.nav-tabs li.active').removeClass('active');
        $('#tab2').removeClass('active');
        $('#step2').removeClass('active');
        $('#tab1').addClass('active');
        $('#step1').addClass('active');
    })
    $('#btnbackeducation').click(function(e){
        e.preventDefault();
        $('.nav-tabs li.active').removeClass('active');
        $('#tab3').removeClass('active');
        $('#step3').removeClass('active');
        $('#tab2').addClass('active');
        $('#step2').addClass('active');
    })
        
        // dynamic row for education strnatcasecmp
    var i=1; 
    var j=0; 
   
    $("#addqual").click(function(){
	 var html='<tr id="row'+i+'"><td><select  id="examtypepg'+i+'" name="examtypepg[]"><option value="PG Exam">PG Exam</option></select></td><td><input  id="name_of_pgexam'+i+'" name="name_of_pgexam[]" type="text" placeholder="UG Exam Name"></td> <td><input id="Institute_examug'+i+'" name="Institute_exampg[]" type="text" placeholder="Institute/university name"></td> <td><select  id="pg_appearing'+i+'" name="pg_appearing[]"><option>Appearing</option><option>Passed</option></select></td><td><select  id="pg_percentage'+i+'" name="pg_percentage[]"><option>Percentage</option></select></td><td><input id="ug_y_passing'+i+'" name="pg_y_passing[]"  type="text" style="width: 71%;"></td><td><input id="pg_p_cgpa'+i+'" name="pg_p_cgpa[]" type="text" style="width: 71%;"><br><button class="btn-danger" type="button" id="removequal'+i+'">Remove</button></td></tr>';
     $("#qual").append(html);  
     $("#countqual").val(j);
     $("#countqual").val(i);
     $("#qual").on('click','#removequal'+i+'',function(){ 
     $(this).closest('tr').remove();
    var tot=$("#countqual").val();
    $("#countqual").val(tot-1);
      })  
      i++;
    })
     
    $("#addexp").click(function(){

	 var html='<tr><td data-column="Designation"><input id="degination1'+i+'" name="degination[]" type="text" class="form-control" placeholder="Designation "></td><td data-column="organization"><input  id="organization'+i+'" name="organization[]" type="text" class="form-control"  placeholder="Organisation "></td><td data-column="Nature of work"><input id="nature_of_work'+i+'" name="nature_of_work[]" type="text" class="form-control" ></td><td data-column="Duration(in month)"><input  id="duration1'+i+'" name="duration[]" type="text" class="form-control"></td><td data-column="sector"><select class="form-control" id="sector'+i+'" name="sector[]"><option value="Academic institution">Academic institution</option><option value="PSU">PSU</option><option value="Govt.R&D orginizations">Govt.R&D orginizations</option><option value="Govt. recognized private R&D orginizations">Govt. recognized private R&D orginizations</option><option value="Industry">Industry</option></select></td><td data-column="From"><input id="from'+i+'" name="from[]"  type="date" class="form-control"></td><td data-column="To"><input id="to'+i+'" name="to[]"  type="date" class="form-control"><br><button class="btn-danger" type="button" id="removexpr'+i+'">Remove</button></td></tr>';
     $("#workexp").append(html); 
     $("#countexp").val(j);
     $("#countexp").val(i);
     $("#workexp").on('click','#removexpr'+i+'',function(){ 
     $(this).closest('tr').remove();
     var tot=$("#countexp").val();
      }) 
      i++; 
    })
    $("#btn_personal_details").click(function(){
        
        var r = confirm("Do You want Submit");
        if(r == true) 
        {
           return true;
        }
        else
        {
           return false;                
        }    
    })

    
    // $('#tab1').click(function(e){
    //   e.preventDefault();
     
    //    return false;
    // })
    //  $('#tab2').click(function(e){
    //   e.preventDefault(); 
    //   return false;
        
    // })
    // $('#tab3').click(function(e){
    //   e.preventDefault(); 
    //   return false;
        
    // })

   

    $('#tab4').click(function(e){
      e.preventDefault(); 
      alert("first complete back");
      return false;
        
    })
    $('#tab5').click(function(e){
        alert("first complete back");
      e.preventDefault(); 
      return false;
        
    })
    // table end
        // $('#uploadob').on('click', function ()
        // {  
        //     var filesselect=document.getElementById("filedob").files.length;
        //       if(filesselect==0){
        //       alert("You have not selected file");
        //       return false;

        //     }
        //     var file_data = $('#filedob').prop('files')[0]; 
        //     var match       = ["application/pdf"]; 
        //     var fileSize    = file_data.size; 
        //     var maxSize     = 1*1024*1024;
        //     var fileType    = file_data.type;
           
        //     if(!((fileType==match[0]) || (fileType==match[1])))
        //     {
        //        alert("File type should be in pdf format");
        //        document.getElementById("filedob").value='';
        //        document.getElementById("link1").href='';
        //        return false;
        //     }
        //     if(fileSize > maxSize)
        //     {
        //       alert("File size should be maximum 1 MB");
        //       document.getElementById("filedob").value='';
        //       document.getElementById("link1").href='';
        //       return false;
        //     } 
        //     var valchek='filedob';
        //     console.log(file_data);
        //     var form_data = new FormData();
        //     form_data.append('filedob', file_data);
        //     $.ajax({
        //       url: '<?Php echo base_url(); ?>index.php/admission/mtech/Adm_mtech_personal_details/document_upload/'+valchek, // point to server-side controller method
        //       dataType: 'json', // what to expect back from the server
        //       cache: false,
        //       contentType: false,
        //       processData: false,
        //       data: form_data,
        //       type: 'post',
        //       success: function (response){
        //         console.log(response);
        //           alert(response['two']);
        //           alert(response['link']);
        //           // $('#link1').prop('href',response['link']);
        //           // $('#iframed').prop('src',response['link']);
        //           dob=1;
        //           alert(response['msg']);
        //           $('#msg').html(response['msg']);
        //           $("#uploadob").css("background-color", "green");
        //           $('#link1').attr('href',response['link']);
        //           $('#link1').attr('target','iframed'); // display success response from the server
        //       },
        //       error: function (response){
        //         alert("helosdfsadf");
        //           $('#msg').html(response); // display error response from the server
        //       }
        //     });
        //  });
        // $('#dobrem').on('click', function ()
        // {    
        //     var valchek='filedob';      
        //    var filesselect=document.getElementById("filedob").files.length;
        //       if(filesselect==0){
        //       alert("You have not selected file");
        //       return false;

        //     }
        //   $('#loader').show();
        //   var file_data = $('#filedob').prop('files')[0];
        //   var form_data = new FormData();
        //   form_data.append('filedob', file_data);
        //   $.ajax({
        //       url: '<?Php echo base_url(); ?>index.php/admission/mtech/Adm_mtech_personal_details/document_remove/'+valchek, // point to server-side controller method
        //       dataType: 'json', // what to expect back from the server
        //       cache: false,
        //       contentType: false,
        //       processData: false,
        //       data: form_data,
        //       type: 'post',
        //       success: function (response){
        //           dob=0;
        //           alert(response['msg']);
        //            $('.progress').hide();
        //           $('#msg').html(response['msg']);
        //           $("#uploadob").removeAttr("style");
        //           document.getElementById("filedob").value='';
        //           document.getElementById("link1").href='';
        //           document.getElementById("link1").target='';
        //            //document.getElementById("iframed").innerHtml='';
        //            //$('#iframed').attr('src', '');
        //           var iframe = document.getElementById("iframed");
        //           var html = "";
        //           iframe.contentWindow.document.open();
        //           iframe.contentWindow.document.write(html);
        //           iframe.contentWindow.document.close();
        //          // display success response from the server
        //       },
        //       error: function (response){
        //         alert(response);
        //         $('#msg').html(response); // display error response from the server
        //       }
        //   });
        // })

        // $('#dobpri').click(function()
        // {
        //     var filesselect=document.getElementById("filedob").files.length;
        //       if(filesselect==0){
        //       alert("You have not selected file");
        //       return false;

        //      }

        //    var poo= $('#link1').attr("href");
        //    if(poo==='')
        //    {
        //         alert("pdf not upload yet");
        //         return false;
        //         var iframe = document.getElementById("iframed");
        //         var html = "";

        //         iframe.contentWindow.document.open();
        //         iframe.contentWindow.document.write(html);
        //         iframe.contentWindow.document.close();
        //    }
        //    else
        //    {
        //         var iframe = document.getElementById("iframed");
        //         var html = "";

        //         iframe.contentWindow.document.open();
        //         iframe.contentWindow.document.write(html);
        //         iframe.contentWindow.document.close();
        //    }

        // })
    //   ugcertificate start here
        $('#uploadug').on('click', function ()
        {   
            var filename='ug_mark_sheet';
            var link='uglink';
            var msg='msgug';
            var upload_button_id='uploadug';
            doc_upload(filename,link,msg,upload_button_id);
            // alert("helll");

        });
        $('#removeug').on('click', function ()
        {  
            var filename='ug_mark_sheet';
            var link='uglink';
            var msg='msgug';
            var upload_button_id='uploadug';
            doc_remove(filename,link,msg,upload_button_id);
           
        });
        $('#ugpri').on('click', function ()
        {   
            var filename='ug_mark_sheet';
            var link='uglink';
            var msg='msgug';
            var upload_button_id='uploadug';
            doc_preview(filename,link,msg,upload_button_id);
           
        });
        //   ugcertificate end here 
        $('#uploadob').on('click', function ()
        {   
            var filename='filedob';
            var link='link1';
            var msg='msg';
            var upload_button_id='uploadob';
            doc_upload(filename,link,msg,upload_button_id);
            // alert("helll");

        });
        $('#dobrem').on('click', function ()
        {  
            var filename='filedob';
            var link='link1';
            var msg='msg';
            var upload_button_id='uploadob';
            doc_remove(filename,link,msg,upload_button_id);
           
        });
        $('#dobpri').on('click', function ()
        {   
            var filename='filedob';
            var link='link1';
            var msg='msg';
            var upload_button_id='uploadob';
            doc_preview(filename,link,msg,upload_button_id);
           
        });
         //   ugcertificate end here 
         $('#uploadcb').on('click', function ()
        {   
            var filename='colour_blindness_doc';
            var link='cblink';
            var msg='msgcb';
            var upload_button_id='uploadcb';
            doc_upload(filename,link,msg,upload_button_id);
            // alert("helll");

        });
        $('#removecb').on('click', function ()
        {  
            var filename='colour_blindness_doc';
            var link='cblink';
            var msg='msgcb';
            var upload_button_id='uploadcb';
            doc_remove(filename,link,msg,upload_button_id);
           
        });
        $('#cbpri').on('click', function ()
        {   
            var filename='colour_blindness_doc';
            var link='cblink';
            var msg='msgcb';
            var upload_button_id='uploadcb';
            doc_preview(filename,link,msg,upload_button_id);
           
        });

         //   ugcertificate end here 
        $('#uploadgsc').on('click', function ()
        {   
            var filename='gate_score_card_doc';
            var link='gsclink';
            var msg='msggsc';
            var upload_button_id='uploadgsc';
            doc_upload(filename,link,msg,upload_button_id);
            // alert("helll");

        });
        $('#removegsc').on('click', function ()
        {  
            var filename='gate_score_card_doc';
            var link='gsclink';
            var msg='msggsc';
            var upload_button_id='uploadgsc';
            doc_remove(filename,link,msg,upload_button_id);
           
        });
        $('#gscpri').on('click', function ()
        {   
            var filename='gate_score_card_doc';
            var link='gsclink';
            var msg='msggsc';
            var upload_button_id='uploadgsc';
            doc_preview(filename,link,msg,upload_button_id);
           
        });
       //   pwd_certificate_doc start here 
       $('#uploadpwd').on('click', function ()
        {   
            var filename='pwd_certificate_doc';
            var link='pwdlink';
            var msg='msgpwd';
            var upload_button_id='uploadpwd';
            doc_upload(filename,link,msg,upload_button_id);
            // alert("helll");

        });
        $('#removepwd').on('click', function ()
        {  
            var filename='pwd_certificate_doc';
            var link='pwdlink';
            var msg='msgpwd';
            var upload_button_id='uploadpwd';
            doc_remove(filename,link,msg,upload_button_id);
           
        });
        $('#pwdpri').on('click', function ()
        {   
            var filename='pwd_certificate_doc';
            var link='pwdlink';
            var msg='msgpwd';
            var upload_button_id='uploadpwd';
            doc_preview(filename,link,msg,upload_button_id);
           
        });

        // cat_certificate_doc start here 
        $('#uploadcat').on('click', function ()
        {   
            var filename='cat_certificate_doc';
            var link='catlink';
            var msg='msgcat';
            var upload_button_id='uploadcat';
            doc_upload(filename,link,msg,upload_button_id);
            // alert("helll");

        });
        $('#removecat').on('click', function ()
        {  
            var filename='cat_certificate_doc';
            var link='catlink';
            var msg='msgcat';
            var upload_button_id='uploadcat';
            doc_remove(filename,link,msg,upload_button_id);
           
        });
        $('#catpri').on('click', function ()
        {   
            var filename='cat_certificate_doc';
            var link='catlink';
            var msg='msgcat';
            var upload_button_id='uploadcat';
            doc_preview(filename,link,msg,upload_button_id);
           
        });

        // pg_marksheet_doc start here 
        $('#uploadpg').on('click', function ()
        {   
            var filename='pg_marksheet_doc';
            var link='pglink';
            var msg='msgpg';
            var upload_button_id='uploadpg';
            doc_upload(filename,link,msg,upload_button_id);
            // alert("helll");

        });
        $('#removepg').on('click', function ()
        {  
            var filename='pg_marksheet_doc';
            var link='pglink';
            var msg='msgpg';
            var upload_button_id='uploadpg';
            doc_remove(filename,link,msg,upload_button_id);
           
        });
        $('#pgpri').on('click', function ()
        {   
            var filename='pg_marksheet_doc';
            var link='pglink';
            var msg='msgpg';
            var upload_button_id='uploadpg';
            doc_preview(filename,link,msg,upload_button_id);
           
        });
        // work_experience_doc start here 
        $('#uploadwor').on('click', function ()
        {   
            var filename='work_experience_doc';
            var link='worlink';
            var msg='msgwork';
            var upload_button_id='uploadwor';
            doc_upload(filename,link,msg,upload_button_id);
            // alert("helll");

        });
        $('#removewor').on('click', function ()
        {  
            var filename='work_experience_doc';
            var link='worlink';
            var msg='msgwork';
            var upload_button_id='uploadwor';
            doc_remove(filename,link,msg,upload_button_id);
           
        });
        $('#worpri').on('click', function ()
        {   
            var filename='work_experience_doc';
            var link='worlink';
            var msg='msgwork';
            var upload_button_id='uploadwor';
            doc_preview(filename,link,msg,upload_button_id);
           
        });

        // photo signature upload

        $('#uploadph').on('click', function ()
        {  
            var filename='photo';
            var link='phlink';
            var msg='msgphp';
            var upload_button_id='uploadph';
            upload_photo_signature(filename,link,msg,upload_button_id);
            // alert("helll");

        });
        $('#removeph').on('click', function ()
        {  
            var filename='photo';
            var link='phlink';
            var msg='msgph';
            var upload_button_id='uploadph';
            remove_photo_signature(filename,link,msg,upload_button_id);
           
        });
        $('#uploadsg').on('click', function ()
        {   
            var filename='signature';
            var link='sglink';
            var msg='msgsg';
            var upload_button_id='uploadsg';
            upload_photo_signature(filename,link,msg,upload_button_id);
            // alert("helll");

        });
        $('#removesg').on('click', function ()
        {  
            var filename='signature';
            var link='sglink';
            var msg='msgsg';
            var upload_button_id='uploadsg';
            remove_photo_signature(filename,link,msg,upload_button_id);
           
        });
    });

$(document).ready(function() {
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
        $("#p_country").val('');            
      } 

    });

    // $("#btech_cgpa").change(function(){      
    //    var betchcgpa=$("#btech_cgpa").val();
    //    if(betchcgpa=='Yes')
    //    {  
    //       $("#btechyes").show();
    //       $("#hide_yes_no_gate").hide();
    //    }
    //    else if(betchcgpa=='No')
    //    { 
    //      $("#btechyes").hide();
    //      $("#hide_yes_no_gate").show();
    //    }
    //    else
    //    {
    //      $("#btechyes").hide();
    //      $("#hide_yes_no_gate").hide();
    //    }
    // })
    // $("#btech_gate_qual").change(function(){

    //     var btech_gate_qual_yes=$("#btech_gate_qual").val();
    //     if(btech_gate_qual_yes=='Yes')
    //     { 
    //        $("#hide_yes_no_gate").show();
    //     }
    //     else
    //     {
    //         $("#hide_yes_no_gate").hide();
    //     }
    //  })
});
function doc_upload(filenameid,link,msg,button_id)
{  
    var filenameid=filenameid;
    var base_url =window.location.origin;
    // console.log(base_url);
    // alert(filenameid+link+msg);
    // return false;
    var filesselect=document.getElementById(filenameid).files.length;
        if(filesselect==0){
        alert("You have not selected file");
        return false;
    }
    var file_data = $('#'+filenameid).prop('files')[0]; 
    var match       = ["application/pdf"]; 
    var fileSize    = file_data.size; 
    var maxSize     = 1*1024*1024;
    var fileType    = file_data.type;

    if(!((fileType==match[0]) || (fileType==match[1])))
    {
        alert("File type should be in pdf format");
        document.getElementById(filenameid).value='';
        document.getElementById(link).href='';
        return false;
    }
    if(fileSize > maxSize)
    {
        alert("File size should be maximum 1 MB");
        document.getElementById(filenameid).value='';
        document.getElementById(link).href='';
        return false;
    } 
    var valchek=filenameid;
    // console.log(file_data);
    var form_data = new FormData();
    form_data.append(filenameid, file_data);
    $.ajax({
        url: base_url+'/index.php/admission/mtech/Adm_mtech_personal_details/document_upload/'+valchek, // point to server-side controller method
        dataType: 'json', // what to expect back from the server
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function (response){
        console.log(response);
            // alert(response['two']);
            // alert(response['link']);
            // alert(response['doc_msg']);
            // $('#link1').prop('href',response['link']);
            // $('#iframed').prop('src',response['link']);
            if(response['doc_msg']=='doc_ok')
            {
                dob=1;
                alert(response['msg']);
                $('#'+msg).html(response['msg']);
                $("#"+button_id).css("background-color", "green");
                $('#'+link).attr('href',response['link']);
                $('#'+link).attr('target','iframed'); // display success response from the server
            }
            else
            {
                alert("something went worng in uploading file..!");
            }
            
        },
        error: function (response){
            // console.log(response);
            // alert("helosdfsadf");
            $('#'+msg).html(response); // display error response from the server
        }
    });
}

function doc_remove(filenameid,link,msg,button_id)
{ 
    $filename_id=filenameid;
   var base_url =window.location.origin;
   var hrefval=$('#'+link).attr('href');
   if(hrefval==='#')
   {
     var filesselect=document.getElementById(filenameid).files.length;
        if(filesselect==0){
        alert("You have not selected file");
        return false;

        }
        return false;
   }
    
    $('#loader').show();
    var file_data = $('#'+filenameid).prop('files')[0];
    var form_data = new FormData();
    form_data.append(filenameid, file_data);
    $.ajax({
        url: base_url+'/index.php/admission/mtech/Adm_mtech_personal_details/document_remove/'+filenameid, // point to server-side controller method
        dataType: 'json', // what to expect back from the server
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function (response){
            dob=0;
            console.log("success"+response);
            alert(response['msg']);
            $('.progress').hide();
            $('#'+msg).html(response['msg']);
            $("#"+filenameid).removeAttr("style");
            document.getElementById(filenameid).value='';
            document.getElementById(link).href='';
            document.getElementById(link).target='';
            //document.getElementById("iframed").innerHtml='';
            //$('#iframed').attr('src', '');
            var iframe = document.getElementById("iframed");
            var html = "";
            iframe.contentWindow.document.open();
            iframe.contentWindow.document.write(html);
            iframe.contentWindow.document.close();
            // display success response from the server
        },
        error: function (response){
            console.log(response);
        alert("error"+response);
        $('#'+msg).html(response); // display error response from the server
        }
    });
}

function upload_photo_signature(filenameid,link,msg,button_id)
{
    var filenameid=filenameid;
    // alert(filenameid);
    var base_url =window.location.origin;
    var filesselect=document.getElementById(filenameid).files.length;
        if(filesselect==0){
        alert("You have not selected file");
        return false;
    }
    var file_data = $('#'+filenameid).prop('files')[0]; 
    var fileSize    = file_data.size; 
    var maxSize     = 1*32000;
    var fileType    = file_data.type;
    if(fileSize > maxSize)
    {
        alert('The file size must be less than 30KB');
        document.getElementById(filenameid).value='';
        // document.getElementById(link).href='';
        return false;
    } 
    var ext=file_data.name.substring(file_data.name.lastIndexOf('.') + 1);
    if(ext == "png" || ext == "jpg" || ext == "jpeg" || ext == "JPEG" || ext == "PNG")
    {
           
    }
    else
    {
        alert('The image should be in  png, jpg or jpeg format.');
        document.getElementById(filenameid).src='';
        document.getElementById(filenameid).value='';
        filenameid.name='';
        return false;
    }
         
    var valchek=filenameid;
    var form_data = new FormData();
    form_data.append(filenameid, file_data);
    $.ajax({
        url: base_url+'/index.php/admission/mtech/Adm_mtech_personal_details/document_upload/'+valchek, // point to server-side controller method
        dataType: 'json', // what to expect back from the server
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function (response){
        console.log(response);
            // alert(response['two']);
            // alert(response['link']);
            // alert(response['doc_msg']);
            // $('#link1').prop('href',response['link']);
            // $('#iframed').prop('src',response['link']);
            if(response['doc_msg']=='doc_ok')
            {
                dob=1;
                var no_image=base_url+'assets/images/photo.png';
                alert(response['msg']);
                // $('#'+msg).html(response['msg']);
                $("#"+button_id).css("background-color", "green");
                if(response['file_name']=='photo')
                {
                    $('#p').attr('src',response['link']);
                }
                if (response['file_name']=='signature')
                {
                    $('#q').attr('src',response['link']);
                }
                // $('#p').attr('src',response['link']);
                // $('#'+link).attr('target','iframed'); // display success response from the server
            }
            else
            {
                alert("something went worng in uploading file..!");
            }
            
        },
        error: function (response){
            // console.log(response);
            // alert("helosdfsadf");
            $('#'+msg).html(response); // display error response from the server
        }
    });
}

function remove_photo_signature(filenameid,link,msg,button_id)
{ 
    // alert(filenameid);
    filename_id=filenameid;
    var img_src_old='';
    var base_url =window.location.origin;
    var old_src=base_url+'/assets/images/photo.png';
    
    if(filenameid =='photo')
    {
        img_src_old=$('#p').attr('src');
    }
    if (filenameid=='signature')
    {
        img_src_old=$('#q').attr('src');
    }
    if(img_src_old==old_src)
    { 
        var filesselect=document.getElementById(filenameid).files.length;
        if(filesselect==0){
        alert("You have not selected file");
        return false;

        }
        return false;
    }
    $('#loader').show();
    var file_data = $('#'+filenameid).prop('files')[0];
    var form_data = new FormData();
    form_data.append(filenameid, file_data);
    $.ajax({
        url: base_url+'/index.php/admission/mtech/Adm_mtech_personal_details/document_remove/'+filenameid, // point to server-side controller method
        dataType: 'json', // what to expect back from the server
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function (response){
            dob=0;
            console.log("success"+response);
            // alert(response['msg']);
            var no_image=base_url+'/assets/images/photo.png';
              
            if(response['file_name']=='photo')
            {
                
                $('#'+msg).html(response['msg']);
                 document.getElementById(filenameid).value='';
                $('#p').attr('src',no_image);
            }
            if (response['file_name']=='signature')
            {  
                $('#'+msg).html(response['msg']);
                document.getElementById(filenameid).value='';
                $('#q').attr('src',no_image);
              
            }
            // $('.progress').hide();
            // $('#'+msg).html(response['msg']);
            // $("#"+filenameid).removeAttr("style");
            // document.getElementById(filenameid).value='';
           
        },
        error: function (response){
            console.log(response);
        alert("error"+response);
        $('#'+msg).html(response); // display error response from the server
        }
    });
}


function doc_preview(filenameid,link,msg,button_id)
{   
   var hrefval=$('#'+link).attr('href');
   if(hrefval==='#')
   {
        var filesselect=document.getElementById(filenameid).files.length;
        if(filesselect==0){
        alert("You have not selected file");
        return false;

        }
        return false;
   }
    
    var poo= $('#'+link).attr("href");
    // alert(poo);
    if(poo==='')
    {
        alert("pdf not upload yet");
        return false;
        var iframe = document.getElementById("iframed");
        var html = "";

        iframe.contentWindow.document.open();
        iframe.contentWindow.document.write(html);
        iframe.contentWindow.document.close();
    }
    else
    {
        var iframe = document.getElementById("iframed");
        var html = "";

        iframe.contentWindow.document.open();
        iframe.contentWindow.document.write(html);
        iframe.contentWindow.document.close();
    }
}


function preview_pic()
{
  var file=document.getElementById('photo').files[0];
  if(!file)
  document.getElementById('p').src ="<?Php echo base_url(); ?>assets/images/photo.png";
  else
  {
    oFReader = new FileReader();
    oFReader.onload = function(oFREvent)
    {
      var dataURI = oFREvent.target.result;
      var ext=file.name.substring(file.name.lastIndexOf('.') + 1);
      if( ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg" || ext == "JPEG" || ext == "PNG")
      {
        if(file.size>51200)
        {
          alert('The file size must be less than 50KB');
          document.getElementById('photo').src='';
          document.getElementById('photo').value='';
          document.getElementById('p').src ='';
          file.name='';
          document.getElementById('p').src ="<?Php echo base_url(); ?>assets/images/photo.png";
          return false;
        }
        else
        document.getElementById('p').src = dataURI;
        return true;
      }
      else
      {
         alert('The image should be in png, jpg or jpeg format.');
         document.getElementById('photo').src='';
          document.getElementById('photo').value='';
          document.getElementById('p').src ='';
          file.name='';
          document.getElementById('p').src ="<?Php echo base_url(); ?>assets/images/photo.png";
         return false;
      }
       
      };
    oFReader.readAsDataURL(file);
  }
}
function preview_pic2() 
{
    var file=document.getElementById('signature').files[0];
    if(!file)
      document.getElementById('q').src ="<?Php echo base_url(); ?>ssets/images/photo.png";
        else
    {
      oFReader = new FileReader();

          oFReader.onload = function(oFREvent)
      {
        var dataURI = oFREvent.target.result;
        var ext=file.name.substring(file.name.lastIndexOf('.') + 1);
        if(ext == "bmp" || ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg" || ext == "JPEG" || ext == "PNG")
        {
          if(file.size>32000)
          {
            alert('The file size must be less than 30KB');
            document.getElementById('signature').src='';
             document.getElementById('signature').value='';
            document.getElementById('q').src ='';
            file.name='';
            document.getElementById('q').src ="<?Php echo base_url(); ?>assets/images/photo.png";
            return false;
          }
          else
             document.getElementById('q').src = dataURI;
            return true;
        }
        else
        {
          alert('The image should be in  png, jpg or jpeg format.');
          document.getElementById('signature').src='';
             document.getElementById('signature').value='';
            document.getElementById('q').src ='';
            file.name='';
            document.getElementById('q').src ="<?Php echo base_url(); ?>assets/images/photo.png";
          return false;
        }
       
      };
      oFReader.readAsDataURL(file);
    }

  }

</script>
 
</script>







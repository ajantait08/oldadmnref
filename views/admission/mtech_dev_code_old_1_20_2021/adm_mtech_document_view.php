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
	background: #e47781; 
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
@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	table { 
	  	width: 100%; 
	}

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}

	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
		/* Label the data */
		content: attr(data-column);

		color: #000;
		font-weight: bold;
	}
    /* iframe responsive css start */
    .resp-container {
    position: relative;
    overflow: hidden;
    padding-top: 56.25%;
    }
    .resp-iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
    }
     /* iframe responsive css start */
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
    // $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

    //     var target = $(e.target);
    
    //     if (target.parent().hasClass('disabled')) {
    //         return false;
    //     }
    // });

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
                                                    <ul class="nav nav-tabs" role="tablist">
                                                        <li role="presentation">
                                                            <a href="#step1"><span class="round-tab">PD </span> <i>Personal details</i></a>
                                                        </li>
                                                        <li role="presentation" class="disabled">
                                                            <a href="#step2"><span class="round-tab">QN</span> <i>Qualification</i></a>
                                                        </li>
                                                        <li role="presentation" class="disabled">
                                                            <a href="#step3"><span class="round-tab">WE</span> <i>Work Experience</i></a>
                                                        </li>
                                                        <li role="presentation" class="active">
                                                            <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab"><span class="round-tab">DU</span> <i>Document upload</i></a>
                                                        </li>
                                                        <li role="presentation" class="disabled">
                                                            <a href="#"><span class="round-tab">PT</span> <i>Payment</i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- <form role="form" action="index.html" class="login-box register"> -->
                                                    <div class="tab-content" id="main_form">
                                                        <!-- first tab personal detail start -->
            

                                                        <!-- fourth tab document upload start -->
                                                        <div class="tab-pane active" role="tabpanel" id="step4">
                                                            
                                                            <h4 class="text-center" style="text-decoration: underline;">document upload</h4>
                                                            <div class="row">
                                                            <?php if($this->session->flashdata('success')){?>
                                                            <div class="alert alert-success alert-dismissible">
                                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                            <strong>Info!</strong> <?php echo $this->session->flashdata('success')?>
                                                            </div> 
                                                            <?php }?>
                                                            <?php if($this->session->flashdata('error')){?>
                                                            <div class="alert alert-success alert-dismissible">
                                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                            <strong>Info!</strong> <?php echo $this->session->flashdata('error')?>
                                                            </div> 
                                                            <?php }?>
                                                             <?php  $attributes = array('class' => 'email', 'id' => 'btn_document','name'=>'p_details','enctype'=>'multipart/form-data');
                                                                echo form_open('admission/mtech/Adm_mtech_document/document_submit', $attributes); ?>
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
                                                                                <input type="text" id="coap_reg" name="coap_reg" value="" class="form-control">
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
                                                                          <label class="checkbox-inline"><input type="checkbox"  id="formcheck" value="">Declaration:</label>
                                                                       </div>
                                                                       

                                                                   </div>
                                                                   <div class="row">
                                                                       <div class="col-md-11 col-md-offset-1">
                                                                        <p>I hereby declare that I have read and understood the conditions of eligibilty for 2 Years MBA / MBA in Business Analytics admission 2021.I fulfill the minimum eligibility criteria and I have provided the necessary information in this regard. In the event of the information being found incorrect or misleading, my candidature shall be liable to cancellation at any time. Further, I have carefully read all the instructions and I accept them and shall not raise any dispute in future over the same.</p>
                                                                       </div>
                                                                        <input type="hidden" name="doc_t" id='doc_t' value="<?php echo $total_document; ?>">
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
                                                        <div class="tab-pane" role="tabpanel">
                                                           
                                                        </div>
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
    <div class="col-sm-2"> <!--row col-md-2 start  -->
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
       var k='';
       // ele.prop('checked', false);
       $('#formcheck').click(function()
            {
                var val="";
                var base_url =window.location.origin;
                var count=$('#doc_t').val();
                $.ajax({
                url: base_url+'/index.php/admission/mtech/Adm_mtech_document/validate_photo_signature_doc',
                type: "POST",
                // dataType:'json',
                data: {"total":count},
                success: function (data)                    
                {    
               
                  var jsondata =$.parseJSON(data);
                  if(jsondata.photo=='not')
                  {   
                      alert("please upload photo");
                      $('#formcheck').prop('checked', false);
                      return false
                  }
                  if(jsondata.signature=='not')
                  {    alert("please upload signature");
                      $('#formcheck').prop('checked', false);
                      return false
                  }
                  k=jsondata.total;
                    
                }
            });
       })
    $('#btn_document').submit(function(e){
        var count=$('#doc_t').val();
        var coap=$('#coap_reg').val();
        if(coap=='')
        {
           alert("coap registration is field is balnk!");
           return false; 
        }
       
       if($('#formcheck').is(":checked"))
        {    
              
                alert(k);
                alert(count);
              //    var doctot=exp+pwd+ex_ser+edu+cas+dob;
               if(count!=k)
               { 
                 alert("All the documents are not uploaded!");
                 return false;
               }
               else
               {
                  var r = confirm("Once you press “submit” button, documents uploaded by you cannot be changed later. Do you want to continue?");
                   if (r == true) 
                   { 
                     return true;
                   }
                   else
                   {
                     return false;
                   }
               }
        }   
        else
        {
           alert("Click check box to proceed!!!!!!");
            return false;
        }
    });
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
        url: base_url+'/index.php/admission/mtech/Adm_mtech_document/document_upload/'+valchek, // point to server-side controller method
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
        url: base_url+'/index.php/admission/mtech/Adm_mtech_document/document_remove/'+filenameid, // point to server-side controller method
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
        url: base_url+'/index.php/admission/mtech/Adm_mtech_document/document_upload/'+valchek, // point to server-side controller method
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
        url: base_url+'/index.php/admission/mtech/Adm_mtech_document/document_remove/'+filenameid, // point to server-side controller method
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
                $('#formcheck').prop('checked', false);         
                $('#'+msg).html(response['msg']);
                 document.getElementById(filenameid).value='';
                $('#p').attr('src',no_image);
            }
            if (response['file_name']=='signature')
            {  
                $('#formcheck').prop('checked', false);
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

</script>
 
</script>







<style>
/* notice css  start*/
#overlay1 {
    display: none;
    position: fixed;
    top: 0px;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
    width: 100%;
    height: 100%;
    z-index: 999;
    background-color: rgba(0, 0, 0, 0.85);

}

#overlay1 #loading1 {
    z-index: 9999;
    position: fixed;
    top: 0px;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
    width: 300px;
    height: 300px;
    background-size: 100% 100%;
    opacity: 1;
}

body{
    margin:0;
    padding:0;
}
.palel-primary
{
    /* border-color: #007497; */
    border-color: #2B2A4C;
}
.panel-primary>.panel-heading
{
    text-align:center;
    /* background:#007497; */
    background:#2B2A4C;

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
                        <div class="panel-heading">Please fill your application detail
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

                                                            <h4 class="text-center" style="text-decoration: underline;">Document Upload</h4>
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
                                                                echo form_open('admission/phdpt/Adm_phdpt_document/document_submit', $attributes); ?>
                                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                                    <div class="row">
                                                                    <input id="app_type_p" name="app_type_p" type="hidden" value="<?php if(!empty($candidate_type)) { echo $candidate_type;}?>">
                                                                    <input id="doc_filed" name="doc_filed" type="hidden" value="yes">
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
                                                                            <label class="control-label">10th Marksheet<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="tenth_doc" name="tenth_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploadten" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removeten" type="button">Remove</button>
                                                                                        <?php

                                                                                        if(!empty($upload_document))
                                                                                        {
                                                                                           $v=checking($upload_document,'10th');
                                                                                        }

                                                                                            ?>
                                                                                        <a id="tenlink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="tenpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div>
                                                                                <p style="color: green" id="msgten"><?php if(!empty($v)) {echo "You have Uploaded file 10th certificate can be viewed using Preview button";}?></p>
                                                                            </div>
                                                                        </div>


                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">12th Marksheet<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="12th_doc" name="12th_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="upload12" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="remove12" type="button">Remove</button>
                                                                                        <!-- <button class="btn btn-primary" type="button">Preview</button> -->
                                                                                        <?php

                                                                                        if(!empty($upload_document))
                                                                                        {
                                                                                           $v=checking($upload_document,'12th');
                                                                                        }

                                                                                            ?>
                                                                                        <a id="12link" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="12pri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div>
                                                                                <p style="color: green" id="msg12"><?php if(!empty($v)) {echo "You have Uploaded file 12th certificate  can be viewed using Preview button";}?></p>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">Date of birth proof<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
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
                                                                            <label class="control-label">UG Marksheet<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="ug_mark_sheet"  name="ug_mark_sheet" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
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

                                                                        <?php if(!empty($color_blind)){  ?>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">Proof of colour blindness<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
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
                                                                        <?php  } ?>

                                                                        <?php if(!empty($work_exp)){?>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">Work Experience<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
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
                                                                        <?php }  ?>

                                                                        <?php if(!empty($NOC)){  ?>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">NOC from employer<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="noc_doc" name="noc_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploadnoc" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removenoc" type="button">Remove</button>
                                                                                        <?php

                                                                                        if(!empty($upload_document))
                                                                                        {
                                                                                           $v=checking($upload_document,'NOC');
                                                                                        }

                                                                                        ?>
                                                                                        <a id="noclink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="nocpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div>
                                                                                <p style="color: green" id="msgnoc"><?php if(!empty($v)) {echo "You have Uploaded file 10th certificate can be viewed using Preview button";}?></p>
                                                                            </div>
                                                                        </div>
                                                                        <?php }  ?>

                                                                        <?php if(!empty($GMAT)){  ?>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">GMAT Score Card<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="gmat_doc" name="gmat_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploadgmat" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removegmat" type="button">Remove</button>
                                                                                        <?php

                                                                                        if(!empty($upload_document))
                                                                                        {
                                                                                           $v=checking($upload_document,'GMAT');
                                                                                        }

                                                                                        ?>
                                                                                        <a id="gmatlink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="gmatpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div>
                                                                                <p style="color: green" id="msggmat"><?php if(!empty($v)) {echo "You have Uploaded file 10th certificate can be viewed using Preview button";}?></p>
                                                                            </div>
                                                                        </div>
                                                                        <?php }  ?>


                                                                        <?php if(!empty($pgm1)){  ?>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">PG1 Marksheet<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="pgm1_doc" name="pgm1_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploadpgm1" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removepgm1" type="button">Remove</button>
                                                                                        <?php

                                                                                        if(!empty($upload_document))
                                                                                        {
                                                                                           $v=checking($upload_document,'pgm1');
                                                                                        }

                                                                                        ?>
                                                                                        <a id="pgm1link" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="pgm1pri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div>
                                                                                <p style="color: green" id="msgpgm1"><?php if(!empty($v)) {echo "You have Uploaded file 10th certificate can be viewed using Preview button";}?></p>
                                                                            </div>
                                                                        </div>
                                                                        <?php }  ?>



                                                                        <?php if(!empty($pgm2)){  ?>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">PG2 Marksheet<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="pgm2_doc" name="pgm2_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploadpgm2" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removepgm2" type="button">Remove</button>
                                                                                        <?php

                                                                                        if(!empty($upload_document))
                                                                                        {
                                                                                           $v=checking($upload_document,'pgm2');
                                                                                        }

                                                                                        ?>
                                                                                        <a id="pgm2link" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="pgm2pri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div>
                                                                                <p style="color: green" id="msgpgm2"><?php if(!empty($v)) {echo "You have Uploaded file 10th certificate can be viewed using Preview button";}?></p>
                                                                            </div>
                                                                        </div>
                                                                        <?php }  ?>

                                                                        <?php if(!empty($NETLS)){  ?>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">NET-LS Score Card<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="netls_doc" name="netls_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploadnetls" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removenetls" type="button">Remove</button>
                                                                                        <?php

                                                                                        if(!empty($upload_document))
                                                                                        {
                                                                                           $v=checking($upload_document,'NETLS');
                                                                                        }

                                                                                        ?>
                                                                                        <a id="netlslink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="netlspri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div>
                                                                                <p style="color: green" id="msgnetls"><?php if(!empty($v)) {echo "You have Uploaded file 10th certificate can be viewed using Preview button";}?></p>
                                                                            </div>
                                                                        </div>
                                                                        <?php }  ?>

                                                                        <?php if(!empty($NETCSIR)){  ?>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">NETCSIR Score Card<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="netcsir_doc" name="netcsir_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploadnetcsir" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removenetcsir" type="button">Remove</button>
                                                                                        <?php

                                                                                        if(!empty($upload_document))
                                                                                        {
                                                                                           $v=checking($upload_document,'NETCSIR');
                                                                                        }

                                                                                        ?>
                                                                                        <a id="netcsirlink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="netcsirpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div>
                                                                                <p style="color: green" id="msgnetcsir"><?php if(!empty($v)) {echo "You have Uploaded file 10th certificate can be viewed using Preview button";}?></p>
                                                                            </div>
                                                                        </div>
                                                                        <?php }  ?>



                                                                        <?php if(!empty($NETUGC)){  ?>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">NET-JRF Score Card<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="netugc_doc" name="netugc_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploadnetugc" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removenetugc" type="button">Remove</button>
                                                                                        <?php

                                                                                        if(!empty($upload_document))
                                                                                        {
                                                                                           $v=checking($upload_document,'NETUGC');
                                                                                        }

                                                                                            ?>
                                                                                        <a id="netugclink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="netugcpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div>
                                                                                <p style="color: green" id="msgnetugc"><?php if(!empty($v)) {echo "You have Uploaded file 10th certificate can be viewed using Preview button";}?></p>
                                                                            </div>
                                                                        </div>
                                                                        <?php }  ?>

                                                                        <?php if(!empty($PMFR)){  ?>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">PMRF Score Card<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="pmfr_doc" name="pmfr_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploadpmfr" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removepmfr" type="button">Remove</button>
                                                                                        <?php

                                                                                        if(!empty($upload_document))
                                                                                        {
                                                                                           $v=checking($upload_document,'PMFR');
                                                                                        }

                                                                                            ?>
                                                                                        <a id="pmfrlink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="pmfrpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div>
                                                                                <p style="color: green" id="msgpmfr"><?php if(!empty($v)) {echo "You have Uploaded file 10th certificate can be viewed using Preview button";}?></p>
                                                                            </div>
                                                                        </div>
                                                                        <?php }  ?>

                                                                        <?php if(!empty($IITGR)){  ?>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">IIT Graduate Marksheet<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="iitgr_doc" name="iitgr_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploadiitgr" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removeiitgr" type="button">Remove</button>
                                                                                        <?php

                                                                                        if(!empty($upload_document))
                                                                                        {
                                                                                           $v=checking($upload_document,'IITGR');
                                                                                        }

                                                                                            ?>
                                                                                        <a id="iitgrlink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="iitgrpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div>
                                                                                <p style="color: green" id="msgiitgr"><?php if(!empty($v)) {echo "You have Uploaded file 10th certificate can be viewed using Preview button";}?></p>
                                                                            </div>
                                                                        </div>
                                                                        <?php }  ?>

                                                                        <?php if(!empty($DSTINS)){  ?>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">DST INSPIRE Score card<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="dstins_doc" name="dstins_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploaddstins" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removedstins" type="button">Remove</button>
                                                                                        <?php

                                                                                        if(!empty($upload_document))
                                                                                        {
                                                                                           $v=checking($upload_document,'DSTINS');
                                                                                        }

                                                                                            ?>
                                                                                        <a id="dstinslink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="dstinspri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div>
                                                                                <p style="color: green" id="msgdstins"><?php if(!empty($v)) {echo "You have Uploaded file 10th certificate can be viewed using Preview button";}?></p>
                                                                            </div>
                                                                        </div>

                                                                        <?php }  ?>

                                                                        <?php if(!empty($SPON)){  ?>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">SPONSORED CANDIDATURE<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="spon_doc" name="spon_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploadspon" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removedspon" type="button">Remove</button>
                                                                                        <?php

                                                                                        if(!empty($upload_document))
                                                                                        {
                                                                                           $v=checking($upload_document,'SPON');
                                                                                        }

                                                                                            ?>
                                                                                        <a id="sponlink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="sponpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div>
                                                                                <p style="color: green" id="msgspon"><?php if(!empty($v)) {echo "You have Uploaded file 10th certificate can be viewed using Preview button";}?></p>
                                                                            </div>
                                                                        </div>

                                                                        <?php }  ?>

                                                                        <?php if(!empty($CFTI_NIRF)){  ?>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">CFTI/NIRF CANDIDATURE<span style= "color:red;">*(Maximum size 1mb Only pdf)</span></label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="cfti_nirf_doc" name="cfti_nirf_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploadcfti_nirf" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removedcfti_nirf" type="button">Remove</button>
                                                                                        <?php

                                                                                        if(!empty($upload_document))
                                                                                        {
                                                                                           $v=checking($upload_document,'CFTI_NIRF');
                                                                                        }

                                                                                            ?>
                                                                                        <a id="cfti_nirflink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="cfti_nirfpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div>
                                                                                <p style="color: green" id="msgcfti_nirf"><?php if(!empty($v)) {echo "You have Uploaded file 10th certificate can be viewed using Preview button";}?></p>
                                                                            </div>
                                                                        </div>

                                                                        <?php }  ?>

                                                                        <?php if(!empty($DBTJRF)){  ?>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">DBT JRF Score card<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="dbtjrf_doc" name="dbtjrf_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploaddbtjrf" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removedbtjrf" type="button">Remove</button>
                                                                                        <?php

                                                                                        if(!empty($upload_document))
                                                                                        {
                                                                                           $v=checking($upload_document,'DBTJRF');
                                                                                        }

                                                                                            ?>
                                                                                        <a id="dbtjrflink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="dbtjrfpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div>
                                                                                <p style="color: green" id="msgdbtjrf"><?php if(!empty($v)) {echo "You have Uploaded file 10th certificate can be viewed using Preview button";}?></p>
                                                                            </div>
                                                                        </div>
                                                                        <?php }  ?>


                                                                        <?php if(!empty($MANF)){  ?>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">Maulana Azad National Fellowship score card<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="manf_doc" name="manf_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploadmanf" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removemanf" type="button">Remove</button>
                                                                                        <?php

                                                                                        if(!empty($upload_document))
                                                                                        {
                                                                                           $v=checking($upload_document,'MANF');
                                                                                        }

                                                                                            ?>
                                                                                        <a id="manflink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="manfpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div>
                                                                                <p style="color: green" id="msgmanf"><?php if(!empty($v)) {echo "You have Uploaded file 10th certificate can be viewed using Preview button";}?></p>
                                                                            </div>
                                                                        </div>
                                                                        <?php }  ?>

                                                                        <?php if(!empty($ICMR)){  ?>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">ICMR score card<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="icmr_doc" name="icmr_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploadicmr" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removeicmr" type="button">Remove</button>
                                                                                        <?php

                                                                                        if(!empty($upload_document))
                                                                                        {
                                                                                           $v=checking($upload_document,'ICMR');
                                                                                        }

                                                                                            ?>
                                                                                        <a id="icmrlink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="icmrpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div>
                                                                                <p style="color: green" id="msgicmr"><?php if(!empty($v)) {echo "You have Uploaded file 10th certificate can be viewed using Preview button";}?></p>
                                                                            </div>
                                                                        </div>
                                                                        <?php }  ?>


                                                                        <?php if(!empty($ICPR)){  ?>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">ICPR score card<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="icpr_doc" name="icpr_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploadicpr" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removeicpr" type="button">Remove</button>
                                                                                        <?php

                                                                                        if(!empty($upload_document))
                                                                                        {
                                                                                           $v=checking($upload_document,'ICPR');
                                                                                        }

                                                                                            ?>
                                                                                        <a id="icprlink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="icprpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div>
                                                                                <p style="color: green" id="msgicpr"><?php if(!empty($v)) {echo "You have Uploaded file 10th certificate can be viewed using Preview button";}?></p>
                                                                            </div>
                                                                        </div>
                                                                        <?php }  ?>

                                                                        <?php if(!empty($NBHM)){  ?>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">NBHM score card<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="nbhm_doc" name="nbhm_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploadnbhm" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removenbhm" type="button">Remove</button>
                                                                                        <?php

                                                                                        if(!empty($upload_document))
                                                                                        {
                                                                                           $v=checking($upload_document,'NBHM');
                                                                                        }

                                                                                            ?>
                                                                                        <a id="nbhmlink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="nbhmpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div>
                                                                                <p style="color: green" id="msgnbhm"><?php if(!empty($v)) {echo "You have Uploaded file 10th certificate can be viewed using Preview button";}?></p>
                                                                            </div>
                                                                        </div>
                                                                        <?php }  ?>

                                                                        <?php if(!empty($PMRF)){  ?>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">PMRF score card<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="pmrf_doc" name="pmrf_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploadpmrf" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removepmrf" type="button">Remove</button>
                                                                                        <?php

                                                                                        if(!empty($upload_document))
                                                                                        {
                                                                                           $v=checking($upload_document,'PMRF');
                                                                                        }

                                                                                            ?>
                                                                                        <a id="pmrflink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="pmrfpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div>
                                                                                <p style="color: green" id="msgpmrf"><?php if(!empty($v)) {echo "You have Uploaded file 10th certificate can be viewed using Preview button";}?></p>
                                                                            </div>
                                                                        </div>
                                                                        <?php }  ?>

                                                                        <?php if(!empty($ICSSR)){  ?>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">ICSSR score card<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="icssr_doc" name="icssr_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploadicssr" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removeicssr" type="button">Remove</button>
                                                                                        <?php

                                                                                        if(!empty($upload_document))
                                                                                        {
                                                                                           $v=checking($upload_document,'ICSSR');
                                                                                        }

                                                                                            ?>
                                                                                        <a id="icssrlink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="icssrpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div>
                                                                                <p style="color: green" id="msgicssr"><?php if(!empty($v)) {echo "You have Uploaded file 10th certificate can be viewed using Preview button";}?></p>
                                                                            </div>
                                                                        </div>
                                                                        <?php }  ?>

                                                                        <?php if(!empty($RGNF)){  ?>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">RGNF score card<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="rgnf_doc" name="rgnf_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploadrgnf" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removergnf" type="button">Remove</button>
                                                                                        <?php

                                                                                        if(!empty($upload_document))
                                                                                        {
                                                                                           $v=checking($upload_document,'RGNF');
                                                                                        }

                                                                                            ?>
                                                                                        <a id="rgnflink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="rgnfpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div>
                                                                                <p style="color: green" id="msgrgnf"><?php if(!empty($v)) {echo "You have Uploaded file 10th certificate can be viewed using Preview button";}?></p>
                                                                            </div>
                                                                        </div>
                                                                        <?php }  ?>







                                                                        <?php if(!empty($GATE)){  ?>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">Gate Score Card<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
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
                                                                        <?php  } ?>

                                                                        <?php if(!empty($VIS)){  ?>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">GATE score for Visvesvaraya Scheme<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="vis_doc" name="vis_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploadvis" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removevis" type="button">Remove</button>
                                                                                        <?php

                                                                                        if(!empty($upload_document))
                                                                                        {
                                                                                           $v=checking($upload_document,'VIS');
                                                                                        }

                                                                                            ?>
                                                                                        <a id="vislink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="vispri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div>
                                                                                <p style="color: green" id="msgvis"><?php if(!empty($v)) {echo "You was Uploaded file Gate Score Card can be viewed using Preview button";}?></p>
                                                                            </div>
                                                                        </div>
                                                                        <?php  } ?>

                                                                        <?php if(!empty($CAT)){  ?>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">Cat Score Card<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="cat_score_card_docs" name="cat_score_card_docs" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploadcats" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removecats" type="button">Remove</button>
                                                                                        <?php

                                                                                        if(!empty($upload_document))
                                                                                        {
                                                                                           $v=checking($upload_document,'CAT');
                                                                                        }

                                                                                            ?>
                                                                                        <a id="catslink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="catspri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div>
                                                                                <p style="color: green" id="msgcats"><?php if(!empty($v)) {echo "You have Uploaded file Cat Score Card can be viewed using Preview button";}?></p>
                                                                            </div>
                                                                        </div>
                                                                        <?php  } ?>



                                                                        <?php if(!empty($pwd)){ if($pwd=='yes') { ?>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">PWD certificate<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
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
                                                                        <?php } } ?>

                                                                        <?php if(!empty($category)){ if($category=='EWS' OR $category=='OBC' OR $category=='SC' OR $category=='ST') { ?>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">OBC(NCL)/SC/ST/EWS Certificate<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
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
                                                                        <?php } } ?>

                                                                        <?php if(!empty($Other)){  ?>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">Other Qualifying Examination<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="other_doc" name="other_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploadother" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removeother" type="button">Remove</button>
                                                                                        <?php

                                                                                        if(!empty($upload_document))
                                                                                        {
                                                                                           $v=checking($upload_document,'other');
                                                                                        }

                                                                                        ?>
                                                                                        <a id="otherlink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="otherpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div>
                                                                                <p style="color: green" id="msgother"><?php if(!empty($v)) {echo "You have Uploaded file 10th certificate can be viewed using Preview button";}?></p>
                                                                            </div>
                                                                        </div>
                                                                        <?php }  ?>

                                                                        <?php if(!empty($pg_data)){  ?>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">PG Marksheet<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
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
                                                                        <?php }  ?>

                                                                        <?php if(!empty($candidate_type)){ if($candidate_type=='Sponsored Candidates') { ?>
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <label class="control-label">*Endorsement certificate from the present employer<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="spon1_doc" name="spon1_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploadspon1" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removespon1" type="button">Remove</button>
                                                                                        <!-- <button class="btn btn-primary" type="button">Preview</button> -->
                                                                                        <?php

                                                                                        if(!empty($upload_document))
                                                                                        {
                                                                                           $v=checking($upload_document,'spon1');
                                                                                        }

                                                                                            ?>
                                                                                        <a id="spon1link" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="spon1pri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div>
                                                                                <p style="color: green" id="msgspon1"><?php if(!empty($v)) {echo "You have Uploaded file 12th certificate  can be viewed using Preview button";}?></p>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                           <label class="control-label">*Salary Bank Account statement/Employees' Provident Fund (EPF) statement<span style= "color:red;">* (Maximum size 1mb Only pdf)</span></label>
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend" id="button-addon3">
                                                                                        <input id="spon2_doc" name="spon2_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                                                        <button  id="uploadspon2" class="btn btn-success" type="button">Upload</button>
                                                                                        <button class="btn btn-danger" id="removespon2" type="button">Remove</button>
                                                                                        <!-- <button class="btn btn-primary" type="button">Preview</button> -->
                                                                                        <?php

                                                                                        if(!empty($upload_document))
                                                                                        {
                                                                                           $v=checking($upload_document,'spon2');
                                                                                        }

                                                                                        ?>
                                                                                        <a id="spon2link" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="spon2pri"  class="btn btn-primary" type="button">Preview</button></a>
                                                                                    </div>
                                                                                </div>
                                                                                <p style="color: green" id="msgspon2"><?php if(!empty($v)) {echo "You have Uploaded file 12th certificate  can be viewed using Preview button";}?></p>
                                                                            </div>
                                                                        </div>
                                                                        <?php } } ?>



                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                  <?php
                                                                                    if(!empty($upload_document))
                                                                                    {
                                                                                    $v=checking($upload_document,'photo');
                                                                                    }
                                                                                   ?>
                                                                                   <label class="control-label">Photo<span style= "color:red;">* (Maximum 100kb) (Only png or jpeg) </span></label>
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
                                                                                   <label class="control-label">Signature<span style= "color:red;">* (Maximum 100kb) (Only png or jpeg) </span></label>
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
                                                                <?php if(!empty($candidate_type)){
                                                                    if($candidate_type=='GATE Candidates')
                                                                    {?>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label></label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                            <input type="hidden" id="hhhhh_reg" name="hhhreg" value="" class="form-control">
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <?php }
                                                                }?>
                                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                                   <div class="conatinerg">
                                                                   <div class="frame">
                                                                       <div class="resp-container">
                                                                          <!-- <p style="color: red"><span style= "color:red;">*<strong>Your documents should be in pdf format and size should be maximum 1 MB</strong></span></p> -->
                                                                           <!-- <p style="color: red"><span style= "color:red;">*<strong>Load single qualification file for multiple qualifications.</strong></strong></span></p> -->
                                                                           <!-- <p style="color: red"><span style= "color:red;">*<strong>Load single experience file for multiple experiences with maximum size 2 MB.</strong></span></p> -->
                                                                           <p style="color: red"><span style= "color:red;">*<strong>Your documents should be in pdf format and size should be maximum 1 MB</strong></span></p>
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
                                                                       <div class="col-md-11 col-md-offset-0">
                                                                       <p style="text-align: start;">I do hereby declare that the statements made in the application are true, complete and correct to the best of my knowledge and belief. I understand and agree that in the event of any information being found false or incorrect or incomplete or non-eligibility being detected at any time before or after admission, my candidature is liable to be rejected.I shall be bound by the decision of Indian Institute of Technology (Indian School of Mines) Dhanbad. If admitted,I promise to abide by the rules and regulation of IIT(ISM) Dhanbad.</p>
                                                                       <p style="text-align: start;">I hereby declare that I have read and understood the conditions of eligibility for Ph.D.admission 2023-2024. I fulfil the minimum eligibility criteria and I have provided the necessary information in this regard. In the event of the information being found incorrect or misleading, my candidature shall be liable to cancellation at any time. Further, I have carefully read all the instructions and I accept them and shall not raise any objections in future over the same.</p>
                                                                       <p style="text-align: start;">I have never been admitted to IIT (ISM) Dhanbad Ph.D. program and neither have I been terminated or resigned from the Ph.D. registration of IIT (ISM) Dhanbad previously.</p>
                                                                       <p style="text-align: start;">I hereby give my consent to use some or all my data in IIT (ISM) Dhanbad website and various other portals of IIT (ISM) Dhanbad as and when required by IIT (ISM) Dhanbad.</p>
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

<div id="overlay1">
    <br><br><br><br>
    <div id="loading1" class="text-center" style="color:white;">
        <i class="fa fa-spinner fa-spin" style="font-size: 70px;"></i>
        <br>
        <h3>Please wait<br> <span class="loading"></span></h3>
    </div>
</div>


<script type="text/javascript" src="<?php echo base_url();?>themes/dist/js/phdpt/adm_phdpt_education.js"></script>
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
                url: base_url+'/index.php/admission/phdpt/Adm_phdpt_document/validate_photo_signature_doc',
                type: "POST",
                // dataType:'json',
                data: {"total":count},
                success: function (data)
                {
                //    alert(data);
                //    console.log(data);
                  var jsondata =$.parseJSON(data);
                   // console.log(data);
                //   alert(jsondata);
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
        var app_type_coap=$("#app_type_p").val();
        if(app_type_coap=='GATE Candidates')
        {
            if(coap=='')
            {
             alert("coap registration is field is balnk!");
             return false;
            }
        }



       if($('#formcheck').is(":checked"))
       {


            //alert(count);
            //alert(k);
            if(count!=k)
            {
                alert("All the documents are not uploaded!");
                $('#formcheck').prop('checked', false);
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

            // other start certificate here
            $('#uploadother').on('click', function ()
            {
                var filename='other_doc';
                var link='otherlink';
                var msg='msgother';
                var upload_button_id='uploadother';
                doc_upload(filename,link,msg,upload_button_id);
                // alert("helll");

            });

            $('#removeother').on('click', function ()
            {
                var filename='other_doc';
                var link='otherlink';
                var msg='msgother';
                var upload_button_id='uploadother';
                doc_remove(filename,link,msg,upload_button_id);

            });

            $('#otherpri').on('click', function ()
            {
                var filename='other_doc';
                var link='otherlink';
                var msg='msgother';
                var upload_button_id='uploadother';
                doc_preview(filename,link,msg,upload_button_id);

            });
            // noc start certificate here
            $('#uploadnoc').on('click', function ()
            {
                var filename='noc_doc';
                var link='noclink';
                var msg='msgnoc';
                var upload_button_id='uploadnoc';
                doc_upload(filename,link,msg,upload_button_id);
                // alert("helll");

            });

            $('#removenoc').on('click', function ()
            {
                var filename='noc_doc';
                var link='noclink';
                var msg='msgnoc';
                var upload_button_id='uploadnoc';
                doc_remove(filename,link,msg,upload_button_id);

            });

            $('#nocpri').on('click', function ()
            {
                var filename='noc_doc';
                var link='noclink';
                var msg='msgnoc';
                var upload_button_id='uploadnoc';
                doc_preview(filename,link,msg,upload_button_id);

            })

            // cat_score start certificate here
            $('#uploadcat_score').on('click', function ()
            {
                var filename='cat_score_doc';
                var link='cat_scorelink';
                var msg='msgcat_score';
                var upload_button_id='uploadcat_score';
                doc_upload(filename,link,msg,upload_button_id);
                // alert("helll");

            });

            $('#removecat_score').on('click', function ()
            {
                var filename='cat_score_doc';
                var link='cat_scorelink';
                var msg='msgcat_score';
                var upload_button_id='uploadcat_score';
                doc_remove(filename,link,msg,upload_button_id);

            });

            $('#cat_scorepri').on('click', function ()
            {
                var filename='cat_score_doc';
                var link='cat_scorelink';
                var msg='msgcat_score';
                var upload_button_id='uploadcat_score';
                doc_preview(filename,link,msg,upload_button_id);

            });

            // gmat start certificate here
            $('#uploadgmat').on('click', function ()
            {
                var filename='gmat_doc';
                var link='gmatlink';
                var msg='msggmat';
                var upload_button_id='uploadgmat';
                doc_upload(filename,link,msg,upload_button_id);
                // alert("helll");

            });

            $('#removegmat').on('click', function ()
            {
                var filename='gmat_doc';
                var link='gmatlink';
                var msg='msggmat';
                var upload_button_id='uploadgmat';
                doc_remove(filename,link,msg,upload_button_id);

            });

            $('#gmatpri').on('click', function ()
            {
                var filename='gmat_doc';
                var link='gmatlink';
                var msg='msggmat';
                var upload_button_id='uploadgmat';
                doc_preview(filename,link,msg,upload_button_id);

            });


            // pgm1 start certificate here
            $('#uploadpgm1').on('click', function ()
            {
                var filename='pgm1_doc';
                var link='pgm1link';
                var msg='msgpgm1';
                var upload_button_id='uploadpgm1';
                doc_upload(filename,link,msg,upload_button_id);
                // alert("helll");

            });

            $('#removepgm1').on('click', function ()
            {
                var filename='pgm1_doc';
                var link='pgm1link';
                var msg='msgpgm1';
                var upload_button_id='uploadpgm1';
                doc_remove(filename,link,msg,upload_button_id);

            });
            $('#pgm1pri').on('click', function ()
            {
                var filename='pgm1_doc';
                var link='pgm1link';
                var msg='msgpgm1';
                var upload_button_id='uploadpgm1';
                doc_preview(filename,link,msg,upload_button_id);

            });

             // pgm2 start certificate here
            $('#uploadpgm2').on('click', function ()
            {
                var filename='pgm2_doc';
                var link='pgm2link';
                var msg='msgpgm2';
                var upload_button_id='uploadpgm2';
                doc_upload(filename,link,msg,upload_button_id);
                // alert("helll");

            });

            $('#removepgm2').on('click', function ()
            {
                var filename='pgm2_doc';
                var link='pgm2link';
                var msg='msgpgm2';
                var upload_button_id='uploadpgm2';
                doc_remove(filename,link,msg,upload_button_id);

            });
            $('#pgm2pri').on('click', function ()
            {
                var filename='pgm2_doc';
                var link='pgm2link';
                var msg='msgpgm2';
                var upload_button_id='uploadpgm2';
                doc_preview(filename,link,msg,upload_button_id);

            });




            // netls start certificate here
            $('#uploadnetls').on('click', function ()
            {
                var filename='netls_doc';
                var link='netlslink';
                var msg='msgnetls';
                var upload_button_id='uploadnetls';
                doc_upload(filename,link,msg,upload_button_id);
                // alert("helll");

            });

            $('#removenetls').on('click', function ()
            {
                var filename='netls_doc';
                var link='netlslink';
                var msg='msgnetls';
                var upload_button_id='uploadnetls';
                doc_remove(filename,link,msg,upload_button_id);

            });
            $('#netlspri').on('click', function ()
            {
                var filename='netls_doc';
                var link='netlslink';
                var msg='msgnetls';
                var upload_button_id='uploadnetls';
                doc_preview(filename,link,msg,upload_button_id);

            });

            // netcsir start certificate here
            $('#uploadnetcsir').on('click', function ()
            {
                var filename='netcsir_doc';
                var link='netcsirlink';
                var msg='msgnetcsir';
                var upload_button_id='uploadnetcsir';
                doc_upload(filename,link,msg,upload_button_id);
                // alert("helll");

            });

            $('#removenetcsir').on('click', function ()
            {
                var filename='netcsir_doc';
                var link='netcsirlink';
                var msg='msgnetcsir';
                var upload_button_id='uploadnetcsir';
                doc_remove(filename,link,msg,upload_button_id);

            });
            $('#netcsirpri').on('click', function ()
            {
                var filename='netcsir_doc';
                var link='netcsirlink';
                var msg='msgnetcsir';
                var upload_button_id='uploadnetcsir';
                doc_preview(filename,link,msg,upload_button_id);

            });

            // netugc start certificate here
            $('#uploadnetugc').on('click', function ()
            {
                var filename='netugc_doc';
                var link='netugclink';
                var msg='msgnetugc';
                var upload_button_id='uploadnetugc';
                doc_upload(filename,link,msg,upload_button_id);
                // alert("helll");

            });

            $('#removenetugc').on('click', function ()
            {
                var filename='netugc_doc';
                var link='netugclink';
                var msg='msgnetugc';
                var upload_button_id='uploadnetugc';
                doc_remove(filename,link,msg,upload_button_id);

            });
            $('#netugcpri').on('click', function ()
            {
                var filename='netugc_doc';
                var link='netugclink';
                var msg='msgnetugc';
                var upload_button_id='uploadnetugc';
                doc_preview(filename,link,msg,upload_button_id);

            });

            $('#uploadcfti_nirf').on('click', function ()
            {
                var filename='cfti_nirf_doc';
                var link='cfti_nirflink';
                var msg='msgcfti_nirf';
                var upload_button_id='uploadcfti_nirf';
                doc_upload(filename,link,msg,upload_button_id);
                // alert("helll");
            });
            $('#removedcfti_nirf').on('click', function ()
            {
                var filename='cfti_nirf_doc';
                var link='cfti_nirflink';
                var msg='msgcfti_nirf';
                var upload_button_id='removedcfti_nirf';
                doc_remove(filename,link,msg,upload_button_id);

            });

            $('#cfti_nirfpri').on('click', function ()
            {
                var filename='cfti_nirf_doc';
                var link='cfti_nirflink';
                var msg='msgcfti_nirf';
                var upload_button_id='cfti_nirfpri';
                doc_preview(filename,link,msg,upload_button_id);

            });

             // pmfr start certificate here
            $('#uploadpmfr').on('click', function ()
            {
                var filename='pmfr_doc';
                var link='pmfrlink';
                var msg='msgpmfr';
                var upload_button_id='uploadpmfr';
                doc_upload(filename,link,msg,upload_button_id);
                // alert("helll");

            });

            $('#removepmfr').on('click', function ()
            {
                var filename='pmfr_doc';
                var link='pmfrlink';
                var msg='msgpmfr';
                var upload_button_id='uploadpmfr';
                doc_remove(filename,link,msg,upload_button_id);

            });

            $('#pmfrpri').on('click', function ()
            {
                var filename='pmfr_doc';
                var link='pmfrlink';
                var msg='msgpmfr';
                var upload_button_id='uploadpmfr';
                doc_preview(filename,link,msg,upload_button_id);

            });

            // iitgr start certificate here
            $('#uploadiitgr').on('click', function ()
            {
                var filename='iitgr_doc';
                var link='iitgrlink';
                var msg='msgiitgr';
                var upload_button_id='uploadiitgr';
                doc_upload(filename,link,msg,upload_button_id);
                // alert("helll");

            });
            $('#removeiitgr').on('click', function ()
            {
                var filename='iitgr_doc';
                var link='iitgrlink';
                var msg='msgiitgr';
                var upload_button_id='uploadiitgr';
                doc_remove(filename,link,msg,upload_button_id);

            });
            $('#iitgrpri').on('click', function ()
            {
                var filename='iitgr_doc';
                var link='iitgrlink';
                var msg='msgiitgr';
                var upload_button_id='uploadiitgr';
                doc_preview(filename,link,msg,upload_button_id);

            });

            // iitgr start certificate here
            $('#uploadvis').on('click', function ()
            {
                var filename='vis_doc';
                var link='vislink';
                var msg='msgvis';
                var upload_button_id='uploadvis';
                doc_upload(filename,link,msg,upload_button_id);
                // alert("helll");

            });
            $('#removevis').on('click', function ()
            {
                var filename='vis_doc';
                var link='vislink';
                var msg='msgvis';
                var upload_button_id='uploadvis';
                doc_remove(filename,link,msg,upload_button_id);

            });
            $('#vispri').on('click', function ()
            {
                var filename='vis_doc';
                var link='vislink';
                var msg='msgvis';
                var upload_button_id='uploadvis';
                doc_preview(filename,link,msg,upload_button_id);

            });


            //   dstins start certificate here
             $('#uploaddstins').on('click', function ()
            {
                var filename='dstins_doc';
                var link='dstinslink';
                var msg='msgdstins';
                var upload_button_id='uploaddstins';
                doc_upload(filename,link,msg,upload_button_id);
                // alert("helll");

            });
            $('#removedstins').on('click', function ()
            {
                var filename='dstins_doc';
                var link='dstinslink';
                var msg='msgdstins';
                var upload_button_id='uploaddstins';
                doc_remove(filename,link,msg,upload_button_id);

            });

            $('#uploadspon').on('click', function ()
            {
                var filename='spon_doc';
                var link='sponlink';
                var msg='msgspon';
                var upload_button_id='uploadspon';
                doc_upload(filename,link,msg,upload_button_id);
                // alert("helll");

            });
            $('#removedspon').on('click', function ()
            {
                var filename='spon_doc';
                var link='sponlink';
                var msg='msgspon';
                var upload_button_id='uploadspon';
                doc_remove(filename,link,msg,upload_button_id);

            });

            $('#sponpri').on('click', function ()
            {
                var filename='spon_doc';
                var link='sponlink';
                var msg='msgspon';
                var upload_button_id='uploadspon';
                doc_preview(filename,link,msg,upload_button_id);

            });

            //   dbtjrf start certificate here
             $('#uploaddbtjrf').on('click', function ()
            {
                var filename='dbtjrf_doc';
                var link='dbtjrflink';
                var msg='msgdbtjrf';
                var upload_button_id='uploaddbtjrf';
                doc_upload(filename,link,msg,upload_button_id);
                // alert("helll");

            });
            $('#removedbtjrf').on('click', function ()
            {
                var filename='dbtjrf_doc';
                var link='dbtjrflink';
                var msg='msgdbtjrf';
                var upload_button_id='uploaddbtjrf';
                doc_remove(filename,link,msg,upload_button_id);

            });
            $('#dbtjrfpri').on('click', function ()
            {
                var filename='dbtjrf_doc';
                var link='dbtjrflink';
                var msg='msgdbtjrf';
                var upload_button_id='uploaddbtjrf';
                doc_preview(filename,link,msg,upload_button_id);

            });

            //   manf start certificate here
              $('#uploadmanf').on('click', function ()
            {
                var filename='manf_doc';
                var link='manflink';
                var msg='msgmanf';
                var upload_button_id='uploadmanf';
                doc_upload(filename,link,msg,upload_button_id);
                // alert("helll");

            });
            $('#removemanf').on('click', function ()
            {
                var filename='manf_doc';
                var link='manflink';
                var msg='msgmanf';
                var upload_button_id='uploadmanf';
                doc_remove(filename,link,msg,upload_button_id);

            });
            $('#manfpri').on('click', function ()
            {
                var filename='manf_doc';
                var link='manflink';
                var msg='msgmanf';
                var upload_button_id='uploadmanf';
                doc_preview(filename,link,msg,upload_button_id);

            });

            //   icmr start certificate here
            $('#uploadicmr').on('click', function ()
            {
                var filename='icmr_doc';
                var link='icmrlink';
                var msg='msgicmr';
                var upload_button_id='uploadicmr';
                doc_upload(filename,link,msg,upload_button_id);
                // alert("helll");

            });
            $('#removeicmr').on('click', function ()
            {
                var filename='icmr_doc';
                var link='icmrlink';
                var msg='msgicmr';
                var upload_button_id='uploadicmr';
                doc_remove(filename,link,msg,upload_button_id);

            });
            $('#icmrpri').on('click', function ()
            {
                var filename='icmr_doc';
                var link='icmrlink';
                var msg='msgicmr';
                var upload_button_id='uploadicmr';
                doc_preview(filename,link,msg,upload_button_id);

            });

             //   icpr start certificate here
             $('#uploadicpr').on('click', function ()
            {
                var filename='icpr_doc';
                var link='icprlink';
                var msg='msgicpr';
                var upload_button_id='uploadicpr';
                doc_upload(filename,link,msg,upload_button_id);
                // alert("helll");

            });
            $('#removeicpr').on('click', function ()
            {
                var filename='icpr_doc';
                var link='icprlink';
                var msg='msgicpr';
                var upload_button_id='uploadicpr';
                doc_remove(filename,link,msg,upload_button_id);

            });
            $('#icprpri').on('click', function ()
            {
                var filename='icpr_doc';
                var link='icprlink';
                var msg='msgicpr';
                var upload_button_id='uploadicpr';
                doc_preview(filename,link,msg,upload_button_id);

            });

            //   nbhm start certificate here
            $('#uploadnbhm').on('click', function ()
            {
                var filename='nbhm_doc';
                var link='nbhmlink';
                var msg='msgnbhm';
                var upload_button_id='uploadnbhm';
                doc_upload(filename,link,msg,upload_button_id);
                // alert("helll");

            });
            $('#removenbhm').on('click', function ()
            {
                var filename='nbhm_doc';
                var link='nbhmlink';
                var msg='msgnbhm';
                var upload_button_id='uploadnbhm';
                doc_remove(filename,link,msg,upload_button_id);

            });
            $('#nbhmpri').on('click', function ()
            {
                var filename='nbhm_doc';
                var link='nbhmlink';
                var msg='msgnbhm';
                var upload_button_id='uploadnbhm';
                doc_preview(filename,link,msg,upload_button_id);

            });


            //   ugcertificate end here
            $('#uploadcats').on('click', function ()
            {
                var filename='cat_score_card_docs';
                var link='catslink';
                var msg='msgcats';
                var upload_button_id='uploadcats';
                doc_upload(filename,link,msg,upload_button_id);
                // alert("helll");

            });
            $('#removecats').on('click', function ()
            {
                var filename='cat_score_card_docs';
                var link='catslink';
                var msg='msgcats';
                var upload_button_id='uploadcats';
                doc_remove(filename,link,msg,upload_button_id);

            });
            $('#catspri').on('click', function ()
            {
                var filename='cat_score_card_docs';
                var link='catslink';
                var msg='msgcats';
                var upload_button_id='uploadcats';
                doc_preview(filename,link,msg,upload_button_id);

            });

           //   ten start certificate here
            $('#uploadten').on('click', function ()
            {
                var filename='tenth_doc';
                var link='tenlink';
                var msg='msgten';
                var upload_button_id='uploadten';
                doc_upload(filename,link,msg,upload_button_id);
                // alert("helll");

            });
            $('#removeten').on('click', function ()
            {
                var filename='tenth_doc';
                var link='tenlink';
                var msg='msgten';
                var upload_button_id='uploadten';
                doc_remove(filename,link,msg,upload_button_id);

            });
            $('#tenpri').on('click', function ()
            {
                var filename='tenth_doc';
                var link='tenlink';
                var msg='msgten';
                var upload_button_id='uploadten';
                doc_preview(filename,link,msg,upload_button_id);

            });

            //   rgnf start certificate here
            $('#uploadrgnf').on('click', function ()
            {
                var filename='rgnf_doc';
                var link='rgnflink';
                var msg='msgrgnf';
                var upload_button_id='uploadrgnf';
                doc_upload(filename,link,msg,upload_button_id);
                // alert("helll");

            });
            $('#removergnf').on('click', function ()
            {
                var filename='rgnf_doc';
                var link='rgnflink';
                var msg='msgrgnf';
                var upload_button_id='uploadrgnf';
                doc_remove(filename,link,msg,upload_button_id);

            });
            $('#rgnfpri').on('click', function ()
            {
                var filename='rgnf_doc';
                var link='rgnflink';
                var msg='msgrgnf';
                var upload_button_id='uploadrgnf';
                doc_preview(filename,link,msg,upload_button_id);

            });

              //icssr start certificate here
            $('#uploadicssr').on('click', function ()
            {
                var filename='icssr_doc';
                var link='icssrlink';
                var msg='msgicssr';
                var upload_button_id='uploadicssr';
                doc_upload(filename,link,msg,upload_button_id);
                // alert("helll");

            });
            $('#removeicssr').on('click', function ()
            {
                var filename='icssr_doc';
                var link='icssrlink';
                var msg='msgicssr';
                var upload_button_id='uploadicssr';
                doc_remove(filename,link,msg,upload_button_id);

            });
            $('#icssrpri').on('click', function ()
            {
                var filename='icssr_doc';
                var link='icssrlink';
                var msg='msgicssr';
                var upload_button_id='uploadicssr';
                doc_preview(filename,link,msg,upload_button_id);

            });


            //   pmrf start certificate here
            $('#uploadpmrf').on('click', function ()
            {
                var filename='pmrf_doc';
                var link='pmrflink';
                var msg='msgpmrf';
                var upload_button_id='uploadpmrf';
                doc_upload(filename,link,msg,upload_button_id);
                // alert("helll");

            });
            $('#removepmrf').on('click', function ()
            {
                var filename='pmrf_doc';
                var link='pmrflink';
                var msg='msgpmrf';
                var upload_button_id='uploadpmrf';
                doc_remove(filename,link,msg,upload_button_id);

            });
            $('#pmrfpri').on('click', function ()
            {
                var filename='pmrf_doc';
                var link='pmrflink';
                var msg='msgpmrf';
                var upload_button_id='uploadpmrf';
                doc_preview(filename,link,msg,upload_button_id);

            });




          // 12 document start here

          $('#upload12').on('click', function ()
            {
                var filename='12th_doc';
                var link='12link';
                var msg='msg12';
                var upload_button_id='upload12';
                doc_upload(filename,link,msg,upload_button_id);
                // alert("helll");

            });
            $('#remove12').on('click', function ()
            {
                var filename='12th_doc';
                var link='12link';
                var msg='msg12';
                var upload_button_id='upload12';
                doc_remove(filename,link,msg,upload_button_id);

            });
            $('#12pri').on('click', function ()
            {
                var filename='12th_doc';
                var link='12link';
                var msg='msg12';
                var upload_button_id='upload12';
                doc_preview(filename,link,msg,upload_button_id);

            });

           // 12 document end her

           // spon1 document start here

          $('#uploadspon1').on('click', function ()
            {
                var filename='spon1_doc';
                var link='spon1link';
                var msg='msgspon1';
                var upload_button_id='uploadspon1';
                doc_upload(filename,link,msg,upload_button_id);
                // alert("helll");

            });
            $('#removespon1').on('click', function ()
            {
                var filename='spon1_doc';
                var link='spon1link';
                var msg='msgspon1';
                var upload_button_id='uploadspon1';
                doc_remove(filename,link,msg,upload_button_id);

            });
            $('#spon1pri').on('click', function ()
            {
                var filename='spon1_doc';
                var link='spon1link';
                var msg='msgspon1';
                var upload_button_id='uploadspon1';
                doc_preview(filename,link,msg,upload_button_id);

            });

           // spon1 document end her

           // spon2 document start here

          $('#uploadspon2').on('click', function ()
            {
                var filename='spon2_doc';
                var link='spon2link';
                var msg='msgspon2';
                var upload_button_id='uploadspon2';
                doc_upload(filename,link,msg,upload_button_id);
                // alert("helll");

            });
            $('#removespon2').on('click', function ()
            {
                var filename='spon2_doc';
                var link='spon2link';
                var msg='msgspon2';
                var upload_button_id='uploadspon2';
                doc_remove(filename,link,msg,upload_button_id);

            });
            $('#spon2pri').on('click', function ()
            {
                var filename='spon2_doc';
                var link='spon2link';
                var msg='msgspon2';
                var upload_button_id='uploadspon2';
                doc_preview(filename,link,msg,upload_button_id);

            });

        // spon2 document end her
        //  ugcertificate start here
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
    //alert('send all files');
    //$('#overlay1').show();
    $.ajax({
        url: base_url+'/index.php/admission/phdpt/Adm_phdpt_document/document_upload/'+valchek, // point to server-side controller method
        dataType: 'json', // what to expect back from the server
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        beforeSend: function() {
            $('#overlay1').show();
        },
        success: function (response){
        //console.log(response);
        $('#overlay1').hide();
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
        url: base_url+'/index.php/admission/phdpt/Adm_phdpt_document/document_remove/'+filenameid, // point to server-side controller method
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
    var maxSize     = 1*100000;
    var fileType    = file_data.type;
    if(fileSize > maxSize)
    {
        alert('The file size must be less than 100KB');
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
        url: base_url+'/index.php/admission/phdpt/Adm_phdpt_document/document_upload/'+valchek, // point to server-side controller method
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
        url: base_url+'/index.php/admission/phdpt/Adm_phdpt_document/document_remove/'+filenameid, // point to server-side controller method
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







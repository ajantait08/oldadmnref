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

}
</style>
<script type="text/javascript">

// ------------step-wizard-------------
$(document).ready(function () {
    
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

        var target = $(e.target);
    
        if (target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var active = $('.wizard .nav-tabs li.active');
        active.next().removeClass('disabled');
        nextTab(active);

    });
    $(".prev-step").click(function (e) {

        var active = $('.wizard .nav-tabs li.active');
        prevTab(active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}


$('.nav-tabs').on('click', 'li', function() {
    alert("hello");

    // $('.nav-tabs li.active').removeClass('active');
    // $(this).addClass('active');
});

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
                <div class="col-md-12">
                    <!--start  -->
                    <div class="panel panel-primary news_back">
                        <div class="panel-heading">Important Information
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                 <button class="btn btn-info" style="width:100%;"><a href="<?php echo base_url() ?>index.php/admission/mtech/Adm_mtech_user_dashboard/apply_post"><b style="text-decoration: none; color: white;">Apply</b></a> </button>
                                 <button class="btn btn-info" style="width:100%;"><a href="<?php echo base_url() ?>index.php/admission/mtech/Adm_mtech_user_dashboard/apply_post"><b style="text-decoration: none; color: white;">My Application Status</b></a> </button>
                                  <!-- <button class="btn btn-primary" style="width:100%;"> Apply</button>
                                  <button class="btn btn-info" style="width:100%;"> My Application status</button> -->
                                  <button class="btn btn-danger" style="width:100%;"><a href="<?php echo base_url() ?>index.php/admission/mtech/Adm_mtech_registration/logout"><b style="text-decoration: none; color: white;">Logout</b></a> </button>
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
                            <section class="signup-step-container">
                               <form role="form"  class="login-box register">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-lg-12 ">
                                            <center>  <h5 style="color:#17a2b8;"><b><?php echo $name;?> Welcome to M.Tech Admission - 2022-2023 portal</b></h5></center>
                                        </div>
                                    </div>                
                                </form>
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








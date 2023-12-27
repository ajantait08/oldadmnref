<link href="<?php echo base_url();?>themes/dist/css/phd/adm_phd_personal_details.css" rel="stylesheet" media="screen">
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
                    <!-- <div class="panel panel-primary news_back">
                        <div class="panel-heading">NEWS AND EVENTS
                        </div>
                        <div class="panel-body">
                           <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">Candidates can now check their admission status.</marquee>
                        </div>
                    </div> -->
                    <!--end  -->
                </div>
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
                                <input class="btn btn-info" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/phd/Adm_phd_user_dashboard/apply_post'" value="Start Application" />
                                 <input class="btn btn-danger" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/phd/Adm_phd_registration/logout'" value="Logout" />
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
                                            <center>  <h5 style="color:#17a2b8;"><b><?php echo $name;?>! Welcome to Ph.D. Admission Portal- 2022-2023 Phase(II). </b></h5></center>
                                        </div>
                                    </div>                
                                </form>
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
                        <input class="btn btn-info" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/phd/Adm_phd_applicant_home'" value="Back Applicant Home" />
                          
                        </div>
                    </div>
                    <!--end  -->
                </div>
            </div>
        </div><!--notice end -->
    </div> <!--row col-md-2 end  -->
</div><!--row start  -->
<script type="text/javascript" src="<?php echo base_url();?>themes/dist/js/phd/adm_phd_education.js"></script>








<link href="<?php echo base_url(); ?>themes/dist/css/phdef/adm_phdef_personal_details.css" rel="stylesheet" media="screen">
<style>
    #line-menu ul ul li a {
        color: white;
        text-decoration: none;
        font-size: 19px;
        line-height: 45px;
        display: block;
        padding: 0 15px;

        transition: all 0.15s;
    }

    #line-menu ul ul li a:hover {
        /* background: #e47781; */
        background: #0074aa;
    }

    #line-menu ul ul {
        display: none;
    }

    #line-menu h3 {
        font-size: 12px;
        line-height: 34px;
        padding: 0 10px;
        cursor: pointer;
        /* background: #e47781; */
        background: #0074aa;
        background: linear-gradient(#297b97, #002535);
    }

    #line-menu li.active ul {
        display: block;
    }

    #line-menu h3:hover {
        text-shadow: 0 0 1px rgba(255, 255, 255, 0.7);
    }

    #line-menu h3 span {
        font-size: 16px;
        margin-right: 10px;
    }

    #line-menu li {
        list-style-type: none;
    }

    #line-menu {
        /* background: #4f5ec7; */
        background: #0074aa;
        width: 300px;
        color: white;
        margin-top: -20px;
        box-shadow:
            0 5px 15px 1px rgba(0, 0, 0, 0.6),
            0 0 200px 1px rgba(255, 255, 255, 0.5);
    }
</style>
<?php
if (!($this->session->has_userdata('login_type'))) {
    redirect('admission/Add_mba/adm_mba_login');
} ?>
<div class="container">
    <!-- container start  -->
    <div class="panel panel-primary">
        <!-- panel-primary start  -->
        <div class="panel-heading text-center">
            <h5><Strong><?php echo $name; ?>! Welcome to Ph.D. Admission Portal (Externally Funded)</Strong></h5>
        </div>
        <div class="panel-body">
            <div class="row">

                <!-- <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">Candidates can now check their admission status.</marquee> -->
                <!-- three start  -->
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">

                            <!-- menu start -->
                            <div id="line-menu">
                                <ul>
                                    <li class="active">
                                        <h3><span class="plus">+</span>Applicant home</h3>

                                        <ul>


                                            <?php if (empty($p_apply)) {
                                            ?>
                                                <li><a href="<?php echo base_url(); ?>index.php/admission/phdef/Adm_phdef_user_dashboard"><i style="" class="fa fa-angle-double-right" aria-hidden="true"></i>Apply</a></li>
                                            <?php
                                            } ?>
                                            <li><a href="<?php echo base_url(); ?>assets/admission/phdef/brochure/Instruction.pdf" target="_blank"><i style="" class="fa fa-angle-double-right" aria-hidden="true"></i>Instruction</a>
                                            </li>
                                            <li><a href="<?php echo base_url(); ?>index.php/admission/phdef/Adm_phdef_complain_register"><i style="" class="fa fa-angle-double-right" aria-hidden="true"></i>Register payment complaint </a>
                                            </li>
                                            <li><a href="<?php echo base_url(); ?>index.php/admission/phdef/Adm_phdef_complain_register/track_status"><i style="" class="fa fa-angle-double-right" aria-hidden="true"></i>Track complaint </a>
                                            </li>
                                            <?php if (!empty($p_apply)) {
                                            ?>
                                                <li><a href="<?php echo base_url(); ?>index.php/admission/phdef/Adm_phdef_application_preview"><i style="" class="fa fa-angle-double-right" aria-hidden="true"></i>My application</a>
                                                </li>
                                            <?php
                                            } ?>

                                            <li><a href="<?php echo base_url(); ?>index.php/admission/phdef/Adm_phdef_registration/logout">Logout</a>
                                            </li>
                                        </ul>
                                    </li>

                                </ul>
                            </div>
                            <!-- menu end -->
                        </div>
                    </div>
                </div>
                <!-- three end  -->
                <!-- start 8  -->
                <div class="col-md-8">
                    <!-- Project Two -->
                    <div class="row">
                        <div class="panel panel-primary" style="margin-right: 10px;">
                            <!-- <div class="panel-heading">Important Dates for Ph.D. Admission (Externally Funded)</div> -->
                            <div class="panel-heading">Important Information</div>
                            <div class="panel-body">
                                <?php if ($this->session->flashdata('message')) { ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <center> <strong> <?php echo $this->session->flashdata('message') ?></strong>
                                        </center>
                                    </div>
                                <?php } ?>

                                <p style="text-align: justify; font-weight: bold; font-size: larger; color: red;">
                                    CANDIDATES WITH EXTERNAL FUNDED FELLOWSHIPS SUCH AS
                                    DST-INSPIRE, CSIR/UGC-JRF OR ANY OTHER NATIONAL LEVEL FELLOWSHIP CAN APPLY
                                    THROUGHOUT THE YEAR THROUGH THIS PORTAL. </p>

                                <p style="text-align: justify; font-weight: bold; font-size: larger; color: blue;">
                                    Please Check Information Brochure For More Information.</p>

                                <p style="text-align: justify; font-weight: bold; font-size: larger; color: red;">
                                    YOUR APPLICATION WILL BE PROCESSED SHORTLY AND YOU WILL BE INTIMATED FURTHER ON ITS
                                    STATUS.</p>

                                <p style="text-align: justify; font-weight: bold; font-size: larger; color: blue;">
                                    If you want to apply for Institute Assistantship (i.e. if you do not possess
                                    External Funded Fellowships Such As DST-INSPIRE, CSIR/UGC-JRF, etc. please apply
                                    through the other portal during the period as advertised in the call for Admissions
                                    to the PhD Program through IA/Part-Time/Sponsored Category Applicants.</p>

                                <!-- <p style="text-align: justify;"><span style="font-size: 18px;"><strong>## Any of the
                                            dates may be changed due to unavoidable circumstances. *Appropriate academic
                                            criteria/methodology will be adopted by the respective departments for
                                            shortlisting of applications received against the Ph.D. admission. **In
                                            normal situation, the interview will be held physically in the campus at
                                            respective departments. However, it may be online if situation
                                            demands.</strong></span></p> -->


                                <!-- <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">Candidates can now check their admission status.</marquee></div> -->
                            </div>
                        </div>
                    </div>

                    <!--  8 end  -->

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- <div class="panel-body"><marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">Candidates can now check their admission status.</marquee></div> -->
                    </div>

                </div>
            </div> <!-- panel body end -->
        </div> <!-- panel-primary end  -->
    </div> <!-- container end  -->
</div>
<!--row start  -->
<script type="text/javascript" src="<?php echo base_url(); ?>themes/dist/js/phdef/adm_phdef_education.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>themes/dist/js/adm_mba/adm_mba_education.js"></script>  -->
<script type="text/javascript">
    $("#line-menu h3").click(function() {
        //slide up all the link lists
        $("#line-menu ul ul").slideUp();
        //slide down the link list below the h3 clicked - only if its closed
        if (!$(this).next().is(":visible")) {
            $(this).next().slideDown();
            // $(this).remove("span").append('<span class="minus">-</span>');
        }
    })
</script>
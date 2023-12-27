<link href="<?php echo base_url(); ?>themes/dist/css/phdpt/adm_phdpt_personal_details.css" rel="stylesheet" media="screen">
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
    background: #EA906C;

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
    background: #EA906C;
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
    background: #2B2A4C;
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
            <h5><Strong><?php echo $name; ?>! Welcome to Ph.D. (Part Time) Admission Portal - 2023-2024</Strong></h5>
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
                                            <li><a
                                                    href="<?php echo base_url(); ?>index.php/admission/phdpt/Adm_phdpt_user_dashboard"><i
                                                        style="" class="fa fa-angle-double-right"
                                                        aria-hidden="true"></i>Apply</a></li>
                                            <?php
                                            } ?>
                                            <li><a href="<?php echo base_url(); ?>assets/admission/phdpt/brochure/Instruction.pdf"
                                                    target="_blank"><i style="" class="fa fa-angle-double-right"
                                                        aria-hidden="true"></i>Instruction</a>
                                            </li>
                                            <!-- <li><a
                                                    href="<?php echo base_url(); ?>index.php/admission/phd/Adm_phd_complain_register"><i
                                                        style="" class="fa fa-angle-double-right"
                                                        aria-hidden="true"></i>Register payment complaint </a>
                                            </li> -->

                                            <li><a href="<?php echo base_url();?>index.php/admission/phdpt/Adm_phdpt_complain_register"><i style="" class="fa fa-angle-double-right" aria-hidden="true"></i>Register Payment complaint </a>
                                            </li>
                                            <li><a href="<?php echo base_url();?>index.php/admission/phdpt/Adm_phdpt_complain_register/technical_complaint"><i style="" class="fa fa-angle-double-right" aria-hidden="true"></i>Register Technical complaint </a>
                                            </li>
                                            <li><a
                                                    href="<?php echo base_url(); ?>index.php/admission/phdpt/Adm_phdpt_complain_register/track_status"><i
                                                        style="" class="fa fa-angle-double-right"
                                                        aria-hidden="true"></i>Track complaint </a>
                                            </li>
                                            <?php if (!empty($p_apply)) {
                                            ?>
                                            <li><a
                                                    href="<?php echo base_url(); ?>index.php/admission/phdpt/Adm_phdpt_application_preview"><i
                                                        style="" class="fa fa-angle-double-right"
                                                        aria-hidden="true"></i>My application</a>
                                            </li>
                                            <?php
                                            } ?>

                                            <li><a
                                                    href="<?php echo base_url(); ?>index.php/admission/phdpt/Adm_phdpt_registration/logout">Logout</a>
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
                        <div class="panel panel-primary">
                            <div class="panel-heading">Important Dates for Ph.D. (Part Time) Admission 2023-2024</div>
                            <div class="panel-body">
                                <?php if ($this->session->flashdata('message')) { ?>
                                <div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <center> <strong> <?php echo $this->session->flashdata('message') ?></strong>
                                    </center>
                                </div>
                                <?php } ?>


                                <table style="margin-top: 0px;">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;font-size:20px;">Admission Process</th>
                                            <th style="text-align: center;font-size:20px;">Tentative Dates</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <tr style="height: 46px;">
                                            <td style="width: 33.9537%; text-align: center; height: 46px;"><span
                                                    style="font-size: 18px; color: #2880b9;"><strong>SCHEDULE OF Ph.D.
                                                        ADMISSION</strong></span></td>
                                            <td style="width: 12.0372%; height: 46px; text-align: center;"><span
                                                    style="font-size: 18px; color: #2880b9;"><strong>IMPORTANT
                                                        DATES</strong></span></td>
                                        </tr>
                                        <!-- <tr style="height: 46px;">
                                            <td style="width: 33.9537%; height: 46px; text-align: center;"><span
                                                    style="font-size: 18px;">Commencement of online application</span>
                                            </td>
                                            <td style="width: 12.0372%; height: 46px; text-align: center;"><span
                                                    style="font-size: 18px;"><strong>March 28, 2023</strong></span>
                                            </td>
                                        </tr>
                                        <tr style="height: 51px;">
                                            <td style="width: 33.9537%; text-align: center; height: 51px;"><span
                                                    style="font-size: 18px;">Last date for applying through online
                                                    portal</span></td>
                                            <td style="width: 12.0372%; text-align: center; height: 51px;"><span
                                                    style="font-size: 18px;"><strong>April 27, 2023</strong></span>
                                            </td>
                                        </tr>
                                        <tr style="height: 46px;">
                                            <td style="width: 33.9537%; height: 46px; text-align: center;"><span
                                                    style="font-size: 18px;">Intimation to shortlisted candidates for
                                                    interview*</span></td>
                                            <td style="width: 12.0372%; height: 46px; text-align: center;"><span
                                                    style="font-size: 18px;"><strong>May 09, 2023</strong></span>
                                            </td>
                                        </tr>
                                        <tr style="height: 46px;">
                                            <td style="width: 33.9537%; height: 46px; text-align: center;"><span
                                                    style="font-size: 18px;">Interview for shortlisted
                                                    candidates**</strong></span></td>
                                            <td style="width: 12.0372%; height: 46px; text-align: center;"><span
                                                    style="font-size: 18px;"><strong>May 25 – May 29, 2023</strong></span></td>
                                        </tr>
                                        <tr style="height: 46px;">
                                            <td style="width: 33.9537%; height: 46px; text-align: center;"><span
                                                    style="font-size: 18px;">Declaration of the merit list</span></td>
                                            <td style="width: 12.0372%; height: 46px; text-align: center;"><span
                                                    style="font-size: 18px;"><strong>June 15, 2023</strong></span>
                                            </td>
                                        </tr>
                                        <tr style="height: 46px;">
                                            <td style="width: 33.9537%; height: 46px; text-align: center;"><span
                                                    style="font-size: 18px;">Fee payment & Seat Acceptance of Merit list
                                                    candidates</span></td>
                                            <td style="width: 12.0372%; height: 46px; text-align: center;"><span
                                                    style="font-size: 18px;"><strong>June 16, 2023 - June 20, 2023</strong></span></td>
                                        </tr>
                                        <tr style="height: 46px;">
                                            <td style="width: 33.9537%; height: 46px; text-align: center;"><span
                                                    style="font-size: 18px;">Declaration of extended merit list</span>
                                            </td>
                                            <td style="width: 12.0372%; height: 46px; text-align: center;"><span
                                                    style="font-size: 18px;"><strong>June 23, 2023</strong></span>
                                            </td>
                                        </tr>
                                        <tr style="height: 46px;">
                                            <td style="width: 33.9537%; height: 46px; text-align: center;"><span
                                                    style="font-size: 18px;">Fee payment & Seat Acceptance of Extended
                                                    Merit list candidates</span></td>
                                            <td style="width: 12.0372%; height: 46px; text-align: center;"><span
                                                    style="font-size: 18px;"><strong>June 23, 2023 - June 27, 2023</strong></span></td>
                                        </tr>
                                        <tr style="height: 46px;">
                                            <td style="width: 33.9537%; height: 46px; text-align: center;"><span
                                                    style="font-size: 18px;">Declaration of Additional Extended Merit List(s) (if necessary)</span></td>
                                            <td style="width: 12.0372%; height: 46px; text-align: center;"><span
                                                    style="font-size: 18px;"><strong>Will be announced later</strong></span></td>
                                        </tr>
                                        <tr style="height: 46px;">
                                            <td style="width: 33.9537%; height: 46px; text-align: center;"><span
                                                    style="font-size: 18px;">Fee payment & Seat Acceptance by Additional Extended Merit list(s) candidates (if necessary)</span></td>
                                            <td style="width: 12.0372%; height: 46px; text-align: center;"><span
                                                    style="font-size: 18px;"><strong>Will be announced later</strong></span></td>
                                        </tr>
                                        <tr style="height: 51px;">
                                            <td style="width: 33.9537%; text-align: center; height: 51px;"><span
                                                    style="font-size: 18px;">Physical Admission (in Campus) & joining of
                                                    admitted students&nbsp;</span></td>
                                            <td style="width: 12.0372%; text-align: center; height: 51px;"><span
                                                    style="font-size: 18px;"><strong>July 18, 2023</strong></span></td>
                                        </tr> -->

                                    </tbody>
                                </table>
                                <p style="text-align: justify;"><span style="font-size: 18px;"><strong>## Any of the
                                            dates may be changed due to unavoidable circumstances. *Appropriate academic
                                            criteria/methodology will be adopted by the respective departments for
                                            shortlisting of applications received against the Ph.D. admission. **In
                                            normal situation, the interview will be held physically in the campus at
                                            respective departments. However, it may be online if situation
                                            demands.</strong></span></p>


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
<script type="text/javascript" src="<?php echo base_url(); ?>themes/dist/js/phdpt/adm_phdpt_education.js"></script>
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
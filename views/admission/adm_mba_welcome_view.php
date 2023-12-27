<link href="<?php echo base_url(); ?>themes/dist/css/adm_mba/adm_mba_personal_details.css" rel="stylesheet"
    media="screen">
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
    background: #003545;

}

#line-menu ul ul {
    display: none;
}

#line-menu h3 {
    font-size: 12px;
    line-height: 34px;
    padding: 0 10px;
    cursor: pointer;
    background: #003040;
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
    background: #4f5ec7;
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
            <h5><Strong><?php echo $name; ?> Welcome to MBA portal Admission 2023-2024</Strong></h5>
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
                                                    href="<?php echo base_url(); ?>index.php/admission/Adm_mba_user_dashboard"><i
                                                        style="" class="fa fa-angle-double-right"
                                                        aria-hidden="true"></i>Apply</a></li>
                                            <?php
                                            } ?>
                                            <li><a href="<?php echo base_url(); ?>assets/admission/mba/brochure/Instruction.pdf"
                                                    target="_blank"><i style="" class="fa fa-angle-double-right"
                                                        aria-hidden="true"></i>Instruction</a>
                                            </li>
                                            <li><a
                                                    href="<?php echo base_url(); ?>index.php/admission/Adm_mba_complain_register"><i
                                                        style="" class="fa fa-angle-double-right"
                                                        aria-hidden="true"></i>Register payment complaint </a>
                                            </li>
                                            <li><a
                                                    href="<?php echo base_url(); ?>index.php/admission/Adm_mba_complain_register/track_status"><i
                                                        style="" class="fa fa-angle-double-right"
                                                        aria-hidden="true"></i>Track complaint </a>
                                            </li>
                                            <?php if (!empty($p_apply)) {
                                            ?>
                                            <li><a
                                                    href="<?php echo base_url(); ?>index.php/admission/Adm_mba_application_preview"><i
                                                        style="" class="fa fa-angle-double-right"
                                                        aria-hidden="true"></i>My application</a>
                                            </li>
                                            <?php
                                            } ?>

                                            <li><a
                                                    href="<?php echo base_url(); ?>index.php/admission/Adm_registration/logout">Logout</a>
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
                            <div class="panel-heading">Important News And Events</div>
                            <div class="panel-body">
                                <?php if ($this->session->flashdata('message')) { ?>
                                <div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <center> <strong> <?php echo $this->session->flashdata('message') ?></strong>
                                    </center>
                                </div>
                                <?php } ?>
                                <p class="title">Important Dates for MBA Programmes 2023-24</p>

                                <table>
                                    <thead>
                                        <tr>
                                            <!-- <th>Admission Process</th>
                                            <th>Tentative Dates</th> -->
                                            <th>Procedure</th>
                                            <th>Date</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <!-- <tr>
                                            <td>CAT Result announcement</td>
                                            <td>January 2023, 1<sup>st</sup> week (Tentative)</td>
                                        </tr> -->
                                        <tr>
                                            <td>Online Application Form Begins</td>
                                            <td>22<sup>nd</sup> December 2022</td>
                                        </tr>
                                        <tr>
                                            <td>Last date Of Online Application</td>
                                            <!-- <td>31<sup>st</sup> January 2023 (Tentative)</td> -->
                                            <td>31<sup>st</sup> January 2023</td>
                                        </tr>
                                        <tr>
                                            <td>Personal interview</td>
                                            <td>March 17-19 & March 25-26, 2023</td>
                                        </tr>
                                        <tr>
                                            <td>Declaration Of Admission Results</td>
                                            <td>First week of May, 2023 (Tentative)</td>
                                        </tr>
                                        <tr>
                                            <td>Reporting at IIT(ISM) Dhanbad</td>
                                            <td>To be decided later</td>
                                        </tr>
                                        <tr>
                                            <td>Commencement of Semester for all MBA courses for the Session 2023–24
                                            </td>
                                            <td>To be decided later</td>
                                        </tr>
                                    </tbody>
                                </table>


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
<script type="text/javascript" src="<?php echo base_url(); ?>themes/dist/js/adm_mba/adm_mba_education.js"></script>
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
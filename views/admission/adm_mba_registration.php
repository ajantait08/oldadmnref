<link href="<?php echo base_url(); ?>themes/dist/css/adm_mba/adm_registration.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="<?php echo base_url(); ?>themes/plugins/jquery-validation/jquery.validate.js">
</script>
<div class="row">
    <!--row start  -->
    <div class="col-md-2">
        <!--row col-md-4 start  -->
        <div class="notice">
            <!--notice start  -->
            <div class="row">
                <div class="col-md-12">

                    <!-- <div class="panel panel-primary news_back">
                        <div class="panel-heading">NEWS AND EVENTS
                        </div>
                        <div class="panel-body">
                           <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">Candidates can now check their admission status.</marquee>
                        </div>
                    </div> -->

                </div>
            </div>
        </div>
        <!--notice end -->
    </div>
    <!--row col-md-4 end  -->
    <div class="col-md-8">
        <!--row col-md-8 start  -->
        <div class="home">
            <!--home start -->
            <div class="row">
                <!--home row start -->
                <div class="col-md-12">
                    <!--home col-md-12 start -->
                    <!--start  -->
                    <div class="panel panel-primary news_back">
                        <div class="panel-heading">PLEASE FILL UP ALL THE FIELD
                            <!-- <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();" style="font-size: 20pt; font-weight: bold">
                                 The last date of applying in MBA and MBA in Business Analytics Programme is over (6th February 2022).
                                </marquee> -->
                        </div>
                        <div class="panel-body">
                            <div id="newUser">
                                <div class="row">
                                    <?php if ($this->session->flashdata('email_mobile')) { ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <center>
                                            <strong><?php echo $this->session->flashdata('email_mobile') ?></strong>
                                        </center>
                                    </div>
                                    <?php } ?>
                                    <?php if ($this->session->flashdata('btechmath')) { ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Info!</strong> <?php echo $this->session->flashdata('btechmath') ?>
                                    </div>
                                    <?php } ?>
                                    <div class="col-md-8 col-md-offset-2">
                                        <?php
                                        $attributes = array('class' => 'register', 'id' => 'sub', 'name' => 'newUser', 'enctype' => 'multipart/form-data');
                                        echo form_open('admission/Adm_registration/get_registration', $attributes);

                                        ?>
                                        <!-- <form name="newUser" class="register" id="sub" action="<?php echo base_url() ?>index.php/admission/Adm_registration/get_registration" method="POST"control="" class="form-group" method="post" enctype="multipart/form-data"> -->
                                        <?php if ($this->session->flashdata('message')) { ?>
                                        <div class="alert alert-danger alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert"
                                                aria-label="close">&times;</a>
                                            <strong>Info!</strong> <?php echo $this->session->flashdata('message') ?>
                                        </div>
                                        <?php } ?>
                                        <!-- In order to disable the Registration page, make the below conditions true  -->
                                        <?php if (true) { ?>
                                        <?php if (true) { ?>
                                        <div class=row>
                                            <div class="col-md-12">

                                                <div style="color:green;">
                                                    <h3 id="">The last date of applying in MBA and MBA in Business
                                                        Analytics Programme is over (31st January 2023)</h3>
                                                    <!-- <center>
                                                        <h5 id="">The Registrations will open shortly.</h5>
                                                    </center> -->
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <?php } else { ?>
                                        <h1>REGISTRATION FORM</h1>
                                        <?php if ($this->session->flashdata('error')) { ?>
                                        <div class="alert alert-danger alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert"
                                                aria-label="close">&times;</a>
                                            <strong>Info!</strong> <?php echo $this->session->flashdata('error') ?>
                                        </div>
                                        <?php } ?>
                                        <?php if ($this->session->flashdata('success')) { ?>
                                        <div class="alert alert-success alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert"
                                                aria-label="close">&times;</a>
                                            <strong>Info!</strong> <?php echo $this->session->flashdata('success') ?>
                                        </div>
                                        <?php } ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- NAME -->
                                                <div class="form-group">
                                                    <label>First Name<span style="color:red;">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                                class="glyphicon glyphicon-user"></i></span>
                                                        <input value="<?php echo set_value('first_name'); ?>"
                                                            id="first_name" type="text" onkeyup="capital(this.id)"
                                                            class="form-control" name="first_name"
                                                            placeholder="Enter Your First Name ">
                                                        <?php if (validation_errors()) { ?>
                                                        <div class="myalert">
                                                            <?php echo form_error('first_name') ?>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- NAME -->
                                                <div class="form-group">
                                                    <label>Middle Name </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                                class="glyphicon glyphicon-user"></i></span>
                                                        <input value="<?php echo set_value('middle_name'); ?>"
                                                            id="middle_name" type="text" class="form-control"
                                                            onkeyup="capital(this.id)" name="middle_name"
                                                            placeholder="Enter Your Middle Name">
                                                        <?php if (validation_errors()) { ?>
                                                        <div class="myalert">
                                                            <?php echo form_error('middle_name') ?>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- NAME -->
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                                class="glyphicon glyphicon-user"></i></span>
                                                        <input value="<?php echo set_value('last_name'); ?>"
                                                            id="last_name" type="text" onkeyup="capital(this.id)"
                                                            class="form-control" name="last_name"
                                                            placeholder="Enter Your Last Name">
                                                        <?php if (validation_errors()) { ?>
                                                        <div class="myalert">
                                                            <?php echo form_error('last_name') ?>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- NAME -->
                                                <div class="form-group">
                                                    <label>Category <span style="color:red;">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                                class="glyphicon glyphicon-user"></i></span>
                                                        <select id="category" name="category" class="form-select"
                                                            aria-label="Default select example">
                                                            <option value=""> Please Select Category</option>
                                                            <option value='General'>General</option>
                                                            <option value='OBC' <?= set_select('category', 'OBC') ?>>
                                                                OBC(NCL)</option>
                                                            <option value='EWS' <?= set_select('category', 'EWS') ?>>EWS
                                                            </option>
                                                            <option value='SC' <?= set_select('category', 'SC') ?>>SC
                                                            </option>
                                                            <option value='ST' <?= set_select('category', 'ST') ?>>ST
                                                            </option>
                                                        </select>
                                                        <?php if (validation_errors()) { ?>
                                                        <div class="myalert">
                                                            <?php echo form_error('category') ?>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- NAME -->
                                                <div class="form-group">
                                                    <label>Divyang <span style="color:red;">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                                class="glyphicon glyphicon-star"></i></span>
                                                        <select id="pwd" name="pwd" class="form-select"
                                                            aria-label="Default select example">
                                                            <option value=""> Please Select Divyang</option>
                                                            <option value="Y" <?= set_select('pwd', 'Y') ?>>Yes</option>
                                                            <option value="N" <?= set_select('pwd', 'N') ?>>No</option>
                                                        </select>
                                                        <?php if (validation_errors()) { ?>
                                                        <div class="myalert">
                                                            <?php echo form_error('pwd') ?>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- NAME -->
                                                <div class="form-group">
                                                    <label>Mobile Number<span style="color:red;">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                                class="glyphicon glyphicon-phone-alt"></i></span>
                                                        <input value="<?php echo set_value('mobile'); ?>" maxlength="10"
                                                            id="mobile" type="text" class="form-control" max-="10"
                                                            name="mobile" placeholder="Enter Your Number">
                                                        <?php if (validation_errors()) { ?>
                                                        <div class="myalert">
                                                            <?php echo form_error('mobile') ?>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">
                                                <!-- NAME -->
                                                <div class="form-group">
                                                    <label>Email<span style="color:red;">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                                class="glyphicon glyphicon-envelope"></i></span>
                                                        <input value="<?php echo set_value('email'); ?>" id="email"
                                                            type="text" class="form-control" name="email"
                                                            placeholder="Enter Your Email">
                                                        <?php if (validation_errors()) { ?>
                                                        <div class="myalert">
                                                            <?php echo form_error('email') ?>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- NAME -->
                                                <div class="form-group">
                                                    <label>Date Of Birth <span style="color:red;">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                                class="glyphicon glyphicon-calendar"></i></span>
                                                        <input value="<?php echo set_value('dob'); ?>" id="dob"
                                                            type="text" class="form-control" name="dob"
                                                            placeholder="dd-mm-yy" autocomplete="off" readonly>
                                                        <?php if (validation_errors()) { ?>
                                                        <div class="myalert">
                                                            <?php echo form_error('dob') ?>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- NAME -->
                                                <div class="form-group">
                                                    <label>Do you have B.Tech Degree <span
                                                            style="color:red;">*</span></label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="btech_yes"
                                                            id="btech_yes" value="Y" /> <label class="form-check-label"
                                                            for="inlineRadio1yes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="btech_yes"
                                                            id="btech_no" value="N" /> <label class="form-check-label"
                                                            for="inlineRadio1no">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="nonbetch">
                                                <div class="col-md-12">
                                                    <!-- NAME -->
                                                    <div class="form-group">
                                                        <label>Do you have Bachelor’s degree with mathematics or
                                                            statistics as subject<span
                                                                style="color:red;">*</span></label>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="math_stat" id="math_stat_yes" value="Y" /> <label
                                                                class="form-check-label"
                                                                for="inlineRadio2yes">Yes</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="math_stat" id="math_stat_no" value="N" /> <label
                                                                class="form-check-label" for="inlineRadio2no">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit" id="registerButton">Submit &raquo;</button>
                                        </div>
                                        <?php }
                                        ?>
                                        </form>
                                    </div>
                                </div>

                            </div> <!-- New User end -->
                            <!-- <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">Candidates can now check their admission status.</marquee> -->
                        </div> <!-- panel body end  -->
                    </div> <!-- panel end  -->
                    <!--end  -->
                </div>
                <!--home col-md-12 end  -->
            </div>
            <!--home row end  -->
        </div>
        <!--home end  -->
    </div>
    <!--row col-md-8 end  -->
    <div class="col-md-2">
        <!--row col-md-4 start  -->
        <div class="notice">
            <!--notice start  -->
            <div class="row">
                <div class="col-md-12">

                    <!-- <div class="panel panel-primary news_back">
                        <div class="panel-heading">Notics
                        </div>
                        <div class="panel-body">
                           <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">Candidates can now check their admission status.</marquee>
                        </div>
                    </div> -->

                </div>
            </div>
        </div>
        <!--notice end -->
    </div>
    <!--row col-md-4 end  -->
</div>
<!--row start  -->
<script type="text/javascript" src="<?php echo base_url(); ?>themes/dist/js/adm_mba/adm_registration.js"></script>
</div>
<!--row start  -->
<script type="text/javascript" src="<?php echo base_url(); ?>themes/dist/js/adm_mba/adm_mba_education.js"></script>
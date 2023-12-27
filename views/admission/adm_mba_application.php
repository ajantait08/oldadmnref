<link href="<?php echo base_url(); ?>themes/dist/css/adm_mba/adm_mba_personal_details.css" rel="stylesheet"
    media="screen">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
<style>
.myalert {
    color: red;
}

.button {
    padding: 6px 20px;
    font-size: 18px;
    text-align: center;
    cursor: pointer;
    outline: none;
    color: #fff;
    background-color: #5161ce;
    border: none;
    border-radius: 11px;
    box-shadow: 0 3px #999;
}

.button:hover {
    background-color: #5161ce
}

.button:active {
    background-color: #5161ce;
    box-shadow: 0 5px #666;
    transform: translateY(4px);
}

.ribbon {
    position: relative;
    padding: 0 0.5em;
    font-size: 2.000em;
    margin: 0 0 0 -0.625em;
    line-height: 0.143em;
    color: #f8f9fa;
    border-radius: 0 0.156em 0.156em 0;
    background: #5161ce;
    box-shadow: -1px 2px 3px rgba(0, 0, 0, 0.5);
}

.ribbon:before,
.ribbon:after {
    position: absolute;
    content: '';
    display: block;
}

.ribbon:before {
    width: 0.469em;
    height: 100%;
    padding: 0 0 0.438em;
    top: 0;
    left: -0.469em;
    background: inherit;
    border-radius: 0.313em 0 0 0.313em;
}

.ribbon:after {
    width: 0.313em;
    height: 0.313em;
    background: rgba(0, 0, 0, 0.35);
    bottom: -0.313em;
    left: -0.313em;
    border-radius: 0.313em 0 0 0.313em;
    box-shadow: inset -1px 2px 2px rgba(0, 0, 0, 0.3);
}

.ribbon {
    line-height: 0.143em;
    padding: 0.5em;
}

.ribbon:before,
.ribbon:after {
    font-size: 0.114em;
}

.content {
    background: #f8f9fa;
    min-height: 3.750em;
    margin: 2em auto;
    padding: 1.250em;
    border-radius: 0.313em;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.5);
    line-height: 1.5em;
    color: #292929;
}

.row.content {
    height: auto;
}

.modal-content {
    max-width: 900px;
}

@media (max-width: 768px) {
    .modal-content {
        width: 100%;
    }
}

@media (max-width: 992px) {
    .modal-content {
        width: 100%;
    }
}

@media (max-width: 500px) {
    .modal-content {
        width: 100%;
    }
}
</style>
<script type="text/javascript">
// ------------step-wizard-------------
$(document).ready(function() {


});
</script>
<?php
if (!($this->session->has_userdata('login_type'))) {
    redirect('admission/Add_mba/adm_mba_login');
} ?>
<div class="row">
    <!--row start  -->
    <div class="col-sm-2 col-md-2 col-lg-2">
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

        <div class="info">
            <!--info start  -->
            <div class="row">
                <div class="col-md-12">
                    <!--start  -->
                    <div class="panel panel-primary news_back">
                        <div class="panel-heading">Activity
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <?php if (!empty($curr_appl_no)) { ?>
                                    <div class="well well-sm">Current application No</div>
                                    <div class="well well-sm" style="margin-top: -21px;"><?php echo $curr_appl_no; ?>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <input class="btn btn-danger" style="width:100%;" type="button"
                                        onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/Adm_registration/logout'"
                                        value="Logout" />
                                    <!-- <button class="btn btn-danger" style="width:100%;"><a href="<?php echo base_url() ?>index.php/admission/Adm_registration/logout"><b style="text-decoration: none; color: white;">Logout</b></a> </button> -->

                                </div>
                            </div>

                        </div>
                    </div>
                    <!--end  -->
                </div>
            </div>
        </div>
        <!--info end -->
    </div>
    <!--row col-md-4 end  -->

    <div class="col-sm-8 col-md-8 col-lg-8">
        <!--row col-md-8 start  -->
        <div class="home" id="hidehome">
            <!--home start  -->
            <div class="row">
                <!--home row start  -->
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <!--home col-md-12 start  -->
                    <!--start  -->
                    <div class="panel panel-primary news_back">
                        <div class="panel-heading">Please fill your application details
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
                                                        <li role="presentation" class="active" id="tab1">
                                                            <a href="#" data-toggle="tab" aria-controls="step1"
                                                                role="tab" aria-expanded="true"><span
                                                                    class="round-tab">PD </span> <i>Personal
                                                                    Details</i></a>
                                                        </li>
                                                        <li role="presentation" class="disabled" id="tab2">
                                                            <a href="#" data-toggle="tab" aria-controls="step2"
                                                                role="tab" aria-expanded="false"><span
                                                                    class="round-tab">QN</span> <i>Qualification</i></a>
                                                        </li>
                                                        <li role="presentation" class="disabled" id="tab3">
                                                            <a href="#" data-toggle="tab" aria-controls="step3"
                                                                role="tab"><span class="round-tab">WE</span> <i>Work
                                                                    Experience</i></a>
                                                        </li>
                                                        <li role="presentation" class="disabled" id="tab4">
                                                            <a href="#step4" data-toggle="tab" aria-controls="step4"
                                                                role="tab"><span class="round-tab">DU</span> <i>Document
                                                                    Upload</i></a>
                                                        </li>
                                                        <li role="presentation" class="disabled" id="tab5">
                                                            <a href="#step5" data-toggle="tab" aria-controls="step5"
                                                                role="tab"><span class="round-tab">PT</span>
                                                                <i>Payment</i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- <form role="form" action="index.html" class="login-box register"> -->
                                                <div class="tab-content" id="main_form">
                                                    <!-- first tab personal detail start -->

                                                    <div class="tab-pane active" role="tabpanel" id="step1">
                                                        <?php if ($this->session->flashdata('apply_success_education')) { ?>
                                                        <div class="alert alert-success alert-dismissible">
                                                            <a href="#" class="close" data-dismiss="alert"
                                                                aria-label="close">&times;</a>
                                                            <?php echo $this->session->flashdata('apply_success_education') ?>
                                                        </div>
                                                        <?php } ?>
                                                        <?php if ($this->session->flashdata('success')) { ?>
                                                        <div class="alert alert-success alert-dismissible">
                                                            <a href="#" class="close" data-dismiss="alert"
                                                                aria-label="close">&times;</a>
                                                            <?php echo $this->session->flashdata('success') ?>
                                                        </div>
                                                        <?php } ?>
                                                        <?php if ($this->session->flashdata('error_personal')) { ?>
                                                        <div class="alert alert-danger alert-dismissible">
                                                            <a href="#" class="close" data-dismiss="alert"
                                                                aria-label="close">&times;</a>
                                                            <?php echo $this->session->flashdata('error_personal') ?>
                                                        </div>
                                                        <?php } ?>
                                                        <h4 class="text-center" style="text-decoration: underline;">
                                                            Personal Details</h4>
                                                        <?php
                                                        $attributes = array('class' => 'email', 'id' => 'p_details', 'name' => 'p_details', 'enctype' => 'multipart/form-data');
                                                        echo form_open('admission/Adm_mba_personal_details/get_personal_details', $attributes); ?>
                                                        <div class="row">

                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Applicant's Name:</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon"><i
                                                                                class="glyphicon glyphicon-user"></i></span>
                                                                        <input id="application_no" type="text"
                                                                            name="application_no" class="form-control"
                                                                            value=" <?php if (!empty($registration_detail)) {
                                                                                                                                                                        echo $registration_detail[0]->first_name . " " . $registration_detail[0]->middle_name . " " . $registration_detail[0]->last_name;
                                                                                                                                                                    } ?>"
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-sm-6 col-lg-6">

                                                                <div class="form-group">
                                                                    <label>Registration No:</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon"><i
                                                                                class="glyphicon glyphicon-user"></i></span>
                                                                        <input id="registration_no"
                                                                            name="registration_no" type="text"
                                                                            class="form-control"
                                                                            value="<?php if (!empty($registration_detail)) {
                                                                                                                                                                        echo $registration_detail[0]->registration_no;
                                                                                                                                                                    } ?>"
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Name of the Parent/Guardian: <span
                                                                            style="color:red;">*</span></label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon"><i
                                                                                class="glyphicon glyphicon-user"></i></span>
                                                                        <input id="parent_name" name="parent_name"
                                                                            onkeyup="capital(this.id)"
                                                                            value="<?php echo set_value('parent_name'); ?><?php if (!empty($application_details_ms[0]['guardian_name'])) {
                                                                                                                                                                                                echo $application_details_ms[0]['guardian_name'];
                                                                                                                                                                                            } ?>"
                                                                            onkeypress="return IsSpecificSpecialCharacter(event);"
                                                                            type="text" class="form-control"
                                                                            placeholder="Enter Name of the Parent/Guardian">
                                                                        <?php if (validation_errors()) { ?>
                                                                        <div class="myalert">
                                                                            <?php echo form_error('parent_name') ?>
                                                                        </div>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-sm-12 col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Guardian Mobile Number: <span
                                                                            style="color:red;">*</span></label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon"><i
                                                                                class="glyphicon glyphicon-user"></i></span>
                                                                        <input id="guardian_mobile_no"
                                                                            name="guardian_mobile_no" type="text"
                                                                            value="<?php echo set_value('guardian_mobile_no'); ?><?php if (!empty($application_details_ms[0]['guardian_mobile'])) {
                                                                                                                                                                                                        echo $application_details_ms[0]['guardian_mobile'];
                                                                                                                                                                                                    } ?>"
                                                                            class="form-control" maxlength="10"
                                                                            placeholder="Enter Guardian Mobile Number">
                                                                        <?php if (validation_errors()) { ?>
                                                                        <div class="myalert">
                                                                            <?php echo form_error('guardian_mobile_no'); ?>
                                                                        </div>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Relationship of Parent/Guardian: <span
                                                                            style="color:red;">*</span></label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon"><i
                                                                                class="glyphicon glyphicon-user"></i></span>
                                                                        <input id="parent_relation"
                                                                            name="parent_relation"
                                                                            value="<?php echo set_value('parent_relation'); ?><?php if (!empty($application_details_ms[0]['guardian_realtion'])) {
                                                                                                                                                                                    echo $application_details_ms[0]['guardian_realtion'];
                                                                                                                                                                                } ?>"
                                                                            onkeypress="return IsSpecificSpecialCharacter(event);"
                                                                            onkeyup="capital(this.id)" type="text"
                                                                            class="form-control"
                                                                            placeholder="Enter Relationship of Parent/Guardian ">
                                                                        <?php if (validation_errors()) { ?>
                                                                        <div class="myalert">
                                                                            <?php echo form_error('parent_relation') ?>
                                                                        </div>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Category:</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon"><i
                                                                                class="glyphicon glyphicon-user"></i></span>
                                                                        <input id="category" name="category" type="text"
                                                                            class="form-control"
                                                                            value="<?php if (!empty($registration_detail)) {
                                                                                                                                                            echo $registration_detail[0]->category;
                                                                                                                                                        } ?>"
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label>PWD:</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon"><i
                                                                                class="glyphicon glyphicon-user"></i></span>
                                                                        <input id="pwd" name="pwd" type="text"
                                                                            value="<?php if (!empty($registration_detail)) {
                                                                                                                            if ($registration_detail[0]->pwd == 'Y') {
                                                                                                                                echo "Yes";
                                                                                                                            } else {
                                                                                                                                echo "No";
                                                                                                                            }
                                                                                                                        } ?>" class="form-control"
                                                                            name="divyang" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Nationality: <span
                                                                            style="color:red;">*</span></label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon"><i
                                                                                class="glyphicon glyphicon-user"></i></span>
                                                                        <input id="nationality" name="nationality"
                                                                            type="text"
                                                                            value="<?php echo set_value('nationality', 'INDIAN'); ?>"
                                                                            class="form-control" readonly>
                                                                        <?php if (validation_errors()) { ?>
                                                                        <div class="myalert">
                                                                            <?php echo form_error('nationality') ?>
                                                                        </div>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Religion: <span
                                                                            style="color:red;">*</span></label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon"><i
                                                                                class="glyphicon glyphicon-user"></i></span>

                                                                        <select class="form-control" id="religion"
                                                                            name="religion" required>

                                                                            <?php if (!empty($application_details_ms[0]['religion'])) { ?>



                                                                            <option
                                                                                value="<?php echo $application_details_ms[0]['religion']; ?>">
                                                                                <?php echo $application_details_ms[0]['religion']; ?>
                                                                            </option>

                                                                            <option value="Hindu"
                                                                                <?php echo  set_select('religion', 'Hindu'); ?>>
                                                                                Hindu</option>
                                                                            <option value="Christian"
                                                                                <?php echo  set_select('religion', 'Christian'); ?>>
                                                                                Christian</option>
                                                                            <option value="Buddhist"
                                                                                <?php echo  set_select('religion', 'Buddhist'); ?>>
                                                                                Buddhist</option>
                                                                            <option value="Muslim"
                                                                                <?php echo  set_select('religion', 'Muslim'); ?>>
                                                                                Muslim</option>
                                                                            <option value="Sikh"
                                                                                <?php echo  set_select('religion', 'Sikh'); ?>>
                                                                                Sikh</option>
                                                                            <option value="Other"
                                                                                <?php echo  set_select('religion', 'Other'); ?>>
                                                                                Other</option>

                                                                            <?php
                                                                            } else { ?>

                                                                            <option value="">Please Select Religion
                                                                            </option>
                                                                            <option value="Hindu"
                                                                                <?php echo  set_select('religion', 'Hindu'); ?>>
                                                                                Hindu</option>
                                                                            <option value="Christian"
                                                                                <?php echo  set_select('religion', 'Christian'); ?>>
                                                                                Christian</option>
                                                                            <option value="Buddhist"
                                                                                <?php echo  set_select('religion', 'Buddhist'); ?>>
                                                                                Buddhist</option>
                                                                            <option value="Muslim"
                                                                                <?php echo  set_select('religion', 'Muslim'); ?>>
                                                                                Muslim</option>
                                                                            <option value="Sikh"
                                                                                <?php echo  set_select('religion', 'Sikh'); ?>>
                                                                                Sikh</option>
                                                                            <option value="Other"
                                                                                <?php echo  set_select('religion', 'Other'); ?>>
                                                                                Other</option>
                                                                            <?php
                                                                            } ?>


                                                                        </select>
                                                                        <?php if (validation_errors()) { ?>
                                                                        <div class="myalert">
                                                                            <?php echo form_error('religion') ?>
                                                                        </div>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Martial Status <span
                                                                            style="color:red;">*</span></label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon"><i
                                                                                class="glyphicon glyphicon-user"></i></span>
                                                                        <select id="martial" name="martial"
                                                                            class="form-select"
                                                                            aria-label="Default select example">
                                                                            <?php if (!empty($application_details_ms[0]['maritial_status'])) { ?>

                                                                            <option
                                                                                value="<?php echo $application_details_ms[0]['maritial_status']; ?>">
                                                                                <?php echo $application_details_ms[0]['maritial_status']; ?>
                                                                            </option>
                                                                            <option value="Married"
                                                                                <?php echo  set_select('martial', 'Married'); ?>>
                                                                                Married</option>
                                                                            <option value="Unmarried"
                                                                                <?php echo  set_select('martial', 'Unmarried'); ?>>
                                                                                Unmarried</option>
                                                                            <option value="Widowed"
                                                                                <?php echo  set_select('martial', 'Widowed'); ?>>
                                                                                Widowed</option>
                                                                            <option value="Divorced"
                                                                                <?php echo  set_select('martial', 'Divorced'); ?>>
                                                                                Divorced</option>
                                                                            <option value="Other"
                                                                                <?php echo  set_select('martial', 'Other'); ?>>
                                                                                Other</option>

                                                                            <?php
                                                                            } else { ?>

                                                                            <option value=""> Please Select Martial
                                                                                Status</option>
                                                                            <option value="Married"
                                                                                <?php echo  set_select('martial', 'Married'); ?>>
                                                                                Married</option>
                                                                            <option value="Unmarried"
                                                                                <?php echo  set_select('martial', 'Unmarried'); ?>>
                                                                                Unmarried</option>
                                                                            <option value="Widowed"
                                                                                <?php echo  set_select('martial', 'Widowed'); ?>>
                                                                                Widowed</option>
                                                                            <option value="Divorced"
                                                                                <?php echo  set_select('martial', 'Divorced'); ?>>
                                                                                Divorced</option>
                                                                            <option value="Other"
                                                                                <?php echo  set_select('martial', 'Other'); ?>>
                                                                                Other</option>
                                                                            <?php
                                                                            } ?>

                                                                        </select>
                                                                        <?php if (validation_errors()) { ?>
                                                                        <div class="myalert">
                                                                            <?php echo form_error('martial') ?>
                                                                        </div>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label>DOB: <span
                                                                            style="color:red;">*</span></label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon"><i
                                                                                class="glyphicon glyphicon-user"></i></span>
                                                                        <input id="dob" name="dob" type="text"
                                                                            class="form-control"
                                                                            value="<?php if (!empty($registration_detail)) {
                                                                                                                                                echo $registration_detail[0]->dob;
                                                                                                                                            } ?>"
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Email: <span
                                                                            style="color:red;">*</span></label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon"><i
                                                                                class="glyphicon glyphicon-user"></i></span>
                                                                        <input id="email" name="email" type="text"
                                                                            class="form-control"
                                                                            value="<?php if (!empty($registration_detail)) {
                                                                                                                                                    echo $registration_detail[0]->email;
                                                                                                                                                } ?>"
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Mobile Number:</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon"><i
                                                                                class="glyphicon glyphicon-user"></i></span>
                                                                        <input id="mobile" name="mobile" type="text"
                                                                            value="<?php if (!empty($registration_detail)) {
                                                                                                                                echo $registration_detail[0]->mobile;
                                                                                                                            } ?>"
                                                                            class="form-control" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Aadhaar Number:</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon"><i
                                                                                class="glyphicon glyphicon-user"></i></span>
                                                                        <input id="adhar" name="adhar"
                                                                            value="<?php echo set_value('adhar'); ?> <?php if (!empty($application_details_ms[0]['adhar'])) {
                                                                                                                                                    echo $application_details_ms[0]['adhar'];
                                                                                                                                                } ?>"
                                                                            maxlength="12" type="text"
                                                                            class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Gender: <span
                                                                            style="color:red;">*</span></label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon"><i
                                                                                class="glyphicon glyphicon-user"></i></span>
                                                                        <select id="gender" name="gender"
                                                                            class="form-select"
                                                                            aria-label="Default select example">

                                                                            <?php if (!empty($application_details_ms[0]['gender'])) { ?>

                                                                            <option
                                                                                value="<?php echo $application_details_ms[0]['gender']; ?>">
                                                                                <?php echo $application_details_ms[0]['gender']; ?>
                                                                            </option>

                                                                            <option value="Male"
                                                                                <?php echo  set_select('gender', 'Male'); ?>>
                                                                                Male</option>
                                                                            <option value="Female"
                                                                                <?php echo  set_select('gender', 'Female'); ?>>
                                                                                Female</option>
                                                                            <option value="Transgender">Transgender
                                                                            </option>

                                                                            <?php
                                                                            } else { ?>

                                                                            <option value=""> Please Select Gender
                                                                            </option>
                                                                            <option value="Male"
                                                                                <?php echo  set_select('gender', 'Male'); ?>>
                                                                                Male</option>
                                                                            <option value="Female"
                                                                                <?php echo  set_select('gender', 'Female'); ?>>
                                                                                Female</option>
                                                                            <option value="Transgender">Transgender
                                                                            </option>
                                                                            <?php
                                                                            } ?>


                                                                        </select>
                                                                        <?php if (validation_errors()) { ?>
                                                                        <div class="myalert">
                                                                            <?php echo form_error('martial') ?>
                                                                        </div>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <?php
                                                            if ($registration_detail[0]->category == 'OBC' || $registration_detail[0]->category == 'EWS') {
                                                            ?>

                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Date of Issuance of caste
                                                                        certificate(OBC-NCL/EWS)(Issued on or after
                                                                        October 01, 2022)<span id='doprof'
                                                                            style="color:red;">*</span></label>
                                                                    <!-- <label>Date of Issue of OBC(NCL) certificate as per Annexure I and issued on or after October 01, 2022<span id='doprof' style="color:red;">*</span></label> -->
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon"><i
                                                                                class="glyphicon glyphicon-user"></i></span>
                                                                        <input id="date_of_issue" type="text"
                                                                            name="date_of_issue" class="form-control"
                                                                            value="<?php if (!empty($application_details_ms[0]['ews_obc_doc_date'])) {
                                                                                                                                                                        echo $application_details_ms[0]['ews_obc_doc_date'];
                                                                                                                                                                    } ?>"
                                                                            readonly>
                                                                        <?php if (validation_errors()) { ?>
                                                                        <div class="myalert">
                                                                            <?php echo form_error('date_of_issue') ?>
                                                                        </div>
                                                                        <?php } ?>


                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <?php } ?>



                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                                                        <div class="form-group">
                                                                            <label>Correspondence Address:<span
                                                                                    style="color:red;">*</span></label>
                                                                            <p><span style="color:red;">*Line1
                                                                                    Address,City And
                                                                                    District,State,Pincode are
                                                                                    mandatory</span></p>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <div class="form-group purple-border">
                                                                                <input
                                                                                    onkeypress="return IsSpecificSpecialCharacter(event);"
                                                                                    value="<?php echo set_value('c_line1') ?><?php if (!empty($c_addr_details[0]->line_1)) {
                                                                                                                                                                                            echo $c_addr_details[0]->line_1;
                                                                                                                                                                                        } ?>"
                                                                                    id="c_line1" name="c_line1"
                                                                                    type="text" class="form-control"
                                                                                    maxlength="48"
                                                                                    placeholder="Enter Line 1 address ">
                                                                                <input value="<?php if (!empty($c_addr_details[0]->addr_id)) {
                                                                                                    echo $c_addr_details[0]->addr_id;
                                                                                                } ?>" id="c_line4"
                                                                                    name="c_line4" type="hidden"
                                                                                    class="form-control">
                                                                                <?php if (validation_errors()) { ?>
                                                                                <div class="myalert">
                                                                                    <?php echo form_error('c_line1') ?>
                                                                                </div>
                                                                                <?php } ?>
                                                                                <input
                                                                                    onkeypress="return IsSpecificSpecialCharacter(event);"
                                                                                    value="<?php echo set_value('c_line2') ?><?php if (!empty($c_addr_details[0]->line_2)) {
                                                                                                                                                                                            echo $c_addr_details[0]->line_2;
                                                                                                                                                                                        } ?>"
                                                                                    id="c_line2" name="c_line2"
                                                                                    type="text" class="form-control"
                                                                                    maxlength="48"
                                                                                    placeholder="Enter Line 2 address ">
                                                                                <input
                                                                                    onkeypress="return IsSpecificSpecialCharacter(event);"
                                                                                    value="<?php echo set_value('c_line3') ?><?php if (!empty($c_addr_details[0]->line_3)) {
                                                                                                                                                                                            echo $c_addr_details[0]->line_3;
                                                                                                                                                                                        } ?>"
                                                                                    id="c_line3" name="c_line3"
                                                                                    type="text" class="form-control"
                                                                                    maxlength="48"
                                                                                    placeholder="Enter Line 3 address ">
                                                                                <input
                                                                                    onkeypress="return IsSpecificSpecialCharacter(event);"
                                                                                    value="<?php echo set_value('c_city') ?><?php if (!empty($c_addr_details[0]->city)) {
                                                                                                                                                                                            echo $c_addr_details[0]->city;
                                                                                                                                                                                        } ?>"
                                                                                    id="c_city" name="c_city"
                                                                                    type="text" class="form-control"
                                                                                    placeholder="Enter City And District ">
                                                                                <?php if (validation_errors()) { ?>
                                                                                <div class="myalert">
                                                                                    <?php echo form_error('c_city') ?>
                                                                                </div>
                                                                                <?php } ?>
                                                                                <select class="form-control"
                                                                                    id="c_state" name="c_state">

                                                                                    <?php if (!empty($c_addr_details[0]->state)) { ?>

                                                                                    <option
                                                                                        value="<?php echo $c_addr_details[0]->state ?>">
                                                                                        <?php echo $c_addr_details[0]->state; ?>
                                                                                    </option>


                                                                                    <?php if (!empty($state)) {
                                                                                            foreach ($state as $value) { ?>
                                                                                    <option
                                                                                        value="<?php echo $value->state_name ?> <?php echo  set_select('c_state', $value->state_name); ?>">
                                                                                        <?php echo $value->state_name ?>
                                                                                    </option>
                                                                                    <?php }
                                                                                        } ?>

                                                                                    <?php
                                                                                    } else { ?>

                                                                                    <option value="">Please Select State
                                                                                    </option>
                                                                                    <?php if (!empty($state)) {
                                                                                            foreach ($state as $value) { ?>
                                                                                    <option
                                                                                        value="<?php echo $value->state_name ?> <?php echo  set_select('c_state', $value->state_name); ?>">
                                                                                        <?php echo $value->state_name ?>
                                                                                    </option>
                                                                                    <?php }
                                                                                        } ?>

                                                                                    <?php
                                                                                    } ?>



                                                                                </select>
                                                                                <?php if (validation_errors()) { ?>
                                                                                <div class="myalert">
                                                                                    <?php echo form_error('c_state') ?>
                                                                                </div>
                                                                                <?php } ?>
                                                                                <input id="c_pincode" name="c_pincode"
                                                                                    value="<?php echo set_value('c_pincode') ?><?php if (!empty($c_addr_details[0]->pincode)) {
                                                                                                                                                                        echo $c_addr_details[0]->pincode;
                                                                                                                                                                    } ?>"
                                                                                    maxlength="6" type="text"
                                                                                    class="form-control"
                                                                                    placeholder="Enter Pincode">
                                                                                <?php if (validation_errors()) { ?>
                                                                                <div class="myalert">
                                                                                    <?php echo form_error('c_pincode') ?>
                                                                                </div>
                                                                                <?php } ?>
                                                                                <input id="c_country" name="c_country"
                                                                                    value="<?php if (!empty($c_addr_details[0]->country)) {
                                                                                                                                    echo $c_addr_details[0]->country;
                                                                                                                                } ?>"
                                                                                    maxlength="6" type="text"
                                                                                    class="form-control"
                                                                                    placeholder="Enter Country">
                                                                                <?php if (validation_errors()) { ?>
                                                                                <div class="myalert">
                                                                                    <?php echo form_error('c_country') ?>
                                                                                </div>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-lg-12">

                                                                        <div class="form-group">
                                                                            <label>Permanent Address <span
                                                                                    style="color:red;">* </span><input
                                                                                    type="checkbox"
                                                                                    class="form-check-input"
                                                                                    id="same_p_c_add"
                                                                                    name="same_p_c_add"> (same as
                                                                                Correspondence)</label>
                                                                            <p><span style="color:red;">* Line1
                                                                                    Address,City And
                                                                                    District,State,Pincode are
                                                                                    mandatory</span></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12  col-sm-12 col-lg-12">
                                                                        <div class="form-group">
                                                                            <div class="form-group purple-border">
                                                                                <input
                                                                                    onkeypress="return IsSpecificSpecialCharacter(event);"
                                                                                    value="<?php echo set_value('p_line1') ?><?php if (!empty($p_addr_details[0]->line_1)) {
                                                                                                                                                                                            echo $p_addr_details[0]->line_1;
                                                                                                                                                                                        } ?>"
                                                                                    id="p_line1" name="p_line1"
                                                                                    type="text" class="form-control"
                                                                                    maxlength="48"
                                                                                    placeholder="Enter Line 1 address ">
                                                                                <input value="<?php if (!empty($p_addr_details[0]->addr_id)) {
                                                                                                    echo $p_addr_details[0]->addr_id;
                                                                                                } ?>" id="p_line4"
                                                                                    name="p_line4" type="hidden">
                                                                                <?php if (validation_errors()) { ?>
                                                                                <div class="myalert">
                                                                                    <?php echo form_error('p_line1') ?>
                                                                                </div>
                                                                                <?php } ?>
                                                                                <input
                                                                                    onkeypress="return IsSpecificSpecialCharacter(event);"
                                                                                    id="p_line2"
                                                                                    value="<?php echo set_value('p_line2') ?><?php if (!empty($p_addr_details[0]->line_2)) {
                                                                                                                                                                                                        echo $p_addr_details[0]->line_2;
                                                                                                                                                                                                    } ?>"
                                                                                    name="p_line2" type="text"
                                                                                    class="form-control" maxlength="48"
                                                                                    placeholder="Enter Line 2 address ">
                                                                                <input
                                                                                    onkeypress="return IsSpecificSpecialCharacter(event);"
                                                                                    id="p_line3"
                                                                                    value="<?php echo set_value('p_line3') ?><?php if (!empty($p_addr_details[0]->line_3)) {
                                                                                                                                                                                                        echo $p_addr_details[0]->line_3;
                                                                                                                                                                                                    } ?>"
                                                                                    name="p_line3" type="text"
                                                                                    class="form-control" maxlength="48"
                                                                                    placeholder="Enter Line 3 address ">
                                                                                <input
                                                                                    onkeypress="return IsSpecificSpecialCharacter(event);"
                                                                                    id="p_city"
                                                                                    value="<?php echo set_value('p_city') ?><?php if (!empty($p_addr_details[0]->city)) {
                                                                                                                                                                                                        echo $p_addr_details[0]->city;
                                                                                                                                                                                                    } ?>"
                                                                                    name="p_city" type="text"
                                                                                    class="form-control"
                                                                                    placeholder="Enter City and District">
                                                                                <?php if (validation_errors()) { ?>
                                                                                <div class="myalert">
                                                                                    <?php echo form_error('p_city') ?>
                                                                                </div>
                                                                                <?php } ?>
                                                                                <select class="form-control"
                                                                                    id="p_state" name="p_state">


                                                                                    <?php if (!empty($p_addr_details[0]->state)) { ?>

                                                                                    <option
                                                                                        value="<?php echo $p_addr_details[0]->state; ?>">
                                                                                        <?php echo $p_addr_details[0]->state; ?>
                                                                                    </option>


                                                                                    <?php if (!empty($state)) {
                                                                                            foreach ($state as $value) { ?>
                                                                                    <option
                                                                                        value="<?php echo $value->state_name ?> <?php echo  set_select('p_state', $value->state_name); ?>">
                                                                                        <?php echo $value->state_name ?>
                                                                                    </option>
                                                                                    <?php }
                                                                                        } ?>

                                                                                    <?php
                                                                                    } else { ?>

                                                                                    <option value="">Please Select State
                                                                                    </option>
                                                                                    <?php if (!empty($state)) {
                                                                                            foreach ($state as $value) { ?>
                                                                                    <option
                                                                                        value="<?php echo $value->state_name ?> <?php echo  set_select('p_state', $value->state_name); ?>">
                                                                                        <?php echo $value->state_name ?>
                                                                                    </option>
                                                                                    <?php }
                                                                                        } ?>

                                                                                    <?php
                                                                                    } ?>


                                                                                </select>
                                                                                <?php if (validation_errors()) { ?>
                                                                                <div class="myalert">
                                                                                    <?php echo form_error('p_state') ?>
                                                                                </div>
                                                                                <?php } ?>
                                                                                <input id="p_pincode" name="p_pincode"
                                                                                    value="<?php echo set_value('p_pincode') ?><?php if (!empty($p_addr_details[0]->pincode)) {
                                                                                                                                                                        echo $p_addr_details[0]->pincode;
                                                                                                                                                                    } ?>"
                                                                                    maxlength="6" type="text"
                                                                                    class="form-control"
                                                                                    placeholder="Enter Pincode">
                                                                                <?php if (validation_errors()) { ?>
                                                                                <div class="myalert">
                                                                                    <?php echo form_error('p_pincode') ?>
                                                                                </div>
                                                                                <?php } ?>
                                                                                <input id="p_country" name="p_country"
                                                                                    maxlength="6"
                                                                                    value="<?php if (!empty($p_addr_details[0]->country)) {
                                                                                                                                                echo $p_addr_details[0]->country;
                                                                                                                                            } ?>"
                                                                                    class="form-control"
                                                                                    placeholder="Enter Country">
                                                                                <?php if (validation_errors()) { ?>
                                                                                <div class="myalert">
                                                                                    <?php echo form_error('p_country') ?>
                                                                                </div>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p><span style="color:red;">NOTE: No special characters allowed
                                                                in address except the following: , - . & ( )</span></p>
                                                        <div class='row'>
                                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                                <table>
                                                                    <tr>
                                                                        <th>SL No.</th>
                                                                        <th>Department</th>
                                                                        <th>Programme applying</th>
                                                                        <th>Course</th>
                                                                    </tr>
                                                                    <?php
                                                                    $i = 1;
                                                                    foreach ($application_details as $row) { ?>
                                                                    <tr>
                                                                        <td><?php echo $i; ?></td>

                                                                        <td><?php echo "Management Studies"; ?></td>
                                                                        <td><?php if ($row['program_id'] == 'ba') {
                                                                                    echo "Business Analytics";
                                                                                }
                                                                                if ($row['program_id'] == 'mba') {
                                                                                    echo " Master of Business Administration";
                                                                                }  ?></td>
                                                                        <td><?php echo $row['program_desc']; ?></td>
                                                                    </tr>
                                                                    <?php
                                                                        $i++;
                                                                    }  ?>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <ul class="list-inline pull-right">
                                                            <li><button type="button" class="btn btn-primary"
                                                                    style="background-color: #5161ce;"
                                                                    id="btn_personal_details">Save & Next</button></li>
                                                        </ul>
                                                        </form>
                                                    </div>

                                                    <!-- first tab personal detail end -->
                                                    <!-- second tab Qualification start -->
                                                    <div class="tab-pane" role="tabpanel" id="step2">
                                                        <h4 class="text-center" style="text-decoration: underline;">
                                                            Qualification</h4>
                                                        <?php if ($this->session->flashdata('apply_success_education')) { ?>
                                                        <div class="alert alert-success alert-dismissible">
                                                            <a href="#" class="close" data-dismiss="alert"
                                                                aria-label="close">&times;</a>
                                                            <?php echo $this->session->flashdata('apply_success_education') ?>
                                                        </div>
                                                        <?php } ?>
                                                        <?php if ($this->session->flashdata('apply_success_pd')) { ?>
                                                        <div class="alert alert-success alert-dismissible">
                                                            <a href="#" class="close" data-dismiss="alert"
                                                                aria-label="close">&times;</a>
                                                            <strong></strong>
                                                            <?php echo $this->session->flashdata('apply_success_pd') ?>
                                                        </div>
                                                        <?php } ?>
                                                        <?php if ($this->session->flashdata('error_educationa')) { ?>
                                                        <div class="alert alert-danger alert-dismissible">
                                                            <a href="#" class="close" data-dismiss="alert"
                                                                aria-label="close">&times;</a>
                                                            <?php echo $this->session->flashdata('error_educationa') ?>
                                                        </div>
                                                        <?php } ?>
                                                        <?php
                                                        $attributes = array('class' => 'email', 'id' => 'e_details', 'name' => 'e_details', 'enctype' => 'multipart/form-data');
                                                        echo form_open('admission/Adm_mba_personal_details/get_education_detail', $attributes); ?>
                                                        <!-- //remove the iit graduate features on 17-11-2022 by govind sahu  start here -->
                                                        <?php $kkk = "checking";
                                                        if ($kkk == "write") { ?>
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <p>B.Tech degree from IIT with *8.0 CGPA out of 10<span
                                                                        style="color:red;">*</span></p>
                                                            </div>
                                                            <div class="col-md-4  col-sm-4 col-lg-4">
                                                                <div class="form-group">
                                                                    <!-- <label for="sel1">Select list:</label> -->
                                                                    <select class="form-control" id="btech_cgpa"
                                                                        name="btech_cgpa">

                                                                        <?php if (!empty($application_details_ms[0]['betch_iit'])) {
                                                                                if ($application_details_ms[0]['betch_iit'] == 'Y') { ?>
                                                                        <option value="<?php if ($application_details_ms[0]['betch_iit'] == 'Y') {
                                                                                                        echo "Yes";
                                                                                                    } ?>"
                                                                            <?php echo  set_select('btech_cgpa', 'Yes'); ?>
                                                                            selected readonly>
                                                                            <?php if ($application_details_ms[0]['betch_iit'] == 'Y') {
                                                                                            echo "Yes";
                                                                                        } ?>
                                                                        </option>


                                                                        <?php } else { ?>

                                                                        <option value="<?php if ($application_details_ms[0]['betch_iit'] == 'N') {
                                                                                                        echo "No";
                                                                                                    } ?>"
                                                                            <?php echo  set_select('btech_cgpa', 'No'); ?>
                                                                            selected readonly>
                                                                            <?php if ($application_details_ms[0]['betch_iit'] == 'N') {
                                                                                            echo "No";
                                                                                        } ?>
                                                                        </option>


                                                                        <?php
                                                                                } ?>

                                                                        <?php } else { ?>
                                                                        <option value="">--Please Select --</option>
                                                                        <option value="Yes"
                                                                            <?php echo  set_select('btech_cgpa', 'Yes'); ?>>
                                                                            Yes</option>
                                                                        <option value="No"
                                                                            <?php echo  set_select('btech_cgpa', 'No'); ?>>
                                                                            No</option> -->

                                                                        <?php } ?>

                                                                        <input type="hidden" class="form-control"
                                                                            value="<?php if (!empty($dy)) {
                                                                                                                                    echo $dy;
                                                                                                                                } ?>" id="dynrow"
                                                                            name="dynrow">
                                                                    </select>
                                                                    <?php if (validation_errors()) { ?>
                                                                    <div class="myalert">
                                                                        <?php echo form_error('btech_cgpa') ?>
                                                                    </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div id="iit_name">
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <p> Enter name of IIT <span
                                                                            style="color:red;">*</span></p>
                                                                </div>
                                                                <div class="col-md-4  col-sm-4 col-lg-4">
                                                                    <div class="form-group">
                                                                        <!-- <label for="sel1">Select list:</label> -->
                                                                        <select class="form-control" id="iit_names"
                                                                            name="iit_names">
                                                                            <?php if (!empty($application_details_ms[0]['betch_iit_name'])) { ?>

                                                                            <option
                                                                                value="<?php echo $application_details_ms[0]['betch_iit_name']; ?>">
                                                                                <?php echo $application_details_ms[0]['betch_iit_name']; ?>
                                                                            </option>


                                                                            <?php if (!empty($iit_details)) {
                                                                                        foreach ($iit_details as $value) { ?>
                                                                            <option
                                                                                value="<?php echo $value->iit_desc ?> <?php echo  set_select('iit_names', $value->iit_desc); ?>">
                                                                                <?php echo $value->iit_desc ?></option>
                                                                            <?php }
                                                                                    } ?>

                                                                            <?php
                                                                                } else { ?>

                                                                            <option value="">Please Select IIT Name
                                                                            </option>
                                                                            <?php if (!empty($iit_details)) {
                                                                                        foreach ($iit_details as $value) { ?>
                                                                            <option
                                                                                value="<?php echo $value->iit_desc; ?><?php echo  set_select('iit_names', $value->iit_desc) ?>">
                                                                                <?php echo $value->iit_desc; ?></option>
                                                                            <?php }
                                                                                    } ?>

                                                                            <?php
                                                                                } ?>

                                                                        </select>
                                                                        <?php if (validation_errors()) { ?>
                                                                        <div class="myalert">
                                                                            <?php echo form_error('iit_names') ?>
                                                                        </div>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- <div id="btechyes">
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                <p> Are you cat qualifiying candidate ?</p>
                                                                </div>
                                                                <div class="col-md-4  col-sm-4 col-lg-4">
                                                                <div class="form-group"> 
                                                                        <select class="form-control" id="btech_cat_qual" name="btech_cat_qual">
                                                                            <option value="">--Please Select --</option>
                                                                            <option value="Yes">Yes</option>
                                                                            <option value="No">No</option> 
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <?php } ?>
                                                        <!-- //remove the iit graduate features on 17-11-2022 by govind sahu  end here -->
                                                        <!-- if yes then show this for form  start-->
                                                        <div id="hide_yes_no_cat_no">
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <p> Enter your CAT 2022 Registration Number<span
                                                                            style="color:red;">*</span></p>
                                                                    <p><span style="color:red;">NOTE: Only Numeric
                                                                            Values are allowed in the Registration
                                                                            Number field</span></p>
                                                                </div>
                                                                <div class="col-md-4  col-sm-4 col-lg-4">
                                                                    <div class="form-group">
                                                                        <!-- <label for="sel1">Select list:</label> -->
                                                                        <input maxlength="8"
                                                                            onkeypress="return acceptnumber(event)"
                                                                            type="text"
                                                                            value="<?php if (!empty($cat_details[0]->cat_reg_no)) {
                                                                                                                                                            echo $cat_details[0]->cat_reg_no;
                                                                                                                                                        } ?>"
                                                                            class="form-control" id="cat_reg_no"
                                                                            name="cat_reg_no">
                                                                        <?php if (validation_errors()) { ?>
                                                                        <div class="myalert">
                                                                            <?php echo form_error('cat_reg_no') ?>
                                                                        </div>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>CAT Percentile:<span
                                                                                style="color:red;">*</span></label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i
                                                                                    class="glyphicon glyphicon-user"></i></span>
                                                                            <input maxlength="5" id="cat_percentile"
                                                                                onchange="check_cat_per(this.id)"
                                                                                value="<?php if (!empty($cat_details[0]->cat_percentile)) {
                                                                                                                                                                    echo $cat_details[0]->cat_percentile;
                                                                                                                                                                } ?>"
                                                                                name="cat_percentile" type="text"
                                                                                class="form-control"
                                                                                placeholder="Enter CAT Percentile">
                                                                            <?php if (validation_errors()) { ?>
                                                                            <div class="myalert">
                                                                                <?php echo form_error('cat_percentile') ?>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>CAT Score:<span
                                                                                style="color:red;">*</span></label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i
                                                                                    class="glyphicon glyphicon-user"></i></span>
                                                                            <input maxlength="6"
                                                                                onkeypress="return restrictToIntegerdot(event)"
                                                                                id="cat_score"
                                                                                onchange="check_cat_score(this.id)"
                                                                                value="<?php if (!empty($cat_details[0]->cat_score)) {
                                                                                                                                                                                                                echo $cat_details[0]->cat_score;
                                                                                                                                                                                                            } ?>"
                                                                                name="cat_score" type="text"
                                                                                class="form-control"
                                                                                placeholder="Enter CAT Score">
                                                                            <?php if (validation_errors()) { ?>
                                                                            <div class="myalert">
                                                                                <?php echo form_error('cat_score') ?>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6  col-sm-6 col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>CAT Quantitative Percentile:<span
                                                                                style="color:red;">*</span></label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i
                                                                                    class="glyphicon glyphicon-user"></i></span>
                                                                            <input maxlength="5" id="cat_quantitative_p"
                                                                                onchange="check_cat_per(this.id)"
                                                                                value="<?php if (!empty($cat_details[0]->cat_quant_percentile)) {
                                                                                                                                                                        echo $cat_details[0]->cat_quant_percentile;
                                                                                                                                                                    } ?>"
                                                                                name="cat_quantitative_p" type="text"
                                                                                class="form-control"
                                                                                placeholder="Enter CAT Quantitative Percentile">
                                                                            <?php if (validation_errors()) { ?>
                                                                            <div class="myalert">
                                                                                <?php echo form_error('cat_quantitative_p') ?>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6  col-sm-6 col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>CAT Quantitative Score:<span
                                                                                style="color:red;">*</span></label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i
                                                                                    class="glyphicon glyphicon-user"></i></span>
                                                                            <input maxlength="6"
                                                                                onkeypress="return restrictToIntegerdot(event)"
                                                                                id="cat_quantitative_s"
                                                                                onchange="check_cat_score(this.id)"
                                                                                value="<?php if (!empty($cat_details[0]->cat_quant_score)) {
                                                                                                                                                                                                                        echo $cat_details[0]->cat_quant_score;
                                                                                                                                                                                                                    } ?>"
                                                                                name="cat_quantitative_s" type="text"
                                                                                class="form-control"
                                                                                placeholder="Enter CAT Quantitative Score">
                                                                            <?php if (validation_errors()) { ?>
                                                                            <div class="myalert">
                                                                                <?php echo form_error('cat_quantitative_s') ?>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6  col-sm-6 col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>CAT Verbal Percentile:<span
                                                                                style="color:red;">*</span></label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i
                                                                                    class="glyphicon glyphicon-user"></i></span>
                                                                            <input maxlength="5" id="cat_verbal_p"
                                                                                onchange="check_cat_per(this.id)"
                                                                                value="<?php if (!empty($cat_details[0]->cat_verb_percentile)) {
                                                                                                                                                                echo $cat_details[0]->cat_verb_percentile;
                                                                                                                                                            } ?>"
                                                                                name="cat_verbal_p" type="text"
                                                                                class="form-control"
                                                                                placeholder="CAT Verbal Percentile">
                                                                            <?php if (validation_errors()) { ?>
                                                                            <div class="myalert">
                                                                                <?php echo form_error('cat_verbal_p') ?>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6  col-sm-6 col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>CAT Verbal Score:<span
                                                                                style="color:red;">*</span></label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i
                                                                                    class="glyphicon glyphicon-user"></i></span>
                                                                            <input maxlength="6"
                                                                                onkeypress="return restrictToIntegerdot(event)"
                                                                                id="cat_verbal_s"
                                                                                onchange="check_cat_score(this.id)"
                                                                                value="<?php if (!empty($cat_details[0]->cat_verb_score)) {
                                                                                                                                                                                                                    echo $cat_details[0]->cat_verb_score;
                                                                                                                                                                                                                } ?>"
                                                                                name="cat_verbal_s" type="text"
                                                                                class="form-control"
                                                                                placeholder="Enter CAT Verbal Score">
                                                                            <?php if (validation_errors()) { ?>
                                                                            <div class="myalert">
                                                                                <?php echo form_error('cat_verbal_s') ?>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6  col-sm-6 col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>CAT Data Interpretation Percentile:<span
                                                                                style="color:red;">*</span></label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i
                                                                                    class="glyphicon glyphicon-user"></i></span>
                                                                            <input maxlength="5"
                                                                                onchange="check_cat_per(this.id)"
                                                                                value="<?php if (!empty($cat_details[0]->cat_dis_percentile)) {
                                                                                                                                                echo $cat_details[0]->cat_dis_percentile;
                                                                                                                                            } ?>"
                                                                                id="data_interpretationl_p"
                                                                                name="data_interpretationl_p"
                                                                                type="text" class="form-control"
                                                                                placeholder="Enter CAT Data Interpretation Percentile">
                                                                            <?php if (validation_errors()) { ?>
                                                                            <div class="myalert">
                                                                                <?php echo form_error('data_interpretationl_p') ?>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>CAT Data Interpretation Score:<span
                                                                                style="color:red;">*</span></label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i
                                                                                    class="glyphicon glyphicon-user"></i></span>
                                                                            <input maxlength="6"
                                                                                onkeypress="return restrictToIntegerdot(event)"
                                                                                onchange="check_cat_score(this.id)"
                                                                                value="<?php if (!empty($cat_details[0]->cat_dis_score)) {
                                                                                                                                                                                                echo $cat_details[0]->cat_dis_score;
                                                                                                                                                                                            } ?>"
                                                                                id="data_interpretationl_s"
                                                                                name="data_interpretationl_s"
                                                                                type="text" class="form-control"
                                                                                placeholder="Enter CAT Data Interpretation Score">
                                                                            <?php if (validation_errors()) { ?>
                                                                            <div class="myalert">
                                                                                <?php echo form_error('data_interpretationl_s') ?>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="row" style="margin-bottom:39px;margin-top: 57px;">
                                                            <div class="col-md-6">
                                                                <label>Choose the interview location priority<span
                                                                        style="color:red;">*</span></label>

                                                            </div>
                                                            <div class="col-md-4  col-sm-4 col-lg-4">
                                                                <div class="form-group">
                                                                    <label for="sel1">Priority 1</label>
                                                                    <select class="form-control" id="priority1_id"
                                                                        name="priority1">
                                                                        <?php if (!empty($int_cal_prio)) {
                                                                            if ($int_cal_prio[0]->priority1 == 'Dhanbad') { ?>
                                                                        <option
                                                                            value="<?php echo $int_cal_prio[0]->priority1; ?>"
                                                                            selected>
                                                                            <?php echo $int_cal_prio[0]->priority1; ?>
                                                                        </option>
                                                                        <option value="priority 3">Delhi</option>
                                                                        <option value="Online">Online</option>
                                                                        <option value="">--Please Select priority 1--
                                                                        </option>
                                                                        <?php
                                                                            } else if ($int_cal_prio[0]->priority1 == 'Delhi') { ?>

                                                                        <option
                                                                            value="<?php echo $int_cal_prio[0]->priority1; ?>"
                                                                            selected>
                                                                            <?php echo $int_cal_prio[0]->priority1; ?>
                                                                        </option>
                                                                        <option value="Dhanbad">Dhanbad</option>
                                                                        <option value="Online">Online</option>
                                                                        <option value="">--Please Select priority 1--
                                                                        </option>

                                                                        <?php } else { ?>
                                                                        <option
                                                                            value="<?php echo $int_cal_prio[0]->priority1; ?>"
                                                                            selected>
                                                                            <?php echo $int_cal_prio[0]->priority1; ?>
                                                                        </option>
                                                                        <option value="Dhanbad">Dhanbad</option>
                                                                        <option value="Delhi">Delhi</option>
                                                                        <option value="">--Please Select priority 1--
                                                                        </option>
                                                                        <?php  }
                                                                            ?>
                                                                        <?php
                                                                        } else { ?>
                                                                        <option value="">--Please Select priority 1--
                                                                        </option>
                                                                        <option value="Dhanbad">Dhanbad</option>
                                                                        <option value="Delhi">Delhi</option>
                                                                        <option value="Online">Online</option>

                                                                        <?php
                                                                        } ?>
                                                                    </select>
                                                                    <?php if (validation_errors()) { ?><div
                                                                        class="myalert">
                                                                        <?php echo form_error('priority1') ?> </div>
                                                                    <?php } ?>
                                                                    <label for="sel1">Priority 2</label>
                                                                    <select class="form-control" id="priority2_id"
                                                                        name="priority2"
                                                                        <?php if (empty($int_cal_prio)) echo "disabled"; ?>>
                                                                        <?php if (!empty($int_cal_prio)) {
                                                                            if ($int_cal_prio[0]->priority2 == 'Dhanbad') { ?>
                                                                        <option
                                                                            value="<?php echo $int_cal_prio[0]->priority2; ?>"
                                                                            selected>
                                                                            <?php echo $int_cal_prio[0]->priority2; ?>
                                                                        </option>
                                                                        <option value="">--Please Select priority 2--
                                                                        </option>
                                                                        <?php
                                                                            } else if ($int_cal_prio[0]->priority2 == 'Delhi') { ?>
                                                                        <option
                                                                            value="<?php echo $int_cal_prio[0]->priority2; ?>"
                                                                            selected>
                                                                            <?php echo $int_cal_prio[0]->priority2; ?>
                                                                        </option>
                                                                        <option value="">--Please Select priority 2--
                                                                        </option>

                                                                        <?php  } else { ?>

                                                                        <option
                                                                            value="<?php echo $int_cal_prio[0]->priority2; ?>"
                                                                            selected>
                                                                            <?php echo $int_cal_prio[0]->priority2; ?>
                                                                        </option>
                                                                        <option value="">--Please Select priority 2--
                                                                        </option>

                                                                        <?php   }
                                                                            ?>
                                                                        <?php } else { ?>
                                                                        <option value="">--Please Select priority 2--
                                                                        </option>
                                                                        <option value="Dhanbad">Dhanbad</option>
                                                                        <option value="Delhi">Delhi</option>
                                                                        <option value="Online">Online</option>
                                                                        <?php
                                                                        } ?>
                                                                    </select>
                                                                    <?php if (validation_errors()) { ?><div
                                                                        class="myalert">
                                                                        <?php echo form_error('priority2') ?> </div>
                                                                    <?php } ?>
                                                                    <label for="sel1">Priority 3</label>
                                                                    <select class="form-control" id="priority3_id"
                                                                        name="priority3"
                                                                        <?php if (empty($int_cal_prio)) echo "disabled"; ?>>
                                                                        <?php if (!empty($int_cal_prio)) {
                                                                            if ($int_cal_prio[0]->priority3 == 'priority 1') { ?>
                                                                        <option
                                                                            value="<?php echo $int_cal_prio[0]->priority3; ?>"
                                                                            selected>
                                                                            <?php echo $int_cal_prio[0]->priority3; ?>
                                                                        </option>
                                                                        <option value="">--Please Select priority 3--
                                                                        </option>
                                                                        <?php
                                                                            } else if ($int_cal_prio[0]->priority3 == 'priority 2') { ?>
                                                                        <option
                                                                            value="<?php echo $int_cal_prio[0]->priority3; ?>"
                                                                            selected>
                                                                            <?php echo $int_cal_prio[0]->priority3; ?>
                                                                        </option>
                                                                        <option value="">--Please Select priority 3--
                                                                        </option>

                                                                        <?php  } else { ?>

                                                                        <option
                                                                            value="<?php echo $int_cal_prio[0]->priority3; ?>"
                                                                            selected>
                                                                            <?php echo $int_cal_prio[0]->priority3; ?>
                                                                        </option>
                                                                        <option value="">--Please Select priority 3--
                                                                        </option>

                                                                        <?php  }
                                                                            ?>
                                                                        <?php } else { ?>
                                                                        <option value="">--Please Select priority 3--
                                                                        </option>
                                                                        <option value="Dhanbad">Dhanbad</option>
                                                                        <option value="Delhi">Delhi</option>
                                                                        <option value="Online">Online</option>

                                                                        <?php } ?>
                                                                    </select>
                                                                    <?php if (validation_errors()) { ?><div
                                                                        class="myalert">
                                                                        <?php echo form_error('priority3') ?> </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-lg-12"
                                                                style="text-align:center;">
                                                                <p><input type="checkbox" class="form-check-input"
                                                                        id="location" name="location"><span
                                                                        style="color:red;"> I agree that the final
                                                                        location of the interview will be based
                                                                        on the decision of MBA admission
                                                                        committee.</span></p>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-lg-12">

                                                                <h5 class="text-center"
                                                                    style="text-decoration: underline;">Academic Details
                                                                </h5>
                                                                <h5>Note :All <span style="color:red;">*</span> are
                                                                    mandatory to fill</h5>
                                                                <h5><span style="color:red;">"All appearing students
                                                                        have
                                                                        to give tentative year of passing and marks
                                                                        obtained till last semester."</span> </h5>
                                                                <h5><span style="color:red;">"Institute/University Name
                                                                        field must be less than 100 characters including
                                                                        space."</span> </h5>
                                                                <table id="qual" class="table-responsive">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Exam Type<span
                                                                                    style="color:red;">*</span></th>
                                                                            <th>Name of Exam <span
                                                                                    style="color:red;">*</span></th>
                                                                            <th width="40">Institute/University
                                                                                Name<span style="color:red;">*</span>
                                                                            </th>
                                                                            <th>Result Status<span
                                                                                    style="color:red;">*</span></th>
                                                                            <th>Marks<span style="color:red;">*</span>
                                                                            </th>
                                                                            <th>Year of Passing<span
                                                                                    style="color:red;">*</span></th>
                                                                            <th width="20">Percentage/CGPA<span
                                                                                    style="color:red;">*</span></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td data-column="Exam type">
                                                                                <select id="examtype10"
                                                                                    name="examtype10">

                                                                                    <?php if (!empty($qual10_details[0]['exam_type'])) { ?>
                                                                                    <option
                                                                                        value="<?php echo $qual10_details[0]['exam_type']; ?>">
                                                                                        <?php echo $qual10_details[0]['exam_type']; ?>
                                                                                    </option>
                                                                                    <?php } else { ?>
                                                                                    <option value="10th"
                                                                                        <?php echo  set_select('examtype10', '10 th'); ?>>
                                                                                        10th</option>
                                                                                    <?php } ?>

                                                                                </select>
                                                                                <?php if (validation_errors()) { ?><div
                                                                                    class="myalert">
                                                                                    <?php echo form_error('examtype10') ?>
                                                                                </div> <?php } ?>
                                                                            </td>

                                                                            <td data-column="Name of exam">
                                                                                <select id="name_of_exam10"
                                                                                    name="name_of_exam10">

                                                                                    <?php if (!empty($qual10_details[0]['exam_name'])) { ?>

                                                                                    <option
                                                                                        value="<?php echo $qual10_details[0]['exam_name']; ?>">
                                                                                        <?php echo $qual10_details[0]['exam_name']; ?>
                                                                                    </option>
                                                                                    <?php } else { ?>
                                                                                    <option value="10 th"
                                                                                        <?php echo  set_select('name_of_exam10', '10 th'); ?>>
                                                                                        10 th</option>
                                                                                    <?php } ?>


                                                                                </select>
                                                                                <?php if (validation_errors()) { ?><div
                                                                                    class="myalert">
                                                                                    <?php echo form_error('name_of_exam10') ?>
                                                                                </div> <?php } ?>
                                                                            </td>

                                                                            <td data-column="Institute/university name">

                                                                                <input id="Institute_exam10"
                                                                                    name="Institute_exam10" type="text"
                                                                                    value="<?php if (!empty($qual10_details)) echo $qual10_details[0]['institue_name']; ?>"
                                                                                    placeholder="Institute/university name"
                                                                                    maxlength="98">

                                                                                <?php if (validation_errors()) { ?><div
                                                                                    class="myalert">
                                                                                    <?php echo form_error('Institute_exam10') ?>
                                                                                </div> <?php } ?>
                                                                            </td>

                                                                            <td data-column="result Status">
                                                                                <select id="10passed" name="10passed">
                                                                                    <?php if (!empty($qual10_details[0]['result_status'])) { ?>

                                                                                    <option
                                                                                        value="<?php echo $qual10_details[0]['result_status']; ?>">
                                                                                        <?php echo $qual10_details[0]['result_status']; ?>
                                                                                    </option>
                                                                                    <?php } else { ?>
                                                                                    <option value="Passed"
                                                                                        <?php echo set_select('10passed', 'Passed'); ?>>
                                                                                        Passed</option>
                                                                                    <?php } ?>


                                                                                </select>
                                                                                <?php if (validation_errors()) { ?><div
                                                                                    class="myalert">
                                                                                    <?php echo form_error('Institute_exam10') ?>
                                                                                </div> <?php } ?>
                                                                            </td>

                                                                            <td data-column="marks System">

                                                                                <select
                                                                                    onchange="percentage_10cgpa(this.value)"
                                                                                    id="10percentage"
                                                                                    name="10percentage">

                                                                                    <?php if (!empty($qual10_details[0]['marks_perc_type'])) {
                                                                                        if ($qual10_details[0]['marks_perc_type'] == 'Percentage') { ?>
                                                                                    <option
                                                                                        value="<?php echo $qual10_details[0]['marks_perc_type']; ?>"
                                                                                        <?php echo set_select('10percentage', 'Percentage') ?>>
                                                                                        <?php echo $qual10_details[0]['marks_perc_type']; ?>
                                                                                    </option>
                                                                                    <option value="Cgpa"
                                                                                        <?php echo set_select('10percentage', 'Cgpa'); ?>>
                                                                                        CGPA(Out of 10)</option>
                                                                                    <?php } else { ?>
                                                                                    <option
                                                                                        value="<?php echo $qual10_details[0]['marks_perc_type']; ?>"
                                                                                        <?php echo set_select('10percentage', 'Percentage') ?>>
                                                                                        <?php echo $qual10_details[0]['marks_perc_type']; ?>
                                                                                    </option>
                                                                                    <option value="Percentage"
                                                                                        <?php echo set_select('10percentage', 'Percentage'); ?>>
                                                                                        Percentage </option>
                                                                                    <?php
                                                                                        } ?>

                                                                                    <?php } else { ?>
                                                                                    <option value="Percentage"
                                                                                        <?php echo set_select('10percentage', 'Percentage'); ?>>
                                                                                        Percentage </option>
                                                                                    <option value="Cgpa"
                                                                                        <?php echo set_select('10percentage', 'Cgpa'); ?>>
                                                                                        CGPA(Out of 10)</option>
                                                                                    <?php } ?>

                                                                                </select>
                                                                                <?php if (validation_errors()) { ?><div
                                                                                    class="myalert">
                                                                                    <?php echo form_error('10percentage') ?>
                                                                                </div> <?php } ?>
                                                                            </td>

                                                                            <td data-column="year of passing">
                                                                                <input onchange="year_check(this.id)"
                                                                                    value="<?php echo set_value('10_y_pass') ?><?php if (!empty($qual10_details[0]['year_of_passing'])) echo $qual10_details[0]['year_of_passing']; ?>"
                                                                                    maxlength="4" id="10_y_pass"
                                                                                    name="10_y_pass" style="width: 71%;"
                                                                                    type="text">
                                                                                <input
                                                                                    value="<?php if (!empty($qual10_details[0]['id'])) echo $qual10_details[0]['id']; ?>"
                                                                                    maxlength="4" id="10_y_pass_"
                                                                                    name="10_y_pass_" type="hidden">
                                                                                <?php if (validation_errors()) { ?><div
                                                                                    class="myalert">
                                                                                    <?php echo form_error('10_y_pass') ?>
                                                                                </div> <?php } ?>
                                                                            </td>

                                                                            <td data-column="percentage/CGPA">
                                                                                <input
                                                                                    onchange="validate_cgpa(this.id,'10percentage');"
                                                                                    id="10_p_cgpa" name="10_p_cgpa"
                                                                                    style="width: 71%;"
                                                                                    value="<?php echo set_value('10_p_cgpa') ?><?php if (!empty($qual10_details[0]['mark_cgpa_percenatge'])) {
                                                                                                                                                                                                                                            echo $qual10_details[0]['mark_cgpa_percenatge'];
                                                                                                                                                                                                                                        } ?>"
                                                                                    maxlength="5" placeholder="%"
                                                                                    type="text">
                                                                                <?php if (validation_errors()) { ?><div
                                                                                    class="myalert">
                                                                                    <?php echo form_error('10_p_cgpa') ?>
                                                                                </div> <?php } ?>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td data-column="Exam type">
                                                                                <select id="examtype12"
                                                                                    name="examtype12">

                                                                                    <?php if (!empty($qual12_details[0]['exam_type'])) { ?>
                                                                                    <option
                                                                                        value="<?php echo $qual12_details[0]['exam_type']; ?>"
                                                                                        <?php echo  set_select('examtype12', '12 th'); ?>>
                                                                                        <?php echo $qual12_details[0]['exam_type']; ?>
                                                                                    </option>

                                                                                    <?php } else { ?>
                                                                                    <option value="12 th"
                                                                                        <?php echo  set_select('examtype12', '12 th'); ?>>
                                                                                        12 th</option>
                                                                                    <?php } ?>

                                                                                </select>
                                                                                <?php if (validation_errors()) { ?><div
                                                                                    class="myalert">
                                                                                    <?php echo form_error('examtype12') ?>
                                                                                </div> <?php } ?>
                                                                            </td>

                                                                            <td data-column="Name of exam">
                                                                                <select id="name_of_exam12"
                                                                                    name="name_of_exam12">

                                                                                    <?php if (!empty($qual12_details[0]['exam_name'])) { ?>

                                                                                    <option
                                                                                        value="<?php echo $qual12_details[0]['exam_name']; ?>"
                                                                                        <?php echo  set_select('name_of_exam12', '12 th'); ?>>
                                                                                        <?php echo $qual12_details[0]['exam_name']; ?>
                                                                                    </option>

                                                                                    <?php } else { ?>
                                                                                    <option value="12 th"
                                                                                        <?php echo  set_select('name_of_exam12', '12 th'); ?>>
                                                                                        12 th</option>

                                                                                    <?php } ?>

                                                                                </select>
                                                                                <?php if (validation_errors()) { ?><div
                                                                                    class="myalert">
                                                                                    <?php echo form_error('name_of_exam12') ?>
                                                                                </div> <?php } ?>
                                                                            </td>

                                                                            <td data-column="Institute/university name">
                                                                                <input id="Institute12"
                                                                                    name="Institute12" type="text"
                                                                                    value="<?php echo set_value('Institute12'); ?><?php if (!empty($qual12_details[0]['institue_name'])) {
                                                                                                                                                                                            echo $qual12_details[0]['institue_name'];
                                                                                                                                                                                        } ?>"
                                                                                    placeholder="Institute/university name"
                                                                                    maxlength="98">
                                                                                <?php if (validation_errors()) { ?><div
                                                                                    class="myalert">
                                                                                    <?php echo form_error('Institute12') ?>
                                                                                </div> <?php } ?>
                                                                            </td>
                                                                            <td data-column="result Status">
                                                                                <select id="12passed" name="12passed">
                                                                                    <?php if (!empty($qual12_details[0]['result_status'])) { ?>


                                                                                    <option
                                                                                        value="<?php echo $qual12_details[0]['result_status']; ?>"
                                                                                        <?php echo  set_select('12passed', 'Passed'); ?>>
                                                                                        <?php echo $qual12_details[0]['result_status']; ?>
                                                                                    </option>

                                                                                    <?php } else { ?>
                                                                                    <option value="Passed"
                                                                                        <?php echo  set_select('12passed', 'Passed'); ?>>
                                                                                        Passed</option>
                                                                                    <?php } ?>

                                                                                </select>
                                                                                <?php if (validation_errors()) { ?><div
                                                                                    class="myalert">
                                                                                    <?php echo form_error('12passed') ?>
                                                                                </div> <?php } ?>
                                                                            </td>

                                                                            <td data-column="marks System">
                                                                                <select
                                                                                    onchange="percentage_12cgpa(this.value)"
                                                                                    id="12percentage"
                                                                                    value="<?php echo set_value('12percentage'); ?>"
                                                                                    name="12percentage">

                                                                                    <?php if (!empty($qual12_details)) {
                                                                                        if ($qual12_details[0]['marks_perc_type'] == 'Percentage') { ?>


                                                                                    <option
                                                                                        value="<?php echo $qual12_details[0]['marks_perc_type']; ?>"
                                                                                        <?php echo  set_select('12percentage', 'Percentage'); ?>>
                                                                                        <?php echo $qual12_details[0]['marks_perc_type']; ?>
                                                                                    </option>
                                                                                    <option value="Cgpa"
                                                                                        <?php echo  set_select('12percentage', 'Cgpa'); ?>>
                                                                                        CGPA(Out of 10)</option>
                                                                                    <?php } else { ?>

                                                                                    <!-- <option value="<?php echo $qual12_details[0]['marks_perc_type']; ?>"<?php echo  set_select('12percentage', 'Cgpa'); ?>><?php echo $qual12_details[0]['marks_perc_type']; ?></option> -->
                                                                                    <option
                                                                                        value="<?php echo $qual12_details[0]['marks_perc_type']; ?>"
                                                                                        <?php echo  set_select('12percentage', 'Cgpa'); ?>>
                                                                                        <?php echo 'CGPA(Out of 10)'; ?>
                                                                                    </option>
                                                                                    <option value="Percentage"
                                                                                        <?php echo  set_select('12percentage', 'Percentage'); ?>>
                                                                                        Percentage</option>

                                                                                    <?php
                                                                                        } ?>

                                                                                    <?php } else { ?>
                                                                                    <option value="Percentage"
                                                                                        <?php echo  set_select('12percentage', 'Percentage'); ?>>
                                                                                        Percentage</option>
                                                                                    <option value="Cgpa"
                                                                                        <?php echo  set_select('12percentage', 'Cgpa'); ?>>
                                                                                        CGPA(Out of 10)</option>
                                                                                    <?php } ?>


                                                                                    <?php if (validation_errors()) { ?>
                                                                                    <div class="myalert">
                                                                                        <?php echo form_error('12percentage') ?>
                                                                                    </div> <?php } ?>
                                                                            </td>

                                                                            <td data-column="year of passing">
                                                                                <input onchange="year_check(this.id)"
                                                                                    value="<?php echo set_value('12_y_pass'); ?><?php if (!empty($qual12_details[0]['year_of_passing'])) {
                                                                                                                                                                        echo $qual12_details[0]['year_of_passing'];
                                                                                                                                                                    } ?>"
                                                                                    maxlength="4" id="12_y_pass"
                                                                                    name="12_y_pass" style="width: 71%;"
                                                                                    type="text">
                                                                                <input value="<?php if (!empty($qual12_details[0]['id'])) {
                                                                                                    echo $qual12_details[0]['id'];
                                                                                                } ?>" id="12_y_pass_"
                                                                                    name="12_y_pass_" type="hidden">
                                                                                <?php if (validation_errors()) { ?><div
                                                                                    class="myalert">
                                                                                    <?php echo form_error('12_y_pass') ?>
                                                                                </div> <?php } ?>
                                                                            </td>

                                                                            <td data-column="percentage/CGPA">
                                                                                <input
                                                                                    onchange="validate_cgpa(this.id,'12percentage');"
                                                                                    value="<?php echo set_value('12_p_cgpa'); ?><?php if (!empty($qual12_details[0]['mark_cgpa_percenatge'])) {
                                                                                                                                                                                            echo $qual12_details[0]['mark_cgpa_percenatge'];
                                                                                                                                                                                        } ?>"
                                                                                    maxlength="5" id="12_p_cgpa"
                                                                                    placeholder="%" name="12_p_cgpa"
                                                                                    style="width: 71%;" type="text">
                                                                                <?php if (validation_errors()) { ?><div
                                                                                    class="myalert">
                                                                                    <?php echo form_error('12_p_cgpa') ?>
                                                                                </div> <?php } ?>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td data-column="Exam type">
                                                                                <select id="examtypeug"
                                                                                    name="examtypeug">

                                                                                    <?php if (!empty($qualug_details)) { ?>

                                                                                    <option
                                                                                        value="<?php if (!empty($qualug_details[0]['exam_type']))  echo $qualug_details[0]['exam_type']; ?>"
                                                                                        <?php echo  set_select('examtypeug', 'UG Exam'); ?>>
                                                                                        <?php if (!empty($qualug_details[0]['exam_type']))  echo $qualug_details[0]['exam_type']; ?>
                                                                                    </option>
                                                                                    <?php } else { ?>
                                                                                    <option value="UG Exam"
                                                                                        <?php echo  set_select('examtypeug', 'UG Exam'); ?>>
                                                                                        UG Exam</option>
                                                                                    <?php } ?>


                                                                                </select>

                                                                                <?php if (validation_errors()) { ?><div
                                                                                    class="myalert">
                                                                                    <?php echo form_error('examtypeug') ?>
                                                                                </div> <?php } ?>
                                                                            </td>

                                                                            <td data-column="Name of exam">
                                                                                <input id="name_of_ugexam"
                                                                                    name="name_of_ugexam"
                                                                                    value="<?php echo set_value('name_of_ugexam'); ?><?php if (!empty($qualug_details[0]['exam_name'])) echo $qualug_details[0]['exam_name']; ?>"
                                                                                    type="text"
                                                                                    placeholder="UG Exam Name">
                                                                                <?php if (validation_errors()) { ?><div
                                                                                    class="myalert">
                                                                                    <?php echo form_error('name_of_ugexam') ?>
                                                                                </div> <?php } ?>
                                                                            </td>

                                                                            <td data-column="Institute/university name">
                                                                                <input id="Institute_examug"
                                                                                    value="<?php echo set_value('Institute_examug'); ?><?php if (!empty($qualug_details[0]['institue_name'])) echo $qualug_details[0]['institue_name']; ?>"
                                                                                    name="Institute_examug" type="text"
                                                                                    placeholder="Institute/university name"
                                                                                    maxlength="98">
                                                                                <?php if (validation_errors()) { ?><div
                                                                                    class="myalert">
                                                                                    <?php echo form_error('Institute_examug') ?>
                                                                                </div> <?php } ?>
                                                                            </td>

                                                                            <td data-column="result Status">
                                                                                <select id="ug_appearing"
                                                                                    name="ug_appearing">
                                                                                    <?php if (!empty($qual12_details[0]['result_status'])) {
                                                                                        if ($qual12_details[0]['result_status'] == 'Passed') { ?>

                                                                                    <option
                                                                                        value="<?php if (!empty($qualug_details[0]['result_status'])) echo $qualug_details[0]['result_status']; ?>"
                                                                                        <?php echo  set_select('ug_appearing', 'Passed'); ?>>
                                                                                        <?php if (!empty($qualug_details[0]['result_status']))  echo $qualug_details[0]['result_status']; ?>
                                                                                    </option>
                                                                                    <option value="Appearing"
                                                                                        <?php echo  set_select('ug_appearing', 'Appearing'); ?>>
                                                                                        Appearing</option>

                                                                                    <?php } else { ?>

                                                                                    <option
                                                                                        value="<?php if (!empty($qualug_details[0]['result_status']))  echo $qualug_details[0]['result_status']; ?>"
                                                                                        <?php echo  set_select('ug_appearing', 'Appearing'); ?>>
                                                                                        <?php if (!empty($qualug_details[0]['result_status']))  echo $qualug_details[0]['result_status']; ?>
                                                                                    </option>
                                                                                    <option value="Passed"
                                                                                        <?php echo  set_select('ug_appearing', 'Passed'); ?>>
                                                                                        Passed</option>
                                                                                    <?php
                                                                                        } ?>

                                                                                    <?php } else { ?>
                                                                                    <option value="Passed"
                                                                                        <?php echo  set_select('ug_appearing', 'Passed'); ?>>
                                                                                        Passed</option>
                                                                                    <option value="Appearing"
                                                                                        <?php echo  set_select('ug_appearing', 'Appearing'); ?>>
                                                                                        Appearing</option>
                                                                                    <?php } ?>



                                                                                    <?php if (validation_errors()) { ?>
                                                                                    <div class="myalert">
                                                                                        <?php echo form_error('ug_appearing') ?>
                                                                                    </div> <?php } ?>
                                                                            </td>
                                                                            <td data-column="marks System">
                                                                                <select
                                                                                    onchange="percentage_ugcgpa(this.value)"
                                                                                    id="ug_percentage"
                                                                                    name="ug_percentage">


                                                                                    <?php if (!empty($qualug_details)) {
                                                                                        if ($qualug_details[0]['marks_perc_type'] == 'Percentage') { ?>

                                                                                    <option value="<?php if (!empty($qualug_details[0]['marks_perc_type'])) {
                                                                                                                echo $qualug_details[0]['marks_perc_type'];
                                                                                                            } ?>"
                                                                                        <?php echo  set_select('ug_percentage', 'Percentage'); ?>>
                                                                                        <?php if (!empty($qualug_details[0]['marks_perc_type'])) {
                                                                                                    echo $qualug_details[0]['marks_perc_type'];
                                                                                                } ?>
                                                                                    </option>
                                                                                    <option value="Cgpa"
                                                                                        <?php echo  set_select('ug_percentage', 'Cgpa'); ?>>
                                                                                        CGPA(Out of 10)</option>

                                                                                    <?php } else { ?>

                                                                                    <!-- <option value="<?php if (!empty($qualug_details[0]['marks_perc_type'])) {
                                                                                                                    echo $qualug_details[0]['marks_perc_type'];
                                                                                                                } ?>"  <?php echo  set_select('ug_percentage', 'Cgpa'); ?>><?php if (!empty($qualug_details[0]['marks_perc_type'])) {
                                                                                                                                                                                echo $qualug_details[0]['marks_perc_type'];
                                                                                                                                                                            } ?></option> -->
                                                                                    <option value="<?php if (!empty($qualug_details[0]['marks_perc_type'])) {
                                                                                                                echo $qualug_details[0]['marks_perc_type'];
                                                                                                            } ?>"
                                                                                        <?php echo  set_select('ug_percentage', 'Cgpa'); ?>>
                                                                                        <?php if (!empty($qualug_details[0]['marks_perc_type'])) {
                                                                                                    echo 'CGPA(Out of 10)';
                                                                                                } ?>
                                                                                    </option>
                                                                                    <option value="Percentage"
                                                                                        <?php echo  set_select('ug_percentage', 'Percentage'); ?>>
                                                                                        Percentage</option>
                                                                                    <?php
                                                                                        } ?>

                                                                                    <?php } else { ?>
                                                                                    <option value="Percentage"
                                                                                        <?php echo  set_select('ug_percentage', 'Percentage'); ?>>
                                                                                        Percentage</option>
                                                                                    <option value="Cgpa"
                                                                                        <?php echo  set_select('ug_percentage', 'Cgpa'); ?>>
                                                                                        CGPA(Out of 10)</option>
                                                                                    <?php } ?>

                                                                                </select>
                                                                                <?php if (validation_errors()) { ?><div
                                                                                    class="myalert">
                                                                                    <?php echo form_error('ug_percentage') ?>
                                                                                </div> <?php } ?>
                                                                            </td>
                                                                            <td data-column="year of passing">
                                                                                <input
                                                                                    onchange="year_checkug(this.id,'ug_appearing')"
                                                                                    value="<?php echo set_value('ug_y_passing'); ?><?php if (!empty($qualug_details[0]['year_of_passing'])) echo $qualug_details[0]['year_of_passing']; ?>"
                                                                                    maxlength="4" id="ug_y_passing"
                                                                                    name="ug_y_passing"
                                                                                    style="width: 71%;" type="text">
                                                                                <input
                                                                                    value="<?php if (!empty($qualug_details[0]['id'])) echo $qualug_details[0]['id']; ?>"
                                                                                    maxlength="4" id="ug_y_passing_"
                                                                                    name="ug_y_passing_" type="hidden">
                                                                                <?php if (validation_errors()) { ?><div
                                                                                    class="myalert">
                                                                                    <?php echo form_error('ug_y_passing') ?>
                                                                                </div> <?php } ?>
                                                                            </td>
                                                                            <td data-column="percentage/CGPA">
                                                                                <input
                                                                                    onchange="validate_cgpa(this.id,'ug_percentage');"
                                                                                    maxlength="5"
                                                                                    value="<?php echo set_value('ug_p_cgpa'); ?><?php if (!empty($qualug_details[0]['mark_cgpa_percenatge'])) echo $qualug_details[0]['mark_cgpa_percenatge']; ?>"
                                                                                    id="ug_p_cgpa" name="ug_p_cgpa"
                                                                                    placeholder="%" style="width: 71%;"
                                                                                    type="text">
                                                                                <?php if (validation_errors()) { ?><div
                                                                                    class="myalert">
                                                                                    <?php echo form_error('ug_p_cgpa') ?>
                                                                                </div> <?php } ?>

                                                                            </td>
                                                                        </tr>


                                                                        <?php
                                                                        $x = 0;

                                                                        if (!empty($pg_details)) {
                                                                            foreach ($pg_details as $value) {


                                                                        ?>

                                                                        <tr id="row<?php echo $x; ?>">
                                                                            <td>
                                                                                <select class="pgexamtype"
                                                                                    onkeypress="return IsSpecificSpecialCharacter(event);"
                                                                                    id="examtypepg<?php echo $x; ?>"
                                                                                    name="examtypepg[]" required>

                                                                                    <?php if (!empty($value['exam_type'])) { ?>
                                                                                    <option
                                                                                        value="<?php echo $value['exam_type']; ?>"
                                                                                        <?php echo  set_select('examtypeug', 'UG Exam'); ?>>
                                                                                        <?php echo $value['exam_type']; ?>
                                                                                    </option>
                                                                                    <?php }
                                                                                            ?>

                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input
                                                                                    onkeypress="return IsSpecificSpecialCharacter(event);"
                                                                                    value="<?php echo set_value("name_of_pgexam[$x]"); ?><?php echo $value['exam_name']; ?>"
                                                                                    id="name_of_pgexam<?php echo $x; ?>"
                                                                                    name="name_of_pgexam[]" type="text"
                                                                                    placeholder="PG Exam Name"
                                                                                    class="namepgexam" required>
                                                                                <?php if (validation_errors()) { ?><div
                                                                                    class="myalert">
                                                                                    <?php echo form_error("name_of_pgexam[$x]"); ?>
                                                                                </div> <?php } ?>
                                                                            </td>
                                                                            <td>
                                                                                <input
                                                                                    onkeypress="return IsSpecificSpecialCharacter(event);"
                                                                                    id="Institute_examug<?php echo $x; ?>"
                                                                                    value="<?php echo $value['institue_name']; ?>"
                                                                                    class="insti_exampg"
                                                                                    name="Institute_exampg[]"
                                                                                    type="text"
                                                                                    placeholder="Institute/university name"
                                                                                    required maxlength="98">
                                                                            </td>
                                                                            <td>
                                                                                <select class="pg_appear"
                                                                                    id="pg_appearing<?php echo $x; ?>"
                                                                                    name="pg_appearing[]" required>

                                                                                    <?php if (!empty($value['result_status'])) {
                                                                                                if ($value['result_status'] == 'Passed') { ?>

                                                                                    <option
                                                                                        value="<?php echo $value['result_status']; ?>"
                                                                                        <?php echo  set_select('ug_appearing', 'Passed'); ?>>
                                                                                        <?php echo $value['result_status']; ?>
                                                                                    </option>
                                                                                    <option value="Appearing"
                                                                                        <?php echo  set_select('pg_appearing', 'Appearing'); ?>>
                                                                                        Appearing</option>

                                                                                    <?php } else { ?>

                                                                                    <option
                                                                                        value="<?php echo $value['result_status']; ?>"
                                                                                        <?php echo  set_select('ug_appearing', 'Appearing'); ?>>
                                                                                        <?php echo $value['result_status']; ?>
                                                                                    </option>
                                                                                    <option value="Passed"
                                                                                        <?php echo  set_select('pg_appearing', 'Passed'); ?>>
                                                                                        Passed</option>
                                                                                    <?php
                                                                                                } ?>

                                                                                    <?php }

                                                                                            ?>

                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select
                                                                                    onchange="percentage_pgcgpa(this.id,<?php echo $x; ?>)"
                                                                                    class="pg_pertage"
                                                                                    id="pg_percentage<?php echo $x; ?>"
                                                                                    name="pg_percentage[]" required>
                                                                                    <?php if (!empty($value['marks_perc_type'])) {
                                                                                                if ($value['marks_perc_type'] == 'Percentage') { ?>

                                                                                    <option
                                                                                        value="<?php echo $value['marks_perc_type']; ?>"
                                                                                        <?php echo  set_select('pg_percentage', 'Percentage'); ?>>
                                                                                        <?php echo $value['marks_perc_type']; ?>
                                                                                    </option>
                                                                                    <option value="Cgpa"
                                                                                        <?php echo  set_select('pg_percentage', 'Cgpa'); ?>>
                                                                                        CGPA(Out of 10)</option>

                                                                                    <?php } else { ?>

                                                                                    <!-- <option value="<?php echo $value['marks_perc_type']; ?>"  <?php echo  set_select('pg_percentage', 'Cgpa'); ?>><?php echo $value['marks_perc_type']; ?></option> -->
                                                                                    <option
                                                                                        value="<?php echo $value['marks_perc_type']; ?>"
                                                                                        <?php echo  set_select('pg_percentage', 'Cgpa'); ?>>
                                                                                        <?php echo 'CGPA(Out of 10)'; ?>
                                                                                    </option>
                                                                                    <option value="Percentage"
                                                                                        <?php echo  set_select('pg_percentage', 'Percentage'); ?>>
                                                                                        Percentage</option>
                                                                                    <?php
                                                                                                } ?>

                                                                                    <?php } ?>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input
                                                                                    onkeypress="return acceptnumber(event)"
                                                                                    class="pg_y_pass"
                                                                                    value="<?php echo $value['year_of_passing']; ?>"
                                                                                    id="pg_y_passing<?php echo $x; ?>"
                                                                                    maxlength="5" name="pg_y_passing[]"
                                                                                    type="text" style="width: 71%;"
                                                                                    onchange="year_checkpg(this.id,<?php echo $x; ?>)">
                                                                                <input class="pg_y_pass"
                                                                                    value="<?php echo $value['id']; ?>"
                                                                                    id="pg_y_passing_<?php echo $x; ?>"
                                                                                    name="pg_y_passing_[]"
                                                                                    type="hidden">
                                                                            </td>
                                                                            <td>
                                                                                <input
                                                                                    onchange="validate_cgpad(this.id,<?php echo $x; ?>);"
                                                                                    class="pg_per_cgpa"
                                                                                    value="<?php echo $value['mark_cgpa_percenatge']; ?>"
                                                                                    maxlength="4"
                                                                                    id="pg_p_cgpa<?php echo $x; ?>"
                                                                                    name="pg_p_cgpa[]" type="text"
                                                                                    style="width: 71%;" placeholder="%"
                                                                                    required><br>
                                                                                <button class="btn-danger ram"
                                                                                    name="<?php echo $value['id']; ?>"
                                                                                    type="button"
                                                                                    onclick="display_view(this.id)"
                                                                                    id="qual<?php echo $value['id']; ?>">Remove</button>
                                                                            </td>
                                                                        </tr>
                                                                        <?php $x++;
                                                                            }
                                                                        } ?>

                                                                        <!-- <tr>
                                                                        <td data-column="Exam type"> <select  id="examtypepg" name="examtypepg"><option>PG Exam</option></select></td>
                                                                        <td data-column="Name of exam"><input id="name_of_pgexam" name="name_of_pgexam" type="text" placeholder="PG Exam Name"></td>
                                                                        <td data-column="Institute/university name"><input id="Institute_exampg" name="Institute_examug" type="text" placeholder="Institute/university name"></td>
                                                                        <td data-column="result Status"><select id="pg_appearing" name="pg_appearing"><option>Appearing</option><option>Passed</option></td>
                                                                        <td data-column="marks System"><select id="pg_percentage" name="pg_percentage"><option>Percentage</option></td>
                                                                        <td data-column="year of passing"><input id="pg_y_passing" name="pg_y_passing" style="width: 71%;" type="text"></td>
                                                                        <td data-column="percentage/CGPA"><input id="pg_p_cgpa" name="pg_p_cgpa" style="width: 71%;" type="text"></td>
                                                                        </tr> -->
                                                                        <?php if (!empty($dy)) {
                                                                            if (validation_errors()) { ?><div
                                                                            class="myalert">
                                                                            <?php echo "ERROR:please input All filed of dynamic row which is mandatory."; ?>
                                                                        </div>
                                                                        <?php }
                                                                        } ?>
                                                                    </tbody>
                                                                </table>
                                                                <input type="hidden" id="countqual" name="countqual"
                                                                    value="">
                                                                <input type="button" id="addqual" name="addmore"
                                                                    value="Add More"
                                                                    style="float:right; margin-top: -40px;"
                                                                    class="btn btn-primary btn-sm">
                                                            </div>

                                                        </div>
                                                        <!-- if yes then show this for form end-->
                                                        <ul class="list-inline pull-right">
                                                            <!-- <li><button type="button" class="default-btn next-step">Back</button></li>
                                                            <li><button type="button" class="default-btn next-step skip-btn">Skip</button></li> -->
                                                            <li><button type="button" class="default-btn next-step"
                                                                    id="btnbackpersonal">Back</button></li>
                                                            <li><button type="button" id="btn_qualification"
                                                                    class="btn btn-primary">Save & Next</button></li>
                                                        </ul>
                                                        </form>
                                                    </div>
                                                    <!-- second tab Qualification end -->
                                                    <!-- third tab Work Experience start -->
                                                    <div class="tab-pane" role="tabpanel" id="step3">
                                                        <?php if ($this->session->flashdata('experror')) { ?>
                                                        <div class="alert alert-danger alert-dismissible">
                                                            <a href="#" class="close" data-dismiss="alert"
                                                                aria-label="close">&times;</a>
                                                            <?php echo $this->session->flashdata('experror') ?>
                                                        </div>
                                                        <?php } ?>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                                <?php if ($this->session->flashdata('apply_success_education')) { ?>
                                                                <div class="alert alert-success alert-dismissible">
                                                                    <a href="#" class="close" data-dismiss="alert"
                                                                        aria-label="close">&times;</a>
                                                                    <?php echo $this->session->flashdata('apply_success_education') ?>
                                                                </div>
                                                                <?php } ?>
                                                                <?php $attributes = array('class' => 'email', 'id' => 'w_details', 'name' => 'w_details', 'enctype' => 'multipart/form-data');
                                                                echo form_open('admission/Adm_mba_personal_details/get_work_experience_detail', $attributes); ?>

                                                                <h4 class="text-center"
                                                                    style="text-decoration: underline;">Work Experience
                                                                </h4>
                                                                <div class="row">
                                                                    <div class="col-md-6 col-sm-6 col-lg-6">

                                                                        <div class="form-group">
                                                                            <h5> Do You have an work Experience? <span
                                                                                    style="color:red;">*</span></h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <select class="form-control" id="work_exp"
                                                                                name="work_exp">

                                                                                <?php if (!empty($application_details_ms[0]['work_expreince'])) {
                                                                                    if ($application_details_ms[0]['work_expreince'] == 'Yes') { ?>

                                                                                <option
                                                                                    value="<?php echo $application_details_ms[0]['work_expreince']; ?>"
                                                                                    <?php echo  set_select('work_exp', 'Yes'); ?>>
                                                                                    <?php echo $application_details_ms[0]['work_expreince']; ?>
                                                                                </option>
                                                                                <option value="No"
                                                                                    <?php echo  set_select('work_exp', 'No'); ?>>
                                                                                    No</option>

                                                                                <?php } else { ?>

                                                                                <option
                                                                                    value="<?php echo $application_details_ms[0]['work_expreince']; ?>"
                                                                                    <?php echo  set_select('ug_percentage', 'Cgpa'); ?>>
                                                                                    <?php echo $application_details_ms[0]['work_expreince']; ?>
                                                                                </option>
                                                                                <option value="Yes"
                                                                                    <?php echo  set_select('work_exp', 'Yes'); ?>>
                                                                                    Yes</option>

                                                                                <?php
                                                                                    } ?>

                                                                                <?php } else { ?>
                                                                                <option value="">--Please Select --
                                                                                </option>
                                                                                <option value="Yes"
                                                                                    <?php echo  set_select('work_exp', 'Yes') ?>>
                                                                                    Yes</option>
                                                                                <option value="No"
                                                                                    <?php echo  set_select('work_exp', 'No') ?>>
                                                                                    No</option>

                                                                                <?php } ?>

                                                                            </select>
                                                                            <?php if (validation_errors()) { ?>
                                                                            <div class="myalert">
                                                                                <?php echo form_error('ug_p_cgpa') ?>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <table id="workexp"
                                                                    class="table-responsive work_exp_h_s">

                                                                    <thead>
                                                                        <tr>
                                                                            <th>Designation (less than 50 characters)
                                                                                <span style="color:red;">*</span>
                                                                            </th>
                                                                            <th>Organization (less than 200 characters)
                                                                                <span style="color:red;">*</span>
                                                                            </th>
                                                                            <th>Nature of work (less than 200 characters
                                                                                including space) <span
                                                                                    style="color:red;">*</span></th>
                                                                            <th>Duration(in months) <span
                                                                                    style="color:red;">*</span></th>
                                                                            <th>Sector (less than 50 characters) <span
                                                                                    style="color:red;">*</span></th>
                                                                            <!-- <th>From</th> 
                                                                        <th>To</th>    -->
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $sum_of_month = 0;
                                                                        if (!empty($exp_details)) {
                                                                            $single = $exp_details[0]['duration_in_month'];
                                                                            $sum_of_month += $exp_details[0]['duration_in_month'];
                                                                        }

                                                                        ?>
                                                                        <tr>
                                                                            <td data-column="Designation">
                                                                                <input id="degination1"
                                                                                    name="degination1"
                                                                                    value="<?php echo set_value('degination1'); ?><?php if (!empty($exp_details[0]['designation_no'])) echo $exp_details[0]['designation_no']; ?>"
                                                                                    type="text" class="form-control"
                                                                                    placeholder="1st Designation"
                                                                                    maxlength="48">
                                                                                <?php if (validation_errors()) { ?><div
                                                                                    class="myalert">
                                                                                    <?php echo form_error('degination1') ?>
                                                                                </div> <?php } ?>
                                                                            </td>
                                                                            <td data-column="organization">
                                                                                <input id="organization1"
                                                                                    name="organization1"
                                                                                    value="<?php echo set_value('organization1') ?><?php if (!empty($exp_details[0]['designation_organistion'])) echo $exp_details[0]['designation_organistion']; ?>"
                                                                                    type="text" class="form-control"
                                                                                    placeholder="1st Organisation"
                                                                                    maxlength="195">
                                                                                <?php if (validation_errors()) { ?><div
                                                                                    class="myalert">
                                                                                    <?php echo form_error('organization1') ?>
                                                                                </div> <?php } ?>
                                                                            </td>
                                                                            <td data-column="Nature of work">
                                                                                <input id="nature_of_work1"
                                                                                    name="nature_of_work1"
                                                                                    value="<?php echo set_value('nature_of_work1') ?><?php if (!empty($exp_details[0]['nature_of_work'])) echo $exp_details[0]['nature_of_work']; ?>"
                                                                                    type="text" class="form-control"
                                                                                    maxlength="195">
                                                                                <?php if (validation_errors()) { ?><div
                                                                                    class="myalert">
                                                                                    <?php echo form_error('nature_of_work1') ?>
                                                                                </div> <?php } ?>
                                                                            </td>
                                                                            <td data-column="Duration(in month)">
                                                                                <input id="duration1" name="duration1"
                                                                                    type="number"
                                                                                    value="<?php if (!empty($exp_details[0]['duration_in_month'])) echo trim($exp_details[0]['duration_in_month']); ?><?php echo set_value('duration1'); ?>"
                                                                                    pattern="/^-?\d+\.?\d*$/"
                                                                                    onKeyPress="if(this.value.length==2) return false;"
                                                                                    onchange="get_month(this.id)"
                                                                                    class="form-control">
                                                                                <input id="firstd" name="firstd"
                                                                                    type="hidden" value="0"><input
                                                                                    id="secondd" name="secondd"
                                                                                    type="hidden"
                                                                                    value="<?php if (!empty($exp_details[0]['duration_in_month'])) {
                                                                                                                                                                                                        echo $exp_details[0]['duration_in_month'];
                                                                                                                                                                                                    } else {
                                                                                                                                                                                                        echo "0";
                                                                                                                                                                                                    } ?> ">
                                                                                <?php if (validation_errors()) { ?><div
                                                                                    class="myalert">
                                                                                    <?php echo form_error('duration1') ?>
                                                                                </div> <?php } ?>
                                                                            </td>
                                                                            <td data-column="sector">
                                                                                <input id="sector1" name="sector1"
                                                                                    type="text"
                                                                                    value="<?php echo set_value('sector1'); ?><?php if (!empty($exp_details[0]['sector'])) echo $exp_details[0]['sector']; ?>"
                                                                                    class="form-control" maxlength="48">
                                                                                <input id="sector1_" name="sector1_"
                                                                                    type="hidden"
                                                                                    value="<?php if (!empty($exp_details[0]['id'])) echo $exp_details[0]['id']; ?>">
                                                                                <?php if (validation_errors()) { ?><div
                                                                                    class="myalert">
                                                                                    <?php echo form_error('sector1') ?>
                                                                                </div> <?php } ?>
                                                                            </td>
                                                                            <!-- <td data-column="From"><input id="from1" name="from1"  type="date" class="form-control"></td>
                                                                       <td data-column="To"><input id="to1" name="to1"  type="date" class="form-control"></td> -->
                                                                        </tr>

                                                                        <?php
                                                                        $x = 0;

                                                                        if (!empty($exp_details_d)) {
                                                                            foreach ($exp_details_d as $value) {
                                                                                $sum_of_month += $value['duration_in_month'];

                                                                        ?>

                                                                        <tr id="row<?php echo $value['id']; ?>">
                                                                            <td>
                                                                                <input class="valdegination"
                                                                                    value="<?php if (!empty($value['designation_no'])) {
                                                                                                                                echo $value['designation_no'];
                                                                                                                            } ?>"
                                                                                    onkeypress="return IsSpecificSpecialCharacter(event);"
                                                                                    id="degination1<?php echo $x; ?>"
                                                                                    name="degination[]" type="text"
                                                                                    class="form-control"
                                                                                    placeholder="Designation " required>
                                                                            </td>
                                                                            <td>
                                                                                <input class="valorganization"
                                                                                    value="<?php if (!empty($value['designation_organistion'])) {
                                                                                                                                    echo $value['designation_organistion'];
                                                                                                                                } ?>"
                                                                                    onkeypress="return IsSpecificSpecialCharacter(event);"
                                                                                    id="organization<?php echo $x; ?>"
                                                                                    name="organization[]" type="text"
                                                                                    class="form-control"
                                                                                    placeholder="Organisation "
                                                                                    required>
                                                                            </td>
                                                                            <td>
                                                                                <input class="valnature_of_work"
                                                                                    value="<?php if (!empty($value['nature_of_work'])) {
                                                                                                                                    echo $value['nature_of_work'];
                                                                                                                                } ?>"
                                                                                    onkeypress="return IsSpecificSpecialCharacter(event);"
                                                                                    id="nature_of_work<?php echo $x; ?>"
                                                                                    name="nature_of_work[]" type="text"
                                                                                    class="form-control" required>
                                                                            </td>
                                                                            <td>
                                                                                <input class="valduration1"
                                                                                    name="duration_in_monthd[]"
                                                                                    value="<?php if (!empty($value['duration_in_month'])) {
                                                                                                                                                            echo $value['duration_in_month'];
                                                                                                                                                        } ?>"
                                                                                    onkeypress="return acceptnumber(event)"
                                                                                    id="duration1<?php echo $x; ?>"
                                                                                    onchange="editget_month_d(this.id,<?php echo $value['id']; ?>)"
                                                                                    type="text" class="form-control"
                                                                                    maxlength="2" required>
                                                                                <input
                                                                                    id="editfirstt<?php echo $value['id']; ?>"
                                                                                    name="editfirstt<?php echo $value['id']; ?>"
                                                                                    type="hidden" value="0">
                                                                                <input
                                                                                    id="editsecondt<?php echo $value['id']; ?>"
                                                                                    name="editsecondt<?php echo $value['id']; ?>"
                                                                                    type="hidden"
                                                                                    value="<?php if (!empty($value['duration_in_month'])) {
                                                                                                                                                                                                                    echo $value['duration_in_month'];
                                                                                                                                                                                                                } ?>">
                                                                            </td>
                                                                            <td>
                                                                                <input class="valsector"
                                                                                    value="<?php if (!empty($value['sector'])) {
                                                                                                                            echo $value['sector'];
                                                                                                                        } ?>"
                                                                                    onkeypress="return IsSpecificSpecialCharacter(event);"
                                                                                    type="text" class="form-control"
                                                                                    id="sector<?php echo $x; ?>"
                                                                                    name="sector[]" required><br>
                                                                                <input value="<?php if (!empty($value['id'])) {
                                                                                                            echo $value['id'];
                                                                                                        } ?>"
                                                                                    type="hidden"
                                                                                    id="sector_<?php echo $x; ?>"
                                                                                    name="sector_[]"><br>
                                                                                <button class="btn-danger" type="button"
                                                                                    name="<?php echo $value['id']; ?>"
                                                                                    onclick="display_work(this.id)"
                                                                                    id="worke<?php echo $value['id']; ?>">Remove</button>
                                                                            </td>
                                                                        </tr>
                                                                        <?php $x++;
                                                                            }
                                                                        } ?>

                                                                        <!-- <tr>
                                                                            <td data-column="Designation"><input id="degination2" name="degination2" type="text" class="form-control"  placeholder="2nd Designation"></td>
                                                                            <td data-column="organization"><input id="organization2" name="organization2" type="text" class="form-control"  placeholder="2nd Organisation"></td>
                                                                            <td data-column="Nature of work"><input id="nature_of_work2" name="nature_of_work2" type="text" class="form-control" ></td>
                                                                            <td data-column="Duration(in month)"><input id="duration2" name="duration2" type="text" class="form-control" ></td>
                                                                            <td data-column="sector"><input id="sector" name="sector2" type="text" class="form-control" ></td>
                                                                            <td data-column="From"><input id="from2" name="from2"  type="date" class="form-control"></td>
                                                                            <td data-column="To"><input id="to2" name="to2"  type="date" class="form-control"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td data-column="Designation"><input id="degination3" name="degination3" type="text" class="form-control"  placeholder="3rd Designation"></td>
                                                                            <td data-column="organization"><input id="organization3" name="organization3" type="text" class="form-control" placeholder="3rd Organisation"></td>
                                                                            <td data-column="Nature of work"><input id="nature_of_work3" name="nature_of_work3" type="text" class="form-control" ></td>
                                                                            <td data-column="Duration(in month)"><input id="duration3" name="duration3" type="text" class="form-control" ></td>
                                                                            <td data-column="sector"><input id="sector3" name="sector3" type="text" class="form-control"></td>
                                                                            <td data-column="From"><input id="from3" name="from3"  type="date" class="form-control"></td>
                                                                            <td data-column="To"><input id="to3" name="to3"  type="date" class="form-control"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td data-column="Designation"><input id="degination4" name="degination4" type="text" class="form-control"  placeholder="4th Designation"></td>
                                                                            <td data-column="organization"><input id="organization4" name="organization4" type="text" class="form-control"  placeholder="4th Organisation "></td>
                                                                            <td data-column="Nature of work"><input id="nature_of_work4" name="nature_of_work4" type="text" class="form-control" ></td>
                                                                            <td data-column="Duration(in month)"><input  id="duration4" name="duration4" type="text" class="form-control" ></td>
                                                                            <td data-column="Sector"><input id="sector4" name="sector4"  type="text" class="form-control"></td>
                                                                            <td data-column="From"><input id="from4" name="from4"  type="date" class="form-control"></td>
                                                                            <td data-column="To"><input id="to4" name="to4"  type="date" class="form-control"></td>
                                                                        </tr>  -->

                                                                    </tbody>
                                                                </table>
                                                                <input type="hidden" id="countexp" name="countexp"
                                                                    value="">
                                                                <input type="hidden" id="tab_id" name="tab_id"
                                                                    value="<?php echo $tab; ?>">
                                                                <div> <input type="button" id="addexp" name="addmore"
                                                                        value="Add More"
                                                                        style="float:right; margin-top: -40px;"
                                                                        class="btn btn-primary btn-sm work_exp_h_s">
                                                                </div>
                                                                <div class="work_exp_h_s">
                                                                    <center>Total Experince in month:<input type="text"
                                                                            id="sum_of_month" name="sum_of_month"
                                                                            value="<?php if (!empty($sum_of_month)) {
                                                                                                                                                                            echo $sum_of_month;
                                                                                                                                                                        } else {
                                                                                                                                                                            echo "0";
                                                                                                                                                                        } ?>"
                                                                            readonly /></center>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <ul class="list-inline pull-right">
                                                            <li><button type="button" class="default-btn next-step"
                                                                    id="btnbackeducation">Back</button></li>
                                                            <!-- <li><button type="button" class="default-btn next-step skip-btn">Skip</button></li> -->
                                                            <li><button type="button" id="btn_work_experince"
                                                                    class="btn btn-secondary">Save</button></li>
                                                            <li><button type="button" id="btn_preview"
                                                                    class="btn button" data-toggle="modal"
                                                                    data-target="#myffModal">Preview</button></li>
                                                            <li><button type="button" name="fianl_submit"
                                                                    value="final_submit" id="btn_work_experince_f"
                                                                    class="btn btn-primary">Final Submit</button></li>
                                                        </ul>
                                                        </form>
                                                    </div>

                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
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
        <div id="showhome">

            <div class='row'>
                <div class="col-md-6 col-sm-6 col-lg-6 col-md-offset-3">
                    <h1 class="ribbon"
                        style="font-size: 23px;text-align: center;background: #2b8b51;margin-bottom: -16px;">Preview
                    </h1>

                </div>
            </div>
            <div class='row'>

                <div class="col-md-12 col-sm-12 col-lg-12" style="margin-bottom:-69px;">

                    <table>
                        <tr>
                            <th>SL No.</th>
                            <th>Department</th>
                            <th>Programme applying</th>
                            <th>Course</th>
                        </tr>
                        <?php
                        $i = 1;
                        foreach ($application_details as $row) { ?>
                        <tr>
                            <td><?php echo $i; ?></td>

                            <td><?php echo "Management Studies"; ?></td>
                            <td><?php if ($row['program_id'] == 'ba') {
                                        echo "Business Analytics";
                                    }
                                    if ($row['program_id'] == 'mba') {
                                        echo " Master of Business Administration";
                                    }  ?></td>
                            <td><?php echo $row['program_desc']; ?></td>
                        </tr>
                        <?php
                            $i++;
                        }  ?>
                    </table>
                </div>
            </div>


            <div class='row content'>
                <div class="col-md-12">
                    <h1 class="ribbon" style="font-size: 23px;">Personal details</h1>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6">

                    <h5>Applicant's Name: <?php if (!empty($registration_detail)) {
                                                echo $registration_detail[0]->first_name . " " . $registration_detail[0]->middle_name . " " . $registration_detail[0]->last_name;
                                            } ?></h5>
                    <h5>Registration No: <?php if (!empty($registration_detail)) {
                                                echo $registration_detail[0]->registration_no;
                                            } ?></h5>
                    <h5>Relationship of Parent/Guardian: <?php if (!empty($application_details_ms[0]['guardian_realtion'])) {
                                                                echo $application_details_ms[0]['guardian_realtion'];
                                                            } ?></h5>
                    <h5>Category: <?php if (!empty($registration_detail)) {
                                        echo $registration_detail[0]->category;
                                    } ?></h5>
                    <h5>Martial Status: <?php echo $application_details_ms[0]['maritial_status']; ?></h5>
                    <h5>DOB: <?php if (!empty($registration_detail)) {
                                    echo $registration_detail[0]->dob;
                                } ?></h5>
                    <h5>Email: <?php if (!empty($registration_detail)) {
                                    echo $registration_detail[0]->email;
                                } ?></h5>
                    <h5>Gender: <?php if (!empty($application_details_ms[0]['gender'])) {
                                    echo $application_details_ms[0]['gender'];
                                } ?></h5>


                </div>
                <div class="col-md-6 col-sm-6 col-lg-6">

                    <h5>Name of the Parent/Guardian: <?php if (!empty($application_details_ms[0]['guardian_name'])) {
                                                            echo $application_details_ms[0]['guardian_name'];
                                                        } ?> </h5>
                    <h5>Guardian Mobile Number: <?php if (!empty($application_details_ms[0]['guardian_mobile'])) {
                                                    echo $application_details_ms[0]['guardian_mobile'];
                                                } ?></h5>
                    <h5>PWD: <?php if (!empty($registration_detail)) {
                                    if ($registration_detail[0]->pwd == 'Y') {
                                        echo "Yes";
                                    } else {
                                        echo "No";
                                    }
                                } ?></h5>
                    <h5>Nationality: <?php echo "INDIAN"; ?></h5>
                    <h5>Religion: <?php echo $application_details_ms[0]['religion']; ?></h5>
                    <h5>Mobile Number: <?php if (!empty($registration_detail)) {
                                            echo $registration_detail[0]->mobile;
                                        } ?></h5>
                    <h5>Aadhaar Number: <?php if (!empty($application_details_ms[0]['adhar'])) {
                                            echo $application_details_ms[0]['adhar'];
                                        } ?></h5>
                    <h5>Course: <?php echo "MBA"; ?></h5>
                    <!-- <h5>Color blindness/uniocularity: <?php if (!empty($registration_detail)) {
                                                                if ($registration_detail[0]->color_blind == 'Y') {
                                                                    echo "Yes";
                                                                } else {
                                                                    echo "No";
                                                                }
                                                            } ?></h5> -->
                    <?php if ($registration_detail[0]->category == 'OBC' || $registration_detail[0]->category == 'EWS') { ?>
                    <h5>Date of Issuance of caste certificate(OBC-NCL/EWS): <?php if (!empty($application_details_ms[0]['ews_obc_doc_date'])) {
                                                                                    echo $application_details_ms[0]['ews_obc_doc_date'];
                                                                                } ?></h5>
                    <?php } ?>
                </div>

            </div>
            <div class='row content'>
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <h1 class="ribbon" style="font-size: 23px;">Correspondence Address</h1>
                    <h5>Address Line:<?php if (!empty($c_addr_details[0]->line_1)) {
                                            echo $c_addr_details[0]->line_1;
                                        } ?>
                        <?php if (!empty($c_addr_details[0]->line_2)) {
                            echo $c_addr_details[0]->line_2;
                        } ?>
                        <?php if (!empty($c_addr_details[0]->line_2)) {
                            echo $c_addr_details[0]->line_3;
                        } ?>
                    </h5>
                    <h5>City: <?php if (!empty($c_addr_details[0]->city)) {
                                    echo $c_addr_details[0]->city;
                                } ?></h5>
                    <h5>State: <?php echo $c_addr_details[0]->state; ?></h5>
                    <h5>Pincode: <?php if (!empty($c_addr_details[0]->pincode)) {
                                        echo $c_addr_details[0]->pincode;
                                    } ?></h5>
                    <h5>Country: India</h5>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <h1 class="ribbon" style="font-size: 23px;">Permanent Address</h1>
                    <h5>Address Line:<?php if (!empty($p_addr_details[0]->line_1)) {
                                            echo $p_addr_details[0]->line_1;
                                        } ?>
                        <?php if (!empty($p_addr_details[0]->line_2)) {
                            echo $p_addr_details[0]->line_2;
                        } ?>
                        <?php if (!empty($p_addr_details[0]->line_2)) {
                            echo $p_addr_details[0]->line_3;
                        } ?>
                    </h5>
                    <h5>City: <?php if (!empty($p_addr_details[0]->city)) {
                                    echo $p_addr_details[0]->city;
                                } ?></h5>
                    <h5>State: <?php echo $p_addr_details[0]->state; ?></h5>
                    <h5>Pincode: <?php if (!empty($p_addr_details[0]->pincode)) {
                                        echo $p_addr_details[0]->pincode;
                                    } ?></h5>
                    <h5>Country: India</h5>
                </div>
            </div>
            <div class='row content'>
                <div class="col-md-12">
                    <h1 class="ribbon" style="font-size: 23px;">Cat Score Details</h1>
                </div>
                <div class="col-md-12">
                    <h1 style="font-size: 19px;text-align: center;">CAT 2022 Registration Number: <?php if (!empty($cat_details[0]->cat_reg_no)) {
                                                                                                        echo $cat_details[0]->cat_reg_no;
                                                                                                    } ?></h1>
                </div>

                <div class="col-md-6 col-sm-6 col-lg-6">

                    <h5>CAT Percentile: <?php if (!empty($cat_details[0]->cat_percentile)) {
                                            echo $cat_details[0]->cat_percentile;
                                        } ?> </h5>
                    <h5>CAT Quantitative Percentile: <?php if (!empty($cat_details[0]->cat_quant_percentile)) {
                                                            echo $cat_details[0]->cat_quant_percentile;
                                                        } ?></h5>
                    <h5>CAT Verbal Percentile: <?php if (!empty($cat_details[0]->cat_verb_percentile)) {
                                                    echo $cat_details[0]->cat_verb_percentile;
                                                } ?></h5>
                    <h5>CAT Data Interpretation Percentile: <?php if (!empty($cat_details[0]->cat_dis_percentile)) {
                                                                echo $cat_details[0]->cat_dis_percentile;
                                                            } ?> </h5>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6">

                    <h5>CAT Score: <?php if (!empty($cat_details[0]->cat_score)) {
                                        echo $cat_details[0]->cat_score;
                                    } ?> </h5>
                    <h5>CAT Quantitative Score: <?php if (!empty($cat_details[0]->cat_quant_score)) {
                                                    echo $cat_details[0]->cat_quant_score;
                                                } ?></h5>
                    <h5>CAT Verbal Score: <?php if (!empty($cat_details[0]->cat_verb_score)) {
                                                echo $cat_details[0]->cat_verb_score;
                                            } ?></h5>
                    <h5>CAT Data Interpretation Score: <?php if (!empty($cat_details[0]->cat_dis_score)) {
                                                            echo $cat_details[0]->cat_dis_score;
                                                        } ?></h5>
                </div>
            </div>

            <div class='row content'>
                <div class="col-md-12">
                    <h1 class="ribbon" style="font-size: 23px;">Interview priority location Details</h1>
                    <h4><span style="color:red;">NOTE: Final decision of the interview location will be based on the MBA
                            admission committee.</span></h4>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6">

                    <h5>Priority 1: <?php echo $int_cal_prio[0]->priority1; ?> </h5>
                    <h5>Priority 2: <?php echo $int_cal_prio[0]->priority2; ?></h5>
                    <h5>Priority 3: <?php echo $int_cal_prio[0]->priority3; ?></h5>

                </div>
            </div>

            <div class='row content'>
                <div class="col-md-12">
                    <h1 class="ribbon" style="font-size: 23px;">Academic details</h1>
                </div>
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <table id="table_programme" class=".table-sm table-responsive" style="margin-top: 5px;">
                        <thead>
                            <tr>
                                <th>Exam Type</th>
                                <th>Name of Exam</th>

                                <th width="60">Institute/University Name</th>
                                <th>Result Status</th>
                                <th>Marks</th>
                                <th>Year of Passing</th>
                                <th width="20">Percentage/CGPA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo $qual10_details[0]['exam_type']; ?>

                                </td>

                                <td data-column="Name of exam">
                                    <?php if (!empty($qual10_details[0]['exam_name'])) {
                                        echo $qual10_details[0]['exam_name'];
                                    } ?>

                                </td>



                                <td style="width: 40%;">

                                    <?php if (!empty($qual10_details)) echo $qual10_details[0]['institue_name']; ?>

                                </td>

                                <td>
                                    <?php if (!empty($qual10_details[0]['result_status'])) {
                                        echo $qual10_details[0]['result_status'];
                                    } ?>
                                </td>

                                <td>
                                    <?php if ($qual10_details[0]['marks_perc_type'] == 'Percentage') {
                                        echo $qual10_details[0]['marks_perc_type'];
                                    } else {
                                        echo "Cgpa";
                                    } ?>

                                </td>

                                <td>
                                    <?php if (!empty($qual10_details[0]['year_of_passing'])) echo $qual10_details[0]['year_of_passing']; ?>
                                </td>

                                <td>
                                    <?php if (!empty($qual10_details[0]['mark_cgpa_percenatge'])) {
                                        echo $qual10_details[0]['mark_cgpa_percenatge'];
                                    } ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <?php if (!empty($qual12_details[0]['exam_type'])) {
                                        echo $qual12_details[0]['exam_type'];
                                    } ?>

                                </td>

                                <td>
                                    <?php if (!empty($qual12_details[0]['exam_name'])) {
                                        echo $qual12_details[0]['exam_name'];
                                    } ?>
                                </td>



                                <td style="width: 40%;">
                                    <?php echo set_value('Institute12'); ?><?php if (!empty($qual12_details[0]['institue_name'])) {
                                                                                echo $qual12_details[0]['institue_name'];
                                                                            } ?>
                                </td>

                                <td>
                                    <?php if (!empty($qual12_details[0]['result_status'])) {
                                        echo $qual12_details[0]['result_status'];
                                    } ?>
                                </td>
                                <td>
                                    <?php if (!empty($qual12_details)) {
                                        if ($qual12_details[0]['marks_perc_type'] == 'Percentage') {
                                            echo $qual12_details[0]['marks_perc_type'];
                                        } else {
                                            echo "Cgpa";
                                        }
                                    } ?>
                                </td>

                                <td>
                                    <?php if (!empty($qual12_details[0]['year_of_passing'])) {
                                        echo $qual12_details[0]['year_of_passing'];
                                    } ?>
                                </td>

                                <td>
                                    <?php if (!empty($qual12_details[0]['mark_cgpa_percenatge'])) {
                                        echo $qual12_details[0]['mark_cgpa_percenatge'];
                                    } ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <?php if (!empty($qualug_details)) {
                                        if (!empty($qualug_details[0]['exam_type'])) {
                                            echo $qualug_details[0]['exam_type'];
                                        }
                                    } ?>
                                </td>

                                <td>
                                    <?php if (!empty($qualug_details[0]['exam_name'])) echo $qualug_details[0]['exam_name']; ?>
                                </td>


                                <td>
                                    <?php if (!empty($qualug_details[0]['institue_name'])) echo $qualug_details[0]['institue_name']; ?>
                                </td>

                                <td>
                                    <?php if (!empty($qual12_details[0]['result_status'])) {
                                        if ($qual12_details[0]['result_status'] == 'Passed') {
                                            if (!empty($qualug_details[0]['result_status'])) echo $qualug_details[0]['result_status'];
                                        }
                                    } ?>
                                </td>
                                <td>
                                    <?php if (!empty($qualug_details)) {
                                        if (!empty($qualug_details[0]['marks_perc_type'])) {
                                            echo $qualug_details[0]['marks_perc_type'];
                                        } else {
                                            echo "Cgpa";
                                        }
                                    } ?>
                                </td>
                                <td>
                                    <?php if (!empty($qualug_details[0]['year_of_passing'])) echo $qualug_details[0]['year_of_passing']; ?>
                                </td>
                                <td>
                                    <?php if (!empty($qualug_details[0]['mark_cgpa_percenatge'])) echo $qualug_details[0]['mark_cgpa_percenatge']; ?>
                                </td>
                            </tr>


                            <?php
                            $x = 0;

                            if (!empty($pg_details)) {
                                foreach ($pg_details as $value) {


                            ?>

                            <tr id="row<?php echo $x; ?>">
                                <td>
                                    <?php if (!empty($value['exam_type'])) { ?>
                                    <?php echo $value['exam_type']; ?>
                                    <?php }
                                            ?>
                                </td>

                                <td>
                                    <?php echo $value['exam_name']; ?>
                                </td>



                                <td style="width: 40%;">
                                    <?php echo $value['institue_name']; ?>
                                </td>

                                <td>
                                    <?php if (!empty($value['result_status'])) {
                                                if ($value['result_status'] == 'Passed') { ?>

                                    <?php echo $value['result_status']; ?>

                                    <?php } else { ?>
                                    <?php echo "Appearing"; ?>

                                    <?php
                                                } ?>

                                    <?php
                                            }

                                            ?>
                                </td>

                                <td>
                                    <?php if (!empty($value['marks_perc_type'])) {
                                                if ($value['marks_perc_type'] == 'Percentage') { ?>
                                    <?php echo $value['marks_perc_type']; ?>
                                    <?php } else { ?>
                                    <?php echo "Cgpa"; ?>
                                    <?php
                                                } ?>
                                    <?php
                                            } ?>
                                </td>

                                <td>
                                    <?php echo $value['year_of_passing']; ?>

                                </td>
                                <td>
                                    <?php echo $value['mark_cgpa_percenatge']; ?>
                                </td>
                            </tr>
                            <?php $x++;
                                }
                            } ?>
                        </tbody>
                    </table>

                </div>

            </div>

            <?php
            if (!empty($exp_details)) { ?>
            <div class='row content'>
                <div class="col-md-12">
                    <h1 class="ribbon" style="font-size: 23px;">Work Experince </h1>
                </div>
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <table id="workexp" class="table-responsive work_exp_h_s" style="margin-top: 5px;">
                        <thead>
                            <tr>
                                <th>Designation</th>
                                <th>Organization</th>
                                <th>Nature of work</th>
                                <th>Duration(in months)</th>
                                <th>Sector</th>
                                <!-- <th>From</th>
                                    <th>To</th>    -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sum_of_month = 0;
                                if (!empty($exp_details)) {
                                    $single = $exp_details[0]['duration_in_month'];
                                    $sum_of_month += $exp_details[0]['duration_in_month'];
                                }
                                ?>
                            <tr>
                                <td>
                                    <?php if (!empty($exp_details[0]['designation_no'])) echo $exp_details[0]['designation_no']; ?>

                                </td>
                                <td style="width:30%">
                                    <?php if (!empty($exp_details[0]['designation_organistion'])) echo $exp_details[0]['designation_organistion']; ?>

                                </td>
                                <td style="width:30%">
                                    <?php echo set_value('nature_of_work1') ?><?php if (!empty($exp_details[0]['nature_of_work'])) echo $exp_details[0]['nature_of_work']; ?>
                                </td>
                                <td>
                                    <?php if (!empty($exp_details[0]['duration_in_month'])) echo trim($exp_details[0]['duration_in_month']); ?>
                                </td>
                                <td>
                                    <?php echo $exp_details[0]['sector']; ?>
                                </td>

                            </tr>

                            <?php
                                $x = 0;

                                if (!empty($exp_details_d)) {
                                    foreach ($exp_details_d as $value) {
                                        $sum_of_month += $value['duration_in_month'];

                                ?>

                            <tr id="row<?php echo $value['id']; ?>">
                                <td>
                                    <?php if (!empty($value['designation_no'])) {
                                                    echo $value['designation_no'];
                                                } ?>
                                </td>
                                <td>
                                    <?php if (!empty($value['designation_organistion'])) {
                                                    echo $value['designation_organistion'];
                                                } ?>
                                </td>
                                <td>
                                    <?php if (!empty($value['nature_of_work'])) {
                                                    echo $value['nature_of_work'];
                                                } ?>
                                </td>
                                <td>
                                    <?php if (!empty($value['duration_in_month'])) {
                                                    echo $value['duration_in_month'];
                                                } ?>

                                </td>
                                <td>
                                    <?php if (!empty($value['sector'])) {
                                                    echo $value['sector'];
                                                } ?>

                                </td>
                            </tr>
                            <?php
                                        $x++;
                                    }
                                } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php } ?>
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-inline pull-right">

                        <li><button type="button" id="btn_preview_back" class="btn button"
                                style="margin-bottom:50px;">Back</button></li>

                    </ul>

                </div>

            </div>
        </div>
    </div>
    <!--row col-md-8 end  -->
    <div class="col-lg-2">
        <!--row col-md-2 start  -->
        <div class="notice">
            <!--notice start  -->
            <div class="row">
                <div class="col-md-12">
                    <!--start  -->
                    <div class="panel panel-primary news_back">
                        <div class="panel-heading">Applicant home
                        </div>
                        <div class="panel-body">
                            <input class="btn btn-info" style="width:100%;" type="button"
                                onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/Adm_mba_applicant_home'"
                                value="Back applicant home" />
                        </div>
                    </div>
                    <!--end  -->
                </div>
            </div>
        </div>
        <!--notice end -->
    </div>
    <!--row col-md-2 end  -->
</div>
<!--row start  -->

</div>
<!--row start  -->
<script type="text/javascript" src="<?php echo base_url(); ?>themes/dist/js/adm_mba/adm_mba_personal_detail.js">
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>themes/dist/js/adm_mba/adm_mba_education.js"></script> 
<script type="text/javascript">
$(document).ready(function() {
    $("#showhome").hide();
    $("#btn_preview").click(function() {
        $("#hidehome").hide();
        $("#showhome").show();
    });
    $("#btn_preview_back").click(function() {
        $("#hidehome").show();
        $("#showhome").hide();
    });
});
</script>
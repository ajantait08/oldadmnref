<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin-theme/css/scrutiny-old.css">

<style>
    #myBtn {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 40px;
        z-index: 99;
        cursor: pointer;
    }
</style>

<button type="button" class="btn btn-gradient-primary btn-rounded btn-icon" onclick="topFunction()" id="myBtn" title="Go to top">
    <i class="mdi mdi-arrow-up-bold-outline"></i>
</button>

<div class="page-header">
    <h3 class="page-title">Registration No.: <?php echo $application[0]->registration_no; ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/admission/admin/dashboard/scrutiny">All Applicants</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $application[0]->registration_no; ?></li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <table class="mtech table-responsive">
                    <tr>
                        <td style="width:10%" align="center">
                            <img class="imageqr" src="<?php echo base_url(); ?>assets/img/ismlogo.png" />
                        </td>
                        <td class="headingforms" style="width:90%" align="center">
                            <b>Indian Institute of Technology (Indian School of Mines) Dhanbad</b><br />
                            Online Application Form for MBA Admission 2021<br /><br />
                            <b>Online Registration Form No. -
                                <?php if (!empty($application[0]->registration_no)) {
                                    echo $application[0]->registration_no;
                                } ?>
                            </b>
                        </td>
                        <td style="width:10%" align="center">
                            <?php if (!empty($qrcode)) { ?>
                                <img class="imageqr" src="<?php echo base_url(); ?><?php echo $qrcode; ?>" />
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <table class="mtech-nb">
                                <tr>
                                    <td colspan=3>
                                        <table class="mtech-nb">
                                            <tr>
                                                <td>
                                                    <b>Applicant's Name:</b><br>
                                                    <?php if (!empty($application[0]->first_name)) {
                                                        echo $application[0]->first_name . " " . $application[0]->middle_name . " " . $application[0]->last_name;
                                                    } ?>
                                                </td>
                                                <td>
                                                    <b>Applicant's Mobile Number:</b><br>
                                                    <?php if (!empty($application[0]->mobile)) {
                                                        echo $application[0]->mobile;
                                                    } ?>
                                                </td>
                                                <td>
                                                    <b>Email Id:</b><br>
                                                    <?php if (!empty($application[0]->email)) {
                                                        echo $application[0]->email;
                                                    } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>Parent/Guardian's Name:</b><br>
                                                    <?php if (!empty($application[0]->guardian_name)) {
                                                        echo $application[0]->guardian_name;
                                                    } ?>
                                                </td>
                                                <td>
                                                    <b>Relationship of Parent/Guardian:</b><br>
                                                    <?php if (!empty($application[0]->guardian_realtion)) {
                                                        echo $application[0]->guardian_realtion;
                                                    } ?>
                                                </td>
                                                <td>
                                                    <b>Guardian's Mobile Number:</b><br>
                                                    <?php if (!empty($application[0]->guardian_mobile)) {
                                                        echo $application[0]->guardian_mobile;
                                                    } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>Date of Birth:</b><br>
                                                    <?php if (!empty($application[0]->dob)) {
                                                        echo date("d-m-Y", strtotime($application[0]->dob));
                                                    } ?>
                                                </td>
                                                <td>
                                                    <b>Gender:</b><br>
                                                    <?php if (!empty($application[0]->gender)) {
                                                        echo $application[0]->gender;
                                                    } ?>
                                                </td>
                                                <td>
                                                    <b>Nationality:</b><br>
                                                    <?php if (!empty($application[0]->nationality)) {
                                                        echo $application[0]->nationality;
                                                    } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Category:</b><br>
                                                    <?php if (!empty($application[0]->category)) {
                                                        echo $application[0]->category;
                                                    } ?>
                                                </td>
                                                <td><b>Religion:</b><br>
                                                    <?php if (!empty($application[0]->religion)) {
                                                        echo $application[0]->religion;
                                                    } ?>
                                                </td>
                                                <td><b>PWD:</b><br>
                                                    <?php if (!empty($application[0]->pwd) && $application[0]->pwd == 'Y') {
                                                        echo "Yes";
                                                    } elseif (!empty($application[0]->pwd) && $application[0]->pwd == 'N') {
                                                        echo "No";
                                                    } ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td align="center">
                                        <div>
                                            <?php if (!empty($photo)) { ?>
                                                <img class="imagephoto" src="<?php echo base_url(); ?><?php echo $photo[0]->doc_path; ?>" />
                                            <?php } ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Registration No.:</b>&nbsp;&nbsp;
                                        <?php if (!empty($application[0]->registration_no)) {
                                            echo $application[0]->registration_no;
                                        } ?>
                                    </td>
                                    <td><b>Registration Date:</b>&nbsp;&nbsp;
                                        <?php if (!empty($application[0]->created_time)) {
                                            echo date("d-m-Y", strtotime($application[0]->created_time));
                                        } ?>
                                    </td>
                                    <td>
                                    </td>
                                    <td align="center">
                                        <div>
                                            <?php if (!empty($sign)) { ?>
                                                <img class="imgsig" src="<?php echo base_url(); ?><?php echo $sign[0]->doc_path; ?>" />
                                            <?php } ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Programs Applied For: </b>
                                    </td>
                                    <td colspan=3>
                                        <?php if (!empty($program)) {
                                            $i = 1; ?>
                                            <?php foreach ($program as $prgm) { ?>
                                                <span style="margin-right: 3rem;">
                                                    <?php echo $i; ?>. <?php echo $prgm->program_desc . "(" . $prgm->program_id . ")"; ?>
                                                </span>
                                            <?php $i++;
                                            } ?>

                                        <?php } else { ?>
                                            <b>You have not yet applied for any program</b>
                                        <?php }
                                        ?>
                                    </td>
                                </tr>
                            </table>
                            <br><br>
                            <table class="mtech-nb">
                                <tr>
                                    <td style="width:70%">
                                        <b>Do you have B.Tech degree from IIT with 8.0 CGPA out of 10?</b>&nbsp;
                                        <?php if (!empty($application[0]->betch_iit) && $application[0]->betch_iit == 'Y') {
                                            echo "Yes";
                                        } else {
                                            echo "No";
                                        } ?>
                                    </td>
                                    <td style="width:30%">
                                        <?php if (!empty($application[0]->betch_iit) && $application[0]->betch_iit == 'Y') { ?>
                                            <b>Name of IIT:</b>&nbsp;
                                            <?php if (!empty($application[0]->betch_iit_name)) {
                                                echo $application[0]->betch_iit_name;
                                            } ?>
                                        <?php } ?>
                                    </td>

                                </tr>
                            </table>
                            <br><br>
                            <?php if (!empty($fellowship[0])) { ?>
                                <table class="mtech-nb">
                                    <tr>
                                        <td style="width:30%">
                                            CAT 2020 REGISTRATION NO.:
                                        </td>
                                        <td style="width:20%">
                                            <?php if (!empty($fellowship[0]->cat_reg_no)) {
                                                echo $fellowship[0]->cat_reg_no;
                                            } ?>
                                        </td>
                                        <td style="width:30%"></td>
                                        <td style="width:20%"></td>
                                    </tr>
                                    <tr>
                                        <td style="width:30%">
                                            CAT Percentile:
                                        </td>
                                        <td style="width:20%">
                                            <?php if (!empty($fellowship[0]->cat_percentile)) {
                                                echo $fellowship[0]->cat_percentile;
                                            } ?>
                                        </td>
                                        <td style="width:30%">
                                            CAT Score:
                                        </td>
                                        <td style="width:20%">
                                            <?php if (!empty($fellowship[0]->cat_score)) {
                                                echo $fellowship[0]->cat_score;
                                            } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:30%">
                                            CAT Quantitative Percentile:
                                        </td>
                                        <td style="width:20%">
                                            <?php if (!empty($fellowship[0]->cat_quant_percentile)) {
                                                echo $fellowship[0]->cat_quant_percentile;
                                            } ?>
                                        </td>
                                        <td style="width:30%">
                                            CAT Quantitative Score:
                                        </td>
                                        <td style="width:20%">
                                            <?php if (!empty($fellowship[0]->cat_quant_score)) {
                                                echo $fellowship[0]->cat_quant_score;
                                            } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:30%">
                                            CAT Verbal Percentile:
                                        </td>
                                        <td style="width:20%">
                                            <?php if (!empty($fellowship[0]->cat_verb_percentile)) {
                                                echo $fellowship[0]->cat_verb_percentile;
                                            } ?>
                                        </td>
                                        <td style="width:30%">
                                            CAT Verbal Score:
                                        </td>
                                        <td style="width:20%">
                                            <?php if (!empty($fellowship[0]->cat_verb_score)) {
                                                echo $fellowship[0]->cat_verb_score;
                                            } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            CAT Data Interpretation Percentile:
                                        </td>
                                        <td>
                                            <?php if (!empty($fellowship[0]->cat_dis_percentile)) {
                                                echo $fellowship[0]->cat_dis_percentile;
                                            } ?>
                                        </td>
                                        <td>
                                            CAT Data Interpretation Score:
                                        </td>
                                        <td>
                                            <?php if (!empty($fellowship[0]->cat_dis_score)) {
                                                echo $fellowship[0]->cat_dis_score;
                                            } ?>
                                        </td>
                                    </tr>
                                </table>
                            <?php } ?>
                            <br><br>
                            <?php if (!empty($qulaification)) { ?>
                                <p class="ex1"><b>ACADEMIC DETAILS</b></p>
                                <table class="mtech">
                                    <tr>
                                        <th>Name Of Exam</th>
                                        <th>Institute / University Name</th>
                                        <th>Result Status</th>
                                        <th>Marks System</th>
                                        <th>Passing Year</th>
                                        <th>Percentage/ CGPA</th>
                                    </tr>
                                    <?php
                                    foreach ($qulaification as $qlf) { ?>
                                        <tr>
                                            <td><?php if (!empty($qlf->exam_name)) {
                                                    echo $qlf->exam_name;
                                                } ?>
                                            </td>
                                            <td><?php if (!empty($qlf->institue_name)) {
                                                    echo $qlf->institue_name;
                                                } ?>
                                            </td>
                                            <td><?php if (!empty($qlf->result_status)) {
                                                    echo $qlf->result_status;
                                                } ?>
                                            </td>
                                            <td><?php if (!empty($qlf->marks_perc_type)) {
                                                    echo $qlf->marks_perc_type;
                                                } ?>
                                            </td>
                                            <td><?php if (!empty($qlf->year_of_passing)) {
                                                    echo $qlf->year_of_passing;
                                                } ?>
                                            </td>
                                            <td><?php if (!empty($qlf->mark_cgpa_percenatge)) {
                                                    echo $qlf->mark_cgpa_percenatge;
                                                } ?>
                                            </td>
                                        </tr>
                                    <?php
                                    } ?>
                                </table>
                            <?php } ?>
                            <br><br>
                            <?php if (!empty($work_exp)) { ?>
                                <p class="ex1"><b>WORK EXPERIENCE DETAILS</b></p>
                                <table class="mtech">
                                    <tr>
                                        <th>Designation</th>
                                        <th>Organization</th>
                                        <th>Nature of Work</th>
                                        <th>Duration (In Months)</th>
                                        <!-- <th>From Date</th>
                                        <th>To Date</th> -->
                                        <th>Sector</th>
                                    </tr>
                                    <?php
                                    foreach ($work_exp as $work) { ?>
                                        <tr>
                                            <td>
                                                <?php if (!empty($work->designation_no)) {
                                                    echo $work->designation_no;
                                                } ?>
                                            </td>
                                            <td>
                                                <?php if (!empty($work->designation_organistion)) {
                                                    echo $work->designation_organistion;
                                                } ?>
                                            </td>
                                            <td>
                                                <?php if (!empty($work->nature_of_work)) {
                                                    echo $work->nature_of_work;
                                                } ?>
                                            </td>
                                            <!-- <td>
                                                <?php if (!empty($work->from_date)) {
                                                    echo date("d-m-Y", strtotime($work->from_date));
                                                } ?>
                                            </td>
                                            <td>
                                                <?php if (!empty($work->to_date)) {
                                                    echo date("d-m-Y", strtotime($work->to_date));
                                                } ?>
                                            </td> -->
                                            <td>
                                                <?php
                                                if (!empty($work->duration_in_month)) {
                                                    echo $work->duration_in_month . " Months";
                                                } ?>
                                            </td>
                                            <td>
                                                <?php if (!empty($work->sector)) {
                                                    echo $work->sector;
                                                } ?>
                                            </td>
                                        </tr>
                                    <?php
                                    } ?>
                                </table>
                                <table class="mtech-nb">
                                    <tr>
                                        <td>
                                            <b>Total Experience: </b>
                                            <?php if (!empty($totalexp)) {
                                                echo $totalexp . " Months";
                                            } ?>
                                        </td>
                                    </tr>
                                </table>
                            <?php } ?>
                            <br>
                            <table class="mtech-nb">
                                <tr>
                                    <td style="width:33.33%">
                                        <p class="ex1"><b>Correspondence Address</b></p>
                                        <table class="mtech-nb">
                                            <?php
                                            foreach ($address as $adrs) { ?>
                                                <?php if ($adrs->address_type == 'C') { ?>
                                                    <tr>
                                                        <td>
                                                            Address:
                                                        </td>
                                                        <td><?php if (!empty($adrs->line_1)) {
                                                                echo $adrs->line_1;
                                                            } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td><?php if (!empty($adrs->line_2)) {
                                                                echo $adrs->line_2;
                                                            } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td><?php if (!empty($adrs->line_3)) {
                                                                echo $adrs->line_3;
                                                            } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            City:
                                                        </td>
                                                        <td>
                                                            <?php if (!empty($adrs->city)) {
                                                                echo $adrs->city;
                                                            } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            State:
                                                        </td>
                                                        <td>
                                                            <?php if (!empty($adrs->state)) {
                                                                echo $adrs->state;
                                                            } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Pin Code:
                                                        </td>
                                                        <td>
                                                            <?php if (!empty($adrs->pincode)) {
                                                                echo $adrs->pincode;
                                                            } ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            <?php
                                            } ?>
                                        </table>
                                    </td>
                                    <td style="width:33.33%">
                                        <p class="ex1"><b>Permanent Address</b></p>
                                        <table class="mtech-nb">
                                            <?php
                                            foreach ($address as $adrs) { ?>
                                                <?php if ($adrs->address_type == 'P') { ?>
                                                    <tr>
                                                        <td>
                                                            Address:
                                                        </td>
                                                        <td><?php if (!empty($adrs->line_1)) {
                                                                echo $adrs->line_1;
                                                            } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td><?php if (!empty($adrs->line_2)) {
                                                                echo $adrs->line_2;
                                                            } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td><?php if (!empty($adrs->line_3)) {
                                                                echo $adrs->line_3;
                                                            } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            City:
                                                        </td>
                                                        <td>
                                                            <?php if (!empty($adrs->city)) {
                                                                echo $adrs->city;
                                                            } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            State:
                                                        </td>
                                                        <td>
                                                            <?php if (!empty($adrs->state)) {
                                                                echo $adrs->state;
                                                            } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Pin Code:
                                                        </td>
                                                        <td>
                                                            <?php if (!empty($adrs->pincode)) {
                                                                echo $adrs->pincode;
                                                            } ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            <?php
                                            } ?>
                                        </table>
                                    </td>
                                    <td style="width:33.33%">
                                        <p class="ex1"><b>Documents Uploaded</b></p>
                                        <table class="mtech-nb">
                                            <?php foreach ($doc as  $document) {
                                                if (($document->description == 'Photo') || ($document->description == 'Signature') || ($document->description == 'QRCode')) {
                                                    continue;
                                                } else { ?>
                                                    <tr>
                                                        <td>
                                                            <a href="<?php echo base_url(); ?><?php echo $document->doc_path; ?>" target="_blank"><?php echo $document->description; ?></a>
                                                        </td>
                                                    </tr>
                                            <?php }
                                            } ?>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <p class="ex1"><b>PAYMENT DETAILS</b></p>
                            <table class="mtech">
                                <thead>
                                    <th>Order ID</th>
                                    <th>Transaction ID</th>
                                    <th>Paid Amount</th>
                                    <th>Transaction Date</th>
                                    <th>Payable Amount</th>
                                </thead>
                                <tbody>
                                    <td><?php if (!empty($application[0]->order_id)) {
                                            echo $application[0]->order_id;
                                        } ?>
                                    </td>
                                    <td>
                                        <?php if (!empty($application[0]->transaction_id)) {
                                            echo $application[0]->transaction_id;
                                        } ?>
                                    </td>
                                    <td>
                                        <?php if (!empty($application[0]->payment_amount)) {
                                            echo $application[0]->payment_amount;
                                        } ?>
                                    </td>
                                    <td>
                                        <?php if (!empty($application[0]->payment_date_time)) {
                                            echo date("d-m-Y", strtotime($application[0]->payment_date_time));
                                        } ?>
                                    </td>
                                    <td>
                                        <?php if (!empty($application[0]->application_fee)) {
                                            echo $application[0]->application_fee;
                                        } ?>
                                    </td>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
                <br>
                <form class="forms-sample" align="left" action="<?php echo base_url() ?>index.php/admission/admin/dashboard/scrutiny_remark/<?php echo $application[0]->registration_no; ?>" method="post">
                    <div class="form-group">
                        <label for="SelectAction">Select Action</label>
                        <select class="form-control" id="SelectAction" name="verf_action" onchange="check_val(this);">
                            <option value=0 <?php if ($application[0]->doc_verfied_flag == 0) echo 'selected="selected"'; ?>>Not Started</option>
                            <option value=1 <?php if ($application[0]->doc_verfied_flag == 1) echo 'selected="selected"'; ?>>Verified - OK</option>
                            <option value=2 <?php if ($application[0]->doc_verfied_flag == 2) echo 'selected="selected"'; ?>>Verified - Not OK</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Textarea1">Action Remarks:</label>
                        <textarea class="form-control" id="Textarea1" name="verf_remark" rows="4" maxlength="300" readonly><?php echo $application[0]->doc_ver_reason; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function check_val(sel) {
        if (sel.value == 1) {
            document.getElementById('Textarea1').value = 'OK & Verified';
            document.getElementById('Textarea1').readOnly = true;
        } else {
            document.getElementById('Textarea1').value = '';
            document.getElementById('Textarea1').readOnly = false;
        }
    }

    //Get the button
    var mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

    $(document).bind("contextmenu", function(e) {
        return false;
    });
</script>
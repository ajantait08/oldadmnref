<!DOCTYPE html>
<html>

<head>
    <title>Phd Application</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body {
            font-family: Verdana, dejvu sans, sans-serif;
            font-size: 12px;
            page-break-inside: avoid;
            <?php if ($print == 'Y') { ?>font-size: 10px;
            <?php } ?>
        }

        @page {
            margin: .4cm .1cm 0.2cm .6cm;
        }

        @media screen,
        print {
            body {
                line-height: 1.2;
            }
        }

        .headingforms {
            font-size: 13px;
        }

        .imagephoto {
            height: 6.875rem;
            width: 6.875rem;
            padding-left: 3px;
            padding-right: 3px;
            padding-top: 1px;
            padding-bottom: 1px;
        }

        .imgsig {
            height: 1.875rem;
            width: 6.875rem;
            padding-left: 3px;
            padding-right: 3px;
            padding-top: 1px;
            padding-bottom: 1px;

        }

        .imageqr {
            height: 114px;
            width: 120px;
            padding-top: 1px;
            padding-bottom: 1px;
        }

        p.ex1 {
            padding-left: 3px;
            padding-right: 3px;
            text-align: justify;
            page-break-inside: avoid;
        }

        .Phd {
            border: 1px solid black;
            border-collapse: collapse;
            border-spacing: 0;
            padding-left: 3px;
            padding-right: 3px;
            padding-top: 1px;
            padding-bottom: 1px;
            page-break-inside: avoid;
        }

        .Phd td {
            border: 1px solid black;
            padding-left: 3px;
            padding-right: 3px;
            vertical-align: middle;
        }

        .Phd tr {
            border: 1px solid black;
            padding-left: 3px;
            padding-right: 3px;
        }

        .Phd th {
            border: 1px solid black;
            padding-left: 3px;
            padding-right: 3px;
            text-align: justify;
        }

        .Phd-prgm {
            border-collapse: collapse;
            padding-left: 3px;
            padding-right: 3px;
            page-break-inside: avoid;
        }

        .Phd-prgm td {
            border: 2px solid #000;
            padding-left: 3px;
            padding-right: 3px;
            vertical-align: middle;
        }

        .Phd-prgm tr {
            border: 2px solid #000;
            padding-left: 3px;
            padding-right: 3px;
        }

        .Phd-prgms tr {
            padding-left: 3px;
            padding-right: 3px;
        }

        .Phd-prgms {
            border-collapse: separate;
            border-spacing: 10px;
        }

        .Phd-prgm th {
            border: 2px solid #000;
            padding-left: 3px;
            padding-right: 3px;
            text-align: justify;
        }

        .Phd-nb {
            border-collapse: collapse;
            border: none;
            padding-left: 3px;
            padding-right: 3px;
            padding-top: 1px;
            padding-bottom: 1px;
            page-break-inside: avoid;
        }

        .Phd-nb td {
            border: none;
            padding-left: 3px;
            padding-right: 3px;
            padding-top: 1px;
            padding-bottom: 1px;
            vertical-align: middle;
        }

        .Phd-nb tr {
            border: none;
            padding-left: 3px;
            padding-right: 3px;
        }

        .Phd-nb th {
            border: none;
            padding-left: 3px;
            padding-right: 3px;
        }
        table{
        border-collapse: separate;
        border-spacing: 0px;
        }
        table, th, td{
            border: 1px solid #000;
        }
        table th, table td{
            padding: 0px;
        }
    </style>
</head>

<body>
    <div class="page" width="8.3 inches" height="11.7 inches" align="center">
        <table class="Phd" style="margin: 0.01in 0.01in 0.01in 0.01in; width:80%" align="center">
            <tr>
                <td style="width:10%" align="center">
                    <img class="imageqr" src="<?php echo base_url(); ?>assets/img/ismlogo.png" />
                </td>
                <td class="headingforms" style="width:80%" align="center">
                    <b>Indian Institute of Technology (Indian School of Mines) Dhanbad</b><br />
                    Online Application Form for Phd. Admission 2022<br />Phd. Programme<br /><br />
                    <b>Online Registration Form No. - <?php if (!empty($application[0]->registration_no)) {
                                                            echo $application[0]->registration_no;
                                                        } ?>
                        (<?php if (!empty($application[0]->appl_type)) {
                                echo $application[0]->appl_type;
                            } ?>)</b>
                </td>
                <td style="width:10%" align="center">
                    <?php if (!empty($qrcode)) { ?>
                        <img class="imageqr" src="<?php echo base_url(); ?><?php echo $qrcode; ?>" />
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table style="width:100%; margin-top: 10px;" width="100" height="60">
                        <tr>
                            <td>
                                <table class="table" style="width:100%;" border="1">
                                      <tr></tr>
                                    <tr>

                                        <td style="width:35%">
                                            <b>Candidate's Name:</b>
                                            <?php if (!empty($application[0]->first_name)) {
                                                echo $application[0]->first_name . " " . $application[0]->middle_name . " " . $application[0]->last_name;
                                            } ?>
                                        </td>
                                        <td style="width:30%">
                                            <b>Guardian's Name:</b>
                                            <?php if (!empty($application[0]->guardian_name)) {
                                                echo $application[0]->guardian_name;
                                            } ?>
                                        </td>
                                        <td style="width:35%">
                                            <b>Guardian's Mobile Number:</b>
                                            <?php if (!empty($application[0]->guardian_mobile)) {
                                                echo $application[0]->guardian_mobile;
                                            } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:35%"><b>Category:</b>
                                            <?php if (!empty($application[0]->category)) {
                                                echo $application[0]->category;
                                            } ?>
                                        </td>
                                        <td style="width:30%"><b>PWD:</b>
                                            <?php if (!empty($application[0]->pwd) && $application[0]->pwd == 'Y') {
                                                echo "Yes";
                                            } elseif (!empty($application[0]->pwd) && $application[0]->pwd == 'N') {
                                                echo "No";
                                            } ?>
                                        </td>
                                        <td style="width:35%">
                                            <b>Applicant's Mobile Number:</b>
                                            <?php if (!empty($application[0]->mobile)) {
                                                echo $application[0]->mobile;
                                            } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:35%"><b>Gender:</b>
                                            <?php if (!empty($application[0]->gender)) {
                                                echo $application[0]->gender;
                                            } ?>
                                        </td>
                                        <td style="width:30%"><b>Date of Birth:</b>
                                            <?php if (!empty($application[0]->dob)) {
                                                echo date("d-m-Y", strtotime($application[0]->dob));
                                            } ?>
                                        </td>
                                        <td style="width:35%"><b>Email Id:</b>
                                            <?php if (!empty($application[0]->email)) {
                                                echo $application[0]->email;
                                            } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <b>Address:</b>

                                                <?php if (!empty($address)) {
                                                    echo $address[0]->line_1; ?>,&nbsp;<?php echo $address[0]->line_2; ?>
                                                <?php if (!empty($address[0]->line_3)) echo ", " . $address[0]->line_3; ?>,
                                                <?php echo $address[0]->city; ?>, <?php echo $address[0]->state; ?>,
                                                <?php echo $address[0]->pincode; ?>, <?php echo $address[0]->country;
                                                                                    } ?>
                                        </td>
                                    </tr>
                                </table>
                                <table class="Phd-nb" style="width:100%;">
                                    <tr>
                                        <td>
                                            <b>Registration Date:</b>&nbsp;&nbsp;
                                            <?php if (!empty($application[0]->created_time)) {
                                                echo date("d-m-Y", strtotime($application[0]->created_time));
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if ($print == 'Y') { ?>
                                                <b>Print Date:</b>&nbsp;&nbsp;
                                            <?php echo date("Y-m-d h:i:sa", time());
                                            } ?>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td width="80" height="60">
                                <table class="Phd-nb" width="80">
                                    <tr>
                                        <td width="80" height="50">
                                            <div>
                                                <?php if (!empty($photo)) { ?>
                                                    <img class= "imagephoto" src="<?php echo base_url(); ?><?php echo $photo[0]->doc_path; ?>"/>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="80" height="20">
                                            <div>
                                                <?php if (!empty($sign)) { ?>
                                                    <img class="imgsig" src="<?php echo base_url(); ?><?php echo $sign[0]->doc_path; ?>"/>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <!-- <p class="ex1"><b>Essential Information</b></p> -->

                    <table class="Phd-prgm" style="width:100%;border:1px solid black;">
                      <tr>
                          <td>
                              <b>Amount Payable : </b>&nbsp;&nbsp;
                              <?php if(!empty($application[0]->application_fee)){
                                  echo 'Rs. '.$application[0]->application_fee;
                              } ?>
                          </td>
                      </tr>
                    </table>

                    <table class="Phd-nb" style="width:100%">
                        <!-- <tr>
                            <td colspan="2"><b>COAP REG NO:</b>&nbsp;&nbsp;
                                <?php if (!empty($application[0]->coap_reg_id)) {
                                    echo $application[0]->coap_reg_id;
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>GATE Subject and Code:</b>&nbsp;&nbsp;
                                <?php if (!empty($application[0]->gate_paper_desc)) {
                                    echo $application[0]->gate_paper_desc;
                                } ?>
                                ( <?php if (!empty($application[0]->gate_paper_code)) {
                                        echo $application[0]->gate_paper_code;
                                    } ?> )
                            </td>
                        </tr> -->
                        <tr>
                            <td><b>Programme Applying For:</b></td>
                            <!-- <td><b>Amount Payable:</b>&nbsp;&nbsp;
                                <?php if (!empty($application[0]->application_fee)) {
                                    echo $application[0]->application_fee;
                                } ?>
                            </td> -->
                        </tr>
                    </table>
                    <table class="Phd-prgm" style="width:100%">
                        <tr>
                            <th style="width:10%">Sl. No.</th>
                            <th style="width:40%">Program Name</th>
                            <th style="width:50%">Qualifying Degree Subject/Branch</th>
                        </tr>
                        <?php
                        if (!empty($program)) {
                            $i = 1;
                            foreach ($program as $prgm) { ?>
                                <tr>
                                    <td style="width:10%"><?php echo $i.'.'; ?></td>
                                    <td style="width:35%"><?php if (!empty($prgm->program_desc)) {
                                                                echo $prgm->program_desc;
                                                            } ?>
                                        (<?php if (!empty($prgm->program_id)) {
                                                echo $prgm->program_id;
                                            } ?>)
                                    </td>
                                    <td style="width:55%"><?php if (!empty($prgm->degree_desc)) {
                                                                echo $prgm->degree_desc;
                                                            } ?></td>
                                </tr>
                        <?php
                                $i++;
                            }
                        } ?>
                    </table>
                    <p class="ex1"><b><u>PROJECT DETAILS :</u></b></p>
                    <table class="Phd-prgm" style="width:100%;border:1px solid black;">
                      <tr>
                          <td>
                              <b>Assistance Type : </b>&nbsp;&nbsp;
                              <?php if(!empty($application[0]->assistance_type)){
                                  echo '<b>'.$application[0]->assistance_type.'</b>';
                              } ?>
                          </td>
                      </tr>
                    </table>
                     <?php if($application[0]->assistance_type == 'PRJ'){
                            if($application[0]->ism_proj_emp == 'Y'){
                            ?>
                    <p class="ex1"></p>
                    <table class="Phd-prgm" style="width:100%;border:1px solid black;">
                        <tr>
                            <th>Project Designation.</th>
                            <th>Project No.</th>
                            <th>Project Name</th>
                            <th>Project PI</th>
                            <th>Project Department</th>
                            <th>Project Start Date</th>
                            <th>Project End Date</th>
                        </tr>
                        <tr>
                            <td><?php if (!empty($application[0]->proj_designation)) {
                                    echo $application[0]->proj_designation;
                                } else { echo 'NA';} ?></td>
                            <td><?php if (!empty($application[0]->proj_no)) {
                                    echo $application[0]->proj_no;
                                } else { echo 'NA';} ?></td>
                            <td><?php if (!empty($application[0]->proj_name)) {
                                    echo $application[0]->proj_name;
                                } else { echo 'NA';}  ?></td>
                            <td><?php if (!empty($application[0]->proj_pi)) {
                                    echo $application[0]->proj_pi;
                                } else { echo 'NA';} ?></td>
                                <td><?php if (!empty($application[0]->proj_dept)) {
                                    echo $application[0]->proj_dept;
                                } else { echo 'NA';}  ?></td>
                                <td><?php if (!empty($application[0]->proj_start_date)) {
                                    echo $application[0]->proj_start_date;
                                } else { echo 'NA';}  ?></td>
                                <td><?php if (!empty($application[0]->proj_end_date)) {
                                    echo $application[0]->proj_end_date;
                                } else { echo 'NA';}  ?></td>
                        </tr>
                    </table>
                    <?php }} ?>
                    <?php if (!empty($qulaification)) { ?>
                        <p class="ex1"><b><u>ACADEMIC DETAILS : </u></b></p>
                        <table class="Phd" style="width:100%">
                            <tr>
                                <!-- <th>INSTITUTE / UNIVERSITY NAME</th>
                                <th>EXAM TYPE</th>
                                <th>EXAM NAME</th>
                                <th>MARKS SYSTEM</th>
                                <th>PASSING YEAR</th>
                                <th>PERCENTAGE/CGPA</th> -->
                                <th>Institute/University Name</th>
                                <th>Exam Type</th>
                                <th>Exam Name</th>
                                <th>Marks System</th>
                                <th>Passing Year</th>
                                <th>Percentage/CGPA</th>
                            </tr>
                            <?php
                            foreach ($qulaification as $qlf) { ?>
                                <tr>
                                    <td><?php if (!empty($qlf->institue_name)) {
                                            echo $qlf->institue_name;
                                        } ?></td>
                                         <td><?php if (!empty($qlf->exam_type)) {
                                            echo $qlf->exam_type;
                                        } ?></td>
                                         <td><?php if (!empty($qlf->exam_name)) {
                                            echo $qlf->exam_name;
                                        } ?></td>
                                    <td><?php if (!empty($qlf->marks_perc_type)) {
                                            echo $qlf->marks_perc_type;
                                        } ?></td>
                                    <td><?php if (!empty($qlf->year_of_passing)) {
                                            echo $qlf->year_of_passing;
                                        } ?></td>
                                    <td><?php if (!empty($qlf->mark_cgpa_percenatge)) {
                                            echo $qlf->mark_cgpa_percenatge;
                                        } ?></td>
                                </tr>
                            <?php
                            } ?>
                        </table>
                    <?php } ?>
                    <?php if (!empty($work_exp)) { ?>
                        <p class="ex1"><b><u>WORK EXPERIENCE :</u></b></p>
                        <table class="Phd" style="width:100%">
                            <tr>
                                <th style="width:10%">Sl. No.</th>
                                <th style="width:30%">Organization Name</th>
                                <th style="width:30%">Role</th>
                                <th style="width:30%">Duration&nbsp;(<small>in months</small>)</th>
                                <th style="width:30%">Experience</th>
                            </tr>
                            <?php
                            $i = 1;
                            foreach ($work_exp as $work) { ?>
                                <tr>
                                    <td style="width:10%"><?php echo $i.'.'; ?></td>
                                    <td style="width:30%"><?php if (!empty($work->designation_organistion)) {
                                                                echo $work->designation_organistion;
                                                            } ?></td>
                                    <td style="width:30%"><?php if (!empty($work->nature_of_work)) {
                                                                echo $work->nature_of_work;
                                                            } ?></td>
                                    <td style="width:30%"><?php if (!empty($work->duration_in_month)) {
                                                                echo $work->duration_in_month . '(in Months)' ;
                                                            } ?></td>
                                    <td style="width:30%"><?php if (!empty($work->total_experience)) {
                                        echo $work->total_experience . 'Years' ;
                                    } ?></td>
                                </tr>
                            <?php
                                $i++;
                            } ?>
                        </table>
                    <?php } ?>

                    <?php if(!empty($fellowship)) { ?>

                        <p class="ex1"><b><u>FELLOWSHIP :</u></b></p>
                        <?php foreach($fellowship as $fellow){ ?>

                        <?php if(!empty($fellow->iit_name)){?>

                    <p class="ex1"><b><u>Fellowship From IIT Details :</u></b></p>
                    <table class="Phd-prgm" style="width:100%;border:1px solid black;">
                      <tr>
                          <td>
                              <b>IIT NAME : </b>&nbsp;&nbsp;
                              <?php if(!empty($fellow->iit_name)){
                                  echo '<b>'.$fellow->iit_name.'</b>';
                              } ?>
                          </td>
                            </tr>
                          <tr>
                          <td>
                          <b>CGPA : </b>&nbsp;&nbsp;
                              <?php if(!empty($fellow->cgpa)){
                                  echo '<b>'.$fellow->cgpa.'</b>';
                              } ?>
                          </td>
                      </tr>
                    </table>
                              <?php }} ?>

                        <p class="ex1"><b><u>Fellowship Details :</u></b></p>
                        <table class="Phd" style="width:100%">
                            <tr>
                                <th style="width:10%">Sl. No.</th>
                                <th style="width:30%">Fellowship Type</th>
                                <th style="width:30%">Fellowship Name</th>
                                <th style="width:30%">Fellowship Reg. No.</th>
                                <th style="width:30%">Fellowship Percentile</th>
                                <!-- <th style="width:30%">Fellowship Serial</th> -->
                            </tr>
                            <?php
                            $i = 1;
                            foreach ($fellowship as $fellow) {
                                if(empty($fellow->iit_name)){
                                ?>
                                <tr>
                                    <td style="width:10%"><?php echo $i.'.'; ?></td>
                                    <td style="width:30%"><?php if (!empty($fellow->fellowship_type)) {
                                                                echo $fellow->fellowship_type;
                                                            } else {
                                                                echo 'NA';
                                                            } ?></td>
                                    <td style="width:30%"><?php if (!empty($fellow->fellowship_name)) {
                                                                echo $fellow->fellowship_name;
                                                            } else {
                                                                echo 'NA';
                                                            } ?></td>
                                    <td style="width:30%"><?php if (!empty($fellow->fellow_reg_no)) {
                                                                echo $fellow->fellow_reg_no;
                                                            } else {
                                                                echo 'NA';
                                                            } ?></td>
                                    <td style="width:30%"><?php if (!empty($fellow->fellow_percentile)) {
                                        echo $fellow->fellow_percentile;
                                    } else {
                                        echo 'NA';
                                    } ?></td>
                                    <!-- <td style="width:30%"><?php if (!empty($fellow->fellowship_serial_no)) {
                                        echo $fellow->fellowship_serial_no;
                                    } ?></td> -->
                                </tr>
                            <?php
                                $i++;
                           } }} ?>
                        </table>

                    <table class="Phd-nb" style="width:100%">
                        <tr>
                            <td style="width:15%">
                                <b>PAYMENT:: </b>
                            </td>
                            <td style="width:85%">
                                <b>
                                    ORDERID :: <?php if (!empty($application[0]->order_id)) {
                                                    echo $application[0]->order_id;
                                                } ?>
                                    TRANSACTIONID:: <?php if (!empty($application[0]->transaction_id)) {
                                                        echo $application[0]->transaction_id;
                                                    } ?>
                                    PAID AMOUNT:: <?php if (!empty($application[0]->payment_amount)) {
                                                        echo $application[0]->payment_amount;
                                                    } ?>
                                    TRANSACTION DATE:: <?php if (!empty($application[0]->payment_date_time)) {
                                                         $data_array = explode('-',$application[0]->payment_date_time);

                                                         $data_array_month = explode(' ',$data_array[2]);

                                                        echo $data_array['1'].'-'.$data_array_month['0'].'-'.$data_array['0'].' '.$data_array_month['1'];
                                                        } ?>
                                    <br />PAYABLE AMOUNT::<?php if (!empty($application[0]->application_fee)) {
                                                                echo $application[0]->application_fee;
                                                            } ?>
                                </b>
                            </td>
                        </tr>
                        <br />
                        <br />
                        <tr>
                            <td colspan="2">
                                <p class="ex1">Note:
                                <p>
                                <p class="ex1">1. Visit offical website www.iitism.ac.in regularly for latest updates.</p>
                                <p class="ex1">2. Keep one hard copy of the form itself for future use.</p>
                                <p class="ex1">Declaration: I do hereby declare that the statements made in the application are true, complete and correct to the
                                    best of my knowledge and belief. I understand and agree that in the event of any information being found false or incorrect or
                                    incomplete or non-eligibility being detected at any time before or after admission, my candidature is liable to be rejected.
                                    I shall be bo und by the decision of Indian Institute of Technology (Indian School of Mines), Dhanbad. If admitted,
                                    I promise to abide by the rules and regulation of IIT(ISM)</p>
                                <br />
                                <p align="center">(Signature of the Candidate)</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
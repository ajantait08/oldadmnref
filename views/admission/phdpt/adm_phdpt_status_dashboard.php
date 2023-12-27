<style>
    /* @import url('https://fonts.googleapis.com/css?family=Roboto'); */

    body {
        margin: 0;
        padding: 0;
        font-family: 'Roboto', sans-serif;
    }

    .palel-primary {
        /* border-color: #007497; */
        border-color: #B31312;
    }

    .panel-primary>.panel-heading {
        text-align: center;
        /* background: #007497; */
        background: #B31312;
    }

    .panel-primary>.panel-body {
        background-color: #EDEDED;
    }

    marquee {
        font-size: 15px;
        font-weight: 300;
        color: #ff5200;
        font-family: sans-serif;
    }

    .news_back {
        border-radius: 5px;
        border: solid 1px #ccc;
        box-shadow: 1px 2px 5px rgba(0, 0, 0, .31);
        background: #ebebeb;
    }

    ol {
        margin-left: 1rem;
        width: 90%;
    }

    li {
        margin: 1rem;
        text-align: left;
    }

    table {
        border: 1px solid #ccc;
        border-collapse: collapse;
        margin: 0;
        padding: 0;
        width: 100%;
        /* table-layout: fixed; */
        margin: 50px auto;
    }

    table tr {
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        padding: .35em;
    }

    table td {
        background: #EDEDED;
    }

    table th,
    td {
        padding: .625rem;
        font-size: 1.15rem;
        letter-spacing: .0625rem;
        border: 1px solid #ccc;
        text-align: center;
    }

    table th {
        text-transform: uppercase;
        /* background: #007497; */
        background: #B31312;
        color: white;
        font-weight: bold;
        text-align: center;
    }

    @media screen and (max-width: 1370px) {
        table {
            border: 0;
        }

        thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        table tr {
            display: block;
            margin-bottom: .625em;
        }

        table td {
            display: block;
            font-size: .8em;
            text-align: right;
        }

        table td::before {
            content: attr(data-label);
            float: left;
            font-weight: bold;
            text-transform: uppercase;
        }
    }

    .blink {
        animation: blinker 0.6s linear infinite;
        color: #1c87c9;
        font-size: 14px;
        font-weight: bold;
        font-family: sans-serif;
    }

    @keyframes blinker {
        50% {
            opacity: 0;
        }
    }

    .blink-one {
        animation: blinker-one 1s linear infinite;
        color: #1c87c9;
        font-size: 14px;
        font-weight: bold;
        font-family: sans-serif;
    }

    @keyframes blinker-one {
        0% {
            opacity: 0;
        }
    }

    .blink-two {
        animation: blinker-two 1.4s linear infinite;
    }

    @keyframes blinker-two {
        100% {
            opacity: 0;
        }
    }
</style>
<div class="row">
    <div class="col-sm-2 col-md-2 col-lg-2">
        <div class="notice">
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
        <div class="info">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="panel panel-primary news_back">
                        <div class="panel-heading">Activity
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <button class="btn btn-danger" style="width:100%;"><a href="<?php echo base_url() ?>index.php/admission/phdpt/Adm_phdpt_registration/logout"><b style="text-decoration: none; color: white;">Logout</b></a> </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-8 col-md-8 col-lg-8">
        <div class="home">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="panel panel-primary news_back">
                        <div class="panel-heading">Ph.D. Application Status
                        </div>
                        <div class="panel-body">
                            <section>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th scope="col">SI.NO</th>
                                                    <th scope="col">Registration No.</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Program Name</th>
                                                    <th scope="col">Payment Status</th>
                                                    <th scope="col">Application Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($application)) {
                                                    $i = 1;
                                                    foreach ($application as $appl) {
                                                ?>
                                                        <tr>
                                                            <td data-label="Sl. No."><?php echo $i; ?></td>
                                                            <td data-label="Registration No."><?php echo $appl->registration_no ?></td>
                                                            <td data-label="Name"><?php echo $appl->first_name . " " . $appl->middle_name . " " . $appl->last_name; ?></td>
                                                            <td data-label="Program Name">
                                                                <?php if (!empty($program)) { ?><br>
                                                                    <ol>
                                                                        <?php foreach ($program as $prgm) { ?>
                                                                            <li>
                                                                                <?php echo $prgm->program_desc . "(" . $prgm->program_id . ")"; ?>
                                                                            </li>
                                                                        <?php } ?>
                                                                    </ol>
                                                                <?php } else { ?>
                                                                    <b>You have not yet applied for any program</b>
                                                                <?php }
                                                                ?>
                                                            </td>
                                                            <?php if ($appl->payment_status == 'Y') { ?>
                                                                <td data-label="Payment Status" style="color:green;"><?php echo "Completed" ?></td>
                                                            <?php } else { ?>
                                                                <td data-label="Payment Status" style="color:red;"><button class="btn btn-sm btn-danger"><?php echo "Not Completed"; ?></td>
                                                            <?php }
                                                            ?>
                                                            <?php if (!empty($appl->status)) { ?>
                                                                <!-- <td data-label="Application Status"><?php echo $appl->status; ?></td> -->
                                                                <td data-label="Application Status"><?php if ($appl->status == 'PD') {
                                                                                                        echo "Payment Done";
                                                                                                    } else echo $appl->status; ?></td>
                                                            <?php } else { ?>
                                                                <td data-label="Application Status"><?php echo "Not Completed"; ?></td>
                                                            <?php } ?>
                                                            <?php if ($tab_stat[0]->tab_status == 0) { ?>
                                                                <td data-label="Action"><button class="btn btn-sm">----</button></td>
                                                            <?php } else { ?>
                                                                <td data-label="Action">
                                                                    <a href="<?php echo base_url(); ?>index.php/admission/phdpt/Adm_phdpt_application_preview/application_preview" target="_blank"><button class="btn btn-sm  btn-primary">Preview</button></a><br /><br />
                                                                    <?php if($appl->registration_no=='IITISMDR2302959') {?>
                                                                        <a href="<?php echo base_url(); ?>assets/admission/phdpt/brochure/Regarding Fee Payment 2023.pdf" target="_blank"><button class="btn btn-sm btn-info">Payment Info</button></a>
                                                                    <?php } else {?>
                                                                        <a href="<?php echo base_url(); ?>index.php/admission/phdpt/Adm_phdpt_application_preview/payment_receipt"><button class="btn btn-sm btn-primary">Payment Receipt</button></a>
                                                                    <?php }?>

                                                                </td>
                                                            <?php }
                                                            ?>
                                                        </tr>
                                                <?php $i++;
                                                    }
                                                } ?>
                                            </tbody>
                                        </table>
                                        <center>
                                            <div>
                                                <?php if ($interview_count > 0) {
                                                    if (!empty($program)) {
                                                        $j = 1; ?>

                                                        <?php foreach ($program as $prgm) {

                                                            if ($prgm->admin_decision == 'CI') {
                                                        ?>
                                                                <b><?php echo  $j . ". " . $prgm->program_desc . "(" . strtoupper($prgm->program_id) . ")"; ?></b>
                                                                <p class="blink-one"><?php echo "Call For interview"; ?></p>

                                                        <?php $j++;
                                                            }
                                                        } ?>

                                                <?php }
                                                } ?>
                                            </div>
                                            <center>

                                                <?php if (!empty($program)) {
                                                    $interview = '';
                                                    $j = 1; ?>
                                                    <?php foreach ($program as $prgm) {

                                                        if ($prgm->admin_decision == 'CI') {
                                                            $interview = 'yes';
                                                    ?>



                                                    <?php $j++;
                                                        }
                                                    } ?>
                                                <?php
                                                } ?>

                                                <?php /* if(!empty($interview)){ */ 
                                            //    echo $count_ml_with_payment.'<br>';
                                            //    echo $count_payment_date_close;
                                                if ($interview_count > 0) {
                                                    if (!empty($interview)) { ?>
                                                        <div class="panel panel-primary news_back">

                                                            <div class="panel-body">
                                                                <div class="page_content">
                                                                    <p class="blink-one" style="font-size:15px;color:green;">Please Click on below Interview Call letter to Proceed</p>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                                            <!-- <button class="btn btn-info" style="width:100%;"><a href="<?php echo base_url() ?>index.php/admission/Adm_phd_application_preview/"><b style="text-decoration: none; color: white;">My Application Status</b></a> </button> -->
                                                                            <input class="btn btn-primary" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/phdpt/Adm_phdpt_application_preview/admission_interview_call_letter'" value="Interview Call Letter" />
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div> <!-- panel body end  -->
                                                        </div> <!-- panel end  -->

                                                    <?php }
                                                } elseif ($count_ml_with_payment == 0 && $count_payment_date_close == 0) { ?>

                                                    <p class="blink-one" style="font-size:15px;color:green;">Please Click on below offer letter to Proceed</p>

                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                            <!-- <button class="btn btn-info" style="width:100%;"><a href="<?php echo base_url() ?>index.php/admission/Adm_phd_application_preview/"><b style="text-decoration: none; color: white;">My Application Status</b></a> </button> -->
                                                            <input class="btn btn-info" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/phdpt/Adm_phdpt_application_preview/admission_offer_letter'" value="Offer Letter" />
                                                        </div>
                                                    </div>

                                                <?php } elseif ($count_ml_with_payment > 0 && $count_pay_ml_with_withdrawal == '') { ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-lg-12 col-sm-12">
                                                            <div class="panel panel-primary news_back">
                                                                <div class="panel-heading">PHD Admission Status
                                                                </div>
                                                                <div class="panel-body">
                                                                    <table>
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">Sl. No.</th>
                                                                                <th scope="col">Registration No.</th>
                                                                                <th scope="col">Name</th>
                                                                                <th scope="col">Selected Program Name</th>
                                                                                <th scope="col">Payment Status</th>
                                                                                <!-- <th scope="col">Application Status</th> -->
                                                                                <th scope="col">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php

                                                                            if (!empty($application)) {
                                                                                $i = 1;
                                                                                foreach ($application as $appl) {
                                                                            ?>
                                                                                    <tr>
                                                                                        <td data-label="Sl. No."><?php echo $i; ?></td>
                                                                                        <td data-label="Registration No."><?php echo $appl->registration_no ?></td>
                                                                                        <td data-label="Name"><?php echo $appl->first_name . " " . $appl->middle_name . " " . $appl->last_name; ?></td>
                                                                                        <td data-label="Program Name">
                                                                                            <?php if (!empty($selected_program_details_with_payment)) { ?><br>
                                                                                                <ol>
                                                                                                    <?php foreach ($selected_program_details_with_payment as $prgm) { ?>
                                                                                                        <li>
                                                                                                            <?php echo $prgm->program_desc . "(" . strtoupper($prgm->program_id) . ")"; ?>
                                                                                                        </li>
                                                                                                    <?php } ?>
                                                                                                </ol>
                                                                                            <?php } else { ?>
                                                                                                <b>You have not yet applied for any program</b>
                                                                                            <?php }
                                                                                            ?>
                                                                                        </td>
                                                                                        <?php if ($appl->payment_status == 'Y') { ?>
                                                                                            <td data-label="Payment Status" style="color:green;"><?php echo "Completed" ?></td>
                                                                                        <?php } else { ?>
                                                                                            <td data-label="Payment Status" style="color:red;"><button class="btn btn-sm btn-danger"><?php echo "Not Completed"; ?></td>
                                                                                        <?php }
                                                                                        ?>
                                                                                        <!-- <?php if (!empty($appl->status)) { ?>
                                    <?php if ($appl->status == 'PF') { ?>
                                        <td data-label="Application Status" style="color:yellow;">Partially Filled</td>
                                    <?php } elseif ($appl->status == 'DU') { ?>
                                        <td data-label="Application Status" style="color:blue;">Document Uploaded</td>
                                    <?php } elseif ($appl->status == 'PD') { ?>
                                        <td data-label="Application Status" style="color:green;">Applied</td>
                                    <?php } else { ?>
                                        <td data-label="Application Status" style="color:red;">Registered</td>
                                <?php }
                                                                                                } else { ?>
                                    <td data-label="Application Status" style="color:red;">Registered</td>
                                <?php } ?> -->
                                                                                        <?php if ($tab_stat[0]->tab_status == 0) { ?>
                                                                                            <td data-label="Action"><button class="btn btn-sm">----</button></td>
                                                                                        <?php } else { ?>
                                                                                            <td data-label="Action">
                                                                                                <!-- <a href="<?php echo base_url(); ?>index.php/admission/Adm_phd_application_preview/application_preview" target="_blank"><button class="btn btn-sm  btn-primary">Preview</button></a><br/><br/> -->
                                                                                                <a href="<?php echo base_url(); ?>index.php/admission/phdpt/Adm_phdpt_application_preview/payment_receipt_admission"><button class="btn btn-sm btn-info">Payment Receipt</button></a><br /><br />
                                                                                                <?php if (!empty($selected_program_details_with_payment)) { ?>
                                                                                                    <?php foreach ($selected_program_details_with_payment as $program_payment) { ?>
                                                                                                        <a href="<?php echo base_url(); ?>index.php/admission/phdpt/Adm_phdpt_application_preview/application_download_phd/<?php echo $program_payment->program_id; ?>/<?php echo $program_payment->program_desc; ?>"><button class="btn btn-sm  btn-success">Offer Letter PHD for <?php echo $program_payment->program_id;  ?></button></a><br />
                                                                                                    <?php } ?>
                                                                                                <?php }
                                                                                                ?>

                                                                                            </td>
                                                                                        <?php }
                                                                                        ?>

                                                                                    </tr>

                                                                            <?php $i++;
                                                                                }
                                                                            } ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }
                                                elseif($count_pay_ml_with_withdrawal > 0){ ?>
                                                    <h2>Admission Status : Withdrawn </h2>
                                               <?php }
                                                 elseif ($count_payment_date_close > 0) { ?>
                                                    <h2> Payment Window and Download Offer Letter Window is now closed ! </h2>
                                                <?php  } else {
                                                } ?>

                                                <?php if ($mis_reg_count > 0) {  ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-lg-12 col-sm-12">
                                                            <div class="panel panel-primary news_back">
                                                                <div class="panel-heading">PHD MIS Registration Status
                                                                </div>
                                                                <div class="panel-body">
                                                                    <table>
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">Sl. No.</th>
                                                                                <th scope="col">Registration No.</th>
                                                                                <th scope="col">Name</th>
                                                                                <th scope="col">MIS Registration Status</th>
                                                                                <!-- <th scope="col">Payment Status</th> -->
                                                                                <!-- <th scope="col">Application Status</th> -->
                                                                                <th scope="col">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php if (!empty($application)) {
                                                                                $i = 1;
                                                                                foreach ($application as $appl) {
                                                                            ?>
                                                                                    <tr>
                                                                                        <td data-label="Sl. No."><?php echo $i; ?></td>
                                                                                        <td data-label="Registration No."><?php echo $appl->registration_no ?></td>
                                                                                        <td data-label="Name"><?php echo $appl->first_name . " " . $appl->middle_name . " " . $appl->last_name; ?></td>
                                                                                        <td data-label="Mis_registration" style="color:green;">Completed</td>
                                                                                        <td data-label="Action">
                                                                                            <!-- <a href="<?php echo base_url(); ?>index.php/admission/Adm_phd_application_preview/application_preview" target="_blank"><button class="btn btn-sm  btn-primary">Preview</button></a><br/><br/> -->
                                                                                            <!-- <form action="<?php echo base_url(); ?>index.php/admission/phd/Adm_phd_mis_registration_other_details/mis_reg_stu_other_details_preview" id="mis_reg_submit"> -->
                                                                                            <button type="button" class="btn btn-sm btn-info" value="MIS Registration Details" id="mis_registration_details">MIS Registration Details</button><br />
                                                                                            <!-- </form> -->
                                                                                        </td>
                                                                                    <?php }
                                                                                    ?>

                                                                                    </tr>

                                                                                <?php $i++;
                                                                            }
                                                                                ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                                        <?php } else { ?>




                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                                            <!-- <button class="btn btn-info" style="width:100%;"><a href="<?php echo base_url() ?>index.php/admission/Adm_phd_application_preview/"><b style="text-decoration: none; color: white;">My Application Status</b></a> </button> -->
                                                            <?php if ($allowed_mis_reg_count > 0) { ?>
                                                                <p class="blink-one" style="font-size:15px;color:green;">Please Click Below To Proceed With MIS Registrations</p>
                                                                <input class="btn btn-info" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/phd/Adm_phd_mis_registration/proceed_with_registration'" value="MIS Registration" />
                                                            <?php } else { ?>
                                                                <!-- <h2> MIS Registration Closed !</h2> -->
                                                            <?php } ?>
                                                        </div>
                                                    </div>

                                                <?php } ?>
                                                <!-- <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">Candidates can now check their admission status.</marquee> -->
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="notice">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary news_back">
                        <!-- <div class="panel-heading">Notics
                        </div>
                        <div class="panel-body">
                            <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">Candidates can now check their admission status.</marquee>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $("#mis_registration_details").click(function() {
            window.location.href = "<?php echo base_url(); ?>index.php/admission/phdpt/Adm_phdpt_mis_registration_other_details/mis_reg_stu_other_details_preview";
        });
    </script>
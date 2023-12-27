<head>
    <title>Ph.D. Application</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
    body {
        font-family: Verdana, dejvu sans, sans-serif;
        font-size: 1rem;
        page-break-inside: avoid;

        <?php if ($print=='Y') {
            ?>font-size: 0.625rem;
            <?php
        }

        ?>
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
        font-size: 1.475rem;
    }

    .imagephoto {
        height: auto;
        width: 7.875rem;
    }

    .imgsig {
        height: 1.875rem;
        width: 7.875rem;
    }

    .imageqr {
        height: 114px;
        width: 120px;
        padding-top: 1px;
        padding-bottom: 1px;
    }

    .ex1 {
        text-align: justify;
        page-break-inside: avoid;
        padding: 1px 3px;
    }

    .ex2 {
        text-align: justify;
        page-break-after: always;
        padding: 1px 3px;
    }

    table,
    th,
    td {
        padding: 1px;
        page-break-inside: avoid;
    }

    .phd {
        border: 1px solid black;
        border-collapse: collapse;
        border-spacing: 0;
        page-break-inside: avoid;
    }

    .phd td,
    th {
        border: 1px solid black;
    }

    .phd th {
        border: 1px solid black;
        text-align: justify;
    }

    .phd-nb {
        border: none;
        width: 100%;
        page-break-inside: avoid;
    }

    .phd-nb td,
    th {
        border: none;
        vertical-align: top;
    }

    .phd-nb td ul li {
        margin-top: 20px !important;
    }
    </style>
</head>

<body>
    <div class="page" width="8.3 inches" height="11.7 inches" align="center">
        <table class="phd-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <tr>
                <td align="center" style="width:10%">
                    <!--<td style="width:10%" align="center">-->
                    <img class="imageqr" src="<?php echo base_url(); ?>assets/img/ismlogo.png" />
                </td>
                <td class="headingforms" style="width:80%" align="center">
                    <b>ADMISSION CELL (PG-Ph.D.)</b><br />
                    <b>INDIAN INSTITUTE OF TECHNOLOGY (INDIAN SCHOOL OF MINES)</b><br />
                    <hr />
                    <hr />
                </td>
                <!-- </td> -->
                <!-- <td class="headingforms" style="width:80%;color:4472C4;" align="center">
                <b>भारतीय प्रौद्योगिकी संस्थान (भारतीय खनि विद्यापीठ) धनबाद</b><br/>
                <b>Indian Institute of Technology (Indian School of Mines) Dhanbad</b>
                </td> -->

            </tr>
        </table>

        <table class="phd-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <!-- <tr>
                <td> Registration No. - <?php echo $application[0]->registration_no; ?></td>
            </tr> -->
            <tr>
                <td>
                    Name -
                    <?php $candidate_name = '';
                    if (!empty($application[0]->first_name)) {
                        $candidate_name .= $application[0]->first_name . ' ';
                    } else {
                        $candidate_name .= '';
                    }
                    if (!empty($application[0]->middle_name)) {
                        $candidate_name .= $application[0]->middle_name . ' ';
                    } else {
                        $candidate_name .= '';
                    }
                    if (!empty($application[0]->last_name)) {
                        $candidate_name .= $application[0]->last_name . ' ';
                    } else {
                        $candidate_name .= '';
                    }

                    ?>
                    <?php if (!empty($candidate_name)) {
                        echo $salutation.' '.$candidate_name .'('.$application[0]->registration_no.')'.'  -  '.$application[0]->email;
                    } else {
                        echo "";
                    } ?>
                </td>
            </tr>
            <tr>
                <td>
                    Category - <?php echo $category; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <!-- Program - <?php echo $program_id . " (" . $program_desc . ")"; ?> -->
                    Program - <?php echo $program_id ; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Department - <?php echo $department; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php if ($fellowtype != '' && $fellowtypedesc != '') { ?>
                    Type of Fellowship - <?php echo $fellowtype . " (" . $fellowtypedesc . ")"; ?>
                    <?php  } else { ?>
                    Type of Fellowship - NA
                    <?php } ?>

                </td>

            </tr>
        </table>



        <table class="phd-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
                <td> Dear Candidate, </td>
            </tr>
        </table>


        <table class="phd-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
                <td>
                Congratulations on being provisionally selected for admission to Ph.D. program in the Department of Electronics Engineering of IIT (ISM) Dhanbad under the Visvesvaraya PhD scheme!
                </td>
            </tr>
        </table>


        <table class="phd-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
                <td>

                    <ul style="list-style:none;">
                    <li><p class="ex1">1. The selection and the offer of admission is purely provisional and subject to
                            verification of your original documents during the physical registration at the IIT (ISM)
                            Dhanbad campus on <b><?php echo date('d.m.Y', strtotime($doc_verification_date)) ?></b>.<b><span style="color:blue;">Please note that failure to report in person for admission / submit the required documents by the scheduled date will lead to automatic cancellation of this offer.</span></b>
                                </p>

                                <p class="ex1">
                                You are requested to confirm the acceptance of the provisional offer by paying the
                                registration fee of <b><span style="color:blue;">Rs. 64450/- (For GEN/OBC-NCL/EWS) and Rs. 58450/-
                                    (For SC/ST/PwD candidates</span></b>) through the online payment link sent to you from <b><span style="color:blue;"><u><?php echo date('F d, Y', strtotime($start_date)); ?> to
                                        <?php echo date('F d, Y', strtotime($end_date)); ?></u></span></b>. Above fee is inclusive
                                    of mess fee of Rs. 18000/- per semester. The link for fee payment will be sent to you separately via email. Please reply to the email as soon as possible to acknowledge receipt of the email.
                                </p>

                                <p class="ex1">Failure to pay the registration fee by <u>Dec 04, 2023</u> will make you ineligible for Ph.D. admission. <u>Any communication / request / recommendations, whatsoever in this regard, will not be entertained beyond the given deadline (Feb 13, 2023).</u></p>

                                </li>

                                <li>2. IIT (ISM) Dhanbad will not be responsible for any unforeseen events, like, non-availability of internet connection, problems with the payment portal, natural calamity, etc. for the failure in payment of registration fee by <span style="color:blue;">Dec 04, 2023</span>.

                                </li>

                                <li>3. After acceptance of the offer, you will be intimated with the details of admission procedure which include physical document verification process, physical reporting time, venue, etc. which is presently scheduled at <span style="color:blue;">12.12.2023</span>.

                                </li>

                                <li>4. Candidates working in Govt./Pvt. Organizations must submit the NOC / acceptance of resignation letter from their employer for the Ph.D. admission by the date of the physical registration at IIT (ISM) Dhanbad.

                                </li>

                                <li>5. Candidates taking admission are required to abide by the rules and regulations laid down in the Ph.D. manual of IIT(ISM) and any other rules promulgated by the institute as and when they are notified.

                                </li>

                                <li>6. <u>It may please be noted that any wrong information or insufficient supporting documents may lead to the cancellation of candidature and no correspondence will be entertained in this regard.</u>

                                </li>

                                <li>
                            7. <b><span style="color:blue;">Publication of results, appearance of name in the merit list or payment of
                                registration fee does not confer any right to the candidate for Ph.D. admission. Final
                                admission is subject to the <u>PHYSICAL</u> verification of
                                certificates / documents / medical requirements for the program etc. and will be subject
                            to production of the following requisite documents for verification of the fulfilment of the
                            eligibility criteria:</span></b>

                            <ul style="list-style:none;">

                            <li>
                                (a) Copy of the INTERVIEW CALL LETTER.
                            </li>

                            <li>
                                (b) Copy of this Offer Letter.
                            </li>

                    </ul>


                        </li>



                            <!-- <p class="ex1">Failure to pay the registration fee by <u>Dec 04, 2023</u> will make you ineligible for Ph.D. admission. <u>Any communication/request/recommendations, whatsoever in this regard, will not be entertained beyond the given deadline (Feb 13, 2023).</u></p> -->



                    <!-- </li>
                    </ul> -->
                    </td>
            </tr>
        </table>

        <p class="ex2"></p>
        <table class="phd-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <tr>
                <td align="center" style="width:10%">
                    <!--<td style="width:10%" align="center">-->
                    <img class="imageqr" src="<?php echo base_url(); ?>assets/img/ismlogo.png" />
                </td>
                <td class="headingforms" style="width:80%" align="center">
                    <b>ADMISSION CELL (PG-Ph.D.)</b><br />
                    <b>INDIAN INSTITUTE OF TECHNOLOGY (INDIAN SCHOOL OF MINES)</b><br />
                    <hr />
                    <hr />
                </td>
                <!-- </td> -->
                <!-- <td class="headingforms" style="width:80%;color:4472C4;" align="center">
                <b>भारतीय प्रौद्योगिकी संस्थान (भारतीय खनि विद्यापीठ) धनबाद</b><br/>
                <b>Indian Institute of Technology (Indian School of Mines) Dhanbad</b>
                </td> -->

            </tr>
        </table>

        <table class="phd-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
                <td>

                        <ul style="list-style:none;">

                        <li>

                        <ul style="list-style:none;">

                            <li>
                                (c) Copy of the fee payment receipt obtained at the acceptance of this Offer.
                            </li>

                            <li>
                                (d) One set of <b><span style="color:blue;">self-attested copies</span></b> (both sides wherever applicable) <b><span style="color:blue;">along with
                                    the originals</span></b> of all the following documents:
                            </li>
                            <ul style="list-style:none;">
                                <li>
                                    (i) Secondary / Matriculation / High School (10<sup>th</sup> level) Certificate (<b><span style="color:green;">for the proof of
                                        date of birth</span></b>). In case, this certificate does not bear the date of birth,
                                    the original birth certificate indicating date of birth must be produced at the time
                                    of admission.
                                </li>

                                <li>
                                    (ii) Higher Secondary / Intermediate (12<sup>th</sup> level) Marks-Sheet (<b><span style="color:green;">for checking of
                                        subjects</span></b>)
                                </li>

                                <li>
                                    (iii) Qualifying Degree <b><span style="color:green;">Marks-Sheet / Grade Card</span></b> (7<sup>th</sup> semester / pre-final year
                                    marks-sheet for the ‘appearing candidates’ whose final semester / final year results
                                    are awaited).
                                </li>

                                <li>
                                    (iv) GATE / NET and other required score card as proof of
                                    Qualifying Examination as claimed in the application form.
                                </li>

                                <li>
                                    (v) Mark sheet and Certificate for qualifying degree as claimed in the application
                                    form.
                                </li>

                                <li>
                                    (vi) <b><span style="color:blue;">A Medical Fitness certificate from Govt. Hospital as given in
                                    Annexure-I; in original.</span></b>
                                </li>

                                <li>
                                    (vii) Caste certificate – applicable only for SC/ST/OBC-NCL candidates. <b><span style="color:blue;">The
                                    OBC-NCL certificate should be as</span> the Central Government format and should
                                    have been issued on or after April 01, 2022</b>.
                                </li>

                                <li>
                                    (viii) Relevant certificate for the candidates in the sub-category (EWS/PwD). <b><span style="color:green;">EWS
                                        certificate</span></b> should have been issued on or after <b><span style="color:green;">April 01, 2022</span></b> (in
                                    the Central Government format).
                                </li>
                            </ul>

                            <li>
                                (e) Migration Certificate / College Leaving Certificate in Original.
                            </li>

                            <li>
                                (f) 4 passport size and 4 stamp size color photographs.

                            </li>

                    </ul>




                                <p class="ex1">
                                    <!-- <b>Failure to submit any of the above mentioned documents at the time of reporting, or if permitted, by September 01, 2022, the provisional admission, if done, will be cancelled by the Institute without any further notice.</b> -->
                                    <b><span style="color:blue;">FAILURE TO PRODUCE RELEVANT DOCUMENTS AT THE TIME OF REPORTING WILL LEAD TO CANCELLATION OF THE PROVISIONAL ADMISSION BY THE INSTITUTE WITHOUT ANY FURTHER NOTICE.</span></b>
                                </p>

                                <!-- <p class="ex1"> -->
                                    <!-- <b>Failure to submit any of the above mentioned documents at the time of reporting, or if permitted, by September 01, 2022, the provisional admission, if done, will be cancelled by the Institute without any further notice.</b> -->
                                    <!-- <b><span style="color:red;">IT IS IMPORTANT FOR THE 'APPEARING CANDIDATES' TO NOTE THAT THEIR ADMISSION WILL BE PROVISIONAL WHICH WILL BE CONFIRMED ONLY AFTER SUBMISSION OF FINAL SEMESTER/FINAL YEAR MARKS-SHEET/GRADE-CARD
                                        OF QUALIFYING DEGREE AND COLLEGE LEAVING CERTIFICATE/MIGRATION CERTIFICATE IN ORIGINAL LATEST BY SEPTEMBER 01,2023. SUCH CANDIDATES WILL NOT BE ENTITLED FOR ANY SCHOLARSHIP TILL CONFIRMATION OF THEIR ADMISSION
                                        , IF OTHERWISE ELIGIBLE. FAILURE TO SUBMIT THE REQUISITE DOCUMENT BY THE STIPULATED DATE WILL LEAD TO CANCELLATION OF ADMISSION OF ALL SUCH CANDIDATES AND NAMES OF ALL SUCH CANDIDATES WILL BE DELETED FROM THE ROLLS
                                     OF THE INSTITUTE W.E.F SEPTEMBER 02, 2023 WITHOUT FURTHER NOTICE. IN SUCH CASES THE CANDIDATE WILL BE REFUNDED ONLY THE CAUTION MONEY COMPONENT OF THE FEE DEPOSITED AT THE TIME OF PROVISIONAL ADMISSION</span></b>
                                </p> -->

                                <p class="ex1">
                                    <!-- <b>Failure to submit any of the above mentioned documents at the time of reporting, or if permitted, by September 01, 2022, the provisional admission, if done, will be cancelled by the Institute without any further notice.</b> -->
                                    <b><span style="color:red;">IIT(ISM), DHANBAD RESERVES THE RIGHT TO RECTIFY ANY INADVERTENT ERRORS / MISTAKES AT ANY STAGE OF PH.D ADMISSION PROCESS.</span></b>
                                </p>

                                <!-- <p class="ex1">
            It is IMPORTANT for <b><u>‘Appearing candidates’</u></b> to note that their admission will be provisional and will be confirmed only after submission of Final semester/Final year marks-sheet/grade-card of qualifying degree and college leaving certificate/migration certificate in original, <b>latest by September 01, 2022</b>.  Such candidates will not be entitled for any Fellowship, till confirmation of their admission, even if otherwise eligible.  Failure to submit the requisite document by the stipulated date will lead to cancellation of admission of all such candidates and names of all such candidates will be deleted from the rolls of the Institute w.e.f. <b>September 02, 2022</b> without further notice. In such cases, the candidate will be refunded only the Caution Money component of the fee deposited at the time of provisional admission.
            </p> -->
                            </li>
                        </ul>

                </td>
            </tr>
        </table>

        <p class="ex2"></p>
        <table class="phd-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <tr>
                <td align="center" style="width:10%">
                    <!--<td style="width:10%" align="center">-->
                    <img class="imageqr" src="<?php echo base_url(); ?>assets/img/ismlogo.png" />
                </td>
                <td class="headingforms" style="width:80%" align="center">
                    <b>ADMISSION CELL (PG-Ph.D.)</b><br />
                    <b>INDIAN INSTITUTE OF TECHNOLOGY (INDIAN SCHOOL OF MINES)</b><br />
                    <hr />
                    <hr />
                </td>

            </tr>
        </table>

        <table class="phd-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
                <td>

                    <ul style="list-style:none;">

                        <li>
                            8. <b>Withdrawal and refund of admission fee :</b>
                            <p class="ex1">
                                <!-- <b>Failure to submit any of the above mentioned documents at the time of reporting, or if permitted, by September 01, 2022, the provisional admission, if done, will be cancelled by the Institute without any further notice.</b> -->
                                After the provisional admission, a candidate may withdraw his/her admission	before scheduled date of start of the semester.Withdrawal may be requested to AR (Admissions)
                                at <b>aradm@iitism.ac.in</b> by e-mail from the registered email Id of the candidate.
                            </p>

                            <ul style="list-style:none;">

                                <li>
                                    (a) If a candidate withdraws the offer of admission within five days after the last
                                    date of admission for the round in which she / he was admitted, the entire fee
                                    collected from the candidate will be refunded after a deduction of processing fee of
                                    Rs.2000/-.


                                </li>

                                <li>

                                    (b) If a candidate withdraws the offer of admission after five days from the last
                                    date of admission for the round in which she / he was admitted, she / he will be
                                    refunded only the caution money and advance hostel mess fee, if any.


                                </li>

                            </ul>

                        </li>
                    </ul>

                </td>
            </tr>
        </table>


        <table class="phd-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>

                <td style="text-align:right; padding-top:5%;">
                    <b>Assistant Registrar (Admissions)</b>
                    <br>
                    <b>IIT(ISM) Dhanbad</b>
                </td>
            </tr>
        </table>

        <p class="ex2"></p>
        <table class="phd-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <tr>
                <td align="center" style="width:10%">
                    <!--<td style="width:10%" align="center">-->
                    <img class="imageqr" src="<?php echo base_url(); ?>assets/img/ismlogo.png" />
                </td>
                <td class="headingforms" style="width:80%" align="center">
                    <b>ADMISSION CELL (PG-Ph.D.)</b><br />
                    <b>INDIAN INSTITUTE OF TECHNOLOGY (INDIAN SCHOOL OF MINES)</b><br />
                    <hr />
                    <hr />
                </td>
                <!-- </td> -->
                <!-- <td class="headingforms" style="width:80%;color:4472C4;" align="center">
                <b>भारतीय प्रौद्योगिकी संस्थान (भारतीय खनि विद्यापीठ) धनबाद</b><br/>
                <b>Indian Institute of Technology (Indian School of Mines) Dhanbad</b>
                </td> -->

            </tr>
        </table>

        <table class="phd-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
                <td align="right">
                    <b><u>ANNEXURE - I</u></b>
                </td>
            </tr>
        </table>

        <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
                <td style="text-align:center;">
                    <p><b>MEDICAL FITNESS CERTIFICATE OF APPLICANT</b></p>
                    <p><b>FOR ADMISSION to Ph.D. AT IIT(ISM) DHANBAD</b></p>
                    <p><b><small>(To be provided by a Chief Medical Officer (CMO) or Equivalent of a Government
                                Hospital)</small></b></p>
                </td>
            </tr>
        </table>

        <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
                <td>
                    I, Dr…………………………………………… after examining (with necessary investigations) Mr./Ms………………………………………….
                    Son/Daughter of Mr./Mrs.……..……..…………..………..
                    born on…………………………………… , certify that he/she has fairly sound constitution, and that he/she has no
                    disease or physical or mental infirmity unfitting him/her now, or likely to unfit him/her in future,
                    for active outdoor work as practical Engineer/Technologist which involves considerable fatigue and
                    exposure.

                </td>
            </tr>
        </table>

        <table class="phd-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
                <td>
                    <ul style="list-style:none;">
                        <li>
                            <p>The following are the results of tests, measurements, etc.:-</p>
                        </li>
                        <ul style="list-style:none;">
                            <li>
                                <p>
                                    1. Mark of identification
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    :
                                </p>
                            </li>
                            <li>

                                <p>
                                    2. Weight
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    :
                                </p>

                            </li>

                            <li>

                                <p>
                                    3. Height (in cm)
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    :
                                </p>

                            </li>

                            <li>

                                <p>
                                    4. Blood Pressure
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                </p>

                            </li>

                            <li>

                                <p>
                                    5. Pulse rate (beats/min)
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                </p>

                            </li>

                            <li>


                                <p>
                                    6. Blood Group
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                                </p>

                            </li>

                            <li>

                                <p>
                                    7. Abuse of substances (if any)
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                                    &nbsp;&nbsp; Smoking / Alcohol / Drugs / Any other
                                </p>

                            </li>

                            <li>

                                <p>
                                    8. Chest measurements
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    : &nbsp;&nbsp; Contracted : .............cm Expanded :.............cm
                                </p>

                            </li>

                        </ul>
                </td>

            </tr>

        </table>


        <p class="ex2"></p>
        <table class="phd-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <tr>
                <td align="center" style="width:10%">
                    <!--<td style="width:10%" align="center">-->
                    <img class="imageqr" src="<?php echo base_url(); ?>assets/img/ismlogo.png" />
                </td>
                <td class="headingforms" style="width:80%" align="center">
                    <b>ADMISSION CELL (PG-Ph.D.)</b><br />
                    <b>INDIAN INSTITUTE OF TECHNOLOGY (INDIAN SCHOOL OF MINES)</b><br />
                    <hr />
                    <hr />
                </td>
                <!-- </td> -->
                <!-- <td class="headingforms" style="width:80%;color:4472C4;" align="center">
                <b>भारतीय प्रौद्योगिकी संस्थान (भारतीय खनि विद्यापीठ) धनबाद</b><br/>
                <b>Indian Institute of Technology (Indian School of Mines) Dhanbad</b>
                </td> -->

            </tr>
        </table>


        <table class="phd-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>

            <tr>

                <td>

                    <ul style="list-style:none;">



                        <li>

                            <p>
                                9. Vision &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp; Right Eye :&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; Near :&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
                                Distant:
                            </p>

                        </li>

                        <li>

                            <p>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                : &nbsp;&nbsp; Left Eye :&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;Near :&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;   Distant:
                            </p>

                        </li>

                        <li>
                            <p>
                                10. Colour Blindness, congenital or other disease of eye (if any):
                            </p>
                        </li>

                        <li>

                            <p>
                                11. Hearing &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; :
                                &nbsp;&nbsp; Right ear : GOOD / FAIR / POOR
                            </p>

                        </li>

                        <li>

                            <p>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                : &nbsp;&nbsp; &nbsp;Left ear &nbsp;: GOOD / FAIR / POOR
                            </p>

                        </li>
                        <li>

                            <p>

                                12. X-ray PA view of chest with proper identification mark : Satisfactory / Not
                                satisfactory

                            </p>

                        </li>

                        <li>

                            <p>

                                If not satisfactory, then specify why :

                            </p>

                        </li>

                        <li>
                            <p>
                                13. If any other abnormality noticed :

                            </p>

                        </li>

                        <li>

                            <p>
                                14. Remarks / Special Recommendations, if any :
                            </p>
                        </li>

                    </ul>

                    </ul>
                </td>

            </tr>

        </table>

        <table class="phd-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>

            <tr>

                <td>
                    <p>
                        <b>Conclusion</b>: Certified that the above-mentioned student is free of any communicable
                        disease and fit to stay in hostels provided by IIT(ISM) Dhanbad and attend classes with
                        co-students.
                    </p>

                    <p>
                        Date :
                    </p>

                    <p>
                        Place :
                    </p>

                    <p>
                        (Signature and Seal)
                    </p>

                    <p>

                        <b>Declaration by the candidate</b> : I declare that all the statements above are true and
                        correct to the best of my knowledge. I fully understand that I am responsible for the accuracy
                        of all statements given.
                    </p>

                    <p style="padding-top:5%;">
                        <b>Candidate’s Signature with date</b> :

                    </p>

                </td>

            </tr>

        </table>




    </div>
</body>

</html>
<head>
    <title>Ph.D Application</title>
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
        padding: 1px 2px;
    }

    .ex2 {
        text-align: justify;
        page-break-after: always;
        padding: 1px 2px;
    }

    table,
    th,
    td {
        padding: 1px;
        page-break-inside: avoid;
    }

    .mtech {
        border: 1px solid black;
        border-collapse: collapse;
        border-spacing: 0;
        page-break-inside: avoid;
    }

    .mtech td,
    th {
        border: 1px solid black;
    }

    .mtech th {
        border: 1px solid black;
        text-align: justify;
    }

    .mtech-nb {
        border: none;
        width: 100%;
        page-break-inside: avoid;
    }

    .mtech-nb td,
    th {
        border: none;
        vertical-align: top;
    }

    .mtech-nb td ul li {
        margin-top: 20px !important;
    }
    </style>
</head>

<body>
    <div class="page" width="8.3 inches" height="11.7 inches" align="center">
        <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <tr>
                <td align="center" style="width:10%">
                    <!--<td style="width:10%" align="center">-->
                    <img class="imageqr" src="<?php echo base_url(); ?>assets/img/ismlogo.png" />
                </td>
                <td class="headingforms" style="width:80%" align="center">
                    <b>ADMISSION CELL (PG-Ph.D.)</b><br />
                    <b>INDIAN INSTITUTE OF TECHNOLOGY (INDIAN SCHOOL OF MINES) DHANBAD</b><br />
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

        <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
                <td> Registration No. :- <?php echo $application[0]->registration_no; ?></td>
            </tr>
            <tr>
                <td>
                    Name :-
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
                        echo $candidate_name;
                    } else {
                        echo "";
                    } ?>
                </td>
            </tr>
            <tr>
                <td>
                    Program :- <?php echo $program_id . "(" . $program_desc . ")"; ?>
                </td>
            </tr>
        </table>



        <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
                <td> Dear Candidate, </td>
            </tr>
        </table>


        <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
                <td>
                    Congratulations on being shortlisted for the Interview process for admission to Ph.D. program(s) of
                    IIT (ISM) Dhanbad. The interview for the Ph.D. admission 2022 (Phase II) is scheduled to be held
                    from <span style="color:red;"><b>13.12.2022 & 14.12.2022 except for the Department of Chemical
                            Engineering which will be held on 08.12.2022 </b></span><span
                        style="color:blue;"><b>(Department-wise specific dates are available on the Ph.D Admission
                            portal of IIT (ISM) Dhanbad).</b></span><b>The exact date, time and venue of the interview
                        will be intimated to you by the concerned department in due course</b>.
                </td>
            </tr>
        </table>

        <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
                <td>
                    <u><b>The interview will be conducted physically in the campus (Offline).</b></u> You are
                    requested to be present for the interview on the scheduled date and time at the respective
                    department in the campus. <u><b>The respective
                            departments will provide the details of the interview.</b></u>
                </td>
            </tr>
        </table>

        <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <!-- <p class="ex1"></p> -->
            <tr>
                <td>
                    You are requested to keep the originals of the following documents ready for verification purposes.
                </td>
            </tr>
        </table>


        <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <!-- <p class="ex1"></p> -->
            <tr>

                <td>

                    <ul style="list-style:none;">
                        <li>1. <b>INTERVIEW CALL LETTER.</b></li>
                        <li>2. <b>PDF of the Application Form as downloaded from the Admission portal. </b></li>
                        <li>3. <b>All the supporting/relevant documents</b> of their claim as given in the application
                            form:</li>
                        <ul style="list-style:none;">
                            <li>
                                a. A Photo identity card (Aadhar/PAN, etc)
                            </li>
                            <li>
                                b. Proof of date of birth.
                            </li>
                            <li>
                                c. Educational qualifications (PG, UG, XII, X).
                            </li>
                            <li>
                                d. Eligibility of qualifying examination. Appearing candidates may keep certificates up
                                to the previous exam.
                            </li>
                            <li>
                                e. Proof of OGPA/CGPA.
                            </li>
                            <li>
                                f. Caste certificate wherever applicable:
                            </li>
                            <ul style="list-style:none;">
                                <li>i. OBC Non-creamy layer certificate issued on or after <b>01 April, 2021 in Central
                                        Government format.</b></li>
                                <li>
                                    ii. Authentic certificate for SC/ST/Physically Challenged claim issued recently and
                                    approved by competent authority.
                                </li>
                                <li>
                                    iii. EWS certificate issued on or after <b>01 April, 2021 in Central Government
                                        format.</b>
                                </li>
                            </ul>
                            <li>
                                g. Original GATE certificate for GATE candidates with GATE score at the time of
                                application.
                            </li>
                            <li>
                                h. Proof of Experience.
                            </li>
                            <li>
                                i. NOC from Employer.
                            </li>
                            <li>
                                j. Original NET certificate for NET candidates.
                            </li>
                            <li>
                                k. Any other relevant document in support of their claim.
                            </li>
                            <li>
                                l. If the department that you have applied to, requires a No Colour Blindness
                                certificate, please arrange for the same from a registered Medical Practitioner.
                            </li>

                        </ul>
                </td>
            </tr>
        </table>

        <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%;" align="center">
            <p class="ex1"></p>
            <tr>
                <td style="color:blue;">
                    <u><b>You are requested to make arrangements for to and fro travel and your accomodation
                            arrangements on your own. No TA/DA will be provided by IIT(ISM) Dhanbad.</b></u>
                </td>
            </tr>
        </table>

        <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%;" align="center">
            <p class="ex1"></p>
            <tr>
                <td style="color:red;">
                    <b>Note: Publication of the interview list and Call to the Interview does not confer any right for
                        selection/appointment and is subjected to the verification of original certificates/document
                        supporting the candidature during the Physical Registration Process to be held during the
                        Physical reporting at the IIT (ISM) Dhanbad Campus. IIT(ISM) Dhanbad, reserves the right to
                        rectify any inadvertent error or typographical mistake or technical error at any later stage.
                    </b>
                </td>
            </tr>
        </table>

        <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>

                <td style="text-align:right">
                    AR (Admissions)
                    <br>
                    IIT(ISM) Dhanbad
                </td>
            </tr>
        </table>


    </div>
</body>

</html>
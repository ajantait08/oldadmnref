<head>
    <title>MTECH Application</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        body {
            font-family: Verdana, dejvu sans, sans-serif;
            font-size: 1rem;
            page-break-inside: avoid;
            <?php if ($print == 'Y') { ?>font-size: 0.625rem;
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

        .mtech-nb td ul li{
            margin-top:20px !important;
        }

        hr {
        position: relative;
        top: 20px;
        border: none;
        height: 12px;
        background: #800000;

    }

    .new {
        position: relative;
        border: none;
        height: 5px;
        background: #800000;

    }

    </style>
</head>

<body>
    <div class="page" width="8.3 inches" height="11.7 inches" align="center">
        <!-- <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <tr>
                <td align="center" style="width:100%"> -->
                    <p>
                    <img class="imageqr" src="<?php echo base_url(); ?>assets/images/ism/iitism_transcript.jpg" style="width:80%;height:10%;"/>
                    </p>
                <!-- </td> -->
                <!-- <td class="headingforms" style="width:80%;color:4472C4;" align="center">
                <b>भारतीय प्रौद्योगिकी संस्थान (भारतीय खनि विद्यापीठ) धनबाद</b><br/>
                <b>Indian Institute of Technology (Indian School of Mines) Dhanbad</b>
                </td> -->

             <!-- </tr> -->
                </table>

                <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
                <p class="ex1"></p>
                <tr>
                <td colspan='2'>
                 No. Acad/605001/M.Tech. 2022 Adm./<?php echo $application[0]->registration_no; ?>
                </td>
                <td>

                 Date : <?php echo date('jS F Y',strtotime($selected_payment_details[0]->start_date)); ?>
                </td>
            </tr>
            </table>

                <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
             <tr>
                 <td> To, </td>
             </tr>
            </table>
            <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
             <tr>
                 <td>
                     <?php $candidate_name = '';
                        if(!empty($application[0]->first_name)){
                         $candidate_name .= $application[0]->first_name.' ';
                        } else { $candidate_name .= '';  }
                        if(!empty($application[0]->middle_name)){
                         $candidate_name .= $application[0]->middle_name.' ';
                         } else { $candidate_name .= '';  }
                         if(!empty($application[0]->last_name)){
                         $candidate_name .= $application[0]->last_name.' ';
                         } else { $candidate_name .= '';  }

                          ?>
                     <?php if(!empty($candidate_name)){ echo '<b>'.$candidate_name.'</b>'.','; } else { echo "";} ?> &nbsp; <?php if(!empty($application[0]->registration_no)){ echo '<b>'.$application[0]->registration_no.'</b>'.' , '; } else { echo "";} ?> &nbsp;
                     <?php if(!empty($application[0]->email)){ echo '<b>'.$application[0]->email.'</b>'; } else { echo "";} ?>
                 </td>
             </tr>
            </table>

            <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td>
            Sub: Offer for provisional admission to 2 Year M. Tech. in <?php echo $program_desc; ?>.
            </td>
            </tr>
           </table>

           <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td>
            Dear candidate,
            </td>
            </tr>
           </table>

           <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td>
            This is to inform you that on the basis of your online application form and acceptance on COAP website, you have been <b>provisionally</b> selected for admission to the 2 year M.Tech. in (<?php echo $program_desc; ?>) at the Indian Institute of Technology (Indian School of Mines), Dhanbad.
            </td>
            </tr>
           </table>

           <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td>
            For acceptance of this offer, you are required to pay the applicable fee amount which is  Rs.56,470/- for GEN/OBC/EWS students and Rs. 41,470/- for SC/ST/PwD students. (The fee amount includes a mess fee advance of Rs.15,000/- for Monsoon Semester.)
            </td>
            </tr>
           </table>

           <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td>
            The applicable fee amount needs to be paid necessarily through the IIT(ISM) online application portal between <b><?php echo date('d M Y',strtotime($selected_payment_details[0]->start_date)); ?></b> to <b><?php echo date('d M Y',strtotime($selected_payment_details[0]->end_date)); ?></b> for acceptance of this offer for the provisional admission. Please follow the following instructions to pay the fees online:
            <br>

            <ul style="list-style:none;">

                <li>
                1.	Login to <a href="https://admission.iitism.ac.in/index.php/admission/mtech">https://admission.iitism.ac.in/index.php/admission/mtech</a> using your IITISM registration number and credential
                </li>
                <li>
                2.	After login, offer letter can be viewed in the dashboard and proceed for payment.
                </li>
                <li>
                3.	Please select the SBI payment gateway and press “Proceed to payment”.
            </li>
            <li>
            4.	Please keep a copy of Order No. for further reference. Click on “Pay Now” button and you will be navigated to the payment gateway page.
            </li>
            <li>
            5.	Once “Pay Now” is clicked, the system will take to Epay site of SBI Payment gateway
            </li>
            <li>
            6.	Once payment is done, Payment receipt will be displayed. Please keep the payment receipt for future use. Click on the “Close” button
            </li>
            <li>
            7.	You will be navigated to application dashboard where you can download the payment receipt and offer letter.
            </li>

            </ul>
            </td>
            </tr>
           </table>

           <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td>
            Please note that timely payment of fees is just one of the prerequisites and does not ensure a confirmed admission to the candidate.  After the successful payment of fee all such candidates will be required to <b>report for admission in person on August 4, 2022</b>(Thursday), or at a later date as decided by the Institute, at Indian Institute of Technology (Indian School of Mines), Dhanbad along with all the required documents. Please note that failure to submit the applicable fee amount /<u>report in person for admission</u>/ submit the required documents by the scheduled date, will lead to automatic cancellation of this offer.
            </td>
            </tr>
            </table>

            <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td>
            The final admission will be subject to production of the following requisite documents for verification of the fulfilment of the eligibility criteria:
            </td>
            </tr>
            </table>

                <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td>
            <ul style="list-style:none;">
                <li>
                a)	Copy of the online application form.
            </li>
            <li>
            b)	Copy of this seat allotment letter.
            </li>
            <li>
            c)	Copy of the fee payment receipt obtained at the acceptance of this Offer.
            </li>
            <li>
            d)	One set of <b>self-attested copies</b> (both sides wherever applicable) <b>along with the originals</b> of all the following documents:
            </li>
            <ul style="list-style:none;">
                <li>
                i)	Secondary/Matriculation/High School (10th level) Certificate (<b>for the proof of date of birth</b>). In case, this certificate does not bear the date of birth, the original certificate indicating date of birth must be produced at the time of admission.
            </li>

            </ul>
            </td>
            </tr>

            </table>

           <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td>
            <hr />
            <hr class="new" />
            </td>
            </tr>

            </table>

            <br>

            <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td>
            IIT(ISM): 2 Year M. Tech Admission 2021	Page 1
            </td>
            </tr>
            </table>



            <p class="ex2"></p>


            <!-- <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <tr>
                <td style="width:10%" align="center">
                    <img class="imageqr" src="<?php echo base_url(); ?>assets/img/ismlogo.png" />
                </td>
                <td class="headingforms" style="width:80%;color:4472C4;" align="center">
                <b>भारतीय प्रौद्योगिकी संस्थान (भारतीय खनि विद्यापीठ) धनबाद</b><br/>
                <b>Indian Institute of Technology (Indian School of Mines) Dhanbad</b>
                </td>

             </tr>
                </table> -->

                    <p>
                    <img class="imageqr" src="<?php echo base_url(); ?>assets/images/ism/iitism_transcript.jpg" style="width:80%;height:10%;"/>
                    </p>

                    <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
                    <tr>
            <td>
            <ul style="list-style:none;">
                    <ul style="list-style:none;">
            <li>
                ii)	Higher Secondary/Intermediate (12th level) Marks-Sheet (<b>for checking of subjects</b>)
            </li>
            <li>
            iii) Qualifying Degree <b>Marks-Sheet/Grade Card</b> (7th semester/pre-final year marks-sheet for the ‘appearing candidates’ whose final semester/final year results are awaited).
            </li>
            <li>
            iv)	<b>Valid</b> GATE score card as indicated in the application form.
            </li>
            <li>
            v)	Certificate for degree equivalence (if applicable).
            </li>
            <li>
            vi)	A <b>Medical Fitness certificate</b> from <b>Govt. Hospital</b> as given in Annexure-III of the Information Brochure in original.
            </li>
            <li>
            vii) A <b>Medical certificate</b> separately from Chief Medical Officer (CMO) or Equivalent of a Government Hospital, indicating <b>no colour blindness</b> for candidates of M.Tech. in <b>Opencast mining, Mining engineering, Tunneling & Underground Space Technology and Petroleum engineering</b> in original</li>
            <li>
            viii)	Caste certificate – applicable only for SC/ST/OBC-NCL candidates. The <b>OBC-NCL certificate should be as per Annexure I </b>(in the Central Government format) of the Information Brochure and should have been issued on or after April 01, 2021.
            </li>
            <li>
            ix)	Relevant certificate for the candidates in the sub-category (EWS/PwD). <b>EWS certificate</b> should have been issued on or after <b>April 01, 2021</b> (in the Central Government format).
            </li>
            </ul>

            <li>
            e)	Migration Certificate/College Leaving Certificate in Original.
            </li>
            <li>
            f)	4 passport size and 4 stamp size colour photographs.
            </li>
            <li>
            g)	2-years’s work experience certificate (for candidates of M. Tech. in Mining Engineering as per the Information Brochure) in original.
            </li>

            </ul>
            </td>
            </tr>
            </table>

            <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td>
            <b>If you fail to submit any of the above mentioned documents at the time of reporting, or if permitted, by September 01, 2022, the provisional admission, if done, will be cancelled by the Institute without any further notice.</b>
            </td>
            </tr>
           </table>

           <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td>
            It is IMPORTANT for the <b><u>‘Appearing candidates’</u></b> to note that their admission will be provisional which will be confirmed only after submission of Final semester/Final year marks-sheet/grade-card of qualifying degree and college leaving certificate/migration certificate in original <b>latest by September 01, 2022</b>.  Such candidates will not be entitled for any scholarship till confirmation of their admission, if otherwise eligible.  Failure to submit the requisite document by the stipulated date will lead to cancellation of admission of all such candidates and names of all such candidates will be deleted from the rolls of the Institute w.e.f. <b>September 02, 2021</b> without further notice. In such cases, the candidate will be refunded only the Caution Money component of the fee deposited at the time of provisional admission.
            </td>
            </tr>
           </table>

           <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td>
            All other formalities related to Identity Card, Hostel accommodation and opening of bank account will be completed subsequently by the candidates immediately after final admission on <b>04 August 2022</b>. The classes of the M. Tech. Programmes will commence on <b>08August 2022</b> (Monday).
            </td>
            </tr>
           </table>

           <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td>
            Candidates called for admission should report in person for admission on the scheduled day <b>before 10.00 AM.</b> Long distance candidates are advised to reach Dhanbad well in advance to avoid any transit delay. No TA/DA will be paid for attending the Admission process. Candidates should make their own arrangement for travelling and accommodation at Dhanbad during their participation in the Admission process.
            </td>
            </tr>
           </table>

           <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td>
            The admission is liable to be cancelled at a later date, if any adverse fact which could have prevented the candidate from being admitted to IIT (ISM) Dhanbad, is found against the candidate or if it is found at the time of admission or at any time later that the candidate has provided any false information or has committed a gross misconduct/indiscipline in the College/Institution/University attended earlier.
            </td>
            </tr>
           </table>

           <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td>

            </td>
            <td style="text-align:right;">
            Assistant Registrar (Academic)
            </td>
            </tr>
           </table>

            <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td>
            <hr />
            <hr class="new" />
            </td>
            </tr>

            </table>

            <br>

            <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td>
            IIT(ISM): 2 Year M. Tech Admission 2021	Page 2
            </td>
            </tr>
            </table>

    </div>
</body>

</html>
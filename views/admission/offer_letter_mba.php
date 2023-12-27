<head>
    <title>MBA Application</title>
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
    </style>
</head>

<body>
    <div class="page" width="8.3 inches" height="11.7 inches" align="center">
        <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <tr>
                <td style="width:10%" align="center">
                    <img class="imageqr" src="<?php echo base_url(); ?>assets/img/ismlogo.png" />
                </td>
                <td class="headingforms" style="width:80%" align="center">
                    <b>INDIAN INSTITUTE OF TECHNOLOGY</b><br/>
                    <b>(INDIAN SCHOOL OF MINES)</b><br/>
                    <b>DHANBAD-826004</b><br/>
                    <b><small>PG Admission Cell</small>
                    </b>
                </td>

             </tr>
                </table>

                <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
                <p class="ex1"></p>
                <tr>
                <td colspan='2'>
                 No. Acad/605001/MBA. 2022 Adm./<?php echo $application[0]->registration_no; ?>
                </td>
                <td>

                Print Date : <?php echo date("jS F Y"); ?>
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
            Sub: Offer for provisional Admission to two-year MBA programme session 2022-2024.
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
            Please be informed that you have been provisionally selected for admission to 2-year MBA Program Session 2022-2024 based on performance in Online PI, CAT 2021 score, past Academic record and Industrial Experience.<b>You are requested to treat this as offer of admission as no separate letters will be issued.</b>.
            </td>
            </tr>
           </table>

           <!-- <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td>
            Please be informed that you have been provisionally selected for admission to 2-year MBA Program Session 2022-2023 based on performance in Online PI, CAT 2021 score, Past Academic record and Industrial Experience.<b>The selected candidates are requested to treat this as offer of admission, as no separate letters will be issued</b>.
            </td>
            </tr>
           </table> -->

           <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td>
             <b>On the basis of your application/applications, if you are selected for both the programs, you will have to clearly specify the program in which you want to get admitted in the institute after getting the offer letter.</b>
            </td>
            </tr>
           </table>

           <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td>
            <b>Thereafter, You are directed to deposit the admission fee of Rs. 1,16,470 only (for General/OBC-NC/EWS) and Rs.41,470 only (For SC/ST/PwD) for Monsoon Semester 2022-24 through payment portal as demonstrated in Annexure I (go through it carefully) and block the seat for the programme. <em>The admission fee includes Rs. 15,000 towards the Mess Charges and the hostel fees for monsoon semester.</b></em> <u>The admission fees should be paid latest by 5:00 PM of <?php echo date('F j , Y',strtotime($array_selected_mba[0][0]->end_date)); ?>.</u>.
            </td>
            </tr>
           </table>

           <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td>
            After the payment of fees through payment portal, you are directed to send a reply e-mail immediately to <b>admission_ms@iitism.ac.in</b> with the following information- Name, CAT Registration Number, Category (General, EWS, OBC,SC, ST, PwD,etc.), MBA Programme in which you want to be admitted- MBA or MBA in Business Analytics (as per the selection in the programme). Also, kindly send the fee receipt of admission fee in MBA/MBA in Business Analytics Programme for verification in the same e-mail. <b>The process should be completed by 5:00 PM of </b> <?php echo date('F j , Y',strtotime($array_selected_mba[0][0]->end_date)); ?>, <b>and the information as mentioned above should be sent by reply e-mail to the institute failing which your admission will be cancelled and the seat will be allotted to waitlisted candidate in the order of merit.</b>
            </td>
            </tr>
           </table>

           <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td>
            The admission is provisional and will be subject to fulfilling of eligibility criteria, submission of necessary documents in original for verification at a later date. The candidates have to produce the following documents in original (mandatory) by appearing physically at the time of final admission which will be notified in due course of time:
            <br>
            <ul style="list-style:none;">
                <li>
                  a.	Copy of the online application form
                </li>
                <li>
                  b.	All relevant certificates (to be produced in original at the time of admission to the programme) related to academic qualification (i.e., X, XII, Graduation, etc), date of birth proof and fee receipt of the programme fee.
                </li>
                <li>
                c.	Original CAT 2021 Score Card and Admit Card.
            </li>
            <li>
            d.	Migration certificate and/ or College Leaving Certificate issued by the University, original.
            </li>
            <li>
            e.	One set of self-attested photocopies of all certificates.
            </li>
            <li>
            f.	Four copies each of passport and stamp size photographs (same copy as was affixed on the application form).
            </li>
            <li>
            g.	Caste certificate from appropriate issuing authority in prescribed format for SC/ST/OBC (Non Creamy Layer) candidates/EWS (Economically Weaker section); certificates from the respective Record Office/Army Headquarters (Adjutant General’s Branch) for Defence Personnel (DP) candidates in original as applicable.
            </li>
            <li>
            h.	PwD must bring the Original Certificate in prescribed format issued by the Chief Medical Officer or equivalent of a government hospital if applicable.
            </li>
            <li>
            i.	The OBC (Non Creamy Layer) candidates will be required to submit OBC (NonCreamy Layer) certificate as prescribed format as applicable for admission to Central Educational Institutions (CEIs) under Government of India (Annexure-II attached) and should be issued by the officer not below the rank of District Magistrate/ Deputy Commissioner/ Competent Authority as indicated in the format attached. OBC (Non- Creamy) certificate must be issued by the Competent Authority as per the attached format issued on or after December 01, 2021.
            </li>
            </ul>
            </td>
            </tr>
           </table>



            <p class="ex2"></p>


            <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:80%" align="center">
            <tr>
                <td style="width:10%" align="center">
                    <img class="imageqr" src="<?php echo base_url(); ?>assets/img/ismlogo.png" />
                </td>
                <td class="headingforms" style="width:80%" align="center">
                    <b>INDIAN INSTITUTE OF TECHNOLOGY</b><br/>
                    <b>(INDIAN SCHOOL OF MINES)</b><br/>
                    <b>DHANBAD-826004</b><br/>
                    <b><small>PG Admission Cell</small>
                    </b>
                </td>

             </tr>
                </table>

                <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td>
            <ul style="list-style:none;">
                <li>
            1.	If the result of the qualifying examination is not yet published, a certificate from the Head of the Institution/ College last attended mentioning that the candidate appeared in the qualifying examination and they will submit the certificate of passing the qualifying examination at Institute at a later date.This will be submitted during physical admission.
            </li>
            <li>
            2.	All original certificates must be produced by these candidates on the date of physical reporting, failing which the provisional admission to MBA program shall stand cancelled without any further notice and there will be no refund of the fees in such cases.
            </li>
            <li>
            3.	A candidate's admission is liable to be cancelled at a later date, if anything adverse is found against him/ her, which could have prevented him/ her from being admitted to institute or having provided false information or having committed gross misconduct/ indiscipline in College/University.
            </li>
            <li>
            4.	No TA/DA will be paid for joining the programme.
            </li>
            <li>
            5.	The candidates have to make their own arrangement for stay at Dhanbad during the physical admission process.
            </li>
            <li>
            6.	The classes will commence in the Department of Management Studies, Indian Institute of Technology (Indian School of Mines), Dhanbad which will be notified later.
            </li>
            <li>
            7.	The hostel accommodation will be provided when you arrive in the campus.
            </li>
            <li>
            8.	Withdrawal and refund of admission fee
            </li>
            <li>
            After the admission/provisional admission, a candidate may withdraw his/her admission. Withdrawal may be requested to AR (Admissions) at aradm@iitism.ac.in by e-mail from the registered email Id of the candidate.
            </li>
            <li>
            a) If a candidate withdraws the offer of admission within five days after the last date of admission for the round in which she/he was admitted, the entire fee collected from the candidate will be refunded after a deduction of processing fee of Rs.2000/-
            </li>
            <li>
            b) If a candidate withdraws the offer of admission after five days from the last date of admission for the round in which she/he was admitted, she/he will be refunded only the caution money and advance hostel mess fee.
            </li>
            </ul>
            </td>
            </tr>
            </table>
            <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td>
            <p><b><em>Note: The candidate should clearly verify that they fulfill the eligibility criteria for the programme before paying the fees and taking admission. If you do not fulfill the eligibility criteria during physical admission at the institute, your admission to the programme will be cancelled and admission fees will not be refunded in such cases.</em></b></p>
            </td>
            </tr>
            </table>

            <p class="ex2"></p>
            <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:80%" align="center">
            <tr>
                <td style="width:10%" align="center">
                    <img class="imageqr" src="<?php echo base_url(); ?>assets/img/ismlogo.png" />
                </td>
                <td class="headingforms" style="width:80%" align="center">
                    <b>INDIAN INSTITUTE OF TECHNOLOGY</b><br/>
                    <b>(INDIAN SCHOOL OF MINES)</b><br/>
                    <b>DHANBAD-826004</b><br/>
                    <b><small>PG Admission Cell</small>
                    </b>
                </td>

             </tr>
                </table>
            <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td align="center">
             <b><u>ANNEXURE-I</u></b>
            </td>
            </tr>
           </table>

            <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td align="center">
            Process of Online Payment
            </td>
            </tr>
            </table>

            <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td>
            <ul style="list-style:none;">
                <li>
            1.	Please select the program for which you want to take admission and proceed for payment.
            </li>
            <li>
2.	Please select the SBI payment gateway and press “Proceed to payment”.
</li>
<li>
3.	Please keep a copy of Order No. for further reference. Click on “Pay Now” button and you will be navigated to the payment gateway page.
</li>
<li>
4.	Once “Pay Now” is clicked, the system will take to Epay site of SBI Payment gateway.
</li>
<li>
5.	Once payment is done, Payment receipt will be displayed. Please keep the payment receipt for future use. Click on the “Close” button.
</li>
<li>
6.	You will be navigated to application dashboard where you can download the payment receipt and offer letter.
            </li>
            </ul>
            </td>
            </tr>
            </table>

            <p class="ex2"></p>
            <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:80%" align="center">
            <tr>
                <td style="width:10%" align="center">
                    <img class="imageqr" src="<?php echo base_url(); ?>assets/img/ismlogo.png" />
                </td>
                <td class="headingforms" style="width:80%" align="center">
                    <b>INDIAN INSTITUTE OF TECHNOLOGY</b><br/>
                    <b>(INDIAN SCHOOL OF MINES)</b><br/>
                    <b>DHANBAD-826004</b><br/>
                    <b><small>PG Admission Cell</small>
                    </b>
                </td>

             </tr>
                </table>
            <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td align="center">
             <b><u>ANNEXURE-II</u></b>
            </td>
            </tr>
           </table>
           <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
                <td>
           <p>FORM OF CERTIFICATE TO BE PRODUCED BY OTHER BACKWARD CLASSES (NONCREAMY LAYER) APPLYING FOR ADMISSION TO CENTRAL EDUCATIONAL INSTITUTIONS (CEIs), UNDER THE GOVERNMENT OF INDIA</p>
           </td>
            </tr>
            </table>
            <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
                <td>
            This is  to  certify that  Shri/Smt./Kum.________________________Son/Daughter of Shri/Smt.________________________of Village/Town________________________District/Division________________________in  the________________________State belongs to the________________________Community which is recognized as a backward class under:
                </td>
            </tr>
            </table>
            <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
                <td>
                <ul style="list-style:none;">
                <li>
                (i)	Resolution No. 12011/68/93-BCC(C) dated 10/09/93 published in the Gazette of India Extraordinary Part I Section I No. 186 dated 13/09/93.
            </li>
            <li>
    (ii)	Resolution No. 12011/9/94-BCC dated 19/10/94 published in the Gazette of India Extraordinary Part I Section I No. 163 dated 20/10/94.
    </li>
            <li>
(iii)	Resolution No. 12011/7/95-BCC dated 24/05/95 published in the Gazette of India Extraordinary Part I Section I No. 88 dated 25/05/95.
</li>
            <li>
(iv)	Resolution No. 12011/96/94-BCC dated 9/03/96.
</li>
            <li>
(v)	Resolution No. 12011/44/96-BCC dated 6/12/96 Section I No. 210 dated 11/12/96.
</li>
            <li>
(vi)	Resolution No. 12011/13/97-BCC dated 03/12/97.
</li>
            <li>
(vii)	Resolution No. 12011/99/94-BCC dated 11/12/97. (viii)Resolution No. 12011/68/98-BCC dated 27/10/99.
</li>
            <li>
(ix)	Resolution No. 12011/88/98-BCC dated 6/12/99 published in the Gazette of India Extraordinary Part I Section I No. 270 dated 06/12/99.
</li>
            <li>
(x)	Resolution No. 12011/36/99-BCC dated 04/04/2000 published in the Gazette of India Extraordinary Part I Section I No. 71 dated 04/04/2000.
</li>
            <li>
(xi)	Resolution No.  12011/44/99-BCC dated  21/09/2000  published  in  the Gazette  of India Extraordinary Part I Section I No. 210 dated 21/09/2000.
</li>
            <li>
(xii)	Resolution No. 12015/9/2000-BCC dated 06/09/2001. (xiii)Resolution No. 12011/1/2001-BCC dated 19/06/2003. (xiv)Resolution No. 12011/4/2002-BCC dated 13/01/2004.
</li>
            <li>
(xv) Resolution No. 12011/9/2004-BCC dated 16/01/2006 published in the Gazette of India Extraordinary Part I Section I No. 210 dated 16/01/2006.
</li>
            </ul>
                </td>
            </tr>
            </table>
            <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td>
             <b>N.B. Strikeout whichever resolutions (i-xv) is/are not applicable.</b>
            </td>
            </tr>
           </table>

           <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td>
           Shri/Smt./Kum.________________________and/or   his   family   ordinarily  reside(s) in  the ________________________	District/Division of ________________________
 	State. This is also to certify that he/she does not belong to the persons/sections (Creamy Layer) mentioned in Column 3 of the Schedule to the Government of India, Department of Personnel & Training O.M. No. 36012/22/93-Estt.(SCT) dated 08/09/93 which is modified vide OM No. 36033/3/2004 Estt.(Res.) dated 14/10/2008 and OM36033/1/2013-Estt (Res.) dated27/05/2013 or the latest notification of the Government of India
     </td>
            </tr>
           </table>
           <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td colspan="2">
                Dated :
            </td>
            <td style="text-align:right;">
            District Magistrate/Deputy Commissioner/Competent Authority Seal
            <br>
            *Please delete the word(s) which are not applicable
            </td>
            </tr>
           </table>
           <table class="mtech-nb" style="margin: 0.01in 0.01in 0.01in 0.01in; width:100%" align="center">
            <p class="ex1"></p>
            <tr>
            <td>
                <p>
           NOTE:
            </p>
            <ul style="list-style:none;">
                <li>
(a)	The term ‘Ordinarily’ used here will have the same meaning as in Section 20 of the Representation of the People Act, 1950.
            </li>
            <li>
(b)	The authorities competent to issue Caste Certificates are indicated below:
    </li>
            <li>
(i)	District Magistrate / Additional Magistrate / Collector / Deputy Commissioner / Additional Deputy Commissioner / Deputy Collector
</li>
            <li>
/ Ist Class Stipendiary Magistrate / Sub-Divisional magistrate / Taluka Magistrate / Executive Magistrate / Extra Assistant Commissioner (not below the rank of Ist Class Stipendiary Magistrate).
</li>
            <li>
(ii)	Chief Presidency Magistrate / Additional Chief Presidency Magistrate / Presidency Magistrate.
</li>
            <li>
(iii)	Revenue Officer not below the rank of Tehsildar and
</li>
            <li>
(iv)	Sub-Divisional Officer of the area where the candidate and / or his family resides.
</li>
            <li>
(c)	The annual income/status of the parents of the applicant should be based on financial year ending March, 31, 2017.
</li>
</ul>
<br>
<p>
   <b> Note 2 : "The date for reporting physically at the IIT(ISM), Dhanbad alongwith the required documents is 04.08.2022 for MBA students."</b>
</p>
</td>
</tr>
</table>
            </table>
    </div>
</body>

</html>
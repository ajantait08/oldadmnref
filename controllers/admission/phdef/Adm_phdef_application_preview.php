<?php defined('BASEPATH') or exit('No direct script access allowed');

class Adm_phdef_application_preview extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('dompdf', 'file'));
        $this->load->model('admission/phdef/Adm_phdef_application_preview_model', 'Phdef_all', TRUE);
    }

    function index()
    {
        $registration_no = $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        // echo $registration_no;
        // echo $login_type;
        // exit;
        if ($registration_no && ($login_type == 'Phdef')) {

            $data['val'] = "home";
            $data['application'] = $this->Phdef_all->get_application_details($registration_no);
            $data['program'] = $this->Phdef_all->get_program_details($registration_no);
            $data['tab_stat'] = $this->Phdef_all->get_tab_status($registration_no);
            $data['selected_program_details'] = $this->Phdef_all->get_selected_program_details($registration_no);
            $data['selected_program_details_with_payment'] = $this->Phdef_all->get_selected_program_details_with_payment($registration_no);
            $data['allowed_for_mis_registration'] = $this->Phdef_all->get_allowed_mis_reg_details($registration_no);            // uncomment when move to admission live
            $data['mis_registration_details'] = $this->Phdef_all->get_mis_registration_details($registration_no);
            $start_date_mis_reg = date('Y-m-d',strtotime('31-12-2024'));
            $end_date_mis_reg = date('Y-m-d',strtotime('04-01-2024'));
            $get_today_date_mis_reg = date('Y-m-d');

            $interview_count = 2;
            $count_ml_without_payment = 0;
            $count_ml_with_payment = 0;
            $count_payment_date_close = 0;
            $allowed_mis_reg_count = 0;
            $count_mis_registration = 0;

            // echo "<pre>";
            // print_r($data);
            // exit;
            if (!empty($data['selected_program_details'])) {
                foreach ($data['selected_program_details'] as $value) {
                    if ($value->admin_decision == 'ML' && $value->payment_status == '') {
                        $count_ml_without_payment++;
                        $interview_count = 0;
                    } elseif ($value->admin_decision == 'ML' && $value->payment_status == 'Y') {
                        $count_ml_with_payment++;
                        $interview_count = 0;
                    } else {
                        # code...
                    }
                }
            }

            if (!empty($data['selected_program_details'])) {
                foreach ($data['selected_program_details'] as $value) {
                    if (!(date('Y-m-d',strtotime($value->start_date)) <= date('Y-m-d') && date('Y-m-d') <= date('Y-m-d',strtotime($value->end_date)))) {
                        $count_payment_date_close++;
                        $count_ml_without_payment = 0;
                }
            }
        }

        if (!empty($data['mis_registration_details'])) {
            $count_mis_registration++;
        }

           if (!empty($data['allowed_for_mis_registration']) && ($start_date_mis_reg <= $get_today_date_mis_reg && $get_today_date_mis_reg <= $end_date_mis_reg)) {
             $allowed_mis_reg_count++;
           }

            $data['count_ml_without_payment'] = $count_ml_without_payment;
            $data['count_ml_with_payment'] = $count_ml_with_payment;
            $data['interview_count'] = $interview_count;
            $data['count_payment_date_close'] = $count_payment_date_close;
            $data['allowed_mis_reg_count'] = $allowed_mis_reg_count;
            $data['mis_reg_count'] = $count_mis_registration;
            $data['donot_display_now'] = 0;

            $this->Adm_phdef_header($data);
            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';
            // exit;
            if ($data['application'][0]->payment_status == 'Y') {

                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                $this->load->view('admission/phdef/adm_phdef_status_dashboard', $data);
            } else {

                redirect('admission/phdef/Adm_phdef_user_dashboard');
            }
            // $this->Adm_phd_footer();
        } else {
            redirect('admission/phdef/Adm_phdef_registration/logout');
        }
    }

    function admission_offer_letter()
    {

        $registration_no = $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        $count_ml = 0;
        $count_dst = 0;
        if ($registration_no && ($login_type == 'Phdef')) {
            $data['val'] = "home";
            $data['application'] = $this->Phdef_all->get_application_details($registration_no);
            $data['program'] = $this->Phdef_all->get_program_details($registration_no);
            $data['tab_stat'] = $this->Phdef_all->get_tab_status($registration_no);
            $data['selected_program_details'] = $this->Phdef_all->get_selected_program_details($registration_no);
            $data['selected_payment_details'] = $this->Phdef_all->get_selected_payment_details($registration_no);
            $data['fellowship'] = $this->Phdef_all->get_fellowship_details($registration_no);
            // $data['array_selected_ba'] = array();
            // $data['array_selected_mba'] = array();

            foreach ($data['fellowship'] as $value) {
                // if ($value->fellowship_name == 'DST-INSPIRE') {
                 if (stripos($value->fellowship_type,'DST') !== false) {
                    $count_dst++;
                }
            }


            foreach ($data['program'] as $value) {
                if ($value->admin_decision == 'ML') {
                    $count_ml++;
                }
            }
            $data['count_ml'] = $count_ml;
            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';
            // exit;

            if ($data['application'][0]->payment_status == 'Y') {
                if ($data['count_ml'] > 0) {
                    foreach ($data['selected_program_details'] as $value) {

                        $misdocfolder_phd = '/disk2/virtualhost/admission/public_html/html/assets/admission/phdef/OfferLetter/' . $value->registration_no . '/';
                        if (!is_dir($misdocfolder_phd)) {
                            mkdir($misdocfolder_phd, 0777, true);
                        } else {
                            chmod($misdocfolder_phd, 0777);
                        }

                        $file_path = FCPATH . 'assets/admission/phdef/OfferLetter/' . $value->registration_no . '/Offer_letter_' . $value->program_id . '_' . $value->registration_no . '.pdf';
                        // if (file_exists($file_path)) {
                        //   $data['application_preview'] = $file_path;
                        // } else {
                        $data['print'] = 'Y';
                        $data['program_id'] = $value->program_id;
                        $data['program_desc'] = $value->program_desc;
                        $data['start_date'] = $value->start_date;
                        $data['category'] = $value->category;
                        $data['end_date'] = $value->end_date;
                        $data['salutation'] = $value->salutation;
                        $data['doc_verification_date'] = $value->doc_verification_date;
                        $data['department'] = $this->Phdef_all->get_department_by_program_id($value->program_id)[0]['desc'];
                        $data['fellowtype'] = $value->fellowtype;


                        if ($data['fellowtype'] == 'IA') {
                            $data['fellowtypedesc'] = 'Institute Assistantship';
                        } else if ($data['fellowtype'] == 'EXT') {
                            $data['fellowtypedesc'] = 'External Fellowship';
                        } else if ($data['fellowtype'] == 'PRJ') {
                            $data['fellowtypedesc'] = 'IIT(ISM) Project Employee';
                        } else if ($data['fellowtype'] == 'PT') {
                            $data['fellowtypedesc'] = 'Part Time';
                        } else if ($data['fellowtype'] == 'EF-DST Inspire') {
                           $data['fellowtypedesc'] = 'EF-DST Inspire';
                        }
                        else if ($data['fellowtype'] == 'UGC-JRF') {
                            $data['fellowtypedesc'] = 'UGC-JRF';
                        }
                        else if ($data['fellowtype'] == 'VIS') {
                            $data['fellowtypedesc'] = 'Visvesvaraya PhD scheme';
                        }
                        else {
                            $data['fellowtypedesc'] = '';
                        }

                        // echo '<pre>';
                        // print_r($data);
                        // echo '</pre>';

                        // exit;

                        // $html_phd = $this->load->view('admission/phdef/offer_letter_phd', $data, TRUE);
                        if($count_dst > 0) {
                        $html_phd = $this->load->view('admission/phdef/offer_letter_phd_dst', $data, TRUE);
                        }
                        else if($data['fellowtype'] == 'VIS'){
                        $html_phd = $this->load->view('admission/phdef/offer_letter_phd_vis', $data, TRUE);
                        }
                         else {
                        $html_phd = $this->load->view('admission/phdef/offer_letter_phd', $data, TRUE);
                        }
                        //echo $html_phd; exit;
                        $paper = '';
                        $stream = FALSE;
                        //$dompdf->set_paper(DEFAULT_PDF_PAPER_SIZE, 'landscape');
                        $output_phd = pdf_create($html_phd, $registration_no . "_ApplicationOfferLetter", $paper, $stream);
                        $file_to_save_phd = FCPATH . 'assets/admission/phdef/OfferLetter/' . $value->registration_no . '/Offer_letter_' . $value->program_id . '_' . $value->registration_no . '.pdf';
                        file_put_contents($file_to_save_phd, $output_phd);
                    }
                }
                $this->adm_phdef_header($data);
                $this->load->view('admission/phdef/adm_phdef_offer_letter', $data);
                $this->adm_phdef_footer();
            } else {
                redirect('admission/phdef/Adm_phdef_user_dashboard');
            }
        } else {

            redirect('admission/phdef/Adm_phdef_registration/logout');
        }
    }


    function application_preview()
    {
        $registration_no = $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        if ($registration_no && ($login_type == 'Phdef')) {
            $info = $this->fetch_Phd_detail();
            $info['print'] = 'N';
            // echo '<pre>';
            // print_r($info);
            // echo '</pre>';
            // exit;
            $this->load->view('admission/phdef/adm_phdef_application_preview', $info);
            $this->load->view('admission/phdef/adm_phdef_application_download');
        } else {
            redirect('admission/phdef/Adm_phdef_registration/logout');
        }
    }

    function get_selected_data()
    {
        $offervalue = $_REQUEST['offervalue'];
        $reg_no = $_REQUEST['reg_no'];
        $response_selected_data = $this->Phdef_all->get_selected_data_reg_no($offervalue, $reg_no);
        //print_r($response_selected_data); exit;
        $current_date = date('Y-m-d');
        $start_date = date('Y-m-d', strtotime($response_selected_data[0]->start_date));
        $end_date = date('Y-m-d', strtotime($response_selected_data[0]->end_date));
        $payment_status = $response_selected_data[0]->payment_status;
        if ($start_date <= $current_date && $end_date >= $current_date && $payment_status == '') {

            echo '1';
        } else {

            echo '2';
        }
    }

    function admission_interview_call_letter()
    {
        $registration_no = $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        $count_ci = 0;
        $count_vis = 0;
        if ($registration_no && ($login_type == 'Phdef')) {
            $data['val'] = "home";
            $data['application'] = $this->Phdef_all->get_application_details($registration_no);
            $data['program'] = $this->Phdef_all->get_program_details($registration_no);
            $data['tab_stat'] = $this->Phdef_all->get_tab_status($registration_no);
            $data['fellowtype'] = $this->Phdef_all->get_fellowship_details($registration_no);
            //$data['selected_program_details'] = $this->Phd_all->get_selected_program_details($registration_no);
            //$data['selected_payment_details'] = $this->Phd_all->get_selected_payment_details($registration_no);
            foreach ($data['program'] as $value) {
                if ($value->admin_decision == 'CI') {
                    $count_ci++;
                }
            }

            foreach ($data['fellowtype'] as $value) {
                if ($value->fellowship_type == 'VIS') {
                    foreach ($data['program'] as $value) {
                        if ($value->program_id == 'ECE') {
                            $count_vis++;
                        }
                    }
                }
            }

            $data['count_ci'] = $count_ci;
            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';
            // exit;

            if ($data['application'][0]->payment_status == 'Y') {

                if ($data['count_ci'] > 0) {


                    foreach ($data['program'] as $program) {

                        if ($program->admin_decision == 'CI') {
                            $misdocfolder_phd = '/disk2/virtualhost/admission/public_html/html/assets/admission/phdef/InterviewcallLetter/' . $registration_no . '/';
                            if (!is_dir($misdocfolder_phd)) {
                                mkdir($misdocfolder_phd, 0777, true);
                            } else {
                                chmod($misdocfolder_phd, 0777);
                            }

                            $file_path = FCPATH . 'assets/admission/phdef/InterviewcallLetter/' . $registration_no . '/InterviewcallLetter' . $registration_no . '.pdf';

                            $data['program_id'] =  $program->program_id;
                            $data['program_desc'] = $program->program_desc;
                            $data['print'] = 'Y';
                            if ($count_vis > 0) {
                                $html_phd = $this->load->view('admission/phdef/interview_call_letter_phdef_vis', $data, TRUE);
                            } else {
                                $html_phd = $this->load->view('admission/phdef/interview_call_letter_phdef', $data, TRUE);
                            }
                            //exit;
                            $paper = '';
                            $stream = FALSE;
                            $output_phd = pdf_create($html_phd, $registration_no . "_ApplicationInterviewCallLetter", $paper, $stream);
                            //$output_mba_ba = pdf_create($html_mba_ba, $registration_no . "_ApplicationOfferLetter", $paper, $stream);
                            $file_to_save_phd = FCPATH . 'assets/admission/phdef/InterviewcallLetter/' . $registration_no . '/InterviewcallLetter' . $registration_no . $program->program_id . '.pdf';
                            //$file_to_save_mba_ba = FCPATH . 'assets/admission/mba_ba/OfferLetter/' . $registration_no . '/Offer_letter_mba_ba' . $registration_no . '.pdf';
                            file_put_contents($file_to_save_phd, $output_phd);
                            //file_put_contents($file_to_save_mba, $output_mba_ba);
                            //$data['application_preview_phd_'.$program->program_id] = 'assets/admission/phd/InterviewcallLetter/' . $registration_no . '/InterviewcallLetter' . $registration_no .$program->program_id. '.pdf';
                            //$data['application_preview_mba_ba'] = 'assets/admission/mba_ba/OfferLetter/' . $registration_no . '/Offer_letter_mba_ba' . $registration_no . '.pdf';
                        }
                    }
                }

                //     else{

                //         foreach($data['program'] as $program){

                //             if ($program->admin_decision == 'ML') {

                //         $misdocfolder_phd = '/var/www/html/assets/admission/phd/InterviewcallLetter/' . $registration_no . '/';
                //         if(!is_dir($misdocfolder_phd)){
                //             mkdir($misdocfolder_phd,0777,true);
                //         }
                //         else{
                //             chmod($misdocfolder_phd,0777);

                //         }
                //         $file_path = FCPATH . 'assets/admission/phd/InterviewcallLetter/' . $registration_no . '/InterviewcallLetter' . $registration_no . '.pdf';
                //         // if (file_exists($file_path)) {
                //         //   $data['application_preview'] = $file_path;
                //         // } else {
                //         $data['print'] = 'Y';
                //         $html_phd = $this->load->view('admission/phd/interview_call_letter_phd', $data, TRUE);
                //         echo $html_phd;
                //         #$html_mba_ba = $this->load->view('admission/offer_letter_mba_ba', $data, TRUE);
                //         //echo $html_mba_ba;
                //         exit;
                //         $paper = '';
                //         $stream = FALSE;
                //         $output_phd = pdf_create($html_phd, $registration_no . "_ApplicationInterviewCallLetter", $paper, $stream);
                //         #$output_mba_ba = pdf_create($html_mba_ba, $registration_no . "_ApplicationOfferLetter", $paper, $stream);
                //         $file_to_save_phd = FCPATH . 'assets/admission/phd/InterviewcallLetter/' . $registration_no . '/InterviewcallLetter' . $registration_no . '.pdf';
                //         #$file_to_save_mba_ba = FCPATH . 'assets/admission/mba/OfferLetter/' . $registration_no . '/Offer_letter_mba_ba' . $registration_no . '.pdf';
                //         file_put_contents($file_to_save_phd, $output_phd);
                //         #file_put_contents($file_to_save_mba, $output_mba_ba);
                //         $data['application_preview_phd'] = 'assets/admission/phd/InterviewcallLetter/' . $registration_no . '/InterviewcallLetter' . $registration_no . '.pdf';

                //         }

                //         else {

                //         }

                //     }
                // }
                $this->adm_phdef_header($data);
                $this->load->view('admission/phdef/adm_phdef_interview_call_letter', $data);
                $this->adm_phdef_footer();
            } else {
                redirect('admission/Adm_phdef_user_dashboard');
            }
        } else {

            redirect('admission/phdef/Adm_phdef_registration/logout');
        }
    }

    function application_download()
    {
        $registration_no = $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        if ($registration_no && ($login_type == 'Phdef')) {
            $info = $this->fetch_Phd_detail();
            $info['print'] = 'Y';
            $html = $this->load->view('admission/phdef/adm_phdef_application_preview', $info, TRUE);
            pdf_create($html, $registration_no . "_Phdef_Application");
        } else {
            redirect('admission/phdef/Adm_phdef_registration/logout');
        }
    }

    function application_download_phdef($program_id, $program_desc)
    {

        if (is_numeric(strpos($program_desc, '%20'))) {

            $program_desc = str_replace('%20', ' ', $program_desc);
        }
        $count_dst = 0;
        $registration_no = $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        if ($registration_no && ($login_type == 'Phdef')) {
            //$info = $this->fetch_mba_detail();
            $data['val'] = "home";
            $data['application'] = $this->Phdef_all->get_application_details($registration_no);
            $data['program'] = $this->Phdef_all->get_program_details($registration_no);
            $data['tab_stat'] = $this->Phdef_all->get_tab_status($registration_no);
            $data['fellowship'] = $this->Phdef_all->get_fellowship_details($registration_no);

            foreach ($data['fellowship'] as $value) {
                // if ($value->fellowship_name == 'DST-INSPIRE') {
                if (stripos($value->fellowship_type,'DST') !== false) {
                    $count_dst++;
                }
            }

            #$data['selected_payment_details'] = $this->Phd_all->get_selected_payment_details($registration_no);
            $data['program_id'] =  $program_id;
            $data['program_desc'] = $program_desc;
            $data['selected_payment_details_new'] = $this->Phdef_all->get_selected_payment_details_new($registration_no, $data['program_id']);
            $data['start_date'] = $data['selected_payment_details_new'][0]->start_date;
            $data['end_date'] = $data['selected_payment_details_new'][0]->end_date;
            $data['salutation'] = $data['selected_payment_details_new'][0]->salutation;
            $data['doc_verification_date'] = $data['selected_payment_details_new'][0]->doc_verification_date;
            $data['category'] = $data['selected_payment_details_new'][0]->category;
            $data['department'] = $this->Phdef_all->get_department_by_program_id($data['program_id'])[0]['desc'];
            $data['fellowtype'] = $this->Phdef_all->get_fellowtype_by_reg_no_program_id($data['program_id'], $registration_no)[0]['fellowtype'];
            if ($data['fellowtype'] == 'IA') {
                $data['fellowtypedesc'] = 'Institute Assistantship';
            } else if ($data['fellowtype'] == 'EXT') {
                $data['fellowtypedesc'] = 'External Fellowship';
            } else if ($data['fellowtype'] == 'PRJ') {
                $data['fellowtypedesc'] = 'IIT(ISM) Project Employee';
            } else if ($data['fellowtype'] == 'PT') {
                $data['fellowtypedesc'] = 'Part Time';
            } else if ($data['fellowtype'] == 'EF-DST Inspire') {
                $data['fellowtypedesc'] = 'EF-DST Inspire';
             }
             else if ($data['fellowtype'] == 'UGC-JRF') {
                 $data['fellowtypedesc'] = 'UGC-JRF';
             }
             else if ($data['fellowtype'] == 'VIS') {
                $data['fellowtypedesc'] = 'Visvesvaraya PhD scheme';
            }
             else {
                 $data['fellowtypedesc'] = '';
             }

            // echo "<pre>";
            // print_r($data);
            // exit;

            $data['print'] = 'Y';
            if($count_dst > 0) {
            $html = $this->load->view('admission/phdef/offer_letter_phd_dst', $data, TRUE);
            }
            else if($data['fellowtype'] == 'VIS'){
            $html = $this->load->view('admission/phdef/offer_letter_phd_vis', $data, TRUE);
            }
            else {
            $html = $this->load->view('admission/phdef/offer_letter_phd', $data, TRUE);
            }
            pdf_create($html, $registration_no . "_PhdefApplicationOfferLetter" . $data['program_id']);
        } else {
            redirect('admission/phdef/Adm_phdef_registration/logout');
        }
    }

    function application_download_phd_ci($program_id, $program_desc)
    {

        if (is_numeric(strpos($program_desc, '%20'))) {

            $program_desc = str_replace('%20', ' ', $program_desc);
        }

        $registration_no = $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        $count_vis = 0;
        if ($registration_no && ($login_type == 'Phdef')) {
            //$info = $this->fetch_mba_detail();
            $data['val'] = "home";
            $data['application'] = $this->Phdef_all->get_application_details($registration_no);
            $data['program'] = $this->Phdef_all->get_program_details($registration_no);
            $data['tab_stat'] = $this->Phdef_all->get_tab_status($registration_no);
            $data['fellowtype'] = $this->Phdef_all->get_fellowship_details($registration_no);
            //$data['selected_payment_details'] = $this->Phd_all->get_selected_payment_details($registration_no);
            $data['program_id'] =  $program_id;
            $data['program_desc'] = $program_desc;
            $data['print'] = 'Y';
            foreach ($data['fellowtype'] as $value) {
                foreach ($data['program'] as $value) {
                    if ($value->program_id == 'ECE') {
                        $count_vis++;
                    }
                }
            }

            $data['count_ci'] = $count_ci;
            if ($count_vis > 0) {
                $html = $this->load->view('admission/phdef/interview_call_letter_phdef_vis', $data, TRUE);
            } else {
                $html = $this->load->view('admission/phdef/interview_call_letter_phdef', $data, TRUE);
            }
            //$html = $this->load->view('admission/phd/interview_call_letter_phd', $data, TRUE);
            pdf_create($html, $registration_no . "_Phdef_InterviewCallLetter" . $data['program_id']);
        } else {
            redirect('admission/Adm_registration/logout');
        }
    }

    function payment_receipt()
    {
        $registration_no = $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        if ($registration_no && ($login_type == 'Phdef')) {
            $data['application'] = $this->Phdef_all->get_application_details($registration_no);
            $html = $this->load->view('admission/phdef/adm_phdef_payment_receipt', $data, TRUE);
            pdf_create($html, $registration_no . "_Phdef_Payment_Receipt");
        } else {
            redirect('admission/phdef/Adm_phdef_registration/logout');
        }
    }


    function payment_receipt_admission()
    {

        $registration_no = $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        if ($registration_no && ($login_type == 'Phdef')) {
            $data['application'] = $this->Phdef_all->get_application_details_selected($registration_no);
            $html = $this->load->view('admission/phdef/adm_phdef_admission_payment_receipt', $data, TRUE);
            pdf_create($html, $registration_no . "_phdef_Payment_Receipt");
        } else {
            redirect('admission/phdef/Adm_phdef_registration/logout');
        }
    }
    public function fetch_Phd_detail()
    {
        $registration_no = $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        if ($registration_no && ($login_type == 'Phdef')) {
            $data['application'] = $this->Phdef_all->get_application_details($registration_no);
            $data['address'] = $this->Phdef_all->get_address($registration_no);
            $data['fellowship'] = $this->Phdef_all->get_fellowship_details($registration_no);
            $data['qulaification'] = $this->Phdef_all->get_qulaification_details($registration_no);
            $data['program'] = $this->Phdef_all->get_program_details($registration_no);
            $data['work_exp'] = $this->Phdef_all->get_work_exp_details($registration_no);
            $data['photo'] = $this->Phdef_all->get_photo_path($registration_no);
            $data['sign'] = $this->Phdef_all->get_sign_path($registration_no);
            $data['prog_spec_details'] = $this->Phdef_all->get_prog_spec_details($registration_no);
            $qrcode = $this->Phdef_all->get_qrcode_path($registration_no);
            if ($qrcode == NULL && !empty($data['application'])) {
                $data['qrcode'] = $this->qrcode_generate($data['application']);
            } elseif ($qrcode != NULL) {
                $data['qrcode'] = $qrcode[0]->doc_path;
            } else {
                $data['qrcode'] = '';
            }
            return $data;
        } else {
            redirect('admission/phdef/Adm_phdef_registration/logout');
        }
    }

    public function qrcode_generate($info)
    {
        $registration_no = $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        if ($registration_no && ($login_type == 'Phdef')) {
            $this->load->library('ciqrcode');
            $params['data'] = $registration_no . ', ' . $info[0]->first_name . " " . $info[0]->middle_name . " " . $info[0]->last_name;
            //$params['data'] = $info;
            $params['level'] = 'H';
            $params['size'] = 5;
            $params['savename'] = FCPATH . 'assets/admission/phdef/' . $registration_no . '/qrcode' . $registration_no . '.png';
            $this->ciqrcode->generate($params);
            $email = $info[0]->email;


            $connection2 = ssh2_connect('103.15.228.70', 22);
            $con2 = ssh2_auth_password($connection2, 'filesync', 'F!l3sync#@$%007');
            $sftp2 = ssh2_sftp($connection2);

            $dstFile = '/var/www/html/assets/admission/phdef/'.$registration_no.'/';
            if(!is_dir('ssh2.sftp://' . $sftp2 . $dstFile))
            {
              mkdir('ssh2.sftp://' . $sftp2 . $dstFile,0777,true);
            }

            $ImgName = 'qrcode' . $registration_no . '.png';
            $sftpStream2 = fopen('ssh2.sftp://' . intval($sftp2) . $dstFile, 'r');
            // $srcPath = '/disk2/virtualhost/admission/public_html/html/assets/admission/mba/'.$get_reg_no.'/'.$ImgName;
            $srcImg = '/disk2/virtualhost/admission/public_html/html/assets/admission/phdef/'.$registration_no.'/qrcode' . $registration_no . '.png';
            $newDstImg = $dstFile.'/'.$ImgName;
            $cond=ssh2_scp_send($connection2, $srcImg, $newDstImg, 0777);
            fclose($sftpStream2);



            $this->Phdef_all->insert_qrcode($email, $registration_no);
            return 'assets/admission/phdef/' . $registration_no . '/qrcode' . $registration_no . '.png';
        } else {
            redirect('admission/phdef/Adm_phdef_registration/logout');
        }
    }
}
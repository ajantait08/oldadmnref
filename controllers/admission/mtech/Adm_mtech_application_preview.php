<?php defined('BASEPATH') or exit('No direct script access allowed');

class Adm_mtech_application_preview extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('dompdf', 'file'));
        $this->load->model('admission/mtech/Adm_mtech_application_preview_model', 'Mtech_all', TRUE);
    }

    function index()
    {
        $registration_no= $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        $count_ml_without_payment = 0;
        $count_ml_with_payment = 0;
        $count_ml = 0;
        if($registration_no && ($login_type =='Mtech'))
        {
            $data['val'] = "home";
            $data['application'] = $this->Mtech_all->get_application_details($registration_no);
            $data['program'] = $this->Mtech_all->get_program_details($registration_no);
            $data['tab_stat'] = $this->Mtech_all->get_tab_status($registration_no);
            $data['gate_code']=$this->Mtech_all->get_gate_paper_code_subject($registration_no);
            $data['selected_program_details'] = $this->Mtech_all->get_selected_program_details($registration_no);

            $data['selected_program_details_with_payment'] = $this->Mtech_all->get_selected_program_details_with_payment($registration_no);
            // echo '<pre>';
            // print_r($data['selected_program_details_with_payment']);
            // echo '</pre>';
            // exit;
            foreach ($data['program'] as $value) {
                if ($value->admin_decision == 'ML') {
                    $count_ml++;
                }
             }

             if (empty($data['selected_program_details'])) {
                //echo 'entered';
                $data['selected_program_details_with_underscore'] = $this->Mtech_all->get_selected_program_details_with_underscore($registration_no);
                $count_ml--;
            }
             $data['count_ml'] = $count_ml;
            foreach ($data['selected_program_details'] as $value) {
               if ($value->admin_decision == 'ML' && $value->payment_status == '') {
                   $count_ml_without_payment++;
               }
               elseif ($value->admin_decision == 'ML' && $value->payment_status == 'Y') {
                $count_ml_with_payment++;
              }
              else {
                  # code...
              }
            }
            $data['count_ml_without_payment'] = $count_ml_without_payment;
            $data['count_ml_with_payment'] = $count_ml_with_payment;
            // echo "<pre>";
            // print_r($data);
            // exit;
            $this->adm_mtech_header($data);
            if ($data['application'][0]->payment_status == 'Y') {
                $this->load->view('admission/mtech/adm_mtech_status_dashboard', $data);
            } else {

                redirect('admission/mtech/Adm_mtech_user_dashboard');
            }
            // $this->adm_mtech_footer();
        }
        else {
            redirect('admission/mtech/Adm_mtech_registration/logout');
        }
    }


    function application_preview()
    {
        $registration_no= $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        if($registration_no && ($login_type =='Mtech'))
        {
            $info = $this->fetch_mtech_detail();
            $info['print'] = 'N';
            $this->load->view('admission/mtech/adm_mtech_application_preview', $info);
            $this->load->view('admission/mtech/adm_mtech_application_download');
        }
        else {
            redirect('admission/mtech/Adm_mtech_registration/logout');
        }
    }

    function admission_offer_letter(){

        $registration_no = $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        $count_ml = 0;
        //$count_ml_mba = 0;
        if ($registration_no && ($login_type == 'Mtech')) {
            $data['val'] = "home";
            $data['application'] = $this->Mtech_all->get_application_details($registration_no);
            $data['program'] = $this->Mtech_all->get_program_details($registration_no);
            $data['tab_stat'] = $this->Mtech_all->get_tab_status($registration_no);
            $data['selected_program_details'] = $this->Mtech_all->get_selected_program_details($registration_no);
            $data['selected_payment_details'] = $this->Mtech_all->get_selected_payment_details($registration_no);
            foreach ($data['program'] as $value) {
               if ($value->admin_decision == 'ML') {
                   $count_ml++;
               }
            }
            $data['count_ml'] = $count_ml;
            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';
            //exit;
            $this->adm_mtech_header($data);

            if ($data['application'][0]->payment_status == 'Y') {
                if ($data['count_ml'] > 1) {
                    $misdocfolder_mtech = '/var/www/html/assets/admission/mtech/OfferLetter/' . $registration_no . '/';
                    if(!is_dir($misdocfolder_mtech)){
                        mkdir($misdocfolder_mtech,0777,true);
                    }
                    else{
                        chmod($misdocfolder_mtech,0777);

                    }


                    $file_path = FCPATH . 'assets/admission/mtech/OfferLetter/' . $registration_no . '/Offer_letter_mtech' . $registration_no . '.pdf';
                    // if (file_exists($file_path)) {
                    //   $data['application_preview'] = $file_path;
                    // } else {
                    $data['print'] = 'Y';
                    $data['program_desc'] = $program->program_desc;
                    $data['program_id'] = $program->program_id;
                    if($data['application'][0]->appl_type=='IIT Graduates')
                    {
                    $html_mtech = $this->load->view('admission/mtech/offer_letter_mtech_iit_graduate', $data, TRUE);
                    }
                    else{
                    $html_mtech = $this->load->view('admission/mtech/offer_letter_mtech', $data, TRUE);
                    }

                    $paper = '';
                    $stream = FALSE;
                    $output_mtech = pdf_create($html_mtech, $registration_no . "_ApplicationOfferLetter", $paper, $stream);
                    $file_to_save_mtech = FCPATH . 'assets/admission/mtech/OfferLetter/' . $registration_no . '/Offer_letter_mtech' . $registration_no . '.pdf';
                    file_put_contents($file_to_save_mtech, $output_mtech);
                    $data['application_preview_mtech'] = 'assets/admission/mtech/OfferLetter/' . $registration_no . '/Offer_letter_mtech' . $registration_no . '.pdf';

                }
                else{

                    foreach($data['program'] as $program){

                        if ($program->admin_decision == 'ML') {

                            $misdocfolder_mtech = '/var/www/html/assets/admission/mtech/OfferLetter/' . $registration_no . '/';
                            if(!is_dir($misdocfolder_mtech)){
                                mkdir($misdocfolder_mtech,0777,true);
                            }
                            else{
                                chmod($misdocfolder_mtech,0777);

                            }


                            $file_path = FCPATH . 'assets/admission/mtech/OfferLetter/' . $registration_no . '/Offer_letter_mtech' . $registration_no . '.pdf';
                            // if (file_exists($file_path)) {
                            //   $data['application_preview'] = $file_path;
                            // } else {

                            $data['print'] = 'Y';
                            $data['program_desc'] = $program->program_desc;
                            $data['program_id'] = $program->program_id;
                            if($data['application'][0]->appl_type=='IIT Graduates')
                            {
                            $html_mtech = $this->load->view('admission/mtech/offer_letter_mtech_iit_graduate', $data, TRUE);
                            }
                            else{
                            $html_mtech = $this->load->view('admission/mtech/offer_letter_mtech', $data, TRUE);
                            }
                            //exit;
                            $paper = '';
                            $stream = FALSE;
                            $output_mtech = pdf_create($html_mtech, $registration_no . "_ApplicationOfferLetter", $paper, $stream);
                            $file_to_save_mtech = FCPATH . 'assets/admission/mtech/OfferLetter/' . $registration_no . '/offer_letter_mtech' . $registration_no . '.pdf';
                            file_put_contents($file_to_save_mtech, $output_mtech);
                            $data['application_preview_mtech'] = 'assets/admission/mtech/OfferLetter/' . $registration_no . '/offer_letter_mtech' . $registration_no . '.pdf';
                    }
                    // elseif($program->admin_decision_status == 'ML' && $program->program_id == 'ba'){

                    //     $misdocfolder_mba_ba = '/var/www/html/assets/admission/mba/OfferLetter/' . $registration_no . '/';
                    // if(!is_dir($misdocfolder_mba_ba)){
                    //     mkdir($misdocfolder_mba_ba,0777,true);
                    // }
                    // else{
                    //     chmod($misdocfolder_mba_ba,0777);

                    // }
                    // $file_path = FCPATH . 'assets/admission/mba/OfferLetter/' . $registration_no . '/Offer_letter_mba_ba' . $registration_no . '.pdf';
                    // // if (file_exists($file_path)) {
                    // //   $data['application_preview'] = $file_path;
                    // // } else {
                    // $data['print'] = 'Y';

                    // $html_mba_ba = $this->load->view('admission/offer_letter_mba_ba', $data, TRUE);
                    // //echo $html_mba_ba;
                    // //exit;
                    // $paper = '';
                    // $stream = FALSE;

                    // $output_mba_ba = pdf_create($html_mba_ba, $registration_no . "_ApplicationOfferLetter", $paper, $stream);

                    // $file_to_save_mba_ba = FCPATH . 'assets/admission/mba/OfferLetter/' . $registration_no . '/Offer_letter_mba_ba' . $registration_no . '.pdf';

                    // file_put_contents($file_to_save_mba_ba, $output_mba_ba);
                    // $data['application_preview_mba'] = 'assets/admission/mba/OfferLetter/' . $registration_no . '/Offer_letter_mba_ba' . $registration_no . '.pdf';

                    // }

                    else {

                    }

                }
            }

                $this->load->view('admission/mtech/adm_mtech_offer_letter', $data);
            }
            else
            {
                redirect('admission/Adm_mba_user_dashboard');
            }
            $this->adm_mtech_footer();
        }
        else
        {

            redirect('admission/Adm_registration/logout');
        }
    }

    function application_download_mtech(){

        $registration_no = $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');

        if ($registration_no && ($login_type == 'Mtech')) {
            //$info = $this->fetch_mba_detail();
            $data['val'] = "home";
            $data['application'] = $this->Mtech_all->get_application_details($registration_no);
            $data['program'] = $this->Mtech_all->get_program_details($registration_no);
            $data['tab_stat'] = $this->Mtech_all->get_tab_status($registration_no);
            $data['selected_payment_details'] = $this->Mtech_all->get_selected_payment_details($registration_no);
            #echo $this->db->last_query(); die();
            $count_ml = 0;
            foreach ($data['program'] as $value) {
                if ($value->admin_decision == 'ML') {
                    $count_ml++;
                }
             }
             $data['count_ml'] = $count_ml;

             foreach($data['program'] as $program){

                if ($program->admin_decision == 'ML') {

                    $data['program_desc'] = $program->program_desc;
                    $data['program_id'] = $program->program_id;
                }
            }
            // echo '<pre>';
            // print_r($data['selected_payment_details']);
            // echo '</pre>';
            // exit;
            $data['print'] = 'Y';
            if($data['application'][0]->appl_type=='IIT Graduates')
            {
            $html = $this->load->view('admission/mtech/offer_letter_mtech_iit_graduate', $data, TRUE);
            }
            else{
            $html = $this->load->view('admission/mtech/offer_letter_mtech', $data, TRUE);
            }
            pdf_create($html, $registration_no . "_Mtech_OfferLetter");
        } else {
            redirect('admission/Adm_registration/logout');
        }
    }

    function application_download()
    {
        $registration_no= $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        if($registration_no && ($login_type =='Mtech'))
        {
            $info = $this->fetch_mtech_detail();
            $info['print'] = 'Y';
            $html = $this->load->view('admission/mtech/adm_mtech_application_preview', $info, TRUE);
            pdf_create($html, $registration_no."_Mtech_Application");
        }
        else {
            redirect('admission/mtech/Adm_mtech_registration/logout');
        }
    }

    function payment_receipt()
    {
        $registration_no= $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        if($registration_no && ($login_type =='Mtech'))
        {
            $data['application'] = $this->Mtech_all->get_application_details($registration_no);
            $html = $this->load->view('admission/mtech/adm_mtech_payment_receipt', $data, TRUE);
            pdf_create($html, $registration_no."_Mtech_Payment_Receipt");
        }
        else {
            redirect('admission/mtech/Adm_mtech_registration/logout');
        }
    }

    function payment_receipt_admission(){

        $registration_no = $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        if ($registration_no && ($login_type == 'Mtech')) {
            $data['application'] = $this->Mtech_all->get_application_details_selected($registration_no);
            $html = $this->load->view('admission/mtech/adm_mtech_admission_payment_receipt', $data, TRUE);
            pdf_create($html, $registration_no . "_Mtech_Payment_Receipt");
        } else {
            redirect('admission/mtech/Adm_mtech_registration/logout');
        }
    }

    public function fetch_mtech_detail()
    {
        $registration_no= $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        if($registration_no && ($login_type =='Mtech'))
        {
            $data['application'] = $this->Mtech_all->get_application_details($registration_no);
            $data['address'] = $this->Mtech_all->get_address($registration_no);
            $data['fellowship'] = $this->Mtech_all->get_fellowship_details($registration_no);
            $data['qulaification'] = $this->Mtech_all->get_qulaification_details($registration_no);
            $data['program'] = $this->Mtech_all->get_program_details($registration_no);
            $data['work_exp'] = $this->Mtech_all->get_work_exp_details($registration_no);
            $data['photo'] = $this->Mtech_all->get_photo_path($registration_no);
            $data['sign'] = $this->Mtech_all->get_sign_path($registration_no);
            $data['gate_code']=$this->Mtech_all->get_gate_paper_code_subject($registration_no);
            $qrcode = $this->Mtech_all->get_qrcode_path($registration_no);
            if ($qrcode == NULL && !empty($data['application'])) {
                $data['qrcode'] = $this->qrcode_generate($data['application']);
            } elseif ($qrcode != NULL) {
                $data['qrcode'] = $qrcode[0]->doc_path;
            } else {
                $data['qrcode'] = '';
            }
            return $data;
        }
        else {
            redirect('admission/mtech/Adm_mtech_registration/logout');
        }
    }

    public function qrcode_generate($info)
    {
        $registration_no= $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        if($registration_no && ($login_type =='Mtech'))
        {
            $this->load->library('ciqrcode');
            $params['data']= $registration_no . ', ' .$info[0]->first_name . " " . $info[0]->middle_name . " " . $info[0]->last_name;
           //$params['data'] = $info;
            $params['level'] = 'H';
            $params['size'] = 5;
            $params['savename'] = FCPATH . 'assets/admission/mtech/' . $registration_no . '/qrcode' . $registration_no . '.png';
            $this->ciqrcode->generate($params);
            $email = $info[0]->email;
            $this->Mtech_all->insert_qrcode($email, $registration_no);
            return 'assets/admission/mtech/' . $registration_no . '/qrcode' . $registration_no . '.png';
        }
        else {
            redirect('admission/mtech/Adm_mtech_registration/logout');
        }
    }
}

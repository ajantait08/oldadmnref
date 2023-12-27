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
        if($registration_no && ($login_type =='Mtech'))
        {
            $data['val'] = "home";
            $data['application'] = $this->Mtech_all->get_application_details($registration_no);
            $data['program'] = $this->Mtech_all->get_program_details($registration_no);
            $data['tab_stat'] = $this->Mtech_all->get_tab_status($registration_no);
            // echo "<pre>";
            // print_r($data);
            // exit;
            $this->adm_mtech_header($data);
            if ($data['application'][0]->payment_status == 'Y') {
                $this->load->view('admission/mtech/adm_mtech_status_dashboard', $data);
            } else {
                $viewdata['name'] = $this->session->userdata('name');
                $this->load->view('admission/mtech/adm_mtech_apply', $viewdata);
            }
            $this->adm_mtech_footer();
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

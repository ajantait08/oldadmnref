<?php defined('BASEPATH') or exit('No direct script access allowed');

class Adm_mba_application_preview extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('dompdf', 'file'));
        $this->load->model('admission/Adm_mba_application_preview_model', 'Mba_all', TRUE);
        define('ftp_host','103.15.228.70'); // address of online.iitism.ac.in // making the connection from misdev and pbeta
        // define('ftp_host','172.16.200.86'); // address of beta.iitism.ac.in  // making the connection from misdev and pbeta
        define('ftp_user_name','filesync');
        define('ftp_user_pass','F!l3sync#@$%007');
    }

    function index()
    {
        $registration_no = $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        $count_ml_without_payment = 0;
        $count_ml_with_payment = 0;
		$interview_count = 2;
        if ($registration_no && ($login_type == 'MBA')) {
            $data['val'] = "home";
            $data['application'] = $this->Mba_all->get_application_details($registration_no);
            $data['program'] = $this->Mba_all->get_program_details($registration_no);
            $data['tab_stat'] = $this->Mba_all->get_tab_status($registration_no);
            $data['selected_program_details'] = $this->Mba_all->get_selected_program_details($registration_no);
            $data['selected_program_details_with_payment'] = $this->Mba_all->get_selected_program_details_with_payment($registration_no);
            /*echo '<pre>';
            print_r($data);
            echo '</pre>';
            exit;*/
            foreach ($data['selected_program_details'] as $value) {
               if ($value->admin_decision_status == 'ML' && $value->payment_status == '') {
                   $count_ml_without_payment++;
				   $interview_count = 0;
               }
               elseif ($value->admin_decision_status == 'ML' && $value->payment_status == 'Y') {
                $count_ml_with_payment++;
				$interview_count = 0;
              }
              else {
                  # code...
              }
            }
            $data['count_ml_without_payment'] = $count_ml_without_payment;
            $data['count_ml_with_payment'] = $count_ml_with_payment;
			$data['interview_count'] = $interview_count;
            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';
            // exit;

           
            if ($data['application'][0]->payment_status == 'Y') {
                
                $file_to_save = FCPATH . 'assets/admission/mba/' . $registration_no . '/Application_form' . $registration_no . '.pdf';
                $files =(file_exists($file_to_save));
                if(!$files)
                {
                  $this->save_application_form();
                  $connection2 = ssh2_connect('103.15.228.70', 22);
                  $con2 = ssh2_auth_password($connection2, 'filesync', 'F!l3sync#@$%007');
                  $sftp2 = ssh2_sftp($connection2);

                  $dstFile = '/var/www/html/assets/admission/mba/'.$registration_no.'/';
                  if(!is_dir('ssh2.sftp://' . $sftp2 . $dstFile))
                  {
                    mkdir('ssh2.sftp://' . $sftp2 . $dstFile,0777,true);
                  }
                    // after successfully upload image in newadmission then store in other server folder
                  $ImgName = 'Application_form' . $registration_no . '.pdf';
                  $sftpStream2 = fopen('ssh2.sftp://' . intval($sftp2) . $dstFile, 'r');
                  // $srcPath = '/disk2/virtualhost/admission/public_html/html/assets/admission/mba/'.$get_reg_no.'/'.$ImgName;
                  $srcImg = '/disk2/virtualhost/admission/public_html/html/assets/admission/mba/'.$registration_no.'/Application_form' . $registration_no . '.pdf';
                  $newDstImg = $dstFile.'/'.$ImgName;
                  $cond=ssh2_scp_send($connection2, $srcImg, $newDstImg, 0777);
                  fclose($sftpStream2);
                  // after successfully upload image in newadmission then store in other server folder

                }
                $this->adm_mba_header($data);
                $this->load->view('admission/adm_mba_status_dashboard', $data);
            }
            else
            {
                redirect('admission/Adm_mba_user_dashboard');
            }
            $this->adm_mba_footer();
        }
        else
        {

            redirect('admission/Adm_registration/logout');
        }
    }

    function get_selected_data(){
        $offervalue = $_REQUEST['offervalue'];
        $reg_no = $_REQUEST['reg_no'];
        $response_selected_data = $this->Mba_all->get_selected_data_reg_no($offervalue,$reg_no);
        $current_date = date('Y-m-d');
        $start_date = date('Y-m-d', strtotime($response_selected_data[0]->start_date));
        $end_date = date('Y-m-d', strtotime($response_selected_data[0]->end_date));
        $payment_status = $response_selected_data[0]->payment_status;
        if ($start_date <= $current_date && $end_date >= $current_date && $payment_status == '') {
            //$array = array('pay_open' => 1);
            //echo json_encode($array);
            echo '1';
        }
        else{
            //$array = array('pay_open' => 0);
            //echo json_encode($array);
            echo '2';
        }

    }

    function admission_offer_letter(){

        $registration_no = $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        $count_ml = 0;
        $count_ml_mba = 0;
        if ($registration_no && ($login_type == 'MBA')) {
            $data['val'] = "home";
            $data['application'] = $this->Mba_all->get_application_details($registration_no);
            $data['program'] = $this->Mba_all->get_program_details($registration_no);
            $data['tab_stat'] = $this->Mba_all->get_tab_status($registration_no);
            $data['selected_program_details'] = $this->Mba_all->get_selected_program_details($registration_no);
            $data['selected_payment_details'] = $this->Mba_all->get_selected_payment_details($registration_no);
            $data['array_selected_ba'] = array();
            $data['array_selected_mba'] = array();
            foreach ($data['program'] as $value) {
               if ($value->admin_decision_status == 'ML') {
                   $count_ml++;
               }
            }
            $data['count_ml'] = $count_ml;
            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';
            // exit;
            $this->adm_mba_header($data);
            if ($data['application'][0]->payment_status == 'Y') {
                if ($data['count_ml'] > 1) {
                    foreach ($data['selected_program_details'] as $value) {
                        if ($value->program_id == 'ba') {
                            array_push($data['array_selected_ba'],$data['selected_program_details']);
                        }
                        elseif($value->program_id == 'mba') {
                            array_push($data['array_selected_mba'],$data['selected_program_details']);
                        }
                        else {
                            # code...
                        }
                    }

                    $misdocfolder_mba = '/var/www/html/assets/admission/mba/OfferLetter/' . $registration_no . '/';
                    if(!is_dir($misdocfolder_mba)){
                        mkdir($misdocfolder_mba,0777,true);
                    }
                    else{
                        chmod($misdocfolder_mba,0777);

                    }

                    $misdocfolder_mba_ba = '/var/www/html/assets/admission/mba_ba/OfferLetter/' . $registration_no . '/';
                    if(!is_dir($misdocfolder_mba_ba)){
                        mkdir($misdocfolder_mba_ba,0777,true);
                    }
                    else{
                        chmod($misdocfolder_mba_ba,0777);

                    }

                    $file_path = FCPATH . 'assets/admission/mba/OfferLetter/' . $registration_no . '/Offer_letter_mba' . $registration_no . '.pdf';
                    // if (file_exists($file_path)) {
                    //   $data['application_preview'] = $file_path;
                    // } else {
                    $data['print'] = 'Y';
                    $html_mba = $this->load->view('admission/offer_letter_mba', $data, TRUE);
                    //echo $html_mba;
                    $html_mba_ba = $this->load->view('admission/offer_letter_mba_ba', $data, TRUE);
                    //echo $html_mba_ba;
                    //exit;
                    $paper = '';
                    $stream = FALSE;
                    $output_mba = pdf_create($html_mba, $registration_no . "_ApplicationOfferLetter", $paper, $stream);
                    $output_mba_ba = pdf_create($html_mba_ba, $registration_no . "_ApplicationOfferLetter", $paper, $stream);
                    $file_to_save_mba = FCPATH . 'assets/admission/mba/OfferLetter/' . $registration_no . '/Offer_letter_mba' . $registration_no . '.pdf';
                    $file_to_save_mba_ba = FCPATH . 'assets/admission/mba_ba/OfferLetter/' . $registration_no . '/Offer_letter_mba_ba' . $registration_no . '.pdf';
                    file_put_contents($file_to_save_mba, $output_mba);
                    file_put_contents($file_to_save_mba, $output_mba_ba);
                    $data['application_preview_mba'] = 'assets/admission/mba/OfferLetter/' . $registration_no . '/Offer_letter_mba' . $registration_no . '.pdf';
                    $data['application_preview_mba_ba'] = 'assets/admission/mba_ba/OfferLetter/' . $registration_no . '/Offer_letter_mba_ba' . $registration_no . '.pdf';
                }
                else{

                    foreach($data['program'] as $program){

                        if ($program->admin_decision_status == 'ML' && $program->program_id == 'mba') {

                            foreach ($data['selected_program_details'] as $value) {

                                    array_push($data['array_selected_mba'],$data['selected_program_details']);

                            }


                    $misdocfolder = '/var/www/html/assets/admission/mba/OfferLetter/' . $registration_no . '/';
                    if(!is_dir($misdocfolder)){
                        mkdir($misdocfolder,0777,true);
                    }
                    else{
                        chmod($misdocfolder,0777);

                    }
                    $file_path = FCPATH . 'assets/admission/mba/OfferLetter/' . $registration_no . '/Offer_letter_mba' . $registration_no . '.pdf';
                    // if (file_exists($file_path)) {
                    //   $data['application_preview'] = $file_path;
                    // } else {
                    $data['print'] = 'Y';
                    $html_mba = $this->load->view('admission/offer_letter_mba', $data, TRUE);
                    //echo $html_mba;
                    #$html_mba_ba = $this->load->view('admission/offer_letter_mba_ba', $data, TRUE);
                    //echo $html_mba_ba;
                    //exit;
                    $paper = '';
                    $stream = FALSE;
                    $output_mba = pdf_create($html_mba, $registration_no . "_ApplicationOfferLetter", $paper, $stream);
                    #$output_mba_ba = pdf_create($html_mba_ba, $registration_no . "_ApplicationOfferLetter", $paper, $stream);
                    $file_to_save_mba = FCPATH . 'assets/admission/mba/OfferLetter/' . $registration_no . '/Offer_letter_mba' . $registration_no . '.pdf';
                    #$file_to_save_mba_ba = FCPATH . 'assets/admission/mba/OfferLetter/' . $registration_no . '/Offer_letter_mba_ba' . $registration_no . '.pdf';
                    file_put_contents($file_to_save_mba, $output_mba);
                    #file_put_contents($file_to_save_mba, $output_mba_ba);
                    $data['application_preview_mba'] = 'assets/admission/mba/OfferLetter/' . $registration_no . '/Offer_letter_mba' . $registration_no . '.pdf';

                    }
                    elseif($program->admin_decision_status == 'ML' && $program->program_id == 'ba'){

                        foreach ($data['selected_program_details'] as $value) {

                            array_push($data['array_selected_ba'],$data['selected_program_details']);

                    }


                        $misdocfolder_mba_ba = '/var/www/html/assets/admission/mba/OfferLetter/' . $registration_no . '/';
                    if(!is_dir($misdocfolder_mba_ba)){
                        mkdir($misdocfolder_mba_ba,0777,true);
                    }
                    else{
                        chmod($misdocfolder_mba_ba,0777);

                    }
                    $file_path = FCPATH . 'assets/admission/mba/OfferLetter/' . $registration_no . '/Offer_letter_mba_ba' . $registration_no . '.pdf';
                    // if (file_exists($file_path)) {
                    //   $data['application_preview'] = $file_path;
                    // } else {
                    $data['print'] = 'Y';

                    $html_mba_ba = $this->load->view('admission/offer_letter_mba_ba', $data, TRUE);
                    //echo $html_mba_ba;
                    //exit;
                    $paper = '';
                    $stream = FALSE;

                    $output_mba_ba = pdf_create($html_mba_ba, $registration_no . "_ApplicationOfferLetter", $paper, $stream);

                    $file_to_save_mba_ba = FCPATH . 'assets/admission/mba/OfferLetter/' . $registration_no . '/Offer_letter_mba_ba' . $registration_no . '.pdf';

                    file_put_contents($file_to_save_mba_ba, $output_mba_ba);
                    $data['application_preview_mba'] = 'assets/admission/mba/OfferLetter/' . $registration_no . '/Offer_letter_mba_ba' . $registration_no . '.pdf';

                    }

                    else {

                    }

                }
            }

                $this->load->view('admission/adm_mba_offer_letter', $data);
            }
            else
            {
                redirect('admission/Adm_mba_user_dashboard');
            }
            $this->adm_mba_footer();
        }
        else
        {

            redirect('admission/Adm_registration/logout');
        }
    }

    function application_download_mba(){

        $registration_no = $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');

        $data['array_selected_mba'] = array();
        if ($registration_no && ($login_type == 'MBA')) {
            //$info = $this->fetch_mba_detail();
            $data['val'] = "home";
            $data['application'] = $this->Mba_all->get_application_details($registration_no);
            $data['program'] = $this->Mba_all->get_program_details($registration_no);
            $data['tab_stat'] = $this->Mba_all->get_tab_status($registration_no);
            $data['selected_payment_details'] = $this->Mba_all->get_selected_payment_details($registration_no);
            foreach ($data['selected_payment_details'] as $value) {
                if ($value->program_id=='mba') {
                array_push($data['array_selected_mba'],$data['selected_payment_details']);
                }

        }
            $data['print'] = 'Y';
            $html = $this->load->view('admission/offer_letter_mba', $data, TRUE);
            pdf_create($html, $registration_no . "_Mba_OfferLetter");
        } else {
            redirect('admission/Adm_registration/logout');
        }
    }

    function application_download_mba_ba(){

        $registration_no = $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        $data['array_selected_ba'] = array();
        if ($registration_no && ($login_type == 'MBA')) {
            //$info = $this->fetch_mba_detail();
            $data['val'] = "home";
            $data['application'] = $this->Mba_all->get_application_details($registration_no);
            $data['program'] = $this->Mba_all->get_program_details($registration_no);
            $data['tab_stat'] = $this->Mba_all->get_tab_status($registration_no);
            $data['selected_payment_details'] = $this->Mba_all->get_selected_payment_details($registration_no);

            //print_r($data['selected_payment_details']);

            foreach ($data['selected_payment_details'] as $value) {
                if ($value->program_id=='ba') {
                array_push($data['array_selected_ba'],$data['selected_payment_details']);
                }

        }
            $data['print'] = 'Y';
            $html = $this->load->view('admission/offer_letter_mba_ba', $data, TRUE);
            pdf_create($html, $registration_no . "_Mba_ba_OfferLetter");
        } else {
            redirect('admission/Adm_registration/logout');
        }
    }


    function application_preview()
    {
        $registration_no = $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        if ($registration_no && ($login_type == 'MBA')) {
            $info = $this->fetch_mba_detail();
            $info['print'] = 'N';
            $this->load->view('admission/adm_mba_application_preview', $info);
            $this->load->view('admission/adm_mba_application_download');
        } 
        else
        {
            redirect('admission/Adm_registration/logout');
        }
    }

    function application_download()
    {   
        
        $registration_no = $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        if ($registration_no && ($login_type == 'MBA')) {
            $info = $this->fetch_mba_detail();
            $info['print'] = 'Y';
            $html = $this->load->view('admission/adm_mba_application_preview', $info, TRUE);
            pdf_create($html, $registration_no . "_Mba_Application");
        } else {
            redirect('admission/Adm_registration/logout');
        }
    }

    function payment_receipt()
    {
        $registration_no = $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        if ($registration_no && ($login_type == 'MBA')) {
            $data['application'] = $this->Mba_all->get_application_details($registration_no);
            $html = $this->load->view('admission/adm_mba_payment_receipt', $data, TRUE);
            pdf_create($html, $registration_no . "_Mba_Payment_Receipt");
        } else {
            redirect('admission/Adm_registration/logout');
        }
    }

    function payment_receipt_admission(){

        $registration_no = $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        if ($registration_no && ($login_type == 'MBA')) {
            $data['application'] = $this->Mba_all->get_application_details_selected($registration_no);
            $html = $this->load->view('admission/adm_mba_admission_payment_receipt', $data, TRUE);
            pdf_create($html, $registration_no . "_Mba_Payment_Receipt");
        } else {
            redirect('admission/Adm_registration/logout');
        }
    }
    public function fetch_mba_detail()
    {
        $registration_no = $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        if ($registration_no && ($login_type == 'MBA')) {
            $data['application'] = $this->Mba_all->get_application_details($registration_no);
            $data['address'] = $this->Mba_all->get_address($registration_no);
            $data['fellowship'] = $this->Mba_all->get_fellowship_details($registration_no);
            $data['qulaification'] = $this->Mba_all->get_qulaification_details($registration_no);
            $data['program'] = $this->Mba_all->get_program_details($registration_no);
            $data['work_exp'] = $this->Mba_all->get_work_exp_details($registration_no);
            $data['doc'] = $this->Mba_all->get_doc_path($registration_no);
            $data['photo'] = $this->Mba_all->get_photo_path($registration_no);
            $data['sign'] = $this->Mba_all->get_sign_path($registration_no);
            $data['inteview_location'] = $this->Mba_all->get_call_int_loc($registration_no);
            $qrcode = $this->Mba_all->get_qrcode_path($registration_no);
            if ($qrcode == NULL && !empty($data['application'])) {
                $data['qrcode'] = $this->qrcode_generate($data['application']);
            } elseif ($qrcode != NULL) {
                $data['qrcode'] = $qrcode[0]->doc_path;
            } else {
                $data['qrcode'] = '';
            }
            // $data['totalexp']=$this->totalexperincecount($data['work_exp']);
            if ($data['work_exp']) {
                $data['totalexp'] = 0;
                foreach ($data['work_exp'] as $value) {
                    $data['totalexp'] = $data['totalexp'] + $value->duration_in_month;
                }
            }
            return $data;
        } else {
            redirect('admission/Adm_registration/logout');
        }
    }

    public function qrcode_generate($info)
    {
        $registration_no = $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        if ($registration_no && ($login_type == 'MBA')) {
            $this->load->library('ciqrcode');
            $params['data'] = $registration_no . ', ' . $info[0]->first_name . " " . $info[0]->middle_name . " " . $info[0]->last_name;
            $params['level'] = 'H';
            $params['size'] = 5;
            $params['savename'] = FCPATH . 'assets/admission/mba/' . $registration_no . '/qrcode' . $registration_no . '.png';
            $this->ciqrcode->generate($params);
            $email = $info[0]->email;
            $this->Mba_all->insert_qrcode($email, $registration_no);
            return 'assets/admission/mba/' . $registration_no . '/qrcode' . $registration_no . '.png';
        } else {
            redirect('admission/Adm_registration/logout');
        }
    }

    public function totalexperincecount($work)
    {
        if (empty($work)) {
            return false;
        }
        $date1 = "0001-11-30";
        foreach ($work as $value) {
            $vtotal = $date1;
            $date3 = date_create($vtotal);
            $t = date_create($value->to_date);
            $j = date_create($value->from_date);
            $interval = date_diff($j->setTime(24, 48, 0), $t->setTime(24, 48, 0));
            $val = $interval->format("%Y Y, %M M, %d D");
            $mont[] = $interval->format('%m');
            $day[] = $interval->format('%d') + '1';
            $yea[] = $interval->format('%y');
        }
        $totalsyerar = 0000;
        $totalsmonth = 00;
        $totalsdays = 00;
        foreach ($yea as $year) {
            $totalsyerar = $totalsyerar + $year;
        }
        foreach ($mont as $month) {
            $totalsmonth = $totalsmonth + $month;
        }
        foreach ($day as $days) {
            $totalsdays = $totalsdays + $days;
        }
        if ($totalsdays >= 30) {
            $quotientd = (int)($totalsdays / 30);
            $remainderd = $totalsdays % 30;
            $totalsmonth = $totalsmonth + $quotientd;
            $totalsdays = $remainderd;
        }
        if ($totalsmonth >= 12) {
            $quotientm = (int)($totalsmonth / 12);
            $remainderm = $totalsmonth % 12;
            $totalsyerar = $totalsyerar + $quotientm;
            $totalsmonth = $remainderm;
        }
        $val2 = $totalsyerar . " Y," . " " . $totalsmonth . " M," . " " . $totalsdays . " D";
        return $val2;
    }

    public function downloadpdf()
    {
        $registration_no = $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        if ($registration_no && ($login_type == 'MBA')) {
            $info = $this->fetch_mba_detail();
            $info['print'] = 'Y';
            $html = $this->load->view('admission/adm_mba_application_preview', $info, TRUE);
            $paper = '';
            $stream = FALSE;
            $output = pdf_create($html, $registration_no . "_ApplicationForm", $paper, $stream);
            $file_to_save = FCPATH . 'assets/admission/mba/' . $registration_no . '/Application_form' . $registration_no . '.pdf';
            file_put_contents($file_to_save, $output);
            $this->load->library('Zip');
            $this->load->helper('file');
            $this->zip->read_file($file_to_save);
            foreach ($info['doc'] as $fs) {
                if ($fs->doc_id != 'qrcode') {
                    $filepaths = FCPATH . $fs->doc_path;
                    $this->zip->read_file($filepaths);
                }
            }
            $filenamed = $registration_no . "document.zip";
            $this->zip->download($filenamed);
        } else {
            redirect('admission/Adm_registration/logout');
        }
    }
    public function save_application_form()
    {
        $registration_no = $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        if ($registration_no && ($login_type == 'MBA')) {
            $info = $this->fetch_mba_detail();
            $info['print'] = 'Y';
            $html = $this->load->view('admission/adm_mba_application_preview', $info, TRUE);
            $paper = '';
            $stream = FALSE;
            $output = pdf_create($html, $registration_no . "_ApplicationForm", $paper, $stream);
            $file_to_save = FCPATH . 'assets/admission/mba/' . $registration_no . '/Application_form' . $registration_no . '.pdf';
            file_put_contents($file_to_save, $output); 
        } 
    }
}

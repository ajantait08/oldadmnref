<?php

class Documents_download extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('admission/phd/admin/Phd_dashboard_model', 'phd_all', TRUE);
    $this->load->model('admission/phd/Adm_phd_application_preview_model', 'phd_one', TRUE);
    $this->load->model('admission/phd/admin/Adm_admin_user_model', 'fetch_admin', TRUE);
    $this->load->helper(array('dompdf', 'file'));
    $this->load->library('PHPExcel');
    $this->load->library('PHPExcel/IOFactory');
  }

  public function download_CI_documents()
  {
    $userid = $this->session->userdata('userid');
    $user_type = $this->session->userdata('user_type');
    if ($userid && ($user_type == 'phd-admin')) {
        echo 'entered';
    } else {
        echo 'not entered';
        redirect('admission/phd/admin/dashboard/logout');
      }
    }

    public function candidate_list_zip_download(){
        $data['program_id'] = $this->input->post('program_id');
        $data['candidate_list'] = $this->phd_all->get_candidate_list_by_program($data['program_id']);
        if (!empty($data['candidate_list'])) {
        $data['total_no_of_enteries'] = count($data['candidate_list']);
        }
        $this->load->view('admission/phd/admin/layout/header');
        $this->load->view('admission/phd/admin/consolidated_ci_zip_download', $data);
        $this->load->view('admission/phd/admin/layout/footer');
    }



    public function download_zip(){

        $this->load->library('Zip');
        $this->load->helper('file');
        $this->zip->compression_level = 2;
        $program_id = $this->input->post('program_id');
        $total_sets_to_be_downloaded = $this->input->post('required_sets');
        $required_sets_offset = explode('-',$total_sets_to_be_downloaded);
        $offset_1 = $required_sets_offset['0'];
        $offset_2 = $required_sets_offset['1'];
        /* add directories to a ZIP */
        $programid_filename = $program_id.' ('.$offset_1.'-'.$offset_2.' Sets'.')'.'.zip';
        $data['candidate_list'] = $this->phd_all->get_candidate_list_by_program_with_limit($program_id,$offset_1,$offset_2);
        foreach ($data['candidate_list'] as $value) {

            $info = $this->fetch_phd_detail($value->registration_no);
            $info['print'] = 'Y';
            $html = $this->load->view('admission/phd/adm_phd_application_preview', $info, TRUE);
            $paper = '';
            $stream = FALSE;
            $output = pdf_create($html, $value->registration_no . "_ApplicationForm", $paper, $stream);
            $file_to_save = FCPATH . 'assets/admission/phd/' . $value->registration_no . '/Application_form' . $value->registration_no . '.pdf';
            file_put_contents($file_to_save, $output);

            //$info['doc'] = $this->phd_all->get_doc_path($value->registration_no);
            foreach ($info['doc'] as $fs) {
                $doc_array_path = explode('/',$fs->doc_path)['4'];
                $this->zip->add_data($value->registration_no.'/'.$doc_array_path,file_get_contents(FCPATH . $fs->doc_path));
                $this->zip->add_data($value->registration_no.'/Application_form'.$value->registration_no . '.pdf',file_get_contents(FCPATH . 'assets/admission/phd/' . $value->registration_no . '/Application_form' . $value->registration_no . '.pdf'));
            }

        }

        //$this->zip->archive(FCPATH.'assets/admission/phd/'.$programid_filename,false);

        $this->zip->download($programid_filename);

        /* add directories to a ZIP */
    }

    public function fetch_phd_detail($registration_no)
  {
      // echo $registration_no;
      // exit;
    //   $user_array = $this->session->userdata;
    //   $user_dept = $user_array['dept_id'];
      $data['application'] = $this->phd_one->get_application_details($registration_no);

      $data['address'] = $this->phd_one->get_address($registration_no);
      // echo $this->db->last_query();
      // exit;
      $data['fellowship'] = $this->phd_one->get_fellowship_details($registration_no);
      $data['qulaification'] = $this->phd_one->get_qulaification_details($registration_no);
      $data['program'] = $this->phd_one->get_program_details($registration_no);
      $data['work_exp'] = $this->phd_one->get_work_exp_details($registration_no);
      $data['doc'] = $this->phd_one->get_doc_path($registration_no);
      $data['photo'] = $this->phd_one->get_photo_path($registration_no);
      $data['sign'] = $this->phd_one->get_sign_path($registration_no);
      $qrcode = $this->phd_one->get_qrcode_path($registration_no);
      if ($qrcode == NULL && !empty($data['application'])) {
        $data['qrcode'] = $this->qrcode_generate($data['application']);
      } elseif($qrcode != NULL && file_exists($qrcode[0]->doc_path)){
        $data['qrcode'] = $qrcode[0]->doc_path;
      } elseif (!file_exists($qrcode[0]->doc_path)) {
        //$data['qrcode'] = $qrcode[0]->doc_path;
        $cond=array(
          'registration_no' =>$registration_no,
          'doc_id' => 'qrcode'
        );
        $this->phd_one->insert_document_log($cond);
        $data['qrcode'] = $this->qrcode_generate($data['application']);
      } else {
        $data['qrcode'] = '';
      }
      if ($data['work_exp']) {
        $data['totalexp'] = 0;
        foreach ($data['work_exp'] as $value) {
          $data['totalexp'] = $data['totalexp'] + $value->duration_in_month;
        }
      }
      return $data;

  }

  public function qrcode_generate($info)
  {
    // $userid = $this->session->userdata('userid');
    // $user_type = $this->session->userdata('user_type');
    // if ($userid && ($user_type == 'mba-admin')) {

      //$registration_no = $this->session->userdata('registration_no');
      $registration_no = $info[0]->registration_no;
      $this->load->library('ciqrcode');
      $params['data'] = $registration_no . ', ' . $info[0]->first_name . " " . $info[0]->middle_name . " " . $info[0]->last_name;
      $params['level'] = 'H';
      $params['size'] = 5;
      $params['savename'] = FCPATH . 'assets/admission/phd/' . $registration_no . '/qrcode' . $registration_no . '.png';
      $this->ciqrcode->generate($params);
      $email = $info[0]->email;
      $this->phd_one->insert_qrcode($email, $registration_no);
      return 'assets/admission/phd/' . $registration_no . '/qrcode' . $registration_no . '.png';
    // } else {
    //   redirect('admission/Dashboard/logout');
    // }
  }


    // public function download_zip_copy_nested(){

    //     $registration_no = $this->input->post('reg_no');
    //     $info['doc'] = $this->phd_all->get_doc_path($registration_no);
    //     $this->load->library('Zip');
    //     $this->load->helper('file');
    //     //$this->zip->read_file($file_to_save);
    //     foreach ($info['doc'] as $fs) {
    //         $filepaths = FCPATH . $fs->doc_path;
    //         $this->zip->read_file($filepaths,false);
    //     }
    //     $filenamed = $registration_no . "document1.zip";
    //     $this->zip->download($filenamed);
    // }

}
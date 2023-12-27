<?php

class Dashboard extends MY_Controller
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

  public function index()
  {
    $userid = $this->session->userdata('userid');
    $user_type = $this->session->userdata('user_type');
    if ($userid && ($user_type == 'phd-admin')) {
      $applications = $this->phd_all->get_application_by_status();
      $appl_count = $this->phd_all->get_application_count();
      foreach ($applications as $applicant) {
        if ($applicant->Application_Status == 'PD') {
          $applicant->Application_Status = 'Applied';
        } elseif ($applicant->Application_Status == 'DU') {
          $applicant->Application_Status = 'Document Uploaded';
        } elseif ($applicant->Application_Status == 'PF') {
          $applicant->Application_Status = 'Partially Filled';
        } else {
          $applicant->Application_Status = 'Registered';
        }
      }
      $data['appl_status'] = $applications;
      $data['appl_count'] = $appl_count;
      $this->load->view('admission/phd/admin/layout/header');
      $this->load->view('admission/phd/admin/dashboard', $data);
      $this->load->view('admission/phd/admin/layout/footer');
    } else {
      redirect('admission/phd/admin/dashboard/logout');
    }
  }

  public function download_CI_documents()
  {
    $userid = $this->session->userdata('userid');
    $user_type = $this->session->userdata('user_type');
    if ($userid && ($user_type == 'phd-admin')) {
      $data['program_details'] = $this->phd_all->get_all_program_details();
      $this->load->view('admission/phd/admin/layout/header');
      $this->load->view('admission/phd/admin/download_CI_documents', $data);
      $this->load->view('admission/phd/admin/layout/footer');
    } else {
      redirect('admission/phd/admin/dashboard/logout');
      }
    }

  public function scrutiny()
  {
    $userid = $this->session->userdata('userid');
    $user_type = $this->session->userdata('user_type');
    if ($userid && ($user_type == 'phd-admin')) {
      $applications = $this->phd_all->get_application_details();
      if (!empty($applications)) {
        foreach ($applications as $applicant) {
          $applicant->program = $this->phd_all->get_program_details($applicant->registration_no);
          $applicant->existing_rsn = $this->phd_all->get_active_reason($applicant->registration_no);
        }
      }
      $data['appl_data'] = $applications;
      $this->load->view('admission/phd/admin/layout/header');
      $this->load->view('admission/phd/admin/scrutiny_dashboard', $data);
      $this->load->view('admission/phd/admin/layout/footer');
    } else {
      redirect('admission/phd/admin/dashboard/logout');
    }
  }

  public function login()
  {
    $this->load->view('admission/phd/admin/login');
  }

  public function admin_login()
  {

    $data = array(
      'userid' => trim($this->input->post('user_name')),
      'password' => trim($this->input->post('user_password')),
    );

    $this->form_validation->set_rules('user_name', 'User Id', 'trim|required');
    $this->form_validation->set_rules('user_password', 'Password', 'trim|required');
    if ($this->form_validation->run() == true) {
      $login = $this->fetch_admin->admin_login($data);
      if ($login) {
        $array = array(
          'id' => $login[0]->id,
          'userid' => $login[0]->userid,
          'stat' => $login[0]->stat,
          'email' => $login[0]->email,
          'role' => $login[0]->role,
          'module_type' => $login[0]->module_type,
          'user_type' => 'phd-admin',
          'emp_name' => $login[0]->emp_name,
          'emp_no' => $login[0]->emp_no
        );
        $this->session->set_userdata($array);
        redirect('admission/phd/admin/dashboard');
      } else {
        $this->session->set_flashdata('error_msg', 'Invalid Login Credentials');
        redirect('admission/phd/admin/dashboard/login');
      }
    } else {
      $this->load->view('admission/phd/admin/login');
    }
  }


  public function edit_application($registration_no)
  {
    $userid = $this->session->userdata('userid');
    $user_type = $this->session->userdata('user_type');
    $user_role = $this->session->userdata('role');
    if ($userid && ($user_type == 'phd-admin')) {
      if (($user_role == 'superadmin')) {
        echo "<h1>To upload missing documents and other changes if needed, from admin end <h1>";
        exit;
        $data = $this->fetch_phd_detail($registration_no);
        $this->load->view('admission/phd/admin/layout/header');
        $this->load->view('admission/phd/admin/edit_application', $data);
        $this->load->view('admission/phd/admin/layout/footer');
      } else {
        $this->session->set_flashdata('error', 'You are not authorized to access edit page');
        redirect('admission/phd/admin/dashboard');
      }
    } else {
      redirect('admission/phd/admin/dashboard/logout');
    }
  }

  public function scrutiny_view($registration_no)
  {
    $userid = $this->session->userdata('userid');
    $user_type = $this->session->userdata('user_type');
    //$data['application_details']=$this->Adm_phd_personal_details_model->get_adm_phd_reg_appl_program($get_reg_no);
    if ($userid && ($user_type == 'phd-admin')) {
      $data = $this->fetch_phd_detail($registration_no);
      // echo "<pre>";
      // print_r($data);
      // echo "</pre>";
      // exit;
      $file_path =  'assets/admission/phd/' . $registration_no . '/Application_form' . $registration_no . '.pdf';
      if (file_exists($file_path)) {
        $data['application_preview'] = $file_path;
      } else {
        $data['print'] = 'Y';
        $html = $this->load->view('admission/adm_phd_application_preview', $data, TRUE);
        $paper = '';
        $stream = FALSE;
        $output = pdf_create($html, $registration_no . "_ApplicationForm", $paper, $stream);
        $file_to_save = FCPATH . 'assets/admission/phd/' . $registration_no . '/Application_form' . $registration_no . '.pdf';
        file_put_contents($file_to_save, $output);
        $data['application_preview'] = $file_to_save;
      }
      $data['reason'] = $this->phd_all->get_reason_ms();
      $data['crnt_rsn'] = [];
      $data['existing_rsn'] = $this->phd_all->get_active_reason($registration_no);
      if ($data['existing_rsn']) {
        foreach ($data['existing_rsn'] as $e_rsn) {
          $current_rsn[] = $e_rsn->reason_sn;
          if ($e_rsn->reason_sn == 0) {
            $data['other_rsn_crnt_vlu'] = $e_rsn->other_reason;
          }
        }
        $data['crnt_rsn'] = $current_rsn;
      }
      $this->load->view('admission/phd/admin/layout/header');
      $this->load->view('admission/phd/admin/scrutiny', $data);
      $this->load->view('admission/phd/admin/layout/footer');
    } else {
      redirect('admission/phd/admin/dashboard/logout');
    }
  }

  public function document_view()
  {
    $data['applications'] = $this->phd_all->get_application_details_reg_asc();
    $string = '0123456789abcdefghijklmnopqrstiuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string_shuffled = str_shuffle($string);
    $tran_id = substr($string_shuffled, 1, 4);
    //echo hash('ripemd160','kjshfdsd');
    //  echo $this->db->last_query();
   // exit;
     $this->load->view('admission/phd/admin/layout/header');
     $this->load->view('admission/phd/admin/show_candidate_list_doc',$data);
     $this->load->view('admission/phd/admin/layout/footer');

  }

  public function scrutiny_remark($registration_no)
  {
    $userid = $this->session->userdata('userid');
    $user_type = $this->session->userdata('user_type');
    $emp_no  =$this->session->userdata('emp_no');
    $emp_name  =$this->session->userdata('emp_name');
    $verfied_done_by= $emp_name."(".$emp_no.")";

    if ($userid && ($user_type == 'phd-admin')) {
    $verf_action = trim($this->input->post('verf_action'));
    $ba = $this->input->post('prog1');
    $phd = $this->input->post('prog2');
    $tot_prom = $this->input->post('tot_pro');
    $program= $this->phd_one->get_program_details($registration_no);

    $phd_dec='';
    $ba_dec='';

    if($tot_prom=='1')
    {
      switch ($verf_action)
      {
        case 1:
          $verf_remark1 = "Verified - OK";
          if(!empty($ba))
          {
            $ba_dec='V';
          }
          if(!empty($phd))
          {
            $phd_dec='V';
          }
          break;
        case 2:
          $verf_remark1 = "Verified - NOT OK";
          if(!empty($ba))
          {
            $ba_dec='R';
          }
          if(!empty($phd))
          {
            $phd_dec='R';
          }
        break;
        default:
        $verf_remark1 = "";
      }
    }
    else
    {
      switch ($verf_action)
      {
        case 1:
          $verf_remark1 = "Verified - OK";
          $phd_dec='V';
          $ba_dec='V';
          break;
        case 2:
          $verf_remark1 = "Verified - NOT OK";
          $phd_dec='R';
          $ba_dec='R';
          break;
        case 3:
          $verf_remark1 = "Partial Verified - (phd OK) AND (BA NOT OK)";
          $phd_dec='V';
          $ba_dec='R';
          break;
        case 4:
          $verf_remark1 = "Partial Verified - (BA OK) AND (phd NOT OK)";
          $phd_dec='R';
          $ba_dec='V';
          break;
        default:
        $verf_remark1 = "";
      }
    }

    $data = array(
      'verf_action' => $verf_action,
      'verf_remark' => $verf_remark1,
      'registration_no' => $registration_no,
    );

    $time_date=date("M,d,Y h:i:s A");

    if($tot_prom=='1')
    {

      if(!empty($ba))
      {
        $wheresingle = array(
          'registration_no' => $registration_no,
          'program_id'=>$ba,
        );

        $appl_pro_ms_phd=array(
          'status'=>$ba_dec,
          'modified_by'=>$verfied_done_by,
          'modified_date'=>$time_date
        );
      }
      if(!empty($phd))
      {
        $wheresingle = array(
          'registration_no' => $registration_no,
          'program_id'=>$phd,
        );
        $appl_pro_ms_phd=array(
          'status'=>$phd_dec,
          'modified_by'=>$verfied_done_by,
          'modified_date'=>$time_date
        );
      }
      //get previous record of status
      $value_anyone_status=$this->phd_all->get_app_doc_verfied_status($wheresingle);

      $insert_previous_status=array(
        'registration_no'=>$registration_no,
        'application_no'=>$value_anyone_status[0]['application_no'],
        'program_id'=>$value_anyone_status[0]['program_id'],
        'status'=>$value_anyone_status[0]['status'],
        'previous_modified_by'=>$value_anyone_status[0]['modified_by'],
        'previous_date_decision'=>$value_anyone_status[0]['modified_date'],
        );


        //insert into log table
      $this->phd_all->insert_pre_record_appl_pro_ms($insert_previous_status);
        //update the admin decision to app_pro_ms table
      $this->phd_all->update_appl_prom_ms($appl_pro_ms_phd,$wheresingle);
    }
    else
    {
      // echo "reach two";
      // exit;
      if(empty($ba))
      {
        $ba='ba';
      }
      if(empty($phd))
      {
        $phd='phd';
      }
      $whereba = array(
        'registration_no' => $registration_no,
        'program_id'=>$ba,
      );
      $appl_pro_ms_ba=array(
        'status'=>$ba_dec,
        'modified_by'=>$verfied_done_by,
        'modified_date'=>$time_date
      );

      $wherephd = array(
        'registration_no' => $registration_no,
        'program_id'=>$phd,
      );

      $appl_pro_ms_phd=array(
        'status'=>$phd_dec,
        'modified_by'=>$verfied_done_by,
        'modified_date'=>$time_date
      );


      $prev_phd=$this->phd_all->get_app_doc_verfied_status($wherephd);

      $value_phd_status=array(
        'registration_no'=>$registration_no,
        'application_no'=>$prev_phd[0]['application_no'],
        'program_id'=>$prev_phd[0]['program_id'],
        'status'=>$prev_phd[0]['status'],
        'previous_modified_by'=>$prev_phd[0]['modified_by'],
        'previous_date_decision'=>$prev_phd[0]['modified_date'],
      );

      $prev_ba=$this->phd_all->get_app_doc_verfied_status($whereba);

      $value_ba_status=array(
        'registration_no'=>$registration_no,
        'application_no'=>$prev_ba[0]['application_no'],
        'program_id'=>$prev_ba[0]['program_id'],
        'status'=>$prev_ba[0]['status'],
        'previous_modified_by'=>$prev_ba[0]['modified_by'],
        'previous_date_decision'=>$prev_ba[0]['modified_date'],
        );



      //insert into log table
      $this->phd_all->insert_pre_record_appl_pro_ms( $value_phd_status);
      $this->phd_all->insert_pre_record_appl_pro_ms( $value_ba_status);

      //update the admin decision to app_pro_ms table
      $this->phd_all->update_appl_prom_ms($appl_pro_ms_phd,$wherephd);
      $this->phd_all->update_appl_prom_ms($appl_pro_ms_ba,$whereba);

      }
    // echo "<pre>";
    // print_r($prev_phd);
    // print_r($appl_pro_ms_ba);
    // print_r($wherephd);
    // print_r($appl_pro_ms_phd);
    // print_r($prev_phd[0]['status']);
    // exit;

    $this->phd_all->update_status($data);
    $this->phd_all->deactivate_previous_rsn($registration_no);
    if ($verf_action == 2 || $verf_action == 3 || $verf_action == 4) {
      $data['reason'] = $this->phd_all->get_reason_ms();
      $rejectReason = $this->input->post('reason_check');
      $othrflag = false;
      foreach ($rejectReason as $rsn) {
        if ($rsn == 0) {
          $othrflag = true;
        }
        $insert_data[] = array(
          'reg_no' => $registration_no,
          'reason_sn' => $rsn,
          'reason' => $data['reason'][$rsn]->reason_desc,
          'reason_status' => 'A',
          'created_by' => $this->session->userdata('email'),
          'created_TS' => date("Y-m-d H:i:s")
        );
      }
      $this->phd_all->insert_new_rjct_rsn($insert_data);

      if ($othrflag) {
        $data = array(
          'other_reason' => trim($this->input->post('verf_remark')),
        );
        $this->phd_all->update_other_reason($data, $registration_no);
      }
    }
    $this->session->set_flashdata('success', 'Document Verification done successfully for ' . $registration_no);
    redirect('admission/phd/admin/dashboard/scrutiny');
    }
    else
    {
      redirect('admission/phd/admin/dashboard/logout');
    }
  }

  public function fetch_phd_detail($registration_no)
  {
    $userid = $this->session->userdata('userid');
    $user_type = $this->session->userdata('user_type');
    if ($userid && ($user_type == 'phd-admin')) {
      $data['application'] = $this->phd_one->get_application_details($registration_no);
      $data['address'] = $this->phd_one->get_address($registration_no);
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
      } elseif ($qrcode != NULL) {
        $data['qrcode'] = $qrcode[0]->doc_path;
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
    } else {
      redirect('admission/phd/admin/dashboard/logout');
    }
  }

  public function qrcode_generate($info)
  {
    $userid = $this->session->userdata('userid');
    $user_type = $this->session->userdata('user_type');
    if ($userid && ($user_type == 'phd-admin')) {
      $registration_no = $this->session->userdata('registration_no');
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
    }
    else
    {
      redirect('admission/phd/admin/dashboard/logout');
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('admission/phd/admin/dashboard/login');
  }

  public function applicant_excel_download()
  {
    $userid = $this->session->userdata('userid');
    $user_type = $this->session->userdata('user_type');
    if ($userid && ($user_type == 'phd-admin')) {
      $data['applicant_details'] = $this->phd_all->get_application_details();
      $objPHPExcel = new PHPExcel();
      $objPHPExcel->getActiveSheet()->setTitle('All Applicants Details');
      $row = 5;
      $sn = 1;
      foreach ($data['applicant_details'] as $applicant) {
        $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $sn);
        $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $applicant->registration_no);
        $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $applicant->first_name . " " . $applicant->middle_name . " " . $applicant->last_name);
        $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $applicant->category);
        $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $applicant->pwd);
        $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $applicant->mobile);
        $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $applicant->email);
        $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $applicant->dob);
        $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $applicant->gender);
        $objPHPExcel->getActiveSheet()->setCellValue('J' . $row, $applicant->maritial_status);
        $objPHPExcel->getActiveSheet()->setCellValue('K' . $row, $applicant->guardian_name);
        $objPHPExcel->getActiveSheet()->setCellValue('L' . $row, $applicant->guardian_realtion);
        $objPHPExcel->getActiveSheet()->setCellValue('M' . $row, $applicant->religion);
        $objPHPExcel->getActiveSheet()->setCellValue('N' . $row, $applicant->adhar);
        $program = $this->phd_one->get_program_details($applicant->registration_no);
        $fellowship = $this->phd_one->get_fellowship_details($applicant->registration_no);
        $qulaification = $this->phd_one->get_qulaification_details($applicant->registration_no);
        $work_exp = $this->phd_one->get_work_exp_details($applicant->registration_no);
        $existing_rsn = $this->phd_all->get_active_reason($applicant->registration_no);
        $address = $this->phd_one->get_address($applicant->registration_no);
        $c_adrs = "";
        $p_adrs = "";
        if (!empty($address)) {
          foreach ($address as  $ads) {
            if ($ads->address_type == 'C') {
              $c_adrs .= $ads->line_1 . "\r" . $ads->line_2 . "\r" . $ads->line_3 . " " . $ads->city . "\r" . $ads->state .
                " " . $ads->country . " - " . $ads->pincode;
              $objPHPExcel->getActiveSheet()->setCellValue('O' . $row, $c_adrs);
            } else if ($ads->address_type == 'P') {
              $p_adrs .= $ads->line_1 . "\r" . $ads->line_2 . "\r" . $ads->line_3 . " " . $ads->city . "\r" . $ads->state .
                " " . $ads->country . " - " . $ads->pincode;
              $objPHPExcel->getActiveSheet()->setCellValue('P' . $row, $p_adrs);
            }
          }
        }
        $objPHPExcel->getActiveSheet()->setCellValue('Q' . $row, ($applicant->betch_iit == 'Y') ? 'Y' : 'N');
        $objPHPExcel->getActiveSheet()->setCellValue('R' . $row, $applicant->betch_iit_name);
        $objPHPExcel->getActiveSheet()->setCellValue('S' . $row, ($applicant->math_stat_flag == 'Y') ? 'Y' : 'N/A');
        $pgm = "";
        if (!empty($program)) {
          foreach ($program as  $prgm) {
            $pgm .= $prgm->program_desc . " - " . $prgm->program_id . "\r";
            $objPHPExcel->getActiveSheet()->setCellValue('T' . $row, $pgm);
          }
        }
        if (!empty($fellowship)) {
          foreach ($fellowship as  $cat) {
            $objPHPExcel->getActiveSheet()->setCellValue('U' . $row, $cat->cat_reg_no);
            $objPHPExcel->getActiveSheet()->setCellValue('V' . $row, $cat->cat_score);
            $objPHPExcel->getActiveSheet()->setCellValue('W' . $row, $cat->cat_percentile);
          }
        } else {
          $objPHPExcel->getActiveSheet()->setCellValue('U' . $row, "N/A");
          $objPHPExcel->getActiveSheet()->setCellValue('V' . $row, "N/A");
          $objPHPExcel->getActiveSheet()->setCellValue('W' . $row, "N/A");
        }
        if (!empty($qulaification)) {
          $exam_type = "";
          $institue_name = "";
          $result_status = "";
          $mrk_cgpa_type = "";
          $yop = "";
          foreach ($qulaification as  $qlf) {
            $exam_type .= $qlf->exam_type . " - " . $qlf->exam_name . "\r";
            $institue_name .= $qlf->institue_name . "\r";
            $result_status .= $qlf->result_status . "\r";
            if ($qlf->marks_perc_type == "Percentage") {
              $mark_prct_type = "%";
            } else {
              $mark_prct_type = "CGPA";
            }
            $mrk_cgpa_type .= $qlf->mark_cgpa_percenatge . " " . $mark_prct_type . "\r";
            $yop .= $qlf->year_of_passing . "\r";
            $objPHPExcel->getActiveSheet()->setCellValue('X' . $row, $exam_type);
            $objPHPExcel->getActiveSheet()->setCellValue('Y' . $row, $institue_name);
            $objPHPExcel->getActiveSheet()->setCellValue('Z' . $row, $result_status);
            $objPHPExcel->getActiveSheet()->setCellValue('AA' . $row, $mrk_cgpa_type);
            $objPHPExcel->getActiveSheet()->setCellValue('AB' . $row, $yop);
          }
        }
        if (!empty($work_exp)) {
          $totalexp = 0;
          $designation = "";
          $organistion = "";
          $nature_of_wrk = "";
          $sector = "";
          $duration_in_month = "";
          foreach ($work_exp as  $wrk) {
            $designation .= $wrk->designation_no . "\r";
            $organistion .= $wrk->designation_organistion . "\r";
            $nature_of_wrk .= $wrk->nature_of_work . "\r";
            $sector .= $wrk->sector . "\r";
            $duration_in_month .= $wrk->duration_in_month . " Months" . "\r";
            $totalexp = $totalexp + $wrk->duration_in_month;
            $objPHPExcel->getActiveSheet()->setCellValue('AC' . $row, $designation);
            $objPHPExcel->getActiveSheet()->setCellValue('AD' . $row, $organistion);
            $objPHPExcel->getActiveSheet()->setCellValue('AE' . $row, $nature_of_wrk);
            $objPHPExcel->getActiveSheet()->setCellValue('AF' . $row, $sector);
            $objPHPExcel->getActiveSheet()->setCellValue('AG' . $row, $duration_in_month);
          }
          $objPHPExcel->getActiveSheet()->setCellValue('AH' . $row, $totalexp . " Months");
        } else {
          $objPHPExcel->getActiveSheet()->setCellValue('AC' . $row, "N/A");
          $objPHPExcel->getActiveSheet()->setCellValue('AD' . $row, "N/A");
          $objPHPExcel->getActiveSheet()->setCellValue('AE' . $row, "N/A");
          $objPHPExcel->getActiveSheet()->setCellValue('AF' . $row, "N/A");
          $objPHPExcel->getActiveSheet()->setCellValue('AG' . $row, "N/A");
          $objPHPExcel->getActiveSheet()->setCellValue('AH' . $row, "N/A");
        }
        $objPHPExcel->getActiveSheet()->setCellValue('AI' . $row, $applicant->pay_mode);
        $objPHPExcel->getActiveSheet()->setCellValue('AJ' . $row, $applicant->payment_amount);
        $objPHPExcel->getActiveSheet()->setCellValue('AK' . $row, $applicant->transaction_id);
        $objPHPExcel->getActiveSheet()->setCellValue('AL' . $row, $applicant->order_id);
        if ($applicant->doc_verfied_flag == 1) {
          $objPHPExcel->getActiveSheet()->setCellValue('AM' . $row, "Verified - OK");
        } elseif ($applicant->doc_verfied_flag == 2) {
          $objPHPExcel->getActiveSheet()->setCellValue('AM' . $row, "Verified - Not OK");
        } else {
          $objPHPExcel->getActiveSheet()->setCellValue('AM' . $row, "Not Started");
        }
        if (!empty($existing_rsn)) {
          $OtherRsn = " ";
          $c = 1;
          foreach ($existing_rsn as  $rsn) {
            if ($rsn->reason == "Others") {
              $OtherRsn .= $c . ". " . $rsn->reason . " - " . $rsn->other_reason . "\r";
            } else {
              $OtherRsn .= $c . ". " . $rsn->reason . "\r";
            }
            $objPHPExcel->getActiveSheet()->setCellValue('AN' . $row, $OtherRsn);
            $c++;
          }
        } else {
          $objPHPExcel->getActiveSheet()->setCellValue('AN' . $row, "N/A");
        }
        $objPHPExcel->getActiveSheet()->setCellValue('AO' . $row, $applicant->doc_verfied_by);
        $photo = $this->phd_one->get_photo_path($applicant->registration_no);
        $sign = $this->phd_one->get_sign_path($applicant->registration_no);
        if ($photo != NULL && ($photo[0]->doc_path != NULL)) {
          if (file_exists($photo[0]->doc_path)) {
            $objDrawing = new PHPExcel_Worksheet_Drawing();
            $objDrawing->setPath($photo[0]->doc_path);
            $objDrawing->setCoordinates('AP' . $row);
            $objDrawing->setOffsetX(5);
            $objDrawing->setOffsetY(5);
            $objDrawing->setHeight(140);
            $objDrawing->setWidth(140);
            $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
          }
        }
        if ($sign != NULL && ($sign[0]->doc_path != NULL)) {
          if (file_exists($photo[0]->doc_path)) {
            $objDrawing = new PHPExcel_Worksheet_Drawing();
            $objDrawing->setPath($sign[0]->doc_path);
            $objDrawing->setCoordinates('AQ' . $row);
            $objDrawing->setOffsetX(5);
            $objDrawing->setOffsetY(5);
            $objDrawing->setWidth(140);
            $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
          }
        }
        $objPHPExcel->getActiveSheet()->getRowDimension($row)->setRowHeight(150);
        $sn++;
        $row++;
      }
      $row--;
      $objPHPExcel->getActiveSheet()->mergeCells('A1:AQ1');
      $objPHPExcel->getActiveSheet()->mergeCells('A2:AQ2');
      $objPHPExcel->getActiveSheet()->mergeCells('A3:N3');
      $objPHPExcel->getActiveSheet()->mergeCells('O3:P3');
      $objPHPExcel->getActiveSheet()->mergeCells('Q3:S3');
      $objPHPExcel->getActiveSheet()->mergeCells('T3:T4');
      $objPHPExcel->getActiveSheet()->mergeCells('U3:W3');
      $objPHPExcel->getActiveSheet()->mergeCells('X3:AB3');
      $objPHPExcel->getActiveSheet()->mergeCells('AC3:AH3');
      $objPHPExcel->getActiveSheet()->mergeCells('AI3:AL3');
      $objPHPExcel->getActiveSheet()->mergeCells('AM3:AO3');
      $objPHPExcel->getActiveSheet()->mergeCells('AP3:AP4');
      $objPHPExcel->getActiveSheet()->mergeCells('AQ3:AQ4');
      $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'INDIAN INSTITUTE OF TECHNOLOGY (INDIAN SCHOOL OF MINES), DHANBAD');
      $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'List Of All Applicants (phd - 2022-24)');
      $objPHPExcel->getActiveSheet()->SetCellValue('A3', 'Personal Details');
      $objPHPExcel->getActiveSheet()->SetCellValue('O3', 'Address');
      $objPHPExcel->getActiveSheet()->SetCellValue('Q3', 'B. Tech & Maths/ Stats. Flag');
      $objPHPExcel->getActiveSheet()->SetCellValue('T3', 'Programs');
      $objPHPExcel->getActiveSheet()->SetCellValue('U3', 'CAT Details');
      $objPHPExcel->getActiveSheet()->SetCellValue('X3', 'Equcational Qualification');
      $objPHPExcel->getActiveSheet()->SetCellValue('AC3', 'Work Experience');
      $objPHPExcel->getActiveSheet()->SetCellValue('AI3', 'Payment Detail');
      $objPHPExcel->getActiveSheet()->SetCellValue('AM3', 'Document Verification Status');
      $objPHPExcel->getActiveSheet()->SetCellValue('AP3', 'Photo');
      $objPHPExcel->getActiveSheet()->SetCellValue('AQ3', 'Signature');
      $objPHPExcel->getActiveSheet()->SetCellValue('A4', 'Sl. No.');
      $objPHPExcel->getActiveSheet()->SetCellValue('B4', 'Registration No.');
      $objPHPExcel->getActiveSheet()->SetCellValue('C4', 'Name');
      $objPHPExcel->getActiveSheet()->SetCellValue('D4', 'Category');
      $objPHPExcel->getActiveSheet()->SetCellValue('E4', 'PWD');
      $objPHPExcel->getActiveSheet()->SetCellValue('F4', 'Mobile');
      $objPHPExcel->getActiveSheet()->SetCellValue('G4', 'E-mail');
      $objPHPExcel->getActiveSheet()->SetCellValue('H4', 'D.O.B');
      $objPHPExcel->getActiveSheet()->SetCellValue('I4', 'Gender');
      $objPHPExcel->getActiveSheet()->SetCellValue('J4', 'Maritial Status');
      $objPHPExcel->getActiveSheet()->SetCellValue('K4', 'Guardian Name');
      $objPHPExcel->getActiveSheet()->SetCellValue('L4', 'Guardian Realtion');
      $objPHPExcel->getActiveSheet()->SetCellValue('M4', 'Religion');
      $objPHPExcel->getActiveSheet()->SetCellValue('N4', 'Aadhaar');
      $objPHPExcel->getActiveSheet()->SetCellValue('O4', 'Correspondence Address');
      $objPHPExcel->getActiveSheet()->SetCellValue('P4', 'Permanent Address');
      $objPHPExcel->getActiveSheet()->SetCellValue('Q4', 'B. Tech from IIT');
      $objPHPExcel->getActiveSheet()->SetCellValue('R4', 'IIT Name');
      $objPHPExcel->getActiveSheet()->SetCellValue('S4', 'Maths/ Stats. Flag');
      $objPHPExcel->getActiveSheet()->SetCellValue('U4', 'CAT Registration No.');
      $objPHPExcel->getActiveSheet()->SetCellValue('V4', 'CAT Score');
      $objPHPExcel->getActiveSheet()->SetCellValue('W4', 'CAT Percentile');
      $objPHPExcel->getActiveSheet()->SetCellValue('X4', 'Exam');
      $objPHPExcel->getActiveSheet()->SetCellValue('Y4', 'School/ University');
      $objPHPExcel->getActiveSheet()->SetCellValue('Z4', 'Result Status');
      $objPHPExcel->getActiveSheet()->SetCellValue('AA4', 'Marks');
      $objPHPExcel->getActiveSheet()->SetCellValue('AB4', 'Year of Passing');
      $objPHPExcel->getActiveSheet()->SetCellValue('AC4', 'Designation');
      $objPHPExcel->getActiveSheet()->SetCellValue('AD4', 'Organization');
      $objPHPExcel->getActiveSheet()->SetCellValue('AE4', 'Nature of Work');
      $objPHPExcel->getActiveSheet()->SetCellValue('AF4', 'Sector');
      $objPHPExcel->getActiveSheet()->SetCellValue('AG4', 'Duration');
      $objPHPExcel->getActiveSheet()->SetCellValue('AH4', 'Total Experience');
      $objPHPExcel->getActiveSheet()->SetCellValue('AI4', 'Payment Mode');
      $objPHPExcel->getActiveSheet()->SetCellValue('AJ4', 'Payment Amount');
      $objPHPExcel->getActiveSheet()->SetCellValue('AK4', 'Transaction Id');
      $objPHPExcel->getActiveSheet()->SetCellValue('AL4', 'Order Id');
      $objPHPExcel->getActiveSheet()->SetCellValue('AM4', 'Doc. Verification Status');
      $objPHPExcel->getActiveSheet()->SetCellValue('AN4', 'Rejection Reason');
      $objPHPExcel->getActiveSheet()->SetCellValue('AO4', 'Verified By');
      $objPHPExcel->getActiveSheet()->getStyle('A1:AQ2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
      $objPHPExcel->getActiveSheet()->getStyle('A3:AQ' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      $objPHPExcel->getActiveSheet()->getStyle('A1:AQ' . $row)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
      $objPHPExcel->getActiveSheet()->getStyle('C5:C' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
      $objPHPExcel->getActiveSheet()->getStyle('O5:P' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
      $objPHPExcel->getActiveSheet()->getStyle('T5:T' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
      $objPHPExcel->getActiveSheet()->getStyle('X5:AA' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
      $objPHPExcel->getActiveSheet()->getStyle('AC5:AH' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
      $objPHPExcel->getActiveSheet()->getStyle('AN5:AO' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
      $objPHPExcel->getActiveSheet()->getStyle('A1:AQ4')->getFont()->setBold(true);
      $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
      $objPHPExcel->getActiveSheet()->getStyle('A2:AQ2')->getFont()->setSize(14);
      $objPHPExcel->getActiveSheet()->getStyle('A3:AQ4')->getFont()->setSize(12);
      $styleArray = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)));
      $objPHPExcel->getActiveSheet()->getStyle('A1:AQ' . $row)->applyFromArray($styleArray);
      unset($styleArray);
      $objPHPExcel->getActiveSheet()->getStyle('A1:AQ' . $row)->getAlignment()->setWrapText(true);
      $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
      $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(13);
      $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(14);
      $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
      $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(6);
      $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(11);
      $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(21);
      $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(11);
      $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(8);
      $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(11);
      $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(11);
      $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(11);
      $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(11);
      $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(14);
      $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(25);
      $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(25);
      $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(10);
      $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(10);
      $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(10);
      $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(12);
      $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(13);
      $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(12);
      $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(12);
      $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
      $objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(20);
      $objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(15);
      $objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(10);
      $objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(10);
      $objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(20);
      $objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(20);
      $objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(20);
      $objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setWidth(20);
      $objPHPExcel->getActiveSheet()->getColumnDimension('AG')->setWidth(15);
      $objPHPExcel->getActiveSheet()->getColumnDimension('AH')->setWidth(15);
      $objPHPExcel->getActiveSheet()->getColumnDimension('AI')->setWidth(12);
      $objPHPExcel->getActiveSheet()->getColumnDimension('AJ')->setWidth(12);
      $objPHPExcel->getActiveSheet()->getColumnDimension('AK')->setWidth(20);
      $objPHPExcel->getActiveSheet()->getColumnDimension('AL')->setWidth(30);
      $objPHPExcel->getActiveSheet()->getColumnDimension('AM')->setWidth(25);
      $objPHPExcel->getActiveSheet()->getColumnDimension('AN')->setWidth(40);
      $objPHPExcel->getActiveSheet()->getColumnDimension('AO')->setWidth(20);
      $objPHPExcel->getActiveSheet()->getColumnDimension('AP')->setWidth(30);
      $objPHPExcel->getActiveSheet()->getColumnDimension('AQ')->setWidth(30);
      $objPHPExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(35);
      $objPHPExcel->getActiveSheet()->getRowDimension(2)->setRowHeight(30);
      $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');
      $filename = 'Detailsofphd_Applicants.xls';
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="' . $filename . '"');
      header('Cache-Control: max-age=0');
      ob_end_clean();
      $objWriter->save('php://output');
    } else {
      redirect('admission/phd/admin/dashboard/logout');
    }
  }

  public function downloadpdf($registration_no)
  {
    $userid = $this->session->userdata('userid');
    $user_type = $this->session->userdata('user_type');
    if ($userid && ($user_type == 'phd-admin')) {
      $info = $this->fetch_phd_detail($registration_no);
      $info['print'] = 'Y';
      $html = $this->load->view('admission/adm_phd_application_preview', $info, TRUE);
      $paper = '';
      $stream = FALSE;
      $output = pdf_create($html, $registration_no . "_ApplicationForm", $paper, $stream);
      $file_to_save = FCPATH . 'assets/admission/phd/' . $registration_no . '/Application_form' . $registration_no . '.pdf';
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
      redirect('admission/phd/admin/dashboard/logout');
    }
  }

  public function callforinterview_cat()
  {
    $userid = $this->session->userdata('userid');

    $user_type = $this->session->userdata('user_type');
    $user_role = $this->session->userdata('role');
    if ($userid && ($user_type == 'phd-admin')) {
      if (($user_role == 'superadmin')) {
        $applications = $this->phd_all->get_cat_applicant_details();
        if (!empty($applications)) {
          foreach ($applications as $applicant) {
            $exam_type = "10 th";
            $applicant->tenth = $this->phd_all->get_qualification_details($exam_type, $applicant->registration_no);
            $exam_type = "12 th";
            $applicant->twelfth = $this->phd_all->get_qualification_details($exam_type, $applicant->registration_no);
            $exam_type = "UG Exam";
            $applicant->ug = $this->phd_all->get_qualification_details($exam_type, $applicant->registration_no);
            $applicant->experience = $this->phd_all->get_experience_details($applicant->registration_no);
          }
        }
        $data['appl_data'] = $applications;
        $this->load->view('admission/phd/admin/layout/header');
        $this->load->view('admission/phd/admin/callforinterview_cat', $data);
        $this->load->view('admission/phd/admin/layout/footer');
      } else {
        $this->session->set_flashdata('error', 'You are not authorized to access this page');
        redirect('admission/phd/admin/dashboard');
      }
    } else {
      redirect('admission/phd/admin/dashboard/logout');
    }
  }

  public function cfi_cat_filtered()
  {
    $userid = $this->session->userdata('userid');
    $user_type = $this->session->userdata('user_type');
    $user_role = $this->session->userdata('role');
    if ($userid && ($user_type == 'phd-admin')) {
      if (($user_role == 'superadmin')) {
        $programme = $this->input->post('searchBy_programme', true);
        $category = $this->input->post('searchBy_category', true);
        $val = array(
          'programme' => $programme,
          'category' => $category,
        );
        $data['input_value'] = $val;
        $applications = $this->phd_all->get_cat_applicant_filtered($val);
        if (!empty($applications)) {
          foreach ($applications as $applicant) {
            $exam_type = "10 th";
            $applicant->tenth = $this->phd_all->get_qualification_details($exam_type, $applicant->registration_no);
            $exam_type = "12 th";
            $applicant->twelfth = $this->phd_all->get_qualification_details($exam_type, $applicant->registration_no);
            $exam_type = "UG Exam";
            $applicant->ug = $this->phd_all->get_qualification_details($exam_type, $applicant->registration_no);
            $applicant->experience = $this->phd_all->get_experience_details($applicant->registration_no);
          }
        }
        $data['appl_data'] = $applications;
        // echo "<pre>";
        // print_r($data['appl_data']);
        // echo "</pre>";
        // exit;
        $this->load->view('admission/phd/admin/layout/header');
        $this->load->view('admission/phd/admin/callforinterview_cat', $data);
        $this->load->view('admission/phd/admin/layout/footer');
      } else {
        $this->session->set_flashdata('error', 'You are not authorized to access this page');
        redirect('admission/phd/admin/dashboard');
      }
    } else {
      redirect('admission/phd/admin/dashboard/logout');
    }
  }

  public function callforinterview_iit()
  {
    $userid = $this->session->userdata('userid');
    $user_type = $this->session->userdata('user_type');
    $user_role = $this->session->userdata('role');
    if ($userid && ($user_type == 'phd-admin')) {
      if (($user_role == 'superadmin')) {
        $applications = $this->phd_all->get_iit_application_details();
        if (!empty($applications)) {
          foreach ($applications as $applicant) {
            $exam_type = "10 th";
            $applicant->tenth = $this->phd_all->get_qualification_details($exam_type, $applicant->registration_no);
            $exam_type = "12 th";
            $applicant->twelfth = $this->phd_all->get_qualification_details($exam_type, $applicant->registration_no);
            $exam_type = "UG Exam";
            $applicant->ug = $this->phd_all->get_qualification_details($exam_type, $applicant->registration_no);
            $applicant->experience = $this->phd_all->get_experience_details($applicant->registration_no);
          }
        }
        $data['appl_data'] = $applications;
        $this->load->view('admission/phd/admin/layout/header');
        $this->load->view('admission/phd/admin/callforinterview_iit', $data);
        $this->load->view('admission/phd/admin/layout/footer');
      } else {
        $this->session->set_flashdata('error', 'You are not authorized to access this page');
        redirect('admission/phd/admin/dashboard');
      }
    } else {
      redirect('admission/phd/admin/dashboard/logout');
    }
  }

  public function cfi_iit_filtered()
  {
    $userid = $this->session->userdata('userid');
    $user_type = $this->session->userdata('user_type');
    $user_role = $this->session->userdata('role');
    if ($userid && ($user_type == 'phd-admin')) {
      if (($user_role == 'superadmin')) {
        $programme = $this->input->post('searchBy_programme', true);
        $category = $this->input->post('searchBy_category', true);
        $val = array(
          'programme' => $programme,
          'category' => $category,
        );
        $data['input_value'] = $val;
        $applications = $this->phd_all->get_iit_applicant_filtered($val);
        if (!empty($applications)) {
          foreach ($applications as $applicant) {
            $exam_type = "10 th";
            $applicant->tenth = $this->phd_all->get_qualification_details($exam_type, $applicant->registration_no);
            $exam_type = "12 th";
            $applicant->twelfth = $this->phd_all->get_qualification_details($exam_type, $applicant->registration_no);
            $exam_type = "UG Exam";
            $applicant->ug = $this->phd_all->get_qualification_details($exam_type, $applicant->registration_no);
            $applicant->experience = $this->phd_all->get_experience_details($applicant->registration_no);
          }
        }
        $data['appl_data'] = $applications;
        $this->load->view('admission/phd/admin/layout/header');
        $this->load->view('admission/phd/admin/callforinterview_iit', $data);
        $this->load->view('admission/phd/admin/layout/footer');
      } else {
        $this->session->set_flashdata('error', 'You are not authorized to access this page');
        redirect('admission/phd/admin/dashboard');
      }
    } else {
      redirect('admission/phd/admin/dashboard/logout');
    }
  }

  public function search_transaction()
  {
    $userid = $this->session->userdata('userid');
    $user_type = $this->session->userdata('user_type');
    $user_role = $this->session->userdata('role');
    if ($userid && ($user_type == 'phd-admin')) {
      if (($user_role == 'superadmin')) {
        $this->load->view('admission/phd/admin/layout/header');
        $this->load->view('admission/phd/admin/search_transaction');
        $this->load->view('admission/phd/admin/layout/footer');
      } else {
        $this->session->set_flashdata('error', 'You are not authorized to access this page');
        redirect('admission/phd/admin/dashboard');
      }
    } else {
      redirect('admission/phd/admin/dashboard/logout');
    }
  }

  public function enquire_by_registartion_no()
  {
    $userid = $this->session->userdata('userid');
    $user_type = $this->session->userdata('user_type');
    $user_role = $this->session->userdata('role');
    if ($userid && ($user_type == 'phd-admin')) {
      if (($user_role == 'superadmin')) {
        $reg_number = $_REQUEST['reg_number'];
        $email_id = $_REQUEST['email_id'];
        $personal_details = $this->phd_all->get_personal_details($reg_number, $email_id);
        $i_count = 0;
        $transaction = [];
        if (!empty($personal_details)) {
          $trans_details = $this->phd_all->search_transaction_details($reg_number, $email_id);
          if (!empty($trans_details)) {
            foreach ($trans_details as $value) {
              $transaction[$i_count]['name'] = $personal_details[0]['first_name'] . " " . $personal_details[0]['middle_name'] .
                " " . $personal_details[0]['last_name'];
              $transaction[$i_count]['registartion_no'] = $value['other_detail'];
              $transaction[$i_count]['email_id'] = $value['email_id'];
              $transaction[$i_count]['mobile'] = $personal_details[0]['mobile'];
              $transaction[$i_count]['merchant_order_number'] = $value['merchant_order_number'];
              $transaction[$i_count]['order_booking_date_time'] = $value['order_booking_date_time'];
              $transaction[$i_count]['order_status'] = $value['order_status'];
              $transaction[$i_count]['order_amount'] = $value['order_amount'];
              $transaction[$i_count]['payout_amount'] = $value['payout_amount'];
              $i_count++;
            }
          }
        }
        $data['transaction'] = $transaction;
        $response = $this->load->view('admission/phd/admin/enquire_by_registration', $data, TRUE);
        echo $response;
      }
      else
      {
        $this->session->set_flashdata('error', 'You are not authorized to access this page');
        redirect('admission/phd/admin/dashboard');
      }
    } else {
      redirect('admission/phd/admin/dashboard/logout');
    }
  }

  public function upload_excel_data()
  {
    $data['appl_data']=$this->phd_all->fetch_csv_data();
    $this->load->view('admission/phd/admin/layout/header');
    $this->load->view('admission/phd/admin/excel_file_upload_view',$data);
    //$this->load->view('admission/phd/admin/admin_tab_of_uploded_csv');
    $this->load->view('admission/phd/admin/layout/footer');

  }



  public function upload_csv()
  {
    $time_date=date("M,d,Y h:i:s A");
    $emp_no  =$this->session->userdata('emp_no');
    $emp_name  =$this->session->userdata('emp_name');
    $verfied_done_by= $emp_name."(".$emp_no.")";
    $error_count = 0;
    $error_count_inside = 0;
    if (isset($_FILES))
    {
      $val=$this->phd_all->check_round_upload();
      $round='';
      if(empty($val[0]->mx))
      {
        $round=1;
      }
      else
      {
        $round=$val[0]->mx+1;
      }

      $count = 0;
      $count_double=0;
      $count_single_pro=0;
      $null_check = 0;
      $check_insert_fail=0;
      $count_not_paid=0;
      $count_not_verified=0;
      $count_insert_fail=0;
      $count_insert_sucess=0;
      $count_duplicate=0;
      $count_msg = "";
      $fp = fopen($_FILES['upload_csv']['tmp_name'], 'r') or die("can't open file");
      while ($csv_line = fgetcsv($fp, 1024))
      {
        $count++;
        if ($count == 1)
        {
          continue;
        }//keep this if condition if you want to remove the first row

        for ($i = 0, $j = count($csv_line); $i < $j; $i++)
        {
          $insert_csv = array();
          if($csv_line[0]!='')
          {
            $insert_csv = array();
            $insert_csv['registration_no'] = $csv_line[0]; // remove if you want to have primary key,
            $insert_csv['program_id'] = $csv_line[1];
          }
          else
          {
            $null_check++;
          }
        }

        $i++;

        $tot_program = explode(',', $insert_csv['program_id']);

        // echo "<pre>";
        // print_r($tot_program);
        // exit;
        $check_paid=$this->phd_all->check_application_paid($insert_csv['registration_no']);
        if(count($tot_program)==2)
        {
          $count_double++;
          $tot_program[0];
          $tot_program[1];
          $arrval=array(
            'reg'=>$insert_csv['registration_no'],
            'prog'=>strtolower($tot_program[0]),
          );
          $arrval2=array(
            'reg'=>$insert_csv['registration_no'],
            'prog'=>strtolower( $tot_program[1]),
          );



          $appl_no=$this->phd_all->get_appl_no_by_pro_id($arrval);
          $appl_no2=$this->phd_all->get_appl_no_by_pro_id($arrval2);

          if(!empty($appl_no) && !empty($appl_no2))
          {
            $data_p = array(
              'registration_no' => $insert_csv['registration_no'],
              'program_id' => strtolower($tot_program[0]),
              'application_no' =>$appl_no,
              'status'=>'A',
              'type'=>'call for interview',
              'upload_round'=>$round,
              'uploaded_by'=>$verfied_done_by
            );

            $data_s = array(
              'registration_no' => $insert_csv['registration_no'] ,
              'program_id' => strtolower($tot_program[1]),
              'application_no' => $appl_no2,
              'status'=>'A',
              'type'=>'call for interview',
              'upload_round'=>$round,
              'uploaded_by'=>$verfied_done_by
            );

            // logic before insert into table check condtion fulfil or not
            $time_date=date("M,d,Y h:i:s A");
            $call_in=array(
              'call_int_status'=>'Y',
              'call_int_status_date'=>$time_date,
              'call_int_status_by'=>$verfied_done_by
            );

            $where=array(
              'application_no'=>$appl_no,
            );

            $where_s=array(
              'application_no'=>$appl_no2,
            );


            $check_verfied=$this->phd_all->check_application_prom_verified($data_p);
            $check_exsit=$this->phd_all->check_already_added_in_temp($data_p);
            $check_verfied_s=$this->phd_all->check_application_prom_verified($data_s);
            $check_exsit_s=$this->phd_all->check_already_added_in_temp($data_s);
            if($check_paid=='paid' && $check_verfied=='verified' && $check_exsit=='not_exist')
            {
                $check_insert=$this->phd_all->insert_csv_data($data_p);
                $y=$this->phd_all->update_appl_prom_ms_call_int($call_in,$where);

                if($check_insert=='inserted' && $y)
                {

                $count_insert_sucess++;

                }
                else
                {
                  $count_insert_fail++;
                }

            }
            else
            {
              $error_count++;
              $count_msg .= $insert_csv['registration_no'] . ' '.'<br>' ; // error application number
              // The line break has been included so that all application number  no should appear in a new line
            }

            //

            if($check_paid=='paid' && $check_verfied_s=='verified' && $check_exsit_s=='not_exist')
            {
                $check_insert_s=$this->phd_all->insert_csv_data($data_s);
                $y_s=$this->phd_all->update_appl_prom_ms_call_int($call_in,$where_s);

                if($check_insert_s=='inserted' && $y_s)
                {

                $count_insert_sucess++;

                }
                else
                {
                  $count_insert_fail++;
                }
            }
            else
            {
              $error_count++;
              $count_msg .= $insert_csv['registration_no'] . ' '.'<br>' ; // error application number
              // The line break has been included so that all application number  no should appear in a new line
            }
            //
          }

        }

        if(count($tot_program)==1)
        {
          $count_single_pro++;
          // echo "reach one may here";
          // exit;
           $reg=$insert_csv['registration_no'];
           $proid=strtolower($insert_csv['program_id']);
          $arrval=array(
            'reg'=>$insert_csv['registration_no'],
            'prog'=>strtolower($insert_csv['program_id']),
          );
         $appl_no=$this->phd_all->get_appl_no_by_pro_id($arrval);

         if(!empty($appl_no))
         {

          $data = array(
            'registration_no' => $insert_csv['registration_no'] ,
            'program_id' => strtolower($insert_csv['program_id']),
            'application_no' =>  $appl_no,
            'status'=>'A',
            'type'=>'call for interview',
            'upload_round'=>$round,
            'uploaded_by'=>$verfied_done_by
          );

          $time_date=date("M,d,Y h:i:s A");
          $call_in=array(
          'call_int_status'=>'Y',
          'call_int_status_date'=>$time_date,
          'call_int_status_by'=>$verfied_done_by
          );
          $where=array(
          'application_no'=> $appl_no,
          );
           $check_verfied_t=$this->phd_all->check_application_prom_verified($data);

           $check_exsit_t=$this->phd_all->check_already_added_in_temp($data);
           //  echo $this->db->last_query();
           //  exit;
           if($check_paid=='paid' && $check_verfied_t=='verified' && $check_exsit_t=='not_exist')
           {

             $check_insert=$this->phd_all->insert_csv_data($data);
             $y=$this->phd_all->update_appl_prom_ms_call_int($call_in,$where);

             if($check_insert=='inserted' && $y)
             {

              $count_insert_sucess++;

             }
             else
             {
               $count_insert_fail++;
             }

           }
           else
           {
             $error_count++;
             $count_msg .= $insert_csv['registration_no'] . ' '.'<br>' ; // error application number
             // The line break has been included so that all application number  no should appear in a new line
           }
          }
          else
          {
            $var="application number not found";
          }
        }



      }

      fclose($fp) or die("can't close file");

      // echo "<pre>";
      // echo "total number of error count ".$error_count;
      // echo "<pre>";
      // echo  "totalmeaage ".$count_msg;
      // echo "<pre>";
      // echo "total number of insert fail ".$count_insert_fail;
      // echo "<pre>";
      // echo "toal number of succesfully insert".$count_insert_sucess;
      // echo "<pre>";
      // echo "total number of duplicate".$count_duplicate;
      // exit;


      if ($error_count > 0)
      {
        $vals .='Total ' . $error_count . ' Records Failed,Application number is ' . $count_msg;
        $vals .='Total ' . $count_insert_sucess . ' Records successfully uploaded';
        $this->session->set_flashdata('msg_alert', $vals);
      }
      else
      {
        $vals='Total ' . $count_insert_sucess . ' Records successfully uploaded';
        $this->session->set_flashdata('msg_alert',$vals);
      }

      redirect('admission/phd/admin/dashboard/upload_excel_data');
    }
    else
    {
      $this->session->set_flashdata('msg_alert', 'Please Upload CSV File !!!');
      redirect('admission/phd/admin/dashboard/upload_excel_data');
    }


  }

  public function upload_csv_no_work_later_use()
  {
    $emp_no  =$this->session->userdata('emp_no');
    $emp_name  =$this->session->userdata('emp_name');
    $verfied_done_by= $emp_name."(".$emp_no.")";
    $error_count = 0;
    $error_count_inside = 0;
    if (isset($_FILES))
    {
      $val=$this->phd_all->check_round_upload();
      $round='';
      if(empty($val[0]->mx))
      {
        $round=1;
      }
      else
      {
        $round=$val[0]->mx+1;
      }

      $count = 0;
      $null_check = 0;
      $check_insert_fail=0;
      $count_not_paid=0;
      $count_not_verified=0;
      $count_insert_fail=0;
      $count_insert_sucess=0;
      $count_duplicate=0;
      $count_msg = "";
      $fp = fopen($_FILES['upload_csv']['tmp_name'], 'r') or die("can't open file");
      while ($csv_line = fgetcsv($fp, 1024))
      {
        $count++;
        if ($count == 1)
        {
          continue;
        }//keep this if condition if you want to remove the first row
        for ($i = 0, $j = count($csv_line); $i < $j; $i++)
        {
          $insert_csv = array();
          if($csv_line[0]!='')
          {
            $insert_csv = array();
            $insert_csv['registration_no'] = $csv_line[0]; // remove if you want to have primary key,
            $insert_csv['program_id'] = $csv_line[1];
            $insert_csv['application_no'] = $csv_line[2];
          }
          else
          {
            $null_check++;
          }
        }
        $i++;

        $data = array(
            'registration_no' => $insert_csv['registration_no'] ,
            'program_id' => strtolower($insert_csv['program_id']),
            'application_no' => $insert_csv['application_no'],
            'status'=>'A',
            'type'=>'call for interview',
            'upload_round'=>$round,
            'uploaded_by'=>$verfied_done_by
        );

          // echo "<pre>";
          // print_r($csv_line);
          // exit;check_application_prom_verified
          // logic before insert into table check condtion fulfil or not

          $check_paid=$this->phd_all->check_application_paid($insert_csv['registration_no']);

          $check_verfied=$this->phd_all->check_application_prom_verified($data);

          if($check_paid=='not_paid')
          {
            $count_not_paid++;
          }
          if($check_verfied=='not_verified')
          {
            $count_not_verified++;
          }
          if($check_paid=='paid' && $check_verfied=='verified')
          {
            $check_exsit=$this->phd_all->check_already_added_in_temp($data);
            if($check_exsit=='not_exist')
            {
              $check_insert=$this->phd_all->insert_csv_data($data);
              if($check_insert=='inserted')
              {
                $count_insert_sucess++;

              }
              else
              {
                $count_insert_fail++;
              }
            }
            else
            {
              $count_duplicate++;
            }
          }
          else
          {
            $error_count++;
            $count_msg .= $insert_csv['application_no'] . ' '.'<br>' ; // error application number
            // The line break has been included so that all application number  no should appear in a new line
          }
      }

      fclose($fp) or die("can't close file");

      // echo "<pre>";
      // echo "total number of error count ".$error_count;
      // echo "<pre>";
      // echo  "totalmeaage ".$count_msg;
      // echo "<pre>";
      // echo "total number of insert fail ".$count_insert_fail;
      // echo "<pre>";
      // echo "toal number of succesfully insert".$count_insert_sucess;
      // echo "<pre>";
      // echo "total number of duplicate".$count_duplicate;
      // exit;


      if ($error_count > 0)
      {
        $vals .='Total ' . $error_count . ' Records Failed,Application number is ' . $count_msg;
        $vals .='Total ' . $count_insert_sucess . ' Records successfully uploaded';
        $this->session->set_flashdata('msg_alert', $vals);
      }
      else
      {
        $vals='Total ' . $count_insert_sucess . ' Records successfully uploaded';
        $this->session->set_flashdata('msg_alert',$vals);
      }

      redirect('admission/phd/admin/dashboard/upload_excel_data');
    }
    else
    {
      $this->session->set_flashdata('msg_alert', 'Please Upload CSV File !!!');
      redirect('admission/phd/admin/dashboard/upload_excel_data');
    }


  }


  public function sink_data_for_interview()
  {

    $data['appl_data']=$this->phd_all->view_call_for_interview();
    $data['call_for_interview']=$this->phd_all->view_call_for_interview();
    $data['Synchronize_app']=$this->phd_all->view_call_for_interview();;
    $data['Synchronize_app_view']=$this->phd_all->synchronized_aplicant_data();
    $this->load->view('admission/phd/admin/layout/header');
    $this->load->view('admission/phd/admin/admin_tab_of_uploded_csv',$data);
    //$this->load->view('admission/phd/admin/admin_tab_of_uploded_csv');
    $this->load->view('admission/phd/admin/layout/footer');

  }


  public function single_approve()
  {
    $emp_no  =$this->session->userdata('emp_no');
    $emp_name  =$this->session->userdata('emp_name');
    $verfied_done_by= $emp_name."(".$emp_no.")";
    $appln=$this->input->post('approve');
    $m=0; $l=0; $k=0; $n=0; $data='';
    for($i=0; $i<count($appln); $i++)
    {
      $application=trim($appln[$i]);
      $check=$this->phd_all->check_application_prom_verified_application_no($application);
      if($check=='yes')
      {
        $time_date=date("M,d,Y h:i:s A");
        $check_status_int=$this->phd_all->check_call_for_int_status($application);
        $call_in=array(
          'call_int_status'=>'Y',
          'call_int_status_date'=>$time_date,
          'call_int_status_by'=>$verfied_done_by
        );
        $where=array(
          'application_no'=>$application,
        );

        if($check_status_int=='no')
        {
          $y=$this->phd_all->update_appl_prom_ms_call_int($call_in,$where);
          if($y)
          {
            $l++;
          }
          else
          {
            $m++;
          }
        }
        else
        {
          $n++;

        }

      }
      else
      {
        $k++;

      }

    }

    $data .='Total ' . $l . ' Records successfully updated';
    // $data .='Total ' . $m . ' Records unable to updated';
    // $data .='Total ' . $n . ' Records was updated already';
    // $data .='Total '  . $k . ' Records are not verfied form admin';
    echo json_encode($data);
  }

  public function call_for_interview_update_candidate_side()
  {
    $emp_no  =$this->session->userdata('emp_no');
    $emp_name  =$this->session->userdata('emp_name');
    $verfied_done_by= $emp_name."(".$emp_no.")";
    $appln=$this->input->post('approve');
    $m=0; $l=0; $k=0; $n=0; $data='';
    for($i=0; $i<count($appln); $i++)
    {
      $application=trim($appln[$i]);
      $check=$this->phd_all->check_application_prom_verified_application_no($application);
      if($check=='yes')
      {
        $time_date=date("M,d,Y h:i:s A");
        $check_status_int=$this->phd_all->check_call_for_int_status($application);
        $call_in=array(
          'admin_decision_status'=>'CI',
          'admin_desicion_sta_desc'=>'Call for interview',
        );
        $where=array(
          'application_no'=>preg_replace('/\s+/', ' ', $application),
        );

        if($check_status_int=='yes')
        {
          $y=$this->phd_all->update_appl_prom_ms_call_int($call_in,$where);
          if($y)
          {
            $l++;
          }
          else
          {
            $m++;
          }
        }
        else
        {
          $n++;

        }

      }
      else
      {
        $k++;

      }

    }

    $data .='Total ' . $l . ' Records successfully updated';
    // $data .='Total ' . $m . ' Records unable to updated';
    // $data .='Total ' . $n . ' Records was updated already';
    // $data .='Total '  . $k . ' Records are not verfied form admin';
    echo json_encode($data);
  }



}

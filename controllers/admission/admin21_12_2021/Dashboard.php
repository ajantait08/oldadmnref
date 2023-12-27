<?php

class Dashboard extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('admission/admin/Mba_dashboard_model', 'Mba_all', TRUE);
    $this->load->model('admission/Adm_mba_application_preview_model', 'Mba_one', TRUE);
    $this->load->model('admission/admin/Adm_admin_user_model', 'fetch_admin', TRUE);
    $this->load->helper(array('dompdf', 'file'));
    $this->load->library('PHPExcel');
    $this->load->library('PHPExcel/IOFactory');
    // $this->load->library('CSVReader'); 
  }

  public function index()
  {
    $userid = $this->session->userdata('userid');
    if ($userid) {
      $applications = $this->Mba_all->get_application_by_status();
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
      $this->load->view('admission/admin/layout/header');
      $this->load->view('admission/admin/dashboard', $data);
      $this->load->view('admission/admin/layout/footer');
    } else {
      redirect('admission/admin/dashboard/logout');
    }
  }

  public function scrutiny()
  {
    $userid = $this->session->userdata('userid');
    if ($userid) {
      $applications = $this->Mba_all->get_application_details();
      foreach ($applications as $applicant) {
        $applicant->program = $this->Mba_all->get_program_details($applicant->registration_no);
      }
      $data['appl_data'] = $applications;
      // echo "<pre>";
      // print_r($data);
      // exit;
      $this->load->view('admission/admin/layout/header');
      $this->load->view('admission/admin/scrutiny_dashboard', $data);
      $this->load->view('admission/admin/layout/footer');
    } else {
      redirect('admission/admin/dashboard/logout');
    }
  }

  public function login()
  {
    $this->load->view('admission/admin/login');
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
          'module_type' => $login[0]->module_type
        );
        $this->session->set_userdata($array);
        redirect('admission/admin/dashboard');
      } else {
        $this->session->set_flashdata('error_msg', 'Invalid Login Credentials');
        redirect('admission/admin/dashboard/login');
      }
    } else {
      $this->load->view('admission/admin/login');
    }
  }

  public function edit_application($registration_no)
  {
    $userid = $this->session->userdata('userid');
    if ($userid) {
      echo "<h1>To upload missing documents and other changes if needed, from admin end <h1>";
      exit;
      $data = $this->fetch_mba_detail($registration_no);
      $this->load->view('admission/admin/layout/header');
      $this->load->view('admission/admin/edit_application', $data);
      $this->load->view('admission/admin/layout/footer');
    } else {
      redirect('admission/admin/dashboard/logout');
    }
  }

  public function scrutiny_view($registration_no)
  {
    $userid = $this->session->userdata('userid');
    if ($userid) {
      $data = $this->fetch_mba_detail($registration_no);
      $file_path =  'assets/admission/mba/' . $registration_no . '/Application_form' . $registration_no . '.pdf';
      if (file_exists($file_path)) {
        $data['application_preview'] = $file_path;
      } else {
        $data['print'] = 'Y';
        $html = $this->load->view('admission/adm_mba_application_preview', $data, TRUE);
        $paper = '';
        $stream = FALSE;
        $output = pdf_create($html, $registration_no . "_ApplicationForm", $paper, $stream);
        $file_to_save = FCPATH . 'assets/admission/mba/' . $registration_no . '/Application_form' . $registration_no . '.pdf';
        file_put_contents($file_to_save, $output);
        $data['application_preview'] = $file_to_save;
      }
      $data['reason'] = $this->Mba_all->get_reason_ms();
      $data['crnt_rsn'] = [];
      $data['existing_rsn'] = $this->Mba_all->get_active_reason($registration_no);
      if ($data['existing_rsn']) {
        foreach ($data['existing_rsn'] as $e_rsn) {
          $current_rsn[] = $e_rsn->reason_sn;
          if ($e_rsn->reason_sn == 0) {
            $data['other_rsn_crnt_vlu'] = $e_rsn->other_reason;
          }
        }
        $data['crnt_rsn'] = $current_rsn;
      }
      $this->load->view('admission/admin/layout/header');
      // $this->load->view('admission/admin/scrutiny-old', $data);
      $this->load->view('admission/admin/scrutiny', $data);
      $this->load->view('admission/admin/layout/footer');
    } else {
      redirect('admission/admin/dashboard/logout');
    }
  }

  public function scrutiny_remark($registration_no)
  {
    $userid = $this->session->userdata('userid');
    if ($userid) {
      $verf_action = trim($this->input->post('verf_action'));
      switch ($verf_action) {
        case 1:
          $verf_remark1 = "Verified - OK";
          break;
        case 2:
          $verf_remark1 = "Verified - NOT OK";
          break;
        default:
          $verf_remark1 = "";
      }
      $data = array(
        'verf_action' => $verf_action,
        'verf_remark' => $verf_remark1,
        'registration_no' => $registration_no,
      );
      $this->Mba_all->update_status($data);
      $this->Mba_all->deactivate_previous_rsn($registration_no);

      $data['reason'] = $this->Mba_all->get_reason_ms();
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
      $this->Mba_all->insert_new_rjct_rsn($insert_data);

      if ($othrflag) {
        $data = array(
          'other_reason' => trim($this->input->post('verf_remark')),
        );
        $this->Mba_all->update_other_reason($data, $registration_no);
      }
      $this->session->set_flashdata('success', 'Document Verification done successfully for ' . $registration_no);
      redirect('admission/admin/dashboard/scrutiny');
    } else {
      redirect('admission/admin/dashboard/logout');
    }
  }

  public function fetch_mba_detail($registration_no)
  {
    $userid = $this->session->userdata('userid');
    if ($userid) {
      $data['application'] = $this->Mba_one->get_application_details($registration_no);
      $data['address'] = $this->Mba_one->get_address($registration_no);
      $data['fellowship'] = $this->Mba_one->get_fellowship_details($registration_no);
      $data['qulaification'] = $this->Mba_one->get_qulaification_details($registration_no);
      $data['program'] = $this->Mba_one->get_program_details($registration_no);
      $data['work_exp'] = $this->Mba_one->get_work_exp_details($registration_no);
      $data['doc'] = $this->Mba_one->get_doc_path($registration_no);
      $data['photo'] = $this->Mba_one->get_photo_path($registration_no);
      $data['sign'] = $this->Mba_one->get_sign_path($registration_no);
      $qrcode = $this->Mba_one->get_qrcode_path($registration_no);
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
      redirect('admission/admin/dashboard/logout');
    }
  }

  public function qrcode_generate($info)
  {
    $userid = $this->session->userdata('userid');
    if ($userid) {
      $registration_no = $this->session->userdata('registration_no');
      $registration_no = $info[0]->registration_no;
      $this->load->library('ciqrcode');
      $params['data'] = $registration_no . ', ' . $info[0]->first_name . " " . $info[0]->middle_name . " " . $info[0]->last_name;
      $params['level'] = 'H';
      $params['size'] = 5;
      $params['savename'] = FCPATH . 'assets/admission/mba/' . $registration_no . '/qrcode' . $registration_no . '.png';
      $this->ciqrcode->generate($params);
      $email = $info[0]->email;
      $this->Mba_one->insert_qrcode($email, $registration_no);
      return 'assets/admission/mba/' . $registration_no . '/qrcode' . $registration_no . '.png';
    } else {
      redirect('admission/admin/dashboard/logout');
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('admission/admin/dashboard/login');
  }

  public function applicant_excel_download()
  {
    $data['applicant_details'] = $this->Mba_all->get_all_applicant_details();
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->getActiveSheet()->setTitle('All Application Details');
    $row = 4;
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
      $objPHPExcel->getActiveSheet()->setCellValue('K' . $row, $applicant->betch_iit);
      $objPHPExcel->getActiveSheet()->setCellValue('L' . $row, $applicant->betch_iit_name);
      $objPHPExcel->getActiveSheet()->setCellValue('M' . $row, $applicant->math_stat_flag);
      $objPHPExcel->getActiveSheet()->setCellValue('N' . $row, $applicant->pay_mode);
      $objPHPExcel->getActiveSheet()->setCellValue('O' . $row, $applicant->payment_amount);
      $objPHPExcel->getActiveSheet()->setCellValue('P' . $row, '\''.$applicant->transaction_id);
      $objPHPExcel->getActiveSheet()->setCellValue('Q' . $row, $applicant->order_id);
      if ($applicant->doc_verfied_flag == 1) {
        $objPHPExcel->getActiveSheet()->setCellValue('R' . $row, "Verified - OK");
      } elseif ($applicant->doc_verfied_flag == 2) {
        $objPHPExcel->getActiveSheet()->setCellValue('R' . $row, "Verified - Not OK");
      } else {
        $objPHPExcel->getActiveSheet()->setCellValue('R' . $row, "Not Started");
      }
      $objPHPExcel->getActiveSheet()->setCellValue('S' . $row, $applicant->doc_ver_reason);
      $objPHPExcel->getActiveSheet()->setCellValue('T' . $row, $applicant->doc_verfied_by);
      $program = $this->Mba_one->get_program_details($applicant->registration_no);
      $fellowship = $this->Mba_one->get_fellowship_details($applicant->registration_no);
      $qulaification = $this->Mba_one->get_qulaification_details($applicant->registration_no);
      $work_exp = $this->Mba_one->get_work_exp_details($applicant->registration_no);
      $existing_rsn = $this->Mba_all->get_active_reason($applicant->registration_no);
      // echo "<pre>";
      // print_r($existing_rsn);
      // exit;
      $pgm = "";
      foreach ($program as  $prgm) {
        $pgm .= $prgm->program_desc . " - " . $prgm->program_id . "\r";
        $objPHPExcel->getActiveSheet()->setCellValue('U' . $row, $pgm);
      }
      if (!empty($fellowship)) {
        foreach ($fellowship as  $cat) {
          $objPHPExcel->getActiveSheet()->setCellValue('V' . $row, $cat->cat_reg_no);
          $objPHPExcel->getActiveSheet()->setCellValue('W' . $row, $cat->cat_score);
          $objPHPExcel->getActiveSheet()->setCellValue('X' . $row, $cat->cat_percentile);
        }
      } else {
        $objPHPExcel->getActiveSheet()->setCellValue('V' . $row, "N/A");
        $objPHPExcel->getActiveSheet()->setCellValue('W' . $row, "N/A");
        $objPHPExcel->getActiveSheet()->setCellValue('X' . $row, "N/A");
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
          $objPHPExcel->getActiveSheet()->setCellValue('Y' . $row, $exam_type);
          $objPHPExcel->getActiveSheet()->setCellValue('Z' . $row, $institue_name);
          $objPHPExcel->getActiveSheet()->setCellValue('AA' . $row, $result_status);
          $objPHPExcel->getActiveSheet()->setCellValue('AB' . $row, $mrk_cgpa_type);
          $objPHPExcel->getActiveSheet()->setCellValue('AC' . $row, $yop);
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
          $objPHPExcel->getActiveSheet()->setCellValue('AD' . $row, $designation);
          $objPHPExcel->getActiveSheet()->setCellValue('AE' . $row, $organistion);
          $objPHPExcel->getActiveSheet()->setCellValue('AF' . $row, $nature_of_wrk);
          $objPHPExcel->getActiveSheet()->setCellValue('AG' . $row, $sector);
          $objPHPExcel->getActiveSheet()->setCellValue('AH' . $row, $duration_in_month);
        }
        $objPHPExcel->getActiveSheet()->setCellValue('AI' . $row, $totalexp . " Months");
      } else {
        $objPHPExcel->getActiveSheet()->setCellValue('AD' . $row, "N/A");
        $objPHPExcel->getActiveSheet()->setCellValue('AE' . $row, "N/A");
        $objPHPExcel->getActiveSheet()->setCellValue('AF' . $row, "N/A");
        $objPHPExcel->getActiveSheet()->setCellValue('AG' . $row, "N/A");
        $objPHPExcel->getActiveSheet()->setCellValue('AH' . $row, "N/A");
        $objPHPExcel->getActiveSheet()->setCellValue('AI' . $row, "N/A");
      }
      if (!empty($existing_rsn)) {
        $OtherRsn = " ";
        $c = 1;
        foreach ($existing_rsn as  $rsn) {
          if ($rsn->reason == "Others") {
            $OtherRsn .= $c . " " . $rsn->reason . " - " . $rsn->other_reason . "\r";
          } else {
            $OtherRsn .= $c . " " . $rsn->reason . "\r";
          }
          $objPHPExcel->getActiveSheet()->setCellValue('AJ' . $row, $OtherRsn);
          $c++;
        }
      } else {
        $objPHPExcel->getActiveSheet()->setCellValue('AJ' . $row, "N/A");
      }
      $photo = $this->Mba_one->get_photo_path($applicant->registration_no);
      $sign = $this->Mba_one->get_sign_path($applicant->registration_no);
      if ($photo[0]->doc_path != NULL) {
        $objDrawing = new PHPExcel_Worksheet_Drawing();
        $objDrawing->setPath($photo[0]->doc_path);
        $objDrawing->setCoordinates('AK' . $row);
        $objDrawing->setHeight(140);
        $objDrawing->setWidth(80);
        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
      }
      if ($sign[0]->doc_path != NULL) {
        $objDrawing = new PHPExcel_Worksheet_Drawing();
        $objDrawing->setPath($sign[0]->doc_path);
        $objDrawing->setCoordinates('AL' . $row);
        $objDrawing->setHeight(32);
        $objDrawing->setWidth(32);
        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
      }
      $sn++;
      $row++;
    }
    $row--;
    $objPHPExcel->getActiveSheet()->mergeCells('A1:AL1');
    $objPHPExcel->getActiveSheet()->mergeCells('A2:M2');
    $objPHPExcel->getActiveSheet()->mergeCells('N2:Q2');
    $objPHPExcel->getActiveSheet()->mergeCells('R2:T2');
    $objPHPExcel->getActiveSheet()->mergeCells('U2:U3');
    $objPHPExcel->getActiveSheet()->mergeCells('V2:X2');
    $objPHPExcel->getActiveSheet()->mergeCells('Y2:AC2');
    $objPHPExcel->getActiveSheet()->mergeCells('AD2:AI2');
    $objPHPExcel->getActiveSheet()->mergeCells('AJ2:AJ3');
    $objPHPExcel->getActiveSheet()->mergeCells('AK2:AK3');
    $objPHPExcel->getActiveSheet()->mergeCells('AL2:AL3');
    $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'INDIAN INSTITUTE OF TECHNOLOGY (INDIAN SCHOOL OF MINES), DHANBAD');
    $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'List Of All Applicants (MBA - 2022-34)');
    $objPHPExcel->getActiveSheet()->SetCellValue('N2', 'Payment Detail');
    $objPHPExcel->getActiveSheet()->SetCellValue('R2', 'Document Verification Status');
    $objPHPExcel->getActiveSheet()->SetCellValue('U2', 'Programs');
    $objPHPExcel->getActiveSheet()->SetCellValue('V2', 'CAT Details');
    $objPHPExcel->getActiveSheet()->SetCellValue('Y2', 'Equcational Qualification');
    $objPHPExcel->getActiveSheet()->SetCellValue('AD2', 'Work Experience');
    $objPHPExcel->getActiveSheet()->SetCellValue('AJ2', 'Rejection Reason');
    $objPHPExcel->getActiveSheet()->SetCellValue('AK2', 'Photo');
    $objPHPExcel->getActiveSheet()->SetCellValue('AL2', 'Signature');
    $objPHPExcel->getActiveSheet()->SetCellValue('A3', 'Sl. No.');
    $objPHPExcel->getActiveSheet()->SetCellValue('B3', 'Registration No.');
    $objPHPExcel->getActiveSheet()->SetCellValue('C3', 'Name');
    $objPHPExcel->getActiveSheet()->SetCellValue('D3', 'Category');
    $objPHPExcel->getActiveSheet()->SetCellValue('E3', 'PWD');
    $objPHPExcel->getActiveSheet()->SetCellValue('F3', 'Mobile');
    $objPHPExcel->getActiveSheet()->SetCellValue('G3', 'E-mail');
    $objPHPExcel->getActiveSheet()->SetCellValue('H3', 'D.O.B');
    $objPHPExcel->getActiveSheet()->SetCellValue('I3', 'Gender');
    $objPHPExcel->getActiveSheet()->SetCellValue('J3', 'Maritial Status');
    $objPHPExcel->getActiveSheet()->SetCellValue('K3', 'B. Tech from IIT');
    $objPHPExcel->getActiveSheet()->SetCellValue('L3', 'IIT Name');
    $objPHPExcel->getActiveSheet()->SetCellValue('M3', 'Maths/ Stats. Flag');
    $objPHPExcel->getActiveSheet()->SetCellValue('N3', 'Payment Mode');
    $objPHPExcel->getActiveSheet()->SetCellValue('O3', 'Payment Amount');
    $objPHPExcel->getActiveSheet()->SetCellValue('P3', 'Transaction Id');
    $objPHPExcel->getActiveSheet()->SetCellValue('Q3', 'Order Id');
    $objPHPExcel->getActiveSheet()->SetCellValue('R3', 'Doc. Verification Status');
    $objPHPExcel->getActiveSheet()->SetCellValue('S3', 'Verification Reason');
    $objPHPExcel->getActiveSheet()->SetCellValue('T3', 'Verified By');
    $objPHPExcel->getActiveSheet()->SetCellValue('V3', 'CAT Registration No.');
    $objPHPExcel->getActiveSheet()->SetCellValue('W3', 'CAT Score');
    $objPHPExcel->getActiveSheet()->SetCellValue('X3', 'CAT Percentile');
    $objPHPExcel->getActiveSheet()->SetCellValue('Y3', 'Exam');
    $objPHPExcel->getActiveSheet()->SetCellValue('Z3', 'School/ University');
    $objPHPExcel->getActiveSheet()->SetCellValue('AA3', 'Result Status');
    $objPHPExcel->getActiveSheet()->SetCellValue('AB3', 'Marks');
    $objPHPExcel->getActiveSheet()->SetCellValue('AC3', 'Year of Passing');
    $objPHPExcel->getActiveSheet()->SetCellValue('AD3', 'Designation');
    $objPHPExcel->getActiveSheet()->SetCellValue('AE3', 'Organization');
    $objPHPExcel->getActiveSheet()->SetCellValue('AF3', 'Nature of Work');
    $objPHPExcel->getActiveSheet()->SetCellValue('AG3', 'Sector');
    $objPHPExcel->getActiveSheet()->SetCellValue('AH3', 'Duration');
    $objPHPExcel->getActiveSheet()->SetCellValue('AI3', 'Total Experience');
    $objPHPExcel->getActiveSheet()->getStyle('A1:AL' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objPHPExcel->getActiveSheet()->getStyle('A1:AL' . $row)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objPHPExcel->getActiveSheet()->getStyle('C4:C' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
    $objPHPExcel->getActiveSheet()->getStyle('U4:U' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
    $objPHPExcel->getActiveSheet()->getStyle('Y4:AA' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
    $objPHPExcel->getActiveSheet()->getStyle('AD4:AG' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
    $objPHPExcel->getActiveSheet()->getStyle('AJ4:AJ' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
    $objPHPExcel->getActiveSheet()->getStyle('A1:AL3')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
    $objPHPExcel->getActiveSheet()->getStyle('A2:AL2')->getFont()->setSize(14);
    $objPHPExcel->getActiveSheet()->getStyle('A3:AL3')->getFont()->setSize(12);
    $styleArray = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)));
    $objPHPExcel->getActiveSheet()->getStyle('A1:AL' . $row)->applyFromArray($styleArray);
    unset($styleArray);
    $objPHPExcel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    $objPHPExcel->getActiveSheet()->getStyle('A1:AL' . $row)->getAlignment()->setWrapText(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(13);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(14);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(9);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(6);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(11);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(21);
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(8);
    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(10);
    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(7);
    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(14);
    $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(10);
    $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(9);
    $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(9);
    $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(16);
    $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(16);
    $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(12);
    $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(12);
    $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(18);
    $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(11);
    $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(12);
    $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(10);
    $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(10);
    $objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(18);
    $objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(18);
    $objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(12);
    $objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(8);
    $objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(8);
    $objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('AG')->setWidth(16);
    $objPHPExcel->getActiveSheet()->getColumnDimension('AH')->setWidth(11);
    $objPHPExcel->getActiveSheet()->getColumnDimension('AI')->setWidth(11);
    $objPHPExcel->getActiveSheet()->getColumnDimension('AJ')->setWidth(40);
    $objPHPExcel->getActiveSheet()->getColumnDimension('AK')->setWidth(50);
    $objPHPExcel->getActiveSheet()->getColumnDimension('AL')->setWidth(40);
    $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');
    $filename = 'DetailsofMBA_Applicants.xls';
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');
    ob_end_clean();
    $objWriter->save('php://output');
  }
}

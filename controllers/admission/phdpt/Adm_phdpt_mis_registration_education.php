<?php defined('BASEPATH') or exit('No direct script access allowed');

class Adm_phdpt_mis_registration_education extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('dompdf', 'file'));
        $this->load->model('admission/phdpt/Adm_phdpt_application_preview_model', 'Phd_all', TRUE);
        $this->load->model('admission/phdpt/Adm_phdpt_mis_registration_model','Phd_mis_reg',TRUE);
        //$this->load->library('Ssh2_connect');
    }

    public function index(){
      #echo 'entered education'; exit;
      $registration_no = $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        $count_ml = 0;
        if ($registration_no && ($login_type =='Phdpt')) {
          $data['val'] = "home";
          $data['application'] = $this->Phd_all->get_application_details($registration_no);
          $data['program'] = $this->Phd_all->get_program_details($registration_no);
          $data['tab_stat'] = $this->Phd_all->get_tab_status($registration_no);
          $data['program_selected'] = $this->session->userdata('selected_program');
          $appl_type = $this->Phd_mis_reg->get_appl_type_from_reg_no($registration_no);
          $login_id = $this->Phd_mis_reg->validate_login($registration_no,$data['program_selected'],$appl_type);
            //$admission_no=$this->Phd_mis_reg->get_admn_no_from_stud_final_with_fee($registration_no);
            $admn_type='';
                if($login_id){
                 $admn_type=$login_id['admn_type'];
                 $data['admn_type']=$admn_type;
                }
                if($login_id && $admn_type=='jrf')
                {
                    #echo 'entered here'; exit;
                   // check fee_status for payment 26-05-2021
                   //$order_no = $this->generate_order_no($admn_type); // Generate order no
                   $newDOB = date("d-m-Y", strtotime($login_id['dob']));
                   // for payment data send to payment view in newadmission
                   $fee_payment = array(
                   'name' => $login_id['first_name']." ".$login_id['middle_name']." ".$login_id['last_name'],
                   'app_id' => $login_id['reg_id'],
                   'contact_no' => $login_id['contact_no'],
                   'email' => $login_id['email'],
                   'category' => $login_id['category'],
                   'dob' => $newDOB,
                   'fee_to_be_paid' => $login_id['fee_to_be_paid'],
                  // 'order_no' => $order_no
                   );

                   $timestamp = date('Y-m-d H:i:s');
                   $insert_order_no = array(
                   //'order_no' => $order_no,
                   'created_at' => $timestamp
                   );

                   //$login_id=$this->Phd_mis_reg->validate_login_final($registration_no); // check from final table
                    // payment done data available in stud_final_with_fee table for registration 2021
                    if($login_id)
                    {
                      // main part of mba after checking payment either print form or load form 25-7-2021
                  //   $login_id['fee_mode'] = 'online';
                  //   $iitism_email_pass = $this->generate_iitism_email_password(); // create 8 char email pass
                  //   $login_id['iitism_password'] = $iitism_email_pass;

                  // $admn_no=$login_id['admn_no'];
                 // either print form or load form
                   $admn_no = '';
                   $this->session->set_userdata($admn_no,$admn_type);
                   $pay_status_selected = $this->Phd_mis_reg->check_payment_status_appl_selected($registration_no);
                   $tab4 = $this->Phd_mis_reg->check_tab4_status($registration_no);
                  if($tab4 != '' && $pay_status_selected != '')// already submitted
                  {
                    redirect('admission/phdpt/Adm_phdpt_application_preview');
                  }
                  else
                  {

                    //echo 'entered 2'; exit;

                      // echo '<pre>';
                      // print_r($login_id);
                      // echo '</pre>';
                      // exit;
                     // if credentials match then upload online receipt in assets/images/student/admn_no 5_7_21
                    //  $receipt_payment = array(
                    //   'admn_no' => $login_id['admn_no'],
                    //   'reg_id' => $login_id['reg_id'],
                    //   'name' => $login_id['first_name'].' '.$login_id['middle_name'].' '.$login_id['last_name'],
                    //   'admn_type' => $login_id['admn_type'],
                    //   'contact_no' => $login_id['contact_no'],
                    //   'email' => $login_id['email'],
                    //   'dob' => $login_id['dob'],
                    //   'branch_id' => $login_id['branch_id'],
                    //   'course_id' => $login_id['course_id'],
                    //   'dept_id' => $login_id['dept_id'],
                    //   'fee_status_msg' => $login_id['fee_status_msg'],
                    //   'order_no' => $login_id['fee_order_no'],
                    //   'payment_date' => $login_id['fee_payment_at'],
                    //   'fee_to_be_paid' => $login_id['fee_to_be_paid']
                    //   );

                     # comment receipt part here because it will be generated dynamically #
                    //   $receipt_path = $this->download_receipt($receipt_payment);
                    //   $login_id['receipt_path'] = $receipt_path['receipt_path'];
                    //   $login_id['receipt_name_order_no'] = $receipt_path['receipt_name_order_no'];

                    # comment receipt part here because it will be generated dynamically #

                      #xxxxxxxxxxxxxxxxxxxxxxxxxx JRF
                      $login_id['education_details'] = $this->Phd_mis_reg->get_phd_education_details($login_id['reg_id']);
                      // echo '<pre>';
                      // print_r($login_id);
                      // echo '</pre>';
                      $count_dynamic_edu_details = count($login_id['education_details']); //exit;
                      $login_id['array_dynamic_education_new'] = array();

                        foreach($login_id['education_details'] as $key => $education_details){
                         if($key > 1){
                         array_push($login_id['array_dynamic_education_new'],$login_id['education_details'][$key]);
                        }
                      }

                      $login_id['photo_signature'] = $this->Phd_mis_reg->get_photo_signature_phd($login_id['reg_id']);
                      // echo '<pre>';
                      // print_r($login_id);
                      // echo '</pre>';
                      // exit;
                      $reg_tab_status = $this->Phd_mis_reg->get_current_user_tab_status($registration_no);
                      if (empty($reg_tab_status)) {
                      redirect('admission/phdpt/Adm_phdpt_mis_registration/proceed_with_registration');
                      }
                      else {
                     $tab_status = $reg_tab_status[0]['tab_status'];

                      if ($tab_status == '0') {
                      redirect('admission/phdpt/Adm_phdpt_mis_registration/proceed_with_registration');
                      }
                      if ($tab_status == '1') {
                        //echo 'entered status'; exit;
                        $this->adm_phdpt_header($data);
                        $this->load->view('admission/phdpt/mis_registration_common_form_education_details', $login_id);
                        $this->adm_phdpt_footer();
                      }
                      if ($tab_status == '2') {
                        redirect('admission/phdpt/Adm_phdpt_mis_registration/parent_bank_account_details');
                      }
                      if ($tab_status == '3') {
                        redirect('admission/phdpt/Adm_phdpt_mis_registration_other_details/mis_reg_save_stu_other_imp_details');
                      }
                      if ($tab_status == '4') {
                        redirect('admission/phdpt/Adm_phdpt_mis_registration_other_details/mis_reg_stu_other_details_preview');
                      }
                      if ($tab_status == '5') {
                        // echo $admn_no;
                        // echo $admn_type;
                        // exit;
                        $details=$this->getFromTables($admn_no,$admn_type);
                        $data1['admn_type']=$admn_type;
                        $data1['registration_no'] = $login_id['reg_id'];
                        $details=array_merge($details,$data1);
                        $this->session->set_userdata("admn_no",$admn_no);
                        $this->adm_phdpt_header($data);
                        $this->load->view('admission/phdpt/mis_reg_download_common_format',$details);
                        $this->adm_phdpt_footer();
                      }
                    }
                }

                }

                }
                else{
                    #echo 'entered else here'; exit;
                    redirect('admission/phdpt/Adm_phdpt_registration/logout');
                }
            }
            else{
                redirect('admission/phdpt/Adm_phdpt_registration/logout');
            }

        }


function mis_registration_save_education_details(){
    $registration_no = $this->session->userdata('registration_no');
    $login_type = $this->session->userdata('login_type');
    $count_ml = 0;
    if ($registration_no && ($login_type =='Phdpt')) {
        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';
        //exit;
        $admn_type = $this->input->post('admn_type');
        $admn_based_on = $this->input->post('admn_based_on');
        $institute_name = $this->input->post('institute_name');
        //$admn_no = $this->input->post('admn_no');
        $admn_no = '';
        $this->form_validation->set_rules('exam0','Board 10th','required');
        $this->form_validation->set_rules('institute0','Institution 10th','required');
        $this->form_validation->set_rules('year0','Year 10th','required');
        $this->form_validation->set_rules('marksheet0','Marksheet 10th','required');
        $this->form_validation->set_rules('certificate0','Certificate 10th','required');
        $this->form_validation->set_rules('grade0','Grade 10th','required');
        $this->form_validation->set_rules('division0','Division 10th','required');
        $this->form_validation->set_rules('sub0','Subject 10th','required');
        $this->form_validation->set_rules('exam1','Board 12th','required');
        $this->form_validation->set_rules('institute1','Institution 12th','required');
        $this->form_validation->set_rules('year1','Year 12th','required');
        $this->form_validation->set_rules('marksheet1','Marksheet 12th','required');
        $this->form_validation->set_rules('certificate1','Certificate 12th','required');
        $this->form_validation->set_rules('grade1','Grade 12th','required');
        $this->form_validation->set_rules('division1','Division 12th','required');
        $this->form_validation->set_rules('sub1','Subject 12th','required');
        $this->form_validation->set_rules('abc_id','ABC ID','required');
        $upload_error = $this->our_upload($admn_no,$admn_type,$registration_no);
        // echo '<pre>';
        // print_r($upload_error);
        // echo '</pre>';

        // echo '<pre>';
        // print_r(validation_errors());
        // echo '</pre>';

        // exit;
        if(empty($upload_error))
        {
            //echo 'all validation passed'; exit;
            $details = $this->input->post();
            //echo '<pre>'; print_r($details); echo '</pre>'; exit;
            $dynamic_education = $this->dynamic_edu_array($details);
            $details['dynamic_education'] = $dynamic_education;
            if(!empty($details['photo'])) {
                $photo_file_ext = pathinfo($details['photo'], PATHINFO_EXTENSION);
                $details['photo'] = "stu_".strtolower($details['admn_no'])."_photo.".strtolower($photo_file_ext);
               }

               if(!empty($details['sign'])) {
                $sign_file_ext = pathinfo($details['sign'], PATHINFO_EXTENSION);
                $details['sign'] = "stu_".strtolower($details['admn_no'])."_sign.".strtolower($sign_file_ext);
               }

               if(!empty($details['marksheet0'])) {
                 //echo $details['marksheet0'];
                //  $marksheet0_file_ext = pathinfo($details['marksheet0'], PATHINFO_EXTENSION);
                // $details['marksheet0'] = "stu_".strtolower($details['admn_no'])."_marksheet_10th.".strtolower($marksheet0_file_ext);
                $details['marksheet0'] = $details['marksheet0'];
               }

               if(!empty($details['certificate0'])) {
                //echo $details['certificate0'];
                //  $certificate0_file_ext = pathinfo($details['certificate0'], PATHINFO_EXTENSION);
                // $details['certificate0'] = "stu_".strtolower($details['admn_no'])."_certificate_10th.".strtolower($certificate0_file_ext);
                $details['certificate0'] = $details['certificate0'];
               }

               if(!empty($details['marksheet1'])) {
                //  $marksheet1_file_ext = pathinfo($details['marksheet1'], PATHINFO_EXTENSION);
                // $details['marksheet1'] = "stu_".strtolower($details['admn_no'])."_marksheet_12th.".strtolower($marksheet1_file_ext);
                $details['marksheet1'] = $details['marksheet1'];
               }

               if(!empty($details['certificate1'])) {
                //  $certificate1_file_ext = pathinfo($details['certificate1'], PATHINFO_EXTENSION);
                //  $details['certificate1'] = "stu_".strtolower($details['admn_no'])."_certificate_12th.".strtolower($certificate1_file_ext);
                $details['certificate1'] = $details['certificate1'];
               }

              //  if(!empty($details['admn_no'])) {
              //    echo 'entered marksheet with admn_no'; exit;
                 if(!empty($details['marksheet'])) {
                   //$i = 1;
                   foreach($details['dynamic_education'] as $key => $basename) {
                     //echo $basename['marksheet'];
                     if (isset($basename['marksheet'])) {
                     //$marksheet_file_ext = pathinfo($basename['marksheet'], PATHINFO_EXTENSION);
                     //$details['dynamic_education'][$key]['marksheet'] = "stu_".strtolower($details['admn_no'])."_marksheet_".$key.".".strtolower($marksheet_file_ext);
                     $details['dynamic_education'][$key]['marksheet'] = $basename['marksheet'];
                     }

                    }
                 }

                 if(!empty($details['certificate'])) {

                   foreach($details['dynamic_education'] as $key => $basename) {
                     //echo $basename['certificate'];
                     if (isset($basename['certificate'])) {
                    //  $certificate_file_ext = pathinfo($basename['certificate'], PATHINFO_EXTENSION);
                    //  $details['dynamic_education'][$key]['certificate'] = "stu_".strtolower($details['admn_no'])."_certificate_".$key.".".strtolower($certificate_file_ext);
                        $details['dynamic_education'][$key]['certificate'] = $basename['certificate'];
                     }
                    }
                 }
               //}
              //  else{
              //    echo 'admn no. not generated';
              //  }

               //exit;
              //  echo '<pre>';
              //  print_r($details);
              //  echo '</pre>';
              //  exit;

      $data['basic_edu_details'] = array(
        'registration_no' => $registration_no,
        'admn_based_on' => $this->input->post('admn_based_on'),
        'institute_name' => $this->input->post('institute_name'),
        'admn_no' => $this->input->post('admn_no'),
        'admn_type' => $this->input->post('admn_type'),
        'department' => $this->input->post('department'),
        'branch' => $this->input->post('branch'),
        'abc_id' => $this->input->post('abc_id'),
        'gate_score' => $this->input->post('gate_score'),
        'other_rank' => $this->input->post('other_rank'),
        'created_date' => date('d-m-Y H:i:s'),
        'created_by' => $registration_no
      );

      $i = 0;
      $class = '10';
      $exam_type = '10th';

        $stu_prev_education_details[$i]['registration_no'] = $registration_no;
        $stu_prev_education_details[$i]['admn_no'] = $details['admn_no'];
        $stu_prev_education_details[$i]['sno'] = $i+1;
        $stu_prev_education_details[$i]['exam'] = substr($details['exam0'],0,95);
        # xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx add columns for stu_prev_education xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
        $stu_prev_education_details[$i]['exam_type'] = $exam_type;
        $stu_prev_education_details[$i]['verification_status'] = 'verified';
        $stu_prev_education_details[$i]['updated_by'] = $details['admn_no'];
        # xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx add columns for stu_prev_education xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
        $stu_prev_education_details[$i]['specialization'] = $class;
        $stu_prev_education_details[$i]['institute'] = substr($details['institute0'],0,195);/////
        $stu_prev_education_details[$i]['year'] = intval($details['year0']);
        $stu_prev_education_details[$i]['grade'] = substr($details['grade0'],0,45);
        $stu_prev_education_details[$i]['division'] = substr($details['division0'],0,10);

        $class = '12';
        $exam_type = '12th';
        $i++;


        $stu_prev_education_details[$i]['registration_no'] = $registration_no;
        $stu_prev_education_details[$i]['admn_no'] = $details['admn_no'];
        $stu_prev_education_details[$i]['sno'] = $i+1;
        $stu_prev_education_details[$i]['exam'] = substr($details['exam1'],0,95);
        # xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx add columns for stu_prev_education xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
        $stu_prev_education_details[$i]['exam_type'] = $exam_type;
        $stu_prev_education_details[$i]['verification_status'] = 'verified';
        $stu_prev_education_details[$i]['updated_by'] = $details['admn_no'];
        # xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx add columns for stu_prev_education xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
        $stu_prev_education_details[$i]['specialization'] = $class;
        $stu_prev_education_details[$i]['institute'] = substr($details['institute1'],0,195);/////
        $stu_prev_education_details[$i]['year'] = intval($details['year1']);
        $stu_prev_education_details[$i]['grade'] = substr($details['grade1'],0,45);
        $stu_prev_education_details[$i]['division'] = substr($details['division1'],0,10);

        if($admn_type!='jee')
      {
         $p=3;
          foreach($details['dynamic_education'] as $key => $dynamic_education)
          {

            $stu_prev_education_dynamic_details[$key]['registration_no'] = $registration_no;
            $stu_prev_education_dynamic_details[$key]['admn_no'] = $details['admn_no'];
            $stu_prev_education_dynamic_details[$key]['sno'] = $p+$key;
            $stu_prev_education_dynamic_details[$key]['exam'] = substr($dynamic_education['exam'],0,95);
            # xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx add columns for stu_prev_education xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
            $stu_prev_education_dynamic_details[$key]['exam_type'] = substr($dynamic_education['specialization'],0,95);
            $stu_prev_education_dynamic_details[$key]['verification_status'] = 'verified';
            $stu_prev_education_dynamic_details[$key]['updated_by'] = $details['admn_no'];
            # xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx add columns for stu_prev_education xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
            $stu_prev_education_dynamic_details[$key]['specialization'] = substr($dynamic_education['specialization'],0,95);
            $stu_prev_education_dynamic_details[$key]['institute'] = substr($dynamic_education['institute'],0,195);/////
            $stu_prev_education_dynamic_details[$key]['year'] = intval($dynamic_education['year']);
            $stu_prev_education_dynamic_details[$key]['grade'] = substr($dynamic_education['grade'],0,45);
            $stu_prev_education_dynamic_details[$key]['division'] = substr($dynamic_education['division'],0,10);
        }
        $stu_prev_education_details_final = array_merge($stu_prev_education_details, $stu_prev_education_dynamic_details);
        //$stu_prev_education_details_final = $stu_prev_education_dynamic_details;
      }

      $i = 0;
      $admn_no_path = strtolower($details['admn_no']);

      $stu_prev_certificates[$i]['registration_no'] = $registration_no;
      $stu_prev_certificates[$i]['admn_no'] = $details['admn_no'];
      $stu_prev_certificates[$i]['sno'] = $i+1;
    //   $stu_prev_certificates[$i]['marks_sheet'] = 'student/'.$admn_no_path.'/'.$details['marksheet0'];
    //   $stu_prev_certificates[$i]['certificate'] = 'student/'.$admn_no_path.'/'.$details['certificate0'];
      $stu_prev_certificates[$i]['marks_sheet'] = $details['marksheet0'];
      $stu_prev_certificates[$i]['certificate'] = $details['certificate0'];
      $stu_prev_certificates[$i]['specialization'] = substr($details['specialization0'],0,95);
      //$stu_prev_certificates[$i]['signpath'] = 'student/'.$admn_no_path.'/'.$details['sign'];
      $stu_prev_certificates[$i]['sub'] = substr($details['sub0'],0,95);
      $stu_prev_certificates[$i]['created_date'] = date('d-m-Y H:i:s');
      $stu_prev_certificates[$i]['created_by'] = $registration_no;
    //     if($admn_type=='jee')
    //   {
    //       $stu_prev_certificates[$i]['jee_adv_rollno'] = 0; // 0 $details['reg_id'];
    //       $stu_prev_certificates[$i]['jam_reg_id'] = '';
    //   }
    // else
    // {
    //   $stu_prev_certificates[$i]['jam_reg_id'] = $details['reg_id'];
    //   $stu_prev_certificates[$i]['jee_adv_rollno'] = 0;
    // }

      $i++;

//12th prev_certificates
      $stu_prev_certificates[$i]['registration_no'] = $registration_no;
      $stu_prev_certificates[$i]['admn_no'] = $details['admn_no'];
      $stu_prev_certificates[$i]['sno'] = $i+1;
    //   $stu_prev_certificates[$i]['marks_sheet'] = 'student/'.$admn_no_path.'/'.$details['marksheet1'];
    //   $stu_prev_certificates[$i]['certificate'] = 'student/'.$admn_no_path.'/'.$details['certificate1'];
      $stu_prev_certificates[$i]['marks_sheet'] = $details['marksheet1'];
      $stu_prev_certificates[$i]['certificate'] = $details['certificate1'];
      $stu_prev_certificates[$i]['specialization'] = substr($details['specialization1'],0,95);
      //$stu_prev_certificates[$i]['signpath'] = 'student/'.$admn_no_path.'/'.$details['sign'];//
      $stu_prev_certificates[$i]['sub'] = substr($details['sub1'],0,95);
      $stu_prev_certificates[$i]['created_date'] = date('d-m-Y H:i:s');
      $stu_prev_certificates[$i]['created_by'] = $registration_no;
      // if($admn_type=='jee')
      // {
      // $stu_prev_certificates[$i]['jee_adv_rollno'] =  0;  // 0 $details['reg_id'];
      // $stu_prev_certificates[$i]['jam_reg_id'] = '';
      // }
      // else
      // {
      //   $stu_prev_certificates[$i]['jam_reg_id'] = $details['reg_id'];// all reg_id is save at jam_reg_id
      //   $stu_prev_certificates[$i]['jee_adv_rollno'] = 0;
      // }

    // echo "<pre>";
    // print_r($stu_prev_certificates);
    // exit;

    // dynamic uducation certificate
    if($admn_type!='jee')
    {
      // echo '<pre>';
      // print_r($details['dynamic_education']);
      // echo '</pre>';
    //   echo '<pre>';
    //   print_r($details['marksheet']);
    //   echo '</pre>';
    //   echo '<pre>';
    //   print_r($details['certificate']);
    //   echo '</pre>';
    //exit;
      $p=3;
      foreach($details['dynamic_education'] as $key => $dynamic_details)
      {
      $stu_prev_certificates_dynamic[$key]['registration_no'] = $registration_no;
      $stu_prev_certificates_dynamic[$key]['admn_no'] = $details['admn_no'];
      $stu_prev_certificates_dynamic[$key]['sno'] = $p+$key;
      if (isset($dynamic_details['marksheet'])) {
         //$stu_prev_certificates_dynamic[$key]['marks_sheet'] = 'student/'.$admn_no_path.'/'.$dynamic_details['marksheet'];
         $stu_prev_certificates_dynamic[$key]['marks_sheet'] = $dynamic_details['marksheet'];
      }
      if (isset($dynamic_details['certificate'])) {
         //$stu_prev_certificates_dynamic[$key]['certificate'] = 'student/'.$admn_no_path.'/'.$dynamic_details['certificate'];
         $stu_prev_certificates_dynamic[$key]['certificate'] = $dynamic_details['certificate'];
      }
      $stu_prev_certificates_dynamic[$key]['specialization'] =substr($dynamic_details['specialization'],0,95);
      //$stu_prev_certificates_dynamic[$key]['signpath'] = 'student/'.$admn_no_path.'/'.$details['sign'];
      $stu_prev_certificates_dynamic[$key]['sub'] = substr($dynamic_details['sub'],0,95);
      $stu_prev_certificates_dynamic[$key]['created_date'] = date('d-m-Y H:i:s');
      $stu_prev_certificates_dynamic[$key]['created_by'] = $registration_no;
      // $stu_prev_certificates_dynamic[$key]['jam_reg_id'] = $details['reg_id'];
      // $stu_prev_certificates_dynamic[$key]['jee_adv_rollno'] = 0;
      }
      //print_r($stu_prev_certificates_dynamic); exit;
      $stu_prev_certificates_final = array_merge($stu_prev_certificates, $stu_prev_certificates_dynamic);
      //$stu_prev_certificates_final = $stu_prev_certificates_dynamic;

      }

      $count_prev_education = count($stu_prev_education_details_final);
      $count_prev_certificates = count($stu_prev_certificates_final);
      if ($stu_prev_education_details_final[$count_prev_education-1]['specialization'] == '') {
         array_pop($stu_prev_education_details_final);
      }
      if ($stu_prev_certificates_final[$count_prev_certificates-1]['specialization'] == '') {
         array_pop($stu_prev_certificates_final);
      }

    // echo '<pre>';print_r($stu_prev_education_details_final);echo '</pre>'; //exit;
    // echo '<br>';
    // echo '<pre>';print_r($stu_prev_certificates_final);echo '</pre>'; exit;

      if($admn_type!='jee')
      {
        //echo 'reached'; exit;
        $prev_edu_details = $this->Phd_mis_reg->get_mis_reg_prev_education_details($registration_no);
        $prev_cert_details = $this->Phd_mis_reg->get_mis_reg_prev_certificate_details($registration_no);

        //exit;
        if (!empty($prev_edu_details) && !empty($prev_cert_details)) {
            //echo 'entered_1'; exit;
            $count_edu = count($prev_edu_details);
            $count_cert = count($prev_cert_details);
            $prev_cert_details_new = array();
            $prev_edu_details_new = array();
            for ($i=0; $i < $count_cert; $i++) {
                $form_data_prev_cert = array(
                    'registration_no' => $prev_cert_details[$i]['registration_no'],
                    'sno' => $prev_cert_details[$i]['sno'],
                    'admn_no' => $prev_cert_details[$i]['admn_no'],
                    'marks_sheet' => $prev_cert_details[$i]['marks_sheet'],
                    'certificate' => $prev_cert_details[$i]['certificate'],
                    'specialization' => $prev_cert_details[$i]['specialization'],
                    'sub' => $prev_cert_details[$i]['sub'],
                    'jee_adv_rollno' => $prev_cert_details[$i]['jee_adv_rollno'],
                    'jam_reg_id' => $prev_cert_details[$i]['jam_reg_id'],
                    'created_by' => $registration_no,
                    'created_date' => date('d-m-Y H:i:s')
                );

                array_push($prev_cert_details_new, $form_data_prev_cert);
            }

            for ($i=0; $i < $count_edu; $i++) {

                $form_data_prev_edu = array(
                    'registration_no' => $prev_edu_details[$i]['registration_no'],
                    'sno' => $prev_edu_details[$i]['sno'],
                    'admn_no' => $prev_edu_details[$i]['admn_no'],
                    'exam' => $prev_edu_details[$i]['exam'],
                    'exam_type' => $prev_edu_details[$i]['exam_type'],
                    'specialization' => $prev_edu_details[$i]['specialization'],
                    'institute' => $prev_edu_details[$i]['institute'],
                    'year' => $prev_edu_details[$i]['year'],
                    'grade' => $prev_edu_details[$i]['grade'],
                    'division' => $prev_edu_details[$i]['division'],
                    'verification_status' => $prev_edu_details[$i]['verification_status'],
                    'verified_by' => $prev_edu_details[$i]['verified_by'],
                    'created_by' => $registration_no
                );
                array_push($prev_edu_details_new, $form_data_prev_edu);
            }
                // echo '<pre>';
                // print_r($prev_edu_details_new);
                // print_r($prev_cert_details_new);
                // echo '</pre>';
                // exit;
                //*** for previous education update */
                $stu_prev_edu_mis_reg =  $this->Phd_mis_reg->insertbatch_stu_prev_education_log($prev_edu_details_new);// 10 insert_batch
                $remove_prev_edu_mis_reg_main_table = $this->Phd_mis_reg->remove_prev_edu_mis_reg_main_table($registration_no);
                $stu_prev_edu_mis_reg =  $this->Phd_mis_reg->insertbatch_stu_prev_education_mis_registration($stu_prev_education_details_final);
                //*** for previous education update */
                //*** for previous certificate update */
                $stu_prev_cert_mis_reg = $this->Phd_mis_reg->insertbatch_stu_prev_certificate_log($prev_cert_details_new);// 11
                $remove_prev_cert_mis_reg_main_table = $this->Phd_mis_reg->remove_prev_cert_mis_reg_main_table($registration_no);
                $stu_prev_cert_mis_reg =  $this->Phd_mis_reg->insertbatch_stu_prev_certificate_mis_registration($stu_prev_certificates_final);
                //*** for previous certificate update */
                // $this->session->set_flashdata('flashSuccess','Education Details Updated Successfully');
                // redirect('admission/phd/Adm_phd_mis_registration/parent_bank_account_details');
        }
        else{
            // echo 'entered_2'; //exit;
            // echo '<pre>';
            // print_r($stu_prev_certificates_final);
            // echo '</pre>';
            $stu_prev_edu_mis_reg =  $this->Phd_mis_reg->insertbatch_stu_prev_education_mis_registration($stu_prev_education_details_final);// 10 insert_batch
            $stu_prev_cert_mis_reg = $this->Phd_mis_reg->insertbatch_stu_prev_certificate_mis_registration($stu_prev_certificates_final);// 11
        }
      }
      else
      {
         $stu_prev_edu_mis_reg = $this->Phd_mis_reg->insertbatch_stu_prev_education_mis_registration($stu_prev_education_details);// 10 insert_batch
         $stu_prev_cert_mis_reg = $this->Phd_mis_reg->insertbatch_stu_prev_certificate_mis_registration($stu_prev_certificates);// 11
      }
      //echo 'reached here'; exit;
      //check if basic education details already exists
      $check_education_details_already_exists = $this->Phd_mis_reg->check_education_details_already_exists($registration_no);
      // echo $this->db->last_query();
      // exit;

      $columnsNames = array_keys($check_education_details_already_exists[0]);
      $columnsValues = array_values($check_education_details_already_exists[0]);
      $data_insert_log = array();

      if (!empty($check_education_details_already_exists)) {
        foreach($columnsNames as $key => $value) {
        if($value != 'id' && $value != 'updated_date' && $value != 'updated_by') {
        $data_insert_log[$value] = $columnsValues[$key];
        }

        $data_insert_log['created_date'] = date('d-m-Y H:i:s');
        //$data_insert_log['created_date'] = date('d-m-Y H:i:s');
      }
      //echo '<pre>'; print_r($data_insert_log); echo '</pre>'; //exit;
      $education_details_insert_log = $this->Phd_mis_reg->insert_education_details_log($data_insert_log);
      if ($education_details_insert_log == '') {
        //echo 'error here';exit;
        $this->session->flashdata('flashError','Error Occured , Please Wait while trying to update education details');
        redirect('admission/phdpt/Adm_phdpt_mis_registration_education/manage_previous_education_details');
      }
      else {
        //echo 'success here';exit;
        $delete_prev = $this->Phd_mis_reg->delete_prev_education_details($registration_no);
        if($delete_prev == ''){
          //echo 'not deleted'; exit;
          $this->session->flashdata('flashError','Error Occured , Please Wait while trying to update education details');
          redirect('admission/phdpt/Adm_phdpt_mis_registration_education/manage_previous_education_details');
        }
      }
      }
        $mis_reg_edu_details = $this->Phd_mis_reg->insert_mis_reg_edu_details($data['basic_edu_details']);
        // echo '1'.$stu_prev_edu_mis_reg;
        // echo '2'.$stu_prev_cert_mis_reg;
        // echo '3'.$mis_reg_edu_details;
        // exit;

        if ($stu_prev_edu_mis_reg != '' && $stu_prev_cert_mis_reg != '' && $mis_reg_edu_details != '') {
          //echo 'entered education'; exit;

        //if ($stu_prev_edu_mis_reg && $stu_prev_cert_mis_reg) {
         $get_tab2_status = $this->Phd_mis_reg->get_tab2_status($registration_no);
         if(empty($check_education_details_already_exists)){
         //echo 'entered above'; exit;
         $data_phd_mis_reg =  array(
            'tab2' => '2',
            'created_by' => $registration_no,
            'updated_date_time' => date('d-m-Y H:i:s'),
            'tab_status' => '2',
            'remark_1' => 0,
            'remark_2' => 0
        );
         $tab_details_insert = $this->Phd_mis_reg->update_mis_reg_tab_status($data_phd_mis_reg,$registration_no);
         if ($tab_details_insert) {
            $this->session->set_flashdata('flashSuccess','Education Details Inserted Successfully,please enter parents account details');
            redirect('admission/phdpt/Adm_phdpt_mis_registration/parent_bank_account_details');
         }
        }
        else {
          //echo 'entered below'; exit;
                  // if ($get_tab2_status) {
                  //   $data_phd_mis_reg =  array(
                  //     'tab2' => '2',
                  //     'created_by' => $registration_no,
                  //     'updated_date_time' => date('d-m-Y H:i:s'),
                  //     'tab_status' => '2',
                  //     'remark_1' => 0,
                  //     'remark_2' => 0
                  // );
                  //  $tab_details_insert = $this->Phd_mis_reg->update_mis_reg_tab_status($data_phd_mis_reg,$registration_no);
                  //  if ($tab_details_insert) {
                  //     $this->session->set_flashdata('flashSuccess','Education Details Inserted Successfully,please enter parents account details');
                  //     redirect('admission/phdpt/Adm_phdpt_mis_registration/parent_bank_account_details');
                  //  }
                  // }
                  // else {

                  $reg_tab_status = $this->Phd_mis_reg->get_current_user_tab_status($registration_no);
                  if (empty($reg_tab_status)) {
                  redirect('admission/phdpt/Adm_phdpt_mis_registration/proceed_with_registration');
                  }
                  else {
                 $tab_status = $reg_tab_status[0]['tab_status'];
                  //echo $tab_status; exit;
                  if ($tab_status == '0') {
                  redirect('admission/phdpt/Adm_phdpt_mis_registration/proceed_with_registration');
                  }
                  if ($tab_status == '1') {
                    redirect('admission/phdpt/Adm_phdpt_mis_registration_education');
                  }
                  if ($tab_status == '2') {
                    $this->session->set_flashdata('flashSuccess','Education Details Updated Successfully');
                    redirect('admission/phdpt/Adm_phdpt_mis_registration/parent_bank_account_details');
                  }
                  if ($tab_status == '3') {
                    redirect('admission/phdpt/Adm_phdpt_mis_registration_other_details/mis_reg_save_stu_other_imp_details');
                   }

                   if ($tab_status == '4') {
                    redirect('admission/phdpt/Adm_phdpt_mis_registration_other_details/mis_reg_stu_other_details_preview');
                  }
                  if ($tab_status == '5') {
                    // echo $admn_no;
                    // echo $admn_type;
                    // exit;
                    $details=$this->getFromTables($admn_no,$admn_type);
                    $data1['admn_type']=$admn_type;
                    $data1['registration_no'] = $login_id['reg_id'];
                    $details=array_merge($details,$data1);
                    $this->session->set_userdata("admn_no",$admn_no);
                    $this->adm_phdpt_header($data);
                    $this->load->view('admission/phdpt/mis_reg_download_common_format',$details);
                    $this->adm_phdpt_footer();
                  }

                //}

        }
        //}

        }
      }
      else {
        //echo 'entered not education'; exit;
        $this->session->set_flashdata('flashError','Sorry Error occured while updating , please try again later');
        if (!empty($check_education_details_already_exists)) {
          redirect('admission/phdpt/Adm_phdpt_mis_registration_education/manage_previous_education_details');
        }
        else{
          redirect('admission/phdpt/Adm_phdpt_mis_registration_education/');
        }

      }
      }
        else{
          #echo 'entered_validation_error'; exit;
          // echo '<pre>';
          // print_r(validation_errors());
          // echo '</pre>';
          // exit;
        $registration_no = $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        $count_ml = 0;
        if ($registration_no && ($login_type =='Phdpt')) {
            $data['val'] = "home";
            $data['application'] = $this->Phd_all->get_application_details($registration_no);
            $data['program'] = $this->Phd_all->get_program_details($registration_no);
            $data['tab_stat'] = $this->Phd_all->get_tab_status($registration_no);
            $data['program_selected'] = $this->session->userdata('selected_program');
            $login_id=$this->Phd_mis_reg->validate_login($registration_no,$data['program_selected']);
            #$admission_no=$this->Phd_mis_reg->get_admn_no_from_stud_final_with_fee($registration_no);
            $admn_type='';
                if($login_id){
                 $admn_type=$login_id['admn_type'];
                 $data['admn_type']=$admn_type;
                }
                if($login_id && $admn_type=='jrf')
                {

                   // check fee_status for payment 26-05-2021
                   //$order_no = $this->generate_order_no($admn_type); // Generate order no
                   $newDOB = date("d-m-Y", strtotime($login_id['dob']));
                   // for payment data send to payment view in newadmission
                   $fee_payment = array(
                   'name' => $login_id['first_name']." ".$login_id['middle_name']." ".$login_id['last_name'],
                   'app_id' => $login_id['reg_id'],
                   'contact_no' => $login_id['contact_no'],
                   'email' => $login_id['email'],
                   'category' => $login_id['category'],
                   'dob' => $newDOB,
                   'fee_to_be_paid' => $login_id['fee_to_be_paid'],
                  // 'order_no' => $order_no
                   );

                   $timestamp = date('Y-m-d H:i:s');
                   $insert_order_no = array(
                   //'order_no' => $order_no,
                   'created_at' => $timestamp
                   );

                   #$login_id=$this->Phd_mis_reg->validate_login_final($registration_no); // check from final table
                    // payment done data available in stud_final_with_fee table for registration 2021
                    if($login_id)
                    {
                      // main part of mba after checking payment either print form or load form 25-7-2021
                    $login_id['fee_mode'] = 'online';
                    $iitism_email_pass = $this->generate_iitism_email_password(); // create 8 char email pass
                    $login_id['iitism_password'] = $iitism_email_pass;

                  $admn_no='';
                 // either print form or load form
                   $this->session->set_userdata($admn_no,$admn_type);
                   $pay_status_selected = $this->Phd_mis_reg->check_payment_status_appl_selected($registration_no);
                   /* check if payment is completed in appl_selected */
                   $tab4 = $this->Phd_mis_reg->check_tab4_status($registration_no);
                  if($tab4 != '' && $pay_status_selected != '')// already submitted
                  {
                     redirect('admission/phdpt/Adm_phdpt_application_preview');
                  }
                  else
                  {

                      // echo '<pre>';
                      // print_r($login_id);
                      // echo '</pre>';
                      // exit;
                     // if credentials match then upload online receipt in assets/images/student/admn_no 5_7_21
                    //  $receipt_payment = array(
                    //   'admn_no' => $login_id['admn_no'],
                    //   'reg_id' => $login_id['reg_id'],
                    //   'name' => $login_id['first_name'].' '.$login_id['middle_name'].' '.$login_id['last_name'],
                    //   'admn_type' => $login_id['admn_type'],
                    //   'contact_no' => $login_id['contact_no'],
                    //   'email' => $login_id['email'],
                    //   'dob' => $login_id['dob'],
                    //   'branch_id' => $login_id['branch_id'],
                    //   'course_id' => $login_id['course_id'],
                    //   'dept_id' => $login_id['dept_id'],
                    //   'fee_status_msg' => $login_id['fee_status_msg'],
                    //   'order_no' => $login_id['fee_order_no'],
                    //   'payment_date' => $login_id['fee_payment_at'],
                    //   'fee_to_be_paid' => $login_id['fee_to_be_paid']
                    //   );

                     # comment receipt part here because it will be generated dynamically #
                    //   $receipt_path = $this->download_receipt($receipt_payment);
                    //   $login_id['receipt_path'] = $receipt_path['receipt_path'];
                    //   $login_id['receipt_name_order_no'] = $receipt_path['receipt_name_order_no'];

                    # comment receipt part here because it will be generated dynamically #

                      #xxxxxxxxxxxxxxxxxxxxxxxxxx JRF
                      $login_id['education_details'] = $this->Phd_mis_reg->get_phd_education_details($login_id['reg_id']);

                      $login_id['photo_signature'] = $this->Phd_mis_reg->get_photo_signature_phd($login_id['reg_id']);

                      $this->session->set_flashdata('flashError','Sorry please contact administrator , something went wrong');
                      $check_education_details_already_exists = $this->Phd_mis_reg->check_education_details_already_exists($registration_no);
                      if (!empty($check_education_details_already_exists)) {
                        redirect('admission/phdpt/Adm_phdpt_mis_registration_education/manage_previous_education_details');
                      }
                      else{
                        redirect('admission/phdpt/Adm_phdpt_mis_registration_education/');
                      }
                      // echo '<pre>';
                      // print_r($login_id);
                      // echo '</pre>';
                      //exit;
                    //   $reg_tab_status = $this->Phd_mis_reg->get_current_user_tab_status($registration_no);
                    //   if (empty($reg_tab_status)) {
                    //   redirect('admission/phd/Adm_phd_mis_registration/proceed_with_registration');
                    //   }
                    //   else {
                    //  $tab_status = $reg_tab_status[0]['tab_status'];
                    //   //echo $tab_status; exit;
                    //   if ($tab_status == '0') {
                    //   redirect('admission/phd/Adm_phd_mis_registration/proceed_with_registration');
                    //   }
                    //   if ($tab_status == '1') {
                    //     $this->adm_phd_header($data);
                    //     $this->load->view('admission/phd/mis_registration_common_form_education_details', $login_id);
                    //     $this->adm_phd_footer();
                    //   }
                    //   if ($tab_status == '2') {
                    //     //echo 'entered_parent'; exit;
                    //     redirect('admission/phd/Adm_phd_mis_registration/parent_bank_account_details');
                    //   }
                    //   if ($tab_status == '3') {
                    //     redirect('admission/phd/Adm_phd_mis_registration_other_details/mis_reg_save_stu_other_imp_details');
                    //   }
                    // }
            }

      }

                }
                else{
                    redirect('admission/phdpt/Adm_phdpt_registration/logout');
                }
            }
            else{
                redirect('admission/phdpt/Adm_phdpt_registration/logout');
            }

        }
    }
}

  public function dynamic_edu_array($data)
  {
    // echo '<pre>';
    // print_r($data);
    // echo '</pre>';
    // exit;
    // echo $data_count = count($data['specialization']);
    // exit;

    foreach($data['specialization'] as $key => $value)
    {
             if (isset($data['specialization'][$key])) {
                $final_education[$key]['specialization']=$data['specialization'][$key];
             }
             else{

             }
             if (isset($data['exam'][$key])) {
                $final_education[$key]['exam']=$data['exam'][$key];
             }
             else{

             }
             if (isset($data['year'][$key])) {
                $final_education[$key]['year']=$data['year'][$key];
             }
             else{}

             if (isset($data['institute'][$key])) {
                $final_education[$key]['institute']=$data['institute'][$key];
             }else{}

             if (isset($data['grade'][$key])) {
                $final_education[$key]['grade']=$data['grade'][$key];
             }else{}

             if (isset($data['division'][$key])) {
                $final_education[$key]['division']=$data['division'][$key];
             }else{}

             if (isset($data['certificate'][$key])) {
                $final_education[$key]['certificate']=$data['certificate'][$key];
             }else{}

             if (isset($data['sub'][$key])) {
                $final_education[$key]['sub']=$data['sub'][$key];
             }else{}

             if (isset($data['marksheet'][$key])){
                $final_education[$key]['marksheet']=$data['marksheet'][$key];
             }else{}

            //  $final_education[$key]['certificate']=$data['certificate'][$key];

    }

    // echo '<pre>';
    // print_r($final_education);
    // echo '</pre>';
    // exit;
    return $final_education;
  }


  function generate_iitism_email_password()
  {
    $one_cap = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $cap_shuffled = str_shuffle($one_cap);
    $first_cap = substr($cap_shuffled, 1, 1); // 1
    $one_no = "0123456789876543210";
    $no_shuffled = str_shuffle($one_no);
    $second_no = substr($no_shuffled, 1, 1); // 2
    $third_6 = '0123456789abcdefghijklmnopqrstiuvwxyz';
    $third_shuffled = str_shuffle($third_6);
    $third_6_char = substr($third_shuffled, 1, 6); // 3

    $set_iitism_password = $first_cap.$second_no.$third_6_char;
    return $set_iitism_password;
  }

  function getFromTables($admn_no,$admn_type)
   {
         //$this->load->model('new_admission_common/new_admission_common_model_new','',TRUE);
         $user_tables=$this->Phd_mis_reg->get_user_tables($admn_no);
         $stu_tables=$this->Phd_mis_reg->get_stu_tables($admn_no);
         $reg_tables=$this->Phd_mis_reg->get_reg_tables($admn_no,$admn_type);// for getting course and branch and department
         $hs_info=$this->Phd_mis_reg->get_hs_info($admn_no); // hostel info details from hs_info for hostel pdf page
         $education_details = $this->Phd_mis_reg->get_prev_edu_and_cert($admn_no);
         $details=array_merge($user_tables,$stu_tables);
         $details=array_merge($reg_tables,$details);
         $details=array_merge($hs_info,$details);
         $details['stu_prev_education']=$education_details['stu_prev_education'];
         $details['stu_prev_certificate']=$education_details['stu_prev_certificate'];

         return $details;
   }

   function download_receipt($receipt_payment)
     {
        // $order_no = $this->uri->segment(4);
         if(!empty($receipt_payment))
         {
             $data['receipt_payment'] = $receipt_payment;
             // echo "<pre>";
             // print_r($receipt_payment);
             // exit;

             $this->load->helper(array('dompdf', 'file'));
             $path = '/var/www/html/assets/images/student/'.strtolower($receipt_payment['admn_no']);

             $html = $this->load->view('new_admission_common/generate_receipt_print_view', $data, TRUE);
             ob_start();
             $dompdf = new Dompdf();
             $dompdf->set_option('enable_html5_parser', TRUE);
             ob_end_clean();
             $dompdf->load_html($html);
             $customPaper = array(0,0,650,775);
             $dompdf->set_paper($customPaper);
             $dompdf->render();
             if(!is_dir($path)) //create the folder if it's not already exists
             {
                 mkdir($path,0777,TRUE);
             }

          // $file_to_save = FCPATH.'assets/images/student/'.strtolower($receipt_payment['admn_no']).'/Receipt__' .strtolower($receipt_payment['admn_no']).'_'.$receipt_payment['order_no'].'.pdf';

             $file_to_save = FCPATH.'assets/images/student/'.strtolower($receipt_payment['admn_no']).'/Receipt__'.$receipt_payment['order_no'].'.pdf';

                     //save the pdf file on the server
                 file_put_contents($file_to_save, $dompdf->output());

             $data_receipt['receipt_path'] = 'assets/images/student/'.strtolower($receipt_payment['admn_no']).'/Receipt__'.$receipt_payment['order_no'].'.pdf';

             $data_receipt['receipt_name_order_no'] = 'Receipt__'.$receipt_payment['order_no'].'.pdf';

             return $data_receipt;

             }
             else
             {
                 echo "Error code : 1032 -> Please try again ! ";
                 exit;
             }

     }



public function our_upload($admn_no,$admn_type,$registration_no)
  {
    //echo 'reached'; exit;
    //$ssh2 = new Ssh2_connect();
    //$nfrdev_ssh2= $ssh2->admission_connect(); //  nfrdev_connect
    $registration_id = $registration_no; //exit;
    $admn_no_lower = strtolower($admn_no) ; //exit;

    $photo_ck = $this->input->post('photo'); // photo // apply photo logic previous step
    $sign_ck = $this->input->post('sign'); // sign // apply sign logic previous step
    $marksheet0_ck = $this->input->post('marksheet0'); // 10th
    $certificate0_ck = $this->input->post('certificate0'); // 10th
    $marksheet1_ck = $this->input->post('marksheet1'); // 12th
    $certificate1_ck = $this->input->post('certificate1'); // 12th
    $marksheet_ck = $this->input->post('verified_marksheet'); // ug array marksheet
    $certificate_ck = $this->input->post('verified_certificate'); // ug array certificate
    $exam_type_dynamic = $this->input->post('specialization');
    // echo '<pre>';
    // print_r($exam_type_dynamic);
    // echo '</pre>';
    // echo '<br>';
    // echo '<pre>';
    // print_r($marksheet_ck);
    // echo '</pre>';
    // echo '<br>';
    // echo '<pre>';
    // print_r($certificate_ck);
    // echo '</pre>';
    // exit;
    if (empty($marksheet_ck)) {
      $count_verified_marksheet = 0;
    }
    else{
      $count_verified_marksheet = count($marksheet_ck);
    }

    if (empty($certificate_ck)) {
    $count_verified_certificate = 0;
    }
    else{
      $count_verified_certificate = count($certificate_ck);
    }

    if (empty($marksheet_ck)) {
      $count_verified_marksheet = 0;
    }
    else{
      $count_verified_marksheet = count($marksheet_ck);
    }

    if (empty($certificate_ck)) {
    $count_verified_certificate = 0;
    }
    else{
      $count_verified_marksheet = count($marksheet_ck);
    }
    // echo '<pre>';
    // print_r($marksheet_ck);
    // echo '</pre>';

    // echo '<pre>';
    // print_r($certificate_ck);
    // echo '</pre>';

    // exit;
    $upload_error=array();

           if($admn_type=='mba') {
            $course_folder='mba';
          }
          else if($admn_type=='jrf_fulltime' || $admn_type=='jrf_parttime' || $admn_type=='jrf') {
           $course_folder='phdpt';
          }
          else if($admn_type=='mtech') {
           $course_folder='mtech';
          }
  #xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx upload after 10th 12th certificate xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  if($admn_type!='jee')
  {
              // dynamic certificates upload in folder
          // If files are selected to upload
   //echo 'reached'; exit;
  //  echo '<pre>'; print_r($_FILES['marksheet']['name']); echo '</pre>';
  //  echo '<pre>'; print_r($_FILES['certificate']['name']); echo '</pre>';
  //  exit;
   if(!empty($_FILES['marksheet']['name']) && count(array_filter($_FILES['marksheet']['name'])) > 0)
   {
    //echo 'reached_1'; exit;

     $filesCount = count($_FILES['marksheet']['name']);
     //echo $filesCount; exit;
     $files = $_FILES;
   // for($i=0; $i<$filesCount; $i++)
  //  echo '<pre>'; print_r($_FILES['marksheet']['name']); echo '</pre>';
  //  echo '<pre>'; print_r($_FILES['certificate']['name']); echo '</pre>';
  // exit;
    foreach($_FILES['marksheet']['name'] as $i => $value)
    {

       //echo $i.'marksheet';
       if ($files['marksheet']['name'][$i] != '') {

        $_FILES['marksheet']['name']= $files['marksheet']['name'][$i];
        $_FILES['marksheet']['type']= $files['marksheet']['type'][$i];
        $_FILES['marksheet']['tmp_name']= $files['marksheet']['tmp_name'][$i];
        $_FILES['marksheet']['error']= $files['marksheet']['error'][$i];
        $_FILES['marksheet']['size']= $files['marksheet']['size'][$i];

        // echo '<pre>';
        // print_r($marksheet_ck);
        // echo '</pre>';
        // exit;
        //echo $count_verified_marksheet;
        $i=(!empty($marksheet_ck)) ? $i+$count_verified_marksheet: $i; // $marksheet_ck exist then i+1 else i

        foreach($exam_type_dynamic as $key => $value){
          if ($value != '') {
          if ($key == $i) {
            if(!preg_match('/^[a-zA-Z0-9]+$/', $value)){
              $value = strtolower(preg_replace('/[^a-zA-Z0-9]/', '_', $value));
            }
          //echo $value; exit;
          $exam_type = $value;
          }
        }
      }

      // certificate0 upload
      $config=array();
      //$config['upload_path']='./assets/images/student/'.$admn_no_lower.'/';

      $config['upload_path'] = '/disk2/virtualhost/admission/public_html/html/assets/admission/'.$course_folder.'/'.$registration_id.'/';
      $config['overwrite'] = TRUE;
      $config['allowed_types']='pdf';
      $config['max_size']='300';// in KB
      $config['file_name'] = 'stu_'.$registration_id.'_marksheet_'.$exam_type.'';
      $this->load->library('upload',$config);

      if(!is_dir($config['upload_path'])) //create the folder if it's not already exists
        {
           mkdir($config['upload_path'],0777,TRUE);
        }

      //echo $config['file_name']; exit;

      //echo $config['file_name']; exit;
         $file_name = '/disk2/virtualhost/admission/public_html/html/assets/admission/'.$course_folder.'/'.$registration_id.'/'.$config['file_name'].'.pdf';

         if(file_exists($file_name))
         {
          unlink($file_name);
         }


        $this->upload->initialize($config);
        $upload_certificate = $this->upload->do_upload('marksheet');

        if($upload_certificate)
            {
                //echo 'upoaded_mark1'; exit;
                $upload_data = $this->upload->data();
                if((!empty($marksheet_ck)))
                {
                  $_POST['marksheet'][$i]=base_url().'assets/admission/'.$course_folder.'/'.$registration_id.'/'.$upload_data['file_name'];
                }
                else {
                  $_POST['marksheet'][$i]=base_url().'assets/admission/'.$course_folder.'/'.$registration_id.'/'.$upload_data['file_name'];
                }

                echo '';
            }
         else
            {
            //echo 'not uploaded'; exit;
            $upload_error['marksheet_error']=$this->upload->display_errors();
            //echo $upload_error['marksheet_error'];
            }
          }
        }
        // echo '<pre>';
        // print_r($_POST['marksheet']);
        // echo '</pre>';
        // exit;
      }
      else{
        //echo 'reached 2';
      }

      //exit;
        // end dynamic marksheet upload

              //  start dynamic certificate upload
           // If files are selected to upload
   //echo $i;
   if(!empty($_FILES['certificate']['name']) && count(array_filter($_FILES['certificate']['name'])) > 0)
   {
     //echo 'reached_2'; exit;
     $filesCount = count($_FILES['certificate']['name']); //exit;
    //  echo '<pre>';
    //  print_r($_FILES['certificate']['name']);
    //  echo '</pre>';
    //  exit;

    $files = $_FILES;
    foreach($_FILES['certificate']['name'] as $j => $value)
    {

        //echo $j.'certificate';
        if ($files['certificate']['name'][$j] != '') {

        $_FILES['certificate']['name']= $files['certificate']['name'][$j];
        $_FILES['certificate']['type']= $files['certificate']['type'][$j];
        $_FILES['certificate']['tmp_name']= $files['certificate']['tmp_name'][$j];
        $_FILES['certificate']['error']= $files['certificate']['error'][$j];
        $_FILES['certificate']['size']= $files['certificate']['size'][$j];

        // echo '<pre>';
        // print_r($certificate_ck);
        // echo '</pre>';

        // exit;

        $j=(!empty($certificate_ck)) ? $j+$count_verified_certificate: $j; // $marksheet_ck exist then i+1 else i
        foreach($exam_type_dynamic as $key => $value){
          if($value != ''){
          if ($key == $j) {
            if(!preg_match('/^[a-zA-Z0-9]+$/', $value)){
              $value = strtolower(preg_replace('/[^a-zA-Z0-9]/', '_', $value));
            }
          //echo $value; exit;
          $exam_type = $value;
          }
        }
        else{

        }
      }

        // certificate0 upload
      $config=array();
      //$config['upload_path']='./assets/images/student/'.$admn_no_lower.'/';
      $config['upload_path']='/disk2/virtualhost/admission/public_html/html/assets/admission/'.$course_folder.'/'.$registration_id.'/';
      $config['overwrite'] = TRUE;
      $config['allowed_types']='pdf';
      $config['max_size']='300';// in KB
      $config['file_name'] = 'stu_'.$registration_id.'_certificate_'.$exam_type.'';


      $this->load->library('upload',$config);

      if(!is_dir($config['upload_path'])) //create the folder if it's not already exists
        {
           mkdir($config['upload_path'],0777,TRUE);
        }

        $file_name = '/disk2/virtualhost/admission/public_html/html/assets/admission/'.$course_folder.'/'.$registration_id.'/'.$config['file_name'].'.pdf';

        if(file_exists($file_name))
        {
         unlink($file_name);
        }

        $this->upload->initialize($config);
        $upload_certificate = $this->upload->do_upload('certificate');



          if($upload_certificate)
              {

                //echo 'upoaded_cert1'; exit;
                $upload_data = $this->upload->data();
                //$upload_data = $this->upload->data();
                if((!empty($marksheet_ck)))
                {
                  $_POST['certificate'][$j]=base_url().'assets/admission/'.$course_folder.'/'.$registration_id.'/'.$upload_data['file_name'];
                }
                else {
                  $_POST['certificate'][$j]=base_url().'assets/admission/'.$course_folder.'/'.$registration_id.'/'.$upload_data['file_name'];
                }

                echo '';
            }
         else
            {
            //echo 'not uploaded'; exit;
            $upload_error['certificate_error']=$this->upload->display_errors();
            //echo $upload_error['certificate_error'];
            }
          }

        }
   }
   //end dynamic certificate upload
        // end dynamic

  }

  //exit;
  #xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx upload after 10th 12th certificate xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

/*
            // certificate2 upload
        $config=array();
        $config['upload_path']='./assets/images/student/'.$admn_no.'/';
        $config['allowed_types']='pdf';
        $config['max_size']='300';// in KB
        $config['file_name'] = 'stu_'.$admn_no.'_certificate2_'.date('YmdHis');
        $this->load->library('upload',$config);

        if(!is_dir($config['upload_path'])) //create the folder if it's not already exists
          {
             mkdir($config['upload_path'],0777,TRUE);
          }

        $this->upload->initialize($config);
        $upload_certificate2 = $this->upload->do_upload('certificate2');

       if($upload_certificate2)
       {
          $upload_data = $this->upload->data();
          $_POST['certificate2']=$upload_data['file_name'];
       }
       else{
          $upload_error['certificate2_error']=$this->upload->display_errors();
          //echo $upload_error['certificate1'];
       }

        // marksheet2 upload
    $config=array();
    $config['upload_path']='./assets/images/student/'.$admn_no.'/';
    $config['allowed_types']='pdf';
    $config['max_size']='300';// in KB
    $config['file_name'] = 'stu_'.$admn_no.'_marksheet2_'.date('YmdHis');
    $this->load->library('upload',$config);

        if(!is_dir($config['upload_path'])) //create the folder if it's not already exists
          {
             mkdir($config['upload_path'],0777,TRUE);
          }

        $this->upload->initialize($config);
        $upload_marksheet2 = $this->upload->do_upload('marksheet2');

       if($upload_marksheet2)
       {
          $upload_data = $this->upload->data();
          $_POST['marksheet2']=$upload_data['file_name'];
       }
       else{
          $upload_error['marksheet2_error']=$this->upload->display_errors();
          //echo $upload_error['marksheet0'];
       } */

 // end here not == to jee


      //  if($admn_type=='jrf')
      //  {
      //       // certificate3 upload
      //   $config=array();
      //   $config['upload_path']='./assets/images/student/'.$admn_no.'/';
      //   $config['allowed_types']='pdf';
      //   $config['max_size']='300';// in KB
      //   $config['file_name'] = 'stu_'.$admn_no.'_certificate3_'.date('YmdHis');
      //   $this->load->library('upload',$config);

      //   if(!is_dir($config['upload_path'])) //create the folder if it's not already exists
      //     {
      //        mkdir($config['upload_path'],0777,TRUE);
      //     }

      //   $this->upload->initialize($config);
      //   $upload_certificate3 = $this->upload->do_upload('certificate3');

      //  if($upload_certificate3)
      //  {
      //     $upload_data = $this->upload->data();
      //     $_POST['certificate3']=$upload_data['file_name'];
      //  }
      //  else{
      //    // NOT REQUIRED FIELD
      //    // $upload_error['certificate3_error']=$this->upload->display_errors();
      //     //echo $upload_error['certificate1'];
      //  }

        // marksheet0 upload
    // $config=array();
    // $config['upload_path']='./assets/images/student/'.$admn_no.'/';
    // $config['allowed_types']='pdf';
    // $config['max_size']='300';// in KB
    // $config['file_name'] = 'stu_'.$admn_no.'_marksheet3_'.date('YmdHis');
    // $this->load->library('upload',$config);

    //     if(!is_dir($config['upload_path'])) //create the folder if it's not already exists
    //       {
    //          mkdir($config['upload_path'],0777,TRUE);
    //       }

    //     $this->upload->initialize($config);
    //     $upload_marksheet3 = $this->upload->do_upload('marksheet3');

    //    if($upload_marksheet3)
    //    {
    //       $upload_data = $this->upload->data();
    //       $_POST['marksheet3']=$upload_data['file_name'];
    //    }
    //    else{
    //     // NOT REQUIRED FIELD
    //      // $upload_error['marksheet3_error']=$this->upload->display_errors();
    //       //echo $upload_error['marksheet0'];
    //    }

    // }
       //exit;
       return $upload_error;
  }

  function manage_previous_education_details(){
    $registration_no = $this->session->userdata('registration_no');
    $login_type = $this->session->userdata('login_type');
    $count_ml = 0;
    if ($registration_no && ($login_type =='Phdpt')) {
        //echo 'enter 1'; exit;
        $data['val'] = "home";
        $data['application'] = $this->Phd_all->get_application_details($registration_no);
        $data['program'] = $this->Phd_all->get_program_details($registration_no);
        $data['tab_stat'] = $this->Phd_all->get_tab_status($registration_no);
        $data['program_selected'] = $this->session->userdata('selected_program');
        $appl_type = $this->Phd_mis_reg->get_appl_type_from_reg_no($registration_no);
        $login_id=$this->Phd_mis_reg->validate_login($registration_no,$data['program_selected'],$appl_type);
        #$admission_no=$this->Phd_mis_reg->get_admn_no_from_stud_final_with_fee($registration_no);
        $admn_type='';
            if($login_id){
             $admn_type=$login_id['admn_type'];
             $data['admn_type']=$admn_type;
            }
            if($login_id && $admn_type=='jrf')
            {

               // check fee_status for payment 26-05-2021
               //$order_no = $this->generate_order_no($admn_type); // Generate order no
               $newDOB = date("d-m-Y", strtotime($login_id['dob']));
               // for payment data send to payment view in newadmission
               $fee_payment = array(
               'name' => $login_id['first_name']." ".$login_id['middle_name']." ".$login_id['last_name'],
               'app_id' => $login_id['reg_id'],
               'contact_no' => $login_id['contact_no'],
               'email' => $login_id['email'],
               'category' => $login_id['category'],
               'dob' => $newDOB,
               'fee_to_be_paid' => $login_id['fee_to_be_paid'],
              // 'order_no' => $order_no
               );

               $timestamp = date('Y-m-d H:i:s');
               $insert_order_no = array(
               //'order_no' => $order_no,
               'created_at' => $timestamp
               );

               #$login_id=$this->Phd_mis_reg->validate_login_final($registration_no); // check from final table
                // payment done data available in stud_final_with_fee table for registration 2021
                if($login_id)
                {
                  // main part of mba after checking payment either print form or load form 25-7-2021
                $login_id['fee_mode'] = 'online';
                $iitism_email_pass = $this->generate_iitism_email_password(); // create 8 char email pass
                $login_id['iitism_password'] = $iitism_email_pass;

              $admn_no='';
             // either print form or load form
               $this->session->set_userdata($admn_no,$admn_type);
               $pay_status_selected = $this->Phd_mis_reg->check_payment_status_appl_selected($registration_no);
                   /* check if payment is completed in appl_selected */
                   $tab4 = $this->Phd_mis_reg->check_tab4_status($registration_no);
                  if($tab4 != '' && $pay_status_selected != '')// already submitted
                  {
                     redirect('admission/phdpt/Adm_phdpt_application_preview');
                  }
              else
              {

                  // echo '<pre>';
                  // print_r($login_id);
                  // echo '</pre>';
                  // exit;
                 // if credentials match then upload online receipt in assets/images/student/admn_no 5_7_21
                //  $receipt_payment = array(
                //   'admn_no' => $login_id['admn_no'],
                //   'reg_id' => $login_id['reg_id'],
                //   'name' => $login_id['first_name'].' '.$login_id['middle_name'].' '.$login_id['last_name'],
                //   'admn_type' => $login_id['admn_type'],
                //   'contact_no' => $login_id['contact_no'],
                //   'email' => $login_id['email'],
                //   'dob' => $login_id['dob'],
                //   'branch_id' => $login_id['branch_id'],
                //   'course_id' => $login_id['course_id'],
                //   'dept_id' => $login_id['dept_id'],
                //   'fee_status_msg' => $login_id['fee_status_msg'],
                //   'order_no' => $login_id['fee_order_no'],
                //   'payment_date' => $login_id['fee_payment_at'],
                //   'fee_to_be_paid' => $login_id['fee_to_be_paid']
                //   );

                 # comment receipt part here because it will be generated dynamically #
                //   $receipt_path = $this->download_receipt($receipt_payment);
                //   $login_id['receipt_path'] = $receipt_path['receipt_path'];
                //   $login_id['receipt_name_order_no'] = $receipt_path['receipt_name_order_no'];

                # comment receipt part here because it will be generated dynamically #

                  #xxxxxxxxxxxxxxxxxxxxxxxxxx JRF
                  $login_id['education_details'] = $this->Phd_mis_reg->get_phd_education_details($login_id['reg_id']);

                  $login_id['photo_signature'] = $this->Phd_mis_reg->get_photo_signature_phd($login_id['reg_id']);

                  $count_dynamic_edu_details = 0;
                  if (empty($login_id['education_details'])) {
                    $count_dynamic_edu_details = 0;
                  }
                  else {
                  $count_dynamic_edu_details = count($login_id['education_details']); //exit;
                  }
                      //$login_id['array_dynamic_education_new'] = array();
                      //   $for_prev_edu_dynamic_key = 0;
                      //   foreach($login_id['education_details'] as $key => $education_details){

                      //    //array_push($login_id['array_dynamic_education_new'],$login_id['education_details'][$key]);
                      //    $for_prev_edu_dynamic_key = $key;

                      // }

                   // echo $for_prev_edu_dynamic_key; exit;

                  $login_id['get_mis_reg_education_details'] = $this->Phd_mis_reg->get_mis_reg_education_details($login_id['reg_id']);
                  $login_id['get_mis_reg_prev_edu_details'] = $this->Phd_mis_reg->get_mis_reg_prev_education_details($login_id['reg_id']);
                  $login_id['get_mis_reg_prev_cert_details'] = $this->Phd_mis_reg->get_mis_reg_prev_certificate_details($login_id['reg_id']);
                  // echo '<pre>';
                  // print_r($login_id);
                  // echo '</pre>';
                  // exit;
                  $dynamic_prev_edu_details = array();
                  $dynamic_prev_cert_details = array();
                  //$dynamic_array_merge_edu_cert_details = array();
                  //echo $count_dynamic_edu_details; exit;
                  foreach($login_id['get_mis_reg_prev_edu_details'] as $prev_edu_details){
                    if ($prev_edu_details['sno'] > $count_dynamic_edu_details) {
                       array_push($dynamic_prev_edu_details,$prev_edu_details);
                    }
                  }
                  foreach($login_id['get_mis_reg_prev_cert_details'] as $prev_cert_details){
                    if ($prev_cert_details['sno'] > $count_dynamic_edu_details) {
                       array_push($dynamic_prev_cert_details,$prev_cert_details);
                    }
                  }

                $login_id['dynamic_prev_edu_details'] = $dynamic_prev_edu_details;
                $login_id['dynamic_prev_cert_details'] = $dynamic_prev_cert_details;
                // echo '<pre>';
                // print_r($login_id);
                // echo '</pre>';
                //exit;
                if (!empty($login_id['get_mis_reg_education_details'])) {
                  //echo 'entered not empty'; exit;
                  $login_id['array_dynamic_education_new'] = array();
                  foreach ($login_id['get_mis_reg_prev_edu_details'] as $key => $value) {
                    // echo $key;
                    // echo '<pre>'; print_r($value); echo '</pre>';
                    if(2 < $value['sno'] &&  $value['sno'] <= $count_dynamic_edu_details){
                      array_push($login_id['array_dynamic_education_new'],$value);
                    }
                  }
                }
                // echo '<pre>';
                // print_r($login_id['array_dynamic_education_new']);
                // echo '</pre>';
                // exit;

                //exit;
                $login_id['dynamic_array_merge_edu_cert_details'] = array_merge($login_id['dynamic_prev_edu_details'],$login_id['dynamic_prev_cert_details']);
                // echo '<pre>';
                // print_r($login_id['array_dynamic_education_new']);
                // echo '</pre>';
                // $data['login_id'] = $login_id;
                // $data['data_edu'] = $data_edu;
                // echo '<pre>';
                // print_r($login_id);
                // echo '</pre>';
                // exit;

                $this->adm_phdpt_header($data);
                $this->load->view('admission/phdpt/mis_registration_common_form_education_details',$login_id);
                $this->adm_phdpt_footer();

                }
            }
            else{
                redirect('admission/phdpt/Adm_phdpt_registration/logout');
            }
        }

      }
    else{
      //cho 'enter 2'; exit;
      redirect('admission/phdpt/Adm_phdpt_registration/logout');
    }


  }

  function remove_marksheeet(){
     $sno = $_REQUEST['sno'];
     $query_prev_edu_details = $this->Phd_mis_reg->get_stu_prev_certificate_details($sno);
     if ($query_prev_edu_details != '') {
        foreach ($query_prev_edu_details as $formvalue) {
            $form_data = array(
                'registration_no' => $formvalue['registration_no'],
                'sno' => $formvalue['sno'],
                'admn_no' => $formvalue['admn_no'],
                'marks_sheet' => $formvalue['marks_sheet'],
                'certificate' => $formvalue['certificate'],
                'specialization' => $formvalue['specialization'],
                'sub' => $formvalue['sub'],
                'jee_adv_rollno' => $formvalue['jee_adv_rollno'],
                'jam_reg_id' => $formvalue['jam_reg_id'],
                'created_by' => $formvalue['registration_no'],
                'created_date' => date('d-m-Y H:i:s')
            );
        }
        $insert_id = $this->Phd_mis_reg->insert_stu_prev_certificate_details_log($form_data);
        if ($insert_id != '') {
        $update_cert = $this->Phd_mis_reg->update_stu_prev_certificate($form_data);
        if ($update_cert) {
           echo '1';
        }
        else{
            echo '0';
        }
        }
        else{
            echo '0';
        }
     }
     else{
        echo '0';
     }

  }

  function remove_certificate(){
    $sno = $_REQUEST['sno'];
    $query_prev_edu_details = $this->Phd_mis_reg->get_stu_prev_certificate_details($sno);
    if ($query_prev_edu_details != '') {
       foreach ($query_prev_edu_details as $formvalue) {
           $form_data = array(
               'registration_no' => $formvalue['registration_no'],
               'sno' => $formvalue['sno'],
               'admn_no' => $formvalue['admn_no'],
               'marks_sheet' => $formvalue['marks_sheet'],
               'certificate' => $formvalue['certificate'],
               'specialization' => $formvalue['specialization'],
               'sub' => $formvalue['sub'],
               'jee_adv_rollno' => $formvalue['jee_adv_rollno'],
               'jam_reg_id' => $formvalue['jam_reg_id'],
               'created_by' => $formvalue['registration_no'],
               'created_date' => date('d-m-Y H:i:s')
           );
       }
       $insert_id = $this->Phd_mis_reg->insert_stu_prev_certificate_details_log($form_data);
       if ($insert_id != '') {
       $update_cert = $this->Phd_mis_reg->update_stu_prev_marksheet($form_data);
       if ($update_cert) {
          echo '1';
       }
       else{
           echo '0';
       }
       }
       else{
           echo '0';
       }
    }
    else{
       echo '0';
    }

 }

 public function mis_reg_save_parent_details(){
        $registration_no = $this->session->userdata('registration_no');
        $admn_no = $this->session->userdata('admn_no');
        $login_type = $this->session->userdata('login_type');
        $count_ml = 0;
        if ($registration_no && ($login_type =='Phdpt')) {
          $admn_type = $this->input->post('admn_type');
          $admn_based_on = $this->input->post('admn_based_on');
          $institute_name = $this->input->post('institute_name');
          $admn_no = $this->input->post('admn_no');
          $this->form_validation->set_rules('father_name', 'Father\'s Name', 'required|callback_check_father_name');
          $this->form_validation->set_rules('mother_name', 'Mother\'s Name', 'required|callback_check_mother_name');
          $this->form_validation->set_rules('father_occupation', 'Father\'s Occupation', 'required|callback_check_father_occupation');
          $this->form_validation->set_rules('mother_occupation', 'Mother\'s Occupation', 'required|callback_check_mother_occupation');
          $this->form_validation->set_rules('father_income', 'Father\'s Income(yearly)', 'required|callback_check_father_income');
          $this->form_validation->set_rules('mother_income', 'Mother\'s Income(yearly)', 'required|callback_check_mother_income');
          $this->form_validation->set_rules('parent_mobile_no', 'Parent Mobile No.', 'required|callback_check_parent_mobile_no');
          $this->form_validation->set_rules('parent_email_id', 'Parent Email ID', 'required|callback_check_parent_email_id');
          $this->form_validation->set_rules('guardian_name', 'Guardian Name', 'required|callback_check_guardian_name');
          $this->form_validation->set_rules('guardian_relation', 'Guardian Relation', 'required|callback_check_guardian_relation');
          $this->form_validation->set_rules('alternate_mobile_no', 'Alternate Mobile No', 'required|callback_check_alternate_mobile_no');
          $this->form_validation->set_rules('alternate_email_id', 'Alternate Email ID', 'required|callback_check_alternate_email_id');

          if ($this->form_validation->run() == TRUE) {
                $save_parent_details = array(
                    'registration_no' => $this->session->userdata('registration_no'),
                    'admn_no' => $this->input->post('admn_no'),
                    'father_name' => $this->input->post('father_name'),
                    'mother_name' => $this->input->post('mother_name'),
                    'father_occupation' => $this->input->post('father_occupation'),
                    'mother_occupation' => $this->input->post('mother_occupation'),
                    'father_income' => $this->input->post('father_income'),
                    'mother_income' => $this->input->post('mother_income'),
                    'parent_mobile_no' => $this->input->post('parent_mobile_no'),
                    'parent_email_id' => $this->input->post('parent_email_id'),
                    'guardian_name' => $this->input->post('guardian_name'),
                    'guardian_relation' => $this->input->post('guardian_relation'),
                    'alternate_mobile_no' => $this->input->post('alternate_mobile_no'),
                    'alternate_email_id' => $this->input->post('alternate_email_id'),
                    'created_by' => $this->session->userdata('registration_no'),
                    'created_time' => date('d-m-Y H:i:s')
                );

                // echo '<pre>';
                // print_r($save_parent_details);
                // echo '</pre>';

                $prev_parent_details_log = $this->Phd_mis_reg->check_parent_details_already_exists($registration_no,$admn_no);
                $prev_parent_details_count = count($prev_parent_details_log);
                $prev_parent_details_new = array();

            /* check if parent details already exists */
                if($prev_parent_details_log != ''){
                    //echo 'entered_1'; exit;
                    for ($i=0; $i < $prev_parent_details_count; $i++) {
                        $form_data_prev_parent = array(
                            'registration_no' => $prev_parent_details_log[$i]['registration_no'],
                            'admn_no' => $prev_parent_details_log[$i]['admn_no'],
                            'father_name' => $prev_parent_details_log[$i]['father_name'],
                            'mother_name' => $prev_parent_details_log[$i]['mother_name'],
                            'father_occupation' => $prev_parent_details_log[$i]['father_occupation'],
                            'mother_occupation' => $prev_parent_details_log[$i]['mother_occupation'],
                            'father_income' => $prev_parent_details_log[$i]['father_income'],
                            'mother_income' => $prev_parent_details_log[$i]['mother_income'],
                            'parent_mobile_no' => $prev_parent_details_log[$i]['parent_mobile_no'],
                            'parent_email_id' => $prev_parent_details_log[$i]['parent_email_id'],
                            'guardian_name' => $prev_parent_details_log[$i]['guardian_name'],
                            'guardian_relation' => $prev_parent_details_log[$i]['guardian_relation'],
                            'alternate_mobile_no' => $prev_parent_details_log[$i]['alternate_mobile_no'],
                            'alternate_email_id' => $prev_parent_details_log[$i]['alternate_email_id']
                        );
                        array_push($prev_parent_details_new, $form_data_prev_parent);
                    }
                    $save_parent_details_log = $this->Phd_mis_reg->save_phd_mis_reg_prev_parent_details_log($form_data_prev_parent);
                    $remove_prev_cert_mis_reg_main_table = $this->Phd_mis_reg->remove_prev_parent_mis_reg_main_table($registration_no);
                    $stu_prev_cert_mis_reg =  $this->Phd_mis_reg->save_phd_mis_reg_parent_details($save_parent_details);
                    /* check from this condition */
                    $this->session->set_flashdata('flashSuccess','Parents Details Updated Successfully');
                    redirect('admission/phdpt/Adm_phdpt_mis_registration_other_details/mis_reg_save_stu_other_imp_details');
                    /* check from this condition */
                }
              else{
             //echo 'entered_2'; exit;
             $save_parent_details = $this->Phd_mis_reg->save_phd_mis_reg_parent_details($save_parent_details);
             if ($save_parent_details != '') {
                $data_phd_mis_reg =  array(
                    'tab3' => '3',
                    'created_by' => $registration_no,
                    'updated_date_time' => date('d-m-Y H:i:s'),
                    'tab_status' => '3',
                    'remark_1' => 0,
                    'remark_2' => 0
                );
                 $tab_details_insert = $this->Phd_mis_reg->update_mis_reg_tab_status($data_phd_mis_reg,$registration_no);
                 if ($tab_details_insert) {
                    //echo 'tab_entered'; exit;
                    $this->session->set_flashdata('flashSuccess','Parents Details Saved Successfully');
                    redirect('admission/phdpt/Adm_phdpt_mis_registration_other_details/mis_reg_save_stu_other_imp_details');
                 }
                 else {
                    //echo 'tab_not_entered'; exit;
                 }
             }
             else{
                $this->session->set_flashdata('flashError','Sorry,The Data cannot be saved');
                redirect('admission/phdpt/Adm_phdpt_mis_registration/parent_bank_account_details');
             }

            }
          }
          else {
            $registration_no = $this->session->userdata('registration_no');
            $login_type = $this->session->userdata('login_type');
            $count_ml = 0;
            if ($registration_no && ($login_type =='Phdpt')) {
                $data['val'] = "home";
                $data['application'] = $this->Phd_all->get_application_details($registration_no);
                $data['program'] = $this->Phd_all->get_program_details($registration_no);
                $data['tab_stat'] = $this->Phd_all->get_tab_status($registration_no);
                $data['program_selected'] = $this->session->userdata('selected_program');
                $appl_type = $this->Phd_mis_reg->get_appl_type_from_reg_no($registration_no);
                $login_id=$this->Phd_mis_reg->validate_login($registration_no,$data['program_selected'],$appl_type);
                #$admission_no=$this->Phd_mis_reg->get_admn_no_from_stud_final_with_fee($registration_no);
                $admn_type='';
                    if($login_id){
                     $admn_type=$login_id['admn_type'];
                     $data['admn_type']=$admn_type;
                    }
                    if($login_id && $admn_type=='jrf')
                    {

                       // check fee_status for payment 26-05-2021
                       //$order_no = $this->generate_order_no($admn_type); // Generate order no
                       $newDOB = date("d-m-Y", strtotime($login_id['dob']));
                       // for payment data send to payment view in newadmission
                       $fee_payment = array(
                       'name' => $login_id['first_name']." ".$login_id['middle_name']." ".$login_id['last_name'],
                       'app_id' => $login_id['reg_id'],
                       'contact_no' => $login_id['contact_no'],
                       'email' => $login_id['email'],
                       'category' => $login_id['category'],
                       'dob' => $newDOB,
                       'fee_to_be_paid' => $login_id['fee_to_be_paid'],
                      // 'order_no' => $order_no
                       );

                       $timestamp = date('Y-m-d H:i:s');
                       $insert_order_no = array(
                       //'order_no' => $order_no,
                       'created_at' => $timestamp
                       );

                       #$login_id=$this->Phd_mis_reg->validate_login_final($registration_no); // check from final table
                        // payment done data available in stud_final_with_fee table for registration 2021
                        if($login_id)
                        {
                          // main part of mba after checking payment either print form or load form 25-7-2021
                        // $login_id['fee_mode'] = 'online';
                        // $iitism_email_pass = $this->generate_iitism_email_password(); // create 8 char email pass
                        // $login_id['iitism_password'] = $iitism_email_pass;

                      $admn_no='';
                     // either print form or load form
                       $this->session->set_userdata($admn_no,$admn_type);
                       $pay_status_selected = $this->Phd_mis_reg->check_payment_status_appl_selected($registration_no);
                   /* check if payment is completed in appl_selected */
                        $tab4 = $this->Phd_mis_reg->check_tab4_status($registration_no);
                        if($tab4 != '' && $pay_status_selected != '')// already submitted
                        {
                          redirect('admission/phdpt/Adm_phdpt_application_preview');
                        }
                      else
                      {

                          // echo '<pre>';
                          // print_r($login_id);
                          // echo '</pre>';
                          // exit;
                         // if credentials match then upload online receipt in assets/images/student/admn_no 5_7_21
                        //  $receipt_payment = array(
                        //   'admn_no' => $login_id['admn_no'],
                        //   'reg_id' => $login_id['reg_id'],
                        //   'name' => $login_id['first_name'].' '.$login_id['middle_name'].' '.$login_id['last_name'],
                        //   'admn_type' => $login_id['admn_type'],
                        //   'contact_no' => $login_id['contact_no'],
                        //   'email' => $login_id['email'],
                        //   'dob' => $login_id['dob'],
                        //   'branch_id' => $login_id['branch_id'],
                        //   'course_id' => $login_id['course_id'],
                        //   'dept_id' => $login_id['dept_id'],
                        //   'fee_status_msg' => $login_id['fee_status_msg'],
                        //   'order_no' => $login_id['fee_order_no'],
                        //   'payment_date' => $login_id['fee_payment_at'],
                        //   'fee_to_be_paid' => $login_id['fee_to_be_paid']
                        //   );

                         # comment receipt part here because it will be generated dynamically #
                        //   $receipt_path = $this->download_receipt($receipt_payment);
                        //   $login_id['receipt_path'] = $receipt_path['receipt_path'];
                        //   $login_id['receipt_name_order_no'] = $receipt_path['receipt_name_order_no'];

                        # comment receipt part here because it will be generated dynamically #

                          #xxxxxxxxxxxxxxxxxxxxxxxxxx JRF
                          $login_id['education_details'] = $this->Phd_mis_reg->get_phd_education_details($login_id['reg_id']);
                          $login_id['photo_signature'] = $this->Phd_mis_reg->get_photo_signature_phd($login_id['reg_id']);
                          if($prev_parent_details_log != ''){
                          $login_id['get_mis_reg_parent_details'] = $this->Phd_mis_reg->get_mis_reg_parent_details($login_id['reg_id']);
                          }

                          $this->adm_phdpt_header($data);
                          $this->load->view('admission/phdpt/mis_registration_common_form_parent_details', $login_id);
                          $this->adm_phdpt_footer();
                        }
                    }
                    else{
                        redirect('admission/phdpt/Adm_phdpt_registration/logout');
                    }
                }
                else{
                    redirect('admission/phdpt/Adm_phdpt_registration/logout');
                }

               }
                else{
                    redirect('admission/phdpt/Adm_phdpt_registration/logout');
                }
          }
        }
        else{
            redirect('admission/phdpt/Adm_phdpt_registration/logout');
        }
     }

     function manage_previous_parent_details(){
        $registration_no = $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        $count_ml = 0;
        if ($registration_no && ($login_type =='Phdpt')) {
            $data['val'] = "home";
            $data['application'] = $this->Phd_all->get_application_details($registration_no);
            $data['program'] = $this->Phd_all->get_program_details($registration_no);
            $data['tab_stat'] = $this->Phd_all->get_tab_status($registration_no);
            $data['program_selected'] = $this->session->userdata('selected_program');
            $appl_type = $this->Phd_mis_reg->get_appl_type_from_reg_no($registration_no);
            $login_id=$this->Phd_mis_reg->validate_login($registration_no,$data['program_selected'],$appl_type);
            #$admission_no=$this->Phd_mis_reg->get_admn_no_from_stud_final_with_fee($registration_no);
            $admn_type='';
                if($login_id){
                $admn_type=$login_id['admn_type'];
                $data['admn_type']=$admn_type;
                }
                if($login_id && $admn_type=='jrf')
                {

                // check fee_status for payment 26-05-2021
                //$order_no = $this->generate_order_no($admn_type); // Generate order no
                $newDOB = date("d-m-Y", strtotime($login_id['dob']));
                // for payment data send to payment view in newadmission
                $fee_payment = array(
                'name' => $login_id['first_name']." ".$login_id['middle_name']." ".$login_id['last_name'],
                'app_id' => $login_id['reg_id'],
                'contact_no' => $login_id['contact_no'],
                'email' => $login_id['email'],
                'category' => $login_id['category'],
                'dob' => $newDOB,
                'fee_to_be_paid' => $login_id['fee_to_be_paid'],
                // 'order_no' => $order_no
                );

                $timestamp = date('Y-m-d H:i:s');
                $insert_order_no = array(
                //'order_no' => $order_no,
                'created_at' => $timestamp
                );

                #$login_id=$this->Phd_mis_reg->validate_login_final($registration_no); // check from final table
                    // payment done data available in stud_final_with_fee table for registration 2021
                    if($login_id)
                    {
                    // main part of mba after checking payment either print form or load form 25-7-2021
                    $login_id['fee_mode'] = 'online';
                    $iitism_email_pass = $this->generate_iitism_email_password(); // create 8 char email pass
                    $login_id['iitism_password'] = $iitism_email_pass;

                $admn_no='';
                // either print form or load form
                $this->session->set_userdata($admn_no,$admn_type);
                $pay_status_selected = $this->Phd_mis_reg->check_payment_status_appl_selected($registration_no);
                   /* check if payment is completed in appl_selected */
                   $tab4 = $this->Phd_mis_reg->check_tab4_status($registration_no);
                  if($tab4 != '' && $pay_status_selected != '')// already submitted
                  {
                     redirect('admission/phdpt/Adm_phdpt_application_preview');
                  }
                else
                {

                    // echo '<pre>';
                    // print_r($login_id);
                    // echo '</pre>';
                    // exit;
                    // if credentials match then upload online receipt in assets/images/student/admn_no 5_7_21
                    // $receipt_payment = array(
                    // 'admn_no' => $login_id['admn_no'],
                    // 'reg_id' => $login_id['reg_id'],
                    // 'name' => $login_id['first_name'].' '.$login_id['middle_name'].' '.$login_id['last_name'],
                    // 'admn_type' => $login_id['admn_type'],
                    // 'contact_no' => $login_id['contact_no'],
                    // 'email' => $login_id['email'],
                    // 'dob' => $login_id['dob'],
                    // 'branch_id' => $login_id['branch_id'],
                    // 'course_id' => $login_id['course_id'],
                    // 'dept_id' => $login_id['dept_id'],
                    // 'fee_status_msg' => $login_id['fee_status_msg'],
                    // 'order_no' => $login_id['fee_order_no'],
                    // 'payment_date' => $login_id['fee_payment_at'],
                    // 'fee_to_be_paid' => $login_id['fee_to_be_paid']
                    // );

                    # comment receipt part here because it will be generated dynamically #
                    //   $receipt_path = $this->download_receipt($receipt_payment);
                    //   $login_id['receipt_path'] = $receipt_path['receipt_path'];
                    //   $login_id['receipt_name_order_no'] = $receipt_path['receipt_name_order_no'];

                    # comment receipt part here because it will be generated dynamically #

                    #xxxxxxxxxxxxxxxxxxxxxxxxxx JRF
                    $login_id['education_details'] = $this->Phd_mis_reg->get_phd_education_details($login_id['reg_id']);

                    $login_id['photo_signature'] = $this->Phd_mis_reg->get_photo_signature_phd($login_id['reg_id']);

                    $login_id['get_mis_reg_parent_details'] = $this->Phd_mis_reg->get_mis_reg_parent_details($login_id['reg_id']);
                    // $data['login_id'] = $login_id;
                    // $data['data_edu'] = $data_edu;
                    // echo '<pre>';
                    // print_r($login_id);
                    // echo '</pre>';
                    // exit;

                    $this->adm_phdpt_header($data);
                    $this->load->view('admission/phdpt/mis_registration_common_form_parent_details',$login_id);
                    $this->adm_phdpt_footer();

                    }
                }
                else{
                    redirect('admission/phdpt/Adm_phdpt_registration/logout');
                }
            }
        }
     }
     function check_father_name(){
        if ($this->input->post('father_name') === 'none') {
                $this->form_validation->set_message('check_father_name', 'Father Name is required');
                return FALSE;
            } else {
                if(preg_match('/^[a-zA-Z0-9 \/_.]+$/', $this->input->post('father_name'))){				//echo 'entered_2';
                    return TRUE;
                }
             else{
                $this->form_validation->set_message('check_father_name', 'Father Name cannot cantain special characters');
                return FALSE;
             }
            }
       }


       function check_mother_name(){
        if ($this->input->post('mother_name') === 'none') {
                $this->form_validation->set_message('check_mother_name', 'Mother Name is required');
                return FALSE;
            } else {
                if(preg_match('/^[a-zA-Z0-9 \/_.]+$/', $this->input->post('mother_name'))){				//echo 'entered_2';
                    return TRUE;
                }
             else{
                $this->form_validation->set_message('check_mother_name', 'Mother Name cannot cantain special characters');
                return FALSE;
             }
            }
       }

       function check_father_occupation(){
        if ($this->input->post('father_occupation') === 'none') {
                $this->form_validation->set_message('check_father_occupation', 'Father Occupation is required');
                return FALSE;
            } else {
                if(preg_match('/^[a-zA-Z0-9 \/_.]+$/', $this->input->post('father_occupation'))){				//echo 'entered_2';
                    return TRUE;
                }
             else{
                $this->form_validation->set_message('check_father_occupation', 'Father Occupation cannot cantain special characters');
                return FALSE;
             }
            }
       }

       function check_mother_occupation(){
        if ($this->input->post('mother_occupation') === 'none') {
                $this->form_validation->set_message('check_mother_occupation', 'Mother Occupation is required');
                return FALSE;
            } else {
                if(preg_match('/^[a-zA-Z0-9 \/_.]+$/', $this->input->post('mother_occupation'))){				//echo 'entered_2';
                    return TRUE;
                }
             else{
                $this->form_validation->set_message('check_mother_occupation', 'Mother Occupation cannot cantain special characters');
                return FALSE;
             }
            }
       }


       function check_father_income(){
        if ($this->input->post('father_income') === 'none') {
                $this->form_validation->set_message('check_father_income', 'Father Income is required');
                return FALSE;
            } else {
                if(preg_match('/^[a-zA-Z0-9 \/_.]+$/', $this->input->post('father_income'))){				//echo 'entered_2';
                    return TRUE;
                }
             else{
                $this->form_validation->set_message('check_father_income', 'Father Income cannot cantain special characters');
                return FALSE;
             }
            }
       }

       function check_mother_income(){
        if ($this->input->post('mother_income') === 'none') {
                $this->form_validation->set_message('check_mother_income', 'Mother Income is required');
                return FALSE;
            } else {
                if(preg_match('/^[a-zA-Z0-9 \/_.]+$/', $this->input->post('mother_income'))){				//echo 'entered_2';
                    return TRUE;
                }
             else{
                $this->form_validation->set_message('check_mother_income', 'Mother Income cannot cantain special characters');
                return FALSE;
             }
            }
       }

       function check_parent_mobile_no(){
        if ($this->input->post('parent_mobile_no') === 'none') {
                $this->form_validation->set_message('check_parent_mobile_no', 'Parent Mobile No. is required');
                return FALSE;
            } else {
                if(preg_match('/^[a-zA-Z0-9 \/_.]+$/', $this->input->post('parent_mobile_no'))){				//echo 'entered_2';
                    return TRUE;
                }
             else{
                $this->form_validation->set_message('check_parent_mobile_no', 'Parent Mobile No. cannot cantain special characters');
                return FALSE;
             }
            }
       }

       function check_parent_email_id(){
        if ($this->input->post('parent_email_id') === 'none') {
                $this->form_validation->set_message('check_parent_email_id', 'Parent Email ID is required');
                return FALSE;
            } else {
                if(filter_var($this->input->post('parent_email_id'), FILTER_VALIDATE_EMAIL)){				//echo 'entered_2';
                    return TRUE;
                }
             else{
                $this->form_validation->set_message('check_parent_email_id', 'Parent Email ID cannot cantain special characters');
                return FALSE;
             }
            }
       }

       function check_guardian_name(){
        if ($this->input->post('guardian_name') === 'none') {
                $this->form_validation->set_message('check_guardian_name', 'Guardian Name is required');
                return FALSE;
            } else {
                if(preg_match('/^[a-zA-Z0-9 \/_.]+$/', $this->input->post('guardian_name'))){				//echo 'entered_2';
                    return TRUE;
                }
             else{
                $this->form_validation->set_message('check_guardian_name', 'Guardian Name cannot cantain special characters');
                return FALSE;
             }
            }
       }

       function check_guardian_relation(){
        if ($this->input->post('guardian_relation') === 'none') {
                $this->form_validation->set_message('check_guardian_relation', 'Guardian Relation is required');
                return FALSE;
            } else {
                if(preg_match('/^[a-zA-Z0-9 \/_.]+$/', $this->input->post('guardian_relation'))){				//echo 'entered_2';
                    return TRUE;
                }
             else{
                $this->form_validation->set_message('check_guardian_relation', 'Guardian Relation cannot cantain special characters');
                return FALSE;
             }
            }
       }


       function check_alternate_mobile_no(){
        if ($this->input->post('alternate_mobile_no') === 'none') {
                $this->form_validation->set_message('check_alternate_mobile_no', 'Alternate Mobile No. is required');
                return FALSE;
            } else {
                if(preg_match('/^[a-zA-Z0-9 \/_.]+$/', $this->input->post('alternate_mobile_no'))){				//echo 'entered_2';
                    return TRUE;
                }
             else{
                $this->form_validation->set_message('check_alternate_mobile_no', 'Alternate Mobile No. cannot cantain special characters');
                return FALSE;
             }
            }
       }

       function check_alternate_email_id(){
        if ($this->input->post('alternate_email_id') === 'none') {
                $this->form_validation->set_message('check_alternate_email_id', 'Alternate Email ID is required');
                return FALSE;
            } else {
                if(filter_var($this->input->post('alternate_email_id'),FILTER_VALIDATE_EMAIL)){				//echo 'entered_2';
                    return TRUE;
                }
             else{
                $this->form_validation->set_message('check_alternate_email_id', 'Alternate Email ID cannot cantain special characters');
                return FALSE;
             }
            }
       }

}

?>
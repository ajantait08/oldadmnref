<?php defined('BASEPATH') or exit('No direct script access allowed');

class Adm_phdpt_mis_registration_other_details extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('dompdf', 'file'));
        $this->load->library('authorization');
        $this->load->model('admission/phdpt/Adm_phdpt_application_preview_model', 'Phd_all', TRUE);
        $this->load->model('admission/phdpt/Adm_phdpt_mis_registration_model','Phd_mis_reg',TRUE);
        $this->load->library('Ssh2_connect');

      }

    function mis_reg_save_stu_other_imp_details(){
        //echo 'registered'; exit;
        $registration_no = $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        $count_ml = 0;
        if ($registration_no && ($login_type =='Phdpt')) {
            //echo 'entered initial reg'; exit;
            $data['val'] = "home";
            $data['application'] = $this->Phd_all->get_application_details($registration_no);
            $data['program'] = $this->Phd_all->get_program_details($registration_no);
            $data['tab_stat'] = $this->Phd_all->get_tab_status($registration_no);
            $data['program_selected'] = $this->session->userdata('selected_program');
            $appl_type = $this->Phd_mis_reg->get_appl_type_from_reg_no($registration_no);
            $login_id=$this->Phd_mis_reg->validate_login($registration_no,$data['program_selected'],$appl_type);
            //$admission_no=$this->Phd_mis_reg->get_admn_no_from_stud_final_with_fee($registration_no);
            $admn_type='';
                if($login_id){
                 $admn_type=$login_id['admn_type'];
                 $data['admn_type']=$admn_type;}

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

                   //$login_id=$this->Phd_mis_reg->validate_login_final($registration_no); // check from final table
                    // payment done data available in stud_final_with_fee table for registration 2021
                    if($login_id)
                    {
                      // main part of mba after checking payment either print form or load form 25-7-2021
                    //$login_id['fee_mode'] = 'online';
                    //$iitism_email_pass = $this->generate_iitism_email_password(); // create 8 char email pass
                    //$login_id['iitism_password'] = $iitism_email_pass;

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
                    //   'fee_to_be_paid' => $login_id['fee_to_be_paid'],
                    //   'registration_no' => $registration_no
                    //   );

                     # comment receipt part here because it will be generated dynamically #
                      //$receipt_path = $this->download_receipt($receipt_payment);
                      //echo '';
                      //$login_id['receipt_path'] = $receipt_path['receipt_path'];
                      //$login_id['receipt_name_order_no'] = $receipt_path['receipt_name_order_no'];

                    # comment receipt part here because it will be generated dynamically #

                      #xxxxxxxxxxxxxxxxxxxxxxxxxx JRF
                      $login_id['education_details'] = $this->Phd_mis_reg->get_phd_education_details($login_id['reg_id']);

                      $login_id['photo_signature'] = $this->Phd_mis_reg->get_photo_signature_phd($login_id['reg_id']);
                      $login_id['iitism_email'] = "admission_no@iitism.ac.in";
                      $login_id['iitism_password'] = $login_id['contact_no'];
                      // echo '<pre>';
                      // print_r($login_id);
                      // echo '</pre>';
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
                          redirect('admission/phdpt/Adm_phdpt_mis_registration/parent_bank_account_details');
                        }
                        if ($tab_status == '3') {
                            $this->adm_phdpt_header($data);
                            $this->load->view('admission/phdpt/mis_registration_common_form_other_imp_details', $login_id);
                            $this->adm_phdpt_footer();
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
        }
        else {
          redirect('admission/phdpt/Adm_phdpt_registration/logout');
        }
    }

    function manage_previous_other_details(){
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
               $data['admn_type']=$admn_type;}
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
                  #$login_id['fee_mode'] = 'online';
                  //$iitism_email_pass = $this->generate_iitism_email_password(); // create 8 char email pass
                  //$login_id['iitism_password'] = $iitism_email_pass;

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
                  //   'fee_to_be_paid' => $login_id['fee_to_be_paid'],
                  //   'registration_no' => $registration_no
                  //   );

                  //  # comment receipt part here because it will be generated dynamically #
                  //   $receipt_path = $this->download_receipt($receipt_payment);
                  //   $login_id['receipt_path'] = $receipt_path['receipt_path'];
                  //   $login_id['receipt_name_order_no'] = $receipt_path['receipt_name_order_no'];

                  # comment receipt part here because it will be generated dynamically #

                    #xxxxxxxxxxxxxxxxxxxxxxxxxx JRF
                    $login_id['education_details'] = $this->Phd_mis_reg->get_phd_education_details($login_id['reg_id']);

                    $login_id['photo_signature'] = $this->Phd_mis_reg->get_photo_signature_phd($login_id['reg_id']);
                    $login_id['iitism_email'] = "admission_no@iitism.ac.in";
                    $login_id['iitism_password'] = $login_id['contact_no'];
                    $login_id['manage_previous_hostel_details'] = $this->Phd_mis_reg->get_prev_other_hostel_details($registration_no);
                    $login_id['manage_previous_stu_account_details'] = $this->Phd_mis_reg->get_prev_stu_account_details($registration_no);
                    //$login_id['manage_previous_fee_details'] = $this->Phd_mis_reg->get_prev_fee_details($registration_no);
                    $this->adm_phdpt_header($data);
                    $this->load->view('admission/phdpt/mis_registration_common_form_other_imp_details', $login_id);
                    $this->adm_phdpt_footer();
                  }

                }

              }

            }

      }

    function mis_reg_stu_other_details_preview(){
            $registration_no = $this->session->userdata('registration_no');
            $login_type = $this->session->userdata('login_type');
            $count_ml = 0;
            if ($registration_no && ($login_type =='Phdpt')) {
                //echo 'preview entered'; exit;
                $data['val'] = "home";
                $data['application'] = $this->Phd_all->get_application_details($registration_no);
                $data['program'] = $this->Phd_all->get_program_details($registration_no);
                $data['tab_stat'] = $this->Phd_all->get_tab_status($registration_no);
                $appl_type = $this->Phd_mis_reg->get_appl_type_from_reg_no($registration_no);
                $admn_type='jrf';
                $admn_no = $this->Phd_mis_reg->get_admn_no_from_mis($registration_no);
                if ($admn_no != '') {
                  //echo 'entered here'; exit;
                  $tab5 = $this->Phd_mis_reg->check_tab5_status($registration_no); // comment the tab condition later
                  if($tab5 != '')// already submitted
                  {
                    $details=$this->getFromTables($admn_no,$admn_type);// will be same
                    $data1['admn_type']=$admn_type;
                    $data1['registration_no'] = $registration_no;
                    $data1['photopath'] = $this->Phd_mis_reg->get_photopath_from_personal_details($registration_no);
                    $data1['signpath'] = $this->Phd_mis_reg->get_signpath_from_personal_details($registration_no);
                    $details=array_merge($details,$data1);
                    $this->session->set_userdata("admn_no",$admn_no);
                    //echo '<pre>';print_r($details);echo '</pre>'; exit;
                    $this->adm_phdpt_header($data);
                    $this->load->view('admission/phdpt/mis_reg_download_common_format',$details);
                    $this->adm_phdpt_footer();

                  }
                  else
                  {
                $details=$this->getFromTables($admn_no,$admn_type);
                $data1['admn_type']=$admn_type;
                $data1['registration_no'] = $registration_no;
                $data1['photopath'] = $this->Phd_mis_reg->get_photopath_from_personal_details($registration_no);
                $data1['signpath'] = $this->Phd_mis_reg->get_signpath_from_personal_details($registration_no);
                $details=array_merge($details,$data1);
                $details=array_merge($details,$data1);
                $this->session->set_userdata("admn_no",$admn_no);
                $email_success = $this->upload_final_pdf($admn_no,$admn_type,$registration_no);
                if ($email_success) {
                  $this->load->view('admission/phdpt/mis_reg_download_common_format',$details);
                  $this->session->unset_userdata($admn_no,$admn_type);
                }
                else {
                  $this->load->view('admission/phdpt/mis_reg_download_common_format',$details);
                  $this->session->unset_userdata($admn_no,$admn_type);
                }
                }
              }
                else {

                  //echo 'entered here this'; exit;
                  $data['program_selected'] = $this->session->userdata('selected_program');
                $login_id=$this->Phd_mis_reg->validate_login($registration_no,$data['program_selected'],$appl_type);
                //$admission_no=$this->Phd_mis_reg->get_admn_no_from_stud_final_with_fee($registration_no);
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

                       //$login_id=$this->Phd_mis_reg->validate_login_final($registration_no); // check from final table
                        // payment done data available in stud_final_with_fee table for registration 2021
                        if($login_id)
                        {
                          // main part of mba after checking payment either print form or load form 25-7-2021
                        $login_id['fee_mode'] = 'online';
                        //$iitism_email_pass = $this->generate_iitism_email_password(); // create 8 char email pass
                        //$login_id['iitism_password'] = $iitism_email_pass;
                        $login_id['iitism_email'] = "admission_no@iitism.ac.in";
                        $login_id['iitism_password'] = $login_id['contact_no'];

                      $admn_no='';
                     // either print form or load form
                       $this->session->set_userdata($admn_no,$admn_type);
                       $pay_status_selected = $this->Phd_mis_reg->check_payment_status_appl_selected($registration_no);
                   /* check if payment is completed in appl_selected */
                   $tab4 = $this->Phd_mis_reg->check_tab4_status($registration_no);
                  if($tab4 != '' && $pay_status_selected != '')// already submitted
                  {
                     //echo 'entered this 1'; exit;
                     redirect('admission/phdpt/Adm_phdpt_application_preview');
                  }
                      else
                      {
                        //echo 'entered that 2'; exit;
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
                          #echo 'reached till here';
                          $login_id['education_details'] = $this->Phd_mis_reg->get_phd_education_details($login_id['reg_id']);

                          $login_id['photo_signature'] = $this->Phd_mis_reg->get_photo_signature_phd($login_id['reg_id']);
                          /* get data from previous form */
                          $login_id['get_personal_details'] = $this->Phd_mis_reg->get_personal_details($login_id['reg_id']);
                          // echo '<pre>';
                          // print_r($login_id['get_personal_details']);
                          // echo '</pre>';
                          // exit;
                          $login_id['get_education_details'] = $this->Phd_mis_reg->get_education_details($login_id['reg_id']);
                          $login_id['get_prev_education_details'] = $this->Phd_mis_reg->get_prev_education_details($login_id['reg_id']);
                          $login_id['get_prev_certificate_details'] = $this->Phd_mis_reg->get_prev_certificate_details($login_id['reg_id']);
                          $login_id['get_parent_details'] = $this->Phd_mis_reg->get_parent_details($login_id['reg_id']);
                          $login_id['get_hostel_details'] = $this->Phd_mis_reg->get_hostel_details($login_id['reg_id']);
                          $login_id['get_fee_details'] = $this->Phd_mis_reg->get_fee_details($login_id['reg_id'],);
                          $login_id['get_student_account_details'] = $this->Phd_mis_reg->get_student_account_details($login_id['reg_id']);
                          $count_dynamic_edu_details = count($login_id['education_details']);
                          $dynamic_prev_edu_details = array();
                          $dynamic_prev_cert_details = array();
                          //$dynamic_array_merge_edu_cert_details = array();
                          foreach($login_id['get_prev_education_details'] as $prev_edu_details){
                            if ($prev_edu_details['sno'] > $count_dynamic_edu_details) {
                               array_push($dynamic_prev_edu_details,$prev_edu_details);
                            }
                          }

                          foreach($login_id['get_prev_certificate_details'] as $prev_cert_details){
                            if ($prev_cert_details['sno'] > $count_dynamic_edu_details) {
                               array_push($dynamic_prev_cert_details,$prev_cert_details);
                            }
                          }

                        $login_id['dynamic_prev_edu_details'] = $dynamic_prev_edu_details;
                        $login_id['dynamic_prev_cert_details'] = $dynamic_prev_cert_details;

                        if (!empty($login_id['get_prev_education_details'])) {
                          //echo 'entered not empty'; exit;
                          $login_id['array_dynamic_education_new'] = array();
                          foreach ($login_id['get_prev_education_details'] as $key => $value) {
                            // echo $key;
                            // echo '<pre>'; print_r($value); echo '</pre>';
                            if(2 < $value['sno'] &&  $value['sno'] <= $count_dynamic_edu_details){
                              array_push($login_id['array_dynamic_education_new'],$value);
                            }
                          }
                        }
                          // echo '<pre>';
                          // print_r($login_id);
                          // echo '</pre>';
                          // exit;
                          /* get data from previous form */
                      $reg_tab_status = $this->Phd_mis_reg->get_current_user_tab_status($registration_no);
                      if (empty($reg_tab_status)) {
                      redirect('admission/phdpt/Adm_Phdpt_mis_registration/proceed_with_registration');
                      }
                      else{
                      // echo 'entered_2'; exit;
                      $tab_status = $reg_tab_status[0]['tab_status'];
                      // echo $tab_status; exit;
                      if ($tab_status == '0') {
                       redirect('admission/phdpt/Adm_Phdpt_mis_registration/proceed_with_registration');
                      }
                      if ($tab_status == '1') {
                        redirect('admission/phdpt/Adm_Phdpt_mis_registration/proceed_with_registration');
                      }
                      if ($tab_status == '2') {
                        redirect('admission/phdpt/Adm_Phdpt_mis_registration/parent_bank_account_details');
                      }
                      if ($tab_status == '3') {
                        redirect('admission/phdpt/Adm_Phdpt_mis_registration_other_details/mis_reg_save_stu_other_imp_details');
                      }

                      if ($tab_status == '4') {
                        $this->adm_phdpt_header($data);
                        $this->load->view('admission/phdpt/mis_registration_common_form_preview', $login_id);
                        //$this->load->view('admission/mtech/mis_registration', $login_id);
                        $this->adm_phdpt_footer();
                          }
                        }
                  // $this->session->set_flashdata('flashError','Sorry ,There is No Details related to MIS Registration');
                  // redirect('admission/phd/Adm_phd_application_preview');
                    }
                }
                else {
                  redirect('admission/phdpt/Adm_phdpt_registration/logout');
                }
              }
            }
                }
              }


    function save_registrtaion_no_other_details(){
        //echo 'entered'; exit;
        $registration_no = $this->session->userdata('registration_no');
        //$admn_no = $this->session->userdata('admn_no');
        $login_type = $this->session->userdata('login_type');
        $count_ml = 0;
        if ($registration_no && ($login_type =='Phdpt')) {
          $admn_type = $this->input->post('admn_type');
          $institute_name = $this->input->post('institute_name');
          $admn_no = $this->input->post('admn_no');
          $this->form_validation->set_rules('food_habit', 'Food Habit', 'required');
          $this->form_validation->set_rules('laptop_make', 'Laptop Details', 'required|callback_check_laptop_make');
          $this->form_validation->set_rules('laptop_model', 'Laptop Model', 'callback_check_laptop_model');
          $this->form_validation->set_rules('laptop_sl_no', 'Laptop Serial No.', 'callback_check_laptop_sl_no');
          $this->form_validation->set_rules('iitism_email', 'IIT(ISM) Email', 'required');
          $this->form_validation->set_rules('iitism_password', 'IIT(ISM) Passowrd', 'required');
          // $this->form_validation->set_rules('fee_amount', 'Fee Amount', 'required');
          // $this->form_validation->set_rules('fee_date', 'Fee Date', 'required');
          // $this->form_validation->set_rules('fee_mode', 'Fee Mode', 'required');
          // $this->form_validation->set_rules('transaction_id', 'Transaction ID', 'required');
          $this->form_validation->set_rules('user_bank_name', 'User Bank name', 'required|callback_check_userbankname');
          $this->form_validation->set_rules('user_account_no', 'User Account No.', 'required|callback_check_useraccount_no');
          $this->form_validation->set_rules('c_user_account_no', 'Confirm User Account No.', 'required|callback_check_confirm_useraccount_no');
          $this->form_validation->set_rules('user_ifsc_code', 'User IFSC Code', 'required|callback_check_userifsccode');
          $this->form_validation->set_rules('check1', 'User Declaration', 'required');
          if($this->form_validation->run() == TRUE) {
            //echo 'pass'; exit;
            $check_hostel_details_exists = $this->Phd_mis_reg->get_prev_other_hostel_details($registration_no);
            // echo '<pre>';
            // print_r($check_hostel_details_exists);
            // echo '</pre>';
            // exit;
            if (!empty($check_hostel_details_exists)) {
              $columnsNames = array_keys($check_hostel_details_exists[0]);
              $columnsValues = array_values($check_hostel_details_exists[0]);
              $data_insert_log = array();

              if (!empty($check_hostel_details_exists)) {
                foreach($columnsNames as $key => $value) {
                if($value != 'id' && $value != 'updated_date' && $value != 'updated_by') {
                $data_insert_log[$value] = $columnsValues[$key];
                }

                $data_insert_log['created_time'] = date('d-m-Y H:i:s');
                //$data_insert_log['created_date'] = date('d-m-Y H:i:s');
              }
              //echo '<pre>'; print_r($data_insert_log); echo '</pre>'; //exit;
              $hostel_details_insert_log = $this->Phd_mis_reg->insert_hostel_details_log($data_insert_log);
              if ($hostel_details_insert_log == '') {
                //echo 'error here';exit;
                $this->session->flashdata('flashError','Error Occured , Please Wait while trying to update education details');
                redirect('admission/phdpt/Adm_phdpt_mis_registration_other_details/manage_previous_other_details');
              }
              else {
                //echo 'success here';exit;
                $delete_prev = $this->Phd_mis_reg->delete_prev_hostel_details($registration_no);
                if($delete_prev == ''){
                  //echo 'not deleted'; exit;
                  $this->session->flashdata('flashError','Error Occured , Please Wait while trying to update education details');
                  redirect('admission/phdpt/Adm_phdpt_mis_registration_other_details/manage_previous_other_details');
                }
              }
            }

          }
            $hostel_info = array(
                  'registration_no' => $registration_no,
                  'admn_no' => $admn_no,
                  'food_habit' => $this->input->post('food_habit'),
                  'laptop_details' => $this->input->post('laptop_make'),
                  'model_no' => $this->input->post('laptop_model'),
                  'serial_no' => $this->input->post('laptop_sl_no'),
                  'created_by' => $registration_no,
                  'created_time' => date('Y-m-d H:i:s'));

              $save_hostel_info = $this->Phd_mis_reg->save_hostel_info($hostel_info);
              //exit;

            $check_stu_account_details_exists = $this->Phd_mis_reg->get_prev_stu_account_details($registration_no);
            if (!empty($check_stu_account_details_exists)) {
              $columnsNames = array_keys($check_stu_account_details_exists[0]);
              $columnsValues = array_values($check_stu_account_details_exists[0]);
              $data_insert_log = array();

              if (!empty($check_stu_account_details_exists)) {
                foreach($columnsNames as $key => $value) {
                if($value != 'id' && $value != 'updated_date' && $value != 'updated_by') {
                $data_insert_log[$value] = $columnsValues[$key];
                }

                $data_insert_log['created_on'] = date('d-m-Y H:i:s');
                //$data_insert_log['created_date'] = date('d-m-Y H:i:s');
              }
              //echo '<pre>'; print_r($data_insert_log); echo '</pre>'; //exit;
              $account_details_insert_log = $this->Phd_mis_reg->insert_account_details_log($data_insert_log);
              if ($account_details_insert_log == '') {
                //echo 'error here';exit;
                $this->session->flashdata('flashError','Error Occured , Please Wait while trying to update education details');
                redirect('admission/phdpt/Adm_phdpt_mis_registration_other_details/manage_previous_other_details');
              }
              else {
                //echo 'success here';exit;
                $delete_prev = $this->Phd_mis_reg->delete_prev_account_details($registration_no);
                if($delete_prev == ''){
                  //echo 'not deleted'; exit;
                  $this->session->flashdata('flashError','Error Occured , Please Wait while trying to update education details');
                  redirect('admission/phdpt/Adm_phdpt_mis_registration_other_details/manage_previous_other_details');
                }
              }
            }

          }
              $stu_account_details = array(
                'registration_no' => $registration_no,
                'admn_no' => $admn_no,
                'bank_name' => $this->input->post('user_bank_name'),
                'account_no' => $this->input->post('user_account_no'),
                'ifsc_code' => $this->input->post('user_ifsc_code'),
                'created_by' => $registration_no,
                'created_on' => date('Y-m-d H:i:s')
              );

              $save_account_details = $this->Phd_mis_reg->save_account_details($stu_account_details);

              $check_fee_details_exists = $this->Phd_mis_reg->get_prev_stu_fee_details($registration_no);
              if (!empty($check_fee_details_exists)) {
                $columnsNames = array_keys($check_fee_details_exists[0]);
                $columnsValues = array_values($check_fee_details_exists[0]);
                $data_insert_log = array();

                if (!empty($check_fee_details_exists)) {
                  foreach($columnsNames as $key => $value) {
                  if($value != 'id' && $value != 'updated_date' && $value != 'updated_by') {
                  $data_insert_log[$value] = $columnsValues[$key];
                  }

                  $data_insert_log['created_date'] = date('d-m-Y H:i:s');
                  //$data_insert_log['created_date'] = date('d-m-Y H:i:s');
                }
                //echo '<pre>'; print_r($data_insert_log); echo '</pre>'; //exit;
                $fee_details_insert_log = $this->Phd_mis_reg->insert_fee_details_log($data_insert_log);
                if ($fee_details_insert_log == '') {
                  //echo 'error here';exit;
                  $this->session->flashdata('flashError','Error Occured , Please Wait while trying to update education details');
                  redirect('admission/phdpt/Adm_phdpt_mis_registration_other_details/manage_previous_other_details');
                }
                else {
                  //echo 'success here';exit;
                  $delete_prev = $this->Phd_mis_reg->delete_prev_fee_details($registration_no);
                  if($delete_prev == ''){
                    //echo 'not deleted'; exit;
                    $this->session->flashdata('flashError','Error Occured , Please Wait while trying to update education details');
                    redirect('admission/phdpt/Adm_phdpt_mis_registration_other_details/manage_previous_other_details');
                  }
                }
              }

            }

              // $stu_fee_details = array(
              //   'registration_no' => $registration_no,
              //   'admn_no' => $admn_no,
              //   'fee_amount' => $this->input->post('fee_amount'),
              //   'fee_date' => $this->input->post('fee_date'),
              //   'fee_mode' => $this->input->post('fee_mode'),
              //   'transaction_id' => $this->input->post('transaction_id'),
              //   'receipt_path' => $this->input->post('receipt'),
              //   'created_by' => $registration_no,
              //   'created_date' => date('Y-m-d H:i:s'));

              // $save_fee_details = $this->Phd_mis_reg->save_stu_fee_details($stu_fee_details);

              if ($save_hostel_info != '' &&  $save_account_details != '') {
                $data_Phd_mis_reg =  array(
                    'tab4' => '4',
                    'created_by' => $registration_no,
                    'updated_date_time' => date('d-m-Y H:i:s'),
                    'tab_status' => '4',
                    'remark_1' => 0,
                    'remark_2' => 0
                );
                 $tab_details_insert = $this->Phd_mis_reg->update_mis_reg_tab_status($data_Phd_mis_reg,$registration_no);
                 if ($tab_details_insert) {
                    $this->session->set_flashdata('flashSuccess','Student Other Details Updated Successfully');
                    redirect('admission/phdpt/Adm_phdpt_mis_registration_other_details/mis_reg_stu_other_details_preview');
                 }
              }
              else{
                $this->session->set_flashdata('flashError','Sorry the data cannot be saved');
                redirect('admission/phdpt/Adm_phdpt_mis_registration_other_details/mis_reg_save_stu_other_imp_details');
              }
          }
          else{
            //print_r(validation_errors()); exit;
        $registration_no = $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        $count_ml = 0;
        if ($registration_no && ($login_type =='Phdpt')) {
            //echo 'entered initial reg'; exit;
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
                 $data['admn_type']=$admn_type;}
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
                    //$iitism_email_pass = $this->generate_iitism_email_password(); // create 8 char email pass
                    //$login_id['iitism_password'] = $iitism_email_pass;

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
                    //   'fee_to_be_paid' => $login_id['fee_to_be_paid'],
                    //   'registration_no' => $registration_no
                    //   );

                    //  # comment receipt part here because it will be generated dynamically #
                    //   $receipt_path = $this->download_receipt($receipt_payment);
                    //   //echo '';
                    //   $login_id['receipt_path'] = $receipt_path['receipt_path'];
                    //   $login_id['receipt_name_order_no'] = $receipt_path['receipt_name_order_no'];

                    # comment receipt part here because it will be generated dynamically #

                      #xxxxxxxxxxxxxxxxxxxxxxxxxx JRF
                      $login_id['education_details'] = $this->Phd_mis_reg->get_phd_education_details($login_id['reg_id']);

                      $login_id['photo_signature'] = $this->Phd_mis_reg->get_photo_signature_phd($login_id['reg_id']);
                      $login_id['iitism_email'] = "admission_no@iitism.ac.in";
                      $login_id['iitism_password'] = $login_id['contact_no'];
                      if (!empty($check_stu_account_details_exists) && (!empty($check_hostel_details_exists))) {
                        $login_id['manage_previous_hostel_details'] = $this->Phd_mis_reg->get_prev_other_hostel_details($registration_no);
                        $login_id['manage_previous_stu_account_details'] = $this->Phd_mis_reg->get_prev_stu_account_details($registration_no);
                      }

                           $this->adm_phdpt_header($data);
                           $this->load->view('admission/phdpt/mis_registration_common_form_other_imp_details', $login_id);
                           $this->adm_phdpt_footer();

                    }

                    }
                //}

            }
        }
        else {
          redirect('admission/phdpt/Adm_phdpt_registration/logout');
        }
            //redirect('admission/phd/Adm_phd_mis_registration_other_details/mis_reg_save_stu_other_imp_details');
          }
        }
        else{
            redirect('admission/phdpt/Adm_phdpt_registration/logout');
        }

    }

    function preview_submit(){
      $registration_no = $this->session->userdata('registration_no');
      $login_type = $this->session->userdata('login_type');
      $count_ml = 0;
      if ($registration_no && ($login_type =='Phdpt')) {
          //
          $data['val'] = "home";
          $data['application'] = $this->Phd_all->get_application_details($registration_no);
          $data['program'] = $this->Phd_all->get_program_details($registration_no);
          $data['tab_stat'] = $this->Phd_all->get_tab_status($registration_no);
          $login_id=$this->Phd_mis_reg->validate_login($registration_no);
          //$admission_no=$this->Phd_mis_reg->get_admn_no_from_stud_final_with_fee($registration_no);
          $admn_type='';
              if($login_id){
               $admn_type=$login_id['admn_type'];
               $data['admn_type']=$admn_type;
              }
              if($login_id && $admn_type=='jrf')
              {
                //echo 'initial validation here !'; exit;
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
                  //$login_id['fee_mode'] = 'online';
                  //$iitism_email_pass = $this->generate_iitism_email_password(); // create 8 char email pass
                  //$login_id['iitism_password'] = $iitism_email_pass;
                  // $login_id['iitism_email'] = "admission_no@iitism.ac.in";
                  // $login_id['iitism_password'] = $login_id['contact_no'];

                $admn_no='';
               // either print form or load form
                 $this->session->set_userdata($admn_no,$admn_type);
                 $tab5 = $this->Phd_mis_reg->check_tab5_status($admn_no,$registration_no); // comment the tab condition later
                if($this->Phd_mis_reg->check($admn_no) && $tab5 != '')// already submitted
                {
                   //echo 'entered here first'; exit;
                  //  $details=$this->getFromTables($admn_no,$admn_type);// will be same
                  //  $data['admn_type'] = $admn_type;
                  //  $login_id=array_merge($details,$data);
                  //  //$this->session->unset_userdata($admn_no,$admn_type);
                  //  $this->session->set_userdata("admn_no",$admn_no); // for download pdf check
                  //  $this->load->view('new_admission_common/download_format_common',$login_id);// require for each admn_type
                  $details=$this->getFromTables($admn_no,$admn_type);// will be same
                  $data1['admn_type']=$admn_type;
                  $data1['registration_no'] = $login_id['reg_id'];
                  $data1['photopath'] = $this->Phd_mis_reg->get_photopath_from_personal_details($data1['registration_no']);
                  $data1['signpath'] = $this->Phd_mis_reg->get_signpath_from_personal_details($data1['registration_no']);
                  $details=array_merge($details,$data1);
                  $this->session->set_userdata("admn_no",$admn_no);
                  //echo '<pre>';print_r($details);echo '</pre>'; exit;
                  $this->adm_phdpt_header($data);
                  $this->load->view('admission/phdpt/mis_reg_download_common_format',$details);
                  $this->adm_phdpt_footer();

                }
                else
                {

                    //echo 'entered this else loop'; exit;

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
                    /* get data from previous form */
                    $login_id['get_personal_details'] = $this->Phd_mis_reg->get_personal_details($login_id['reg_id']);
                    $login_id['get_education_details'] = $this->Phd_mis_reg->get_education_details($login_id['reg_id']);
                    $login_id['get_prev_education_details'] = $this->Phd_mis_reg->get_prev_education_details($login_id['reg_id']);
                    $login_id['get_prev_certificate_details'] = $this->Phd_mis_reg->get_prev_certificate_details($login_id['reg_id']);
                    $login_id['get_parent_details'] = $this->Phd_mis_reg->get_parent_details($login_id['reg_id']);
                    $login_id['get_hostel_details'] = $this->Phd_mis_reg->get_hostel_details($login_id['reg_id']);
                    $login_id['get_fee_details'] = $this->Phd_mis_reg->get_fee_details($login_id['reg_id']);
                    $login_id['get_student_account_details'] = $this->Phd_mis_reg->get_student_account_details($login_id['reg_id']);
                    $dynamic_prev_edu_details = array();
                    $dynamic_prev_cert_details = array();
                    //$dynamic_array_merge_edu_cert_details = array();
                    foreach($login_id['get_prev_education_details'] as $prev_edu_details){
                      if ($prev_edu_details['sno'] > 3) {
                         array_push($dynamic_prev_edu_details,$prev_edu_details);
                      }
                    }
                    foreach($login_id['get_prev_certificate_details'] as $prev_cert_details){
                      if ($prev_cert_details['sno'] > 3) {
                         array_push($dynamic_prev_cert_details,$prev_cert_details);
                      }
                    }

                  //  echo '<pre>';
                  //  print_r($login_id);
                  //  echo '</pre>';
                  // exit;

                  $login_id['dynamic_prev_edu_details'] = $dynamic_prev_edu_details;
                  $login_id['dynamic_prev_cert_details'] = $dynamic_prev_cert_details;
                  $admn_type=$login_id['admn_type'];
                  // $data['dob'] = $login_id['dob'];
                  // $data['permanent_address_line1'] = $login_id['permanent_address_line1'];
                  // $data['permanent_address_line2'] = $login_id['permanent_address_line2'];
                  // $data['permanent_address_city'] = $login_id['permanent_address_city'];
                  // $data['permanent_address_state'] = $login_id['permanent_address_state'];
                  // $data['permanent_address_pincode'] = $login_id['permanent_address_pincode'];
                  // $data['nationality'] = $login_id['nationality'];
                  // $data['country'] = $login_id['country'];
                  // $data['father_name'] = $login_id['father_name'];
                  // $data['mother_name'] = $login_id['mother_name'];
                  //echo '<pre>'; print_r($_POST); echo '</pre>'; exit;
                  $action = $this->input->post('next');
                  if($action=='Proceed For Payment')
                        {
                          //echo 'entered submit'; exit;
                          // check here (check admno no registration already exist or not)
                          $tab5 = $this->Phd_mis_reg->check_tab5_status($registration_no); // comment the tab condition later
                          if($this->Phd_mis_reg->check_admn_no_registration($admn_no,$admn_type) && $tab5 != '')
                          {
                            $details=$this->getFromTables($admn_no,$admn_type);// will be same
                            $data1['admn_type']=$admn_type;
                            $data1['registration_no'] = $login_id['reg_id'];
                            $data1['photopath'] = $this->Phd_mis_reg->get_photopath_from_personal_details($data1['registration_no']);
                            $data1['signpath'] = $this->Phd_mis_reg->get_signpath_from_personal_details($data1['registration_no']);
                            $details=array_merge($details,$data1);
                            $this->session->set_userdata("admn_no",$admn_no);
                            //echo '<pre>'; print_r($details);echo '</pre>'; exit;
                            $this->adm_phdpt_header($data);
                            $this->load->view('admission/phdpt/mis_reg_download_common_format',$details);
                            $this->adm_phdpt_footer();
                          }
                          else
                          {

                            //echo 'entered tables 2 else'; exit;
                            //echo 'entered_else';
                            // if new registration then continue the step
                            /** checking file upload to different servers urgent */
                            //$our_upload = $this->our_upload($admn_no,$admn_type,$login_id);
                            //echo 'reached'; exit;
                            //echo '<pre>'; print_r($our_upload);echo '</pre>'; exit;
                            /** checking file upload to different servers urgent */
                            // if (!empty($our_upload)) {
                            //   $count_our_upload = count($our_upload);
                            //   //echo '<pre>'; print_r($our_upload); echo '</pre>'; exit;
                            //   for ($row_num = 0; $row_num < $count_our_upload; $row_num++) {

                            //     $upload_array = array(
                            //             'registration_no'=>$login_id['reg_id'],
                            //             'admn_no'=> $admn_no,
                            //             'error_description' => $our_upload[$row_num]['error_description'],
                            //             'server' => $our_upload[$row_num]['server'],
                            //             'created_by' => $login_id['reg_id'],
                            //             'created_on' => date('d-m-Y H:i:s'));

                            //             $this->Phd_mis_reg->insert_upload_error_logs($upload_array);
                            //           }
                            //     }

                                //echo $this->uploadDB($login_id); exit;

                //             if($this->uploadDB($login_id))
                //               {
                //                  //echo 'entered upload db success'; exit;
                //                 //echo 'entered_else db and file upload error'; exit;
                //                 $details=$this->getFromTables($admn_no,$admn_type);
                //                 $data1['admn_type']=$admn_type;
                //                 $data1['registration_no'] = $login_id['reg_id'];
                //                 $data1['photopath'] = $this->Phd_mis_reg->get_photopath_from_personal_details($data1['registration_no']);
                //                 $data1['signpath'] = $this->Phd_mis_reg->get_signpath_from_personal_details($data1['registration_no']);
                //                 $details=array_merge($details,$data1);
                //                 $details=array_merge($details,$data1);
                //                 $this->session->set_userdata("admn_no",$admn_no); // for download pdf check
                //                 // if registration done then upload final pdf in newadmission server 27-07-2021
                // # echo "<pre>"; print_r($details); exit;
                // $email_success =$this->upload_final_pdf($admn_no,$admn_type,$login_id['reg_id']);
                // if registration done then upload final pdf in newadmission server 27-07-2021
                //echo 'reached here'; exit;

                // if($email_success)
                // {
                  $data_Phd_mis_reg =  array(
                    'tab5' => '5',
                    'created_by' => $registration_no,
                    'updated_date_time' => date('d-m-Y H:i:s'),
                    'tab_status' => '5',
                    'remark_1' => 0,
                    'remark_2' => 0
                );
                 $tab_details_insert = $this->Phd_mis_reg->update_mis_reg_tab_status($data_Phd_mis_reg,$registration_no);

                  // email send successfully to registered email id
                  $this->session->set_flashdata('flashSuccess', 'MIS Registration Completed Successfully');
                  redirect('admission/phdpt/Adm_phdpt_admisison_payment');
                  //echo "<pre>"; print_r($details); echo '</pre>';exit;
                  //$this->load->view('admission/phd/mis_reg_download_common_format',$details);
                  //$this->session->unset_userdata($admn_no,$admn_type);
                }
                // else
                // {
                //   // sending email fail plz check SMTP setting "LESS SECURE"
                //   $this->session->set_flashdata('flashError', 'Error Sending mail during Registration , please try again');
                //   $this->load->view('admission/phd/mis_reg_download_common_format',$details);
                //   //$this->session->unset_userdata($admn_no,$admn_type);
                // }

                            // }
                            //   else
                            //   {
                            //     //echo 'failure'; exit;
                            //     $this->session->set_flashdata('flashError','Database and File Upload Error while submitting the form , please try again');
                            //     redirect('admission/phd/Adm_phd_mis_registration_other_details/mis_reg_stu_other_details_preview');
                            //   }
                          //}

                          // end check here
                        }

                        else{

                          $this->session->set_flashdata('flashError','Form cannot be submitted properly');
                          redirect('admission/phdpt/Adm_phdpt_mis_registration_other_details/mis_reg_stu_other_details_preview');
                        }
                  }

                }

              }
              else {
                redirect('admission/phdpt/Adm_phdpt_registration/logout');
              }
            }
    }

    function download_pdf($admn_no,$admn_type,$reg_id)
  {
    // echo "<pre>";
    // print_r($this->session->all_userdata());
    // exit;
    if($this->session->userdata('admn_no'))
    {
      $admn_no_session = $this->session->userdata('admn_no');
      if($admn_no_session==$admn_no)
      {
         // use for download the form , from the all the tables
         $details=$this->getFromTables($admn_no,$admn_type);
         //$details=array_merge($details,$data);
         $data['admn_type']=$admn_type;
         $data['registration_no'] = $reg_id;
         $data['photopath'] = $this->Phd_mis_reg->get_photopath_from_personal_details($data['registration_no']);
         $data['signpath'] = $this->Phd_mis_reg->get_signpath_from_personal_details($data['registration_no']);
         $details=array_merge($details,$data);
         // add IITISM email details
         //$this->load->model('new_admission_common/new_admission_common_model','',TRUE);
         //$get_reg_id =  $this->new_admission_common_model->get_reg_id($admn_no);
         //$details['reg_id'] = $get_reg_id['reg_id'];
         $details['reg_id'] = $reg_id;

         $emaildata = $this->Phd_mis_reg->get_emaildata($admn_no);
         $details['domain_name'] = $emaildata['domain_name'];
         $details['domain_password'] = $emaildata['password'];
         #xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx Group and section
         //$group_section = $this->new_admission_common_model->get_group_and_section($admn_no);
         $details['course'] = $this->Phd_mis_reg->get_course_details($details['course_id']);
        //  $details['group_id'] = $group_section['group_id'];
        //  $details['section'] = $group_section['section'];
            // echo "<pre>";
            // print_r($details);
            // exit;
         #xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx End group and section
         // end IITISM email details
        $this->load->helper(array('dompdf', 'file'));
        $ff=$this->load->view('admission/phdpt/mis_registration_print_final_pdf',$details,TRUE);
        pdf_create($ff, 'Mis_registration_form_' .strtolower($admn_no));
      }
      else
      {
        $this->session->set_flashdata('flashError','You do not have access to that location');
        redirect('admission/phdpt/Adm_phdpt_mis_registration_other_details/mis_reg_stu_other_details_preview');
      }
    }
    else
    {
      $this->session->set_flashdata('flashError','You do not have access to that location');
      redirect('admission/phdpt/Adm_phdpt_mis_registration_other_details/mis_reg_stu_other_details_preview');
    }


  }


    function upload_final_pdf($admn_no,$admn_type,$reg_id)
  {
    $connection = ssh2_connect('103.15.228.70',22);
    $con= ssh2_auth_password($connection,'filesync','F!l3sync#@$%007');
    $sftp = ssh2_sftp($connection);
  //  echo "<pre>";
  //  print_r($this->session->all_userdata());
  //  print_r($admn_no.$admn_type.$reg_id);
  //   exit;

    if($this->session->userdata('registration_no'))
    {
      $reg_id_session = $this->session->userdata('registration_no');
      if($reg_id_session==$reg_id)
      {

         $details=$this->getFromTables($admn_no,$admn_type);
         //$details=array_merge($details,$data);
         $data['admn_type']=$admn_type;
         $data['registration_no'] = $reg_id;
         $data['photopath'] = $this->Phd_mis_reg->get_photopath_from_personal_details($data['registration_no']);
         $data['signpath'] = $this->Phd_mis_reg->get_signpath_from_personal_details($data['registration_no']);
         $details=array_merge($details,$data);
         $details['reg_id'] = $reg_id;
         $upload_error = array();
         //$this->load->model('new_admission_common/new_admission_common_model_new','',TRUE);
         $emaildata = $this->Phd_mis_reg->get_emaildata($admn_no);
         $details['domain_name'] = $emaildata['domain_name'];
         $details['domain_password'] = $emaildata['password'];
         $details['course'] = $this->Phd_mis_reg->get_course_details($details['course_id']);
         $admn_no_lower = strtolower($admn_no);

      $this->load->helper(array('dompdf', 'file'));
      $path = '/disk2/virtualhost/admission/public_html/html/assets/admission/'.$admn_no_lower;
      $remote_path = '/var/www/html/assets/images/student/'.$admn_no_lower.'/';
      $sftpStream = fopen('ssh2.sftp://'.$sftp.$remote_path, 'r');
      if(!is_dir('ssh2.sftp://'.$sftp.$remote_path))
      {
        mkdir('ssh2.sftp://'.$sftp.$remote_path,0777,true);
      }

      //echo $path; exit;
		 // $html = $this->load->view('new_admission_common/print_new_common', $details, TRUE);
      $html = $this->load->view('admission/phdpt/mis_registration_print_final_pdf', $details, TRUE);
      $paper = '';
      $stream = FALSE;
      $output_mis_registration = pdf_create($html,'Mis_registration_form_'.$admn_no_lower,$paper,$stream);
      $local_path = '/disk2/virtualhost/admission/public_html/html/assets/admission/phdpt/'.$admn_no_lower.'/';
      if(!is_dir($local_path))
      {
      mkdir($local_path,0777,true);
      }
     $file_to_save_reg = '/disk2/virtualhost/admission/public_html/html/assets/admission/phdpt/'.$admn_no_lower.'/Mis_registration_form_'.$admn_no_lower.'.pdf';
     //echo $file_to_save_reg; exit;
     file_put_contents($file_to_save_reg,$output_mis_registration);
     $to_Remote_Path = $remote_path.'Mis_registration_form_'.$admn_no_lower;
     $file_send_mis = ssh2_scp_send($connection,$file_to_save_reg, $to_Remote_Path, 0777);
     if($file_send_mis===false){
        $upload_error['mis_reg_form_error'] = 'MIS Registration Form not uploaded mis '.$to_Remote_Path;
        $upload_array = array(
          'registration_no'=>$reg_id,
          'admn_no'=> $admn_no,
          'error_description' => $upload_error['mis_reg_form_error'],
          'server'=>'mis',
          'created_by' => $reg_id,
          'created_on' => date('d-m-Y H:i:s'));

        $this->Phd_mis_reg->insert_upload_error_logs($upload_array);
     }


     //echo 'reached here mis registration uploaded on mis'; exit;
     /* open send mail later */
     //$this->send_email($admn_no,$admn_type,$details['email'],$reg_id)
      if($this->send_email($admn_no,$admn_type,$details['email'],$reg_id))
      {
        $data_Phd_mis_reg =  array(
          'tab5' => '5',
          'created_by' => $reg_id,
          'updated_date_time' => date('d-m-Y H:i:s'),
          'tab_status' => '5',
          'remark_1' => 0,
          'remark_2' => 0
      );
       $tab_details_insert = $this->Phd_mis_reg->update_mis_reg_tab_status($data_Phd_mis_reg,$reg_id);
       if($tab_details_insert)
       return true;
      }
      else
      {
        return false;
      }

      /* open send mail later */
     // $data_receipt['receipt_path'] = 'assets/images/student/'.strtolower($receipt_payment['admn_no']).'/Receipt__'.$receipt_payment['order_no'].'.pdf';

     // $data_receipt['receipt_name_order_no'] = 'Receipt__'.$receipt_payment['order_no'].'.pdf';

        //$ff=$this->load->view('new_admission_common/print_new_common',$details,TRUE);
       // pdf_create($ff, 'Application_Form_' . $admn_no);
      }
      else
      {
        // $data['error']="You do not have access to that location.";
        // $this->load->view('new_admission_common/new_admission_login_mba',$data);
        $this->session->set_flashdata('flashError','You do not have access to that location 1');
        redirect('admission/phdpt/Adm_phdpt_application_preview');

      }
    }
    else
    {
      // $data['error']="You do not have access to that location.";
      // $this->load->view('new_admission_common/new_admission_login_mba',$data);
      $this->session->set_flashdata('flashError','You do not have access to that location 2');
      redirect('admission/phdpt/Adm_phdpt_mis_registration_other_details/mis_reg_stu_other_details_preview');
    }
    }

    function send_email($admn_no,$admn_type,$email,$reg_id)
    {

      // echo 'reached email';
      // echo $admn_no;
      // echo $admn_type;;
      // echo $email;
      // exit;

      // Load PHPMailer library
      $this->load->library('PHPMailer_Lib');

      //$email = 'ajanta.au@iitism.ac.in'; // comment this part later

      // PHPMailer object
      $mail = $this->phpmailer_lib->load();

      // SMTP configuration
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'noreply@iitism.ac.in'; // Gmail address which you want to use as SMTP server
      $mail->Password = 'iitISM@826'; // Gmail address Password
      $mail->SMTPSecure = 'ssl';
     // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = '465';
      //$email = 'ajanta.au@iitism.ac.in';
      $mail->setFrom('noreply@iitism.ac.in'); // Gmail address which you used as SMTP server
      $mail->addAddress($email); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

      // Add a recipient
      //$mail->addAddress('rajesh@iitism.ac.in');

      //$file_path = FCPATH.'assets/images/student/21mb0001/Receipt__IITISMMB05052021173618ab5F.pdf';
      //$file_path = FCPATH.'assets/images/student/'.strtolower($admn_no).'/Application_Form_'.strtolower($admn_no).'.pdf';
      $file_path = '/disk2/virtualhost/admission/public_html/html/assets/admission/phdpt/'.strtolower($admn_no).'/Mis_registration_form_'.strtolower($admn_no).'.pdf';
      $mail->addAttachment($file_path);

      // Email subject
      $mail->Subject = 'Registration Final Application Form';

      // Set email format to HTML
      $mail->isHTML(true);

      //echo "<pre>"; print_r($file_path); exit;

      // Email body content
      $mailContent = "<h1>Registration Form</h1>
          <p></p>";
      $mail->Body = $mailContent;

      //echo 'reached email section'; exit;

      try {
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }

  }

    function getFromTables($admn_no,$admn_type)
   {
         //$this->load->model('new_admission_common/new_admission_common_model_new','',TRUE);
         $user_tables=$this->Phd_mis_reg->get_user_tables($admn_no);
        //  echo '<pre>';
        //  print_r($user_tables);
        //  echo '</pre>';
         $stu_tables=$this->Phd_mis_reg->get_stu_tables($admn_no);
        //  echo '<pre>';
        //  print_r($stu_tables);
        //  echo '</pre>';
         $reg_tables=$this->Phd_mis_reg->get_reg_tables($admn_no,$admn_type);// for getting course and branch and department
        //  echo '<pre>';
        //  print_r($reg_tables);
        //  echo '</pre>';
         $hs_info=$this->Phd_mis_reg->get_hs_info($admn_no); // hostel info details from hs_info for hostel pdf page
        //  echo '<pre>';
        //  print_r($hs_info);
        //  echo '</pre>';
         $education_details = $this->Phd_mis_reg->get_prev_edu_and_cert($admn_no);
        //  echo '<pre>';
        //  print_r($education_details);
        //  echo '</pre>';
         $details=array_merge($user_tables,$stu_tables);
         $details=array_merge($reg_tables,$details);
         $details=array_merge($hs_info,$details);
         $details['stu_prev_education']=$education_details['stu_prev_education'];
         $details['stu_prev_certificate']=$education_details['stu_prev_certificate'];

         return $details;
   }

    public function uploadDB($login_id)
  {
    // echo '<pre>';
    // print_r($login_id);
    // echo '</pre>';
    // exit;
    $admn_type = $login_id['get_education_details'][0]['admn_type'];

    // use for admn_no in lower case for access img files in mis as per anuj sir requirement
    $admn_no_path = strtolower($login_id['admn_no']);

       //echo print_r($login_id);
        // login_id contains the stu_temp_db_jee row of particular reg_id
       // interacted with course_code table to get dept_id, course_id, branch_id
      $fee_date=date('Y-m-d H:i:s');//dd/mm/yyyy to YYYY-MM-DD
      //echo $fee_date;
      $fee_date = date_format(date_create_from_format('d/m/Y',($fee_date)), 'Y-m-d');

      //echo $fee_date; exit;

     $floor=$login_id['floor']; //floor0
     $block_name=$login_id['block_name'];//A
     $room_name=$login_id['room_name'];//R001
     $hostel_name=$login_id['hostel_name'];
     $room_detail_id=$login_id['room_detail_id'];
     //$room_number= substr(strrchr($room_number,"R"),1);;//001

     if($admn_type=='jee')
     {
     $stu_type='ug';
     if($login_id['is_prep']=='yes')
     $stu_type='prep';
     }
     else if($admn_type=='jrf')
     {
     $stu_type='jrf';
     }
     else
     {
      $stu_type='pg';
     }

    $reg_id=$login_id['reg_id'];
    //$date=date("Y-m-d H:i:s",time());
    $pass_date=date("Y-m-d H:i:s");
    $reg_pass=$this->authorization->strclean($reg_id);
    //$reg_pass=$reg_id;
    $encode_pass=$this->authorization->encode_password($reg_pass,$pass_date);
    //$encode_pass=base64_encode($reg_pass,$pass_date);

    $users = array(                 // information to be stored in user table  //1
        'id' => $login_id['admn_no'] ,
        'password' => $encode_pass ,
        'auth_id' => 'stu' ,
        'created_date' => $pass_date,
        'status' => 'I',
        'remark'=>''
      );

    if($admn_type=='jee')
    {
    $dept_id=$login_id['department_id'];
    }
    else
    {
      $dept_id=$login_id['dept_id'];
    }


    $user_address = array(                 // information to be stored in user_address table //2
          array(
            'id' => $login_id['admn_no'],
            'line1' => $login_id['get_personal_details'][0]['permanent_address'] ,
            'line2' => $login_id['get_personal_details'][0]['street_locality'] ,
            'city' =>  $login_id['get_personal_details'][0]['city'] ,
            'state' => $login_id['get_personal_details'][0]['state'] ,
            'pincode' => intval($login_id['get_personal_details'][0]['pincode']) ,//BIGINT(20)
            'country' => $login_id['get_personal_details'][0]['country'] ,
            'contact_no' => $login_id['contact_no'] ,//BIGINT(20)
            'type' => 'permanent'
          ),
          // hostel_detail_id and room_no using room_detail_id from hs_room_details
          array(      // block_name and hostel_name using hostel_detail_id  from hs_hostel_details
            'id' => $login_id['admn_no'] ,
            'line1' => 'Floor-'.$login_id['floor'].', Block-'.$login_id['block_name'].', Room No.-'.$login_id['room_name'] ,// room no with block
            'line2' => $login_id['hostel_name'] ,// hostel name
            'city' => 'dhanbad' ,// dhanbad
            'state' => 'jharkhand' ,// jharkhand
            'pincode' => 826004 ,//826004//BIGINT(20)
            'country' => 'india' ,//india
            'contact_no' => 0,//...........(BIGINT(20))
            'type' => 'present'
          )
        );

        $photo_ck = $login_id['get_personal_details'][0]['photo_path'];

        $photo_array = explode("/",$photo_ck);
        $photo_name = end($photo_array);
        $photo_name_final = basename($photo_name); // file name in admission server folder

        $photo_file_ext = pathinfo($photo_name_final, PATHINFO_EXTENSION);

        $admn_no_lower = strtolower($login_id['admn_no']);

        $photo_name_send = 'stu_'.$admn_no_lower.'_photo'.'.'.strtolower($photo_file_ext); // rename filename for mis


    $user_details = array(       // information to be stored in user_details table // 3
        'id' => $login_id['admn_no'] ,
        'salutation' => $login_id['salutation'] ,
        'first_name' => $login_id['first_name'] ,
        'middle_name' => $login_id['middle_name'] ,
        'last_name' => $login_id['last_name'] ,
        'sex' => $login_id['sex'],// m,f or o
        'category' => $login_id['category'] ,
        'allocated_category'=>$login_id['allocated_category'],
        'dob' => $login_id['dob'] ,//already done in CSV() converted string to date) date('Y-m-d', strtotime($login_id['dob']))
        'email' => $login_id['email'] ,
        'photopath' => 'student/'.$admn_no_lower.'/'.$photo_name_send ,//assets/images/student/19je0001/stu_photo_19je00012015.....jpg
        'marital_status' => $login_id['get_personal_details'][0]['martial_status'],
        'physically_challenged' => $login_id['pd_status'],
        'dept_id' => strtolower($dept_id)
      );

    $user_other_details = array(        // information to be stored in user_other_details table  //4
        'id' => $login_id['admn_no'],
        'religion' => strtolower($login_id['get_personal_details'][0]['religion']),
        'nationality' => $login_id['get_personal_details'][0]['nationality'] ,
        'kashmiri_immigrant' => $login_id['get_personal_details'][0]['kashmiri_immigrant'] ,
        'hobbies' => substr($login_id['get_personal_details'][0]['hobbies'],0,100) ,
        'fav_past_time' => substr($login_id['get_personal_details'][0]['fav_past_time'],0,200) ,
        'birth_place' => substr($login_id['get_personal_details'][0]['birth_place'],0,95) ,
        'mobile_no' => $login_id['contact_no'] ,//BIGINT(20) intval($login_id['contact_no'])
        'father_name' => substr($login_id['get_parent_details'][0]['father_name'],0,145) ,
        'mother_name' => substr($login_id['get_parent_details'][0]['mother_name'],0,145)
      );

      # xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx Add user account login_id xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
        if($admn_type!='jee') {
            $user_other_details['bank_name'] = $login_id['get_student_account_details'][0]['bank_name'];
            $user_other_details['bank_accno'] = $login_id['get_student_account_details'][0]['account_no'];
            $user_other_details['ifsc_code'] = $login_id['get_student_account_details'][0]['ifsc_code'];
        }

      # echo "<pre>"; print_r($user_other_details); exit;
      # xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx Add user account login_id xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

      if($stu_type == 'prep')
        $semester= -1;
      else
        $semester = 1;

      //$login_id['branch_id'] = $this->Phd_mis_reg->get_branch_id_by_name($login_id['branch_id']);

      $stu_academic = array(              // information to be stored in stu_academic table //5
        'admn_no' => $login_id['admn_no'] ,
        'auth_id' => $stu_type ,
        'enrollment_year' => '2022' ,
        'admn_based_on' => strtolower($login_id['get_education_details'][0]['admn_based_on']) ,
        'iit_jee_rank' => substr($login_id['iit_jee_rank'],0,9) ,
        'iit_jee_cat_rank' => substr($login_id['iit_jee_cat_rank'],0,9) ,
        'cat_score' => $login_id['cat_score'] ,
        'gate_score' => $login_id['get_education_details'][0]['gate_score'] ,
        'course_id' => strtolower($login_id['course_id']) ,
        'branch_id' => strtolower($login_id['branch_id']) ,
        'semester' => $semester,
        'other_rank' => $login_id['get_education_details'][0]['other_rank'] ,
        'grading_type' => 'R'
      );


      $stu_admn_fee = array(       // information to be stored in stu_admn_fee table  //6
        'admn_no' => $login_id['admn_no'] ,
        'fee_mode' => 'NA' ,// online, none, dd, cash
        'fee_amount' => intval('0.00') ,//int(11)
        'fee_in_favour' => 'indian school of mines' ,
        'payment_made_on' => date('Y-m-d H:i:s') ,////////date YYYY-MM-DD
        'transaction_id' => 'FOREIGNOFCIRAA'
      );
            $migration_cert=$login_id['get_personal_details'][0]['migration_certificate'];
            if(strstr(strtolower($migration_cert),"na"))
            {
              $migration_cert='';
            }
        if($admn_type=='jee')
        {
          $enrollment_no=$login_id['reg_id'];//JEE2019 ITS JEE MAIN ROLL No.
        }
        else
        {
          $enrollment_no=$login_id['auth1'];
        }
      $stu_details = array(            // information to be stored in stu_details table  //7
        'admn_no' => $login_id['admn_no'],
        'admn_date' => date('Y-m-d'),
        'enrollment_no' => substr($enrollment_no,0,12) ,// auth1
        'stu_type' => $stu_type ,
        'identification_mark' => substr($login_id['get_personal_details'][0]['identification_mark'],0,48) ,
        'parent_mobile_no' => intval($login_id['get_parent_details'][0]['parent_mobile_no']) ,// BIGINT(20)
        'parent_landline_no'=>0,
        'parent_email_id' => substr($login_id['get_parent_details'][0]['parent_email_id'],0,48),
        'alternate_mobile_no' => intval($login_id['get_parent_details'][0]['alternate_mobile_no']) ,// BIGINT(20)
        'alternate_email_id' => substr($login_id['get_parent_details'][0]['alternate_email_id'],0,38) ,
        'migration_cert' => $migration_cert ,// 12th migration certificate No.
        'name_in_hindi' => substr($login_id['get_personal_details'][0]['name_in_hindi'],0,98),
        'blood_group' => $login_id['get_personal_details'][0]['blood_group']
      );

 $bank_name=$login_id['get_personal_details'][0]['parent_bank_name'].', IFSC- '.$login_id['get_personal_details'][0]['parent_bank_ifsc_code'];
      $stu_other_details = array(        // information to be stored in stu_other_details table //8
        'admn_no' => $login_id['admn_no'] ,
        'fathers_occupation' => substr($login_id['get_parent_details'][0]['father_occupation'],0,95) ,
        'mothers_occupation' => substr($login_id['get_parent_details'][0]['mother_occupation'],0,95) ,
        'fathers_annual_income' => intval($login_id['get_parent_details'][0]['father_income']) ,//INT(11)
        'mothers_annual_income' => intval($login_id['get_parent_details'][0]['mother_income']) ,//INT(11)
        'guardian_name' => substr($login_id['get_parent_details'][0]['guardian_name'],0,45) ,
        'guardian_relation' => substr($login_id['get_parent_details'][0]['guardian_relation'],0,18) ,
        'bank_name' =>  substr($login_id['get_personal_details'][0]['parent_bank_name'],0,95),
        'account_no' => substr($login_id['get_personal_details'][0]['parent_account_number'],0,95) ,
        'ifsc' => substr($login_id['get_personal_details'][0]['parent_bank_ifsc_code'],0,95) ,
        'aadhaar_card_no' => substr($login_id['get_personal_details'][0]['stu_aadhar_no'],0,15) ,
        'passport_no' => substr($login_id['get_personal_details'][0]['stu_passport_no'],0,15) ,
        'extra_curricular_activity' => substr($login_id['get_personal_details'][0]['extra_curriculam_activities'],0,250) ,
        'other_relevant_info' => substr($login_id['get_personal_details'][0]['other_relevant_info'],0,250)
      );

      // hostel info for hostel pdf - table hs_info
      $hs_info = array(        // information to be stored in stu_other_details table //8
        'admn_no' => $login_id['admn_no'] ,
        'food_habit' => substr($login_id['get_hostel_details'][0]['food_habit'],0,95) ,
        'laptop_make' => substr($login_id['get_hostel_details'][0]['laptop_details'],0,250) ,
        'laptop_model' => substr($login_id['get_hostel_details'][0]['model_no'],0,95) ,//INT(11)
        'laptop_sl_no' => substr($login_id['get_hostel_details'][0]['serial_no'],0,95)
      );
      // end hostel info for hostel pdf - table hs_info

      //stu_prev_education  //9


          foreach($login_id['get_prev_education_details'] as $key => $prev_edu_details)
          {
            $stu_prev_education_details[$key]['admn_no'] = $prev_edu_details['admn_no'];
            $stu_prev_education_details[$key]['sno'] = $prev_edu_details['sno'];
            $stu_prev_education_details[$key]['exam'] = substr($prev_edu_details['exam'],0,95);
            # xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx add columns for stu_prev_education xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
            $stu_prev_education_details[$key]['exam_type'] = substr($prev_edu_details['specialization'],0,95);
            $stu_prev_education_details[$key]['verification_status'] = $prev_edu_details['verification_status'];
            $stu_prev_education_details[$key]['updated_by'] = $prev_edu_details['admn_no'];
            # xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx add columns for stu_prev_education xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
            $stu_prev_education_details[$key]['specialization'] = substr($prev_edu_details['specialization'],0,95);
            $stu_prev_education_details[$key]['institute'] = substr($prev_edu_details['institute'],0,195);/////
            $stu_prev_education_details[$key]['year'] = intval($prev_edu_details['year']);
            $stu_prev_education_details[$key]['grade'] = substr($prev_edu_details['grade'],0,45);
            $stu_prev_education_details[$key]['division'] = substr($prev_edu_details['division'],0,10);
        }

        // echo '<pre>';
        // print_r($stu_prev_education_details);
        // echo '</pre>';
        //exit;


     // $this->load->model('new_admission_common/Phd_mis_reg','',TRUE);
     // $this->Phd_mis_reg->insertbatch_stu_prev_education($stu_prev_education_details_final);
      # echo "<pre>"; print_r($stu_prev_education_details_final); exit;

/*    //
        if($admn_type!='jee')
        {
        $i++;

        $stu_prev_education_details[$i]['admn_no'] = $login_id['admn_no'];
        $stu_prev_education_details[$i]['sno'] = $i+1;
        $stu_prev_education_details[$i]['exam'] = substr($login_id['exam2'],0,95);
        $stu_prev_education_details[$i]['specialization'] = substr($login_id['specialization2'],0,95);
        $stu_prev_education_details[$i]['institute'] = substr($login_id['institute2'],0,195);/////
        $stu_prev_education_details[$i]['year'] = intval($login_id['year2']);
        $stu_prev_education_details[$i]['grade'] = substr($login_id['grade2'],0,45);
        $stu_prev_education_details[$i]['division'] = substr($login_id['division2'],0,5);

        }


// for mba it is not compulsory field
  if($admn_type=='jrf' || $admn_type=='jrf')
  {
      $i++;
        $stu_prev_education_details[$i]['admn_no'] = $login_id['admn_no'];
        $stu_prev_education_details[$i]['sno'] = $i+1;
        $stu_prev_education_details[$i]['exam'] = substr($login_id['exam3'],0,95);
        $stu_prev_education_details[$i]['specialization'] = substr($login_id['specialization3'],0,95);
        $stu_prev_education_details[$i]['institute'] = substr($login_id['institute3'],0,195);/////
        $stu_prev_education_details[$i]['year'] = intval($login_id['year3']);
        $stu_prev_education_details[$i]['grade'] = substr($login_id['grade3'],0,45);
        $stu_prev_education_details[$i]['division'] = substr($login_id['division3'],0,5);
}
      // 10 stu_prev_certificates
*/
        $sign_ck = $login_id['get_personal_details'][0]['signature_path'];
        $sign_array = explode("/",$sign_ck);
        $sign_name = end($sign_array);
        $sign_name_final = basename($sign_name); // file name in admission server folder
        $sign_file_ext = pathinfo($sign_name_final, PATHINFO_EXTENSION);
        $sign_name = 'stu_'.$admn_no_lower.'_sign'.'.'.strtolower($sign_file_ext); // rename filename for mis


      // echo '<pre>';
      // print($login_id['get_prev_certificate_details']);
      // echo '</pre>';


        foreach($login_id['get_prev_certificate_details'] as $key => $prev_certificate_details)
        {
        $stu_prev_certificates_dynamic[$key]['admn_no'] = $prev_certificate_details['admn_no'];
        $stu_prev_certificates_dynamic[$key]['sno'] = $prev_certificate_details['sno'];
        $stu_prev_certificates_dynamic[$key]['marks_sheet'] = 'student/'.$admn_no_path.'/'.end(explode('/',$prev_certificate_details['marks_sheet']));
        $stu_prev_certificates_dynamic[$key]['certificate'] = 'student/'.$admn_no_path.'/'.end(explode('/',$prev_certificate_details['certificate']));
        $stu_prev_certificates_dynamic[$key]['specialization'] =substr($prev_certificate_details['specialization'],0,95);
        $stu_prev_certificates_dynamic[$key]['signpath'] = 'student/'.$admn_no_path.'/'.$sign_name;
        $stu_prev_certificates_dynamic[$key]['sub'] = substr($prev_certificate_details['sub'],0,95);
        $stu_prev_certificates_dynamic[$key]['jam_reg_id'] = $prev_certificate_details['jam_reg_id'];
        $stu_prev_certificates_dynamic[$key]['jee_adv_rollno'] = 0;
        }
        //$stu_prev_certificates_final = array_merge($stu_prev_certificates, $stu_prev_certificates_dynamic);

      // dynamic certificate mergr


      // echo '<pre>';
      // print_r($stu_prev_certificates_dynamic);
      // echo '</pre>';



/*
      // graduation certificates
      if($admn_type!='jee')
      {
        $i++;
        $stu_prev_certificates[$i]['admn_no'] = $login_id['admn_no'];
        $stu_prev_certificates[$i]['sno'] = $i+1;
        $stu_prev_certificates[$i]['marks_sheet'] = 'student/'.$login_id['admn_no'].'/'.$login_id['marksheet2'];
        $stu_prev_certificates[$i]['certificate'] = 'student/'.$login_id['admn_no'].'/'.$login_id['certificate2'];
        $stu_prev_certificates[$i]['specialization'] =substr($login_id['specialization2'],0,95);
        $stu_prev_certificates[$i]['signpath'] = 'student/'.$login_id['admn_no'].'/'.$login_id['sign'];
        $stu_prev_certificates[$i]['sub'] = substr($login_id['sub2'],0,95);
        $stu_prev_certificates[$i]['jam_reg_id'] = $login_id['reg_id'];
        $stu_prev_certificates[$i]['jee_adv_rollno'] = 0;
      }

          // post graduation prev_certificates
        if($admn_type=='jrf' || $admn_type=='jrf')
        {

        $i++;
        if(isset($login_id['marksheet3']))
        {
          $marksheet=$login_id['marksheet3'];
        }
      else{

        $marksheet='';
      }

      if(isset($login_id['certificate3']))
      {
        $certificate=$login_id['certificate3'];
      }
      else{
        $certificate='';
      }

        $stu_prev_certificates[$i]['admn_no'] = $login_id['admn_no'];
        $stu_prev_certificates[$i]['sno'] = $i+1;
        $stu_prev_certificates[$i]['marks_sheet'] = 'student/'.$login_id['admn_no'].'/'.$marksheet;
        $stu_prev_certificates[$i]['certificate'] = 'student/'.$login_id['admn_no'].'/'.$certificate;
        $stu_prev_certificates[$i]['specialization'] =substr($login_id['specialization3'],0,95);
        $stu_prev_certificates[$i]['signpath'] = 'student/'.$login_id['admn_no'].'/'.$login_id['sign'];//
        $stu_prev_certificates[$i]['sub'] = substr($login_id['sub3'],0,95);
        $stu_prev_certificates[$i]['jam_reg_id'] = $login_id['reg_id'];
         $stu_prev_certificates[$i]['jee_adv_rollno'] = 0;
      }

      */


      $year1='2022';

      if($admn_type!='jrf')
      {
      $year1=intval($year1);
      $query=$this->Phd_mis_reg->get_passout_year($login_id['course_id']);
      $a=intval($query['duration']);

      $passout_year=$year1+$a;
    }
    else{
      $passout_year=$year1+5;
    }
      $stu_enroll_passout = array(            // information to be stored in stu_enroll_table table  //
        'admn_no' => $login_id['admn_no'],
        'enrollment_year' => $year1,
        'passout_year' => $passout_year
      );

      // Email Registration || IITISM Email
      //$domain_name = $login_id['iitism_email'].'.'.$login_id['admn_no'].'@'.$login_id['dept_id'].'.iitism.ac.in';
      //$domain_name = $login_id['admn_no'].'@'.$login_id['dept_id'].'.iitism.ac.in'; // stop on 20-10-21
      $domain_name = $login_id['admn_no'].'@iitism.ac.in'; // i.e : 21JE0001@iitism.ac.in start from JEE 2021
      if($login_id['last_name']=='')
      {
        $lastname = '.';
      }
      else
      {
        $lastname = $login_id['last_name'];
      }
      $email_form = array(
        'first_name' => $login_id['first_name'] ,
        'last_name' => $lastname ,
        'email' => $domain_name ,
        'password' => $login_id['iitism_password']
      );

      $emaildata = array(
        'domain_name' => $domain_name ,
        'password' => $login_id['iitism_password'] ,
        'admission_no' => $login_id['admn_no'] ,
        'first_name' => $login_id['first_name'] ,
        'middle_name' => $login_id['middle_name'] ,
        'last_name'=> $login_id['last_name'],
        'present_email'=> $login_id['get_parent_details'][0]['parent_email_id'],
        'department'=> $login_id['get_education_details'][0]['department'],
        'year_of_admission'=> $year1,
        'year_of_passing'=> $passout_year,
        'phn_no'=> $login_id['contact_no'],
        'course'=> $login_id['course_id'],
        'branch'=> $login_id['get_education_details'][0]['branch']
      );

      #xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
      if($admn_type=='jee')
      {
        $stu_section_data = array(         // this table is used for group and section data store in database 23-11-2021
          'admn_no' => $login_id['admn_no'],
          'section' => $login_id['section'],
          'session_year' => '2021-2022'
        );
      }
      #xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

      #xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx for web_people , people table xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
      $web_people = array(
        'id' => $login_id['admn_no'],
        'name_in_eng' => $login_id['get_personal_details'][0]['name'],
        'name_in_hindi' => $login_id['get_personal_details'][0]['name_in_hindi'],
        'designation_code' => 'NA',
        'department_code' => $login_id['dept_id'],
        'joining_date' => date('Y-m-d'),
        //'ret_date' => date('Y-m-d'),
        'email' => $domain_name,
        'mobile_no' => $login_id['contact_no'],
        'office_no' => '0',
        'uploaded_on' => date("Y-m-d H:i:s"),
        'PROFILE' => 'student',
        'status' => 'inactive',
        'type' => ($login_id['get_education_details'][0]['admn_type']=='jee') ? 'ug' : 'pg',
        'blood_group' => $login_id['get_personal_details'][0]['blood_group'],
        'gender' => $login_id['sex'],
        'hometown' => $login_id['get_personal_details'][0]['city'],
        'photo_path' => $admn_no_lower.'/'.$photo_name_send, // store mis photo path
        'remark1' => 'PHDPT MONSOON ADMISSION',
        'remark2' => $login_id['course_id']
      );

      $people = array(
        'id' => $login_id['admn_no'],
        'name_in_eng' => $login_id['get_personal_details'][0]['name'],
        'name_in_hindi' => $login_id['get_personal_details'][0]['name_in_hindi'],
        'designation_code' => 'NA',
        'department_code' => $login_id['dept_id'],
        'joining_date' => date('Y-m-d'),
        //'ret_date' => date('Y-m-d'),
        'email' => $domain_name,
        'mobile_no' => $login_id['contact_no'],
        'office_no' => '0',
        'uploaded_on' => date("Y-m-d H:i:s"),
        'PROFILE' => 'student',
        'status' => 'inactive',
        'type' => ($login_id['get_education_details'][0]['admn_type']=='jee') ? 'ug' : 'pg',
        'blood_group' => $login_id['get_personal_details'][0]['blood_group'],
        'gender' => $login_id['sex'],
        'hometown' => $login_id['get_personal_details'][0]['city'],
        'photo_path' => 'student/'.$admn_no_lower.'/'.$photo_name_send, // store people photo path
        'remark1' => 'PHDPT MONSOON ADMISSION',
        'remark2' => $login_id['course_id']
      );
      #xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx for web_people , people table xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

      # echo "<pre>"; print_r($web_people); exit;

      // End Email Registration

      //exit;

     $this->db->trans_start();  // start the transaction

      $this->Phd_mis_reg->insert_users($users);///1
      $this->Phd_mis_reg->insert_user_details($user_details);//2
      $this->Phd_mis_reg->insert_user_other_details($user_other_details);//3
      $this->Phd_mis_reg->insertbatch_user_address($user_address);// insert_batch 4
      $this->Phd_mis_reg->insert_stu_academic($stu_academic);// 5
      $this->Phd_mis_reg->insert_stu_details($stu_details);// 6
      $this->Phd_mis_reg->insert_stu_other_details($stu_other_details);// 7
      $this->Phd_mis_reg->insert_stu_admn_fee($stu_admn_fee);// 8
      #xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
      if($admn_type=='jee')
      {
         $this->Phd_mis_reg->insert_stu_section_data($stu_section_data); // 9  only for JEE data
      }
      #xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
      if($admn_type!='jee')
      {
        $this->Phd_mis_reg->insertbatch_stu_prev_education($stu_prev_education_details);// 10 insert_batch
        $this->Phd_mis_reg->insertbatch_stu_prev_certificate($stu_prev_certificates_dynamic);// 11
      }
      else
      {
        $this->Phd_mis_reg->insertbatch_stu_prev_education($stu_prev_education_details);// 10 insert_batch
        $this->Phd_mis_reg->insertbatch_stu_prev_certificate($stu_prev_certificates_dynamic);// 11
      }
      $this->Phd_mis_reg->insert_stu_enroll_passout($stu_enroll_passout);// 12

      $this->Phd_mis_reg->insert_email_form($email_form); // 13 Insert IITISM Email
      $this->Phd_mis_reg->insert_emaildata($emaildata); // 14 Insert IITISM Email

      $this->Phd_mis_reg->insert_web_people($web_people); // 15 Insert web_people

      if($login_id['is_prep']=='yes') {
        $this->Phd_mis_reg->insertPreparatory($login_id['admn_no']);// 16
      }
      //$this->Phd_mis_reg->insertPreparatory2($login_id['admn_no']);// 12 misdev data insert


         $session_yr = '2022'."-".date('2023', strtotime('+1 year'));
         $timestamp = date('Y-m-d H:i:s');

    if($admn_type=='jee')
    {
    if($stu_type == 'prep')
    $q='cbcs_prep_prep';
    else{
    $q='cbcs_comm_comm';
    }
    $year='2022';
    $yr1=$year+1;
    $aggr_id=$q.'_'.$year.'_'.$yr1;
    //$aggr_id=$this->Phd_mis_reg->get_latest_aggr_id($q);// Latest Course Must be added in course_structure
  }
  else
  {
   // $q=$login_id['course_id'].'_'.$login_id['branch_id'];
    //$aggr_id=$this->Phd_mis_reg->get_latest_aggr_id($q);
    $year='2022';
    $yr1=$year+1;
    $aggr_id='cbcs_'.$login_id['course_id'].'_'.$login_id['branch_id'].'_'.$year.'_'.$yr1;
  }

  /*
  else if($admn_type=='jrf')//department_id='ms'
  {
    $q=$login_id['course_id'].'_'.$login_id['branch_id'];
    $aggr_id=$this->db_upload_model->get_latest_aggr_id($q);
  }
  else if($admn_type=='msc')
  {
  $q=$login_id['course_id'].'_'.$login_id['branch_id'];
    $aggr_id=$this->db_upload_model->get_latest_aggr_id($q);
  }
  else if($admn_type=='msctech')
  {
    $q=$login_id['course_id'].'_'.$login_id['branch_id'];
    $aggr_id=$this->db_upload_model->get_latest_aggr_id($q);
  }
  else if($admn_type=='jrf')
  {
$q=$login_id['course_id'].'_'.$login_id['branch_id'];
    $aggr_id=$this->db_upload_model->get_latest_aggr_id($q);
  }
  else if($admn_type=='mtech_3yr')
  {
    $q=$login_id['course_id'].'_'.$login_id['branch_id'];
    $aggr_id=$this->db_upload_model->get_latest_aggr_id($q);
  }
  else if($admn_type=='jrf')
  {
// not required as reg_regular_form and feedback table is not filled
  }
  */


    // $receipt_path = $login_id['get_fee_details'][0]['receipt_path'];
    // $receipt_array = explode("/",$receipt_path);
    // $receipt_name = end($receipt_array);

    // $receipt_name_final = basename($receipt_name); // file name in admission server folder
    // $receipt_file_ext = pathinfo($receipt_name_final, PATHINFO_EXTENSION);
    // $receipt_name = 'stu_'.$admn_no_lower.'_receipt'.'.'.strtolower($receipt_file_ext); // rename filename for mis


    $reg_regular_fee =array(          // form_id is ignored as it is AUTO_INCREMENT        ///////////// reg_regular_fee  11
      'admn_no' => $login_id['admn_no'],
      'fee_amt' => intval('0.00'),
      'fee_date' => date('Y-m-d H:i:s'),
      'transaction_id' => 'FOREIGNOFCIRAA',
      'receipt_path' => 'NA'//assets/
    );

    $reg_regular_form = array(        // form_id is ignored as it is AUTO_INCREMENT   //// information to be stored in reg_regular_form table  //
        'admn_no' => $login_id['admn_no'],
        'course_id' => $login_id['course_id'],
        'branch_id' => $login_id['branch_id'],
        'semester' => $semester,
        'section' => $login_id['group_id'], // add this column for group id ( 1 or 2)
        'session_year' => $session_yr,
        'session' => 'Monsoon',
        'course_aggr_id'=>$aggr_id,//
        'hod_status' => '1',//sir
        'hod_time' => $timestamp,//sir
        'acad_status' => '1',
        'acad_time' => $timestamp,
        'hod_remark'=>'',//sir
        'acad_remark' => '',//accepted
        'timestamp' =>$timestamp,
        'reg_type'=>'R'
              );



        #xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
        // if($admn_type=='jee')
        // {
        //   $stu_section_data = array(        // this table is used for group and section data store in database 23-11-2021
        //     'admn_no' => $login_id['admn_no'],
        //     'section' => $login_id['section'],
        //     'session_year' => '2021-2022'
        //   );
        // }
        #xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

        $reg_form = array(        // form_id is ignored as it is AUTO_INCREMENT   //// information to be stored in reg_form table  //
        'admn_no' => $login_id['admn_no'],
        'course_id' => $login_id['course_id'],
        'branch_id' => $login_id['branch_id'],
        'semester' => $semester,
        'session_year' => $session_yr,
        'session' => 'Monsoon',
        'subjects_status'=> 1,
        'hod_status' => '1',//sir
        'hod_time' => $timestamp,//sir
        'acad_status' => '1',
        'acad_time' => $timestamp,
        'hod_remark'=>'',//sir
        'acad_remark' => '',//accepted
        'timestamp' =>$timestamp,
        'reg_type'=>'R',
        'exam_type'=>'R'
              );

              $bank_fee_details = array(
                'student_name' => $login_id['get_personal_details'][0]['name'],
                'admn_no' => $login_id['admn_no'],
                'email_id' => $login_id['email'],
                'session_year' => $session_yr,
                'session' => 'Monsoon',
                'semester' => '1',
                'course_id' => $login_id['course_id'],
                'branch_id' => $login_id['branch_id'],
                'category' => $login_id['category'],
                'pwd_status' => $login_id['pd_status'],
                'amount' => intval('0.00'),
                'fine_amount' => '',
                'total_amount' => intval('0.00'),
                'verification_status' => '1',
                'payment_status' => '1',
                'payment_msg' => 'success',
                'payment_mode' => $login_id['fee_mode'],
                'payment_receipt' => 'NA',
                'bank_reference_no' => '',
                'order_number' => 'FOREIGNOFCIRAA'
              );

        $fb_student_feedback =array(//
                   'admn_no' => $login_id['admn_no'],
                   'course_id' => $login_id['course_id'],
                   'branch_id' => $login_id['branch_id']
        );
     $last_id = $this->Phd_mis_reg->insert_reg_regular_fee($reg_regular_fee);// 17
     $reg_regular_form['form_id'] = $last_id;
     $this->Phd_mis_reg->insert_reg_regular_form($reg_regular_form);// 18
     //$this->Phd_mis_reg->insert_reg_regular_fee2($reg_regular_fee);// misdev tables reg_regular_fee (db2)
     if($admn_type!='jrf')
     {
    // $this->Phd_mis_reg->insert_reg_form($reg_form);//
     $this->Phd_mis_reg->insert_fb_student_feedback($fb_student_feedback); // 19 information to be stored in feedback table//

      }
        // misdev tables insert
        // $reg_regular_fee_25_11_2019 =array(          // form_id is ignored as it is AUTO_INCREMENT        ///////////// reg_regular_fee  11
        //   'admn_no' => $login_id['admn_no'],
        //   'fee_amt' => intval($login_id['get_fee_details'][0]['fee_amount']),
        //   'fee_date' => $fee_date,
        //   'transaction_id' => $login_id['get_fee_details'][0]['transaction_id'],
        //   'receipt_path' => $receipt_name//assets/
        //   );
      // hs_assigned_student_room

      $hs_assigned_student_room= array( //15
               'admn_no' => $login_id['admn_no'],
               'room_detail_id' => $login_id['room_detail_id'],
               'entry_datetime' => $timestamp,
               'created_by' => $login_id['admn_no'],
               'created_date' => $timestamp,
               'status' => 'In',
               'type' => 'student',
               'modify_by' => '',
               'modify_date' => $timestamp,
               'is_deleted' => 0
      );


      $hs_student_allotment_list= array( //18
        'admn_no' => $login_id['admn_no'],
        'hostel_name' => $login_id['hostel_name'],
        'hostel_detail_id' => $login_id['room_detail_id'],
        'status' => 'Unavailable',
        'modify_date' => $timestamp
);

      $this->Phd_mis_reg->insert_hs_info($hs_info); // 20

      if($login_id['room_detail_id']!=0)
      $this->Phd_mis_reg->insert_hostel($hs_assigned_student_room); // 21
      $this->Phd_mis_reg->insert_hs_student_allotment_list($hs_student_allotment_list); // 22
      $this->Phd_mis_reg->insert_web_people_iitism_web($web_people); // uncommit most important
      //$this->Phd_mis_reg->insert_bank_fee_admission($bank_fee_details);

      //echo $this->db->last_query(); die();



     $this->db->trans_complete();

      if ($this->db->trans_status() === FALSE)
            {
                //echo 'not entered'; exit;
                // print_r($this->db->error());
                // exit;
                return FALSE;
            }
          else
          {

      //       echo 'entered'; exit;
            // xxxxxxxxxx after sucessfully data insert in newadmission then insert in other database xxxxxxxxxxx
            //echo 'reached here'; exit;
             $this->db->trans_start(); // start the transaction
             // insert other database tables
             $this->Phd_mis_reg->insert_users2($users);///1
             $this->Phd_mis_reg->insert_user_details2($user_details);//2
             $this->Phd_mis_reg->insert_user_other_details2($user_other_details);//3
             $this->Phd_mis_reg->insertbatch_user_address2($user_address);// insert_batch 4
             $this->Phd_mis_reg->insert_stu_academic2($stu_academic);// 5
             $this->Phd_mis_reg->insert_stu_details2($stu_details);// 6
             $this->Phd_mis_reg->insert_stu_other_details2($stu_other_details);// 7
             $this->Phd_mis_reg->insert_stu_admn_fee2($stu_admn_fee);// 8
             #xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
             if($admn_type=='jee')
             {
              $this->Phd_mis_reg->insert_stu_section_data2($stu_section_data); // 9  only for JEE data
             }
             #xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

             if($admn_type!='jee')
             {

               $this->Phd_mis_reg->insertbatch_stu_prev_education2($stu_prev_education_details);// 10 insert_batch
               $this->Phd_mis_reg->insertbatch_stu_prev_certificate2($stu_prev_certificates_dynamic);// 11
             }
             else
             {
               $this->Phd_mis_reg->insertbatch_stu_prev_education2($stu_prev_education_details);// 10 insert_batch
               $this->Phd_mis_reg->insertbatch_stu_prev_certificate2($stu_prev_certificates_dynamic);// 11
             }

             $this->Phd_mis_reg->insert_stu_enroll_passout2($stu_enroll_passout);// 12

             $this->Phd_mis_reg->insert_web_people2($web_people); // 13 Insert web_people mis

             //$this->Phd_mis_reg->insert_web_people_iitism_web($web_people); // Insert in people in iitism website

             $last_id = $this->Phd_mis_reg->insert_reg_regular_fee2($reg_regular_fee); // 14 misdev tables reg_regular_fee (db2)
             $reg_regular_form['form_id'] = $last_id;
             $this->Phd_mis_reg->insert_reg_regular_form2($reg_regular_form); // 15
             if($admn_type!='jrf')
             {
             // $this->Phd_mis_reg->insert_reg_form2($reg_form);//
             $this->Phd_mis_reg->insert_fb_student_feedback2($fb_student_feedback); // 16
             }
             $this->Phd_mis_reg->insert_hostel2($hs_assigned_student_room);
             $this->Phd_mis_reg->insert_hs_student_allotment_list2($hs_student_allotment_list); // 17

            $this->Phd_mis_reg->insert_email_form2($email_form); // 18 Insert IITISM Email
            $pk_id_emaildata = $this->Phd_mis_reg->get_pk_id_add_1_emaildata2();
            $emaildata['pk'] = $pk_id_emaildata['pk'];
            $this->Phd_mis_reg->insert_emaildata2($emaildata); // 19 Insert IITISM Email

            $this->Phd_mis_reg->insert_hs_info2($hs_info);// 20 Insert hs_info in mis

             if($login_id['is_prep']=='yes') {
              $this->Phd_mis_reg->insertPreparatory2($login_id['admn_no']); // 21
             }

             //$this->Phd_mis_reg->insert_bank_fee_mis($bank_fee_details);
             //$this->Phd_mis_reg->insert_bank_fee_parent($bank_fee_details);

             // end insert other dtabase tables
            $this->db->trans_complete();  // transaction completes

            //exit;


             if ($this->db->trans_status() === FALSE)
             {
                //echo 'entered false'; exit;
                return FALSE;
             }
             else
             {
               // update form status
               //echo 'entered true';exit;
               return TRUE;
             }

            }

             // xxxxxxxxxxx insert db in mis database xxxxxxxxxxxxxxxx

            //return TRUE;
}

  public function our_upload($admn_no,$admn_type,$login_id)
  {

        $connection = ssh2_connect('103.15.228.70',22);
        $con= ssh2_auth_password($connection,'filesync','F!l3sync#@$%007');
        $sftp = ssh2_sftp($connection);
        //echo $connection;

        $connection_parent = ssh2_connect('103.93.250.28',22);
        $con_parent= ssh2_auth_password($connection_parent,'root','I$MRoot@43210');
        $sftp_parent = ssh2_sftp($connection_parent);
        //echo $connection_parent;

        $connection_cdc = ssh2_connect('10.0.0.5',22);
        $con_cdc = ssh2_auth_password($connection_cdc,'cdc','I$M%Cdc@Dh@nb@D22');
        $sftp_cdc = ssh2_sftp($connection_cdc);
        //echo $connection_cdc;

        $connection_people = ssh2_connect('103.93.250.25',22);
        $con_people = ssh2_auth_password($connection_people,'download','Down!o@d#@1926'); // download -> user ~ Down!o@d#@1926
        $sftp_people = ssh2_sftp($connection_people);

    $registration_id = $login_id['reg_id'];
    $photo_ck = $login_id['get_personal_details'][0]['photo_path']; // photo
    $sign_ck = $login_id['get_personal_details'][0]['signature_path']; // sign
    // $marksheet0_ck = $login_id['get_prev_certificate_details'][0]['marks_sheet']; // 10th
    // $certificate0_ck = $login_id['get_prev_certificate_details'][0]['certificate']; // 10th
    // $marksheet1_ck = $login_id['get_prev_certificate_details'][1]['marks_sheet']; // 12th
    // $certificate1_ck = $login_id['get_prev_certificate_details'][1]['certificate']; // 12th
    // $marksheet2_ck = $login_id['get_prev_certificate_details'][2]['marks_sheet']; // 12th
    // $certificate2_ck = $login_id['get_prev_certificate_details'][2]['certificate']; // 12th
    $marksheet_ck = $this->input->post('verified_marksheet'); // ug array marksheet
    $certificate_ck = $this->input->post('verified_certificate'); // ug array certificate
    // $receipt_path = $login_id['get_fee_details'][0]['receipt_path'];
    $upload_error = array();
    $upload_error_sftp = array();

    // echo '<pre>';
    // print_r($login_id['get_prev_education_details']);
    // echo '</pre>';
    // exit;
        //  echo $photo_ck;
        //  echo $sign_ck;
        //  exit;
         //echo $registration_id;
         $admn_no = $login_id['admn_no'];



          //$dstFile = '/var/www/html/assets/images/student/';

           $admn_no_lower = strtolower($admn_no);

           if($admn_type=='mba') {
            $course_folder='mba';
          }
          else if($admn_type=='jrf_fulltime' || $admn_type=='jrf_parttime' || $admn_type=='jrf') {
           $course_folder='phdpt';
          }
          else if($admn_type=='mtech') {
           $course_folder='mtech';
          }

          $upload_error_sftp = array();

          $admn_no_lower = strtolower($admn_no);
          $remote_path = '/var/www/html/assets/images/student/'.$admn_no_lower.'/';
          $remote_path_misweb = '/var/www/html/assets/people/photo/'.$admn_no_lower.'/';
          $remote_path_cdc = '/disk2/virtualhost/cdc/public_html/assets/images/student/'.$admn_no_lower.'/';
          $remote_path_people = '/home/faculty/download/public_html/images/student/'.$admn_no_lower.'/';
          $local_Path = '/disk2/virtualhost/admission/public_html/html/assets/admission/'.$registration_id.'/';
          $local_Path_to_copy = '/disk2/virtualhost/admission/public_html/html/assets/admission/'.$admn_no_lower.'/';
          $remote_path_fee_mis = '/var/www/html/assets/images/semester_reg/sem_slip/';

            if(!is_dir($local_Path_to_copy))
            {
            mkdir($local_Path_to_copy,0777,true);
            }
            if(!is_dir('ssh2.sftp://'.$sftp.$remote_path))
            {
            mkdir('ssh2.sftp://'.$sftp.$remote_path,0777,true);
            }
            if(!is_dir('ssh2.sftp://'.$sftp.$remote_path_misweb))
            {
            mkdir('ssh2.sftp://'.$sftp.$remote_path_misweb,0777,true);
            }
            if(!is_dir('ssh2.sftp://'.$sftp_cdc.$remote_path_cdc))
            {
            mkdir('ssh2.sftp://'.$sftp_cdc.$remote_path_cdc,0777,true);
            }
            if(!is_dir('ssh2.sftp://'.$sftp_people.$remote_path_people))
            {
            mkdir('ssh2.sftp://'.$sftp_people.$remote_path_people,0777,true);
            }
            if(!is_dir('ssh2.sftp://'.$sftp_people.$remote_path_fee_mis))
            {
            mkdir('ssh2.sftp://'.$sftp_people.$remote_path_fee_mis,0777,true);
            }
            if(!is_dir('ssh2.sftp://'.$sftp_parent.$remote_path))
            {
            mkdir('ssh2.sftp://'.$sftp_parent.$remote_path,0777,true);
            }
          //exit;

           //$this->remote = "ssh2.sftp://".$sftp;
           $sftpStream = fopen('ssh2.sftp://'.$sftp.$remote_path, 'r');
           $sftpStream_web_people = fopen('ssh2.sftp://'.$sftp.$remote_path_misweb, 'r');
           $sftpStream_cdc = fopen('ssh2.sftp://'.$sftp_cdc.$remote_path_cdc, 'r');
           $sftpStream_parent = fopen('ssh2.sftp://'.$sftp_parent.$remote_path, 'r');
           $sftpStream_people = fopen('ssh2.sftp://'.$sftp_people.$remote_path_people, 'r');


           if (!$sftpStream) {
            $upload_error['folder_not_open'] = "1 Could not open remote file: $remote_path".' in mis';
            array_push($upload_error_sftp,array('error_description' => $upload_error['folder_not_open'],'server'=>'mis','error_type'=>'folder_not_open'));
           }
           if (!$sftpStream_web_people) {
            $upload_error['folder_not_open'] = "2 Could not open remote file: $remote_path_misweb".' in mis';
            array_push($upload_error_sftp,array('error_description' => $upload_error['folder_not_open'],'server'=>'mis','error_type'=>'folder_not_open'));
           }
           if (!$sftpStream_cdc) {
            $upload_error['folder_not_open'] = "3 Could not open remote file: $remote_path_cdc".' in cdc';
            array_push($upload_error_sftp,array('error_description' => $upload_error['folder_not_open'],'server'=>'cdc','error_type'=>'folder_not_open'));
           }
           if (!$sftpStream_parent) {
            $upload_error['folder_not_open'] = "4 Could not open remote file: $remote_path".' in parent';
            array_push($upload_error_sftp,array('error_description' =>$upload_error['folder_not_open'],'server'=>'parent','error_type'=>'folder_not_open'));
           }
           if (!$sftpStream_people) {
            $upload_error['folder_not_open'] = "5 Could not open remote file: $remote_path_people".' in people';
            array_push($upload_error_sftp,array('error_description' => $upload_error['folder_not_open'],'server'=>'people','error_type'=>'folder_not_open'));
           }

      if(!empty($photo_ck)) {

                  $photo_array = explode("/",$photo_ck);
                  $photo_name = end($photo_array);

                  $photo_name_final = basename($photo_name); // file name in admission server folder

                  $photo_file_ext = pathinfo($photo_name_final, PATHINFO_EXTENSION);

                  $photo_name_send = 'stu_'.$admn_no_lower.'_photo'.'.'.strtolower($photo_file_ext); // rename filename for mis

                  $from_local_path = $local_Path.$photo_name_final;
                  $to_local_path = $local_Path_to_copy.$photo_name_send;
                  $to_Remote_Path = $remote_path.$photo_name_send; // remote path
                  $to_Remote_Path_misweb = $remote_path_misweb.$photo_name_send; // remote path
                  $to_Remote_Path_cdc = $remote_path_cdc.$photo_name_send; // remote path
                  $to_Remote_Path_people = $remote_path_people.$photo_name_send; // remote path

                  $copy_file_adm = copy($from_local_path,$to_local_path);
                  $file_send_mis = ssh2_scp_send($connection,$from_local_path,$to_Remote_Path);
                  $file_send_mis_web = ssh2_scp_send($connection,$from_local_path,$to_Remote_Path_misweb);
                  $file_send_parent = ssh2_scp_send($connection_parent,$from_local_path,$to_Remote_Path);
                  $file_send_cdc = ssh2_scp_send($connection_cdc,$from_local_path,$to_Remote_Path_cdc);
                  $file_send_people = ssh2_scp_send($connection_people,$from_local_path,$to_Remote_Path_people);
                  if(!$copy_file_adm || $file_send_mis===false || $file_send_mis_web===false || $file_send_parent === false || $file_send_cdc === false && $file_send_people===false){
                  if (!$copy_file_adm) {
                    $upload_error['photo_error'] = 'Photo cannot be copied admission '.$to_local_path;
                    array_push($upload_error_sftp,array('error_description' => $upload_error['photo_error'],'server'=>'admission','error_type'=>'photo_error'));
                  }
                  if ($file_send_mis===false) {
                    $upload_error['photo_error'] = 'Photo not uploaded mis '.$to_Remote_Path;
                    array_push($upload_error_sftp,array('error_description' => $upload_error['photo_error'],'server'=>'mis','error_type'=>'photo_error'));
                  }
                  if ($file_send_mis_web===false) {
                    $upload_error['photo_error'] = 'Photo not uploaded mis '.$to_Remote_Path_misweb;
                    array_push($upload_error_sftp,array('error_description' => $upload_error['photo_error'],'server'=>'mis','error_type'=>'photo_error'));
                  }
                  if ($file_send_parent===false) {
                    $upload_error['photo_error'] = 'Photo not uploaded parent '.$to_Remote_Path;
                    array_push($upload_error_sftp,array('error_description' => $upload_error['photo_error'],'server'=>'parent','error_type'=>'photo_error'));
                  }
                  if ($file_send_cdc===false) {
                    $upload_error['photo_error'] = 'Photo not uploaded cdc' .$to_Remote_Path_cdc;
                    array_push($upload_error_sftp,array('error_description' => $upload_error['photo_error'],'server'=>'cdc','error_type'=>'photo_error'));
                  }
                  if ($file_send_people===false) {
                    $upload_error['photo_error'] = 'Photo not uploaded people' .$file_send_people;
                    array_push($upload_error_sftp,array('error_description' => $upload_error['photo_error'],'server'=>'people','error_type'=>'photo_error'));
                  }

                  //$upload_error['photo_error']=$this->upload->display_errors();
                }

                else{
                  $upload_error['photo_error'] = '';
                  //echo 'file uploaded';
                }

      }
      else {

      }

      // echo '<pre>';
      // print_r($upload_error_sftp);
      // echo '</pre>';

      // exit;
        #xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx PHOTO UPLOAD xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

        #xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx SIGN UPLOAD xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
        if(!empty($sign_ck)) {
          //echo "move sign from admission to newadmission and mis , other";
                  //$sftpStream = fopen('ssh2.sftp://' . intval($nfrdev_ssh2['sftp']) . $remote_path, 'r');

                  $sign_array = explode("/",$sign_ck);
                  $sign_name = end($sign_array);

                  $sign_name_final = basename($sign_name); // file name in admission server folder

                  $sign_file_ext = pathinfo($sign_name_final, PATHINFO_EXTENSION);

                  $sign_name_send = 'stu_'.$admn_no_lower.'_sign'.'.'.strtolower($sign_file_ext); // rename filename for mis

                  $from_local_path = $local_Path.$sign_name_final; // remote path
                  $to_local_path = $local_Path_to_copy.$sign_name_send;
                  $to_Remote_Path = $remote_path.$sign_name_send; // receive in local path
                  $to_Remote_Path_misweb = $remote_path_misweb.$sign_name_send; // remote path
                  $to_Remote_Path_cdc = $remote_path_cdc.$sign_name_send; // remote path
                  $to_Remote_Path_people = $remote_path_people.$sign_name_send; // remote path

                  $copy_file_adm = copy($from_local_path,$to_local_path);
                  $file_send_mis = ssh2_scp_send($connection,$from_local_path,$to_Remote_Path, 0777); // newadmission to parent same path
                  $file_send_mis_web = ssh2_scp_send($connection,$from_local_path,$to_Remote_Path_misweb);
                  $file_send_parent = ssh2_scp_send($connection_parent,$from_local_path,$to_Remote_Path);
                  $file_send_cdc = ssh2_scp_send($connection_cdc,$from_local_path,$to_Remote_Path_cdc);
                  $file_send_people = ssh2_scp_send($connection_people,$from_local_path,$to_Remote_Path_people);

                  if(!$copy_file_adm || $file_send_mis === false || $file_send_mis_web===false || $file_send_parent === false || $file_send_cdc === false && $file_send_people===false) {
                    if (!$copy_file_adm) {
                      $upload_error['sign_error'] = 'Sign cannot be copied admission '.$to_local_path;
                      array_push($upload_error_sftp,array('error_description' => $upload_error['sign_error'],'server'=>'admission','error_type'=>'sign_error'));
                    }
                    if ($file_send_mis===false) {
                    $upload_error['sign_error'] = 'Sign not uploaded mis '.$to_Remote_Path;
                    array_push($upload_error_sftp,array('error_description' => $upload_error['sign_error'],'server'=>'mis','error_type'=>'sign_error'));
                  }
                  if ($file_send_mis_web===false) {
                    $upload_error['sign_error'] = 'Sign not uploaded mis '.$to_Remote_Path_misweb;
                    array_push($upload_error_sftp,array('error_description' => $upload_error['sign_error'],'server'=>'mis','error_type'=>'sign_error'));
                  }
                  if ($file_send_parent===false) {
                    $upload_error['sign_error'] = 'Sign not uploaded parent '.$to_Remote_Path;
                    array_push($upload_error_sftp,array('error_description' => $upload_error['sign_error'],'server'=>'parent','error_type'=>'sign_error'));
                  }
                  if ($file_send_cdc===false) {
                    $upload_error['sign_error'] = 'Sign not uploaded cdc' .$to_Remote_Path_cdc;
                    array_push($upload_error_sftp,array('error_description' => $upload_error['sign_error'],'server'=>'cdc','error_type'=>'sign_error'));
                  }
                  if ($file_send_people===false) {
                    $upload_error['sign_error'] = 'Sign not uploaded people' .$file_send_people;
                    array_push($upload_error_sftp,array('error_description' => $upload_error['sign_error'],'server'=>'people','error_type'=>'sign_error'));
                  }
                }
                  else {
                    $upload_error['sign_error'] = '';
                  }

                }
                else {
                  # code...
                }

      //exit;

      // echo '<pre>';
      // print_r($upload_error_sftp);
      // echo '</pre>';

      // exit;
      #xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx SIGN UPLOAD xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
        /* comment for the time being */
        /*
      #xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx CERTIFICATE 0 UPLOAD xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
      if(!empty($certificate0_ck)) {
        // file receive from admission to newadmission and upload to mis

        $certificate0_array = explode("/",$certificate0_ck);
        $certificate0_name = end($certificate0_array);

        $admn_no_lower = strtolower($admn_no);

        $certificate0_name_final = basename($certificate0_name); // file name in admission server folder

        $certificate0_file_ext = pathinfo($certificate0_name_final, PATHINFO_EXTENSION);

        $certificate0_name = 'stu_'.$admn_no_lower.'_certificate_10th'.'.'.strtolower($certificate0_file_ext); // rename filename for mis

        $to_local_path = $local_Path_to_copy.$certificate0_name;
        $to_Remote_Path = $remote_path.$certificate0_name; // remote path
        $to_Remote_Path_cdc = $remote_path_cdc.$certificate0_name;

         $from_local_path = $local_Path.$certificate0_name_final; // receive in local path
         $copy_file_adm = copy($from_local_path,$to_local_path);
         $file_send_mis = ssh2_scp_send($connection, $from_local_path, $to_Remote_Path, 0777); // newadmission to parent same path
         $file_send_cdc = ssh2_scp_send($connection_cdc,$from_local_path,$to_Remote_Path_cdc);
         if(!$copy_file_adm || $file_send_mis===false || $file_send_cdc===false){
          if (!$copy_file_adm) {
            $upload_error['certificate_10th_error'] = 'File cannot be copied admission '.$to_local_path;
            array_push($upload_error_sftp,array('error_description' => $upload_error['certificate_10th_error'],'server'=>'admission','error_type'=>'certificate_10th_error'));
          }
          if ($file_send_mis===false) {
            $upload_error['certificate_10th_error'] = 'Certificate 10th not uploaded mis '.$to_Remote_Path;
            array_push($upload_error_sftp,array('error_description' => $upload_error['certificate_10th_error'],'server'=>'mis','error_type'=>'certificate_10th_error'));
          }
          if ($file_send_cdc===false) {
            $upload_error['certificate_10th_error'] = 'Certificate 10th not uploaded cdc' .$to_Remote_Path_cdc;
            array_push($upload_error_sftp,array('error_description' => $upload_error['certificate_10th_error'],'server'=>'cdc','error_type'=>'certificate_10th_error'));
          }
        }
        else{
          $upload_error['certificate_10th_error'] = '';
        }

        }
      else {

      }

      // echo '<pre>';
      // print_r($upload_error);
      // echo '</pre>';

      // exit;
       #xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx CERTIFICATE 0 UPLOAD xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

       #xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx CERTIFICATE 1 UPLOAD xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
       if(!empty($certificate1_ck )) {
        // file receive from admission to newadmission and upload to mis

                $certificate1_array = explode("/",$certificate1_ck);
                $certificate1_name = end($certificate1_array);

                $certificate1_name_final = basename($certificate1_name); // file name in admission server folder

                $certificate1_file_ext = pathinfo($certificate1_name_final, PATHINFO_EXTENSION);

                $certificate1_name = 'stu_'.$admn_no_lower.'_certificate_12th'.'.'.strtolower($certificate1_file_ext); // rename filename for mis

                $to_local_path = $local_Path_to_copy.$certificate1_name;
                $to_Remote_Path = $remote_path.$certificate1_name; // remote path
                $to_Remote_Path_cdc = $remote_path_cdc.$certificate1_name;

                $from_local_path = $local_Path.$certificate1_name_final; // receive in local path

                $copy_file_adm = copy($from_local_path,$to_local_path);
                $file_send_mis = ssh2_scp_send($connection,$from_local_path,$to_Remote_Path, 0777);
                $file_send_cdc = ssh2_scp_send($connection_cdc,$from_local_path,$to_Remote_Path_cdc);
                if(!$copy_file_adm || $file_send_mis===false || $file_send_cdc===false){
                  if (!$copy_file_adm) {
                    $upload_error['certificate_12th_error'] = 'File cannot be copied admission '.$to_local_path;
                    array_push($upload_error_sftp,array('error_description' => $upload_error['certificate_12th_error'],'server'=>'admission','error_type'=>'certificate_12th_error'));
                  }

                  if ($file_send_mis===false) {
                    $upload_error['certificate_12th_error'] = 'Certificate 12th not uploaded mis '.$to_Remote_Path;
                    array_push($upload_error_sftp,array('error_description' => $upload_error['certificate_12th_error'],'server'=>'mis','error_type'=>'certificate_12th_error'));
                  }
                  if ($file_send_cdc===false) {
                    $upload_error['certificate_12th_error'] = 'Certificate 12th not uploaded cdc' .$to_Remote_Path_cdc;
                    array_push($upload_error_sftp,array('error_description' => $upload_error['certificate_12th_error'],'server'=>'cdc','error_type'=>'certificate_12th_error'));
                  }
                }
                else{
                  $upload_error['certificate_12th_error'] = '';
                }
                //exit;
                }
       else {

      }

      // echo '<pre>';
      // print_r($upload_error);
      // echo '</pre>';

       #xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx CERTIFICATE 1 UPLOAD xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
      //exit;

       #xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MARKSHEET 0 UPLOAD xxxxxxxxxxxxxxXXxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
       if(!empty($marksheet0_ck)) {
         // file receive from admission to newadmission | send to mis
         // file receive from admission to newadmission and upload to mis
         //$sftpStream = fopen('ssh2.sftp://' . intval($nfrdev_ssh2['sftp']) . $remote_path, 'r');

         $marksheet0_array = explode("/",$marksheet0_ck);
         $marksheet0_name = end($marksheet0_array);

         $marksheet0_name_final = basename($marksheet0_name); // file name in admission server folder

         $marksheet0_file_ext = pathinfo($marksheet0_name_final, PATHINFO_EXTENSION);

         $marksheet0_name = 'stu_'.$admn_no_lower.'_marksheet_10th'.'.'.strtolower($marksheet0_file_ext); // rename filename for mis

         $to_local_path = $local_Path_to_copy.$marksheet0_name;
         $to_Remote_Path = $remote_path.$marksheet0_name; // remote path
         $to_Remote_Path_cdc = $remote_path_cdc.$marksheet0_name;

         $from_local_path = $local_Path.$marksheet0_name_final; // receive in local path
         $copy_file_adm = copy($from_local_path,$to_local_path);
         $file_send_mis = ssh2_scp_send($connection, $from_local_path, $to_Remote_Path, 0777); // newadmission to mis same path
         $file_send_cdc = ssh2_scp_send($connection_cdc, $from_local_path, $to_Remote_Path_cdc, 0777);
         if(!($copy_file_adm) || $file_send_mis===false || $file_send_cdc===false){
          if (!$copy_file_adm) {
            $upload_error['marksheet_10th_error'] = 'File cannot be copied admission '.$to_local_path;
            array_push($upload_error_sftp,array('error_description' => $upload_error['marksheet_10th_error'],'server'=>'admission','error_type'=>'marksheet_10th_error'));
          }
          if ($file_send_mis===false) {
            $upload_error['marksheet_10th_error'] = 'Marksheet 10th not uploaded mis '.$to_Remote_Path;
            array_push($upload_error_sftp,array('error_description' => $upload_error['marksheet_10th_error'],'server'=>'mis','error_type'=>'marksheet_10th_error'));
          }
          if ($file_send_cdc===false) {
            $upload_error['marksheet_10th_error'] = 'Marksheet 10th not uploaded cdc' .$to_Remote_Path_cdc;
            array_push($upload_error_sftp,array('error_description' => $upload_error['marksheet_10th_error'],'server'=>'cdc','error_type'=>'marksheet_10th_error'));
          }
        }
        else{
          $upload_error['marksheet_10th_error'] = '';
        }

      }
       else {

      }
      #xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MARKSHEET 0 UPLOAD xxxxxxxxxxxxxxXXxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

      #xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MARKSHEET 1 UPLOAD xxxxxxxxxxxxxxXXxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
      if(!empty($marksheet1_ck)) {
        // file receive from admission to newadmission | sned in mis

          $marksheet1_array = explode("/",$marksheet1_ck);
          $marksheet1_name = end($marksheet1_array);

         $marksheet1_name_final = basename($marksheet1_name); // file name in admission server folder

         $marksheet1_file_ext = pathinfo($marksheet1_name_final, PATHINFO_EXTENSION);

         $marksheet1_name = 'stu_'.$admn_no_lower.'_marksheet_12th'.'.'.strtolower($marksheet1_file_ext); // rename filename for mis

         $to_local_path = $local_Path_to_copy.$marksheet1_name;
         $to_Remote_Path = $remote_path.$marksheet1_name; // remote path
         $to_Remote_Path_cdc = $remote_path_cdc.'/'.$marksheet1_name;

         $from_local_path = $local_Path.$marksheet1_name_final; // receive in local path
         $copy_file_adm = copy($from_local_path,$to_local_path);
         $file_send_mis = ssh2_scp_send($connection, $from_local_path, $to_Remote_Path, 0777); // Receive a file
         $file_send_cdc = ssh2_scp_send($connection_cdc, $from_local_path, $to_Remote_Path_cdc, 0777); // Receive a file

         if(!($copy_file_adm) || $file_send_mis===false || $file_send_cdc===false){
          if (!$copy_file_adm) {
            $upload_error['marksheet_12th_error'] = 'File cannot be copied admission '.$to_local_path;
            array_push($upload_error_sftp,array('error_description' => $upload_error['marksheet_12th_error'],'server'=>'admission','error_type'=>'marksheet_12th_error'));
          }

          if ($file_send_mis===false) {
            $upload_error['marksheet_12th_error'] = 'Marksheet 12th not uploaded mis '.$to_Remote_Path;
            array_push($upload_error_sftp,array('error_description' => $upload_error['marksheet_12th_error'],'server'=>'mis','error_type'=>'marksheet_12th_error'));
          }
          if ($file_send_cdc===false) {
            $upload_error['marksheet_12th_error'] = 'Marksheet 12th not uploaded cdc' .$to_Remote_Path_cdc;
            array_push($upload_error_sftp,array('error_description' => $upload_error['marksheet_12th_error'],'server'=>'cdc','error_type'=>'marksheet_12th_error'));
          }
        }
        else{
          $upload_error['marksheet_12th_error'] = '';
        }
      //}
    }
      else {

      }
       #xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MARKSHEET 1 UPLOAD xxxxxxxxxxxxxxXXxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx



      #xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx RECEIPT UPLOAD xxxxxxxxxxxxxxXXxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
      if(!empty($receipt_path)) {
        //echo 'entered true receipt'; exit;
        // file receive from admission to newadmission | send to mis
        // file receive from admission to newadmission and upload to mis
        //$sftpStream = fopen('ssh2.sftp://' . intval($nfrdev_ssh2['sftp']) . $remote_path, 'r');

      $receipt_array = explode("/",$receipt_path);
      $receipt_name = end($receipt_array);


        $receipt_name_final = basename($receipt_name); // file name in admission server folder

        $receipt_file_ext = pathinfo($receipt_name_final, PATHINFO_EXTENSION);

        $receipt_name = 'stu_'.$admn_no_lower.'_receipt'.'.'.strtolower($receipt_file_ext); // rename filename for mis

        $to_local_path = $local_Path_to_copy.$receipt_name;
        $to_Remote_Path = $remote_path_fee_mis.$receipt_name; // remote path
        $to_Remote_Path_cdc = $remote_path_cdc.$receipt_name;
        $to_Remote_Path_parent = $remote_path.$receipt_name;


        $from_local_path = $local_Path.$receipt_name_final; // receive in local path
        $copy_file_adm = copy($from_local_path,$to_local_path);
        $file_send_mis = ssh2_scp_send($connection, $from_local_path,$to_Remote_Path); // Receive a file
        $file_send_cdc = ssh2_scp_send($connection_cdc, $from_local_path,$to_Remote_Path_cdc); // Receive a file
        $file_send_parent = ssh2_scp_send($connection_parent, $from_local_path,$to_Remote_Path_parent);
        if(!($copy_file_adm) || $file_send_mis===false || $file_send_cdc===false || $file_send_parent===false){
          if (!$copy_file_adm) {
            $upload_error['fee_receipt_error'] = 'File cannot be copied admission '.$to_local_path;
            array_push($upload_error_sftp,array('error_description' => $upload_error['fee_receipt_error'],'server'=>'admission','error_type'=>'fee_receipt_error'));
          }

          if ($file_send_mis===false) {
            $upload_error['fee_receipt_error'] = 'Fee Receipt not uploaded mis '.$to_Remote_Path;
            array_push($upload_error_sftp,array('error_description' => $upload_error['fee_receipt_error'],'server'=>'mis','error_type'=>'fee_receipt_error'));
          }
          if ($file_send_cdc===false) {
            $upload_error['fee_receipt_error'] = 'Fee Receipt not uploaded cdc' .$to_Remote_Path_cdc;
            array_push($upload_error_sftp,array('error_description' => $upload_error['fee_receipt_error'],'server'=>'cdc','error_type'=>'fee_receipt_error'));
          }
          if ($file_send_parent===false) {
            $upload_error['fee_receipt_error'] = 'Fee Receipt not uploaded parent' .$to_Remote_Path_parent;
            array_push($upload_error_sftp,array('error_description' => $upload_error['fee_receipt_error'],'server'=>'parent','error_type'=>'fee_receipt_error'));
          }
        }
        else{
          $upload_error['fee_receipt_error'] = '';
        }
        //}
      }


      */


      // echo '<pre>';
      // print_r($marksheet_ck);
      // echo '</pre>';

      // echo '<br>';

      // echo '<pre>';
      // print_r($certificate_ck);
      // echo '</pre>';
      // exit;



  if($admn_type!='jee')
  {

   if(!empty($marksheet_ck) && count(array_filter($marksheet_ck)) > 0)
   {
     //echo 'entered dynamic marksheet'; exit;
     $filesCount = count($marksheet_ck);

    //$i = 0;


    foreach($marksheet_ck as $keymarks => $value)
    {
      $i = $keymarks;
      // $value_to_be_used = '';
      // $exam_type_new = '';
      foreach($login_id['get_prev_education_details'] as  $key => $value_diff){
        if ($key == $i) {
          $value_to_be_used = $value_diff['exam_type'];
          if(!preg_match('/^[a-zA-Z0-9]+$/', $value_diff['exam_type'])){
            $value_exam = strtolower(preg_replace('/[^a-zA-Z0-9]/', '_', $value_diff['exam_type']));
          }
        //echo $value; exit;
        $exam_type_new = $value_exam;

        }

      }

      //echo  $i.$value_exam;


                  $photo_array = explode("/",$value);
                  $file_name = end($photo_array);
          //echo $admn_no; exit;


                  $photo_array = explode("/",$value);
                  $photo_name = end($photo_array);

                  $photo_name_final = basename($photo_name); // file name in admission server folder

                  $to_local_path = $local_Path_to_copy.$photo_name_final;
                  $to_Remote_Path = $remote_path.$photo_name_final; // remote path
                  $to_Remote_Path_cdc = $remote_path_cdc.$photo_name_final; // remote path

                  $from_local_path = $local_Path.$photo_name;
                  $copy_file_adm = copy($from_local_path,$to_local_path);
                  $file_send_mis = ssh2_scp_send($connection,$from_local_path,$to_Remote_Path,0777);
                  $file_send_cdc = ssh2_scp_send($connection_cdc,$from_local_path,$to_Remote_Path_cdc);
                  if(!($copy_file_adm) || $file_send_mis===false || $file_send_cdc===false){
                    if (!$copy_file_adm) {
                      $upload_error['marksheet_'.$exam_type_new.'_error'] = 'Marksheet '.$value_to_be_used.' cannot be copied admission '.$to_local_path;
                      array_push($upload_error_sftp,array('error_description' => $upload_error['marksheet_'.$exam_type_new.'_error'],'server'=>'admission','error_type'=>'marksheet_'.$exam_type_new.'_error'));
                    }

                    if ($file_send_mis===false) {
                      $upload_error['marksheet_'.$exam_type_new.'_error'] = 'Marksheet '.$value_to_be_used.' not uploaded mis '.$to_Remote_Path;
                      array_push($upload_error_sftp,array('error_description' => $upload_error['marksheet_'.$exam_type_new.'_error'],'server'=>'mis','error_type'=>'marksheet_'.$exam_type_new.'_error'));
                    }
                    if ($file_send_cdc===false) {
                      $upload_error['marksheet_'.$exam_type_new.'_error'] = 'Marksheet '.$value_to_be_used.' not uploaded cdc' .$to_Remote_Path_cdc;
                      array_push($upload_error_sftp,array('error_description' => $upload_error['marksheet_'.$exam_type_new.'_error'],'server'=>'cdc','error_type'=>'marksheet_'.$exam_type_new.'_error'));
                    }
                  }
                  else{
                    $upload_error['marksheet_'.$exam_type_new.'_error'] = '';
                  }

            //$i++;
         }

       }

       else {

        //echo 'no dynamic marksheet'; exit;

       }

       //exit;

   if(!empty($certificate_ck) && count(array_filter($certificate_ck)) > 0)
   {
     $filesCount = count($certificate_ck);

        //$files = $_FILES;
    //for($i=0; $i<$filesCount; $i++)
    $i = 0;
    foreach($certificate_ck as $value)
    {
      $value_to_be_used = '';
      $exam_type_new = '';
      foreach($login_id['get_prev_education_details'] as  $key => $value_diff){
        if ($key == $i) {
          $value_to_be_used = $value_diff['exam_type'];
          if(!preg_match('/^[a-zA-Z0-9]+$/', $value_diff['exam_type'])){
            $value_exam = strtolower(preg_replace('/[^a-zA-Z0-9]/', '_', $value_diff['exam_type']));
          }
        //echo $value; exit;
        $exam_type_new = $value_exam;

        }

      }


            $photo_array = explode("/",$value);
            $file_name = end($photo_array);
            //echo $admn_no; exit;
            $admn_no_lower = strtolower($admn_no);

              $photo_array = explode("/",$value);
              $photo_name = end($photo_array);

              $photo_name_final = basename($photo_name);
              $to_local_path = $local_Path_to_copy.$photo_name_final;
              $to_Remote_Path = $remote_path.$photo_name_final; // remote path
              $to_Remote_Path_cdc = $remote_path_cdc.$photo_name_final;

              $from_local_path = $local_Path.$photo_name;
              $copy_file_adm = copy($from_local_path,$to_local_path);
              $file_send_mis = ssh2_scp_send($connection,$from_local_path,$to_Remote_Path,0777);
              $file_send_cdc = ssh2_scp_send($connection_cdc,$from_local_path,$to_Remote_Path_cdc);
                  if(!($copy_file_adm) || $file_send_mis===false || $file_send_cdc===false){
                    if (!$copy_file_adm) {
                      $upload_error['certificate_'.$exam_type_new.'_error'] = 'Certificate '.$value_to_be_used.' cannot be copied admission '.$to_local_path;
                      array_push($upload_error_sftp,array('error_description' => $upload_error['fee_receipt_error'],'server'=>'admission','error_type'=>'certificate_'.$exam_type_new.'_error'));
                    }
                    if ($file_send_mis===false) {
                      $upload_error['certificate_'.$exam_type_new.'_error'] = 'Certificate '.$value_to_be_used.' not uploaded mis '.$to_Remote_Path;
                      array_push($upload_error_sftp,array('error_description' => $upload_error['certificate_'.$exam_type_new.'_error'],'server'=>'mis','error_type'=>'certificate_'.$exam_type_new.'_error'));
                    }
                    if ($file_send_cdc===false) {
                      $upload_error['certificate_'.$exam_type_new.'_error'] = 'Certificate '.$value_to_be_used.' not uploaded cdc' .$to_Remote_Path_cdc;
                      array_push($upload_error_sftp,array('error_description' => $upload_error['certificate_'.$exam_type_new.'_error'],'server'=>'cdc','error_type'=>'certificate_'.$exam_type_new.'_error'));
                    }
                  }
                  else{
                    $upload_error['certificate_'.$exam_type_new.'_error'] = '';
                  }


        $i++;

      }

    }
  }
  #xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx upload after 10th 12th certificate xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
      //  echo '<pre>';
      //  print_r($upload_error_sftp);
      //  echo '</pre>';
      //  exit;
       return $upload_error_sftp;
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


  public function download_receipt($receipt_payment)
    {
       //echo 'download receipt'; exit;
       // $order_no = $this->uri->segment(4);
        if(!empty($receipt_payment))
        {
            $data['receipt_payment'] = $receipt_payment;
            // echo "<pre>";
            // print_r($receipt_payment);
            // exit;

      $this->load->helper(array('dompdf', 'file'));
		  $path = '/var/www/html/assets/admission/'.$receipt_payment['registration_no'];

		  $html = $this->load->view('admission/phdpt/generate_receipt_print_view', $data, TRUE);

		  $paper = '';
      $stream = FALSE;
        //   ob_start();
		//   $dompdf = new Dompdf();
		//   $dompdf->set_option('enable_html5_parser', TRUE);
		//   ob_end_clean();
		//   $dompdf->load_html($html);
		//   $customPaper = array(0,0,650,775);
		//   $dompdf->set_paper($customPaper);
		//   $dompdf->render();
		  if(!is_dir($path)) //create the folder if it's not already exists
		  {
			  mkdir($path,0777,TRUE);
		  }

		 // $file_to_save = FCPATH.'assets/images/student/'.strtolower($receipt_payment['admn_no']).'/Receipt__' .strtolower($receipt_payment['admn_no']).'_'.$receipt_payment['order_no'].'.pdf';
     $output_receipt = pdf_create($html,'Receipt__'.$receipt_payment['order_no'],$paper,$stream);
     $file_to_save = FCPATH.'assets/admission/'.$receipt_payment['registration_no'].'/Receipt__'.$receipt_payment['order_no'].'.pdf';

			//save the pdf file on the server
	   file_put_contents($file_to_save, $output_receipt);
    //  {
    //   echo 'done'; exit;
    //  }
    //  else{
    //   echo 'not done'; exit;
    //  }

     //exit;

      $data_receipt['receipt_path'] = 'assets/admission/'.$receipt_payment['registration_no'].'/Receipt__'.$receipt_payment['order_no'].'.pdf';

      $data_receipt['receipt_name_order_no'] = 'Receipt__'.$receipt_payment['order_no'].'.pdf';

      return $data_receipt;

        }
        else
        {
            echo "Error code : 1032 -> Please try again ! ";
            exit;
        }

    }

    function check_laptop_make(){
        if ($this->input->post('laptop_make') === 'none') {
                $this->form_validation->set_message('check_laptop_make', 'Laptop make is required');
                return FALSE;
            } else {
                if(preg_match('/^[a-zA-Z0-9 \/_.-]+$/', $this->input->post('laptop_make'))){				//echo 'entered_2';
                    return TRUE;
                }
             else{
                $this->form_validation->set_message('check_laptop_make', 'Laptop make cannot cantain special characters');
                return FALSE;
             }
            }
       }

       function check_userbankname(){
        if ($this->input->post('user_bank_name') === 'none') {
                $this->form_validation->set_message('check_userbankname', 'User Bankname is required');
                return FALSE;
            } else {
                if(preg_match('/^[a-zA-Z0-9 \/_.-]+$/', $this->input->post('user_bank_name'))){				//echo 'entered_2';
                    return TRUE;
                }
             else{
                $this->form_validation->set_message('check_userbankname', 'User Bankname cannot cantain special characters');
                return FALSE;
             }
            }
       }


       function check_laptop_model(){
          if (empty($this->input->post('laptop_model'))) {
            return TRUE;
          }
          else {

          if(preg_match('/^[a-zA-Z0-9 \/_.-]+$/', $this->input->post('laptop_model'))){				//echo 'entered_2';
              return TRUE;
          }
        else{
          $this->form_validation->set_message('check_laptop_model', 'Laptop Model cannot cantain special characters');
          return FALSE;
        }
       }
      }

       function check_laptop_sl_no(){

        if(empty($this->input->post('laptop_sl_no'))){
          return TRUE;
        }
        else{
        if(preg_match('/^[a-zA-Z0-9 \/_.-]+$/', $this->input->post('laptop_sl_no'))){				//echo 'entered_2';
        return TRUE;
        }
        else{
        $this->form_validation->set_message('check_laptop_sl_no', 'Laptop Sr. No. cannot cantain special characters');
        return FALSE;
          }
        }
       }


       function check_userifsccode(){
        if ($this->input->post('user_ifsc_code') === 'none') {
            $this->form_validation->set_message('check_userifsccode', 'User IFSC Code is required');
            return FALSE;
        } else {
            if(preg_match('/^[a-zA-Z0-9 \/_.-]+$/', $this->input->post('user_ifsc_code'))){				//echo 'entered_2';
                return TRUE;
            }
         else{
            $this->form_validation->set_message('check_userifsccode', 'User IFSC Code cannot cantain special characters');
            return FALSE;
         }
        }
       }

       function check_useraccount_no(){
        if ($this->input->post('user_account_no') === 'none') {
                $this->form_validation->set_message('check_useraccount_no', 'User Account No. is required');
                return FALSE;
            } else {
                if(preg_match('/^[a-zA-Z0-9 \/_.-]+$/', $this->input->post('user_account_no'))){				//echo 'entered_2';
                    return TRUE;
                }
             else{
                $this->form_validation->set_message('check_useraccount_no', 'User Account No. cannot cantain special characters');
                return FALSE;
             }
            }
       }

       function check_confirm_useraccount_no(){
        if ($this->input->post('c_user_account_no') === 'none') {
            $this->form_validation->set_message('check_confirm_useraccount_no', 'Confirm User Account is required');
            return FALSE;
        } else {
            if(preg_match('/^[a-zA-Z0-9 \/_.-]+$/', $this->input->post('c_user_account_no'))){				//echo 'entered_2';
                if ($this->input->post('c_user_account_no') == $this->input->post('user_account_no')) {
                    //$this->form_validation->set_message('check_confirm_useraccount_no', 'User Account No. cannot cantain special characters');
                    return TRUE;
                }
                else{
                    $this->form_validation->set_message('check_confirm_useraccount_no', 'Confirm User Account No. and User Account No. does not match !!');
                    return false;
                }
            }
         else{
            $this->form_validation->set_message('check_confirm_useraccount_no', 'User Account No. cannot cantain special characters');
            return FALSE;
         }
        }
       }
}

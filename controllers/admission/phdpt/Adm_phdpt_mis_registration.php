<?php defined('BASEPATH') or exit('No direct script access allowed');

class Adm_phdpt_mis_registration extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('dompdf', 'file'));
        $this->load->model('admission/phdpt/Adm_phdpt_application_preview_model', 'Phd_all', TRUE);
        $this->load->model('admission/phdpt/Adm_phdpt_mis_registration_model','Phd_mis_reg',TRUE);
    }

    function proceed_with_registration(){
        //echo 'registered'; exit;
        $registration_no = $this->session->userdata('registration_no');
        $login_type = $this->session->userdata('login_type');
        //exit;
        $count_ml = 0;
        // echo $registration_no; echo "<br>";
        // echo $login_type;
        // exit;
        if ($registration_no && ($login_type =='Phdpt')) {
            #echo 'entered_1'; exit;
            $data['val'] = "home";
            $data['application'] = $this->Phd_all->get_application_details($registration_no);
            $data['program'] = $this->Phd_all->get_program_details($registration_no);
            $data['tab_stat'] = $this->Phd_all->get_tab_status($registration_no);
            $data['program_selected'] = $this->input->post('optradio');
            $this->session->set_userdata('selected_program',$data['program_selected']);
            $appl_type = $this->Phd_mis_reg->get_appl_type_from_reg_no($registration_no);
            $login_id = $this->Phd_mis_reg->validate_login($registration_no,$data['program_selected'],$appl_type);
            //print_r($login_id); exit;
            // $admission_no=$this->Phd_mis_reg->get_admn_no_from_stud_final_with_fee($registration_no);
            // $admn_type='';
                if($login_id){
                 $admn_type=$login_id['admn_type'];
                 $data['admn_type']=$admn_type;
                }


                if($login_id && $admn_type=='jrf')
                {
                  #echo 'entered_2'; exit;
                   // check fee_status for payment 26-05-2021
                   //$order_no = $this->generate_order_no($admn_type); // Generate order no
                   $newDOB = date("d-m-Y", strtotime($login_id['dob'])); // take dob from
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
                        #echo 'entered login id'; exit;
                       //echo 'entered stud final with fee'; exit;
                      // main part of phd after checking payment either print form or load form 25-7-2021
                    // $login_id['fee_mode'] = 'online';
                    // $iitism_email_pass = $this->generate_iitism_email_password(); // create 8 char email pass
                    // $login_id['iitism_password'] = $iitism_email_pass;

                  //$admn_no=$login_id['admn_no'];
                 // either print form or load form
                   $admn_no = '';
                   $this->session->set_userdata($admn_no,$admn_type);
                   /* check if payment is completed in appl_selected */
                   $pay_status_selected = $this->Phd_mis_reg->check_payment_status_appl_selected($registration_no);
                  //  echo $this->db->last_query().'<br>';
                   /* check if payment is completed in appl_selected */
                   $tab4 = $this->Phd_mis_reg->check_tab4_status($registration_no);
                  //  echo $this->db->last_query();
                  //  echo "<pre>";
                  //  print_r($pay_status_selected);
                  //  print_r($tab4);
                  //  exit;

                  if($tab4 != '' && $pay_status_selected != '')// already submitted
                  {
                     //echo 'entered here'; exit;
                     redirect('admission/phdpt/Adm_phdpt_application_preview');
                  }
                  else
                  {
                    //echo 'entered_234'; exit;

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
                      // echo '<pre>';
                      // print_r($login_id);
                      // echo '</pre>';
                      #xxxxxxxxxxxxxxxxxxxxxxxxxx
                      //$this->load->view('new_admission_common/new_admission_common_form_new',$login_id);// login_id must be associative array
                      #xxxxxxxxxxxxxxxxxxxxxxxxxx setting tab status xxxxxxxxxxx#
                      //$tab_status = 0;
                      $reg_tab_status = $this->Phd_mis_reg->get_current_user_tab_status($registration_no);
                      //echo 'entered here'; exit;
                      // echo '<pre>';
                      // print_r($reg_tab_status);
                      // echo '</pre>';
                      // exit;
                      if (empty($reg_tab_status)) {

                        //echo 'entered_success_block'; exit;

                      $insert_tab_data = array(
                        'registration_no' => $registration_no,
                        //'admn_no' => $login_id['admn_no'],
                        'apply_status' => 'phd_mis_reg_details',
                        'created_by' => $registration_no,
                        'updated_date_time' => date('d-m-Y H:i:s'),
                        'tab_status' => 0
                      );
                      $init_tab_insert_status = $this->Phd_mis_reg->insert_initial_tab_data($insert_tab_data);
                      if ($init_tab_insert_status) {
                      //echo 'entered success'; exit;
                      $this->adm_phdpt_header($data);
                      $this->load->view('admission/phdpt/mis_registration_common_form_new', $login_id);
                      $this->adm_phdpt_footer();
                      }
                      else {
                      #echo 'entered_error';exit;
                        $this->session->set_flashdata('flashError','Please contact the administration');
                        redirect('admission/phdpt/Adm_phdpt_application_preview');
                      }
                      }
                      else{
                      //echo 'entered_2nd Block'; exit;

                      //echo 'entered_success_block_else'; exit;
                      $tab_status = $reg_tab_status[0]['tab_status'];
                      //echo $tab_status; exit;
                      if ($tab_status == '0') {
                      $this->adm_phdpt_header($data);
                      $this->load->view('admission/phdpt/mis_registration_common_form_new', $login_id);
                      $this->adm_phdpt_footer();
                      }
                      if ($tab_status == '1') {
                        redirect('admission/phdpt/Adm_phdpt_mis_registration_education');
                      }
                      if ($tab_status == '2') {
                        redirect('admission/phdpt/Adm_phdpt_mis_registration/parent_bank_account_details');
                      }
                      if ($tab_status == '3') {
                        redirect('admission/phdpt/Adm_phdpt_mis_registration_other_details/mis_reg_save_stu_other_imp_details');
                      }
                      if ($tab_status == '4') {
                        redirect('admission/phdpt/Adm_phdpt_mis_registration_other_details/mis_reg_stu_other_details_preview');
                      #xxxxxxxxxxxxxxxxxxxxxxxxxx setting tab status xxxxxxxxxxx#
                     }
                     if ($tab_status == '5') {
                      redirect('admission/phdpt/Adm_phdpt_application_preview/admission_offer_letter');
                     }
                }
              }
                // else {
                //     # code...
                // }

                //exit;

        }

        else
        {
            #echo 'not entered stud final fee'; exit;
            redirect('admission/phdpt/Adm_phdpt_registration/logout');
        }
       }
       else{
        #echo 'not entered initial validation'; exit;
        redirect('admission/phdpt/Adm_phdpt_registration/logout');
       }
   }
   else{
    #echo 'mis failed'; exit;
    redirect('admission/phdpt/Adm_phdpt_registration/logout');
   }

  }

     function education_details(){

     }

    function manage_personal_details(){
      $registration_no = $this->session->userdata('registration_no');
      $login_type = $this->session->userdata('login_type');
      $count_ml = 0;
      if ($registration_no && ($login_type =='Phdpt')) {
          //echo 'entered_1'; exit;
          $data['val'] = "home";
          $data['application'] = $this->Phd_all->get_application_details($registration_no);
          $data['program'] = $this->Phd_all->get_program_details($registration_no);
          $data['tab_stat'] = $this->Phd_all->get_tab_status($registration_no);
          $data['selected_program']= $this->session->userdata('selected_program');
          $appl_type = $this->Phd_mis_reg->get_appl_type_from_reg_no($registration_no);
          $login_id=$this->Phd_mis_reg->validate_login($registration_no,$data['selected_program'],$appl_type);
          #$admission_no=$this->Phd_mis_reg->get_admn_no_from_stud_final_with_fee($registration_no);
          $admn_type='';
              if($login_id){
               $admn_type=$login_id['admn_type'];
               $data['admn_type']=$admn_type;}
              if($login_id && $admn_type=='jrf')
              {
                //echo 'entered_2'; exit;
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
                    // main part of phd after checking payment either print form or load form 25-7-2021
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

                  //echo 'entered_2'; exit;

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

                    #$reg_tab_status = $this->Phd_mis_reg->get_current_user_tab_status($registration_no);

                    $login_id['get_prev_personal_details'] = $this->Phd_mis_reg->get_prev_personal_details($login_id['reg_id']);
                    $login_id['date_of_birth'] = explode('-', $login_id['get_prev_personal_details'][0]['date_of_birth']);

                    // echo '<pre>';
                    // print_r($login_id);
                    // echo '</pre>';
                    // exit;

                    if (!empty($login_id['get_prev_personal_details'])) {
                      //echo 'entered success'; exit;
                      $this->adm_phdpt_header($data);
                      $this->load->view('admission/phdpt/mis_registration_common_form_new', $login_id);
                      $this->adm_phdpt_footer();
                    }
                    else{
                      //echo 'entered success';exit;
                      $this->session->set_flashdata('flashError','Sorry No , Previous Personal Details Found');
                      redirect('admission/phdpt/Adm_phdpt_mis_registration_education');
                    }
                }
              }
          }
      }
    }

   function mis_registration_save_personal_details(){

    //echo 'save personal details'; exit;
    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
    // exit;
    $registration_no = $this->session->userdata('registration_no');
    $login_type = $this->session->userdata('login_type');
    $count_ml = 0;
    if ($registration_no && ($login_type =='Phdpt')) {
          $admn_type = $this->input->post('admn_type');
          $admn_based_on = $this->input->post('admn_based_on');
          $institute_name = $this->input->post('institute_name');
          //$admn_no = $this->input->post('admn_no');
          $admn_no = '';
          $this->form_validation->set_rules('name', 'Name', 'required|callback_check_name');
          $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email');
          $this->form_validation->set_rules('contact_no', 'Contact Number', 'required|callback_check_contactno');
          $this->form_validation->set_rules('sex_new', 'Gender', 'required|callback_check_gender');
          $this->form_validation->set_rules('category', 'Category', 'required|callback_check_category');
          $this->form_validation->set_rules('allocated_category', 'Allocated Category', 'required|callback_check_allocated_category');
          $this->form_validation->set_rules('nationality', 'Nationality', 'required|callback_check_nationality');
          $this->form_validation->set_rules('pd_status', 'PWD Status', 'required|callback_check_pd_status');
          $this->form_validation->set_rules('permanent_address_line1', 'Permanent Address', 'required|callback_check_permanent_address');
          $this->form_validation->set_rules('permanent_address_line2', 'Street/Locality', 'required|callback_check_street_locality');
          $this->form_validation->set_rules('permanent_address_city', 'City', 'required|callback_check_city');
          $this->form_validation->set_rules('permanent_address_state','State','required|callback_check_state');
          $this->form_validation->set_rules('permanent_address_pincode', 'Pincode', 'required|callback_check_pincode');
          $this->form_validation->set_rules('country', 'Country', 'required|callback_check_country');
          $this->form_validation->set_rules('month', 'Date Of Birth (Month)', 'required|callback_check_month');
          $this->form_validation->set_rules('day', 'Date Of Birth (Day)', 'required|callback_check_day');
          $this->form_validation->set_rules('dob_year', 'Date Of Birth (Year)', 'required|callback_check_year');
          $this->form_validation->set_rules('marital_status', 'Marital Status', 'required');
          $this->form_validation->set_rules('religion', 'Religion', 'required');
          $this->form_validation->set_rules('blood_group', 'Blood Group', 'required|callback_check_bloodgroup');
          $this->form_validation->set_rules('kashmiri_immigrant', 'Kashmiri Immigrant', 'required|callback_check_kashmiri_immigrant');
          $this->form_validation->set_rules('name_in_hindi', 'Name In Hindi', 'required|callback_check_name_in_hindi');
          $this->form_validation->set_rules('birth_place', 'Birth Place', 'required|callback_check_birthplace');
          //$this->form_validation->set_rules('hobbies', 'Hobbies', 'callback_check_hobbies');
          $this->form_validation->set_rules('identification_mark', 'Identification Mark', 'required|callback_check_identificationmark');
          //$this->form_validation->set_rules('extra_curricular_activity', 'Extra Curricular Activities', 'callback_check_extracurricularactivity');
          //$this->form_validation->set_rules('other_relavant_info', 'Other Relevant Info', 'callback_check_other_relavant_info');
          $this->form_validation->set_rules('sel_passport_aadhar', 'Select Either Passport or Aadhar Card', 'required|callback_check_sel_pass_aadhar_number');
          $this->form_validation->set_rules('bank_name', 'Bank Name', 'required|callback_check_bank_name');
          $this->form_validation->set_rules('account_no', 'Bank Account No.', 'required|callback_check_account_no');
          $this->form_validation->set_rules('ifsc', 'Bank IFSC Code', 'required|callback_check_ifsc_code');
          $this->form_validation->set_rules('aadhar_no', 'Aadhar Number', 'callback_check_aadhar_passport_no');
          $this->form_validation->set_rules('passport_no', 'Passport Number', 'callback_check_aadhar_passport_no');
          $this->form_validation->set_rules('migration_cert1', 'Migration Certification', 'required|callback_check_migration_cert1');
          $this->form_validation->set_rules('photo', 'Photo', 'required');
          $this->form_validation->set_rules('sign', 'Signature', 'required');
          if (!empty($_FILES["photo"]["name"])) {
            $upload_error = $this->our_upload($admn_no,$admn_type,$registration_no);
          }
          else {
            $upload_error = [];
          }

          // echo '<pre>';
          // print_r($upload_error);
          // echo '</pre>';
          // exit;
          // echo validation_errors();
          // print_r(validation_errors());
          // exit;

          if ($this->form_validation->run() == TRUE && empty($upload_error)) {
              //  if ($registration_no == 'IITISMDRPT2300019') {
              //   echo 'passed validation errors'; exit;
              //  }
               //echo 'passed validation errors'; exit;
              /* check if it already exists in database */
              $check_personal_details_already_exists = $this->Phd_mis_reg->check_personal_details_already_exists($registration_no);
              $columnsNames = array_keys($check_personal_details_already_exists[0]);
              $columnsValues = array_values($check_personal_details_already_exists[0]);
              $data_insert_log = array();

              if (!empty($check_personal_details_already_exists)) {
                foreach($columnsNames as $key => $value) {
                if($value != 'id' && $value != 'updated_date' && $value != 'updated_by') {
                $data_insert_log[$value] = $columnsValues[$key];
                }
                $data_insert_log['created_date'] = date('d-m-Y H:i:s');
                //$data_insert_log['created_date'] = date('d-m-Y H:i:s');
              }
              //echo '<pre>'; print_r($data_insert_log); echo '</pre>'; exit;
              $personal_details_insert_log = $this->Phd_mis_reg->insert_personal_details_log($data_insert_log);
              if ($personal_details_insert_log == '') {
                $this->session->set_flashdata('flashError','Error Occured , Please Wait while trying to update personal details');
                redirect('admission/phdpt/Adm_phdpt_mis_registration/manage_personal_details');
              }
              else {
                $delete_prev = $this->Phd_mis_reg->delete_prev_personal_details($registration_no);
                if($delete_prev == ''){
                  $this->session->set_flashdata('flashError','Error Occured , Please Wait while trying to update personal details');
                  redirect('admission/phdpt/Adm_phdpt_mis_registration/manage_personal_details');
                }
              }
              }
              /* check if it already exists in database */
              $month = $this->input->post('month');
              $day = $this->input->post('day');
              $year = $this->input->post('dob_year');
              $final_date = date("$year-$month-$day");
              $data_insert = array(
                  'registration_no' => $this->session->userdata('registration_no'),
                  'admn_no' => $this->input->post('admn_no'),
                  'institute_name' => $this->input->post('institute_name'),
                  'name' => $this->input->post('name'),
                  'email' => $this->input->post('email'),
                  'contact_no' => $this->input->post('contact_no'),
                  'gender' => $this->input->post('sex'),
                  'category' => $this->input->post('category'),
                  'allocated_category' => $this->input->post('allocated_category'),
                  'nationality' => $this->input->post('nationality'),
                  'pwd' => $this->input->post('pd_status'),
                  'permanent_address' => $this->input->post('permanent_address_line1'),
                  'street_locality' => $this->input->post('permanent_address_line2'),
                  'city' => $this->input->post('permanent_address_city'),
                  'state' => $this->input->post('permanent_address_state'),
                  'pincode' => $this->input->post('permanent_address_pincode'),
                  'country' => $this->input->post('country'),
                  'date_of_birth' => $final_date,
                  'martial_status' => $this->input->post('marital_status'),
                  'religion' => $this->input->post('religion'),
                  'blood_group' => $this->input->post('blood_group'),
                  'kashmiri_immigrant' => $this->input->post('kashmiri_immigrant'),
                  'name_in_hindi' => $this->input->post('name_in_hindi'),
                  'birth_place' => $this->input->post('birth_place'),
                  'identification_mark' => $this->input->post('identification_mark'),
                  'hobbies' => $this->input->post('hobbies'),
                  'extra_curriculam_activities' => $this->input->post('extra_curricular_activity'),
                  'other_relevant_info' => $this->input->post('other_relavant_info'),
                  'parent_bank_name' => $this->input->post('bank_name'),
                  'parent_account_number' => $this->input->post('account_no'),
                  'parent_bank_ifsc_code' => $this->input->post('ifsc'),
                  'fav_past_time' => $this->input->post('fav_past_time'),
                  'stu_aadhar_no' => $this->input->post('aadhar_no'),
                  'stu_passport_no' => $this->input->post('passport_no'),
                  'migration_certificate' => $this->input->post('migration_cert1'),
                  'photo_path' => $this->input->post('photo'),
                  'signature_path' => $this->input->post('sign'),
                  'created_date' => date('d-m-Y H:i:s'),
                  'created_by' => $this->session->userdata('registration_no'),
              );
              // echo '<pre>';
              // print_r($data_insert);
              // echo '</pre>';
              // exit;
              $personal_details_insert = $this->Phd_mis_reg->insert_personal_details($data_insert);

              if (empty($check_personal_details_already_exists)) {
              $data_phd_mis_reg =  array(
                'tab1' => '1',
                'created_by' => $registration_no,
                'updated_date_time' => date('d-m-Y H:i:s'),
                'tab_status' => '1',
                'remark_1' => 0,
                'remark_2' => 0
            );
             $tab_details_insert = $this->Phd_mis_reg->update_mis_reg_tab_status($data_phd_mis_reg,$registration_no);
             if ($tab_details_insert) {
              $this->session->set_flashdata('flashSuccess','Personal Details Inserted Successfully,please enter education details');
              redirect('admission/phdpt/Adm_phdpt_mis_registration_education');
           }

          }
          else{
            $this->session->set_flashdata('flashSuccess','Personal Details Updated Successfully!');
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

        }


          }

        }

          else{
            // if ($registration_no == 'IITISMDRPT2300019') {
            //   print_r(validation_errors()); exit;
            //  }
            #
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
            // $admission_no=$this->Phd_mis_reg->get_admn_no_from_stud_final_with_fee($registration_no);
            // $admn_type='';
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
                      // main part of phd after checking payment either print form or load form 25-7-2021
                    // $login_id['fee_mode'] = 'online';
                    // $iitism_email_pass = $this->generate_iitism_email_password(); // create 8 char email pass
                    // $login_id['iitism_password'] = $iitism_email_pass;

                  $admn_no='';
                 // either print form or load form
                   $this->session->set_userdata($admn_no,$admn_type);
                   $pay_status_selected = $this->Phd_mis_reg->check_payment_status_appl_selected($registration_no);
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
                      $login_id['get_prev_personal_details'] = $this->Phd_mis_reg->get_prev_personal_details($login_id['reg_id']);
                      $login_id['date_of_birth'] = explode('-', $login_id['get_prev_personal_details'][0]['date_of_birth']);


                      $this->adm_phdpt_header($data);
                      $this->load->view('admission/phdpt/mis_registration_common_form_new', $login_id);
                      $this->adm_phdpt_footer();
                         }
                  }

             }

         }

       }

      }
      else{
        redirect('admission/phdpt/Adm_phdpt_registration/logout');
      }
   }

   function parent_bank_account_details(){
    $registration_no = $this->session->userdata('registration_no');
    $login_type = $this->session->userdata('login_type');
    $count_ml = 0;
    if ($registration_no && ($login_type =='Phdpt')) {
        $data['val'] = "home";
        $data['application'] = $this->Phd_all->get_application_details($registration_no);
        $data['program'] = $this->Phd_all->get_program_details($registration_no);
        $data['tab_stat'] = $this->Phd_all->get_tab_status($registration_no);
        if ($this->input->post('optradio') != '') {
          $data['program_selected'] = $this->input->post('optradio');
        }
        else {
         $data['program_selected'] = $this->session->userdata('selected_program');
        }
        $appl_type = $this->Phd_mis_reg->get_appl_type_from_reg_no($registration_no);
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
                  // main part of phd after checking payment either print form or load form 25-7-2021
                // $login_id['fee_mode'] = 'online';
                // $iitism_email_pass = $this->generate_iitism_email_password(); // create 8 char email pass
                // $login_id['iitism_password'] = $iitism_email_pass;

              //$admn_no=$login_id['admn_no'];
              $admn_no = '';
             // either print form or load form
               $this->session->set_userdata($admn_no,$admn_type);
               $pay_status_selected = $this->Phd_mis_reg->check_payment_status_appl_selected($registration_no);
               $tab4 = $this->Phd_mis_reg->check_tab4_status($registration_no);
              if($this->Phd_mis_reg->check($admn_no) && $tab4 != '')// already submitted
              {
                redirect('admission/phdpt/Adm_phdpt_application_preview');
              }
              else
              {
                //echo 'entered registration 2'; exit;
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
                        $this->adm_phdpt_header($data);
                        $this->load->view('admission/phdpt/mis_registration_common_form_parent_details', $login_id);
                        $this->adm_phdpt_footer();
                  }
                  if ($tab_status == '3') {
                    redirect('admission/phdpt/Adm_phdpt_mis_registration_other_details/mis_reg_save_stu_other_imp_details');
                   }
                }
              }

            }
         }
      }
    }

    function our_upload($admn_no,$admn_type,$registration_no){

        // $admn_no;
        // echo $admn_type;
        // echo $registration_no.'registration';
        // //exit;

        // echo $photo_file_ext = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
        // exit;
        $admn_no_lower = strtolower($admn_no);
        $config=array();
        $config['upload_path']='./assets/admission/phdpt/'.$registration_no.'/';
        $config['overwrite'] = TRUE;
        $config['allowed_types']='jpg|png|jpeg|JPG';
        $config['max_size']='300';// in KB
        $config['file_name'] = 'stu_'.$admn_no_lower.'_photo'.'.'.strtolower($photo_file_ext);
        $this->load->library('upload',$config);

        # echo "<pre>"; print_r($config); exit;

        if(!is_dir($config['upload_path'])) // create the folder if it's not already exists
          {
             mkdir($config['upload_path'],0777,TRUE);
          }

        $this->upload->initialize($config);
        $upload_error=array();// for sending upload error to new_admission_form
        $upload_photo = $this->upload->do_upload('photo');
        if($upload_photo)
        {
          $upload_data = $this->upload->data();
          $_POST['photo']=base_url().'assets/admission/phdpt/'.$registration_no.'/'.$upload_data['file_name'];
        }
        else
        {
         $upload_error['photo_error']=$this->upload->display_errors();
         //echo $upload_error['photo'];
        }

        $sign_file_ext = pathinfo($_FILES["sign"]["name"], PATHINFO_EXTENSION);

        // sign upload
        $config=array();
        $config['upload_path']='./assets/admission/phdpt/'.$registration_no.'/';
        $config['overwrite'] = TRUE;
        $config['allowed_types']='jpg|png|jpeg|JPG';
        $config['max_size']='300';// in KB
        $config['file_name'] = 'stu_'.$admn_no_lower.'_sign'.'.'.strtolower($sign_file_ext);
        $this->load->library('upload',$config);

        if(!is_dir($config['upload_path'])) //create the folder if it's not already exists
          {
             mkdir($config['upload_path'],0777,TRUE);
          }

        $this->upload->initialize($config);
        $upload_sign = $this->upload->do_upload('sign');

        if($upload_sign)
        {
          $upload_data = $this->upload->data();
          $_POST['sign']=base_url().'assets/admission/phdpt/'.$registration_no.'/'.$upload_data['file_name'];
        }
        else{
          $upload_error['sign_error']=$this->upload->display_errors();
          //echo $upload_error['sign'];
        }

        return $upload_error;
    }

   function check_sel_pass_aadhar_number(){
    if ($this->input->post('sel_passport_aadhar') === 'none') {
			$this->form_validation->set_message('check_sel_pass_aadhar_number', 'Selection of Passport and Aadhar Card is required');
			return FALSE;
		} else {
			return TRUE;
		}
   }

   function check_birthplace(){
    if ($this->input->post('birth_place') === 'none') {
			$this->form_validation->set_message('check_birthplace', 'Birth Place is required');
			return FALSE;
		} else {
			if(preg_match('/^[a-zA-Z0-9 \/_.]+$/', $this->input->post('name'))){				//echo 'entered_2';
				return TRUE;
		    }
		 else{
			$this->form_validation->set_message('check_birthplace', 'Birth Place cannot contain special characters');
			return FALSE;
		 }
		}
   }

   function check_extracurricularactivity(){
    if ($this->input->post('extra_curricular_activity') === 'none') {
			$this->form_validation->set_message('check_extracurricularactivity', 'Extra Curricular Activity is required');
			return FALSE;
		} else {
			if(preg_match('/^[a-zA-Z0-9 \/_.]+$/', $this->input->post('extra_curricular_activity'))){				//echo 'entered_2';
				return TRUE;
		    }
		 else{
			$this->form_validation->set_message('check_extracurricularactivity', 'Extra Curricular Activity cannot contain special characters');
			return FALSE;
		 }
		}
   }

   function check_nationality(){
    if ($this->input->post('nationality') === 'none') {
			$this->form_validation->set_message('check_nationality', 'Nationality is required');
			return FALSE;
		} else {
			if(preg_match('/^[a-zA-Z0-9 \/_.]+$/', $this->input->post('nationality'))){				//echo 'entered_2';
				return TRUE;
		    }
		 else{
			$this->form_validation->set_message('check_nationality', 'Nationality cannot contain special characters');
			return FALSE;
		 }
		}
   }

   function check_pd_status(){
    if ($this->input->post('pd_status') === 'none') {
			$this->form_validation->set_message('check_pd_status', 'PwD Status is required');
			return FALSE;
		} else {
			if(preg_match('/^[a-zA-Z0-9 \/_.]+$/', $this->input->post('pd_status'))){				//echo 'entered_2';
				return TRUE;
		    }
		 else{
			$this->form_validation->set_message('check_pd_status', 'PwD Status cannot contain special characters');
			return FALSE;
		 }
		}
   }


   function check_permanent_address(){
    if ($this->input->post('permanent_address_line1') === 'none') {
			$this->form_validation->set_message('check_permanent_address', 'Permanent Address is required');
			return FALSE;
		} else {
			if(preg_match('/^[a-zA-Z0-9 \/_,-.]+$/', $this->input->post('permanent_address_line1'))){				//echo 'entered_2';
				return TRUE;
		    }
		 else{
			$this->form_validation->set_message('check_permanent_address', 'Permanent Address cannot contain special characters');
			return FALSE;
		 }
		}
   }

   function check_pincode(){
    if ($this->input->post('permanent_address_pincode') === 'none') {
			$this->form_validation->set_message('check_pincode', 'Permanent Address Pincode is required');
			return FALSE;
		} else {
			if(preg_match('/^[a-zA-Z0-9 \/_.]+$/', $this->input->post('permanent_address_pincode'))){				//echo 'entered_2';
				return TRUE;
		    }
		 else{
			$this->form_validation->set_message('check_pincode', 'Permanent Address Pincode cannot contain special characters');
			return FALSE;
		 }
		}
   }

   function check_country(){
    if ($this->input->post('country') === 'none') {
			$this->form_validation->set_message('check_country', 'Country is required');
			return FALSE;
		} else {
			if(preg_match('/^[a-zA-Z0-9 \/_.()]+$/', $this->input->post('country'))){				//echo 'entered_2';
				return TRUE;
		    }
		 else{
			$this->form_validation->set_message('check_country', 'Country cannot contain special characters');
			return FALSE;
		 }
		}
   }

   function check_street_locality(){
    if ($this->input->post('permanent_address_line2') === 'none') {
			$this->form_validation->set_message('check_street_locality', 'Street/Locality is required');
			return FALSE;
		} else {
			if(preg_match('/^[a-zA-Z0-9 \/_\-.,]+$/', $this->input->post('permanent_address_line2'))){				//echo 'entered_2';
				return TRUE;
		    }
		 else{
			$this->form_validation->set_message('check_street_locality', 'Street/Locality cannot contain special characters');
			return FALSE;
		 }
		}
   }

   function check_city(){
    if ($this->input->post('permanent_address_city') === 'none') {
			$this->form_validation->set_message('check_city', 'Permanent Address City is required');
			return FALSE;
		} else {
			if(preg_match('/^[a-zA-Z0-9 \/_.]+$/', $this->input->post('permanent_address_city'))){				//echo 'entered_2';
				return TRUE;
		    }
		 else{
			$this->form_validation->set_message('check_city', 'Permanent Address City cannot contain special characters');
			return FALSE;
		 }
		}
   }

   function check_state(){
    if ($this->input->post('permanent_address_state') === 'none') {
			$this->form_validation->set_message('check_state', 'Permanent Address State is required');
			return FALSE;
		} else {
			if(preg_match('/^[a-zA-Z0-9 \/_.()&]+$/', $this->input->post('permanent_address_state'))){				//echo 'entered_2';
				return TRUE;
		    }
		 else{
			$this->form_validation->set_message('check_state', 'Permanent Address State cannot contain special characters');
			return FALSE;
		 }
		}
   }

   function check_hobbies(){

			if(preg_match('/^[a-zA-Z0-9 \/_.\s]+$/', $this->input->post('hobbies'))){				//echo 'entered_2';
				return TRUE;
		    }
		 else{
			$this->form_validation->set_message('check_hobbies', 'Hobbies cannot contain special characters');
			return FALSE;
		 }

   }

   function check_kashmiri_immigrant(){
    if ($this->input->post('kashmiri_immigrant') === 'none') {
			$this->form_validation->set_message('check_kashmiri_immigrant', 'Kashmiri Immigrant is required');
			return FALSE;
		} else {
			if(preg_match('/^[a-zA-Z0-9 \/_.]+$/', $this->input->post('kashmiri_immigrant'))){				//echo 'entered_2';
				return TRUE;
		    }
		 else{
			$this->form_validation->set_message('check_kashmiri_immigrant', 'Kashmiri Immigrant cannot contain special characters');
			return FALSE;
		 }
		}
   }

   function check_name_in_hindi(){
    if ($this->input->post('name_in_hindi') === 'none') {
			$this->form_validation->set_message('check_name_in_hindi', 'Name in Hindi is required');
			return FALSE;
		} else {
			//if(preg_match('/^[a-zA-Z0-9 \/_.\u0900-\u097F]+$/', $this->input->post('name_in_hindi'))){				//echo 'entered_2';
				//return TRUE;
		    //}
		//  else{
		// 	$this->form_validation->set_message('check_name_in_hindi', 'Name in Hindi cannot contain special characters');
		// 	return FALSE;
		//  }
		}
   }

   function check_other_relavant_info(){
    if ($this->input->post('other_relavant_info') === 'none') {
			$this->form_validation->set_message('check_other_relavant_info', 'Other relevant Info is required');
			return FALSE;
		} else {
			if(preg_match('/^[a-zA-Z0-9 \/_.-]+$/', $this->input->post('other_relavant_info'))){				//echo 'entered_2';
				return TRUE;
		    }
		 else{
			$this->form_validation->set_message('check_other_relavant_info', 'Other relevant Info cannot contain special characters');
			return FALSE;
		 }
		}
   }

   function check_bank_name(){
    if ($this->input->post('bank_name') === 'none') {
			$this->form_validation->set_message('check_bank_name', 'Bank Name is required');
			return FALSE;
		} else {
			if(preg_match('/^[a-zA-Z0-9 \/_.-]+$/', $this->input->post('bank_name'))){				//echo 'entered_2';
				return TRUE;
		    }
		 else{
			$this->form_validation->set_message('check_bank_name', 'Bank Name cannot contain special characters');
			return FALSE;
		 }
		}
   }

   function check_account_no(){
    if ($this->input->post('account_no') === 'none') {
			$this->form_validation->set_message('check_account_no', 'Bank Account is required');
			return FALSE;
		} else {
			if(preg_match('/^[a-zA-Z0-9 \/_.-]+$/', $this->input->post('account_no'))){				//echo 'entered_2';
				return TRUE;
		    }
		 else{
			$this->form_validation->set_message('check_account_no', 'Bank Account Number cannot contain special characters');
			return FALSE;
		 }
		}
   }

   function check_ifsc_code(){
    if ($this->input->post('ifsc') === 'none') {
			$this->form_validation->set_message('check_ifsc_code', 'IFSC Code is required');
			return FALSE;
		} else {
			if(preg_match('/^[a-zA-Z0-9 \/_.-]+$/', $this->input->post('ifsc'))){				//echo 'entered_2';
				return TRUE;
		    }
		 else{
			$this->form_validation->set_message('check_ifsc_code', 'IFSC Code cannot contain special characters');
			return FALSE;
		 }
		}
   }

   function check_migration_cert1(){
    if ($this->input->post('migration_cert1') === 'none') {
			$this->form_validation->set_message('check_migration_cert1', 'Migration Certificate is required');
			return FALSE;
		} else {
			if(preg_match('/^[a-zA-Z0-9 \/_.-]+$/', $this->input->post('migration_cert1'))){				//echo 'entered_2';
				return TRUE;
		    }
		 else{
			$this->form_validation->set_message('check_migration_cert1', 'Migration Certificate cannot contain special characters');
			return FALSE;
		 }
		}
   }

   function check_aadhar_passport_no(){
    if ($this->input->post('sel_passport_aadhar') === 'aadhar') {
      if ($this->input->post('aadhar_no') === 'none') {
        $this->form_validation->set_message('check_aadhar_passport_no', 'Aadhar No. is required');
			  return FALSE;
      }
			else {
        if(preg_match('/^[a-zA-Z0-9 \/_.-]+$/', $this->input->post('aadhar_no'))){				//echo 'entered_2';
          return TRUE;
          }
       else{
        $this->form_validation->set_message('check_aadhar_passport_no', 'Aadhar No. cannot contain special characters');
        return FALSE;
       }
      }
		} elseif ($this->input->post('sel_passport_aadhar') === 'passport') {
      if ($this->input->post('passport_no') === 'none') {
        $this->form_validation->set_message('check_aadhar_passport_no', 'Passport No. is required');
			  return FALSE;
      }
			else {
        if(preg_match('/^[a-zA-Z0-9 \/_.-]+$/', $this->input->post('passport_no'))){				//echo 'entered_2';
          return TRUE;
          }
       else{
        $this->form_validation->set_message('check_aadhar_passport_no', 'Passport No. cannot contain special characters');
        return FALSE;
       }
      }
    }
    else {
      # code...
    }
   }

   function check_identificationmark(){
    if ($this->input->post('identification_mark') === 'none') {
			$this->form_validation->set_message('check_identificationmark', 'Identification Mark is required');
			return FALSE;
		} else {
			if(preg_match('/^[a-zA-Z0-9\s.\-]+$/',$this->input->post('identification_mark'))){				//echo 'entered_2';
				#echo 'entered here 1'; exit;
        return TRUE;
		    }
		 else{
			$this->form_validation->set_message('check_identificationmark', 'Identification Mark cannot contain special characters');
			#echo 'entered here 2'; exit;
      return FALSE;
		 }
		}
   }


   function check_name(){
    if ($this->input->post('name') === 'none') {
			$this->form_validation->set_message('check_name', 'Name is required');
			return FALSE;
		} else {
			if(preg_match('/^[a-zA-Z0-9 _.]+$/', $this->input->post('name'))){				//echo 'entered_2';
				return TRUE;
		    }
		 else{
			$this->form_validation->set_message('check_name', 'Name cannot contain special characters');
			return FALSE;
		 }
		}
   }

   function check_email(){
    if ($this->input->post('email') === 'none') {
      $this->form_validation->set_message('check_email', 'Email is required');
			return FALSE;
    }
    else{
    if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
      $this->form_validation->set_message('check_email', 'Email is invalid');
      return FALSE;
    }
    else{
      return TRUE;
    }
    }
   }

   function check_contactno(){
    if ($this->input->post('contact_no') === 'none') {
      $this->form_validation->set_message('check_contactno', 'Contact No. is required required');
			return FALSE;
    }
    else{
    //echo $this->input->post('contact_no'); exit;
    if (!preg_match('/^[0-9 +]+$/', $this->input->post('contact_no'))) {
      $this->form_validation->set_message('check_contactno', 'Contact No. is invalid');
      return FALSE;
    }
    else{
      return TRUE;
    }
    }
   }

   function check_gender(){
    // echo $this->input->post('sex_new');
    // exit;
    if ($this->input->post('sex_new') === 'none') {
      $this->form_validation->set_message('check_gender', 'Gender is required');
			return FALSE;
    }
    else{
    if (!preg_match('/^[a-zA-Z]+$/', $this->input->post('sex_new'))) {
      $this->form_validation->set_message('check_gender', 'Gender is invalid');
      return FALSE;
    }
    else{
      return TRUE;
    }
    }
   }

   function check_month(){
    if ($this->input->post('month') === 'none') {
      $this->form_validation->set_message('check_month', 'Date of Birth (Month) is required');
			return FALSE;
    }
    else{
    if (!preg_match('/^[a-zA-Z0-9]+$/', $this->input->post('month'))) {
      $this->form_validation->set_message('check_month', 'Date of Birth (Month) is invalid');
      return FALSE;
    }
    else{
      return TRUE;
    }
    }
   }

   function check_day(){
    if ($this->input->post('day') === 'none') {
      $this->form_validation->set_message('check_day', 'Date of Birth (Day) is required');
			return FALSE;
    }
    else{
    if (!preg_match('/^[a-zA-Z0-9]+$/', $this->input->post('month'))) {
      $this->form_validation->set_message('check_day', 'Date of Birth (Day) is invalid');
      return FALSE;
    }
    else{
      return TRUE;
    }
    }
   }

   function check_year(){
    if ($this->input->post('dob_year') === 'none') {
      $this->form_validation->set_message('check_year', 'Date of Birth (Year) is required');
			return FALSE;
    }
    else{
    if (!preg_match('/^[a-zA-Z0-9]+$/', $this->input->post('dob_year'))) {
      $this->form_validation->set_message('check_year', 'Date of Birth (Year) is invalid');
      return FALSE;
    }
    else{
      return TRUE;
    }
    }
   }

   function check_bloodgroup(){
    if ($this->input->post('blood_group') === 'none') {
      $this->form_validation->set_message('check_bloodgroup', 'Blood Group is required');
			return FALSE;
    }
    else{
    if (!preg_match('/^[a-zA-Z+-]+$/', $this->input->post('blood_group'))) {
      $this->form_validation->set_message('check_bloodgroup', 'Blood Group is invalid');
      return FALSE;
    }
    else{
      return TRUE;
    }
    }
   }

   function check_category(){
    if ($this->input->post('category') === 'none') {
			$this->form_validation->set_message('check_category', 'Category is required');
			return FALSE;
		} else {
			if(preg_match('/^[a-zA-Z0-9 _.-]+$/', $this->input->post('category'))){				//echo 'entered_2';
				return TRUE;
		    }
		 else{
			$this->form_validation->set_message('check_category', 'Category is invalid');
			return FALSE;
		 }
		}
   }

   function check_allocated_category(){
    if ($this->input->post('allocated_category') === 'none') {
			$this->form_validation->set_message('check_allocated_category', 'Allocated Category is required');
			return FALSE;
		} else {
			if(preg_match('/^[a-zA-Z0-9 _.-]+$/', $this->input->post('allocated_category'))){				//echo 'entered_2';
				return TRUE;
		    }
		 else{
			$this->form_validation->set_message('check_allocated_category', 'Allocated Category is invalid');
			return FALSE;
		 }
		}
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





 }
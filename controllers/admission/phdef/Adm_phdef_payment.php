<?php

class Adm_phdef_payment extends MY_Controller {

	function __construct()
  {
    parent::__construct();
    $this->load->library('CryptAES');
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->library('session');
    $this->load->database();
    $this->load->helper('captcha');
    $this->load->library('encrypt');
    $this->load->library('zip');
    $this->load->library('Pay');
    $this->load->library('email');
    $this->load->library('form_validation');
    $this->load->helper(array('form','url'));
    // $this->load->library('email1');
    $this->load->model('admission/phdef/Adm_phdef_payment_model');
    $this->load->model('admission/phdef/Add_phdef_registration_model');
    $this->load->model('admission/phdef/Adm_phdef_personal_details_model');
    $this->load->model('admission/phdef/Adm_phdef_application_model');
    $this->load->model('admission/phdef/Adm_phdef_document_model','amd');
  }
  //var $salt = "iitism@#2021";
  //var
  function index()
  {
    if(!($this->session->has_userdata('login_type')))
    {
      redirect('admission/phdef/Add_phdef/adm_phdef_login');
    }
    if(!($this->session->has_userdata('pay_start')))
    {
      redirect('admission/phdef/Add_phdef/adm_phdef_login');
    }

    $inc=1;
    // $this->load->model('admission/phd/Adm_phd_payment_model');
    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_phdef_registration_model->get_registration_no_by_email($email);
    $data['registration_detail']=$this->Add_phdef_registration_model->get_registration_detail_by_email($email);
    $data['upload_document']=$this->Adm_phdef_personal_details_model->get_all_document_uploaded($get_reg_no);
    $data['application_details']=$this->Add_phdef_registration_model->get_application_programme_details($get_reg_no);
    $data['personal_details']=$this->Adm_phdef_payment_model->get_adm_phd_appl_ms($get_reg_no);
    $data['program_apply']=$this->Adm_phdef_personal_details_model->get_adm_phd_reg_appl_program($get_reg_no);
    $data['count_amount']=count($data['program_apply']);

    // echo "<pre>";
    // print_r($data);
    // exit;
   //checking filed is blank or not if blank then show error start
   $check_blank_field='';
   $apl_ms=$this->Adm_phdef_personal_details_model->get_adm_phd_appl_ms($get_reg_no);
  //  if($apl_ms[0]['qualifying_degree']=='' || $apl_ms[0]['appl_type']=='' || $apl_ms[0]['first_name']=='' || $apl_ms[0]['category']==''|| $apl_ms[0]['pwd']=='' || $apl_ms[0]['guardian_name']=='' || $apl_ms[0]['guardian_realtion']=='' || $apl_ms[0]['guardian_mobile']=='' || $apl_ms[0]['religion']=='' || $apl_ms[0]['nationality']=='' || $apl_ms[0]['mobile']=='' || $apl_ms[0]['email']=='' || $apl_ms[0]['gender']=='' || $apl_ms[0]['dob']=='' || $apl_ms[0]['adhar']=='' || $apl_ms[0]['maritial_status']=='' || $apl_ms[0]['application_fee']=='')
   if($apl_ms[0]['appl_type']=='' || $apl_ms[0]['first_name']=='' || $apl_ms[0]['category']==''|| $apl_ms[0]['pwd']=='' || $apl_ms[0]['guardian_name']=='' || $apl_ms[0]['guardian_realtion']=='' || $apl_ms[0]['guardian_mobile']=='' || $apl_ms[0]['religion']=='' || $apl_ms[0]['nationality']=='' || $apl_ms[0]['mobile']=='' || $apl_ms[0]['email']=='' || $apl_ms[0]['gender']=='' || $apl_ms[0]['dob']=='' || $apl_ms[0]['adhar']=='' || $apl_ms[0]['maritial_status']=='' || $apl_ms[0]['application_fee']=='')
   {

    $check_blank_field='blank';
    $data['personal_blank']="Personal field found blank";
   }

   $full_part_time_type=$this->Add_phdef_registration_model->get_candidate_type_by_email($email);

   if($full_part_time_type =='Full time')
   {
       if($apl_ms[0]['ism_proj_emp']=='Y')
       {
          if($apl_ms[0]['proj_designation']=='' || $apl_ms[0]['proj_no']=='' || $apl_ms[0]['proj_name']==''|| $apl_ms[0]['proj_pi']=='' || $apl_ms[0]['proj_dept']=='' || $apl_ms[0]['proj_start_date']=='' || $apl_ms[0]['proj_end_date']=='')
          {

            $check_blank_field='blank';
            $data['project_blank']="Project details field is blank";

          }
       }
   }

   if($full_part_time_type =='Part time')  //if partime then fellowsghip row one compulsory
   {
     if($apl_ms[0]['betch_iit']=='Y')
     {

     }
     else
     {
      $have=$this->Adm_phdef_personal_details_model->check_phd_fello_row($get_reg_no,'one');
      if(empty($have))
      {
       $check_blank_field='blank';
       $data_check['fellow_row_one_blank']="fellow row one not inserted field found blank";
      }
     }


   }

   if($apl_ms[0]['qualifying_degree']=='PG') // if qualifying degree is PG then PG row is mandatory
   {

    $have=$this->Adm_phdef_personal_details_model->check_qualification_row($get_reg_no,'PG1 Exam');
     //need to check cgpa value here
     if(empty($have))
     {
       $check_blank_field='blank';
       $data_check['PG_blank']="Qualifying degree PG but row not inserted";
     }
   }




    //  echo $candidate_type;
    //  exit;

   $qual12_details=$this->Adm_phdef_personal_details_model->get_qualification12_details($get_reg_no);
   if($qual12_details[0]['exam_type']=='' || $qual12_details[0]['exam_name']=='' || $qual12_details[0]['institue_name']==''|| $qual12_details[0]['result_status']=='' || $qual12_details[0]['marks_perc_type']=='' || $qual12_details[0]['mark_cgpa_percenatge']=='' || $qual12_details[0]['year_of_passing']=='')
   {
     $check_blank_field='blank';
     $data_check['qualification12_blank']="12th qualification field found blank";
   }

   $qual10_details=$this->Adm_phdef_personal_details_model->get_qualification10_details($get_reg_no);
   if($qual10_details[0]['exam_type']=='' || $qual10_details[0]['exam_name']=='' || $qual10_details[0]['institue_name']==''|| $qual10_details[0]['result_status']=='' || $qual10_details[0]['marks_perc_type']=='' || $qual10_details[0]['mark_cgpa_percenatge']=='' || $qual10_details[0]['year_of_passing']=='')
   {
    $check_blank_field='blank';
    $data_check['qualification10_blank']="10th qualification field found blank";
   }

   $qualug_details=$this->Adm_phdef_personal_details_model->get_qualificationug_details($get_reg_no);

   if($qualug_details[0]['exam_type']=='' || $qualug_details[0]['exam_name']=='' || $qualug_details[0]['discipline']=='' || $qualug_details[0]['institue_name']==''|| $qualug_details[0]['result_status']=='' || $qualug_details[0]['marks_perc_type']=='' || $qualug_details[0]['mark_cgpa_percenatge']=='' || $qualug_details[0]['year_of_passing']=='')
   {
      $data_check['qualificationug_blank']="UG qualification field found blank";
      $check_blank_field='blank';
   }

  //  if(empty($qual10_details) or empty($qual12_details) or empty($qualug_details) or $apl_ms[0]['appl_type'])
  //  {
  //   $check_blank_field='blank';
  //   $data_check['row_not_insert']="10th or 12th,ug,assistance_type_field qualification field found blank";
  //  }

   $p_addr_details_c=$this->Adm_phdef_personal_details_model->get_p_address_details($get_reg_no);
   if($p_addr_details_c[0]->address_type=='' || $p_addr_details_c[0]->line_1=='' || $p_addr_details_c[0]->city==''|| $p_addr_details_c[0]->state=='' || $p_addr_details_c[0]->pincode=='' )
   {
     $check_blank_field='blank';
     $data_check['per_add_blank']=" permanent addrress field found blank";
   }

   $c_addr_detailsc=$this->Adm_phdef_personal_details_model->get_c_address_details($get_reg_no);
   if($c_addr_detailsc[0]->address_type=='' || $c_addr_detailsc[0]->line_1=='' || $c_addr_detailsc[0]->city==''|| $c_addr_detailsc[0]->state=='' || $c_addr_detailsc[0]->pincode=='' )
   {
     $check_blank_field='blank';
     $data_check['cur_add_blank']=" current addrress field found blank";
   }

   $tab=$this->amd->check_tab_fill_status($get_reg_no);
   if($tab[0]['tab1']!='1' || $tab[0]['tab2']!='2' || $tab[0]['tab3']!='3'|| $tab[0]['tab4']!='4')
   {
     $check_blank_field='blank';
     $data_check['Tab_blank']=" Tab field found blank";
   }

   $upload_document=$this->Adm_phdef_personal_details_model->get_all_document_uploaded($get_reg_no);
   foreach ($upload_document as $value)
   {
      if($value['doc_id']=='')
      {
        $check_blank_field='blank';
        $data_check['doc_blank']=" document  field found blank";
      }
      if($value['doc_path']=='')
      {
        $check_blank_field='blank';
        $data_check['doc_blank']=" document  field found blank";
      }
    }

    if($apl_ms[0]['betch_iit']=='Y')
    {

      $have=$this->Adm_phdef_personal_details_model->check_phd_fello_row($get_reg_no,'IIT Fellow');
      //need to check cgpa value here
      if(empty($have))
      {
        $check_blank_field='blank';
        $data_check['iit_fellow_row_blank']=" IIT field fellow row not inserted field found blank";
      }
    }

   //checking filed is blank or not if blank the show error end

  //  echo $check_blank_field; echo "<br>";
  //  echo "<pre>";
  //  print_r($data_check);

   if($check_blank_field=='blank')
   {

    $data['val']="H";
    $this->adm_phdef_header($data);
    $this->load->view('admission/phdef/adm_phdef_error_found',$data_check);
    $this->adm_phdef_footer();
   }
   else
   {
     $data['val']="H";
     $this->adm_phdef_header($data);
     $this->load->view('admission/phdef/adm_phdef_payment_view',$data);
     $this->adm_phdef_footer();
   }


  }

  public function data_encrypt($values)
  {
    $key = $this->salt;
    $aes = new CryptAES();
    // $aes->set_key(base64_decode($key));
    // $aes->require_pkcs5();
    return $aes->encrypt_new($values,$key);
  }

  public function data_decrypt($values)
  {
    $key = $this->salt;
    $aes = new CryptAES();
    // $aes->set_key(base64_decode($key));
    // $aes->require_pkcs5();
    return $aes->decrypt_new($values,$key);
  }

  public function adm_phd_payment()
  {

    $inc=1;
    // $this->load->model('admission/phd/Adm_phd_payment_model');
    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_phdef_registration_model->get_registration_no_by_email($email);
    $data['registration_detail']=$this->Add_phdef_registration_model->get_registration_detail_by_email($email);
    $data['upload_document']=$this->Adm_phdef_personal_details_model->get_all_document_uploaded($get_reg_no);
    $data['application_details']=$this->Add_phdef_registration_model->get_application_programme_details($get_reg_no);
    $data['personal_details']=$this->Adm_phdef_payment_model->get_adm_phd_appl_ms($get_reg_no);
    $data['program_apply']=$this->Adm_phdef_personal_details_model->get_adm_phd_reg_appl_program($get_reg_no);
    $data['order_no']=$this->generate_order_no('PHD');
    $data['count_amount']=count($data['program_apply']);
    $data['val']="H";
    $this->adm_phdef_header($data);
    $this->load->view('admission/phdef/adm_phdef_payment_view',$data);
    $this->adm_phdef_footer();
  }

  function generate_order_no($admn_type,$iit)
  {
    $admn_type = strtoupper($admn_type);
    $type = substr($admn_type, 0, 2);
    $iitism = $iit;
    $string = '0123456789abcdefghijklmnopqrstiuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string_shuffled = str_shuffle($string);
    $tran_id = substr($string_shuffled, 1, 4);
    // $timestamp = strtotime(date('Y-m-d H:i:s'));
    $date=date("Y-m-d");
    $date_explode=explode('-',$date);
    $year = sprintf('%02d', $date_explode[0]);
    $month = sprintf('%02d', $date_explode[1]);
    $day = sprintf('%02d', $date_explode[2]);
    $time=date("H:i:s");
    $time_explode=explode(':',$time);
    $hour = sprintf('%02d', $time_explode[0]);
    $minute = sprintf('%02d', $time_explode[1]);
    $second = sprintf('%02d', $time_explode[2]);
    $timestamp = $day.$month.$year.$hour.$minute.$second;
    $ordernumber = $iitism.$type.$timestamp.$tran_id;
    return $ordernumber;
  }

  public function proceed_to_payment()
  {
    if(!($this->session->has_userdata('login_type')))
    {
      redirect('admission/phdef/Add_phdef/adm_phdef_login');
    }
    // $this->load->model('admission/phd/Adm_phd_payment_model');
    // $this->load->model('admission/phd/Add_phd_registration_model');
    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_phdef_registration_model->get_registration_no_by_email($email);
    $data['personal_details']=$this->Adm_phdef_payment_model->get_adm_phd_appl_ms($get_reg_no);
    if(empty($data['personal_details']))
    {
      echo "something went wrong please try again";
      exit;
    }

    $data['program_apply']=$this->Adm_phdef_payment_model->get_adm_phd_reg_appl_program($get_reg_no);
    $contact_no = $this->input->post('contact_no');
    $reg_id = $this->input->post('reg_id');
    $fee_to_be_paid = $data['personal_details'][0]['application_fee'];
    $gender = $data['personal_details'][0]['gender'];
    $first_name = $this->input->post('first_name');
    $middle_name = $this->input->post('middle_name');
    $last_name = $this->input->post('last_name');
    $category = $this->input->post('category');
    $dob = $this->input->post('dob');
    $paygateway=$this->input->post('pay_mode');
    $payment_method='online';
    $purpose = 'phdef Program apply Fee';
    if($paygateway=='Sbi')
    {
      $order_no=$this->generate_order_no('PHDEF','IITISMSBI');
    }
    else if($paygateway=='Hdfc')
    {
      $order_no=$this->generate_order_no('PHDEF','IITISMHDFC');
    }
    else
    {
      $this->session->set_flashdata('msg','Payment gateway mode does not selected or value does not match');
      redirect('admission/phdef/Adm_phdef_payment');
      exit;
      return false;
    }

    $payment_data_insert = array(
      'reg_id' =>$data['personal_details'][0]['registration_no'],
      'contact_no' =>$data['personal_details'][0]['mobile'],
      'first_name'=>$data['personal_details'][0]['first_name'],
      'middle_name'=>$data['personal_details'][0]['middle_name'],
      'last_name'=>$data['personal_details'][0]['last_name'],
      'category'=>$data['personal_details'][0]['category'],
      'dob'=>$data['personal_details'][0]['dob'],
      'sex'=>$data['personal_details'][0]['gender'],
      'email' =>$email,
      'admn_type'=>'phd',
      'fee_to_be_paid' => $fee_to_be_paid,
    );

    $payment_data = array(
      'reg_id' =>$data['personal_details'][0]['registration_no'],
      'contact_no' =>$data['personal_details'][0]['mobile'],
      'first_name'=>$data['personal_details'][0]['first_name'],
      'middle_name'=>$data['personal_details'][0]['middle_name'],
      'last_name'=>$data['personal_details'][0]['last_name'],
      'category'=>$data['personal_details'][0]['category'],
      'dob'=>$data['personal_details'][0]['dob'],
      'sex'=>$data['personal_details'][0]['gender'],
      'email' =>$email,
      'admn_type'=>'phdef',
      'fee_to_be_paid' => $fee_to_be_paid,
      'fee_order_no' => $order_no
    );

    $condition=array(
      'reg_id'=>$data['personal_details'][0]['registration_no'],
      'contact_no' =>$data['personal_details'][0]['mobile'],
      'email' =>$email,
    );

    // $payment_data_json_encode = json_encode($payment_data);
    // $payment_data_encrypt = $this->data_encrypt($payment_data_json_encode);
    // $payment_data_decrypt = $this->data_decrypt($payment_data_encrypt);
    // $payment_data_json_decode = json_decode($payment_data_decrypt);
    //by this here data is inserted into online_payment_adm_phd_final_fee,of misdev,paylive,admission if not then inserted if avalible then it will not inserted
    //$data['fee_details'] = $this->Adm_phd_payment_model->insert_mis_pay_adm_pay_detail($payment_data_insert,$condition);
    $response_url = base_url('index.php/admission/phdef/Adm_phdef_payment/pay_response');
    $total_amount = $fee_to_be_paid;


    $array_otherdetails = array(
      'user_id' => $reg_id,
      'first_name' => $first_name,
      'middle_name' => $middle_name,
      'last_name' => $last_name,
      'email' => $email,
      'contact' => $contact_no,
      'payment_purpose' => $purpose,
      'payment_type' => 'PHDEF APPLICATION FEE',
      'payment_gateway' => $paygateway,
      'amount' => $fee_to_be_paid,
      'total_amount' => $fee_to_be_paid,
      'order_no' => $order_no,
      'dob' => $dob,
      'category' => $category,
      'gender' => $gender,
      'admn_type' => 'phdef',
      'remark1' => 'NA',
      'module_name' => 'phdef_application_fee'
  );

   $name = '';
   if ($first_name != '') {
      $name = $first_name;
   }

   if ($middle_name != '') {
     $name .= ' ';
     $name .= $middle_name;
   }

   if ($last_name != '') {
     $name .= ' ';
     $name .= $last_name;
   }

  $log_data = array(
      'main_id' => $reg_id,
      'order_no_log' => $order_no,
      'user_id' => $reg_id,
      'name' => $name,
      'email' => $email,
      'contact_no' => $contact_no,
      'dob' => $dob,
      'category' => $category,
      'gender' => $gender,
      'admn_type' => 'phdef',
      'purpose' => $purpose,
      'amount_to_be_paid' => $fee_to_be_paid,
      //'misc_charges' => $fine_amount,
      'total_to_be_paid' => $fee_to_be_paid,
      'reg_id_app_id_other_id' => $reg_id,
      'payment_status' => '0',
      //'pay_code' => $pay_code,
      'payment_mode' => $payment_method,
      'payment_gateway' => $paygateway,
      'db_type' => 'admission'
     );

     $this->Adm_phdef_payment_model->insert_payment_log_data($log_data); // insert in log table

   # echo "<pre>"; print_r($array_otherdetails); exit;

    $pay_lib = new Pay();

    if($paygateway=='Sbi')
    {
      $encrypted['encData'] = $pay_lib->sbi_final_data_encrypt($total_amount,$order_no,$response_url,$array_otherdetails);

      $encrypted['gateway'] = 'sbi';

      $pay_lib->submit($encrypted);
    }
    else if($paygateway=='Hdfc')
    {

      $encrypted['encData'] = $pay_lib->sbi_final_data_encrypt($total_amount,$order_no,$response_url,$array_otherdetails);

      $encrypted['gateway'] = 'hdfc';

      $pay_lib->submit($encrypted);

    }
    else
    {
      $this->session->set_flashdata('msg','Something went wrong!');
      redirect('admission/phdef/Adm_phdef_payment');
      exit;
      return false;
    }
  }

  public function pay_response(){
    $response_data = $_REQUEST['encResponse'];
    if(!empty($response_data))
    {
        $pay_lib = new Pay();

        $decrypt_data = $pay_lib->data_decrypt($response_data);

        $final_data = explode('|',$decrypt_data);

        $bank_fields = explode('^',$final_data[0]);
        $bank_response = explode('^',$final_data[1]);
        $other_details_fields = explode('^',$final_data[2]);
        $other_details_value = explode('^',$final_data[3]);

        $bank_data = array();
        foreach($bank_fields as $key => $fields_name)
        {
            $bank_data[$fields_name] = $bank_response[$key];
        }

        $otherdetails_data = array();
        foreach($other_details_fields as $key => $fields_name)
        {
            $otherdetails_data[$fields_name] = $other_details_value[$key];
        }

        if($bank_data['payment_status']=='FAIL' || $bank_data['payment_status']=='FAILURE')
            {
                $update_array = array(
                    'purpose' => $otherdetails_data['payment_purpose'],
                    'payment_status' => '2', // to be asked from Sir
                    'payment_msg' => $bank_data['payment_status'],
                    'date_of_payment' => $bank_data['txndate'],
                    'order_no' => $bank_data['order_id'],
                    'payment_mode' => $bank_data['pay_mode'],
                    'bank_ref_no' => $bank_data['bank_ref_no'],
                    'gst' => $bank_data['gst'],
                    'othercharges' => $bank_data['othercharges'],
                    'payment_gateway' => 'SBI',
                    'remark1' => $bank_data['cin_no'],  // use as cin no
                  );

                  if($bank_data['merchant_id']=='HDFC') {
                    $new_txn_date = str_replace("/","-",$bank_data['txndate']);
                    $final_txn_date = date("Y-m-d H:i:s", strtotime($new_txn_date));
                    $update_array['date_of_payment'] = $final_txn_date;
                    $update_array['payment_gateway'] = 'HDFC';
                    $bank_data['txndate'] = $final_txn_date;
                  }

                  $where_data = array(
                    'order_no_log' => $bank_data['order_id'],
                    'user_id' => $otherdetails_data['user_id']
         );

                  $update_log_fail = $this->Adm_phdef_payment_model->update_main_payment_log($update_array,$where_data);
                  if ($update_log_fail) {

                    $name = '';
                    if ($otherdetails_data['first_name'] != '') {
                        $name = $otherdetails_data['first_name'];
                    }

                    if ($otherdetails_data['middle_name'] != '') {
                      $name .= ' ';
                      $name .= $otherdetails_data['middle_name'];
                    }
                    if ($otherdetails_data['last_name'] != '') {
                      $name .= ' ';
                      $name .= $otherdetails_data['last_name'];
                    }

                  $failure_final_array['receipt_payment'] = array(
                    'order_id' => $bank_data['order_id'],
                    'bank_ref_no' => $bank_data['bank_ref_no'],
                    'payment_status' => '2',
                    'payment_msg' => $bank_data['pay_status_msg'],
                    'payment_mode' => $bank_data['pay_mode'],
                    'total_to_be_paid' => $otherdetails_data['total_amount'],
                    'gst' => $bank_data['gst'],
                    'other_charges' => $bank_data['othercharges'],
                    'name' => $name,
                    'user_id' => $otherdetails_data['user_id'],
                    'payment_purpose' => $otherdetails_data['payment_purpose'],
                    'email' => $otherdetails_data['email'],
                    'contact' => $otherdetails_data['contact'],
                    'admn_type' => $otherdetails_data['admn_type'],
                    'dob' => $otherdetails_data['dob'],
                    'date_of_payment' => $bank_data['txndate']
                  );
                    $this->adm_phdef_header($data);
                    $this->load->view('admission/phdef/receipt_payment_view',$failure_final_array);
                    $this->adm_phdef_footer();

                }

                //  $this->adm_phd_header($data);
                //  $this->load->view('admission/phd/',$failure_final_array);
                //  $this->adm_phd_footer();

                #$failure_final_array['breakup_fee'] = $this->Convovation_model->breakup_fee_details($where_data);
                  #echo "<pre>"; print_r($failure_final_array); exit;

            }

            else if($bank_data['payment_status']=="PENDING" || $bank_data['payment_status'] == "ABORTED")
            {
                $update_array = array(
                    'purpose' => $otherdetails_data['payment_purpose'],
                    'payment_status' => '0',
                    'payment_msg' => $bank_data['payment_status'],
                    'date_of_payment' => $bank_data['txndate'],
                    'order_no' => $bank_data['order_id'],
                    'payment_mode' => $bank_data['pay_mode'],
                    'bank_ref_no' => $bank_data['bank_ref_no'],
                     'gst' => $bank_data['gst'],
                    'othercharges' => $bank_data['othercharges'],
                    //'mode' => 'online',
                    'payment_gateway' => 'SBI',
                    'remark1' => $bank_data['cin_no'],  // use as cin no
                  );

                  if($bank_data['merchant_id']=='HDFC') {
                    $new_txn_date = str_replace("/","-",$bank_data['txndate']);
                    $final_txn_date = date("Y-m-d H:i:s", strtotime($new_txn_date));
                    $update_array['payment_gateway'] = 'HDFC';
                   // $update_array['date_of_payment'] = $final_txn_date;
                  if($bank_data['payment_status'] == "ABORTED"){
                    $update_array['date_of_payment'] = date("Y-m-d H:i:s");
                    $bank_data['txndate'] = $update_array['date_of_payment'];
                  }else{
                    $update_array['date_of_payment'] = $final_txn_date;
                    $bank_data['txndate'] = $final_txn_date;
                  }
                  }

                  $where_data = array(
                    'order_no_log' => $bank_data['order_id'],
                    'user_id' => $otherdetails_data['user_id']
         );

                  $update_log_pending = $this->Adm_phdef_payment_model->update_main_payment_log($update_array,$where_data);

                  if ($update_log_pending) {

                    $name = ' ';
                    if ($otherdetails_data['first_name'] != '') {
                        $name = $otherdetails_data['first_name'];
                    }

                    if ($otherdetails_data['middle_name'] != '') {
                      $name .= ' ';
                      $name .= $otherdetails_data['middle_name'];
                    }
                    if ($otherdetails_data['last_name'] != '') {
                      $name .= ' ';
                      $name .= $otherdetails_data['last_name'];
                    }

                  $pending_final_array['receipt_payment'] = array(
                    'order_id' => $bank_data['order_id'],
                    'bank_ref_no' => $bank_data['bank_ref_no'],
                    'payment_status' => '0',
                    'payment_msg' => $bank_data['pay_status_msg'],
                    'payment_mode' => $bank_data['pay_mode'],
                    'total_to_be_paid' => $otherdetails_data['total_amount'],
                    'gst' => $bank_data['gst'],
                    'other_charges' => $bank_data['othercharges'],
                    'name' => $name,
                    'user_id' => $otherdetails_data['user_id'],
                    'payment_purpose' => $otherdetails_data['payment_purpose'],
                    'email' => $otherdetails_data['email'],
                    'contact' => $otherdetails_data['contact'],
                    'admn_type' => $otherdetails_data['admn_type'],
                    'dob' => $otherdetails_data['dob'],
                    'date_of_payment' => $bank_data['txndate']
                  );

                  $this->adm_phdef_header($data);
                  $this->load->view('admission/phdef/receipt_payment_view',$pending_final_array);
                  $this->adm_phdef_footer();
            }

          }
            else if($bank_data['payment_status']=="SUCCESS")
            {

                // $selection_degree = $this->Convovation_model->get_selection_degree($otherdetails_data['con_stu_details_id'])[0]['seldegree'];
                // if ($selection_degree == 'inperson') {
                //     $desired_amount = '500';
                // }
                // else{
                //     $desired_amount = '100';
                // }


                // echo '<pre>';
                // print_r($otherdetails_data);
                // print_r($bank_data);
                // echo '</pre>';
                //exit;

                $update_array = array(
                    'purpose' => $otherdetails_data['payment_purpose'],
                    'payment_status' => '1',
                    'payment_msg' => $bank_data['payment_status'],
                    'date_of_payment' => $bank_data['txndate'],
                    'order_no' => $bank_data['order_id'],
                    'payment_mode' => $bank_data['pay_mode'],
                    'bank_ref_no' => $bank_data['bank_ref_no'],
                    'gst' => $bank_data['gst'],
                    'othercharges' => $bank_data['other_charges'],
                    //'mode' => 'online',
                    'payment_gateway' => 'SBI',
                    'remark1' => $bank_data['cin_no'],  // use as cin no
                  );

                  
              if($bank_data['merchant_id']=='HDFC') {
                $new_txn_date = str_replace("/","-",$bank_data['txndate']);
                $final_txn_date = date("Y-m-d H:i:s", strtotime($new_txn_date));
                $update_array['date_of_payment'] = $final_txn_date;
                $update_array['payment_gateway'] = 'HDFC';
                $bank_data['txndate'] = $final_txn_date;
              }

                  $where_data = array(
                    'order_no_log' => $bank_data['order_id'],
                    'user_id' => $otherdetails_data['user_id']
                 );

                $update_log_success = $this->Adm_phdef_payment_model->update_main_payment_log($update_array,$where_data);
                /* update payment in tab details */


                $where_data = array(

                  'registration_no' => $otherdetails_data['user_id']
               );

                $tab_update=array(
                  'tab5'=>5,
                  'tab_status'=>1,
                );

                 $update_payment_tab_details = $this->Adm_phdef_payment_model->update_payment_tab_details($tab_update, $where_data);
                 /* update payment in tab details */

                /* update payment in appl_ms details */

                $where_data = array(

                  'registration_no' => $otherdetails_data['user_id']
               );

                $adm_phd_appl_ms=array(
                  'status'=>'PD',
                  'payment_status'=>'Y',
                  'transaction_id'=> $bank_data['bank_ref_no'],
                  'order_id'=> $bank_data['order_id'],
                  'pay_mode'=>'online',
                  'gateway_type'=>'SBI',
                  'payment_date_time'=> $bank_data['txndate'],
                  'payment_amount'=> $otherdetails_data['amount'],
                );

                $update_payment_appl_ms_details = $this->Adm_phdef_payment_model->update_payment_appl_ms_details($adm_phd_appl_ms, $where_data);

                /* update payment in appl_ms details */

                //echo $this->db->last_query(); die();

                if($update_log_success && $update_payment_tab_details && $update_payment_appl_ms_details) {

                    //$check_db_type = $this->Convovation_model->check_payment_log($bank_data['order_id']);

                    //   $where_data = array(
                    //     //'main_id' => $otherdetails_data['other_id'],
                    //     'user_id' => $otherdetails_data['user_id'],
                    //     'session_year' => $otherdetails_data['session_year'],
                    //     'session' => $otherdetails_data['session'],
                    //     'pay_code' => $otherdetails_data['payment_code']
                    // );

                    // $update_main_table = $this->multiple_fee_model->update_payment_multiple_main_table($where_data , $update_array , $check_db_type['db_type']);

                    $name = '';
                    if ($otherdetails_data['first_name'] != '') {
                        $name = $otherdetails_data['first_name'];
                    }

                    if ($otherdetails_data['middle_name'] != '') {
                      $name .= ' ';
                      $name .= $otherdetails_data['middle_name'];
                    }
                    
                    if ($otherdetails_data['last_name'] != '') {
                      $name .= ' ';
                      $name .= $otherdetails_data['last_name'];
                    }
                    
                    //echo $name; exit;

                    $success_final_array['receipt_payment'] = array(
                      'order_id' => $bank_data['order_id'],
                      'bank_ref_no' => $bank_data['bank_ref_no'],
                      //'payment_status' => $bank_data['payment_status'],
                      'payment_status' => '1',
                      'payment_msg' => $bank_data['pay_status_msg'],
                      'payment_mode' => $bank_data['pay_mode'],
                      'total_to_be_paid' => $otherdetails_data['total_amount'],
                      'gst' => $bank_data['gst'],
                      'other_charges' => $bank_data['othercharges'],
                      'name' => $name,
                      'user_id' => $otherdetails_data['user_id'],
                      // 'session_year' => $otherdetails_data['session_year'],
                      'payment_purpose' => $otherdetails_data['payment_purpose'],
                      'email' => $otherdetails_data['email'],
                      'contact' => $otherdetails_data['contact'],
                      // 'program' => $otherdetails_data['program'],
                      // 'department' => $otherdetails_data['department'],
                      // 'discipline' => $otherdetails_data['discipline'],
                      'admn_type' => $otherdetails_data['admn_type'],
                      'dob' => $otherdetails_data['dob'],
                      'date_of_payment' => $bank_data['txndate']
                    );

                    // $where_data = array(
                    //     'order_id' => $bank_data['order_id'],
                    //     'admn_no' => $otherdetails_data['user_id']
                    //  );

                    //   $success_final_array['breakup_fee'] = $this->Convovation_model->breakup_fee_details($where_data);
                      #echo "<pre>"; print_r($success_final_array); exit;

                      // $this->load->view('template/header_1');
                      // $this->load->view('convocation/receipt_payment_view',$success_final_array);
		                  // $this->load->view('template/footer_1');

                    // echo '<pre>';
                    // print_r($success_final_array);
                    // echo '</pre>';

                    $this->adm_phdef_header($data);
                    $this->load->view('admission/phdef/receipt_payment_view',$success_final_array);
                    $this->adm_phdef_footer();

                    }
                    else
                    {
                        // $data['error_display'] = 'Please Contact Admin and donot attempt multiple transactions';
                        // $data['notices']=$this->Convovation_model->get_all();
                        // $this->load->view('template/header_1');
                        // $this->load->view('convocation/stud_login',$data);
                        // $this->load->view('template/footer_1');
                    }

            }

            else {
                # code...
            }
      }
      else
      {
            $this->session->set_flashdata('flashError' , 'Request empty . Please try again !');
            redirect('admission/phdef/Adm_phdef_payment');
      }
  }

  public function generate_main_id($admn_type,$iit){

        $admn_type = strtoupper($admn_type);
        $type = substr($admn_type, 0, 2);
        $iitism = $iit;
        $string = '012abcXYZ';
        $string_shuffled = str_shuffle($string);
        $tran_id = substr($string_shuffled, 1, 4);
        // $timestamp = strtotime(date('Y-m-d H:i:s'));
        $date=date("Y-m-d");
        $date_explode=explode('-',$date);
        $year = sprintf('%02d', $date_explode[0]);
        $month = sprintf('%02d', $date_explode[1]);
        $day = sprintf('%02d', $date_explode[2]);
        $time=date("H:i:s");
        $time_explode=explode(':',$time);
        $hour = sprintf('%02d', $time_explode[0]);
        $minute = sprintf('%02d', $time_explode[1]);
        $second = sprintf('%02d', $time_explode[2]);
        $timestamp = $day.$month.$year.$hour.$minute.$second;
        $ordernumber = $iitism.$type.$timestamp.$tran_id;
        return $ordernumber;

  }



  public function cancel_payment_from_pay()
  {
    echo "Payment cancel";
    exit;
  }

  public function error_in_payment()
  {
    echo "error occured";
    exit;
  }

  public function reciept_payment_cancel()
  {
    echo "reciept failure and success canel came here";
    exit;
  }

}
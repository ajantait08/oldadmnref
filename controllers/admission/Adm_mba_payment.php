<?php

class Adm_mba_payment extends MY_Controller {

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
    $this->load->model('admission/Adm_mba_payment_model');
    $this->load->model('admission/Add_mba_registration_model');
    $this->load->model('admission/Adm_mba_personal_details_model');
    $this->load->model('admission/Adm_mba_application_model');
    $this->load->model('admission/Adm_mba_document_model','amd');
  }
  // var $salt = "iitism@#2021";
  function index()
  { 

    // echo "reach here";
    // exit;
    if(!($this->session->has_userdata('login_type')))
    {
      redirect('admission/Add_mba/adm_mba_login');
    }
    if(!($this->session->has_userdata('pay_start')))
    {
      redirect('admission/Add_mba/adm_mba_login');
    }
    $inc=1;
    $this->load->model('admission/Adm_mba_payment_model');
    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);
    $data['registration_detail']=$this->Add_mba_registration_model->get_registration_detail_by_email($email);
    $data['upload_document']=$this->Adm_mba_personal_details_model->get_all_document_uploaded($get_reg_no);
    $data['application_details']=$this->Add_mba_registration_model->get_application_programme_details($get_reg_no);
    $data['personal_details']=$this->Adm_mba_payment_model->get_adm_mba_appl_ms($get_reg_no);
    $data['program_apply']=$this->Adm_mba_personal_details_model->get_adm_mba_reg_appl_program($get_reg_no);
    $data['count_amount']=count($data['program_apply']);

    //code added on 23-11-2022 start here
    
    $data['qual12_details']=$this->Adm_mba_personal_details_model->get_qualification12_details($get_reg_no);
    $data['qual10_details']=$this->Adm_mba_personal_details_model->get_qualification10_details($get_reg_no);
    $data['qualug_details']=$this->Adm_mba_personal_details_model->get_qualificationug_details($get_reg_no);
    $data['pg_details']=$this->Adm_mba_personal_details_model->get_qualificationpg_details($get_reg_no);
    $data['exp_details']=$this->Adm_mba_personal_details_model->get_expreince_details($get_reg_no);
    $data['exp_details_d']=$this->Adm_mba_personal_details_model->get_expreince_details_dynamic($get_reg_no);
    $data['cat_details']=$this->Adm_mba_personal_details_model->get_cat_score_details($get_reg_no);
    $data['p_addr_details']=$this->Adm_mba_personal_details_model->get_p_address_details($get_reg_no);
    $data['c_addr_details']=$this->Adm_mba_personal_details_model->get_c_address_details($get_reg_no);
    $data['int_cal_prio']=$this->Adm_mba_personal_details_model->get_call_int_loc($get_reg_no);
   
    $check_blank_field='';
    if(empty($data['int_cal_prio']))
    {
      $check_blank_field='blank';
      $data['field']['interview_location']="Interview location found blank";
    }

    if(empty($data['cat_details']))
    {
      $check_blank_field='blank';
      $data['field']['cat_score']="Fellowship cat score row found blank";
    }

    
    
    $int_view_loc=$this->Adm_mba_personal_details_model->get_call_int_loc($get_reg_no);
    $cat_details=$this->Adm_mba_personal_details_model->get_cat_score_details($get_reg_no);
    if($int_view_loc[0]->priority1=='' || $int_view_loc[0]->priority2=='' || $int_view_loc[0]->priority3=='')
    {
      $check_blank_field='blank';
      $data['field']['inteview_loc']="interview location found blank";
    }

    if($cat_details[0]->cat_reg_no=='' || $cat_details[0]->cat_percentile=='' || $cat_details[0]->cat_score==''|| $cat_details[0]->cat_quant_percentile=='' || $cat_details[0]->cat_quant_score=='' || $cat_details[0]->cat_verb_percentile=='' || $cat_details[0]->cat_verb_score=='' || $cat_details[0]->cat_dis_percentile=='' || $cat_details[0]->cat_dis_score=='')
    {
      $check_blank_field='blank';
      $data['field']['cat_details']="cat grade deatils found blank";
    }

    // echo "<pre>";
    // print_r($cat_details);
    // exit;

    $apl_ms=$this->Adm_mba_payment_model->get_adm_mba_appl_ms($get_reg_no);

    if($apl_ms[0]['first_name']=='' || $apl_ms[0]['category']==''|| $apl_ms[0]['pwd']=='' || $apl_ms[0]['guardian_name']=='' || $apl_ms[0]['guardian_realtion']=='' || $apl_ms[0]['guardian_mobile']=='' || $apl_ms[0]['religion']=='' || $apl_ms[0]['nationality']=='' || $apl_ms[0]['mobile']=='' || $apl_ms[0]['email']=='' || $apl_ms[0]['gender']=='' || $apl_ms[0]['dob']=='' || $apl_ms[0]['maritial_status']=='' || $apl_ms[0]['application_fee']=='')
    {
     $check_blank_field='blank';
     $data['field']['personal_details']="Personal field found blank";
    }



    $qual12_details=$this->Adm_mba_personal_details_model->get_qualification12_details($get_reg_no);
    if($qual12_details[0]['exam_type']=='' || $qual12_details[0]['exam_name']=='' || $qual12_details[0]['institue_name']==''|| $qual12_details[0]['result_status']=='' || $qual12_details[0]['marks_perc_type']=='' || $qual12_details[0]['mark_cgpa_percenatge']=='' || $qual12_details[0]['year_of_passing']=='')
    {
      $check_blank_field='blank';
      $data_check['qualification12_blank']="12th qualification field found blank";
    }

   
    $qual10_details=$this->Adm_mba_personal_details_model->get_qualification10_details($get_reg_no);
    if($qual10_details[0]['exam_type']=='' || $qual10_details[0]['exam_name']=='' || $qual10_details[0]['institue_name']==''|| $qual10_details[0]['result_status']=='' || $qual10_details[0]['marks_perc_type']=='' || $qual10_details[0]['mark_cgpa_percenatge']=='' || $qual10_details[0]['year_of_passing']=='')
    {
      $check_blank_field='blank';
      $data['field']['qualification10_blank']="10th qualification field found blank";
    }

   
    $qualug_details=$this->Adm_mba_personal_details_model->get_qualificationug_details($get_reg_no);
    if($qualug_details[0]['exam_type']=='' || $qualug_details[0]['exam_name']=='' || $qualug_details[0]['institue_name']==''|| $qualug_details[0]['result_status']=='' || $qualug_details[0]['marks_perc_type']=='' || $qualug_details[0]['mark_cgpa_percenatge']=='' || $qualug_details[0]['year_of_passing']=='')
    { 
      $data['field']['qualificationug_blank']="UG qualification field found blank";
      $check_blank_field='blank';
    }


    $p_addr_details_c=$this->Adm_mba_personal_details_model->get_p_address_details($get_reg_no);
    if($p_addr_details_c[0]->address_type=='' || $p_addr_details_c[0]->line_1=='' || $p_addr_details_c[0]->city==''|| $p_addr_details_c[0]->state=='' || $p_addr_details_c[0]->pincode=='' )
    {
      $check_blank_field='blank';
      $data['field']['per_add_blank']=" permanent addrress field found blank";
    }


    $c_addr_detailsc=$this->Adm_mba_personal_details_model->get_c_address_details($get_reg_no);
    if($c_addr_detailsc[0]->address_type=='' || $c_addr_detailsc[0]->line_1=='' || $c_addr_detailsc[0]->city==''|| $c_addr_detailsc[0]->state=='' || $c_addr_detailsc[0]->pincode=='')
    {
      $check_blank_field='blank';
      $data['field']['cur_add_blank']="current addrress field found blank";
    }


    $all_doc=$this->amd->get_all_document_uploaded($get_reg_no);
    if(empty($all_doc))
    {
      $check_blank_field='blank';
      $data['field']['docu_row']="no doc row found blank";
    }

    foreach ($all_doc as $value) 
    {   
     
      if($value['doc_id']=='')
      {
        $check_blank_field='blank';
        $data['field']['doc_id']=" document id field found blank";
      }
      if($value['doc_path']=='')
      {
        $check_blank_field='blank';
        $data['field']['doc_path']=" document path field found blank";
      }
    }

    $tb_check=$this->amd->check_tab_fill_status($get_reg_no);
  
    if($tb_check[0]['tab1']=='' || $tb_check[0]['tab2']==''||  $tb_check[0]['tab3']=='')
    { 
      $check_blank_field='blank';
      $data['field']['tab_status']="Tab status found blank";
    }

    //code added on 23-11-2022 end here
    if($check_blank_field=='blank')
    {
      // echo "<pre>";
      // print_r($data['field']);
      // echo "<pre>";
      // print_r($cat_details);
      // print_r($qual10_details);
      // print_r($qualug_details);
      // print_r($tb_check);
      // print_r($all_doc);
      // print_r( $p_addr_details_c);
      
      // exit;
      $data['val']="H";
      $this->adm_mba_header($data);
      $this->load->view('admission/adm_mba_error_field',$data);
      $this->adm_mba_footer();
    }
    else
    {
     $data['val']="H";
      $this->adm_mba_header($data);
     $this->load->view('admission/adm_mba_payment_view',$data);
      $this->adm_mba_footer();
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

  public function adm_mba_payment()
  { 

    $inc=1;
    $this->load->model('admission/Adm_mba_payment_model');
    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);
    $data['registration_detail']=$this->Add_mba_registration_model->get_registration_detail_by_email($email);
    $data['upload_document']=$this->Adm_mba_personal_details_model->get_all_document_uploaded($get_reg_no);
    $data['application_details']=$this->Add_mba_registration_model->get_application_programme_details($get_reg_no);
    $data['personal_details']=$this->Adm_mba_payment_model->get_adm_mba_appl_ms($get_reg_no);
    $data['program_apply']=$this->Adm_mba_personal_details_model->get_adm_mba_reg_appl_program($get_reg_no);
    $data['order_no']=$this->generate_order_no('MBA');
    $data['count_amount']=count($data['program_apply']);
    $data['val']="H";
    $this->adm_mba_header($data);
    $this->load->view('admission/adm_mba_payment_view',$data);
    $this->adm_mba_footer();
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
      redirect('admission/Add_mba/adm_mba_login');
    }
    $this->load->model('admission/Adm_mba_payment_model');
    $this->load->model('admission/Add_mba_registration_model');
    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);
    $data['personal_details']=$this->Adm_mba_payment_model->get_adm_mba_appl_ms($get_reg_no);
    if(empty($data['personal_details']))
    {
      echo "something went wrong please try again";
      exit;
    }
    $data['program_apply']=$this->Adm_mba_payment_model->get_adm_mba_reg_appl_program($get_reg_no);
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
    $purpose = 'MBA Program apply Fee';
    if($paygateway=='Sbi')
    {
      $order_no=$this->generate_order_no('MBA','IITISMSBI');
    }
    else if($paygateway=='Hdfc')
    {
      $order_no=$this->generate_order_no('MBA','IITISMHDFC');
    }
    else
    {
      $this->session->set_flashdata('msg','Payment gateway mode does not selected or value does not match');
      redirect('admission/Adm_mba_payment');
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
      'admn_type'=>'MBA',
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
      'admn_type'=>'MBA',
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
    //by this here data is inserted into online_payment_adm_mba_final_fee,of misdev,paylive,admission if not then inserted if avalible then it will not inserted
    // $data['fee_details'] = $this->Adm_mba_payment_model->insert_mis_pay_adm_pay_detail($payment_data_insert,$condition);


    //Added By Sourajit Mitter on 25/11/2022

    $response_url = base_url('index.php/admission/Adm_mba_payment/pay_response');
    $total_amount = $fee_to_be_paid;

    $array_otherdetails = array(
      'user_id' => $reg_id,
      'first_name' => $first_name,
      'middle_name' => $middle_name,
      'last_name' => $last_name,
      'email' => $email,
      'contact' => $contact_no,
      'payment_purpose' => $purpose,
      'payment_type' => 'MBA APPLICATION FEE',
      'payment_gateway' => $paygateway,
      'amount' => $fee_to_be_paid,
      'total_amount' => $fee_to_be_paid,
      'order_no' => $order_no,
      'dob' => $dob,
      'category' => $category,
      'gender' => $gender,
      'admn_type' => 'mba',
      'remark1' => 'NA',
      'module_name' => 'mba_application_fee'
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
    'admn_type' => 'mba',
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

   $this->Adm_mba_payment_model->insert_payment_log_data($log_data); // insert in log table

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
      redirect('admission/Adm_mba_payment');
      exit;
      return false;
    }


  }

  public function cancel_payment_from_pay()
  {
     echo "Payment cancel";
    // echo "option value Hdfc";
    // echo "text value in option HDFC";
    
    exit;
  }

  public function error_in_payment()
  {
    echo "error";
    exit;
  }

  public function reciept_payment_cancel()
  {
    echo "reciept failure ";
    exit;
  }




  //Added By Sourajit Mitter on 25/11/2022

  public function pay_response()
  {
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

        if($bank_data['payment_status']=='FAIL')
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

          $where_data = array(
            'order_no_log' => $bank_data['order_id'],
            'user_id' => $otherdetails_data['user_id']
          );

          $update_log_fail = $this->Adm_mba_payment_model->update_main_payment_log($update_array,$where_data);
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
            $this->adm_mba_header($data);
            $this->load->view('admission/receipt_payment_view',$failure_final_array);
            $this->adm_mba_footer();

        }

        }
        else if($bank_data['payment_status']=="PENDING")
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

          $where_data = array(
            'order_no_log' => $bank_data['order_id'],
            'user_id' => $otherdetails_data['user_id']
          );

          $update_log_pending = $this->Adm_mba_payment_model->update_main_payment_log($update_array,$where_data);

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

          $this->adm_mba_header($data);
          $this->load->view('admission/receipt_payment_view',$pending_final_array);
          $this->adm_mba_footer();
          }
        }

        else if($bank_data['payment_status']=="SUCCESS")
        {
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

              $where_data = array(
                'order_no_log' => $bank_data['order_id'],
                'user_id' => $otherdetails_data['user_id']
            );

            $update_log_success = $this->Adm_mba_payment_model->update_main_payment_log($update_array,$where_data);

            $where_data = array(

              'registration_no' => $otherdetails_data['user_id']
           );

            $tab_update=array(
              'tab5'=>5,
              'tab_status'=>1,
            );

            $update_payment_tab_details = $this->Adm_mba_payment_model->update_payment_tab_details($tab_update, $where_data);
                 /* update payment in tab details */

                /* update payment in appl_ms details */

                $where_data = array(

                  'registration_no' => $otherdetails_data['user_id']
               );

                $adm_mba_appl_ms=array(
                  'status'=>'PD',
                  'payment_status'=>'Y',
                  'transaction_id'=> $bank_data['bank_ref_no'],
                  'order_id'=> $bank_data['order_id'],
                  'pay_mode'=>'online',
                  'gateway_type'=>'SBI',
                  'payment_date_time'=> $bank_data['txndate'],
                  'payment_amount'=> $otherdetails_data['amount'],
                );

                $update_payment_appl_ms_details = $this->Adm_mba_payment_model->update_payment_appl_ms_details($adm_mba_appl_ms, $where_data);

                // echo $update_log_success; echo "<br>";
                // echo $update_payment_tab_details; echo "<br>";
                // echo $update_payment_appl_ms_details; echo "<br>";

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
                  // exit;
                  // echo '</pre>';

                  $this->adm_mba_header($data);
                  $this->load->view('admission/receipt_payment_view',$success_final_array);
                  $this->adm_mba_footer();

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
        else
        {
          # code...
        }

        
      }
      else
      {
        $this->session->set_flashdata('flashError' , 'Request empty . Please try again !');
        redirect('admission/Adm_mba_payment');
      }
  }

}
?>

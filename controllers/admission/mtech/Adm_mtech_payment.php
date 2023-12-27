<?php

class Adm_mtech_payment extends MY_Controller {

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
    $this->load->library('email');
    $this->load->library('form_validation');
    $this->load->helper(array('form','url'));
    // $this->load->library('email1');
    $this->load->model('admission/mtech/Adm_mtech_payment_model');
    $this->load->model('admission/mtech/Add_mtech_registration_model');
    $this->load->model('admission/mtech/Adm_mtech_personal_details_model');
    $this->load->model('admission/mtech/Adm_mtech_application_model');
    $this->load->model('admission/mtech/Adm_mtech_document_model','amd');
  }
  var $salt = "iitism@#2021";
  function index()
  { 
    if(!($this->session->has_userdata('login_type')))
    {
      redirect('admission/mtech/Add_mtech/adm_mtech_login');
    }
    if(!($this->session->has_userdata('pay_start')))
    {
      redirect('admission/mtech/Add_mtech/adm_mtech_login');
    }
    $inc=1;
    $this->load->model('admission/mtech/Adm_mtech_payment_model');
    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $data['registration_detail']=$this->Add_mtech_registration_model->get_registration_detail_by_email($email);
    $data['upload_document']=$this->Adm_mtech_personal_details_model->get_all_document_uploaded($get_reg_no);
    $data['application_details']=$this->Add_mtech_registration_model->get_application_programme_details($get_reg_no);
    $data['personal_details']=$this->Adm_mtech_payment_model->get_adm_mtech_appl_ms($get_reg_no);
    $data['program_apply']=$this->Adm_mtech_personal_details_model->get_adm_mtech_reg_appl_program($get_reg_no);
    $data['count_amount']=count($data['program_apply']);
   
   //checking filed is blank or not if blank the show error start
   $check_blank_field='';
   $apl_ms=$this->Adm_mtech_personal_details_model->get_adm_mtech_appl_ms($get_reg_no);
   if($apl_ms[0]['appl_type']=='' || $apl_ms[0]['first_name']=='' || $apl_ms[0]['category']==''|| $apl_ms[0]['pwd']=='' || $apl_ms[0]['guardian_name']=='' || $apl_ms[0]['guardian_realtion']=='' || $apl_ms[0]['guardian_mobile']=='' || $apl_ms[0]['religion']=='' || $apl_ms[0]['nationality']=='' || $apl_ms[0]['mobile']=='' || $apl_ms[0]['email']=='' || $apl_ms[0]['gender']=='' || $apl_ms[0]['dob']=='' || $apl_ms[0]['adhar']=='' || $apl_ms[0]['maritial_status']=='' || $apl_ms[0]['application_fee']=='')
   {
    
    $check_blank_field='blank';
    $data['personal_blank']="Personal field found blank";
    
   }

   $candidate_type=$this->Add_mtech_registration_model->get_candidate_type_by_email($email);
  //  echo $candidate_type;
  //  exit;
   if($candidate_type=='GATE Candidates')
   {  
     
      // $gate_doc_check=$this->amd->count_document_id($get_reg_no,'gate');
      // if($gate_doc_check=='not')
      // {
      //   $check_blank_field='blank';
      //   $data_check['gate_detail_blank_doc_id']="Gate doc_id  field not found";
      // }

      $gate_details=$this->Adm_mtech_personal_details_model->get_gate_score_details($get_reg_no);
      if($gate_details[0]->gate_reg_no=='' || $gate_details[0]->gate_score=='' || $gate_details[0]->year_pass==''|| $gate_details[0]->valid_upto=='' )
      {
        $check_blank_field='blank';
        $data_check['gate_detail_blank']=" Gate details  field found blank";
      }

      if($apl_ms[0]['coap_reg_id']=='')
      { 
        $data_check['coap_blank']="Coap field found blank";
        $check_blank_field='blank';
      }
   }

   $qual12_details=$this->Adm_mtech_personal_details_model->get_qualification12_details($get_reg_no);
   if($qual12_details[0]['exam_type']=='' || $qual12_details[0]['exam_name']=='' || $qual12_details[0]['institue_name']==''|| $qual12_details[0]['result_status']=='' || $qual12_details[0]['marks_perc_type']=='' || $qual12_details[0]['mark_cgpa_percenatge']=='' || $qual12_details[0]['year_of_passing']=='')
   {
     $check_blank_field='blank';
     $data_check['qualification12_blank']="12th qualification field found blank";
   }
   
   $qual10_details=$this->Adm_mtech_personal_details_model->get_qualification10_details($get_reg_no);
   if($qual10_details[0]['exam_type']=='' || $qual10_details[0]['exam_name']=='' || $qual10_details[0]['institue_name']==''|| $qual10_details[0]['result_status']=='' || $qual10_details[0]['marks_perc_type']=='' || $qual10_details[0]['mark_cgpa_percenatge']=='' || $qual10_details[0]['year_of_passing']=='')
   {
    $check_blank_field='blank';
    $data_check['qualification10_blank']="10th qualification field found blank";
   }
   
   $qualug_details=$this->Adm_mtech_personal_details_model->get_qualificationug_details($get_reg_no);
   if($qualug_details[0]['exam_type']=='' || $qualug_details[0]['exam_name']=='' || $qualug_details[0]['discipline']=='' || $qualug_details[0]['institue_name']==''|| $qualug_details[0]['result_status']=='' || $qualug_details[0]['marks_perc_type']=='' || $qualug_details[0]['mark_cgpa_percenatge']=='' || $qualug_details[0]['year_of_passing']=='')
   { 
      $data_check['qualificationug_blank']="UG qualification field found blank";
      $check_blank_field='blank';
   }
   
   $p_addr_details_c=$this->Adm_mtech_personal_details_model->get_p_address_details($get_reg_no);
   if($p_addr_details_c[0]->address_type=='' || $p_addr_details_c[0]->line_1=='' || $p_addr_details_c[0]->city==''|| $p_addr_details_c[0]->state=='' || $p_addr_details_c[0]->pincode=='' )
   {
     $check_blank_field='blank';
     $data_check['per_add_blank']=" permanent addrress field found blank";
   }

   $c_addr_detailsc=$this->Adm_mtech_personal_details_model->get_c_address_details($get_reg_no);
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

   $upload_document=$this->Adm_mtech_personal_details_model->get_all_document_uploaded($get_reg_no);
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

   //checking filed is blank or not if blank the show error end
   
   if($check_blank_field=='blank')
   {
    
    $data['val']="H";
    $this->adm_mtech_header($data);
    $this->load->view('admission/mtech/adm_mtech_error_found',$data_check);
    $this->adm_mtech_footer();
   }
   else
   {
     $data['val']="H";
     $this->adm_mtech_header($data);
     $this->load->view('admission/mtech/adm_mtech_payment_view',$data);
     $this->adm_mtech_footer();
   }
    

  }

  public function data_encrypt($values) 
  {
    $key = $this->salt;
    $aes = new CryptAES();
    $aes->set_key(base64_decode($key));
    $aes->require_pkcs5();
    return $aes->encrypt($values);
  }

  public function data_decrypt($values)
  {
    $key = $this->salt;
    $aes = new CryptAES();
    $aes->set_key(base64_decode($key));
    $aes->require_pkcs5();
    return $aes->decrypt($values);
  }

  public function adm_mtech_payment()
  { 

    $inc=1;
    $this->load->model('admission/mtech/Adm_mtech_payment_model');
    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $data['registration_detail']=$this->Add_mtech_registration_model->get_registration_detail_by_email($email);
    $data['upload_document']=$this->Adm_mtech_personal_details_model->get_all_document_uploaded($get_reg_no);
    $data['application_details']=$this->Add_mtech_registration_model->get_application_programme_details($get_reg_no);
    $data['personal_details']=$this->Adm_mtech_payment_model->get_adm_mtech_appl_ms($get_reg_no);
    $data['program_apply']=$this->Adm_mtech_personal_details_model->get_adm_mtech_reg_appl_program($get_reg_no);
    $data['order_no']=$this->generate_order_no('MTECH');
    $data['count_amount']=count($data['program_apply']);
   
    $data['val']="H";
    $this->adm_mtech_header($data);
    $this->load->view('admission/mtech/adm_mtech_payment_view',$data);
    $this->adm_mtech_footer();
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
      redirect('admission/mtech/Add_mtech/adm_mtech_login');
    }
    $this->load->model('admission/mtech/Adm_mtech_payment_model');
    $this->load->model('admission/mtech/Add_mtech_registration_model');
    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $data['personal_details']=$this->Adm_mtech_payment_model->get_adm_mtech_appl_ms($get_reg_no);
    if(empty($data['personal_details']))
    {
      echo "something went wrong please try again";
      exit;
    }
    $data['program_apply']=$this->Adm_mtech_payment_model->get_adm_mtech_reg_appl_program($get_reg_no);
    $contact_no = $this->input->post('contact_no');
    $reg_id = $this->input->post('reg_id');
    $fee_to_be_paid = $data['personal_details'][0]['application_fee'];
    $first_name = $this->input->post('first_name');
    $middle_name = $this->input->post('middle_name');
    $last_name = $this->input->post('last_name');
    $category = $this->input->post('category');
    $dob = $this->input->post('dob');
    $paygateway=$this->input->post('pay_mode');
    if($paygateway=='Sbi')
    {
      $order_no=$this->generate_order_no('MTECH','IITISMSBI');
    }
    else if($paygateway=='Hdfc')
    {
      $order_no=$this->generate_order_no('MTECH','IITISMHDFC');
    }
    else
    {
      $this->session->set_flashdata('msg','Payment gateway mode does not selected or value does not match');
      redirect('admission/mtech/Adm_mtech_payment');
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
      'admn_type'=>'mtech',
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
      'admn_type'=>'mtech',
      'fee_to_be_paid' => $fee_to_be_paid,
      'fee_order_no' => $order_no
    );

    $condition=array(
      'reg_id'=>$data['personal_details'][0]['registration_no'],
      'contact_no' =>$data['personal_details'][0]['mobile'],
      'email' =>$email,
    );
    
    $payment_data_json_encode = json_encode($payment_data);
    $payment_data_encrypt = $this->data_encrypt($payment_data_json_encode);
    $payment_data_decrypt = $this->data_decrypt($payment_data_encrypt);
    $payment_data_json_decode = json_decode($payment_data_decrypt);
    //by this here data is inserted into online_payment_adm_mtech_final_fee,of misdev,paylive,admission if not then inserted if avalible then it will not inserted
    $data['fee_details'] = $this->Adm_mtech_payment_model->insert_mis_pay_adm_pay_detail($payment_data_insert,$condition);
    if($paygateway=='Sbi')
    {
      $this->load->helper('url');
      ?>
      <script>
        window.location.href="https://pay.iitism.ac.in/index.php/Mtechadmission/Adm_mtech_fee/pay?q=" + '<?php echo urlencode($payment_data_encrypt);?>';
      </script>
      <?php
    }
    else if($paygateway=='Hdfc')
    {
      $this->load->helper('url');
      ?>
      <script>
        window.location.href="https://pay.iitism.ac.in/index.php/Mtechadmission/Adm_mtech_mba_fee/pay?q=" + '<?php echo urlencode($payment_data_encrypt);?>';
      </script>
      <?php
    }
    else
    {
      $this->session->set_flashdata('msg','Something went wrong!');
      redirect('admission/mtech/Adm_mtech_payment');
      exit;
      return false;
    }
  }

  public function cancel_payment_from_pay()
  {
    echo "Payment cancel";
    exit;
  }

  public function error_in_payment()
  {
    echo "error may";
    exit;
  }

  public function reciept_payment_cancel()
  {
    echo "reciept failure and success canel came here";
    exit;
  }

}
?>

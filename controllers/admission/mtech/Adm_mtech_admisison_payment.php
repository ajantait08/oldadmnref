<?php

class Adm_mtech_admisison_payment extends MY_Controller {

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
    $this->load->model('admission/mtech/Adm_mtech_admission_payment_model');
    $this->load->model('admission/mtech/Add_mtech_registration_model');
    $this->load->model('admission/mtech/Adm_mtech_personal_details_model');
    $this->load->model('admission/mtech/Adm_mtech_application_model');
  }
  var $salt = "iitism@#2021";
  function index()
  {
    if(!($this->session->has_userdata('login_type')))
    {
      redirect('admission/mtech/Adm_mtech_registration/logout');
    }
    // if(!($this->session->has_userdata('pay_start')))
    // {
    //   redirect('admission/Add_mtech/adm_mtech_login');
    // }
    $inc=1;
    $this->load->model('admission/mtech/Adm_mtech_admission_payment_model');
    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $data['registration_detail']=$this->Add_mtech_registration_model->get_registration_detail_by_email($email);
    $data['upload_document']=$this->Adm_mtech_personal_details_model->get_all_document_uploaded($get_reg_no);
    $data['application_details']=$this->Add_mtech_registration_model->get_application_programme_details($get_reg_no);
    $data['personal_details']=$this->Adm_mtech_admission_payment_model->get_adm_mtech_appl_ms($get_reg_no);
    $data['program_apply']=$this->Adm_mtech_personal_details_model->get_adm_mtech_reg_appl_program($get_reg_no);
    $data['count_amount']=count($data['program_apply']);
    $data['val']="H";
    $this->adm_mtech_header($data);
    $this->load->view('admission/mtech/adm_mtech_admisison_payment_view',$data);
    $this->adm_mtech_footer();

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
    $data['program_selected'] = $this->input->post('optradio');
    $data['program_desc'] = $this->input->post('program_desc');
    //exit;
    $inc=1;
    $this->load->model('admission/mtech/Adm_mtech_admission_payment_model');
    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $data['registration_detail']=$this->Add_mtech_registration_model->get_registration_detail_by_email($email);
    $data['upload_document']=$this->Adm_mtech_personal_details_model->get_all_document_uploaded($get_reg_no);
    $data['application_details']=$this->Add_mtech_registration_model->get_application_programme_details($get_reg_no);
    //$data['personal_details']=$this->Adm_mtech_admission_payment_model->get_adm_mtech_appl_ms($get_reg_no);
    $data['personal_details']=$this->Adm_mtech_admission_payment_model->get_adm_mtech_appl_ms_selected($get_reg_no,$data['program_selected']);
    // echo '<pre>';
    // print_r($data['personal_details']);
    // echo '</pre>';
    // exit;
    //$data['program_apply']=$this->Adm_mtech_personal_details_model->get_adm_mtech_reg_appl_program($get_reg_no);
    $data['program_apply']=$this->Adm_mtech_admission_payment_model->get_adm_mtech_reg_appl_program_selected($get_reg_no,$data['program_selected']);
    // echo '<pre>';
    // print_r($data['program_apply']);
    // echo '</pre>';
    // exit;
    $data['order_no']=$this->generate_order_no('ADMmtech','IIT');
    $data['count_amount']=count($data['program_apply']);
    $data['val']="H";
    $this->adm_mtech_header($data);
    $this->load->view('admission/mtech/adm_mtech_admisison_payment_view',$data);
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
    $data['program_selected'] = $this->input->post('program_selected');
    if(!($this->session->has_userdata('login_type')))
    {
      redirect('admission/mtech/Adm_mtech_registration/logout');
    }
    $this->load->model('admission/mtech/Adm_mtech_admission_payment_model');
    $this->load->model('admission/mtech/Add_mtech_registration_model');
    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $data['personal_details']=$this->Adm_mtech_admission_payment_model->get_adm_mtech_appl_ms_selected($get_reg_no,$data['program_selected']);
    //$data['personal_details']=$this->Adm_mtech_admission_payment_model->get_adm_mtech_appl_ms($get_reg_no);
    if(empty($data['personal_details']))
    {
      echo "something went wrong please try again";
      exit;
    }
    //$data['program_apply']=$this->Adm_mtech_admission_payment_model->get_adm_mtech_reg_appl_program($get_reg_no);
    $data['program_apply']=$this->Adm_mtech_admission_payment_model->get_adm_mtech_reg_appl_program_selected($get_reg_no,$data['program_selected']);
    $contact_no = $this->input->post('contact_no');
    $reg_id = $this->input->post('reg_id');
    $fee_to_be_paid = $data['personal_details'][0]['admission_fee'];
    $first_name = $this->input->post('first_name');
    $middle_name = $this->input->post('middle_name');
    $last_name = $this->input->post('last_name');
    $category = $this->input->post('category');
    $dob = $this->input->post('dob');
    $paygateway=$this->input->post('pay_mode');
    if($paygateway=='Sbi')
    {
      $order_no=$this->generate_order_no('mtech','IITISMSBI');
    }
    else if($paygateway=='Hdfc')
    {
      $order_no=$this->generate_order_no('mtech','IITISMHDFC');
    }
    else
    {
      $this->session->set_flashdata('msg','Payment gateway mode does not selected or value does not match');
      redirect('admission/Adm_mtech_payment');
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
      //'admn_type'=>'mtech',
      'admn_type' => $data['personal_details'][0]['program_id'],
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
      //'admn_type'=>'mtech',
      'admn_type' => $data['personal_details'][0]['program_id'],
      'fee_to_be_paid' => $fee_to_be_paid,
      'fee_order_no' => $order_no
    );

    $condition=array(
      'reg_id'=>$data['personal_details'][0]['registration_no'],
      'contact_no' =>$data['personal_details'][0]['mobile'],
      'email' =>$email,
    );

    // echo '<pre>';
    // print_r($payment_data_insert);
    // print_r($payment_data);
    // echo '</pre>';
    //exit;


    $payment_data_json_encode = json_encode($payment_data);
    $payment_data_encrypt = $this->data_encrypt($payment_data_json_encode);
    $payment_data_decrypt = $this->data_decrypt($payment_data_encrypt);
    $payment_data_json_decode = json_decode($payment_data_decrypt);
    //by this here data is inserted into online_payment_adm_mtech_final_fee,of misdev,paylive,admission if not then inserted if avalible then it will not inserted
    $data['fee_details'] = $this->Adm_mtech_admission_payment_model->insert_mis_pay_adm_pay_detail($payment_data_insert,$condition);
    // echo '<pre>';
    // print_r($data['fee_details']);
    // echo '</pre>';
    // exit;
    if($paygateway=='Sbi')
    {
      $this->load->helper('url');
      ?>
      <script>
        window.location.href="https://pay.iitism.ac.in/index.php/Mtech_fee_pay_adm/Adm_mtech_fee/pay?q=" + '<?php echo urlencode($payment_data_encrypt);?>';
      </script>
      <?php
    }
    else if($paygateway=='Hdfc')
    {
      $this->load->helper('url');
      ?>
      <script>
        window.location.href="https://pay.iitism.ac.in/index.php/mtechadmissionhdfcdev/Adm_mtech_hdfc_fee/pay?q=" + '<?php echo urlencode($payment_data_encrypt);?>';
      </script>
      <?php
    }
    else
    {
      $this->session->set_flashdata('msg','Something went wrong!');
      redirect('admission/Adm_mtech_payment');
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

<?php

class Adm_mba_fee_payment extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->library('CryptAES');
  }
  var $salt = "iitism@#2021";

  public function index()
  {
    $this->load->view('new_admission_common/fee_payment_view');
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

  public function proceed_to_payment()
  { 
    if(!($this->session->has_userdata('login_type')))
    {
      redirect('admission/Add_mba/adm_mba_login');
    }
    if(!($this->session->has_userdata('testing')))
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
    $email = $this->input->post('email');
    $contact_no = $this->input->post('contact_no');
    $reg_id = $this->input->post('reg_id');
    $fee_to_be_paid = $this->input->post('fee_to_be_paid');
    $first_name = $this->input->post('first_name');
    $middle_name = $this->input->post('middle_name');
    $last_name = $this->input->post('last_name');
    $category = $this->input->post('category');
    $dob = $this->input->post('dob');
    $order_no = $this->input->post('order_no');
    
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
    
    $payment_data_json_encode = json_encode($payment_data);
    $payment_data_encrypt = $this->data_encrypt($payment_data_json_encode);
    $payment_data_decrypt = $this->data_decrypt($payment_data_encrypt);
    $payment_data_json_decode = json_decode($payment_data_decrypt);
    // $data['count_amount']=count($data['program_apply']);
    // $data['fee_Amount_tot']=$data['application_fee'];
    // $data['fee_details'] = $this->fee_payment_model->get_fee_details($reg_id,$email,$contact_no);
    // echo "<Pre>";
    // print_r($payment_data);
    // exit;
    $data['fee_details'] = $this->Adm_mba_payment_model->insert_mis_pay_adm_pay_detail($payment_data_insert,$condition);
    
    // if($data['fee_details'][0]['fee_to_be_paid'] === $fee_to_be_paid)
    if($order_no)
    { 
      // echo "<pre>";
      // print_r($payment_data_json_decode);
      // exit;
      $this->load->helper('url');
      ?>
      <script>
        window.location.href="https://pay.iitism.ac.in/index.php/Mbaadmission/Adm_mba_fee/pay?q=" + '<?php echo urlencode($payment_data_encrypt);  ?>';
      </script>
      <?php
      // redirect('https://pay.iitism.ac.in/index.php/Newadmission/newadmission_fee/pay?vcode='.$payment_data_encrypt);
    }
    else
    {
      $data['error']='Fee amount does not match !';
      // $this->load->view('new_admission_common/new_admission_login_jee',$data);
    }
  }
}


?>
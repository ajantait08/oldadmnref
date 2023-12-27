<?php

class Adm_mba_admisison_payment extends MY_Controller {

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
    $this->load->model('admission/Adm_mba_admission_payment_model');
    $this->load->model('admission/Add_mba_registration_model');
    $this->load->model('admission/Adm_mba_personal_details_model');
    $this->load->model('admission/Adm_mba_application_model');
  }
  // var $salt = "iitism@#2021";
  function index()
  {
    if(!($this->session->has_userdata('login_type')))
    {
      redirect('admission/Add_mba/adm_mba_login');
    }
    // if(!($this->session->has_userdata('pay_start')))
    // {
    //   redirect('admission/Add_mba/adm_mba_login');
    // }
    $inc=1;
    $this->load->model('admission/Adm_mba_admission_payment_model');
    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);
    $data['registration_detail']=$this->Add_mba_registration_model->get_registration_detail_by_email($email);
    $data['upload_document']=$this->Adm_mba_personal_details_model->get_all_document_uploaded($get_reg_no);
    $data['application_details']=$this->Add_mba_registration_model->get_application_programme_details($get_reg_no);
    $data['personal_details']=$this->Adm_mba_admission_payment_model->get_adm_mba_appl_ms($get_reg_no);
    $data['program_apply']=$this->Adm_mba_personal_details_model->get_adm_mba_reg_appl_program($get_reg_no);
    $data['count_amount']=count($data['program_apply']);
    $data['val']="H";
    $this->adm_mba_header($data);
    $this->load->view('admission/adm_mba_admisison_payment_view',$data);
    $this->adm_mba_footer();

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
    $data['program_selected'] = $this->input->post('optradio');
    //exit;
    $inc=1;
    $this->load->model('admission/Adm_mba_admission_payment_model');
    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);
    $data['registration_detail']=$this->Add_mba_registration_model->get_registration_detail_by_email($email);
    $data['upload_document']=$this->Adm_mba_personal_details_model->get_all_document_uploaded($get_reg_no);
    $data['application_details']=$this->Add_mba_registration_model->get_application_programme_details($get_reg_no);
    //$data['personal_details']=$this->Adm_mba_admission_payment_model->get_adm_mba_appl_ms($get_reg_no);
    $data['personal_details']=$this->Adm_mba_admission_payment_model->get_adm_mba_appl_ms_selected($get_reg_no,$data['program_selected']);
    // echo '<pre>';
    // print_r($data['personal_details']);
    // echo '</pre>';
    // exit;
    //$data['program_apply']=$this->Adm_mba_personal_details_model->get_adm_mba_reg_appl_program($get_reg_no);
    $data['program_apply']=$this->Adm_mba_admission_payment_model->get_adm_mba_reg_appl_program_selected($get_reg_no,$data['program_selected']);
    // echo '<pre>';
    // print_r($data['program_apply']);
    // echo '</pre>';
    // exit;
    $data['order_no']=$this->generate_order_no('ADMMBA','IIT');
    $data['count_amount']=count($data['program_apply']);
    $data['val']="H";
    $this->adm_mba_header($data);
    $this->load->view('admission/adm_mba_admisison_payment_view',$data);
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
    $data['program_selected'] = $this->input->post('program_selected');
    if(!($this->session->has_userdata('login_type')))
    {
      redirect('admission/Add_mba/adm_mba_login');
    }
    $this->load->model('admission/Adm_mba_admission_payment_model');
    $this->load->model('admission/Add_mba_registration_model');
    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);
    $data['personal_details']=$this->Adm_mba_admission_payment_model->get_adm_mba_appl_ms_selected($get_reg_no,$data['program_selected']);
    //$data['personal_details']=$this->Adm_mba_admission_payment_model->get_adm_mba_appl_ms($get_reg_no);
    if(empty($data['personal_details']))
    {
      echo "something went wrong please try again";
      exit;
    }
    //$data['program_apply']=$this->Adm_mba_admission_payment_model->get_adm_mba_reg_appl_program($get_reg_no);
    $data['program_apply']=$this->Adm_mba_admission_payment_model->get_adm_mba_reg_appl_program_selected($get_reg_no,$data['program_selected']);
    $contact_no = $this->input->post('contact_no');
    $reg_id = $this->input->post('reg_id');
    $fee_to_be_paid = $data['personal_details'][0]['admission_fee'];
    $first_name = $this->input->post('first_name');
    $middle_name = $this->input->post('middle_name');
    $last_name = $this->input->post('last_name');
    $category = $this->input->post('category');
    $dob = $this->input->post('dob');
    $paygateway=$this->input->post('pay_mode');
    $payment_method='online';
    $purpose = 'mba Program Admission apply Fee';

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
      //'admn_type'=>'mba',
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
      //'admn_type'=>'mba',
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


    // $payment_data_json_encode = json_encode($payment_data);
    // $payment_data_encrypt = $this->data_encrypt($payment_data_json_encode);
    // $payment_data_decrypt = $this->data_decrypt($payment_data_encrypt);
    // $payment_data_json_decode = json_decode($payment_data_decrypt);


    //by this here data is inserted into online_payment_adm_mba_final_fee,of misdev,paylive,admission if not then inserted if avalible then it will not inserted


    // $data['fee_details'] = $this->Adm_mba_admission_payment_model->insert_mis_pay_adm_pay_detail($payment_data_insert,$condition);

    // echo '<pre>';
    // print_r($data['fee_details']);
    // echo '</pre>';
    // exit;

     /*
    if($paygateway=='Sbi')
    {
      $this->load->helper('url');
      ?>
      <script>
        window.location.href="https://pay.iitism.ac.in/index.php/Mba_fee_pay_adm/Adm_mba_fee/pay?q=" + '<?php echo urlencode($payment_data_encrypt);?>';
      </script>
      <?php
    }
    else if($paygateway=='Hdfc')
    {
      $this->load->helper('url');
      ?>
      <script>
        window.location.href="https://pay.iitism.ac.in/index.php/Mbaadmissionhdfcdev/Adm_mba_hdfc_fee/pay?q=" + '<?php echo urlencode($payment_data_encrypt);?>';
      </script>
      <?php
    }
    else
    {
      $this->session->set_flashdata('msg','Something went wrong!');
      redirect('admission/Adm_mba_payment');
      exit;
      return false;
    }
    */

    $response_url = base_url('index.php/admission/phd/Adm_mba_admisison_payment/pay_response');
    $total_amount = $fee_to_be_paid;

    $array_otherdetails = array(
      'user_id' => $reg_id,
      'first_name' => $first_name,
      'middle_name' => $middle_name,
      'last_name' => $last_name,
      'email' => $email,
      'contact' => $contact_no,
      'payment_purpose' => $purpose,
      'payment_type' => 'MBA ADMISSION FEE',
      'payment_gateway' => $paygateway,
      'amount' => $fee_to_be_paid,
      'total_amount' => $fee_to_be_paid,
      'order_no' => $order_no,
      'dob' => $dob,
      'category' => $category,
      'gender' => $data['personal_details'][0]['gender'],
      'admn_type' => $data['personal_details'][0]['program_id'],
      'remark1' => 'NA',
      'module_name' => 'mba_admission_fee'
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
    'gender' => $data['personal_details'][0]['gender'],
    'admn_type' => $data['personal_details'][0]['program_id'],
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

   $this->Adm_mba_admission_payment_model->insert_payment_log_data($log_data); // insert in log table

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
      redirect('admission/Adm_mba_admission_payment');
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

            $update_log_fail = $this->Adm_mba_admission_payment_model->update_main_payment_log($update_array,$where_data);
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

          $update_log_pending = $this->Adm_mba_admission_payment_model->update_main_payment_log($update_array,$where_data);

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

            $update_log_success = $this->Adm_mba_admission_payment_model->update_main_payment_log($update_array,$where_data);

            $where_data = array(

              'registration_no' => $otherdetails_data['user_id']
            );

            $tab_update=array(
              'remark_1'=>"mba Admission Fee done",

            );

             $update_payment_tab_details = $this->Adm_mba_admission_payment_model->update_payment_tab_details($tab_update, $where_data);

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

            $update_payment_appl_ms_details = $this->Adm_mba_admission_payment_model->update_payment_appl_ms_details($adm_mba_appl_ms, $where_data,$otherdetails_data['admn_type']);

            if($update_log_success && $update_payment_tab_details && $update_payment_appl_ms_details) {

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

                    $this->adm_mba_header($data);
                    $this->load->view('admission/receipt_payment_view',$success_final_array);
                    $this->adm_mba_footer();

            }
            else
            {

            }


        }
        else {
          # code...
      }


    }
    else
    {
      $this->session->set_flashdata('flashError' , 'Request empty . Please try again !');
      redirect('admission/Adm_mba_admission_payment');
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
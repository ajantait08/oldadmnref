<?php

class Adm_mtech_registration extends MY_Controller {

	function __construct() 
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->library('session');
    $this->load->database();
    $this->load->helper('captcha');
    $this->load->library('encrypt');
    $this->load->library('zip');
    $this->load->library('email');
    $this->load->library('form_validation');
    $this->load->helper(array('form', 'url'));
    // $this->load->library('email1');
    $this->load->model('admission/mtech/Add_mtech_registration_model','Add_mtech_registration_model');
    $this->load->model('admission/mtech/Adm_mtech_application_preview_model', 'Mtech_all', TRUE);
    // $this->load->model('empreg/Admin_form_model');
    // $this->load->model('recruitment/User_model');
    // $this->load->model('recruitment/Registration_model');
  }

  function index()
  { 
      
    $data['val']="login";
    $this->adm_mtech_header($data);
    //  $this->adm_mtech_notice();
    // $this->load->view('admission/adm_mtech_home',$data);
    $this->load->view('admission/mtech/adm_mtech_application',$data);
    //  $this->load->view('admission/adm_mtech_dashboard');
    $this->adm_mtech_footer();
  }

  public function get_registration()
  { 

    $this->load->model('admission/mtech/Add_mtech_registration_model','Add_mtech_registration_model');
    $salutation=trim($this->input->post('salutation'));
    $first_name=trim($this->input->post('first_name'));
    $middle_name=trim($this->input->post('middle_name'));
    $last_name=trim($this->input->post('last_name'));
    $category=trim($this->input->post('category'));
    $pwd=trim($this->input->post('pwd'));
    $mobile=trim($this->input->post('mobile'));
    $email=trim($this->input->post('email'));
    $dob=trim($this->input->post('dob'));
    $c_blind=trim($this->input->post('c_blind_yes'));
    $appl_type=trim($this->input->post('appl_type'));
    $cfti=trim($this->input->post('yes_no_cfti'));
    if($appl_type=='Sponsored Candidates')
    {
      $this->form_validation->set_rules('yes_no_cfti','Sponsored Candidates CFTI ','required');
    }
    // $btech_yes=trim($this->input->post('btech_yes'));
    // $math_stat=trim($this->input->post('math_stat'));
    $this->form_validation->set_rules('first_name','First name','required');
    $this->form_validation->set_rules('category','Category','required');
    $this->form_validation->set_rules('appl_type','Application type','required');
    $this->form_validation->set_rules('pwd','Pwd','required');
    $this->form_validation->set_rules('mobile','Mobile','trim|required');
    $this->form_validation->set_rules('email','Email','required');
    $this->form_validation->set_rules('dob','Dob','required');
    $array = array(
      'email' => $email,
      'status' =>true
    );
    $this->session->set_userdata($array);
    // status means 0 means registration done but not yet email approved
    if ($this->form_validation->run() == true) 
    { 
      
      $password=$this->randomPassword();
      $registration_no='MT'.mt_rand(1, 999999);
      $values=array(
       'appl_type'=> $appl_type,
       'first_name'=>$first_name,
       'middle_name'=>$middle_name,
       'last_name'=>$last_name,
       'category'=>$category,
       'pwd'=>$pwd,
       'mobile'=>$mobile,
       'email'=>$email,
       'dob'=>$dob,
       'color_blind'=>$c_blind,
       'cfti_flag'=>$cfti,
       'registration_no'=>$registration_no,
       'password'=>$password,
       'status'=>'0',
       'created_by'=>$email
      );
      $name=$first_name." ".$middle_name." ".$last_name;
      $result=$this->Add_mtech_registration_model->get_registration($values);
      if($result=='ok')
      {  
        $config = array(
          'protocol'  => 'smtp',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_port' => 465,
          'smtp_user' => 'govind.au@iitism.ac.in',
          'smtp_pass' => 'govindiitism#',
          'mailtype'  => 'html',
          'charset'   => 'utf-8'
          
        );
        
        $email_decode =rawurlencode($email);
        $link="https://nfrdev.iitism.ac.in/index.php/admission/mtech/Adm_mtech_registration/verify_email/".$email_decode;
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        //Email content
        $htmlContent ='<div style="border: 1px solid;padding: 20px;border-radius: 7px;text-algin:center;"> <h5>Dear Candidate</h5>';
        $htmlContent .= '<h5>Thank you for registration in IIT(ISM) M.Tech Admission - 2022-2023 portal</h5>';
        $htmlContent .= '<h5  onmouseover="alert("This is an alert box!")" >Your Registration No : ' .$registration_no.'<br /></h5>';
        $htmlContent .= '<h5>Your Password : ' .$password.'<br /></h5>';
        $htmlContent .= '<br>Please <a href='.$link.' target="blank">Click Here</a> to verify your email';
        $htmlContent .= '<p>Untill you verify the email address,You could not able to login to the admission portal<br /><br/>Thanks<br/></p></div>';
        // $htmlContent .='<img src="https://nfrdev.iitism.ac.in/index.php/admission/Adm_registration/track_email/'.md5($email_decode).'" style="width: 1px; height: 1px; display: none;" />';
        $this->email->to($email);
        $this->email->from('govind.au@iitism.ac.in');
        $this->email->subject('Please verify yours email');
        $this->email->message($htmlContent);
        if($this->email->send())
        // if (true)
        {
          $time_date=date("M,d,Y h:i:s A");
          $upval=array(
            'ver_mail_sent'=>'Y',
            'ver_mail_sent_date_time'=>$time_date
          );
          $update_sendmail=$this->Add_mtech_registration_model->time_of_email_send($upval,$email);
          if($update_sendmail=='ok')
          { 
            
            $this->session->set_flashdata('success','congratualtion Successfully Registered!');
            $data['val']="registration";
            $data['verification']="done";
            $data['reg_num']=$registration_no;
            $this->adm_mtech_header($data);
            $this->load->view('admission/mtech/adm_mtech_registration_view',$data);
            $this->adm_mtech_footer();
          }
          else
          {
            $this->session->set_flashdata('failure','Thier got error regrading email timing!');
          }
          
        }
        else 
        { 
          $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
          show_error($this->email->print_debugger()); 
        }
      }
      else
      { 
        $this->session->set_flashdata('error','Oops! Error.Please try again later!!!');
        $data['val']="registration";
        $this->adm_mtech_header($data);
        $this->load->view('admission/mtech/adm_mtech_registration',$data);
        $this->adm_mtech_footer();
      } 
    }
    else
    {  
      $data['val']="registration";
      $this->adm_mtech_header($data);
      $this->load->view('admission/mtech/adm_mtech_registration',$data);
      $this->adm_mtech_footer();
    }

  }

  public function verify_email($mdcode)
  {  
    $this->load->model('admission/mtech/Add_mtech_registration_model');
    $email=$this->session->userdata('email');
    $decodegamil= rawurldecode($mdcode);
    $check=$this->Add_mtech_registration_model->get_verify_email($email);
    $check_mail_id=$this->Add_mtech_registration_model->check_email_exist($email);
    if($check_mail_id=="not")
    {
      redirect('admission/mtech/Adm_mtech_registration/login_view');
      return false;
    }
    if($check=='Y')
    {
      $this->load->view('admission/mtech/adm_mtech_error_page');
    }
    else
    {
      $email_decode = base64_encode($email);
      $time_date=date("M,d,Y h:i:s A");
      $vupval=array(
        'verification'=>'Y',
        'verification_date_time'=>$time_date,
        'status'=>1
      );
      
      if($email==$decodegamil)
      { 
       
        $update_sendmail=$this->Add_mtech_registration_model->verify_email_time($vupval,$email);
        $this->session->set_flashdata('success','Your Email Address is successfully verified! Please login to access your account!');
        $data['val']="login";
        $this->adm_mtech_header($data);
        $this->load->view('admission/mtech/adm_mtech_login',$data);
        $this->adm_mtech_footer();
      }
      else
      {
        $this->session->set_flashdata('error','Sorry there is error in verifying email!');
        $data['val']="login";
        $this->adm_mtech_header($data);
        $this->load->view('admission/mtech/adm_mtech_login',$data);
        $this->adm_mtech_footer();
      }
    }
    
  }

  function randomPassword(){
  $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
  $pass = array(); //remember to declare $pass as an array
  $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
  for ($i = 0; $i < 8; $i++) {
    $n = rand(0, $alphaLength);
    $pass[] = $alphabet[$n];
  }
  return implode($pass); //turn the array into a string
}

public function track_email($p)
{ 
  $this->load->model('admission/mtech/Add_mtech_registration_model');
  $email=$this->session->userdata('email'); 
  $email_decode = base64_encode($email);
  $val=array(
    'email_track'=>"read",
  );
  if(md5($email_decode)==$p)
  {
    $this->Add_mtech_registration_model->set_track_email($val,$email);
  } 
}

public function user_login()
{ 
 
  $this->load->model('admission/mtech/Add_mtech_registration_model','Add_mtech_registration_model');
 
  $data1=array(
    'registration_no'=>trim($this->input->post('user_name')),
    'password'=>trim($this->input->post('user_pass')),
    'verification'=>'Y'
  );
  $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));  
  $userIp=$this->input->ip_address();   
  $secret='6LchRQIaAAAAAA_4rHRoCbvszIVDQmwlpqZZebm5'; 
  $credential = array(
    'secret' => $secret,
    'response' => $this->input->post('g-recaptcha-response')
  );
  $verify = curl_init();
  curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
  curl_setopt($verify, CURLOPT_POST, true);
  curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
  curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($verify);
  $status= json_decode($response, true); 
  $user_name=trim($this->input->post('user_name'));
  $user_pass=trim($this->input->post('user_pass'));
  $this->form_validation->set_rules('user_name','Registration','required');
  $this->form_validation->set_rules('user_pass','Password','required');
  if ($this->form_validation->run() == true) 
  { 
    if($status['success'])
    { 
      $check_registration_number=$this->Add_mtech_registration_model->check_registration_no(trim($this->input->post('user_name')));
     
      if(empty($check_registration_number))
      {
        $this->session->set_flashdata('registration_no','You have not done Registeration please first do registration');
        redirect('admission/mtech/add_mtech/adm_mtech_login');
      }
      else
      {
        if($check_registration_number[0]->verification=='')
        {
          // echo "reach heresdfs";
          // exit;
          $this->session->set_flashdata('registration_no','You have not verify your email please verified it other wise you not allow to login');
          redirect('admission/mtech/add_mtech/adm_mtech_login');
        }
        else
        { 
          // echo "loginnn";
          // exit;
          $login=$this->Add_mtech_registration_model->login($data1);
          $val_reg=$this->Add_mtech_registration_model->get_email_registration($data1);
          $email=$val_reg[0]->email;
          $name=$val_reg[0]->first_name.' '.$val_reg[0]->middle_name.' '.$val_reg[0]->last_name;
          $registration_no = $val_reg[0]->registration_no;
          if($login)
          {    
  
            $array = array(
              'email' => $email,
              'status' =>'login',
              'name'=>$name,
              'registration_no'=>$registration_no,
              'login_type' =>'Mtech'
            );
            $this->session->set_userdata($array);
            $this->session->set_flashdata('success', 'your are succefully login');
            $info['application'] = $this->Mtech_all->get_application_details($registration_no);
            if ($info['application'][0]->payment_status == 'Y') {
                redirect('admission/mtech/Adm_mtech_application_preview'); 
            } else {
                redirect('admission/mtech/Adm_mtech_user_dashboard'); 
            }
          }
          else
          {
            $this->session->set_flashdata('loginfail','Invalid Login Credentials');
            $data['val']="login";
            $this->adm_mtech_header($data);
            $this->load->view('admission/mtech/adm_mtech_login',$data);
            $this->adm_mtech_footer();
          
          }
        }
      } 
    }
    else
    {
      $this->session->set_flashdata('loginfail','Sorry! Google Recaptcha Unsuccessfull! Login Again');
      $data['val']="login";
      $this->adm_mtech_header($data);
      $this->load->view('admission/mtech/adm_mtech_login',$data);
      $this->adm_mtech_footer();
    }  
  }
  else
  {
    $this->session->set_flashdata('loginfail','Input field is blank please fill!');
    $data['val']="login";
    $this->adm_mtech_header($data);
    $this->load->view('admission/mtech/adm_mtech_login',$data);
    $this->adm_mtech_footer();
  }   
  
}

public function logout()
{
  $this->session->sess_destroy();
  $data['val']="login";
  $this->adm_mtech_header($data);
  $this->load->view('admission/mtech/adm_mtech_login',$data);
  $this->adm_mtech_footer();
}

public function resend_verification_mail()
{
  $config = array(
    'protocol'  => 'smtp',
    'smtp_host' => 'ssl://smtp.googlemail.com',
    'smtp_port' => 465,
    'smtp_user' => 'govind.au@iitism.ac.in',
    'smtp_pass' => 'govindiitism#',
    'mailtype'  => 'html',
    'charset'   => 'utf-8'
    
  );
  $email_decode = base64_encode($email);
  // $add_salt="*33*&*&h8hy#@".$email_decode;
  $this->email->initialize($config);
  $this->email->set_mailtype("html");
  $this->email->set_newline("\r\n");
  //Email content
  $htmlContent = '<h5>Dear Candidate</h5>';
  $htmlContent .= '<h5>Thank you for registration in IIT(ISM)MTECH admission portal</h5>';
  $htmlContent .= '<h5>Your Registration No :' .$registration_no.'<br /></h5>';
  $htmlContent .= '<h5>Your Password :' .$password.'<br /></h5>';
  $htmlContent .= 'Please click on the below activation link to verify your email address.<br />
  https://nfrdev.iitism.ac.in/index.php/admission/Adm_registration/verify_email/' .md5($email_decode);
  $htmlContent .= '<p>Untill you verify the email address,You could not able to login to the admission portal<br /><br /><br />Thanks<br /></p>';
  // $htmlContent .='<img src="https://nfrdev.iitism.ac.in/index.php/admission/Adm_registration/track_email/'.md5($email_decode).'" style="width: 1px; height: 1px; display: none;" />';
  $this->email->to($email);
  $this->email->from('govind.au@iitism.ac.in');
  $this->email->subject('Please verify yours email');
  $this->email->message($htmlContent);
  if ($this->email->send())
  // if (true)
  {

  }
  else
  {

  }
}

public function login_view()
{
  $this->session->set_flashdata('loginfail','Sorry! Your mail id does not match please contact web master');
  $data['val']="login";
  $this->adm_mtech_header($data);
  $this->load->view('admission/mtech/adm_mtech_login',$data);
  $this->adm_mtech_footer();
}

public function forget_password()
{ 
  echo "code under inovation please try later";
  exit;
  $forget_email=trim($this->input->post('forget_email'));
  $this->load->model('admission/mtech/Add_mtech_registration_model');
  $email=$this->session->userdata('email');
  // $decodegamil= rawurldecode($mdcode);
  $check=$this->Add_mtech_registration_model->get_verify_email($email);
  $password=$this->Add_mtech_registration_model->get_password_by_email($email);
  $check_mail_id=$this->Add_mtech_registration_model->check_email_exist($email);
  if($check_mail_id=="not")
  {
    redirect('admission/mtech/Adm_mtech_registration/login_view');
    return false;
  }
  else 
  {
    $config = array(
      'protocol'  => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_port' => 465,
      'smtp_user' => 'govind.au@iitism.ac.in',
      'smtp_pass' => 'govindiitism#',
      'mailtype'  => 'html',
      'charset'   => 'utf-8'
    );
    // $email_decode =rawurlencode($email);
    // $link="https://nfrdev.iitism.ac.in/index.php/admission/mtech/Adm_mtech_registration/verify_email/".$email_decode;
    $this->email->initialize($config);
    $this->email->set_mailtype("html");
    $this->email->set_newline("\r\n");
    //Email content
    $htmlContent ='<div style="border: 1px solid;padding: 20px;border-radius: 7px;text-algin:center;"> <h5>Dear Candidate</h5>';
    $htmlContent .= '<h5>Recovery password for M.Tech Admission - 2022-2023 portal</h5>';
    $htmlContent .= '<h5>Your Password : '.$password.'<br /></h5>';
    $htmlContent .= '<p>Please save it for future <br /><br/>Thanks<br/></p></div>';
    $this->email->to($email);
    $this->email->from('govind.au@iitism.ac.in');
    $this->email->subject('Please verify yours email');
    $this->email->message($htmlContent);
    if($this->email->send())
    {
      $time_date=date("M,d,Y h:i:s A");
      $upval=array(
        'ver_mail_sent'=>'Y',
        'ver_mail_sent_date_time'=>$time_date
      );
      $update_sendmail=$this->Add_mtech_registration_model->time_of_email_send($upval,$email);
      if($update_sendmail=='ok')
      { 
        
        $this->session->set_flashdata('success','congratualtion Successfully Registered!');
        $data['val']="registration";
        $data['verification']="done";
        $data['reg_num']=$registration_no;
        $this->adm_mtech_header($data);
        $this->load->view('admission/mtech/adm_mtech_registration_view',$data);
        $this->adm_mtech_footer();
      }
      else
      {
        $this->session->set_flashdata('failure','Thier got error regrading email timing!');
      }
      
    }
    else 
    { 
      $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
      show_error($this->email->print_debugger()); 
    }
    
  }
  
}


}
?>

<?php

class Adm_registration extends MY_Controller
{

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
    $this->load->model('admission/Add_mba_registration_model');
    $this->load->model('admission/Adm_mba_application_preview_model', 'Mba_all', TRUE);
  }

  function index()
  {
    $data['val'] = "registration";
    $this->adm_mba_header($data);
    $this->load->view('admission/adm_mba_registration', $data);
    $this->adm_mba_footer();
  }

  public function get_registration()
  {
    // echo "reach here";
    // exit;
    $salutation = $this->clean($this->input->post('salutation'));
    $first_name = $this->clean($this->input->post('first_name'));
    $middle_name = $this->clean($this->input->post('middle_name'));
    $last_name = $this->clean($this->input->post('last_name'));
    $category = $this->clean($this->input->post('category'));
    $pwd = $this->clean($this->input->post('pwd'));
    $mobile = $this->number_only($this->input->post('mobile'));
    $email = trim($this->cleanspecailcharacter($this->input->post('email')));
    $dob = trim($this->input->post('dob'));
    $btech_yes = $this->clean($this->input->post('btech_yes'));
    $math_stat = $this->clean($this->input->post('math_stat'));
    if ($btech_yes == 'N' and $math_stat == 'N') {
      $this->session->set_flashdata('btechmath', 'You can  do registration if you have either B.tech degree or graduate level degree with Math or Statistics !');
      redirect('admission/Add_mba/adm_mba_registration');
      exit;
    }

    $currentdate = date("Y/m/d");
    $closedate = "2023-01-31";


    $currentdate = strtotime($currentdate);
    $closedate = strtotime($closedate);

    // echo $currentdate; echo "<br>";
    // echo $closedate;
    // exit;

    // Compare the timestamp date
    if ($currentdate > $closedate) {
      $this->session->set_flashdata('email_mobile', 'Sorry date of registation form is over you are not allow to do registration !');
      redirect('admission/Add_mba/adm_mba_registration');
      exit;
    }

    $m_email = $this->Add_mba_registration_model->check_email_exist($email);
    if ($m_email == 'ok') {
      $this->session->set_flashdata('email_mobile', 'Registration already done using same Email !');
      redirect('admission/Add_mba/adm_mba_registration');
      exit;
    }
    $m_mobile = $this->Add_mba_registration_model->check_mobile_exist($mobile);
    if ($m_mobile == 'ok') {
      $this->session->set_flashdata('email_mobile', 'Registration already done using same Mobile number !');
      redirect('admission/Add_mba/adm_mba_registration');
      exit;
    }
    $total_email = $this->Add_mba_registration_model->current_day_email();
    if ($total_email[0]->total >= 350) {
      $this->session->set_flashdata('email_mobile', 'Sorry Total registration limit exceed today please try tomorrow!');
      redirect('admission/Add_mba/adm_mba_registration');
      exit;
    }
    // echo "code is under renovation please try tommrow";
    // exit;


    $this->form_validation->set_rules('first_name', 'First name', 'required');
    $this->form_validation->set_rules('category', 'Category', 'required');
    $this->form_validation->set_rules('pwd', 'Pwd', 'required');
    $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('dob', 'Dob', 'required');

    $array = array(
      'email' => $email,
      'status' => true
    );

    $this->session->set_userdata($array);
    // status means 0 means registration done but not yet email approved
    if ($this->form_validation->run() == true) {

      // $this->session->set_flashdata('email_mobile','Due to network issue please try later!');
      // redirect('admission/Add_mba/adm_mba_registration');
      // exit;

      $maxid = $this->Add_mba_registration_model->get_registration_max_id();
      $nemax = $maxid + 1;
      // $year=date("y");
      $year = 23;
      $num = sprintf("%05d", $maxid);
      // $password=$this->randomPassword();
      // $registration_no='IIT(ISM)MBA'.$year.$num;
      // $password=$this->randomPassword();
      // $registration_no='MBA'.mt_rand(1, 999999);
      if ($math_stat == '') {
        $math_stat = "N";
      }
      $password = $this->randomPassword();
      $registration_no = 'IITISMMBA' . $year . $num;
      $values = array(
        'first_name' => $first_name,
        'middle_name' => $middle_name,
        'last_name' => $last_name,
        'category' => $category,
        'pwd' => $pwd,
        'mobile' => $mobile,
        'email' => $email,
        'dob' => $dob,
        'registration_no' => $registration_no,
        'btech_flag' => $btech_yes,
        'math_stat_flag' => $math_stat,
        'password' => $password,
        'status' => '0',
        'created_by' => $email
      );
      $name = $first_name . " " . $middle_name . " " . $last_name;


      $get_reg_id = $this->Add_mba_registration_model->get_registration_no_by_email($email);
      if (true) {
        //SMTP & mail configuration
        $config = array(
          'protocol'  => 'smtp',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_port' => 465,
          'smtp_user' => 'noreply.mba@iitism.ac.in',
          'smtp_pass' => 'iitism#$mba',
          'mailtype'  => 'html',
          'charset'   => 'utf-8'
        );

        $email_decode = rawurlencode($email);
        $link = "https://admission.iitism.ac.in/index.php/admission/Adm_registration/verify_email/" . $email_decode;
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        //Email content
        $htmlContent = '<div style="border: 1px solid;padding: 20px;border-radius: 7px;text-algin:center;"> <h5>Dear Candidate</h5>';
        $htmlContent .= '<h5>Thank you for registration in IIT(ISM) MBA Admission Portal 2022-2023</h5>';
        $htmlContent .= '<h5  onmouseover="alert("This is an alert box!")" >Your Registration No : ' . $registration_no . '<br /></h5>';
        $htmlContent .= '<h5>Your Password : ' . $password . '<br /></h5>';
        $htmlContent .= '<br>Please <a href=' . $link . ' target="blank">Click Here</a> to verify your registered email';
        $htmlContent .= '<p>Until you verify the registered email address,You will not able to login to  MBA  Admission Portal<br /><br/>Thanks<br/>Admission committee<br/>IIT(ISM)Dhanbad</p></div>';
        $this->email->to($email);
        $this->email->from('noreply.mba@iitism.ac.in');
        $this->email->subject('Please verify your email Regrading MBA Registration');
        $this->email->message($htmlContent);
        if ($this->email->send()) {
          $time_date = date("M,d,Y h:i:s A");
          $upval = array(
            'ver_mail_sent' => 'Y',
            'ver_mail_sent_date_time' => $time_date
          );
          $emlog = array(
            'registration_no' => $registration_no,
            'email_type' => 'Link verification',
            'email_from' => 'noreply.mba@iitism.ac.in',
            'email_to' => $email,
            'sent_date' => $time_date,
            'status' => 1,
            'created_by' => $email,
          );
          $result = $this->Add_mba_registration_model->get_registration($values);
          $msgok = $this->Add_mba_registration_model->insert_email_log($emlog);
          $update_sendmail = $this->Add_mba_registration_model->time_of_email_send($upval, $email);
          if ($result) {
            $this->session->set_flashdata('success', 'congratualtion Successfully Registered! please check mail and click to verify');
            redirect('admission/Add_mba/adm_mba_registration');
            // $data['val']="registration";
            // $data['verification']="done";
            // $data['reg_num']=$registration_no;
            // $this->adm_mba_header($data);
            // $this->load->view('admission/adm_mba_registration',$data);
            // $this->adm_mba_footer();
          } else {
            $this->session->set_flashdata('failure', 'Your registartion is not completed successfully!');
          }
        } else {
          $this->session->set_flashdata('error', 'Network error please Try again!');
          redirect('admission/adm_registration');
          // $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
          //show_error($this->email->print_debugger());
        }
      } else {
        $this->session->set_flashdata('error', 'Network error please conatct admission admin');
        $data['val'] = "registration";
        $this->adm_mba_header($data);
        $this->load->view('admission/adm_mba_registration', $data);
        $this->adm_mba_footer();
      }
    } else {

      $data['val'] = "registration";
      $this->adm_mba_header($data);
      $this->load->view('admission/adm_mba_registration', $data);
      $this->adm_mba_footer();
    }
  }

  public function verify_email($mdcode)
  {
    $email = $this->session->userdata('email');
    $decodegamil = rawurldecode($mdcode);
    $check = $this->Add_mba_registration_model->get_verify_email($this->cleanspecailcharacter($decodegamil));

    $check_mail_id = $this->Add_mba_registration_model->check_email_exist($this->cleanspecailcharacter($decodegamil));


    if ($check_mail_id == "not") {
      redirect('admission/Adm_mba_registration/login_view');
      return false;
    }

    if ($check == 'Y') {
      $this->load->view('admission/adm_mba_error_page');
    } else {
      $email_decode = base64_encode($email);
      $time_date = date("M,d,Y h:i:s A");
      $vupval = array(
        'verification' => 'Y',
        'verification_date_time' => $time_date,
        'status' => 1
      );
      //$mdafter=md5($email_decode);
      if ($check_mail_id == 'ok') {
        $update_sendmail = $this->Add_mba_registration_model->verify_email_time($vupval, $this->cleanspecailcharacter($decodegamil));
        $this->session->set_flashdata('success', 'Your Email Address is successfully verified! Please login to access your account!');
        $data['val'] = "login";
        $this->adm_mba_header($data);
        $this->load->view('admission/adm_mba_login', $data);
        $this->adm_mba_footer();
      } else {
        $this->session->set_flashdata('error', 'Sorry there is error in verifying email!');
        $data['val'] = "login";
        $this->adm_mba_header($data);
        $this->load->view('admission/adm_mba_login', $data);
        $this->adm_mba_footer();
      }
    }
  }

  public function login_view()
  {

    $this->session->set_flashdata('loginfail', 'Sorry! Your mail id does not match please contact web master');
    $data['val'] = "login";
    $this->adm_mba_header($data);
    $this->load->view('admission/adm_mba_login', $data);
    $this->adm_mba_footer();
  }

  function randomPassword()
  {
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
    $email = $this->session->userdata('email');
    $email_decode = base64_encode($email);
    $val = array(
      'email_track' => "read",
    );
    if (md5($email_decode) == $p) {
      $this->Add_mba_registration_model->set_track_email($val, $email);
    }
  }

  public function user_login()
  {

    $data1 = array(
      'registration_no' => $this->cleanspecailcharacter($this->input->post('user_name')),
      'password' => $this->cleanspecailcharacter($this->input->post('user_pass')),
      'verification' => 'Y'
    );

    $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
    $userIp = $this->input->ip_address();
    $secret = '6LdRAokdAAAAAOSeAQSJvzZ15st7BK-g3l7ZAI3V';
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
    $status = json_decode($response, true);
    $user_name = trim($this->input->post('user_name'));
    $user_pass = trim($this->input->post('user_pass'));
    $this->form_validation->set_rules('user_name', 'Registration', 'required');
    $this->form_validation->set_rules('user_pass', 'Password', 'required');

    if ($this->form_validation->run() == true) {

      // $this->session->set_flashdata('registration_no','Due to network issue please login later');
      //   redirect('admission/add_mba/adm_mba_login');
      //   exit;
      if ($status['success']) {
        $check_registration_number = $this->Add_mba_registration_model->check_registration_no($this->cleanspecailcharacter($this->input->post('user_name')));

        if (empty($check_registration_number)) {
          $this->session->set_flashdata('registration_no', 'You have not done Registration please first do registration');
          redirect('admission/add_mba/adm_mba_login');
        } else {
          if ($check_registration_number[0]->verification == '') {

            $this->session->set_flashdata('registration_no', 'You have not verify your email please verified it other wise you not allow to login');
            redirect('admission/add_mba/adm_mba_login');
          } else {
            $login = $this->Add_mba_registration_model->login($data1);
            $val_reg = $this->Add_mba_registration_model->get_email_registration($data1);
            $email = $val_reg[0]->email;
            $name = $val_reg[0]->first_name . ' ' . $val_reg[0]->middle_name . ' ' . $val_reg[0]->last_name;
            $registration_no = $val_reg[0]->registration_no;
            if ($login) {

              $array = array(
                'email' => $email,
                'status' => 'login',
                'name' => $name,
                'registration_no' => $registration_no,
                'login_type' => 'MBA'
              );

              $this->session->set_userdata($array);
              if (!($this->session->has_userdata('login_type'))) {
                redirect('admission/Add_mba/adm_mba_login');
              }
              // $this->session->set_flashdata('success', 'your are succefully login');
              $info['application'] = $this->Mba_all->get_application_details($registration_no);
              if ($info['application'][0]->payment_status == 'Y') {
                redirect('admission/Adm_mba_application_preview');
              } else {
                $currentdate = date("Y/m/d");
                $closedate = "2023-01-31";

                $currentdate = strtotime($currentdate);
                $closedate = strtotime($closedate);

                // Compare the timestamp date
                if ($currentdate > $closedate) {

                  $this->session->set_flashdata('registration_no', 'The last date of applying in MBA and MBA in Business Analytics Programme is over.There is no fully submitted/paid application form for this application registration number');
                  redirect('admission/Add_mba/adm_mba_login');
                  exit;
                } else {
                  $this->session->set_userdata('user_dashboard', 'user_dashboard');
                  redirect('admission/Adm_mba_applicant_home');
                }
              }
            } else {
              $this->session->set_flashdata('loginfail', 'Invalid Login Credentials');
              $data['val'] = "login";
              $this->adm_mba_header($data);
              $this->load->view('admission/adm_mba_login', $data);
              $this->adm_mba_footer();
            }
          }
        }
      } else {
        $this->session->set_flashdata('loginfail', 'Sorry! Google Recaptcha Unsuccessfull! Login Again');
        $data['val'] = "login";
        $this->adm_mba_header($data);
        $this->load->view('admission/adm_mba_login', $data);
        $this->adm_mba_footer();
      }
    } else {
      $this->session->set_flashdata('loginfail', 'Input field is blank please fill!');
      $data['val'] = "login";
      $this->adm_mba_header($data);
      $this->load->view('admission/adm_mba_login', $data);
      $this->adm_mba_footer();
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    $data['val'] = "login";
    $this->adm_mba_header($data);
    $this->load->view('admission/adm_mba_login', $data);
    $this->adm_mba_footer();
  }

  public function resend_verification_mail()
  {
    $config = array(
      'protocol'  => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_port' => 465,
      'smtp_user' => 'noreply.mba@iitism.ac.in',
      'smtp_pass' => 'iitism#$mba',
      'mailtype'  => 'html',
      'charset'   => 'utf-8'

    );
    $email_decode = base64_encode($email);
    $this->email->initialize($config);
    $this->email->set_mailtype("html");
    $this->email->set_newline("\r\n");
    //Email content
    $htmlContent = '<h5>Dear Candidate</h5>';
    $htmlContent .= '<h5>Thank you for registration in IIT(ISM)MBA admission portal</h5>';
    $htmlContent .= '<h5  onmouseover="alert("This is an alert box!") >Your Registration No :' . $registration_no . '<br /></h5>';
    $htmlContent .= '<h5>Your Password :' . $password . '<br /></h5>';
    $htmlContent .= 'Please click on the below activation link to verify your email address.<br />
  https://nfrdev.iitism.ac.in/index.php/admission/Adm_registration/verify_email/' . md5($email_decode);
    $htmlContent .= '<p>Untill you verify the email address,You could not able to login to the admission portal<br /><br /><br />Thanks<br /></p>';
    // $htmlContent .='<img src="https://nfrdev.iitism.ac.in/index.php/admission/Adm_registration/track_email/'.md5($email_decode).'" style="width: 1px; height: 1px; display: none;" />';
    $this->email->to($email);
    $this->email->from('govind.au@iitism.ac.in');
    $this->email->subject('Please verify yours email');
    $this->email->message($htmlContent);
    if ($this->email->send()) {
    } else {
    }
  }

  public function forget_password()
  {
    $forget_email = trim($this->cleanspecailcharacter($this->input->post('forget_email')));
    $forget_registration = trim($this->input->post('forget_registration'));
    $this->load->model('admission/mba/Add_mba_registration_model');
    $check_reg = $this->Add_mba_registration_model->get_verify_email($forget_email); //check first email is verfied or not
    if ($check_reg != 'Y' || $check_reg == '') {
      $this->session->set_flashdata('msg', 'Sorry mail is not authenicate to move futher!');

      $this->login_view_show();
      return false;
      exit;
    }

    $check_mail_id = $this->Add_mba_registration_model->check_email_reg_exist($forget_email, $forget_registration);
    $this->form_validation->set_rules('forget_email', 'Email', 'required');
    $this->form_validation->set_rules('forget_registration', 'Registration number', 'required');
    if ($this->form_validation->run() == true) {
      if ($check_mail_id == "not") {
        $this->session->set_flashdata('msg', 'Sorry registration number does not match!');
        $this->login_view_show();
        return false;
        exit;
      } else {
        $password = $this->Add_mba_registration_model->get_password_by_email($forget_email);
        $config = array(
          'protocol'  => 'smtp',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_port' => 465,
          'smtp_user' => 'noreply.mba@iitism.ac.in',
          'smtp_pass' => 'iitism#$mba',
          'mailtype'  => 'html',
          'charset'   => 'utf-8'
        );
        // $email_decode =rawurlencode($email);
        // $link="https://nfrdev.iitism.ac.in/index.php/admission/mba/Adm_mba_registration/verify_email/".$email_decode;
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        //Email content
        $htmlContent = '<div style="border: 1px solid;padding: 20px;border-radius: 7px;text-algin:center;"> <h5>Dear Candidate</h5>';
        $htmlContent .= '<h5>Recovery password for MBA Admission - 2022-2023 portal</h5>';
        $htmlContent .= '<h5>Your Password : ' . $password . '<br /></h5>';
        $htmlContent .= '<p>Please save it for future <br /><br/>Thanks<br/></p></div>';
        $this->email->to($forget_email);
        $this->email->from('noreply.mba@iitism.ac.in');
        $this->email->subject('Password Recovery for MBA Admission - 2022-2023 portal');
        $this->email->message($htmlContent);
        if ($this->email->send()) {
          $time_date = date("M,d,Y h:i:s A");
          $upval = array(
            'registration_no' => $forget_registration,
            'email_type' => 'Forget password',
            'email_from' => 'noreply.mba@iitism.ac.in',
            'email_to' => $forget_email,
            'sent_date' => $time_date,
            'status' => 1,
            'created_by' => $forget_email,
          );
          $msgok = $this->Add_mba_registration_model->insert_email_log($upval);
          if ($msgok == 'ok') {

            $this->session->set_flashdata('msg', 'Mail has been send please check your email!');
            $this->login_view_show();
            return false;
            exit;
          } else {
            $this->session->set_flashdata('failure', 'Thier got error regrading email timing!');
          }
        } else {
          $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
          show_error($this->email->print_debugger());
        }
      }
    } else {
      $data['val'] = "login";
      $data['flags'] = "error";
      $this->adm_mba_header($data);
      $this->load->view('admission/adm_mba_login', $data);
      $this->adm_mba_footer();
    }
  }
  public function login_view_show()
  {
    $data['val'] = "login";
    $data['flags'] = "error";
    $this->adm_mba_header($data);
    $this->load->view('admission/adm_mba_login', $data);
    $this->adm_mba_footer();
  }

  function apha_numeric_only($string)
  {
    return preg_replace('/[^A-Za-z0-9\s]/', '', $string);
  }

  function clean($string) // Removes special chars.
  {
    return preg_replace('/[^A-Za-z\s]/', '', $string);
  }
  function number_only($string) //accept only number
  {
    return preg_replace('/[^0-9]/', '', $string);
  }
  function with_comma_hypen($string)
  {
    return preg_replace('/[^A-Za-z,-\s]/', '', $string);
  }
  function number_with_dot($string)
  {
    return preg_replace('/[^0-9.]/', '', $string);
  }
  function number_slash_hypen($string)
  {
    return preg_replace('/[^0-9.]/', '', $string);
  }

  // Function to remove the spacial
  function cleanspecailcharacter($str)
  {
    $res = str_ireplace(array(
      '\'', '"',
      ',', ';', '<', '>', '+', '='
    ), ' ', $str);
    return $res;
  }
}
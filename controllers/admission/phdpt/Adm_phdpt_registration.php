<?php

class Adm_phdpt_registration extends MY_Controller
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
    $this->load->model('admission/phdpt/Add_phdpt_registration_model');
    $this->load->model('admission/phdpt/Adm_phdpt_application_preview_model', 'Phd_all', TRUE);
  }

  function index()
  {

    $data['val'] = "login";
    $this->Adm_phdpt_header($data);
    // $this->load->view('admission/phd/adm_phd_application',$data);
    $this->load->view('admission/phdpt/adm_phdpt_registration_view', $data);
    $this->Adm_phdpt_footer();
  }

  public function get_registration()
  {

    $this->load->model('admission/phdpt/Add_phdpt_registration_model');
    $salutation = $this->clean($this->input->post('salutation'));
    $first_name = $this->clean($this->input->post('first_name'));
    $middle_name = $this->clean($this->input->post('middle_name'));
    $last_name = $this->clean($this->input->post('last_name'));
    $category = $this->clean($this->input->post('category'));
    $pwd = $this->clean($this->input->post('pwd'));
    $mobile = $this->number_only($this->input->post('mobile'));
    $email = $this->cleanspecailcharacter($this->input->post('email'));
    $dob = trim($this->input->post('dob'));
    $gender = $this->clean($this->input->post('gender'));
    $c_blind = $this->clean($this->input->post('c_blind_yes'));
    // $appl_type = $this->clean($this->input->post('appl_type'));
    $blood_group = $this->input->post('blood_group');
    $father_name = $this->clean($this->input->post('father_name'));
    // $cfti=$this->clean($this->input->post('yes_no_cfti'));

    //logic for age restriction
    // $enddate=date("Y-m-d");
    // $age=$this->agecal($enddate,$dob);




    $m_email = $this->Add_phdpt_registration_model->check_email_exist($email);

    if ($m_email == 'ok') {

      $this->session->set_flashdata('email_mobile', 'Registration already done using same Email !');
      redirect('admission/phdpt/Add_phdpt/Adm_phdpt_registration');
      // redirect('admission/Add_mba/adm_mba_registration');
      exit;
    }

    $m_mobile = $this->Add_phdpt_registration_model->check_mobile_exist($mobile);

    if ($m_mobile == 'ok') {
      $this->session->set_flashdata('email_mobile', 'Registration already done using same Mobile number !');
      redirect('admission/phdpt/Add_phdpt/Adm_phdpt_registration');
      // redirect('admission/Add_mba/adm_mba_registration');
      exit;
    }


    $this->form_validation->set_rules('first_name', 'First name', 'required');
    $this->form_validation->set_rules('category', 'Category', 'required');
    // $this->form_validation->set_rules('appl_type', 'Application type', 'required');
    $this->form_validation->set_rules('pwd', 'Pwd', 'required');
    $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|regex_match[/^[0-9]{10}$/]');
    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('gender', 'Gender', 'required');
    $this->form_validation->set_rules('dob', 'Dob', 'required');
    $this->form_validation->set_rules('blood_group', 'Blood Group', 'required');
    $this->form_validation->set_rules('c_blind_yes', 'Colour', 'required');
    $array = array(
      'email' => $email,
      'status' => true
    );

    $this->session->set_userdata($array);
    // status means 0 means registration done but not yet email approved
    if ($this->form_validation->run() == true) {

      $maxid = $this->Add_phdpt_registration_model->get_registration_max_id();
      $nemax = $maxid + 1;
      $year=date("y");
      //$year = 22;
      $num = sprintf("%05d", $maxid);
      $password = $this->randomPassword();
      $registration_no = 'IITISMDRPT' . $year . $num;
      $values = array(
        // 'appl_type' => $appl_type,
        'appl_type' => 'Part time',
        'first_name' => $first_name,
        'middle_name' => $middle_name,
        'last_name' => $last_name,
        'category' => $category,
        'blood_group' => $blood_group,
        'father_name' => $father_name,
        'pwd' => $pwd,
        'mobile' => $mobile,
        'email' => $email,
        'dob' => $dob,
        'gender' => $gender,
        'color_blind' => $c_blind,
        'registration_no' => $registration_no,
        'password' => $password,
        'status' => '0',
        'created_by' => $email
      );

      $name = $first_name . " " . $middle_name . " " . $last_name;

      // mdn($result);
      if (true) {
        $config = array(
          'protocol'  => 'smtp',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_port' => 465,
          'smtp_user' => 'Noreply-phd@iitism.ac.in',
          'smtp_pass' => 'adm@826004',
          'mailtype'  => 'html',
          'charset'   => 'utf-8'

        );

        $email_decode = rawurlencode($email);
        $link = "https://admission.iitism.ac.in/index.php/admission/phdpt/Adm_phdpt_registration/verify_email/" . $email_decode;
        // $link = "https://admissiondev.iitism.ac.in/index.php/admission/phdpt/Adm_phdpt_registration/verify_email/" . $email_decode;
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        //Email content
        $htmlContent = '<div style="border: 1px solid;padding: 20px;border-radius: 7px;text-algin:center;"> <h5>Dear Candidate,</h5>';
        $htmlContent .= '<h5>Thank you for registering on IIT(ISM) Ph.D. (Part Time) Admission - 2023-2024 portal</h5>';
        $htmlContent .= '<h5>Your Registration No: ' . $registration_no . '<br /></h5>';
        $htmlContent .= '<h5>Your Password: ' . $password . '<br /></h5>';
        $htmlContent .= '<br>Please <a href=' . $link . ' target="blank">Click Here</a> to verify your email';
        $htmlContent .= '<p>Until you verify the email address, you will not be able to login to the admission portal.<br /><br/>Thanks<br/></p></div>';
        // $htmlContent .='<img src="https://admisison.iitism.ac.in/index.php/admission/Adm_registration/track_email/'.md5($email_decode).'" style="width: 1px; height: 1px; display: none;" />';
        $this->email->to($email);
        $this->email->from('Noreply-phd@iitism.ac.in');
        $this->email->subject('Please verify your email');
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
            'email_from' => 'Noreply-phd@iitism.ac.in',
            'email_to' => $email,
            'sent_date' => $time_date,
            'status' => 1,
            'created_by' => $email,
          );
          $result = $this->Add_phdpt_registration_model->get_registration($values);
          $msgok = $this->Add_phdpt_registration_model->insert_email_log($emlog);
          $update_sendmail = $this->Add_phdpt_registration_model->time_of_email_send($upval, $email);
          if ($update_sendmail == 'ok') {


            $this->session->set_flashdata('success', 'Congratulation Successfully Registered!');
            $data['val'] = "registration";
            $data['verification'] = "done";
            $data['reg_num'] = $registration_no;
            $this->Adm_phdpt_header($data);
            $this->load->view('admission/phdpt/adm_phdpt_registration_view', $data);
            $this->Adm_phdpt_footer();
          } else {
            $this->session->set_flashdata('failure', 'There is  got some error regrading email timing!');
          }
        } else {
          $this->session->set_flashdata('email_mobile', 'Network error please Try again!');
          redirect('admission/phdpt/Add_phdpt/adm_phdpt_registration');
          exit;
          $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
          //show_error($this->email->print_debugger());
        }
      } else {
        $this->session->set_flashdata('error', 'Oops! Error.Please try again later!!!');
        $data['val'] = "registration";
        $this->Adm_phdpt_header($data);
        $this->load->view('admission/phdpt/adm_phdpt_registration_view', $data);
        $this->Adm_phdpt_footer();
      }
    } else {
      $data['val'] = "registration";
      $this->Adm_phdpt_header($data);
      $this->load->view('admission/phdpt/adm_phdpt_registration_view', $data);
      $this->Adm_phdpt_footer();
    }
  }

  public function verify_email($mdcode)
  {
    $this->load->model('admission/phdpt/Add_phdpt_registration_model');
    $decodegamil = rawurldecode($mdcode);
    $check = $this->Add_phdpt_registration_model->get_verify_email($this->cleanspecailcharacter($decodegamil));
    $check_mail_id = $this->Add_phdpt_registration_model->check_email_exist($this->cleanspecailcharacter($decodegamil));
    if ($check_mail_id == "not") {
      redirect('admission/phdpt/Adm_phdpt_registration/login_view');
      return false;
    }
    if ($check == 'Y') {
      $this->load->view('admission/phdpt/adm_phdpt_error_page');
    } else {

      $time_date = date("M,d,Y h:i:s A");
      $vupval = array(
        'verification' => 'Y',
        'verification_date_time' => $time_date,
        'status' => 1
      );

      // if($email==$decodegamil)
      if ($check_mail_id == 'ok') {

        $update_sendmail = $this->Add_phdpt_registration_model->verify_email_time($vupval, $decodegamil);
        $this->session->set_flashdata('success', 'Your Email Address is successfully verified! Please login to access your account!');
        $data['val'] = "login";
        $this->Adm_phdpt_header($data);
        $this->load->view('admission/phdpt/adm_phdpt_login', $data);
        $this->Adm_phdpt_footer();
      } else {
        $this->session->set_flashdata('error', 'Sorry there is error in verifying email!');
        $data['val'] = "login";
        $this->Adm_phdpt_header($data);
        $this->load->view('admission/phdpt/adm_phdpt_login', $data);
        $this->Adm_phdpt_footer();
      }
    }
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
    $this->load->model('admission/phdpt/Add_phdpt_registration_model');
    $email = $this->session->userdata('email');
    $email_decode = base64_encode($email);
    $val = array(
      'email_track' => "read",
    );
    if (md5($email_decode) == $p) {
      $this->Add_phdpt_registration_model->set_track_email($val, $email);
    }
  }

  public function user_login()
  {

    $this->load->model('admission/phdpt/Add_phdpt_registration_model', 'Add_phdpt_registration_model');

    $data1 = array(
      'registration_no' => trim($this->input->post('user_name')),
      'password' => trim($this->input->post('user_pass')),
      'verification' => 'Y'
    );
    $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
    $userIp = $this->input->ip_address();
    // $secret='6LchRQIaAAAAAA_4rHRoCbvszIVDQmwlpqZZebm5';  dev
    
    $secret = '6LdRAokdAAAAAOSeAQSJvzZ15st7BK-g3l7ZAI3V'; // live secret key

    // $secret='6Lfgv28kAAAAAIibPLOGEDnrRs0xb2XUSdr5vMdh';// dev secret key

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
      if ($status['success']) {
        $check_registration_number = $this->Add_phdpt_registration_model->check_registration_no(trim($this->input->post('user_name')));

        if (empty($check_registration_number)) {
          $this->session->set_flashdata('registration_no', 'You have not done Registeration please first do registration');
          redirect('admission/phdpt/Add_phdpt/adm_phdpt_login');
        } else {
          if ($check_registration_number[0]->verification == '') {
            // echo "reach heresdfs";
            // exit;
            $this->session->set_flashdata('registration_no', 'You have not verify your email please verified it other wise you not allow to login');
            redirect('admission/phdpt/Add_phdpt/adm_phdpt_login');
          } else {
            // echo "loginnn";
            // exit;
            $login = $this->Add_phdpt_registration_model->login($data1);
            $val_reg = $this->Add_phdpt_registration_model->get_email_registration($data1);
            $email = $val_reg[0]->email;
            $name = $val_reg[0]->first_name . ' ' . $val_reg[0]->middle_name . ' ' . $val_reg[0]->last_name;
            $registration_no = $val_reg[0]->registration_no;
            if ($login) {
              //echo 'login'; exit;

              $array = array(
                'email' => $email,
                'status' => 'login',
                'name' => $name,
                'registration_no' => $registration_no,
                'login_type' => 'Phdpt'
              );
              // echo "<pre>";
              // print_r($array);
              // exit;
              $this->session->set_userdata($array);
              // $this->session->set_flashdata('success', 'your are succefully login');
              $info['application'] = $this->Phd_all->get_application_details($registration_no);
              // echo 'session';
              // echo '<pre>';
              // print_r($this->session->userdata($array['login_type']));
              // echo '</pre>';
              // exit;

              // uncomment section for payment close start

              // $this->session->set_userdata('user_dashboard','user_dashboard');
              // redirect('admission/phd/Adm_phd_applicant_home');

              // uncomment section for payment close

              //comment section start here for payment close

              if ($info['application'][0]->payment_status == 'Y') {
                redirect('admission/phdpt/Adm_phdpt_application_preview');
              } else { 
                $currentdate = date("Y/m/d");
                
                $closedate = "2024-09-20";
                

                $currentdate = strtotime($currentdate);
                $closedate = strtotime($closedate);

                if ($currentdate > $closedate) {

                  $this->session->set_flashdata('loginfail', 'The last date of applying in Ph.d. Admission portal is over.There is no fully submitted/paid application form for this application registration number');
                  redirect('admission/phdpt/add_phdpt/adm_phdpt_login');
                  exit;
                } else {
                  // echo 'second_condition';
                  // exit;
                }
                $this->session->set_userdata('user_dashboard', 'user_dashboard');
                redirect('admission/phdpt/Adm_phdpt_applicant_home');
                redirect('admission/phdpt/Adm_phdpt_user_dashboard');
              }

              //comment  section  end  for payment close

            } else {
              $this->session->set_flashdata('loginfail', 'Invalid Login Credentials');
              $data['val'] = "login";
              $this->Adm_phdpt_header($data);
              $this->load->view('admission/phdpt/adm_phdpt_login', $data);
              $this->Adm_phdpt_footer();
            }
          }
        }
      } else {
        $this->session->set_flashdata('loginfail', 'Sorry! Google Recaptcha Unsuccessfull! Login Again');
        $data['val'] = "login";
        $this->Adm_phdpt_header($data);
        $this->load->view('admission/phdpt/adm_phdpt_login', $data);
        $this->Adm_phdpt_footer();
      }
    } else {
      $this->session->set_flashdata('loginfail', 'Input field is blank please fill!');
      $data['val'] = "login";
      $this->Adm_phdpt_header($data);
      $this->load->view('admission/phdpt/adm_phdpt_login', $data);
      $this->Adm_phdpt_footer();
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    $data['val'] = "login";
    $this->Adm_phdpt_header($data);
    $this->load->view('admission/phdpt/adm_phdpt_login', $data);
    $this->Adm_phdpt_footer();
  }


  public function login_view()
  {
    $this->session->set_flashdata('loginfail', 'Sorry! Your mail id does not match please contact web master');
    $data['val'] = "login";
    $this->Adm_phdpt_header($data);
    $this->load->view('admission/phdpt/adm_phdpt_login', $data);
    $this->Adm_phdpt_footer();
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

  public function calculate_age()
  {
    $enddate = date("Y-m-d");
    $dob = $this->input->post('dob');
    $age = $this->agecal($enddate, $dob);
    echo json_encode($age);
  }

  public function agecal($end, $dob)
  {

    $interval = date_diff(date_create($end)->setTime(24, 48, 0), date_create($dob)->setTime(24, 48, 0));
    $val = $interval->format('%y') . " Y, " . +$interval->format('%m') . " M, " . ($interval->format('%d') + '1' . " D");
    // $val=$interval->format("%Y Y, %M M, %d D");
    $data_a = array(
      'year' => $interval->format("%Y"),
      'month' => $interval->format("%M"),
      'day' => $interval->format("%D") + '1',
      'age' => $val
    );
    return $data_a;
  }
}

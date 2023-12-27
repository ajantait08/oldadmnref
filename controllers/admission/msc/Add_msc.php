<?php

class Add_msc
 extends MY_Controller {

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
    $this->load->library('form_validation');
    $this->load->helper(array('form', 'url'));
    $this->load->model('recruitment/User_model');
    $this->load->model('recruitment/Registration_model');
  }
  function index()
  {  
     
    $data['val']="home";
    $this->adm_msc_header($data);
    //  $this->adm_msc_notice();
    // $this->load->view('admission/adm_msc_home',$data);
 
    $this->load->view('admission/msc/adm_Add_msc_home',$data);
 
    //  $this->load->view('admission/adm_msc_dashboard');
    $this->adm_msc_footer();
  }
  public function home()
  { 


    // echo "asdasdasd";
    // exit;
    $data['val']="home";
 $this->adm_msc_header($data);
    $this->load->view('admission/msc/adm_msc_home');
   $this->adm_msc_footer();
  }
  public function contact_us()
  { 
    $data['val']="contact";
    $this->adm_msc_header($data);
    $this->load->view('admission/msc/adm_msc_contact_us',$data);
    $this->adm_msc_footer();
  }
  public function seat_matrix()
  { 
    $data['val']="seat";
    $this->adm_msc_header($data);
    $this->load->view('admission/msc/adm_msc_seat_matrix',$data);
    $this->adm_msc_footer();
  }
  public function payment_of_fees()
  { 
    $data['val']="payment";
    $this->adm_msc_header($data);
    $this->load->view('admission/msc/adm_msc_payment_of_fees',$data);
    $this->adm_msc_footer();
  }
  public function information_brochure()
  { 
    $data['val']="brochure";
    $this->adm_msc_header($data);
    $this->load->view('admission/msc/adm_msc_information_brochure',$data);
    $this->adm_msc_footer();
  }
  public function how_to_apply()
  { 
    $data['val']="apply";
    $this->adm_msc_header($data);
    $this->load->view('admission/msc/adm_msc_how_to_apply',$data);
    $this->adm_msc_footer();
  }
  public function programme_eligibility()
  { 
    $data['val']="eligibility";
    $this->adm_msc_header($data);
    $this->load->view('admission/msc/adm_msc_programme_eligibility',$data);
    $this->adm_msc_footer();
  }
  public function adm_msc_login()
  { 
    $data['val']="login";
    $this->adm_msc_header($data);
    $this->load->view('admission/msc/adm_msc_login',$data);
    $this->adm_msc_footer();
  }
  public function adm_msc_registration()
  { 
   
    $data['val']="registration";
    $this->adm_msc_header($data);
    $this->load->view('admission/msc/adm_msc_registration_view',$data);
    $this->adm_msc_footer();
  }
  public function adm_msc_coap_counselling()
  { 
    $data['val']="COAP_Counselling";
    $this->adm_msc_header($data);
    $this->load->view('admission/msc/adm_msc_coap_counselling_view',$data);
    $this->adm_msc_footer();
  }

 

}
?>

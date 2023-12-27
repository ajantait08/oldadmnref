<?php

class Add_mtech
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
  }
  function index()
  {  
     
    $data['val']="home";
    $this->adm_mtech_header($data);
    //  $this->adm_mtech_notice();
    // $this->load->view('admission/adm_mtech_home',$data);
    $this->load->view('admission/mtech/adm_mtech_home',$data);
    //  $this->load->view('admission/adm_mtech_dashboard');
    $this->adm_mtech_footer();
  }
  public function home()
  { 
    $data['val']="home";
    $this->adm_mtech_header($data);
    $this->load->view('admission/mtech/adm_mtech_home',$data);
    $this->adm_mtech_footer();
  }
  public function contact_us()
  { 
    $data['val']="contact";
    $this->adm_mtech_header($data);
    $this->load->view('admission/mtech/adm_mtech_contact_us',$data);
    $this->adm_mtech_footer();
  }
  public function seat_matrix()
  { 
    $data['val']="seat";
    $this->adm_mtech_header($data);
    $this->load->view('admission/mtech/adm_mtech_seat_matrix',$data);
    $this->adm_mtech_footer();
  }
  public function payment_of_fees()
  { 
    $data['val']="payment";
    $this->adm_mtech_header($data);
    $this->load->view('admission/mtech/adm_mtech_payment_of_fees',$data);
    $this->adm_mtech_footer();
  }
  public function information_brochure()
  { 
    $data['val']="brochure";
    $this->adm_mtech_header($data);
    $this->load->view('admission/mtech/adm_mtech_information_brochure',$data);
    $this->adm_mtech_footer();
  }
  public function how_to_apply()
  { 
    $data['val']="apply";
    $this->adm_mtech_header($data);
    $this->load->view('admission/mtech/adm_mtech_how_to_apply',$data);
    $this->adm_mtech_footer();
  }
  public function programme_eligibility()
  { 
    $data['val']="eligibility";
    $this->adm_mtech_header($data);
    $this->load->view('admission/mtech/adm_mtech_programme_eligibility',$data);
    $this->adm_mtech_footer();
  }
  public function adm_mtech_login()
  { 
    $data['val']="login";
    $this->adm_mtech_header($data);
    $this->load->view('admission/mtech/adm_mtech_login',$data);
    $this->adm_mtech_footer();
  }
  public function adm_mtech_registration()
  { 
   
    $data['val']="registration";
    $this->adm_mtech_header($data);
    $this->load->view('admission/mtech/adm_mtech_registration_view',$data);
    $this->adm_mtech_footer();
  }
  public function adm_mtech_coap_counselling()
  { 
    $data['val']="COAP_Counselling";
    $this->adm_mtech_header($data);
    $this->load->view('admission/mtech/adm_mtech_coap_counselling_view',$data);
    $this->adm_mtech_footer();
  }

 

}
?>

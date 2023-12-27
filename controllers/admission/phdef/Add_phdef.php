<?php

class Add_phdef
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
    $this->adm_phdef_header($data);
    //  $this->adm_phd_notice();
    // $this->load->view('admission/adm_phd_home',$data);
    $this->load->view('admission/phdef/adm_phdef_home',$data);
    //  $this->load->view('admission/adm_phd_dashboard');
    $this->adm_phdef_footer();
  }
  public function home()
  { 
    $data['val']="home";
    $this->adm_phdef_header($data);
    $this->load->view('admission/phdef/adm_phdef_home',$data);
    $this->adm_phdef_footer();
  }
  public function contact_us()
  { 
    $data['val']="contact";
    $this->adm_phdef_header($data);
    $this->load->view('admission/phdef/adm_phdef_contact_us',$data);
    $this->adm_phdef_footer();
  }
  public function seat_matrix()
  { 
    $data['val']="seat";
    $this->adm_phd_header($data);
    $this->load->view('admission/phd/adm_phd_seat_matrix',$data);
    $this->adm_phd_footer();
  }
  public function payment_of_fees()
  { 
    $data['val']="payment";
    $this->adm_phdef_header($data);
    $this->load->view('admission/phdef/adm_phdef_payment_of_fees',$data);
    $this->adm_phdef_footer();
  }
  public function information_brochure()
  { 
    $data['val']="brochure";
    $this->adm_phdef_header($data);
    $this->load->view('admission/phdef/adm_phdef_information_brochure',$data);
    $this->adm_phdef_footer();
  }
  public function how_to_apply()
  { 
    $data['val']="apply";
    $this->adm_phdef_header($data);
    $this->load->view('admission/phdef/adm_phdef_how_to_apply',$data);
    $this->adm_phdef_footer();
  }
  public function programme_eligibility()
  { 
    $data['val']="eligibility";
    $this->adm_phdef_header($data);
    $this->load->view('admission/phdef/adm_phdef_programme_eligibility',$data);
    $this->adm_phdef_footer();
  }
  public function adm_phdef_login()
  { 
    $data['val']="login";
    $this->adm_phdef_header($data);
    $this->load->view('admission/phdef/adm_phdef_login',$data);
    $this->adm_phdef_footer();
  }
  public function adm_phdef_registration()
  { 
   
    $data['val']="registration";
    $this->adm_phdef_header($data);
    $this->load->view('admission/phdef/adm_phdef_registration_view',$data);
    $this->adm_phdef_footer();
  }
  public function adm_phd_coap_counselling()
  { 
    $data['val']="COAP_Counselling";
    $this->adm_phd_header($data);
    $this->load->view('admission/phd/adm_phd_coap_counselling_view',$data);
    $this->adm_phd_footer();
  }

 

}
?>

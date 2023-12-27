<?php

class Add_mba extends MY_Controller
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
    $this->load->library('form_validation');
    $this->load->helper(array('form', 'url'));
    $this->load->model('empreg/Application_form_model');
    $this->load->model('empreg/Admin_form_model');
    $this->load->model('recruitment/User_model');
    $this->load->model('recruitment/Registration_model');
  }
  function index()
  {
    $data['val'] = "home";
    $this->adm_mba_header($data);
    $this->load->view('admission/adm_mba_home', $data);
   
    $this->adm_mba_footer();
  }
  public function home()
  {
    $data['val'] = "home";
    $this->adm_mba_header($data);
    $this->load->view('admission/adm_mba_home', $data);
    $this->adm_mba_footer();
  }
  public function contact_us()
  {
    $data['val'] = "contact";
    $this->adm_mba_header($data);
    $this->load->view('admission/adm_mba_contact_us', $data);
    $this->adm_mba_footer();
  }
  public function seat_matrix()
  {
    $data['val'] = "seat";
    $this->adm_mba_header($data);
    $this->load->view('admission/adm_mba_seat_matrix', $data);
    $this->adm_mba_footer();
  }
  public function payment_of_fees()
  {
    $data['val'] = "payment";
    $this->adm_mba_header($data);
    $this->load->view('admission/adm_mba_payment_of_fees', $data);
    $this->adm_mba_footer();
  }
  public function information_brochure()
  {
    $data['val'] = "brochure";
    $this->adm_mba_header($data);
    $this->load->view('admission/adm_mba_information_brochure', $data);
    $this->adm_mba_footer();
  }
  public function how_to_apply()
  {
    $data['val'] = "apply";
    $this->adm_mba_header($data);
    $this->load->view('admission/adm_mba_how_to_apply', $data);
    $this->adm_mba_footer();
  }
  public function programme_eligibility()
  {
    $data['val'] = "eligibility";
    $this->adm_mba_header($data);
    $this->load->view('admission/adm_mba_programme_eligibility', $data);
    $this->adm_mba_footer();
  }
  public function adm_mba_login()
  {
    $data['val'] = "login";
    $this->adm_mba_header($data);
    $this->load->view('admission/adm_mba_login', $data);
    $this->adm_mba_footer();
  }
  public function adm_mba_registration()
  {
    $data['val'] = "registration";
    $this->adm_mba_header($data);
    $this->load->view('admission/adm_mba_registration', $data);
    $this->adm_mba_footer();
  }

  public function important_dates()
  {
    $data['val'] = "dates";
    $this->adm_mba_header($data);
    $this->load->view('admission/adm_mba_important_dates', $data);
    $this->adm_mba_footer();
  }

  public function selection_procedure()
  {
    $data['val'] = "procedure";
    $this->adm_mba_header($data);
    $this->load->view('admission/adm_mba_selection_procedure', $data);
    $this->adm_mba_footer();
  }
  public function application_start()
  {
    // $data['val'] ="H";
    // $this->adm_mba_header($data);
    // $this->load->view('admission/adm_mba_welcome_view',$data);
    // $this->adm_mba_footer();
  }
}

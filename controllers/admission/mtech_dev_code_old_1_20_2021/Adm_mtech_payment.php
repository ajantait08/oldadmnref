<?php

class Adm_mtech_payment extends MY_Controller {

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
    $this->load->helper(array('form','url'));
    // $this->load->library('email1');
    $this->load->model('admission/Add_mtech_registration_model');
    $this->load->model('admission/Adm_mtech_personal_details_model');
    $this->load->model('admission/Adm_mtech_application_model');
  }

  function index()
  { 
    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $data['registration_detail']=$this->Add_mtech_registration_model->get_registration_detail_by_email($email);
    $data['upload_document']=$this->Adm_mtech_personal_details_model->get_all_document_uploaded($get_reg_no);
    $data['application_details']=$this->Add_mtech_registration_model->get_application_programme_details($get_reg_no);
    $data['val']="home";
    $this->adm_mtech_header($data);
    $this->load->view('admission/mtech/adm_mtech_payment_view',$data);
    $this->adm_mtech_footer();

  }



}
?>

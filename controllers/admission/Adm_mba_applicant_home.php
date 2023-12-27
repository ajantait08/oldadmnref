<?php

class Adm_mba_applicant_home extends MY_Controller {

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
    $this->load->model('admission/Adm_mba_application_model');
    $this->load->model('admission/Adm_mba_personal_details_model');
  }

  function index()
  { 
    if(!($this->session->has_userdata('login_type')))
    {
       redirect('admission/Add_mba/adm_mba_login');
    }
    // if(!($this->session->has_userdata('user_dashboard')))
    // {
    //   redirect('admission/Add_mba/adm_mba_login');
    // } 
 
    
    $this->load->model('admission/Add_mba_registration_model');
    $this->load->model('admission/Adm_mba_personal_details_model');
    $email= $this->session->userdata('email');
    $viewdata['name'] = $this->session->userdata('name');  
    $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);
    // $appl_ms=$this->Adm_mba_personal_details_model->get_adm_mba_appl_ms($get_reg_no);
    $appl_program=$this->Adm_mba_personal_details_model->get_adm_mba_reg_appl_program($get_reg_no);
   
    
    $check_program_apply=$this->Adm_mba_personal_details_model->get_tab_prog_apply($get_reg_no);
    $tab_position=$this->Adm_mba_personal_details_model->get_tab_status($get_reg_no);
    // echo "<pre>";
    // print_r();
    // exit;
    // echo $this->db->last_query();
    // exit;
     
    $tab=$this->Adm_mba_personal_details_model->check_tab($get_reg_no);
    if(!empty($tab))
    {
      $value=$tab[0]->highest;
      $viewdata['tab']=$tab[0]->highest;
      $viewdata['name'] = $this->session->userdata('name');
      $viewdata['p_apply']=$tab_position[0]['prom_apply_status']; 
    }
    
    $data['val']="H";
    $this->adm_mba_header($data);
    $this->load->view('admission/adm_mba_welcome_view',$viewdata);
    $this->adm_mba_footer();
  }
     
  
  function clean($string) // Removes special chars.
  {
   
    return preg_replace('/[^A-Za-z\s]/', '', $string); 
    
  }


}
?>

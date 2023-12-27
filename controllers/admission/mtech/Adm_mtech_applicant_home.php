<?php

class Adm_mtech_applicant_home extends MY_Controller {

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
    $this->load->model('admission/mtech/Add_mtech_registration_model');
    $this->load->model('admission/mtech/Adm_mtech_application_model');
    $this->load->model('admission/mtech/Adm_mtech_personal_details_model');
  }

  function index()
  { 

    if(!($this->session->has_userdata('login_type')))
    {
      redirect('admission/mtech/Add_mtech/adm_mtech_login');
    }

    // if(!($this->session->has_userdata('user_dashboard')))
    // {
    //   redirect('admission/Add_mtech/adm_mtech_login');
    // } 
    
    $this->load->model('admission/mtech/Add_mtech_registration_model');
    $this->load->model('admission/mtech/Adm_mtech_personal_details_model');
    $email= $this->session->userdata('email');
    $viewdata['name'] = $this->session->userdata('name');  
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    // $appl_ms=$this->Adm_mtech_personal_details_model->get_adm_mtech_appl_ms($get_reg_no);
    $appl_program=$this->Adm_mtech_personal_details_model->get_adm_mtech_reg_appl_program($get_reg_no);
    $check_program_apply=$this->Adm_mtech_personal_details_model->get_tab_prog_apply($get_reg_no);
    $tab_position=$this->Adm_mtech_personal_details_model->get_tab_status($get_reg_no);
    // echo "<pre>";
    // print_r();
    // exit;
    // echo $this->db->last_query();
    // exit;
     
    $tab=$this->Adm_mtech_personal_details_model->check_tab($get_reg_no);
    if(!empty($tab))
    {
      $value=$tab[0]->highest;
      $viewdata['tab']=$tab[0]->highest;
      $viewdata['name'] = $this->session->userdata('name');
      $viewdata['p_apply']=$tab_position[0]['prom_apply_status']; 
    }
    
    $data['val']="H";
    $this->adm_mtech_header($data);
    $this->load->view('admission/mtech/adm_mtech_welcome_view',$viewdata);
    $this->adm_mtech_footer();
    
  }
     
  
  function clean($string) // Removes special chars.
  {
   
    return preg_replace('/[^A-Za-z\s]/', '', $string); 
    
  }


}
?>

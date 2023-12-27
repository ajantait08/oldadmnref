<?php

class Adm_phdef_applicant_home extends MY_Controller {

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
    $this->load->model('admission/phdef/Add_phdef_registration_model');
    $this->load->model('admission/phdef/Adm_phdef_application_model');
    $this->load->model('admission/phdef/Adm_phdef_personal_details_model');
  }

  function index()
  {

    if(!($this->session->has_userdata('login_type')))
    {
      redirect('admission/phdef/Add_phdef/Adm_phdef_login');
    }

    if(!($this->session->has_userdata('user_dashboard')))
    {
      redirect('admission/Add_phdef/Adm_phdef_login');
    }

    // $this->load->model('admission/phd/Add_phd_registration_model');
    // $this->load->model('admission/phd/Adm_phd_personal_details_model');
    $email= $this->session->userdata('email');
    $viewdata['name'] = $this->session->userdata('name');
    $get_reg_no=$this->Add_phdef_registration_model->get_registration_no_by_email($email);
    // $appl_ms=$this->Adm_phd_personal_details_model->get_Adm_phd_appl_ms($get_reg_no);
    $appl_program=$this->Adm_phdef_personal_details_model->get_Adm_phd_reg_appl_program($get_reg_no);
    $check_program_apply=$this->Adm_phdef_personal_details_model->get_tab_prog_apply($get_reg_no);
    $tab_position=$this->Adm_phdef_personal_details_model->get_tab_status($get_reg_no);
    // echo "<pre>";
    // print_r();
    // exit;
    // echo $this->db->last_query();
    // exit;

    $tab=$this->Adm_phdef_personal_details_model->check_tab($get_reg_no);
    if(!empty($tab))
    {
      $value=$tab[0]->highest;
      $viewdata['tab']=$tab[0]->highest;
      $viewdata['name'] = $this->session->userdata('name');
      $viewdata['p_apply']=$tab_position[0]['prom_apply_status'];
    }

    $data['val']="H";
    $this->Adm_phdef_header($data);
    $this->load->view('admission/phdef/adm_phdef_welcome_view',$viewdata);
    $this->Adm_phdef_footer();

  }


  function clean($string) // Removes special chars.
  {

    return preg_replace('/[^A-Za-z\s]/', '', $string);

  }


}
?>

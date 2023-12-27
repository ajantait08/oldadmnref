<?php

class Adm_mtech_admin extends MY_Controller {
	function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->library('session');
    $this->load->database();
    $this->load->helper('captcha');
    $this->load->library('encrypt');
    $this->load->library('zip');
    $this->load->model('empreg/Application_form_model');
    $this->load->model('empreg/Admin_form_model');
    $this->load->model('recruitment/Admin_model');
    $this->load->model('admission/mtech/Adm_mtech_admin_model');
  }

  function index()
  {  
    // echo "reach";
    // exit;
   $this->load->view('admission/mtech/adm_mtech_admin_view');
    // $o=$this->encrypt->encode($v);
    // $l=$this->encrypt->decode($o);
    // print_r($o);
    // exit;
    // $this->load->view('recruitment/Newlogin');
   //  // $this->load->view('Recruitment/tab');

  }

  public function login()
  {   
     
    $user=trim($this->input->post('user'));
    $pass=trim($this->input->post('pass'));
    $user_64 = base64_encode($user);
    $pass_64 = base64_encode($pass);
    $saltuser="uoiu%&6".$user_64;
    $saltpass="kjoi7%&&%^".$pass_64;

    // $userenc=$this->encrypt->encode($user1);
    // $userpass=$this->encrypt->encode($pass2);
    // print_r($saltuser);
    // exit;
    // $l=$this->encrypt->decode($o);
    // $saltuser="uoiu%&6";
    // $saltpass="kjoi7%&&%^";
    // $user=$userenc.$saltuser;
    // $pass=$userpass.$saltpass;
    $this->load->model('admission/mtech/Adm_mtech_admin_model');	  
    $login=$this->Adm_mtech_admin_model->login($saltuser,$saltpass);
    // echo $this->db->last_query();
    // exit;
    if($login)
    { 
      $auth_type=$this->Adm_mtech_admin_model->get_auth($saltuser,$saltpass);
     //   echo $this->db->last_query();
     //  exit;  
     // echo $auth_type;
      // exit;
    	$array = array(
					'email' => 'admin',
          'auth'=> $auth_type,
					'status' =>true
			);
      $this->session->set_userdata($array);
      // echo $var = $this->session->userdata('auth');
      // exit;
      redirect('admission/mtech/Adm_mtech_admin/dashboard');
       
    } 
    else
    {  
      $this->session->set_flashdata('fail','wrong user name and password');
    	redirect('admission/mtech/Adm_mtech_admin');
       
    }	  
    // $var = $this->session->userdata('email');
    // $this->session->unset_userdata($array);

  }
 public function dashboard()
  { 
    $var = $this->session->userdata('email');
    if($var=='admin')
    { 
     $this->adm_mtech_admin_header();
     $this->load->view('admission/mtech/adm_mtech_admin_home_page');
     $this->adm_mtech_admin_footer();
    }
   else
   {
    redirect('admission/mtech/Adm_mtech_admin');
   }
  	
  }
  
  public function logout()
  {
     $this->session->sess_destroy();
     redirect('admission/mtech/Adm_mtech_admin');
  }
   

}
?>

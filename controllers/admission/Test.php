<?php

class Test extends MY_Controller {

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
    echo "reah here";
    exit;
  }
  


 

}
?>

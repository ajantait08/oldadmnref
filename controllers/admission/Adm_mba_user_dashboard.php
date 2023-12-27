<?php

class Adm_mba_user_dashboard extends MY_Controller {

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
    if(!($this->session->has_userdata('user_dashboard')))
    {
      redirect('admission/Add_mba/adm_mba_login');
    } 

    // $this->session->unset_userdata('user_dashboard');
    $this->load->model('admission/Add_mba_registration_model');
    $this->load->model('admission/Adm_mba_personal_details_model');
    $email= $this->session->userdata('email');
    $viewdata['name'] = $this->session->userdata('name');  
    $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);
    $appl_ms=$this->Adm_mba_personal_details_model->get_adm_mba_appl_ms($get_reg_no);
    $appl_program=$this->Adm_mba_personal_details_model->get_adm_mba_reg_appl_program($get_reg_no);
    $check_program_apply=$this->Adm_mba_personal_details_model->get_tab_prog_apply($get_reg_no);
    // echo $this->db->last_query();
    // exit;
    if(empty($check_program_apply))
    {
      $viewdata['name'] = $this->session->userdata('name');     
      $data['val']="H";
      $this->adm_mba_header($data);
      $this->load->view('admission/adm_mba_apply',$viewdata);
      $this->adm_mba_footer();

    }
    else 
    {
      $this->applications_track(); 
    }
    
  }
  
  public function applications_track()
  {

    if(!($this->session->has_userdata('login_type')))
    {
      redirect('admission/Add_mba/adm_mba_login');
    }
    $this->load->model('admission/Adm_mba_personal_details_model');
    $email= $this->session->userdata('email');
    $viewdata['name'] = $this->session->userdata('name');  
    $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);
    $tab_status=$this->Adm_mba_personal_details_model->get_tab_status($get_reg_no);
    $tab=$this->Adm_mba_personal_details_model->check_tab($get_reg_no);
    // echo $this->db->last_query();
    // exit;
    $value=$tab[0]->highest;

    if($value=='5')
    {
      
      $this->session->set_flashdata('message','You have already applied the application please check your my application status');
       redirect('admission/Adm_mba_applicant_home');
    }
    
    if ($value=='1')
    {
      $this->session->set_userdata('education','education');
      $this->session->set_userdata('applied','applied');
      redirect('admission/Adm_mba_personal_details');
    }
    elseif ($value=='2')
    {
      $this->session->set_userdata('work_experience','work_experience');
      $this->session->set_userdata('applied','applied');
      redirect('admission/Adm_mba_personal_details');
    }
    elseif ($value=='3') 
    { 
      $this->session->set_userdata('doc_start','doc_start');
      $this->session->set_userdata('document','document');
      redirect('admission/Adm_mba_document');
    }
    elseif ($value=='4') 
    { 
      $this->session->set_userdata('pay_start','pay_start');
      $this->session->set_userdata('payment','payment');
      redirect('admission/Adm_mba_payment');
    }
    elseif ($value=='5')
    {
      
      $this->session->set_flashdata('message','You have already applied the application please check your my application status');
       redirect('admission/Adm_mba_applicant_home');
    }
    else 
    { 
      $this->session->set_userdata('personal_details','personal_details');
      $this->session->set_userdata('applied','applied');
      redirect('admission/Adm_mba_personal_details');
    }

   
     
  }

  public function apply_post()
  {
    
    $email= $this->session->userdata('email');
    $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);
    $check_program_apply=$this->Adm_mba_personal_details_model->get_tab_prog_apply($get_reg_no);
    if(!($this->session->has_userdata('login_type')))
    {
       redirect('admission/Add_mba/adm_mba_login');
    }
    if(!empty($check_program_apply))
    {
      redirect('admission/Add_mba/adm_mba_login');
    }
   
    $data['fill_appl_details']=$this->Adm_mba_application_model->get_application_fill_details($get_reg_no);
    $viewdata['betch_math_statics'] =$this->Add_mba_registration_model->get_registration_detail_by_email($email);
    $check_program_apply=$this->Adm_mba_personal_details_model->get_tab_prog_apply($get_reg_no);
    $category=$viewdata['betch_math_statics'][0]->category;
    $betchflag=$viewdata['betch_math_statics'][0]->btech_flag;
    $mathstatflag=$viewdata['betch_math_statics'][0]->math_stat_flag;
   
    $flag=array(
      'betch'=>$betchflag,
      'math_stat'=>$mathstatflag,
    );
  
    $viewdata['department'] =$this->Add_mba_registration_model->get_department();
    $viewdata['programe'] =$this->Add_mba_registration_model->get_program($flag);
   
    $viewdata['name'] = $this->session->userdata('name');    
    $data['val']="H";
    $this->adm_mba_header($data);
    $this->load->view('admission/adm_mba_apply_post',$viewdata);
    $this->adm_mba_footer(); 

  }

  public function submit()
  { 
    if(!($this->session->has_userdata('login_type')))
    {
       redirect('admission/Add_mba/adm_mba_login');
    }
    $email= $this->session->userdata('email');
    $get_reg_details=$this->Add_mba_registration_model->get_registration_detail_by_email($email);
    $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);
    $appl_ms_prom=$this->Adm_mba_application_model->get_application_fill_details($get_reg_no);
    $tab=array(
      'prom_apply_status'=>"program applied",
    );
    $sum_of_fee=0;
    foreach ($appl_ms_prom as $key => $value) {
      $sum_of_fee=$value->fee_amount+$sum_of_fee;
    }
    // echo $sum_of_fee;
    // exit;
    $tab=array(
      'registration_no'=>$get_reg_details[0]->registration_no,
      'created_by'=>$email
    );
    $tabs=array(
      'prom_apply_status'=>"program applied",
    );
    
    $fee=array(
      'application_fee'=> $sum_of_fee
    );

    $this->Add_mba_registration_model->update_fee_amount($fee,$get_reg_no); 
    $this->Adm_mba_personal_details_model->update_tab1($tab,$get_reg_no);
    $this->Adm_mba_personal_details_model->update_tab1($tabs,$get_reg_no);
    $this->session->set_userdata('personal_details','personal_details');
    $this->session->set_userdata('finshed','apply_program_finshed');
    $this->session->set_flashdata('success','Please fill all the details');
    // $this->session->unset_userdata('applied');
    $this->session->set_userdata('applied','applied');
    redirect('admission/Adm_mba_personal_details');
  }
  
  public function education_apply_post()//for deleting temp file
  { 
                                                
    $this->load->model('admission/Add_mba_registration_model');
    $email= $this->session->userdata('email');
    $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);
    $row_id=trim($this->input->post('redirect_to_image_icon'));
    $prog_elligibilty=trim($this->input->post('redirect_to_image_icon2'));
    $programme_apply_for=trim($this->input->post('redirect_to_image_icon3'));
    $val=array(
      'id'=>$row_id,
      'registration_no'=>$get_reg_no,
    );
    $p_row_id=$this->Add_mba_registration_model->check_application_programme_details_row_id($get_reg_no,$programme_apply_for);
    // echo $this->db->last_query();
    // exit;
    if($p_row_id==$row_id)
    {
      $ok=$this->Add_mba_registration_model->delete_applying_program($val);
       
      if($ok)
      {
        $this->session->set_flashdata('apply_success','Data delete succesfully');
        redirect('admission/Adm_mba_user_dashboard/apply_post');
      }
      else
      {
        $this->session->set_flashdata('error','Something went wrong error 103');
        redirect('admission/Adm_mba_user_dashboard/apply_post');
      }
    }
    else
    {
      $this->session->set_flashdata('error','Data could not be deleted Something went wrong error 103 !');
      redirect('admission/Adm_mba_user_dashboard/apply_post');
    }
   
  }

  public function get_apply_post()
  { 
    if(!($this->session->has_userdata('login_type')))
    {
      redirect('admission/Add_mba/adm_mba_login');
    } 
     
    $this->load->model('admission/Add_mba_registration_model');
    $this->load->model('admission/Adm_mba_application_model');
    $email= $this->session->userdata('email');
    $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);
    $count_apply_program=
    $get_reg_details=$this->Add_mba_registration_model->get_registration_detail_by_email($email);
    $viewdata['betch_math_statics'] =$this->Add_mba_registration_model->get_registration_detail_by_email($email);
    $betchflag=$viewdata['betch_math_statics'][0]->btech_flag;

    $category=$get_reg_details[0]->category;
    $pwd=$get_reg_details[0]->pwd;
    if($category=='General' || $category=='OBC' ||  $category=='EWS')
    {
      $application_fee=1600;
        // $application_fee=2;

    }
    if($category=='SC' || $category=='ST' ||  $pwd=='Y')
    {
      $application_fee=800;
      //  $application_fee=1;
    }
    if(empty($get_reg_details))
    {
      $this->session->set_flashdata('error','Internal Data error!');
      $data['val']="H";
      $this->adm_mba_header($data);
      $this->load->view('admission/adm_mba_apply_post');
      $this->adm_mba_footer();
    }

    $department=$this->clean($this->input->post('department'));
    $course=$this->clean($this->input->post('course'));
    $branch=$this->clean($this->input->post('branch'));
   
    $this->form_validation->set_rules('department','department','required');
    $this->form_validation->set_rules('course','Course','required');
    $this->form_validation->set_rules('branch','Branch','required');
    
    $cond=array(
      'registration_no'=>$get_reg_no,
      'program_id'=>$branch, 
    );

    $val_apply=$this->Adm_mba_application_model->already_applied($cond);
    if($val_apply=='ok')
    {
       $this->session->set_flashdata('error','You have already applied the programme!');
        redirect('admission/Adm_mba_user_dashboard/apply_post');
      exit;
    }
    if ($this->form_validation->run() == true) 
    {   
      
      $application=$branch.$get_reg_no;
      $extreg=substr($get_reg_details[0]->registration_no,9);
      $values=array(
        'registration_no'=>$get_reg_no,
        'first_name'=>$get_reg_details[0]->first_name,
        'middle_name'=>$get_reg_details[0]->middle_name,
        'last_name'=>$get_reg_details[0]->last_name,
        'category'=>$get_reg_details[0]->category,
        'pwd'=>$get_reg_details[0]->pwd,
        'mobile'=>$get_reg_details[0]->mobile,
        'email'=>$get_reg_details[0]->email,
        'dob'=>$get_reg_details[0]->dob,
        'created_by'=>$email,
      );

      $value_apl_prog=array(
        'registration_no'=>$get_reg_details[0]->registration_no,
        'program_id'=>$branch,
        'program_desc'=>$course,
        'dept_id'=>'mba',
        'status'=>'A',
        'application_no'=>strtoupper($branch).$extreg,
        'fee_amount'=>$application_fee,
        'created_by'=>$email,
      );

      $values1=array(
        'registration_no'=>$get_reg_no,
        'created_by'=>$email,
      );
      
      $ok1=$this->Adm_mba_application_model->insert_application_details($values);
      $ok2=$this->Adm_mba_application_model->insert_application_programme($value_apl_prog);
      $ok3=$this->Adm_mba_application_model->insert_mtech_tab($values1);
      if($ok1=='ok' && $ok2=='ok')
      { 
        $this->session->set_flashdata('apply_success_personal','You succesfully added Please fill educational details');
        redirect('admission/Adm_mba_user_dashboard/apply_post');
      }
      else
      {

        $this->session->set_flashdata('error_personal','Thier is error while saving data');
        redirect('admission/Adm_mba_user_dashboard/apply_post');
      
      }
        
    }
    else
    {     
      $data['val']="H";
      $this->adm_mba_header($data);
      $this->load->view('admission/adm_mba_apply_post');
      $this->adm_mba_footer();
    }

  }
  function clean($string) // Removes special chars.
  {
    return preg_replace('/[^A-Za-z\s]/', '', $string); 
    
  }

}
?>

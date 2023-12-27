<?php

class Adm_mtech_user_dashboard extends MY_Controller {

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
    $this->load->model('admission/Add_mtech_registration_model');
    $this->load->model('admission/Adm_mtech_application_model');
    
  }

  function index()
  { 

    $this->load->model('admission/Add_mtech_registration_model');
    $this->load->model('admission/Adm_mtech_personal_details_model');
    $email= $this->session->userdata('email');
    $viewdata['name'] = $this->session->userdata('name');  
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $data['gate_paper_code']=$this->Add_mtech_registration_model->gate_paper_code();
    $data['btech_paper']=$this->Add_mtech_registration_model->get_programme_list_of_btech();
    $data['candidate_type']=$this->Add_mtech_registration_model->get_candidate_type_by_email($email);
    $appl_ms=$this->Adm_mtech_personal_details_model->get_adm_mtech_appl_ms($get_reg_no);
    $appl_program=$this->Adm_mtech_personal_details_model->get_adm_mtech_reg_appl_program($get_reg_no);
    if(empty($appl_ms))
    {
      
      $data['val']="home";
      $this->adm_mtech_header($data);
      $this->load->view('admission/mtech/adm_mtech_apply',$viewdata);
      $this->adm_mtech_footer();

    }
    else 
    {
      $this->applications_track(); 
    }
    
  }

  public function applications_track()
  {
   
    $this->load->model('admission/Adm_mtech_personal_details_model');
    $email= $this->session->userdata('email');
    $viewdata['name'] = $this->session->userdata('name');  
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $tab_status=$this->Adm_mtech_personal_details_model->get_tab_status($get_reg_no);
    $tab=$this->Adm_mtech_personal_details_model->check_tab($get_reg_no);
    $value=$tab[0]->highest;
    if(empty($tab_status))
    {
      redirect('admission/mtech/Adm_mtech_user_dashboard/apply_post');
    }
    else
    {
      if ($value=='1')
      {
        $this->session->set_userdata('education','education');
        redirect('admission/mtech/Adm_mtech_personal_details');
      }
      elseif ($value=='2')
      {
        $this->session->set_userdata('work_experience','work_experience');
        redirect('admission/mtech/Adm_mtech_personal_details');
      }
      elseif ($value=='3') 
      {
        $this->session->set_userdata('document','document');
        redirect('admission/mtech/Adm_mtech_document');
      }
      elseif ($value=='4') 
      { 
        $this->session->set_userdata('payment','payment');
        redirect('admission/mtech/Adm_mtech_payment');
      }
      else 
      { 
        $this->session->set_userdata('personal_details','personal_details');
        redirect('admission/mtech/Adm_mtech_personal_details');
      }

    }
     
  }

  public function education_apply_post()//for deleting temp file
  { 

    $this->load->model('admission/Add_mtech_registration_model');
    $email= $this->session->userdata('email');
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $row_id=trim($this->input->post('redirect_to_image_icon'));
    $prog_elligibilty=trim($this->input->post('redirect_to_image_icon2'));
    $programme_apply_for=trim($this->input->post('redirect_to_image_icon3'));
    $p_elig_desc=$this->Add_mtech_registration_model->get_degree_desc_by_program_id($prog_elligibilty);
    $p_apply_f_desc=$this->Add_mtech_registration_model->get_program_desc_by_program_id($programme_apply_for);
    $val=array(
      'id'=>$row_id,
      'registration_no'=>$get_reg_no,
    );
    $p_row_id=$this->Add_mtech_registration_model->check_application_programme_details_row_id($get_reg_no,$programme_apply_for);
    if($p_row_id==$row_id)
    {
      $ok=$this->Add_mtech_registration_model->delete_applying_program($val);
      //  echo  $this->db->last_query();
      //  exit;
      if($ok)
      {
        $this->session->set_flashdata('apply_success','Data delete succesfully');
        redirect('admission/mtech//Adm_mtech_user_dashboard/apply_post');
      }
      else
      {
        $this->session->set_flashdata('error','Something went wrong');
        redirect('admission/mtech/Adm_mtech_user_dashboard/apply_post');
      }
    }
    else
    {
      $this->session->set_flashdata('error','Data could not be deleted Something went wrong!');
      redirect('admission/mtech/Adm_mtech_user_dashboard/apply_post');
    }
   
  }

  public function submit()
  { 
    $email= $this->session->userdata('email');
    $get_reg_details=$this->Add_mtech_registration_model->get_registration_detail_by_email($email);
    $tab=array(
      'registration_no'=>$get_reg_details[0]->registration_no,
      'created_by'=>$email
    );
    $ok3=$this->Adm_mtech_application_model->insert_mtech_tab($tab);
    $this->session->set_userdata('personal_details','personal_details');
    $this->session->set_userdata('finshed','apply_program_finshed');
    $this->session->set_flashdata('success','Please fill all the details');
    redirect('admission/mtech/Adm_mtech_personal_details');
  }

  public function apply_post()
  {
    $this->load->model('admission/Add_mtech_registration_model');
    $this->load->model('admission/Adm_mtech_application_model');
    $viewdata['name'] = $this->session->userdata('name');  
    $email= $this->session->userdata('email');
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $data['gate_paper_code']=$this->Add_mtech_registration_model->gate_paper_code(); 
    $data['btech_paper']=$this->Add_mtech_registration_model->get_programme_list_of_btech();
    $data['fill_appl_details']=$this->Adm_mtech_application_model->get_application_fill_details($get_reg_no);
    $data['candidate_type']=$this->Add_mtech_registration_model->get_candidate_type_by_email($email);     
    $data['val']="home";
    $data['remove_apply']='apply_remove';
    $this->adm_mtech_header($data);
    $this->load->view('admission/mtech/adm_mtech_apply_post',$data);
    $this->adm_mtech_footer(); 
  }
  
  public function apply_application()
  {
    $this->load->model('admission/mtech/Add_mtech_registration_model');
    $email= $this->session->userdata('email');
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $get_reg_details=$this->Add_mtech_registration_model->get_registration_detail_by_email($email);
    $gate_sub_code=trim($this->input->post('gate_sub_code'));
    $programme_apply_for=trim($this->input->post('programme_apply_for'));
    $prog_elligibilty=trim($this->input->post('prog_elligibilty'));
    $Work_Experince_yes_no=trim($this->input->post('Work_Experince_yes_no'));
    $ming_non_m_yes_no=trim($this->input->post('ming_non_m_yes_no'));
    $course=trim($this->input->post('course'));
    $p_elig_desc=$this->Add_mtech_registration_model->get_degree_desc_by_program_id($prog_elligibilty);
  }

  public function get_apply_post()
  { 

    $this->load->model('admission/mtech/Add_mtech_registration_model');
    $this->load->model('admission/Adm_mtech_application_model');
    $email= $this->session->userdata('email');
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $get_reg_details=$this->Add_mtech_registration_model->get_registration_detail_by_email($email);
    if(empty($get_reg_details))
    {
      $this->session->set_flashdata('error','Details unable to get for this registration internal error!');
      $data['val']="home";
      $this->adm_mtech_header($data);
      $this->load->view('admission/mtech/adm_mtech_apply_post');
      $this->adm_mtech_footer();
    }

    $gate_sub_code=trim($this->input->post('gate_sub_code'));
    $non_ming_work_exp=trim($this->input->post('Work_Experince_yes_no'));
    $pharam_math_stat=trim($this->input->post('math_sat_yes_no'));
    $programme_apply_for=trim($this->input->post('programme_apply_for'));
    $prog_elligibilty=trim($this->input->post('prog_elligibilty'));
    $data=array(
      'program_id'=> $programme_apply_for,
      'degree_code'=>$prog_elligibilty
     );
    
    $sub_math_12th=$this->Add_mtech_registration_model->sub_math_12th($programme_apply_for);
    $elligibilty_y_n=$this->Add_mtech_registration_model->get_mining_non_mining($data);
    $p_elig_desc=$this->Add_mtech_registration_model->get_degree_desc_by_program_id($prog_elligibilty);
    $gate_paper_desc=$this->Add_mtech_registration_model->get_paper_desc_by_p_code($gate_sub_code);
    $p_apply_f_desc=$this->Add_mtech_registration_model->get_program_desc_by_program_id($programme_apply_for);
    $department=$this->Add_mtech_registration_model->get_department_by_program_id($programme_apply_for);
    $dept_id=$department[0]->dept_id;
    $dept_desc=$department[0]->program_desc;
    $application_type=$get_reg_details[0]->appl_type;
    $cfti_flag=$get_reg_details[0]->cfti_flag;
    if($sub_math_12th[0]->sub_math_12th=='Y') 
    {
      $msg='Yes';
    }
    else
    {
      $msg='No';
    }
    if($elligibilty_y_n[0]->non_min_work_exp=='Y') 
    {
      $msg='Yes';
    }
    else
    {
      $msg='No';
    }

    $this->form_validation->set_rules('programme_apply_for','Programme applying for','required');
    $this->form_validation->set_rules('prog_elligibilty','Programme Elligibilty','required');
    if ($this->form_validation->run() == true) 
    {   
      $values=array(
        'registration_no'=>$get_reg_details[0]->registration_no,
        'appl_type'=>$get_reg_details[0]->appl_type,
        'first_name'=>$get_reg_details[0]->first_name,
        'middle_name'=>$get_reg_details[0]->middle_name,
        'last_name'=>$get_reg_details[0]->last_name,
        'category'=>$get_reg_details[0]->category,
        'pwd'=>$get_reg_details[0]->pwd,
        'mobile'=>$get_reg_details[0]->mobile,
        'email'=>$get_reg_details[0]->email,
        'dob'=>$get_reg_details[0]->dob,
        'color_blind'=>$get_reg_details[0]->color_blind,
        'created_by'=>$email,
      );

      $value_apl_prog=array(
        'registration_no'=>$get_reg_details[0]->registration_no,
        'program_id'=>$programme_apply_for,
        'program_desc'=>$p_apply_f_desc,
        'dept_id'=>$dept_id,
        'degree_id'=>$prog_elligibilty,
        'gate_paper_code'=>$gate_sub_code,
        'gate_paper_desc'=>$gate_paper_desc,
        'sub_math_12th'=>$pharam_math_stat,
        'non_min_work_exp'=>$non_ming_work_exp,
        'status'=>'Y',
        'application_no'=>strtoupper($programme_apply_for).$get_reg_details[0]->registration_no,
        'created_by'=>$email,
      );

      $application=strtoupper($programme_apply_for).$get_reg_details[0]->registration_no;
      $ok1=$this->Adm_mtech_application_model->insert_application_details($values);
      //  echo $this->db->last_query();
      $ok2=$this->Adm_mtech_application_model->insert_application_programme($value_apl_prog);
      //  echo $ok2;
      // exit;
      
      if($ok1=='ok' && $ok2=='ok')
      { 
        $this->session->set_flashdata('apply_success','You succesfully added'.$p_apply_f_desc );
        redirect('admission/mtech/Adm_mtech_user_dashboard/apply_post');
      }
      else
      {  
        $this->session->set_flashdata('error','Thier is error while saving data');
        redirect('admission/mtech/Adm_mtech_user_dashboard/apply_post');
        // $this->load->model('admission/Add_mtech_registration_model');
        // $viewdata['name'] = $this->session->userdata('name');  
        // $email= $this->session->userdata('email');
        // $data['gate_paper_code']=$this->Add_mtech_registration_model->gate_paper_code(); 
        // $data['btech_paper']=$this->Add_mtech_registration_model->get_programme_list_of_btech();
        // $data['candidate_type']=$this->Add_mtech_registration_model->get_candidate_type_by_email($email);    
        // $this->session->set_flashdata('error','Thier is error while saving data');
        // $data['val']="home";
        // $this->adm_mtech_header($data);
        // $this->load->view('admission/mtech/adm_mtech_apply_post');
        // $this->adm_mtech_footer();
      }
       
    }
    else
    {   
      $this->load->model('admission/Add_mtech_registration_model');
      $viewdata['name'] = $this->session->userdata('name');  
      $email= $this->session->userdata('email');
      $data['gate_paper_code']=$this->Add_mtech_registration_model->gate_paper_code(); 
      $data['btech_paper']=$this->Add_mtech_registration_model->get_programme_list_of_btech();
      $data['candidate_type']=$this->Add_mtech_registration_model->get_candidate_type_by_email($email);     
      $data['val']="home";
      $this->adm_mtech_header($data);
      $this->load->view('admission/mtech/adm_mtech_apply_post');
      $this->adm_mtech_footer();
    }
  }
  
  public function get_programme_by_gate_papercode()
  { 

    $this->load->model('admission/mtech/Add_mtech_registration_model');
    $gate_sub_code=$this->input->post('gate_sub_code');
    $data['programme']=$this->Add_mtech_registration_model->get_programme_by_gate_p_code($gate_sub_code);  
    echo json_encode($data);  

  }

  public function get_program_elligibilty()
  { 

    $this->load->model('admission/mtech/Add_mtech_registration_model');
    $programme_apply_for=$this->input->post('programme_apply_for');
    $data['elligibilty']=$this->Add_mtech_registration_model->program_elligibilty_by_programe($programme_apply_for);  
    echo json_encode($data);  

  }

  public function get_check_sub_math_12th()
  { 

    $this->load->model('admission/mtech/Add_mtech_registration_model');
    $programme_apply_for=$this->input->post('programme_apply_for');
    $sub_math_12th=$this->Add_mtech_registration_model->sub_math_12th($programme_apply_for); 
    if($sub_math_12th[0]->sub_math_12th=='Y') 
    {
      $msg='Yes';
    }
    else
    {
      $msg='No';
    }
    echo json_encode($msg);  
  }

  public function check_mining_non_mining()
  { 
   
    $this->load->model('admission/mtech/Add_mtech_registration_model');
    $programme_apply_for=$this->input->post('programme_apply_for');
    $prog_elligibilty=$this->input->post('prog_elligibilty');
    $data=array(
      'program_id'=> $programme_apply_for,
      'degree_code'=>$prog_elligibilty
    );
    $elligibilty_y_n=$this->Add_mtech_registration_model->get_mining_non_mining($data); 
    //  echo $this->db->last_query();
    //   exit;
    if($elligibilty_y_n[0]->non_min_work_exp=='Y') 
    {
      $msg='Yes';
    }
    else
    {
      $msg='No';
    }

    echo json_encode($msg);  

  }


  // public function applications_track($id)
  // {
  //    $application_no=$id;
  //    $checking_end_date=$this->Registration_model->check_adv_end_date_track($application_no);
  //    if($checking_end_date)
  //    {
  //      $tab=$this->Registration_model->check_tab($application_no);
  //       $value=$tab[0]->highest;
  //       if ($value=='1')
  //       {
  //        $this->session->set_userdata('c_application',$application_no);  
  //        $this->session->set_userdata('User_education_experience','education_experience');
  //        redirect('recruitment/User_education_experience');
  //       }
  //       elseif ($value=='2')
  //       {
  //        $this->session->set_userdata('c_application',$application_no);
  //        $this->session->set_userdata('User_document','document');
  //        redirect('recruitment/User_document');
  //       }
  //       elseif ($value=='3') 
  //       {
  //        $this->session->set_userdata('c_application',$application_no);
  //        $this->session->set_userdata('User_transaction2','document');
  //        redirect('recruitment/User_transaction');
  //       }
  //       elseif ($value=='4') 
  //       { 
  //          $this->session->set_userdata('c_application',$application_no);
  //         redirect('recruitment/User_transaction');
  //         // echo "complted";
  //       }
  //       else
  //       { 
  //         $this->session->set_userdata('c_application',$application_no);
  //         $this->session->set_userdata('User_details','details');
  //         redirect('recruitment/User_details');
  //       }
  //    }
  //    else
  //    {  
  //       $this->session->set_flashdata('endate','Last date for this Advertisment No. is over. You cannot complete your application. ');
  //        redirect('recruitment/User_dashboard/my_application_status');
  //    }
  // }
  

}
?>

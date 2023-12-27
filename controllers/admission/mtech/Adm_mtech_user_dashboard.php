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
    $this->load->model('admission/mtech/Add_mtech_registration_model');
    $this->load->model('admission/mtech/Adm_mtech_application_model');
    $this->load->model('admission/mtech/Adm_mtech_personal_details_model');
    
  }

  function index()
  { 

    $this->load->model('admission/mtech/Add_mtech_registration_model');
    $this->load->model('admission/mtech/Add_mtech_registration_model');
    $this->load->model('admission/mtech/Adm_mtech_personal_details_model');

    if(!($this->session->has_userdata('login_type')))
    {
      redirect('admission/mtech/Add_mtech/adm_mtech_login');
    }
    if(!($this->session->has_userdata('user_dashboard')))
    {
      redirect('admission/mtech/Add_mtech/adm_mtech_login');
    }
    $email= $this->session->userdata('email');
    $viewdata['name'] = $this->session->userdata('name');  
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $data['gate_paper_code']=$this->Add_mtech_registration_model->gate_paper_code();
    $data['btech_paper']=$this->Add_mtech_registration_model->get_programme_list_of_btech();
    $data['candidate_type']=$this->Add_mtech_registration_model->get_candidate_type_by_email($email);
    $appl_ms=$this->Adm_mtech_personal_details_model->get_adm_mtech_appl_ms($get_reg_no);
    $appl_program=$this->Adm_mtech_personal_details_model->get_adm_mtech_reg_appl_program($get_reg_no);
    // echo "<pre>";
    // print_r($data);
    // exit;

    if(empty($appl_ms))
    {
      
      $data['val']="H";
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
   
    $this->load->model('admission/mtech/Adm_mtech_personal_details_model');
    $email= $this->session->userdata('email');
    if(!($this->session->has_userdata('login_type')))
    {
      redirect('admission/mtech/Add_mtech/adm_mtech_login');
    }

    $viewdata['name'] = $this->session->userdata('name');  
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $tab_status=$this->Adm_mtech_personal_details_model->get_tab_status($get_reg_no);
    $tab=$this->Adm_mtech_personal_details_model->check_tab($get_reg_no);

    // echo "<pre>";
    // print_r($tab);
    // exit;

    $value=$tab[0]->highest;
    
      if($value=='5')
      {
        
        $this->session->set_flashdata('message','You have already applied the application please check your my application status');
        redirect('admission/mtech/Adm_mtech_applicant_home');
      }

      if ($value=='1')
      {
        
        $this->session->set_userdata('education','education');
        $this->session->set_userdata('applied','applied');
        redirect('admission/mtech/Adm_mtech_personal_details');
      }
      elseif ($value=='2')
      { 
        $this->session->set_userdata('applied','applied');
        $this->session->set_userdata('work_experience','work_experience');
        redirect('admission/mtech/Adm_mtech_personal_details');
      }
      elseif ($value=='3') 
      { 
        $this->session->set_userdata('doc_start','doc_start');
        $this->session->set_userdata('document','document');
        redirect('admission/mtech/Adm_mtech_document');
      }
      elseif ($value=='4') 
      { 
        $this->session->set_userdata('pay_start','pay_start');
        $this->session->set_userdata('payment','payment');
        redirect('admission/mtech/Adm_mtech_payment');
      }
      else 
      { 
        redirect('admission/mtech/Adm_mtech_user_dashboard/apply_post');
        // $this->session->set_userdata('personal_details','personal_details');
        // $this->session->set_userdata('applied','applied');
        // redirect('admission/mtech/Adm_mtech_personal_details');
        // redirect('admission/mtech/Adm_mtech_applicant_home');
      }

     
  }

  public function education_apply_post()//for deleting temp file
  { 
    if(!($this->session->has_userdata('login_type')))
    {
      redirect('admission/mtech/Add_mtech/adm_mtech_login');
    }

    $this->load->model('admission/mtech/Add_mtech_registration_model');
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
    
    $this->load->model('admission/mtech/Add_mtech_registration_model');
    $this->load->model('admission/mtech/Adm_mtech_application_model');
    $this->load->model('admission/mtech/Adm_mtech_personal_details_model');
    $email= $this->session->userdata('email');
    $get_reg_details=$this->Add_mtech_registration_model->get_registration_detail_by_email($email);
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $appl_ms_prom=$this->Adm_mtech_application_model->get_application_fill_details($get_reg_no);
    $datat['candidate_type']=$this->Add_mtech_registration_model->get_candidate_type_by_email($email);
    $datac['cfti_yes']=$this->Add_mtech_registration_model->get_cfti_by_reg($get_reg_no);
    
    $category=$get_reg_details[0]->category;
    $pwd=$get_reg_details[0]->pwd;
    
    if($pwd=='Y')
    {
      if($category=='General')
      {
        $sel_category='UR-PWD';
      }
      else
      { 
        $sel_category=$category.'-'.'PWD';
      }
      
    }
    else
    { 
      if($category=='General')
      {
        $sel_category='UR';
      }
      else
      {
        $sel_category=$category;
      }
      
    }

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
      'sel_category'=>$sel_category,
      'application_fee'=> $sum_of_fee,
    );
    
    $this->db->trans_start();
    $this->Add_mtech_registration_model->update_fee_amount($fee,$get_reg_no); 
    $this->Adm_mtech_personal_details_model->update_tab1($tab,$get_reg_no);
    $this->Adm_mtech_personal_details_model->update_tab1($tabs,$get_reg_no);
    $this->db->trans_complete();
    // echo $this->db->last_query();
    //  echo $ok2;
    //  exit;
    if ($this->db->trans_status() === FALSE)  
    {
       
      $this->session->set_flashdata('error','Internal network error,error code NS01');
      redirect('admission/mtech/Adm_mtech_user_dashboard/apply_post');
    }
    else 
    {
      $this->session->set_userdata('personal_details','personal_details');
      $this->session->set_userdata('finshed','apply_program_finshed');
      $this->session->set_flashdata('success','Please fill all the details');
      // $this->session->unset_userdata('applied');
      $this->session->set_userdata('applied','applied');
      redirect('admission/mtech/Adm_mtech_personal_details');
    }
    

    
  }

  public function apply_post()
  {

    $this->load->model('admission/mtech/Add_mtech_registration_model');
    $this->load->model('admission/mtech/Adm_mtech_application_model');
    $viewdata['name'] = $this->session->userdata('name');
    if(!($this->session->has_userdata('login_type')))
    {
      redirect('admission/mtech/Add_mtech/adm_mtech_login');
    }  
    $email= $this->session->userdata('email');
    $data['candidate_type']=$this->Add_mtech_registration_model->get_candidate_type_by_email($email);
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $get_reg_details=$this->Add_mtech_registration_model->get_registration_detail_by_email($email);
    $data['gate_paper_code']=$this->Add_mtech_registration_model->gate_paper_code(); 
    if(!empty($get_reg_details[0]->color_blind))
    {
      if($get_reg_details[0]->color_blind=='Y')
      {
        $data['btech_paper']=$this->Add_mtech_registration_model->get_programme_list_of_btech_without_color_blind();
      }
      else 
      {
        $data['btech_paper']=$this->Add_mtech_registration_model->get_programme_list_of_btech();
      }
    }

    // echo $this->db->last_query();
    // echo "<pre>";
    // print_r($data['btech_paper']);
    // exit;

    $data['fill_appl_details']=$this->Adm_mtech_application_model->get_application_fill_details($get_reg_no);
    
    $data['cfti_yes']=$this->Add_mtech_registration_model->get_cfti_by_reg($get_reg_no);
    if( $data['candidate_type']=='Sponsored Candidates')
    {
      if($data['cfti_yes']=='No')
      {
        $data['gate_cfti_no']='gate';
      }
      else
      {
        $data['gate_cfti_no']='not';
      }
    }
    else 
    {
      $data['gate_cfti_no']='not';
    }
    // echo "<pre>";
    // print_r($data['fill_appl_details']);
    // exit;     
    $data['val']="H";
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
    $this->load->model('admission/mtech/Adm_mtech_application_model');
    $email= $this->session->userdata('email');
    if(!($this->session->has_userdata('login_type')))
    {
      redirect('admission/mtech/Add_mtech/adm_mtech_login');
    }

    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $get_reg_details=$this->Add_mtech_registration_model->get_registration_detail_by_email($email);
  
    if(empty($get_reg_details))
    {
      $this->session->set_flashdata('error','Details unable to get for this registration internal error!');
      $data['val']="H";
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

      $cond=array(
        'registration_no'=>$get_reg_no,
        'program_id'=>$programme_apply_for, 
      );
      
      $val_apply=$this->Adm_mtech_application_model->already_applied($cond);
      $appl_program=$this->Adm_mtech_personal_details_model->get_adm_mtech_reg_appl_program($get_reg_no);
      // echo $this->db->last_query();
      // exit;
     
      if($val_apply=='ok')
      {
        $this->session->set_flashdata('error','You have already applied the programme!');
        redirect('admission/mtech/Adm_mtech_user_dashboard/apply_post');
        exit;
      }
      if(count($appl_program)>=10)
      {
        $this->session->set_flashdata('error','You cannot applied more than ten programme!');
        redirect('admission/mtech/Adm_mtech_user_dashboard/apply_post');
        exit;
      }
      $appl_program=$this->Adm_mtech_personal_details_model->get_adm_mtech_reg_appl_program($get_reg_no);
      $datat['candidate_type']=$this->Add_mtech_registration_model->get_candidate_type_by_email($email);
      $datac['cfti_yes']=$this->Add_mtech_registration_model->get_cfti_by_reg($get_reg_no);
      if($datat['candidate_type']=='Sponsored Candidates')
      {
        if($datac['cfti_yes']=='No')
        {
          $datac['gate_cfti_no']='gate';
        }
        else 
        {
          $datac['gate_cfti_no']='not';
        }
      }
      else 
      {
        $datac['gate_cfti_no']='not';
      }
      // echo $this->db->last_query();
      // exit;
      if(!empty($appl_program))
      {   
        if($datat['candidate_type']=='GATE Candidates' OR $datac['gate_cfti_no']=='gate')
        {
          $prog=array(
          'registration_no'=>$get_reg_no,
          'gate_paper_code'=>$gate_sub_code, 
          );
          $val=$this->Add_mtech_registration_model->check_gate_paper_code_exit($prog);
          if($val!='ok')
          {
            $this->session->set_flashdata('error','You can only select single gate subject code per application.if you want to change gate subject code then delete all applying programme and select new gate subject code');
            redirect('admission/mtech/Adm_mtech_user_dashboard/apply_post');
            
            exit;
          }
        }
      }

    $sub_math_12th=$this->Add_mtech_registration_model->sub_math_12th($programme_apply_for);
    $elligibilty_y_n=$this->Add_mtech_registration_model->get_mining_non_mining($data);
    $p_elig_desc=$this->Add_mtech_registration_model->get_degree_desc_by_program_id($prog_elligibilty);
    $gate_paper_desc=$this->Add_mtech_registration_model->get_paper_desc_by_p_code($gate_sub_code);
    $p_apply_f_desc=$this->Add_mtech_registration_model->get_program_desc_by_program_id($programme_apply_for);
    $department=$this->Add_mtech_registration_model->get_department_by_program_id($programme_apply_for);
    $candidate_type=$this->Add_mtech_registration_model->get_candidate_type_by_email($email);
    $dept_id=$department[0]->dept_id;
    $dept_desc=$department[0]->program_desc;
    $application_type=$get_reg_details[0]->appl_type;
    $cfti_flag=$get_reg_details[0]->cfti_flag;
    
    if(!empty($sub_math_12th))
    {
      if($sub_math_12th[0]->sub_math_12th=='Y') 
      {
        $msg='Yes';
      }
      else
      {
        $msg='No';
      }
    }
    if(!empty($elligibilty_y_n))
    {
      if($elligibilty_y_n[0]->non_min_work_exp=='Y') 
      {
        $msg='Yes';
      }
      else
      {
        $msg='No';
      }
    }
    
    $category=$get_reg_details[0]->category;
    $gender=$get_reg_details[0]->gender;
    $pwd=$get_reg_details[0]->pwd;

    if($category=='General' || $category=='OBC' ||  $category=='EWS')
    {
       //$application_fee=2;
        $application_fee=600;

    }

    if($category=='SC' || $category=='ST' ||  $pwd=='Y' || $gender=='Female' )
    {
       $application_fee=300;
      //$application_fee=1;
    }

    if($candidate_type=='Sponsored Candidates')
    { 
      // $application_fee=2000;
      $application_fee=2000;
    }

    if($datat['candidate_type']=='GATE Candidates' OR $datac['gate_cfti_no']=='gate')
    {
      $this->form_validation->set_rules('gate_sub_code','Gate Subject Code','required'); 
    }
   
    $this->form_validation->set_rules('programme_apply_for','Programme applying for','required');
    $this->form_validation->set_rules('prog_elligibilty','Programme Elligibilty','required');
    if ($this->form_validation->run() == true) 
    {  
      $spon='';
      if($candidate_type=='Sponsored Candidates')
      {
        $spon='Y';
      }
      else {
        $spon='N';
      } 

      
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
        'gender'=>$get_reg_details[0]->gender,
        'color_blind'=>$get_reg_details[0]->color_blind,
        'sponser_flag'=>$spon,
        'cfti_flag'=>$get_reg_details[0]->cfti_flag,
        'created_by'=>$email,
      );
      
      if(empty($non_ming_work_exp))
      {
        $non_ming_work_exp='N';
      }
        
          
      if(empty($pharam_math_stat))
      {
        $pharam_math_stat='N';
      }

      $extreg=substr($get_reg_details[0]->registration_no,8);
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
        'application_no'=>strtoupper($programme_apply_for).$extreg,
        'fee_amount'=>$application_fee,
        'created_by'=>$email,
      );

      $values1=array(
        'registration_no'=>$get_reg_no,
        'created_by'=>$email,
      );

      if($datat['candidate_type']=='GATE Candidates' OR $datac['gate_cfti_no']=='gate')
      {
        $update=array(
        'gate_paper_code'=>$gate_sub_code,
        'gate_paper_desc'=>$gate_paper_desc,
        );
        // echo "<pre>";
        // print_r($update);
        // exit;
        $this->Adm_mtech_application_model->update_appl_ms($update,$get_reg_no); 
        // echo $this->db->last_query();
        // exit;

      }

      
      

      $application=strtoupper($programme_apply_for).$extreg;
      $this->db->trans_start();
      $ok1=$this->Adm_mtech_application_model->insert_application_details($values);
      $ok2=$this->Adm_mtech_application_model->insert_application_programme($value_apl_prog);
      $ok3=$this->Adm_mtech_application_model->insert_mtech_tab($values1);
      $this->db->trans_complete();
      
      if ($this->db->trans_status() === FALSE)  
      {
         
        $this->session->set_flashdata('error','Thier is error while saving data error code PA101');
        redirect('admission/mtech/Adm_mtech_user_dashboard/apply_post');
      }
      else 
      {
        $this->session->set_flashdata('apply_success','You succesfully added '.$p_apply_f_desc );
        redirect('admission/mtech/Adm_mtech_user_dashboard/apply_post');
      } 

      // if($ok1=='ok' && $ok2=='ok')
      // { 
      //   $this->session->set_flashdata('apply_success','You succesfully added'.$p_apply_f_desc );
      //   redirect('admission/mtech/Adm_mtech_user_dashboard/apply_post');
      // }
      // else
      // {  
      //   $this->session->set_flashdata('error','Thier is error while saving data');
      //   redirect('admission/mtech/Adm_mtech_user_dashboard/apply_post');
      // }
       
    }
    else
    {   
      $this->load->model('admission/mtech/Add_mtech_registration_model');
      $viewdata['name'] = $this->session->userdata('name');  
      $email= $this->session->userdata('email');
      $data['gate_paper_code']=$this->Add_mtech_registration_model->gate_paper_code(); 
      $data['btech_paper']=$this->Add_mtech_registration_model->get_programme_list_of_btech();
      $data['candidate_type']=$this->Add_mtech_registration_model->get_candidate_type_by_email($email);     
      $data['val']="H";
      $this->adm_mtech_header($data);
      $this->load->view('admission/mtech/adm_mtech_apply_post');
      $this->adm_mtech_footer();
    }
  }

  
  public function get_programme_by_gate_papercode()
  { 

    $this->load->model('admission/mtech/Add_mtech_registration_model');
    $email= $this->session->userdata('email');
    $get_reg_details=$this->Add_mtech_registration_model->get_registration_detail_by_email($email);
    $gate_sub_code=$this->input->post('gate_sub_code');
    if(!empty($get_reg_details[0]->color_blind))
    {
      if($get_reg_details[0]->color_blind=='Y')
      {
        $data['programme']=$this->Add_mtech_registration_model->get_programme_by_gate_without_color_b($gate_sub_code);  
      }
      else 
      {
        $data['programme']=$this->Add_mtech_registration_model->get_programme_by_gate_p_code($gate_sub_code);  
      }
    }
  
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

}
?>

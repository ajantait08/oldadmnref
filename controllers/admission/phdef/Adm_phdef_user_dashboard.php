<?php

class Adm_phdef_user_dashboard extends MY_Controller {

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

    // $this->load->model('admission/phd/Add_phd_registration_model');
    // $this->load->model('admission/phd/Add_phd_registration_model');
    // $this->load->model('admission/phd/Adm_phd_personal_details_model');

    if(!($this->session->has_userdata('login_type')))
    {
      redirect('admission/phdef/Add_phdef/adm_phdef_login');
    }
    // if(!($this->session->has_userdata('user_dashboard')))
    // {
    //   redirect('admission/phd/Add_phd/adm_phd_login');
    // }

    $email= $this->session->userdata('email');
    $viewdata['name'] = $this->session->userdata('name');
    $get_reg_no=$this->Add_phdef_registration_model->get_registration_no_by_email($email);
    $data['gate_paper_code']=$this->Add_phdef_registration_model->gate_paper_code();
    $data['btech_paper']=$this->Add_phdef_registration_model->get_programme_list_of_btech();

    $data['candidate_type']=$this->Add_phdef_registration_model->get_candidate_type_by_email($email);
    $appl_ms=$this->Adm_phdef_personal_details_model->get_adm_phd_appl_ms($get_reg_no);
    $appl_program=$this->Adm_phdef_personal_details_model->get_adm_phd_reg_appl_program($get_reg_no);

    // echo "<pre>";
    // print_r($data);
    // exit;

    if(empty($appl_ms))
    {

      $data['val']="H";
      $this->adm_phdef_header($data);
      $this->load->view('admission/phdef/adm_phdef_apply',$viewdata);
      $this->adm_phdef_footer();

    }
    else
    {
      $this->applications_track();
    }

  }

  public function applications_track()
  {

    // $this->load->model('admission/phd/Adm_phd_personal_details_model');
    $email= $this->session->userdata('email');
    if(!($this->session->has_userdata('login_type')))
    {
      redirect('admission/phdef/Add_phdef/adm_phdef_login');
    }

    $viewdata['name'] = $this->session->userdata('name');
    $get_reg_no=$this->Add_phdef_registration_model->get_registration_no_by_email($email);
    $tab_status=$this->Adm_phdef_personal_details_model->get_tab_status($get_reg_no);
    $tab=$this->Adm_phdef_personal_details_model->check_tab($get_reg_no);
    $value=$tab[0]->highest;


    if($value=='5')
    {

      $this->session->set_flashdata('message','You have already applied the application please check your my application status');
      redirect('admission/phdef/Adm_phdef_applicant_home');
    }

    if(empty($tab_status))
    {
      redirect('admission/phdef/Adm_phdef_user_dashboard/apply_post');
    }
    else
    {
      if ($value=='1')
      {

        $this->session->set_userdata('education','education');
        $this->session->set_userdata('applied','applied');
        redirect('admission/phdef/Adm_phdef_personal_details');
      }
      elseif ($value=='2')
      {
        $this->session->set_userdata('applied','applied');
        $this->session->set_userdata('work_experience','work_experience');
        redirect('admission/phdef/Adm_phdef_personal_details');
      }
      elseif ($value=='3')
      {

        $this->session->set_userdata('doc_start','doc_start');
        $this->session->set_userdata('document','document');
        redirect('admission/phdef/Adm_phdef_document');
      }
      elseif ($value=='4')
      {
        $this->session->set_userdata('pay_start','pay_start');
        $this->session->set_userdata('payment','payment');
        redirect('admission/phdef/Adm_phdef_payment');
      }
      else
      {
        redirect('admission/phdef/Adm_phdef_user_dashboard/apply_post');
        // $this->session->set_userdata('personal_details','personal_details');
        // $this->session->set_userdata('applied','applied');
        // redirect('admission/phd/Adm_phd_personal_details');
      }

    }

  }

  public function education_apply_post()//for deleting temp file
  {
    if(!($this->session->has_userdata('login_type')))
    {
      redirect('admission/phdef/Add_phdef/adm_phdef_login');
    }

    // $this->load->model('admission/phd/Add_phd_registration_model');
    $email= $this->session->userdata('email');
    $get_reg_no=$this->Add_phdef_registration_model->get_registration_no_by_email($email);
    $row_id=trim($this->input->post('redirect_to_image_icon'));
    $prog_elligibilty=trim($this->input->post('redirect_to_image_icon2'));
    $programme_apply_for=trim($this->input->post('redirect_to_image_icon3'));
    $p_elig_desc=$this->Add_phdef_registration_model->get_degree_desc_by_program_id($prog_elligibilty);
    $p_apply_f_desc=$this->Add_phdef_registration_model->get_program_desc_by_program_id($programme_apply_for);
    $val=array(
      'id'=>$row_id,
      'registration_no'=>$get_reg_no,
    );
    $specialization=array(
      'registration_no'=>$get_reg_no,
      'program_id'=>$programme_apply_for,
    );
    $p_row_id=$this->Add_phdef_registration_model->check_application_programme_details_row_id($get_reg_no,$programme_apply_for);
    if($p_row_id==$row_id)
    {
      $ok=$this->Add_phdef_registration_model->delete_applying_program($val);
      $this->Add_phdef_registration_model->delete_specialization($specialization);

      //  echo  $this->db->last_query();
      //  exit;
      if($ok)
      {
        $this->session->set_flashdata('apply_success','Data delete succesfully');
        redirect('admission/phdef/Adm_phdef_user_dashboard/apply_post');
      }
      else
      {
        $this->session->set_flashdata('error','Something went wrong');
        redirect('admission/phdef/Adm_phdef_user_dashboard/apply_post');
      }
    }
    else
    {
      $this->session->set_flashdata('error','Data could not be deleted Something went wrong!');
      redirect('admission/phdef/Adm_phdef_user_dashboard/apply_post');
    }

  }

  public function submit()
  {

    // $this->load->model('admission/phd/Add_phd_registration_model');
    // $this->load->model('admission/phd/Adm_phd_application_model');
    // $this->load->model('admission/phd/Adm_phd_personal_details_model');
    $email= $this->session->userdata('email');
    $get_reg_details=$this->Add_phdef_registration_model->get_registration_detail_by_email($email);
    $get_reg_no=$this->Add_phdef_registration_model->get_registration_no_by_email($email);
    $appl_ms_prom=$this->Adm_phdef_application_model->get_application_fill_details($get_reg_no);
    $datat['candidate_type']=$this->Add_phdef_registration_model->get_candidate_type_by_email($email);
    $datac['cfti_yes']=$this->Add_phdef_registration_model->get_cfti_by_reg($get_reg_no);

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
      $sel_category='N/A';
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


    $this->Add_phdef_registration_model->update_fee_amount($fee,$get_reg_no);
    $this->Adm_phdef_personal_details_model->update_tab1($tab,$get_reg_no);
    $this->Adm_phdef_personal_details_model->update_tab1($tabs,$get_reg_no);
    $this->session->set_userdata('personal_details','personal_details');
    $this->session->set_userdata('finshed','apply_program_finshed');
    $this->session->set_flashdata('success','Please fill all the details');
    // $this->session->unset_userdata('applied');
    $this->session->set_userdata('applied','applied');
    redirect('admission/phdef/Adm_phdef_personal_details');


  }

  public function apply_post()
  {

    // $this->load->model('admission/phd/Add_phd_registration_model');
    // $this->load->model('admission/phd/Adm_phd_application_model');
    $viewdata['name'] = $this->session->userdata('name');
    if(!($this->session->has_userdata('login_type')))
    {
      redirect('admission/phdef/Add_phdef/adm_phdef_login');
    }
    $email= $this->session->userdata('email');
    $data['candidate_type']=$this->Add_phdef_registration_model->get_candidate_type_by_email($email);
    $get_reg_no=$this->Add_phdef_registration_model->get_registration_no_by_email($email);
    $get_reg_details=$this->Add_phdef_registration_model->get_registration_detail_by_email($email);
    $data['gate_paper_code']=$this->Add_phdef_registration_model->gate_paper_code();
    if(!empty($get_reg_details[0]->color_blind))
    {


      if($get_reg_details[0]->color_blind=='Y' And $get_reg_details[0]->pwd=='Y')
      {
        $data['btech_paper']=$this->Add_phdef_registration_model->get_programme_list_of_btech_without_pwd();

      }

      if($get_reg_details[0]->color_blind=='Y' And $get_reg_details[0]->pwd=='N')
      {
        $data['btech_paper']=$this->Add_phdef_registration_model->get_programme_list_of_btech_without_color_blind();

      }

      if($get_reg_details[0]->color_blind=='N' And $get_reg_details[0]->pwd=='N')
      {
        $data['btech_paper']=$this->Add_phdef_registration_model->get_programme_list_of_btech();

      }

      if($get_reg_details[0]->color_blind=='N' And $get_reg_details[0]->pwd=='Y')
      {
        $data['btech_paper']=$this->Add_phdef_registration_model->get_programme_list_of_btech_without_pwds();

      }

    }


    // echo $this->db->last_query();
    // echo "<pre>";
    // print_r($data['btech_paper']);
    // exit;

    $data['fill_appl_details']=$this->Adm_phdef_application_model->get_application_fill_details($get_reg_no);

  // echo "<pre>";
    // print_r($data);
    // exit;
    $data['val']="H";
    $data['remove_apply']='apply_remove';
    $this->adm_phdef_header($data);
    $this->load->view('admission/phdef/adm_phdef_apply_post',$data);
    $this->adm_phdef_footer();

  }

  public function apply_application()
  {
    // $this->load->model('admission/phd/Add_phd_registration_model');
    $email= $this->session->userdata('email');
    $get_reg_no=$this->Add_phdef_registration_model->get_registration_no_by_email($email);
    $get_reg_details=$this->Add_phdef_registration_model->get_registration_detail_by_email($email);
    $gate_sub_code=trim($this->input->post('gate_sub_code'));
    $programme_apply_for=trim($this->input->post('programme_apply_for'));
    $prog_elligibilty=trim($this->input->post('prog_elligibilty'));
    $Work_Experince_yes_no=trim($this->input->post('Work_Experince_yes_no'));
    $ming_non_m_yes_no=trim($this->input->post('ming_non_m_yes_no'));
    $course=trim($this->input->post('course'));
    $p_elig_desc=$this->Add_phdef_registration_model->get_degree_desc_by_program_id($prog_elligibilty);
  }

  public function get_apply_post()
  {

    // $this->load->model('admission/phd/Add_phd_registration_model');
    // $this->load->model('admission/phd/Adm_phd_application_model');
    $email= $this->session->userdata('email');
    if(!($this->session->has_userdata('login_type')))
    {
      redirect('admission/phdef/Add_phdef/adm_phdef_login');
    }

    $get_reg_no=$this->Add_phdef_registration_model->get_registration_no_by_email($email);
    $get_reg_details=$this->Add_phdef_registration_model->get_registration_detail_by_email($email);

    if(empty($get_reg_details))
    {
      $this->session->set_flashdata('error','Details unable to get for this registration internal error!');
      $data['val']="H";
      $this->adm_phdef_header($data);
      $this->load->view('admission/phdef/adm_phdef_apply_post');
      $this->adm_phdef_footer();
    }


     $programme_apply_for=trim($this->input->post('programme_apply_for'));
     $prog_elligibilty=trim($this->input->post('prog_elligibilty'));
     $Priority1=trim($this->input->post('Priority1'));
     $Priority2=trim($this->input->post('Priority2'));
     $Priority3=trim($this->input->post('Priority3'));
     $Priority4=trim($this->input->post('Priority4'));
     $Priority5=trim($this->input->post('Priority5'));
     $dept= trim($this->input->post('dept'));
     $phd_in= trim($this->input->post('phd_in'));
      $data=array(
        'program_id'=> $programme_apply_for,
        'degree_code'=>$prog_elligibilty
      );

      $cond=array(
        'registration_no'=>$get_reg_no,
        'program_id'=>$programme_apply_for,
      );

      $val_apply=$this->Adm_phdef_application_model->already_applied($cond);
      $appl_program=$this->Adm_phdef_personal_details_model->get_adm_phd_reg_appl_program($get_reg_no);
      // echo $this->db->last_query();
      // exit;

      if($val_apply=='ok')
      {
        $this->session->set_flashdata('error','You have already applied for the programme!');
        redirect('admission/phdef/Adm_phdef_user_dashboard/apply_post');
        exit;
      }
      if(count($appl_program)>=1)
      {
        $this->session->set_flashdata('error','You cannot apply for more than one programme!');
        redirect('admission/phdef/Adm_phdef_user_dashboard/apply_post');
        exit;
      }
      $appl_program=$this->Adm_phdef_personal_details_model->get_adm_phd_reg_appl_program($get_reg_no);
      $datat['candidate_type']=$this->Add_phdef_registration_model->get_candidate_type_by_email($email);

      // echo $this->db->last_query();
      // exit;

    $elligibilty_y_n=$this->Add_phdef_registration_model->get_mining_non_mining($data);
    $p_elig_desc=$this->Add_phdef_registration_model->get_degree_desc_by_program_id($prog_elligibilty);
    $p_apply_f_desc=$this->Add_phdef_registration_model->get_program_desc_by_program_id($programme_apply_for);
    $department=$this->Add_phdef_registration_model->get_department_by_program_id($programme_apply_for);
    $candidate_type=$this->Add_phdef_registration_model->get_candidate_type_by_email($email);
    $dept_id=$department[0]->dept_id;
    $dept_desc=$department[0]->program_desc;
    $application_type=$get_reg_details[0]->appl_type;




    $category=$get_reg_details[0]->category;
    $gender=$get_reg_details[0]->gender;
    $pwd=$get_reg_details[0]->pwd;

    if($category=='General' || $category=='OBC' ||  $category=='EWS')
    {
      //$application_fee=2;
        $application_fee=1000;

    }

    if($category=='SC' || $category=='ST' ||  $pwd=='Y' || $gender=='Female' || $gender=='Transgender' )
    {
      $application_fee=500;
      //$application_fee=1;
    }




    $this->form_validation->set_rules('programme_apply_for','Programme applying for','required');
    $this->form_validation->set_rules('prog_elligibilty','Programme Elligibilty','required');
    $this->form_validation->set_rules('dept', 'Department', 'required');
    $this->form_validation->set_rules('phd_in', 'phd In', 'required');
    $this->form_validation->set_rules('Priority1', 'Priority 1', 'required');
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
        'gender'=>$get_reg_details[0]->gender,
        'color_blind'=>$get_reg_details[0]->color_blind,
        'created_by'=>$email,
      );


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
        'phd_in' => $phd_in,
        'status'=>'Y',
        'application_no'=>strtoupper($programme_apply_for).$extreg,
        'fee_amount'=>$application_fee,
        'created_by'=>$email,
      );

      $values1=array(
        'registration_no'=>$get_reg_no,
        'created_by'=>$email,
      );

      $prio1=array(
        'registration_no'=>$get_reg_details[0]->registration_no,
        'program_id'=>$programme_apply_for,
        'spec_desc'=>$Priority1,
        'priority'=>1,
        'created_by'=>$email
      );
      $prio2=array(
        'registration_no'=>$get_reg_details[0]->registration_no,
        'program_id'=>$programme_apply_for,
        'spec_desc'=>$Priority2,
        'priority'=>2,
        'created_by'=>$email
      );
      $prio3=array(
        'registration_no'=>$get_reg_details[0]->registration_no,
        'program_id'=>$programme_apply_for,
        'spec_desc'=>$Priority3,
        'priority'=>3,
        'created_by'=>$email
      );

      $prio4=array(
        'registration_no'=>$get_reg_details[0]->registration_no,
        'program_id'=>$programme_apply_for,
        'spec_desc'=>$Priority4,
        'priority'=>4,
        'created_by'=>$email
      );
      $prio5=array(
        'registration_no'=>$get_reg_details[0]->registration_no,
        'program_id'=>$programme_apply_for,
        'spec_desc'=>$Priority5,
        'priority'=>5,
        'created_by'=>$email
      );




      $application=strtoupper($programme_apply_for).$extreg;
      $ok1=$this->Adm_phdef_application_model->insert_application_details($values);
      
      $this->Adm_phdef_application_model->insert_specailization($prio1);
      
      if(!empty($Priority2))
      {
        $this->Adm_phdef_application_model->insert_specailization($prio2);
        
      }

      if(!empty($Priority3))
      {
        $this->Adm_phdef_application_model->insert_specailization($prio3);
        
      }
      if(!empty($Priority4))
      {
        $this->Adm_phdef_application_model->insert_specailization($prio4);
        
      }

      if(!empty($Priority5))
      {
        $this->Adm_phdef_application_model->insert_specailization($prio5);
        
      }



      //  echo $this->db->last_query();
      $ok2=$this->Adm_phdef_application_model->insert_application_programme($value_apl_prog);

      $ok3=$this->Adm_phdef_application_model->insert_phd_tab($values1);
 
      // echo $this->db->last_query();
      //  echo $ok2;
      //  exit;

      if($ok1=='ok' && $ok2=='ok')
      {
        $this->session->set_flashdata('apply_success','You succesfully added '.$p_apply_f_desc );
        redirect('admission/phdef/Adm_phdef_user_dashboard/apply_post');
      }
      else
      {
        $this->session->set_flashdata('error','Thier is error while saving data');
        redirect('admission/phdef/Adm_phdef_user_dashboard/apply_post');
      }

    }
    else
    {
      // echo validation_errors();
      // exit;
      // $this->load->model('admission/phd/Add_phd_registration_model');
      $viewdata['name'] = $this->session->userdata('name');
      $email= $this->session->userdata('email');
      $data['gate_paper_code']=$this->Add_phdef_registration_model->gate_paper_code();
      $data['btech_paper']=$this->Add_phdef_registration_model->get_programme_list_of_btech();
      $data['candidate_type']=$this->Add_phdef_registration_model->get_candidate_type_by_email($email);
      $data['val']="H";
      $this->adm_phdef_header($data);
      $this->load->view('admission/phdef/adm_phdef_apply_post');
      $this->adm_phdef_footer();
    }
  }


  public function get_check_sub_math_12th()
  {

    // $this->load->model('admission/phd/Add_phd_registration_model');
    $programme_apply_for=$this->input->post('programme_apply_for');
    $sub_math_12th=$this->Add_phdef_registration_model->sub_math_12th($programme_apply_for);
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

    // $this->load->model('admission/phd/Add_phd_registration_model');
    $programme_apply_for=$this->input->post('programme_apply_for');
    $prog_elligibilty=$this->input->post('prog_elligibilty');
    $data=array(
      'program_id'=> $programme_apply_for,
      'degree_code'=>$prog_elligibilty
    );
    $elligibilty_y_n=$this->Add_phdef_registration_model->get_mining_non_mining($data);
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
  public function get_program_elligibilty()
  {

    // $this->load->model('admission/phd/Add_phd_registration_model');
    $programme_apply_for = $this->input->post('programme_apply_for');
    $dept_ids=$this->Add_phdef_registration_model->get_department_id_by_program_id($programme_apply_for);
    $data['prog'] = $this->Add_phdef_registration_model->program_phd($dept_ids);
    $data['elligibilty'] = $this->Add_phdef_registration_model->program_elligibilty_by_programe($programme_apply_for);
    echo json_encode($data);
  }
  public function get_specialization_by_program_id()
  {
    // $this->load->model('admission/phd/Adm_phd_personal_details_model');
    $programme_apply_for = $this->input->post('programme_apply_for');
   $data['specail'] = $this->Adm_phdef_personal_details_model->get_specialization($programme_apply_for);
    echo json_encode($data);
  }

  public function get_faculty_by_dept_id()
  {
    // $this->load->model('admission/phd/Adm_phd_personal_details_model');
    $dept = $this->input->post('dept');
   $data['specail'] = $this->Adm_phdef_personal_details_model->get_faculty($dept);
    echo json_encode($data);
  }

}

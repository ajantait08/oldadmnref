<?php

class Adm_mtech_personal_details extends MY_Controller {

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
    $this->load->model('admission/mtech/Add_mtech_registration_model');
    $this->load->model('admission/mtech/Adm_mtech_personal_details_model');
    $this->load->model('admission/mtech/Adm_mtech_application_model');

  }

  function index()
  { 
    if(!($this->session->has_userdata('applied')))
    {
       redirect('admission/Add_mtech/adm_mtech_login');
    }
    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $data['registration_detail']=$this->Add_mtech_registration_model->get_registration_detail_by_email($email);
    $data['upload_document']=$this->Adm_mtech_personal_details_model->get_all_document_uploaded($get_reg_no);
    $data['application_details']=$this->Add_mtech_registration_model->get_application_programme_details($get_reg_no);
    foreach( $data['application_details'] as $val)
    {   
      if($val->sub_math_12th=='Y')
      {
        $sub_math_12th="yes";
      }
      if( $val->non_min_work_exp='Y')
      {
        $non_min_work_exp="yes";
      }
         
    }

    if(!empty($sub_math_12th)){
      $data['conditon'][0]=$sub_math_12th;
    }
    if(!empty($non_min_work_exp)){
      $data['conditon'][1]=$non_min_work_exp;
    }
   
  
    if(!($this->session->has_userdata('email')))
    {
      redirect('Add_mtech/adm_mtech_login');
    }

    // $data['application_details']=$this->Adm_mtech_personal_details_model->get_adm_mtech_reg_appl_program($get_reg_no);
    $data['fill_appl_details']=$this->Adm_mtech_application_model->get_application_fill_details($get_reg_no);
    $data['application_details_ms']=$this->Adm_mtech_personal_details_model->get_adm_mtech_appl_ms($get_reg_no);
    $data['qual12_details']=$this->Adm_mtech_personal_details_model->get_qualification12_details($get_reg_no);
    $data['qual10_details']=$this->Adm_mtech_personal_details_model->get_qualification10_details($get_reg_no);
    $data['qualug_details']=$this->Adm_mtech_personal_details_model->get_qualificationug_details($get_reg_no);
    $data['pg_details']=$this->Adm_mtech_personal_details_model->get_qualificationpg_details($get_reg_no);

    $data['exp_details']=$this->Adm_mtech_personal_details_model->get_expreince_details($get_reg_no);
    $data['exp_details_d']=$this->Adm_mtech_personal_details_model->get_expreince_details_dynamic($get_reg_no);
    
    $data['gate_details']=$this->Adm_mtech_personal_details_model->get_gate_score_details($get_reg_no);
    $data['iit_details']=$this->Adm_mtech_personal_details_model->get_iitname_details();
    $data['p_addr_details']=$this->Adm_mtech_personal_details_model->get_p_address_details($get_reg_no);
    
    $data['c_addr_details']=$this->Adm_mtech_personal_details_model->get_c_address_details($get_reg_no);
    $data['state']=$this->Adm_mtech_personal_details_model->get_state();

    $data['gate_paper_code']=$this->Add_mtech_registration_model->gate_paper_code(); 
    $data['candidate_type']=$this->Add_mtech_registration_model->get_candidate_type_by_email($email);
    $data['cfti_yes']=$this->Add_mtech_registration_model->get_cfti_by_reg($get_reg_no);
 
    // exit;
    $data['pro_work_yes_no']=$this->Adm_mtech_personal_details_model->get_non_min_work_exp($get_reg_no);

    
    if(empty($data['registration_detail']))
    {
       // redirect to home page
    }

    if($this->session->userdata('education'))
    {
      $data['tab']="education";
    }

    if($this->session->userdata('work_experience'))
    {
      $data['tab']="work_experience";
    }

    if($this->session->userdata('personal_details'))
    {
      $data['tab']="personal_details";
    } 
    
    $data['val']="H";
    $this->adm_mtech_header($data);
    $this->load->view('admission/mtech/adm_mtech_application',$data);
    $this->adm_mtech_footer();

  }

  public function get_personal_details()
  { 

    if(!($this->session->has_userdata('email')))
    {
      redirect('Add_mtech/adm_mtech_login');
    }

    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $get_reg_details=$this->Add_mtech_registration_model->get_registration_detail_by_email($email);
    $candidate_type=$this->Add_mtech_registration_model->get_candidate_type_by_email($email);
    $application_no=trim($this->input->post('application_no'));
    $registration_no=trim($this->input->post('registration_no'));
    $parent_name=$this->clean(trim($this->input->post('parent_name')));
    $guardian_mobile_no=$this->number_only(trim($this->input->post('guardian_mobile_no')));
    $parent_relation=$this->clean(trim($this->input->post('parent_relation')));
    $nationality=$this->clean(trim($this->input->post('nationality')));
    $religion=$this->clean(trim($this->input->post('religion')));
    $martial=$this->clean(trim($this->input->post('martial')));
    $gender=$this->clean(trim($this->input->post('gender')));
    $adhar=$this->number_only(trim($this->input->post('adhar')));
    $adm_type=$this->clean($this->input->post('adm_type'));
    // // $work_exp=trim($this->input->post('work_exp'));
    
    $c_line1=$this->with_comma_hypen(trim($this->input->post('c_line1')));
    $c_line2=$this->with_comma_hypen(trim($this->input->post('c_line2')));
    $c_line3=$this->with_comma_hypen(trim($this->input->post('c_line3')));
    $c_city=$this->clean(trim($this->input->post('c_city')));
    $c_state=$this->clean(trim($this->input->post('c_state')));
    $c_pincode=$this->number_only(trim($this->input->post('c_pincode')));
    $c_country=$this->clean(trim($this->input->post('c_country')));
    
    $p_line1=$this->with_comma_hypen(trim($this->input->post('p_line1')));
    $p_line2=$this->with_comma_hypen(trim($this->input->post('p_line2')));
    $p_line3=$this->with_comma_hypen(trim($this->input->post('p_line3')));
    $p_city=$this->clean(trim($this->input->post('p_city')));
    $p_state=$this->clean(trim($this->input->post('p_state')));
    $p_pincode=$this->number_only(trim($this->input->post('p_pincode')));
    $p_country=$this->clean(trim($this->input->post('p_country')));
    $c_line4=$this->with_comma_hypen(trim($this->input->post('c_line4')));
    $p_line4=$this->number_only($this->input->post('p_line4'));
    
    $this->form_validation->set_rules('parent_name','Parent Name','required|xss_clean');
    $this->form_validation->set_rules('parent_relation','Guardian','required|xss_clean');
    $this->form_validation->set_rules('guardian_mobile_no','Guardian Mobile Number','required|xss_clean');
    $this->form_validation->set_rules('nationality','Nationality','required');
    $this->form_validation->set_rules('religion','Religion','required|xss_clean');
    $this->form_validation->set_rules('martial','Martial','required|xss_clean');
    $this->form_validation->set_rules('gender','Gender','required');
    $this->form_validation->set_rules('p_line1','Permanent Address Address line1','required');
    $this->form_validation->set_rules('p_city','Permanent Address City','required|xss_clean');
    $this->form_validation->set_rules('p_state','Permanent Address State','required');
    $this->form_validation->set_rules('p_pincode','Permanent Address Pincode','trim|required|xss_clean');
    $this->form_validation->set_rules('c_line1','Correspondence Address Address line1','required');
    $this->form_validation->set_rules('c_city','Correspondence Address Permanent Address City','required|xss_clean');
    $this->form_validation->set_rules('c_state','Correspondence Address Permanent Address State','required');
    $this->form_validation->set_rules('c_pincode','Correspondence Address Permanent Address Pincode','trim|required|xss_clean');
    $this->form_validation->set_rules('email','Permanent Address Email','required');
    $this->form_validation->set_rules('dob','Permanent Address Dob','required');
    
    
    if ($this->form_validation->run() == true) 
    { 
      
      $personal_dteails=array(
        'guardian_name'=>$parent_name,
        'guardian_realtion'=>$parent_relation,
        'guardian_mobile'=>$guardian_mobile_no,
        'religion'=>$religion,
        'nationality'=>$nationality,
        'maritial_status'=>$martial,
        'gender'=>$gender,
        'adhar'=>$adhar,
        'adm_type'=>$adm_type,
        'status'=>'PF',
        // 'betch_iit'=>$betchflag,
        'created_by'=>$email
      );

      $permanent_address=array(
        'registration_no'=>$get_reg_no,
        'address_type'=>'P',
        'line_1'=>$p_line1,
        'line_2'=>$p_line2,
        'line_3'=>$p_line3,
        'city'=>$p_city,
        'state'=> $p_state,
        'pincode'=>$p_pincode,
        'country'=> $p_country,
        'created_by'=>$email
      );
      
      $current_address=array(
        'registration_no'=>$get_reg_no,
        'address_type'=>'C',
        'line_1'=>$c_line1,
        'line_2'=>$c_line2,
        'line_3'=>$c_line3,
        'city'=>$c_city,
        'state'=> $c_state,
        'pincode'=>$c_pincode,
        'country'=> $p_country,
        'created_by'=>$email,
      );

      $p_permanent_address=array(
        'line_1'=>$p_line1,
        'line_2'=>$p_line2,
        'line_3'=>$p_line3,
        'city'=>$p_city,
        'state'=> $p_state,
        'pincode'=>$p_pincode,
        'country'=> $p_country,
        'modified_by'=>$email,
        'modified_date'=>date("H:i:s"),
      );

      $c_current_address=array(
        'address_type'=>'C',
        'line_1'=>$c_line1,
        'line_2'=>$c_line2,
        'line_3'=>$c_line3,
        'city'=>$c_city,
        'state'=> $c_state,
        'pincode'=>$c_pincode,
        'country'=> $p_country,
        'modified_by'=>$email,
        'modified_date'=>date("H:i:s"),
      );
      
      $tab=array(
        'tab1'=>1,
      );
      
      
      if($p_line4=='')
      { 
        
        
        $this->load->model('admission/mtech/Adm_mtech_personal_details_model');
        $this->db->trans_start();
        $this->Adm_mtech_personal_details_model->update_personal_deatils($personal_dteails,$get_reg_no);
        $this->Adm_mtech_personal_details_model->insert_address($permanent_address);
        $this->Adm_mtech_personal_details_model->insert_address($current_address);
        $this->Adm_mtech_personal_details_model->update_tab1($tab,$get_reg_no);
        $this->db->trans_complete();
     
        if ($this->db->trans_status() === FALSE) 
        
        {
          $this->session->set_flashdata('error_personal','Internal Network error occured error code P101');
          redirect('admission/mtech/Adm_mtech_personal_details');

        }
        else 
        { 
          $this->session->set_userdata('education','education');
          $this->session->unset_userdata('personal_details');
          $this->session->set_flashdata('apply_success_pd','You succesfully added Please fill educational details');
          redirect('admission/mtech/Adm_mtech_personal_details');
          $data['val']="H";
          $data['tab']="education";
          $data['qualification']="qualification";
          $this->adm_mtech_header($data);
          $this->load->view('admission/mtech/adm_mtech_application',$data);
          $this->adm_mtech_footer();
        }
          

      }
      else 
      {
       
        $this->load->model('admission/mtech/Adm_mtech_personal_details_model');
        $this->db->trans_start();
        $this->Adm_mtech_personal_details_model->update_personal_deatils($personal_dteails,$get_reg_no);
        $this->Adm_mtech_personal_details_model->update_p_address($p_permanent_address,$get_reg_no);
        $this->Adm_mtech_personal_details_model->update_c_address($c_current_address,$get_reg_no);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) 
        {
          $this->session->set_flashdata('error_personal','Internal Network error occured error code P102');
          redirect('admission/mtech/Adm_mtech_personal_details');

        }
        else 
        { 
          $this->session->set_userdata('education','education');
          $this->session->unset_userdata('personal_details');
          $this->session->set_flashdata('apply_success_pd','You edit succesfully');
          redirect('admission/mtech/Adm_mtech_personal_details');
          $data['val']="H";
          $data['tab']="education";
          $data['qualification']="qualification";
          $this->adm_mtech_header($data);
          $this->load->view('admission/mtech/adm_mtech_application',$data);
          $this->adm_mtech_footer();
        }

      }

        
    }

    else
    { 
      
      $data['registration_detail']=$this->Add_mtech_registration_model->get_registration_detail_by_email($email);
      $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
      $data['application_details']=$this->Adm_mtech_personal_details_model->get_adm_mtech_reg_appl_program($get_reg_no);
      $data['application_details_ms']=$this->Adm_mtech_personal_details_model->get_adm_mtech_appl_ms($get_reg_no);
      $data['qual12_details']=$this->Adm_mtech_personal_details_model->get_qualification12_details($get_reg_no);
      $data['qual10_details']=$this->Adm_mtech_personal_details_model->get_qualification10_details($get_reg_no);
      $data['qualug_details']=$this->Adm_mtech_personal_details_model->get_qualificationug_details($get_reg_no);
      $data['pg_details']=$this->Adm_mtech_personal_details_model->get_qualificationpg_details($get_reg_no);
      $data['betchiit']=$data['application_details_ms'][0]['betch_iit'];
      $data['exp_details']=$this->Adm_mtech_personal_details_model->get_expreince_details($get_reg_no);
      $data['exp_details_d']=$this->Adm_mtech_personal_details_model->get_expreince_details_dynamic($get_reg_no);
      $data['gate_details']=$this->Adm_mtech_personal_details_model->get_gate_score_details($get_reg_no);
      $data['iit_details']=$this->Adm_mtech_personal_details_model->get_iitname_details();
      $data['p_addr_details']=$this->Adm_mtech_personal_details_model->get_p_address_details($get_reg_no);
      $data['c_addr_details']=$this->Adm_mtech_personal_details_model->get_c_address_details($get_reg_no);
      $data['state']=$this->Adm_mtech_personal_details_model->get_state();
      // $this->session->set_flashdata('error_educationa','Thier is error while saving data');
      // $this->session->set_userdata('personal_details','personal_details');
      $data['val']="H";
      $data['tab']="personal_details";
      $data['personal_detail']="personal_detail";
      $this->adm_mtech_header($data);
      $this->load->view('admission/mtech/adm_mtech_application',$data);
      $this->adm_mtech_footer();

    }

  }

  public function get_education_detail()
  { 
    // mtech finction start
    if(!($this->session->has_userdata('email')))
    {
      redirect('Add_mtech/adm_mtech_login');
    }

    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $candidate_type=$this->Add_mtech_registration_model->get_candidate_type_by_email($email);
    $cfti_yes=$this->Add_mtech_registration_model->get_cfti_by_reg($get_reg_no);
    
    $data['application_details_ms']=$this->Adm_mtech_personal_details_model->get_adm_mtech_appl_ms($get_reg_no);
    $betchiit=$data['application_details_ms'][0]['betch_iit'];
    // $btech_cat_qual=trim($this->input->post('btech_cat_qual'));
    $btech_iit_name=$this->clean(trim($this->input->post('iit_names')));

    $gate_reg_no=trim($this->input->post('gate_reg_no'));
    $gate_reg_no_re=trim($this->input->post('gate_reg_no_re'));
    $gate_score=trim($this->input->post('gate_score'));
    $gate_y_passing=trim($this->input->post('gate_y_passing'));
    $gate_score_valid=trim($this->input->post('gate_score_valid'));
    // $gate_result_status=trim($this->input->post('gate_result_status'));
    
    $examtype10=$this->apha_numeric_only(trim($this->input->post('examtype10')));
    $name_of_exam10=$this->apha_numeric_only(trim($this->input->post('name_of_exam10')));
    $dicipline_10=$this->apha_numeric_only(trim($this->input->post('discipline10')));
    $Institute_exam10=$this->clean(trim($this->input->post('Institute_exam10')));
    $passed10=$this->clean(trim($this->input->post('10passed')));
    $percentage10=$this->clean(trim($this->input->post('10percentage')));
    $ten_y_pass=$this->number_only(trim($this->input->post('10_y_pass')));
    $ten_p_cgpa=$this->number_with_dot(trim($this->input->post('10_p_cgpa')));
    
    $examtype12=$this->apha_numeric_only(trim($this->input->post('examtype12')));
    $name_of_exam12=$this->apha_numeric_only(trim($this->input->post('name_of_exam12')));
    $dicipline_12=$this->apha_numeric_only(trim($this->input->post('discipline12')));
    $Institute12=$this->clean(trim($this->input->post('Institute12')));
    $passed_12=$this->clean(trim($this->input->post('12passed')));
    $percentage_12=$this->clean(trim($this->input->post('12percentage')));
    $y_pass_12=$this->number_only(trim($this->input->post('12_y_pass')));
    $p_cgpa_12=$this->number_with_dot(trim($this->input->post('12_p_cgpa')));
    
    $examtypeug=$this->clean(trim($this->input->post('examtypeug')));
    $name_of_ugexam=$this->clean(trim($this->input->post('name_of_ugexam')));
    $dicipline_ug=$this->apha_numeric_only(trim($this->input->post('disciplineug')));
    $Institute_examug=$this->clean(trim($this->input->post('Institute_examug')));
    $ug_appearing=$this->clean(trim($this->input->post('ug_appearing')));
    $ug_percentage=$this->clean(trim($this->input->post('ug_percentage')));
    $ug_p_cgpa=$this->number_with_dot(trim($this->input->post('ug_p_cgpa')));
    $ug_y_passing=$this->number_with_dot(trim($this->input->post('ug_y_passing')));
    $examtypepg=$this->input->post('examtypepg'); //for dynamic row
    
    $name_of_pgexam=$this->input->post('name_of_pgexam');
    $Institute_exampg=$this->input->post('Institute_exampg');
    $dicipline_pg=$this->apha_numeric_only($this->input->post('disciplinepg'));
    $pg_appearing=$this->input->post('pg_appearing');
    $pg_percentage=$this->input->post('pg_percentage');
    $pg_p_cgpa=$this->input->post('pg_p_cgpa');
    $pg_y_passing=$this->input->post('pg_y_passing');
    
    if($candidate_type=='IIT Graduates')
    {
      
      $this->form_validation->set_rules('iit_names','IIT name','required');
    }

    if($candidate_type=='GATE Candidates' OR $cfti_yes=='No')
    {
      if($gate_reg_no!=$gate_reg_no_re)
      {
        $this->session->set_flashdata('error_educationa','Re-enter Gate Registration Number does not match');
        redirect('admission/mtech/Adm_mtech_personal_details');
      }

      $this->form_validation->set_rules('gate_score','Gate score','required|xss_clean');
      $this->form_validation->set_rules('gate_y_passing','Gate year of passing','required|xss_clean');
      $this->form_validation->set_rules('gate_score_valid','Score card valid upto','required');
      // $this->form_validation->set_rules('gate_result_status','Result status in qualifying degree','required|xss_clean');
    }
    
    $this->form_validation->set_rules('name_of_exam10','10th Name of exam','required');
    $this->form_validation->set_rules('discipline10','10th discipline','required');
    $this->form_validation->set_rules('Institute_exam10','10th Institute/university name','trim|required|xss_clean');
    $this->form_validation->set_rules('10passed','10th result Status','required');
    $this->form_validation->set_rules('10percentage','10th marks','required');
    $this->form_validation->set_rules('10_y_pass','10th year of passing','required');
    $this->form_validation->set_rules('10_p_cgpa','10th percentage/CGPA','required|xss_clean');
    
    $this->form_validation->set_rules('examtype12','12th Exam type','required|xss_clean');
    $this->form_validation->set_rules('discipline12','12th discipline','required');
    $this->form_validation->set_rules('name_of_exam12','12th Name of exam','required');
    $this->form_validation->set_rules('Institute12','12th Institute/university name','trim|required|xss_clean');
    $this->form_validation->set_rules('12passed','12th result Status','required');
    $this->form_validation->set_rules('12percentage','12th marks','required');
    $this->form_validation->set_rules('12_p_cgpa','12th year of passing','required');
    $this->form_validation->set_rules('12percentage','12th percentage/CGPA','required|xss_clean');
    
    $this->form_validation->set_rules('examtypeug','Ug Exam type','required|xss_clean');
    $this->form_validation->set_rules('disciplineug','UG discipline','required');
    $this->form_validation->set_rules('name_of_ugexam','Name of Ug exam','required');
    $this->form_validation->set_rules('Institute_examug','Ug Institute/university name','trim|required|xss_clean');
    $this->form_validation->set_rules('ug_appearing','Ug result Status','required');
    $this->form_validation->set_rules('ug_percentage','Ug marks','required');
    $this->form_validation->set_rules('ug_y_passing','Ug year of passing','required');
    $this->form_validation->set_rules('ug_p_cgpa','Ug percentage/CGPA','required|xss_clean');

    if ($this->form_validation->run() == true) 
    {
          
      $email=$this->session->userdata('email');
      $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
         
      $gate_detail_val=array(
        'registration_no'=> $get_reg_no,
        'gate_reg_no'=>$gate_reg_no,
        // 'gate_result_status'=>$gate_result_status,
        'gate_score'=>$gate_score,
        'year_pass'=>$gate_y_passing,
        'valid_upto'=>$gate_score_valid,
        'created_by'=> $email,
      );
                                                                                              
      $u_gate_detail_val=array(
        'gate_reg_no'=>$gate_reg_no,
        // 'gate_result_status'=>$gate_result_status,
        'gate_score'=>$gate_score,
        'year_pass'=>$gate_y_passing,
        'valid_upto'=>$gate_score_valid,
        'modified_by'=> $email,
        'modified_date'=>date("H:i:s"),
      );
      
      $personal_details_iit=array(
        'betch_iit_name'=>$btech_iit_name,
        'status'=>'PF'
      );

      $personal_details=array(
        'status'=>'PF'
      );
      
      $educations_details10=array(
        'registration_no'=>$get_reg_no,
        'exam_type'=>'10 th',
        'exam_name'=>$name_of_exam10,
        'discipline'=>$dicipline_10,
        'institue_name'=>$Institute_exam10,
        'result_status'=>$passed10,
        'marks_perc_type'=>$percentage10,
        'mark_cgpa_percenatge'=>$ten_p_cgpa,
        'year_of_passing'=>$ten_y_pass,
        'created_by'=>$email,
      );
      
      $u_educations_details10=array(
        'exam_name'=>$name_of_exam10,
        'discipline'=>$dicipline_10,
        'institue_name'=>$Institute_exam10,
        'result_status'=>$passed10,
        'marks_perc_type'=>$percentage10,
        'mark_cgpa_percenatge'=>$ten_p_cgpa,
        'year_of_passing'=>$ten_y_pass,
        'modified_by'=>$email,
        'modified_date'=>date("H:i:s"),
      );

      $educations_details12=array(
        'registration_no'=>$get_reg_no,
        'exam_type'=>$examtype12,
        'exam_name'=>$name_of_exam12,
        'discipline'=>$dicipline_12,
        'institue_name'=>$Institute12,
        'result_status'=>$passed_12,
        'marks_perc_type'=>$percentage_12,
        'mark_cgpa_percenatge'=>$p_cgpa_12,
        'year_of_passing'=>$y_pass_12,
        'created_by'=>$email,
      );

      $u_educations_details12=array(
        'exam_name'=>$name_of_exam12,
        'discipline'=>$dicipline_12,
        'institue_name'=>$Institute12,
        'result_status'=>$passed_12,
        'marks_perc_type'=>$percentage_12,
        'mark_cgpa_percenatge'=>$p_cgpa_12,
        'year_of_passing'=>$y_pass_12,
        'created_by'=>$email,
        'modified_by'=>$email,
        'modified_date'=>date("H:i:s"),
      );

      $educations_detailug=array(
        'registration_no'=>$get_reg_no,
        'exam_type'=>$examtypeug,
        'discipline'=>$dicipline_ug,
        'exam_name'=>$name_of_ugexam,
        'institue_name'=>$Institute_examug,
        'result_status'=>$ug_appearing,
        'marks_perc_type'=>$ug_percentage,
        'mark_cgpa_percenatge'=>$ug_p_cgpa,
        'year_of_passing'=>$ug_y_passing,
        'created_by'=>$email,
      );

      $u_educations_detailug=array(
        'exam_name'=>$name_of_ugexam,
        'discipline'=>$dicipline_ug,
        'institue_name'=>$Institute_examug,
        'result_status'=>$ug_appearing,
        'marks_perc_type'=>$ug_percentage,
        'mark_cgpa_percenatge'=>$ug_p_cgpa,
        'year_of_passing'=>$ug_y_passing,
        'modified_by'=>$email,
        'modified_date'=>date("H:i:s")
      );

      for($i=0; $i<count($examtypepg); $i++)
      {

        $examtypepg=$this->input->post('examtypepg');
        // echo $employer[$i]."<br>";
        $datab[]=[
        'registration_no'=>$get_reg_no,
        'exam_type'=>$this->clean($examtypepg[$i]),
        'exam_name'=>$this->clean($name_of_pgexam[$i]),
        'discipline'=>$this->clean($dicipline_pg[$i]),
        'institue_name'=>$this->clean($Institute_exampg[$i]),
        'result_status'=>$this->clean($pg_appearing[$i]),
        'marks_perc_type'=>$this->clean($pg_percentage[$i]),
        'mark_cgpa_percenatge'=>$this->number_with_dot($pg_p_cgpa[$i]),
        'year_of_passing'=>$this->number_only($pg_y_passing[$i]),
        'created_by'=>$email,
        ];
      }
       
      if(!empty($datab)){
        foreach ($datab as $val) {
          if($val['exam_type']=='' || $val['exam_name']=='' || $val['discipline']=='' || $val['institue_name']=='' || $val['result_status']=='' || $val['marks_perc_type']=='' || $val['mark_cgpa_percenatge']=='' || $val['year_of_passing']=='')
          {
          
            $this->session->set_flashdata('dyerror','Input field is blank in dyanmic created row of qualification details please fill all field');
            redirect('admission/mtech/Adm_mtech_personal_details');
            break;
          }
        }
      }
      
      $tab=array(
        'tab2'=>2,
      );
     
      $qualrow=$this->Adm_mtech_personal_details_model->get_qual_row($get_reg_no);
      if($qualrow)
      {  
         //data will update 
         // exit;
         $cond=array(
          'registration_no' =>$get_reg_no,
          'exam_type' =>'PG Exam',
          );

          $this->db->trans_start();
          $this->Adm_mtech_personal_details_model->delete_qualification_pg($cond);
          $this->load->model('admission/mtech/Adm_mtech_personal_details_model');
          if(!empty($datab))
          { 
            $this->Adm_mtech_personal_details_model->insert_qualification_batch($datab);
          }
  
          if($candidate_type=='GATE Candidates' OR $cfti_yes=='No')
          { 
            //$this->Adm_mtech_personal_details_model->insert_gate_details($gate_dteails_val);
            $this->Adm_mtech_personal_details_model->update_gate_details($u_gate_detail_val,$get_reg_no);  
            // echo $this->db->last_query();
            // exit;
            $this->Adm_mtech_personal_details_model->update_personal_deatils($personal_details,$get_reg_no);
            
           
          }
          if($candidate_type=='IIT Graduates')
          {
            $this->Adm_mtech_personal_details_model->update_personal_deatils($personal_details_iit,$get_reg_no);
          }

          $this->Adm_mtech_personal_details_model->update_qualification($u_educations_details10,$get_reg_no,'10 th');
          $this->Adm_mtech_personal_details_model->update_qualification($u_educations_details12,$get_reg_no,'12 th');
          $this->Adm_mtech_personal_details_model->update_qualification($u_educations_detailug,$get_reg_no,'UG Exam');
          $this->Adm_mtech_personal_details_model->update_personal_deatils($personal_details,$get_reg_no);
          
          $this->db->trans_complete();
          //  $false=2;
         if ($this->db->trans_status() === FALSE) 
          //  if($false==3)
          {
            $this->session->set_flashdata('error_educationa','Internal Network error occured error code E102');
            redirect('admission/mtech/Adm_mtech_personal_details');
  
          }
          else 
          { 
            $this->session->set_userdata('work_experience','work_experience');
            $this->session->unset_userdata('education');
            $this->session->set_flashdata('apply_success_education','You have succesfully Edited');
            redirect('admission/mtech/Adm_mtech_personal_details');
          }
      }
      else
      {
        //data will insert 
        $this->load->model('admission/mtech/Adm_mtech_personal_details_model');
         $this->db->trans_start();
        if(!empty($datab))
        { 
         
          $this->Adm_mtech_personal_details_model->insert_qualification_batch($datab);
        }
        if($candidate_type=='GATE Candidates' OR $cfti_yes=='No')
        { 
          $this->Adm_mtech_personal_details_model->insert_gate_details($gate_detail_val);
          //echo $this->db->last_query();
          //exit;
         //$this->Adm_mtech_personal_details_model->insert_cat_details($cat_detail_val);
          $this->Adm_mtech_personal_details_model->update_personal_deatils($personal_details,$get_reg_no);
      
        }
        if($candidate_type=='IIT Graduates')
        {
          $this->Adm_mtech_personal_details_model->update_personal_deatils($personal_details_iit,$get_reg_no);
        }

        $this->Adm_mtech_personal_details_model->insert_qualification($educations_details10);
        $this->Adm_mtech_personal_details_model->insert_qualification($educations_details12);
        $this->Adm_mtech_personal_details_model->insert_qualification($educations_detailug);
        $this->Adm_mtech_personal_details_model->update_personal_deatils($personal_details,$get_reg_no);
        $this->Adm_mtech_personal_details_model->update_tab1($tab,$get_reg_no);

         $this->db->trans_complete();
       // $false=1;
       if ($this->db->trans_status() === FALSE) 
        // if($false==3)
        {
          $this->session->set_flashdata('error_educationa','Internal Network error occured error code E102');
          redirect('admission/mtech/Adm_mtech_personal_details');

        }
        else 
        { 
          $this->session->set_userdata('work_experience','work_experience');
          $this->session->unset_userdata('education');
          $this->session->set_flashdata('apply_success_education','You succesfully added Please fill work experience details');
          $data['val']="H";
          $data['tab']="work_experience";
          $data['work_experince']="work_experince";
          redirect('admission/mtech/Adm_mtech_personal_details');
          $this->adm_mtech_header($data);
          $this->load->view('admission/mtech/adm_mtech_application',$data);
          $this->adm_mtech_footer();
        }
       
      }
      
      
    }
    else
    {  
     
      $email=$this->session->userdata('email');
      $data['registration_detail']=$this->Add_mtech_registration_model->get_registration_detail_by_email($email);
      $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
      $data['application_details']=$this->Adm_mtech_personal_details_model->get_adm_mtech_reg_appl_program($get_reg_no);
      $data['application_details_ms']=$this->Adm_mtech_personal_details_model->get_adm_mtech_appl_ms($get_reg_no);
      $data['qual12_details']=$this->Adm_mtech_personal_details_model->get_qualification12_details($get_reg_no);
      $data['qual10_details']=$this->Adm_mtech_personal_details_model->get_qualification10_details($get_reg_no);
      $data['qualug_details']=$this->Adm_mtech_personal_details_model->get_qualificationug_details($get_reg_no);
      $data['pg_details']=$this->Adm_mtech_personal_details_model->get_qualificationpg_details($get_reg_no);
      $data['betchiit']=$data['application_details_ms'][0]['betch_iit'];
     
      $data['exp_details']=$this->Adm_mtech_personal_details_model->get_expreince_details($get_reg_no);
     
      $data['exp_details_d']=$this->Adm_mtech_personal_details_model->get_expreince_details_dynamic($get_reg_no);
      
      // $data['cat_details']=$this->Adm_mtech_personal_details_model->get_cat_score_details($get_reg_no);
      
      $data['iit_details']=$this->Adm_mtech_personal_details_model->get_iitname_details();
      $data['p_addr_details']=$this->Adm_mtech_personal_details_model->get_p_address_details($get_reg_no);
      
      $data['c_addr_details']=$this->Adm_mtech_personal_details_model->get_c_address_details($get_reg_no);
      $data['state']=$this->Adm_mtech_personal_details_model->get_state();
      $data['tab']="education";
      $this->session->set_userdata('education','education'); 
      $data['val']="H";
      $data['qualification']="qualification";
      $this->adm_mtech_header($data);
      $this->load->view('admission/mtech/adm_mtech_application',$data);
      $this->adm_mtech_footer(); 
    }
    // mtech function edn
  }

  public function get_work_experience_detail()
  { 
    if(!($this->session->has_userdata('email')))
    {
      redirect('Add_mtech/adm_mtech_login');
    }

    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $work_exp=$this->clean($this->input->post('work_exp'));
    $work_exp_total=$this->number_only(trim($this->input->post('sum_of_month')));
    
    $degination1=$this->clean($this->input->post('degination1'));
    $organization1=$this->clean(trim($this->input->post('organization1')));
    $nature_of_work1=$this->clean(trim($this->input->post('nature_of_work1')));
    $duration1=$this->number_only(trim($this->input->post('duration1')));
    $sector1=$this->input->post('sector1');
    
    
    $degination=$this->clean($this->input->post('degination')); //dynamic row insert
    $organization=$this->input->post('organization');
    $nature_of_work=$this->input->post('nature_of_work');
    $duration=$this->input->post('duration');
    $duration_in_monthd=$this->input->post('duration_in_monthd');
    $sector=$this->input->post('sector');
    
    $tab=array(
      'tab3'=>2,
    );
    
    $personal_dteails=array(
      
      'work_expreince'=> $work_exp,
      'status'=>'PF'
    );

    if($work_exp=='No')
    { 

      $this->db->trans_start();
      $this->Adm_mtech_personal_details_model->update_tab1($tab,$get_reg_no);
      $this->Adm_mtech_personal_details_model->delete_all_work_experince($get_reg_no);
      $this->Adm_mtech_personal_details_model->update_personal_deatils($personal_dteails,$get_reg_no);

      $this->db->trans_complete();
      if ($this->db->trans_status() === FALSE) 
      {
        $this->session->set_flashdata('experror','Internal Network error occured error code W101');
        redirect('admission/mtech/Adm_mtech_personal_details');

      }
      else 
      { 
        redirect('admission/mtech/Adm_mtech_personal_details'); 
        exit;
      }

     
    }

    $this->form_validation->set_rules('degination1','Designation','required|xss_clean');
    $this->form_validation->set_rules('organization1','Organization','required|xss_clean');
    $this->form_validation->set_rules('nature_of_work1','Nature of work','required');
    $this->form_validation->set_rules('duration1','Duration(in month)','required|xss_clean');
    $this->form_validation->set_rules('sector1','Sector','required|xss_clean');

    $email=$this->session->userdata('email');
    if ($this->form_validation->run() == true) 
    {  

      // $work_exp_total=4;
      $work_exp_row1=array(
        'registration_no'=>$get_reg_no,
        'designation_no'=>$degination1,
        'designation_organistion'=>$organization1,
        'nature_of_work'=>$nature_of_work1,
        'duration_in_month'=>$duration1,
        'sector'=>$sector1,
        'created_by'=>$email
      );
      if (!empty($degination))
      {
        for($i=0; $i<count($degination); $i++)
        {
          // echo $employer[$i]."<br>";
          $datab[]=[
          'registration_no'=>$get_reg_no,
          'designation_no'=>$this->clean($degination[$i]),
          'designation_organistion'=>$this->clean($organization[$i]),
          'nature_of_work'=>$this->clean($nature_of_work[$i]),
          'duration_in_month'=>$this->number_only($duration_in_monthd[$i]),
          'sector'=>$this->clean($sector[$i]),
          'created_by'=>$email
         ];
  
        } 
      }
      

      $personal_dteails=array(
        'work_expreince'=> $work_exp,
        'total_work_experience'=>$work_exp_total,
      );

      $workexprow=$this->Adm_mtech_personal_details_model->get_work_exp_row($get_reg_no);
      if(empty($workexprow))
      {
        $this->db->trans_start();
        if(!empty($degination))
        {
          foreach ($datab as $val) {
            if($val['designation_no']=='' || $val['designation_organistion']=='' || $val['nature_of_work']=='' || $val['duration_in_month']=='' || $val['sector']=='')
            {

              $this->session->set_flashdata('experror','Input field is balnk in dyanmic created Work experince details please fill all field');
              redirect('admission/mtech/Adm_mtech_personal_details');
              break;
            }
          }
          $this->Adm_mtech_personal_details_model->insert_work_experince_batch($datab);
        }
        
        $this->Adm_mtech_personal_details_model->update_personal_deatils($personal_dteails,$get_reg_no);
        
        $this->Adm_mtech_personal_details_model->insert_work_experince($work_exp_row1);
        
        $this->Adm_mtech_personal_details_model->update_tab1($tab,$get_reg_no);
        // echo $this->db->last_query();
        // exit;
        $this->db->trans_complete();
        // $false=2;
        if ($this->db->trans_status() === FALSE) 
        // if($false==3)
        {
          $this->session->set_flashdata('experror','Internal Network error occured error code W102');
          redirect('admission/mtech/Adm_mtech_personal_details');
  
        }
        else 
        { 
          redirect('admission/mtech/Adm_mtech_personal_details'); 
        }
       
      }
      if(!empty($workexprow))
      { 
        
        // $this->db->trans_start();
        $this->Adm_mtech_personal_details_model->delete_all_work_experince($get_reg_no);
        // echo $this->db->last_query();
        // exit;
        
        $this->Adm_mtech_personal_details_model->insert_work_experince($work_exp_row1);
        if(!empty($degination))
        { 
          foreach ($datab as $val) {
            if($val['designation_no']=='' || $val['designation_organistion']=='' || $val['nature_of_work']=='' || $val['duration_in_month']=='' || $val['sector']=='')
            {

              $this->session->set_flashdata('experror','Input field is balnk in dyanmic created Work experince  please fill all field');
              redirect('admission/mtech/Adm_mtech_personal_details');
              break;
            }
          }
          $this->Adm_mtech_personal_details_model->insert_work_experince_batch($datab);
        }

        $this->Adm_mtech_personal_details_model->update_personal_deatils($personal_dteails,$get_reg_no);
        $this->Adm_mtech_personal_details_model->update_tab1($tab,$get_reg_no);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) 
        // $rum=1;
        // if($rum==2)
        {
          $this->session->set_flashdata('experror','Internal Network error occured error code W103');
          redirect('admission/mtech/Adm_mtech_personal_details');
  
        }
        else 
        { 
          redirect('admission/mtech/Adm_mtech_personal_details'); 
        }
        
      }
        
    }

    else
    {  

      $data['registration_detail']=$this->Add_mtech_registration_model->get_registration_detail_by_email($email);
      $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
      $data['application_details']=$this->Adm_mtech_personal_details_model->get_adm_mtech_reg_appl_program($get_reg_no);
      $data['application_details_ms']=$this->Adm_mtech_personal_details_model->get_adm_mtech_appl_ms($get_reg_no);
      $data['qual12_details']=$this->Adm_mtech_personal_details_model->get_qualification12_details($get_reg_no);
      $data['qual10_details']=$this->Adm_mtech_personal_details_model->get_qualification10_details($get_reg_no);
      $data['qualug_details']=$this->Adm_mtech_personal_details_model->get_qualificationug_details($get_reg_no);
      $data['pg_details']=$this->Adm_mtech_personal_details_model->get_qualificationpg_details($get_reg_no);
      $data['betchiit']=$data['application_details_ms'][0]['betch_iit'];
      $data['exp_details']=$this->Adm_mtech_personal_details_model->get_expreince_details($get_reg_no);
      $data['exp_details_d']=$this->Adm_mtech_personal_details_model->get_expreince_details_dynamic($get_reg_no); 
      $data['cat_details']=$this->Adm_mtech_personal_details_model->get_cat_score_details($get_reg_no);
      $data['iit_details']=$this->Adm_mtech_personal_details_model->get_iitname_details();
      $data['p_addr_details']=$this->Adm_mtech_personal_details_model->get_p_address_details($get_reg_no);
      $data['c_addr_details']=$this->Adm_mtech_personal_details_model->get_c_address_details($get_reg_no);
      $data['state']=$this->Adm_mtech_personal_details_model->get_state();
      $this->session->set_userdata('work_experience','work_experience');
      $data['val']="H";
      $data['tab']="work_experience";
      $data['open_work_experince']="work_experince";
      $this->adm_mtech_header($data);
      $this->load->view('admission/mtech/adm_mtech_application',$data);
      $this->adm_mtech_footer();

    }
    
  }

  public function final_submission()
  {
     
    $email=$this->session->userdata('email');
    
    if(!($this->session->has_userdata('login_type')))
    {
      redirect('admission/Add_mtech/adm_mtech_login');
    }
    if(!($this->session->has_userdata('applied')))
    {
       redirect('admission/Add_mtech/adm_mtech_login');
    }
    
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $work_exp=trim($this->input->post('work_exp'));
    $work_exp_total=$this->number_only(trim($this->input->post('sum_of_month')));
    
    $degination1=$this->clean($this->input->post('degination1'));
    $organization1=$this->clean(trim($this->input->post('organization1')));
    $nature_of_work1=$this->clean(trim($this->input->post('nature_of_work1')));
    $duration1=$this->number_only(trim($this->input->post('duration1')));
    $sector1=$this->clean(trim($this->input->post('sector1')));
    
    $degination=$this->clean($this->input->post('degination')); //dynamic row insert
    $organization=$this->input->post('organization');
    $nature_of_work=$this->input->post('nature_of_work');
    $duration=$this->input->post('duration');
    $duration_in_monthd=$this->input->post('duration_in_monthd');
    $sector=$this->input->post('sector');
   
    $tab=array(
      'tab3'=>3,
    );
    
    $personal_dteails=array(
      
      'work_expreince'=> $work_exp,
      'status'=>'PF'
    );
    
    if($work_exp=='No')
    { 
     
      $this->db->trans_start();
      $this->Adm_mtech_personal_details_model->delete_all_work_experince($get_reg_no);
      $this->Adm_mtech_personal_details_model->update_tab1($tab,$get_reg_no);
      $this->Adm_mtech_personal_details_model->update_personal_deatils($personal_dteails,$get_reg_no);
      $this->db->trans_complete();
      if ($this->db->trans_status() === FALSE) 
      {
        $this->session->set_flashdata('experror','Internal Network error occured error code W101');
        redirect('admission/mtech/Adm_mtech_personal_details');

      }
      else 
      { 
        $this->session->set_userdata('doc_start','doc_start');
        $this->session->unset_userdata('applied');
        redirect('admission/mtech/Adm_mtech_document');
      }
    }

    $this->form_validation->set_rules('degination1','Designation','required|xss_clean');
    $this->form_validation->set_rules('organization1','Organization','required|xss_clean');
    $this->form_validation->set_rules('nature_of_work1','Nature of work','required');
    $this->form_validation->set_rules('duration1','Duration(in month)','required|xss_clean');
    $this->form_validation->set_rules('sector1','Sector','required|xss_clean');
    $email=$this->session->userdata('email');
    if ($this->form_validation->run() == true) 
    {  

      // $work_exp_total=4;
      $work_exp_row1=array(
        'registration_no'=>$get_reg_no,
        'designation_no'=>$degination1,
        'designation_organistion'=>$organization1,
        'nature_of_work'=>$nature_of_work1,
        'duration_in_month'=>$duration1,
        'sector'=>$sector1,
        'created_by'=>$email
      );
      
      if (count($degination))
      {
        for($i=0; $i<count($degination); $i++)
        {
            // echo $employer[$i]."<br>";
            $datab[]=[
            'registration_no'=>$get_reg_no,
            'designation_no'=>$this->clean($degination[$i]),
            'designation_organistion'=>$this->clean($organization[$i]),
            'nature_of_work'=>$this->clean($nature_of_work[$i]),
            'duration_in_month'=>$this->number_only($duration_in_monthd[$i]),
            'sector'=>$this->clean($sector[$i]),
            'created_by'=>$email
          ];

        } 
      }
      $personal_dteails=array(
        'work_expreince'=> $work_exp,
        'total_work_experience'=>$work_exp_total,
      );
      $workexprow=$this->Adm_mtech_personal_details_model->get_work_exp_row($get_reg_no);
      if(!empty($workexprow))
      { 
        if(!empty($degination))
        {
          foreach ($datab as $val) {
            if($val['designation_no']=='' || $val['designation_organistion']=='' || $val['nature_of_work']=='' || $val['duration_in_month']=='' || $val['sector']=='')
            {

              $this->session->set_flashdata('experror','Input field is balnk in dyanmic created Work experince details please fill all field');
              redirect('admission/mtech/Adm_mtech_personal_details');
              break;
            }
          }
        } 
        $this->db->trans_start();
        $this->Adm_mtech_personal_details_model->delete_all_work_experince($get_reg_no);
        $this->Adm_mtech_personal_details_model->insert_work_experince($work_exp_row1);
        
        if(!empty($degination))
        {
          $this->Adm_mtech_personal_details_model->insert_work_experince_batch($datab);
        }
         
        $this->Adm_mtech_personal_details_model->update_personal_deatils($personal_dteails,$get_reg_no);
        
        $this->Adm_mtech_personal_details_model->update_tab1($tab,$get_reg_no);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) 
        {
          $this->session->set_flashdata('experror','Internal Network error occured error code F102');
          redirect('admission/mtech/Adm_mtech_personal_details');

        }
        else 
        { 
          // redirect('admission/Adm_mtech_personal_details'); 
          $this->session->set_userdata('doc_start','doc_start');
          $this->session->unset_userdata('applied');
          redirect('admission/mtech/Adm_mtech_document');
        } 
        
        
      }
      if(empty($workexprow))
      { 
        if(!empty($degination))
        {
          foreach ($datab as $val) {
            if($val['designation_no']=='' || $val['designation_organistion']=='' || $val['nature_of_work']=='' || $val['duration_in_month']=='' || $val['sector']=='')
            {

              $this->session->set_flashdata('experror','Input field is balnk in dyanmic created Work experince details please fill all field');
              redirect('admission/mtech/Adm_mtech_personal_details');
              break;
            }
          }
        } 
        $this->db->trans_start();
        $this->Adm_mtech_personal_details_model->delete_all_work_experince($get_reg_no);
        $this->Adm_mtech_personal_details_model->insert_work_experince($work_exp_row1);
        
        if(!empty($degination))
        {
          $this->Adm_mtech_personal_details_model->insert_work_experince_batch($datab);
        }
         
        $this->Adm_mtech_personal_details_model->update_personal_deatils($personal_dteails,$get_reg_no);
        
        $this->Adm_mtech_personal_details_model->update_tab1($tab,$get_reg_no);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) 
        {
          $this->session->set_flashdata('experror','Internal Network error occured error code F102');
          redirect('admission/mtech/Adm_mtech_personal_details');

        }
        else 
        { 
          // redirect('admission/Adm_mtech_personal_details'); 
          $this->session->set_userdata('doc_start','doc_start');
          $this->session->unset_userdata('applied');
          redirect('admission/mtech/Adm_mtech_document');
        } 

      }
      
      
    }

    else
    {  

      $data['registration_detail']=$this->Add_mtech_registration_model->get_registration_detail_by_email($email);
      $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
      $data['application_details']=$this->Adm_mtech_personal_details_model->get_adm_mtech_reg_appl_program($get_reg_no);
      $data['application_details_ms']=$this->Adm_mtech_personal_details_model->get_adm_mtech_appl_ms($get_reg_no);
      $data['qual12_details']=$this->Adm_mtech_personal_details_model->get_qualification12_details($get_reg_no);
      $data['qual10_details']=$this->Adm_mtech_personal_details_model->get_qualification10_details($get_reg_no);
      $data['qualug_details']=$this->Adm_mtech_personal_details_model->get_qualificationug_details($get_reg_no);
      $data['pg_details']=$this->Adm_mtech_personal_details_model->get_qualificationpg_details($get_reg_no);
      $data['betchiit']=$data['application_details_ms'][0]['betch_iit'];
      $data['exp_details']=$this->Adm_mtech_personal_details_model->get_expreince_details($get_reg_no);
      $data['exp_details_d']=$this->Adm_mtech_personal_details_model->get_expreince_details_dynamic($get_reg_no); 
      $data['gate_details']=$this->Adm_mtech_personal_details_model->get_gate_score_details($get_reg_no);
      $data['iit_details']=$this->Adm_mtech_personal_details_model->get_iitname_details();
      $data['p_addr_details']=$this->Adm_mtech_personal_details_model->get_p_address_details($get_reg_no);
      $data['c_addr_details']=$this->Adm_mtech_personal_details_model->get_c_address_details($get_reg_no);
      $data['state']=$this->Adm_mtech_personal_details_model->get_state();
      $this->session->set_userdata('work_experience','work_experience');
      $data['val']="H";
      $data['tab']="work_experience";
      $data['open_work_experince']="work_experince";
      $this->adm_mtech_header($data);
      $this->load->view('admission/mtech/adm_mtech_application',$data);
      $this->adm_mtech_footer();
    }
  }
  public function display_edu_detail_w() //for deleting qualification row
  {

    $this->load->model('admission/mtech/Add_mtech_registration_model');
    $this->load->model('admission/mtech/Adm_mtech_personal_details_model');
    $this->load->model('admission/mtech/Adm_mtech_application_model');
    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $id=$this->input->post('display_qual');
    $cond=array(
      'id'=> $id,
      'registration_no'=>$get_reg_no,
    );

    $msg=$this->Adm_mtech_personal_details_model->delete_row_work_qualification($cond); 
    echo json_encode($msg);  

  }

  public function display_work_detail_w() //for deleting working experince row
  {
    
    $this->load->model('admission/mtech/Add_mtech_registration_model');
    $this->load->model('admission/mtech/Adm_mtech_personal_details_model');
    $this->load->model('admission/mtech/Adm_mtech_application_model');
    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);

    $avd_id=$this->input->post('display_work');
    $cond=array(
      'id'=> $avd_id,
      'registration_no'=>$get_reg_no,
    );

    $msg=$this->Adm_mtech_personal_details_model->delete_row_work_experince($cond);
    echo json_encode($msg);  

  }
  

  function clean($string) // Removes special chars.
  {
    return preg_replace('/[^A-Za-z\s]/', '', $string); 
    
  }
  function number_only($string) //accept only number
  {
    return preg_replace( '/[^0-9]/', '', $string ); 
  }
  function with_comma_hypen($string)
  {
    return preg_replace('/[^A-Za-z0-9\s,-]/', '', $string); 
  }
  function number_with_dot($string)
  {
    return preg_replace( '/[^0-9.]/', '', $string ); 
  }
  function apha_numeric_only($string)
  {
    return preg_replace('/[^A-Za-z0-9\s]/', '', $string); 
  }

  public function document_upload($v)
  { 
   
    $file=$v;
    if($file=='ug_mark_sheet')
    {
      $doctype='ugm';
    }
    else if($file=='filedob')
    {
      $doctype='dob';
    }
    else if($file=='colour_blindness_doc')
    {
      $doctype='col';
    }
    else if($file=='gate_score_card_doc')
    {
      $doctype='gate';
    }
    else if($file=='pwd_certificate_doc')
    {
      $doctype='pwd';
    }
    else if($file=='cat_certificate_doc')
    {
      $doctype='caste';
    }
    else if($file=='pg_marksheet_doc')
    {
      $doctype='pgm';
    }
    else if($file=='photo')
    {
      $doctype='photo';
    }
    else if($file=='signature')
    {
      $doctype='signature';
    }
    else 
    {
      $doctype='work';
    }

    $upload='';
    $email = $this->session->userdata('email');
    $this->load->model('admission/Add_mtech_registration_model');
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $data['registration_detail']=$this->Add_mtech_registration_model->get_registration_detail_by_email($email);
    if (!file_exists('./assets/admission/mtech/'.$get_reg_no))
    {
      mkdir('./assets/admission/mtech/'.$get_reg_no, 0777, true);
    }
        //upload file
        $config['upload_path'] = './assets/admission/mtech/'.$get_reg_no;
        $config['allowed_types'] = '*';
        $config['max_filename'] = '255';
        $config['overwrite']=TRUE;
         $config['file_name'] = $file.$get_reg_no;
        $config['max_size'] = '1024'; //1 MB
        if (isset($_FILES[$file]['name']))
         { 
            if (0 < $_FILES[$file]['error'])
           {
                $msg='Error during file upload' . $_FILES[$file]['error'];
            }
           else
            {
                if (false)

                {
                    $msg='File already exists : uploads/' . $_FILES[$file]['name'];
                } 
                else 
                {
                  $this->load->library('upload', $config);
                  if (!$this->upload->do_upload($file)) {
                      $msg= $this->upload->display_errors();
                  } 
                  else
                  { 
                    
                    $msg='Uploaded file ' . $_FILES[$file]['name'].' '. 'can be viewed using Preview button';
                    $str = $file;
                    $this->session->set_userdata($file,$str);
                    // $this->session->unset_userdata('dob');
                    $send= base64_encode($str);
                    $k=base_url()."assets/admission/mtech/".$get_reg_no."/".$file.$get_reg_no.".pdf";
                    if($file=='photo'|| $file =='signature')
                    {
                      $k=base_url()."assets/admission/mtech/".$get_reg_no."/".$file.$get_reg_no.".jpg";
                      $document=array( 
                        'registration_no'=>$get_reg_no,
                        'doc_id'=>$doctype,
                        'doc_path'=>'assets/admission/mtech/'.$get_reg_no.'/'.$file.$get_reg_no.'.jpg',
                        'created_by'=>$email
                      );
                    }
                    else
                    {
                      $document=array( 
                        'registration_no'=>$get_reg_no,
                        'doc_id'=>$doctype,
                        'doc_path'=>'assets/admission/mtech/'.$get_reg_no.'/'.$file.$get_reg_no.'.pdf',
                        'created_by'=>$email
                      );
                    }
                   
                    if($this->Adm_mtech_personal_details_model->insert_document_val($document))
                    {
                      $upload='doc_ok';
                    }
                    else
                    {
                      $upload='not';
                    }
                    
                  }
                }
            }
        } 
        else 
        {
            $msg='Please choose a file';
        }
         $response = array(
          'msg' =>$msg,
          'link'=>$k,
          'send'=>$send,
          'two'=>$v,
          'doc_msg'=>$upload,
          'file_name'=> $file,
       
        );
        echo json_encode($response); 
  }

  public function document_remove($remove)
  { 
    $email= $this->session->userdata('email');
    $this->load->model('admission/Add_mtech_registration_model');
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $upload='';
    $file=$remove;
    if($file=='ug_mark_sheet')
    {
      $doctype='ugm';
    }
    else if($file=='filedob')
    {
      $doctype='dob';
    }
    else if($file=='colour_blindness_doc')
    {
      $doctype='col';
    }
    else if($file=='gate_score_card_doc')
    {
      $doctype='gate';
    }
    else if($file=='pwd_certificate_doc')
    {
      $doctype='pwd';
    }
    else if($file=='cat_certificate_doc')
    {
      $doctype='caste';
    }
    else if($file=='pg_marksheet_doc')
    {
      $doctype='pgm';
    }
    else if($file=='photo')
    {
      $doctype='photo';
    }
    else if($file=='signature')
    {
      $doctype='signature';
    }
    else 
    {
      $doctype='work';
    }
    $cond=array(
      'registration_no' =>$get_reg_no,
      'doc_id' => $doctype
    );

   
    // $data['registration_detail']=$this->Add_mtech_registration_model->get_registration_detail_by_email($email);
    $files =(file_exists('assets/admission/mtech/'.$get_reg_no.'/'.$file.$get_reg_no.'.pdf'));
    if($files)
    {
      // unlink("https://nfrdev.iitism.ac.in/assets/images/nfr_user_documenttt/dob/app_no/$app_no/user_dob".$app_no.".pdf");
      //$this->session->unset_userdata('dob');
      $this->session->unset_userdata($file);
      // $msg="no file avaiable";
      //$msg=base_url()."assets/admission/mtech/".$get_reg_no."/".$file.$get_reg_no.".pdf";
      if($this->Adm_mtech_personal_details_model->remove_document_val($cond))
      {
        $upload='doc_remove';
      }
      else
      {
        $upload='not';
      }
      $this->session->unset_userdata($file);

      $msg ="File has been removed";

    }
    else
    {
      if($this->Adm_mtech_personal_details_model->remove_document_val($cond))
      {
        $upload='doc_remove';
      }
      else
      {
        $upload='not';
      }
      $this->session->unset_userdata($file);
      $msg ="File has been removed";
       
    }

    $response = array(
    'msg' =>$msg,
    'doc_remove' =>$upload,
    'file_name' =>$file,
    );

    echo(json_encode($response));
  }

  public function photo_signature_upload()
  {

  }

  public function insert_document()
  { 
    
    echo "reach here";
    exit;
    $email= $this->session->userdata('email');
    $this->load->model('admission/Add_mtech_registration_model');
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $data['registration_detail']=$this->Add_mtech_registration_model->get_registration_detail_by_email($email);
    $filedob=array(
    'registration_no'=>$get_reg_no,
    'doc_id'=>'dob',
    'doc_path'=>'assets/admission/mtech/'.$get_reg_no.'/filedob'.$get_reg_no.'.pdf',
    'created_by'=>$email
    );
    $cat_certificate_doc=array(
      'registration_no'=>$get_reg_no,
      'doc_id'=>'dob',
      'doc_path'=>'assets/admission/mtech/'.$get_reg_no.'/cat_certificate_doc'.$get_reg_no.'.pdf',
      'created_by'=>$email
    );
    $colour_blindness_doc=array(
      'registration_no'=>$get_reg_no,
      'doc_id'=>'dob',
      'doc_path'=>'assets/admission/mtech/'.$get_reg_no.'/colour_blindness_doc'.$get_reg_no.'.pdf',
      'created_by'=>$email
    );
    $gate_score_card_doc=array(
      'registration_no'=>$get_reg_no,
      'doc_id'=>'dob',
      'doc_path'=>'assets/admission/mtech/'.$get_reg_no.'/gate_score_card_doc'.$get_reg_no.'.pdf',
      'created_by'=>$email

    );
    $pg_marksheet_doc=array(
      'registration_no'=>$get_reg_no,
      'doc_id'=>'dob',
      'doc_path'=>'assets/admission/mtech/'.$get_reg_no.'/pg_marksheet_doc'.$get_reg_no.'.pdf',
      'created_by'=>$email
    );
    $pwd_certificate_doc=array(
      'registration_no'=>$get_reg_no,
      'doc_id'=>'dob',
      'doc_path'=>'assets/admission/mtech/'.$get_reg_no.'/pwd_certificate_doc'.$get_reg_no.'.pdf',
      'created_by'=>$email
    );
    $ug_mark_sheet=array(
      'registration_no'=>$get_reg_no,
      'doc_id'=>'dob',
      'doc_path'=>'assets/admission/mtech/'.$get_reg_no.'/ug_mark_sheet'.$get_reg_no.'.pdf',
      'created_by'=>$email
    );
    $work_experience_doc=array(
      'registration_no'=>$get_reg_no,
      'doc_id'=>'dob',
      'doc_path'=>'assets/admission/mtech/'.$get_reg_no.'/work_experience_doc'.$get_reg_no.'.pdf',
      'created_by'=>$email
    );

    // $this->form_validation->set_rules('filessential','Essential certificate','callback_checkessen');
    // $this->form_validation->set_rules('file_dob','Dob certificate','callback_checkdob');
    
    // if($experience=='Yes')
    // {
    //   $this->form_validation->set_rules('exp','Experience certificate','callback_checkexp');
    // }
    // if($pwd=='Y')
    // {
    //    $this->form_validation->set_rules('file_pwd','Pwd','callback_checkpwd');
    // }
    // if($category=='OBC' or $category=='ST' or $category=='SC' or $category=='EWS')
    // {
    //    $this->form_validation->set_rules('file_obc','Caste certificate','callback_checkcaste');
    // } 
    $this->form_validation->set_rules('uphoto','uphoto','callback_handle_upload');
    $this->form_validation->set_rules('usignature','usignature','callback_handle_uploadsig');
    if ($this->form_validation->run() == True) 
    { 
      echo "validation true";
      exit;
      // $this->session->unset_userdata('filedob');
      // $this->session->unset_userdata('cat_certificate_doc');
      // $this->session->unset_userdata('colour_blindness_doc');
      // $this->session->unset_userdata('gate_score_card_doc');
      // $this->session->unset_userdata('pg_marksheet_doc');
      // $this->session->unset_userdata('pwd_certificate_doc');
      // $this->session->unset_userdata('ug_mark_sheet');
      // $this->session->unset_userdata('work_experience_doc');
      $aadv['photo']='images/nfr_user_photo_sign/'.$_POST['uphoto'];
      $aadv['signature']='images/nfr_user_photo_sign/'.$_POST['usignature'];
      // $true1=$this->Registration_model->insert_reg_form($aadv);
      $var1=$this->session->has_userdata('filedob');
      $var2=$this->session->has_userdata('ug_mark_sheet');
      $var5=$this->session->has_userdata('work_experience_doc');
    
     if( $category=='OBC' or  $category=='SC' or  $category='ST' or  $category ='EWS')
     {
        $var6=$this->session->has_userdata('cat_certificate_doc');
     }
     if($experience=='Yes')
     {
        $var5=$this->session->has_userdata('work_experience_doc');
     }
     if($ex_service=='Y')
     {
       $var4=$this->session->has_userdata('colour_blindness_doc');
     } 
     if($pwd=='Y')
     {
       $var3=$this->session->has_userdata('gate_score_card_doc');
     }

    //  if(!($this->session->has_userdata('User_document')))
    //  {
    //   redirect('f30daae41c9c77a65b115ed5a0281fb52');
    //  }
     $this->db->trans_start();
     $this->User_document_model->add_dob_doc($doba);
     $this->User_document_model->add_esst_qulf_doc($ess_qula);
     if($experience=='Yes')
     {
       $this->User_document_model->add_experience_doc($expria);
     }
     if($pwd=='Y' && $var3)
     {
      $this->User_document_model->add_file_pwd_doc($pwda);
     }
     if($ex_service=='Y' && $var4)
     {
       $this->User_document_model->add_ex_service_doc($ex_sera);
     }
     if((($category=='OBC' or  $category=='SC' or  $category='ST' or  $category ='EWS') && $var6))
     {
       $this->User_document_model->add_obc_doc($caste);
     }
     $this->User_document_model->insert_tab($app_no,3);
     $this->db->trans_complete();

      if ($this->db->trans_status() === FALSE) 
      { 

        $this->session->unset_userdata('filedob');
        $this->session->unset_userdata('cat_certificate_doc');
        $this->session->unset_userdata('colour_blindness_doc');
        $this->session->unset_userdata('gate_score_card_doc');
        $this->session->unset_userdata('pg_marksheet_doc');
        $this->session->unset_userdata('pwd_certificate_doc');
        $this->session->unset_userdata('ug_mark_sheet');
        $this->session->unset_userdata('work_experience_doc');
        $this->session->set_flashdata('document_error','error select each file then clcik on upload  button each!!');
        redirect('recruitment/User_document');
       
      }
      else
      {

        $this->session->unset_userdata('filedob');
        $this->session->unset_userdata('cat_certificate_doc');
        $this->session->unset_userdata('colour_blindness_doc');
        $this->session->unset_userdata('gate_score_card_doc');
        $this->session->unset_userdata('pg_marksheet_doc');
        $this->session->unset_userdata('pwd_certificate_doc');
        $this->session->unset_userdata('ug_mark_sheet');
        $this->session->unset_userdata('work_experience_doc');
       $this->session->set_flashdata('alldocument','Your documents have been uploaded successfully.');
       redirect('f30dae41c9c77a65b115ed5a0281fb52');//'recruitment/User_transaction'
      
      }   
    }
    else
    { 
      // echo "validation false";
      // echo validation_errors();
      // exit;
      $this->session->set_flashdata('document_error','document upload error!! you might forget to click on upload button or not selected file....please upload again');
      redirect('recruitment/User_document');
    }  
  }
  // public function totaldoc()
  // {
  //   $email = $this->session->userdata('email');
  //   $l=$this->User_dashboard_model->get_app_no($email);
    // if($this->session->userdata('c_application'))
    // {
    //   $app_no=$this->session->userdata('c_application');
     
    // }
    // else
    // {
    //   $app_no=$l[0]->app_no;
    // }
    // $details=$this->User_all_details_model->get_basic_details($app_no);
    // $data['basic_details']=$this->User_all_details_model->get_basic_details($app_no);
    // $post=$data['basic_details'][0]->post_name;
    // $mandatoryexp=$this->User_all_details_model->get_post_details($post);
  //   $experience='Yes';
  //   $pwd='Y';
  //   $category='OBC';
  //   $ex_service='Y';
  //   $category=''
  //   $count=0;
  //   $value=array();
  //   // $app_no= $l[0]->app_no;
  //   if($experience=='Yes')
  //   {
  //     $count++;
  //     $value['exp']="please upload your experience document";
  //   }
  //   if($pwd=='Y')
  //   {
  //      $count++;
  //      $value['pwd']="please upload your pwd document";
  //   }
  //   if($ex_service=='Y')
  //   {
  //     $count++;
  //      $value['ex_servic']="please upload your ex-servicemen document";
  //   } 
  //   if($category=='OBC' or $category=='ST' or $category=='SC' or $category=='EWS')
  //   {
  //     $count++;
  //      $value['caste']="please upload your caste document";
  //   }
  //   $value['total']=$count+2;
  //   return $value;
  // }

  function handle_upload()
  {
    $l=$this->input->post('contactn');
    $email=$this->input->post('emai');
    $resStr = str_replace('@', '_', $email);
    $resStr2 = str_replace('.', '_', $resStr);
     
    if (!file_exists('./assets/images/nfr_user_photo_sign/'.strtolower($this->session->userdata("id"))))
    {
      mkdir('./assets/images/nfr_user_photo_sign'.strtolower($this->session->userdata("id")) , 0777, true);
    }
      $config['upload_path'] = './assets/images/nfr_user_photo_sign/'.strtolower($this->session->userdata("id")).'/';
      $config['max_size'] = '200';
      $config['allowed_types'] = 'jpg|png|jpeg';
      $config['file_name'] =$resStr2."_"."photo";//. "_" .time();
      $config['overwrite']=TRUE;
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      if (isset($_FILES['uphoto']) && !empty($_FILES['uphoto']['name']))
      {
        //if (isset($_FILES['file_upload']) ){
        if ($this->upload->do_upload('uphoto')) {
          // set a $_POST value for 'image' that we can use later
          $upload_data = $this->upload->data();
          $this->img_name = $upload_data['file_name'];
          $_POST['uphoto'] = $upload_data['file_name'];
          return true;
        } 
        else 
        {
          // possibly do some clean up ... then throw an error
          $this->form_validation->set_message('handle_upload', $this->upload->display_errors());
          return false;
        }
      } 
      else 
      {
        // throw an error because nothing was uploaded
        $this->form_validation->set_message('handle_upload', "You must upload photo!");
        return false;
      }
  }

  function handle_uploadsig()
  {  
      // echo "reachhere" ;
      // exit;
      $l=$this->input->post('contactn');
      $email=$this->input->post('emai');
      $resStr = str_replace('@', '_', $email);
      $resStr2 = str_replace('.', '_', $resStr);

      if (!file_exists('./assets/images/nfr_user_photo_sign/'.strtolower($this->session->userdata("id"))))
      {
        mkdir('./assets/images/nfr_user_photo_sign'.strtolower($this->session->userdata("id")) , 0777, true);
      }
      $config['upload_path'] = './assets/images/nfr_user_photo_sign/'.strtolower($this->session->userdata("id")).'/';
      $config['max_size'] = '200';
      $config['allowed_types'] = 'jpg|png|jpeg|pdf';
      $config['file_name'] =$resStr2."_"."sign";//. "_" .time();
      $config['overwrite']=TRUE;
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      if (isset($_FILES['usignature']) && !empty($_FILES['usignature']['name']))
      {
        //if (isset($_FILES['file_upload']) ){
        if ($this->upload->do_upload('usignature')) 
        {
          // set a $_POST value for 'image' that we can use later
          $upload_data = $this->upload->data();
          $this->img_name = $upload_data['file_name'];
          $_POST['usignature'] = $upload_data['file_name'];
          // print_r($upload_data['file_name']);
          // exit;
          return true;
        } 
        else 
        {
          // possibly do some clean up ... then throw an error
          $this->form_validation->set_message('handle_uploadsig', $this->upload->display_errors());
          return false;
        }
      } 
      else 
      {
        // throw an error because nothing was uploaded
        $this->form_validation->set_message('handle_uploadsig', "You must upload signature!");
        return false;
      }
  }


}
?>

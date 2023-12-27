<?php

class Adm_mba_personal_details extends MY_Controller {

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
    $this->load->helper('security');
    $this->load->library('form_validation');
    $this->load->helper(array('form','url'));
    // $this->load->library('email1');
    $this->load->model('admission/Add_mba_registration_model');
    $this->load->model('admission/Adm_mba_personal_details_model');
    $this->load->model('admission/Adm_mba_application_model');
  }


  function index()
  { 
    
    if(!($this->session->has_userdata('login_type')))
    {
      redirect('admission/Add_mba/adm_mba_login');
    }
    if(!($this->session->has_userdata('applied')))
    {
       redirect('admission/Add_mba/adm_mba_login');
    }
    $this->load->model('admission/Add_mba_registration_model');
    $this->load->model('admission/Adm_mba_personal_details_model');
    $this->load->model('admission/Adm_mba_application_model');
    $email=$this->session->userdata('email');
    if(!($this->session->has_userdata('email')))
    {
      redirect('Add_mba/adm_mba_login');
    }

    $data['registration_detail']=$this->Add_mba_registration_model->get_registration_detail_by_email($email);
    $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);
    $data['application_details']=$this->Adm_mba_personal_details_model->get_adm_mba_reg_appl_program($get_reg_no);
    $data['application_details_ms']=$this->Adm_mba_personal_details_model->get_adm_mba_appl_ms($get_reg_no);
    $data['qual12_details']=$this->Adm_mba_personal_details_model->get_qualification12_details($get_reg_no);
    $data['qual10_details']=$this->Adm_mba_personal_details_model->get_qualification10_details($get_reg_no);
    $data['qualug_details']=$this->Adm_mba_personal_details_model->get_qualificationug_details($get_reg_no);
    $data['pg_details']=$this->Adm_mba_personal_details_model->get_qualificationpg_details($get_reg_no);

    $data['exp_details']=$this->Adm_mba_personal_details_model->get_expreince_details($get_reg_no);
    $data['exp_details_d']=$this->Adm_mba_personal_details_model->get_expreince_details_dynamic($get_reg_no);
    
    $data['cat_details']=$this->Adm_mba_personal_details_model->get_cat_score_details($get_reg_no);
    $data['iit_details']=$this->Adm_mba_personal_details_model->get_iitname_details();
    $data['p_addr_details']=$this->Adm_mba_personal_details_model->get_p_address_details($get_reg_no);
    
    $data['c_addr_details']=$this->Adm_mba_personal_details_model->get_c_address_details($get_reg_no);
    $data['int_cal_prio']=$this->Adm_mba_personal_details_model->get_call_int_loc($get_reg_no);
    $data['state']=$this->Adm_mba_personal_details_model->get_state();

    // echo "<pre>";
    // print_r($data['int_cal_prio'][0]->priority1);
    // exit;

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

    // echo "<pre>";
    // print_r($data['application_details']);
    // exit;
    // $reg_id=$data['registration_no'][0]->reg_id;
    // $data['appl_no']=$this->Adm_mba_personal_details_model->get_appl_no_by_reg_id($reg_id);  
    $data['val']="H";
    $this->adm_mba_header($data);
    $this->load->view('admission/adm_mba_application',$data);
    $this->adm_mba_footer();

  }

  public function get_personal_details()
  { 
    if(!($this->session->has_userdata('login_type')))
    {
      redirect('admission/Add_mba/adm_mba_login');
    }
    if(!($this->session->has_userdata('applied')))
    {
       redirect('admission/Add_mba/adm_mba_login');
    }
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
    $date_of_issue=trim($this->input->post('date_of_issue'));
    $category=$this->clean($this->input->post('category'));
    // $adm_type=trim($this->input->post('adm_type'));
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

    if($category=='EWS' || $category=='OBC')
    {
      $this->form_validation->set_rules('date_of_issue','Date of Issue of cast certificate','required');
    }
    
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
    $email=$this->session->userdata('email');
    // $this->session->set_userdata($array);
    // status means 0 means registration done but not yet email approved
    $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);
    $get_reg_details=$this->Add_mba_registration_model->get_registration_detail_by_email($email);
    $betchflag=$get_reg_details[0]->btech_flag;
   
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
        'status'=>'PF',
        // 'betch_iit'=>$betchflag,
        'created_by'=>$email,
        'ews_obc_doc_date'=>$date_of_issue
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
        
        $this->load->model('admission/Adm_mtech_personal_details_model');
       
       
        
        $this->db->trans_start();
        $this->Adm_mba_personal_details_model->update_personal_deatils($personal_dteails,$get_reg_no);
        $this->Adm_mba_personal_details_model->insert_address($permanent_address);
        $this->Adm_mba_personal_details_model->insert_address($current_address);
        $this->Adm_mba_personal_details_model->update_tab1($tab,$get_reg_no);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) 
        {
          $this->session->set_flashdata('error_personal','Internal Network error occured error code P101');
          redirect('admission/Adm_mba_personal_details');

        }
        else 
        { 
          $this->session->set_userdata('education','education');
          $this->session->unset_userdata('personal_details');
          $this->session->set_flashdata('apply_success_pd','You succesfully added Please fill educational details');
          redirect('admission/Adm_mba_personal_details');
          $data['val']="H";
          $data['tab']="education";
          $data['qualification']="qualification";
          $this->adm_mba_header($data);
          $this->load->view('admission/adm_mba_application',$data);
          $this->adm_mba_footer();
        }
          

      }
      else 
      {
        // echo "not page blank";
        // exit;
        $this->load->model('admission/Adm_mtech_personal_details_model');
        $this->db->trans_start();
        $this->Adm_mba_personal_details_model->update_personal_deatils($personal_dteails,$get_reg_no);
        $this->Adm_mba_personal_details_model->update_p_address($p_permanent_address,$get_reg_no);
        $this->Adm_mba_personal_details_model->update_c_address($c_current_address,$get_reg_no);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) 
        {
          $this->session->set_flashdata('error_personal','Internal Network error occured error code P102');
          redirect('admission/Adm_mba_personal_details');

        }
        else 
        { 
          $this->session->set_userdata('education','education');
          $this->session->unset_userdata('personal_details');
          $this->session->set_flashdata('apply_success_pd','You edit succesfully');
          redirect('admission/Adm_mba_personal_details');
          $data['val']="H";
          $data['tab']="education";
          $data['qualification']="qualification";
          $this->adm_mba_header($data);
          $this->load->view('admission/adm_mba_application',$data);
          $this->adm_mba_footer();
        }
      }

        
    }

    else
    { 
      // echo validation_errors();
      // exit;
      $data['registration_detail']=$this->Add_mba_registration_model->get_registration_detail_by_email($email);
      $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);
      $data['application_details']=$this->Adm_mba_personal_details_model->get_adm_mba_reg_appl_program($get_reg_no);
      $data['application_details_ms']=$this->Adm_mba_personal_details_model->get_adm_mba_appl_ms($get_reg_no);
      $data['qual12_details']=$this->Adm_mba_personal_details_model->get_qualification12_details($get_reg_no);
      $data['qual10_details']=$this->Adm_mba_personal_details_model->get_qualification10_details($get_reg_no);
      $data['qualug_details']=$this->Adm_mba_personal_details_model->get_qualificationug_details($get_reg_no);
      $data['pg_details']=$this->Adm_mba_personal_details_model->get_qualificationpg_details($get_reg_no);
      $data['betchiit']=$data['application_details_ms'][0]['betch_iit'];
      $data['exp_details']=$this->Adm_mba_personal_details_model->get_expreince_details($get_reg_no);
      $data['exp_details_d']=$this->Adm_mba_personal_details_model->get_expreince_details_dynamic($get_reg_no);
      $data['cat_details']=$this->Adm_mba_personal_details_model->get_cat_score_details($get_reg_no);
      $data['iit_details']=$this->Adm_mba_personal_details_model->get_iitname_details();
      $data['p_addr_details']=$this->Adm_mba_personal_details_model->get_p_address_details($get_reg_no);
      $data['c_addr_details']=$this->Adm_mba_personal_details_model->get_c_address_details($get_reg_no);
      $data['state']=$this->Adm_mba_personal_details_model->get_state();
      $data['int_cal_prio']=$this->Adm_mba_personal_details_model->get_call_int_loc($get_reg_no);
      // $this->session->set_flashdata('error_educationa','Thier is error while saving data');
      // $this->session->set_userdata('personal_details','personal_details');
      $data['val']="H";
      $data['tab']="personal_details";
      $data['personal_detail']="personal_detail";
      $this->adm_mba_header($data);
      $this->load->view('admission/adm_mba_application',$data);
      $this->adm_mba_footer();
    }

  }
  public function get_education_detail()
  { 

    if(!($this->session->has_userdata('login_type')))
    {
      redirect('admission/Add_mba/adm_mba_login');
    }
    if(!($this->session->has_userdata('applied')))
    {
       redirect('admission/Add_mba/adm_mba_login');
    }
    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);

    $btech_cgpa=$this->clean(trim($this->input->post('btech_cgpa')));

    $priority1=$this->apha_numeric_only(trim($this->input->post('priority1')));
    $priority2=$this->apha_numeric_only(trim($this->input->post('priority2')));
    $priority3=$this->apha_numeric_only(trim($this->input->post('priority3')));
    $a=array(
      "a"=>$priority1,
      "b"=>$priority2,
      "c"=>$priority3
    );
    $countd=count(array_unique($a));
    if($countd==3)
    {
    }
    else
    {  
      $this->session->set_flashdata('error_educationa','Each Interview priority location must be different');
      redirect('admission/Adm_mba_personal_details');
    }
    // echo "priority1a".$priority1;
    // echo "priority2b".$priority2;
    // echo "priority3c".$priority3;
    // exit;
   

    
    $data['application_details_ms']=$this->Adm_mba_personal_details_model->get_adm_mba_appl_ms($get_reg_no);
    $betchiit=$data['application_details_ms'][0]['betch_iit'];
    // $btech_cat_qual=trim($this->input->post('btech_cat_qual'));
    $btech_iit_name=$this->clean(trim($this->input->post('iit_names')));
    $cat_reg_no=$this->number_only(trim($this->input->post('cat_reg_no')));
    $cat_percentile=$this->number_with_dot(trim($this->input->post('cat_percentile')));
    $cat_score=$this->number_with_dot(trim($this->input->post('cat_score')));
    $cat_quantitative_p=$this->number_with_dot(trim($this->input->post('cat_quantitative_p')));
    $cat_quantitative_s=$this->number_with_dot(trim($this->input->post('cat_quantitative_s')));
    $cat_verbal_p=$this->number_with_dot(trim($this->input->post('cat_verbal_p')));
    $cat_verbal_s=$this->number_with_dot(trim($this->input->post('cat_verbal_s')));
    $data_interpretationl_p=$this->number_with_dot(trim($this->input->post('data_interpretationl_p')));
    $data_interpretationl_s=$this->number_with_dot(trim($this->input->post('data_interpretationl_s')));
    
    $examtype10=$this->apha_numeric_only(trim($this->input->post('examtype10')));
    $name_of_exam10=$this->apha_numeric_only(trim($this->input->post('name_of_exam10')));
    $Institute_exam10=$this->clean(trim($this->input->post('Institute_exam10')));
    $passed10=$this->clean(trim($this->input->post('10passed')));
    $percentage10=$this->clean(trim($this->input->post('10percentage')));
    $ten_y_pass=$this->number_only(trim($this->input->post('10_y_pass')));
    $ten_p_cgpa=$this->number_with_dot(trim($this->input->post('10_p_cgpa')));

    $examtype12=$this->apha_numeric_only(trim($this->input->post('examtype12')));
    $name_of_exam12=$this->apha_numeric_only(trim($this->input->post('name_of_exam12')));
    $Institute12=$this->clean(trim($this->input->post('Institute12')));
    $passed_12=$this->clean(trim($this->input->post('12passed')));
    $percentage_12=$this->clean(trim($this->input->post('12percentage')));
    $y_pass_12=$this->number_only(trim($this->input->post('12_y_pass')));
    $p_cgpa_12=$this->number_with_dot(trim($this->input->post('12_p_cgpa')));

    $examtypeug=$this->clean(trim($this->input->post('examtypeug')));
    $name_of_ugexam=$this->clean(trim($this->input->post('name_of_ugexam')));
    $Institute_examug=$this->clean(trim($this->input->post('Institute_examug')));
    $ug_appearing=$this->clean(trim($this->input->post('ug_appearing')));
    $ug_percentage=$this->clean(trim($this->input->post('ug_percentage')));
    $ug_p_cgpa=$this->number_with_dot(trim($this->input->post('ug_p_cgpa')));
    $ug_y_passing=$this->number_with_dot(trim($this->input->post('ug_y_passing')));
    //  if($btech_cgpa=='Yes')
    //   {
    //     $btech_cgpa='Y';
    //   }
    //   if($btech_cgpa=='No')
    //   {
    //     $btech_cgpa='N';
    //   }
   
    $email=$this->session->userdata('email');
    $examtypepg=$this->input->post('examtypepg'); //for dynamic row
    
    $name_of_pgexam=$this->input->post('name_of_pgexam');
    $Institute_exampg=$this->input->post('Institute_exampg');
    $pg_appearing=$this->input->post('pg_appearing');
    $pg_percentage=$this->input->post('pg_percentage');
    $pg_p_cgpa=$this->input->post('pg_p_cgpa');
    $pg_y_passing=$this->input->post('pg_y_passing');

  
   // $this->form_validation->set_rules('btech_cgpa','Degree from IIT','required|xss_clean');
    // if($btech_cgpa=='Y')
    // {
    //   //$this->form_validation->set_rules('btech_cat_qual','Cat qualifiying candidate','required');
    //   $this->form_validation->set_rules('iit_names','IIT name','required');
    // }

    // if($btech_cgpa=='N')
    // {
      $this->form_validation->set_rules('cat_reg_no','CAT 2021 Registration Number','required');
      $this->form_validation->set_rules('cat_percentile','CAT Percentile','required');
      $this->form_validation->set_rules('cat_score','CAT Score','required');
      $this->form_validation->set_rules('cat_quantitative_p','CAT Quantitative Percentile','required');
      $this->form_validation->set_rules('cat_quantitative_s','CAT Quantitative Score','required');
      $this->form_validation->set_rules('cat_verbal_p','CAT Verbal Percentile','required|xss_clean');
      $this->form_validation->set_rules('cat_verbal_s','CAT Verbal Score','required');
      $this->form_validation->set_rules('data_interpretationl_p','CAT Data Interpretation Percentile','required|xss_clean');
      $this->form_validation->set_rules('data_interpretationl_s','CAT Data Interpretation Score','required|xss_clean');
    // }

    $this->form_validation->set_rules('priority1','Please Select priority 1','required');
    $this->form_validation->set_rules('priority2','Please Select priority 2','required');
    $this->form_validation->set_rules('priority3','Please Select priority 3','required');

    $this->form_validation->set_rules('name_of_exam10','10th Name of exam','required');
    $this->form_validation->set_rules('Institute_exam10','10th Institute/university name','trim|required|xss_clean');
    $this->form_validation->set_rules('10passed','10th result Status','required');
    $this->form_validation->set_rules('10percentage','10th marks','required');
    $this->form_validation->set_rules('10_y_pass','10th year of passing','required');
    $this->form_validation->set_rules('10_p_cgpa','10th percentage/CGPA','required|xss_clean');

    $this->form_validation->set_rules('examtype12','12th Exam type','required|xss_clean');
    $this->form_validation->set_rules('name_of_exam12','12th Name of exam','required');
    $this->form_validation->set_rules('Institute12','12th Institute/university name','trim|required|xss_clean');
    $this->form_validation->set_rules('12passed','12th result Status','required');
    $this->form_validation->set_rules('12percentage','12th marks','required');
    $this->form_validation->set_rules('12_p_cgpa','12th year of passing','required');
    $this->form_validation->set_rules('12percentage','12th percentage/CGPA','required|xss_clean');

    $this->form_validation->set_rules('examtypeug','Ug Exam type','required|xss_clean');
    $this->form_validation->set_rules('name_of_ugexam','Name of Ug exam','required');
    $this->form_validation->set_rules('Institute_examug','Ug Institute/university name','trim|required|xss_clean');
    $this->form_validation->set_rules('ug_appearing','Ug result Status','required');
    $this->form_validation->set_rules('ug_percentage','Ug marks','required');
    $this->form_validation->set_rules('ug_y_passing','Ug year of passing','required');
    $this->form_validation->set_rules('ug_p_cgpa','Ug percentage/CGPA','required|xss_clean');

    if ($this->form_validation->run() == true) 
    {

      $email=$this->session->userdata('email');
      $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);
      // if($btech_cgpa=='Yes')
      // {
      //   $btech_cgpa_='Y';
      // }
      // if($btech_cgpa=='No')
      // {
      //   $btech_cgpa_='N';
      // }
      $prio_insert=array(
        'registration_no'=> $get_reg_no,
        'priority1'=>$priority1,
        'priority2'=>$priority2,
        'priority3'=>$priority3,
        'created_by'=>$email,
        'status'=>'A'
      );
      $prio_update=array(
        'registration_no'=> $get_reg_no,
        'priority1'=>$priority1,
        'priority2'=>$priority2,
        'priority3'=>$priority3,
        'created_by'=>$email,
        'status'=>'A'
      );
        
      $cat_detail_val=array(
        'registration_no'=> $get_reg_no,
        'cat_reg_no'=>$cat_reg_no,
        'cat_percentile'=>$cat_percentile,
        'cat_score'=>$cat_score,
        'cat_quant_percentile'=>$cat_quantitative_p,
        'cat_quant_score'=>$cat_quantitative_s,
        'cat_verb_percentile'=> $cat_verbal_p,
        'cat_verb_score'=>$cat_verbal_s,
        'cat_dis_percentile'=>$data_interpretationl_p,
        'cat_dis_score'=>$data_interpretationl_s,
        'created_by'=> $email,
      );
      
      $u_cat_detail_val=array(
        'cat_reg_no'=>$cat_reg_no,
        'cat_percentile'=>$cat_percentile,
        'cat_score'=>$cat_score,
        'cat_quant_percentile'=>$cat_quantitative_p,
        'cat_quant_score'=>$cat_quantitative_s,
        'cat_verb_percentile'=> $cat_verbal_p,
        'cat_verb_score'=>$cat_verbal_s,
        'cat_dis_percentile'=>$data_interpretationl_p,
        'cat_dis_score'=>$data_interpretationl_s,
        'modified_by'=> $email,
        'modified_date'=>date("H:i:s"),
      );
      
      $personal_details=array(
        // 'betch_iit'=>$btech_cgpa,
        // 'betch_iit_name'=>$btech_iit_name,
        //  'betch_with_cat'=>$btech_cat_qual,
        'status'=>'PF'
      );
      
      $educations_details10=array(
        'registration_no'=>$get_reg_no,
        'exam_type'=>'10 th',
        'exam_name'=>$name_of_exam10,
        'institue_name'=>$Institute_exam10,
        'result_status'=>$passed10,
        'marks_perc_type'=>$percentage10,
        'mark_cgpa_percenatge'=>$ten_p_cgpa,
        'year_of_passing'=>$ten_y_pass,
        'created_by'=>$email,
      );
      
      $u_educations_details10=array(
        'exam_name'=>$name_of_exam10,
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
        'institue_name'=>$Institute12,
        'result_status'=>$passed_12,
        'marks_perc_type'=>$percentage_12,
        'mark_cgpa_percenatge'=>$p_cgpa_12,
        'year_of_passing'=>$y_pass_12,
        'created_by'=>$email,
      );

      $u_educations_details12=array(
        'exam_name'=>$name_of_exam12,
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
        'institue_name'=>$this->clean($Institute_exampg[$i]),
        'result_status'=>$this->clean($pg_appearing[$i]),
        'marks_perc_type'=>$this->clean($pg_percentage[$i]),
        'mark_cgpa_percenatge'=>$this->number_with_dot($pg_p_cgpa[$i]),
        'year_of_passing'=>$this->number_only($pg_y_passing[$i]),
        'created_by'=>$email,
        ];
      }
      // echo "<pre>";
      // print_r($personal_details);
      // exit;
      if(!empty($datab)){
        foreach ($datab as $val) {
          if($val['exam_type']=='' || $val['exam_name']=='' || $val['institue_name']=='' || $val['result_status']=='' || $val['marks_perc_type']=='' || $val['mark_cgpa_percenatge']=='' || $val['year_of_passing']=='')
          {
          
            $this->session->set_flashdata('dyerror','Input field is blank in dyanmic created row of qualification details please fill all field');
            redirect('admission/Adm_mba_personal_details');
            break;
          }
        }
      }
      
      $tab=array(
        'tab2'=>2,
      );
     
      $qualrow=$this->Adm_mba_personal_details_model->get_qual_row($get_reg_no);
      if($qualrow)
      {  
         $cond=array(
          'registration_no' =>$get_reg_no,
          'exam_type' =>'PG Exam',
          );
          $this->db->trans_start();
          $this->Adm_mba_personal_details_model->delete_qualification_pg($cond);
          $this->load->model('admission/Adm_mba_personal_details_model');
          if(!empty($datab))
          { 
            $this->Adm_mba_personal_details_model->insert_qualification_batch($datab);
          }
  
          // if($btech_cgpa=='N')
          // { 
           
            $this->Adm_mba_personal_details_model->update_cat_details($u_cat_detail_val,$get_reg_no);   
            $this->Adm_mba_personal_details_model->update_personal_deatils($personal_details,$get_reg_no);
            $this->Adm_mba_personal_details_model->update_int_loc_priority($prio_update,$get_reg_no);
            // echo $this->db->last_query();
            // exit;
           
          // }
          // if($btech_cgpa=='Y')
          // {
          //   $this->Adm_mba_personal_details_model->update_personal_deatils($personal_details,$get_reg_no);
          // }

          $this->Adm_mba_personal_details_model->update_qualification($u_educations_details10,$get_reg_no,'10 th');
          $this->Adm_mba_personal_details_model->update_qualification($u_educations_details12,$get_reg_no,'12 th');
          $this->Adm_mba_personal_details_model->update_qualification($u_educations_detailug,$get_reg_no,'UG Exam');
          $this->Adm_mba_personal_details_model->update_personal_deatils($personal_details,$get_reg_no);

          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE) 
          {
            $this->session->set_flashdata('error_educationa','Internal Network error occured error code E102');
            redirect('admission/Adm_mba_personal_details');
  
          }
          else 
          { 
            $this->session->set_userdata('work_experience','work_experience');
            $this->session->unset_userdata('education');
            $this->session->set_flashdata('apply_success_education','You have succesfully Edited');
            redirect('admission/Adm_mba_personal_details');
          }

          

      }
      else
      {
        $this->load->model('admission/Adm_mba_personal_details_model');
        $this->db->trans_start();
        if(!empty($datab))
        { 
         
          $this->Adm_mba_personal_details_model->insert_qualification_batch($datab);
        }
        // if($btech_cgpa=='N')
        // { 
          
          $this->Adm_mba_personal_details_model->insert_cat_details($cat_detail_val);
          $this->Adm_mba_personal_details_model->insert_int_cal_priority($prio_insert);
          $this->Adm_mba_personal_details_model->update_personal_deatils($personal_details,$get_reg_no);
      
        // }
        // if($btech_cgpa=='Y')
        // {
        //     $this->Adm_mba_personal_details_model->update_personal_deatils($personal_details,$get_reg_no);
        // }

        $this->Adm_mba_personal_details_model->insert_qualification($educations_details10);
        $this->Adm_mba_personal_details_model->insert_qualification($educations_details12);
        $this->Adm_mba_personal_details_model->insert_qualification($educations_detailug);
        $this->Adm_mba_personal_details_model->update_personal_deatils($personal_details,$get_reg_no);
        $this->Adm_mba_personal_details_model->update_tab1($tab,$get_reg_no);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) 
        {
          $this->session->set_flashdata('error_educationa','Internal Network error occured error code E102');
          redirect('admission/Adm_mba_personal_details');

        }
        else 
        { 
          $this->session->set_userdata('work_experience','work_experience');
          $this->session->unset_userdata('education');
          $this->session->set_flashdata('apply_success_education','You succesfully added Please fill work experience details');
          $data['val']="H";
          $data['tab']="work_experience";
          $data['work_experince']="work_experince";
          redirect('admission/Adm_mba_personal_details');
          $this->adm_mba_header($data);
          $this->load->view('admission/adm_mba_application',$data);
          $this->adm_mba_footer();
        }
       
      }
      
    }
    else
    {  
       
      $email=$this->session->userdata('email');
      $data['registration_detail']=$this->Add_mba_registration_model->get_registration_detail_by_email($email);
      $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);
      $data['application_details']=$this->Adm_mba_personal_details_model->get_adm_mba_reg_appl_program($get_reg_no);
      $data['application_details_ms']=$this->Adm_mba_personal_details_model->get_adm_mba_appl_ms($get_reg_no);
      $data['qual12_details']=$this->Adm_mba_personal_details_model->get_qualification12_details($get_reg_no);
      $data['qual10_details']=$this->Adm_mba_personal_details_model->get_qualification10_details($get_reg_no);
      $data['qualug_details']=$this->Adm_mba_personal_details_model->get_qualificationug_details($get_reg_no);
      $data['pg_details']=$this->Adm_mba_personal_details_model->get_qualificationpg_details($get_reg_no);
      $data['betchiit']=$data['application_details_ms'][0]['betch_iit'];
     
      $data['exp_details']=$this->Adm_mba_personal_details_model->get_expreince_details($get_reg_no);
      $data['exp_details_d']=$this->Adm_mba_personal_details_model->get_expreince_details_dynamic($get_reg_no);
      
      $data['cat_details']=$this->Adm_mba_personal_details_model->get_cat_score_details($get_reg_no);
      $data['iit_details']=$this->Adm_mba_personal_details_model->get_iitname_details();
      $data['p_addr_details']=$this->Adm_mba_personal_details_model->get_p_address_details($get_reg_no);
      
      $data['c_addr_details']=$this->Adm_mba_personal_details_model->get_c_address_details($get_reg_no);
      $data['state']=$this->Adm_mba_personal_details_model->get_state();
      $data['tab']="education";
      $this->session->set_userdata('education','education'); 
      $data['val']="H";
      $data['qualification']="qualification";
      $this->adm_mba_header($data);
      $this->load->view('admission/adm_mba_application',$data);
      $this->adm_mba_footer(); 
    }
  }

  public function get_work_experience_detail()
  { 
    
    if(!($this->session->has_userdata('login_type')))
    {
      redirect('admission/Add_mba/adm_mba_login');
    }
    if(!($this->session->has_userdata('applied')))
    {
       redirect('admission/Add_mba/adm_mba_login');
    }
    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);
    $work_exp=$this->clean($this->input->post('work_exp'));
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
      'tab3'=>2,
    );
    
    $personal_dteails=array(
      
      'work_expreince'=> $work_exp,
      'status'=>'PF'
    );

    if($work_exp=='No')
    { 
      $this->db->trans_start();
      $this->Adm_mba_personal_details_model->update_tab1($tab,$get_reg_no);
      $this->Adm_mba_personal_details_model->delete_all_work_experince($get_reg_no);
      $this->Adm_mba_personal_details_model->update_personal_deatils($personal_dteails,$get_reg_no);

      $this->db->trans_complete();
      if ($this->db->trans_status() === FALSE) 
      {
        $this->session->set_flashdata('experror','Internal Network error occured error code W101');
        redirect('admission/Adm_mba_personal_details');

      }
      else 
      { 
        redirect('admission/Adm_mba_personal_details'); 
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
      if($work_exp=='')
      {
        $this->db->trans_start();
        if(!empty($degination))
        {
          foreach ($datab as $val) {
            if($val['designation_no']=='' || $val['designation_organistion']=='' || $val['nature_of_work']=='' || $val['duration_in_month']=='' || $val['sector']=='')
            {

              $this->session->set_flashdata('experror','Input field is balnk in dyanmic created Work experince details please fill all field');
              redirect('admission/Adm_mba_personal_details');
              break;
            }
          }
          $this->Adm_mba_personal_details_model->insert_work_experince_batch($datab);
        }
       
        $this->Adm_mba_personal_details_model->update_personal_deatils($personal_dteails,$get_reg_no);
        $this->Adm_mba_personal_details_model->insert_work_experince($work_exp_row1);
        $this->Adm_mba_personal_details_model->update_tab1($tab,$get_reg_no);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) 
        {
          $this->session->set_flashdata('experror','Internal Network error occured error code W102');
          redirect('admission/Adm_mba_personal_details');
  
        }
        else 
        { 
          redirect('admission/Adm_mba_personal_details'); 
        }
       
      }
      if($work_exp=='Yes')
      { 
        
        $this->db->trans_start();
        $this->Adm_mba_personal_details_model->delete_all_work_experince($get_reg_no);
        
        $this->Adm_mba_personal_details_model->insert_work_experince($work_exp_row1);
        if(!empty($degination))
        { 
          foreach ($datab as $val) {
            if($val['designation_no']=='' || $val['designation_organistion']=='' || $val['nature_of_work']=='' || $val['duration_in_month']=='' || $val['sector']=='')
            {

              $this->session->set_flashdata('experror','Input field is balnk in dyanmic created Work experince  please fill all field');
              redirect('admission/Adm_mba_personal_details');
              break;
            }
          }
          $this->Adm_mba_personal_details_model->insert_work_experince_batch($datab);
        }

        $this->Adm_mba_personal_details_model->update_personal_deatils($personal_dteails,$get_reg_no);
        $this->Adm_mba_personal_details_model->update_tab1($tab,$get_reg_no);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) 
        {
          $this->session->set_flashdata('experror','Internal Network error occured error code W103');
          redirect('admission/Adm_mba_personal_details');
  
        }
        else 
        { 
          redirect('admission/Adm_mba_personal_details'); 
        }
        
      }
        
    }

    else
    {  

      $data['registration_detail']=$this->Add_mba_registration_model->get_registration_detail_by_email($email);
      $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);
      $data['application_details']=$this->Adm_mba_personal_details_model->get_adm_mba_reg_appl_program($get_reg_no);
      $data['application_details_ms']=$this->Adm_mba_personal_details_model->get_adm_mba_appl_ms($get_reg_no);
      $data['qual12_details']=$this->Adm_mba_personal_details_model->get_qualification12_details($get_reg_no);
      $data['qual10_details']=$this->Adm_mba_personal_details_model->get_qualification10_details($get_reg_no);
      $data['qualug_details']=$this->Adm_mba_personal_details_model->get_qualificationug_details($get_reg_no);
      $data['pg_details']=$this->Adm_mba_personal_details_model->get_qualificationpg_details($get_reg_no);
      $data['betchiit']=$data['application_details_ms'][0]['betch_iit'];
      $data['exp_details']=$this->Adm_mba_personal_details_model->get_expreince_details($get_reg_no);
      $data['exp_details_d']=$this->Adm_mba_personal_details_model->get_expreince_details_dynamic($get_reg_no); 
      $data['cat_details']=$this->Adm_mba_personal_details_model->get_cat_score_details($get_reg_no);
      $data['iit_details']=$this->Adm_mba_personal_details_model->get_iitname_details();
      $data['p_addr_details']=$this->Adm_mba_personal_details_model->get_p_address_details($get_reg_no);
      $data['c_addr_details']=$this->Adm_mba_personal_details_model->get_c_address_details($get_reg_no);
      $data['state']=$this->Adm_mba_personal_details_model->get_state();
      $this->session->set_userdata('work_experience','work_experience');
      $data['val']="H";
      $data['tab']="work_experience";
      $data['open_work_experince']="work_experince";
      $this->adm_mba_header($data);
      $this->load->view('admission/adm_mba_application',$data);
      $this->adm_mba_footer();

    }

  }

  public function final_submission()
  {
     
    $email=$this->session->userdata('email');
    if(!($this->session->has_userdata('login_type')))
    {
      redirect('admission/Add_mba/adm_mba_login');
    }
    if(!($this->session->has_userdata('applied')))
    {
       redirect('admission/Add_mba/adm_mba_login');
    }

    $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);
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
      $this->Adm_mba_personal_details_model->delete_all_work_experince($get_reg_no);
      $this->Adm_mba_personal_details_model->update_tab1($tab,$get_reg_no);
      $this->Adm_mba_personal_details_model->update_personal_deatils($personal_dteails,$get_reg_no);
      $this->db->trans_complete();
      if ($this->db->trans_status() === FALSE) 
      {
        $this->session->set_flashdata('experror','Internal Network error occured error code W101');
        redirect('admission/Adm_mba_personal_details');

      }
      else 
      { 
        $this->session->set_userdata('doc_start','doc_start');
        $this->session->unset_userdata('applied');
        redirect('admission/Adm_mba_document');
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
      if($work_exp=='')
      { 
        $this->db->trans_start();
        if(!empty($degination))
        { 
          foreach ($datab as $val) {
            if($val['designation_no']=='' || $val['designation_organistion']=='' || $val['nature_of_work']=='' || $val['duration_in_month']=='' || $val['sector']=='')
            {

              $this->session->set_flashdata('experror','Input field is balnk in dyanmic created Work experince details please fill all field');
              redirect('admission/Adm_mba_personal_details');
              break;
            }
          }
          $this->Adm_mba_personal_details_model->insert_work_experince_batch($datab);
        }
       
        $this->Adm_mba_personal_details_model->update_personal_deatils($personal_dteails,$get_reg_no);
        $this->Adm_mba_personal_details_model->insert_work_experince($work_exp_row1);
        $this->Adm_mba_personal_details_model->update_tab1($tab,$get_reg_no);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) 
        {
          $this->session->set_flashdata('experror','Internal Network error occured error code F101');
          redirect('admission/Adm_mba_personal_details');

        }
        else 
        { 
          redirect('admission/Adm_mba_personal_details'); 
          exit;
        }
        
        
      }
      if($work_exp=='Yes')
      { 
        if(!empty($degination))
        {
          foreach ($datab as $val) {
            if($val['designation_no']=='' || $val['designation_organistion']=='' || $val['nature_of_work']=='' || $val['duration_in_month']=='' || $val['sector']=='')
            {

              $this->session->set_flashdata('experror','Input field is balnk in dyanmic created Work experince details please fill all field');
              redirect('admission/Adm_mba_personal_details');
              break;
            }
          }
        } 
        $this->db->trans_start();
        $this->Adm_mba_personal_details_model->delete_all_work_experince($get_reg_no);
        $this->Adm_mba_personal_details_model->insert_work_experince($work_exp_row1);
        
        if(!empty($degination))
        {
          $this->Adm_mba_personal_details_model->insert_work_experince_batch($datab);
        }
         
        $this->Adm_mba_personal_details_model->update_personal_deatils($personal_dteails,$get_reg_no);
        
        $this->Adm_mba_personal_details_model->update_tab1($tab,$get_reg_no);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) 
        {
          $this->session->set_flashdata('experror','Internal Network error occured error code F102');
          redirect('admission/Adm_mba_personal_details');

        }
        else 
        { 
          // redirect('admission/Adm_mba_personal_details'); 
          $this->session->set_userdata('doc_start','doc_start');
          $this->session->unset_userdata('applied');
          redirect('admission/Adm_mba_document');
        } 

      }
      
      
    }

    else
    {  

      $data['registration_detail']=$this->Add_mba_registration_model->get_registration_detail_by_email($email);
      $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);
      $data['application_details']=$this->Adm_mba_personal_details_model->get_adm_mba_reg_appl_program($get_reg_no);
      $data['application_details_ms']=$this->Adm_mba_personal_details_model->get_adm_mba_appl_ms($get_reg_no);
      $data['qual12_details']=$this->Adm_mba_personal_details_model->get_qualification12_details($get_reg_no);
      $data['qual10_details']=$this->Adm_mba_personal_details_model->get_qualification10_details($get_reg_no);
      $data['qualug_details']=$this->Adm_mba_personal_details_model->get_qualificationug_details($get_reg_no);
      $data['pg_details']=$this->Adm_mba_personal_details_model->get_qualificationpg_details($get_reg_no);
      $data['betchiit']=$data['application_details_ms'][0]['betch_iit'];
      $data['exp_details']=$this->Adm_mba_personal_details_model->get_expreince_details($get_reg_no);
      $data['exp_details_d']=$this->Adm_mba_personal_details_model->get_expreince_details_dynamic($get_reg_no); 
      $data['cat_details']=$this->Adm_mba_personal_details_model->get_cat_score_details($get_reg_no);
      $data['iit_details']=$this->Adm_mba_personal_details_model->get_iitname_details();
      $data['p_addr_details']=$this->Adm_mba_personal_details_model->get_p_address_details($get_reg_no);
      $data['c_addr_details']=$this->Adm_mba_personal_details_model->get_c_address_details($get_reg_no);
      $data['state']=$this->Adm_mba_personal_details_model->get_state();
      $this->session->set_userdata('work_experience','work_experience');
      $data['val']="H";
      $data['tab']="work_experience";
      $data['open_work_experince']="work_experince";
      $this->adm_mba_header($data);
      $this->load->view('admission/adm_mba_application',$data);
      $this->adm_mba_footer();

    }
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

  
  public function display_edu_detail_w() //for deleting qualification row
  {

    $this->load->model('admission/Add_mba_registration_model');
    $this->load->model('admission/Adm_mba_personal_details_model');
    $this->load->model('admission/Adm_mba_application_model');
    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);
    $id=$this->input->post('display_qual');
    $cond=array(
      'id'=> $id,
      'registration_no'=>$get_reg_no,
    );

    $msg=$this->Adm_mba_personal_details_model->delete_row_work_qualification($cond); 
    echo json_encode($msg);  

  }

  public function display_work_detail_w() //for deleting working experince row
  {
    
    $this->load->model('admission/Add_mba_registration_model');
    $this->load->model('admission/Adm_mba_personal_details_model');
    $this->load->model('admission/Adm_mba_application_model');
    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);

    $avd_id=$this->input->post('display_work');
    $cond=array(
      'id'=> $avd_id,
      'registration_no'=>$get_reg_no,
    );

    $msg=$this->Adm_mba_personal_details_model->delete_row_work_experince($cond);
    echo json_encode($msg);  

  }
  
}
?>

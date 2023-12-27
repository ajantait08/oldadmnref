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
    $this->load->model('admission/Add_mtech_registration_model');
    $this->load->model('admission/Adm_mtech_personal_details_model');
    $this->load->model('admission/Adm_mtech_application_model');

  }

  function index()
  { 

    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $data['registration_detail']=$this->Add_mtech_registration_model->get_registration_detail_by_email($email);
    $data['upload_document']=$this->Adm_mtech_personal_details_model->get_all_document_uploaded($get_reg_no);
    // foreach ($data['upload_document'] as $value) {
    //  echo $to = $value['doc_path']; 
    //   }
    // echo "<pre>";
    // print_r( $data['upload_document'][0]['doc_path']);
    // exit;
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
   
  
    if(empty($data['registration_detail']) || empty($data['application_details']))
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
   // print_r($data['tab']);
   // exit;
    $data['val']="home";
    $this->adm_mtech_header($data);
    $this->load->view('admission/mtech/adm_mtech_application',$data);
    $this->adm_mtech_footer();

  }

  public function get_personal_details()
  { 
    
    $registration_no=trim($this->input->post('registration_no'));
    $parent_name=trim($this->input->post('parent_name'));
    $parent_relation=trim($this->input->post('parent_relation'));
    $guardian_mobile_no=trim($this->input->post('guardian_mobile_no'));
    $nationality=trim($this->input->post('nationality'));
    $religion=trim($this->input->post('religion'));
    $martial=trim($this->input->post('martial'));
    $gender=trim($this->input->post('gender'));
    $adhar=trim($this->input->post('adhar'));
    $adm_type=trim($this->input->post('adm_type'));
    $work_exp=trim($this->input->post('sponsored_yes_no'));
    $c_line1=trim($this->input->post('c_line1'));
    $c_line2=trim($this->input->post('c_line2'));
    $c_line3=trim($this->input->post('c_line3'));
    $c_city=trim($this->input->post('c_city'));
    $c_state=trim($this->input->post('c_state'));
    $c_pincode=trim($this->input->post('c_pincode'));
    $c_country=trim($this->input->post('c_country'));
    $p_line1=trim($this->input->post('p_line1'));
    $p_line2=trim($this->input->post('p_line2'));
    $p_line3=trim($this->input->post('p_line3'));
    $p_city=trim($this->input->post('p_city'));
    $p_state=trim($this->input->post('p_state'));
    $p_pincode=trim($this->input->post('p_pincode'));
    $p_country=trim($this->input->post('p_country'));
    $this->form_validation->set_rules('parent_name','Parent Name','required|xss_clean');
    $this->form_validation->set_rules('parent_relation','Guardian','required|xss_clean');
    $this->form_validation->set_rules('nationality','Nationality','required');
    $this->form_validation->set_rules('guardian_mobile_no','Guardian mobile number','required');
    $this->form_validation->set_rules('religion','Religion','required|xss_clean');
    $this->form_validation->set_rules('martial','Martial','required|xss_clean');
    $this->form_validation->set_rules('gender','Gender','required');
    $this->form_validation->set_rules('adm_type','Admission type','trim|required|xss_clean');
    // $this->form_validation->set_rules('work_exp','Work Experience','required');
    $this->form_validation->set_rules('p_line1','Address line1','required');
    $this->form_validation->set_rules('p_line2','Address line2','required');
    $this->form_validation->set_rules('p_line2','First name','required|xss_clean');
    $this->form_validation->set_rules('p_city','City','required|xss_clean');
    // $this->form_validation->set_rules('p_state','State','required');
    $this->form_validation->set_rules('p_pincode','Pincode','trim|required|xss_clean');
    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    if ($this->form_validation->run() == true) 
    {    
      $personal_dteails=array(
        'adm_category'=> $adm_type,
        'guardian_name'=>$parent_name,
        'guardian_realtion'=>$parent_relation,
        'guardian_mobile'=>$guardian_mobile_no,
        'religion'=>$religion,
        'nationality'=>$nationality,
        'maritial_status'=>$martial,
        'work_expreince'=> $work_exp,
        'total_work_experience'=>$work_exp,
        'gender'=>$gender,
        'created_by'=>$email
      );
      $permanent_address=array(
        'registration_no'=>$get_reg_no,
        'address_type'=>'P',
        'line_1'=>$p_line1,
        'line_2'=>$p_line2,
        'line_3'=>$p_line3,
        'state'=> $p_state,
        'pincode'=>$p_pincode,
        'country'=> $p_country,
        'created_by'=>$email
      );
      $cureent_address=array(
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

      $tab=array(
        'tab1'=>1,
      );
     
      $this->load->model('admission/Adm_mtech_personal_details_model');
      $this->Adm_mtech_personal_details_model->update_personal_deatils($personal_dteails,$get_reg_no);
      // echo $this->db->last_query();
      // exit;
      $this->Adm_mtech_personal_details_model->insert_address($permanent_address);
      $this->Adm_mtech_personal_details_model->insert_address($cureent_address);
      $this->Adm_mtech_personal_details_model->update_tab1($tab,$get_reg_no);
      $this->session->set_userdata('education','education');
      $this->session->unset_userdata('personal_details');
      $data['val']="home";
      $data['tab']="education";
      $data['qualification']="qualification";
      $this->adm_mtech_header($data);
      $this->load->view('admission/mtech/adm_mtech_application',$data);
      $this->adm_mtech_footer();
      
    }
    else
    { 
      echo validation_errors();
      exit;
      $this->session->set_userdata('personal_details','personal_details');
      $data['val']="home";
      $data['personal_detail']="personal_detail";
      $this->adm_mtech_header($data);
      $this->load->view('admission/mtech/adm_mtech_application',$data);
      $this->adm_mtech_footer();
    }

  }

  public function get_education_detail()
  {
      // echo "reach herwad";
      // exit;
    // $btech_cgpa=trim($this->input->post('btech_cgpa'));
    // $btech_cat=trim($this->input->post('btech_cat'));
    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $gate_reg_no=trim($this->input->post('gate_reg_no'));
    $gate_score=trim($this->input->post('gate_score'));
    $gate_y_passing=trim($this->input->post('gate_y_passing'));
    $gate_score_valid=trim($this->input->post('gate_score_valid'));
    $gate_result_status=trim($this->input->post('gate_result_status'));
 
    $examtypepg=$this->input->post('examtypepg'); //for dynamic row
    $name_of_pgexam=$this->input->post('name_of_pgexam');
    $Institute_exampg=$this->input->post('Institute_exampg');
    $pg_appearing=$this->input->post('pg_appearing');
    $pg_percentage=$this->input->post('pg_percentage');
    $pg_p_cgpa=$this->input->post('pg_p_cgpa');
    $pg_y_passing=$this->input->post('pg_y_passing');

    $examtype10=trim($this->input->post('examtype10'));
    $name_of_exam10=trim($this->input->post('name_of_exam10'));
    $Institute_exam10=trim($this->input->post('Institute_exam10'));
    $passed10=trim($this->input->post('10passed'));
    $percentage10=trim($this->input->post('10percentage'));
    $ten_p_cgpa=trim($this->input->post('10_p_cgpa'));
    $ten_y_pass=trim($this->input->post('10_y_pass'));
    

    $examtype12=trim($this->input->post('examtype12'));
    $name_of_exam12=trim($this->input->post('name_of_exam12'));
    $Institute12=trim($this->input->post('Institute12'));
    $passed_12=trim($this->input->post('12passed'));
    $percentage_12=trim($this->input->post('12percentage'));
    $p_cgpa_12=trim($this->input->post('12_p_cgpa'));
    $y_pass_12=trim($this->input->post('12_y_pass'));
    

    $examtypeug=trim($this->input->post('examtypeug'));
    $name_of_ugexam=trim($this->input->post('name_of_ugexam'));
    $Institute_examug=trim($this->input->post('Institute_examug'));
    $ug_appearing=trim($this->input->post('ug_appearing'));
    $ug_percentage=trim($this->input->post('ug_percentage'));
    $ug_p_cgpa=trim($this->input->post('ug_p_cgpa'));
    $ug_y_passing=trim($this->input->post('ug_y_passing'));
   
    // $examtypepg=trim($this->input->post('examtypepg'));
    // $name_of_pgexam=trim($this->input->post('name_of_pgexam'));
    // $Institute_examug=trim($this->input->post('Institute_examug'));
    // $pg_appearing=trim($this->input->post('pg_appearing'));
    // $pg_percentage=trim($this->input->post('pg_percentage'));
    // $pg_y_passing=trim($this->input->post('pg_y_passing'));
    // $pg_p_cgpa=trim($this->input->post('pg_p_cgpa'));
    $this->form_validation->set_rules('gate_score','Gate score','required|xss_clean');
    $this->form_validation->set_rules('gate_y_passing','Gate year of passing','required|xss_clean');
    $this->form_validation->set_rules('gate_score_valid','Score card valid upto','required');
    $this->form_validation->set_rules('gate_result_status','Result status in qualifying degree','required|xss_clean');
    $this->form_validation->set_rules('examtype10','10th Exam type','required|xss_clean');

    $this->form_validation->set_rules('name_of_exam10','10th Name of exam','required');
    $this->form_validation->set_rules('Institute_exam10','10th Institute/university name','trim|required|xss_clean');
    $this->form_validation->set_rules('10passed','10th result Status','required');
    $this->form_validation->set_rules('10percentage','10th marks','required');
    $this->form_validation->set_rules('10_p_cgpa','10th year of passing','required');
    $this->form_validation->set_rules('10percentage','10th percentage/CGPA','required|xss_clean');

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

    // $this->form_validation->set_rules('$p_city','City','required|xss_clean');
    // $this->form_validation->set_rules('$p_state','State','required');
    // $this->form_validation->set_rules('$p_pincode','Pincode','trim|required|xss_clean');
    // $this->form_validation->set_rules('email','Email','required');
    // $this->form_validation->set_rules('dob','Dob','required');
    if ($this->form_validation->run() == true) 
    {   
      // echo "reach validation tureehrere";
      // exit;  
      $gate_dteails_val=array(
        'registration_no'=> $get_reg_no,
        'gate_reg_no'=>$gate_reg_no,
        'gate_result_status'=>$gate_result_status,
        'gate_score'=>$gate_score,
        'year_pass'=>$gate_y_passing,
        'valid_upto'=>$gate_score_valid,
        'created_by'=> $email,
      );

      $educations_details10=array(
        'registration_no'=>$get_reg_no,
        'exam_type'=>$examtype10,
        'exam_name'=>$name_of_exam10,
        'institue_name'=>$Institute_exam10,
        'result_status'=>$passed10,
        'marks_perc_type'=>$percentage10,
        'mark_cgpa_percenatge'=>$ten_p_cgpa,
        'year_of_passing'=>$ten_y_pass,
        'created_by'=>$email,
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
      for($i=0; $i<count($examtypepg); $i++)
      {
        $examtypepg=$this->input->post('examtypepg');
      // echo $employer[$i]."<br>";
      $datab[]=[
        'registration_no'=>$get_reg_no,
        'exam_type'=>$examtypepg[$i],
        'exam_name'=>$name_of_pgexam[$i],
        'institue_name'=>$Institute_exampg[$i],
        'result_status'=>$pg_appearing[$i],
        'marks_perc_type'=>$pg_percentage[$i],
        'mark_cgpa_percenatge'=>$pg_p_cgpa[$i],
        'year_of_passing'=>$pg_y_passing[$i],
        'created_by'=>$email,
      ];
     } 
      $tab=array(
        'tab2'=>2,
      );
     
     
     
      $this->load->model('admission/Adm_mtech_personal_details_model');
      if(!empty($datab))
     {
      $this->Adm_mtech_personal_details_model->insert_qualification_batch($datab);
     }
      $this->Adm_mtech_personal_details_model->insert_gate_details($gate_dteails_val);
      $this->Adm_mtech_personal_details_model->insert_qualification($educations_details10);
      $this->Adm_mtech_personal_details_model->insert_qualification($educations_details12);
      $this->Adm_mtech_personal_details_model->insert_qualification($educations_detailug);
      $this->Adm_mtech_personal_details_model->update_tab1($tab,$get_reg_no);
      $this->session->set_userdata('work_experience','work_experience');
      $this->session->unset_userdata('education');
      // echo "<pre>";
      // print_r($gate_dteails_val);
      // exit;
     
      $data['val']="home";
      $data['work_experince']="work_experince";
      $this->adm_mtech_header($data);
      $this->load->view('admission/mtech/adm_mtech_application',$data);
      $this->adm_mtech_footer();
      
    }
    else
    {  
      // echo validation_errors();
      // echo "reach validationfalse ehrere";
      // exit; 
      $data['tab']="education";
      $this->session->set_userdata('education','education'); 
      $data['val']="home";
      $data['qualification']="qualification";
      $this->adm_mtech_header($data);
      $this->load->view('admission/mtech/adm_mtech_application',$data);
      $this->adm_mtech_footer();
    }
  }

  public function get_work_experience_detail()
  { 
   
    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $degination1=trim($this->input->post('degination1'));
    $organization1=trim($this->input->post('organization1'));
    $nature_of_work1=trim($this->input->post('nature_of_work1'));
    $duration1=trim($this->input->post('duration1'));
    $sector1=trim($this->input->post('sector1'));
    $from1=trim($this->input->post('from1'));
    $to1=trim($this->input->post('to1'));
    $degination=$this->input->post('degination'); //dynamic row insert
    $organization=$this->input->post('organization');
    $nature_of_work=$this->input->post('nature_of_work');
    $duration=$this->input->post('duration');
    $sector=$this->input->post('sector');
    $from=$this->input->post('from');
    $to=$this->input->post('to');
    // $degination2=trim($this->input->post('degination2'));
    // $organization2=trim($this->input->post('organization2'));
    // $nature_of_work2=trim($this->input->post('nature_of_work2'));
    // $duration2=trim($this->input->post('duration2'));
    // $sector2=trim($this->input->post('sector2'));
    // $from2=trim($this->input->post('from2'));
    // $to2=trim($this->input->post('to2'));

    // $degination3=trim($this->input->post('degination3'));
    // $organization3=trim($this->input->post('organization3'));
    // $nature_of_work3=trim($this->input->post('nature_of_work3'));
    // $duration3=trim($this->input->post('duration3'));
    // $sector3=trim($this->input->post('sector3'));
    // $from3=trim($this->input->post('from3'));
    // $name_of_exam12=trim($this->input->post('to3'));
    // $to3=trim($this->input->post('Institute12'));

    // $degination4=trim($this->input->post('degination4'));
    // $organization4=trim($this->input->post('organization4'));
    // $nature_of_work4=trim($this->input->post('nature_of_work4'));
    // $duration4=trim($this->input->post('duration4'));
    // $sector4=trim($this->input->post('sector4'));
    // $from4=trim($this->input->post('from4'));
    // $to4=trim($this->input->post('to4'));

    $this->form_validation->set_rules('degination1','Designation','required|xss_clean');
    $this->form_validation->set_rules('organization1','Organization','required|xss_clean');
    $this->form_validation->set_rules('nature_of_work1','Nature of work','required');
    $this->form_validation->set_rules('duration1','Duration(in month)','required|xss_clean');
    $this->form_validation->set_rules('sector1','Sector','required|xss_clean');
    $this->form_validation->set_rules('from1','From','required');
    $this->form_validation->set_rules('to1','To','trim|required|xss_clean');
    $email=$this->session->userdata('email');
    if ($this->form_validation->run() == true) 
    {  

      $work_exp=4;
      $work_exp_row1=array(
        'registration_no'=>$get_reg_no,
        'designation_no'=>$degination1,
        'designation_organistion'=>$organization1,
        'nature_of_work'=>$nature_of_work1,
        'from_date'=>$from1,
        'to_date'=>$to1,
        'duration_in_month'=>$duration1,
        'total_experience'=>$work_exp,
        'sector'=>$sector1,
        'created_by'=>$email
      );
      for($i=0; $i<count($degination); $i++)
      {
        // echo $employer[$i]."<br>";
        $datab[]=[
        'registration_no'=>$get_reg_no,
        'designation_no'=>$degination[$i],
        'designation_organistion'=>$organization[$i],
        'nature_of_work'=>$nature_of_work[$i],
        'from_date'=>$from[$i],
        'to_date'=>$to[$i],
        'duration_in_month'=>$duration[$i],
        'total_experience'=>$work_exp[$i],
        'sector'=>$sector[$i],
        'created_by'=>$email
      ];

     } 
    //  echo "<pre>";
    //  print_r($datab);
    //  exit;
      $tab=array(
        'tab3'=>3,
      );
      
      // echo "<pre>";
      // print_r( $work_exp_row1);
      // exit;

      // $work_exp_row2=array(
      //   'registration_no'=>$get_reg_no,
      //   'designation_no'=>$degination2,
      //   'designation_organistion'=>$organization2,
      //   'nature_of_work'=>$nature_of_work2,
      //   'from_date'=>$from2,
      //   'to_date'=>$to2,
      //   'duration_in_month'=>$duration2,
      //   'total_experience'=>$work_exp,
      //   'sector'=>$sector2,
      //   'created_by'=>$email
      // );

      // $work_exp_row3=array(
      //   'registration_no'=>$get_reg_no,
      //   'designation_no'=>$degination3,
      //   'designation_organistion'=>$organization3,
      //   'nature_of_work'=>$nature_of_work3,
      //   'from_date'=>$from3,
      //   'to_date'=>$to3,
      //   'duration_in_month'=>$duration3,
      //   'total_experience'=>$work_exp,
      //   'sector'=>$sector3,
      //   'created_by'=>$email
      // );
      // $work_exp_row4=array(
      //   'registration_no'=>$get_reg_no,
      //   'designation_no'=>$degination4,
      //   'designation_organistion'=>$organization4,
      //   'nature_of_work'=>$nature_of_work4,
      //   'from_date'=>$from4,
      //   'to_date'=>$to4,
      //   'duration_in_month'=>$duration4,
      //   'total_experience'=>$work_exp,
      //   'sector'=>$sector4,
      //   'created_by'=>$email
      // );
      if(!empty($datab))
      {
        $this->Adm_mtech_personal_details_model->insert_work_experince_batch($datab);
      }
     
      // echo $this->db->last_query();

      // echo "jh";
      // exit;
      $this->Adm_mtech_personal_details_model->insert_work_experince($work_exp_row1);
      // echo $this->db->last_query();
      // exit;
      $this->Adm_mtech_personal_details_model->update_tab1($tab,$get_reg_no);
      redirect('admission/mtech/Adm_mtech_document');
      // $data['val']="home";
      // $data['open_document']="document";
      // $this->adm_mtech_header($data);
      // $this->load->view('admission/mtech/adm_mtech_application',$data);
      // $this->adm_mtech_footer();
      
    }

    else
    {  
      // echo "validation false";
      // echo validation_errors();
      // exit;
      $this->session->set_userdata('work_experience','work_experience');
      $data['val']="home";
      $data['tab']="work_experience";
      $data['open_work_experince']="work_experince";
      $this->adm_mtech_header($data);
      $this->load->view('admission/mtech/adm_mtech_application',$data);
      $this->adm_mtech_footer();
    }
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

<?php

class Adm_phdpt_personal_details extends MY_Controller {

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
    $this->load->model('admission/phdpt/Add_phdpt_registration_model');
    $this->load->model('admission/phdpt/Adm_phdpt_personal_details_model');
    $this->load->model('admission/phdpt/Adm_phdpt_application_model');

  }

  function index()
  {

    if(!($this->session->has_userdata('applied')))
    {
      redirect('admission/phdpt/Add_phdpt/adm_phdpt_login');
    }
      $govind='';
    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_phdpt_registration_model->get_registration_no_by_email($email);
    $data['registration_detail']=$this->Add_phdpt_registration_model->get_registration_detail_by_email($email);
    $data['upload_document']=$this->Adm_phdpt_personal_details_model->get_all_document_uploaded($get_reg_no);
    $data['application_details']=$this->Add_phdpt_registration_model->get_application_programme_details($get_reg_no);

    if(!($this->session->has_userdata('email')))
    {
      redirect('Add_phdpt/adm_phdpt_login');
    }

    //$data['application_details']=$this->Adm_phd_personal_details_model->get_adm_phd_reg_appl_program($get_reg_no);
    $data['fill_appl_details']=$this->Adm_phdpt_application_model->get_application_fill_details($get_reg_no);
    $data['application_details_ms']=$this->Adm_phdpt_personal_details_model->get_adm_phd_appl_ms($get_reg_no);

    $data['qual12_details']=$this->Adm_phdpt_personal_details_model->get_qualification12_details($get_reg_no);
    $data['qual10_details']=$this->Adm_phdpt_personal_details_model->get_qualification10_details($get_reg_no);
    $data['qualug_details']=$this->Adm_phdpt_personal_details_model->get_qualificationug_details($get_reg_no);
    $data['qualpg1_details']=$this->Adm_phdpt_personal_details_model->get_qualificationpg1_details($get_reg_no);
    $data['qualpg2_details']=$this->Adm_phdpt_personal_details_model->get_qualificationpg2_details($get_reg_no);

    $data['exp_details']=$this->Adm_phdpt_personal_details_model->get_expreince_details($get_reg_no);
    $data['exp_details_d']=$this->Adm_phdpt_personal_details_model->get_expreince_details_dynamic($get_reg_no);

    $data['tot_exp_details']=$this->Adm_phdpt_personal_details_model->tot_exp_details($get_reg_no);

    $data['main_year'] = explode('|',$data['application_details_ms'][0]['tot_wrk_details'])[0];
    $data['main_month'] = explode('|',$data['application_details_ms'][0]['tot_wrk_details'])[1];
    $data['main_day'] = explode('|',$data['application_details_ms'][0]['tot_wrk_details'])[2];


    $data['phd_fello_details1']=$this->Adm_phdpt_personal_details_model->get_phd_fello_score_details_one($get_reg_no);
    $data['phd_fello_details2']=$this->Adm_phdpt_personal_details_model->get_phd_fello_score_details_two($get_reg_no);
    $data['phd_fello_details3']=$this->Adm_phdpt_personal_details_model->get_phd_fello_score_details_three($get_reg_no);
    $data['phd_fello_details4']=$this->Adm_phdpt_personal_details_model->get_phd_fello_score_details_four($get_reg_no);
    $data['phd_fello_details_iit']=$this->Adm_phdpt_personal_details_model->get_phd_fello_score_details_iit($get_reg_no);

    $data['iit_details']=$this->Adm_phdpt_personal_details_model->get_iitname_details();
    $data['p_addr_details']=$this->Adm_phdpt_personal_details_model->get_p_address_details($get_reg_no);
    $data['c_addr_details']=$this->Adm_phdpt_personal_details_model->get_c_address_details($get_reg_no);
    $data['state']=$this->Adm_phdpt_personal_details_model->get_state();
    $data['full_partime']=$this->Add_phdpt_registration_model->get_candidate_type_by_email($email);

    //base on conditon of prj ,AI ,EXT, PT,fecth dropdown
    $data['fellowship_type_list']=$this->Adm_phdpt_personal_details_model->get_fellowship_list($data['application_details_ms'][0]['assistance_type'],$get_reg_no);
    // echo "<pre>";
    // print_r($data);
    // exit;

    $data['pro_work_yes_no']=$this->Adm_phdpt_personal_details_model->get_non_min_work_exp($get_reg_no);


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
    $this->adm_phdpt_header($data);
    $this->load->view('admission/phdpt/adm_phdpt_application',$data);
    $this->adm_phdpt_footer();

  }

  public function get_personal_details()
  {

    if(!($this->session->has_userdata('email')))
    {
      redirect('Add_phdpt/adm_phdpt_login');
    }
    $email=$this->session->userdata('email');
    $full_partime=$this->Add_phdpt_registration_model->get_candidate_type_by_email($email);

    $get_reg_no=$this->Add_phdpt_registration_model->get_registration_no_by_email($email);
    $get_reg_details=$this->Add_phdpt_registration_model->get_registration_detail_by_email($email);
    $candidate_type=$this->Add_phdpt_registration_model->get_candidate_type_by_email($email);
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
    $adm_type=$this->clean($this->input->post('adm_type'));
    $category=$this->clean($this->input->post('category'));
    //// $work_exp=trim($this->input->post('work_exp'));

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

    $working_project=$this->apha_numeric_only(trim($this->input->post('working_project')));
    $assistant_type=$this->apha_numeric_only(trim($this->input->post('assistant_type')));
    $project_designation=$this->apha_numeric_only(trim($this->input->post('project_designation')));
    $project_no=$this->number_only(trim($this->input->post('project_no')));
    $project_name=$this->apha_numeric_only(trim($this->input->post('project_name')));
    $project_investing=$this->apha_numeric_only(trim($this->input->post('project_investing')));
    $project_dept=$this->apha_numeric_only(trim($this->input->post('project_dept')));
    $start_date=trim($this->input->post('start_date'));
    $end_date=trim($this->input->post('end_date'));

    if( $full_partime=='Full time')
    {
        $check_input_y_n = array("Y","N");
      // if(!in_array($working_project,  $check_input_y_n, TRUE))
      // {
      //   $this->session->set_flashdata('error_personal','Internal Network error occured error code FB01');
      //   echo "reach here";
      //   exit;
      //   redirect('admission/phd/Adm_phd_personal_details');
      // }

      $this->form_validation->set_rules('working_project','Working Project','required|xss_clean');


      if($working_project=='Y')
      {
        $this->form_validation->set_rules('project_designation','Project Departemnt','required');
        $this->form_validation->set_rules('project_no','Project Number','required|xss_clean');
        $this->form_validation->set_rules('project_name','Project Name','required|xss_clean');
        $this->form_validation->set_rules('project_investing','Project Investing','required');
        $this->form_validation->set_rules('project_dept','Project Department','required|xss_clean');
        $this->form_validation->set_rules('start_date','Start Date','required|xss_clean');
        $this->form_validation->set_rules('end_date','End Date','required');
      }

      if($working_project=='N')
      {
        $this->form_validation->set_rules('assistant_type','Assistant type','required');
      }

    }
    if($category=='EWS' || $category=='OBC')
    {
      $this->form_validation->set_rules('date_of_issue','Date of Issue of cast certificate','required');
    }


    $this->form_validation->set_rules('parent_name','Parent Name','required|xss_clean');
    $this->form_validation->set_rules('parent_relation','Guardian','required|xss_clean');
    $this->form_validation->set_rules('guardian_mobile_no','Guardian Mobile Number','required|xss_clean|regex_match[/^[0-9]{10}$/]');
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
        'created_by'=>$email,

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

      $project_details_yes=array(
        'assistance_type'=>'PRJ',
        'ism_proj_emp'=>$working_project,
        'proj_designation'=>$project_designation,
        'proj_no'=>$project_no,
        'proj_name'=> $project_name,
        'proj_pi'=>$project_investing,
        'proj_dept'=>$project_dept,
        'proj_start_date'=>$start_date,
        'proj_end_date'=>$end_date,
      );

      $project_details_no=array(
        'assistance_type'=>$assistant_type,
        'ism_proj_emp'=>$working_project,
      );

      $part_time=array(
        'assistance_type'=>'PT',
      );

      // echo "<pre>";
      // print_r($project_details_no);
      // exit;

      $tab=array(
        'tab1'=>1,
      );


      if($p_line4=='')
      {

        $this->load->model('admission/phdpt/Adm_phdpt_personal_details_model');
        $this->db->trans_start();
        if($full_partime=='Full time') //full time
        {

          if($working_project=='Y')
          {
            $this->Adm_phdpt_personal_details_model->update_project_deatils_yes_no($project_details_yes,$get_reg_no);
          }
          else
          {
            $this->Adm_phdpt_personal_details_model->update_project_deatils_yes_no($project_details_no,$get_reg_no);

          }

        }
        else //part time
        {
          $this->Adm_phdpt_personal_details_model->update_project_deatils_yes_no($part_time,$get_reg_no);

        }

        $this->Adm_phdpt_personal_details_model->update_personal_deatils($personal_dteails,$get_reg_no);

        $this->Adm_phdpt_personal_details_model->insert_address($permanent_address);
        $this->Adm_phdpt_personal_details_model->insert_address($current_address);
        $this->Adm_phdpt_personal_details_model->update_tab1($tab,$get_reg_no);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
          $this->session->set_flashdata('error_personal','Internal Network error occured error code P101');
          redirect('admission/phdpt/Adm_phdpt_personal_details');

        }

        else
        {
          $this->session->set_userdata('education','education');
          $this->session->unset_userdata('personal_details');
          $this->session->set_flashdata('apply_success_pd','You succesfully added Please fill educational details');
          redirect('admission/phdpt/Adm_phdpt_personal_details');


        }


      }
      else
      {

        $this->load->model('admission/phdpt/Adm_phdpt_personal_details_model');
        $this->db->trans_start();
        if($full_partime=='Full time')
        {
           if($working_project=='Y')
           {
             $this->Adm_phdpt_personal_details_model->update_project_deatils_yes_no($project_details_yes,$get_reg_no);

           }
           else
           {
              $this->Adm_phdpt_personal_details_model->update_project_deatils_yes_no($project_details_no,$get_reg_no);
           }

        }
        else //part time
        {
           $this->Adm_phdpt_personal_details_model->update_project_deatils_yes_no($part_time,$get_reg_no);

        }

        $this->Adm_phdpt_personal_details_model->update_personal_deatils($personal_dteails,$get_reg_no);
        $this->Adm_phdpt_personal_details_model->update_p_address($p_permanent_address,$get_reg_no);
        $this->Adm_phdpt_personal_details_model->update_c_address($c_current_address,$get_reg_no);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
        {
          $this->session->set_flashdata('error_personal','Internal Network error occured error code P102');
          redirect('admission/phdpt/Adm_phdpt_personal_details');

        }
        else
        {
          $this->session->set_userdata('education','education');
          $this->session->unset_userdata('personal_details');
          $this->session->set_flashdata('apply_success_pd','You edit succesfully');
          redirect('admission/phdpt/Adm_phdpt_personal_details');
          $data['val']="H";
          $data['tab']="education";
          $data['qualification']="qualification";
          $this->adm_phdpt_header($data);
          $this->load->view('admission/phdpt/adm_phdpt_application',$data);
          $this->adm_phdpt_footer();
        }

      }


    }

    else
    {

      $data['registration_detail']=$this->Add_phdpt_registration_model->get_registration_detail_by_email($email);
      $get_reg_no=$this->Add_phdpt_registration_model->get_registration_no_by_email($email);
      $data['application_details']=$this->Adm_phdpt_personal_details_model->get_adm_phd_reg_appl_program($get_reg_no);
      $data['application_details_ms']=$this->Adm_phdpt_personal_details_model->get_adm_phd_appl_ms($get_reg_no);
      $data['qual12_details']=$this->Adm_phdpt_personal_details_model->get_qualification12_details($get_reg_no);
      $data['qual10_details']=$this->Adm_phdpt_personal_details_model->get_qualification10_details($get_reg_no);
      $data['qualug_details']=$this->Adm_phdpt_personal_details_model->get_qualificationug_details($get_reg_no);
     // $data['pg_details']=$this->Adm_phd_personal_details_model->get_qualificationpg_details($get_reg_no);
      $data['betchiit']=$data['application_details_ms'][0]['betch_iit'];
      $data['exp_details']=$this->Adm_phdpt_personal_details_model->get_expreince_details($get_reg_no);
      $data['exp_details_d']=$this->Adm_phdpt_personal_details_model->get_expreince_details_dynamic($get_reg_no);

      $data['tot_exp_details']=$this->Adm_phdpt_personal_details_model->tot_exp_details($get_reg_no);

      $data['main_year'] = explode('|',$data['application_details_ms'][0]['tot_wrk_details'])[0];
      $data['main_month'] = explode('|',$data['application_details_ms'][0]['tot_wrk_details'])[1];
      $data['main_day'] = explode('|',$data['application_details_ms'][0]['tot_wrk_details'])[2];

      $data['phd_fello_details']=$this->Adm_phdpt_personal_details_model->get_phd_fello_score_details($get_reg_no);
      $data['iit_details']=$this->Adm_phdpt_personal_details_model->get_iitname_details();
      $data['p_addr_details']=$this->Adm_phdpt_personal_details_model->get_p_address_details($get_reg_no);
      $data['c_addr_details']=$this->Adm_phdpt_personal_details_model->get_c_address_details($get_reg_no);
      $data['state']=$this->Adm_phdpt_personal_details_model->get_state();
      // $this->session->set_flashdata('error_educationa','Thier is error while saving data');
      // $this->session->set_userdata('personal_details','personal_details');
      $data['val']="H";
      $data['tab']="personal_details";
      $data['personal_detail']="personal_detail";
      $this->adm_phdpt_header($data);
      $this->load->view('admission/phdpt/adm_phdpt_application',$data);
      $this->adm_phdpt_footer();

    }

  }

  public function get_education_detail()
  {
    // phd function start
    if(!($this->session->has_userdata('email')))
    {
      redirect('Add_phdpt/adm_phdpt_login');
    }

    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_phdpt_registration_model->get_registration_no_by_email($email);
    $full_part_time=$this->Add_phdpt_registration_model->get_candidate_type_by_email($email);
    $data['application_details_ms']=$this->Adm_phdpt_personal_details_model->get_adm_phd_appl_ms($get_reg_no);
    // $btech_cgpa=trim($this->input->post('btech_cgpa'));
    $btech_cgpa='N';
    $btech_iit_name=$this->clean(trim($this->input->post('iit_names')));
    $iit_cgpa=$this->number_with_dot(trim($this->input->post('iit_cgpa_case')));
    $iit_year_of_passing=$this->number_with_dot(trim($this->input->post('iit_year_of_passing')));
    $qualifying_degree_new=$this->apha_numeric_only(trim($this->input->post('qualifying_degree_new')));


    $cfti_nirf_flag = $this->input->post('cfti_nirf_flag');


    $fellowship_type_f1=$this->input->post('fellowship_type_f1'); //for dynamic row
    $fellow_reg_no_f1=$this->input->post('fellow_reg_no_f1');
    $fellow_result_status_f1=$this->input->post('fellow_result_status_f1');
    $fellow_score_f1=$this->input->post('fellow_score_f1');
    $fellow_percentile_f1=$this->input->post('fellow_percentile_f1');
    $fellow_rank_f1=$this->input->post('fellow_rank_f1');
    $exam_category_f1=$this->input->post('exam_category_f1');
    $year_pass_f1=$this->input->post('year_pass_f1');
    $total_marks_f1=$this->input->post('total_marks_f1');

    $fellowship_type_f2=$this->input->post('fellowship_type_f2'); //for dynamic row
    $fellow_reg_no_f2=$this->input->post('fellow_reg_no_f2');
    $fellow_result_status_f2=$this->input->post('fellow_result_status_f2');
    $fellow_score_f2=$this->input->post('fellow_score_f2');
    $fellow_percentile_f2=$this->input->post('fellow_percentile_f2');
    $fellow_rank_f2=$this->input->post('fellow_rank_f2');
    $exam_category_f2=$this->input->post('exam_category_f2');
    $year_pass_f2=$this->input->post('year_pass_f2');
    $total_marks_f2=$this->input->post('total_marks_f2');

    $fellowship_type_f3=$this->input->post('fellowship_type_f3'); //for dynamic row
    $fellow_reg_no_f3=$this->input->post('fellow_reg_no_f3');
    $fellow_result_status_f3=$this->input->post('fellow_result_status_f3');
    $fellow_score_f3=$this->input->post('fellow_score_f3');
    $fellow_percentile_f3=$this->input->post('fellow_percentile_f3');
    $fellow_rank_f3=$this->input->post('fellow_rank_f3');
    $exam_category_f3=$this->input->post('exam_category_f3');
    $year_pass_f3=$this->input->post('year_pass_f3');
    $total_marks_f3=$this->input->post('total_marks_f3');

    $fellowship_type_f4=$this->input->post('fellowship_type_f4'); //for dynamic row
    $fellowship_type_other=$this->input->post('fellowship_type_other');
    $fellow_reg_no_f4=$this->input->post('fellow_reg_no_f4');
    $fellow_result_status_f4=$this->input->post('fellow_result_status_f4');
    $fellow_score_f4=$this->input->post('fellow_score_f4');
    $fellow_percentile_f4=$this->input->post('fellow_percentile_f4');
    $fellow_rank_f4=$this->input->post('fellow_rank_f4');
    $exam_category_f4=$this->input->post('exam_category_f4');
    $year_pass_f4=$this->input->post('year_pass_f4');
    $total_marks_f4=$this->input->post('total_marks_f4');



    $examtype10=$this->apha_numeric_only(trim($this->input->post('examtype10')));
    $name_of_exam10=$this->apha_numeric_only(trim($this->input->post('name_of_exam10')));
    $dicipline_10=$this->apha_numeric_only(trim($this->input->post('discipline10')));
    $qualifying_degree10=$this->apha_numeric_only(trim($this->input->post('qualifying_degree10')));
    $Institute_exam10=$this->clean(trim($this->input->post('Institute_exam10')));
    $passed10=$this->clean(trim($this->input->post('10passed')));
    $percentage10=$this->clean(trim($this->input->post('10percentage')));

    if($percentage10=='Cgpa')
    {
      $out_of_cgpa1=$this->number_with_dot(trim($this->input->post('out_of_cgpa1')));
      $normal1=$this->number_with_dot(trim($this->input->post('normal1')));

    }



    $ten_y_pass=$this->number_only(trim($this->input->post('10_y_pass')));
    $ten_p_cgpa=$this->number_with_dot(trim($this->input->post('10_p_cgpa')));


    $examtype12=$this->apha_numeric_only(trim($this->input->post('examtype12')));
    $name_of_exam12=$this->apha_numeric_only(trim($this->input->post('name_of_exam12')));
    $dicipline_12=$this->apha_numeric_only(trim($this->input->post('discipline12')));
    $qualifying_degree12=$this->apha_numeric_only(trim($this->input->post('qualifying_degree12')));
    $Institute12=$this->clean(trim($this->input->post('Institute12')));
    $passed_12=$this->clean(trim($this->input->post('12passed')));
    $percentage_12=$this->clean(trim($this->input->post('12percentage')));
    if($percentage_12=='Cgpa')
    {
      $out_of_cgpa2=$this->number_with_dot(trim($this->input->post('out_of_cgpa2')));
      $normal2=$this->number_with_dot(trim($this->input->post('normal2')));

    }

    $y_pass_12=$this->number_only(trim($this->input->post('12_y_pass')));
    $p_cgpa_12=$this->number_with_dot(trim($this->input->post('12_p_cgpa')));


    $examtypeug=$this->clean(trim($this->input->post('examtypeug')));
    $name_of_ugexam=$this->clean(trim($this->input->post('name_of_ugexam')));
    $dicipline_ug=$this->apha_numeric_only(trim($this->input->post('disciplineug')));
    $qualifying_degreeug=$this->apha_numeric_only(trim($this->input->post('qualifying_degreeug')));
    $Institute_examug=$this->clean(trim($this->input->post('Institute_examug')));
    $ug_appearing=$this->clean(trim($this->input->post('ug_appearing')));
    $ug_percentage=$this->clean(trim($this->input->post('ug_percentage')));
    if($ug_percentage=='Cgpa')
    {
      $out_of_cgpa3=$this->number_with_dot(trim($this->input->post('out_of_cgpa3')));
      $normal3=$this->number_with_dot(trim($this->input->post('normal3')));

    }

    $ug_p_cgpa=$this->number_with_dot(trim($this->input->post('ug_p_cgpa')));
    $ug_y_passing=$this->number_with_dot(trim($this->input->post('ug_y_passing')));



    $examtypepg1=$this->clean(trim($this->input->post('examtypepg1')));
    $name_of_pg1exam=$this->clean(trim($this->input->post('name_of_pg1exam')));
    $dicipline_pg1=$this->apha_numeric_only(trim($this->input->post('disciplinepg1')));
    $qualifying_degreepg1=$this->apha_numeric_only(trim($this->input->post('qualifying_degreepg1')));
    $Institute_exampg1=$this->clean(trim($this->input->post('Institute_exampg1')));
    $pg1_appearing=$this->clean(trim($this->input->post('pg1_appearing')));
    $pg1_percentage=$this->clean(trim($this->input->post('pg1_percentage')));

    if($pg1_percentage=='Cgpa')
    {
      $out_of_cgpa4=$this->number_with_dot(trim($this->input->post('out_of_cgpa4')));
      $normal4=$this->number_with_dot(trim($this->input->post('normal4')));

    }
    $pg1_p_cgpa=$this->number_with_dot(trim($this->input->post('pg1_p_cgpa')));
    $pg1_y_passing=$this->number_with_dot(trim($this->input->post('pg1_y_passing')));

    if ($cfti_nirf_flag == 'Y') {
      $this->form_validation->set_rules('cfti_name_of_institute','CFTI/NIRF Institute Name','required');
      $this->form_validation->set_rules('cfti_nirf_cgpa','CFTI/NIRF CGPA','required');
      $this->form_validation->set_rules('cfti_year_of_passing','Enter CFTI/NIRF Year of passing','required');
      $this->form_validation->set_rules('overall_nirf_rank_curr_yr','Overall NIRF Ranking Current Year','required');
      $this->form_validation->set_rules('overall_nirf_rank_pre_yr','Overall NIRF Ranking Previous Year','required');
      $this->form_validation->set_rules('eng_nirf_rank_curr_yr','Engineering NIRF Ranking Current Year','required');
      $this->form_validation->set_rules('eng_nirf_rank_pre_yr','Engineering NIRF Ranking Previous Year','required');
    }

    $examtypepg2=$this->clean(trim($this->input->post('examtypepg2')));
    $name_of_pg2exam=$this->clean(trim($this->input->post('name_of_pg2exam')));
    $dicipline_pg2=$this->apha_numeric_only(trim($this->input->post('disciplinepg2')));
    $qualifying_degreepg2=$this->apha_numeric_only(trim($this->input->post('qualifying_degreepg2')));
    $Institute_exampg2=$this->clean(trim($this->input->post('Institute_exampg2')));
    $pg2_appearing=$this->clean(trim($this->input->post('pg2_appearing')));
    $pg2_percentage=$this->clean(trim($this->input->post('pg2_percentage')));
    if($pg2_percentage=='Cgpa')
    {
      $out_of_cgpa5=$this->number_with_dot(trim($this->input->post('out_of_cgpa5')));
      $normal5=$this->number_with_dot(trim($this->input->post('normal5')));

    }
    $pg2_p_cgpa=$this->number_with_dot(trim($this->input->post('pg2_p_cgpa')));
    $pg2_y_passing=$this->number_with_dot(trim($this->input->post('pg2_y_passing')));


    // if ($btech_cgpa=='Y' || $cfti_nirf_flag=='Y') {
    //   $qualifying_flag = 'N';
    // }

    // else {
    //     $qualifying_flag = 'Y';
    // }


    // if($btech_cgpa=='Y')
    // {
    //   $this->form_validation->set_rules('iit_names','IIT name','required');
    //   $this->form_validation->set_rules('iit_cgpa_case','IIT CGPA','required');
    //   $this->form_validation->set_rules('iit_year_of_passing','Enter Year of passing','required');
    // }
    // else
    // {

    //   $this->form_validation->set_rules('fellowship_type_f1','Qualifiying Exam','required');
    //   $this->form_validation->set_rules('fellow_reg_no_f1','Qualifiying Exam Registration No','required');
    //   $this->form_validation->set_rules('fellow_result_status_f1','Result Status','trim|required|xss_clean');
    //   $this->form_validation->set_rules('fellow_score_f1','Score','required');
    //   $this->form_validation->set_rules('fellow_percentile_f1','Percentile','required');
    //   $this->form_validation->set_rules('fellow_rank_f1','Rank','required');
    //   $this->form_validation->set_rules('year_pass_f1','Year of passing','required|xss_clean');
    //   $this->form_validation->set_rules('total_marks_f1','Total Marks','required|xss_clean');

    // }

    // if($cfti_nirf_flag == 'Y')
    // {

    //   $this->form_validation->set_rules('fellowship_type_f1','Qualifiying Exam','required');
    //   $this->form_validation->set_rules('fellow_reg_no_f1','Qualifiying Exam Registration No','required');
    //   $this->form_validation->set_rules('fellow_result_status_f1','Result Status','trim|required|xss_clean');
    //   $this->form_validation->set_rules('fellow_score_f1','Score','required');
    //   $this->form_validation->set_rules('fellow_percentile_f1','Percentile','required');
    //   $this->form_validation->set_rules('fellow_rank_f1','Rank','required');
    //   $this->form_validation->set_rules('year_pass_f1','Year of passing','required|xss_clean');
    //   $this->form_validation->set_rules('total_marks_f1','Total Marks','required|xss_clean');

    // }


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

    if($qualifying_degree_new=='PG')
    {
      $this->form_validation->set_rules('examtypepg1','pg1 Exam type','required|xss_clean');
      $this->form_validation->set_rules('disciplinepg1','pg1 discipline','required');
      $this->form_validation->set_rules('name_of_pg1exam','Name of pg1 exam','required');
      $this->form_validation->set_rules('Institute_exampg1','pg1 Institute/university name','trim|required|xss_clean');
      $this->form_validation->set_rules('pg1_appearing','pg1 result Status','required');
      $this->form_validation->set_rules('pg1_percentage','pg1 marks','required');
      $this->form_validation->set_rules('pg1_y_passing','pg1 year of passing','required');
      $this->form_validation->set_rules('pg1_p_cgpa','Pg1 percentage/CGPA','required|xss_clean');
    }


    // $this->form_validation->set_rules('examtypepg2','pg2 Exam type','required|xss_clean');
    // $this->form_validation->set_rules('disciplinepg2','pg2 discipline','required');
    // $this->form_validation->set_rules('name_of_pg2exam','Name of pg2 exam','required');
    // $this->form_validation->set_rules('Institute_exampg2','pg2 Institute/university name','trim|required|xss_clean');
    // $this->form_validation->set_rules('pg2_appearing','pg2 result Status','required');
    // $this->form_validation->set_rules('pg2_percentage','pg2 marks','required');
    // $this->form_validation->set_rules('pg2_y_passing','pg2 year of passing','required');
    // $this->form_validation->set_rules('pg2_p_cgpa','pg2 percentage/CGPA','required|xss_clean');

    if ($this->form_validation->run() == true)
    {

      // $check_blank_in_array=count(array_intersect($a, ['']));
      $email=$this->session->userdata('email');
      $get_reg_no=$this->Add_phdpt_registration_model->get_registration_no_by_email($email);

      if($btech_cgpa=='Y')
      {
        $personal_details_iit=array(
          'betch_iit'=>$btech_cgpa,
          'betch_iit_name'=>$btech_iit_name,
          'qualifying_degree'=>$qualifying_degree_new,
          'status'=>'PF'
        );
      }
      else if($btech_cgpa=='N')
      {
        $personal_details_iit=array(
          'betch_iit'=>$btech_cgpa,
          'qualifying_degree'=>$qualifying_degree_new,
          'status'=>'PF'
        );
      }
      else
      {
        // $this->session->set_flashdata('error_educationa','Error occured on selecting B.tech degree from IIT');
        redirect('admission/phdpt/Adm_phdpt_personal_details');
      }


      if($iit_cgpa=='')
      {
        $iit_cgpa='0';
      }

      if($iit_year_of_passing=='')
      {
        $iit_year_of_passing=0;

      }

      $fellowship_iit=array(
        'registration_no'=>$get_reg_no,
        'fellowship_type'=>'IIT Graduate',
        'fellow_reg_no'=>'NA',
        'fellow_result_status'=>'NA',
        'fellow_score'=>'0',
        'fellow_percentile'=>'0',
        'fellow_rank'=>'0',
        'year_pass'=>$iit_year_of_passing,
        'total_marks'=>'0',
        'iit_name'=>$btech_iit_name,
        'cgpa'=>$iit_cgpa,
        'fellowship_serial_no'=>'IIT Fellow',
        'created_by'=>$email,
      );

      $fellowship_u_iit=array(
        'registration_no'=>$get_reg_no,
        'fellowship_type'=>'IIT Graduate',
        'fellow_reg_no'=>'NA',
        'fellow_result_status'=>'NA',
        'fellow_score'=>'0',
        'fellow_percentile'=>'0',
        'fellow_rank'=>'0',
        'year_pass'=>$iit_year_of_passing,
        'total_marks'=>'0',
        'iit_name'=>$btech_iit_name,
        'cgpa'=>$iit_cgpa,
        'fellowship_serial_no'=>'IIT Fellow',

      );

      $fellowship1=array(
        'registration_no'=>$get_reg_no,
        'fellowship_type'=>$fellowship_type_f1,
        'fellow_reg_no'=>$fellow_reg_no_f1,
        'fellow_result_status'=>$fellow_result_status_f1,
        'fellow_score'=>$fellow_score_f1,
        'fellow_percentile'=>$fellow_percentile_f1,
        'fellow_rank'=>$fellow_rank_f1,
        'exam_category'=>$exam_category_f1,
        'year_pass'=>$year_pass_f1,
        'total_marks'=>$total_marks_f1,
        'fellowship_serial_no'=>'one',
        'created_by'=>$email,
      );

      $fellowship_u1=array(
        'fellowship_type'=>$fellowship_type_f1,
        'fellow_reg_no'=>$fellow_reg_no_f1,
        'fellow_result_status'=>$fellow_result_status_f1,
        'fellow_score'=>$fellow_score_f1,
        'fellow_percentile'=>$fellow_percentile_f1,
        'fellow_rank'=>$fellow_rank_f1,
        'exam_category'=>$exam_category_f1,
        'year_pass'=>$year_pass_f1,
        'total_marks'=>$total_marks_f1,
        'fellowship_serial_no'=>'one',
        'modified_by'=>$email,
        'modified_date'=>date("H:i:s")
      );

      $fellowship2=array(
        'registration_no'=>$get_reg_no,
        'fellowship_type'=>$fellowship_type_f2,
        'fellow_reg_no'=>$fellow_reg_no_f2,
        'fellow_result_status'=>$fellow_result_status_f2,
        'fellow_score'=>$fellow_score_f2,
        'fellow_percentile'=>$fellow_percentile_f2,
        'fellow_rank'=>$fellow_rank_f2,
        'exam_category'=>$exam_category_f2,
        'year_pass'=>$year_pass_f2,
        'total_marks'=>$total_marks_f2,
        'fellowship_serial_no'=>'two',
        'created_by'=>$email,
      );

      $fellowship_u2=array(
        'fellowship_type'=>$fellowship_type_f2,
        'fellow_reg_no'=>$fellow_reg_no_f2,
        'fellow_result_status'=>$fellow_result_status_f2,
        'fellow_score'=>$fellow_score_f2,
        'fellow_percentile'=>$fellow_percentile_f2,
        'fellow_rank'=>$fellow_rank_f2,
        'exam_category'=>$exam_category_f2,
        'year_pass'=>$year_pass_f2,
        'total_marks'=>$total_marks_f2,
        'fellowship_serial_no'=>'two',
        'modified_by'=>$email,
         'modified_date'=>date("H:i:s")
      );

      $fellowship3=array(
        'registration_no'=>$get_reg_no,
        'fellowship_type'=>$fellowship_type_f3,
        'fellow_reg_no'=>$fellow_reg_no_f3,
        'fellow_result_status'=>$fellow_result_status_f3,
        'fellow_score'=>$fellow_score_f3,
        'fellow_percentile'=>$fellow_percentile_f3,
        'fellow_rank'=>$fellow_rank_f3,
        'exam_category'=>$exam_category_f3,
        'year_pass'=>$year_pass_f3,
        'total_marks'=>$total_marks_f3,
        'fellowship_serial_no'=>'three',
        'created_by'=>$email,
      );

      $fellowship_u3=array(
        'fellowship_type'=>$fellowship_type_f3,
        'fellow_reg_no'=>$fellow_reg_no_f3,
        'fellow_result_status'=>$fellow_result_status_f3,
        'fellow_score'=>$fellow_score_f3,
        'fellow_percentile'=>$fellow_percentile_f3,
        'fellow_rank'=>$fellow_rank_f3,
        'exam_category'=>$exam_category_f3,
        'year_pass'=>$year_pass_f3,
        'total_marks'=>$total_marks_f3,
        'fellowship_serial_no'=>'three',
        'modified_by'=>$email,
        'modified_date'=>date("H:i:s")
      );

      $fellowship4=array(
        'registration_no'=>$get_reg_no,
        'fellowship_type'=>$fellowship_type_f4,
        'fellowship_name'=>$fellowship_type_other,
        'fellow_reg_no'=>$fellow_reg_no_f4,
        'fellow_result_status'=>$fellow_result_status_f4,
        'fellow_score'=>$fellow_score_f4,
        'fellow_percentile'=>$fellow_percentile_f4,
        'fellow_rank'=>$fellow_rank_f4,
        'exam_category'=>$exam_category_f4,
        'year_pass'=>$year_pass_f4,
        'total_marks'=>$total_marks_f4,
        'fellowship_serial_no'=>'four',
        'created_by'=>$email,
      );

      $fellowship_u4=array(
        'fellowship_type'=>$fellowship_type_f4,
        'fellow_reg_no'=>$fellow_reg_no_f4,
        'fellowship_name'=>$fellowship_type_other,
        'fellow_result_status'=>$fellow_result_status_f4,
        'fellow_score'=>$fellow_score_f4,
        'fellow_percentile'=>$fellow_percentile_f4,
        'fellow_rank'=>$fellow_rank_f4,
        'exam_category'=>$exam_category_f4,
        'year_pass'=>$year_pass_f4,
        'total_marks'=>$total_marks_f4,
        'fellowship_serial_no'=>'four',
        'modified_by'=>$email,
        'modified_date'=>date("H:i:s")
      );

      if($percentage10=='Cgpa')
      {
        $educations_details10=array(
          'registration_no'=>$get_reg_no,
          'qual_flag'=>'N',
          'exam_type'=>'10 th',
          'exam_name'=>$name_of_exam10,
          'discipline'=>$dicipline_10,
          'institue_name'=>$Institute_exam10,
          'result_status'=>$passed10,
          'marks_perc_type'=>$percentage10,
          'mark_cgpa_percenatge'=>$ten_p_cgpa,
          'orginal_cgpa'=> $normal1,
          'out_of_cgpa'=>$out_of_cgpa1,
          'year_of_passing'=>$ten_y_pass,
          'created_by'=>$email,
        );

        $u_educations_details10=array(
          'qual_flag'=>'N',
          'exam_name'=>$name_of_exam10,
          'discipline'=>$dicipline_10,
          'institue_name'=>$Institute_exam10,
          'result_status'=>$passed10,
          'marks_perc_type'=>$percentage10,
          'mark_cgpa_percenatge'=>$ten_p_cgpa,
          'orginal_cgpa'=> $normal1,
          'out_of_cgpa'=>$out_of_cgpa1,
          'year_of_passing'=>$ten_y_pass,
          'modified_by'=>$email,
          'modified_date'=>date("H:i:s"),
        );

      }
      else
      {
        $educations_details10=array(
          'registration_no'=>$get_reg_no,
          'qual_flag'=>'N',
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
          'qual_flag'=>'N',
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

      }

      if($percentage_12=='Cgpa')
      {
        $out_of_cgpa2=$this->number_with_dot(trim($this->input->post('out_of_cgpa2')));
        $normal2=$this->number_with_dot(trim($this->input->post('normal2')));
        $educations_details12=array(
          'registration_no'=>$get_reg_no,
          'qual_flag'=>'N',
          'exam_type'=>$examtype12,
          'exam_name'=>$name_of_exam12,
          'discipline'=>$dicipline_12,
          'institue_name'=>$Institute12,
          'result_status'=>$passed_12,
          'marks_perc_type'=>$percentage_12,
          'mark_cgpa_percenatge'=>$p_cgpa_12,
          'orginal_cgpa'=> $normal2,
          'out_of_cgpa'=>$out_of_cgpa2,
          'year_of_passing'=>$y_pass_12,
          'created_by'=>$email,
        );

        $u_educations_details12=array(
          'qual_flag'=>'N',
          'exam_name'=>$name_of_exam12,
          'discipline'=>$dicipline_12,
          'institue_name'=>$Institute12,
          'result_status'=>$passed_12,
          'marks_perc_type'=>$percentage_12,
          'mark_cgpa_percenatge'=>$p_cgpa_12,
          'out_of_cgpa'=>$out_of_cgpa2,
          'year_of_passing'=>$y_pass_12,
          'year_of_passing'=>$y_pass_12,
          'created_by'=>$email,
          'modified_by'=>$email,
          'modified_date'=>date("H:i:s"),
        );

      }
      else
      {
        $educations_details12=array(
          'registration_no'=>$get_reg_no,
          'qual_flag'=>'N',
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
          'qual_flag'=>'N',
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
      }

      if($ug_percentage=='Cgpa')
      {
        $out_of_cgpa3=$this->number_with_dot(trim($this->input->post('out_of_cgpa3')));
        $normal3=$this->number_with_dot(trim($this->input->post('normal3')));
        $educations_detailug=array(
          'registration_no'=>$get_reg_no,
          'qual_flag'=>$qualifying_degreeug,
          'exam_type'=>$examtypeug,
          'discipline'=>$dicipline_ug,
          'exam_name'=>$name_of_ugexam,
          'institue_name'=>$Institute_examug,
          'result_status'=>$ug_appearing,
          'marks_perc_type'=>$ug_percentage,
          'mark_cgpa_percenatge'=>$ug_p_cgpa,
          'orginal_cgpa'=> $normal3,
          'out_of_cgpa'=>$out_of_cgpa3,
          'year_of_passing'=>$ug_y_passing,
          'created_by'=>$email,
        );

        $u_educations_detailug=array(
          'qual_flag'=>$qualifying_degreeug,
          'exam_name'=>$name_of_ugexam,
          'discipline'=>$dicipline_ug,
          'institue_name'=>$Institute_examug,
          'result_status'=>$ug_appearing,
          'marks_perc_type'=>$ug_percentage,
          'mark_cgpa_percenatge'=>$ug_p_cgpa,
          'orginal_cgpa'=> $normal3,
          'out_of_cgpa'=>$out_of_cgpa3,
          'year_of_passing'=>$ug_y_passing,
          'modified_by'=>$email,
          'modified_date'=>date("H:i:s")
        );

      }
      else
      {
        $educations_detailug=array(
          'registration_no'=>$get_reg_no,
          'qual_flag'=>$qualifying_degreeug,
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
          'qual_flag'=>$qualifying_degreeug,
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
      }

      if($pg1_percentage=='Cgpa')
      {

        $educations_detailspg1=array(
          'registration_no'=>$get_reg_no,
          'qual_flag'=>$qualifying_degreepg1,
          'exam_type'=>'PG1 Exam',
          'discipline'=>$dicipline_pg1,
          'exam_name'=>$name_of_pg1exam,
          'institue_name'=>$Institute_exampg1,
          'result_status'=>$pg1_appearing,
          'marks_perc_type'=>$pg1_percentage,
          'mark_cgpa_percenatge'=>$pg1_p_cgpa,
          'orginal_cgpa'=> $normal4,
          'out_of_cgpa'=>$out_of_cgpa4,
          'year_of_passing'=>$pg1_y_passing,
          'created_by'=>$email,
        );

        $u_educations_detailspg1=array(
          'qual_flag'=>$qualifying_degreepg1,
          'exam_type'=>'PG1 Exam',
          'discipline'=>$dicipline_pg1,
          'exam_name'=>$name_of_pg1exam,
          'institue_name'=>$Institute_exampg1,
          'result_status'=>$pg1_appearing,
          'marks_perc_type'=>$pg1_percentage,
          'mark_cgpa_percenatge'=>$pg1_p_cgpa,
          'orginal_cgpa'=> $normal4,
          'out_of_cgpa'=>$out_of_cgpa4,
          'year_of_passing'=>$pg1_y_passing,
          'modified_by'=>$email,
          'modified_date'=>date("H:i:s")
        );

      }
      else
      {
        $educations_detailspg1=array(
          'registration_no'=>$get_reg_no,
          'qual_flag'=>$qualifying_degreepg1,
          'exam_type'=>'PG1 Exam',
          'discipline'=>$dicipline_pg1,
          'exam_name'=>$name_of_pg1exam,
          'institue_name'=>$Institute_exampg1,
          'result_status'=>$pg1_appearing,
          'marks_perc_type'=>$pg1_percentage,
          'mark_cgpa_percenatge'=>$pg1_p_cgpa,
          'year_of_passing'=>$pg1_y_passing,
          'created_by'=>$email,
        );

        $u_educations_detailspg1=array(
          'qual_flag'=>$qualifying_degreepg1,
          'exam_type'=>'PG1 Exam',
          'discipline'=>$dicipline_pg1,
          'exam_name'=>$name_of_pg1exam,
          'institue_name'=>$Institute_exampg1,
          'result_status'=>$pg1_appearing,
          'marks_perc_type'=>$pg1_percentage,
          'mark_cgpa_percenatge'=>$pg1_p_cgpa,
          'year_of_passing'=>$pg1_y_passing,
          'modified_by'=>$email,
          'modified_date'=>date("H:i:s")
        );
      }

      if($pg2_percentage=='Cgpa')
      {

        $educations_detailspg2=array(
          'registration_no'=>$get_reg_no,
          'qual_flag'=>$qualifying_degreepg2,
          'exam_type'=>'PG2 Exam',
          'discipline'=>$dicipline_pg2,
          'exam_name'=>$name_of_pg2exam,
          'institue_name'=>$Institute_exampg2,
          'result_status'=>$pg2_appearing,
          'marks_perc_type'=>$pg2_percentage,
          'mark_cgpa_percenatge'=>$pg2_p_cgpa,
          'orginal_cgpa'=> $normal5,
          'out_of_cgpa'=>$out_of_cgpa5,
          'year_of_passing'=>$pg2_y_passing,
          'created_by'=>$email,
        );

        $u_educations_detailspg2=array(
          'qual_flag'=>$qualifying_degreepg2,
          'exam_type'=>'PG2 Exam',
          'discipline'=>$dicipline_pg2,
          'exam_name'=>$name_of_pg2exam,
          'institue_name'=>$Institute_exampg2,
          'result_status'=>$pg2_appearing,
          'marks_perc_type'=>$pg2_percentage,
          'mark_cgpa_percenatge'=>$pg2_p_cgpa,
          'orginal_cgpa'=> $normal5,
          'out_of_cgpa'=>$out_of_cgpa5,
          'year_of_passing'=>$pg2_y_passing,
          'modified_by'=>$email,
          'modified_date'=>date("H:i:s")
        );

      }
      else
      {
        $educations_detailspg2=array(
          'registration_no'=>$get_reg_no,
          'qual_flag'=>$qualifying_degreepg2,
          'exam_type'=>'PG2 Exam',
          'discipline'=>$dicipline_pg2,
          'exam_name'=>$name_of_pg2exam,
          'institue_name'=>$Institute_exampg2,
          'result_status'=>$pg2_appearing,
          'marks_perc_type'=>$pg2_percentage,
          'mark_cgpa_percenatge'=>$pg2_p_cgpa,
          'year_of_passing'=>$pg2_y_passing,
          'created_by'=>$email,
        );

        $u_educations_detailspg2=array(
          'qual_flag'=>$qualifying_degreepg2,
          'exam_type'=>'PG2 Exam',
          'discipline'=>$dicipline_pg2,
          'exam_name'=>$name_of_pg2exam,
          'institue_name'=>$Institute_exampg2,
          'result_status'=>$pg2_appearing,
          'marks_perc_type'=>$pg2_percentage,
          'mark_cgpa_percenatge'=>$pg2_p_cgpa,
          'year_of_passing'=>$pg2_y_passing,
          'modified_by'=>$email,
          'modified_date'=>date("H:i:s")
        );
      }


      $tab=array(
        'tab2'=>2,
      );

      $qualrow=$this->Adm_phdpt_personal_details_model->get_qual_row($get_reg_no);
      if($qualrow)
      {
         //data will update
         // exit;
         $cond=array(
          'registration_no' =>$get_reg_no,
          'exam_type' =>'PG Exam',
          );

          $check_null_fellow1='';
          $check_null_fellow2='';
          $check_null_fellow3='';
          $check_null_fellow4='';

          $check_null_qualification1='';
          $check_null_qualification2='';
          $check_null_qualification3='';
          $check_null_qualification4='';
          $check_null_qualification5='';

          foreach ($fellowship_u1 as $value) {
            if($value=='')
            {
              $check_null_fellow1='Yes';
            }

          }

          foreach ($fellowship_u2 as $value){
            if($value=='')
            {
              $check_null_fellow2='Yes';
            }

          }

          foreach ($fellowship_u3 as $value) {
            if($value=='')
            {
              $check_null_fellow3='Yes';
            }

          }

          foreach ($fellowship_u4 as $value) {
            if($value=='')
            {
              $check_null_fellow4='Yes';
            }

          }

          foreach ($u_educations_details10 as $value) {
            if($value=='')
            {
              $check_null_qualification1='Yes';
            }

          }

          foreach ($u_educations_details12 as $value) {
            if($value=='')
            {
              $check_null_qualification2='Yes';
            }

          }

          foreach ($u_educations_detailug as $value) {
            if($value=='')
            {
              $check_null_qualification3='Yes';
            }

          }

          foreach ($u_educations_detailspg1 as $value) {
            if($value=='')
            {
              $check_null_qualification4='Yes';
            }

          }

          foreach ($u_educations_detailspg2 as $value) {
            if($value=='')
            {
              $check_null_qualification5='Yes';
            }

          }



          $this->db->trans_start();
          $this->load->model('admission/phdpt/Adm_phdpt_personal_details_model');

          if ($cfti_nirf_flag == 'Y') {

            $data_cfti_nirf = array(
               'cfti_nirf_flag' => $this->input->post('cfti_nirf_flag'),
               'cfti_name_of_institute' => $this->input->post('cfti_name_of_institute'),
               'cfti_nirf_cgpa' => $this->input->post('cfti_nirf_cgpa'),
               'cfti_year_of_passing' => $this->input->post('cfti_year_of_passing'),
               'overall_nirf_rank_curr_yr' => $this->input->post('overall_nirf_rank_curr_yr'),
               'overall_nirf_rank_pre_yr' => $this->input->post('overall_nirf_rank_pre_yr'),
               'eng_nirf_rank_pre_yr' => $this->input->post('eng_nirf_rank_pre_yr'),
               'eng_nirf_rank_curr_yr' => $this->input->post('eng_nirf_rank_curr_yr'),
               'cfti_nirf_curr_yr' => date('Y'),
               'cfti_nirf_pre_yr' => date('Y') - 1
            );
          }
          else{

            $data_cfti_nirf = array(
              'cfti_nirf_flag' => $this->input->post('cfti_nirf_flag'),
              'cfti_name_of_institute' => '',
              'cfti_nirf_cgpa' => '',
              'cfti_year_of_passing' => '',
              'overall_nirf_rank_curr_yr' => '',
              'overall_nirf_rank_pre_yr' => '',
              'eng_nirf_rank_pre_yr' => '',
              'eng_nirf_rank_curr_yr' => '',
              'cfti_nirf_curr_yr' => '',
              'cfti_nirf_pre_yr' => ''
           );
          }

          //$have_cfti = $this->Adm_phd_personal_details_model->check_cfti_flag_details($get_reg_no,'Y');

          $this->Adm_phdpt_personal_details_model->update_nirf_cfti_details($data_cfti_nirf,$get_reg_no,'Y');
         // enter nirf details here //
          if($btech_cgpa=='Y') //case for iit and fill the fellowship row
          {
            if(empty($check_null_fellow1))
            {
               $cond=array(
                'registration_no' =>$get_reg_no,
                'fellowship_serial_no' =>'one',
                );

               $have=$this->Adm_phdpt_personal_details_model->check_phd_fello_row($get_reg_no,'one');
               if($have)
               {
                 $this->Adm_phdpt_personal_details_model->update_phd_fello_details($fellowship_u1,$get_reg_no,'one');
               }
               else // else insert row if added
               {
                 $this->Adm_phdpt_personal_details_model->insert_phd_fello_details($fellowship1);
               }

            }

          }
          else
          {
               $have=$this->Adm_phdpt_personal_details_model->check_phd_fello_row($get_reg_no,'one');
               if($have)
               {
                 $this->Adm_phdpt_personal_details_model->update_phd_fello_details($fellowship_u1,$get_reg_no,'one');
               }
               else // else insert row if added
               {
                 $this->Adm_phdpt_personal_details_model->insert_phd_fello_details($fellowship1);
               }


          }


          if(empty($check_null_fellow2))
          {
               $have=$this->Adm_phdpt_personal_details_model->check_phd_fello_row($get_reg_no,'two');
               if($have)
               {
                $this->Adm_phdpt_personal_details_model->update_phd_fello_details($fellowship_u2,$get_reg_no,'two');
               }
               else // else insert row if added
               {
                 $this->Adm_phdpt_personal_details_model->insert_phd_fello_details($fellowship2);
               }

          }

          if(empty($check_null_fellow3))
          {
            $have=$this->Adm_phdpt_personal_details_model->check_phd_fello_row($get_reg_no,'three');
            if($have)
            {
              $this->Adm_phdpt_personal_details_model->update_phd_fello_details($fellowship_u3,$get_reg_no,'three');
            }
            else // else insert row if added
            {
              $this->Adm_phdpt_personal_details_model->insert_phd_fello_details($fellowship3);
            }

          }

          if(empty($check_null_fellow4))
          {
            $have=$this->Adm_phdpt_personal_details_model->check_phd_fello_row($get_reg_no,'four');
            if($have)
            {
              $this->Adm_phdpt_personal_details_model->update_phd_fello_details($fellowship_u4,$get_reg_no,'four');
            }
            else // else insert row if added
            {
              $this->Adm_phdpt_personal_details_model->insert_phd_fello_details($fellowship4);
            }

          }

          if($btech_cgpa=='Y')
          {
            $have=$this->Adm_phdpt_personal_details_model->check_phd_fello_row($get_reg_no,'IIT Fellow');
            // echo $this->db->last_query();
            // exit;
            if($have)
            {
              $this->Adm_phdpt_personal_details_model->update_phd_fello_details($fellowship_u_iit,$get_reg_no,'IIT Fellow');
            }
            else // else insert row if added
            {
              $this->Adm_phdpt_personal_details_model->insert_phd_fello_details($fellowship_iit);
            }


          }

          $this->Adm_phdpt_personal_details_model->update_personal_deatils($personal_details_iit,$get_reg_no);
          // echo $this->db->last_query();
          //   exit;
          $this->Adm_phdpt_personal_details_model->update_qualification($u_educations_details10,$get_reg_no,'10 th');
          $this->Adm_phdpt_personal_details_model->update_qualification($u_educations_details12,$get_reg_no,'12 th');
          $this->Adm_phdpt_personal_details_model->update_qualification($u_educations_detailug,$get_reg_no,'UG Exam');

          if(empty($check_null_qualification4))
          {
            $have=$this->Adm_phdpt_personal_details_model->check_qualification_row($get_reg_no,'PG1 Exam');
            if($have)
            {
              $this->Adm_phdpt_personal_details_model->update_qualification($u_educations_detailspg1,$get_reg_no,'PG1 Exam');
            }
            else // else insert row if added
            {
              $this->Adm_phdpt_personal_details_model->insert_qualification($educations_detailspg1);
            }

          }

          if(empty($check_null_qualification5))
          {
            $have=$this->Adm_phdpt_personal_details_model->check_qualification_row($get_reg_no,'PG2 Exam');
            if($have)
            {
              $this->Adm_phdpt_personal_details_model->update_qualification($u_educations_detailspg2,$get_reg_no,'PG2 Exam');
            }
            else // else insert row if added
            {
              $this->Adm_phdpt_personal_details_model->insert_qualification($educations_detailspg2);
            }

          }


          // echo "reach here update";
          // exit;
          $this->db->trans_complete();
          //  $false=2;
          if ($this->db->trans_status() === FALSE)
          //  if($false==3)
          {
            $this->session->set_flashdata('error_educationa','Internal Network error occured error code E102');
            redirect('admission/phdpt/Adm_phdpt_personal_details');

          }
          else
          {

            $this->session->set_userdata('work_experience','work_experience');
            $this->session->unset_userdata('education');
            $this->session->set_flashdata('apply_success_education','You have succesfully Edited');
            redirect('admission/phdpt/Adm_phdpt_personal_details');

          }
      }
      else
      {

        //data will insert
        $this->load->model('admission/phdpt/Adm_phdpt_personal_details_model');
        //  $this->db->trans_start();

        $check_null_fellow1='';
        $check_null_fellow2='';
        $check_null_fellow3='';
        $check_null_fellow4='';

        $check_null_qualification1='';
        $check_null_qualification2='';
        $check_null_qualification3='';
        $check_null_qualification4='';
        $check_null_qualification5='';

        foreach ($fellowship1 as $value) {
          if($value=='')
          {
            $check_null_fellow1='Yes';
          }

        }

        foreach ($fellowship2 as $value){
          if($value=='')
          {
            $check_null_fellow2='Yes';
          }

        }

        foreach ($fellowship3 as $value) {
          if($value=='')
          {
            $check_null_fellow3='Yes';
          }

        }

        foreach ($fellowship4 as $value) {
          if($value=='')
          {
            $check_null_fellow4='Yes';
          }

        }

        foreach ($u_educations_details10 as $value) {
          if($value=='')
          {
            $check_null_qualification1='Yes';
          }

        }

        foreach ($u_educations_details12 as $value) {
          if($value=='')
          {
            $check_null_qualification2='Yes';
          }

        }

        foreach ($u_educations_detailug as $value) {
          if($value=='')
          {
            $check_null_qualification3='Yes';
          }

        }

        foreach ($u_educations_detailspg1 as $value) {
          if($value=='')
          {
            $check_null_qualification4='Yes';
          }

        }

        foreach ($u_educations_detailspg2 as $value) {
          if($value=='')
          {
            $check_null_qualification5='Yes';
          }

        }

        $this->Adm_phdpt_personal_details_model->update_personal_deatils($personal_details_iit,$get_reg_no);

        if ($cfti_nirf_flag == 'Y') {

          $data_cfti_nirf = array(
             'cfti_nirf_flag' => $this->input->post('cfti_nirf_flag'),
             'cfti_name_of_institute' => $this->input->post('cfti_name_of_institute'),
             'cfti_nirf_cgpa' => $this->input->post('cfti_nirf_cgpa'),
             'cfti_year_of_passing' => $this->input->post('cfti_year_of_passing'),
             'overall_nirf_rank_curr_yr' => $this->input->post('overall_nirf_rank_curr_yr'),
             'overall_nirf_rank_pre_yr' => $this->input->post('overall_nirf_rank_pre_yr'),
             'eng_nirf_rank_pre_yr' => $this->input->post('eng_nirf_rank_pre_yr'),
             'eng_nirf_rank_curr_yr' => $this->input->post('eng_nirf_rank_curr_yr'),
             'cfti_nirf_curr_yr' => date('Y'),
             'cfti_nirf_pre_yr' => date('Y') - 1
          );
        }
        else{

          $data_cfti_nirf = array(
            'cfti_nirf_flag' => $this->input->post('cfti_nirf_flag'),
            'cfti_name_of_institute' => '',
            'cfti_nirf_cgpa' => '',
            'cfti_year_of_passing' => '',
            'overall_nirf_rank_curr_yr' => '',
            'overall_nirf_rank_pre_yr' => '',
            'eng_nirf_rank_pre_yr' => '',
            'eng_nirf_rank_curr_yr' => '',
            'cfti_nirf_curr_yr' => '',
            'cfti_nirf_pre_yr' => ''
         );
        }


        //$have_cfti = $this->Adm_phd_personal_details_model->check_cfti_flag_details($get_reg_no,'Y');

        $this->Adm_phdpt_personal_details_model->update_nirf_cfti_details($data_cfti_nirf,$get_reg_no,'Y');

        if($btech_cgpa=='Y')
        {
          if(empty($check_null_fellow1))
          {
            $this->Adm_phdpt_personal_details_model->insert_phd_fello_details($fellowship1);
          }

        }
        else
        {
          $this->Adm_phdpt_personal_details_model->insert_phd_fello_details($fellowship1);
        }

        if(empty($check_null_fellow2))
        {
          $this->Adm_phdpt_personal_details_model->insert_phd_fello_details($fellowship2);
        }

        if(empty($check_null_fellow3))
        {
          $this->Adm_phdpt_personal_details_model->insert_phd_fello_details($fellowship3);
        }

        if(empty($check_null_fellow4))
        {
          $this->Adm_phdpt_personal_details_model->insert_phd_fello_details($fellowship4);
        }

        if($btech_cgpa=='Y')
        {
          $this->Adm_phdpt_personal_details_model->insert_phd_fello_details($fellowship_iit);
        }


        // echo $this->db->last_query();
        // exit;
        $this->Adm_phdpt_personal_details_model->insert_qualification($educations_details10);
        $this->Adm_phdpt_personal_details_model->insert_qualification($educations_details12);
        $this->Adm_phdpt_personal_details_model->insert_qualification($educations_detailug);

        if(empty($check_null_qualification4))
        {
          $this->Adm_phdpt_personal_details_model->insert_qualification($educations_detailspg1);
        }

        if(empty($check_null_qualification5))
        {
          $this->Adm_phdpt_personal_details_model->insert_qualification($educations_detailspg2);
        }

        $this->Adm_phdpt_personal_details_model->update_tab1($tab,$get_reg_no);


        // echo "reach here insert";
        // exit;
        $this->db->trans_complete();
        // $false=1;
        if ($this->db->trans_status() === FALSE)
        // if($false==3)
        {

          $this->session->set_flashdata('error_educationa','Internal Network error occured error code E102');
          redirect('admission/phdpt/Adm_phdpt_personal_details');

        }
        else
        {
          $this->session->set_userdata('work_experience','work_experience');
          $this->session->unset_userdata('education');
          $this->session->set_flashdata('apply_success_education','You succesfully added Please fill work experience details');
          $data['val']="H";
          $data['tab']="work_experience";
          $data['work_experince']="work_experince";
          redirect('admission/phdpt/Adm_phdpt_personal_details');
          $this->adm_phdpt_header($data);
          $this->load->view('admission/phdpt/adm_phdpt_application',$data);
          $this->adm_phdpt_footer();
        }

      }


    }
    else
    {
      // echo validation_errors();
      // exit;
      $email=$this->session->userdata('email');
      $data['registration_detail']=$this->Add_phdpt_registration_model->get_registration_detail_by_email($email);
      $get_reg_no=$this->Add_phdpt_registration_model->get_registration_no_by_email($email);
      $data['application_details']=$this->Adm_phdpt_personal_details_model->get_adm_phd_reg_appl_program($get_reg_no);
      $data['application_details_ms']=$this->Adm_phdpt_personal_details_model->get_adm_phd_appl_ms($get_reg_no);
      $data['qual12_details']=$this->Adm_phdpt_personal_details_model->get_qualification12_details($get_reg_no);
      $data['qual10_details']=$this->Adm_phdpt_personal_details_model->get_qualification10_details($get_reg_no);
      $data['qualug_details']=$this->Adm_phdpt_personal_details_model->get_qualificationug_details($get_reg_no);
      $data['qualpg1_details']=$this->Adm_phdpt_personal_details_model->get_qualificationpg1_details($get_reg_no);
      $data['qualpg2_details']=$this->Adm_phdpt_personal_details_model->get_qualificationpg2_details($get_reg_no);
      $data['phd_fello_details1']=$this->Adm_phdpt_personal_details_model->get_phd_fello_score_details_one($get_reg_no);
      $data['phd_fello_details2']=$this->Adm_phdpt_personal_details_model->get_phd_fello_score_details_two($get_reg_no);
      $data['phd_fello_details3']=$this->Adm_phdpt_personal_details_model->get_phd_fello_score_details_three($get_reg_no);
      $data['phd_fello_details4']=$this->Adm_phdpt_personal_details_model->get_phd_fello_score_details_four($get_reg_no);
      $data['phd_fello_details_iit']=$this->Adm_phdpt_personal_details_model->get_phd_fello_score_details_iit($get_reg_no);
      $data['full_partime']=$this->Add_phdpt_registration_model->get_candidate_type_by_email($email);
      //base on conditon of prj ,AI ,EXT fecth dropdown
      $data['fellowship_type_list']=$this->Adm_phdpt_personal_details_model->get_fellowship_list($data['application_details_ms'][0]['assistance_type'],$get_reg_no);

      $data['betchiit']=$data['application_details_ms'][0]['betch_iit'];

      $data['exp_details']=$this->Adm_phdpt_personal_details_model->get_expreince_details($get_reg_no);

      $data['exp_details_d']=$this->Adm_phdpt_personal_details_model->get_expreince_details_dynamic($get_reg_no);

      // $data['cat_details']=$this->Adm_phd_personal_details_model->get_cat_score_details($get_reg_no);

      $data['iit_details']=$this->Adm_phdpt_personal_details_model->get_iitname_details();
      $data['p_addr_details']=$this->Adm_phdpt_personal_details_model->get_p_address_details($get_reg_no);

      $data['c_addr_details']=$this->Adm_phdpt_personal_details_model->get_c_address_details($get_reg_no);
      $data['state']=$this->Adm_phdpt_personal_details_model->get_state();
      $data['tab']="education";
      $this->session->set_userdata('education','education');
      $data['val']="H";
      $data['qualification']="qualification";
      $this->adm_phdpt_header($data);
      $this->load->view('admission/phdpt/adm_phdpt_application',$data);
      $this->adm_phdpt_footer();
    }
    // phd function edn
  }

  public function get_work_experience_detail()
  {
    if(!($this->session->has_userdata('email')))
    {
      redirect('phdpt/Add_phdpt/adm_phdpt_login');
    }





    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_phdpt_registration_model->get_registration_no_by_email($email);
    $work_exp=$this->clean($this->input->post('work_exp'));
    // $work_exp_total=$this->number_only(trim($this->input->post('sum_of_month')));
    $work_exp_total=$this->input->post('sum_of_month');
    $work_exp_total_details = $this->input->post('year').'|'.$this->input->post('month').'|'.$this->input->post('day');
    $degination1=$this->clean($this->input->post('degination1'));
    $organization1=$this->clean(trim($this->input->post('organization1')));
    // $nature_of_work1=$this->clean(trim($this->input->post('nature_of_work1')));
    // $duration1=$this->number_only(trim($this->input->post('duration1')));
    $start_date1 = $this->input->post('start_date1');
    $end_date1 = $this->input->post('end_date1');
    $duration1 = $this->input->post('duration1');
    // $sector1=$this->input->post('sector1');


    $degination=$this->clean($this->input->post('degination')); //dynamic row insert
    $organization=$this->input->post('organization');
    $nature_of_work=$this->input->post('nature_of_work');
    $duration=$this->input->post('duration');
    $duration_in_monthd=$this->input->post('duration_in_monthd');
    $sector=$this->input->post('sector');
    $start_date = $this->input->post('start_date');
    $end_date = $this->input->post('end_date');

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
      $this->Adm_phdpt_personal_details_model->update_tab1($tab,$get_reg_no);
      $this->Adm_phdpt_personal_details_model->delete_all_work_experince($get_reg_no);
      $this->Adm_phdpt_personal_details_model->update_personal_deatils($personal_dteails,$get_reg_no);

      $this->db->trans_complete();
      if ($this->db->trans_status() === FALSE)
      {
        $this->session->set_flashdata('experror','Internal Network error occured error code W101');
        redirect('admission/phdpt/Adm_phdpt_personal_details');

      }
      else
      {
        redirect('admission/phdpt/Adm_phdpt_personal_details');
        exit;
      }


    }



    $this->form_validation->set_rules('degination1','Designation','required|xss_clean');
    $this->form_validation->set_rules('organization1','Organization','required|xss_clean');
    // $this->form_validation->set_rules('nature_of_work1','Nature of work','required');
    $this->form_validation->set_rules('duration1','Duration','required|xss_clean');
    // $this->form_validation->set_rules('sector1','Sector','required|xss_clean');

    $email=$this->session->userdata('email');
    if ($this->form_validation->run() == true)
    {

      // $work_exp_total=4;
      $work_exp_row1=array(
        'registration_no'=>$get_reg_no,
        'designation_no'=>$degination1,
        'designation_organistion'=>$organization1,
        'nature_of_work'=>$nature_of_work1,
        // 'duration_in_month'=>$duration1,
        'duration'=>$duration1,
        'start_date'=>$start_date1,
        'end_date'=>$end_date1,
        'duration'=>$duration1,
        'tot_duration_details'=>$this->input->post('year1').'|'.$this->input->post('month1').'|'.$this->input->post('day1'),
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
          'start_date' => $start_date[$i],
          'end_date' => $end_date[$i],
          // 'nature_of_work'=>$this->clean($nature_of_work[$i]),
          // 'duration_in_month'=>$this->number_only($duration_in_monthd[$i]),
          'duration'=>$duration_in_monthd[$i],
          'tot_duration_details'=>$_POST['year_d'][$i].'|'.$_POST['month_d'][$i].'|'.$_POST['day_d'][$i],
          // 'sector'=>$this->clean($sector[$i]),
          'created_by'=>$email
         ];

        }
        for($i=0; $i<count($degination); $i++)
        {
        $data_total_exp_d[] = array(
          'registration_no'=> $get_reg_no,
          'year'=> $year[$i],
          'month'=> $month[$i],
          'day'=> $day[$i],
          'created_by'=> $email
        );
        }
      }


      $personal_dteails=array(
        'work_expreince'=> $work_exp,
        'total_work_experience'=>$work_exp_total,
        'tot_wrk_details' => $work_exp_total_details
      );


      $workexprow=$this->Adm_phdpt_personal_details_model->get_work_exp_row($get_reg_no);
      if(empty($workexprow))
      {
        $this->db->trans_start();
        $this->Adm_phdpt_personal_details_model->insert_work_experince($work_exp_row1);
        // echo $this->db->last_query().'<br>';
        if(!empty($degination))
        {
          foreach ($datab as $val) {
            // if($val['designation_no']=='' || $val['designation_organistion']==''  || $val['duration_in_month']=='')
            if($val['designation_no']=='' || $val['designation_organistion']==''  || $val['duration']=='')
            {

              $this->session->set_flashdata('experror','Input field is blank in dyanmic created Work experince details please fill all field');
              redirect('admission/phdpt/Adm_phdpt_personal_details');
              break;
            }
          }
          $this->Adm_phdpt_personal_details_model->insert_work_experince_batch($datab);
          // echo $this->db->last_query().'<br>';
        }

        $this->Adm_phdpt_personal_details_model->update_personal_deatils($personal_dteails,$get_reg_no);
        // echo $this->db->last_query().'<br>';
        // $this->Adm_phdpt_personal_details_model->insert_work_experince($work_exp_row1);

        $this->Adm_phdpt_personal_details_model->update_tab1($tab,$get_reg_no);
        // echo $this->db->last_query().'<br>';
        // exit;
        $this->db->trans_complete();
        // $false=2;
        if ($this->db->trans_status() === FALSE)
        // if($false==3)
        {
          $this->session->set_flashdata('experror','Internal Network error occured error code W102');
          redirect('admission/phdpt/Adm_phdpt_personal_details');

        }
        else
        {
          redirect('admission/phdpt/Adm_phdpt_personal_details');
        }

      }
      if(!empty($workexprow))
      {

        // $this->db->trans_start();
        $this->Adm_phdpt_personal_details_model->delete_all_work_experince($get_reg_no);
        $this->Adm_phdpt_personal_details_model->delete_total_work_experince_details($get_reg_no);
        // echo $this->db->last_query();
        // exit;

        $this->Adm_phdpt_personal_details_model->insert_work_experince($work_exp_row1);
        if(!empty($degination))
        {
          foreach ($datab as $val) {
            // if($val['designation_no']=='' || $val['designation_organistion']=='' || $val['duration_in_month']=='')
            if($val['designation_no']=='' || $val['designation_organistion']=='' || $val['duration']=='')
            {

              $this->session->set_flashdata('experror','Input field is blank in dyanmic created Work experince  please fill all field');
              redirect('admission/phdpt/Adm_phdpt_personal_details');
              break;
            }
          }
          $this->Adm_phdpt_personal_details_model->insert_work_experince_batch($datab);
        }

        $this->Adm_phdpt_personal_details_model->update_personal_deatils($personal_dteails,$get_reg_no);
        $this->Adm_phdpt_personal_details_model->update_tab1($tab,$get_reg_no);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
        // $rum=1;
        // if($rum==2)
        {
          $this->session->set_flashdata('experror','Internal Network error occured error code W103');
          redirect('admission/phdpt/Adm_phdpt_personal_details');

        }
        else
        {
          redirect('admission/phdpt/Adm_phdpt_personal_details');
        }

      }

    }

    else
    {

      $data['registration_detail']=$this->Add_phdpt_registration_model->get_registration_detail_by_email($email);
      $get_reg_no=$this->Add_phdpt_registration_model->get_registration_no_by_email($email);
      $data['application_details']=$this->Adm_phdpt_personal_details_model->get_adm_phd_reg_appl_program($get_reg_no);
      $data['application_details_ms']=$this->Adm_phdpt_personal_details_model->get_adm_phd_appl_ms($get_reg_no);
      $data['qual12_details']=$this->Adm_phdpt_personal_details_model->get_qualification12_details($get_reg_no);
      $data['qual10_details']=$this->Adm_phdpt_personal_details_model->get_qualification10_details($get_reg_no);
      $data['qualug_details']=$this->Adm_phdpt_personal_details_model->get_qualificationug_details($get_reg_no);

      $data['betchiit']=$data['application_details_ms'][0]['betch_iit'];
      $data['exp_details']=$this->Adm_phdpt_personal_details_model->get_expreince_details($get_reg_no);
      $data['exp_details_d']=$this->Adm_phdpt_personal_details_model->get_expreince_details_dynamic($get_reg_no);
      $data['cat_details']=$this->Adm_phdpt_personal_details_model->get_cat_score_details($get_reg_no);
      $data['iit_details']=$this->Adm_phdpt_personal_details_model->get_iitname_details();
      $data['p_addr_details']=$this->Adm_phdpt_personal_details_model->get_p_address_details($get_reg_no);
      $data['c_addr_details']=$this->Adm_phdpt_personal_details_model->get_c_address_details($get_reg_no);
      $data['fellowship_type_list']=$this->Adm_phdpt_personal_details_model->get_fellowship_list($data['application_details_ms'][0]['assistance_type'],$get_reg_no);
      $data['state']=$this->Adm_phdpt_personal_details_model->get_state();
      $this->session->set_userdata('work_experience','work_experience');
      $data['val']="H";
      $data['tab']="work_experience";
      $data['open_work_experince']="work_experince";
      $this->adm_phdpt_header($data);
      $this->load->view('admission/phdpt/adm_phdpt_application',$data);
      $this->adm_phdpt_footer();

    }

  }

  public function final_submission()
  {

    $email=$this->session->userdata('email');

    if(!($this->session->has_userdata('login_type')))
    {
      redirect('admission/phdpt/Add_phdpt/adm_phdpt_login');
    }
    // if(!($this->session->has_userdata('applied')))
    // {
    //    redirect('admission/phd/Add_phd/adm_phd_login');
    // }

    $get_reg_no=$this->Add_phdpt_registration_model->get_registration_no_by_email($email);
    $work_exp=trim($this->input->post('work_exp'));
    // $work_exp_total=$this->number_only(trim($this->input->post('sum_of_month')));
    $work_exp_total=$this->input->post('sum_of_month');
    $work_exp_total_details = $this->input->post('year').'|'.$this->input->post('month').'|'.$this->input->post('day');
    $degination1=$this->clean($this->input->post('degination1'));
    $organization1=$this->clean(trim($this->input->post('organization1')));
    // $nature_of_work1=$this->clean(trim($this->input->post('nature_of_work1')));
    // $duration1=$this->number_only(trim($this->input->post('duration1')));
    $start_date1 = $this->input->post('start_date1');
    $end_date1 = $this->input->post('end_date1');
    $duration1 = $this->input->post('duration1');


    $degination=$this->clean($this->input->post('degination')); //dynamic row insert
    $organization=$this->input->post('organization');
    $duration=$this->input->post('duration');
    $duration_in_monthd=$this->input->post('duration_in_monthd');
    $start_date = $this->input->post('start_date');
    $end_date = $this->input->post('end_date');


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
      $this->Adm_phdpt_personal_details_model->delete_all_work_experince($get_reg_no);
      $this->Adm_phdpt_personal_details_model->update_tab1($tab,$get_reg_no);
      $this->Adm_phdpt_personal_details_model->update_personal_deatils($personal_dteails,$get_reg_no);
      $this->db->trans_complete();
      if ($this->db->trans_status() === FALSE)
      {
        $this->session->set_flashdata('experror','Internal Network error occured error code W101');
        redirect('admission/phdpt/Adm_phdpt_personal_details');

      }
      else
      {
        $this->session->set_userdata('doc_start','doc_start');
        $this->session->unset_userdata('applied');
        redirect('admission/phdpt/Adm_phdpt_document');
      }
    }

    $this->form_validation->set_rules('degination1','Designation','required|xss_clean');
    $this->form_validation->set_rules('organization1','Organization','required|xss_clean');

    $this->form_validation->set_rules('duration1','Duration(in month)','required|xss_clean');

    $email=$this->session->userdata('email');
    if ($this->form_validation->run() == true)
    {

      // $work_exp_total=4;
      $work_exp_row1=array(
        'registration_no'=>$get_reg_no,
        'designation_no'=>$degination1,
        'designation_organistion'=>$organization1,
        'nature_of_work'=>$nature_of_work1,
        'start_date'=>$start_date1,
        'end_date'=>$end_date1,
        // 'nature_of_work'=>$nature_of_work1,
        'duration'=>$duration1,
        // 'sector'=>$sector1,
        'tot_duration_details'=>$this->input->post('year1').'|'.$this->input->post('month1').'|'.$this->input->post('day1'),
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
            'start_date' => $start_date[$i],
            'end_date' => $end_date[$i],
            // 'nature_of_work'=>$this->clean($nature_of_work[$i]),
            'duration'=>$duration_in_monthd[$i],
            'tot_duration_details'=>$_POST['year_d'][$i].'|'.$_POST['month_d'][$i].'|'.$_POST['day_d'][$i],
            // 'sector'=>$this->clean($sector[$i]),
            'created_by'=>$email
          ];

        }
      }
      $personal_dteails=array(
        'work_expreince'=> $work_exp,
        'total_work_experience'=>$work_exp_total,
        'tot_wrk_details' => $work_exp_total_details
      );
      $workexprow=$this->Adm_phdpt_personal_details_model->get_work_exp_row($get_reg_no);
      if(!empty($workexprow))
      {
        $this->db->trans_start();
        $this->Adm_phdpt_personal_details_model->delete_all_work_experince($get_reg_no);
        $this->Adm_phdpt_personal_details_model->delete_total_work_experince_details($get_reg_no);
        $this->Adm_phdpt_personal_details_model->insert_work_experince($work_exp_row1);
        if(!empty($degination))
        {
          foreach ($datab as $val) {
            // if($val['designation_no']=='' || $val['designation_organistion']=='' || $val['duration_in_month']=='')
            if($val['designation_no']=='' || $val['designation_organistion']=='' || $val['duration']=='')
            {

              $this->session->set_flashdata('experror','Input field is blank in dyanmic created Work experince details please fill all field');
              redirect('admission/phdpt/Adm_phdpt_personal_details');
              break;
            }
          }
          $this->Adm_phdpt_personal_details_model->insert_work_experince_batch($datab);
        }


        $this->Adm_phdpt_personal_details_model->update_personal_deatils($personal_dteails,$get_reg_no);

        $this->Adm_phdpt_personal_details_model->update_tab1($tab,$get_reg_no);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
        {
          $this->session->set_flashdata('experror','Internal Network error occured error code F102');
          redirect('admission/phdpt/Adm_phdpt_personal_details');

        }
        else
        {
          // redirect('admission/Adm_phd_personal_details');
          $this->session->set_userdata('doc_start','doc_start');
          $this->session->unset_userdata('applied');
          redirect('admission/phdpt/Adm_phdpt_document');
        }


      }
      if(empty($workexprow))
      {
        $this->db->trans_start();
        $this->Adm_phdpt_personal_details_model->insert_work_experince($work_exp_row1);
        if(!empty($degination))
        {
          foreach ($datab as $val) {
            // if($val['designation_no']=='' || $val['designation_organistion']=='' ||  $val['duration_in_month']=='')
            if($val['designation_no']=='' || $val['designation_organistion']=='' ||  $val['duration']=='')
            {

              $this->session->set_flashdata('experror','Input field is blank in dyanmic created Work experince details please fill all field');
              redirect('admission/phdpt/Adm_phdpt_personal_details');
              break;
            }
          }
          $this->Adm_phdpt_personal_details_model->insert_work_experince_batch($datab);
        }



        $this->Adm_phdpt_personal_details_model->update_personal_deatils($personal_dteails,$get_reg_no);

        $this->Adm_phdpt_personal_details_model->update_tab1($tab,$get_reg_no);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
        {
          $this->session->set_flashdata('experror','Internal Network error occured error code F102');
          redirect('admission/phdpt/Adm_phdpt_personal_details');

        }
        else
        {
          // redirect('admission/Adm_phd_personal_details');
          $this->session->set_userdata('doc_start','doc_start');
          $this->session->unset_userdata('applied');
          redirect('admission/phdpt/Adm_phdpt_document');
        }

      }


    }

    else
    {

      $data['registration_detail']=$this->Add_phdpt_registration_model->get_registration_detail_by_email($email);
      $get_reg_no=$this->Add_phdpt_registration_model->get_registration_no_by_email($email);
      $data['application_details']=$this->Adm_phdpt_personal_details_model->get_adm_phd_reg_appl_program($get_reg_no);
      $data['application_details_ms']=$this->Adm_phdpt_personal_details_model->get_adm_phd_appl_ms($get_reg_no);
      $data['qual12_details']=$this->Adm_phdpt_personal_details_model->get_qualification12_details($get_reg_no);
      $data['qual10_details']=$this->Adm_phdpt_personal_details_model->get_qualification10_details($get_reg_no);
      $data['qualug_details']=$this->Adm_phdpt_personal_details_model->get_qualificationug_details($get_reg_no);
      //$data['pg_details']=$this->Adm_phd_personal_details_model->get_qualificationpg_details($get_reg_no);
      $data['betchiit']=$data['application_details_ms'][0]['betch_iit'];
      $data['exp_details']=$this->Adm_phdpt_personal_details_model->get_expreince_details($get_reg_no);
      $data['exp_details_d']=$this->Adm_phdpt_personal_details_model->get_expreince_details_dynamic($get_reg_no);

      $data['tot_exp_details']=$this->Adm_phdpt_personal_details_model->tot_exp_details($get_reg_no);

      $data['main_year'] = explode('|',$data['application_details_ms'][0]['tot_wrk_details'])[0];
      $data['main_month'] = explode('|',$data['application_details_ms'][0]['tot_wrk_details'])[1];
      $data['main_day'] = explode('|',$data['application_details_ms'][0]['tot_wrk_details'])[2];

     // $data['phd_fello_details']=$this->Adm_phd_personal_details_model->get_phd_fello_score_details($get_reg_no);
      $data['iit_details']=$this->Adm_phdpt_personal_details_model->get_iitname_details();
      $data['p_addr_details']=$this->Adm_phdpt_personal_details_model->get_p_address_details($get_reg_no);
      $data['c_addr_details']=$this->Adm_phdpt_personal_details_model->get_c_address_details($get_reg_no);
      $data['state']=$this->Adm_phdpt_personal_details_model->get_state();
      $this->session->set_userdata('work_experience','work_experience');
      $data['val']="H";
      $data['tab']="work_experience";
      $data['open_work_experince']="work_experince";
      $this->adm_phdpt_header($data);
      $this->load->view('admission/phdpt/adm_phdpt_application',$data);
      $this->adm_phdpt_footer();
    }
  }
  public function display_edu_detail_w() //for deleting qualification row
  {

    $this->load->model('admission/phdpt/Add_phdpt_registration_model');
    $this->load->model('admission/phdpt/Adm_phdpt_personal_details_model');
    $this->load->model('admission/phdpt/Adm_phdpt_application_model');
    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_phdpt_registration_model->get_registration_no_by_email($email);
    $id=$this->input->post('display_qual');
    $cond=array(
      'id'=> $id,
      'registration_no'=>$get_reg_no,
    );

    $msg=$this->Adm_phdpt_personal_details_model->delete_row_work_qualification($cond);
    echo json_encode($msg);

  }

  public function display_work_detail_w() //for deleting working experince row
  {

    $this->load->model('admission/phdpt/Add_phdpt_registration_model');
    $this->load->model('admission/phdpt/Adm_phdpt_personal_details_model');
    $this->load->model('admission/phdpt/Adm_phdpt_application_model');
    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_phdpt_registration_model->get_registration_no_by_email($email);

    $avd_id=$this->input->post('display_work');
    $cond=array(
      'id'=> $avd_id,
      'registration_no'=>$get_reg_no,
    );

    $msg=$this->Adm_phdpt_personal_details_model->delete_row_work_experince($cond);
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
    else if($file=='phd_fello_score_card_doc')
    {
      $doctype='phd_fello';
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
    $this->load->model('admission/Add_phdpt_registration_model');
    $get_reg_no=$this->Add_phdpt_registration_model->get_registration_no_by_email($email);
    $data['registration_detail']=$this->Add_phdpt_registration_model->get_registration_detail_by_email($email);
    if (!file_exists('./assets/admission/phdpt/'.$get_reg_no))
    {
      mkdir('./assets/admission/phdpt/'.$get_reg_no, 0777, true);
    }
        //upload file
        $config['upload_path'] = './assets/admission/phdpt/'.$get_reg_no;
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
                    $k=base_url()."assets/admission/phdpt/".$get_reg_no."/".$file.$get_reg_no.".pdf";
                    if($file=='photo'|| $file =='signature')
                    {
                      $k=base_url()."assets/admission/phdpt/".$get_reg_no."/".$file.$get_reg_no.".jpg";
                      $document=array(
                        'registration_no'=>$get_reg_no,
                        'doc_id'=>$doctype,
                        'doc_path'=>'assets/admission/phdpt/'.$get_reg_no.'/'.$file.$get_reg_no.'.jpg',
                        'created_by'=>$email
                      );
                    }
                    else
                    {
                      $document=array(
                        'registration_no'=>$get_reg_no,
                        'doc_id'=>$doctype,
                        'doc_path'=>'assets/admission/phdpt/'.$get_reg_no.'/'.$file.$get_reg_no.'.pdf',
                        'created_by'=>$email
                      );
                    }

                    if($this->Adm_phdpt_personal_details_model->insert_document_val($document))
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
    $this->load->model('admission/phdpt/Add_phdpt_registration_model');
    $get_reg_no=$this->Add_phdpt_registration_model->get_registration_no_by_email($email);
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
    else if($file=='phd_fello_score_card_doc')
    {
      $doctype='phd_fello';
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


    // $data['registration_detail']=$this->Add_phd_registration_model->get_registration_detail_by_email($email);
    $files =(file_exists('assets/admission/phdpt/'.$get_reg_no.'/'.$file.$get_reg_no.'.pdf'));
    if($files)
    {
      // unlink("https://nfrdev.iitism.ac.in/assets/images/nfr_user_documenttt/dob/app_no/$app_no/user_dob".$app_no.".pdf");
      //$this->session->unset_userdata('dob');
      $this->session->unset_userdata($file);
      // $msg="no file avaiable";
      //$msg=base_url()."assets/admission/phd/".$get_reg_no."/".$file.$get_reg_no.".pdf";
      if($this->Adm_phdpt_personal_details_model->remove_document_val($cond))
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
      if($this->Adm_phdpt_personal_details_model->remove_document_val($cond))
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


}
?>

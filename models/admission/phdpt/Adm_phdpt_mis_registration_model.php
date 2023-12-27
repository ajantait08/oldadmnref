<?php

class Adm_phdpt_mis_registration_model extends CI_Model
{

        private $tabulation='mislive';  //this for mislive when do live the use below one
        //private $table_pay='paybeta';
        // private $tabulation='mistest';
        // private $table_website = 'website';
        // private $parent = 'parent';

    function __construct()
    {
        parent::__construct();
        $CI =& get_instance();
        $this->db2 = $CI->load->database($this->tabulation, TRUE); // misdev
        //$this->db4 = $CI->load->database($this->table_website, TRUE); // misdev
        //$this->db5 = $CI->load->database($this->parent, TRUE); // misdev
    }

    function get_appl_type_from_reg_no($reg_no){
      $query = $this->db->select('appl_type')
              ->from('adm_phdpt_appl_ms')
              ->where('registration_no', $reg_no)
              ->get();
      if ($query->num_rows() > 0) {
          return $query->result_array()[0]['appl_type'];
      }
    }

    function validate_login($reg_id,$prog_selected,$appl_type)
    {
        if($appl_type=='Full time')
        {
        $sql = "SELECT a.registration_no as reg_id , f.application_no AS auth1 ,
        case b.gender when 'Male' then 'Mr' when 'Female' then 'Ms'
        when 'Others' then 'Mx' else 'NA' end as salutation ,
        b.first_name , b.middle_name , b.last_name ,
        b.mobile as contact_no ,
        a.email , a.category ,  if(a.select_category is null , a.category , a.select_category) as allocated_category ,
        '' as couse_code ,
          STR_TO_DATE(b.dob,'%d-%m-%Y') AS dob ,
            if(a.pwd='Y', 'yes','no') as pd_status , 'no' as is_prep ,
        case b.gender when 'Male' then 'm' when 'Female' then 'f' when 'Other' then 'o' end as sex ,
        b.nationality , c.line_1 as permanent_address_line1 , concat_ws(' ',c.line_2 , c.line_3) as permanent_address_line2 ,
        c.city as permanent_address_city , c.state as permanent_address_state , c.pincode as permanent_address_pincode ,
        c.country , if(b.guardian_realtion='FATHER' || b.guardian_realtion='Father' , b.guardian_name , '') as father_name ,
        if(b.guardian_realtion='MOTHER' || b.guardian_realtion='Mother' , b.guardian_name , '') as mother_name , b.guardian_name as guardian_name,
        '' as iit_jee_rank , '' as iit_jee_cat_rank , '' as cat_score , d.fellow_score AS gate_score ,b.guardian_realtion as guardian_relation,b.religion as religion,
          if(b.appl_type='Full time' , 'fulltime', 'parttime') as other_rank ,
        'jrf' as course_id , e.program_desc AS branch_id , e.dept_id , d.fellowship_type as admn_based_on , 'jrf' as admn_type ,
        a.admission_fee as fee_to_be_paid , if(a.payment_status='Y', '1','0') as fee_status , if(a.payment_status='Y','success','unpaid') as fee_status_msg,
        a.order_id as fee_order_no ,  case a.payment_date_time
        when STR_TO_DATE(a.payment_date_time,'%Y-%m-%d %H:%i:%s') then a.payment_date_time
        else STR_TO_DATE(a.payment_date_time,'%d-%m-%Y %H:%i:%s') end as fee_payment_at
        FROM adm_phdpt_appl_selected a
        INNER JOIN adm_phdpt_appl_ms b ON a.registration_no=b.registration_no
        INNER JOIN adm_phdpt_address c ON a.registration_no=c.registration_no AND c.address_type='P'
        left join adm_phdpt_fellowship d ON a.registration_no=d.registration_no
        INNER JOIN adm_phdpt_program_ms e ON a.program_id=e.program_id
        INNER JOIN adm_phdpt_reg_appl_program f ON a.program_id=f.program_id AND a.registration_no=f.registration_no
        WHERE a.registration_no = '$reg_id' AND b.appl_type='Full time' AND a.program_id='$prog_selected' GROUP BY a.registration_no";

        $query2 = $this->db->query($sql);

     }
     else if($appl_type=='Part time') {

        $sql = "SELECT a.registration_no as reg_id , f.application_no AS auth1 ,
                case b.gender when 'Male' then 'Mr' when 'Female' then 'Ms'
                when 'Others' then 'Mx' else 'NA' end as salutation ,
                b.first_name , b.middle_name , b.last_name ,
                b.mobile as contact_no ,
                a.email , a.category ,  if(a.select_category is null , a.category , a.select_category) as allocated_category ,
                '' as couse_code ,
                  STR_TO_DATE(b.dob,'%d-%m-%Y') AS dob ,
                    if(a.pwd='Y', 'yes','no') as pd_status , 'no' as is_prep ,
                case b.gender when 'Male' then 'm' when 'Female' then 'f' when 'Other' then 'o' end as sex ,
                b.nationality , c.line_1 as permanent_address_line1 , concat_ws(' ',c.line_2 , c.line_3) as permanent_address_line2 ,
                c.city as permanent_address_city , c.state as permanent_address_state , c.pincode as permanent_address_pincode ,
                c.country , if(b.guardian_realtion='FATHER' || b.guardian_realtion='Father' , b.guardian_name , '') as father_name ,
                if(b.guardian_realtion='MOTHER' || b.guardian_realtion='Mother' , b.guardian_name , '') as mother_name ,
                '' as iit_jee_rank , '' as iit_jee_cat_rank , '' as cat_score , d.fellow_score AS gate_score ,
                  if(b.appl_type='Full time' , 'fulltime', 'parttime') as other_rank ,
                'jrf' as course_id , e.program_desc AS branch_id , e.dept_id , d.fellowship_type as admn_based_on , 'jrf' as admn_type ,
                a.admission_fee as fee_to_be_paid , if(a.payment_status='Y', '1','0') as fee_status , if(a.payment_status='Y','success','unpaid') as fee_status_msg ,
                a.order_id as fee_order_no ,  case a.payment_date_time
                when STR_TO_DATE(a.payment_date_time,'%Y-%m-%d %H:%i:%s') then a.payment_date_time
                else STR_TO_DATE(a.payment_date_time,'%d-%m-%Y %H:%i:%s') end as fee_payment_at
              FROM adm_phdpt_appl_selected a
              INNER JOIN adm_phdpt_appl_ms b ON a.registration_no=b.registration_no
              INNER JOIN adm_phdpt_address c ON a.registration_no=c.registration_no AND c.address_type='P'
              left join adm_phdpt_fellowship d ON a.registration_no=d.registration_no
              INNER JOIN adm_phdpt_program_ms e ON a.program_id=e.program_id
              INNER JOIN adm_phdpt_reg_appl_program f ON a.program_id=f.program_id AND a.registration_no=f.registration_no
              WHERE a.registration_no = '$reg_id' AND b.appl_type='Part time' AND a.program_id='$prog_selected' GROUP BY a.registration_no";

              $query2 = $this->db->query($sql);

     }
     else {
      # code...
     }


      $row2=$query2->row_array();
      // echo '<pre>';
      // print_r($row2);
      // echo '</pre>';
      // exit;

       if(empty($row2))
       { //if invalid user
          return NULL;
       }

        $admn_type=$row2['admn_type'];
        if($admn_type=='msc' || $admn_type=='msctech' || $admn_type=='mtech' || $admn_type=='mba')
      {
        // unset($row2['father_name']);
        // unset($row2['mother_name']);
      }
      else if($admn_type=='jee')
      {
        unset($row2['iit_jee_rank']);
        unset($row2['iit_jee_cat_rank']);
      }
     if($admn_type=='mba' || $admn_type=='mtech')
     {
        // unset($row2['permanent_address_line1']);
        // unset($row2['permanent_address_pincode']);
        // unset($row2['permanent_address_line2']);
        // unset($row2['permanent_address_state']);
        // unset($row2['permanent_address_city']);
     }
     if($admn_type=='mba')
     {
      //unset($row2['cat_score']);
     }

     if($admn_type=='jrf')
     {
        // unset($row2['gate_score']);
        // unset($row2['other_rank']);
        // unset($row2['father_name']);
        // unset($row2['mother_name']);
        // unset($row2['permanent_address_line1']);
        // unset($row2['permanent_address_pincode']);
        // unset($row2['permanent_address_line2']);
        // unset($row2['permanent_address_state']);
        // unset($row2['permanent_address_city']);
     }

       $admn_type=$row2['admn_type'];
    //    echo $admn_type;
    //    die();
       // to get branch,course,department
       if($admn_type=='jee')
      {
       $code=$row2['course_code'];
       $query3= $this->db2->get_where('course_code',array('course_code'=> $code));
       $r5=$query3->row_array();

      }
     else if($admn_type!='jrf' && $admn_type!='mtech')
     {
      $this->db2->select('name as department');
      $query3= $this->db2->get_where('departments1',array('id'=> $row2['dept_id']));
      $r1=$query3->row_array();

      $this->db2->select('name as course');
      $query4= $this->db2->get_where('courses',array('id'=> $row2['course_id']));
      $r2=$query4->row_array();
      $r3=array_merge($r1,$r2);

      $this->db2->select('name as branch');
      $query5= $this->db2->get_where('branches',array('id'=> $row2['branch_id']));
      $r4=$query5->row_array();
      $r5=array_merge($r3,$r4);

     }
     else if($admn_type=='mtech')//mtech
     {
      $this->db2->select('name as department');
      $query3= $this->db2->get_where('departments1',array('id'=> $row2['dept_id']));
      $r1=$query3->row_array();

      $this->db2->select('name as course');
      $query4= $this->db2->get_where('cs_courses1',array('id'=> $row2['course_id']));
      $r2=$query4->row_array();
      $r3=array_merge($r1,$r2);

      $this->db2->select('name as branch');
      $query5= $this->db2->get_where('branches',array('id'=> $row2['branch_id'])); // cs_branches1
      //echo $this->db2->last_query(); die();
      $r4=$query5->row_array();
      $r5=array_merge($r3,$r4);
     }
     else
     {  // jrf
      $this->db2->select('name as department');
      $query3= $this->db2->get_where('departments1',array('id'=> $row2['dept_id']));
      $r5=$query3->row_array();
     }

     $states = $this->get_state_list();
     $row2['state_list'] = $states;

     // state list from state_table
     //$states = $this->get_state_list();
     //$row2['state_list'] = $states;
      //  echo "<pre>";
      //  print_r(array_merge($row2,$r5));
      //  die();
        #return 'hii merge';
      return array_merge($row2,$r5);

  }

  function check_payment_status_appl_selected($reg_id){
    $query = $this->db->select('*')
                      ->from('adm_phdpt_appl_selected')
                      ->where('status','PD')
                      ->where('payment_status','Y')
                      ->where('registration_no',$reg_id)
                      ->get();
    if($query->num_rows() > 0){
      return true;
    }
    else{
      return false;
    }
  }

  function insert_upload_error_logs($upload_array){
    $this->db2->insert('upload_error_logs',$upload_array);
    //echo $this->db->last_query(); //die();
    if ($this->db2->insert_id()) {
      return true;
   }
   else{
     return false;
   }
  }

  function insert_initial_tab_data($tab_data){
    $this->db->insert('adm_phdpt_mis_registration_tab',$tab_data);
    #echo $this->db->last_query(); die();
    if ($this->db->insert_id()) {
       return true;
    }
    else{
      return false;
    }
  }

  function get_prev_other_hostel_details($reg_id){
     $query = $this->db->select('*')
                      ->from('adm_phdpt_mis_registration_hostel_details')
                      ->where('registration_no',$reg_id)
                      ->get();

    if ($query->num_rows() > 0) {
       return $query->result_array();
    }
    else{
      return false;
    }
  }

  function get_prev_stu_account_details($reg_id){
    $query = $this->db->select('*')
                     ->from('adm_phdpt_mis_reg_student_account_details')
                     ->where('registration_no',$reg_id)
                     ->get();

   if ($query->num_rows() > 0) {
      return $query->result_array();
   }
   else{
     return false;
   }
 }

  function check_admn_no_registration($admn_no,$admn_type)
     {
        $query = $this->db2->query("SELECT * FROM users WHERE id = '$admn_no' and STATUS='I'");
        if($query->num_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
     }

  function get_mis_reg_education_details($reg_id){
    $sql = "select * from adm_phdpt_mis_reg_education_details where registration_no = ? order by id desc LIMIT 1";
    $query = $this->db->query($sql,array($reg_id));
    if ($query->num_rows() > 0) {
      return $query->result_array();
    }
    else{
      return false;
    }
  }

  function get_prev_personal_details($reg_id){
    $sql = "select * from adm_phdpt_mis_reg_personal_details_temp where registration_no = ?";
    $query = $this->db->query($sql,array($reg_id));
    if ($query->num_rows() > 0) {
         return $query->result_array();
    }
    else{
        return false;
    }
  }

  function delete_prev_personal_details($reg_id){

      if ($reg_id != '') {
        $this->db->where('registration_no',$reg_id);
        $this->db->delete('adm_phdpt_mis_reg_personal_details_temp');
        if ($this->db->affected_rows() > 0) {
          return true;
        }
        else{
          return false;
        }
      }

      else{
        return false;
      }



  }


  function delete_prev_fee_details($reg_id){

    if ($reg_id != '') {
      $this->db->where('registration_no',$reg_id);
      $this->db->delete('adm_phdpt_mis_reg_fee_details');
      if ($this->db->affected_rows() > 0) {
        return true;
      }
      else{
        return false;
      }
    }
    else{
      return false;
    }
}

  function delete_prev_education_details($reg_id){

    if ($reg_id != '') {
      $this->db->where('registration_no',$reg_id);
      $this->db->delete('adm_phdpt_mis_reg_education_details');
      if ($this->db->affected_rows() > 0) {
        return true;
      }
      else{
        return false;
      }
    }

    else{
      return false;
    }
}


function delete_prev_hostel_details($reg_id){

  if ($reg_id != '') {
    $this->db->where('registration_no',$reg_id);
    $this->db->delete('adm_phdpt_mis_registration_hostel_details');
    if ($this->db->affected_rows() > 0) {
      return true;
    }
    else{
      return false;
    }
  }

  else{
    return false;
  }
}

function delete_prev_account_details($reg_id){

  if ($reg_id != '') {
    $this->db->where('registration_no',$reg_id);
    $this->db->delete('adm_phdpt_mis_reg_student_account_details');
    if ($this->db->affected_rows() > 0) {
      return true;
    }
    else{
      return false;
    }
  }

  else{
    return false;
  }
}

  function get_marksheet_by_sno($sno,$reg_id){
      if ($sno != '') {
        $query = $this->db->select('marks_sheet')
                          ->from('adm_phdpt_mis_reg_stu_prev_certificate')
                          ->where('sno',$sno)
                          ->where('registration_no',$reg_id)
                          ->get();
        if ($query->num_rows() > 0) {
           return $query->result_array()[0]['marks_sheet'];
        }
        else{
          return false;
        }
      }
      else{
        return false;
      }

  }

  function get_certificate_by_sno($sno,$reg_id){
    if ($sno != '') {
      $query = $this->db->select('certificate')
                        ->from('adm_phdpt_mis_reg_stu_prev_certificate')
                        ->where('sno',$sno)
                        ->where('registration_no',$reg_id)
                        ->get();
      if ($query->num_rows() > 0) {
         return $query->result_array()[0]['certificate'];
      }
      else{
        return false;
      }
    }
    else{
      return false;
    }

}


function get_examtype_by_sno($sno,$reg_id){
  if ($sno != '') {
    $query = $this->db->select('certificate')
                      ->from('adm_phdpt_mis_reg_stu_prev_certificate')
                      ->where('sno',$sno)
                      ->where('registration_no',$reg_id)
                      ->get();
    if ($query->num_rows() > 0) {
       return $query->result_array()[0]['certificate'];
    }
    else{
      return false;
    }
  }
  else{
    return false;
  }

}

function get_dynamic_sub_by_sno($sno,$reg_id){
  if ($sno != '') {
    $query = $this->db->select('sub')
                      ->from('adm_phdpt_mis_reg_stu_prev_certificate')
                      ->where('sno',$sno)
                      ->where('registration_no',$reg_id)
                      ->get();
    if ($query->num_rows() > 0) {
       return $query->result_array()[0]['sub'];
    }
    else{
      return false;
    }
  }
  else{
    return false;
  }

}

  function get_admn_no_from_mis($reg_id){
    $query = $this->db2->select('admn_no')
                      ->from('stud_mis_reg_mis_server_basic_insert_details')
                      ->where('reg_id',$reg_id)
                      ->get();
    if ($query->num_rows() > 0) {
       return $query->result_array()[0]['admn_no'];
    }
    else{
      return false;
    }
  }

  function check_personal_details_already_exists($reg_id){
    $sql = "select * from adm_phdpt_mis_reg_personal_details_temp where registration_no = ?";
    $query = $this->db->query($sql,array($reg_id));
    if ($query->num_rows() > 0) {
      return $query->result_array();
    }
    else{
      return false;
    }
  }

  function check_education_details_already_exists($reg_id){
    $sql = "select * from adm_phdpt_mis_reg_education_details where registration_no = ?";
    $query = $this->db->query($sql,array($reg_id));
    if ($query->num_rows() > 0) {
      return $query->result_array();
    }
    else{
      return false;
    }
  }

  function insert_personal_details_log($data_log){
    $this->db->insert('adm_phdpt_mis_reg_personal_details_log',$data_log);
    //echo $this->db->last_query(); die();
    if ($this->db->insert_id() != '') {
      return $this->db->insert_id();
    }
    else {
      return false;
    }
  }

  function insert_education_details_log($data_log){
    $this->db->insert('adm_phdpt_mis_reg_education_details_log',$data_log);
    #echo $this->db->last_query(); die();
    if ($this->db->insert_id() != '') {
      return $this->db->insert_id();
    }
    else {
      return false;
    }
  }


  function insert_hostel_details_log($data_log){
    $this->db->insert('adm_phdpt_mis_registration_hostel_details_log',$data_log);
    //echo $this->db->last_query(); die();
    if ($this->db->insert_id() != '') {
      return $this->db->insert_id();
    }
    else {
      return false;
    }
  }

  function get_prev_stu_fee_details($registration_no){
    $sql = "select * from adm_phdpt_mis_reg_fee_details where registration_no = ?";
    $query = $this->db->query($sql,array($registration_no));
    if ($query->num_rows() > 0) {
      return $query->result_array();
    }
    else{
      return false;
    }
  }


  function insert_account_details_log($data_log){
    $this->db->insert('adm_phdpt_mis_reg_student_account_details_log',$data_log);
    //echo $this->db->last_query(); die();
    if ($this->db->insert_id() != '') {
      return $this->db->insert_id();
    }
    else {
      return false;
    }
  }

  function insert_fee_details_log($data_log){
    $this->db->insert('adm_phdpt_mis_reg_fee_details_log',$data_log);
    //echo $this->db->last_query(); die();
    if ($this->db->insert_id() != '') {
      return $this->db->insert_id();
    }
    else {
      return false;
    }
  }

  function get_mis_reg_prev_education_details($reg_id){
    $sql = "select * from adm_phdpt_mis_reg_stu_prev_education where registration_no = ?";
    $query = $this->db->query($sql,array($reg_id));
    if ($query->num_rows() > 0) {
      return $query->result_array();
    }
    else{
      return false;
    }
  }

  function get_stu_prev_certificate_details($sno){
    if ($sno != '') {
    $sql = "select * from adm_phdpt_mis_reg_stu_prev_certificate where sno = ?";
    $query_edu = $this->db->query($sql,array($sno));
    if($query_edu->num_rows() > 0) {
       return $query_edu->result_array();
    }
    else{
      return false;
    }
    }
    else{
      return false;
    }
  }

  function insert_stu_prev_certificate_details_log($form_data){
    $this->db->insert('adm_phdpt_mis_reg_stu_prev_certificate_log', $form_data);
    //echo $this->db->last_query(); die();
    return $this->db->insert_id();
  }

  function update_stu_prev_certificate($form_data){
    $data_update = array(
      'marks_sheet' => '',
    );
    $this->db->where('sno',$form_data['sno']);
    $this->db->update('adm_phdpt_mis_reg_stu_prev_certificate',$data_update);
    if ($this->db->affected_rows() > 0) {
       return true;
    }
    else{
       return false;
    }
  }

  function update_stu_prev_marksheet($form_data){
    $data_update = array(
      'certificate' => '',
    );
    $this->db->where('sno',$form_data['sno']);
    $this->db->update('adm_phdpt_mis_reg_stu_prev_certificate',$data_update);
    if ($this->db->affected_rows() > 0) {
       return true;
    }
    else{
       return false;
    }
  }

  function update_branch_mis_reg_edu($update_array,$where_data){

    $this->db->where($where_data);
    $this->db->update('adm_phdpt_mis_reg_education_details',$update_array);
    #echo $this->db->last_query(); die();
    if ($this->db->affected_rows() >= 0) {
       return true;
    }
    else{
       return false;
    }
  }

  public function get_mis_reg_prev_certificate_details($reg_id){
    $sql = "select * from adm_phdpt_mis_reg_stu_prev_certificate where registration_no = ?";
    $query = $this->db->query($sql,array($reg_id));
    if ($query->num_rows() > 0) {
      return $query->result_array();
    }
    else{
      return false;
    }
  }

  public function get_photopath_from_personal_details($reg_id){
      $query = $this->db->select('photo_path')
                        ->from('adm_phdpt_mis_reg_personal_details_temp')
                        ->where('registration_no',$reg_id)
                        ->get();
      //echo $this->db->last_query(); die();
      //echo $query->result_array()[0]['photo_path']; exit;
      if ($query->num_rows() > 0) {
        return $query->result_array()[0]['photo_path'];
      }
      else{
        return false;
      }
  }

  public function get_signpath_from_personal_details($reg_id){
    $query = $this->db->select('signature_path')
                      ->from('adm_phdpt_mis_reg_personal_details_temp')
                      ->where('registration_no',$reg_id)
                      ->get();

    if ($query->num_rows() > 0) {
      return $query->result_array()[0]['signature_path'];
    }
    else{
      return false;
    }
}

  function validate_login_final($reg_id)
  { // return stu_temp_table and course code table

   // $query2=$this->db->get_where('stud_final',['email'=>$auth1,'reg_id'=>$reg_id,'contact_no'=>$contact_no]);
   $query2=$this->db2->get_where('stud_final_with_fee',['reg_id'=>$reg_id,'fee_status_msg'=>'success']);
    $row2=$query2->row_array();

    // echo "<pre>";
    // print_r($row2);
    // die();

     if(empty($row2))
     { //if invalid user
        return NULL;
     }
      $admn_type=$row2['admn_type'];
      if($admn_type=='msc' || $admn_type=='msctech' || $admn_type=='mtech' || $admn_type=='mba')
    {
     /* $this->db->select('sl_no,admn_no,reg_id,auth1,salutation,first_name,middle_name,last_name,contact_no,email,category,allocated_category,course_code,dob,pd_status,is_prep,sex,nationality,permanent_address_line1,permanent_address_line2,permanent_address_city,permanent_address_state,permanent_address_pincode,country,iit_jee_rank,iit_jee_cat_rank,cat_score,gate_score,other_rank,branch_id,course_id,dept_id,admn_based_on,admn_type,hostel_name,block_name,floor,room_name,room_detail_id');
      $query2=$this->db->get_where('stu_temp_db_comm',['auth1'=>$auth1,'reg_id'=>$reg_id,'contact_no'=>$contact_no]);
      */
     // unset($row2['father_name']);
     // unset($row2['mother_name']);
    }
    else if($admn_type=='jee')
    {
      unset($row2['iit_jee_rank']);
      unset($row2['iit_jee_cat_rank']);
    }
  //  if($admn_type=='mba' || $admn_type=='mtech')
  //  {
  //     unset($row2['permanent_address_line1']);
  //     unset($row2['permanent_address_pincode']);
  //     unset($row2['permanent_address_line2']);
  //     unset($row2['permanent_address_state']);
  //     unset($row2['permanent_address_city']);

  //  }
   if($admn_type=='mba')
   {
    //unset($row2['cat_score']);
   }

   if($admn_type=='jrf')
   {
      /* to be asked from sir */
      // unset($row2['gate_score']);
      // unset($row2['other_rank']);
       /* to be asked from sir */
      // unset($row2['father_name']);
      // unset($row2['mother_name']);
      // unset($row2['permanent_address_line1']);
      // unset($row2['permanent_address_pincode']);
      // unset($row2['permanent_address_line2']);
      // unset($row2['permanent_address_state']);
      // unset($row2['permanent_address_city']);
   }
     /*
   }
   }
   }
    }
    echo "<pre>";
    print_r($row2);
    die();*/
    /* $code=$row2['course_code'];
     $query3= $this->db->get_where('course_code',array('course_code'=> $code));
     $r5=$query3->row_array();


      return array_merge($row2,$r5);
      */

     $admn_type=$row2['admn_type'];
     /*echo $admn_type;
     die();*/
     // to get branch,course,department
     if($admn_type=='jee')
    {
     $code=$row2['course_code'];
     $query3= $this->db2->get_where('course_code',array('course_code'=> $code));
     $r5=$query3->row_array();
    }
   else if($admn_type!='jrf' && $admn_type!='mtech')
   {
    $this->db2->select('name as department');
    $query3= $this->db2->get_where('departments1',array('id'=> $row2['dept_id']));
    $r1=$query3->row_array();
   /* echo "<pre>";
    print_r($r1);*/
    $this->db2->select('name as course');
    $query4= $this->db2->get_where('courses',array('id'=> $row2['course_id']));
    $r2=$query4->row_array();
    $r3=array_merge($r1,$r2);
    /*echo "<pre>";
    print_r($r3);*/
    $this->db2->select('name as branch');
    $query5= $this->db2->get_where('branches',array('id'=> $row2['branch_id']));
    $r4=$query5->row_array();
    $r5=array_merge($r3,$r4);
   /* echo "<pre>";
    print_r($r5);*/
   }
   else if($admn_type=='mtech')//mtech
   {
    $this->db2->select('name as department');
    $query3= $this->db2->get_where('departments1',array('id'=> $row2['dept_id']));
    $r1=$query3->row_array();
   /* echo "<pre>";
    print_r($r1);*/
    $this->db2->select('name as course');
    $query4= $this->db2->get_where('cs_courses1',array('id'=> $row2['course_id']));
    $r2=$query4->row_array();
    $r3=array_merge($r1,$r2);
  //   echo "<pre>";
  //   print_r($r3);
  //   exit;
    $this->db2->select('name as branch');
    $query5= $this->db2->get_where('branches',array('id'=> $row2['branch_id'])); // cs_branches1
    $r4=$query5->row_array();
    $r5=array_merge($r3,$r4);
   }
   else
   {  // jrf
    $this->db2->select('name as department');
    $query3= $this->db2->get_where('departments1',array('id'=> $row2['dept_id']));
    $r5=$query3->row_array();
   }

   // state list from state_table
   $states = $this->get_state_list();
   $row2['state_list'] = $states;
    //  echo "<pre>";
    //  //print_r($row2);
    //  print_r(array_merge($row2,$r5));
    //  die();
     return array_merge($row2,$r5);

}

function get_state_list()
    {
        $query = $this->db->select('*')
                           //->from('state_table')
                           ->get_where('state_table');
        //echo $this->db->last_query(); die();
        $row_list=$query->result_array();
        return $row_list;
    }


  function get_admn_no_from_stud_final_with_fee($reg_id)
    {
      $this->db2->select('admn_no');
      $query=$this->db2->get_where('stud_final_with_fee',['reg_id'=>$reg_id]);
      //echo $this->db->last_query(); exit;
      $row=$query->row_array();
      return $row;
    }

    function check($admn_no)
    {
        $query2=$this->db2->select('id')
                        ->get_where('users',array('id'=>$admn_no));
        if($query2->num_rows()>0)return TRUE;
        return FALSE;
    }

    function get_current_user_tab_status($registration_no){
        $query = $this->db->select('*')
                          ->from('adm_phdpt_mis_registration_tab')
                          ->where('registration_no',$registration_no)
                          ->get();
        if ($query->num_rows() >= 0) {
            return $query->result_array();
        }
    }

    function get_tab2_status($registration_no){
      $query = $this->db->select('*')
                        ->from('adm_phdpt_mis_registration_tab')
                        ->where('registration_no',$registration_no)
                        ->get();
      if ($query->num_rows() >= 0) {
         if ($query->result_array()[0]['tab_status'] == 2) {
            return false;
         }
         else {
            return true;
         }
      }
  }

    function insert_current_user_tab_status($phd_mis_reg_tab_status){
         $this->db->insert('adm_phdpt_mis_registration_tab',$phd_mis_reg_tab_status);
        //  echo $this->db->last_query(); exit;
         return $this->db->insert_id();
         //exit;
    }

    function get_user_tables($admn_no)
    {//users , user_address, user_details, user_other_details
     $query1=$this->db2->select('line1 as permanent_address_line1,line2 as permanent_address_line2, city as permanent_address_city , state as permanent_address_state , pincode as permanent_address_pincode,country as permanent_address_country,contact_no')
                        ->get_where('user_address',array('id'=>$admn_no,'type'=>'permanent'));

      $row1=$query1->row_array();
    $query2=$this->db2->select('line1 as present_address_line1,line2 as present_address_line2,city as present_address_city,state as present_address_state')
                        ->get_where('user_address',array('id'=>$admn_no,'type'=>'present'));
                        //echo $this->db2->last_query(); die();
      $row2=$query2->row_array();

      $row12=array_merge($row1,$row2);

     $query3=$this->db2->select('first_name,middle_name,last_name,sex,category,allocated_category,dob,email,marital_status,physically_challenged as pd_status,photopath as  photo')
                        ->get_where('user_details',array('id'=>$admn_no));
      $row3=$query3->row_array();
     $query4=$this->db2->select('religion,nationality,kashmiri_immigrant,hobbies,fav_past_time,birth_place,father_name,mother_name')
                        ->get_where('user_other_details',array('id'=>$admn_no));
      $row4=$query4->row_array();
      $row34=array_merge($row3,$row4);
      return array_merge($row12,$row34);
    }

    function get_stu_tables($admn_no)
    {//stu_academics, stu_admn_fee, stu_details, stu_other_details, stu_prev_education, stu_prev_certificate, stu_prep_data
       $query1=$this->db2->select('admn_no,admn_based_on,iit_jee_rank,iit_jee_cat_rank,course_id,branch_id,cat_score,gate_score,other_rank')
                        ->get_where('stu_academic',array('admn_no'=>$admn_no));
       $row1=$query1->row_array();

       $query2=$this->db2->select('fee_mode,fee_amount,payment_made_on as fee_date,transaction_id')
                        ->get_where('stu_admn_fee',array('admn_no'=>$admn_no));
       $row2=$query2->row_array();

       $row11=array_merge($row1,$row2);

       $query3=$this->db2->select('admn_date,identification_mark,parent_mobile_no,parent_email_id,alternate_mobile_no,alternate_email_id,migration_cert as migration_cert1,name_in_hindi,blood_group,enrollment_no')
                        ->get_where('stu_details',array('admn_no'=>$admn_no));
       $row3=$query3->row_array();

        $query4=$this->db2->select('fathers_occupation,mothers_occupation,fathers_annual_income as father_income,mothers_annual_income as mother_income,guardian_name,guardian_relation,bank_name,account_no,aadhaar_card_no as aadhar_no,passport_no as passport_no,extra_curricular_activity,other_relevant_info')
                        ->get_where('stu_other_details',array('admn_no'=>$admn_no));
         $row4=$query4->row_array();
         $row12=array_merge($row3,$row4);
         $row14=array_merge($row11,$row12);

          $query5=$this->db2->select('exam as exam0,institute as  institute0,year as year0,grade as grade0,division as division0')
                        ->get_where('stu_prev_education',array('admn_no'=>$admn_no,'sno'=>1));
          $row5=$query5->row_array();
          $query6=$this->db2->select('exam as exam1,institute as institute1,year as year1,grade as grade1,division as division1')
                        ->get_where('stu_prev_education',array('admn_no'=>$admn_no,'sno'=>2));
          $row6=$query6->row_array();
          if ($query6->num_rows() > 0) {
            $row56=array_merge($row5,$row6);
          }
          else{
            $row56= $row5;
          }

          $query7=$this->db2->select('signpath as sign,sub as sub0,jee_adv_rollno as reg_id,jam_reg_id')
                        ->get_where('stu_prev_certificate',array('admn_no'=>$admn_no,'sno'=>1));
          $row7=$query7->row_array();
          $query8=$this->db2->select('sub as sub1')
                        ->get_where('stu_prev_certificate',array('admn_no'=>$admn_no,'sno'=>2));
          $row8=$query8->row_array();
          if ($query8->num_rows() > 0) {
          $row78=array_merge($row7,$row8);
          }
          else {
            $row78= $row7;
          }
           $query9=$this->db2->select('admn_no')
                        ->get_where('stu_prep_data',array('admn_no'=>$admn_no));
           $data['is_prep']='no';
           if($query9->num_rows()>0)
           {
            $data['is_prep']='yes';
           }



         $row58=array_merge($row56,$row78);
         $row59=array_merge($row58,$data);

         return array_merge($row14,$row59);
    }

    function get_reg_tables($admn_no,$admn_type)// used to get info about course_code ,branch,course
    {// course_id and branch_id from stu_academics
    if($admn_type=='jee')
    {
        $query1=$this->db2->select('course_code')
                        ->get_where('stud_final_with_fee',array('admn_no'=>$admn_no)); //  stud_final
        $row1=$query1->row_array();
         $query2=$this->db2->select('course,branch')
                        ->get_where('course_code',array('course_code'=>$row1['course_code']));

         $row2=$query2->row_array();
         $row3=array_merge($row1,$row2);
       }
       else if($admn_type!='jrf' && $admn_type!='mtech')
       {
       $this->db2->select('dept_id');
      $query3= $this->db2->get_where('user_details',array('id'=>$admn_no));
      $r1=$query3->row_array();

      $this->db2->select('name as department');
      $query3= $this->db2->get_where('departments1',array('id'=> $r1['dept_id']));
      $r5=$query3->row_array();
     /* echo "<pre>";
      print_r($r1);*/

       $this->db2->select('course_id');
      $query3= $this->db2->get_where('stu_academic',array('admn_no'=>$admn_no));
      $r2=$query3->row_array();

      $this->db2->select('name as course');
      $query3= $this->db2->get_where('courses',array('id'=> $r2['course_id']));
      $r6=$query3->row_array();


      $r7=array_merge($r5,$r6);

       $this->db2->select('branch_id');
      $query3= $this->db2->get_where('stu_academic',array('admn_no'=>$admn_no));
      $r3=$query3->row_array();

      $this->db2->select('name as branch');
      $query3= $this->db2->get_where('branches',array('id'=> $r3['branch_id']));
      $r8=$query3->row_array();
      $row3=array_merge($r7,$r8);
     /* echo "<pre>";
      print_r($r5);*/

       }
       else if($admn_type=='mtech')
       {
          $this->db2->select('dept_id');
      $query3= $this->db2->get_where('user_details',array('id'=>$admn_no));
      $r1=$query3->row_array();

      $this->db2->select('name as department');
      $query3= $this->db2->get_where('departments1',array('id'=> $r1['dept_id']));
      $r5=$query3->row_array();
     /* echo "<pre>";
      print_r($r1);*/

       $this->db2->select('course_id');
      $query3= $this->db2->get_where('stu_academic',array('admn_no'=>$admn_no));
      $r2=$query3->row_array();

      $this->db2->select('name as course');
      $query3= $this->db2->get_where('cs_courses',array('id'=> $r2['course_id']));
      $r6=$query3->row_array();


      $r7=array_merge($r5,$r6);

       $this->db2->select('branch_id');
      $query3= $this->db2->get_where('stu_academic',array('admn_no'=>$admn_no));
      $r3=$query3->row_array();

      $this->db2->select('name as branch');
      $query3= $this->db2->get_where('cs_branches',array('id'=> $r3['branch_id']));
      $r8=$query3->row_array();
      $row3=array_merge($r7,$r8);
       }
       else{// jrf
      $this->db2->select('dept_id');
      $query3= $this->db2->get_where('user_details',array('id'=>$admn_no));
      $r1=$query3->row_array();

      $this->db2->select('name as department');
      $query3= $this->db2->get_where('departments1',array('id'=> $r1['dept_id']));
      $row3=$query3->row_array();
       }

      return $row3;

    }

    function get_hs_info($admn_no)// get hostel info for hostel pdf
    {
        $query=$this->db2->select('food_habit,laptop_make,laptop_model,laptop_sl_no')
                        ->get_where('hs_info',array('admn_no'=>$admn_no));
        return $query->row_array();
    }

    function get_prev_edu_and_cert($admn_no)
    {
        $query_prev_e=$this->db2->select('*')
        ->get_where('stu_prev_education',array('admn_no'=>$admn_no));
        $row_edu=$query_prev_e->result_array();

        $query_prev_c=$this->db2->select('*')
        ->get_where('stu_prev_certificate',array('admn_no'=>$admn_no));
        $row_c=$query_prev_c->result_array();

        $data['stu_prev_education'] = $row_edu;
        $data['stu_prev_certificate'] = $row_c;

        return $data;
    }

    function get_phd_education_details($registration_id) {

        // $query = $this->db5->get_where('adm_phd_qulaification',['registration_no' => $registration_id]);
         $query = $this->db->query("SELECT a.registration_no,a.exam_type,a.exam_name,a.institue_name,a.result_status,a.marks_perc_type,a.mark_cgpa_percenatge,a.year_of_passing,
         a.created_by,a.created_date,b.doc_id,b.doc_path
          from adm_phdpt_qulaification a INNER JOIN adm_phdpt_doc b ON a.registration_no=b.registration_no AND
         b.doc_id=(CASE
         WHEN a.exam_type='10 th' THEN '10th'
         WHEN a.exam_type='12 th' THEN '12th'
         WHEN a.exam_type='UG Exam' THEN 'ugm'
         WHEN a.exam_type='PG1 Exam' THEN 'pgm1'
         WHEN a.exam_type='PG2 Exam' THEN 'pgm2'
         END)
         WHERE a.registration_no=? ORDER BY a.id,b.id",[$registration_id]);

         #echo $this->db->last_query(); die();

         if($query->num_rows() > 0) {
             return $query->result_array();
         }
         else {
             return false;
         }
     }

     function get_photo_signature_phd($registration_id) {
         $query = $this->db->query("SELECT * from adm_phdpt_doc a where a.doc_id in('photo','signature') and a.registration_no=? ",[$registration_id]);

         if($query->num_rows() > 0) {
             return $query->result_array();
         }
         else {
             return false;
         }
     }

     function insert_personal_details($data_insert){
        //echo '<pre>';print_r($data_insert); echo '</pre>'; //exit;
        $this->db->insert('adm_phdpt_mis_reg_personal_details_temp',$data_insert);
        //echo $this->db->last_query(); die();
        if($this->db->insert_id() > 0)
        {
          return true;
        }
        else{
          return false;
        }
     }

     function update_mis_reg_tab_status($data_phd_mis_reg,$registration_no){
      $this->db->where('registration_no',$registration_no);
      $this->db->update('adm_phdpt_mis_registration_tab',$data_phd_mis_reg);
      //echo $this->db->last_query(); die();
      if($this->db->affected_rows() > 0)
      {
        return true;
      }
      else{
        return false;
      }
     }

     function check_tab5_status($reg_id){
      $query = $this->db->select('*')
      ->get_where('adm_phdpt_mis_registration_tab',array('registration_no'=>$reg_id,'tab5'=>'5'));
      if($query->num_rows() > 0)
      {
        return true;
      }
      else{
        return false;
      }
     }

     function save_phd_mis_reg_parent_details($save_parent_details){
        $this->db->insert('adm_phdpt_mis_reg_parent_details',$save_parent_details);
        //echo $this->db->last_query(); die();
        return $this->db->insert_id();
     }

     function save_hostel_info($data){
       $this->db->insert('adm_phdpt_mis_registration_hostel_details',$data);
        //echo $this->db->last_query(); die();
        return $this->db->insert_id();
     }

     function save_account_details($stu_account_details){
      $this->db->insert('adm_phdpt_mis_reg_student_account_details',$stu_account_details);
      return $this->db->insert_id();
     }

     function save_phd_mis_reg_prev_parent_details_log($save_parent_details){
      $this->db->insert('adm_phdpt_mis_reg_edit_parent_details_log',$save_parent_details);
      return $this->db->insert_id();
   }

     function get_mis_reg_parent_details($reg_no){
        $query = $this->db->select('*')
                        ->from('adm_phdpt_mis_reg_parent_details')
                        ->where('registration_no',$reg_no)
                        ->get();
         if($query->num_rows() > 0){
            return $query->result_array();
         }
         else{
          return false;
         }
     }

     function check_parent_details_already_exists($registration_no,$admn_no){
      $query = $this->db->select('*')
                      ->from('adm_phdpt_mis_reg_parent_details')
                      ->where('registration_no',$registration_no)
                      //->where('admn_no',$admn_no)
                      ->get();
      if($query->num_rows() > 0){
        return $query->result_array();
      }
      else{
        return false;
      }

     }

     function get_personal_details($registration_no){
      $query = $this->db->select('*')
                      ->from('adm_phdpt_mis_reg_personal_details_temp')
                      ->where('registration_no',$registration_no)
                      //->where('admn_no',$admn_no)
                      ->get();
       //echo $this->db->last_query(); die();
      if($query->num_rows() > 0){
        return $query->result_array();
      }
      else{
        return false;
      }

     }

     function get_education_details($registration_no){
      $query = $this->db->select('*')
                      ->from('adm_phdpt_mis_reg_education_details')
                      ->where('registration_no',$registration_no)
                      //->where('admn_no',$admn_no)
                      ->get();
      if($query->num_rows() > 0){
        return $query->result_array();
      }
      else{
        return false;
      }

     }

     function get_prev_education_details($registration_no){
      $query = $this->db->select('*')
                      ->from('adm_phdpt_mis_reg_stu_prev_education')
                      ->where('registration_no',$registration_no)
                      //->where('admn_no',$admn_no)
                      ->get();
      if($query->num_rows() > 0){
        return $query->result_array();
      }
      else{
        return false;
      }

     }

     function get_prev_certificate_details($registration_no){
      $query = $this->db->select('*')
                      ->from('adm_phdpt_mis_reg_stu_prev_certificate')
                      ->where('registration_no',$registration_no)
                      //->where('admn_no',$admn_no)
                      ->get();
      if($query->num_rows() > 0){
        return $query->result_array();
      }
      else{
        return false;
      }

     }

     function get_parent_details($registration_no){
      $query = $this->db->select('*')
                      ->from('adm_phdpt_mis_reg_parent_details')
                      ->where('registration_no',$registration_no)
                      //->where('admn_no',$admn_no)
                      ->get();
      if($query->num_rows() > 0){
        return $query->result_array();
      }
      else{
        return false;
      }

     }

     function get_hostel_details($registration_no){
      $query = $this->db->select('*')
                      ->from('adm_phdpt_mis_registration_hostel_details')
                      ->where('registration_no',$registration_no)
                      //->where('admn_no',$admn_no)
                      ->get();
      if($query->num_rows() > 0){
        return $query->result_array();
      }
      else{
        return false;
      }

     }

     function get_fee_details($registration_no){
      $query = $this->db->select('*')
                      ->from('adm_phdpt_mis_reg_fee_details')
                      ->where('registration_no',$registration_no)
                      //->where('admn_no',$admn_no)
                      ->get();
      if($query->num_rows() > 0){
        return $query->result_array();
      }
      else{
        return false;
      }

     }

     function get_student_account_details($registration_no){
      $query = $this->db->select('*')
                      ->from('adm_phdpt_mis_reg_student_account_details')
                      ->where('registration_no',$registration_no)
                      //->where('admn_no',$admn_no)
                      ->get();
      if($query->num_rows() > 0){
        return $query->result_array();
      }
      else{
        return false;
      }

     }

     function save_stu_fee_details($stu_fee_details){
      $this->db->insert('adm_phdpt_mis_reg_fee_details',$stu_fee_details);
      //echo $this->db->last_query(); die();
      return $this->db->insert_id();
     }

     function insertbatch_stu_prev_education_mis_registration($data)//9
    {
        //echo '<pre>';print_r($data);echo '</pre>'; exit;
        // $this->db->insert_batch('adm_phd_mis_reg_stu_prev_education',$data);
        // echo $this->db->last_query(); die();
        if($this->db->insert_batch('adm_phdpt_mis_reg_stu_prev_education',$data)){
          return true;
        }
        else{
          return false;
        }
        //echo $this->db->last_query(); die();
    }
    function insertbatch_stu_prev_certificate_mis_registration($data)//10
    {
         //echo 'entered certificate'; exit;
        //  $this->db->insert_batch('adm_phd_mis_reg_stu_prev_certificate',$data);
        //  echo $this->db->last_query(); die();
        if($this->db->insert_batch('adm_phdpt_mis_reg_stu_prev_certificate',$data))
        {
          return true;
        }
        else{
          return false;
        }
        //echo $this->db->last_query(); die();
    }

    function insertbatch_stu_prev_education_log($data){
      $this->db->insert_batch('adm_phdpt_mis_reg_stu_prev_education_log',$data);
      //echo $this->db->last_query(); die();
      if($this->db->insert_batch('adm_phdpt_mis_reg_stu_prev_education_log',$data))
        {
          return true;
        }
        else{
          return false;
        }
    }

    function insertbatch_stu_prev_certificate_log($data){

      if($this->db->insert_batch('adm_phdpt_mis_reg_stu_prev_certificate_edit_log',$data))
      {
        return true;
      }
      else{
        return false;
      }
    }

    function remove_prev_edu_mis_reg_main_table($registration_no){
      if ($registration_no != '') {
        $this->db->where('registration_no', $registration_no);
        if($this->db->delete('adm_phdpt_mis_reg_stu_prev_education'))
        {
          return true;
        }
        else{
          return false;
        }
      }
      else{
        return true;
      }
    }

    function remove_prev_cert_mis_reg_main_table($registration_no){
      if ($registration_no != '') {
        $this->db->where('registration_no', $registration_no);
        if($this->db->delete('adm_phdpt_mis_reg_stu_prev_certificate'))
        {
          return true;
        }
        else{
          return false;
        }
      }
      else{
        return true;
      }
    }

    function remove_prev_parent_mis_reg_main_table($registration_no){
      if ($registration_no != '') {
        $this->db->where('registration_no', $registration_no);
        //$this->db->delete('adm_phd_mis_reg_parent_details');
        //echo $this->db->last_query(); die();
        if($this->db->delete('adm_phdpt_mis_reg_parent_details'))
        {
          return true;
        }
        else{
          return false;
        }
      }
      else{
        return true;
      }
    }

    function get_branch_id_by_name($branch_name){
      $query =  $this->db2->select('id')
                         ->where('name', $branch_name)
                         ->from('cs_branches')
                         ->get();
      if($query->num_rows() > 0){
          return $query->result_array()[0]['id'];
      }
      else{
        return $branch_name;
      }
    }

    function get_branch_name_by_id($branch_name){
      $query =  $this->db2->select('name')
                         ->where('id', $branch_name)
                         ->from('cs_branches')
                         ->get();
      if($query->num_rows() > 0){
          return $query->result_array()[0]['name'];
      }
      else{
        return $branch_name;
      }
    }

    function insert_mis_reg_edu_details($data){
      // $this->db->insert('adm_phd_mis_reg_education_details',$data);
      // echo $this->db->last_query(); die();
    if ($this->db->insert('adm_phdpt_mis_reg_education_details',$data)) {
      return true;
    }
    else{
      return false;
    }
    }

    function insert_users($data)//1
    {
        $this->db->insert('users',$data);
        //echo $this->db->last_query(); die();
    }
    function insert_user_details($data)//2
    {
        $this->db->insert('user_details',$data);
        //echo $this->db->last_query(); //die();
    }
    function insert_user_other_details($data)//3
    {
        $this->db->insert('user_other_details',$data);
        //echo $this->db->last_query(); //die();
    }
    function insertbatch_user_address($data)//4
    {
        $this->db->insert_batch('user_address',$data);
        //echo $this->db->last_query(); //die();
    }
    function insert_stu_academic($data)//5
    {
        $this->db->insert('stu_academic',$data);
        //echo $this->db->last_query(); //die();
    }
    function insert_stu_admn_fee($data)//6
    {
        $this->db->insert('stu_admn_fee',$data);
        //echo $this->db->last_query(); die();
    }
    function insert_stu_details($data)//7
    {
        $this->db->insert('stu_details',$data);
        //echo $this->db->last_query(); die();
    }
    function insert_stu_other_details($data)//8
    {
        $this->db->insert('stu_other_details',$data);
        //echo $this->db->last_query(); die();
    }
    function insertbatch_stu_prev_education($data)//9
    {
        $this->db->insert_batch('stu_prev_education',$data);
        //echo $this->db->last_query(); die();
    }
    function insertbatch_stu_prev_certificate($data)//10
    {
        $this->db->insert_batch('stu_prev_certificate',$data);
        //echo $this->db->last_query(); die();
    }
    function insert_stu_enroll_passout($data)//8
    {
        $this->db->insert('stu_enroll_passout',$data);
        //echo $this->db->last_query(); die();
    }
    function insert_reg_regular_fee($data)//11
    {
        //echo  'entered reg regular form'; exit;
        $this->db->insert('reg_regular_fee',$data);
        //echo $this->db->last_query(); die();
        $lastid = $this->db->insert_id();
        //echo $lastid; exit;
        return $lastid;
    }
    function insert_reg_regular_form($data)//12
    {
        $this->db->insert('reg_regular_form',$data);
        //echo $this->db->last_query(); die();
    }
    function insert_reg_form($data)//12
    {
        $this->db->insert('reg_form',$data);
        //echo $this->db->last_query(); die();
    }
    function insert_fb_student_feedback($data)//14
    {
        $this->db->insert('fb_student_feedback',$data);
        //echo $this->db->last_query(); die();
    }
    function insert_hostel($data)//14
    {
        $this->db->insert('hs_assigned_student_room',$data);
        //echo $this->db->last_query(); die();
    }
    function insert_hs_student_allotment_list($data)//14
    {
        $this->db->insert('hs_student_allotment_list',$data);
        //echo $this->db->last_query(); die();
    }
    function insert_hs_info($data)//14
    {
        $this->db->insert('hs_info',$data);
        //echo $this->db->last_query(); die();
    }
    function insertPreparatory($admn_no='')//13
    {
        $curr_year = date("Y");
        $curr_session_year = ($curr_year).'-'.($curr_year+1);

            if($admn_no!='')
            {
                $data = array('admn_no'=>$admn_no, 'session_year'=>$curr_session_year);
                $this->db->insert('stu_prep_data', $data);
                //echo $this->db->last_query(); die();
            }
    }
    // Email Registraion || IITISM Email DB(newadmission)
    function insert_email_form($data)//18
    {
        $this->db->insert('email_form',$data);
        //echo $this->db->last_query(); die();
    }
    function insert_emaildata($data)//18
    {
        $this->db->insert('emaildata',$data); // 19
        //echo $this->db->last_query(); die();
    }
    // End Email Registraion || IITISM Email
    #xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx Insert stu_section_data table for group section data xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    function insert_stu_section_data($data)
    {
        $this->db->insert('stu_section_data',$data); # 20
        //echo $this->db->last_query(); die();
    }
    #xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx Insert stu_section_data table for group section data xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

    #xxxxxxxxxxxxxxxxxxxxxx Insert data into web_people in mis xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    function insert_web_people($data)
    {
        $this->db->insert('web_people',$data); # 21
        //echo $this->db->last_query(); die();
    }
    #xxxxxxxxxxxxxxxxxxxxxx Insert data into web_people in mis xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // db 1 end
    // insert data in another database

    function insert_bank_fee_admission($bank_fee_details)
    {
        $this->db->insert('bank_fee_details',$bank_fee_details); # 21
        //echo $this->db->last_query(); die();
    }

    function insert_users2($data)//1
    {
        $this->db2->insert('users',$data);

    }
    function insert_user_details2($data)//2
    {
        $this->db2->insert('user_details',$data);

    }
    function insert_user_other_details2($data)//3
    {
        $this->db2->insert('user_other_details',$data);

    }
    function insertbatch_user_address2($data)//4
    {
        $this->db2->insert_batch('user_address',$data);

    }
    function insert_stu_academic2($data)//5
    {
        $this->db2->insert('stu_academic',$data);

    }
    function insert_stu_admn_fee2($data)//6
    {
        $this->db2->insert('stu_admn_fee',$data);

    }
    function insert_stu_details2($data)//7
    {
        $this->db2->insert('stu_details',$data);

    }
    function insert_stu_other_details2($data)//8
    {
        $this->db2->insert('stu_other_details',$data);

    }
    function insertbatch_stu_prev_education2($data)//9
    {
        $this->db2->insert_batch('stu_prev_education',$data);

    }
    function insertbatch_stu_prev_certificate2($data)//10
    {
        $this->db2->insert_batch('stu_prev_certificate',$data);

    }
    function insert_stu_enroll_passout2($data)//8
    {
        $this->db2->insert('stu_enroll_passout',$data);

    }
    function insert_reg_regular_fee2($data)//11
    {
        $this->db2->insert('reg_regular_fee',$data);
        $lastid = $this->db2->insert_id();
        return $lastid;
    }
    function insert_reg_regular_fee_25_11_2019($data)//12
    {
        $this->db2->insert('reg_regular_fee_25-11-2019',$data);
        $lastid = $this->db2->insert_id();
        return $lastid;
    }
    function insert_reg_regular_form2($data)//12
    {
        $this->db2->insert('reg_regular_form',$data);

    }
    function insert_reg_form2($data)//12
    {
        $this->db2->insert('reg_form',$data);

    }
    function insert_fb_student_feedback2($data)//14
    {
        $this->db2->insert('fb_student_feedback',$data);

    }
    function insert_hostel2($data)//14
    {
        $this->db2->insert('hs_assigned_student_room_newadd',$data); // hs_assigned_student_room

      }
    function insert_hs_student_allotment_list2($data)//14
   {
       $this->db2->insert('hs_student_allotment_list_newadd',$data); // hs_student_allotment_list


      }
    function insertPreparatory2($admn_no='')//13
    {
        $curr_year = date("Y");
        $curr_session_year = ($curr_year).'-'.($curr_year+1);

            if($admn_no!='')
            {
                $data = array('admn_no'=>$admn_no, 'session_year'=>$curr_session_year);
                $this->db2->insert('stu_prep_data', $data);
            }
    }
    // Email Registraion || IITISM Email DB(misdev)
   function insert_email_form2($data)//18
   {
       $this->db2->insert('email_form',$data);

   }
   function insert_emaildata2($data)//18
   {
       $this->db2->insert('emaildata',$data); // 19

   }
   // End Email Registraion || IITISM Email
   #xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx Insert stu_section_data table for group section data xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
   function insert_stu_section_data2($data)
   {
       $this->db2->insert('stu_section_data',$data); # 20

   }
   #xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx Insert stu_section_data table for group section data xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

   #xxxxxxxxxxxxxxxxxxxxxx Insert data into web_people in mis xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
   function insert_web_people2($data)
   {
       $this->db2->insert('web_people',$data); # 21

   }
   #xxxxxxxxxxxxxxxxxxxxxx Insert data into web_people in mis xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

   #xxxxxxxxxxxxxxxxxxxxxxxxxxxx Insert hs_info in mis xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
   function insert_hs_info2($data)//14
   {
       $this->db2->insert('hs_info',$data);

   }


   function insert_bank_fee_mis($bank_fee_details)
    {
        $this->db2->insert('bank_fee_details',$bank_fee_details); # 21
        //echo $this->db->last_query(); die();
    }

    function insert_bank_fee_parent($bank_fee_details)
    {
        $this->db5->insert('bank_fee_details',$bank_fee_details); # 21
        //echo $this->db->last_query(); die();
    }

   function check_tab4_status($registration_no)//14
   {
       $query = $this->db->select('tab4')
                        ->from('adm_phdpt_mis_registration_tab')
                        // ->where('admn_no',$admn_no)
                        ->where('registration_no',$registration_no)
                        ->get();

       if ($query->num_rows() > 0) {
        return $query->result_array()[0]['tab4'];
       }
       else{
        return false;
       }

   }

   public function get_course_details($course_id)
   {
      $query = $this->db2->select('name')
                        ->from('cbcs_courses')
                        ->where('id',$course_id)
                        ->get();

       if ($query->num_rows() > 0) {
        return $query->result_array()[0]['name'];
       }
       else {
        return false;
       }
   }

   function get_pk_id_add_1_emaildata2()
  {
    $query = $this->db2->query('SELECT MAX(pk) + 1 AS pk FROM emaildata');
    if($query->num_rows() > 0)
    {
     return $query->row_array();
    }
  }


   #xxxxxxxxxxxxxxxxxxxxxxxxxxx Insert hs_info in mis xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

   #xxxxxxxxxxxxxxxxxxxxxx Insert data into people in iitism website xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
   function insert_web_people_iitism_web($data)
   {
      $this->db4->insert('people',$data);
   }
   #xxxxxxxxxxxxxxxxxxxxxx Insert data into people in iitism website xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

   #XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX END DB2 INSERT XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
    // end insert data in another database

    function get_passout_year($course_id)
    {
      $query3= $this->db->get_where('cs_courses',array('id'=> $course_id));
      //echo $this->db->
        $r5=$query3->row_array();
        return $r5;
    }

    function get_emaildata($admn_no)
  {
    $this->db2->select('domain_name,password');
    $query = $this->db2->get_where('emaildata',['admission_no' => $admn_no]);
    if($query->num_rows() > 0)
    {
     return $query->row_array();
    }
  }
}

?>


<?php
/////////////////////////////////////////////////////////////////
//                                                             //
//               phd QUERY START                               //
//                                                             //
//                                                             //
/////////////////////////////////////////////////////////////////

class Adm_phdpt_personal_details_model extends CI_Model {

    private $tabulation='mislive';
    // private $tabulation='mistest';
    function __construct(){
      parent::__construct();
      $CI =& get_instance();
      $this->db2 = $CI->load->database($this->tabulation, TRUE); // mislive
    }


   public $table_name="adm_phdpt_appl_ms";
   public $appl_program="adm_phdpt_reg_appl_program";
   public $address="adm_phdpt_address";
   public $tab="adm_phdpt_tab";
   public $phd_fello="adm_phdpt_fellowship";
   public $qualification="adm_phdpt_qulaification";
   public $work_exp="adm_phdpt_work_exp";
   public $document="adm_phdpt_doc";
   public $iit="adm_phdpt_iit_ms";

   // phd query start



   public function get_work_exp_row($reg_no)
   {
     $query=$this->db->get_where($this->work_exp,array('registration_no'=>$reg_no));
     if($query->num_rows() >0)
     return $query->result_array();
   }


   public function delete_all_work_experince($reg_no)
    {
        $cond=array(
          'registration_no'=>$reg_no,
        );
        $query=$this->db->delete($this->work_exp,$cond);
        $this->db2->delete($this->work_exp,$cond);
        //  echo $this->db->last_query();
        //   exit;
        if($query)
        {
          return true;
        }
        else
        {
          return false;
        }
    }

    public function delete_total_work_experince_details($reg_no)
    {
        $cond=array(
          'registration_no'=>$reg_no,
        );
        $query=$this->db->delete('adm_phdpt_total_work_exp',$cond);
        $this->db2->delete('adm_phdpt_total_work_exp',$cond);
        //  echo $this->db->last_query();
        //   exit;
        if($query)
        {
          return true;
        }
        else
        {
          return false;
        }
    }

   public function get_phd_fello_row($reg_no)
   {
     $query=$this->db->get_where($this->phd_fello,array('registration_no'=>$reg_no));
     if($query->num_rows() >0)
     return $query->result_array();
   }

   public function get_qual_row($reg_no)
   {
     $query=$this->db->get_where($this->qualification,array('registration_no'=>$reg_no));
     if($query->num_rows() >0)
     return $query->result_array();
   }


   public function delete_row_work_experince($con)
   {
     $query=$this->db->delete($this->work_exp,$con);
     $this->db2->delete($this->work_exp,$con);
    //  echo $this->db->last_query();
    //  exit;
     if($query)
     {
       return "ok";
     }
     else
     {
       return "not";
     }
   }

   public function delete_row_work_qualification($con)
   {

    $query=$this->db->delete($this->qualification,$con);
    $this->db2->delete($this->qualification,$con);
    // echo $this->db->last_query();
    //  exit;
    if($query)
    {
      return "ok";
    }
    else
    {
      return "not";
    }

   }

   public function get_qualification10_details($reg_no)
   {
     $cond=array(
      'registration_no'=>$reg_no,
      'exam_type='=>'10 th',
     );
     $query=$this->db->get_where($this->qualification,$cond);
     if($query->num_rows() >0)
     return $query->result_array();
   }

   public function check_phd_fello_row($reg,$serial)
   {
     $cond=array(
      'registration_no'=>$reg,
      'fellowship_serial_no='=>$serial,
     );
     $query=$this->db->get_where($this->phd_fello,$cond);
     if($query->num_rows() >0)
     return $query->result_array();
   }

   public function check_qualification_row($reg,$exam)
   {
     $cond=array(
      'registration_no'=>$reg,
      'exam_type='=>$exam,
     );
     $query=$this->db->get_where($this->qualification,$cond);
     if($query->num_rows() >0)
     return $query->result_array();
   }


   public function get_qualification12_details($reg_no)
   {
     $cond=array(
      'registration_no'=>$reg_no,
      'exam_type='=>'12 th',
     );
     $query=$this->db->get_where($this->qualification,$cond);
     if($query->num_rows() >0)
     return $query->result_array();
   }

   public function get_qualificationug_details($reg_no)
   {
     $cond=array(
      'registration_no'=>$reg_no,
      'exam_type='=>'UG Exam',
     );
     $query=$this->db->get_where($this->qualification,$cond);
     if($query->num_rows() >0)
     return $query->result_array();
   }

   public function get_qualificationpg1_details($reg_no)
   {
    $cond=array(
      'registration_no'=>$reg_no,
      'exam_type'=>'PG1 Exam',
     );
     $query=$this->db->get_where($this->qualification,$cond);
     if($query->num_rows() >0)
     return $query->result_array();
   }
   public function get_qualificationpg2_details($reg_no)
   {
    $cond=array(
      'registration_no'=>$reg_no,
      'exam_type'=>'PG2 Exam',
     );
     $query=$this->db->get_where($this->qualification,$cond);
     if($query->num_rows() >0)
     return $query->result_array();
   }

   public function get_expreince_details($reg_no)
   {
    // $query=$this->db->get_where($this->work_exp,array('registration_no'=>$reg_no));
     $where=array('registration_no ' => $reg_no);
        $this->db->select('*');
        $this->db->from($this->work_exp);
        $this->db->where($where);
        $this->db->limit(1);
        $query = $this->db->get();
     if($query->num_rows() >0)
     return $query->result_array();
   }

   public function tot_exp_details($reg_no){

    $where=array('registration_no ' => $reg_no);
    $this->db->select('*');
    $this->db->from('adm_phdpt_total_work_exp');
    $this->db->where($where);
    $this->db->limit(1);
    $query = $this->db->get();
    if($query->num_rows() >0)
    return $query->result_array();
   }


   public function get_fellowship_list($ass_type,$reg)
   {

    $myquery = "SELECT t.*,p.registration_no,t.fellowship_type FROM adm_phdpt_fellowship_ms t
    JOIN adm_phdpt_reg_appl_program AS p ON t.adm_category=p.phd_in
    WHERE t.assistance_type='".$ass_type."' and p.registration_no='".$reg."' GROUP BY t.fellowship_type";
    $query = $this->db->query($myquery);
    // echo $this->db->last_query();die();
     if($query->num_rows() >0)
     return $query->result();
   }
   public function get_fellowship_list_without_iit($ass_type)
   {
     $myquery = "SELECT t.*,t.fellowship_type,COUNT(t.fellowship_type) FROM adm_phdpt_fellowship_ms t WHERE t.assistance_type='".$ass_type."' AND t.fellowship_type !='IITGR' GROUP BY t.fellowship_type";
     $query = $this->db->query($myquery);
     if($query->num_rows() >0)
     return $query->result();
   }

   public function get_expreince_details_dynamic($reg_no)
   {
    $myquery = "SELECT * FROM `adm_phdpt_work_exp` WHERE `registration_no` = '".$reg_no."' order by id LIMIT 1,50";
    $query = $this->db->query($myquery);
     if($query->num_rows() >0)
     return $query->result_array();
   }

   public function get_d_expreince_details($reg_no)
   {

     //$query=$this->db->get_where($this->work_exp,array('registration_no'=>$reg_no));
     $where=array('registration_no ' => $reg_no);
     $this->db->select('*');
     $this->db->from($this->work_exp);
     $this->db->where($where);
     $this->db->limit(1, 30);
     $query = $this->db->get();
     if($query->num_rows() >0)
     return $query->result();
   }

   public function get_phd_fello_score_details_one($reg_no)
   {
      $cond=array(
        'registration_no'=>$reg_no,
        'fellowship_serial_no'=>'one',
      );
      $query=$this->db->get_where($this->phd_fello,$cond);
      if($query->num_rows() >0)
      return $query->result_array();

   }

   public function get_phd_fello_score_details_two($reg_no)
   {
      $cond=array(
        'registration_no'=>$reg_no,
        'fellowship_serial_no'=>'two',
      );
      $query=$this->db->get_where($this->phd_fello,$cond);
      if($query->num_rows() >0)
      return $query->result_array();

   }
   public function get_phd_fello_score_details_three($reg_no)
   {
      $cond=array(
        'registration_no'=>$reg_no,
        'fellowship_serial_no'=>'three',
      );
      $query=$this->db->get_where($this->phd_fello,$cond);
      if($query->num_rows() >0)
      return $query->result_array();

   }
   public function get_phd_fello_score_details_four($reg_no)
   {
      $cond=array(
        'registration_no'=>$reg_no,
        'fellowship_serial_no'=>'four',
      );
      $query=$this->db->get_where($this->phd_fello,$cond);
      if($query->num_rows() >0)
      return $query->result_array();

   }
   public function get_phd_fello_score_details_iit($reg_no)
   {
      $cond=array(
        'registration_no'=>$reg_no,
        'fellowship_serial_no'=>'IIT Fellow',
      );
      $query=$this->db->get_where($this->phd_fello,$cond);
      if($query->num_rows() >0)
      return $query->result_array();

   }

   public function get_iitname_details()
   {
     $query=$this->db->query("select q.* from adm_phdpt_iit_ms q");
     if($query->num_rows() >0)
     return $query->result();
   }


   public function get_non_min_work_exp($reg_no)
   {

    $cond=array(
      'registration_no'=>$reg_no,
      'non_min_work_exp'=>'Y'
    );
    $myquery = "select g.non_min_work_exp from adm_phdpt_reg_appl_program g where g.registration_no='".$reg_no."' and  g.non_min_work_exp='Y'";
    $query = $this->db->query($myquery)->row();
    if ($query)
    {
      return $query->non_min_work_exp;
    }
    else
    {
      return 'N';
    }

   }


   public function get_p_address_details($reg_no)
   {
     $cond=array(
      'registration_no'=>$reg_no,
      'address_type'=>'P'
     );
     $query=$this->db->get_where($this->address,$cond);
     if($query->num_rows() >0)
     return $query->result();
   }

   public function get_c_address_details($reg_no)
   {
     $cond=array(
       'registration_no'=>$reg_no,
       'address_type'=>'C'
     );
     $query=$this->db->get_where($this->address,$cond);
     if($query->num_rows() >0)
     return $query->result();
   }

   public function get_state()
   {
     $query = $this->db->query("select q.* from adm_phdpt_state_ms q");
     // echo $this->db->last_query();
     // exit;
     if($query->num_rows() > 0)
     return $query->result();
     else
     return false;
   }


    public function update_phd_fello_details($data,$reg,$con)
    {
      $where = array(
        'registration_no' => $reg,
        'fellowship_serial_no'=>$con

      );
      $this->db->update($this->phd_fello, $data , $where);
      $this->db2->update($this->phd_fello, $data , $where);
      if ( $this->db->affected_rows() == '1' && $this->db2->affected_rows() == '1'  )
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }


    public function update_nirf_cfti_details($data,$reg,$flag)
    {
      $where = array(
        'registration_no' => $reg

      );
      $this->db->update($this->table_name, $data , $where);
      $this->db2->update($this->table_name, $data , $where);
      if ( $this->db->affected_rows() == '1' && $this->db2->affected_rows() == '1'  )
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }

    public function update_qualification($data,$reg,$type)
    {
      $where = array(
        'registration_no' => $reg,
        'exam_type'=>$type,
      );
      $this->db->update($this->qualification, $data , $where);
      $this->db2->update($this->qualification, $data , $where);
      if ( $this->db->affected_rows() == '1' )
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }

    public function delete_qualification_pg($condition)
    {
      $query=$this->db->delete($this->qualification,$condition);
      $this->db2->delete($this->qualification,$condition);
      //  echo $this->db->last_query();
      //   exit;
      if($query)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    public function update_c_address($data,$reg)
    {
      $where = array(
        'registration_no' => $reg,
        'address_type'=>'C',
      );
      $this->db->update($this->address, $data , $where);
      $this->db2->update($this->address, $data , $where);
      if ( $this->db->affected_rows() == '1' )
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }
    public function update_p_address($data,$reg)
    {
      $where = array(
        'registration_no' => $reg,
        'address_type'=>'P',
      );
      $this->db->update($this->address, $data , $where);
      $this->db2->update($this->address, $data , $where);
      if ( $this->db->affected_rows() == '1' )
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }


   //phd query end



   public function get_tab_prog_apply($reg_no)
    {
      $cond=array(
        'registration_no'=>$reg_no,
        'prom_apply_status'=>'program applied',

      );
      $query=$this->db->get_where($this->tab,$cond);
      if($query->num_rows() >0)
      {
        return $query->result_array();
      }
      else {
        return false;
      }

    }
    public function get_registration($data)
    {
      $query=$this->db->insert($this->table_name,$data);
      $this->db2->insert($this->table_name,$data);
     //  echo $this->db->last_query();
     //   exit;
      if($query)
      {
        return true;
      }
      else
      {
        return false;
      }
    }
    public function insert_address($data)
    {
      $query=$this->db->insert($this->address,$data);
      $this->db2->insert($this->address,$data);
      //  echo $this->db->last_query();
      //   exit;
      if($query)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    public function insert_document($data)
    {

      $query=$this->db->insert($this->address,$data);
      $this->db2->insert($this->address,$data);

      if($query)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    public function insert_phd_fello_details($data)
    {
      $query = $this->db->insert($this->phd_fello,$data);

      $query2 = $this->db2->insert($this->phd_fello,$data);
      //  echo $this->db->last_query();
      //   exit;
      if($query && $query2)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    public function insert_qualification($data)
    {
      $query=$this->db->insert($this->qualification,$data);
      $this->db2->insert($this->qualification,$data);
      //  echo $this->db->last_query();
      //   exit;
      if($query)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    public function insert_fellowship($data)
    {
      $query=$this->db->insert($this->qualification,$data);
      //  echo $this->db->last_query();
      //   exit;
      if($query)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    public function insert_qualification_batch($data)
    {
      $res=$this->db->insert_batch($this->qualification,$data);
      $this->db2->insert_batch($this->qualification,$data);

        // echo $this->db->last_query();
        // exit;
        if($res)
        {

        return true;
        }
        else
        {
        return false;
        }
    }

    public function insert_work_experince($data)
    {
      $query=$this->db->insert($this->work_exp,$data);
      $this->db2->insert($this->work_exp,$data);
      //  echo $this->db->last_query();
      //   exit;
      if($query)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    public function insert_work_experince_batch($data)
    {
      $res=$this->db->insert_batch($this->work_exp,$data);
      $this->db2->insert_batch($this->work_exp,$data);
        // echo $this->db->last_query();
        // exit;
        if($res)
        {

        return true;
        }
        else
        {
        return false;
        }
    }

    public function insert_total_experince_d_batch($data)
    {
      $res=$this->db->insert_batch('adm_phdpt_total_work_exp',$data);
      $this->db2->insert_batch('adm_phdpt_total_work_exp',$data);
        // echo $this->db->last_query();
        // exit;
        if($res)
        {

        return true;
        }
        else
        {
        return false;
        }
    }

    public function insert_document_val($data)
    {
      $cond=array(
        'registration_no' =>$data['registration_no'],
        'doc_id' =>$data['doc_id']
      );
      $fetch=$this->db->get_where($this->document,$cond);
      //  echo $this->db->last_query();
      //   exit;
      if($fetch->num_rows() >0)
      {
        $where = array(
          'registration_no' =>$data['registration_no'],
          'doc_id' =>$data['doc_id']
        );
        $this->db->update($this->document, $data , $where);
        $this->db2->update($this->document, $data , $where);
        if( $this->db->affected_rows() == '1')
        {
          return TRUE;
        }
        else
        {
          return FALSE;
        }

      }
      else
      {
        $query=$this->db->insert($this->document,$data);
        $this->db2->insert($this->document,$data);
        if($query)
        {
          return true;
        }
        else
        {
          return false;
        }
      }
    }
    public function remove_document_val($condition)
    {
      //echo 'reached this model'; //exit;
      $reg_no = $condition['registration_no'];
      $doc_id = $condition['doc_id'];

      //exit;
      // $CI = &get_instance();
      // $this->db2 = $this->load->database($this->tabulation,TRUE);
      $query=$this->db->select('*')
                ->from('adm_phdpt_doc')
                ->where('registration_no',$reg_no)
                ->where('doc_id',$doc_id)
                ->get();

                //echo $this->db->last_query(); die();
      if ($query->num_rows() > 0) {
        $query=$this->db->delete($this->document,$condition);
        $query2=$this->db2->delete($this->document,$condition);
        // echo $this->db->last_query(); die();
        // exit;
      if($query && $query2)
      {
        return true;
      }
      else
      {
        return false;
      }
    }
    else {
      return false;
    }
    }

    public function check_tab($reg_id)
    {
      $stmt="SELECT GREATEST(IFNULL(tab1,0),IFNULL(tab2,0),IFNULL(tab3,0),IFNULL(tab4,0)) highest
        FROM adm_phdpt_tab WHERE registration_no='$reg_id'";
      $query=$this->db->query($stmt);
      if($query->num_rows()>0)
      {
        return $query->result();
      }
      else
      {
        return false;
      }

    }
    public function get_tab_status($reg_no)
    {
      $query=$this->db->get_where($this->tab,array('registration_no'=>$reg_no));
      if($query->num_rows() >0)
      return $query->result_array();
    }

    public function insert_total_exp_details($data_total_exp){
      $this->db->insert('adm_phdpt_total_work_exp',$data_total_exp);
    }

    public function get_adm_phd_appl_ms($reg_no)
    {
      $query=$this->db->get_where($this->table_name,array('registration_no'=>$reg_no));
      if($query->num_rows() >0)
      return $query->result_array();
    }
    public function get_adm_phd_reg_appl_program($reg_no)
    {
      $query=$this->db->get_where($this->appl_program,array('registration_no'=>$reg_no));
      if($query->num_rows() >0)
      return $query->result_array();
    }

    public function get_all_document_uploaded($reg_no)
    {
       $query=$this->db->get_where($this->document,array('registration_no'=>$reg_no));
       if($query->num_rows() >0)
       return $query->result_array();
    }
    public function update_personal_deatils($data,$reg)
    {
      $where = array('registration_no' => $reg );
      $this->db->update($this->table_name, $data , $where);
      $this->db2->update($this->table_name, $data , $where);
      if ( $this->db->affected_rows() == '1' )
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }

    public function update_project_deatils_yes_no($data,$reg)
    {
      $where = array('registration_no' => $reg );
      $this->db->update($this->table_name, $data , $where);
      $this->db2->update($this->table_name, $data , $where);
      if ( $this->db->affected_rows() == '1' )
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }
    public function update_tab1($data,$reg)
    {
      $where = array('registration_no' => $reg );
      $this->db->update($this->tab, $data , $where);
      $this->db2->update($this->tab, $data , $where);
      if ( $this->db->affected_rows() == '1' )
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }
    public function time_of_email_send($data,$email)
    {
      $where = array( 'email' => $email );
      $this->db->update($this->table_name, $data , $where);
      $this->db2->update($this->table_name, $data , $where);
      if ( $this->db->affected_rows() == '1' )
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }


    public function verify_email_time($data,$email)
    {
      $where = array( 'email' => $email );
      $this->db->update($this->table_name, $data , $where);
      $this->db2->update($this->table_name, $data , $where);
      if ( $this->db->affected_rows() == '1' )
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }
    public function get_appl_no_by_reg_id($reg)
    {
      // echo $reg;
      // exit;
      $myquery = "select g.appl_no from adm_phdpt_appl_ms g where g.reg_no='".$reg."'";
      $query = $this->db->query($myquery)->row();
      if($query)
      {
        return $query->appl_no;
      }
      else
      {
        return false;
      }
    }
    public function check_registration_no($val)
    {
      $myquery = "select g.registration_no,g.verification from adm_phdpt_registration g where g.registration_no='".$val."'";
      $query = $this->db->query($myquery);
      if ($query)
      {
        return $query->result();
      }
      else
      {
        return false;
      }
    }
    public function get_registration_id_by_email($email)
    {
      $myquery = "select g.reg_id from adm_phdpt_registration g where g.email='".$email."'";
      $query = $this->db->query($myquery)->row();
      if ($query)
      {
        return $query->reg_id;
      }
      else
      {
        return false;
      }
    }
    public function get_registration_detail_by_email($email)
    {
      $myquery = "select g.registration_no,g.reg_id,g.first_name,g.middle_name,g.last_name,g.category,g.pwd,g.mobile,g.email,g.dob,g.btech_flag,g.math_stat_flag,g.email  from adm_phdpt_registration g where g.email='".$email."'";
      $query = $this->db->query($myquery);
      if ($query)
      {
        return $query->result();
      }
      else
      {
        return false;
      }
    }
    public function set_user_password($data,$email)
    {
      $where = array( 'email' => $email );
      $this->db->update($this->table_name, $data , $where);
      $this->db2->update($this->table_name, $data , $where);
      if ( $this->db->affected_rows() == '1' )
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }
    public function set_track_email($data,$email)
    {
      $where = array( 'email' => $email );
      $this->db->update($this->table_name, $data , $where);
      $this->db2->update($this->table_name, $data , $where);
      // echo $this->db->last_query();
      // exit;
      if ( $this->db->affected_rows() == '1' )
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }
    //////////////////////////////////////////////////////// login query
    public function login($data)
    {

      $stmt="select t.* from adm_phdpt_registration t where t.registration_no='".$data['registration_no']."' and t.password='".$data['password']."' and t.verification='".$data['verification']."'";
      $query=$this->db->query($stmt);
      // echo $this->db->last_query();
      // exit;
      if($query->num_rows()>0)
      {
        return $query->result();
      }
      else
      {
       return false;
      }

      // $val=$this->db->select('*')
      //       ->from($this->table_name)
      //       ->where('registration_no ='.$data['registration_no'].' and password ='.$data['password'].' and verification =='.$data['verification'])
      //       // ->where('T.year <='.$where['s_year'].' and T.month <='.$where['s_month'])
      //       ->get()->result();
      //    if($val)
      //    {
      //      return true;
      //    }
      //    else{
      //      return false;
      //    }
    }
    public function get_email_registration($data)
    {
      $myquery = "select g.* from adm_phdpt_registration g where g.registration_no='".$data['registration_no']."'";
      $query = $this->db->query($myquery);
      if ($query)
      {
        return $query->result();
      }
      else
      {
        return false;
      }
    }

    /////////////////////////////////////////////////////////////////
    //                                                             //
    //                       Version 2 modification                //
    //                                                             //
    //                                                             //
    /////////////////////////////////////////////////////////////////


    public function get_specialization($pro_id)
    {
      $query=$this->db->get_where('adm_phdpt_specialization_ms',array('program_id'=>$pro_id));
      if($query->num_rows() >0)
      return $query->result();
    }

    public function get_faculty($pro_id)
    {
      // $query=$this->db->get_where('adm_phdpt_faculty_ms',array('dept_id'=>$pro_id));
      // if($query->num_rows() >0)
      // return $query->result();

      $myquery = "SELECT a.id emp_id,CONCAT_WS(' ',a.salutation,a.first_name,a.middle_name,a.last_name) faculty_desc FROM user_details a
        INNER JOIN emp_basic_details b ON a.id=b.emp_no
        INNER JOIN users c ON c.id=a.id
        WHERE c.`status`='A' AND b.auth_id='ft' AND designation NOT IN ('Inst PDF') AND a.dept_id='".$pro_id."'
        ORDER BY CAST(a.id AS INT)";
      $query = $this->db2->query($myquery);
      if ($query)
      {
        return $query->result();
      }
      else
      {
        return false;
      }
    }


    /////////////////////////////////////////////////////////////////
    //                                                             //
    //                           THE END                           //
    //                                                             //
    //                                                             //
    /////////////////////////////////////////////////////////////////


}
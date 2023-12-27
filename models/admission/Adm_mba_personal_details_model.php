
 
<?php
/////////////////////////////////////////////////////////////////
//                                                             //
//               MBA query model is start                      //
//                                                             //
//                                                             //
///////////////////////////////////////////////////////////////// 
class Adm_mba_personal_details_model extends CI_Model {

  private $tabulation='mislive';  //this for mislive when do live the use below one
  function __construct(){
    parent::__construct();
    $CI =& get_instance();
    $this->db2 = $CI->load->database($this->tabulation, TRUE); // mislive
  }
   public $table_name="adm_mba_appl_ms";
   public $appl_program="adm_mba_reg_appl_program";
   public $address="adm_mba_address";
   public $tab="adm_mba_tab";
   public $cat="adm_mba_fellowship";
   public $qualification="adm_mba_qulaification";
   public $work_exp="adm_mba_work_exp";
   public $document="adm_mba_doc";
   public $iit="adm_mba_iit_ms";
   public $priority_interview="adm_mba_interview_priority";
   
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

   public function get_cat_row($reg_no)
   {
     $query=$this->db->get_where($this->cat,array('registration_no'=>$reg_no));
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

   public function get_qualificationpg_details($reg_no)
   { 
    $cond=array(
      'registration_no'=>$reg_no,
      'exam_type'=>'PG Exam',
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

   public function get_expreince_details_dynamic($reg_no)
   { 
    $myquery = "SELECT * FROM `adm_mba_work_exp` WHERE `registration_no` = '".$reg_no."' order by id LIMIT 1,50";
    $query = $this->db->query($myquery);
    // $query=$this->db->get_where($this->work_exp,array('registration_no'=>$reg_no));
    //  $where=array('registration_no ' => $reg_no);
    //     $this->db->select('*');
    //     $this->db->from($this->work_exp);
    //     $this->db->where($where);
    //     $this->db->limit(1);
    //     $query = $this->db->get();
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

   public function get_cat_score_details($reg_no)
   {
     $query=$this->db->get_where($this->cat,array('registration_no'=>$reg_no));
     if($query->num_rows() >0)
     return $query->result();
   }

   public function get_iitname_details()
   {
     $query=$this->db->query("select q.* from adm_mba_iit_ms q");
     if($query->num_rows() >0)
     return $query->result();
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
     $query = $this->db->query("select q.* from adm_mba_state_ms q");
     // echo $this->db->last_query();
     // exit;
     if($query->num_rows() > 0)
     return $query->result();
     else
     return false;
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
    public function insert_cat_details($data)
    {
      $query=$this->db->insert($this->cat,$data);
      $this->db2->insert($this->cat,$data);
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
    public function update_cat_details($data,$reg)
    {
      $where = array(
        'registration_no' => $reg, 
        
      );
      $this->db->update($this->cat, $data , $where);
      $this->db2->update($this->cat, $data , $where);
      if ( $this->db->affected_rows() == '1' ) 
      {
        return TRUE;
      }
      else 
      {
        return FALSE;
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
    

    public function insert_int_cal_priority($data)
    {
      $query=$this->db->insert($this->priority_interview,$data);
      $this->db2->insert($this->priority_interview,$data);
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

    public function get_call_int_loc($reg)
    {
      
      $query=$this->db->get_where($this->priority_interview,array('registration_no'=>$reg));
       if($query->num_rows() >0)
       return $query->result();
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

    public function update_int_loc_priority($data,$reg)
    {
      $where = array(
        'registration_no' => $reg,
      );
      $this->db->update($this->priority_interview, $data , $where);
      $this->db2->update($this->priority_interview, $data , $where);
      if ( $this->db->affected_rows() == '1' ) 
      {
        return TRUE;
      }
      else 
      {
        return FALSE;
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

    public function insert_document_val($data)
    { 
      // $cond=array(
      //   'registration_no' =>$data['registration_no'],
      //   'doc_id' =>$data['doc_id']
      // );
      // $fetch=$this->db->get_where($this->document,$cond);
       
      // if($fetch->num_rows() >0)
      // {
      //   return true;
      // }
      // else
      // {
      //   $query=$this->db->insert($this->document,$data);
       
      //   if($query)
      //   {
      //     return true;
      //   }
      //   else
      //   {
      //     return false;
      //   }
      // }
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
      $query=$this->db->delete($this->document,$condition); 
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

    public function check_tab($reg_id)
    {
      $stmt="SELECT GREATEST(IFNULL(tab1,0),IFNULL(tab2,0),IFNULL(tab3,0),IFNULL(tab4,0),IFNULL(tab5,0)) highest
        FROM adm_mba_tab WHERE registration_no='$reg_id'";
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

    public function get_adm_mba_appl_ms($reg_no)
    {
      $query=$this->db->get_where($this->table_name,array('registration_no'=>$reg_no));
      if($query->num_rows() >0)
      return $query->result_array();
    }
    public function get_adm_mba_reg_appl_program($reg_no)
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
      $myquery = "select g.appl_no from adm_mba_appl_ms g where g.reg_no='".$reg."'";
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
      $myquery = "select g.registration_no,g.verification from adm_mba_registration g where g.registration_no='".$val."'";
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
      $myquery = "select g.reg_id from adm_mba_registration g where g.email='".$email."'";
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
      $myquery = "select g.registration_no,g.reg_id,g.first_name,g.middle_name,g.last_name,g.category,g.pwd,g.mobile,g.email,g.dob,g.btech_flag,g.math_stat_flag,g.email  from adm_mba_registration g where g.email='".$email."'";
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

      $stmt="select t.* from adm_mba_registration t where t.registration_no='".$data['registration_no']."' and t.password='".$data['password']."' and t.verification='".$data['verification']."'";
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
    }
    public function get_email_registration($data)
    {
      $myquery = "select g.* from adm_mba_registration g where g.registration_no='".$data['registration_no']."'";
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

    //add by govind sahu on 07-07-2021 end 

}

<?php
/////////////////////////////////////////////////////////////////
//                                                             //
//               MBA query model is start                      //
//                                                             //
//                                                             //
///////////////////////////////////////////////////////////////// 
class Adm_mtech_document_model extends CI_Model {

    function __construct(){
      parent::__construct();
    }

    public $table_name="adm_mtech_appl_ms";
    public $tab="adm_mtech_tab";
    public $gate="adm_mtech_fellowship";
    public $document="adm_mtech_doc";
    public $qualification="adm_mtech_qulaification";

    
    public function get_coap_no_by_reg($reg)
    {
      $stm="SELECT coap_reg_id FROM adm_mtech_appl_ms p WHERE registration_no='".$reg."'";
      
      $row = $this->db->query($stm)->row();
      if ($row) {
        return  $maxid = $row->coap_reg_id; 
      }
    } 
    public function check_tab_fill_status($reg_no)
    {
       $cond=array(
        'registration_no' =>$reg_no,
        
      );
      $query=$this->db->get_where($this->tab,$cond);
      if($query->num_rows() >0)
      {
        return $query->result_array();
      }
      else
      {
        return false;
      }
     
    }

    public function check_color_blind_doc($reg_no)
    {
      $myquery = "SELECT * FROM adm_mtech_reg_appl_program g join adm_mtech_program_ms AS m ON g.program_id=m.program_id
      WHERE g.registration_no='".$reg_no."' AND m.color_blind='Y'";
      $query = $this->db->query($myquery);
      if($query->num_rows()> 0) 
      {
        return $query->result();
      }
      else 
      {
        return false;
      }
    }

    public function count_total_document($reg_no)
    {
      $myquery = "select g.* from adm_mtech_appl_ms g where g.registration_no= ?";
      $query = $this->db->query($myquery,$reg_no);
      if($query->num_rows()> 0) 
      {
        return $query->result();
      }
      else 
      {
        return false;
      }

    }
    
    public function check_gate_score_record($reg_no)
    {
      $query=$this->db->get_where($this->gate,array('registration_no'=>$reg_no));
      if($query->num_rows() >0)
      return $query->result_array();
    }

    public function check_pg_record($reg_no,$exam)
    {
       $cond=array(
        'registration_no' =>$reg_no,
        'exam_type' =>$exam
      );
      $query=$this->db->get_where($this->qualification,$cond);
      if($query->num_rows() >0)
      return $query->result_array();
    }

    public function count_document_id($reg_no,$docid)
    {
      // $myquery = "select g.* from adm_mtech_appl_ms g where g.registration_no=? and g.doc_id=?";
      // $query = $this->db->query($myquery,$reg_no,$docid);
      // if($query->num_rows()> 0) 
      // {
      //   return "ok";
      // }
      // else 
      // {
      //   return "not";
      // }
      $cond=array(
        'registration_no' =>$reg_no,
        'doc_id' =>$docid
      );
      $fetch=$this->db->get_where($this->document,$cond);
      //  echo $this->db->last_query();
      //   exit;
      if($fetch->num_rows() >0)
      {
        return "ok";
      }
      else 
      {
        return "not";
      }

    }

    public function get_registration($data)
    {
      $query=$this->db->insert($this->table_name,$data);
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
      if($query)
      {
        return true;
      }
      else
      {
        return false;
      }
      
    } 
    public function insert_gate_details($data)
    {
      $query=$this->db->insert($this->gate,$data);
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
    public function insert_qualification($data)
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
    public function insert_work_experince($data)
    {
      $query=$this->db->insert($this->work_exp,$data);
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
        return true;
      }
      else
      {
        $query=$this->db->insert($this->document,$data);
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
   

}
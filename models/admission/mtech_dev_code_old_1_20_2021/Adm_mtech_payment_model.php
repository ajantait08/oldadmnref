
<?php
/////////////////////////////////////////////////////////////////
//                                                             //
//               MBA query model is start                      //
//                                                             //
//                                                             //
///////////////////////////////////////////////////////////////// 
class Adm_mtech_payment_model extends CI_Model {

    function __construct(){
      parent::__construct();
    }

    public $table_name="adm_mtech_appl_ms";
    public $address="adm_mtech_address";
    public $tab="adm_mtech_tab";
    public $gate="adm_mtech_fellowship";
    public $qualification="adm_mtech_qulaification";
    public $work_exp="adm_mtech_work_exp";
    public $document="adm_mtech_doc";
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
    
    public function insert_address($data)
    {
      $query=$this->db->insert($this->address,$data);
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
    public function set_track_email($data,$email)
    {
      $where = array( 'email' => $email );
      $this->db->update($this->table_name, $data , $where);
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

}
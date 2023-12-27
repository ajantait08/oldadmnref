 
<?php
/////////////////////////////////////////////////////////////////
//                                                             //
//               MBA query model is start                      //
//                                                             //
//                                                             //
///////////////////////////////////////////////////////////////// 
class Adm_mtech_application_model extends CI_Model {

    function __construct(){
      parent::__construct();
    }

  public $table_name="adm_mtech_registration";
  public $tab="adm_mtech_tab";
  public $appl_program="adm_mtech_reg_appl_program";
  public $appl_ms="adm_mtech_appl_ms";

 
  public function get_application_fill_details($reg_no)
  {
    $myquery = "SELECT g.*,dd.degree_desc from adm_mtech_reg_appl_program g 
    INNER JOIN adm_mtech_degree_ms dd ON dd.degree_code=g.degree_id
     where g.registration_no= ?";
    $query = $this->db->query($myquery,$reg_no);
  //  echo $this->db->last_query();
  //   exit;

    if($query->num_rows()> 0) 
    {
      return $query->result();
    }
    else 
    {
      return false;
    }
  }

  public function insert_application_programme($data)
  {
    $query=$this->db->insert($this->appl_program,$data);
    if($query)
    {
      return "ok";
    }
    else
    {
      return "not";
    }
    
  }

  public function insert_application_details($data)
  {
    
    $stmt=" SELECT t.* FROM  adm_mtech_appl_ms t WHERE t.registration_no='".$data['registration_no']."' ";
    $query = $this->db->query($stmt);
    if($query->num_rows() >0) 
    { 
     
      return "ok";
    }
    else 
    {

      $query2=$this->db->insert($this->appl_ms,$data);
      if($query2)
      {
        return "ok";
      }
      else
      {
        return "not";
      }

    }

    
  }

  public function insert_mtech_tab($data)
  {
    $stmt=" SELECT t.* FROM  adm_mtech_tab t WHERE t.registration_no='".$data['registration_no']."' ";
    $query = $this->db->query($stmt);
    if($query->num_rows()>0) 
    {
      return "ok";
    }
    else 
    {
      $query=$this->db->insert($this->tab,$data);
      if($query)
      {
        return "ok";
      }
      else
      {
        return "not";
      }
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

  public function time_of_email_send($data,$email)
  {
    $where = array( 'email' => $email );
    $this->db->update($this->table_name, $data , $where);
    if ( $this->db->affected_rows() == '1' ) 
    {
      return "ok";
    }
    else 
    {
      return "fail";
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

  public function get_verify_email($email)
  {
    $myquery = "select g.verification from adm_mtech_registration g where g.email='".$email."'";
    $query = $this->db->query($myquery)->row();
    if ($query) 
    {
      return $query->verification;
    }
    else 
    {
      return false;
    }
  }  

  public function check_registration_no($val)
  {
    $myquery = "select g.registration_no,g.verification from adm_mtech_registration g where g.registration_no='".$val."'";
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

  public function get_registration_no_by_email($email)
  {
    $myquery = "select g.registration_no from adm_mtech_registration g where g.email='".$email."'";
    $query = $this->db->query($myquery)->row();
    if ($query) 
    {
      return $query->registration_no;
    }
    else 
    {
      return false;
    }
  } 

  public function get_registration_detail_by_email($email)
  {
    $myquery = "select g.registration_no,g.reg_id,g.first_name,g.middle_name,g.last_name,g.category,g.pwd,g.mobile,g.email,g.dob,g.color_blind,g.appl_type,g.email  from adm_mtech_registration g where g.email='".$email."'";
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
  ///////////////////////////////////////////////////////////login query////////////////////////////////////////////////////////
  public function login($data)
  {  

    $stmt="select t.* from adm_mtech_registration t where t.registration_no='".$data['registration_no']."' and t.password='".$data['password']."' and t.verification='".$data['verification']."'";
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
    $myquery = "select g.* from adm_mtech_registration g where g.registration_no='".$data['registration_no']."'";
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
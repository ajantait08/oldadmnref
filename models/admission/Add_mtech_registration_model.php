 
<?php
/////////////////////////////////////////////////////////////////
//                                                             //
//               MBA query model is start                      //
//                                                             //
//                                                             //
///////////////////////////////////////////////////////////////// 
class Add_mtech_registration_model extends CI_Model {

    function __construct(){
      parent::__construct();
    }

   public $table_name="adm_mtech_registration";
   public $adm_rapl_pro="adm_mtech_reg_appl_program";


   public function get_application_programme_details($reg_no)
   {

     $myquery = "select * from adm_mtech_reg_appl_program g where g.registration_no= ?";
     
     $query = $this->db->query($myquery,$reg_no);
     if($query) 
     {
       return $query->result();
     }
     else 
     {
       return false;
     }
     
   }
 
    
   public function get_application_fill_details($reg_no)
   {
     $myquery = "select * from adm_mtech_reg_appl_program g where g.registration_no=?";
     $query = $this->db->query($myquery,$reg_no);
     if($query->num_rows() > 0 ) 
     {
       return $query->result();
     }
     else 
     {
       return false;
     }
   }
   
    public function get_registration($data)
    {
      $query=$this->db->insert($this->table_name,$data);
      // echo $this->db->last_query();
      // exit;
      if($query)
      {
        return "ok";
      }
      else
      {
        return false;
      }
    } 
    
  function insert_application_details($date)
  {
    if($this->db->insert('adm_mtech_appl_ms',$date))
    {
       return 'ok';
    }
    else
    {
      return fasle;
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

  public function gate_paper_code()
  {
    $myquery = "SELECT g.* FROM adm_mtech_gate_paper g";
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

  public function get_programme_by_gate_p_code($paper_code)
  { 
    $myquery = "SELECT t.program_id,pm.branch_desc,t.* FROM adm_mtech_gate_prog_eleg t
    inner JOIN adm_mtech_program_ms pm ON pm.program_id=t.program_id
    where t.gate_paper_code='".$paper_code."'";
    $query = $this->db->query($myquery);
    // echo $this->db->last_query();
    // exit;
    if ($query) 
    {
      return $query->result();
    }
    else 
    {
      return false;
    }
    
  }

  public function get_programme_list_of_btech()
  { 
    $myquery = "SELECT t.* FROM adm_mtech_program_ms t ";
    $query = $this->db->query($myquery);
    // echo $this->db->last_query();
    // exit;
    if ($query) 
    {
      return $query->result();
    }
    else 
    {
      return false;
    }
      
  }

  public function get_candidate_type_by_email($email)
  { 
    $myquery ="SELECT p.appl_type FROM adm_mtech_registration p WHERE p.email='".$email."'";
      $query = $this->db->query($myquery)->row();
      if ($query) 
      {
        return $query->appl_type;
      }
      else 
      {
        return false;
      }
      
  }

  public function program_elligibilty_by_programe($programe_code)
  { 
    $myquery = " SELECT dm.degree_code,dm.degree_desc,pde.program_id,pde.* FROM adm_mtech_program_deg_eleg pde
    INNER JOIN adm_mtech_degree_ms AS dm ON dm.degree_code=pde.degree_code
      WHERE pde.program_id='".$programe_code."'";
    $query = $this->db->query($myquery);
    // echo $this->db->last_query();
    // exit;
    if ($query) 
    {
      return $query->result();
    }
    else 
    {
      return false;
    }
      
  }

  public function sub_math_12th($programe_code)
  { 
    $myquery="SELECT pde.sub_math_12th  FROM adm_mtech_program_ms pde where pde.program_id= ?";
    $query=$this->db->query($myquery,array($programe_code));
    // echo $this->db->last_query();
    // exit;
    if($query->num_rows()>=1){
      return $query->result();

    }
    else
    {
      return fasle;
    }
      
  }

  public function get_mining_non_mining($data)
  { 
    $query = $this->db->get_where('adm_mtech_program_deg_eleg', $data);
    // $myquery="SELECT pde.non_min_work_exp  FROM adm_mtech_program_deg_eleg pde where pde.program_id= ? and pde.degree_code= ?";
    // $query=$this->db->query($myquery,array($data));
    // echo $this->db->last_query();
    // exit;
    if($query->num_rows()>=1){
      return $query->result();

    }
    else
    {
      return fasle;
    }
      
  }

  public function check_application_programme_details_row_id($reg_no,$prm_id)
   {
      $myquery = "select g.id from adm_mtech_reg_appl_program g where g.registration_no='".$reg_no."' and  g.program_id='".$prm_id."'";
      $query = $this->db->query($myquery,$reg_no,$prm_id)->row();
      //  echo $this->db->last_query();
      //  exit;
      if($query) 
      {
        
        return $query->id;
      }
      else 
      {
        
        return false;
      }
   }
   public function delete_applying_program($data)
   {

     $val=$this->db->delete($this->adm_rapl_pro,$data);
     if($val)
     {
       return true;
     }
     else
     {
       return false;
     }
     
   }

  public function get_paper_desc_by_p_code($p_code)
  {
    $myquery = "SELECT p.gate_paper_desc FROM adm_mtech_gate_paper p WHERE p.gate_paper_code='".$p_code."'";
    $query = $this->db->query($myquery)->row();
    if ($query) 
    {
      return $query->gate_paper_desc;
    }
    else 
    {
      return false;
    }
  }
  public function get_department_by_program_id($pro_id)
  {
    $myquery = "SELECT * FROM adm_mtech_program_ms p WHERE p.program_id='".$pro_id."'";
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
  public function get_program_desc_by_program_id($pro_id)
  {
    $myquery = "SELECT p.program_desc FROM adm_mtech_program_ms p WHERE p.program_id='".$pro_id."'";
    $query = $this->db->query($myquery)->row();
    if ($query) 
    {
      return $query->program_desc;
    }
    else 
    {
      return false;
    }
  }
  public function get_degree_desc_by_program_id($degree_code)
  {
    $myquery = "SELECT d.degree_desc FROM adm_mtech_degree_ms d WHERE d.degree_code='".$degree_code."'";
    // echo $this->db->last_query();
    // exit;
    $query = $this->db->query($myquery)->row();
    if ($query) 
    {
      return $query->degree_desc;
    }
    else 
    {
      return false;
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
    $myquery = "select * from adm_mtech_registration g where g.email='".$email."'";
    $query = $this->db->query($myquery);
    // echo $this->db->last_query();
    // exit;
    if ($query) 
    {
      return $query->result();
    }
    else 
    {
      return false;
    }
  }
  // no more use of this function public function set_user_password($data,$email)
  // {
  //   $where = array( 'email' => $email );
  //   $this->db->update($this->table_name, $data , $where);
  //   if ( $this->db->affected_rows() == '1' ) 
  //   {
  //     return TRUE;
  //   }
  //   else 
  //   {
  //     return FALSE;
  //   }
  // } 
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

  /////////////////////////////////////////////////////////////////
  //                                                             //
  //               MBA query model is start                      //
  //                                                             //
  //                                                             //
  /////////////////////////////////////////////////////////////////                                                     

  public function checkemail($id)
  {
    $stmt="select t.* from nfr_emp_registration t where t.email='$id'";
    $query=$this->db->query($stmt);
    // echo $this->db->last_query();
    // exit;
    if($query->num_rows()>0)
    {
      return "emailexit";
    }
    else
    {
      return "emailnot";
    }
  }
    
  public function get_dob_by_email($email)
  {
    $myquery = "select g.dob from nfr_emp_registration g where g.email='".$email."'";
    $query = $this->db->query($myquery)->row();
    if ($query) 
    {
      return $query->dob;
    }
    else 
    {
      return false;
    }
  }
  //add by govind sahu on 07-07-2021 end 

}
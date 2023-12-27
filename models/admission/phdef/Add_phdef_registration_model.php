 
<?php
/////////////////////////////////////////////////////////////////
//                                                             //
//               Phd query model is start                      //
//                                                             //
//                                                             //
///////////////////////////////////////////////////////////////// 
class Add_phdef_registration_model extends CI_Model {


    private $tabulation='mislive';
    function __construct(){
      parent::__construct();
       $CI =& get_instance();
       $this->db2 = $CI->load->database($this->tabulation, TRUE);
    }

    public $table_name="adm_phdef_registration";
    public $adm_rapl_pro="adm_phdef_reg_appl_program";
    public $dept="adm_phdef_dept";
    public $program="adm_phdef_program_ms";
    public $appl_ms="adm_phdef_appl_ms";
    public $email_log="adm_phdef_email_log";


    public function insert_email_log($data)
    {
      $query=$this->db->insert($this->email_log,$data);
      $this->db2->insert($this->email_log,$data);
      // echo $this->db->last_query();
      //  exit;
      if($query)
      {
        return 'ok';
      }
      else
      {
        return 'not';
      }
    }
    public function check_email_mobile_exist($email,$mob)
    {
     
      $cond=array(
        'registration_no'=>$mob,
        'email'=>$email,
        
      );
      $query=$this->db->get_where('adm_phdef_registration',$cond);
      if($query->num_rows() >0)
      {
        return 'ok';
      }
      else {
        return 'not';
      }
    }

    public function total_forget_count($email)
    {

      $con=array(
      'email_type'=>'Forget password',
      'email_to'=>$email
      );
      $query=$this->db->get_where('adm_phdef_email_log',$con);
      if($query->num_rows() >0)
      {
        return $query->result();
      }
      else 
      {
        return false;
      }
     
    }
    
    public function check_gate_paper_code_exit($cond)
    {
      
      $query=$this->db->get_where('adm_phdef_reg_appl_program',$cond);
      if($query->num_rows() >0)
      {
        return 'ok';
      }
      else {
        return 'not';
      }
    }  
    
    public function update_fee_amount($data,$reg_no)
    {
      $where = array('registration_no' => $reg_no );
      $this->db->update($this->appl_ms, $data , $where);
      $this->db2->update($this->appl_ms, $data , $where);
      if ( $this->db->affected_rows() == '1' ) 
      {
        return TRUE;
      }
      else 
      {
        return FALSE;
      }
    } 

    function insert_application_details($date)
    {
      if($this->db->insert('adm_phdef_appl_ms',$date))
      {
         return 'ok';
      }
      else
      {
        return false;
      }
    } 
   
    public function get_registration_max_id()
    {
      $maxid = 1;
      $row = $this->db->query('SELECT MAX(id) AS `maxid` FROM `adm_phdef_registration`')->row();
      if ($row) {
        return  $maxid = $row->maxid; 
      }
    } 
     
     
   public function get_application_fill_details($reg_no)
   {
     $myquery = "select * from adm_phdef_reg_appl_program g where g.registration_no=?";
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
   

   public function get_application_programme_details($reg_no)
   {
     $myquery = "select * from adm_phdef_reg_appl_program g where g.registration_no= ?";
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
  
  //  public function check_application_programme_details_row_id($reg_no,$prm_id)
  //  {
  //    $myquery = "select g.id from adm_phd_reg_appl_program g where g.registration_no= ? and  g.program_id=?";
  //    $query = $this->db->query($myquery,$reg_no,$prm_id)->row();

  //    if($query->num_rows()> 0) 
  //    {
  //      return $query->id;
  //    }
  //    else 
  //    {
  //      return false;
  //    }
  //  }
 

    // public function get_application_programme_details($reg_no)
    // {
    //   $myquery = "select * from adm_phd_reg_appl_program g where g.registration_no=?";
    //   $query = $this->db->query($myquery,$reg_no)
    //   if($query->num_rows()> 0) 
    //   {
    //     return $query->result();
    //   }
    //   else 
    //   {
    //     return false;
    //   }
    // }
    
    public function get_registration($data)
    {
      // mdn($data);
      $this->db->insert('adm_phdef_registration', $data);
      $this->db2->insert('adm_phdef_registration', $data);
      if ($this->db->affected_rows() > 0) {
          return true;
      } else {
          return false;
      }
    } 
    
    public function time_of_email_send($data,$email)
    {
      $where = array( 'email' => $email );
      $this->db->update($this->table_name, $data , $where);
      $this->db2->update($this->table_name, $data , $where);
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

    public function get_verify_email($email)
    {
      $myquery = "select g.verification from adm_phdef_registration g where g.email='".$email."'";
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

    public function check_email_exist($email)
    {
      $myquery = "select g.* from adm_phdef_registration g where g.email= ?";
      $query = $this->db->query($myquery,$email);
      if($query->num_rows()> 0) 
      {
        return "ok";
      }
      else 
      {
        return "not";
      }
    }
    public function check_mobile_exist($mobile)
    {
      $myquery = "select g.* from adm_phdef_registration g where g.mobile= ?";
      $query = $this->db->query($myquery,$mobile);
      if($query->num_rows()> 0) 
      {
        return "ok";
      }
      else 
      {
        return "not";
      }
    }
    
    public function current_day_email()
    {
    $myquery = "SELECT COUNT(*) AS total FROM adm_phdef_email_log e WHERE e.email_type='Link verification' and e.created_date >=curdate();";
      
 
     $querys = $this->db->query($myquery);
      if($querys->num_rows() >=0)
      {
        return $querys->result();
      }
      else {
        return false;
      }
     
    }
    public function check_registration_no($val)
    {
      $myquery = "select g.registration_no,g.verification from adm_phdef_registration g where g.registration_no='".$val."'";
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
      $myquery = "select g.registration_no from adm_phdef_registration g where g.email='".$email."'";
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

    public function get_password_by_email($email)
    {
      $myquery = "select g.password from adm_phdef_registration g where g.email='".$email."'";
      $query = $this->db->query($myquery)->row();
      if ($query) 
      {
        return $query->password;
      }
      else 
      {
        return false;
      }
    } 
    
    public function get_registration_detail_by_email($email)
    {
     
      $myquery = "select g.* from adm_phdef_registration g where g.email= ?";
      $query = $this->db->query($myquery,$email);
      if($query->num_rows()> 0) 
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
    //   $this->db2->update($this->table_name, $data , $where);
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
      //  $this->db2->update($this->table_name, $data , $where);
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

      $stmt="select t.* from adm_phdef_registration t where t.registration_no='".$data['registration_no']."' and t.password='".$data['password']."' and t.verification='".$data['verification']."'";
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
      $myquery = "select g.* from adm_phdef_registration g where g.registration_no='".$data['registration_no']."'";
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
    public function gate_paper_code()
    {
      $myquery = "SELECT g.* FROM adm_phdef_gate_paper g";
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
      $myquery = "SELECT t.program_id,pm.program_desc FROM adm_phdef_gate_prog_eleg t
      inner JOIN adm_phdef_program_ms pm ON pm.program_id=t.program_id
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
    public function get_programme_by_gate_without_color_b($paper_code)
    { 
      $myquery = "SELECT t.program_id,pm.program_desc FROM adm_phdef_gate_prog_eleg t
      inner JOIN adm_phdef_program_ms pm ON pm.program_id=t.program_id
      where t.gate_paper_code='".$paper_code."' AND pm.color_blind IS null";
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
      $myquery = "SELECT t.* FROM adm_phdef_program_ms t ";
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

    public function get_department_id_by_program_id($pro_id)
    { 
      $myquery ="SELECT p.dept_id FROM adm_phdef_program_ms p WHERE p.program_id='".$pro_id."'";
        $query = $this->db->query($myquery)->row();
        if ($query) 
        {
          return $query->dept_id;
        }
        else 
        {
          return false;
        }
        
    }
    public function get_programme_list_of_btech_without_color_blind()
    { 
      $myquery = "SELECT t.* FROM adm_phdef_program_ms t WHERE t.color_blind IS NULL; ";
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
    public function get_programme_list_of_btech_without_pwd()
    { 
      $myquery = "SELECT t.* FROM adm_phdef_program_ms t WHERE t.pwd  IS NULL and t.color_blind IS NULL;";
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
    public function get_programme_list_of_btech_without_pwds()
    { 
      $myquery = "SELECT t.* FROM adm_phdef_program_ms t WHERE t.pwd  IS NULL;";
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
      $myquery ="SELECT p.appl_type FROM adm_phdef_registration p WHERE p.email='".$email."'";
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
    public function get_cfti_by_reg($reg)
    { 
        // $myquery ="SELECT p.cfti_flag FROM adm_phd_registration p WHERE p.registration_no='".$reg."'";
        // $query = $this->db->query($myquery)->row();
        // if ($query) 
        // {
        //   return $query->cfti_flag;
        // }
        // else 
        // {
        //   return false;
        // }
        $sql = "select p.cfti_flag FROM adm_phdef_registration p WHERE p.registration_no=?";
        $query = $this->db->query($sql, array($reg));
        if ($this->db->affected_rows() >= 0) {
            return $query->result();
        } else {
            return false;
        }
        
    }
  
    public function program_elligibilty_by_programe($programe_code)
    { 
      $myquery = " SELECT dm.degree_code,dm.degree_desc,pde.program_id,pde.* FROM adm_phdef_program_deg_eleg pde
      INNER JOIN adm_phdef_degree_ms AS dm ON dm.degree_code=pde.degree_code
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
    public function program_phd($programe_code)
    { 
      $myquery = "SELECT * FROM adm_phdef_program_ms p JOIN adm_phdef_dept_ms AS d ON p.dept_id=d.dept_id  WHERE p.dept_id='".$programe_code."'";
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
      $myquery="SELECT pde.sub_math_12th  FROM adm_phdef_program_ms pde where pde.program_id= ?";
      $query=$this->db->query($myquery,array($programe_code));
      // echo $this->db->last_query();
      // exit;
      if($query->num_rows()>=1){
        return $query->result();
  
      }
      else
      {
        return false;
      }
        
    }
  
    public function get_mining_non_mining($data)
    { 
      // print_r($data);die;
      // $query = $this->db->get_where('adm_phd_program_deg_eleg', $data);
      $myquery="SELECT pde.non_min_work_exp  FROM adm_phdef_program_deg_eleg pde where pde.program_id= '$data[program_id]' and pde.degree_code= '$data[degree_code]'";
      $query=$this->db->query($myquery);

      // echo $this->db->last_query();
      // exit;
      // mdn added on 02-03-2022 START ###############################################################
      $result = $query->result_array();
      $count = count($result);
      if($count>0)
      {
          return $result[0];
      }
      else
      {
          return 'empty';
      }
      // mdn added 02-03-2022 END ###############################################################

      // if($query->num_rows() > 0){
      //   return $query->result();
      // }
      // else
      // {
      //   return false;
      // }
        
    }
  
    public function check_application_programme_details_row_id($reg_no,$prm_id)
     {
        $myquery = "select g.id from adm_phdef_reg_appl_program g where g.registration_no='".$reg_no."' and  g.program_id='".$prm_id."'";
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
       $this->db2->delete($this->adm_rapl_pro,$data);
       if($val)
       {
         return true;
       }
       else
       {
         return false;
       }
       
     }
     public function delete_specialization($data)
     {
  
       $val=$this->db->delete('adm_phdef_specialization',$data);
       $this->db2->delete('adm_phdef_specialization',$data);
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
      $myquery = "SELECT p.gate_paper_desc FROM adm_phdef_gate_paper p WHERE p.gate_paper_code='".$p_code."'";
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
      $myquery = "SELECT * FROM adm_phdef_program_ms p WHERE p.program_id='".$pro_id."'";
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
      $myquery = "SELECT p.program_desc FROM adm_phdef_program_ms p WHERE p.program_id='".$pro_id."'";
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
      $myquery = "SELECT d.degree_desc FROM adm_phdef_degree_ms d WHERE d.degree_code='".$degree_code."'";
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
  

  /////////////////////////////////////////////////////////////////
  //                                                             //
  //               MBA query model is start                      //
  //                                                             //
  //                                                             //
  /////////////////////////////////////////////////////////////////                                                     

    //add by govind sahu on 07-07-2021 start 

 
    public function get_specialization_reg_pro($reg,$pro_id)
    {
      $query=$this->db->get_where('adm_phdef_specialization',array('registration_no'=>$reg,'program_id'=>$pro_id));
      if($query->num_rows() >0)
      return $query->result();
    }
    //add by govind sahu on 07-07-2021 end 

}

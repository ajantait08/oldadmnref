
 
<?php
/////////////////////////////////////////////////////////////////
//                                                             //
//               MBA query model is start                      //
//                                                             //
//                                                             //
///////////////////////////////////////////////////////////////// 
class Adm_mtech_personal_details_model extends CI_Model {

    function __construct(){
      parent::__construct();
    }

   public $table_name="adm_mba_appl_ms";
  
   
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

/////////////////////////////////////////////////////////////////
//                                                             //
//               MBA query model is start                      //
//                                                             //
//                                                             //
/////////////////////////////////////////////////////////////////                                                     

    // public function login($id)
    // {  
    //   $stmt="select t.* from nfr_emp_registration t where t.email='$id[email]' and t.mobile=$id[contact] and t.dob='$id[dob]'";
    //   $query=$this->db->query($stmt);
    //   // echo $this->db->last_query();
    //   // exit;
    //   if($query->num_rows()>0)
    //   {
    //     return $query->result();
    //   }
    //   else
    //   {
    //     return false;
    //   }
    // }

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
    public function checkcombination($em,$no,$db)
    {
      $stmt="select t.* from nfr_emp_registration t where t.email='$em' and t.mobile=$no and t.dob='$db'";
      $query=$this->db->query($stmt);
      // echo $this->db->last_query();
      // exit;
      if($query->num_rows()>0)
      {
       return "exit";
      }
      else
      {
        return "not";
      }
    }
    public function insert_registration($id)
    {     
      $stmt="INSERT INTO `recruit_add_post` (`post_name`, `no_of_post`, `classification`, `scale_pay`, `selec_or_non_sel`, `age_limit`, `essential`, `experience`, `desirable`, `age_educ_direct_prom`, `probation`, `method_of_recruit`, `pro_depu_tran_grade`, `selection_committe`, `add_by`) VALUES
       ('$id[postnamme]',$id[no_of_post],'$id[classification]','$id[scale_Pay]','$id[selection]',$id[age_limit],'$id[essential]', '$id[experience]', '$id[desirable]', '$id[age_educ_direct]', '$id[probation]', '$id[method_of_recuit]', '$id[rec_promation]', '$id[selec_committee]','admin')";
      $stmt="INSERT INTO nfr_emp_registration (reg_id, salutation, name, category, aadhar_no,
      mobile, email, gender, dob, photo, 
       SIGN, `status`, created_by, created_ts)
      VALUES (NULL, '', '', '', 0, 0, '', '', NOW(), NOW(), NOW(), '', '', NOW())";
      $query=$this->db->query($stmt);
      // echo $this->db->last_query();
      // exit;
      if($query)
      {
        return "insert";
      }
      else
      {
        return "fail";
      }
    }

    public function fetch_post_adv_id($id,$email)
    {
      // $query = $this->db->query("select * from nfr_admin_advertisement_post where adv_id in (select adv_id from nfr_admin_advertisement where adv_no='$id')");
      $query = $this->db->query("SELECT *
      FROM nfr_admin_advertisement_post AS a
      INNER JOIN nfr_admin_advertisement AS b ON a.adv_id=b.adv_id
      WHERE b.adv_no ='$id' AND a.post_name NOT IN (
      SELECT a.post_name
      FROM nfr_emp_application AS a
      WHERE a.adv_no='$id' AND a.email='$email')");

      // echo $this->db->last_query();
      // exit;
      if($query->num_rows() > 0)
      return $query->result();
      else
      return false;
    }
    public function insert_tab($id,$tab)
    {
      $stmt="UPDATE nfr_tab_user SET tab1=$tab WHERE app_no='$id'";
      $query=$this->db->query($stmt);
      // echo $this->db->last_query();
      // exit;
      if($query)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    //add by govind sahu on 07-07-2021 start 
    public function check_old_nfr_application($application,$dob)
    {
	    // $query = $this->db->query("select * from nfr_admin_advertisement_post where adv_id in (select adv_id from nfr_admin_advertisement where adv_no='$id')");
      $query = $this->db->query("select ol.* from nfr_old_appl_no_dob ol where ol.dob='".$dob."' and ol.app_no='".$application."'");
      // echo $this->db->last_query();
      // exit;
      if($query->num_rows() > 0)
      return "have";
      else
      return "not";

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
<?php

class Adm_mba_admin_model extends CI_Model {

     function __construct() {
        parent::__construct();
    }

    public function login($user,$pass)
    {  
       $stmt="select t.* from nfr_admin_user t where t.uname='$user' and t.pword='$pass'";
       $query=$this->db->query($stmt);
       if($query->num_rows()>0)
       {
        return true;
       }
       else
       {
        return false;
       }
    
    }
    public function get_auth($user,$pass)
    {  
      $this->db->select('auth');
      $this->db->from('nfr_admin_user');
      $this->db->where('uname',$user);
       $this->db->where('pword',$pass);
      return $this->db->get()->row()->auth;
      
    }
    
   
}
<?php

class Adm_admin_user_model extends CI_Model
{

   function __construct()
   {
      parent::__construct();
   }

   public function admin_login($data)
   {
      $this->db->select('*');
      $this->db->from('adm_admin_users');
      $this->db->where('userid', $data['userid']);
      $this->db->where('pwd', $data['password']);
      if ($query = $this->db->get()) {
         return $query->result();
      } else {
         return false;
      }
   }
}

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Adm_mtech_dept_ms_model extends CI_Model
{

     function __construct()
     {
          // Set table name
          $this->table = 'adm_mtech_dept_ms';
     }

     function insert_data($data)
     {
          $this->db->insert($this->table, $data);
          //echo  $this->db->last_query();
          //exit;
     }

     function fetch_data()
     {
          $this->db->select("*");
          $this->db->from($this->table);
          $query = $this->db->get();
          return $query->result();
     }

     function delete_data($id)
     {
          $this->db->where("id", $id);
          $this->db->delete($this->table);
     }

     function fetch_single_data($id)
     {

          $this->db->where("id", $id);
          $query = $this->db->get($this->table);
          return $query->result();
     }

     function getRows($dept_id)
     {

          $this->db->where("dept_id", $dept_id);
          $query = $this->db->get($this->table);
          // echo  $this->db->last_query();
          // exit;
          return $query->num_rows();
     }

     function update_data($data, $id)
     {
          $this->db->where("id", $id);
          $this->db->update($this->table, $data);
     }
}

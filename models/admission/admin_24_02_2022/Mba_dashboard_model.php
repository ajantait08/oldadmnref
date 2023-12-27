<?php

class Mba_dashboard_model extends CI_Model
{
    private $tabulation = 'misdev';
    function __construct()
    {
        parent::__construct();
    }
    
    public function insert_pre_record_appl_pro_ms($insert_data)
    {
        $this->db->insert('adm_mba_admin_doc_deci_log',$insert_data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            $this->session->set_flashdata('error', 'Unable to update. Please try again later. insert_new_rjct_rsn');
            redirect('admission/admin/dashboard/scrutiny_view/' . $insert_data['reg_no']);
        }
    }
    
    public function get_app_doc_verfied_status($where)
    {
     
        $query=$this->db->get_where('adm_mba_reg_appl_program',$where);
        if($query->num_rows() >0)
        {
           return $query->result_array();
        }
        else 
        {
           return fasle;
        }
       

    }

    public function get_appl_prom_doc($data,$where)
    {
     
      $this->db->update('adm_mba_reg_appl_program', $data , $where);
      if ( $this->db->affected_rows() == '1' ) 
      {
        return TRUE;
      }
      else 
      {
        return FALSE;
      }

    }
   

    public function update_appl_prom_ms($data,$where)
    {
     
      $this->db->update('adm_mba_reg_appl_program', $data , $where);
      if ( $this->db->affected_rows() == '1' ) 
      {
        return TRUE;
      }
      else 
      {
        return FALSE;
      }

    }

    public function get_email_by_reg_no($reg)
    {
      $myquery = "select g.email from adm_mba_registration g where g.registration_no='".$reg."'";
      $query = $this->db->query($myquery)->row();
      if ($query) 
      {
        return $query->email;
      }
      else 
      {
        return false;
      }
    } 
    public function get_application_details()
    {
        $this->db->select('*');
        $this->db->from('adm_mba_appl_ms');
        $this->db->where('payment_status', 'Y');
        $this->db->order_by("registration_no", "asc");
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }
    public function get_application_details_reg_asc()
    {
        $this->db->select('*');
        $this->db->from('adm_mba_appl_ms');
        $this->db->where('payment_status', 'Y');
        $this->db->order_by("registration_no", "asc");
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_application_by_status()
    {
        $query = $this->db->query("SELECT status AS Application_Status, COUNT(*) AS Count_students FROM adm_mba_appl_ms GROUP BY status");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_application_count()
    {
        $query = $this->db->query("SELECT COUNT(*) AS Count_students FROM adm_mba_appl_ms");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_program_details($registration_no)
    {
        $query = $this->db->query("select * from adm_mba_reg_appl_program where registration_no ='" . $registration_no . "'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_qualification_details($exam_type, $registration_no)
    {
        $query = $this->db->query("select * from adm_mba_qulaification where exam_type ='" . $exam_type . "' and 
                    registration_no ='" . $registration_no . "'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_experience_details($registration_no)
    {
        $query = $this->db->query("select * from adm_mba_work_exp where registration_no ='" . $registration_no . "'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function  update_status($data)
    {
        $verified_by = $this->session->userdata('emp_name') . ' (' . $this->session->userdata('emp_no') . ')';
        $update_data = [
            'doc_verfied_flag' => $data['verf_action'],
            'doc_verfied_by' => $verified_by,
            'doc_ver_dt' => date("Y-m-d H:i:s"),
            'doc_ver_reason' => $data['verf_remark']
        ];
        $this->db->where('registration_no', $data['registration_no']);
        $this->db->update('adm_mba_appl_ms', $update_data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            $this->session->set_flashdata('error', 'Unable to update. Please try again later. update_status');
            redirect('admission/admin/dashboard/scrutiny_view/' . $data['registration_no']);
        }
    }

    public function get_reason_ms()
    {
        $this->db->select('id, reason_desc');
        $this->db->from('adm_mba_reason_ms');
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function deactivate_previous_rsn($registration_no)
    {
        $update_data = [
            'reason_status' => 'D',
            'modified_by' => $this->session->userdata('email'),
            'modified_ts' => date("Y-m-d H:i:s")
        ];
        $this->db->where('reg_no', $registration_no);
        $this->db->where('reason_status', 'A');
        $result = $this->db->update('adm_mba_doc_val_reason', $update_data);
        if ($result) {
            return true;
        } else {
            $this->session->set_flashdata('error', 'Unable to update. Please try again later. deactivate_previous_rsn');
            redirect('admission/admin/dashboard/scrutiny_view/' . $registration_no);
        }
    }

    public function insert_new_rjct_rsn($insert_data)
    {
        $this->db->insert_batch('adm_mba_doc_val_reason', $insert_data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            $this->session->set_flashdata('error', 'Unable to update. Please try again later. insert_new_rjct_rsn');
            redirect('admission/admin/dashboard/scrutiny_view/' . $insert_data['reg_no']);
        }
    }

    public function update_other_reason($data, $registration_no)
    {
        $this->db->where('reg_no', $registration_no);
        $this->db->where('reason_status', 'A');
        $this->db->where('reason_sn', 0);
        $result = $this->db->update('adm_mba_doc_val_reason', $data);
        if ($result) {
            return true;
        } else {
            $this->session->set_flashdata('error', 'Unable to update. Please try again later. update_other_reason');
            redirect('admission/admin/dashboard/scrutiny_view/' . $registration_no);
        }
    }

    public function get_active_reason($registration_no)
    {
        $this->db->select('*');
        $this->db->from('adm_mba_doc_val_reason');
        $this->db->where('reg_no', $registration_no);
        $this->db->where('reason_status', 'A');
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_cat_applicant_details()
    {
        $this->db->select('adm.registration_no, adm.first_name, adm.middle_name, adm.last_name, adm.category, 
                adm.mobile, adm.email, adm.dob, adm.gender, adm.pwd, flsp.cat_percentile, 
                flsp.cat_score, prgm.program_id, prgm.application_no, prgm.call_int_status');
        $this->db->from('adm_mba_appl_ms AS adm');
        $this->db->join('adm_mba_fellowship AS flsp', 'flsp.registration_no = adm.registration_no');
        $this->db->join('adm_mba_reg_appl_program AS prgm', 'prgm.registration_no = adm.registration_no');
        $this->db->where('adm.payment_status', 'Y');
        $this->db->where('adm.betch_iit', 'N');
        $this->db->where('adm.doc_verfied_flag', '1');
        $this->db->order_by('flsp.cat_score', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_cat_applicant_filtered($data)
    {
        $this->db->select('adm.registration_no, adm.first_name, adm.middle_name, adm.last_name, adm.category, 
                adm.mobile, adm.email, adm.dob, adm.gender, adm.pwd, flsp.cat_percentile, 
                flsp.cat_score, prgm.program_id, prgm.application_no, prgm.call_int_status');
        $this->db->from('adm_mba_appl_ms AS adm');
        $this->db->join('adm_mba_fellowship AS flsp', 'flsp.registration_no = adm.registration_no');
        $this->db->join('adm_mba_reg_appl_program AS prgm', 'prgm.registration_no = adm.registration_no');
        $this->db->where('adm.payment_status', 'Y');
        $this->db->where('adm.betch_iit', 'N');
        $this->db->where('adm.doc_verfied_flag', '1');
        if($data['programme']!='') {
            $this->db->where('prgm.program_id', $data['programme']);
        }
        if($data['category']!='') {
            $this->db->where('adm.category', $data['category']);
        }
        $this->db->order_by('flsp.cat_score', 'desc');
        $query = $this->db->get();
        // echo ($this->db->last_query());
        // exit;
        return $query->result();
    }

    public function get_iit_application_details()
    {
        $this->db->select('adm.registration_no, adm.first_name, adm.middle_name, adm.last_name, adm.category, 
                adm.mobile, adm.email, adm.dob, adm.gender, adm.pwd, adm.betch_iit, prgm.program_id, prgm.application_no, prgm.call_int_status');
        $this->db->from('adm_mba_appl_ms AS adm');
        $this->db->join('adm_mba_reg_appl_program AS prgm', 'prgm.registration_no = adm.registration_no');
        $this->db->where('adm.payment_status', 'Y');
        $this->db->where('adm.betch_iit', 'Y');
        $this->db->where('adm.doc_verfied_flag', '1');
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_iit_applicant_filtered($data)
    {
        $this->db->select('adm.registration_no, adm.first_name, adm.middle_name, adm.last_name, adm.category, 
                adm.mobile, adm.email, adm.dob, adm.gender, adm.pwd, adm.betch_iit, prgm.program_id, prgm.application_no, prgm.call_int_status');
        $this->db->from('adm_mba_appl_ms AS adm');
        $this->db->join('adm_mba_reg_appl_program AS prgm', 'prgm.registration_no = adm.registration_no');
        $this->db->where('adm.payment_status', 'Y');
        $this->db->where('adm.betch_iit', 'Y');
        $this->db->where('adm.doc_verfied_flag', '1');
        if($data['programme']!='') {
            $this->db->where('prgm.program_id', $data['programme']);
        }
        if($data['category']!='') {
            $this->db->where('adm.category', $data['category']);
        }
        $query = $this->db->get();
        // echo ($this->db->last_query());
        // exit;
        return $query->result();
    }

    public function search_transaction_details($reg_number, $email_id)
    {
        $CI = &get_instance();
        $this->db2 = $CI->load->database($this->tabulation, TRUE);
        $this->db2->select('*');
        $this->db2->from('sbi_full_transaction');
        $this->db2->like('other_detail', 'IITISMMBA', 'after');
        if($reg_number!='') {
            $this->db2->where('other_detail', $reg_number);
        }
        if($email_id!='') {
            $this->db2->where('email_id', $email_id);
        }
        $this->db2->order_by('id', 'asc');
        $query = $this->db2->get();
        return $query->result_array();
    }

    public function get_personal_details($reg_number, $email_id)
    {
        $this->db->select('*');
        $this->db->from('adm_mba_appl_ms');
        if($reg_number!='') {
            $this->db->where('registration_no', $reg_number);
        }
        if($email_id!='') {
            $this->db->where('email', $email_id);
        }
        $query = $this->db->get();
        return $query->result_array();
    }
}

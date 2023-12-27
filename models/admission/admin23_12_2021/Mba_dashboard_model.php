<?php

class Mba_dashboard_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_application_details()
    {
        $this->db->select('*');
        $this->db->from('adm_mba_appl_ms');
        $this->db->where('payment_status', 'Y');
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

    public function get_program_details($registration_no)
    {
        $query = $this->db->query("select * from adm_mba_reg_appl_program where registration_no ='" . $registration_no . "'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function  update_status($data)
    {
        $update_data = [
            'doc_verfied_flag' => $data['verf_action'],
            'doc_verfied_by' => $this->session->userdata('email'),
            'doc_ver_dt' => date("Y-m-d H:i:s"),
            'doc_ver_reason' => $data['verf_remark']
        ];
        $this->db->where('registration_no', $data['registration_no']);
        $this->db->update('adm_mba_appl_ms', $update_data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            $this->session->set_flashdata('error', 'Unable to update. Please try again later. update_status');
            redirect('admission/admin/dashboard/scrutiny_view/'.$data['registration_no']);
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
        if ($result){
            return true;
        } else {
            $this->session->set_flashdata('error', 'Unable to update. Please try again later. deactivate_previous_rsn');
            redirect('admission/admin/dashboard/scrutiny_view/'.$registration_no);
        }
    }

    public function insert_new_rjct_rsn($insert_data)
    {
        $this->db->insert_batch('adm_mba_doc_val_reason',$insert_data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            $this->session->set_flashdata('error', 'Unable to update. Please try again later. insert_new_rjct_rsn');
            redirect('admission/admin/dashboard/scrutiny_view/'.$registration_no);
        }
    }

    public function update_other_reason($data, $registration_no)
    {
        $this->db->where('reg_no', $registration_no);
        $this->db->where('reason_status', 'A');
        $this->db->where('reason_sn', 0);
        $result = $this->db->update('adm_mba_doc_val_reason', $data);
        if ($result){
            return true;
        } else {
            $this->session->set_flashdata('error', 'Unable to update. Please try again later. update_other_reason');
            redirect('admission/admin/dashboard/scrutiny_view/'.$registration_no);
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

    public function get_all_applicant_details()
    {
        $this->db->select('*');
        $this->db->from('adm_mba_appl_ms');
        $this->db->where('payment_status', 'y');
        $query = $this->db->get(); 
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }
}

<?php

class Adm_mtech_application_preview_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_application_details($registration_no)
    {
        $query = $this->db->query("select * from adm_mtech_appl_ms where registration_no ='" . $registration_no . "'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_gate_paper_code_subject($registration_no)
    {
        $query = $this->db->query("SELECT t.registration_no,t.gate_paper_code,gate_paper_desc FROM adm_mtech_reg_appl_program t WHERE t.registration_no='" . $registration_no . "' GROUP BY t.registration_no");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_selected_program_details($registration_no){
        $sql = "select * from adm_mtech_appl_selected a inner join adm_mtech_reg_appl_program b on a.registration_no = b.registration_no where a.registration_no = ? and b.admin_decision='ML' GROUP BY a.program_id";
        $query = $this->db->query($sql,array($registration_no));
        //echo $this->db->last_query(); die();
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function get_selected_program_details_with_underscore($registration_no){
        $sql = "select * from adm_mtech_appl_selected a where a.registration_no LIKE '%".$registration_no."%' GROUP BY a.program_id";
        $query = $this->db->query($sql,array($registration_no));
        //echo $this->db->last_query(); die();
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function get_application_details_selected($registration_no){

        $query = $this->db->query("select * from adm_mtech_appl_ms a inner join adm_mtech_appl_selected b on a.registration_no = b.registration_no where a.registration_no ='" . $registration_no . "' and b.payment_status='Y'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_selected_program_details_with_payment($registration_no){

        $sql = "select a.*,b.*,a.program_id as program_id , a.program_desc as program_desc from adm_mtech_appl_selected a inner join adm_mtech_reg_appl_program b on a.registration_no = b.registration_no where a.registration_no = ? and a.payment_status = ? group by a.program_id";
        $query = $this->db->query($sql,array($registration_no,'Y'));
        //echo $this->db->last_query(); die();
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function get_selected_payment_details($registration_no){

        $query = $this->db->query("select * from adm_mtech_appl_selected where registration_no ='" . $registration_no . "'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_address($registration_no)
    {
        $query = $this->db->query("select * from adm_mtech_address where address_type='C' and registration_no ='" . $registration_no . "'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_fellowship_details($registration_no)
    {
        $query = $this->db->query("select * from adm_mtech_fellowship where registration_no ='" . $registration_no . "'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_qulaification_details($registration_no)
    {
        $query = $this->db->query("select * from adm_mtech_qulaification where registration_no ='" . $registration_no . "'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_program_details($registration_no)
    {
        $query = $this->db->query("select p.*, d.degree_desc from adm_mtech_reg_appl_program p
        inner join adm_mtech_degree_ms d
        where p.degree_id = d.degree_code and registration_no ='" . $registration_no . "'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_work_exp_details($registration_no)
    {
        $query = $this->db->query("select * from adm_mtech_work_exp where registration_no ='" . $registration_no . "'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_photo_path($registration_no)
    {
        $query = $this->db->query("select * from adm_mtech_doc where registration_no ='" . $registration_no . "' and doc_id='photo'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_sign_path($registration_no)
    {
        $query = $this->db->query("select * from adm_mtech_doc where registration_no ='" . $registration_no . "' and doc_id='signature'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_qrcode_path($registration_no)
    {
        $query = $this->db->query("select doc_path from adm_mtech_doc where registration_no ='" . $registration_no . "' and doc_id='qrcode'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function insert_qrcode($email, $registration_no)
    {
        $now = date('Y-m-d H:i:s');
        $stmt = "INSERT INTO `adm_mtech_doc` (`registration_no`, `doc_id`, `doc_path`, `uploaded_date`, `created_by`)
            VALUES
            ('$registration_no','qrcode', 'assets/admission/mtech/$registration_no/qrcode$registration_no.png','$now','$email')";
        $query = $this->db->query($stmt);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function get_tab_status($registration_no)
    {
        $query = $this->db->query("select * from adm_mtech_tab where registration_no ='" . $registration_no . "'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }
    public function get_doc_path($registration_no)
    {
        $query = $this->db->query("select d.*, m.description from adm_mtech_doc d inner join adm_mtech_doc_ms m
            where d.registration_no ='" . $registration_no . "' and d.doc_id = m.doc_id ORDER BY m.id" );
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }
}

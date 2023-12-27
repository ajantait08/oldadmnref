<?php

class Adm_mba_application_preview_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_call_int_loc($reg)
    {
      
      $query=$this->db->get_where('adm_mba_interview_priority',array('registration_no'=>$reg));
       if($query->num_rows() >0)
       return $query->result();
    }

    public function get_application_details($registration_no)
    {
        $query = $this->db->query("select * from adm_mba_appl_ms where registration_no ='" . $registration_no . "'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_application_details_selected($registration_no){

        $query = $this->db->query("select * from adm_mba_appl_ms a inner join adm_mba_appl_selected b on a.registration_no = b.registration_no where a.registration_no ='" . $registration_no . "' and b.payment_status='Y'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }


    public function get_selected_program_details($registration_no){

        $sql ="SELECT a.*,b.*,a.program_id AS program_id
        FROM adm_mba_appl_selected a
        INNER JOIN adm_mba_reg_appl_program b ON a.registration_no = b.registration_no
        WHERE a.registration_no = '".$registration_no."' AND a.program_id=b.program_id AND b.admin_decision_status='ML'
        GROUP BY a.program_id";
        //$sql = "select a.*,b.*,a.program_id as program_id from adm_mba_appl_selected a inner join adm_mba_reg_appl_program b on a.registration_no = b.registration_no where a.registration_no = ? GROUP BY a.registration_no,a.program_id";
        $query = $this->db->query($sql);
        //echo $this->db->last_query(); die();
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function get_selected_program_details_with_payment($registration_no){

        $sql = "select a.*,b.*,a.program_id as program_id from adm_mba_appl_selected a inner join adm_mba_reg_appl_program b on a.registration_no = b.registration_no where a.registration_no = ? and a.payment_status = ? GROUP BY a.registration_no,a.program_id";
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

    public function get_address($registration_no)
    {
        $query = $this->db->query("select * from adm_mba_address where registration_no ='" . $registration_no . "'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_fellowship_details($registration_no)
    {
        $query = $this->db->query("select * from adm_mba_fellowship where registration_no ='" . $registration_no . "'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_qulaification_details($registration_no)
    {
        $query = $this->db->query("select * from adm_mba_qulaification where registration_no ='" . $registration_no . "'");
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

    public function get_selected_data_reg_no($offervalue,$reg_no){
        $sql = "select * from adm_mba_appl_selected where program_id= ? and registration_no = ?";
        $query = $this->db->query($sql,array($offervalue,$reg_no));
        if($query->num_rows() > 0){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function get_work_exp_details($registration_no)
    {
        $query = $this->db->query("select * from adm_mba_work_exp where registration_no ='" . $registration_no . "'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_photo_path($registration_no)
    {
        $query = $this->db->query("select * from adm_mba_doc where registration_no ='" . $registration_no . "' and doc_id='photo'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_sign_path($registration_no)
    {
        $query = $this->db->query("select * from adm_mba_doc where registration_no ='" . $registration_no . "' and doc_id='signature'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_qrcode_path($registration_no)
    {
        $query = $this->db->query("select doc_path from adm_mba_doc where registration_no ='" . $registration_no . "' and doc_id='qrcode'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function insert_qrcode($email, $registration_no)
    {
        $now = date('Y-m-d H:i:s');
        $stmt = "INSERT INTO `adm_mba_doc` (`registration_no`, `doc_id`, `doc_path`, `uploaded_date`, `created_by`)
            VALUES
            ('$registration_no','qrcode', 'assets/admission/mba/$registration_no/qrcode$registration_no.png','$now','$email')";
        $query = $this->db->query($stmt);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function get_tab_status($registration_no)
    {
        $query = $this->db->query("select * from adm_mba_tab where registration_no ='" . $registration_no . "'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_selected_payment_details($registration_no){

        $query = $this->db->query("select * from adm_mba_appl_selected where registration_no ='" . $registration_no . "'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_doc_path($registration_no)
    {
        $query = $this->db->query("select d.*, m.description from adm_mba_doc d inner join adm_mba_doc_ms m
            where d.registration_no ='" . $registration_no . "' and d.doc_id = m.doc_id ORDER BY m.id" );
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }
}

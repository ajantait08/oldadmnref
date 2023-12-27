<?php

class Adm_phdpt_application_preview_model extends CI_Model
{

    private $tabulation='mislive';
    // private $tabulation='mistest';
    function __construct()
    {
        parent::__construct();
        $CI =& get_instance();
        $this->db2 = $CI->load->database($this->tabulation, TRUE);
    }

    public function get_application_details($registration_no)
    {
        $query = $this->db->query("select * from adm_phdpt_appl_ms where registration_no ='" . $registration_no . "'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_dept_id_by_program($program_id){
        $query = $this->db->query("select dept_id from adm_phdpt_program_ms where program_id ='" . $program_id . "'");
        if ($query->num_rows() > 0)
        {
            //echo $query->result()[0]->dept_id;
            return $query->result()[0]->dept_id;
        }
        else
        {
            return false;
        }
    }

    public function get_dept_name_by_dept_id($dept_id){
        $query = $this->db->query("select `desc` from adm_phdpt_dept_ms where dept_id ='" . $dept_id . "'");

        if ($query->num_rows() > 0)
        {
            //echo $query->result()[0]->desc;
            return $query->result()[0]->desc;
        }
        else
        {
            return false;
        }
    }

    public function get_address($registration_no)
    {
        $query = $this->db->query("select * from adm_phdpt_address where address_type='C' and registration_no ='" . $registration_no . "'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_selected_data_reg_no($offervalue,$reg_no){
        $sql = "select * from adm_phdpt_appl_selected where program_id= ? and registration_no = ?";
        $query = $this->db->query($sql,array($offervalue,$reg_no));
        if($query->num_rows() > 0){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function get_allowed_mis_reg_details($registration_no){
        $query = $this->db2->query("select * from stud_final_with_fee where reg_id ='" . $registration_no . "'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_mis_registration_details($registration_no)
    {
        $query = $this->db2->query("select * from stud_mis_reg_mis_server_upload_details where overall_transfer_status='1' and reg_id ='" . $registration_no . "'");
        if ($query->num_rows() > 0)
        {
            $query = $this->db2->query("select * from stud_mis_reg_mis_server_basic_insert_details where overall_insert_status='1' and reg_id ='" . $registration_no . "'");
            if ($query->num_rows() > 0) {
                return $query->result();
            }
            else {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    public function get_department_by_program_id($program_id){
        $sql = "select b.desc from adm_phdpt_program_ms a inner join adm_phdpt_dept_ms b on a.dept_id = b.dept_id where a.program_id=?";
        $query = $this->db->query($sql,array($program_id));
        if ($query->num_rows() > 0) {
           return $query->result_array();
        }
        else {
            return false;
        }
    }

    public function get_fellowship_details($registration_no)
    {
        $query = $this->db->query("select * from adm_phdpt_fellowship where registration_no ='" . $registration_no . "'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_selected_program_details($registration_no){

        $sql = "select * from adm_phdpt_appl_selected a inner join adm_phdpt_reg_appl_program b on a.registration_no = b.registration_no where a.registration_no = ? AND a.program_id=b.program_id and b.admin_decision='ML' and DATE_FORMAT(STR_TO_DATE(a.end_date, '%d-%m-%Y'), '%Y-%m-%d') >= DATE_FORMAT(CURDATE(), '%Y-%m-%d') GROUP BY a.program_id";
        $query = $this->db->query($sql,array($registration_no));
        //echo $this->db->last_query();
        //die();
        if($query->num_rows() > 0)
        {

            return $query->result();
        }
        else{
            return false;
        }
    }

    public function get_selected_program_details_prev($registration_no){

        $sql = "select * from adm_phdpt_appl_selected a inner join adm_phdpt_reg_appl_program b on a.registration_no = b.registration_no where a.registration_no = ? AND a.program_id=b.program_id and b.admin_decision='ML' and DATE_FORMAT(STR_TO_DATE(a.end_date, '%d-%m-%Y'), '%Y-%m-%d') < DATE_FORMAT(CURDATE(), '%Y-%m-%d') GROUP BY a.program_id";
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

    public function get_selected_payment_details($registration_no){

        $query = $this->db->query("select * from adm_phdpt_appl_selected where registration_no ='" . $registration_no . "'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_selected_payment_details_new($registration_no,$program_id){

        $query = $this->db->query("select * from adm_phdpt_appl_selected where registration_no ='" . $registration_no . "' and program_id = '".$program_id."'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }


    public function get_selected_program_details_with_payment($registration_no){

        $sql = "select * from adm_phdpt_appl_selected a inner join adm_phdpt_reg_appl_program b on a.registration_no = b.registration_no where a.registration_no = ? and a.payment_status = ? AND a.program_id=b.program_id GROUP BY a.program_id";
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

    public function get_qulaification_details($registration_no)
    {
        $query = $this->db->query("select * from adm_phdpt_qulaification where registration_no ='" . $registration_no . "'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_program_desc($program_id){
        $query = $this->db->select('program_desc')
                            ->from('adm_phdpt_program_ms')
                            ->where('program_id',$program_id)
                            ->get();
        if ($query->num_rows() > 0) {
            return $query->result_array()[0]['program_desc'];
        }
        else{
            return false;
        }
    }

    public function get_prog_spec_details($registration_no)
    {
        $query = $this->db->select('*')
                        ->from('adm_phdpt_specialization')
                        ->where('registration_no',$registration_no)
                        ->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function get_program_details($registration_no)
    {
        $query = $this->db->query("select p.*, d.degree_desc from adm_phdpt_reg_appl_program p
        inner join adm_phdpt_degree_ms d
        where p.degree_id = d.degree_code and registration_no ='" . $registration_no . "'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_fellowtype_by_reg_no_program_id($program_id,$reg_no){
        $sql = "select fellowtype from adm_phdpt_appl_selected where program_id = ? and registration_no = ?";
        $query = $this->db->query($sql,array($program_id,$reg_no));
        if ($query->num_rows() > 0)
        return $query->result_array();
        else
            return false;
    }

    public function get_application_details_selected($registration_no){

        $query = $this->db->query("select *,a.dob as 'dob' from adm_phdpt_appl_ms a inner join adm_phdpt_appl_selected b on a.registration_no = b.registration_no where a.registration_no ='" . $registration_no . "' and b.payment_status='Y'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;

    }

    public function get_work_exp_details($registration_no)
    {
        $query = $this->db->query("select * from adm_phdpt_work_exp where registration_no ='" . $registration_no . "'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_photo_path($registration_no)
    {
        $query = $this->db->query("select * from adm_phdpt_doc where registration_no ='" . $registration_no . "' and doc_id='photo'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_sign_path($registration_no)
    {
        $query = $this->db->query("select * from adm_phdpt_doc where registration_no ='" . $registration_no . "' and doc_id='signature'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_qrcode_path($registration_no)
    {
        $query = $this->db->query("select doc_path from adm_phdpt_doc where registration_no ='" . $registration_no . "' and doc_id='qrcode'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function insert_qrcode($email, $registration_no)
    {
        $now = date('Y-m-d H:i:s');
        $stmt = "INSERT INTO `adm_phdpt_doc` (`registration_no`, `doc_id`, `doc_path`, `uploaded_date`, `created_by`)
            VALUES
            ('$registration_no','qrcode', 'assets/admission/phdpt/$registration_no/qrcode$registration_no.png','$now','$email')";
        $query = $this->db->query($stmt);
        $this->db2->query($stmt);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function get_tab_status($registration_no)
    {
        $query = $this->db->query("select * from adm_phdpt_tab where registration_no ='" . $registration_no . "'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_doc_path($registration_no)
    {
        $query = $this->db->query("select d.*, m.description from adm_phdpt_doc d inner join adm_phdpt_doc_ms m
            where d.registration_no ='" . $registration_no . "' and d.doc_id = m.doc_id ORDER BY m.id" );
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }
}

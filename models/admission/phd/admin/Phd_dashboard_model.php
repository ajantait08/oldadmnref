<?php

class Phd_dashboard_model extends CI_Model
{
    private $tabulation = 'misdev';
    function __construct()
    {
        parent::__construct();
    }

    public function get_appl_no_by_pro_id($val)
    {
     //   echo "<pre>";
     //   print_r($val['prog']);
     //   exit;
      $myquery = "SELECT t.application_no FROM adm_phd_reg_appl_program t WHERE t.registration_no='".$val['reg']."' AND t.program_id='".$val['prog']."'";
      $query = $this->db->query($myquery)->row();
      if ($query)
      {
        return $query->application_no;
      }
      else
      {
        return false;
      }
    }

    public function update_appl_prom_ms_call_int_syn($appl)
    {

      //   $this->db->update('adm_phd_reg_appl_program', $data , $where);
      $stmt="UPDATE `adm_phd_reg_appl_program` SET `admin_decision_status` = 'CI', `admin_desicion_sta_desc` = 'Call for interview' WHERE `application_no` = '".$appl."'";
      $query = $this->db->query($stmt);
      //   echo $this->db->last_query();
      //   exit;
      if ($query)
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }

    }

    public function get_all_program_details(){
        // $CI = &get_instance();
        // $this->db2 = $CI->load->database($this->tabulation,TRUE);
       $query =  $this->db->select('*')
                  ->from('adm_phd_program_ms')
                  ->order_by('program_id','asc')
                  ->get();
       if ($query->num_rows() > 0) {
          return $query->result();
       }
       else {
           return false;
       }
    }

    public function get_candidate_list_by_program($program_id){
        // $CI = &get_instance();
        // $this->db2 = $CI->load->database($this->tabulation,TRUE);
        $sql = "SELECT *
        FROM adm_phd_registration s
        INNER JOIN adm_phd_reg_appl_program t ON s.registration_no=t.registration_no
        WHERE t.program_id=? AND t.admin_decision=?";
        $query = $this->db->query($sql,array($program_id,'CI'));

        if ($query->num_rows() > 0) {
           return $query->result();
        }
        else{
            return false;
        }

    }

    public function get_candidate_list_by_program_with_limit($program_id,$offset_1,$offset_2){
        if ($offset_1 == 1) {
            $offset_1 = 0;
        }
        else{
            $offset_1 = $offset_1 - 1;
        }
        $sql = "SELECT *
        FROM adm_phd_registration s
        INNER JOIN adm_phd_reg_appl_program t ON s.registration_no=t.registration_no
        WHERE t.program_id=? AND t.admin_decision=? LIMIT $offset_1,10";
        $query = $this->db->query($sql,array($program_id,'CI'));

        if ($query->num_rows() > 0) {
           return $query->result();
        }
        else{
            return false;
        }
    }

    public function get_doc_path($registration_no)
    {

        $query = $this->db->query("select d.*, m.description from adm_phd_doc d inner join adm_phd_doc_ms m
            where d.registration_no ='" . $registration_no . "' and d.doc_id = m.doc_id ORDER BY m.id" );
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function view_call_for_interview()
    {
        $stmt="SELECT l.registration_no,l.application_no,UCASE(l.program_id) AS program_id,CONCAT(m.first_name,' ',m.middle_name,' ',m.last_name) AS name,
        m.email,m.mobile,m.dob,m.category,m.gender,f.cat_score,f.cat_percentile,l.call_int_status,l.admin_decision_status FROM adm_phd_reg_appl_program l
        left JOIN adm_phd_appl_ms AS m ON m.registration_no=l.registration_no
        left JOIN adm_phd_fellowship AS f ON f.registration_no=l.registration_no
        WHERE l.call_int_status='Y' ORDER BY f.registration_no ASC";
        $query = $this->db->query($stmt);
        if ($query->num_rows() > 0)
         return $query->result();
        else
         return false;
    }
    public function synchronized_aplicant_data()
    {
        $stmt="SELECT l.registration_no,l.application_no,UCASE(l.program_id) AS program_id,CONCAT(m.first_name,' ',m.middle_name,' ',m.last_name) AS name,
        m.email,m.mobile,m.dob,m.category,m.gender,f.cat_score,f.cat_percentile,l.call_int_status,l.admin_decision_status
        FROM adm_phd_reg_appl_program l
        left JOIN adm_phd_appl_ms AS m ON m.registration_no=l.registration_no
        left JOIN adm_phd_fellowship AS f ON f.registration_no=l.registration_no
        WHERE l.admin_decision_status='CI' ORDER BY f.registration_no ASC";
        $query = $this->db->query($stmt);
        if ($query->num_rows() > 0)
         return $query->result();
        else
         return false;
    }

    public function update_appl_prom_ms_call_int($data,$where)
    {

      $this->db->update('adm_phd_reg_appl_program', $data , $where);
      if ( $this->db->affected_rows() == '1' )
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }

    }

    public function check_call_for_int_status($data)
    {
        $stmt="SELECT * FROM adm_phd_reg_appl_program m WHERE m.application_no='".$data."' AND m.call_int_status='Y'";
        $query = $this->db->query($stmt);

        if ($query->num_rows() > 0)
          return "yes";
        else
        return "no";
    }

    public function check_already_added_in_temp($data)
    {
        $stmt="SELECT * FROM adm_phd_csv_data_upload_temp c WHERE c.registration_no='".$data['registration_no']."' AND c.application_no='".$data['application_no']."' AND c.`status`='A'";
        $query = $this->db->query($stmt);
        if ($query->num_rows() > 0)
          return "exist";
        else
        return "not_exist";
    }

    public function check_application_paid($data)
    {
        $stmt="SELECT * FROM adm_phd_appl_ms m WHERE m.payment_status='Y' AND m.registration_no='".$data."'";
        $query = $this->db->query($stmt);
        if ($query->num_rows() > 0)
          return "paid";
        else
        return "not_paid";
    }

    public function check_application_prom_verified($data)
    {
        $stmt="SELECT * FROM adm_phd_reg_appl_program r WHERE r.application_no='".$data['application_no']."' AND r.program_id='".$data['program_id']."' AND r.`status`='v'";
        $query = $this->db->query($stmt);
        if ($query->num_rows() > 0)
          return "verified";
        else
         return "not_verified";
    }

    public function check_application_prom_verified_application_no($app)
    {

        $where=array(
            'application_no'=>$app,
            'status'=>'v'
        );
        $query=$this->db->get_where('adm_phd_reg_appl_program',$where);
        // $stmt="SELECT * FROM adm_phd_reg_appl_program r WHERE r.application_no='".$app."' AND r.`status`='V'";
        // $query = $this->db->query($stmt);
        // echo $this->db->last_query();
        // exit;

        if ($query->num_rows() > 0)
          return "yes";
        else
          return "not_verified";
    }


    public function fetch_csv_data()
    {
        $stmt="SELECT p.registration_no,p.application_no,UCASE(p.program_id) AS program_id,CONCAT(m.first_name,' ',m.middle_name,' ',m.last_name) AS name,
        m.email,m.mobile,m.dob,m.category,m.gender,f.cat_score,f.cat_percentile
        FROM adm_phd_csv_data_upload_temp p
        left JOIN adm_phd_appl_ms AS m ON m.registration_no=p.registration_no
        left JOIN adm_phd_fellowship AS f ON f.registration_no=p.registration_no
        WHERE m.payment_status='y' ORDER BY f.registration_no asc";
        $query = $this->db->query($stmt);
        if ($query->num_rows() > 0)
          return $query->result();
        else
         return false;
    }

    public function check_round_upload()
    {
        $query = $this->db->query("select MAX(upload_round) as mx from adm_phd_csv_data_upload_temp");
        if ($query->num_rows() > 0)
          return $query->result();
        else
         return false;

    }

    public function insert_csv_data($insert_data)
    {
        $this->db->insert('adm_phd_csv_data_upload_temp',$insert_data);
        if ($this->db->affected_rows() > 0)
        {
            return "inserted";
        }
        else
        {
           return "insert_fail";
        }
    }


    public function insert_pre_record_appl_pro_ms($insert_data)
    {
        $this->db->insert('adm_phd_admin_doc_deci_log',$insert_data);
        if ($this->db->affected_rows() > 0)
        {
            return true;
        }
        else
        {
            $this->session->set_flashdata('error', 'Unable to update. Please try again later. insert_new_rjct_rsn');
            redirect('admission/admin/dashboard/scrutiny_view/' . $insert_data['reg_no']);
        }
    }

    public function get_app_doc_verfied_status($where)
    {

        $query=$this->db->get_where('adm_phd_reg_appl_program',$where);
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

      $this->db->update('adm_phd_reg_appl_program', $data , $where);
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

      $this->db->update('adm_phd_reg_appl_program', $data , $where);
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
      $myquery = "select g.email from adm_phd_registration g where g.registration_no='".$reg."'";
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
        $this->db->from('adm_phd_appl_ms');
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
        $this->db->from('adm_phd_appl_ms');
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
        $query = $this->db->query("SELECT status AS Application_Status, COUNT(*) AS Count_students FROM adm_phd_appl_ms GROUP BY status");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_application_count()
    {
        $query = $this->db->query("SELECT COUNT(*) AS Count_students FROM adm_phd_appl_ms");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_program_details($registration_no)
    {
        $query = $this->db->query("select * from adm_phd_reg_appl_program where registration_no ='" . $registration_no . "'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_qualification_details($exam_type, $registration_no)
    {
        $query = $this->db->query("select * from adm_phd_qulaification where exam_type ='" . $exam_type . "' and
                    registration_no ='" . $registration_no . "'");
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    public function get_experience_details($registration_no)
    {
        $query = $this->db->query("select * from adm_phd_work_exp where registration_no ='" . $registration_no . "'");
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
        $this->db->update('adm_phd_appl_ms', $update_data);
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
        $this->db->from('adm_phd_reason_ms');
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
        $result = $this->db->update('adm_phd_doc_val_reason', $update_data);
        if ($result) {
            return true;
        } else {
            $this->session->set_flashdata('error', 'Unable to update. Please try again later. deactivate_previous_rsn');
            redirect('admission/admin/dashboard/scrutiny_view/' . $registration_no);
        }
    }

    public function insert_new_rjct_rsn($insert_data)
    {
        $this->db->insert_batch('adm_phd_doc_val_reason', $insert_data);
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
        $result = $this->db->update('adm_phd_doc_val_reason', $data);
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
        $this->db->from('adm_phd_doc_val_reason');
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
        $this->db->from('adm_phd_appl_ms AS adm');
        $this->db->join('adm_phd_fellowship AS flsp', 'flsp.registration_no = adm.registration_no');
        $this->db->join('adm_phd_reg_appl_program AS prgm', 'prgm.registration_no = adm.registration_no');
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
        $this->db->from('adm_phd_appl_ms AS adm');
        $this->db->join('adm_phd_fellowship AS flsp', 'flsp.registration_no = adm.registration_no');
        $this->db->join('adm_phd_reg_appl_program AS prgm', 'prgm.registration_no = adm.registration_no');
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
        $this->db->from('adm_phd_appl_ms AS adm');
        $this->db->join('adm_phd_reg_appl_program AS prgm', 'prgm.registration_no = adm.registration_no');
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
        $this->db->from('adm_phd_appl_ms AS adm');
        $this->db->join('adm_phd_reg_appl_program AS prgm', 'prgm.registration_no = adm.registration_no');
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
        $this->db2->like('other_detail', 'IITISMphd', 'after');
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
        $this->db->from('adm_phd_appl_ms');
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

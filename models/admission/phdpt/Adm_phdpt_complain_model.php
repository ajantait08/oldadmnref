<?php

class Adm_phdpt_complain_model extends CI_Model {

   // private $tabulation='misdev';//  mis
     private $tabulation='mislive'; //  mis
    //  private $tabulation='mistest'; //  mis
	// private $tabulation_3='payserver';  // payserver

    function __construct()
	{
		parent::__construct();
        $CI =& get_instance();
        $this->db2 = $CI->load->database($this->tabulation, TRUE);
		// $this->db3 = $CI->load->database($this->tabulation_3, TRUE);
    }

    function insert_complain($data)
    {
        $query = $this->db->insert('adm_payment_complaints',$data);

        $query2 = $this->db2->insert('adm_payment_complaints',$data);

        if($this->db->affected_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function get_complaint_type_list(){
        $query = $this->db->select('*')
        ->from('master_complaint_type')
        ->where('is_deleted',0)
        ->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        else{
            return false;
        }
    }

    function insert_technical_complain($data){

        $query = $this->db->insert('adm_technical_complaints',$data);

        $query2 = $this->db2->insert('adm_technical_complaints',$data);

        //echo $this->db->last_query(); //die();
        //echo $this->db->last_query(); die();

        if($this->db->affected_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function get_complain($where)
    {
        $query = $this->db->get_where('adm_payment_complaints',$where);

        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }

    function get_technical_complain($where)
    {
        $query = $this->db->get_where('adm_technical_complaints',$where);

        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }

    function isOrdernoEmailExist($order_no)
    {

        $this->db->select('id');
        $this->db->where('ref_no', $order_no);
        $query = $this->db->get('adm_payment_complaints');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function check_order_no_email($order_no,$email)
    {
        $con=array(
            ''=>$order_no,
            ''=>$email
        );

        $this->db->select('id');
        $this->db->where('ref_no',$con);
        $query = $this->db->get('adm_payment_complaints');
        if ($query->num_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function check_order_no($order_no,$email)
    {
        $con=array(
            'order_no'=>$order_no,
            'email'=>$email
        );
        $query=$this->db->get_where('online_payment_admission_main_table_log',$con);
    // echo $this->db->last_query();
                // exit;
        if ($query->num_rows() > 0)
        {
            return "ok";
        }
        else
        {
            return false;
        }
    }

    // function isOrdernoInLog($order_no) {
    //     // $this->db3->select('order_id');
    //     // $this->db3->where('order_id', $order_no);
    //     // $query = $this->db3->get('adm_payment_complaints');

    //     // if ($query->num_rows() > 0 or $order_no=='na' or $order_no=='NA') {
    //     //     return "log_in";
    //     // } else {
    //     //     return "no";
    //     // }


    //     $this->db->select('id');
    //     $this->db->where('ref_no', $order_no);
    //     $query = $this->db->get('adm_payment_complaints');

    //     if ($query->num_rows() > 0) {
    //         return "log_in";
    //     } else {
    //         return false;
    //     }
    // }


}
?>
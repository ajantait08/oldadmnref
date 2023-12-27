<?php

class Adm_mtech_complain_model extends CI_Model {

   // private $tabulation='misdev';//  mis
     private $tabulation='mislive'; //  mis
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
        $query = $this->db->insert('adm_mtech_payment_complaints',$data);

        $query2 = $this->db2->insert('adm_mtech_payment_complaints',$data);

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
        $query = $this->db->get_where('adm_mtech_payment_complaints',$where);

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
        $query = $this->db->get('adm_mtech_payment_complaints');
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
        $query = $this->db->get('adm_mtech_payment_complaints');
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
            'order_id'=>$order_no,
            'email'=>$email
        );
        $query=$this->db->get_where('online_payment_adm_mtech_log',$con);
        
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
    //     // $query = $this->db3->get('adm_mtech_payment_complaints');

    //     // if ($query->num_rows() > 0 or $order_no=='na' or $order_no=='NA') {
    //     //     return "log_in";
    //     // } else {
    //     //     return "no";
    //     // }


    //     $this->db->select('id');
    //     $this->db->where('ref_no', $order_no);
    //     $query = $this->db->get('adm_mtech_payment_complaints');

    //     if ($query->num_rows() > 0) {
    //         return "log_in";
    //     } else {
    //         return false;
    //     }
    // }


}
?>
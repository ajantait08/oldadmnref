<?php
/////////////////////////////////////////////////////////////////
//                                                             //
//               phd query model is start                      //
//                                                             //
//                                                             //
/////////////////////////////////////////////////////////////////
class Adm_phdpt_payment_model extends CI_Model {

 // private $tabulation='misdev'; //this for misdev when do live the use below one
  private $tabulation='mislive';  //this for mislive when do live the use below one
  // private $tabulation='mistest';  //this for mislive when do live the use below one
  private $tablepay_beta='paybeta';
  private $table_pay='pay_live';

  function __construct(){
    parent::__construct();
    $CI =& get_instance();

     $this->db2 = $CI->load->database($this->tabulation, TRUE); // misdev
     //$this->db3 = $CI->load->database($this->tablepay_beta, TRUE); // phdportal
     $this->db4 = $CI->load->database($this->table_pay, TRUE); // this for pay live table will insert

  }

  public $table_name="adm_phdpt_appl_ms";
  public $appl_program="adm_phdpt_reg_appl_program";
  public $address="adm_phdpt_address";
  public $tab="adm_phdpt_tab";
  public $cat="adm_phdpt_fellowship";
  public $qualification="adm_phdpt_qulaification";
  public $work_exp="adm_phdpt_work_exp";
  public $document="adm_phdpt_doc";

   function get_fee_details($reg_id,$email,$contact_no)
   {
      $this->db->select('fee_to_be_paid');
      $query = $this->db->get_where('online_payment_adm_phd_final_fee',['reg_id' => $reg_id, 'email' => $email, 'contact_no' => $contact_no]); // stud_final_with_fee
      if($query->num_rows() > 0)
      {
        return $query->result_array();
      }
      else
      {
        return FALSE;
      }

   }

   function insert_mis_pay_adm_pay_detail($payment_details,$cond)
   {

    $msginsertphd="";
    $msginsertpay="";
    $msginsertmis="";

    $querystmt = $this->db->get_where('online_payment_adm_phd_final_fee',$cond);

    if($querystmt->num_rows() > 0)
    {
      $msginsertphd="phdexsit";
    }
    else
    {
      $query = $this->db->insert('online_payment_adm_phd_final_fee',$payment_details); // phdportal db

      if($this->db->affected_rows() > 0)
      {
        $msginsertphd="phdok";
      }
      else
      {
        $msginsertphd="phdnot";
      }
    }

    $querystmt2 = $this->db2->get_where('online_payment_adm_phd_final_fee',$cond);

    if($querystmt2->num_rows() > 0)
    {

      $msginsertmis="misexsit";
    }
    else
    {

      $query2 = $this->db2->insert('online_payment_adm_phd_final_fee',$payment_details); // mis db
      if($this->db2->affected_rows() > 0)
      {
        $msginsertmis="misok";
      }
      else
      {
        $msginsertmis="misnot";
      }
    }

    $querystmt3 = $this->db4->get_where('online_payment_adm_phd_final_fee',$cond);
    if($querystmt3->num_rows() > 0)
    {
      $msginsertpay="payexsit";
    }
    else
    {
      $query3 = $this->db4->insert('online_payment_adm_phd_final_fee',$payment_details); // pay db
      if($this->db4->affected_rows() > 0)
      {
        $msginsertpay="payok";
      }
      else
      {
        $msginsertpay="paynot";
      }

    }

     return [$msginsertphd,$msginsertpay,$msginsertmis];

   }
   public function get_registration($data)
   {
      $query=$this->db->insert($this->table_name,$data);
      //  echo $this->db->last_query();
      //   exit;
      if($query)
      {
        return true;
      }
      else
      {
        return false;
      }
    }
    public function get_appl_no_by_reg_id($reg)
    {
      $myquery = "select g.appl_no from adm_phdpt_appl_ms g where g.reg_no='".$reg."'";
      $query = $this->db->query($myquery)->row();
      if($query)
      {
        return $query->appl_no;
      }
      else
      {
        return false;
      }
    }

    function insert_payment_log_data($payment_log){
      // echo '<pre>';
      // print_r($payment_log);
      // echo '</pre>';
      // exit;
      $query = $this->db->insert('online_payment_admission_main_table_log',$payment_log);
      $query2 = $this->db2->insert('payment_multiple_main_table_payment_log',$payment_log);

      //echo $this->db2->last_query(); //die();
      //echo $this->db->last_query(); die();

      if($this->db->affected_rows() > 0 && $this->db2->affected_rows() > 0)
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }

   }

   function update_main_payment_log($update_array,$where_data)
   {
        $this->db->where($where_data);
        $this->db->update('online_payment_admission_main_table_log',$update_array);

        $this->db2->where($where_data);
        $this->db2->update('payment_multiple_main_table_payment_log',$update_array);

        return TRUE;


   }

   function update_payment_tab_details($update_array,$where_data)
   {
        $this->db->where($where_data);
        $this->db->update('adm_phdpt_tab',$update_array);

        $this->db2->where($where_data);
        $this->db2->update('adm_phdpt_tab',$update_array);
        return TRUE;

   }

   function update_payment_appl_ms_details($update_array,$where_data)
   {
        $this->db->where($where_data);
        $this->db->update('adm_phdpt_appl_ms',$update_array);

        $this->db2->where($where_data);
        $this->db2->update('adm_phdpt_appl_ms',$update_array);
        return TRUE;

   }

    public function get_adm_phd_appl_ms($reg_no)
    {
      $query=$this->db->get_where($this->table_name,array('registration_no'=>$reg_no));
      if($query->num_rows() >0)
      return $query->result_array();
    }
    public function get_adm_phd_reg_appl_program($reg_no)
    {
      $query=$this->db->get_where($this->appl_program,array('registration_no'=>$reg_no));
      if($query->num_rows() >0)
      return $query->result_array();
    }
    public function remove_document_val($condition)
    {
      $query=$this->db->delete($this->document,$condition);
      //  echo $this->db->last_query();
      //   exit;
      if($query)
      {
        return true;
      }
      else
      {
        return false;
      }
    }
    public function get_all_document_uploaded($reg_no)
    {
       $query=$this->db->get_where($this->document,array('registration_no'=>$reg_no));
      if($query->num_rows() >0)
        return $query->result_array();
    }
    public function update_personal_deatils($data,$reg)
    {
      $where = array('registration_no' => $reg );
      $this->db->update($this->table_name, $data , $where);
      $this->db2->update($this->table_name, $data , $where);
      if ( $this->db->affected_rows() == '1' )
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }
    public function update_tab1($data,$reg)
    {
      $where = array('registration_no' => $reg );
      $this->db->update($this->tab, $data , $where);
      $this->db2->update($this->tab, $data , $where);
      if ( $this->db->affected_rows() == '1' )
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }
    public function set_track_email($data,$email)
    {
      $where = array( 'email' => $email );
      $this->db->update($this->table_name, $data , $where);
      $this->db2->update($this->table_name, $data , $where);
      // echo $this->db->last_query();
      // exit;
      if ( $this->db->affected_rows() == '1' )
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }
    public function get_email_registration($data)
    {
      $myquery = "select g.* from adm_phdpt_registration g where g.registration_no='".$data['registration_no']."'";
      $query = $this->db->query($myquery);
      if ($query)
      {
        return $query->result();
      }
      else
      {
        return false;
      }
    }
   /////amit payment code start from here 25-10-2021
   function test_m()
   {

       // $this->db3->where($where_data);
       // $query = $this->db3->update('stud_final_with_fee',$success_data);
       // //echo "<pre>";
       // // echo $this->db3->last_query();
       // // exit;
       // if($this->db3->affected_rows() > 0)
       // {
       //   echo "ok";
       //   exit;
       //   return TRUE;
       // }
       // else
       // {
       //   echo "errr";
       //   exit;
       //   return FALSE;
       // }

       //$CI = &get_instance();
       //$this->db2 = $CI->load->database($this->tabulation, TRUE);
       //$this->db3 = $CI->load->database($this->tabnewadmission, TRUE);

     //  // $query = $this->db2->get('stud_final_with_fee');
      $query = $this->db2->get_where('online_payment_stud_final_fee',[ 'reg_id' => '20001224' , 'email' => 'moinak69919072@gmail.com', 'contact_no' => '7003601843' ]);

       if($query->num_rows() > 0)
       {
         echo "<pre>";
         print_r($query->result_array());
         exit;
       }
       else
       {
         return FALSE;
       }

   }
   function get_stud_final_with_fee_from_mis($where_data) // get_stud_final_with_fee_from_mis($reg_id,$email,$contact_no)
   {
       $this->db2->select('sl_no,reg_id,salutation,first_name,middle_name,last_name,other_rank,contact_no,email,category,dob,sex,admn_type,fee_to_be_paid');
       $query = $this->db2->get_where('online_payment_stud_final_fee',$where_data); // stud_final_with_fee

       if($query->num_rows() > 0)
       {
         return $query->row_array();
       }
       else
       {
         return FALSE;
       }
   }
   function check_amount_from_pay($reg_id,$email,$contact_no)
   {
     $this->db->select('fee_to_be_paid');
     $query = $this->db->get_where('online_payment_stud_final_fee',[ 'reg_id' => $reg_id , 'email' => $email , 'contact_no' => $contact_no ]); // stud_final_with_fee

     if($query->num_rows() > 0)
     {
       return $query->row_array();
     }
     else
     {
       return FALSE;
     }
   }
   function insert_payment_log_pay($payment_log)
   {
     $query = $this->db->insert('online_payment_newadmission_log',$payment_log); // pay db

     $query2 = $this->db2->insert('online_payment_newadmission_log',$payment_log); // mis db

     $query3 = $this->db3->insert('online_payment_newadmission_log',$payment_log); // newadmission db

     if($this->db->affected_rows() > 0)
     {
       return TRUE;
     }
     else
     {
       return FALSE;
     }
   }
   function insert_newadmission_sbi_failure_details_pay($sbi_failure)
   {
     $query = $this->db->insert('online_payment_newadmission_sbi_failure_details',$sbi_failure); // pay db

     $query2 = $this->db2->insert('online_payment_newadmission_sbi_failure_details',$sbi_failure); // mis db

     $query3 = $this->db3->insert('online_payment_newadmission_sbi_failure_details',$sbi_failure); // newadmission db

     if($this->db->affected_rows() > 0)
     {
       return TRUE;
     }
     else
     {
       return FALSE;
     }
   }
   function insert_newadmission_sbi_success_details_pay($sbi_success)
   {
     $query = $this->db->insert('online_payment_newadmission_sbi_success_details',$sbi_success); // pay db

     $query2 = $this->db2->insert('online_payment_newadmission_sbi_success_details',$sbi_success); //  mis db

     $query3 = $this->db3->insert('online_payment_newadmission_sbi_success_details',$sbi_success); //  newadmission db

     if($this->db->affected_rows() > 0)
     {
       return TRUE;
     }
     else
     {
       return FALSE;
     }
   }
   function insert_newadmission_double_verification_response($data)
   {
     $query = $this->db->insert('online_payment_newadmission_double_verification_response',$data); // pay db

     $query2 = $this->db2->insert('online_payment_newadmission_double_verification_response',$data); // mis db

     $query3 = $this->db3->insert('online_payment_newadmission_double_verification_response',$data); // newadmission db

     if($this->db->affected_rows() > 0)
     {
       return TRUE;
     }
     else
     {
       return FALSE;
     }
   }
   function check_get_using_order_id_failure($order_id)
   {
     $query = $this->db->get_where('online_payment_newadmission_sbi_failure_details',[ 'order_id' => $order_id ]);

     if($query->num_rows() > 0)
     {
       return $query->row_array();
     }
     else
     {
       return FALSE;
     }
   }
   function update_newadmission_sbi_failure_details($data)
   {
     $this->db->where('order_id', $data['order_id']); // pay db
     $query = $this->db->update('online_payment_newadmission_sbi_failure_details',$data); // pay db

     $this->db2->where('order_id', $data['order_id']); // mis db
     $query2 = $this->db2->update('online_payment_newadmission_sbi_failure_details',$data); // mis db

     $this->db3->where('order_id', $data['order_id']); // newadmission db
     $query3 = $this->db3->update('online_payment_newadmission_sbi_failure_details',$data); // newadmission db

     if($this->db->affected_rows() > 0)
     {
       return TRUE;
     }
     else
     {
       return FALSE;
     }
   }
   function check_get_using_order_id_success($order_id)
   {
     $query = $this->db->get_where('online_payment_newadmission_sbi_success_details',[ 'order_id' => $order_id ]);

     if($query->num_rows() > 0)
     {
       return $query->row_array();
     }
     else
     {
       return FALSE;
     }
   }
   function update_newadmission_sbi_success_details($data)
   {
     $this->db->where('order_id', $data['order_id']);
     $query = $this->db->update('online_payment_newadmission_sbi_success_details',$data);

     $this->db2->where('order_id', $data['order_id']); // mis db
     $query2 = $this->db2->update('online_payment_newadmission_sbi_success_details',$data); // mis db

     $this->db3->where('order_id', $data['order_id']); // newadmission db
     $query3 = $this->db3->update('online_payment_newadmission_sbi_success_details',$data); // newadmission db

     if($this->db->affected_rows() > 0)
     {
       return TRUE;
     }
     else
     {
       return FALSE;
     }
   }
   // update payment log in final verification
   function update_newadmission_payment_log($data)
   {
     $this->db->where('order_id', $data['order_id']);
     $query = $this->db->update('online_payment_newadmission_log',$data);

     $this->db2->where('order_id', $data['order_id']); // mis db
     $query2 = $this->db2->update('online_payment_newadmission_log',$data); // mis db

     $this->db3->where('order_id', $data['order_id']); // newadmission db
     $query3 = $this->db3->update('online_payment_newadmission_log',$data); // newadmission db

     if($this->db->affected_rows() > 0)
     {
       return TRUE;
     }
     else
     {
       return FALSE;
     }
   }
   // if suucces tranaction final then get stud_final_with_fee for update status success for registration
   // function get_stud_final_with_fee_from_newadmission($reg_id,$email,$contact_no,$admn_type)
   // {
   //     //$this->db2->select('sl_no,admn_no,reg_id,contact_no,email,admn_type,fee_status,fee_status_msg,fee_order_no');
   //     $this->db3->select('admn_no,reg_id,contact_no,email,admn_type');
   //     $query = $this->db3->get_where('stud_final_with_fee',[ 'reg_id' => $reg_id , 'email' => $email , 'contact_no' => $contact_no , 'admn_type' => $admn_type ]);

   //     if($query->num_rows() > 0)
   //     {
   //       return $query->row_array();
   //     }
   //     else
   //     {
   //       return FALSE;
   //     }
   // }
   function update_fee_status_stud_final_with_fee_from_newadmission($where_data , $success_data)
   {
       //$this->db3->select('sl_no,admn_no,reg_id,contact_no,email,admn_type,fee_status,fee_status_msg,fee_order_no');
       $this->db3->where($where_data);
       $query3 = $this->db3->update('online_payment_stud_final_fee',$success_data); // newadmission db

       $this->db2->where($where_data); // mis db
       $query2 = $this->db2->update('online_payment_stud_final_fee',$success_data); // mis db

       $this->db->where($where_data); // pay db
       $query = $this->db->update('online_payment_stud_final_fee',$success_data);// pay db

       if($this->db3->affected_rows() > 0)
       {
         return TRUE;
       }
       else
       {
         return FALSE;
       }
   }
   function check_order_id_newadmission($order_id)
   {
     $query = $this->db3->get_where('online_payment_newadmission_check_order_no',['order_no' => $order_id]);

       if($query->num_rows() > 0)
       {
         return $query->row_array();
       }
       else
       {
         return FALSE;
       }
   }
   function update_page_open_status_newadmission($order_id)
   {
       $page_open_status = array('page_open_status' => 'N');
       $where_order_no = array('order_no' => $order_id);
       $this->db3->where($where_order_no);
       $query = $this->db3->update('online_payment_newadmission_check_order_no',$page_open_status);
       // echo $this->db3->last_query(); exit;
       if($this->db3->affected_rows() > 0)
       {
         return TRUE;
       }
       else
       {
         return FALSE;
       }
   }
   // now check in phd branch selected then
   function check_phd_phdba_branch_newadmission($reg_id,$admn_type)
   {
       $query3 = $this->db3->query("SELECT reg_id, COUNT(reg_id) AS total_record FROM online_payment_stud_final_fee GROUP BY reg_id
   HAVING COUNT(reg_id) > 1 AND reg_id = '$reg_id'");

       if($query3->num_rows() > 0)
       {
           $total_record = $query3->row_array();
           return $total_record['total_record'];
       }
       else
       {
           return false;
       }
   }
   function get_phd_select_branch_by_stu_newadmission($where_data)
   {
       $query3 = $this->db3->get_where("phd_select_branch_by_stu",$where_data);
       // echo $this->db->last_query(); exit;

       if($query3->num_rows() > 0)
       {
           return $query3->row_array();
       }
       else
       {
           return false;
       }
   }
   function get_final_data_online_payment_stud_final_fee_newadmission($where_data)
   {
       $query3 = $this->db3->get_where("online_payment_stud_final_fee",$where_data);
       // echo $this->db->last_query(); exit;

       if($query3->num_rows() > 0)
       {
           return $query3->row_array();
       }
       else
       {
           return false;
       }
   }
   // now check in phd branch selected then
   // changes for phd 2021
 function get_branch_from_phd($branch_id)
 {
   $this->db3->select('branch_name');
   $this->db3->where('branch_id',$branch_id); // from newadmission db
   $query=$this->db3->get('dept_course_branch_phd_new');
   $row=$query->row_array();
   return $row;
 }
 function get_dept_from_phd($dept_id)
 {
   $this->db3->select('dept_name');
   $query = $this->db3->get_where('dept_course_branch_phd_new',['dept_id' => $dept_id]); // from newadmission db
   return $query->row_array();
 }
// end changes for phd 2021
   /////amit payment code end her
}
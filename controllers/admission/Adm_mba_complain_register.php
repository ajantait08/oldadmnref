<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adm_mba_complain_register extends MY_Controller
{
	function __construct()
    {
        parent::__construct();
        $this->load->model('admission/adm_mba_complain_model','',TRUE);
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('captcha');
        $this->load->library('encrypt');
        $this->load->library('zip');
        $this->load->library('email');
        $this->load->library('form_validation');
        $this->load->helper(array('form','url'));
        $this->load->model('admission/Add_mba_registration_model');
        $this->load->model('admission/Adm_mba_application_model');
        $this->load->model('admission/Adm_mba_personal_details_model');

          // /** misdev ftp connect */

          define('ftp_host','172.16.200.88'); // address of online.iitism.ac.in // making the connection from misdev and pbeta
          // define('ftp_host','172.16.200.86'); // address of beta.iitism.ac.in  // making the connection from misdev and pbeta
          define('ftp_user_name','misadmin');
          define('ftp_user_pass','qwerty!43@1');

          /** misdev ftp connect */
          //  define('ftp_host','172.16.200.90'); // address of online.iitism.ac.in // making the connection from misdev and pbeta
          //  // define('ftp_host','172.16.200.86'); // address of beta.iitism.ac.in  // making the connection from misdev and pbeta
          //   define('ftp_user_name','root');
          //   define('ftp_user_pass','I$M%MISD');

           
    }

    public function index()
    {   
        $this->load->model('admission/Adm_mba_personal_details_model');
        $email= $this->session->userdata('email');
        if(!($this->session->has_userdata('login_type')))
        {
           redirect('admission/Add_mba/adm_mba_login');
        }

        $viewdata['name'] = $this->session->userdata('name');  
        $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);
        $tab_status=$this->Adm_mba_personal_details_model->get_tab_status($get_reg_no);
        $tab=$this->Adm_mba_personal_details_model->check_tab($get_reg_no);
        if(!empty($tab))
        {
            $viewdata['tab']=$tab[0]->highest;
        }
       
        $data['val']="H";
        $this->adm_mba_header($data);
        $this->load->view('admission/adm_mba_complain_view',$viewdata);
        $this->adm_mba_footer();
       
    }

    public function save()
    {    
        if(!($this->session->has_userdata('login_type')))
        {
           redirect('admission/Add_mba/adm_mba_login');
        }
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('order_no', 'Order Number', 'required|callback_order_no_exist'); 
        // $this->form_validation->set_rules('order_no', 'Order Number', 'required|callback_order_no_exist|callback_order_no_in_log');// is_unique[newadmission_complaint.ref_no]|
        $this->form_validation->set_rules('email', 'Email id', 'required');
        $this->form_validation->set_rules('contact_no', 'Contact No', 'required');
        $this->form_validation->set_rules('complain_type', 'Complain type', 'required');
        $this->form_validation->set_rules('payment_type', 'Payment type', 'required');
        //$this->form_validation->set_rules('contact_details', 'Order Number', 'required');

        if($this->form_validation->run() == FALSE)
        {

            $data['val']="H";
            $this->adm_mba_header($data);
            $this->load->view('admission/adm_mba_complain_view',$data);
            $this->adm_mba_footer();
           
        }
        else
        {
            // generate complain id
            $com_id = $this->generate_complain_id();
            $order_no =$this->apha_numeric_only($this->input->post('order_no'));
            $email = $this->cleanspecailcharacter($this->input->post('email'));
            $contact_no =$this->number_only($this->input->post('contact_no'));
            $complain_type =$this->clean($this->input->post('complain_type'));
            $complain_details =$this->clean($this->input->post('complain_details'));
            $type =$this->clean($this->input->post('payment_type'));
            $email_k= $this->session->userdata('email');
            if($email_k!= $email)
            {
                $this->session->set_flashdata('message_error','Registered Email id does not match error !');
                redirect('admission/Adm_mba_complain_register');
            }
            if($order_no=="NA" || $order_no=="na")
            {

            }
            else
            {
                $getval= $this->adm_mba_complain_model->check_order_no($order_no,$email);
                // echo $this->db->last_query();
                // exit;
                if($getval!='ok')
                {
                    $this->session->set_flashdata('message_error','Order No  does not match error !');
                    redirect('admission/Adm_mba_complain_register');
                }
            }
            // exit;
            $upload_error=$this->our_upload($order_no,$email);  // make it to return errors of file upload

            if(empty($upload_error['photo_error']))
            {
                $data = array(
                    'com_id' => $com_id,
                    'ref_no' => $order_no,
                    'email' => $email,
                    'contact_no' => $contact_no,
                    'complain_type' => $complain_type,
                    'complain_details' => $complain_details,
                    'img_path' => $upload_error['file_name'],
                    'type' => $type
                );
                // echo "<pre>"; print_r($data); exit;

                if($this->adm_mba_complain_model->insert_complain($data)) // if data inserted successfully
                {
                    $this->session->set_flashdata('data_name', $com_id);
                    redirect('admission/Adm_mba_complain_register/complain_details');
                    
                   
                }
                else
                {
                    $payment_data['msg'] = "<div style=color:red;>Complain registration fail ! please try again <div>";
                    $this->adm_mba_header($data);
                    $this->load->view('admission/adm_mba_complain_app',$data);
                    $this->adm_mba_footer();
                   
                }
            }
            else
            {
                $up_error = $upload_error['photo_error'];
                $payment_data['msg'] = "<div style=color:red;>$up_error<div>";
                $this->load->view('admission/adm_mba_complain_view',$payment_data);
            }

        }
    }
    public function complain_details()
    {   
        if(!($this->session->has_userdata('login_type')))
        {
           redirect('admission/Add_mba/adm_mba_login');
        }
        $val = $this->session->flashdata('data_name');
        if(empty($val))
        {
            redirect('admission/Adm_mba_complain_register');
        }
        

        $this->load->model('admission/Adm_mba_personal_details_model');
        $email= $this->session->userdata('email');
        $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);
        $tab=$this->Adm_mba_personal_details_model->check_tab($get_reg_no);
        if(!empty($tab))
        {
            $data['tab']=$tab[0]->highest;
        }

        $where['com_id'] = $val;
        $data = $this->adm_mba_complain_model->get_complain($where);
        $data['msg'] = "<div  style=color:green;>Complain created successfully ! Please track complain status regularly. <div>";
        $data['val']="H";
        $this->adm_mba_header($data);
        $this->load->view('admission/adm_mba_complain_app',$data[0]);
        $this->adm_mba_footer();
    }
    
    public function complain_status()
    {   
        
        $this->load->model('admission/Adm_mba_personal_details_model');
        $email= $this->session->userdata('email');
        if(!($this->session->has_userdata('login_type')))
        {
           redirect('admission/Add_mba/adm_mba_login');
        }
        $viewdata['name'] = $this->session->userdata('name');  
        $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);
        $tab_status=$this->Adm_mba_personal_details_model->get_tab_status($get_reg_no);
        $tab=$this->Adm_mba_personal_details_model->check_tab($get_reg_no);
        $value=$tab[0]->highest;
        $viewdata['tab']=$tab[0]->highest; 
        $data['val']="H";
        $this->adm_mba_header($data);
        $this->load->view('admission/adm_mba_complain_status',$viewdata);
        $this->adm_mba_footer();
       
    }

    public function track_status()
    {  
        if(!($this->session->has_userdata('login_type')))
        {
           redirect('admission/Add_mba/adm_mba_login');
        }
        $order_no = $this->input->post('order_no');
        $email = $this->input->post('email');
        $email_k= $this->session->userdata('email');
        if(!empty($order_no))
        {   
            $getval= $this->adm_mba_complain_model->check_order_no($order_no,$email_k);
                // echo $this->db->last_query();
                // exit;
            if($getval=='ok')
            {
                $where['ref_no'] = $order_no;
                $result['data'] = $this->adm_mba_complain_model->get_complain($where);
                $data['val']="H";
                $this->adm_mba_header($data);
                $this->load->view('admission/adm_mba_complain_status',$result);
                $this->adm_mba_footer();
            }
            else 
            {
                $this->session->set_flashdata('message_error','Order No  does not match error !');
                redirect('admission/Adm_mba_complain_register/track_status');
            }
           
           
        }

        else if(!empty($email))
        {   
            $email_k= $this->session->userdata('email');
            if($email_k == $email)
            {
                $where['email'] = $email;
                $result['data'] = $this->adm_mba_complain_model->get_complain($where);
                $data['val']="H";
                $this->adm_mba_header($data);
                $this->load->view('admission/adm_mba_complain_status',$result);
                $this->adm_mba_footer();
            }
            else
            {
                $this->session->set_flashdata('message_error','Registered Email id does not match error !');
                redirect('admission/Adm_mba_complain_register/track_status');
            }
            
           
        }

        else
        {
            $error_data['msg'] = "<div style=color:red;>Field can not be blank !<div>";
            $data['val']="H";
            $this->adm_mba_header($data);
            $this->load->view('admission/adm_mba_complain_status',$error_data);
            $this->adm_mba_footer();
           
        }
    }

    function generate_complain_id()
    {
      $prefix = "COM";
      $year = date("y");
      $month = date("m");
      $day = date("d");
      $data = $prefix.$day.$month.$year;
      $one_cap = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      $cap_shuffled = str_shuffle($one_cap);
      $first_cap = substr($cap_shuffled, 1, 1); // 1
      $one_no = "0123456789876543210";
      $no_shuffled = str_shuffle($one_no);
      $second_no = substr($no_shuffled, 1, 1); // 2
      $third_6 = '0123456789abcdefghijklmnopqrstiuvwxyz';
      $third_shuffled = str_shuffle($third_6);
      $third_6_char = substr($third_shuffled, 1, 8); // 3

      $complain_id = $data.$first_cap.$second_no.$third_6_char;
      return $complain_id;
    }
     
    function our_upload($order_no,$email)
    {  

        // connection (misdev)
		// $connection2 = ssh2_connect('172.16.200.90', 22);
		// $con2 = ssh2_auth_password($connection2, 'root', 'I$M%MISD');
        // $sftp2 = ssh2_sftp($connection2);
        // $dstFile = '/var/www/html/assets/admission/mba/complain/';
        // connection (mis)
        $connection2 = ssh2_connect('103.15.228.70', 22);
        $con2 = ssh2_auth_password($connection2, 'filesync', 'F!l3sync#@$%007');
        // $connection2 = ssh2_connect('172.16.200.88', 22);
        // $con2 = ssh2_auth_password($connection2, 'misadmin', 'qwerty!43@1');
        $sftp2 = ssh2_sftp($connection2);
        $dstFile = '/var/www/html/assets/admission/mba/complain/';
                                                                                                 
        $config=array();
        $config['upload_path']='/disk2/virtualhost/admission/public_html/html/assets/admission/mba/complain'; //  student_db_upload
        $config['overwrite'] = TRUE;
        //$config['allowed_types']='jpg|png|jpeg|JPG|pdf'; //
		$config['allowed_types']='*';
        $config['max_size']='20048';// in KB
        if($order_no='NA' || $order_no='na' || $order_no='Na'){
            $config['file_name'] = 'com_'. rand();
        }else{
            $config['file_name'] = 'com_'.$order_no;
        }
        $this->load->library('upload',$config);

        if(!is_dir($config['upload_path'])) //create the folder if it's not already exists
          {
             mkdir($config['upload_path'],0777,TRUE);
          }

         // create folder in misdev/mislive if not exist
        if(!is_dir('ssh2.sftp://' . $sftp2 . $dstFile))
        {
          mkdir('ssh2.sftp://' . $sftp2 . $dstFile,0777,true);
        }
 
          $this->upload->initialize($config);
          $upload_error=array();// for sending upload error to new_admission_form
          $upload_complain_img = $this->upload->do_upload('complain_img');

        if($upload_complain_img)
        {
         $upload_data = $this->upload->data();
         $_POST['complain_img']=$upload_data['file_name'];
         $img_name['file_name'] = $upload_data['file_name'];

          // after successfully upload image in newadmission then store in other server folder
        $ImgName = $upload_data['file_name'];
        $sftpStream2 = fopen('ssh2.sftp://' . intval($sftp2) . $dstFile, 'r');
        $srcPath = '/var/www/html/assets/admission/mba/complain/'.$ImgName;
        $srcImg = '/disk2/virtualhost/admission/public_html/html/assets/admission/mba/complain/'.$ImgName;
        $newDstImg = $dstFile.$ImgName;
		 ssh2_scp_send($connection2, $srcImg, $newDstImg, 0664);
         // after successfully upload image in newadmission then store in other server folder
         return $img_name;
       }
        else
        {
            $upload_error['photo_error']=$this->upload->display_errors();
            $upload_error['complain_img'];
            return $upload_error;
        }

    }

    public function order_no_exist($order_no) {
        $this->load->library('form_validation');
        //$this->load->model('user');
        $is_exist = $this->adm_mba_complain_model->isOrdernoEmailExist($order_no);
        
        if ($is_exist && $order_no!='na' && $order_no!='NA') {
            $this->form_validation->set_message(
                'order_no_exist', 'Order number is already exist.'
            );
            return false;
        } else {
            return true;
        }
    }
    public function order_no_in_log($order_no)
    {   

        $this->load->library('form_validation');
        
        $in_log = $this->adm_mba_complain_model->isOrdernoInLog($order_no);
        
        if ($in_log=="log_in") {

            return true;
        } else {
            $this->form_validation->set_message(
                'order_no_in_log', 'Please enter valid order number .'
            );
            return false;
        }

    }
  function apha_numeric_only($string)
  {
    return preg_replace('/[^A-Za-z0-9\s]/', '', $string); 
  }

  function clean($string) // Removes special chars.
  {
    return preg_replace('/[^A-Za-z\s]/', '', $string); 
    
  }
  function number_only($string) //accept only number
  {
    return preg_replace( '/[^0-9]/', '', $string ); 
  }
  function with_comma_hypen($string)
  {
    return preg_replace('/[^A-Za-z,-\s]/', '', $string); 
  }
  function number_with_dot($string)
  {
    return preg_replace( '/[^0-9.]/', '', $string ); 
  }
  function number_slash_hypen($string)
  {
    return preg_replace( '/[^0-9.]/', '', $string ); 
  }

  // Function to remove the spacial 
  function cleanspecailcharacter($str){
    $res = str_ireplace( array( '\'', '"',
    ',' , ';', '<', '>','+','='), ' ', $str); 
    return $res;
  }


}
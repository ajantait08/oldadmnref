<?php

class Adm_mba_document extends MY_Controller {

	function __construct() 
  {
    parent::__construct();
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
    // $this->load->library('email1');
    $this->load->model('admission/Add_mba_registration_model');
    $this->load->model('admission/Adm_mba_personal_details_model');
    $this->load->model('admission/Adm_mba_application_model');
    $this->load->model('admission/admin/Adm_mba_document_model','amd',TRUE);
    $this->load->model('admission/admin/Mba_dashboard_model', 'Mba_all', TRUE);
  }

  function index()
  { 
    

  }

  public function document_view_of_candidate()
  { 
    $get_reg_no=$this->input->post('reg_number');
    $emails = $this->Mba_all->get_email_by_reg_no($get_reg_no);
    $array = array(
      'email' =>  $emails,
    );
    
    $this->session->set_userdata($array);
    $email=$this->session->userdata('email');
    $count=0;
    $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);
    $data['registration_detail']=$this->Add_mba_registration_model->get_registration_detail_by_email($email);
    $data['upload_document']=$this->amd->get_all_document_uploaded($get_reg_no);
    $data['application_details']=$this->Add_mba_registration_model->get_application_programme_details($get_reg_no);
    $data['pg_data']=$this->amd->check_pg_record($get_reg_no,'PG Exam');
    $data['cat_score']=$this->amd->check_cat_score_record($get_reg_no);
    
    // echo "<pre>";
    // print_r($data['upload_document']);
    // exit;
    
    $total_document=$this->amd->count_total_document($get_reg_no);
    
    // echo $this->db->last_query();
    // exit;
    $total_document[0]->registration_no;
    $data['pwd']=$total_document[0]->pwd;
    $data['work_experince']= $total_document[0]->work_expreince;
    $data['category']=$total_document[0]->category;
    
    // echo "<pre>";
    // print_r($data['upload_document']);
    // exit;
    if(!empty($data['pg_data']))
    {
      $count=$count+1;
    }
    if(!empty($data['cat_score']))
    {
      $count=$count+1;
    }
    
    if($total_document[0]->work_expreince =='Yes')
    {
      $count=$count+1;
    }
    if($total_document[0]->category!='General')
    {
      $count=$count+1;
    }
    if($total_document[0]->pwd=='Y')
    {
      $count=$count+1;
    }
     
    // echo "<pre>";
    // print_r($data['upload_document']);
    // exit;
     
    $doc_total=$count+4; //four document mandatory for all 
    $data['total_document']=$doc_total;
    $data['val']="H";
    $this->load->view('admission/admin/layout/header');
    $this->load->view('admission/admin/adm_mba_document_view',$data);
    $this->load->view('admission/admin/layout/footer');

  }

  public function document_submit()
  {
    $email=$this->session->userdata('email');
  
    $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);
    // before submit check in backend all documented is uploaded or not if client side went for valdidation and throw msg.
    $personal_details=array(
      'status'=>'DU'
    );
    
    $tab=array(
      'tab4'=>4,
    );
    //$this->Adm_mba_personal_details_model->update_personal_deatils($personal_details,$get_reg_no);
    // $this->amd->update_tab1($tab,$get_reg_no);
    //  echo $this->db->last_query();
    // exit;
    if($this->amd->update_tab1($tab,$get_reg_no))
    { 
      
      $this->session->set_userdata('pay_start','pay_start');
      $this->session->set_flashdata('success','All document uploaded successfully please proceed for payment');
      $this->session->set_userdata('pay_start','pay_start');
      redirect('admission/Adm_mba_payment');
      //$this->session->unset_userdata('doc_start');
    }
    else 
    {
      $this->session->set_flashdata('error','Internal data Error occur 203');
      redirect('admission/Adm_mba_document');
    }    
   
  }

  public function document_upload($v)
  { 
   
    $file=$v;
    if($file=='ug_mark_sheet')
    {
      $doctype='ugm';
    }
    else if($file=='filedob')
    {
      $doctype='dob';
    }
    
    else if($file=='tenth_doc')
    {
      $doctype='10th';
    }
    else if($file=='12th_doc')
    {
      $doctype='12th';
    }
    else if($file=='cat_score_card_docs')
    {
      $doctype='cat';
    }
    else if($file=='pwd_certificate_doc')
    {
      $doctype='pwd';
    }
    else if($file=='cat_certificate_doc')
    {
      $doctype='caste';
    }
    else if($file=='pg_marksheet_doc')
    {
      $doctype='pgm';
    }
    else if($file=='photo')
    {
      $doctype='photo';
    }
    else if($file=='signature')
    {
      $doctype='signature';
    }
    else 
    {
      $doctype='work';
    }

    $upload='';
    $email = $this->session->userdata('email');
    $this->load->model('admission/Add_mba_registration_model');
    $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);
    $data['registration_detail']=$this->Add_mba_registration_model->get_registration_detail_by_email($email);
    if (!file_exists('./assets/admission/mba/'.$get_reg_no))
    {
      mkdir('./assets/admission/mba/'.$get_reg_no, 0777, true);
    }
        //upload file
        $string = 'abcdefghijklmnopqrstiuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string_shuffled = str_shuffle($string);
        $tran_id = substr($string_shuffled, 1, 4);
        $config['upload_path'] = './assets/admission/mba/'.$get_reg_no;
        $config['allowed_types'] = '*';
        $config['max_filename'] = '255';
        $config['overwrite']=TRUE;
         $config['file_name'] =$get_reg_no.$tran_id.$this->clean($_FILES[$file]['name']);
        $config['max_size'] = '2024'; //1 MB
        if (isset($_FILES[$file]['name']))
         { 
            if (0 < $_FILES[$file]['error'])
           {
                $msg='Error during file upload' . $_FILES[$file]['error'];
            }
           else
            {
                if (false)

                {
                    $msg='File already exists : uploads/' . $_FILES[$file]['name'];
                } 
                else 
                {
                  $this->load->library('upload', $config);
                  if (!$this->upload->do_upload($file)) {
                      $msg= $this->upload->display_errors();
                  } 
                  else
                  { 
                    
                    $msg='Uploaded file ' . $_FILES[$file]['name'].' '. 'can be viewed using Preview button';
                    $str = $file;
                    $this->session->set_userdata($file,$str);
                    // $this->session->unset_userdata('dob');
                    $send= base64_encode($str);
                    $emp_no  =$this->session->userdata('emp_no');
                    $emp_name  =$this->session->userdata('emp_name');
                    $verfied_done_by= $emp_name."(".$emp_no.")";
                    $k=base_url()."assets/admission/mba/".$get_reg_no."/".$get_reg_no.$tran_id.$this->clean($_FILES[$file]['name']);
                    if($file=='photo' || $file =='signature')
                    {
                      $k=base_url()."assets/admission/mba/".$get_reg_no."/".$get_reg_no.$tran_id.$this->clean($_FILES[$file]['name']);
                      $document=array( 
                        'registration_no'=>$get_reg_no,
                        'doc_id'=>$doctype,
                        'doc_path'=>'assets/admission/mba/'.$get_reg_no.'/'.$get_reg_no.$tran_id.$this->clean($_FILES[$file]['name']),
                        'created_by'=>$verfied_done_by
                      );
                    }
                    else
                    {
                      $document=array( 
                        'registration_no'=>$get_reg_no,
                        'doc_id'=>$doctype,
                        'doc_path'=>'assets/admission/mba/'.$get_reg_no.'/'.$get_reg_no.$tran_id.$this->clean($_FILES[$file]['name']),
                        'created_by'=>$verfied_done_by
                      );
                    }
                   
                    if($this->Adm_mba_personal_details_model->insert_document_val($document))
                    {
                      $upload='doc_ok';
                    }
                    else
                    {
                      $upload='not';
                    }
                    
                  }
                }
            }
        } 
        else 
        {
            $msg='Please choose a file';
        }
         $response = array(
          'msg' =>$msg,
          'link'=>$k,
          'send'=>$send,
          'two'=>$v,
          'doc_msg'=>$upload,
          'file_name'=> $file,
       
        );
        echo json_encode($response); 
  }

  public function document_remove($remove)
  { 
    
    $email= $this->session->userdata('email');
    $this->load->model('admission/Add_mba_registration_model');
    $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);
    $upload='';
    $file=$remove;
    $file=$remove;
    if($file=='ug_mark_sheet')
    {
      $doctype='ugm';
    }
    else if($file=='filedob')
    {
      $doctype='dob';
    }
    
    else if($file=='tenth_doc')
    {
      $doctype='10th';
    }
    else if($file=='12th_doc')
    {
      $doctype='12th';
    }
    else if($file=='cat_score_card_docs')
    {
      $doctype='cat';
    }
    else if($file=='pwd_certificate_doc')
    {
      $doctype='pwd';
    }
    else if($file=='cat_certificate_doc')
    {
      $doctype='caste';
    }
    else if($file=='pg_marksheet_doc')
    {
      $doctype='pgm';
    }
    else if($file=='photo')
    {
      $doctype='photo';
    }
    else if($file=='signature')
    {
      $doctype='signature';
    }
    else 
    {
      $doctype='work';
    }
    $cond=array(
      'registration_no' =>$get_reg_no,
      'doc_id' => $doctype
    );

    
    // $data['registration_detail']=$this->Add_mba_registration_model->get_registration_detail_by_email($email);
    $files =(file_exists('assets/admission/mba/'.$get_reg_no.'/'.$file.$get_reg_no.'.pdf'));
    if($files)
    {
      // unlink("https://nfrdev.iitism.ac.in/assets/images/nfr_user_documenttt/dob/app_no/$app_no/user_dob".$app_no.".pdf");
      //$this->session->unset_userdata('dob');
      $this->session->unset_userdata($file);
      // $msg="no file avaiable";
      //$msg=base_url()."assets/admission/mba/".$get_reg_no."/".$file.$get_reg_no.".pdf";
      $this->amd->insert_document_log($cond);
      
      if($this->Adm_mba_personal_details_model->remove_document_val($cond))
      {
        $upload='doc_remove';
      }
      else
      {
        $upload='not';
      }
      $this->session->unset_userdata($file);

      $msg ="File has been removed";

    }
    else
    { 
      $this->amd->insert_document_log($cond);
      if($this->Adm_mba_personal_details_model->remove_document_val($cond))
      {
        $upload='doc_remove';
      }
      else
      {
        $upload='not';
      }
      $this->session->unset_userdata($file);
      $msg ="File has been removed";
       
    }
   

    $response = array(
    'msg' =>$msg,
    'doc_remove' =>$upload,
    'file_name' =>$file,
    );

    echo(json_encode($response));
  }

 

  function generate_order_no($admn_type)
  {
    $admn_type = strtoupper($admn_type);
    $type = substr($admn_type, 0, 2);
    $iitism = "IITISM";
    $string = '0123456789abcdefghijklmnopqrstiuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string_shuffled = str_shuffle($string);
    $tran_id = substr($string_shuffled, 1, 4);
    // $timestamp = strtotime(date('Y-m-d H:i:s'));
    $date=date("Y-m-d");
    $date_explode=explode('-',$date);
    $year = sprintf('%02d', $date_explode[0]);
    $month = sprintf('%02d', $date_explode[1]);
    $day = sprintf('%02d', $date_explode[2]);
    $time=date("H:i:s");
    $time_explode=explode(':',$time);
    $hour = sprintf('%02d', $time_explode[0]);
    $minute = sprintf('%02d', $time_explode[1]);
    $second = sprintf('%02d', $time_explode[2]);
    $timestamp = $day.$month.$year.$hour.$minute.$second;
    $ordernumber = $iitism.$type.$timestamp.$tran_id;
    return $ordernumber;
  }

  public function validate_photo_signature_doc()
  {   
     
      $email=$this->session->userdata('email');
      $total=$this->input->post('total');
      $count=0;
      $ten_id='10th';
      $twe_id='12th';
      $dob_id='dob';
      $ugm_id='ugm';
      $signature_id='signature';
      $photo_id='photo';
      $caste_id='caste';
      $work_id='work';
      $pwd_id='pwd';
      $pgm_id='pgm';
      $cat_id='cat';
      $get_reg_no=$this->Add_mba_registration_model->get_registration_no_by_email($email);
      
      $total_document=$this->amd->count_total_document($get_reg_no);
      $ugm=$this->amd->count_document_id($get_reg_no,$ugm_id);
      
      $signature=$this->amd->count_document_id($get_reg_no,$signature_id);
      $photo=$this->amd->count_document_id($get_reg_no,$photo_id);
      $ten=$this->amd->count_document_id($get_reg_no,$ten_id);
      $twelve=$this->amd->count_document_id($get_reg_no,$twe_id);
      $dob=$this->amd->count_document_id($get_reg_no,$dob_id);
      $cat=$this->amd->count_document_id($get_reg_no,$cat_id);
      $pwd=$this->amd->count_document_id($get_reg_no,$pwd_id);
      $pgm=$this->amd->count_document_id($get_reg_no,$pgm_id);
      $work=$this->amd->count_document_id($get_reg_no,$work_id);
      $pwd=$this->amd->count_document_id($get_reg_no,$pwd_id);
      $data['pg_data']=$this->amd->check_pg_record($get_reg_no,'PG Exam');
      $data['cat_score']=$this->amd->check_cat_score_record($get_reg_no);
      $caste=$this->amd->count_document_id($get_reg_no,$caste_id);
      // echo $this->db-last_query();
      // exit;
      
      if($ten=='ok')
      {
        $count=$count+1;
      }
      
      if($twelve=='ok')
      {
        $count=$count+1;
      }

      if($dob=='ok')
      {
        $count=$count+1;
      }
      
      if($ugm=='ok')
      {
        $count=$count+1;
      }

      if(!empty($data['pg_data']))
      {
        if($pgm=='ok')
        {
          $count=$count+1;
        }
      }

      if(!empty($data['cat_score']))
      {
        if($cat=='ok')
        {
          $count=$count+1;
        }
      }

      if($total_document[0]->work_expreince =='Yes')
      {
        if($work=='ok')
        {
          $count=$count+1;
        }
      }

      if($total_document[0]->category!=='General')
      {
        if($caste=='ok')
        {
          $count=$count+1;
        }
      }

      if($total_document[0]->pwd=='Y')
      {
        if($pwd=='ok')
        {
          $count=$count+1;
        }
      }
      
      $doc_total=$count; //three document mandatory for all 
      $arr=array(
        'total'=>$doc_total,
        'photo'=>$photo,
        'signature'=>$signature,
      );
    //$value=$this->Add_mba_registration_model->get_application_programme_details($get_reg_no,$doc_id);
    echo (json_encode($arr));
  }
  function clean($string) // Removes special chars.
  {
    return preg_replace('/[^A-Za-z\.s]/', '', $string); 
    
  }
 

}
?>

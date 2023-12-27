<?php

class Adm_mtech_document extends MY_Controller {

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
    $this->load->model('admission/mtech/Add_mtech_registration_model');
    $this->load->model('admission/mtech/Adm_mtech_personal_details_model');
    $this->load->model('admission/mtech/Adm_mtech_application_model');
    $this->load->model('admission/mtech/Adm_mtech_document_model','amd');
  }

  function index()
  { 

    if(!($this->session->has_userdata('login_type')))
    {
      redirect('admission/mtech/Add_mtech/adm_mtech_login');
    }
    if(!($this->session->has_userdata('doc_start')))
    {
       redirect('admission/Add_mtech/adm_mtech_login');
    }

    $email=$this->session->userdata('email');
    $count=0;
    $check_color='';
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $data['registration_detail']=$this->Add_mtech_registration_model->get_registration_detail_by_email($email);
    $data['upload_document']=$this->amd->get_all_document_uploaded($get_reg_no);
    $data['application_details']=$this->Add_mtech_registration_model->get_application_programme_details($get_reg_no);
    $workexprow=$this->Adm_mtech_personal_details_model->get_work_exp_row($get_reg_no);
    $candidate_type=$this->Add_mtech_registration_model->get_candidate_type_by_email($email);
    $total_document=$this->amd->count_total_document($get_reg_no);
    $data['candidate_type']=$candidate_type;
    $data['pg_data']=$this->amd->check_pg_record($get_reg_no,'PG Exam'); 
    
    $data['gate_data']=$this->amd->check_gate_score_record($get_reg_no);
    $data['color_blind']=$this->amd->check_color_blind_doc($get_reg_no);
    // echo $this->db->last_query();
    // exit;
    $data['work_exp']=$workexprow;
    if($total_document[0]->pwd=='Y')
    {
      $data['pwd']="yes";
    }
    if($total_document[0]->category!='General')
    {
      $data['category']=$total_document[0]->category;
    }
    
    // echo "<pre>";
    // print_r($data);
    // exit;
    // echo $this->db->last_query();
    // exit;
  
    $total_document[0]->registration_no;
    
    if(!empty($workexprow))
    {
      $count=$count+1;
    }
    

    if(!empty($data['color_blind']))
    {
      $count=$count+1;
    }

    if(!empty($data['pg_data']))
    {
      $count=$count+1;
    }

    if(!empty( $data['gate_data']))
    {
      $count=$count+1;
    }
  
    if($total_document[0]->category!='General')
    {
      $count=$count+1;
    }
    
    if($candidate_type=='Sponsored Candidates')
    {
      $count=$count+2;
    }

    if($total_document[0]->pwd=='Y')
    {
      $count=$count+1;
    }
  
    $doc_total=$count+3;
    $data['total_document']=$doc_total;
    // echo "<pre>";
    // print_r( $data['total_document']);
    // exit;
    $data['val']="home";
    $this->adm_mtech_header($data);
    $this->load->view('admission/mtech/adm_mtech_document_view',$data);
    $this->adm_mtech_footer();

  }

  public function document_submit()
  { 

    if(!($this->session->has_userdata('login_type')))
    {
      redirect('admission/mtech/Add_mtech/adm_mtech_login');
    }
    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $data['candidate_type']=$this->Add_mtech_registration_model->get_candidate_type_by_email($email);
    $candidate_type=$this->Add_mtech_registration_model->get_candidate_type_by_email($email);
    $coap_val=$this->input->post('coap_reg');
    $coap_re=$this->input->post('coap_reg_re');
    if($candidate_type=='GATE Candidates')
    { 
      if($coap_val!=$coap_re)
      {
        $this->session->set_flashdata('error','Re-enter coap registration field does not match.');
        redirect('admission/mtech/Adm_mtech_document');
        exit;
      }

      $this->form_validation->set_rules('coap_reg','COAP registration','required');
    }
    else 
    {
      $coap_val="N/A";
    }
    $this->form_validation->set_rules('doc_filed','Error ocured','required');
    if ($this->form_validation->run() == True) 
    { 
      $val=array(
       'status'=>'DU',
       'coap_reg_id'=>$coap_val,
      );
      $tab=array(
        'tab4'=>4,
      );
    
     
     

      $tb_check=$this->amd->check_tab_fill_status($get_reg_no);
     
      if($tb_check[0]['tab1']=='' || $tb_check[0]['tab2']==''||  $tb_check[0]['tab3']=='')
      { 
        $this->session->set_flashdata('error','Internal network error code TO01 please mail to admission_mtech@iitism.ac.in ');
        redirect('admission/mtech/Adm_mtech_document');
        exit;
      }
      
     
      $ok=$this->amd->update_personal_deatils($val,$get_reg_no);
      if($candidate_type=='GATE Candidates')
      { 
        
        $coap_check=$this->amd->get_coap_no_by_reg($get_reg_no);
        if($coap_check=='')
        {
          $this->session->set_flashdata('error','Internal network error  code CO02 please mail to admission_mtech@iitism.ac.in ');
          redirect('admission/mtech/Adm_mtech_document');
          exit;
        }
        
      }

      $this->amd->update_tab1($tab,$get_reg_no);
      if($ok)
      { 
        $this->session->set_userdata('pay_start','pay_start');
        $this->session->set_flashdata('success','All document uploaded successfully please proceed for payment');
        redirect('admission/mtech/Adm_mtech_payment');
      }
      else 
      {
        $this->session->set_flashdata('error','Internal network error D01');
        redirect('admission/mtech/Adm_mtech_document');
      }
       
    }
    else
    {
      $this->index();
      
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
    else if($file=='colour_blindness_doc')
    {
      $doctype='col';
    }
    else if($file=='12th_doc')
    {
      $doctype='12th';
    }
    else if($file=='spon2_doc')
    {
      $doctype='spon2';
    }
    else if($file=='spon1_doc')
    {
      $doctype='spon1';
    }
    else if($file=='gate_score_card_doc')
    {
      $doctype='gate';
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
    $this->load->model('admission/Add_mtech_registration_model');
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $data['registration_detail']=$this->Add_mtech_registration_model->get_registration_detail_by_email($email);
    if (!file_exists('./assets/admission/mtech/'.$get_reg_no))
    {
      mkdir('./assets/admission/mtech/'.$get_reg_no, 0777, true);
    }
        //upload file
        $string = 'abcdefghijklmnopqrstiuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string_shuffled = str_shuffle($string);
        $tran_id = substr($string_shuffled, 1, 4);
        $config['upload_path'] = './assets/admission/mtech/'.$get_reg_no;
        $config['allowed_types'] = '*';
        $config['max_filename'] = '255';
        $config['overwrite']=TRUE;
         $config['file_name'] = $file.$tran_id.$this->clean($_FILES[$file]['name']);
        $config['max_size'] = '1024'; //1 MB
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
                    $k=base_url()."assets/admission/mtech/".$get_reg_no."/".$file.$tran_id.$this->clean($_FILES[$file]['name']);
                    if($file=='photo'|| $file =='signature')
                    {
                      $k=base_url()."assets/admission/mtech/".$get_reg_no."/".$file.$tran_id.$this->clean($_FILES[$file]['name']);
                      $document=array( 
                        'registration_no'=>$get_reg_no,
                        'doc_id'=>$doctype,
                        'doc_path'=>'assets/admission/mtech/'.$get_reg_no.'/'.$file.$tran_id.$this->clean($_FILES[$file]['name']),
                        'created_by'=>$email
                      );
                    }
                    else
                    {
                      $document=array( 
                        'registration_no'=>$get_reg_no,
                        'doc_id'=>$doctype,
                        'doc_path'=>'assets/admission/mtech/'.$get_reg_no.'/'.$file.$tran_id.$this->clean($_FILES[$file]['name']),
                        'created_by'=>$email
                      );
                    }
                   
                    if($this->Adm_mtech_personal_details_model->insert_document_val($document))
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
    $this->load->model('admission/mtech/Add_mtech_registration_model');
    $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
    $upload='';
    $file=$remove;
    if($file=='ug_mark_sheet')
    {
      $doctype='ugm';
    }
    else if($file=='filedob')
    {
      $doctype='dob';
    }
    else if($file=='12th_doc')
    {
      $doctype='12th';
    }
    else if($file=='spon1_doc')
    {
      $doctype='spon1';
    }
    else if($file=='spon2_doc')
    {
      $doctype='spon2';
    }
    else if($file=='colour_blindness_doc')
    {
      $doctype='col';
    }
    else if($file=='gate_score_card_doc')
    {
      $doctype='gate';
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

   
    // $data['registration_detail']=$this->Add_mtech_registration_model->get_registration_detail_by_email($email);
    $files =(file_exists('assets/admission/mtech/'.$get_reg_no.'/'.$file.$get_reg_no.'.pdf'));
    if($files)
    {
      // unlink("https://nfrdev.iitism.ac.in/assets/images/nfr_user_documenttt/dob/app_no/$app_no/user_dob".$app_no.".pdf");
      //$this->session->unset_userdata('dob');
      $this->session->unset_userdata($file);
      // $msg="no file avaiable";
      //$msg=base_url()."assets/admission/mtech/".$get_reg_no."/".$file.$get_reg_no.".pdf";
      if(true)
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
      //if($this->Adm_mtech_personal_details_model->remove_document_val($cond))
      if(true)
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
      $ugm_id='ugm';
      $twe_id='12th';
      $caste_id='caste';
      $signature_id='signature';
      $photo_id='photo';
      $work_id='work';
      $col_id='col';
      $dob_id='dob';
      $pwd_id='pwd';
      $pgm_id='pgm';
      $gate_id='gate';
      $candidate_type=$this->Add_mtech_registration_model->get_candidate_type_by_email($email);
      $get_reg_no=$this->Add_mtech_registration_model->get_registration_no_by_email($email);
      $total_document=$this->amd->count_total_document($get_reg_no);
      $ugm=$this->amd->count_document_id($get_reg_no,$ugm_id);
      $caste=$this->amd->count_document_id($get_reg_no,$caste_id);
      $twelve=$this->amd->count_document_id($get_reg_no,$twe_id);
      $signature=$this->amd->count_document_id($get_reg_no,$signature_id);
      $photo=$this->amd->count_document_id($get_reg_no,$photo_id);
      $work=$this->amd->count_document_id($get_reg_no,$work_id);
      $col=$this->amd->count_document_id($get_reg_no,$col_id);
      $dob=$this->amd->count_document_id($get_reg_no,$dob_id);
      $gate=$this->amd->count_document_id($get_reg_no,$gate_id);
      $pwd=$this->amd->count_document_id($get_reg_no,$pwd_id);
      $pgm=$this->amd->count_document_id($get_reg_no,$pgm_id);
      $data['pg_data']=$this->amd->check_pg_record($get_reg_no,'PG Exam');
      $data['gate_score']=$this->amd->check_gate_score_record($get_reg_no);
      $data['color_blind']=$this->amd->check_color_blind_doc($get_reg_no);
      $workexprow=$this->Adm_mtech_personal_details_model->get_work_exp_row($get_reg_no);
      
      if($ugm=='ok')
      {
        $count=$count+1;
      }

      if($dob=='ok')
      {
        $count=$count+1;
      }
      
      if($twelve=='ok')
      {
        $count=$count+1;
      }

      if($candidate_type=='Sponsored Candidates')
      {
        $count=$count+2;
      }
      
      if(!empty($data['pg_data']))
      {
        if($pgm=='ok')
        {
          $count=$count+1;
        }
      }

      if(!empty($data['color_blind']))
      {
        if($col=='ok')
        {
          $count=$count+1;
        }
      }

      if(!empty($data['gate_score']))
      {
        if($gate=='ok')
        {
          $count=$count+1;
        }
      }

      if(!empty($workexprow))
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

      $doc_total=$count;
      $arr=array(
        'total'=>$doc_total,
        'photo'=>$photo,
        'signature'=>$signature
      );
    
     echo (json_encode($arr));
  }


  
  function randomPassword(){
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
      $n = rand(0, $alphaLength);
      $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
  }

  function clean($string) // Removes special chars.
  {
    return preg_replace('/[^A-Za-z\.s]/', '', $string); 
    
  }

}
?>

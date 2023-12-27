<?php

class Adm_phdpt_document extends MY_Controller {

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
    $this->load->model('admission/phdpt/Add_phdpt_registration_model');
    $this->load->model('admission/phdpt/Adm_phdpt_personal_details_model');
    $this->load->model('admission/phdpt/Adm_phdpt_application_model');
    $this->load->model('admission/phdpt/Adm_phdpt_document_model','amd');

    define('ftp_host','103.15.228.70'); // address of online.iitism.ac.in // making the connection from misdev and pbeta
    // define('ftp_host','172.16.200.86'); // address of beta.iitism.ac.in  // making the connection from misdev and pbeta
    define('ftp_user_name','filesync');
    define('ftp_user_pass','F!l3sync#@$%007');
  }

  function index()
  {


    $email=$this->session->userdata('email');
    $count=0;
    $check_color='';
    $get_reg_no=$this->Add_phdpt_registration_model->get_registration_no_by_email($email);
    $data['application_details_ms']=$this->Adm_phdpt_personal_details_model->get_adm_phd_appl_ms($get_reg_no);
    $data['registration_detail']=$this->Add_phdpt_registration_model->get_registration_detail_by_email($email);
    $data['upload_document']=$this->amd->get_all_document_uploaded($get_reg_no);
    $data['application_details']=$this->Add_phdpt_registration_model->get_application_programme_details($get_reg_no);
    //echo '<pre>';print_r($data);echo '</pre>'; exit;

    $candidate_type=$this->Add_phdpt_registration_model->get_candidate_type_by_email($email);

    $total_document=$this->amd->count_total_document($get_reg_no);
    $data['candidate_type']=$candidate_type;


    if($data['registration_detail'][0]->color_blind=='N')
    {
      $data['color_blind']=$this->amd->check_color_blind_doc($get_reg_no);
      if(!empty($data['color_blind'])) //color blindness
      {
        $count=$count+1;
      }
    }

    //echo $data['application_details_ms'][0]['assistance_type']; exit;
    if ($data['application_details_ms'][0]['assistance_type'] == 'SP') {
      $data['SPON']='Yes';
      $count=$count+1;
    }

    if ($data['application_details_ms'][0]['cfti_nirf_flag'] == 'Y') {
      $data['CFTI_NIRF']='Yes';
      $count=$count+1;
    }
    // else {
    //   $data['SPON']='No';
    // }

    $workexprow=$this->Adm_phdpt_personal_details_model->get_work_exp_row($get_reg_no);
    if(!empty($workexprow)) //work exp
    {
      $data['work_exp']="yes";

      $count=$count+1;
    }

    if($total_document[0]->category!='General') //caste
    {
      $data['category']=$total_document[0]->category;
      $count=$count+1;
    }

    if($total_document[0]->pwd=='Y') //pwd
    {
      $data['pwd']="yes";
      $count=$count+1;
    }

    $data['GATE']=$this->amd->check_fellowship_record($get_reg_no,'GATE');
    if(!empty($data['GATE']))
    {
      $count=$count+1;
    }

    $data['NOC']=$this->amd->check_fellowship_record($get_reg_no,'NOC');
    if(!empty($data['NOC']))
    {
      //$count=$count+1;
    }


    // if($candidate_type=='Part time')
    // {
    //     $data['NOC']="Yes";
    //     $count=$count+1;

    // }


    $data['CAT']=$this->amd->check_fellowship_record($get_reg_no,'CAT');
    if(!empty($data['CAT']))
    {
      $count=$count+1;
    }

    $data['GMAT']=$this->amd->check_fellowship_record($get_reg_no,'GMAT');
    if(!empty($data['GMAT']))
    {
      $count=$count+1;
    }
    $data['NETLS']=$this->amd->check_fellowship_record($get_reg_no,'NETLS');
    if(!empty($data['NETLS']))
    {
      $count=$count+1;
    }
    $data['NETUGC']=$this->amd->check_fellowship_record($get_reg_no,'NETUGC');
    if(!empty($data['NETUGC']))
    {
      $count=$count+1;
    }
    $data['PMFR']=$this->amd->check_fellowship_record($get_reg_no,'PMFR');

    if(!empty($data['PMFR']))
    {
      $count=$count+1;
    }

    $data['PMRF']=$this->amd->check_fellowship_record($get_reg_no,'PMRF');

    if(!empty($data['PMRF']))
    {
      $count=$count+1;
    }

    $data['NETCSIR']=$this->amd->check_fellowship_record($get_reg_no,'NETCSIR');

    if(!empty($data['NETCSIR']))
    {
      $count=$count+1;
    }

    // $data['IITGR']=$this->amd->check_fellowship_record($get_reg_no,'IIT Graduate');
    if($data['application_details_ms'][0]['betch_iit']=='Y')
    {
      $data['IITGR']='Yes';
      $count=$count+1;
    }

    $data['DSTINS']=$this->amd->check_fellowship_record($get_reg_no,'DSTINS');
    if(!empty($data['DSTINS']))
    {
      $count=$count+1;
    }

    // $data['SPON']=$this->amd->check_fellowship_record($get_reg_no,'SPON');
    // if(!empty($data['SPON']))
    // {
    //   $count=$count+1;
    // }

    $data['DBTJRF']=$this->amd->check_fellowship_record($get_reg_no,'DBTJRF');
    if(!empty($data['DBTJRF']))
    {
      $count=$count+1;
    }

    $data['MANF']=$this->amd->check_fellowship_record($get_reg_no,'MANF');
    if(!empty($data['MANF']))
    {
      $count=$count+1;
    }

    $data['ICMR']=$this->amd->check_fellowship_record($get_reg_no,'ICMR');
    if(!empty($data['ICMR']))
    {
      $count=$count+1;
    }

    $data['ICPR']=$this->amd->check_fellowship_record($get_reg_no,'ICPR');
    if(!empty($data['ICPR']))
    {
      $count=$count+1;
    }

    $data['RGNF']=$this->amd->check_fellowship_record($get_reg_no,'RGNF');
    if(!empty($data['RGNF']))
    {
      $count=$count+1;
    }

    $data['ICSSR']=$this->amd->check_fellowship_record($get_reg_no,'ICSSR');
    if(!empty($data['ICSSR']))
    {
      $count=$count+1;
    }

    $data['Other']=$this->amd->check_fellowship_record($get_reg_no,'Other');
    if(!empty($data['Other']))
    {
      $count=$count+1;
    }

    $data['VIS']=$this->amd->check_fellowship_record($get_reg_no,'VIS');
    if(!empty($data['VIS']))
    {
      $count=$count+1;
    }


    $data['pgm1']=$this->amd->check_pg_record($get_reg_no,'PG1 Exam');

    if(!empty($data['pgm1']))
    {
      $count=$count+1;
    }

    $data['pgm2']=$this->amd->check_pg_record($get_reg_no,'PG2 Exam');
    if(!empty($data['pgm2']))
    {
      $count=$count+1;
    }

    // echo $this->db->last_query();
    // exit;
    // echo "<pre>";
    // print_r($data['pg_data']);
    // exit;
    // echo $this->db->last_query();
    // exit;

    // $total_document[0]->registration_no;

    $doc_total=$count+6; //10th,12th,ug,dob,signature,photo

    $data['total_document']=$doc_total;
    // echo "<pre>";
    // print_r($data['total_document']);
    // exit;

    $data['val']="home";
    $this->adm_phdpt_header($data);
    $this->load->view('admission/phdpt/adm_phdpt_document_view',$data);
    $this->adm_phdpt_footer();

  }

  public function document_submit()
  {

    $email=$this->session->userdata('email');
    $get_reg_no=$this->Add_phdpt_registration_model->get_registration_no_by_email($email);
    $data['candidate_type']=$this->Add_phdpt_registration_model->get_candidate_type_by_email($email);
    $candidate_type=$this->Add_phdpt_registration_model->get_candidate_type_by_email($email);


      $val=array(
       'status'=>'DU',

      );
      $tab=array(
        'tab4'=>4,
      );

      $tb_check=$this->amd->check_tab_fill_status($get_reg_no);

      if($tb_check[0]['tab1']=='' || $tb_check[0]['tab2']==''||  $tb_check[0]['tab3']=='')
      {
        $this->session->set_flashdata('error','Internal network error code TO01 please mail to issues-phd@iitism.ac.in ');
        redirect('admission/phdpt/Adm_phdpt_document');
        exit;
      }

      $ok=$this->amd->update_personal_deatils($val,$get_reg_no);

      if($this->amd->update_tab1($tab,$get_reg_no))
      {
        $this->session->set_userdata('pay_start','pay_start');
        $this->session->set_flashdata('success','All document uploaded successfully please proceed for payment');
        redirect('admission/phdpt/Adm_phdpt_payment');
      }
      else
      {
        $this->session->set_flashdata('error','Internal network error code D01');
        redirect('admission/phdpt/Adm_phdpt_document');
      }

  }

  public function document_upload($v)
  {

    $file=$v;
    if($file=='ug_mark_sheet')
    {
      $doctype='ugm';
    }
    else if($file=='tenth_doc')
    {
      $doctype='10th';
    }
    else if($file=='vis_doc')
    {
      $doctype='VIS';
    }
    else if($file=='pgm1_doc')
    {
      $doctype='pgm1';
    }
    else if($file=='noc_doc')
    {
      $doctype='NOC';
    }
    else if($file=='cat_score_card_docs')
    {
      $doctype='CAT';
    }
    else if($file=='gmat_doc')
    {
      $doctype='GMAT';
    }
    else if($file=='netcsir_doc')
    {
      $doctype='NETCSIR';
    }
    else if($file=='pgm2_doc')
    {
      $doctype='pgm2';
    }
    else if($file=='netls_doc')
    {
      $doctype='NETLS';
    }
    else if($file=='netugc_doc')
    {
      $doctype='NETUGC';
    }
    else if($file=='pmfr_doc')
    {
      $doctype='PMFR';
    }
    else if($file=='iitgr_doc')
    {
      $doctype='IITGR';
    }
    else if($file=='dstins_doc')
    {
      $doctype='DSTINS';
    }
    else if($file=='spon_doc')
    {
      $doctype='SPON';
    }
    else if($file=='cfti_nirf_doc')
    {
      $doctype='CFTI_NIRF';
    }
    else if($file=='dbtjrf_doc')
    {
      $doctype='DBTJRF';
    }
    else if($file=='manf_doc')
    {
      $doctype='MANF';
    }
    else if($file=='icmr_doc')
    {
      $doctype='ICMR';
    }
    else if($file=='icpr_doc')
    {
      $doctype='ICPR';
    }
    else if($file=='nbhm_doc')
    {
      $doctype='NBMH';
    }
    else if($file=='filedob')
    {
      $doctype='dob';
    }
    else if($file=='rgnf_doc')
    {
      $doctype='RGNF';
    }
    else if($file=='pmrf_doc')
    {
      $doctype='PMRF';
    }
    else if($file=='icssr_doc')
    {
      $doctype='ICSSR';
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
    else if($file=='other_doc')
    {
      $doctype='other';
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
    $this->load->model('admission/phdpt/Add_phdpt_registration_model');
    $get_reg_no=$this->Add_phdpt_registration_model->get_registration_no_by_email($email);
    $data['registration_detail']=$this->Add_phdpt_registration_model->get_registration_detail_by_email($email);
    // mkdir('/disk2/virtualhost/admission/public_html/html/assets/admission/phd/'.$get_reg_no, 0777, true);
    // if (!file_exists('/home/admissiondev/public_html/admission/assets/admission/phdpt/'.$get_reg_no))
    // {
    //   mkdir('/home/admissiondev/public_html/admission/assets/admission/phdpt/'.$get_reg_no, 0777, true);
    // }

    if (!file_exists('/disk2/virtualhost/admission/public_html/html/assets/admission/phdpt/'.$get_reg_no))
    {
      mkdir('/disk2/virtualhost/admission/public_html/html/assets/admission/phdpt/'.$get_reg_no, 0777, true);
    }
        //upload file
        $string = 'abcdefghijklmnopqrstiuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string_shuffled = str_shuffle($string);
        $tran_id = substr($string_shuffled, 1, 4);
        $config['upload_path'] = './assets/admission/phdpt/'.$get_reg_no;
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
                    $k=base_url()."assets/admission/phdpt/".$get_reg_no."/".$file.$tran_id.$this->clean($_FILES[$file]['name']);
                    if($file=='photo'|| $file =='signature')
                    {
                      $k=base_url()."assets/admission/phdpt/".$get_reg_no."/".$file.$tran_id.$this->clean($_FILES[$file]['name']);
                      $document=array(
                        'registration_no'=>$get_reg_no,
                        'doc_id'=>$doctype,
                        'doc_path'=>'assets/admission/phdpt/'.$get_reg_no.'/'.$file.$tran_id.$this->clean($_FILES[$file]['name']),
                        'created_by'=>$email
                      );
                    }
                    else
                    {
                      $document=array(
                        'registration_no'=>$get_reg_no,
                        'doc_id'=>$doctype,
                        'doc_path'=>'assets/admission/phdpt/'.$get_reg_no.'/'.$file.$tran_id.$this->clean($_FILES[$file]['name']),
                        'created_by'=>$email
                      );
                    }

                    $connection = ssh2_connect(ftp_host,22);
                    $con= ssh2_auth_password($connection, ftp_user_name, ftp_user_pass);
                    $sftp = ssh2_sftp($connection);
                    if($sftp){
                      //echo 'connected';
                     }
                     else{
                       //echo 'not connected';
                     }

                     $dstFile = '/var/www/html/assets/admission/phdpt/'.$get_reg_no.'/';
                     $this->remote = "ssh2.sftp://".$sftp;

                    if(!(is_dir($this->remote.$dstFile))){
                      //echo 'directory already does not exist';
                      ssh2_sftp_mkdir($sftp,$dstFile,0777,true);
                    }


                        $sftpStream = fopen('ssh2.sftp://' . intval($sftp) . $dstFile, 'r');

                        if (!$sftpStream) {
                          echo "Could not open remote file: $dstFile" ;
                      }

                      else {

                            $finalfilename = $file.$tran_id.$this->clean($_FILES[$file]['name']);
                            $pdfroot = '/disk2/virtualhost/admission/public_html/html/assets/admission/phdpt/'.$get_reg_no.'/'.$file.$tran_id.$this->clean($_FILES[$file]['name']);
                            // $pdfroot = '/home/admissiondev/public_html/admission/assets/admission/phdpt/'.$get_reg_no.'/'.$file.$tran_id.$this->clean($_FILES[$file]['name']);
                            $file_send = ssh2_scp_send($connection, $pdfroot, $dstFile.$finalfilename);
                            if($file_send===false){
                              //echo 'cannot send';
                          }

                          else{
                            //echo 'send';
                          }

                          }

                          //exit;

                          $filename_ext = $_FILES[$file]['name'];
                          $ext = pathinfo($filename_ext, PATHINFO_EXTENSION);
                          // echo $ext; echo "<br>";
                          $upper= strtoupper($ext);
                          // echo $upper;echo "<br>";
                          if ($upper == 'PDF' || $upper == 'PNG' || $upper == 'JPEG'|| $upper == 'JPG')
                          {
                            if($this->Adm_phdpt_personal_details_model->insert_document_val($document))
                            {
                              $upload='doc_ok';
                            }
                            else
                            {
                              $upload='not';
                            }

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
    $this->load->model('admission/phdpt/Add_phdpt_registration_model');
    $get_reg_no=$this->Add_phdpt_registration_model->get_registration_no_by_email($email);
    $upload='';
    $file=$remove;

    if($file=='ug_mark_sheet')
    {
      $doctype='ugm';
    }
    else if($file=='vis_doc')
    {
      $doctype='VIS';
    }
    else if($file=='tenth_doc')
    {
      $doctype='10th';
    }
    else if($file=='pgm1_doc')
    {
      $doctype='pgm1';
    }
    else if($file=='noc_doc')
    {
      $doctype='NOC';
    }
    else if($file=='cat_score_card_docs')
    {
      $doctype='CAT';
    }
    else if($file=='gmat_doc')
    {
      $doctype='GMAT';
    }
    else if($file=='netcsir_doc')
    {
      $doctype='NETCSIR';
    }
    else if($file=='pgm2_doc')
    {
      $doctype='pgm2';
    }
    else if($file=='netls_doc')
    {
      $doctype='NETLS';
    }
    else if($file=='netugc_doc')
    {
      $doctype='NETUGC';
    }
    else if($file=='pmfr_doc')
    {
      $doctype='PMFR';
    }
    else if($file=='iitgr_doc')
    {
      $doctype='IITGR';
    }
    else if($file=='dstins_doc')
    {
      $doctype='DSTINS';
    }
    else if($file=='spon_doc')
    {
      $doctype='SPON';
    }
    else if($file=='cfti_nirf_doc')
    {
      $doctype='CFTI_NIRF';
    }
    else if($file=='dbtjrf_doc')
    {
      $doctype='DBTJRF';
    }
    else if($file=='manf_doc')
    {
      $doctype='MANF';
    }
    else if($file=='icmr_doc')
    {
      $doctype='ICMR';
    }
    else if($file=='icpr_doc')
    {
      $doctype='ICPR';
    }
    else if($file=='nbhm_doc')
    {
      $doctype='NBMH';
    }
    else if($file=='filedob')
    {
      $doctype='dob';
    }
    else if($file=='pmrf_doc')
    {
      $doctype='PMRF';
    }
    else if($file=='icssr_doc')
    {
      $doctype='ICSSR';
    }
    else if($file=='rgnf_doc')
    {
      $doctype='RGNF';
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
    else if($file=='other_doc')
    {
      $doctype='other';
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


    // $data['registration_detail']=$this->Add_phd_registration_model->get_registration_detail_by_email($email);
    $files =(file_exists('assets/admission/phdpt/'.$get_reg_no.'/'.$file.$get_reg_no.'.pdf'));
    if($files)
    {
      // unlink("https://nfrdev.iitism.ac.in/assets/images/nfr_user_documenttt/dob/app_no/$app_no/user_dob".$app_no.".pdf");
      //$this->session->unset_userdata('dob');
      $this->session->unset_userdata($file);
      // $msg="no file avaiable";
      //$msg=base_url()."assets/admission/phd/".$get_reg_no."/".$file.$get_reg_no.".pdf";
      //if($this->Adm_phd_personal_details_model->remove_document_val($cond))
      // if($this->Adm_phdpt_personal_details_model->remove_document_val($cond))
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
      // if($this->Adm_phdpt_personal_details_model->remove_document_val($cond))
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
      $candidate_type=$this->Add_phdpt_registration_model->get_candidate_type_by_email($email);
      $data['registration_detail']=$this->Add_phdpt_registration_model->get_registration_detail_by_email($email);
      $get_reg_no=$this->Add_phdpt_registration_model->get_registration_no_by_email($email);
      $total_document=$this->amd->count_total_document($get_reg_no);

      $ugm=$this->amd->count_document_id($get_reg_no,'ugm');
      if($ugm=='ok')
      {
        $count=$count+1;
      }

      $tenth=$this->amd->count_document_id($get_reg_no,'10th');
      if($tenth=='ok')
      {
        $count=$count+1;
      }

      $caste=$this->amd->count_document_id($get_reg_no,'caste');
      if($caste=='ok')
      {
        $count=$count+1;
      }

      $twelve=$this->amd->count_document_id($get_reg_no,'12th');
      if($twelve=='ok')
      {
        $count=$count+1;
      }

      $signature=$this->amd->count_document_id($get_reg_no,'signature');
      if($signature=='ok')
      {
        $count=$count+1;
      }

      $photo=$this->amd->count_document_id($get_reg_no,'photo');
      if($photo=='ok')
      {
        $count=$count+1;
      }

      $work=$this->amd->count_document_id($get_reg_no,'work');
      if($work=='ok')
      {
        $count=$count+1;
      }

      $col=$this->amd->count_document_id($get_reg_no,'col');
      if($col=='ok')
      {
        $count=$count+1;
      }

      $dob=$this->amd->count_document_id($get_reg_no,'dob');
      if($dob=='ok')
      {
        $count=$count+1;
      }

      $gate=$this->amd->count_document_id($get_reg_no,'gate');
      if($gate=='ok')
      {
        $count=$count+1;
      }

      $pwd=$this->amd->count_document_id($get_reg_no,'pwd');
      if($pwd=='ok')
      {
        $count=$count+1;
      }


      $pgm1=$this->amd->count_document_id($get_reg_no,'pgm1');
      if($pgm1=='ok')
      {
        $count=$count+1;
      }

      // if($candidate_type=='Part time')
      // {
      //   $noc=$this->amd->count_document_id($get_reg_no,'NOC');
      //   if($noc=='ok')
      //   {
      //     $count=$count+1;
      //   }
      // }

      // $noc=$this->amd->count_document_id($get_reg_no,'NOC');
      // if($noc=='ok')
      // {
      //   $count=$count+1;
      // }

      $cat_score=$this->amd->count_document_id($get_reg_no,'CAT');
      if($cat_score=='ok')
      {
        $count=$count+1;
      }

      $gmat=$this->amd->count_document_id($get_reg_no,'GMAT');
      if($gmat=='ok')
      {
        $count=$count+1;
      }

      $pgm2=$this->amd->count_document_id($get_reg_no,'pgm2');
      if($pgm2=='ok')
      {
        $count=$count+1;
      }

      $netls=$this->amd->count_document_id($get_reg_no,'NETLS');
      if($netls=='ok')
      {
        $count=$count+1;
      }

      $netcsir=$this->amd->count_document_id($get_reg_no,'NETCSIR');
      if($netcsir=='ok')
      {
        $count=$count+1;
      }

      $netugc=$this->amd->count_document_id($get_reg_no,'NETUGC');
      if($netugc=='ok')
      {
        $count=$count+1;
      }

      $pmfr=$this->amd->count_document_id($get_reg_no,'PMFR');
      if($pmfr=='ok')
      {
        $count=$count+1;
      }

      $iitgr=$this->amd->count_document_id($get_reg_no,'IITGR');
      if($iitgr=='ok')
      {
        $count=$count+1;
      }

      $dstins=$this->amd->count_document_id($get_reg_no,'DSTINS');
      if($dstins=='ok')
      {
        $count=$count+1;
      }

      $spon_doc=$this->amd->count_document_id($get_reg_no,'SPON');
      if($spon_doc=='ok')
      {
        $count=$count+1;
      }

      $cfti_nirf_doc=$this->amd->count_document_id($get_reg_no,'CFTI_NIRF');
      if($cfti_nirf_doc=='ok')
      {
        $count=$count+1;
      }

      $dbtjrf=$this->amd->count_document_id($get_reg_no,'DBTJRF');
      if($dbtjrf=='ok')
      {
        $count=$count+1;
      }

      $manf=$this->amd->count_document_id($get_reg_no,'MANF');
      if($manf=='ok')
      {
        $count=$count+1;
      }

      $icmr=$this->amd->count_document_id($get_reg_no,'ICMR');
      if($icmr=='ok')
      {
        $count=$count+1;
      }

      $other=$this->amd->count_document_id($get_reg_no,'other');
      if($other=='ok')
      {
        $count=$count+1;
      }

      $nbmh=$this->amd->count_document_id($get_reg_no,'NBMH');
      if($nbmh=='ok')
      {
        $count=$count+1;
      }

      $pmrf=$this->amd->count_document_id($get_reg_no,'PMRF');
      if($pmrf=='ok')
      {
        $count=$count+1;
      }

      $icpr=$this->amd->count_document_id($get_reg_no,'ICPR');
      if($icpr=='ok')
      {
        $count=$count+1;
      }

      $rgnf=$this->amd->count_document_id($get_reg_no,'RGNF');
      if($rgnf=='ok')
      {
        $count=$count+1;
      }

      $icssr=$this->amd->count_document_id($get_reg_no,'ICSSR');
      if($icssr=='ok')
      {
        $count=$count+1;
      }

      $vis=$this->amd->count_document_id($get_reg_no,'VIS');
      if($vis=='ok')
      {
        $count=$count+1;
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

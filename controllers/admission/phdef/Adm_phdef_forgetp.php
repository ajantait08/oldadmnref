<?php

class Adm_phdef_forgetp extends MY_Controller {

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
    $this->load->helper(array('form', 'url'));
    // $this->load->library('email1');
    $this->load->model('admission/phdef/Add_phdef_registration_model');
    $this->load->model('admission/phdef/Adm_phdef_application_preview_model', 'Phdef_all', TRUE);
  }

  function index()
  {     
    $data['val']="H";
    $this->adm_phdef_header($data);
    $this->load->view('admission/phdef/adm_phdef_forgetp_view',$data);
    $this->Adm_phdef_footer();
  }

 
public function forget_password()
{ 
  
  $forget_email=trim($this->cleanspecailcharacter($this->input->post('forget_email')));
//   $forget_registration=$this->number_only($this->input->post('forget_registration'));
  $forget_registration=$this->input->post('forget_registration');
//   $this->load->model('admission/phd/Add_phd_registration_model');
  $tot_forget=$this->Add_phdef_registration_model->total_forget_count($forget_email);
  // echo $this->db->last_query();
  // exit;
  if(count($tot_forget)>=4)
  {
    $this->session->set_flashdata('msg','Sorry You have avail three time of forget password you are not allow to proceed!');
    redirect('admission/phdef/Adm_phdef_forgetp');
    exit;
  }
 
  $check_reg=$this->Add_phdef_registration_model->get_verify_email($forget_email); //check first email is verfied or not
  $check_mail_id=$this->Add_phdef_registration_model->check_email_mobile_exist($forget_email,$forget_registration);

  $this->form_validation->set_rules('forget_email','Email','required');
  $this->form_validation->set_rules('forget_registration','Mobile number','required');
  if ($this->form_validation->run() == true) 
  { 
    if($check_reg!='Y' || $check_reg=='')
    { 
      $this->session->set_flashdata('msg','Sorry mail is not authenicate to move futher!');
      redirect('admission/phdef/Adm_phdef_forgetp');
      return false;
      exit;
    }
    
    if($check_mail_id=="not")
    { 
      $this->session->set_flashdata('msg','Sorry combination of mobile number and email does not match!');
      redirect('admission/phdef/Adm_phdef_forgetp');
      return false;
    }
    else 
    { 
      $password=$this->Add_phdef_registration_model->get_password_by_email($forget_email);
      $config = array(
        'protocol'  => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => 465,
        'smtp_user' => 'Noreply-phd@iitism.ac.in',
        'smtp_pass' => 'adm@826004',
        'mailtype'  => 'html',
        'charset'   => 'utf-8'
      );

      $this->email->initialize($config);
      $this->email->set_mailtype("html");
      $this->email->set_newline("\r\n");
      //Email content
      $htmlContent ='<div style="border: 1px solid;padding: 20px;border-radius: 7px;text-algin:center;"> <h5>Dear Candidate</h5>';
      $htmlContent .= '<h5>Recovery password for Ph.D. Admission (Externally Funded) portal</h5>';
      $htmlContent .= '<h5>Your Password : '.$password.'<br /></h5>';
      $htmlContent .= '<p>Please save it for future <br /><br/>Thanks<br/></p></div>';
      $this->email->to($forget_email);
      $this->email->from('Noreply-phd@iitism.ac.in');
      $this->email->subject('Password Recovery for Ph.D. Admission (Externally Funded) portal');
      $this->email->message($htmlContent);
      if($this->email->send())
      {
        $time_date=date("M,d,Y h:i:s A");
        $upval=array(
          'registration_no'=>$forget_registration,
          'email_type'=>'Forget password',
          'email_from'=>'Noreply-phd@iitism.ac.in',
          'email_to'=>$forget_email,
          'sent_date'=>$time_date,
          'status'=>1,
          'created_by'=>$forget_email,
        );
        $msgok=$this->Add_phdef_registration_model->insert_email_log($upval);
        if($msgok=='ok')
        { 
          
          $this->session->set_flashdata('msg','Mail has been send please check your email!');
          redirect('admission/phdef/Adm_phdef_forgetp'); 
        }
        else
        {
          $this->session->set_flashdata('failure','Thier got error regrading email timing!');
          redirect('admission/phdef/Adm_phdef_forgetp');
        }
        
      }
      else 
      { 
        $this->session->set_flashdata('failure','Mail network error code E001');
        redirect('admission/phdef/Adm_phdef_forgetp');
        //show_error($this->email->print_debugger()); 
      }
      
    }
  }
  else 
  {
    $this->session->set_flashdata('failure','Thier got error regrading email timing!');
    $data['val']="H";
    $this->adm_phdef_header($data);
    $this->load->view('admission/phdef/adm_phdef_forgetp_view',$data);
    $this->adm_phdef_footer();
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
?>

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adm_mtech_dept_ms extends MY_Controller
{

     function __construct()
     {
          parent::__construct();

          // Load form validation Library & user model
          $this->load->library('form_validation');
          $this->load->model('admission/mtech_admin/adm_mtech_dept_ms_model');
     }

     public function index()
     {

          $data["fetch_data"] = $this->adm_mtech_dept_ms_model->fetch_data();
          $data["user_data"] = NULL;
          //   echo "<pre>";
          //   print_r($data["fetch_data"]);

          //   exit;
          $data['val'] = "home";
          $this->adm_mtech_header($data);
          $this->load->view("admission/mtech_admin/adm_mtech_dept_ms/main_view", $data);
          $this->adm_mtech_footer();
     }
     public function form_validation()
     {
          $this->load->library('form_validation');
          if ($this->input->post("update")) {
               $this->form_validation->set_rules("dept_id", "Department ID", 'required|alpha|max_length[3]');
          } else {
               $this->form_validation->set_rules("dept_id", "Department ID", 'required|alpha|max_length[3]|callback_dept_id_check');
          }

          $this->form_validation->set_rules("desc", "Description", 'required');
          $this->form_validation->set_rules("ap_type_jrf_mtech", "Application Type", 'required|alpha');
          $this->form_validation->set_rules("status", "Status", 'required|alpha');

          if ($this->form_validation->run()) {
               $data = array(
                    "dept_id"     => $this->input->post("dept_id"),
                    "desc"     => $this->input->post("desc"),
                    "color_blind_type"     => $this->input->post("color_blind_type"),
                    "ap_type_jrf_mtech"     => $this->input->post("ap_type_jrf_mtech"),
                    "status"     => $this->input->post("status"),
               );
               if ($this->input->post("update")) {
                    $this->adm_mtech_dept_ms_model->update_data($data, $this->input->post("hidden_id"));
                    redirect("admission/mtech_admin/adm_mtech_dept_ms/updated");
               }
               if ($this->input->post("insert")) {
                    $this->form_validation->set_rules("dept_id", "Department ID", 'required|alpha|callback_dept_id_check');
                    $this->adm_mtech_dept_ms_model->insert_data($data);
                    redirect("admission/mtech_admin/adm_mtech_dept_ms/inserted");
               }
          } else {
               $this->index();
          }
     }
     public function inserted()
     {
          $this->index();
     }
     public function delete_data()
     {
          $id = $this->uri->segment(5);
          $this->adm_mtech_dept_ms_model->delete_data($id);
          redirect("admission/mtech_admin/adm_mtech_dept_ms/deleted");
     }
     public function deleted()
     {
          $this->index();
     }
     public function update_data()
     {
          $user_id = $this->uri->segment(5);
          $data["user_data"] = $this->adm_mtech_dept_ms_model->fetch_single_data($user_id);
          $data["fetch_data"] = $this->adm_mtech_dept_ms_model->fetch_data();
          $data['val'] = "home";
          $this->adm_mtech_header($data);
          $this->load->view("admission/mtech_admin/adm_mtech_dept_ms/main_view", $data);
          $this->adm_mtech_footer();
     }
     public function updated()
     {
          $this->index();
     }
     public function dept_id_check($str)
     {
          $checkDept_id = $this->adm_mtech_dept_ms_model->getRows($str);

          //  echo "<pre>";
          //  print_r( $checkDept_id);        
          //  exit;
          if ($checkDept_id) {
               $this->form_validation->set_message('dept_id_check', 'The given Department ID already exists.');
               return FALSE;
          } else {
               return TRUE;
          }
     }
}

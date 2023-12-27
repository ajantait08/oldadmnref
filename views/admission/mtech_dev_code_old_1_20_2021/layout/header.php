<?php 

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>NFR Recruitment</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- DataTables -->
     <link rel="stylesheet" href="<?php echo base_url();?>themes/plugins/datatables-buttons/css/buttons.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo base_url();?>themes/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  
  <link rel="stylesheet" href="<?php echo base_url();?>themes/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>themes/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url();?>themes/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>themes/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url();?>themes/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>themes/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url();?>themes/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>themes/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url();?>themes/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- <script src="https://nfrdev.iitism.ac.in/themes/plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap 4 -->
<!-- <script src="https://nfrdev.iitism.ac.in/themes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<!-- DataTables -->
<!-- <script src="https://nfrdev.iitism.ac.in/themes/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="https://nfrdev.iitism.ac.in/themes/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://nfrdev.iitism.ac.in/themes/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="https://nfrdev.iitism.ac.in/themes/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script> -->
</head>
<style type="text/css">
  #aDiv
{   
   margin-top: 2em;
    width: 833px;
    border: 1px solid black;
    height:68.5em;
    margin: 0 auto;
    background: white;
}
.content
{
  padding: 20px 15px;
  background: #f9f9f9;

}
/*.p{
 
    position: absolute;
    color: #fff;
    padding: 2px 6px 4px 30px;
    text-decoration: none;
    width: 350px;
    z-index: 10;
}*/
  .heading{
    width:80%;
    height: 60%;
    margin-top: 1em;
    text-align: center;
    display: block;
    color: #fff;
    background-color:#28a745;
    border-color: #337ab7;
  }
  .panel{
    width:80%;
    height: 60%;
    position: relative;
    left:5em;

  }
  .panel-body
  {
    width:80%;
    height: 60%;
  }
</style>
<?php if(!$this->session->userdata('email'))
   redirect('recruitment/Admin'); 
   ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-teal">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
       <li class="nav-item dropdown">
        <div class="row">
          <div class="col-md-12 col-offset-4">
            <div class="form-group">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="width: 2em;" class="brand-image img-circle" id="admin" src="<?php echo base_url();?>assets/img/logo.png" alt="logo">
            <span class="p"> INDIAN INSTITUTE OF TECHNOLOGY (INDIAN SCHOOL OF MINES), DHANBAD</span>
            </div>
            
          </div>
          
        </div>
        <!-- <a class="nav-link" data-toggle="dropdown" href="#"> -->
        
           
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <!-- <div class="login-logo">
     <a href="https://www.iitism.ac.in">
       <img class="img-responsive" id="logo" src="https://nfrdev.iitism.ac.in/assets/img/logo.png" alt="logo">
      </a>
  </div> -->
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <!-- <a href="#" class="nav-link">Contact</a> -->
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
      
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link navbar-teal">
      <img class="brand-image img-circle elevation-3" id="admin" src="<?php echo base_url();?>assets/img/logo.png" alt="logo">
      <span class="brand-text font-weight-light">WELCOME NFR ADMIN</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url() ?>index.php/recruitment/Admin/logout" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Logout
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>          
         <li class="nav-header">NFR Member <b><?php if($this->session->userdata('auth')){ echo $auth=$this->session->userdata('auth');}   ?></b></li>
          <!--POST DETAILS menu -->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <p>
                  POST DETAILS
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url();?>index.php/recruitment/Add_all_post" class="nav-link">
                    <i class="far fa-key fa-fw nav-icon"></i>
                    <p>Add All Post</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url();?>index.php/recruitment/Post_essentail_qualification" class="nav-link">
                    <i class="far a-key fa-fw nav-icon"></i>
                    <p>ADD Essential Qualification</p>
                  </a>
                </li>
               <!--  <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far a-key fa-fw nav-icon"></i>
                    <p>VIEW </p>
                  </a>
                </li> -->
              </ul>
            </li>
            <!--POST DETAILS menu end-->
            <!--Advertisement menu -->
             <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <p>
                  ADVERTISMENT
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url();?>index.php/recruitment/Advertisement" class="nav-link">
                    <i class="far fa-key fa-fw nav-icon"></i>
                    <p>Add advertisement</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url();?>index.php/recruitment/Advertisement/mapadverstiment" class="nav-link">
                    <i class="far a-key fa-fw nav-icon"></i>
                    <p>Map advertisement </p>
                  </a>
                </li>
               <!--  <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far a-key fa-fw nav-icon"></i>
                    <p>VIEW </p>
                  </a>
                </li> -->
              </ul>
            </li>
            <!--Advertisement menu end -->
            <!--NFR report menu -->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <p>
                  NFR REPORT
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url();?>index.php/recruitment/NfrReport" class="nav-link">
                    <i class="far fa-key fa-fw nav-icon"></i>
                    <p>NFR Scrutiny</p>
                  </a>
                </li>
               <!--  <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far a-key fa-fw nav-icon"></i>
                    <p>VIEW </p>
                  </a>
                </li> -->
              </ul>
            </li>
             <!--NFR report menu  end-->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
    
 


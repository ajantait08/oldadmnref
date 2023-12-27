<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>New Admission Admin Panel</title>
    <script src="<?php echo base_url(); ?>themes/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/plugins/datatables/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/plugins/datatables-buttons/css/buttons.bootstrap4.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <script src="<?php echo base_url(); ?>themes/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/plugins/datatables-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin-theme/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin-theme/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin-theme/css/style.css">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" />
</head>

<body>
    <div class="container-scroller">
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="<?php echo base_url(); ?>index.php/admission/admin/dashboard"><img src="<?php echo base_url(); ?>assets/img/logo_new_small.png" alt="logo" style="height:50px; width: auto;" /></a>
                <a class="navbar-brand brand-logo-mini" href="<?php echo base_url(); ?>index.php/admission/admin/dashboard"><img src="<?php echo base_url(); ?>assets/img/ismlogo.png" alt="logo" style="height:50px; width: auto;" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>

                <div class="search-field d-none d-lg-block">
                    <div class="d-flex align-items-center h-100">
                        <p class="mb-1 text-black">INDIAN INSTITUTE OF TECHNOLOGY (INDIAN SCHOOL OF MINES), DHANBAD</p>
                    </div>
                </div>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <div class="nav-profile-text">
                            <?php echo strtoupper($this->session->userdata('userid')); ?>
                        </div>
                    </li>
                    <li class="nav-item nav-logout d-lg-block">
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/admission/admin/dashboard/logout">
                            <i class="mdi mdi-power"></i>
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>

        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <div class="nav-profile-text d-flex flex-column">
                            <span class="font-weight-bold mb-2"><?php echo strtoupper($this->session->userdata('userid')); ?></span>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/admission/admin/dashboard">
                            <span class="menu-title">Dashboard</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/admission/admin/dashboard/scrutiny">
                            <span class="menu-title">Scrutiny</span>
                            <i class="mdi mdi-briefcase-check menu-icon"></i>
                        </a>
                    </li>
                    <?php $user_role = $this->session->userdata('role');
                    if(($user_role == 'superadmin')) { ?>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#sub-menus-cfi" aria-expanded="false"  aria-controls="sub-menus-cfi">
                                <span class="menu-title">Call for Interview</span>
                                <i class="menu-arrow"></i>
                                <i class="mdi mdi-view-list  menu-icon"></i>
                            </a>
                            <div class="collapse" id="sub-menus-cfi">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/admission/admin/dashboard/callforinterview_cat">
                                            CAT Score
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/admission/admin/dashboard/callforinterview_iit">
                                            IIT Applicant
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#transaction" aria-expanded="false"  aria-controls="transaction">
                                <span class="menu-title">Transaction Details</span>
                                <i class="menu-arrow"></i>
                                <i class="mdi mdi-currency-inr menu-icon"></i>
                            </a>
                            <div class="collapse" id="transaction">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/admission/admin/dashboard/search_transaction">
                                            Search Transaction
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#document" aria-expanded="false"  aria-controls="transaction">
                                <span class="menu-title">Candidate Document</span>
                                <i class="menu-arrow"></i>
                                <i class="mdi mdi-currency-inr menu-icon"></i>
                            </a>
                            <div class="collapse" id="document">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/admission/admin/dashboard/document_view">
                                            Edit document
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
            <div class="main-panel">
                <div class="content-wrapper">
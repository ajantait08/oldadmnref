<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>New Admission Admin Panel</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin-theme/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin-theme/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin-theme/css/login.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin-theme/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                <img src="<?php echo base_url(); ?>assets/img/ismlogo.png" class="center">
                            </div>
                            <h4>Admin Console</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <p class="text-danger">
                                <?php
                                $error_msg = $this->session->flashdata('error_msg');
                                if ($error_msg) {
                                    echo $error_msg;
                                } ?>
                            </p>
                            <form class="pt-3" action="<?php echo base_url() ?>index.php/admission/admin/dashboard/admin_login" method="post">
                                <div class="form-group">
                                    <input type="text" name="user_name" class="form-control" id="exampleInputUsername1" placeholder="Username">
                                    <span class="text-danger"><?php echo form_error('user_name'); ?><span>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="user_password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                    <span class="text-danger"><?php echo form_error('user_password'); ?><span>
                                </div>
                                <div class="mt-3">
                                    <input type="submit" value="SIGN IN" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?php echo base_url(); ?>assets/admin-theme/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo base_url(); ?>assets/admin-theme/js/off-canvas.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin-theme/js/hoverable-collapse.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin-theme/js/misc.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin-theme/js/adm_mba_education.js"></script>
    <!-- endinject -->
</body>

<script type="text/javascript">
    $(document).bind("contextmenu", function(e) {
        return false;
    });
</script>
</html>
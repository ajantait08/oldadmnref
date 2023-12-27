<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHD ADMISSION (Externally Funded)</title>
    <link rel="stylesheet" href="<?php echo base_url();?>themes/plugins/sweetalert2/sweetalert2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <!-- <link href="<?php echo base_url();?>assets/nfr/css/jasny-bootstrap.min.css" rel="stylesheet" media="screen"> -->
    <link href="<?php echo base_url();?>themes/dist/css/phdef/header.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url();?>themes/dist/css/phdef/adm_phdef_login.css" rel="stylesheet" media="screen">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
        integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
        rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <style>

    </style>

</head>

<body>
    <script>
    var c = '<?php echo json_encode($val) ;?>';
    </script>
    <script type="text/javascript" src="<?php echo base_url();?>themes/dist/js/phd/adm_phd_header.js"></script>
    <header>
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card hovercard">
                    <div class="card-background">

                    </div>
                    <div class="useravatar">
                        <img alt="" style="float:left;" src="<?php echo base_url();?>assets/img/ismlogo.png">

                        <img alt="" style="float:right;" src="<?php echo base_url();?>assets/img/ismlogo.png">
                        <span class="card-title"
                            style="font-size: calc(0.7vw + 0.3vh + 0.7vmin);font-weight: 800;">भारतीय प्रौद्योगिकी
                            संस्थान (भारतीय खनि विद्यापीठ), धनबाद<br>INDIAN INSTITUTE OF TECHNOLOGY (INDIAN SCHOOL OF
                            MINES), DHANBAD<br>Ph.D. Admission (Externally Funded)</span>
                    </div>
                    <div class="card-info">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-custom navbar-mainbg">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#navbarSupportedContent">
                        <span class="icon-bar" style="background-color:aliceblue;"></span>
                        <span class="icon-bar" style="background-color:aliceblue;"></span>
                        <span class="icon-bar" style="background-color:aliceblue;"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <div class="hori-selector">
                            <div class="left"></div>
                            <div class="right"></div>
                        </div>
                        <li class="nav-item" id="home">
                            <a class="nav-link"
                                href="<?php echo base_url();?>index.php/admission/phdef/add_phdef/home"><i
                                    class="fas fa-home"></i>HOME</a>
                        </li>
                        <li class="nav-item  active" id="apply">
                            <a class="nav-link"
                                href="<?php echo base_url();?>index.php/admission/phdef/add_phdef/how_to_apply">
                                <!--<i class="far fa-address-book"></i>-->HOW TO APPLY
                            </a>
                        </li>
                        <li class="nav-item" id="brochure">
                            <a class="nav-link"
                                href="<?php echo base_url();?>index.php/admission/phdef/add_phdef/information_brochure">
                                <!--<i class="far fa-clone"></i>-->INFORMATION BROCHURE
                            </a>
                        </li>
                        <li class="nav-item" id="eligibility">
                            <a class="nav-link"
                                href="<?php echo base_url();?>index.php/admission/phdef/add_phdef/programme_eligibility">
                                <!--<i class="far fa-calendar-alt"></i>-->PROGRAMME ELIGIBILITY
                            </a>
                        </li>
                        <li class="nav-item" id="payment">
                            <a class="nav-link"
                                href="<?php echo base_url();?>index.php/admission/phdef/add_phdef/payment_of_fees">
                                <!--<i class="far fa-chart-bar"></i>-->PAYMENT OF FEES
                            </a>
                        </li>
                        <!-- <li class="nav-item " id="COAP_Counselling">
                <a class="nav-link" href="<?php echo base_url();?>index.php/admission/phd/add_phd/adm_phd_coap_counselling">COAP-Counselling</a>
            </li> -->


                            <li class="nav-item " id="login">
                    <a class="nav-link" href="<?php echo base_url();?>index.php/admission/phdef/add_phdef/adm_phdef_login">LOGIN</a>
                </li>
                <li class="nav-item" id="registration">
                    <a class="nav-link" href="<?php echo base_url();?>index.php/admission/phdef/add_phdef/adm_phdef_registration">REGISTRATION</a>
                </li>
                        <li class="nav-item" id="contact">
                            <a class="nav-link"
                                href="<?php echo base_url();?>index.php/admission/phdef/add_phdef/contact_us">
                                <!--<i class="far fa-copy"></i>-->HELP DESK
                            </a>
                        </li>
                        <li class="nav-item" id="H">
                            <a class="nav-link" href="#"><i class="fas fa-home"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
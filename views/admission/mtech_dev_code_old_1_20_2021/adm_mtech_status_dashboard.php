<style>
    @import url('https://fonts.googleapis.com/css?family=Roboto');

    body {
        margin: 0;
        padding: 0;
        font-family: 'Roboto', sans-serif;
    }

    .palel-primary {
        border-color: #e47781;
    }

    .panel-primary>.panel-heading {
        text-align: center;
        background: #e47781;
    }

    .panel-primary>.panel-body {
        background-color: #EDEDED;
    }

    marquee {
        font-size: 15px;
        font-weight: 300;
        color: #ff5200;
        font-family: sans-serif;
    }

    .news_back {
        border-radius: 5px;
        border: solid 1px #ccc;
        box-shadow: 1px 2px 5px rgba(0, 0, 0, .31);
        background: #ebebeb;
    }

    ol {
        margin-left:1rem;
        width:90%;
    }

    li {
        margin:1rem;
        text-align:left;
    }

    table {
        border: 1px solid #ccc;
        border-collapse: collapse;
        margin: 0;
        padding: 0;
        width: 100%;
        /* table-layout: fixed; */
        margin: 50px auto;
    }

    table tr {
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        padding: .35em;
    }

    table td {
        background: #EDEDED;
    }

    table th, td {
        padding: .625rem;
        font-size: 1.15rem;
        letter-spacing: .0625rem;
        border: 1px solid #ccc;
        text-align: center;
    }

    table th {
        text-transform: uppercase;
        background: #e47781;
        color: white;
        font-weight: bold;
        text-align: center;
    }

    @media screen and (max-width: 1370px) {
        table {
            border: 0;
        }
        thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        table tr {
            display: block;
            margin-bottom: .625em;
        }
        
        table td {
            display: block;
            font-size: .8em;
            text-align: right;
        }
        
        table td::before {
            content: attr(data-label);
            float: left;
            font-weight: bold;
            text-transform: uppercase;
        }
    }
</style>
<div class="row">
    <div class="col-sm-2 col-md-2 col-lg-2">
        <div class="notice">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary news_back">
                        <div class="panel-heading">NEWS AND EVENTS
                        </div>
                        <div class="panel-body">
                            <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">Candidates can now check their admission status.</marquee>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="info">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="panel panel-primary news_back">
                        <div class="panel-heading">Important Information
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <button class="btn btn-danger" style="width:100%;"><a href="<?php echo base_url() ?>index.php/admission/mtech/Adm_mtech_registration/logout"><b style="text-decoration: none; color: white;">Logout</b></a> </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-8 col-md-8 col-lg-8">
        <div class="home">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="panel panel-primary news_back">
                        <div class="panel-heading">M.Tech Application Status
                        </div>
                        <div class="panel-body">
                            <section>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th  scope="col">SI.NO</th>
                                                    <th  scope="col">Registration No.</th>
                                                    <th  scope="col">Name</th>
                                                    <th  scope="col">Program Name</th>
                                                    <th  scope="col">Payment Status</th>
                                                    <th  scope="col">Application Status</th>
                                                    <th  scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($application)) {
                                                    $i = 1;
                                                    foreach ($application as $appl) {
                                                ?>
                                                        <tr>
                                                            <td  data-label="Sl. No."><?php echo $i; ?></td>
                                                            <td data-label="Registration No."><?php echo $appl->registration_no ?></td>
                                                            <td  data-label="Name"><?php echo $appl->first_name . " " . $appl->middle_name . " " . $appl->last_name; ?></td>
                                                            <td data-label="Program Name">
                                                                <?php if (!empty($program)) { ?><br>
                                                                    <ol>
                                                                        <?php foreach ($program as $prgm) { ?>
                                                                            <li>
                                                                                <?php echo $prgm->program_desc . "(" . $prgm->program_id . ")"; ?> 
                                                                            </li>
                                                                        <?php } ?>
                                                                    </ol>
                                                                <?php } else { ?>
                                                                    <b>You have not yet applied for any program</b>
                                                                <?php }
                                                                ?>
                                                            </td>
                                                            <?php if ($appl->payment_status == 'Y') { ?>
                                                                <td data-label="Payment Status" style="color:green;"><?php echo "Completed" ?></td>
                                                            <?php } else { ?>
                                                                <td data-label="Payment Status" style="color:red;"><button class="btn btn-sm btn-danger"><?php echo "Not Completed"; ?></td>
                                                            <?php }
                                                            ?>
                                                            <?php if(!empty($appl->status))
                                                            { ?>  
                                                                <td data-label="Application Status"><?php echo $appl->status; ?></td>
                                                            <?php } else {?>
                                                                <td data-label="Application Status"><?php echo "Not Completed"; ?></td>
                                                            <?php } ?>
                                                            <?php if ($tab_stat[0]->tab_status == 0) { ?>
                                                                <td data-label="Action"><button class="btn btn-sm">----</button></td>
                                                            <?php } else { ?>
                                                                <td data-label="Action">
                                                                    <a href="<?php echo base_url(); ?>index.php/admission/mtech/Adm_mtech_application_preview/application_preview" target="_blank"><button class="btn btn-sm  btn-primary">Preview</button></a><br /><br />
                                                                    <a href="<?php echo base_url(); ?>index.php/admission/mtech/Adm_mtech_application_preview/payment_receipt"><button class="btn btn-sm btn-primary">Payment Receipt</button></a>
                                                                </td>
                                                            <?php }
                                                            ?>
                                                        </tr>
                                                <?php $i++;
                                                    }
                                                } ?>
                                            </tbody>
                                        </table>
                                        <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">Candidates can now check their admission status.</marquee>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="notice">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary news_back">
                        <div class="panel-heading">Notics
                        </div>
                        <div class="panel-body">
                            <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">Candidates can now check their admission status.</marquee>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
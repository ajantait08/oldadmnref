<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin-theme/css/scrutiny.css">

<div>
    <?php
    $this->load->view('admission/admin/layout/flashmessages');
    ?>
</div>

<button type="button" class="btn btn-gradient-primary btn-rounded btn-icon" onclick="topFunction()" id="myBtn" title="Go to top">
    <i class="mdi mdi-arrow-up-bold-outline"></i>
</button>

<div class="page-header">
    <h3 class="page-title">Registration No.: <?php echo $application[0]->registration_no; ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/admission/admin/dashboard/scrutiny">All Applicants</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $application[0]->registration_no; ?></li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-7">
                        <iframe src="<?php echo base_url(); ?>assets/admission/mba/<?php echo $application[0]->registration_no; ?>/Application_form<?php echo $application[0]->registration_no; ?>.pdf" frameborder="0" width="100%" height="1140" align="left">
                        </iframe>
                    </div>
                    <div class="col-5">
                        <h4 class="card-title">Uploaded Document Preview:</h4>
                        <div class="template-demo text-center">
                            <?php $i = 1;
                            foreach ($doc as  $value) {
                                if (!empty($value)) {
                                    if (($value->description != "Photo") && ($value->description != "Signature") && ($value->description != "QRCode")) { ?>
                                        <a class="btn btn-inverse-dark btn-md col-4" id="link<?php echo $i; ?>" href="<?php echo base_url(); ?><?php echo $value->doc_path; ?>" onclick="showdocument(<?php echo $i; ?>, '<?php echo base_url(); ?><?php echo $value->doc_path; ?>')" data-toggle="modal" data-target="#modalYT">
                                            <?php echo $value->description; ?>
                                        </a>
                                    <?php }
                                    if (($value->description == "Photo") || ($value->description == "Signature")) { ?>
                                        <a class="btn btn-inverse-dark btn-md col-4" id="link<?php echo $i; ?>" data-toggle="modal" data-target="#popup_img<?php echo $i;?>" href="">
                                            <?php echo $value->description; ?>
                                        </a>
                                        <div class="modal fade" id="popup_img<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabe2">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <div class="modal-dialog" role="document">
                                                <img alt="" src="<?php echo base_url(); ?><?php echo $value->doc_path; ?>">
                                            </div>
                                        </div>
                            <?php }
                                }
                                $i++;
                            } ?>
                        </div>
                        <div class="modal fade" id="modalYT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document" style="width:80%">
                                <div class="modal-content">
                                    <div class="modal-body mb-0 p-0">
                                        <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                                            <iframe class="embed-responsive-item" name="iframed" id="iframed"></iframe>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-outline-dark btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <form class="forms-sample" align="left" action="<?php echo base_url() ?>index.php/admission/admin/dashboard/scrutiny_remark/<?php echo $application[0]->registration_no; ?>" method="post" onsubmit="return validateForm()">
                            <div class="form-group">
                                <label for="SelectAction">
                                    <h4 class="card-title">Select Document Verification Status</h4>
                                </label>
                                <select class="form-control" id="SelectAction" name="verf_action" onchange="check_val(this);">
                                    <option value=0 <?php if ($application[0]->doc_verfied_flag == 0) echo 'selected="selected"'; ?>>Not Started</option>
                                    <option value=1 <?php if ($application[0]->doc_verfied_flag == 1) echo 'selected="selected"'; ?>>Verified - OK</option>
                                    <option value=2 <?php if ($application[0]->doc_verfied_flag == 2) echo 'selected="selected"'; ?>>Verified - Not OK</option>
                                </select>
                            </div>
                            <div id="div-reject-reason" class="form-group" style="display: none;">
                                <h4 class="card-title">Rejection Reasons:</h4>
                                <?php foreach ($reason as $rsn) { ?>
                                    <div class="form-check">
                                        <label for="<?php echo  $rsn->id; ?>" class="form-check-label">
                                            <input id="#check<?php echo  $rsn->id; ?>" value="<?php echo  $rsn->id; ?>" name="reason_check[<?php echo  $rsn->id; ?>]" type="checkbox" class="form-check-input" <?php if ($rsn->id == 0) echo 'onclick="ShowHideDiv(this)"'; ?> <?php if (in_array($rsn->id, $crnt_rsn)) {
                                                                                                                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                                                                                                                } ?>>
                                            <?php echo  $rsn->reason_desc; ?>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>
                            <div id="other-rsn-remark" class="form-group" style="display: none;">
                                <label for="Textarea1">Other Reason Remarks:</label>
                                <textarea class="form-control" id="Textarea1" name="verf_remark" maxlength="300"><?php if (isset($other_rsn_crnt_vlu)) {
                                                                                                                        echo $other_rsn_crnt_vlu;
                                                                                                                    } ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //Get the button
    var mybutton = document.getElementById("myBtn");
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

    function showdocument(id, pathinfo) {
        document.getElementById("iframed").src = pathinfo;
    }

    function check_val(sel) {
        if (sel.value == 2) {
            document.getElementById('div-reject-reason').style.display = "block";
        } else {
            document.getElementById('div-reject-reason').style.display = "none";
            document.getElementById('#check0').checked = false;
            document.getElementById('other-rsn-remark').style.display = "none";
            document.getElementById("Textarea1").value = "";
            document.getElementById("Textarea1").required = FALSE;
        }
    }

    function ShowHideDiv(chkOther) {
        var otherReason = document.getElementById("other-rsn-remark");
        var rsntext = document.getElementById("Textarea1");
        if (chkOther.checked) {
            otherReason.style.display = "block";
            rsntext.required = true;
        } else {
            otherReason.style.display = "none";
            rsntext.required = false;
        }
    }

    function validateForm() {
        sel = document.getElementById('SelectAction');
        if (sel.value == 2) {
            var checked = document.querySelectorAll('input:checked');
            if (checked.length == 0) {
                alert("Select atleast one reason.");
                return false;
            } else {
                return true;
            }
        }
        return true;
    }

    $(document).ready(function() {
        sel = document.getElementById('SelectAction');
        if (sel.value == 2) {
            document.getElementById('div-reject-reason').style.display = "block";
            if (document.getElementById("#check0").checked) {
                document.getElementById("other-rsn-remark").style.display = "block";
                document.getElementById("Textarea1").required = FALSE;
            }
        }
    });
</script>
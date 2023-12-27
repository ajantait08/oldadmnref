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
<input class="btn btn-info" style="width:10%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/admin/dashboard/scrutiny'" value="Back" />
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
                                        <a class="btn btn-inverse-dark btn-md col-4" id="link<?php echo $i; ?>" data-toggle="modal" data-target="#popup_img<?php echo $i; ?>" href="">
                                            <?php echo $value->description; ?>
                                        </a>
                                        <div class="modal fade" id="popup_img<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabe2">
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
                        <form class="forms-sample" id="subform" align="left" action="<?php echo base_url() ?>index.php/admission/admin/dashboard/scrutiny_remark/<?php echo $application[0]->registration_no; ?>" method="post" onsubmit="return validateForm()">
                            <div class="form-group">
                                <label for="SelectAction">
                                    <h4 class="card-title" style="background-color: beige;">Select Document Verification status <br><br>
                                      <?php 
                                         
                                         if($application[0]->doc_verfied_flag == 1)
                                         {
                                            echo "Current status Verified - OK";
                                         }
                                         elseif($application[0]->doc_verfied_flag == 2)
                                         {
                                            echo "Current statusVerified - Not OK";
                                         }
                                         elseif($application[0]->doc_verfied_flag == 3)
                                         {
                                            echo "Current status Verified - (MBA OK) AND (BA NOT OK)";
                                         }
                                         elseif($application[0]->doc_verfied_flag == 4)
                                         {
                                            echo "Current status Verified - (BA OK) AND (MBA NOT OK)";
                                         }
                                         else {
                                           
                                         }

                                      ?>

                                    </h4>
                                </label>
                                <table>
                                <tr>
                                    <?php $i=1; foreach ($program as $rsn) { ?>
                                        <td><div class="form-check">
                                            <label for="<?php echo  $rsn->program_id; ?>" class="form-check-label">
                                                <input id="check<?php echo  $rsn->program_id; ?>" value="<?php echo  $rsn->program_id; ?>" name="prog<?php echo$i;?>" type="checkbox" class="form-check-input" onclick="return false" <?php echo "checked";?> readonly>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
                                                <?php echo  strtoupper($rsn->program_id); ?>
                                            </label>
                                        </div></td>
                                    <?php $i++ ;} ?>
                                </tr>
                                </table>     
                                <input id="tot_pro" value="<?php echo count($program); ?>" name="tot_pro" type="hidden"> 
                                <input id="keep_sel" value="<?php echo $application[0]->doc_verfied_flag; ?>" name="keep_sel" type="hidden">     
                                <select class="form-control" id="SelectAction" name="verf_action" onchange="check_val(this);">
                                    <?php if(count($program)=='1') 
                                    {?>
                                       <option value=0 <?php if ($application[0]->doc_verfied_flag == 0) echo 'selected="selected"'; ?>>Not Started</option>
                                       <option value=1 <?php if ($application[0]->doc_verfied_flag == 1) echo 'selected="selected"'; ?>>Verified - OK</option>
                                       <option value=2 <?php if ($application[0]->doc_verfied_flag == 2) echo 'selected="selected"'; ?>>Verified - Not OK</option>
                                    <?php }
                                    else { ?>
                                        <option value=0 <?php if ($application[0]->doc_verfied_flag == 0) echo 'selected="selected"'; ?>>Not Started</option>
                                    <option value=1 <?php if ($application[0]->doc_verfied_flag == 1) echo 'selected="selected"'; ?>>Verified - OK</option>
                                    <option value=2 <?php if ($application[0]->doc_verfied_flag == 2) echo 'selected="selected"'; ?>>Verified - Not OK</option>
                                    <option value=3 <?php if ($application[0]->doc_verfied_flag == 3) echo 'selected="selected"'; ?>>Verified - (MBA OK) AND (BA NOT OK)</option>
                                    <option value=4 <?php if ($application[0]->doc_verfied_flag == 4) echo 'selected="selected"'; ?>>Verified - (BA OK) AND (MBA NOT OK)</option>
                                    
                                    <?php }
                                    ?>
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
                            <div>
                                <p><b>Verification Done By:</b> <?php echo $this->session->userdata('emp_name');?> 
                                    (<?php echo $this->session->userdata('emp_no');?>)                                 
                                </p>
                            </div>
                            
                            <button type="submit" id="subformc" class="btn btn-gradient-primary mr-2">Submit</button>
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
        if (sel.value == 2 || sel.value == 3 || sel.value == 4) {
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
        var k_el=$("#keep_sel").val();
        if(k_el==1)
            {
                $("#checkba").prop("checked", true);
                $("#checkmba").prop("checked", true);
                
            }
            else if(k_el==2)
            {
                $("#checkba").prop("checked", true);
                $("#checkmba").prop("checked", true);
                document.getElementById('div-reject-reason').style.display = "block";
            }
            else if(k_el==3)
            {
                $("#checkba").prop("checked", false);
                $("#checkmba").prop("checked", true);
                document.getElementById('div-reject-reason').style.display = "block";
            }
            else if(k_el==4)
            {
                $("#checkmba").prop("checked", false);
                $("#checkba").prop("checked", true);
                document.getElementById('div-reject-reason').style.display = "block";
            }
            else
            {

            }
       
        $("#subformc").click(function()
        {   
            var action=$("#SelectAction").val();
            // alert("jksdf");
            // alert(action);
            if(action==1)
            {
                $("#checkba").prop("checked", true);
                $("#checkmba").prop("checked", true);
            }
            if(action==2)
            {
                $("#checkba").prop("checked", true);
                $("#checkmba").prop("checked", true);
            }
            if(action==3)
            {
                $("#checkba").prop("checked", false);
                $("#checkmba").prop("checked", true);
            }
            else if(action==4)
            {
                alert("BA document is ok but MBA will reject");
            }
            

        
            return true;
        });

       
        $("#SelectAction").change(function(){

            var action=$("#SelectAction").val();
            
            if(action==1)
            {
                $("#checkba").prop("checked", true);
                $("#checkmba").prop("checked", true);
            }
            else if(action==2)
            {
                $("#checkba").prop("checked", true);
                $("#checkmba").prop("checked", true);
            }
            else if(action==3)
            {
                $("#checkba").prop("checked", false);
                $("#checkmba").prop("checked", true);
            }
            else if(action==4)
            {
                $("#checkmba").prop("checked", false);
                $("#checkba").prop("checked", true);
            }
            else
            {

            }

        });

        sel = document.getElementById('SelectAction');
        if (sel.value == 2) {
            document.getElementById('div-reject-reason').style.display = "block";
            if (document.getElementById("#check0").checked) {
                document.getElementById("other-rsn-remark").style.display = "block";
                document.getElementById("Textarea1").required = FALSE;
            }
        }
    });

    // $(document).bind("contextmenu", function(e) {
    //     return false;
    // });
</script>
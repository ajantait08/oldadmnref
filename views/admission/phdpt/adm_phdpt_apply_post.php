<link href="<?php echo base_url(); ?>themes/dist/css/phdpt/adm_phdpt_personal_details.css" rel="stylesheet" media="screen">

<style>
/* notice css  start*/
#overlay1 {
    display: none;
    position: fixed;
    top: 0px;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
    width: 100%;
    height: 100%;
    z-index: 999;
    background-color: rgba(0, 0, 0, 0.85);

}

#overlay1 #loading1 {
    z-index: 9999;
    position: fixed;
    top: 0px;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
    width: 300px;
    height: 300px;
    background-size: 100% 100%;
    opacity: 1;
}
</style>
<script type="text/javascript">
    // ------------step-wizard-------------
    $(document).ready(function() {

        $('.nav-tabs > li a[title]').tooltip();

        //Wizard
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {

            var target = $(e.target);

            if (target.parent().hasClass('disabled')) {
                return false;
            }
        });

        $(".next-step").click(function(e) {

            var active = $('.wizard .nav-tabs li.active');
            active.next().removeClass('disabled');
            nextTab(active);

        });
        $(".prev-step").click(function(e) {

            var active = $('.wizard .nav-tabs li.active');
            prevTab(active);

        });
    });

    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }

    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }


    $('.nav-tabs').on('click', 'li', function() {
        alert("hello");

        // $('.nav-tabs li.active').removeClass('active');
        // $(this).addClass('active');
    });
</script>
<div class="row">
    <!--row start  -->
    <div class="col-sm-2 col-md-2 col-lg-2">
        <!--row col-md-4 start  -->

        <div class="info">
            <!--info start  -->
            <div class="row">
                <div class="col-md-12">
                    <!--start  -->
                    <div class="panel panel-primary news_back">
                        <div class="panel-heading">Activity</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <input class="btn btn-danger" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/phdpt/Adm_phdpt_registration/logout'" value="Logout" />
                                    <!--end  -->
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--end  -->
                </div>
            </div>
        </div>
        <!--info end -->
    </div>
    <!--row col-md-4 end  -->
    <div class="col-sm-8 col-md-8 col-lg-8">
        <!--row col-md-8 start  -->
        <div class="home">
            <!--home start  -->
            <div class="row">
                <!--home row start  -->
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <!--home col-md-12 start  -->
                    <!--start  -->
                    <div class="panel panel-primary news_back">
                        <div class="panel-body">

                            <?php if ($this->session->flashdata('error')) { ?>
                                <div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong></strong> <?php echo $this->session->flashdata('error') ?>
                                </div>
                            <?php } ?>
                            <?php if ($this->session->flashdata('apply_success')) { ?>
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong></strong> <?php echo $this->session->flashdata('apply_success') ?>
                                </div>
                            <?php } ?>
                            <?php if (($candidate_type)) {
                            ?>
                                <section class="signup-step-container">
                                    <div id="sponserd">
                                        <form id="apply_post" action="<?php echo base_url() ?>index.php/admission/phdpt/Adm_phdpt_user_dashboard/get_apply_post" method="POST" control="" class="form-group register">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Programme applying for<span style="color:red;">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
                                                            <select id="programme_apply_for" name="programme_apply_for" class="form-select" aria-label="Default select example">
                                                                <option value="">Please select</option>
                                                                <?php if (!empty($btech_paper)) {
                                                                    foreach ($btech_paper as $value) { ?>
                                                                        <option value="<?php echo $value->program_id ?>"><?php echo $value->program_desc ?></option>
                                                                <?php }
                                                                } ?>
                                                            </select>
                                                            <?php if (validation_errors()) { ?>
                                                                <div class="myalert">
                                                                    <?php echo form_error('branch') ?>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <!-- NAME -->
                                                    <div class="form-group">
                                                        <label>Department<span style="color:red;">*</span></label>
                                                        <select name="dept" id="dept">
                                                            <option value="">Please select Department</option>
                                                        </select>
                                                        <?php if (validation_errors()) { ?>
                                                                <div class="myalert">
                                                                    <?php echo form_error('dept') ?>
                                                                </div>
                                                            <?php } ?>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <!-- NAME -->
                                                    <div class="form-group">
                                                        <label>Ph.D. in<span style="color:red;">*</span></label>
                                                        <select name="phd_in" id="phd_in">
                                                            <option value="">Please select Ph.D. in</option>
                                                           
                                                        </select>
                                                        <?php if (validation_errors()) { ?>
                                                                <div class="myalert">
                                                                    <?php echo form_error('phd_in') ?>
                                                                </div>
                                                            <?php } ?>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-3">
                                                    <!-- NAME -->
                                                    <div class="form-group">
                                                        <label>Programme Eligibilty<span style="color:red;">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
                                                            <select id="prog_elligibilty" name="prog_elligibilty" class="form-select" aria-label="Default select example">
                                                                <option value=""> Please select Branch</option>

                                                            </select>
                                                            <?php if (validation_errors()) { ?>
                                                                <div class="myalert">
                                                                    <?php echo form_error('branch') ?>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                 
                                            </div>

                                            <div class="row" style="border: 1px solid #e9ecef;border-left: 3px solid green; margin-top: 39px;margin-bottom: 46px;">                  
                                                <div class="col-md-2">
                                                    <!-- NAME -->
                                                    <div class="form-group">
                                                        <label>Choose your Faculty Priority<span style="color:red;">*</span></label>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <!-- Priority 1 -->
                                                    <div class="form-group">
                                                        <label>Priority 1<span style="color:red;">*</span></label>
                                                        <select name="Priority1" id="Priority1">
                                                            <option value="">-----please select Priority 1----</option>
                                                            
                                                        </select>
                                                        <?php if (validation_errors()) { ?>
                                                            <div class="myalert">
                                                                <?php echo form_error('Priority1') ?>
                                                            </div>
                                                        <?php } ?>
                                                        
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <!-- NAME -->
                                                    <div class="form-group">
                                                        <label>Priority 2</label>
                                                        <select name="Priority2" id="Priority2">
                                                            <option value="">-----please select Priority 2----</option>
                                                            
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-3">
                                                    <!-- NAME -->
                                                    <div class="form-group">
                                                        <label>Priority 3</label>
                                                        <div class="input-group">
                                                            
                                                            <select id="Priority3" name="Priority3" class="form-select" aria-label="Default select example">
                                                                <option value="">-- please select Priority 3--</option>

                                                            </select>
                                                            
                                                        </div>
                                                    </div>
                                                </div>   
                                                
                                                <div class="col-md-2">

                                                </div>
                                                <div class="col-md-3">
                                                    <!-- NAME -->
                                                    <div class="form-group">
                                                        <label>Priority 4</label>
                                                        <div class="input-group">
                                                            
                                                            <select id="Priority4" name="Priority4" class="form-select" aria-label="Default select example">
                                                                <option value="">-----please select Priority 4-----</option>

                                                            </select>
                                                            
                                                        </div>
                                                    </div>
                                                </div>   
                                                <div class="col-md-3">
                                                    <!-- NAME -->
                                                    <div class="form-group">
                                                        <label>Priority 5</label>
                                                        <div class="input-group">
                                                            
                                                            <select id="Priority5" name="Priority5" class="form-select" aria-label="Default select example">
                                                                <option value="">-----please select Priority 5-----</option>

                                                            </select>
                                                            
                                                        </div>
                                                    </div>
                                                </div>      



                                           </div>
                                            <div>
                                                <input type="hidden" id="apl" name="apl" value=" <?php if (!empty($candidate_type)) { echo $candidate_type; } ?>">
                                                <button type="submit" id="apply_post" class="btn btn-primary g" style="background-color:#B31312;float:right;">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </section>
                            <?php }
                            ?>
                            <section>
                                <?php if (!empty($fill_appl_details)) { ?>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <h5 class="text-center" style="text-decoration: underline;font-size:21px;">Programme you wish to apply for</h5>
                                            <table id="table_programme" class=".table-sm table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th style="font-size: 10px;">Sl. No.</th>
                                                        <th style="font-size: 10px;">Programme Applying</th>
                                                        <th style="font-size: 10px;">Qualifying Degree</th>
                                                        <th style="font-size: 10px;">Ph.D. in</th>
                                                        <th style="font-size: 10px;">Specialization Priority</th>
                                                        <th style="font-size: 10px;">Amount in Rs.</th>
                                                        <Th style="font-size: 10px;">Action

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    foreach ($fill_appl_details as $row) { ?>
                                                        <tr>
                                                            <td><?php echo $i; ?> </td>
                                                            <td class="valprog"><?php echo $row->program_desc . "(" . $row->program_id . ")"; ?></td>
                                                            <td><?php echo $this->Add_phdpt_registration_model->get_degree_desc_by_program_id($row->degree_id); ?></td>
                                                            <td><?php if(!empty($row->phd_in)) echo $row->phd_in; ?></td>
                                                            <td> <ul>
                                                            <?php 

                                                                $specail_val=$this->Add_phdpt_registration_model->get_specialization_reg_pro($row->registration_no,$row->program_id);
                                                                // echo $this->db->last_query();
                                                                // exit;
                                                                foreach ($specail_val as $key => $value) {
                                                                   
                                                                    echo "<li style='color:green;list-style-type:none;'>".$value->priority.". ".$value->spec_desc."</li>";
                                                                }

                                                              ?>
                                                              </ul>
                                                            </td>
                                                            <td><?php if(!empty($row->phd_in)) echo $row->fee_amount;?></td>
                                                           
                                                            <td>
                                                                <button type="button" class="btn btn-danger btn_sm" data-toggle="modal" data-target="#form1<?= $i ?>">
                                                                    Delete
                                                                </button>
                                                                <div class="modal fade text-left" id="form1<?= $i ?>" data-backdrop="static" style="padding-right: 0">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" style="text-align: left; font-size: 22px; font-weight: 700">Delete Information:-</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" style="margin-top: -35px;font-size: 35px">&times;</button>
                                                                            </div>

                                                                            <div class="modal-body">
                                                                                <div class="box-body ">
                                                                                    <form method="POST" action="<?php echo base_url() ?>index.php/admission/phdpt/Adm_phdpt_user_dashboard/education_apply_post" method="POST">
                                                                                        <p>Do you Really Want to Delete </p>
                                                                                        <!-- Modal footer -->
                                                                                        <input type="hidden" id="redirect_to_image_folder" name="redirect_to_image_icon" value="<?php echo $row->id ?>">
                                                                                        <input type="hidden" id="redirect_to_image_folder1" name="redirect_to_image_icon2" value="<?php echo  $row->degree_id; ?>">
                                                                                        <input type="hidden" id="redirect_to_image_folder2" name="redirect_to_image_icon3" value="<?php echo $row->program_id; ?>">
                                                                                        <div class="modal-footer">
                                                                                            <button type="submit" class="btn btn-danger">Yes</button>
                                                                                            <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                                                                                        </div>

                                                                                    </form>

                                                                                </div>

                                                                            </div>


                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <!-- </form> -->
                                                            </td>

                                                        </tr>
                                                    <?php $i++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div>

                                                <h4 class='alert alert-info' style="color:black"><center><strong>Applicants can apply for a maximum ten number of programs.</strong></center></h4>
                                                <h4 class='alert alert-info' style="color:black"><center><strong>Applicantion fee for  each programme for UR/OBC/EWS candidate is Rs. 1000/- and for SC/ST/PwD/Female/Transgender candidate is Rs. 500/- .</strong></center></h4>
                                                <h4 class='alert alert-danger'>
                                                    <center><strong>Disclaimer: Once you click on "Final programme selection SUBMIT", you cannot change the programme later. </strong></center>
                                                </h4>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <center>
                                                <button type="button" class="btn-primary" id="final_submit">Final programme selection SUBMIT</button>
                                            </center>


                                        </div>

                                    </div>
                                <?php } ?>
                            </section>

                        </div> <!-- panel body end  -->
                    </div> <!-- panel end  -->

                    <!--end  -->
                </div>
                <!--home col-md-12 end  -->
            </div>
            <!--home row end  -->
        </div>
        <!--home end  -->
    </div>
    <!--row col-md-8 end  -->
    <div class="col-sm-2 col-md-2 col-lg-2">
        <!--row col-md-2 start  -->
        <div class="notice">
            <!--notice start  -->
            <div class="row">
                <div class="panel panel-primary news_back">
                    <div class="panel-heading">Applicant home
                    </div>
                    <div class="panel-body">
                        <input class="btn btn-info" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/phdpt/Adm_phdpt_applicant_home'" value="Back Applicant Home" />

                    </div>
                </div>
            </div>
        </div>
        <!--notice end -->
    </div>
    <!--row col-md-2 end  -->
</div>


<div id="overlay1">
    <br><br><br><br>
    <div id="loading1" class="text-center" style="color:white;">
        <i class="fa fa-spinner fa-spin" style="font-size: 70px;"></i>
        <br>
        <h3>Please wait to get Faculty Details<br> <span class="loading"></span></h3>
    </div>
</div>
<!--row start  -->
<script type="text/javascript" src="<?php echo base_url(); ?>themes/dist/js/phdpt/adm_phdpt_apply.js"></script>
<script type="text/javascript">
    $(document).ready(function() 
    {   

        var optionValu3 =[];
        $('#dept option').each(function(){
        if($.inArray(this.value, optionValu3) >-1){
            $(this).remove()
        }else{
            optionValu3.push(this.value);
        }
        });


        $("#programme_apply_for").change(function(event) 
        {
            var programme_apply_for = $("#programme_apply_for").val();
           
            $.ajax({
                url: "<?php echo base_url() ?>index.php/admission/phdpt/Adm_phdpt_user_dashboard/get_program_elligibilty",
                type: "POST",
                // dataType:'json',
                data: {
                    "programme_apply_for": programme_apply_for
                },
                success: function(data) {
                    var jsondata = $.parseJSON(data);
                    $('#prog_elligibilty').html('');
                    $('#dept').html('');
                    $('#phd_in').html('');
                    
                    $('#prog_elligibilty').html('<option value="">--Please select--</option>');
                    $.each(jsondata.elligibilty, function(key, value) {
                        
                        $('#prog_elligibilty').append($('<option value=" ">--Please select--</option>')
                            .attr("value", value.degree_code)
                            .text(value.degree_desc));
                    });

                    $('#dept').html('<option value="">--Please select--</option>');
                    $.each(jsondata.prog, function(key, value) {
                        
                        $('#dept').append($('<option value=" ">--Please select--</option>')
                            .attr("value", value.dept_id)
                            .text(value.desc));
                        $('#phd_in').append($('<option value=" ">--Please select--</option>')
                        .attr("value", value.adm_category)
                        .text(value.adm_category));
                    });
                }
            });
            // $.ajax({
            //     url: "<?php echo base_url() ?>index.php/admission/phdpt/Adm_phdpt_user_dashboard/get_specialization_by_program_id",
            //     type: "POST",
            //     // dataType:'json',
            //     data: {
            //         "programme_apply_for": programme_apply_for
            //     },
            //     success: function(data) {
                   
            //         var jsondata = $.parseJSON(data);
            //         $('#Priority1').html('');
            //         $('#Priority2').html('');
            //         $('#Priority3').html('');
            //         $('#Priority1').html('<option value="">--Please select Priority 1--</option>');
            //         $('#Priority2').html('<option value="">--Please select Priority 2--</option>');
            //         $('#Priority3').html('<option value="">--Please select Priority 3--</option>');
            //         $.each(jsondata.specail, function(key, value) {
                        
            //             $('#Priority1').append($('<option value=" ">--Please select--</option>')
            //                 .attr("value", value.spec_desc)
            //                 .text(value.spec_desc));
            //             $('#Priority2').append($('<option value=" ">--Please select--</option>')
            //             .attr("value", value.spec_desc)
            //             .text(value.spec_desc));
            //             $('#Priority3').append($('<option value=" ">--Please select--</option>')
            //                 .attr("value", value.spec_desc)
            //                 .text(value.spec_desc));
            //         });

                   
            //     },
            //     error: function(data) {
            //         alert("Error found");
            //         //var jsondata = $.parseJSON(data);
            //        // console.console.log(data);
                   
            //     }
            // });
        })

        $("#dept").change(function(event) 
        {
            var dept = $("#dept").val();

            $.ajax({
                url: "<?php echo base_url() ?>index.php/admission/phdpt/Adm_phdpt_user_dashboard/get_faculty_by_dept_id",
                type: "POST",
                beforeSend: function() {
                $('#overlay1').show();
                },
                // dataType:'json',
                data: {
                    "dept": dept
                },
                success: function(data) {
                    $('#overlay1').hide();
                    var jsondata = $.parseJSON(data);
                    $('#Priority1').html('');
                    $('#Priority2').html('');
                    $('#Priority3').html('');
                    $('#Priority4').html('');
                    $('#Priority5').html('');
                    $('#Priority1').html('<option value="">--Please select Priority 1--</option>');
                    $('#Priority2').html('<option value="">--Please select Priority 2--</option>');
                    $('#Priority3').html('<option value="">--Please select Priority 3--</option>');
                    $('#Priority4').html('<option value="">--Please select Priority 4--</option>');
                    $('#Priority5').html('<option value="">--Please select Priority 5--</option>');
                    $.each(jsondata.specail, function(key, value) {
                        
                        $('#Priority1').append($('<option value=" ">--Please select--</option>')
                            .attr("value", value.faculty_desc+'('+value.emp_id+')')
                            .text(value.faculty_desc+' ('+value.emp_id+')'));
                        $('#Priority2').append($('<option value=" ">--Please select--</option>')
                        .attr("value", value.faculty_desc+'('+value.emp_id+')')
                        .text(value.faculty_desc+' ('+value.emp_id+')'));
                        $('#Priority3').append($('<option value=" ">--Please select--</option>')
                            .attr("value", value.faculty_desc+'('+value.emp_id+')')
                            .text(value.faculty_desc+' ('+value.emp_id+')'));
                        $('#Priority4').append($('<option value=" ">--Please select--</option>')
                        .attr("value", value.faculty_desc+'('+value.emp_id+')')
                        .text(value.faculty_desc+' ('+value.emp_id+')'));
                        $('#Priority5').append($('<option value=" ">--Please select--</option>')
                        .attr("value", value.faculty_desc+'('+value.emp_id+')')
                        .text(value.faculty_desc+' ('+value.emp_id+')'));
                    });

                   
                },
                error: function(data) {
                    alert("Error found");
                    //var jsondata = $.parseJSON(data);
                   // console.console.log(data);
                   
                }
            });
        })



    $("#Priority2").click(function(){
        
        var priority1=$("#Priority1").val();
        if(priority1=='')
        {
            swal.fire("Information!", "Please Select Priority 1 First");
            $("#branch").focus();
            return false;
        }
       
    });
    $("#Priority3").click(function(){
        var priority1=$("#Priority1").val();
        var priority2=$("#Priority2").val();
        if(priority1=='')
        {
            swal.fire("Information!", "Please Select Priority 1 First");
            $("#branch").focus();
            return false;
        }
        if(priority2=='')
        {
            swal.fire("Information!", "Please Select Priority 2 First");
            $("#branch").focus();
            return false;
        }
    });
    $("#Priority4").click(function(){
        var priority1=$("#Priority1").val();
        var priority2=$("#Priority2").val();
        var priority3=$("#Priority3").val();
        if(priority1=='')
        {
            swal.fire("Information!", "Please Select Priority 1 First");
            $("#branch").focus();
            return false;
        }
        if(priority2=='')
        {
            swal.fire("Information!", "Please Select Priority 2 First");
            $("#branch").focus();
            return false;
        }
        if(priority3=='')
        {
            swal.fire("Information!", "Please Select Priority 3 First");
            $("#branch").focus();
            return false;
        }
    });
    $("#Priority5").click(function(){
        var priority1=$("#Priority1").val();
        var priority2=$("#Priority2").val();
        var priority3=$("#Priority3").val();
        var priority4=$("#Priority4").val();
        if(priority1=='')
        {
            swal.fire("Information!", "Please Select Priority 1 First");
            $("#branch").focus();
            return false;
        }
        if(priority2=='')
        {
            swal.fire("Information!", "Please Select Priority 2 First");
            $("#branch").focus();
            return false;
        }
        if(priority3=='')
        {
            swal.fire("Information!", "Please Select Priority 3 First");
            $("#branch").focus();
            return false;
        }
        if(priority4=='')
        {
            swal.fire("Information!", "Please Select Priority 4 First");
            $("#branch").focus();
            return false;
        }
    });

    });
</script>
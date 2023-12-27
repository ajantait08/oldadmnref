<link href="<?php echo base_url();?>themes/dist/css/mtech/adm_mtech_personal_details.css" rel="stylesheet" media="screen">
<script type="text/javascript">

// ------------step-wizard-------------
$(document).ready(function () {
    
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

        var target = $(e.target);
    
        if (target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var active = $('.wizard .nav-tabs li.active');
        active.next().removeClass('disabled');
        nextTab(active);

    });
    $(".prev-step").click(function (e) {

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
<div class="row"> <!--row start  -->
    <div class="col-sm-2 col-md-2 col-lg-2"> <!--row col-md-4 start  -->
        
        <div class="info"> <!--info start  -->
            <div class="row">
                <div class="col-md-12">
                    <!--start  -->
                    <div class="panel panel-primary news_back">
                        <div class="panel-heading">Activity</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                     <input class="btn btn-danger" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/mtech/Adm_mtech_registration/logout'" value="Logout" />
                                            <!--end  -->
                                    </div>
                                </div>
                            
                      </div>
                    </div>
                    <!--end  -->
                </div>
            </div>
        </div><!--info end -->
    </div> <!--row col-md-4 end  -->
    <div class="col-sm-8 col-md-8 col-lg-8"><!--row col-md-8 start  -->
       <div class="home"><!--home start  -->
            <div class="row"><!--home row start  -->
                <div class="col-md-12 col-lg-12 col-sm-12"><!--home col-md-12 start  -->
                    <!--start  -->
                    <div class="panel panel-primary news_back">
                        <div class="panel-body">
                           
                            <?php if($this->session->flashdata('error')){?>
                            <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $this->session->flashdata('error')?>
                            </div> 
                            <?php }?>
                            <?php if($this->session->flashdata('apply_success')){?>
                            <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $this->session->flashdata('apply_success')?>
                            </div> 
                            <?php }?>
                            <?php if(!empty($candidate_type))
                            { 
                                if($candidate_type =='GATE Candidates' || $gate_cfti_no=='gate')
                                {?>
                                   <section class="signup-step-container">
                                       <form id="apply_post" action="<?php echo base_url() ?>index.php/admission/mtech/Adm_mtech_user_dashboard/get_apply_post" method="POST"control="" class="form-group register" method="post" enctype="multipart/form-data">
                                           <div class="row">  
                                                <div class="col-md-3">
                                                    <!-- NAME -->
                                                    <div class="form-group">
                                                        <label>Gate Subject<span style= "color:red;">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
                                                            <select id="gate_sub_code" name="gate_sub_code" class="form-select" aria-label="Default select example">
                                                                <option value="">-- please select --</option>
                                                                <?php if(!empty($gate_paper_code)){ foreach ($gate_paper_code as $value) {?>
                                                                    <option value="<?php echo $value->gate_paper_code?>"><?php echo $value->gate_paper_desc?>(<?php echo $value->gate_paper_code?>)</option>
                                                                        <?php }}?>
                                                            </select>
                                                            <?php if(validation_errors()){?>
                                                                <div class ="myalert">
                                                                    <?php echo form_error('gate_sub_code') ?>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Programme applying for<span style= "color:red;">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
                                                            <select id="programme_apply_for" name="programme_apply_for" class="form-select" aria-label="Default select example">
                                                                <option value="">-- please select--</option>
                                                            </select>
                                                            <?php if(validation_errors()){?>
                                                                <div class ="myalert">
                                                                    <?php echo form_error('branch') ?>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <!-- NAME -->
                                                    <div class="form-group">
                                                        <label>Programme Elligibilty<span style= "color:red;">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
                                                            <select id="prog_elligibilty" name="prog_elligibilty" class="form-select" aria-label="Default select example">
                                                                <option value=""> please select branch</option>
                                                                
                                                            </select>
                                                            <?php if(validation_errors()){?>
                                                                <div class ="myalert">
                                                                    <?php echo form_error('branch') ?>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" id="math_stat">
                                                        <div >
                                                            <div class="form-group">
                                                                <label>Mathematics & statistics as subject<span style= "color:red;">*</span></label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
                                                                    <select id="math_sat_yes_no" name="math_sat_yes_no" class="form-select" aria-label="Default select example">
                                                                            <option value="">-- please select --</option>
                                                                            <option value="Y">Yes</option>
                                                                            <option value="N">No</option>
                                                                    </select>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3" id="p_Work_Experince">
                                                        <div>
                                                            <div class="form-group">
                                                                <label>Do you have two year Work Experince<span style= "color:red;">*</span></label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
                                                                    <select id="Work_Experince_yes_no" name="Work_Experince_yes_no" class="form-select" aria-label="Default select example">
                                                                            <option value="">-- please select--</option>
                                                                            <option value="Y">Yes</option>
                                                                            <option value="N">No</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div> 
                                               
                                            <div>
                                                
                                                <button type="submit" id="apply_post" class="btn btn-primary g" style="background-color:#7f42b7;float:right;">Add</button>
                                                
                                            </div>
                                           
                                                           
                                        </form>
                                       
                                    </section>
                                <?php }
                                else if($candidate_type =='IIT Graduates') 
                                { ?>  
                                   <section class="signup-step-container">
                                       <form id="apply_post" action="<?php echo base_url() ?>index.php/admission/mtech/Adm_mtech_user_dashboard/get_apply_post" method="POST"control="" class="form-group register" method="post" enctype="multipart/form-data">
                                            <div class="row">  
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Programme applying for<span style= "color:red;">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
                                                            <select id="programme_apply_for" name="programme_apply_for" class="form-select" aria-label="Default select example">
                                                                <option value="">-- please select--</option>
                                                                <?php if(!empty($btech_paper)){ foreach ($btech_paper as $value) {?>
                                                                    <option value="<?php echo $value->program_id?>"><?php echo $value->program_desc?></option>
                                                                <?php }}?>
                                                            </select>
                                                            <?php if(validation_errors()){?>
                                                                <div class ="myalert">
                                                                    <?php echo form_error('branch') ?>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <!-- NAME -->
                                                    <div class="form-group">
                                                        <label>Programme Elligibilty<span style= "color:red;">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
                                                            <select id="prog_elligibilty" name="prog_elligibilty" class="form-select" aria-label="Default select example">
                                                                <option value=""> please select</option>
                                                                
                                                            </select>
                                                            <?php if(validation_errors()){?>
                                                                <div class ="myalert">
                                                                    <?php echo form_error('branch') ?>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" id="math_stat">
                                                    <div >
                                                        <div class="form-group">
                                                            <label>Mathematics and statistics as subject<span style= "color:red;">*</span></label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
                                                                <select id="math_sat_yes_no" name="math_sat_yes_no" class="form-select" aria-label="Default select example">
                                                                        <option value="">-- please select --</option>
                                                                        <option value="Y">Yes</option>
                                                                        <option value="N">No</option>
                                                                </select>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" id="p_Work_Experince">
                                                    <div>
                                                        <div class="form-group">
                                                            <label>Do you have two year Work Experince<span style= "color:red;">*</span></label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
                                                                <select id="Work_Experince_yes_no" name="Work_Experince_yes_no" class="form-select" aria-label="Default select example">
                                                                        <option value="">-- please select--</option>
                                                                        <option value="Y">Yes</option>
                                                                        <option value="N">No</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                               
                                            <div>
                                            
                                                <button type="submit" id="apply_post" class="btn btn-primary g" style="background-color:#7f42b7;float:right;">Add</button>
                                            </div>
                                                
                                            
                                                               
                                        </form>
                                       
                                    </section>    
                                <?php 
                                }
                                else 
                                { ?>
                                    <section class="signup-step-container">
                                       <div id="sponserd">
                                            <form id="apply_post" action="<?php echo base_url() ?>index.php/admission/mtech/Adm_mtech_user_dashboard/get_apply_post" method="POST" control="" class="form-group register">
                                                <div class="row">  
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Programme applying for<span style= "color:red;">*</span></label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
                                                                <select id="programme_apply_for" name="programme_apply_for" class="form-select" aria-label="Default select example">
                                                                    <option value="">-- please select--</option>
                                                                    <?php if(!empty($btech_paper)){ foreach ($btech_paper as $value) {?>
                                                                        <option value="<?php echo $value->program_id?>"><?php echo $value->program_desc?></option>
                                                                    <?php }}?>
                                                                </select>
                                                                <?php if(validation_errors()){?>
                                                                    <div class ="myalert">
                                                                        <?php echo form_error('branch') ?>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <!-- NAME -->
                                                        <div class="form-group">
                                                            <label>Programme Elligibilty<span style= "color:red;">*</span></label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
                                                                <select id="prog_elligibilty" name="prog_elligibilty" class="form-select" aria-label="Default select example">
                                                                    <option value=""> please select branch</option>
                                                                    
                                                                </select>
                                                                <?php if(validation_errors()){?>
                                                                    <div class ="myalert">
                                                                        <?php echo form_error('branch') ?>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-md-4" id="math_stat">
                                                        <div >
                                                            <div class="form-group">
                                                                <label>Mathematics and statistics as subject<span style= "color:red;">*</span></label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
                                                                    <select id="math_sat_yes_no" name="math_sat_yes_no" class="form-select" aria-label="Default select example">
                                                                            <option value="">-- please select --</option>
                                                                            <option value="Y">Yes</option>
                                                                            <option value="N">No</option>
                                                                    </select>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4" id="p_Work_Experince">
                                                        <div>
                                                            <div class="form-group">
                                                                <label>Do you have two year Work Experince<span style= "color:red;">*</span></label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
                                                                    <select id="Work_Experince_yes_no" name="Work_Experince_yes_no" class="form-select" aria-label="Default select example">
                                                                            <option value="">-- please select--</option>
                                                                            <option value="Y">Yes</option>
                                                                            <option value="N">No</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>   
                                                    <input type="hidden" id="apl" name="apl" value=" <?php if(!empty($candidate_type)){ echo $candidate_type; } ?>">
                                                    <button type="submit" id="apply_post" class="btn btn-primary g" style="background-color:#7f42b7;float:right;">Add</button>
                                                </div>                  
                                            </form>
                                        </div>
                                    </section>
                                <?php }
                            }?>
                            <section>
                                    <?php if(!empty($fill_appl_details)){?>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <h5 class="text-center" style="text-decoration: underline;">Programme you wish to apply for</h5>
                                            <table id="table_programme" class=".table-sm table-responsive">
                                                <thead>
                                                    <tr> 
                                                        <th style="font-size: 10px;">Sl.No</th>
                                                        <th style="font-size: 10px;">Programme Applying</th>
                                                        <th style="font-size: 10px;">Qualifying Degree</th>
                                                        <th style="font-size: 10px;">Mathematics and statistics as subject</th>
                                                        <th style="font-size: 10px;">Two year Work Experince</th>
                                                        <Th style="font-size: 10px;">Action
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php  
                                                    $i=1;
                                                    foreach($fill_appl_details as $row){ ?>
                                                        <tr>
                                                            <td><?php echo $i;?> </td>
                                                            <td class="valprog"><?php echo $row->program_desc."(".$row->program_id.")";?></td>
                                                            <td><?php echo $this->Add_mtech_registration_model->get_degree_desc_by_program_id($row->degree_id);?></td>
                                                            <td><?php if($row->sub_math_12th=='Y'){ echo "Required"; } else { echo "Not Required"; }?></td>
                                                            <td><?php if($row->non_min_work_exp=='Y'){ echo "Required"; } else { echo "Not Required"; } ?></td>
                                                            <td>
                                                            <button type="button" class="btn btn-danger btn_sm"data-toggle="modal" data-target="#form1<?= $i ?>">
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
                                                                            <form method="POST" action="<?php echo base_url() ?>index.php/admission/mtech/Adm_mtech_user_dashboard/education_apply_post" method="POST" >
                                                                                <p>Do you Really Want to Delete </p>
                                                                                <!-- Modal footer -->
                                                                                <input type="hidden" id="redirect_to_image_folder" name="redirect_to_image_icon" value="<?php echo $row->id?>">
                                                                                <input type="hidden" id="redirect_to_image_folder1" name="redirect_to_image_icon2" value="<?php echo  $row->degree_id;?>">
                                                                                <input type="hidden" id="redirect_to_image_folder2" name="redirect_to_image_icon3" value="<?php echo $row->program_id;?>">
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
                                                            <?php $i++; }
                                                        ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>  
                                    <div class="row">
                                        <div class="col">
                                            <div>
                                            <h4 class='alert alert-danger'><center><strong>Applicants can apply for a maximum ten number of programs.</strong></center></h4>
                                            <h4 class='alert alert-info' style="color:black"><center><strong>Applicantion fee for  each programme for GATE candidates/IIT Graduates is Rs. 600/- for UR/EWS/OBC candidates and Rs. 300/- for SC/ST/PWD/Women candidates.</strong></center></h4>
                                            <h4 class='alert alert-info' style="color:black"><center><strong>Application fee for each programme for all Sponsored candidates is Rs. 2000/- per programme </strong></center></h4>
                                                <h4 class='alert alert-danger'><center><strong>Disclaimer :Once you click on "Final Programme selection Submit", you cannot change the programme later. </strong></center></h4>
                                                
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-md-12">
                                            <center>
                                                    <button type="button" class="btn-primary" id="final_submit">Final Programme selection Submit</button>
                                            </center>
                                            

                                        </div>

                                    </div>
                                <?php } ?> 
                            </section>
                          
                        </div> <!-- panel body end  -->
                    </div>  <!-- panel end  -->
                
                    <!--end  -->
                </div><!--home col-md-12 end  -->
            </div><!--home row end  -->
        </div><!--home end  -->
    </div><!--row col-md-8 end  -->
    <div class="col-sm-2"> <!--row col-md-2 start  -->
        <div class="notice"> <!--notice start  -->
            <div class="row">
                <div class="panel panel-primary news_back">
                    <div class="panel-heading">Applicant home
                    </div>
                    <div class="panel-body">
                    <input class="btn btn-info" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/mtech/Adm_mtech_applicant_home'" value="Back Applicant Home" />
                        
                    </div>
                </div>
            </div>
        </div><!--notice end -->
    </div> <!--row col-md-2 end  -->
</div><!--row start  -->
<script type="text/javascript" src="<?php echo base_url();?>themes/dist/js/mtech/adm_mtech_apply.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#p_Work_Experince").hide();
    $("#math_stat").hide();
    $("#math_sat_yes_no").change(function(event){
        var math=$("#math_sat_yes_no").val();
        if(math=='N'){
            alert("Mathematics and statistics as subject is mandatory for Pharmaceutical Science and Engineering");
            $("#prog_elligibilty").val("");
            $("#programme_apply_for").val("");
            $("#math_sat_yes_no").val("");
            
            return false;

        }
       
    })
    $("#Work_Experince_yes_no").change(function(event){
        var exp_work=$("#Work_Experince_yes_no").val();
        if(exp_work=='N'){
            alert("Two years experinced is need for applicant with non-mining degree");
            $("#prog_elligibilty").val("");
            $("#programme_apply_for").val("");
            $("#Work_Experince_yes_no").val("");
            return false;

        }
    })
    $("#gate_sub_code").change(function(event){
        var gate_sub_code=$("#gate_sub_code").val();
        $.ajax({
            url: "<?php echo base_url() ?>index.php/admission/mtech/Adm_mtech_user_dashboard/get_programme_by_gate_papercode",
            type: "POST",
            // dataType:'json',
            data: {"gate_sub_code": gate_sub_code},
            success: function (data)                    
            {  
                var jsondata = $.parseJSON(data);
                // alert(data);
                $('#programme_apply_for').html('');
                $('#programme_apply_for').html('<option value="">--Please select--</option>');
                $.each(jsondata.programme, function (key, value) {
                    $('#programme_apply_for').append($('<option value=" ">--Please select--</option>')
                                    .attr("value", value.program_id)
                                    .text(value.program_desc+"("+value.program_id+")"));
                });
            }
        });
 
    })

    $("#programme_apply_for").change(function(event){
      var programme_apply_for=$("#programme_apply_for").val();
      $.ajax({
            url: "<?php echo base_url() ?>index.php/admission/mtech/Adm_mtech_user_dashboard/get_program_elligibilty",
            type: "POST",
            // dataType:'json',
            data: {"programme_apply_for": programme_apply_for},
            success: function (data)                    
            {  
                var jsondata = $.parseJSON(data);
                // alert(data);
                $('#prog_elligibilty').html('');
                $('#prog_elligibilty').html('<option value="">--Please select--</option>');
                $.each(jsondata.elligibilty, function (key, value) {
                    $('#prog_elligibilty').append($('<option value=" ">--Please select--</option>')
                                    .attr("value", value.degree_code)
                                    .text(value.degree_desc));
                });
            }
        });
    })

    $("#programme_apply_for").change(function(event){
        var programme_apply_for=$("#programme_apply_for").val();
       // alert(programme_apply_for);
        $.ajax({
            url: "<?php echo base_url() ?>index.php/admission/mtech/Adm_mtech_user_dashboard/get_check_sub_math_12th",
            type: "POST",
            // dataType:'json',
            data: {"programme_apply_for": programme_apply_for},
            success: function (data)                    
            {   var jsondata = $.parseJSON(data);
                if(jsondata=='Yes')
                { 
                    // alert(jsondata);
                    $("#math_stat").show();

                   
                }
                else
                {  
                    $("#math_stat").hide();
                    $("#math_sat_yes_no").val(" ");
                  
                }
               
               
            }
        });
    })

    $("#prog_elligibilty").change(function(event){
        var programme_apply_for=$("#programme_apply_for").val();
        var prog_elligibilty=$("#prog_elligibilty").val();
        $.ajax({
            url: "<?php echo base_url() ?>index.php/admission/mtech/Adm_mtech_user_dashboard/check_mining_non_mining",
            type: "POST",
            // dataType:'json',
            data: {"prog_elligibilty": prog_elligibilty,"programme_apply_for": programme_apply_for},
            success: function (data)                    
            {   var jsondata = $.parseJSON(data);
              
                if(jsondata=='Yes')
                { 
                    $("#p_Work_Experince").show(); 
                }
                else
                {  
                  $("#p_Work_Experince").hide();
                  $("#Work_Experince_yes_no").val("");
                  
                }
               
                
            }
        });
    })
   
});
</script>









<!-- <link href="<?php echo base_url();?>themes/dist/css/adm_mba/adm_mba_personal_details.css" rel="stylesheet" media="screen"> -->

<div class="row"> <!--row start  -->
    <div class="col-sm-12 col-md-12 col-lg-12"><!--row col-md-8 start  -->
       <div class="panel panel-primary news_back">            
            <div class="panel-body">
                <section class="signup-step-container">                                      
                    <div class="tab-content" id="main_form">
                        <!-- first tab personal detail start --
                        
                        <!-- fourth tab document upload start -->
                        <div class="tab-pane active" role="tabpanel" id="step4">
                        
                        <input class="btn btn-info" style="width:10%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/admin/dashboard/document_view'" value="Back" />
                            <h4 class="text-center" style="text-decoration: underline;">Preview Edit Document of candidate</h4><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <center>
                                       <table>
                                            <tbody>
                                                    <tr>
                                                        <td>Registration No:</td>
                                                        <td><?php if(!empty($registration_detail)) { echo $registration_detail[0]->registration_no;}?></td>
                                                    
                                                    </tr>
                                                    <tr>
                                                        <td>Name of the Applicant:</td>
                                                        <td><?php if(!empty($registration_detail)) { echo $registration_detail[0]->first_name." ".$registration_detail[0]->middle_name." ".$registration_detail[0]->last_name ;}?></td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td>Email:</td>
                                                        <td><?php if(!empty($registration_detail)) { echo $registration_detail[0]->email;}?></td>
                                                        
                                                    </tr>
                                            </tbody>
                                        </table>
                                     </center>
                                
                                </div>
                            </div>
                            <br>
                            <div class="row">
                            
                                <?php  $attributes = array('class' => 'email', 'id' => 'btn_document','name'=>'p_details','enctype'=>'multipart/form-data');
                                echo form_open('admission/admin/Adm_mba_document/document_submit', $attributes); ?>
                                <div class="col-md-12 col-sm-12 col-lg-12">
                               
                                    <div class="conatinerg">
                                        <div class="frame">
                                            <div class="resp-container">
                                                <p style="color: red"><span style= "color:red;">*<strong>Your documents should be in pdf format and size should be maximum 1 MB</strong></span></p>
                                                
                                    
                                                <iframe  style="width:100%;height: 480px;"  class="resp-iframe" srcdoc="<p> Please click on “Preview” to view the uploaded document</p>" name="iframed" src=" " id="iframed"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                            <label class="control-label">DOB<span style= "color:red;">*(Maximum size 1mb Only pdf)</span></label>
                                            <div class="form-group">
                                                <div class="input-group mb-6">
                                                    <div class="input-group-prepend" id="button-addon3">
                                                        <input id="filedob" name="file_dob" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                        
                                                        <button id="uploadob" class="btn btn-success" type="button">Upload</button>
                                                        <button class="btn btn-danger" id="dobrem" type="button">Remove</button>
                                                        <?php  
                                                        
                                                            if(!empty($upload_document))
                                                            {
                                                            $v=checking($upload_document,'dob');
                                                            }
                                                        
                                                                ?>
                                                        <a id="link1" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="dobpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                    </div>
                                                </div> 
                                                <p style="color: green" id="msg"><?php if(!empty($v)) {echo "You have Uploaded file DOB can be viewed using Preview button";}?></p> 
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                            <label class="control-label">10th certificate<span style= "color:red;">*(Maximum size 1mb Only pdf)</span></label>
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend" id="button-addon3">
                                                        <input id="tenth_doc" name="tenth_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                        <button  id="uploadten" class="btn btn-success" type="button">Upload</button>
                                                        <button class="btn btn-danger" id="removeten" type="button">Remove</button>
                                                        <?php  
                                                        
                                                        if(!empty($upload_document))
                                                        {
                                                            $v=checking($upload_document,'10th');
                                                        }
                                                        
                                                            ?>
                                                        <a id="tenlink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="tenpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                    </div>
                                                </div> 
                                                <p style="color: green" id="msgten"><?php if(!empty($v)) {echo "You have Uploaded file 10th certificate can be viewed using Preview button";}?></p>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                            <label class="control-label">12th certificate<span style= "color:red;">*(Maximum size 1mb Only pdf)</span></label>
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend" id="button-addon3">
                                                        <input id="12th_doc" name="12th_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                        <button  id="upload12" class="btn btn-success" type="button">Upload</button>
                                                        <button class="btn btn-danger" id="remove12" type="button">Remove</button>
                                                        <!-- <button class="btn btn-primary" type="button">Preview</button> -->
                                                        <?php  
                                                        
                                                        if(!empty($upload_document))
                                                        {
                                                            $v=checking($upload_document,'12th');
                                                        }
                                                        
                                                            ?>
                                                        <a id="12link" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="12pri"  class="btn btn-primary" type="button">Preview</button></a>
                                                    </div>
                                                </div> 
                                                <p style="color: green" id="msg12"><?php if(!empty($v)) {echo "You have Uploaded file 12th certificate  can be viewed using Preview button";}?></p>
                                            </div>
                                        </div>

                                        <?php if(!empty($cat_score)){  ?>
                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                            <label class="control-label">Cat Score Card<span style= "color:red;">(Maximum size 1mb Only pdf)</span></label>
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend" id="button-addon3">
                                                        <input id="cat_score_card_docs" name="cat_score_card_docs" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                        <button  id="uploadcats" class="btn btn-success" type="button">Upload</button>
                                                        <button class="btn btn-danger" id="removecats" type="button">Remove</button>
                                                        <?php  
                                                        
                                                        if(!empty($upload_document))
                                                        {
                                                            $v=checking($upload_document,'cat');
                                                        }
                                                        
                                                            ?>
                                                        <a id="catslink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="catspri"  class="btn btn-primary" type="button">Preview</button></a>
                                                    </div>
                                                </div> 
                                                <p style="color: green" id="msgcats"><?php if(!empty($v)) {echo "You have Uploaded file Cat Score Card can be viewed using Preview button";}?></p> 
                                            </div>
                                        </div>
                                        <?php  } ?>

                                        <?php if(!empty($pwd)){ if($pwd=='Y') { ?>
                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                            <label class="control-label">PWD certificate<span style= "color:red;">(Maximum size 1mb Only pdf)</span></label>
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend" id="button-addon3">
                                                        <input id="pwd_certificate_doc" name="pwd_certificate_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                        <button  id="uploadpwd" class="btn btn-success" type="button">Upload</button>
                                                        <button class="btn btn-danger" id="removepwd" type="button">Remove</button>
                                                        <?php  
                                                        
                                                        if(!empty($upload_document))
                                                        {
                                                            $v=checking($upload_document,'pwd');
                                                        }
                                                        
                                                            ?>
                                                        <a id="pwdlink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="pwdpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                    </div>
                                                </div> 
                                                <p style="color: green" id="msgpwd"><?php if(!empty($v)) {echo "You have Uploaded file PWD certificate can be viewed using Preview button";}?></p> 
                                            </div>
                                        </div>
                                        <?php } } ?>
                                        
                                        <?php if(!empty($category)){ if($category=='EWS' OR $category=='OBC' OR $category=='SC' OR $category=='ST') { ?>
                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                            <label class="control-label">OBC(NCL)/SC/ST/EWS Certificate<span style= "color:red;">(Maximum size 1mb Only pdf)</span></label>
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend" id="button-addon3">
                                                        <input id="cat_certificate_doc" name="cat_certificate_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                        <button  id="uploadcat" class="btn btn-success" type="button">Upload</button>
                                                        <button class="btn btn-danger" id="removecat" type="button">Remove</button>
                                                        <?php  
                                                        
                                                        if(!empty($upload_document))
                                                        {
                                                            $v=checking($upload_document,'caste');
                                                        }
                                                        
                                                            ?>
                                                        <a id="catlink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="catpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                    </div>
                                                </div> 
                                                <p style="color: green" id="msgcat"><?php if(!empty($v)) {echo "You have Uploaded file Category certificate can be viewed using Preview button";}?></p> 
                                            </div>
                                        </div>
                                        <?php } } ?>

                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                            <label class="control-label">UG Marksheet<span style= "color:red;">(Maximum size 1mb Only pdf)</span></label>
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend" id="button-addon3">
                                                        <input id="ug_mark_sheet" value="dsfsdf" name="ug_mark_sheet" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                        <button  id="uploadug" class="btn btn-success" type="button">Upload</button>
                                                        <button class="btn btn-danger" id="removeug" type="button">Remove</button>
                                                        <!-- <button class="btn btn-primary" type="button">Preview</button> -->
                                                        <?php  
                                                            function checking($upload_document,$flag)
                                                            {
                                                            $m=''; 
                                                            foreach ($upload_document as $value) {
                                                                    $to = $value['doc_id'];
                                                                    if($to==$flag)
                                                                    {
                                                                    $m=base_url().$value['doc_path'];
                                                                    
                                                                    }
                                                                    
                                                                }
                                                                return $m;
                                                            }
                                                            if(!empty($upload_document))
                                                            {
                                                            $v=checking($upload_document,'ugm');
                                                            }
                                                        
                                                                ?>
                                                        <a id="uglink" href="<?php if(!empty($v)) {echo $v;}?>" <?php if(!empty($v)) {echo 'target="iframed"';} else {echo '"#"';}?>><button id="ugpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                    </div>
                                                </div> 
                                                <p style="color: green" id="msgug"><?php if(!empty($v)) {echo "You have Uploaded file UG Marksheet can be viewed using Preview button";}?></p>
                                            </div>
                                        </div>

                                        <?php if(!empty($pg_data)){ ?>
                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                            <label class="control-label">PG Marksheet<span style= "color:red;">(Maximum size 1mb Only pdf)</span></label>
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend" id="button-addon3">
                                                        <input id="pg_marksheet_doc" name="pg_marksheet_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                        <button  id="uploadpg" class="btn btn-success" type="button">Upload</button>
                                                        <button class="btn btn-danger" id="removepg" type="button">Remove</button>
                                                        <?php  
                                
                                                            if(!empty($upload_document))
                                                            {
                                                            $v=checking($upload_document,'pgm');
                                                            }
                                                        
                                                            ?>
                                                        <a id="pglink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?>><button id="pgpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                    </div>
                                                </div> 
                                                <p style="color: green" id="msgpg"><?php if(!empty($v)) {echo "You have Uploaded file PG Marksheet can be viewed using Preview button";}?></p>   
                                            </div>
                                        </div>
                                        <?php  } ?>

                                        <?php if(!empty($work_experince)){ if($work_experince=='Yes') { ?>
                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                            <label class="control-label">Work Experience<span style= "color:red;">(Maximum size 1mb Only pdf)</span></label>
                                            <p style="color: red"><span style= "color:red;">*<strong>Load single experience file for multiple experiences with maximum size 1 MB.</strong></span></p>
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend" id="button-addon3">
                                                        <input id="work_experience_doc" name="work_experience_doc" type="file" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                                        <button  id="uploadwor" class="btn btn-success" type="button">Upload</button>
                                                        <button class="btn btn-danger" id="removewor" type="button">Remove</button>
                                                        <?php  
                                                            if(!empty($upload_document))
                                                            {
                                                            $v=checking($upload_document,'work');
                                                            }
                                                            ?>
                                                        <a id="worlink" href="<?php if(!empty($v)) {echo $v;}  else {echo '#';}?>" <?php if(!empty($v)) {echo 'target="iframed"';}?><button id="workpri"  class="btn btn-primary" type="button">Preview</button></a>
                                                    </div>
                                                </div> 
                                                <p style="color: green" id="msgwork"><?php if(!empty($v)) {echo "You have Uploaded file Work Experience can be viewed using Preview button";}?></p>
                                            </div>
                                        </div>
                                        <?php } } ?>

                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <?php  
                                                    if(!empty($upload_document))
                                                    {
                                                    $v=checking($upload_document,'photo');
                                                    }
                                                    ?>   
                                                    <label class="control-label">Photo<span style= "color:red;">*(Maximum 50kb) (Only png or jpeg)</span></label>
                                                    <div class="form-group">
                                                        
                                                                <input accept="image/x-png,image/gif,image/jpeg"  type="file" name="photo" id="photo" placeholder="choose file" class="form-control">
                                                                <p style="color: green" id="msgph"><?php if(!empty($v)) {echo "Image was Uploaded";}?></p>
                                                                <button  id="uploadph" class="btn btn-success" type="button">Upload <button id="removeph" class="btn btn-danger" type="button">Remove</button></button>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    
                                                    <img src="<?Php if(!empty($v)) { echo $v; } else { echo base_url().'assets/images/photo.png';} ?>" id="p" style='width:159px;height:181px;'>
                                    
                                                    
                                            </div>
                                                
                                                </div>

                                            </div>
                            
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <?php  
                                                    if(!empty($upload_document))
                                                    {
                                                        $v=checking($upload_document,'signature');
                                                    }
                                                    ?>   
                                                    <label class="control-label">Signature<span style= "color:red;">*(Maximum 50kb) (Only png or jpeg) </span></label>
                                                    <div class="form-group">                                  
                                                            <input accept="image/x-png,image/gif,image/jpeg"  type="file" name="signature" id="signature" class="form-control">
                                                            <p style="color: green" id="msgsg"><?php if(!empty($v)) {echo "Image was Uploaded";}?></p>
                                                            <button  id="uploadsg" class="btn btn-success" type="button">Upload <button  id="removesg" class="btn btn-danger" type="button">Remove</button></button>
                                                            <!-- <button  id="uploadpg" class="btn btn-success" type="button">Upload</button> -->
                                                
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                        <div class="form-group"> 
                                                        <img src="<?Php if(!empty($v)) {echo $v;} else {  echo base_url().'assets/images/photo.png';} ?>" id="q" style='width:158px;;height:70px;'>
                                                        </div>
                                                    
                                                </div>

                                            </div>
                            
                                        </div>
                                    </div>                                                                   
                                </div>
                                
                               
                                
                                    
                                
                                
                                <!-- <div class="col-md-12 col-sm-12 col-lg-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="checkbox-inline"><input type="checkbox"  id="formcheck" value="">Declaration:</label>
                                        </div>
                                        

                                    </div>
                                    <div class="row">
                                        <div class="col-md-11 col-md-offset-1">
                                        <p>I hereby declare that I have read and understood the conditions of eligibilty for 2 Years MBA / MBA in Business Analytics admission 2022.I fulfill the minimum eligibility criteria and I have provided the necessary information in this regard. In the event of the information being found incorrect or misleading, my candidature shall be liable to cancellation at any time. Further, I have carefully read all the instructions and I accept them and shall not raise any dispute in future over the same.</p>
                                        <p>I ,hereby, give my consent to make some or all my data in IITISM website and various other portals of IITISM as and when required by IITISM</p>
                                        </div>
                                        <input type="hidden" name="doc_t" id='doc_t' value="<?php echo $total_document; ?>">
                                    </div>
                                </div> -->
                            </div>
                            <!-- <ul class="list-inline pull-right">
                                <li><button type="submit" class="default-btn next-step">Submit</button></li>
                                
                            </ul> -->
                            </form>
                        </div>
                        <!-- fourth tab document upload end -->
                        <!-- fifth tab Payment start -->
                        <div class="tab-pane" role="tabpanel">
                            
                        </div>
                        <!-- fifth tab Payment end-->
                        <div class="clearfix"></div>
                    </div>
                            
                </section>          
            </div> <!-- panel body end  -->

        </div>  <!-- panel end  -->    

    </div><!-- col-md-12  end  -->
</div><!--row start  -->
<!-- <script type="text/javascript" src="<?php echo base_url();?>themes/dist/js/adm_mba/adm_mba_education.js"></script> -->
<script type="text/javascript">
//  $("#btechyes").hide();
//  $("#hide_yes_no_gate").hide();
$(document).ready(function (e)
   { 
       var k='';
       // ele.prop('checked', false);
       $('#formcheck').click(function()
            {
                var val="";
                var base_url =window.location.origin;
                var count=$('#doc_t').val();
                $.ajax({
                url: base_url+'/index.php/admission/admin/Adm_mba_document/validate_photo_signature_doc',
                type: "POST",
                // dataType:'json',
                data: {"total":count},
                success: function (data)                    
                {    
                  
                  var jsondata =$.parseJSON(data);
                //   console.log(jsondata);
                  if(jsondata.photo=='not')
                  {   
                      alert("please upload photo");
                      $('#formcheck').prop('checked', false);
                      return false
                  }
                  if(jsondata.signature=='not')
                  {    alert("please upload signature");
                      $('#formcheck').prop('checked', false);
                      return false
                  }
                  k=jsondata.total;
                    
                },
                error: function (response){
                    console.log(response);
                    var jsondata =$.parseJSON(data);
                    console.log(response);
                    console.log(jsondata);
                    
                }
                
            });
       })

    $('#btn_document').submit(function(e){
        var count=$('#doc_t').val();
       
       if($('#formcheck').is(":checked"))
        {    
              
                // alert(k);
                // alert(count);
              //    var doctot=exp+pwd+ex_ser+edu+cas+dob;
               if(count!=k)
               { 
                 alert("All the documents are not uploaded!");
                 $('#formcheck').prop('checked', false);
                 return false;
               }
               else
               {
                  var r = confirm("Once you press “submit” button, documents uploaded by you cannot be changed later. Do you want to continue?");
                   if (r == true) 
                   { 
                     return true;
                   }
                   else
                   {
                     return false;
                   }
               }
        }   
        else
        {
           alert("Click check box to proceed!!!!!!");
            return false;
        }
    });
    //   ugcertificate start here
        $('#uploadug').on('click', function ()
        {   
            var filename='ug_mark_sheet';
            var link='uglink';
            var msg='msgug';
            var upload_button_id='uploadug';
            doc_upload(filename,link,msg,upload_button_id);
            // alert("helll");

        });
        $('#removeug').on('click', function ()
        {  
            var filename='ug_mark_sheet';
            var link='uglink';
            var msg='msgug';
            var upload_button_id='uploadug';
            doc_remove(filename,link,msg,upload_button_id);
           
        });
        $('#ugpri').on('click', function ()
        {   
            var filename='ug_mark_sheet';
            var link='uglink';
            var msg='msgug';
            var upload_button_id='uploadug';
            doc_preview(filename,link,msg,upload_button_id);
           
        });
        //   ugcertificate end here 
        $('#uploadob').on('click', function ()
        {   
            var filename='filedob';
            var link='link1';
            var msg='msg';
            var upload_button_id='uploadob';
            doc_upload(filename,link,msg,upload_button_id);
            // alert("helll");

        });
        $('#dobrem').on('click', function ()
        {  
            var filename='filedob';
            var link='link1';
            var msg='msg';
            var upload_button_id='uploadob';
            doc_remove(filename,link,msg,upload_button_id);
           
        });
        $('#dobpri').on('click', function ()
        {   
            var filename='filedob';
            var link='link1';
            var msg='msg';
            var upload_button_id='uploadob';
            doc_preview(filename,link,msg,upload_button_id);
           
        });
         //   ugcertificate end here 
         $('#uploadten').on('click', function ()
        {   
            var filename='tenth_doc';
            var link='tenlink';
            var msg='msgten';
            var upload_button_id='uploadten';
            doc_upload(filename,link,msg,upload_button_id);
            // alert("helll");

        });
        $('#removeten').on('click', function ()
        {  
            var filename='tenth_doc';
            var link='tenlink';
            var msg='msgten';
            var upload_button_id='uploadten';
            doc_remove(filename,link,msg,upload_button_id);
           
        });
        $('#tenpri').on('click', function ()
        {   
            var filename='tenth_doc';
            var link='tenlink';
            var msg='msgten';
            var upload_button_id='uploadten';
            doc_preview(filename,link,msg,upload_button_id);
           
        });

        // 12 document start here

            $('#upload12').on('click', function ()
            {   
                var filename='12th_doc';
                var link='12link';
                var msg='msg12';
                var upload_button_id='upload12';
                doc_upload(filename,link,msg,upload_button_id);
                // alert("helll");

            });
            $('#remove12').on('click', function ()
            {  
                var filename='12th_doc';
                var link='12link';
                var msg='msg12';
                var upload_button_id='upload12';
                doc_remove(filename,link,msg,upload_button_id);
            
            });
            $('#12pri').on('click', function ()
            {   
                var filename='12th_doc';
                var link='12link';
                var msg='msg12';
                var upload_button_id='upload12';
                doc_preview(filename,link,msg,upload_button_id);
            
            });

           // 12 document end her

         //   ugcertificate end here 
        $('#uploadcats').on('click', function ()
        {   
            var filename='cat_score_card_docs';
            var link='catslink';
            var msg='msgcats';
            var upload_button_id='uploadcats';
            doc_upload(filename,link,msg,upload_button_id);
            // alert("helll");

        });
        $('#removecats').on('click', function ()
        {  
            var filename='cat_score_card_docs';
            var link='catslink';
            var msg='msgcats';
            var upload_button_id='uploadcats';
            doc_remove(filename,link,msg,upload_button_id);
           
        });
        $('#catspri').on('click', function ()
        {   
            var filename='cat_score_card_docs';
            var link='catslink';
            var msg='msgcats';
            var upload_button_id='uploadcats';
            doc_preview(filename,link,msg,upload_button_id);
           
        });
       //   pwd_certificate_doc start here 
       $('#uploadpwd').on('click', function ()
        {   
            var filename='pwd_certificate_doc';
            var link='pwdlink';
            var msg='msgpwd';
            var upload_button_id='uploadpwd';
            doc_upload(filename,link,msg,upload_button_id);
            // alert("helll");

        });
        $('#removepwd').on('click', function ()
        {  
            var filename='pwd_certificate_doc';
            var link='pwdlink';
            var msg='msgpwd';
            var upload_button_id='uploadpwd';
            doc_remove(filename,link,msg,upload_button_id);
           
        });
        $('#pwdpri').on('click', function ()
        {   
            var filename='pwd_certificate_doc';
            var link='pwdlink';
            var msg='msgpwd';
            var upload_button_id='uploadpwd';
            doc_preview(filename,link,msg,upload_button_id);
           
        });

        // cat_certificate_doc start here 
        $('#uploadcat').on('click', function ()
        {   
            var filename='cat_certificate_doc';
            var link='catlink';
            var msg='msgcat';
            var upload_button_id='uploadcat';
            doc_upload(filename,link,msg,upload_button_id);
            // alert("helll");

        });
        $('#removecat').on('click', function ()
        {  
            var filename='cat_certificate_doc';
            var link='catlink';
            var msg='msgcat';
            var upload_button_id='uploadcat';
            doc_remove(filename,link,msg,upload_button_id);
           
        });
        $('#catpri').on('click', function ()
        {   
            var filename='cat_certificate_doc';
            var link='catlink';
            var msg='msgcat';
            var upload_button_id='uploadcat';
            doc_preview(filename,link,msg,upload_button_id);
           
        });

        // pg_marksheet_doc start here 
        $('#uploadpg').on('click', function ()
        {   
            var filename='pg_marksheet_doc';
            var link='pglink';
            var msg='msgpg';
            var upload_button_id='uploadpg';
            doc_upload(filename,link,msg,upload_button_id);
            // alert("helll");

        });
        $('#removepg').on('click', function ()
        {  
            var filename='pg_marksheet_doc';
            var link='pglink';
            var msg='msgpg';
            var upload_button_id='uploadpg';
            doc_remove(filename,link,msg,upload_button_id);
           
        });
        $('#pgpri').on('click', function ()
        {   
            var filename='pg_marksheet_doc';
            var link='pglink';
            var msg='msgpg';
            var upload_button_id='uploadpg';
            doc_preview(filename,link,msg,upload_button_id);
           
        });
        // work_experience_doc start here 
        $('#uploadwor').on('click', function ()
        {   
            var filename='work_experience_doc';
            var link='worlink';
            var msg='msgwork';
            var upload_button_id='uploadwor';
            doc_upload(filename,link,msg,upload_button_id);
            // alert("helll");

        });
        $('#removewor').on('click', function ()
        {  
            var filename='work_experience_doc';
            var link='worlink';
            var msg='msgwork';
            var upload_button_id='uploadwor';
            doc_remove(filename,link,msg,upload_button_id);
           
        });
        $('#worpri').on('click', function ()
        {   
            var filename='work_experience_doc';
            var link='worlink';
            var msg='msgwork';
            var upload_button_id='uploadwor';
            doc_preview(filename,link,msg,upload_button_id);
           
        });

        // photo signature upload

        $('#uploadph').on('click', function ()
        {  
            var filename='photo';
            var link='phlink';
            var msg='msgphp';
            var upload_button_id='uploadph';
            upload_photo_signature(filename,link,msg,upload_button_id);
            // alert("helll");

        });
        $('#removeph').on('click', function ()
        {  
            var filename='photo';
            var link='phlink';
            var msg='msgph';
            var upload_button_id='uploadph';
            remove_photo_signature(filename,link,msg,upload_button_id);
           
        });
        $('#uploadsg').on('click', function ()
        {   
            var filename='signature';
            var link='sglink';
            var msg='msgsg';
            var upload_button_id='uploadsg';
            upload_photo_signature(filename,link,msg,upload_button_id);
            // alert("helll");

        });
        $('#removesg').on('click', function ()
        {  
            var filename='signature';
            var link='sglink';
            var msg='msgsg';
            var upload_button_id='uploadsg';
            remove_photo_signature(filename,link,msg,upload_button_id);
           
        });
    });


function doc_upload(filenameid,link,msg,button_id)
{  
    var filenameid=filenameid;
    var base_url =window.location.origin;
    // console.log(base_url);
    // alert(filenameid+link+msg);
    // return false;
    var filesselect=document.getElementById(filenameid).files.length;
        if(filesselect==0){
        alert("You have not selected file");
        return false;
    }
    var file_data = $('#'+filenameid).prop('files')[0]; 
    var match       = ["application/pdf"]; 
    var fileSize    = file_data.size; 
    var maxSize     = 2*1024*1024;
    var fileType    = file_data.type;

    if(!((fileType==match[0]) || (fileType==match[1])))
    {
        alert("File type should be in pdf format");
        document.getElementById(filenameid).value='';
        document.getElementById(link).href='';
        return false;
    }
    if(fileSize > maxSize)
    {
        alert("File size should be maximum 1 MB");
        document.getElementById(filenameid).value='';
        document.getElementById(link).href='';
        return false;
    } 
    var valchek=filenameid;
    // console.log(file_data);
    var form_data = new FormData();
    form_data.append(filenameid, file_data);
    $.ajax({
        url: base_url+'/index.php/admission/admin/Adm_mba_document/document_upload/'+valchek, // point to server-side controller method
        dataType: 'json', // what to expect back from the server
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function (response){
        console.log(response);
       
       
            // alert(response['two']);
            // alert(response['link']);
            // alert(response['doc_msg']);
            // $('#link1').prop('href',response['link']);
            // $('#iframed').prop('src',response['link']);
            if(response['doc_msg']=='doc_ok')
            {
                dob=1;
                alert(response['msg']);
                $('#'+msg).html(response['msg']);
                $("#"+button_id).css("background-color", "green");
                $('#'+link).attr('href',response['link']);
                $('#'+link).attr('target','iframed'); // display success response from the server
            }
            else
            {
                alert("something went worng in uploading file..!");
            }
            
        },
        error: function (response){
            // console.log(response);
            // alert("helosdfsadf");
            $('#'+msg).html(response); // display error response from the server
        }
    });
}

function doc_remove(filenameid,link,msg,button_id)
{ 
   $filename_id=filenameid;
//    alert(filenameid)
   var base_url =window.location.origin;
   var hrefval=$('#'+link).attr('href');
   if(hrefval==='#')
   {
     var filesselect=document.getElementById(filenameid).files.length;
        if(filesselect==0){
        alert("You have not selected file");
        return false;

        }
        return false;
   }
    

    $('#loader').show();
    var file_data = $('#'+filenameid).prop('files')[0];
    var form_data = new FormData();
    form_data.append(filenameid, file_data);
    $.ajax({
        url: base_url+'/index.php/admission/admin/Adm_mba_document/document_remove/'+filenameid, // point to server-side controller method
        dataType: 'json', // what to expect back from the server
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function (response){
           
            dob=0;
            //console.log("success"+response);
            alert(response['msg']);
            $('.progress').hide();
            $('#'+msg).html(response['msg']);
            $("#"+filenameid).removeAttr("style");
            document.getElementById(filenameid).value='';
            document.getElementById(link).href='';
            document.getElementById(link).target='';
            //document.getElementById("iframed").innerHtml='';
            //$('#iframed').attr('src', '');
            var iframe = document.getElementById("iframed");
            var html = "";
            iframe.contentWindow.document.open();
            iframe.contentWindow.document.write(html);
            iframe.contentWindow.document.close();
            // display success response from the server
        },
        error: function (response){
        // console.log(response);
        // alert("error"+response);
        $('#'+msg).html(response); // display error response from the server
        }
    });
}

function upload_photo_signature(filenameid,link,msg,button_id)
{
    
    var filenameid=filenameid;
    // alert(filenameid);
    var base_url =window.location.origin;
    var filesselect=document.getElementById(filenameid).files.length;
        if(filesselect==0){
        alert("You have not selected file");
        return false;
    }
    var file_data = $('#'+filenameid).prop('files')[0]; 
    var fileSize    = file_data.size; 
    var maxSize     = 1*50000;
    var fileType    = file_data.type;
    if(fileSize > maxSize)
    {
        alert('The file size must be less than 50KB');
        document.getElementById(filenameid).value='';
        // document.getElementById(link).href='';
        return false;
    } 
    var ext=file_data.name.substring(file_data.name.lastIndexOf('.') + 1);
    if(ext == "png" || ext == "jpg" || ext == "jpeg" || ext == "JPEG" || ext == "PNG" || ext == "JPG")
    {
           
    }
    else
    {
        alert('The image should be in  png, jpg or jpeg format.');
        document.getElementById(filenameid).src='';
        document.getElementById(filenameid).value='';
        filenameid.name='';
        return false;
    }
         
    var valchek=filenameid;
    var form_data = new FormData();
    form_data.append(filenameid, file_data);
    $.ajax({
        url: base_url+'/index.php/admission/admin/Adm_mba_document/document_upload/'+valchek, // point to server-side controller method
        dataType: 'json', // what to expect back from the server
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function (response){
        console.log(response);
            
            if(response['doc_msg']=='doc_ok')
            {
                dob=1;
                var no_image=base_url+'assets/images/photo.png';
               // alert(response['msg']);
                // $('#'+msg).html(response['msg']);
                $("#"+button_id).css("background-color", "green");
                if(response['file_name']=='photo')
                {
                    $('#p').attr('src',response['link']);
                }
                if (response['file_name']=='signature')
                {
                    $('#q').attr('src',response['link']);
                }
                // $('#p').attr('src',response['link']);
                // $('#'+link).attr('target','iframed'); // display success response from the server
            }
            else
            {
                alert("something went worng in uploading file..!");
            }
            
        },
        error: function (response){
            // console.log(response);
            // alert("helosdfsadf");
            $('#'+msg).html(response); // display error response from the server
        }
    });
}

function remove_photo_signature(filenameid,link,msg,button_id)
{ 
    alert(filenameid);
    filename_id=filenameid;
    var img_src_old='';
    var base_url =window.location.origin;
    var old_src=base_url+'/assets/images/photo.png';
    
    if(filenameid =='photo')
    {
        img_src_old=$('#p').attr('src');
    }
    if (filenameid=='signature')
    {
        img_src_old=$('#q').attr('src');
    }
    if(img_src_old==old_src)
    { 
        var filesselect=document.getElementById(filenameid).files.length;
        if(filesselect==0){
        alert("You have not selected file");
        return false;

        }
        return false;
    }
    $('#loader').show();
    var file_data = $('#'+filenameid).prop('files')[0];
    var form_data = new FormData();
    form_data.append(filenameid, file_data);
    $.ajax({
        url: base_url+'/index.php/admission/admin/Adm_mba_document/document_remove/'+filenameid, // point to server-side controller method
        dataType: 'json', // what to expect back from the server
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function (response){
            dob=0;
            console.log("success"+response);
            alert(response['msg']);
            var no_image=base_url+'/assets/images/photo.png';             
            if(response['file_name']=='photo')
            {    
                $('#formcheck').prop('checked', false);         
                $('#'+msg).html(response['msg']);
                 document.getElementById(filenameid).value='';
                $('#p').attr('src',no_image);
            }
            if (response['file_name']=='signature')
            {  
                $('#formcheck').prop('checked', false);
                $('#'+msg).html(response['msg']);
                document.getElementById(filenameid).value='';
                $('#q').attr('src',no_image);
            }
            // $('.progress').hide();
            // $('#'+msg).html(response['msg']);
            // $("#"+filenameid).removeAttr("style");
            // document.getElementById(filenameid).value='';
           
        },
        error: function (response){
           
        alert("error"+response);
        $('#'+msg).html(response); // display error response from the server
        }
    });
}


function doc_preview(filenameid,link,msg,button_id)
{   
   var hrefval=$('#'+link).attr('href');
   if(hrefval==='#')
   {
        var filesselect=document.getElementById(filenameid).files.length;
        if(filesselect==0){
        alert("You have not selected file");
        return false;

        }
        return false;
   }
    
    var poo= $('#'+link).attr("href");
    // alert(poo);
    if(poo==='')
    {
        alert("pdf not upload yet");
        return false;
        var iframe = document.getElementById("iframed");
        var html = "";

        iframe.contentWindow.document.open();
        iframe.contentWindow.document.write(html);
        iframe.contentWindow.document.close();
    }
    else
    {
        var iframe = document.getElementById("iframed");
        var html = "";

        iframe.contentWindow.document.open();
        iframe.contentWindow.document.write(html);
        iframe.contentWindow.document.close();
    }
}

</script>

 








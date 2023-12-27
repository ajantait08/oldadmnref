<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin-theme/css/table.css">
<style>
    table.mba-list td,
    table.mba-list th {
        padding: 10px 2px;
    }
</style>
<div>
    <?php
    $this->load->view('admission/admin/layout/flashmessages');
    ?>
</div>
<div class="row">
    <div class="col-lg-12">
        <?php 
    $attributes = array('class' => 'formd', 'id' => 'p_details','name'=>'p_details','enctype'=>'multipart/form-data');
    echo form_open('admission/admin/Adm_mba_document/document_view_of_candidate', $attributes); ?>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Search Document of candidate</h4>
            
                <form class="forms-sample">
                    <div class="form-group">
                        <label for="inputPassword4">Registration Number</label>
                       
                        <select class="form-control col-lg-4" id="reg_number" name="reg_number" >
                            <option value="">Please select</option>
                            <?php if(!empty($applications)) foreach ($applications as $svalues){?>
                            <option value="<?php echo  $svalues->registration_no;?>" required>
                            <?php echo $svalues->registration_no ;?></option>
                            <?php } else {?>
                            <option value="" required>No data found </option>
                            <?php }?>
                       </select>
                    </div>
    
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" id="check_registartion_number" name="submit" value="submit">
                    </div>
                </form>
                <hr>
               
               
            </div>
        </div>
</form>
    </div>
</div>

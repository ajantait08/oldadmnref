<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin-theme/css/table.css">

<style>
    table.mba-list td,
    table.mba-list th {
        padding: 10px 2px;
    }
</style>
<div>
    <?php
    $this->load->view('admission/phd/admin/layout/flashmessages');
    ?>
</div>
<div class="row">
    <div class="col-md-6">
        <?php
    $attributes = array('class' => 'formd', 'id' => 'p_details','name'=>'p_details','enctype'=>'multipart/form-data');
    echo form_open('admission/phd/admin/Documents_download/candidate_list_zip_download', $attributes); ?>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Search Program to download consolidated Zip</h4>

                <form class="forms-sample">
                    <div class="form-group">
                        <label for="inputPassword4">Program Name</label>

                        <select class="form-control col-md-12 js-example-basic-single" id="program_id" name="program_id" required>
                            <option value="">Please select</option>
                            <?php if(!empty($program_details)) foreach ($program_details as $svalues){?>
                            <option value="<?php echo  $svalues->program_id;?>" required>
                            <?php echo $svalues->program_desc ;?></option>
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
<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});

</script>

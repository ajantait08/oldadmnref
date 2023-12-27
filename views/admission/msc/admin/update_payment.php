<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin-theme/css/table.css">
<style>
    table.mba-list td,
    table.mba-list th {
        padding: 10px 2px;
    }
</style> -->
<div>
    <?php
    $this->load->view('admission/admin/layout/flashmessages');
    ?>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">New Admission - Update Payment Detail</h4>
                <p class="card-description"> Select Registration Number to proceed further</p>
                <form class="forms-sample">
                    <div class="form-group col-md-4">
                        <label for="name">Registration Number</label>
                        <select name="registration_number" id="registration_number" class="form-control" onchange="check_transaction()">
                            <option value="" disabled selected>--Select Registration Number--</option>
                            <?php foreach ($appl_data as $ppl) { ?>
                                <option value="<?php echo $ppl->registration_no; ?>"><?php echo $ppl->registration_no ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </form>
                <br>
                <div id="ajax_dynamic_div" style="overflow: scroll;"></div>
                <br>
            </div>
        </div>
    </div>
</div>


<script>
    $('#ajax_dynamic_div').css('display', 'none');

    function check_transaction() {
        var reg_number = $('#registration_number').val();
        $.ajax({
            url: '<?php echo site_url('admission/admin/dashboard/check_payment_status') ?>',
            type: "POST",
            data: {
                "reg_number": reg_number
            },
            success: function(data) {
                $('#ajax_dynamic_div').css('display', 'block');
                $('#ajax_dynamic_div').html(data);
            }
        });
    }

    // $(document).bind("contextmenu", function(e) {
    //     return false;
    // });
</script>
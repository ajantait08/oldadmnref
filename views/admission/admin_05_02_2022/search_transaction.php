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
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">New Admission Transaction Details</h4>
                <p class="card-description"> Enter the Registration Number or Email-ID below to proceed further </p>
                <form class="forms-sample">
                    <div class="form-group">
                        <label for="inputPassword4">Registration Number</label>
                        <input type="text" class="form-control col-lg-4" id="reg_number" name="reg_number" placeholder="Enter Registartion Number" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword4">Email ID</label>
                        <input type="text" class="form-control col-lg-4" id="email_id" name="email_id" placeholder="Enter Email Id" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="button" class="btn btn-primary" id="check_registartion_number" name="submit" value="Search">
                    </div>
                </form>
                <hr>
                <div id="ajax_dynamic_div" style="overflow: scroll;"></div>
                <br>
            </div>
        </div>
    </div>
</div>


<script>
    $('#ajax_dynamic_div').css('display', 'none');
    $('#check_registartion_number').click(function(event) {
        var reg_number = $('#reg_number').val();
        var email_id = $('#email_id').val();
        if (reg_number == '' && email_id == '') {
            alert('Enter either Registration Number or EmailID');
            event.preventDefault();
        } else {
            $.ajax({
                url: '<?php echo site_url('admission/admin/dashboard/enquire_by_registartion_no') ?>',
                type: "POST",
                data: {
                    "reg_number": reg_number,
                    "email_id": email_id
                },
                success: function(data) {
                    $('#ajax_dynamic_div').css('display', 'block');
                    $('#ajax_dynamic_div').html(data);
                }
            });
        }
    });

    // $(document).bind("contextmenu", function(e) {
    //     return false;
    // });
</script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin-theme/css/table.css">
<style>
    table.mba-list td,
    table.mba-list th {
        padding: 5px 2px;
    }
</style>
<script src="<?php echo base_url(); ?>themes/plugins/jszip/jszip.min.js"></script>
<div>
    <?php
    $this->load->view('admission/admin/layout/flashmessages');
    ?>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">MBA New Admission Candidates Filter</h4>
                <form id="reportsubmit" action="<?php echo base_url() ?>index.php/admission/admin/dashboard/cfi_iit_filtered" control="" class="form-inline" method="POST">
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Programme</label>
                            <div class="col-sm-9">
                                <select id="searchBy_programme" name="searchBy_programme" class="form-control">
                                    <option value=''> --All Programme--</option>
                                    <option value='mba'>MBA Programme</option>
                                    <option value='ba'>MBA in Business Analytics Programme</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                                <select id="searchBy_category" name="searchBy_category" class="form-control">
                                    <option value=''>Open Category</option>
                                    <option value='General'>General</option>
                                    <option value='OBC'>OBC</option>
                                    <option value='EWS'>EWS</option>
                                    <option value='SC'>SC</option>
                                    <option value='ST'>ST</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button id="btn-filter" type="submit" class="btn btn-md btn-outline-dark btn-icon-text">Filter</button>
                </form>
                <hr>
                <br />
                <div id="buttons"></div>
                <div class="demo-html" style="overflow: scroll;">
                    <table id="mba_list" class="mba-list table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Registration No.</th>
                                <th>Application No.</th>
                                <th>Program</th>
                                <th>Category</th>
                                <th>PWD</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile No.</th>
                                <th>D.O.B</th>
                                <th>Gender</th>
                                <th>B.Tech from IIT</th>
                                <th>10th Score</th>
                                <th>10th Marks Type</th>
                                <th>12th Score</th>
                                <th>12th Marks Type</th>
                                <th>UG Exam Name</th>
                                <th>UG Institute Name</th>
                                <th>UG Exam Score</th>
                                <th>UG Marks Type</th>
                                <th>UG Result Status</th>
                                <th>Industrial Experience </th>
                                <th>Total Experience</th>
                                <th>Call For Interview Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            if (!empty($appl_data)) {
                                foreach ($appl_data as $appl) {
                            ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td>
                                            <?php if (!empty($appl->registration_no)) {
                                                echo $appl->registration_no;
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($appl->application_no)) {
                                                echo $appl->application_no;
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($appl->program_id)) {
                                                echo strtoupper($appl->program_id);
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($appl->category)) {
                                                echo $appl->category;
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($appl->pwd)) {
                                                echo ($appl->pwd == 'Y') ? "Yes" : "No";
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($appl->first_name)) {
                                                echo $appl->first_name . " " . $appl->middle_name . " " . $appl->last_name;
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($appl->email)) {
                                                echo $appl->email;
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($appl->mobile)) {
                                                echo $appl->mobile;
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($appl->dob)) {
                                                echo date("d-m-Y", strtotime($appl->dob));
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($appl->gender)) {
                                                echo $appl->gender;
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($appl->betch_iit)) {
                                                echo $appl->betch_iit;
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($appl->tenth)) {
                                                echo $appl->tenth[0]->mark_cgpa_percenatge;
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($appl->tenth)) {
                                                echo $appl->tenth[0]->marks_perc_type;
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($appl->twelfth)) {
                                                echo $appl->twelfth[0]->mark_cgpa_percenatge;
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($appl->twelfth)) {
                                                echo $appl->twelfth[0]->marks_perc_type;
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($appl->ug)) {
                                                echo $appl->ug[0]->exam_name;
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($appl->ug)) {
                                                echo $appl->ug[0]->institue_name;
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($appl->ug)) {
                                                echo $appl->ug[0]->mark_cgpa_percenatge;
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($appl->ug)) {
                                                echo $appl->ug[0]->marks_perc_type;
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($appl->ug)) {
                                                echo $appl->ug[0]->result_status;
                                            } ?>
                                        </td>
                                        <?php if (!empty($appl->experience)) {
                                            $totalexp = 0; ?>
                                            <td>
                                                <ol type="1">
                                                    <?php foreach ($appl->experience as  $wrk) { ?>
                                                        <li>
                                                            <?php echo $wrk->designation_organistion . " - " . $wrk->duration_in_month . " Months"; ?>
                                                        </li>
                                                    <?php $totalexp = $totalexp + $wrk->duration_in_month;
                                                    } ?>
                                                </ol>
                                            </td>
                                            <td><?php echo $totalexp . " Months"; ?></td>
                                        <?php } else { ?>
                                            <td> N/A </td>
                                            <td> N/A </td>
                                        <?php } ?>
                                        <td>
                                            <?php if (!empty($appl->call_int_status)) { ?>
                                                <?php if ($appl->call_int_status == '1') { ?>
                                                    <label class="badge badge-success">Called for Interview</label>
                                            <?php }
                                            } ?>
                                        </td>
                                    </tr>
                                <?php $i++;
                                } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="24" style="text-align: center;color:red;"><strong>No Data Avaliable</strong></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('#mba_list').DataTable({
            "lengthMenu": [
                [10, 25, 50, 100, 500, -1],
                ['10 rows', '25 rows', '50 rows', '100 rows', '500 rows', 'Show all']
            ],
            "ordering": false,
            "columnDefs": [{
                "targets": [7, 8, 9, 10, 11, 13, 15, 16, 17, 19, 20, 21],
                "visible": false,
                "searchable": false
            }],
            'dom': "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            'buttons': [{
                'extend': 'excel',
                "text": 'Export  Excel',
                'className': 'btn btn-md btn-outline-dark btn-icon-text'
            }],
        });
    });

    $(document).bind("contextmenu", function(e) {
        return false;
    });
</script>
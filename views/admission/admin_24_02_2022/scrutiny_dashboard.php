<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin-theme/css/table.css"> -->
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.0.1/css/fixedColumns.dataTables.min.css">
<script src="https://cdn.datatables.net/fixedcolumns/4.0.1/js/dataTables.fixedColumns.min.js"></script> -->
<link rel="stylesheet" href="<?php echo base_url(); ?>themes/plugins/datatables-fixedcolumns/fixedColumns.dataTables.min.css">
<script src="<?php echo base_url(); ?>themes/plugins/datatables-fixedcolumns/dataTables.fixedColumns.min.js"></script>

<script src="<?php echo base_url(); ?>themes/plugins/jszip/jszip.min.js"></script>
<style>
  select.form-control {
    display: inline;
    width: 200px;
    margin-left: 25px;
  }

  div.dataTables_wrapper {
    width: 100%;
    margin: 0 auto;
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
        <div class="page-header">
          <h4 class="card-title">List of all applicants <code>(MBA)</code></h4>
          <div class="search-field">
            <form class="d-flex align-items-center h-100" action="<?php echo base_url() ?>index.php/admission/admin/dashboard/applicant_excel_download/" method="post">
            <?php $user_role = $this->session->userdata('role');
                    if(($user_role == 'superadmin')) { ?>
              <div class="input-group">
                <button type="submit" class="btn btn-outline-primary btn-icon-text">
                  <i class="mdi mdi-download btn-icon-prepend"></i> Excel Download </button>
              </div>

              <?php } ?>
            </form>
          </div>
        </div>
        <hr>
        <div class="demo-html">
          <div class="category-filter">
            <select id="categoryFilter" class="form-control">
              <option value="">Select Category</option>
              <option value='General'>General</option>
              <option value='OBC'>OBC</option>
              <option value='EWS'>EWS</option>
              <option value='SC'>SC</option>
              <option value='ST'>ST</option>
            </select>
          </div>
          <div class="scrutiny-filter">
            <select id="scrutinyFilter" class="form-control">
             <option value="">Verification Status</option>
              <option value='Not Started'>Not Started</option>
              <option value='Verified - OK'>Verified - OK</option>
              <option value='Verified - NOT OK'>Verified - NOT OK</option>
              <option value='Verified - (MBA OK) AND (BA NOT OK)'>Verified - (MBA OK) AND (BA NOT OK)</option>
              <option value='Verified - (BA OK) AND (MBA NOT OK)'>Verified - (BA OK) AND (MBA NOT OK)</option>
            </select>
          </div>
          <br>
          <table id="mba_list" class="mba-list table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Registration No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile No.</th>
                <th>Gender</th>
                <th>Category</th>
                <th>PWD</th>
                <th>B. Tech from IIT</th>
                <th>Programs</th>
                <th>Application Date</th>
                <th>Application Status</th>
                <th>Payment Status</th>
                <th>Verification Status</th>
                <th>Rejection Reason</th>
                <th>Action</th>
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
                      <?php if (!empty($appl->registration_no)) { ?>
                        <a href="<?php echo base_url(); ?>index.php/admission/admin/dashboard/scrutiny_view/<?php echo $appl->registration_no ?>">
                          <?php echo $appl->registration_no; ?>
                        </a>
                      <?php } ?>

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
                      <?php if (!empty($appl->gender)) {
                        echo $appl->gender;
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
                      <?php if (!empty($appl->betch_iit)) {
                        echo ($appl->betch_iit == 'Y') ? "Yes" : "No";
                      } ?>
                    </td>
                    <td>
                      <?php if (!empty($appl->program)) { ?><br>
                        <ol>
                          <?php foreach ($appl->program as $prgm) { ?>
                            <li>
                              <?php echo $prgm->program_desc . "(" . strtoupper($prgm->program_id) . ")"; ?>
                            </li>
                          <?php } ?>
                        </ol>
                      <?php } else { ?>
                        <b>Not applied for any program</b>
                      <?php }
                      ?>
                    </td>
                    <td>
                      <?php if (!empty($appl->payment_date_time)) {
                        echo date("d/m/Y", strtotime($appl->payment_date_time));
                      } ?>
                    </td>
                    <?php if (!empty($appl->status)) { ?>
                      <?php if ($appl->status == 'PF') { ?>
                        <td><label class="badge badge-warning">Partially Filled</label></td>
                      <?php } elseif ($appl->status == 'DU') { ?>
                        <td><label class="badge badge-info">Document Uploaded</label></td>
                      <?php } elseif ($appl->status == 'PD') { ?>
                        <td><label class="badge badge-success">Applied</label></td>
                      <?php } else { ?>
                        <td><label class="badge badge-danger">Registered</label></td>
                      <?php }
                    } else { ?>
                      <td><label class="badge badge-danger">Registered</label></td>
                    <?php } ?>
                    <?php if ($appl->payment_status == 'Y') { ?>
                      <td><label class="badge badge-success">Completed</label></td>
                    <?php } else { ?>
                      <td><label class="badge badge-danger">Not Completed</label></td>
                    <?php }
                    ?>
                    <?php if (!empty($appl->doc_verfied_flag))
                    { ?>
                        <?php if ($appl->doc_verfied_flag == 1) 
                        { ?>
                          <td><label class="badge badge-success">Verified - OK</label></td>
                        <?php 
                        }
                        elseif($appl->doc_verfied_flag == 2) 
                        { ?>
                          <td><label class="badge badge-danger">Verified - NOT OK</label></td>
                        <?php 
                        } 
                        elseif($appl->doc_verfied_flag == 3) 
                        { ?>
                          <td><label class="badge badge-danger">partial Verified - (MBA OK) AND (BA NOT OK)</label></td>
                        <?php 
                        } 
                        elseif($appl->doc_verfied_flag == 4) 
                        { ?>
                          <td><label class="badge badge-danger">partial Verified - (BA OK) AND (MBA NOT OK)</label></td>
                        <?php 
                        } 
                        else
                        { ?>
                          <td><label class="badge badge-warning">Not Verified</label></td>
                         <?php
                        }
                    } 
                    else 
                    { ?>
                       <td><label class="badge badge-info">Not Started</label></td>
                     <?php 
                    } ?>
                    <td>
                      <?php if ($appl->doc_verfied_flag == 2 || $appl->doc_verfied_flag == 3 || $appl->doc_verfied_flag == 4) { ?>
                        <ol>
                          <?php foreach ($appl->existing_rsn as $rsn) { ?>
                            <li>
                              <?php echo ($rsn->reason == "Others") ? $rsn->reason . " - " . $rsn->other_reason : $rsn->reason; ?>
                            </li>
                          <?php } ?>
                        </ol>
                      <?php } ?>
                    </td>
                    <td>
                      <div class="btn-group-vertical" role="group" aria-label="Basic example">
                        <a class="btn btn-sm btn-outline-dark btn-icon-text" href="<?php echo base_url(); ?>index.php/admission/admin/dashboard/scrutiny_view/<?php echo $appl->registration_no ?>">
                          Scrutiny
                        </a>
                        <a class="btn btn-sm btn-outline-dark btn-icon-text" href="<?php echo base_url(); ?>index.php/admission/admin/dashboard/downloadpdf/<?php echo $appl->registration_no ?>">
                          Download
                        </a>
                        <!-- <a class="btn btn-sm btn-outline-dark btn-icon-text" 
                    href="<?php echo base_url(); ?>index.php/admission/admin/dashboard/edit_application/<?php echo $appl->registration_no ?>">
                      Edit
                    </a> -->
                      </div>
                    </td>
                  </tr>
                <?php $i++;
                } ?>
              <?php } else { ?>
                <tr>
                  <td colspan="16" style="text-align: center;color:red;">
                    <strong>  
                      No data avaliable
                    </strong>
                  </td>
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
    var table = $('#mba_list').DataTable({
        scrollX:        true,
        scrollCollapse: true,
        fixedColumns:   {
            left: 2,
            right: 1
        },
      'dom': "<'row'<'col-sm-6'l><'col-sm-6 text-right'B>>" + 
        "<'row'<'col-sm-12'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
      'buttons': [{
        'extend': '',
        "text": '',
        'className': ''
      }],
    });
    $("#mba_list_filter.dataTables_filter").append($("#categoryFilter"));
    var categoryIndex = 0;
    $("#mba_list th").each(function(i) {
      if ($($(this)).text() == "Category") {
        categoryIndex = i;
        return false;
      }
    });
    $.fn.dataTable.ext.search.push(
      function(settings, data, dataIndex) {
        var selectedItem = $('#categoryFilter').val()
        var category = data[categoryIndex];       
        if (selectedItem === "" || category.includes(selectedItem)) {
          return true;
        }
        return false;
      }
    );
    $("#categoryFilter").change(function(e) {
      //table.draw().columns.adjust()
      //.fixedColumns().relayout();
      table.columns.adjust().draw();
    });
    $("#mba_list_filter.dataTables_filter").append($("#scrutinyFilter"));
    var scrutinyIndex = 0;
    $("#mba_list th").each(function(i) {
      if ($($(this)).text() == "Verification Status") {
        scrutinyIndex = i;
        return false;
      }
    });
    $.fn.dataTable.ext.search.push(
      function(settings, data, dataIndex) {
        var selectedItem = $('#scrutinyFilter').val()
        var status = data[scrutinyIndex];
        if (selectedItem === "" || status.includes(selectedItem)) {
          return true;
        }
        return false;
      }
    );
    $("#scrutinyFilter").change(function(e) {
      //table.draw().columns.adjust()
      //.fixedColumns().relayout();
      table.columns.adjust().draw();
    });
    //table.draw();
    table.columns.adjust().draw();
    //.columns.adjust()
      //.fixedColumns().relayout();
  });
</script>
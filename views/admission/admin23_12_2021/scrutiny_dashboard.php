<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>

<div>
  <?php
  $this->load->view('admission/admin/layout/flashmessages');
  ?>
</div>

<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="page-header">
          <h4 class="card-title">List of all applicants <code>(MBA)</code></h4>          
          <div class="search-field">
            <form class="d-flex align-items-center h-100" action="<?php echo base_url() ?>index.php/admission/admin/dashboard/applicant_excel_download/" method="post">
                <div class="input-group">
                      <button type="submit" class="btn btn-outline-primary btn-icon-text">
                        <i class="mdi mdi-download btn-icon-prepend"></i> Excel Download </button>
                </div>
            </form>
          </div>
        </div>
        <hr>
        <table id="mba_list" class="table table-responsive table-hover table-bordered" style="width:100%;">
          <thead>
            <tr>
              <th>#</th>
              <th>Registration No.</th>
              <th>Name</th>
              <th>Email</th>
              <th>Mobile No.</th>
              <th>Programs</th>
              <th>Application Status</th>
              <th>Payment Status</th>
              <th>Verification Status</th>
              <th>Remarks</th>
              <!-- <th>Action</th> -->
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
                  <td style="width:100%">
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
                    <?php if (!empty($appl->program)) { ?><br>
                      <ol>
                        <?php foreach ($appl->program as $prgm) { ?>
                          <li>
                            <?php echo $prgm->program_desc . "(" . $prgm->program_id . ")"; ?>
                          </li>
                        <?php } ?>
                      </ol>
                    <?php } else { ?>
                      <b>Not applied for any program</b>
                    <?php }
                    ?>
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
                  <?php if (!empty($appl->doc_verfied_flag)) { ?>
                    <?php if ($appl->doc_verfied_flag == 1) { ?>
                      <td><label class="badge badge-success">Verified - OK</label></td>
                    <?php } elseif ($appl->doc_verfied_flag == 2) { ?>
                      <td><label class="badge badge-danger">Verified - Not OK</label></td>
                    <?php } else { ?>
                      <td><label class="badge badge-warning">Not Verified</label></td>
                    <?php }
                  } else { ?>
                    <td><label class="badge badge-info">Not Started</label></td>
                  <?php } ?>
                  <td>
                    <?php if (!empty($appl->doc_ver_reason)) {
                      echo $appl->doc_ver_reason;
                    } ?>
                  </td>
                  <!-- <td>
                    <a class="btn btn-sm btn-outline-primary btn-icon-text" href="<?php echo base_url(); ?>index.php/admission/admin/dashboard/edit_application/<?php echo $appl->registration_no ?>"> Edit <i class="mdi mdi-file-check btn-icon-append"></i>
                  </td> -->
                </tr>
              <?php $i++;
              } ?>
            <?php } else { ?>
              <tr> No data avaliable</tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('#mba_list').DataTable({
      // dom: 'Bfrtip',
      // buttons: [
      //   'excel'
      // ]
    });
  });
</script>
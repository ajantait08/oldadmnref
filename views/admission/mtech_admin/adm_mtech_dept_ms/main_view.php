<div class="container">
        <br /><br /><br />
        <h3 align="center">MTech Department Master Table</h3><br />
        <form method="post" action="<?php echo base_url() ?>index.php/admission/mtech_admin/adm_mtech_dept_ms/form_validation">
                <?php
                if ($this->uri->segment(4) == "inserted") {
                        //base url - http://localhost/tutorial/codeigniter  
                        //redirect url - http://localhost/tutorial/codeigniter/main/inserted  
                        //main - segment(1)  
                        //inserted - segment(2)  
                        echo '<p class="text-success">Data Inserted</p>';
                }
                if ($this->uri->segment(4) == "updated") {
                        echo '<p class="text-success">Data Updated</p>';
                }
                if ($this->uri->segment(4) == "deleted") {
                        echo '<p class="text-success">Data Deleted</p>';
                }
                ?>

                <?php
                if ($user_data) {
                        foreach ($user_data as $row) {
                ?>
                                <div class="form-group">
                                        <label>Department ID</label>
                                        <input type="text" name="dept_id" value="<?php echo $row->dept_id; ?>" class="form-control" />
                                        <span class="text-danger"><?php echo form_error("dept_id"); ?></span>
                                </div>
                                <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" name="desc" value="<?php echo $row->desc; ?>" class="form-control" />
                                        <span class="text-danger"><?php echo form_error("desc"); ?></span>
                                </div>
                                <div class="form-group">
                                        <label>Whether Color Blind</label>
                                        <select name='color_blind_type'>
                                                <?php if (!empty($row->color_blind_type)) {
                                                ?>
                                                        <option value="<?php echo $row->color_blind_type; ?>">
                                                                <?php if ($row->color_blind_type == 'Y') {
                                                                        echo "Yes";
                                                                } else {
                                                                        echo "No";
                                                                }; ?>
                                                        </option>
                                                        <option value="<?php if ($row->color_blind_type == 'Y') {
                                                                                echo "N";
                                                                        } else {
                                                                                echo "Y";
                                                                        }; ?>">
                                                                <?php if ($row->color_blind_type == 'Y') {
                                                                        echo "NO";
                                                                } else {
                                                                        echo "Yes";
                                                                }; ?>
                                                        </option>

                                                <?php } ?>
                                        </select>
                                </div>
                                <div class="form-group">
                                        <label>Application Type</label>
                                        <input type="text" name="ap_type_jrf_mtech" value="<?php echo $row->ap_type_jrf_mtech; ?>" class="form-control" />
                                        <span class="text-danger"><?php echo form_error("ap_type_jrf_mtech"); ?></span>
                                </div>
                                <div class="form-group">
                                        <label>Status</label>
                                        <input type="text" name="status" value="<?php echo $row->status; ?>" class="form-control" />
                                        <span class="text-danger"><?php echo form_error("status"); ?></span>
                                </div>
                                <div class="form-group">
                                        <input type="hidden" name="hidden_id" value="<?php echo $row->id; ?>" />
                                        <input type="submit" name="update" value="Update" class="btn btn-info" />
                                </div>
                        <?php
                        }
                } else {
                        ?>
                        <div class="form-group">
                                <label>Department ID</label>
                                <input type="text" name="dept_id" class="form-control" />
                                <span class="text-danger"><?php echo form_error("dept_id"); ?></span>
                        </div>
                        <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="desc" class="form-control" />
                                <span class="text-danger"><?php echo form_error("desc"); ?></span>
                        </div>
                        <div class="form-group">
                                <label>Whether Color Blind</label>
                                <select name='color_blind_type'>
                                        <option value="N">No</option>
                                        <option value="Y">Yes</option>
                                </select>
                        </div>
                        <div class="form-group">
                                <label>Application Type</label>
                                <input type="text" name="ap_type_jrf_mtech" class="form-control" />
                                <span class="text-danger"><?php echo form_error("ap_type_jrf_mtech"); ?></span>
                        </div>
                        <div class="form-group">
                                <label>Status</label>
                                <input type="text" name="status" class="form-control" />
                                <span class="text-danger"><?php echo form_error("status"); ?></span>
                        </div>
                        <div class="form-group">
                                <input type="submit" name="insert" value="Insert" class="btn btn-info" />
                        </div>
                <?php
                }
                ?>
        </form>
        <br /><br />
        <h3>Fetch Data from Admission MTech</h3><br />
        <div class="table-responsive">
                <table class="table table-bordered">
                        <tr>
                                <th>Department ID</th>
                                <th>Description</th>
                                <th>Color Blind</th>
                                <th>Application Type</th>
                                <th>Status</th>
                                <th>Created Time</th>
                                <th>Delete</th>
                                <th>Update</th>
                        </tr>
                        <?php
                        if ($fetch_data) {
                                foreach ($fetch_data as $row) {
                        ?>
                                        <tr>
                                                <td><?php echo $row->dept_id; ?></td>
                                                <td><?php echo $row->desc; ?></td>
                                                <td><?php if ($row->color_blind_type == 'Y') {
                                                                echo "Yes";
                                                        } else {
                                                                echo "No";
                                                        }; ?></td>
                                                <td><?php echo $row->ap_type_jrf_mtech; ?></td>
                                                <td><?php echo $row->status; ?></td>
                                                <td><?php echo $row->created_ts; ?></td>
                                                <td><a href="#" class="delete_data" id="<?php echo $row->id; ?>">Delete</a></td>
                                                <td><a href="<?php echo base_url(); ?>index.php/admission/mtech_admin/adm_mtech_dept_ms/update_data/<?php echo $row->id; ?>">Edit</a></td>
                                        </tr>
                                <?php
                                }
                        } else {
                                ?>
                                <tr>
                                        <td colspan="5">No Data Found</td>
                                </tr>
                        <?php
                        }
                        ?>
                </table>
        </div>
        <script>
                $(document).ready(function() {
                        $('.delete_data').click(function() {
                                var id = $(this).attr("id");
                                if (confirm("Are you sure you want to delete this?")) {
                                        window.location = "<?php echo base_url(); ?>index.php/admission/mtech_admin/adm_mtech_dept_ms/delete_data/" + id;
                                } else {
                                        return false;
                                }
                        });
                });
        </script>
</div>

<style>
    table.mba-list td,
    table.mba-list th {
        padding: 5px 2px;
    }
</style>
<script src="<?php echo base_url(); ?>themes/plugins/jszip/jszip.min.js"></script>
<div>
    <?php
    $this->load->view('admission/phd/admin/layout/flashmessages');
    ?>
</div>


<div class="row">
<button type="button" id="backbutton" class="btn btn-primary">BACK</button>
</div>
<br>
<div class="row">

<h4>Download Consolidated Zip Documents For Call For Interview List</h4>
                <!-- <h4 class="card-title">s Filter</h4> -->
                <!--<form id="reportsubmit" action="<?php echo base_url() ?>index.php/admission/admin/dashboard/cfi_cat_filtered" control="" class="form-inline" method="POST">
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
                    </div> -->
                    <!-- <div class="col-md-4">
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
                </form>-->
                <hr>
                <br />
                <!--<div id="buttons"></div>-->
                <div class="table-responsive">
                <table class="table table-bordered" id="mba_list">
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
                                <!-- <th>Document Zip Download</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            if (!empty($candidate_list)) {
                                foreach ($candidate_list as $appl) {
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
                                        <!-- <td>
                                            <?php if (!empty($appl->admin_decision)) { ?>
                                                <?php if ($appl->admin_decision == 'CI') { ?>
                                                    <form method="post" action="<?php echo base_url();?>index.php/admission/phd/admin/Documents_download/download_zip">
                                                        <input type="hidden" name="reg_no" value="<?php echo $appl->registration_no; ?>">
                                                        <button type="submit" class="btn btn-primary">Documents Download</button>
                                                    </form>
                                            <?php }
                                            } ?>
                                        </td> -->
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

                            <br>

                            <div class="col-sm-12 col-md-12 col-lg-12"><!--row col-md-8 start  -->
       <div class="home"><!--home start  -->
            <div class="row"><!--home row start  -->
                <div class="col-md-12 col-lg-12 col-sm-12"><!--home col-md-12 start  -->
                    <!--start  -->
                    <div class="panel panel-primary news_back">

                        <div class="panel-body">
                            <section class="signup-step-container">




                                            <div class="container-fluid">

                                            <!-- DataTales Example -->
                                            <!-- <div class="col-md-6"></div> -->
                                            <div class="card shadow mb-4 col-md-12">
                                                <div class="card-header py-3">


                                                <center>

                                                <h5 align="center" style="color:red;">
                                                Please Select the required set to be downloaded:
                                                </h5>
                                                </center>



                                                </div>
                                                <div class="card-body">
                                                <?php
                                                    $attributes = array('id' => 'uploadform','name'=>'uploadform','enctype'=>'multipart/form-data');
                                                    echo form_open('admission/phd/admin/Documents_download/download_zip', $attributes);

                                                 ?>


                                                <div class="col-md-6">

                                                <div class="form-group mb-6">
                                                <label>Total No. of Enteries : <span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" name="total_enteries" id="total_enteries" value="Total &nbsp;<?php echo $total_no_of_enteries; ?> &nbsp; Enteries" placeholder="Total No. of Enteries" readonly/>
                                                </div>

                                                <div class="form-group mb-6">

                                                <label>Select Sets required to be Downloaded:<span style="color:red;">*</span></label>
                                                <select name="required_sets" id="required_sets" class="form-control">
                                                    <?php
                                                $total_students_count = $total_no_of_enteries;
                                                $total_count_students = ceil($total_students_count/10);
                                                $start = 0;
                                                $output = '<option value=""> -- Select --</option>';
                                                for($i=0;$i < $total_count_students;$i++){


                                                //$last_value = ceil($total_students_count/$total_count_students);
                                                //$records_per_page = ceil($total_students_count/$total_count_students);
                                                $records_per_page = 10;
                                                $last_value = $start+$records_per_page;
                                                $start = $start + 1;
                                                if($last_value >= $total_students_count){
                                                    $last_value = $total_students_count;
                                                }
                                                //$last_value = $value + 1;
                                                $output .= '<option value="'.$start.'-'.$last_value.'">'.$start.'-'.$last_value.' Sets</option>';
                                                $start = $last_value;
                                                //$total_students_count = $total_students_count-$last_value;
                                                }

                                                echo $output; ?>

                                                </select>

                                                </div>



                                                </div>

                                                <div class="col-md-6">



                                                </div>


                                                <!-- <input type="hidden" name="passingparameters" value="<?php echo $requestParameter; ?>"> -->
                                                <div class="col-md-12"><?php if(isset($msg)) { echo $msg; } ?><hr></div>

                                                    <div class="col-md-12">
                                                    <input type="hidden" name="program_id" value="<?php echo $program_id; ?>">
                                                    <button type="submit" class="btn btn-primary">Download Documents</button>

                                                    </div>
                                                    </form>

                                                </div>
                                            </div>

                                            </div>

                                        </div>
                                        <!-- End of Main Content -->

                                        <!-- Footer -->
                                        <footer class="sticky-footer bg-white">
                                            <div class="container my-auto">
                                            <!-- <div class="copyright text-center my-auto">
                                                <span>Copyright &copy; IIT (ISM)</span>
                                            </div> -->
                                            </div>
                                        </footer>
                                        <!-- End of Footer -->

                                        </div>
                                        <!-- End of Content Wrapper -->

                                    </div>
                                    <!-- End of Page Wrapper -->

                                    <!-- Scroll to Top Button-->
                                    <!-- <a class="scroll-to-top rounded" href="#page-top">
                                        <i class="fas fa-angle-up"></i>
                                    </a> -->
                            </section>
                            <!-- <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">Candidates can now check their admission status.</marquee> -->
                        </div> <!-- panel body end  -->
                    </div>  <!-- panel end  -->
                    <!--end  -->
                </div><!--home col-md-12 end  -->
            </div><!--home row end  -->
        </div><!--home end  -->
    </div><!--row col-md-8 end  -->





<script type="text/javascript">

         $('#mba_list').DataTable({
            "lengthMenu": [
                [10, 25, 50, 100, 500, -1],
                ['10 rows', '25 rows', '50 rows', '100 rows', '500 rows', 'Show all']
            ],
            "ordering": false,

    });

    $('#backbutton').click(function(){
        window.location.href="<?php echo base_url(); ?>index.php/admission/phd/admin/dashboard/download_CI_documents";
    });

    // $(document).bind("contextmenu", function(e) {
    //     return false;
    // });
</script>
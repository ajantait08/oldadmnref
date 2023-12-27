<link href="<?php echo base_url();?>themes/dist/css/phdpt/adm_phdpt_personal_details.css" rel="stylesheet" media="screen">
<?php

if(!($this->session->has_userdata('login_type'))) {
redirect('admission/phdpt/Add_phdpt/adm_phdpt_login');
} ?>

<style>

.blink_click {
    animation-duration: 1200ms !important;
    animation-name: blink;
    animation-iteration-count: infinite !important;
    animation-direction: alternate !important;
    -webkit-animation:blink 1200ms infinite !important; /* Safari and Chrome */
}
@keyframes blink {

     from {

       color:#6b95e7;

     }

    to {
        color:green;
    }
}
@-webkit-keyframes blink {

        from {

      color:#6b95e7;

      }

    to {
        color:green;
    }
}
</style>
<?php
if(!($this->session->has_userdata('login_type'))) {
redirect('admission/phdpt/Add_phdpt/adm_phdpt_login');
} ?>
<div class="row"> <!--row start  -->
  <div class="col-sm-2 col-md-2 col-lg-2"> <!--row col-md-4 start  -->
    <div class="notice"> <!--notice start  -->
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
    </div><!--notice end -->
    <div class="info"> <!--info start  -->
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <!--start  -->
                <div class="panel panel-primary news_back">
                    <div class="panel-heading">Activity
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                            <input class="btn btn-info" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/phdpt/Adm_phdpt_applicant_home'" value="Back applicant home" />
                            <?php if(!empty($tab))
                            {
                                if($tab=='4')
                                { ?>
                                      <input class="btn btn-secondary" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/phdpt/Adm_phdpt_payment'" value="Back to Payment " />
                                <?php }
                            } ?>
                            <input class="btn btn-danger" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/phdpt/Adm_phdpt_registration/logout'" value="Logout" />

                            </div>
                        </div>

                    </div>
                </div>
                <!--end  -->
            </div>
        </div>
    </div><!--info end -->
  </div> <!--row col-md-2 end  -->
  <div class="col-sm-8 col-md-8 col-lg-8"><!--row col-md-8 start  -->
    <div class="home"><!--home start  -->
      <div class="row"><!--home row start  -->
        <div class="col-md-12 col-lg-12 col-sm-12"><!--home col-md-12 start  -->
            <!--start  -->
            <div class="panel panel-primary news_back">
              <div class="panel-body">
                <section class="signup-step-container">
                      <?php if(validation_errors() != '') { ?>
                      <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong><?php echo validation_errors(); ?></strong>
                      </div>

                      <?php } elseif($this->session->flashdata('error') != '') { ?>

                      <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong><?php echo $this->session->flashdata('failed_upload'); ?></strong>
                      </div>


                      <?php } elseif ($this->session->flashdata('amount_error') != '') { ?>

                      <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong><?php echo $this->session->flashdata('amount_error'); ?></strong>
                      </div>

                      <?php } else {
                      # code...
                      } ?>

                      <nav class="navbar navbar-default navbar-static-top">
                          <div class="container-fluid">
                          <!-- Brand and toggle get grouped for better mobile display -->
                          <div class="navbar-header" style="float: left; text-align: center; width: 100%;">
                          <div><h3><strong>Track</strong> <strong style="color:green">Complaint</strong></h3></div>
                          </div>

                          </div><!-- /.container-fluid -->
                      </nav>


                      <div class="container">
                       <!-- Content here -->


                            <?php
                            if($this->session->flashdata('error'))
                            {
                            ?>
                            <h4 class='alert alert-danger'>Alert : <?php echo $this->session->flashdata('error'); ?></h4>
                            <?php
                            }
                            ?>
                            </div>

                            <div class="panel-group">
                              <div class="panel panel-primary">
                                <div class="panel-heading">Track Complaint</div>
                                    <div class="panel-body">

                                      <center><h4><b>Track your complaint from order no or email id.</b></h4></center>
                                      <?php if($this->session->flashdata('message_error')){?>
                                        <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <center> <strong><?php echo $this->session->flashdata('message_error')?></strong> </center>
                                        </div>
                                        <?php }?>
                                      <hr>
                                      <div class="row">

                                        <div class="col-md-12">

                                            <?php echo validation_errors(); ?>
                                              <?php
                                                  $attributes = array('id' => 'complainstatus','name'=>'complainstatus','enctype'=>'multipart/form-data');
                                                  echo form_open('admission/phdpt/Adm_phdpt_complain_register/track_status', $attributes);

                                              ?>

                                              <div class="col-md-2 form-check">
                                                  <input class="form-check-input" type="radio" name="radio1" id="odr" value="order" onClick="ShowHideDiv(this)">
                                                  <label class="form-check-label" for="flexRadioDefault1">
                                                  &nbsp;&nbsp;&nbsp;&nbsp;Order no
                                                  </label>
                                              </div>

                                              <div class="col-md-2 form-check">
                                                  <input class="form-check-input" type="radio" name="radio1" id="eml" value="email" onClick="ShowHideDiv(this)">
                                                  <label class="form-check-label" for="flexRadioDefault1">
                                                  &nbsp;&nbsp;&nbsp;&nbsp;Registered Email id
                                                  </label>
                                              </div>

                                              <div class="col-md-8" id="order_radio" style="display:none;">
                                                <div class="form-group">
                                                  <label>Order no<span style="color:red;">*</span></label>
                                                      <input type="text" class="form-control" name="order_no" id="order_no" placeholder="Please enter order no *"/>
                                                </div>
                                              </div>

                                              <div class="col-md-8" id="email_radio" style="display:none;">
                                                <div class="form-group">
                                                  <label>Registered Email id<span style="color:red;">*</span></label>
                                                      <input type="text" class="form-control" name="email" id="email" placeholder="Please enter email id *"/>
                                                </div>
                                              </div>
                                              <div class="col-md-12"><?php if(isset($msg)) { echo $msg; } ?><hr></div>
                                              <div class="col-md-12">
                                                  <button type="submit" class="btn btn-primary">Track status</button>
                                                  <button type="reset" class="btn btn-danger">Reset</button>
                                              </div>
                                            </form>
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                            </div><!-- /.panel-group -->

                            <?php
                            if(!empty($data))
                            {
                            ?>

                                  <!-- Content here -->

                            <div class="panel-group">
                                <div class="panel panel-primary">

                                  <div class="panel-heading">Complaint status</div>

                                    <div class="panel-body">
                                      <div class="row">
                                          <div class="col-md-12">
                                              <div class="table-responsive">
                                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                                  <thead>
                                                      <tr>
                                                          <th>Sl no</th>
                                                          <th>Complain id</th>
                                                          <th>Order no</th>
                                                          <th>Email</th>
                                                          <th>Status</th>
                                                          <th>Action</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                    <?php
                                                    foreach($data as $key => $list)
                                                    {
                                                    ?>

                                                      <tr>
                                                          <td><?php echo $key+1; ?></td>
                                                          <td><?php echo $list['com_id']; ?></td>
                                                          <td><?php echo $list['ref_no'];  ?></td>
                                                          <td><?php echo $list['email'];  ?></td>
                                                          <td>
                                                            <?php
                                                            if($list['status']=="New")
                                                            {
                                                            ?>
                                                            <strong style="color:#1b1e21;">
                                                            <?php echo $list['status'];  ?>
                                                            </strong>
                                                            <?php
                                                            }
                                                            else if($list['status']=="Under Processing")
                                                            {
                                                            ?>
                                                            <strong style="color:#337ab7;">
                                                            <?php echo $list['status'];  ?>
                                                            </strong>
                                                            <?php
                                                            }
                                                            else if($list['status']=="Closed")
                                                            {
                                                            ?>
                                                            <strong style="color:green;">
                                                            <?php echo $list['status'];  ?>
                                                            </strong>
                                                            <?php
                                                            }
                                                            else if($list['status']=="Rejected")
                                                            {
                                                            ?>
                                                            <strong style="color:red;">
                                                            <?php echo $list['status'];  ?>
                                                            </strong>
                                                            <?php
                                                            }
                                                            ?>
                                                          </td>
                                                          <td><center><a href="#" onclick="view_com(<?php echo $list['id']; ?>)" id="viewid<?php echo $list['id']; ?>"  class="btn btn-sm btn-info" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#exampleModalCenter" data-id="<?php echo $list['id']; ?>" data-com_id="<?php echo $list['com_id']; ?>" data-ref_no="<?php echo $list['ref_no']; ?>" data-status="<?php echo $list['status']; ?>" data-remarks="<?php echo $list['remarks']; ?>" data-created_at="<?php echo $list['created_at']; ?>" data-complain_type="<?php echo $list['complain_type']; ?>" data-complain_details="<?php echo $list['complain_details']; ?>" data-remarks="<?php echo $list['remarks']; ?>"><i class="glyphicon glyphicon-eye-open"></i></a></center></td>
                                                      </tr>
                                                      <?php
                                                      }
                                                      ?>
                                                  </tbody>

                                                </table>
                                              </div>
                                            </div>
                                        </div>

                                    <?php
                                    }
                                    ?>
                                <!-- Modal -->
                                <div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle"><center><strong>Complain</strong> <strong style="color:green">Status</strong></center></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">

                                            <table id="example123"  class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                                <thead>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                      <td style="width:40%">Complain id :</td>
                                                      <td><strong id="com_id"></strong></td>
                                                    </tr>
                                                    <tr>
                                                      <td style="width:40%">Order no :</td>
                                                      <td><strong id="ref_no"></strong></td>
                                                    </tr>
                                                    <tr>
                                                      <td style="width:40%">Complain type :</td>
                                                      <td><strong id="complain_type"></strong></td>
                                                    </tr>
                                                    <tr>
                                                      <td style="width:40%">Complain details :</td>
                                                      <td><strong id="complain_details"></strong></td>
                                                    </tr>
                                                    <tr>
                                                      <td style="width:40%">Complain date :</td>
                                                      <td><strong id="created_at"></strong></td>
                                                    </tr>
                                                    <tr>
                                                      <td style="width:40%">Status :</td>
                                                      <td><strong id="status"></strong></td>
                                                    </tr>
                                                    <tr>
                                                      <td style="width:40%">Remarks :</td>
                                                      <td><strong id="remarks"></strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                          </div>
                                    </div>
                                  </div>
                                </div>
                                  <!-- Modal  -->
                                  </div>
                                    </div>
                </section>
                <!-- <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">Candidates can now check their admission status.</marquee> -->
              </div> <!-- panel body end  -->
            </div>  <!-- panel end  -->
              <!--end  -->
            </div><!--home col-md-12 end  -->
          </div><!--home row end  -->
    </div><!--home end  -->
  </div><!--row col-md-8 end  -->
</div><!--row start  -->
<script type="text/javascript" src="<?php echo base_url();?>themes/dist/js/phdpt/adm_phdpt_education.js"></script>
<script type="text/javascript">
// function disableF5(e) { if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) e.preventDefault(); };

$(document).ready(function(){
  $(document).on("keydown", disableF5);
});
</script>

<!-- <script type="text/javascript" src="<?php echo base_url();?>themes/dist/js/phdpt/adm_phdpt_education.js"></script> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <!-- DataTables cdn -->
  <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css" />
<script>

  function ShowHideDiv(opt) {

        var odr = document.getElementById("odr");
        var eml = document.getElementById("eml");

        var order_no = document.getElementById("order_no");
        var email = document.getElementById("email");

        var order_radio = document.getElementById("order_radio");
        var email_radio = document.getElementById("email_radio");

      if(opt.value=="order")
      {
        order_radio.style.display = odr.checked ? "block" : "none";
        email_radio.style.display = "none";
        email.value = "";
      }
      else if(opt.value=="email")
      {
        email_radio.style.display = eml.checked ? "block" : "none";
        order_radio.style.display = "none";
        order_no.value = "";
      }

    }
</script>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
<script>
	function view_com(id) {
		// var c_id=$('#viewid'+id).data('id');
		// //document.getElementById('c_id').value=c_id;
    // document.getElementById('c_id').innerHTML = "id : "+c_id;

		var com_id=$('#viewid'+id).data('com_id');
    document.getElementById('com_id').innerHTML = com_id;
    var ref_no=$('#viewid'+id).data('ref_no');
    document.getElementById('ref_no').innerHTML = ref_no;
    var status=$('#viewid'+id).data('status');
    if(status=="New")
    {
      document.getElementById("status").style.color = "#1b1e21";
    }
    else if(status=="Under Processing")
    {
      document.getElementById("status").style.color = "#337ab7";
    }
    else if(status=="Closed")
    {
      document.getElementById("status").style.color = "green";
    }
    else if(status=="Rejected")
    {
      document.getElementById("status").style.color = "red";
    }
    document.getElementById('status').innerHTML = status;
    var complain_type=$('#viewid'+id).data('complain_type');
    document.getElementById('complain_type').innerHTML = complain_type;
    var complain_details=$('#viewid'+id).data('complain_details');
    document.getElementById('complain_details').innerHTML = complain_details;
    var remarks=$('#viewid'+id).data('remarks');
    document.getElementById('remarks').innerHTML = remarks;
    var created_at=$('#viewid'+id).data('created_at');
    var date=new Date(created_at);
    var day=date.getDate();
    var month=date.toLocaleString('default', { month: 'short' });
    var year=date.getFullYear();
    var time = date.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true }) // en-US
    //var time = date.toLocaleString();
    const d = day+' '+month+' '+year+' '+time
    document.getElementById('created_at').innerHTML = d;

	}
</script>
<style>
a:hover,
a:focus{
    text-decoration: none;
    outline: none;
}
.tab{
    font-family: 'Raleway', sans-serif;
    padding: 15px;
}
.tab .nav-tabs{
    padding: 0 20px;
    margin: 12px;
    border: none;
}   
.tab .nav-tabs li a{
    color: #333;
    background: #fff;
    font-size: 16px;
    font-weight: 600;
    text-align: center;
    text-transform: capitalize;
    padding: 10px 20px;
    margin: 0 10px 5px 0;
    border: none;
    border-radius: 5px;
    /* box-shadow: 0 0 7px rgba(0,0,0,0.1); */
    position: relative;
    z-index: 1;
    transition: all 0.3s ease 0.15s;
}
.tab .nav-tabs li.active a,
.tab .nav-tabs li a:hover,
.tab .nav-tabs li.active a:hover{
    color: #aa551d;
    background: #fff;
    border: none;
    box-shadow: 0 -2px 0 2px #aa551d;
}
.tab .nav-tabs li a:before{
    content: "";
    background: #aa551d;
    height: 10px;
    width: 70%;
    border-radius: 15px;
    opacity: 0;
    transform: translateX(-50%);
    position: absolute;
    bottom: 15px;
    left: 50%;
    z-index: -1;
    transition: all 0.3s ease-out 0s;
}
.tab .nav-tabs li.active a:before,
.tab .nav-tabs li a:hover:before{
    width: 50%;
    opacity: 1;
    bottom: -7px;
}
.tab .tab-content{
    color: #555;
    background: #fff;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: 1px;
    line-height: 25px;
    padding: 20px;
    border-radius: 10px;
    /* box-shadow: 0 5px 0 5px #aa551d; */
    position: relative;
}
@media only screen and (max-width: 479px){
    .tab .nav-tabs{
        padding: 0;
        margin: 0 0 15px;
    }
    .tab .nav-tabs li{
        width: 100%;
        text-align: center;
    }
    .tab .nav-tabs li a{
        margin: 0 0 15px;
        border-radius: 10px;
    }
}

    table {
  border-collapse: collapse;
  border-radius: 10px;
  overflow: hidden;
}

td {
  border: 0px solid black;
  height: 20px;
  width: 50px;
  text-align: center;
  font-size: 13px;
  white-space: nowrap;
  font-family: Gotham, "Helvetica Neue", Helvetica, Arial, "sans-serif";
  padding: 15px 20px;
}
caption {
  text-align: right;
}
 th {
     background-color:#b66dff;
  font-size: 10px;
  color: white;
  padding: 20px 20px 20px 20px;
} 
th:nth-child(1) {
  background-color: #b66dff;
  align-content: center;
}
th:nth-child(2) {
  background-color: #b66dff;
  align-content: center;
}
th:nth-child(3) {
  background-color: #b66dff;
  align-content: center;
}
th:nth-child(4) {
    
  
  background-color: #b66dff;
  align-content: center;
}
th:nth-child(5) {
  background-color: #b66dff;
  align-content: center;
}
th:nth-child(6) {
  background-color: #b66dff;
  align-content: center;
}
th:nth-child(7) {
  background-color: #b66dff;
  align-content: center;
}
th:nth-child(8) {
  background-color: #b66dff;
  align-content: center;
}
th:nth-child(9) {
  background-color: #b66dff;
  align-content: center;
}
th:nth-child(10) {
  background-color: #b66dff;
  align-content: center;
}
th:nth-child(11) {
  background-color: #b66dff;
  align-content: center;
}
th:nth-child(12) {
  background-color: #061539;
  align-content: center;
}
tr:nth-child(2n) {
  background: #ececec;
}
tr:nth-child(2n-1) {
  background: #dbdbdb;
}
td:nth-child(2n) {
  background: lightgray;
}
tr:nth-child(odd) td:nth-child(even) {
  background: #e7e7e7;
}
tr:nth-child(even) td:nth-child(even) {
  background: #f3f3f3;
}
button {
  padding: 5px 20px;
  background-color: #d3d3d3;
  border-width: 1px;
}
table.govind {
  border: 1px solid #1C6EA4;
  background-color: #EEEEEE;
  width: 100%;
  text-align: left;
  border-collapse: collapse;
   margin: auto;
  min-width: 300px;
  max-width: 100%;
}
table td 
{
  
  width:20px;
  overflow:hidden;
  word-wrap:break-word;
}

/* table.govind {
  border: 1px solid #1C6EA4;
  background-color: #EEEEEE;
  width: 100%;
  text-align: left;
  border-collapse: collapse;
   margin: auto;
  min-width: 300px;
  max-width: 100%;
} */

</style>

<div class="containerd">
    <div class="row">
        <div class="col-md-12">
            <div class="tab" role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class=""><a href="#Section1" aria-controls="Merge Applicant data" role="tab" data-toggle="tab">Merge Applicant data</a></li>
                    <li role="presentation"><a href="#Section2" aria-controls="View call for Interview data" role="tab" data-toggle="tab">View call for Interview data</a></li>
                    <li role="presentation"><a href="#Section3" aria-controls="Synchronize Applicant data" role="tab" data-toggle="tab">Synchronize Applicant data</a></li>
                    <li role="presentation"><a href="#Section4" aria-controls="View Synchronized Applicant" role="tab" data-toggle="tab">View Synchronized Applicant</a></li>
                    <!-- <li role="presentation"><a href="#Section5" aria-controls="Synchronized Data For student Display" role="tab" data-toggle="tab">View Synchronized interview</a></li> -->
                    <!-- <li role="presentation"><a href="#Section6" aria-controls="Total Synchronized Data List" role="tab" data-toggle="tab">Synchronized Data</a></li> -->
                </ul>
                <!-- Tab panes -->
                <div class="tab-content tabs">

                    <div role="tabpanel" class="tab-pane fade in active show" id="Section1">
                        <h3>Merge Applicant data</h3>
                        <p id="msg"> </p>
                        <div class="row">
                            <div class="col-md-12">
                                <table id="mba_list_m" class="govind table-responsive" >
                                    <thead>
                                        <tr>
                                            <th>SI No.</th>
                                            <th>All<input Type="checkbox" name="click" id="checkAll" /></th>
                                            <th>Registration No.</th>
                                            <th>Application No.</th>
                                            <th>Program</th>
                                            <th style="text-align: center;">Name</th>
                                            <th style="text-align: center;">Email</th>
                                            <th>Category</th>
                                            <th>CAT Percentile</th>
                                            <th>Cat Score</th>
                                            <th>Status</th>
                                            <th>Admin Decision</th>
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
                                                    <td class=""><input Type="checkbox" name="click" /></td>
                                                    <td>
                                                        <?php if (!empty($appl->registration_no)) {
                                                            echo $appl->registration_no;
                                                        } ?>
                                                    </td>
                                                    <td style="padding-right: 10px">
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
                                                        <?php if (!empty($appl->name)) {
                                                            echo $appl->name;
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <?php if (!empty($appl->email)) {
                                                            echo $appl->email;
                                                        } ?>
                                                    </td>
                                                  
                                                    <td>
                                                        <?php if (!empty($appl->category)) {
                                                            echo $appl->category;
                                                        } ?>
                                                    </td>
                                                    
                                                    
                                                    <td>
                                                        <?php if (!empty($appl->cat_score)) {
                                                            echo $appl->cat_score;
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <?php if (!empty($appl->cat_percentile)) {
                                                            echo $appl->cat_percentile;
                                                        } ?>
                                                    </td>
                                                    <td><?php if (!empty($appl->call_int_status)) {
                                                            if($appl->call_int_status=='Y'){
                                                                 echo "Call for interview";
                                                            }
                                                        } ?></td>
                                                    <td><?php if (!empty($appl->admin_decision_status)) {
                                                           if($appl->admin_decision_status=='CI'){
                                                              echo "Data Synchronized"; 
                                                           }
                                                        } ?></td>
                                                </tr>
                                            <?php $i++;
                                            } ?>
                                        <?php } 
                                        else 
                                        { ?>
                                            
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <center>
                            <!-- <button style="width: 100%" name="approve_all" id="approve_all" class="btn btn-info">
                                    Approve All
                                </button> -->
                             <button class="btn btn-info" style="width: 100%" id="get_row_val"><i class="fa fa-thumbs-up"></i>Click here to
                             Merge Applicant data</button>
                              </center>
                                  
                            </div>

                        </div>
                     
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce semper, magna a ultricies volutpat, mi eros viverra massa, vitae consequat nisi justo in tortor. Proin accumsan felis ac felis dapibus, non iaculis mi varius.</p> -->
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="Section2">
                        <h3>View call for Interview data</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <table id="mba_list_c_i" class="govind table-responsive" >
                                    <thead>
                                        <tr>
                                            <th>SI No.</th>
                                            <th>Registration No.</th>
                                            <th>Application No.</th>
                                            <th>Program</th>
                                            <th style="text-align: center;">Name</th>
                                            <th style="text-align: center;">Email</th>
                                            <th>Category</th>
                                            <th>CAT Percentile</th>
                                            <th>Cat Score</th>
                                            <th>Status</th>
                                            <th>Admin Decision</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <?php
                                        $i = 1;
                                        if (!empty($call_for_interview)) {
                                            foreach ($call_for_interview as $appl) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td>
                                                        <?php if (!empty($appl->registration_no)) {
                                                            echo $appl->registration_no;
                                                        } ?>
                                                    </td>
                                                    <td style="padding-right: 10px">
                                                        <?php if (!empty($appl->application_no)) {
                                                            echo "   ".$appl->application_no;
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <?php if (!empty($appl->program_id)) {
                                                            echo strtoupper($appl->program_id);
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <?php if (!empty($appl->name)) {
                                                            echo $appl->name;
                                                        } ?>
                                                    </td>
                                                    
                                                
                                                    <td>
                                                        <?php if (!empty($appl->email)) {
                                                            echo $appl->email;
                                                        } ?>
                                                    </td>
                                                   
                                                    <td>
                                                        <?php if (!empty($appl->category)) {
                                                            echo $appl->category;
                                                        } ?>
                                                    </td>
                                                    
                                                   
                                                    <td>
                                                        <?php if (!empty($appl->cat_score)) {
                                                            echo $appl->cat_score;
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <?php if (!empty($appl->cat_percentile)) {
                                                            echo $appl->cat_percentile;
                                                        } ?>
                                                    </td>
                                                    <td><?php if (!empty($appl->call_int_status)) {
                                                            if( $appl->call_int_status=='Y'){
                                                                echo "Call For Interview";
                                                            }
                                                        } ?></td>
                                                     <td><?php if (!empty($appl->admin_decision_status)) {
                                                           if($appl->admin_decision_status=='CI'){
                                                              echo "Data Synchronized"; 
                                                           }
                                                        } ?></td>
                                                
                                                </tr>
                                            <?php $i++;
                                            } ?>
                                        <?php } 
                                        else 
                                        { ?>
                                            
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                       
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="Section3">
                        <h3>Synchronize Applicant data</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- <center><input Type="checkbox" name="click" id="syncheck" /> Select All</center> -->
                                
                                <table id="mba_list_v" class="govind table-responsive" >
                                    <thead>
                                        <tr>
                                            <th>SI No.</th>
                                            <th>all</th>
                                            <th>Registration No.</th>
                                            <th>Application No.</th>
                                            <th>Program</th>
                                            <th style="text-align: center;">Name</th>
                                            <th style="text-align: center;">Email</th>
                                            <th>Category</th>
                                            <th>CAT Percentile</th>
                                            <th>Cat Score</th>
                                            <th>Status</th>
                                            <th>Admin Decision</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                   
                                        <?php
                                        $i = 1;
                                        if (!empty($Synchronize_app)) {
                                            foreach ($Synchronize_app as $appl) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td class="p"><input Type="checkbox" name="click" /></td>
                                                    <td>
                                                        <?php if (!empty($appl->registration_no)) {
                                                            echo $appl->registration_no;
                                                        } ?>
                                                    </td>
                                                    <td style="padding-right: 10px">
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
                                                        <?php if (!empty($appl->name)) {
                                                            echo $appl->name;
                                                        } ?>
                                                    </td>
                                                    
                                                
                                                    <td>
                                                        <?php if (!empty($appl->email)) {
                                                            echo $appl->email;
                                                        } ?>
                                                    </td>
                                                   
                                                    
                                                    <td>
                                                        <?php if (!empty($appl->category)) {
                                                            echo $appl->category;
                                                        } ?>
                                                    </td>
                                                    
                                                   
                                                    <td>
                                                        <?php if (!empty($appl->cat_score)) {
                                                            echo $appl->cat_score;
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <?php if (!empty($appl->cat_percentile)) {
                                                            echo $appl->cat_percentile;
                                                        } ?>
                                                    </td>
                                                    <td><?php if (!empty($appl->call_int_status)) {
                                                            if( $appl->call_int_status=='Y'){
                                                                echo "Call For Interview";
                                                            }
                                                        } ?></td>
                                                     <td><?php if (!empty($appl->admin_decision_status)) {
                                                           if($appl->admin_decision_status=='CI'){
                                                              echo "Data Synchronized"; 
                                                           }
                                                        } ?></td>
                                                
                                                </tr>
                                            <?php $i++;
                                            } ?>
                                        <?php } 
                                        else 
                                        { ?>
                                           
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>     
                        <div class="row">
                            <div class="col-md-4">
                                <center>
                                <!-- <button style="width: 100%" name="approve_all" id="approve_all" class="btn btn-info">
                                    Approve All
                                </button> -->
                                <center><input Type="checkbox" name="click" id="syncheck" /> Select All</center>
                             <button class="btn btn-info" style="width: 100%" id="get_syn_row"><i class="fa fa-thumbs-up"></i>Click here to
                                 Synchronize</button>
                              </center>
                                  
                            </div>

                        </div>                 
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="Section4">
                        <h3>View Synchronized interview</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <table id="mba_list_s_v" class="govind table-responsive" >
                                    <thead>
                                        <tr>
                                        <th>SI No.</th>
                                            <th>Registration No.</th>
                                            <th>Application No.</th>
                                            <th>Program</th>
                                            <th style="text-align: center;">Name</th>
                                            <th style="text-align: center;">Email</th>
                                            <th>Category</th>
                                            <th>CAT Percentile</th>
                                            <th>Cat Score</th>
                                            <th>Component Score 1</th>
                                            <th>Component Score 2</th>
                                            <th>Component Score 3</th>
                                            <th>Component Score 4</th>
                                            <th>Component Score 5</th>
                                            <th>Total Score </th>
                                            <th>Status</th>
                                            <th>Admin Decision</th>

                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <?php
                                        $i = 1;
                                        if (!empty($Synchronize_app_view)) {
                                            foreach ($Synchronize_app_view as $appl) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td>
                                                        <?php if (!empty($appl->registration_no)) {
                                                            echo $appl->registration_no;
                                                        } ?>
                                                    </td>
                                                    <td style="padding-right: 10px">
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
                                                        <?php if (!empty($appl->name)) {
                                                            echo $appl->name;
                                                        } ?>
                                                    </td>
                                                    
                                                    <td>
                                                        <?php if (!empty($appl->email)) {
                                                            echo $appl->email;
                                                        } ?>
                                                    </td>
                                                   
                                                    <td>
                                                        <?php if (!empty($appl->category)) {
                                                            echo $appl->category;
                                                        } ?>
                                                    </td>
                                                    
                                                    <td>
                                                        <?php if (!empty($appl->cat_score)) {
                                                            echo $appl->cat_score;
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <?php if (!empty($appl->cat_percentile)) {
                                                            echo $appl->cat_percentile;
                                                        } ?>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><?php if (!empty($appl->call_int_status)) {
                                                            if( $appl->call_int_status=='Y'){
                                                                echo "Call For Interview";
                                                            }
                                                        } ?></td>
                                                     <td><?php if (!empty($appl->admin_decision_status)) {
                                                           if($appl->admin_decision_status=='CI'){
                                                              echo "Data Synchronized"; 
                                                           }
                                                        } ?></td>
                                                
                                                </tr>
                                            <?php $i++;
                                            } ?>
                                        <?php } 
                                        else 
                                        { ?>
                                            
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                       
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        
       // $('#mba_list').DataTable();
        $('#mba_list_m').DataTable( {
            
            dom: 'Bfrtip',
            buttons: [
            // 'copyHtml5',
            'excelHtml5',
            // 'csvHtml5',
            // 'pdfHtml5'
            ]
            

         } );
         $('#mba_list_c_i').DataTable({
            dom: 'Bfrtip',
            buttons: [
            // 'copyHtml5',
            'excelHtml5',
            // 'csvHtml5',
            // 'pdfHtml5'
            ]
         });
         $('#mba_list_s_v').DataTable({
            dom: 'Bfrtip',
            buttons: [
            // 'copyHtml5',
            'excelHtml5',
            // 'csvHtml5',
            // 'pdfHtml5'
            ]
         });

        $('#mba_list_v').DataTable();

        
         $("#checkAll").change(function () {
            $("input:checkbox").prop('checked', $(this).prop("checked"));
         });

         $('#get_row_val').click(function() {
                var store=[];
                $('#mba_list_m tr').filter(':has(:checkbox:checked)').each(function() {
                    // this = tr
                    $tr = $(this);
                    var p=this.id;  
                    $('td', $tr).each(function(index,val) {
                    if(index==3)
                    { 
                        var m= $(this).text();
                        var o= $.trim(m);
                        store.push(o);
                        
                    }
                        // If you need to iterate the TD's
                    });  
                    //get row values
                    
                });

                if (store.length === 0)
                {
                    alert("you have not selected checkbox");
                    return false;
                }

                if (confirm("Do you want to Approve All the selected applicant!"))
                {
                    console.log(store);
                    // return false;
                    $.ajax({
                        url: "<?Php echo base_url(); ?>index.php/admission/admin/dashboard/single_approve",
                        type: "POST",
                        //dataType:'html',
                        data: {"approve": store},
                        success: function (data)                    
                        {     
                            // $('#msg').html(data);
                            // console.log(data);
                            $('input:checkbox:checked').prop('checked', false);
                            window.location.href = "<?Php echo base_url(); ?>index.php/admission/admin/dashboard/sink_data_for_interview";
                            // var k="<?Php echo base_url(); ?>index.php/recruitment/NfrReport";
                            alert(data);
                            return false;
                            //var jsondata = $.parseJSON(data)
                            
                        }
                    });
                }
                else 
                {
                 return false;
                }   

            });
             
            $("#syncheck").change(function () {

             $(".p input:checkbox").prop('checked', $(this).prop("checked"));

            });
            $('#get_syn_row').click(function() {
            var store=[];
            
            $('#mba_list_v tr').filter(':has(:checkbox:checked)').each(function() {
                // this = tr
               
                $tr = $(this);
                var p=this.id;
                
                
                $('td', $tr).each(function(index,val) {
                if(index==3)
                { 
                    var m= $(this).text();
                    var o= $.trim(m);
                    store.push(o);
                    
                }
                    // If you need to iterate the TD's
                });
                
                
                //get row values
                
            });
            if (store.length === 0)
            {
                alert("you have not selected checkbox");
                return false;
            }
            if (confirm("Do you want to Synchronized the selected applicant number!"))
                {
                    console.log(store);
                    // return false;
                    $.ajax({
                        url: "<?Php echo base_url(); ?>index.php/admission/admin/dashboard/call_for_interview_update_candidate_side",
                        type: "POST",
                        //dataType:'html',
                        data: {"approve": store},
                        success: function (data)                    
                        {     
                            // $('#msg').html(data);
                            console.log(data);
                            $('input:checkbox:checked').prop('checked', false);
                            //window.location.href = "<?Php echo base_url(); ?>index.php/admission/admin/dashboard/sink_data_for_interview";
                            // var k="<?Php echo base_url(); ?>index.php/recruitment/NfrReport";
                            alert(data);
                            return false;
                            //var jsondata = $.parseJSON(data)
                            
                        }
                    });
                }
                else 
                {
                 return false;
                }   

            });
    });

</script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
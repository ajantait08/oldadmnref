<style>
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
<div class="pull-left" style="float:right;"><a href="<?php echo base_url() . "assets/csv_sample/sample.csv"; ?>">Download CSV Sample</a></div>
<?php if($this->session->flashdata('msg_alert')){?>
<div class="alert alert-success alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?php echo $this->session->flashdata('msg_alert')?>
</div> 
<?php }?>


<form id="submitbtn" action="<?php echo base_url() . "index.php/admission/admin/dashboard/upload_csv" ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
    <hr>
    <div class="row">
        <div class="col-md-3 offset-md-3">
            <div class="form-group">
                <label for="admn_no">Upload CSV File<small> (only CSV)</small>:</label>
                <input type="file" name="upload_csv" id="upload_csv"  class="form-control-file">
            </div>
        </div>
        <div class="col-md-5">
            <div style="padding-top: 2px;">
                <button type="button" id="btnsubmit"class="btn btn-primary">Import Data</button>
            </div>
        </div>
    </div>
    <hr>
</form>
<div class="row">
   <div class="col-md-12">
        <table id="mba_list" class="govind table-responsive" >
            <thead>
                <tr>
                <th>SI No.</th>
                    <th>Registration No.</th>
                    <th>Application No.</th>
                    <th>Program</th>
                    <th style="text-align: center;">Name</th>
                    <th style="text-align: center;">Email</th>
                    <th>Mobile No.</th>
                    <th>D.O.B</th>
                    <th>Category</th>
                    <th>Gender</th>
                    <th>CAT Percentile</th>
                    <th>Cat Score</th>
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
                            <td style="padding-right: 10px">&nbsp; &nbsp; &nbsp;
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
                                <?php if (!empty($appl->category)) {
                                    echo $appl->category;
                                } ?>
                            </td>
                            
                            <td>
                                <?php if (!empty($appl->gender)) {
                                    echo $appl->gender;
                                } ?>
                            </td>
                            <td>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                                <?php if (!empty($appl->cat_score)) {
                                    echo $appl->cat_score;
                                } ?>
                            </td>
                            <td>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                                <?php if (!empty($appl->cat_percentile)) {
                                    echo $appl->cat_percentile;
                                } ?>
                            </td>
                        
                        </tr>
                    <?php $i++;
                    } ?>
                <?php } 
                else 
                { ?>
                    <tr>
                        <td colspan="24" style="text-align: center;color:red;"><strong>No Data Avaliable</strong></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
  $( document ).ready(function() {

    $("#btnsubmit").click(function()
    {
        if( document.getElementById("upload_csv").files.length == 0 ){
          alert("Please Choose File");
          return false;
        }

        var file_data = $('#upload_csv').prop('files')[0]; 
        var match       = ["application/csv"]; 
        var fileSize    = file_data.size; 
        var maxSize     = 1*1024*1024;
        var fileType    = file_data.type;
        var ext=file_data.name.substring(file_data.name.lastIndexOf('.') + 1);
        if(ext == "CSV" || ext == "csv")
        {
             $("#submitbtn").submit();
        }
        else
        {
            alert("File type should be in CSV format");
            document.getElementById("upload_csv").value='';
            return false;
        }
       
    })
    
  }); 
</script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        // $('#mba_list').DataTable();
        $('#mba_list').DataTable( {
            
            dom: 'Bfrtip',
            buttons: [
            // 'copyHtml5',
            'excelHtml5',
            // 'csvHtml5',
            // 'pdfHtml5'
            ]
            

         } );
    });

</script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
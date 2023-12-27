
</section>
  </div><!-- Content Wrapper. Contains page content end -->
  <footer class="main-footer container">
    <strong>Copyright &copy; <a href="">NFR ADMIN</a>.</strong>
    All rights reserved.
  </footer>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  <!-- /.control-sidebar -->
<!-- ./wrapper -->

<!-- jQuery -->

<!-- AdminLTE App -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>themes/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>themes/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>themes/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>themes/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>themes/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>themes/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?php echo base_url();?>themes/plugins/datatables-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>themes/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url();?>themes/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>themes/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>themes/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url();?>themes/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>themes/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>themes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->

<!-- ChartJS -->
<script src="<?php echo base_url();?>themes/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>themes/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url();?>themes/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url();?>themes/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>themes/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url();?>themes/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url();?>themes/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url();?>themes/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url();?>themes/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url();?>themes/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- <script>
  $.widget.bridge('uibutton', $.ui.button)
</script> -->
<!-- AdminLTE App -->
<!-- <script src="https://nfrdev.iitism.ac.in/themes/dist/js/adminlte.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="https://nfrdev.iitism.ac.in/themes/dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>themes/dist/js/demo.js"></script>
<script src="<?php echo base_url();?>themes/dist/js/adminlte.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>themes/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
  $(function () {
    $(document).ready(function()
     {
       $('#example11').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel' 
        ]
         } );
      } );
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": false,
      "autoWidth": true,
      "responsive": false,
      "scrollX": true,
      dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel'
        ]
    });
  });

  // document.getElementById("Print").onclick = function () 
  // {
  //   printElement(document.getElementById("printThis"));
  // };

function printElement(elem) {
  var domClone = elem.cloneNode(true);

  var $printSection = document.getElementById("printSection");

  if (!$printSection) {
      var $printSection = document.createElement("div");
      $printSection.id = "printSection";
      document.body.appendChild($printSection);
  }

  $printSection.innerHTML = "";
  $printSection.appendChild(domClone);
  window.print();
}
</script>
</script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/admin_post.js">
  // checkpost();
</script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/short_namepost.js">
  // checkpost();
</script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/advertisment.js">
  // checkpost();
</script>
<script type="text/javascript">
   $("#listofpost").hide();
   $("#listofessqual").hide();
// var optionValu =[];
// $('#messt_qual option').each(function(){
//    if($.inArray(this.value, optionValu) >-1){
//       $(this).remove()
//    }else{
//       optionValu.push(this.value);
//    }
// });
/////////////////////////////////////////////////////////////////////// 
$( document ).ready(function() {  
    $('#esst_qual').change(function () {
      var post_id = $(this).val();
      $.ajax({
          url: "<?Php echo base_url(); ?>index.php/recruitment/post_essentail_qualification/get_essential_qualification_by_post_id",
          type: "POST",
          //dataType:'html',
          data: {"pst_id": post_id},
          success: function (data)                    
          {    
             
              var jsondata = $.parseJSON(data);
              $('#Tableessent tbody').html('');
              num=1;
              $.each(jsondata.essential_list, function (key, value) {
               
                   $('#Tableessent tbody').append('<span>'+num+"." + value.essential_qualifaiction +"<br>"+  '</span>');
                  num++;
               
              });
               $("#listofessqual").show();
          }
      });
  });
});
/////////////////////////////////////////////////////////////////////// 
$( document ).ready(function() {
   
    $('#advertno').change(function () {
      var adv_id = $(this).val();
      $.ajax({
          url: "<?Php echo base_url(); ?>index.php/recruitment/Advertisement/get_post_nameby_advid",
          type: "POST",
          //dataType:'html',
          data: {"advt_id": adv_id},
          success: function (data)                    
          {    
              var jsondata = $.parseJSON(data);
              $('#Tableadvt tbody').html('');
              num=1;
              $.each(jsondata.postname, function (key, value) {
               
                   $('#Tableadvt tbody').append('<span>'+num+"." +value.post_name + "<br>"+ '</span>');

                  num++;
               
              });
               $("#listofpost").show();
          }
      });
  });
});

</script>
<script type="text/javascript">
  $( document ).ready(function() {
    $('#adv_no').change(function () {
      var advid = $(this).val();
      //alert(advid);
      $.ajax({
          url: "<?Php echo base_url(); ?>index.php/recruitment/User_details/get_post_byadv_id",
          type: "POST",
          //dataType:'html',
          data: {"adv_no": advid},
          success: function (data)                    
          {  
              
              var jsondata = $.parseJSON(data);
              $('#post_name').html('');
              $('#post_name').html('<option value="">--Please select post name--</option>');
              $.each(jsondata.post_list, function (key, value) {
                  $('#post_name').append($('<option value=" ">--Please select post name--</option>')
                                  .attr("value", value.post_name)
                                  .text(value.post_name));

              });
          }
      });
  });

   $("#checkvalue").click(function(){
    var adv=$("#adv_no").val();
     var post=$("#post_name").val();
     if(adv=='')
     {
      alert("Pelase select Advertisement");
      return false;
     }
     if(post=='')
     {
      alert("Pelase select post");
      return false;
     }
   })
});
</script>
<script type="text/javascript">
  $( document ).ready(function() {
    $('#adv_no2').change(function () {
      var advid = $(this).val();
      //alert(advid);
      $.ajax({
          url: "<?Php echo base_url(); ?>index.php/recruitment/User_details/get_post_byadv_id",
          type: "POST",
          //dataType:'html',
          data: {"adv_no": advid},
          success: function (data)                    
          {  
              
              var jsondata = $.parseJSON(data);
              $('#post_name2').html('');
              $('#post_name2').html('<option value="">--Please select post name--</option>');
              $.each(jsondata.post_list, function (key, value) {
                  $('#post_name2').append($('<option value=" ">--Please select post name--</option>')
                                  .attr("value", value.post_name)
                                  .text(value.post_name));
              });
          }
      });
  });

   $("#checkvalue").click(function(){
    var adv=$("#adv_no").val();
     var post=$("#post_name").val();
     if(adv=='')
     {
      alert("Pelase select Advertisement");
      return false;
     }
     if(post=='')
     {
      alert("Pelase select post");
      return false;
     }
   })
});
</script>
<script type="text/javascript">
     $(document).ready(function()
     { 
       $("#exam").css("float", "left");
       $('#example11').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel' 
        ]
         } );
      } );
   
    $('#exam').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      // "info": false,
      // "autoWidth": true,
      // "responsive": false,
      "scrollY": false,
      "scrollX": true,
      "paging": true,
      // "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": false,
      //  dom: 'Bfrtip',
      //   buttons: [ 
      //       {
      //           extend: 'copyHtml5',
      //           messageTop: 'INDIAN INSTITUTE OF TECHNOLOGY (INDIAN SCHOOL OF MINES), DHANBAD',
      //           exportOptions: {
      //               columns: [  0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ]
      //           }
      //       },
      //       {
      //           extend: 'excelHtml5',
      //           messageTop: 'INDIAN INSTITUTE OF TECHNOLOGY (INDIAN SCHOOL OF MINES), DHANBAD',
      //           exportOptions: {
      //                columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13 ]
      //           }
      //       },
      //       {
      //           extend: 'pdfHtml5',
      //           orientation: 'landscape',
      //           pageSize: 'LEGAL',
      //            messageTop: 'INDIAN INSTITUTE OF TECHNOLOGY (INDIAN SCHOOL OF MINES), DHANBAD',
      //           exportOptions: {
      //               columns: [  0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ]
      //           }
      //       },
      //       'colvis'
      //   ]
      // dom: 'Bfrtip',
      //   buttons: [
      //     'copy', 'csv', 'excel','colvis'
      //   ]
      // dom: 'Bfrtip',
      //   buttons: [
      //       {
      //           extend: 'print',
      //           customize: function ( win ) {
      //               $(win.document.body)
      //                   .css( 'font-size', '10pt' )
      //                   .prepend(
      //                       '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
      //                   );
 
      //               $(win.document.body).find( 'table' )
      //                   .addClass( 'compact' )
      //                   .css( 'font-size', 'inherit' );
      //           }
      //       }
      //   ]

    });
  </script>
  <script type="text/javascript">
     $("#change_status").hide();
     $("#rejected_reason").hide();
     $("#otherdiv").hide();
     $( document ).ready(function(){
     $("#status").change(function(){
      var value=$("#status").val();
      if(value=='')
      {
        $("#rejected_reason").hide();
        $("#change_status").hide();
        $('input:checkbox').prop('checked', false);
        $("#otherdiv").hide();
      }
      else if(value==3)
      {

        $("#rejected_reason").show();
        $("#change_status").show();
        $("#otherdiv").hide();
        $('input:checkbox').prop('checked', false);
      }
      else 
      {  
        $("#rejected_reason").hide();
        $("#change_status").show();
        $("#otherdiv").hide();
        $('input:checkbox').prop('checked', false);
      }

    });

    $("#checkAll").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
    });
   
   
  $("#updatestatus").on("submit", function(){
  if($("#checkbox1").is(":checked")) 
  {
    $("#checkbox1").val("Age limit crossed");
  }
  else
  {
    $("#checkbox1").val("NO");
  }
  if($("#checkbox2").is(":checked")) 
  {
    $("#checkbox2").val("Inadequate relevant experience at desired level");
  }
  else
  {
    $("#checkbox2").val("NO");
  }
  if($("#checkbox3").is(":checked")) 
  {
    $("#checkbox3").val("Does not possess essential educational qualification");
  }
  else
  {
    $("#checkbox3").val("NO");
  }
  if($("#checkbox4").is(":checked")) 
  {
    $("#checkbox4").val("Fee not paid");
  }
  else
  {
    $("#checkbox4").val("NO");
  }
  if($("#checkbox5").is(":checked")) 
  {
    $("#checkbox5").val("Incomplete application");
  }
  else
  {
    $("#checkbox5").val("NO");
  }

  if (confirm("Do you want to submit!")) {
     return true;
   } else 
   {
     return false;
   } 
})
  
   $('#checkother').click(function() 
   {  
    if($(this).is(":checked")) 
    {
      $('#checkother').val("Yes")
      $("#otherdiv").show();
      $("#otherop").attr('requried','requried');
      
    }
    else
    {
      $("#otherdiv").hide();
      $("#otherop").attr('requried',false);
    }
    // alert("jkklajsdf");

   });
     
  });
  </script>
  <script type="text/javascript">
 $("#reportsubmit").on("submit", function(){
 var adv=$("#adv_no").val();
 var st=$("#status").val();
 if(adv=='' && st=='')
 {
   alert("please Select Advertisment No and Status.!");
   return false;
 }
 if(st=='')
 {
   alert("please Select Status.!");
   return false;
 }
 if(adv=='')
 {
   alert("please Select Advertisment No.!");
   return false;
 }

})
 $('#get_row_val').click(function() {
  var store=[];
  
  $('#exam tr').filter(':has(:checkbox:checked)').each(function() {
    // this = tr
    
    $tr = $(this);
    var p=this.id;
    
    $('td', $tr).each(function(index,val) {
      if(index==1)
      { 
        var m= $(this).text();
        store.push(m);
        
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
  if (confirm("Do you want to Approve All Candicate!"))
    {
      $.ajax({
          url: "<?Php echo base_url(); ?>index.php/recruitment/NfrReport/single_approve",
          type: "POST",
          //dataType:'html',
          data: {"approve": store},
          success: function (data)                    
          {     
              $('input:checkbox:checked').prop('checked', false);
              window.location.href = "<?Php echo base_url(); ?>index.php/recruitment/NfrReport";
              var k="<?Php echo base_url(); ?>index.php/recruitment/NfrReport";
              alert(data);
            //var jsondata = $.parseJSON(data)
            
          }
      });
    }
    else 
    {
      return false;
    }   

});
</script>
<script type="text/javascript">
$( document ).ready(function() {

  $('#approve_all').click(function() {
    
    if (confirm("Are you sure you wnat to approve all the candicate!")) {
      var approve="approve all";
      $.ajax({
          url: "<?Php echo base_url(); ?>index.php/recruitment/NfrReport/approve_all",
          type: "POST",
          //dataType:'html',
          data: {"approve": approve},
          success: function (data)                    
          {    
            
            
            alert(k);
            //var jsondata = $.parseJSON(data);
            
          
          }
      });
    }
      else 
    {
      return false;
    } 
     
   });
  //commnet synchronize 
    //  $('#synchronized').click(function() {
    //   if (confirm("Do you want to synchronize All Candicate!")) {
    //     var approve="synchronize all";
    //     $.ajax({
    //         url: "<?Php echo base_url(); ?>index.php/recruitment/NfrReport/synchronize",
    //         type: "POST",
    //         //dataType:'html',
    //         data: {"approve": approve},
    //         success: function (data)                    
    //         {    

    //           alert(data);
    //           //var jsondata = $.parseJSON(data);

    //         }
    //     });
    //   }
    //     else 
    //   {
    //     return false;
    //   } 
    //  });
    //commnet synchronize 

});
</script>

<script>
  $('#synchronized').click(function() {
  var store=[];
  $('#exam tr').filter(':has(:checkbox:checked)').each(function() {
    // this = tr
    $tr = $(this);
    var p=this.id;
    $('td', $tr).each(function(index,val) {
      if(index==1)
      { 
        var m= $(this).text();
        store.push(m);
        
      }
        // If you need to iterate the TD's
    });
    //get row values    
  });
  if (store.length === 0)
  {
    alert("You have not selected checkbox");
    return false;
  }
  if (confirm("Do you want to Synchronize All Candicate!"))
  {
    $.ajax({
        url: "<?Php echo base_url(); ?>index.php/recruitment/NfrReport/single_all_synchronize",
        type: "POST",
        //dataType:'html',
        data: {"approve": store},
        success: function (data)                    
        {     
          $('input:checkbox:checked').prop('checked', false);
          window.location.href = "<?Php echo base_url(); ?>index.php/recruitment/NfrReport";
          alert(data);
          //var jsondata = $.parseJSON(data) 
        }
    });
  }
  else 
  {
    return false;
  }   
});

 $("#appl_number").change(function(){
  
      var check=$("#appl_number").val();
      // alert(check);
      $.ajax({
          url: "<?Php echo base_url(); ?>index.php/recruitment/NfrReport/check_appno_reconsideration",
          type: "POST",
         dataType:'json',
          data:{"value": check},
          success: function (data)                    
          {  
             if(data.output=='havenot')
             {
    
              alert("Decision is not Yet approved please check in shortlist or rejected list for this candidates and approve it.");
              $("#appl_number").val('');
              return false;
             }
             else
             {
               return true;
             }

          }
      });

    })
    $("#formrecon").submit(function(){

      var app= $("#appl_number").val();
      var reason= $("#recon_reason").val();
      if(app=='')
      {
        alert("Please Enter the application no!");
        return false;
      }
      if(reason=='')
      {
        alert("Please Enter the Reason for Re-consideration!");
        return false;
      }

     });

   
</script>
<script>
$(document).ready(function() {

//   $("#formrecon").submit(function(){
//   alert("Submitted");
//   return false;
// });

})

</script>
</body>
</html>
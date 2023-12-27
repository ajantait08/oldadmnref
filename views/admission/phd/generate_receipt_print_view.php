<?php
// print_r($hidden['f_year']);
// exit;
?>
<style>
body{ font-size: 11px; }
h2{ font:16px; font-weight:bold;}
table{ width:100%;}
.form-control{ width:50px;}
/* table {
    border-collapse: collapse;
} */
/* .header { position: fixed; left: 0px; top: -100px; right: 0px; height: 150px; text-align: center; } */
</style>

   <?php
  if(!empty($receipt_payment))
                          {

                              ?>
<div class="header" >
<table border="0">
 <tr>
 <td align="center"><img src="<?php echo base_url() ?>assets/images/ism/ismlogo.png" width="120" height="105" /></td>
 </tr>
 <tr>
   <td align="center"><div style="font-size:18px; font-weight:bold;">INDIAN INSTITUTE OF TECHNOLOGY (ISM) - 826004</div></td>
 </tr>
</table>

<table border="0">
 <tr>
   <td>&nbsp;</td>
   <td align="center" >PAYMENT NEWADMISSION</td>
   <td align="right">&nbsp;</td>
 </tr>
 <tr>
   <td width="32%">&nbsp;</td>
   <td width="39%" align="center" >Payment Receipt
   </td>
   <td width="29%" align="right">&nbsp;</td>
 </tr>
</table>
<table border="0">
 <tr>
   <td>&nbsp;</td>
   <td  >&nbsp;</td>
   <td >&nbsp;</td>
   <td>&nbsp;</td>
 </tr>
 <tr>
   <td width="25%"></td>
   <td width="25%"  ></td>
   <td width="25%" align="right" >Date:-</td>
   <td width="25%"><?php echo date('d-M-Y'); ?></td>
 </tr>

</table>
</div>
<br>

 <table class="anuj" width="100%" style="font-size: 12px;" border="1"  >
  <thead>
  </thead>
  <tbody>
                                        <tr>
  <td width="50%">Order ID : <strong><?php echo $receipt_payment['order_no']; ?></strong></td>
  <td width="50%">Payment :
  <strong style="
  <?php if($receipt_payment['fee_status_msg']=='success' || $receipt_payment['fee_status_msg']=='success') { echo 'color: #4BB543'; } else { echo 'color: #CA0B00'; } ?>">
  <?php
 if($receipt_payment['fee_status_msg']=='success')
 {
     echo "Payment successful";
 }
//  else if($receipt_payment['fee_status_msg']=='success')
//  {
//     echo "Payment successful but not yet settled"; // Payment successful but not yet settled
//  }
   ?>
  </strong></td>
                                        </tr>
                                        <tr>
  <td width="50%">Name : <strong><?php echo $receipt_payment['name']; ?></strong></td>
  <td width="50%">Admission type : <strong><?php echo strtoupper($receipt_payment['admn_type']); ?></strong></td>
                                        </tr>
                                        <tr>
  <td width="50%">App id : <strong><?php echo $receipt_payment['reg_id']; ?></strong></td>
  <td width="50%">Contact no : <strong><?php echo $receipt_payment['contact_no']; ?></strong></td>
                                        </tr>
                                        <tr>
  <td width="50%">Email id : <strong><?php echo $receipt_payment['email']; ?></strong></td>
  <td width="50%">D.O.B : <strong><?php echo date("d-m-Y", strtotime($receipt_payment['dob'])); ?></strong></td>
                                        </tr>
                                        <tr>
  <td width="50%">Course : <strong><?php echo strtoupper($receipt_payment['course_id']); ?></strong></td>
  <td width="50%">Branch : <strong><?php echo strtoupper($receipt_payment['branch_id']); ?></strong></td>
                                        </tr>
                                        <tr>
  <td width="50%">Payment Date : <strong><?php echo date('d-F-Y', strtotime($receipt_payment['payment_date']));  ?></strong></td>
  <td width="50%">Amount : <strong><?php echo $receipt_payment['fee_to_be_paid']; ?></strong></td>
                              </tr>

  </tbody>
</table>
                             <?php
                   }
                           ?>

<table border="0">
 <tr>
    <td>&nbsp;</td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
 </tr>
</table>
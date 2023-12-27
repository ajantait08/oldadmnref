<!DOCTYPE html>
<html>

<head>
    <title>Ph.D (Part Time) Payment Receipt</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <table style="width:100%" border="0">
        <tr>
            <td align="center"><img src="<?php echo base_url() ?>assets/img/ismlogo.png" width="120" height="105" /></td>
        </tr>
        <tr>
            <td align="center">
                <div style="font-size:18px; font-weight:bold;">INDIAN INSTITUTE OF TECHNOLOGY (ISM) - 826004</div>
            </td>
        </tr>
        <tr>
            <td align="center">Payment Ph.D (Part Time) Application Fee</td>
        </tr>
        <tr>
            <td align="center">Payment Receipt</td>
        </tr>
    </table>
    <table style="width:100%" border="0">
        <tr>
            <td align="right">Date:- <?php echo date('d-M-Y'); ?></td>
        </tr>

    </table>
    <table style="width:100%" border="1">
        <tr>
            <td>Order ID: <?php echo $application[0]->order_id; ?></td>
            <td>Payment: <?php if ($application[0]->payment_status == 'Y') { ?>
                    <span style="color:green"> <?php echo "Payment Successful" ?></span>
                <?php } else { ?>
                    <span style="color:red"> <?php echo " Not Completed" ?></span>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td>Name: <?php echo $application[0]->first_name . " " . $application[0]->middle_name . " " . $application[0]->last_name;  ?></td>
            <td>Application Type: <?php echo $application[0]->appl_type; ?></td>
        </tr>
        <tr>
            <td>Registration No.: <?php echo $application[0]->registration_no; ?></td>
            <td>Contact No.: <?php echo $application[0]->mobile; ?></td>
        </tr>
        <tr>
            <td>Email ID: <?php echo $application[0]->email; ?></td>
            <td>D.O.B: <?php echo date("d-m-Y", strtotime($application[0]->dob)); ?></td>
        </tr>
        <tr>
            <td>Course: Ph.D.</td>
            <td>Transaction ID: <?php echo $application[0]->transaction_id; ?></td>
        </tr>
        <tr>
            <td>Payment Date: <?php echo date("d-m-Y", strtotime($application[0]->payment_date_time)); ?></td>
            <td>Payment Amount: Rs. <?php echo $application[0]->application_fee; ?></td>
        </tr>
    </table>
</body>

</html>
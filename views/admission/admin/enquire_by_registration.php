<table class='mba-list table-bordered table-hover' id='customtbl' style="width:100%;">
    <thead>
        <tr>
            <th>Sl. No.</th>
            <th>Name</th>
            <th>Registartion Number</th>
            <th>Email ID</th>
            <th>Mobile No.</th>
            <th>Order Number</th>
            <th>Order Date and Time of Payment</th>
            <th>Present Status</th>
            <th>Order Amount</th>
            <th>Payment Amount</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        if (!empty($transaction)) {
            foreach ($transaction as $value) { ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td>
                        <?php if (!empty($value['name'])) {
                            echo $value['name'];
                        } ?>
                    </td>
                    <td>
                        <?php if (!empty($value['registartion_no'])) {
                            echo $value['registartion_no'];
                        } ?>
                    </td>
                    <td>
                        <?php if (!empty($value['email_id'])) {
                            echo $value['email_id'];
                        } ?>
                    </td>
                    <td>
                        <?php if (!empty($value['mobile'])) {
                            echo $value['mobile'];
                        } ?>
                    </td>
                    <td>
                        <?php if (!empty($value['merchant_order_number'])) {
                            echo $value['merchant_order_number'];
                        } ?>
                    </td>
                    <td>
                        <?php if (!empty($value['order_booking_date_time'])) {
                            echo $value['order_booking_date_time'];
                        } ?>
                    </td>
                    <td>
                        <?php if (!empty($value['order_status'])) {
                            echo $value['order_status'];
                        } ?>
                    </td>
                    <td>
                        <?php if (!empty($value['order_amount'])) {
                            echo $value['order_amount'];
                        } ?>
                    </td>
                    <td>
                        <?php if (!empty($value['payout_amount'])) {
                            echo $value['payout_amount'];
                        } ?>
                    </td>
                </tr>
            <?php $i++;
            }
        } else { ?>
            <tr>
                <td colspan='10' style='color:red; text-align:center;'><b>No Records Found.</b></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).bind("contextmenu", function(e) {
        return false;
    });
</script>
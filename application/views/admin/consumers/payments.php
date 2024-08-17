<?php
// SQL Query to get the bill details
$query = "
                            SELECT 
                            consumer_monthly_bills.*, 
                            billing_months.billing_month,
                            billing_months.billing_due_date
                            FROM consumer_monthly_bills
                            INNER JOIN billing_months 
                            ON billing_months.billing_month_id = consumer_monthly_bills.billing_month_id
                            WHERE 
                            consumer_monthly_bills.consumer_monthly_bill_id = ? 
                            ";
$row = $this->db->query($query, [$input->consumer_monthly_bill_id])->row();
?>
<strong><?php echo date('M', strtotime($row->billing_month)); ?>, <?php echo date('Y', strtotime($row->billing_month)); ?> Payalbes</strong>

<hr />
<table class="table table-bordered payable_table" id="consumer_monthly_bills_transposed">
    <tbody>

        <tr>
            <th style="background-color: lightgreen;">Payable Within Due Date: <br /> (<?php echo date("d M, Y", strtotime($row->billing_due_date)); ?>)</th>
            <th style="background-color: lightcoral;">Payable After Due Date <br /> (After <?php echo date("d M, Y", strtotime($row->billing_due_date)); ?>)</th>
            <th style="background-color: #A8BB7B;">Paid</th>
            <th style="background-color: #F74448;">Dues</th>
        </tr>
        <tr>
            <td style=" background-color: lightgreen;"><?php echo $row->payable_within_due_date; ?></td>
            <td style="background-color: lightcoral;"><?php echo $row->payable_after_due_date; ?></td>
            <td style="background-color: #A8BB7B;"><?php echo $row->paid; ?></td>
            <td style="background-color: #F74448;"><?php echo $row->dues; ?></td>
        </tr>

    </tbody>
</table>

<form id="payments" class="form-horizontal" enctype="multipart/form-data" method="post">
    <input type="hidden" name="payment_id" value="<?php echo $input->payment_id; ?>" />
    <input type="hidden" required id="consumer_monthly_bill_id" name="consumer_monthly_bill_id" value="<?php echo $input->consumer_monthly_bill_id; ?>" class="form-control">


    <div class="form-group row">
        <label for="payment_date" class="col-sm-4 col-form-label">Payment Date</label>
        <div class="col-sm-8">
            <input type="date" required id="payment_date" name="payment_date" value="<?php echo $input->payment_date; ?>" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="amount_paid" class="col-sm-4 col-form-label">Amount Paid</label>
        <div class="col-sm-8">
            <input type="text" required id="amount_paid" name="amount_paid" value="<?php echo $input->amount_paid; ?>" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="payment_method" class="col-sm-4 col-form-label">Payment Method</label>
        <div class="col-sm-8">
            <?php
            $options = array("Cash");
            foreach ($options as $value) {
            ?>
                <input <?php if ($value == $input->payment_method) { ?> checked <?php } ?> type="radio" required id="payment_method" name="payment_method" value="<?php echo $value; ?>"> <?php echo $value; ?>
            <?php } ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="notes" class="col-sm-4 col-form-label">Notes</label>
        <div class="col-sm-8">
            <input type="text" required id="notes" name="notes" value="<?php echo $input->notes; ?>" class="form-control">
        </div>
    </div>

    <div class="form-group row" style="text-align:center">
        <div id="result_response"></div>
        <?php if ($input->payment_id == 0) { ?>
            <button type="submit" class="btn btn-danger">Add Payment</button>
        <?php } else { ?>
            <button type="submit" class="btn btn-success">Update Payment</button>
        <?php } ?>
    </div>
</form>
</div>

<script>
    $('#payments').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url(ADMIN_DIR . "consumers/add_payment"); ?>', // URL to submit form data
            data: formData,
            success: function(response) {

                // Display response
                if (response == 'success') {
                    location.reload();

                } else {
                    $('#result_response').html(response);

                }

            }
        });
    });
</script>
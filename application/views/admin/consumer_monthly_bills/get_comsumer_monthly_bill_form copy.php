<form id="consumer_monthly_bills" class="form-horizontal" enctype="multipart/form-data" method="post">
    <input type="hidden" name="consumer_monthly_bill_id" value="<?php echo $input->consumer_monthly_bill_id; ?>" />
    <div class="form-group row">
        <label for="billing_month_id" class="col-sm-4 col-form-label">Billing Month Id</label>
        <div class="col-sm-8">
            <input type="text" required id="billing_month_id" name="billing_month_id" value="<?php echo $input->billing_month_id; ?>" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="consumer_id" class="col-sm-4 col-form-label">Consumer Id</label>
        <div class="col-sm-8">
            <input type="text" required id="consumer_id" name="consumer_id" value="<?php echo $input->consumer_id; ?>" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="meter_number" class="col-sm-4 col-form-label">Meter Number</label>
        <div class="col-sm-8">
            <input type="text" required id="meter_number" name="meter_number" value="<?php echo $input->meter_number; ?>" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="tariff_id" class="col-sm-4 col-form-label">tariff_id</label>
        <div class="col-sm-8">
            <input type="text" required id="tariff_id" name="tariff_id" value="<?php echo $input->tariff_id; ?>" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <label for="reading_date" class="col-sm-4 col-form-label">Reading Date</label>
        <div class="col-sm-8">
            <input type="date" required id="reading_date" name="reading_date" value="<?php echo $input->reading_date; ?>" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="last_reading" class="col-sm-4 col-form-label">Last Reading</label>
        <div class="col-sm-8">
            <input type="text" required id="last_reading" name="last_reading" value="<?php echo $input->last_reading; ?>" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="current_reading" class="col-sm-4 col-form-label">Current Reading</label>
        <div class="col-sm-8">
            <input type="text" required id="current_reading" name="current_reading" value="<?php echo $input->current_reading; ?>" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="unit_cosumed" class="col-sm-4 col-form-label">Unit Cosumed</label>
        <div class="col-sm-8">
            <input type="text" required id="unit_cosumed" name="unit_cosumed" value="<?php echo $input->unit_cosumed; ?>" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="rate" class="col-sm-4 col-form-label">Rate</label>
        <div class="col-sm-8">
            <input type="text" required id="rate" name="rate" value="<?php echo $input->rate; ?>" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="total" class="col-sm-4 col-form-label">Total</label>
        <div class="col-sm-8">
            <input type="text" required id="total" name="total" value="<?php echo $input->total; ?>" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="monthly_service_charges" class="col-sm-4 col-form-label">Monthly Service Charges</label>
        <div class="col-sm-8">
            <input type="text" required id="monthly_service_charges" name="monthly_service_charges" value="<?php echo $input->monthly_service_charges; ?>" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="tax_per" class="col-sm-4 col-form-label">Tax Per</label>
        <div class="col-sm-8">
            <input type="number" required id="tax_per" name="tax_per" value="<?php echo $input->tax_per; ?>" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="tax_rs" class="col-sm-4 col-form-label">Tax Rs</label>
        <div class="col-sm-8">
            <input type="number" required id="tax_rs" name="tax_rs" value="<?php echo $input->tax_rs; ?>" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="last_month_arrears" class="col-sm-4 col-form-label">Last Month Arrears</label>
        <div class="col-sm-8">
            <input type="text" required id="last_month_arrears" name="last_month_arrears" value="<?php echo $input->last_month_arrears; ?>" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="payable_within_due_date" class="col-sm-4 col-form-label">Payable Within Due Date</label>
        <div class="col-sm-8">
            <input type="number" required id="payable_within_due_date" name="payable_within_due_date" value="<?php echo $input->payable_within_due_date; ?>" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="payable_after_due_date" class="col-sm-4 col-form-label">Payable After Due Date</label>
        <div class="col-sm-8">
            <input type="number" required id="payable_after_due_date" name="payable_after_due_date" value="<?php echo $input->payable_after_due_date; ?>" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="payable" class="col-sm-4 col-form-label">Payable</label>
        <div class="col-sm-8">
            <input type="number" required id="payable" name="payable" value="<?php echo $input->payable; ?>" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="paid" class="col-sm-4 col-form-label">Paid</label>
        <div class="col-sm-8">
            <input type="text" required id="paid" name="paid" value="<?php echo $input->paid; ?>" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="dues" class="col-sm-4 col-form-label">Dues</label>
        <div class="col-sm-8">
            <input type="text" required id="dues" name="dues" value="<?php echo $input->dues; ?>" class="form-control">
        </div>
    </div>

    <div class="form-group row" style="text-align:center">
        <div id="result_response"></div>
        <?php if ($input->consumer_monthly_bill_id == 0) { ?>
            <button type="submit" class="btn btn-primary">Add Data</button>
        <?php } else { ?>
            <button type="submit" class="btn btn-primary">Update Data</button>
        <?php } ?>
    </div>
</form>
</div>

<script>
    $('#consumer_monthly_bills').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url(ADMIN_DIR . "consumer_monthly_bills/add_comsumer_monthly_bill"); ?>', // URL to submit form data
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
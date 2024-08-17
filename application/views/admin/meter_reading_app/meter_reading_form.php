<form id="consumer_monthly_bills" class="form-horizontal" enctype="multipart/form-data" method="post">
    <input type="hidden" name="consumer_monthly_bill_id" value="<?php echo $input->consumer_monthly_bill_id; ?>" />
    <input type="hidden" name="consumer_id" value="<?php echo $input->consumer_id; ?>" />
    <input type="hidden" name="billing_month_id" value="<?php echo $input->billing_month_id; ?>" />

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
        <label for="reading_date" class="col-sm-4 col-form-label">Reading Date</label>
        <div class="col-sm-8">
            <input type="date" required id="reading_date" name="reading_date" value="<?php echo $input->reading_date; ?>" class="form-control">
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
            url: '<?php echo site_url(ADMIN_DIR . "meter_reading_app/add_monthly_meter_reading"); ?>', // URL to submit form data
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
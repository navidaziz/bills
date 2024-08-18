
        <form id="billing_months" class="form-horizontal" enctype="multipart/form-data" method="post">
        <input type="hidden" name="billing_month_id" value="<?php echo $input->billing_month_id; ?>" />
        <div class="form-group row">
                            <label for="billing_month" class="col-sm-4 col-form-label">Billing Month</label>
                            <div class="col-sm-8">
                                <?php if($input->billing_month_id==0){
                                    $query = "SELECT billing_month FROM billing_months WHERE status=1";
                $active_month = $this->db->query($query)->row()->billing_month;
                $billing_month = $this->input->post('billing_month');

                // Calculate the next month after the active month
                $next_month = date("Y-m", strtotime($active_month . " +1 month"));
                               ?>
                            <input type="month" readonly="readonly" required  id="billing_month" name="billing_month" value="<?php echo $next_month; ?>" class="form-control">
                        <?php }else{ ?>
                             <input type="month" required  id="billing_month" name="billing_month" value="<?php echo $input->billing_month; ?>" class="form-control">
                        
                            <?php } ?>    
                        </div>
                            </div>
                            <div class="form-group row">
                            <label for="meter_reading_start" class="col-sm-4 col-form-label">Meter Reading Start</label>
                            <div class="col-sm-8">
                            <input type="date" required  id="meter_reading_start" name="meter_reading_start" value="<?php echo $input->meter_reading_start; ?>" class="form-control">
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="meter_reading_end" class="col-sm-4 col-form-label">Meter Reading End</label>
                            <div class="col-sm-8">
                            <input type="date" required  id="meter_reading_end" name="meter_reading_end" value="<?php echo $input->meter_reading_end; ?>" class="form-control">
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="billing_issue_date" class="col-sm-4 col-form-label">Billing Issue Date</label>
                            <div class="col-sm-8">
                            <input type="date" required  id="billing_issue_date" name="billing_issue_date" value="<?php echo $input->billing_issue_date; ?>" class="form-control">
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="billing_due_date" class="col-sm-4 col-form-label">Billing Due Date</label>
                            <div class="col-sm-8">
                            <input type="date" required  id="billing_due_date" name="billing_due_date" value="<?php echo $input->billing_due_date; ?>" class="form-control">
                            </div>
                            </div>
                            
        <div class="form-group row" style="text-align:center">
        <div id="result_response"></div>
        <?php if ($input->billing_month_id == 0) { ?>
        <button type="submit" class="btn btn-primary">Add Data</button>
        <?php }else{ ?>
            <button type="submit" class="btn btn-primary">Update Data</button>
            <?php } ?>
        </div>
        </form>
        </div>
        
       <script>
        $('#billing_months').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url(ADMIN_DIR . "billing_months/add_billing_month"); ?>', // URL to submit form data
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
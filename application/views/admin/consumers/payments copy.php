<div class="table-responsive">


    <table class="table table-bordered">
        <div id="result_response"></div>
        <thead>

            <tr>
                <th></th>
                <th>#</th>
                <th>Payment Date</th>
                <th>Amount Paid</th>
                <th>Payment Method</th>
                <th>Notes</th>
                <th>Action</th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th>
                    <form id="payments" class="form-horizontal" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="payment_id" value="0" />
                        <input type="hidden" required id="consumer_monthly_bill_id" name="consumer_monthly_bill_id" value="<?php echo $consumer_monthly_bill_id ?>" class="form-control">

                        <input type="date" required id="payment_date" name="payment_date" value="" class="form-control">
                </th>
                <th>
                    <input type="number" required id="amount_paid" name="amount_paid" value="" class="form-control">
                </th>
                <th>

                    <input checked type="radio" required id="payment_method" name="payment_method" value="CASH" class=""> Cash
                </th>
                <th>
                    <input type="text" required id="notes" name="notes" value="" class="form-control">
                </th>
                <th>
                    <button type="submit" class="btn btn-primary">Add Payment</button>
                    </form>
                </th>



            </tr>
        </thead>

        <tbody>
            <?php
            $count = 1;
            $query = "SELECT * FROM payments";
            $rows = $this->db->query($query)->result();
            foreach ($rows as $row) { ?>
                <tr>
                    <td><a href="<?php echo site_url(ADMIN_DIR . 'payments/delete_payments/' . $row->payment_id); ?>" onclick="return confirm('Are you sure? you want to delete the record.')">Delete</a> </td>
                    <td><?php echo $count++ ?></td>
                    <td><?php echo $row->payment_date; ?></td>
                    <td><?php echo $row->amount_paid; ?></td>
                    <td><?php echo $row->payment_method; ?></td>
                    <td><?php echo $row->notes; ?></td>
                    <td><button onclick="get_payment_form('<?php echo $row->payment_id; ?>')">Edit<botton>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <script>
        $('#payments').submit(function(e) {
            alert('add payment');
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url(ADMIN_DIR . "consumer_monthly_bills/add_payment"); ?>', // URL to submit form data
                data: formData,
                success: function(response) {
                    // Display response
                    if (response == 'success') {
                        //location.reload();
                        get_payments(<?php echo $consumer_monthly_bill_id; ?>)
                    } else {
                        $('#result_response').html(response);
                        //get_payments(consumer_monthly_bill_id);
                    }

                }
            });
        });
    </script>
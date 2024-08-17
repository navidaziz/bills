<!-- PAGE HEADER-->
<div class="row">
    <div class="col-sm-12">
        <div class="page-header">
            <!-- STYLER -->

            <!-- /STYLER -->
            <!-- BREADCRUMBS -->
            <ul class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?php echo site_url(ADMIN_DIR . $this->session->userdata("role_homepage_uri")); ?>"><?php echo $this->lang->line('Home'); ?></a>
                </li>
                <li>
                    <i class="fa fa-table"></i>
                    <a href="<?php echo site_url(ADMIN_DIR . "consumers/view/"); ?>"><?php echo $this->lang->line('Consumers'); ?></a>
                </li>
                <li><?php echo $title; ?></li>
            </ul>
            <!-- /BREADCRUMBS -->
            <div class="row">

                <div class="col-md-12">
                    <table class="table">
                        <thead>

                        </thead>
                        <tbody>

                            <tr>
                                <th><?php echo $this->lang->line('consumer_cnic'); ?></th>
                                <th><?php echo $this->lang->line('consumer_name'); ?></th>
                                <th><?php echo $this->lang->line('consumer_father_name'); ?></th>
                                <th><?php echo $this->lang->line('consumer_contact_no'); ?></th>
                                <th><?php echo $this->lang->line('consumer_address'); ?></th>
                                <th><?php echo $this->lang->line('consumer_meter_no'); ?></th>
                                <th><?php echo $this->lang->line('date_of_registration'); ?></th>
                                <th><?php echo $this->lang->line('Status'); ?></th>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo $consumer->consumer_cnic; ?>
                                </td>
                                <td>
                                    <?php echo $consumer->consumer_name; ?>
                                </td>
                                <td>
                                    <?php echo $consumer->consumer_father_name; ?>
                                </td>
                                <td>
                                    <?php echo $consumer->consumer_contact_no; ?>
                                </td>
                                <td>
                                    <?php echo $consumer->consumer_address; ?>
                                </td>
                                <td>
                                    <?php echo $consumer->consumer_meter_no; ?>
                                </td>
                                <td>
                                    <?php echo $consumer->date_of_registration; ?>
                                </td>
                                <td>
                                    <?php echo status($consumer->status); ?>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>



            </div>


        </div>
    </div>
</div>
<!-- /PAGE HEADER -->

<!-- PAGE MAIN CONTENT -->
<div class="row">



    <div class="col-md-12">
        <div class="box border blue" id="messenger">
            <div class="box-title">
                <h4><i class="fa fa-bell"></i> Monthly Bills</h4>
            </div>
            <div class="box-body">

                <div class="table-responsive">

                    <table class="table table-bordered table_small" id="consumer_monthly_bills">
                        <thead>
                            <tr>
                                <th></th>
                                <th>#</th>
                                <th>Year</th>
                                <th>Billing Month</th>
                                <th>Meter Number</th>
                                <th>Reading Date</th>
                                <th>Last Reading</th>
                                <th>Current Reading</th>
                                <th>Unit Cosumed</th>
                                <th>Rate</th>
                                <th>Total</th>
                                <th>Monthly Service Charges</th>
                                <th>Tax Per</th>
                                <th>Tax Rs</th>
                                <th>Last Month Arrears</th>
                                <th>Payable Within Due Date</th>
                                <th>Payable After Due Date</th>
                                <th>Paid</th>
                                <th>Dues</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $count = 1;
                            $query = "SELECT * FROM billing_months WHERE status=1";
                            $billing_months = $this->db->query($query)->result();
                            foreach ($billing_months as $billing_month) {
                            ?>
                                <?php

                                $query = "SELECT * FROM consumer_monthly_bills
                                WHERE  billing_month_id = '" . $billing_month->billing_month_id . "'
                                AND consumer_id = '" . $consumer->consumer_id . "'";
                                $row = $this->db->query($query)->row();
                                if ($row) {
                                ?>
                                    <tr>
                                        <td>
                                            <?php if ($row->status == 1) { ?>
                                                <a href="<?php echo site_url(ADMIN_DIR . 'consumer_monthly_bills/delete_comsumer_monthly_bill/' . $row->consumer_monthly_bill_id); ?>" onclick="return confirm('Are you sure? you want to delete the record.')">Delete</a>
                                            <?php } ?>
                                        </td>
                                        <td><?php echo $count++ ?></td>
                                        <td><?php echo date('Y', strtotime($billing_month->billing_month)); ?></td>
                                        <td><?php echo date('M', strtotime($billing_month->billing_month)); ?></td>

                                        <td><?php echo $row->meter_number; ?></td>
                                        <td><?php echo $row->reading_date; ?></td>
                                        <td><?php echo $row->last_reading; ?></td>
                                        <td><?php echo $row->current_reading; ?></td>
                                        <td><?php echo $row->unit_cosumed; ?></td>
                                        <td><?php echo $row->rate; ?></td>
                                        <td><?php echo $row->total; ?></td>
                                        <td><?php echo $row->monthly_service_charges; ?></td>
                                        <td><?php echo $row->tax_per; ?></td>
                                        <td><?php echo $row->tax_rs; ?></td>
                                        <td><?php echo $row->last_month_arrears; ?></td>
                                        <td><?php echo $row->payable_within_due_date; ?></td>
                                        <td><?php echo $row->payable_after_due_date; ?></td>
                                        <td><?php echo $row->paid; ?></td>
                                        <td><?php echo $row->dues; ?></td>

                                        <td>
                                            <?php if ($row->status == 1) { ?>
                                                <a href="<?php echo site_url(ADMIN_DIR . 'consumers/view_consumer_bill_detail/' . $row->consumer_id . '/' . $row->consumer_monthly_bill_id) ?>">View Detail</a>
                                                <button class="btn btn-success" onclick="get_comsumer_monthly_bill_form('<?php echo $row->consumer_monthly_bill_id; ?>', '<?php $billing_month->billing_month_id ?>')">Edit Bill</botton>
                                                    <button class="btn btn-danger" onclick="get_payments('<?php echo $row->consumer_monthly_bill_id; ?>')">Payments</botton>

                                                    <?php } ?>
                                        </td>
                                    </tr>
                                <?php } else { ?>
                                    <tr>
                                        <td></td>
                                        <td><?php $count++; ?></td>
                                        <td><?php echo date('Y', strtotime($billing_month->billing_month)); ?></td>
                                        <td><?php echo date('M', strtotime($billing_month->billing_month)); ?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><button onclick="get_comsumer_monthly_bill_form('0', '<?php echo $billing_month->billing_month_id ?>')">Add Bill<botton>
                                        </td>

                                    </tr>
                                <?php } ?>
                            <?php } ?>

                        </tbody>
                    </table>
                    <!-- <div style="text-align: center;">
                        <button onclick="get_comsumer_monthly_bill_form('0')" class="btn btn-primary">Add Record</button>
                    </div> -->
                    <script>
                        function get_payments(consumer_monthly_bill_id) {
                            $.ajax({
                                    method: "POST",
                                    url: "<?php echo site_url(ADMIN_DIR . 'consumer_monthly_bills/get_payments'); ?>",
                                    data: {
                                        consumer_monthly_bill_id: consumer_monthly_bill_id
                                    },
                                })
                                .done(function(respose) {
                                    // $('#modal').on('shown.bs.modal', function() {
                                    //     // Set the width of the modal dialog to 70% after the modal is fully shown
                                    //     $('.modal-dialog').css('width', '70%');
                                    // });
                                    $('.modal-dialog').css('width', '70%');
                                    $('#modal').modal('show');
                                    $('#modal_title').html('Bill Payments');
                                    $('#modal_body').html(respose);
                                    $('.modal-dialog').css('width', '70% !important');
                                });
                        }

                        function get_comsumer_monthly_bill_form(consumer_monthly_bill_id, billing_month_id) {
                            $.ajax({
                                    method: "POST",
                                    url: "<?php echo site_url(ADMIN_DIR . 'consumer_monthly_bills/get_comsumer_monthly_bill_form'); ?>",
                                    data: {
                                        consumer_monthly_bill_id: consumer_monthly_bill_id,
                                        consumer_id: <?php echo $consumer->consumer_id; ?>,
                                        billing_month_id: billing_month_id
                                    },
                                })
                                .done(function(respose) {
                                    $('#modal').modal('show');

                                    $('#modal_title').html('Comsumer Monthly Bills');
                                    $('#modal_body').html(respose);


                                });
                        }
                    </script>
                    <script>
                        title = "<?php echo $title; ?>";
                        $(document).ready(function() {
                            $('#consumer_monthly_bills').DataTable({
                                dom: 'Bfrtip',
                                paging: false,
                                title: title,
                                "order": [],
                                searching: true,
                                buttons: [

                                    {
                                        extend: 'print',
                                        title: title,
                                    },
                                    {
                                        extend: 'excelHtml5',
                                        title: title,

                                    },
                                    {
                                        extend: 'pdfHtml5',
                                        title: title,
                                        pageSize: 'A4',

                                    }
                                ]
                            });
                        });
                    </script>

                </div>


            </div>

        </div>
    </div>


</div>
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
                    <a href="<?php echo site_url(ADMIN_DIR . "billing_months/view/"); ?>"><?php echo $this->lang->line('Billing Months'); ?></a>
                </li>
                <li><?php echo $title; ?></li>
            </ul>
            <!-- /BREADCRUMBS -->
            <div class="row">

                <div class="col-md-4">
                    <div class="clearfix">
                        <h3 class="content-title pull-left"><?php echo $title; ?></h3>
                    </div>
                    <div class="description"><?php echo $title; ?></div>
                </div>

                <div class="col-md-8">
                    <?php if ($billing_month) { ?>
                        <h5><?php echo $description; ?></h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th><?php echo $this->lang->line('meter_reading_start'); ?></th>
                                    <th><?php echo $this->lang->line('meter_reading_end'); ?></th>
                                    <th><?php echo $this->lang->line('billing_issue_date'); ?></th>
                                    <th><?php echo $this->lang->line('billing_due_date'); ?></th>
                                    <th><?php echo $this->lang->line('Status'); ?></th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php echo $billing_month->meter_reading_start; ?>
                                    </td>
                                    <td>
                                        <?php echo $billing_month->meter_reading_end; ?>
                                    </td>
                                    <td>
                                        <?php echo $billing_month->billing_issue_date; ?>
                                    </td>
                                    <td>
                                        <?php echo $billing_month->billing_due_date; ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($billing_month->status == 1) {
                                            echo '<span class="label label-success">Active</span>';
                                        } else {
                                            echo '<span class="label label-danger">Closed</span>';
                                        }
                                        ?>
                                    </td>

                                </tr>

                            </tbody>
                        </table>
                    <?php } ?>
                </div>

            </div>


        </div>
    </div>
</div>

<div class="row">

    <div class="col-md-12">
        <div class="box border blue" id="messenger">
            <div class="box-title">
                <h4><i class="fa fa-user"></i>Consumer Detail</h4>
            </div>
            <div class="box-body">

                <div class="table-responsive">
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
                            AND consumer_monthly_bills.consumer_id = ?
                            ";
    $row = $this->db->query($query, [$consumer_monthly_bill_id, $consumer_id])->row();

    ?>

    <div class="col-md-4">
        <div class="box border blue" id="messenger">
            <div class="box-title">
                <h4><i class="fa fa-bolt"></i> <?php echo date('M', strtotime($row->billing_month)); ?>, <?php echo date('Y', strtotime($row->billing_month)); ?> Bill Detail</h4>
            </div>
            <div class="box-body">

                <div class="table-responsive">

                    <table class="table table-bordered" id="consumer_monthly_bills_transposed">
                        <tbody>

                            <tr>
                                <th>Meter Number</th>
                                <td><?php echo htmlspecialchars($row->meter_number); ?></td>
                            </tr>

                            <tr>
                                <th>Last Reading</th>
                                <td><?php echo htmlspecialchars($row->last_reading); ?></td>
                            </tr>
                            <tr>
                                <th>Reading Date</th>
                                <td><?php echo htmlspecialchars($row->reading_date); ?></td>
                            </tr>
                            <tr>
                                <th>Current Reading</th>
                                <td><?php echo htmlspecialchars($row->current_reading); ?></td>
                            </tr>
                            <tr>
                                <th>Unit Consumed</th>
                                <td><?php echo htmlspecialchars($row->unit_cosumed); ?></td>
                            </tr>
                            <tr>
                                <th>Rate</th>
                                <td><?php echo htmlspecialchars($row->rate); ?></td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td><?php echo htmlspecialchars($row->total); ?></td>
                            </tr>
                            <tr>
                                <th>Monthly Service Charges</th>
                                <td><?php echo htmlspecialchars($row->monthly_service_charges); ?></td>
                            </tr>
                            <tr>
                                <th>Tax Per</th>
                                <td><?php echo htmlspecialchars($row->tax_per); ?></td>
                            </tr>
                            <tr>
                                <th>Tax Rs</th>
                                <td><?php echo htmlspecialchars($row->tax_rs); ?></td>
                            </tr>
                            <tr>
                                <th>Last Month Arrears</th>
                                <td><?php echo htmlspecialchars($row->last_month_arrears); ?></td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="box border blue" id="messenger">
            <div class="box-title">
                <h4><i class="fa fa-money" aria-hidden="true"></i>
                    <?php echo date('M', strtotime($row->billing_month)); ?>, <?php echo date('Y', strtotime($row->billing_month)); ?> Bill Payable and Payments</h4>
            </div>
            <div class="box-body">

                <div class="table-responsive">

                    <div class="table-responsive">
                        <h4><?php echo date('M', strtotime($row->billing_month)); ?>, <?php echo date('Y', strtotime($row->billing_month)); ?> Payalbes</h4>

                        <hr />
                        <style>
                            .payable_table>thead>tr>th,
                            .payable_table>tbody>tr>th,
                            .payable_table>tfoot>tr>th,
                            .payable_table>thead>tr>td,
                            .payable_table>tbody>tr>td,
                            .payable_table>tfoot>tr>td {
                                border-color: black;
                                color: black !important;

                            }
                        </style>
                        <table class="table table-bordered payable_table" id="consumer_monthly_bills_transposed">
                            <tbody>

                                <tr>
                                    <th style="background-color: lightgreen;">Payable Within Due Date: (<?php echo date("d M, Y", strtotime($row->billing_due_date)); ?>)</th>
                                    <th style="background-color: lightcoral;">Payable After Due Date (After <?php echo date("d M, Y", strtotime($row->billing_due_date)); ?>)</th>
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

                        <h4><?php echo date('M', strtotime($row->billing_month)); ?>, <?php echo date('Y', strtotime($row->billing_month)); ?> Payments</h4>

                        <hr />
                        <table class="table table-bordered" id="payments">
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
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                $query = "SELECT * FROM payments WHERE consumer_monthly_bill_id = $consumer_monthly_bill_id";
                                $rows = $this->db->query($query)->result();
                                if ($rows) {
                                    foreach ($rows as $row) { ?>
                                        <tr>
                                            <td><a href="<?php echo site_url(ADMIN_DIR . 'consumers/delete_payment/' . $row->payment_id); ?>" onclick="return confirm('Are you sure? you want to delete the record.')">Delete</a> </td>
                                            <td><?php echo $count++ ?></td>
                                            <td><?php echo $row->payment_date; ?></td>
                                            <td><?php echo $row->amount_paid; ?></td>
                                            <td><?php echo $row->payment_method; ?></td>
                                            <td><?php echo $row->notes; ?></td>
                                            <td>
                                                <buttonn class="btn btn-success" onclick="get_payments('<?php echo $row->payment_id; ?>')">Edit Payment<botton>
                                            </td>
                                        </tr>
                                    <?php }
                                } else { ?>
                                    <tr>
                                        <td colspan="7" style="text-align: center;">
                                            <button onclick="get_payments('0')" class="btn btn-danger">Add Payment</button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>


        </div>

    </div>
</div>
 
<script>
    function get_payments(payment_id) {
        $.ajax({
                method: "POST",
                url: "<?php echo site_url(ADMIN_DIR . 'consumers/get_payments'); ?>",
                data: {
                    payment_id: payment_id,
                    consumer_monthly_bill_id: <?php echo $consumer_monthly_bill_id ?>
                },
            })
            .done(function(respose) {
                // $('#modal').on('shown.bs.modal', function() {
                //     // Set the width of the modal dialog to 70% after the modal is fully shown
                //     $('.modal-dialog').css('width', '70%');
                // });
                // $('.modal-dialog').css('width', '70%');
                $('#modal').modal('show');
                $('#modal_title').html('Bill Payments');
                $('#modal_body').html(respose);
                $('.modal-dialog').css('width', '70% !important');
            });
    }

    // function get_comsumer_monthly_bill_form(consumer_monthly_bill_id, billing_month_id) {
    //     $.ajax({
    //             method: "POST",
    //             url: "<?php echo site_url(ADMIN_DIR . 'consumer_monthly_bills/get_comsumer_monthly_bill_form'); ?>",
    //             data: {
    //                 consumer_monthly_bill_id: consumer_monthly_bill_id,
    //                 consumer_id: <?php echo $consumer->consumer_id; ?>,
    //                 billing_month_id: billing_month_id
    //             },
    //         })
    //         .done(function(respose) {
    //             $('#modal').modal('show');

    //             $('#modal_title').html('Comsumer Monthly Bills');
    //             $('#modal_body').html(respose);


    //         });
    // }


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
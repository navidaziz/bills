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
                <li><?php echo $title; ?></li>
            </ul>
            <!-- /BREADCRUMBS -->
            <div class="row">

                <div class="col-md-6">
                    <div class="clearfix">
                        <h3 class="content-title pull-left"><?php echo $title; ?></h3>
                    </div>
                    <div class="description"><?php echo $title; ?></div>
                </div>


            </div>


        </div>
    </div>
</div>
<!-- /PAGE HEADER -->

<!-- PAGE MAIN CONTENT -->
<div class="row">
    <!-- MESSENGER -->
    <div class="col-md-12">
        <div class="box border blue" id="messenger">
            <div class="box-title">
                <h4><i class="fa fa-bell"></i> Consumers List</h4>
            </div>
            <div class="box-body">

                <div class="table-responsive">
                    <table id="datatable" class="table  table_small table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>CNIC</th>
                                <th>Name</th>
                                <th>Father Name</th>
                                <th>Contact No</th>
                                <th>Address</th>
                                <th>Meter No</th>
                                <th>Date Of Registration</th>

                                <th><?php echo $billing_month->billing_month . ' Meter Reading'; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 1;
                            $query = "SELECT * FROM consumers WHERE status=1";
                            $consumers = $this->db->query($query)->result();
                            foreach ($consumers as $consumer) { ?>
                                <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $consumer->consumer_cnic; ?></td>
                                    <td><?php echo $consumer->consumer_name; ?></td>
                                    <td><?php echo $consumer->consumer_father_name; ?></td>
                                    <td><?php echo $consumer->consumer_contact_no; ?></td>
                                    <td><?php echo $consumer->consumer_address; ?></td>
                                    <td><?php echo $consumer->consumer_meter_no; ?></td>
                                    <td><?php echo $consumer->date_of_registration; ?></td>
                                    <td><?php

                                        $query = "SELECT COUNT(*) as total, consumer_monthly_bill_id  FROM consumer_monthly_bills
                                                WHERE billing_month_id = '" . $billing_month_id . "'
                                                AND consumer_id = '" . $consumer->consumer_id . "'";
                                        $billing_month = $this->db->query($query)->row();
                                        if ($billing_month->total <= 0) { ?>
                                            <button onclick="get_meter_reading_form('0')" class="btn btn-primary">Add Meter Reading</button>
                                        <?php } else { ?>
                                            <button onclick="get_meter_reading_form('<?php echo $billing_month->consumer_monthly_bill_id ?>')" class="btn btn-primary">Update Meter Reading</button>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>



                </div>


            </div>

        </div>
    </div>
    <!-- /MESSENGER -->
</div>

<script>
    function get_meter_reading_form(consumer_monthly_bill_id) {
        $.ajax({
                method: "POST",
                url: "<?php echo site_url(ADMIN_DIR . 'meter_reading_app/get_meter_reading_form'); ?>",
                data: {
                    consumer_monthly_bill_id: consumer_monthly_bill_id,
                    consumer_id: <?php echo $consumer->consumer_id; ?>,
                    billing_month_id: <?php echo $billing_month_id; ?>
                },
            })
            .done(function(respose) {
                $('#modal').modal('show');
                $('#modal_title').html('Add Consumer Meter Reading for <?php echo $title; ?> ');
                $('#modal_body').html(respose);
            });
    }
</script>

<script>
    title = "<?php echo $title; ?>";
    $(document).ready(function() {
        $('#datatable').DataTable({
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
<style>
.round-button {
    border-radius: 10px;
    padding: 1px;
    width: 20px;
    height: 20px;
}
</style>

<div class="row">
    <div class="col-sm-12">
        <div class="page-header">
            <!-- STYLER -->

            <!-- /STYLER -->
            <!-- BREADCRUMBS -->
            <ul class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a
                        href="<?php echo site_url(ADMIN_DIR . $this->session->userdata("role_homepage_uri")); ?>"><?php echo $this->lang->line('Home'); ?></a>
                </li>
                <li>
                    <i class="fa fa-list"></i>
                    <a href="<?php echo site_url(ADMIN_DIR . "meter_reading_app/index"); ?>">Dashboard</a>
                </li>
                <li><?php echo $title; ?></li>
            </ul>
            <!-- /BREADCRUMBS -->
            <div class="row">

                <div class="col-md-6">
                    <div class="clearfix">
                        <h3 class="content-title pull-left"><?php echo $title; ?></h3>
                    </div>
                    <div class="description"><?php echo $description; ?></div>
                </div>


            </div>


        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="page-header">

            <table id="datatable" class="table  table_small">
                <thead>
                    <tr>
                        <th>#</th>
                        <th><i class="fa fa-info"></i></th>
                        <th>Consumer</th>
                        <th>Meter No</th>
                        <th> <?php echo date("M,y", strtotime($billing_month->billing_month)) ?> M. Reading</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            $count = 1;
                            $query = "SELECT * FROM consumers WHERE status=1";
                            $consumers = $this->db->query($query)->result();
                            foreach ($consumers as $consumer) { 
                                $query = "SELECT COUNT(*) as total, consumer_monthly_bill_id ,current_reading FROM consumer_monthly_bills
                                                WHERE billing_month_id = '" . $billing_month_id . "'
                                                AND consumer_id = '" . $consumer->consumer_id . "'";
                                        $c_billing_month = $this->db->query($query)->row();
                                ?>
                    <tr>
                        <td><?php echo $count++; ?></td>
                        <td>
                            <details>
                                <summary class="btn btn-info round-button"><i class="fa fa-info"></i></summary>
                                <p><?php echo $consumer->consumer_cnic; ?><br />
                                    <?php echo $consumer->consumer_name; ?><br />
                                    <?php echo $consumer->consumer_father_name; ?><br />
                                    <?php echo $consumer->consumer_contact_no; ?><br />
                                    <?php echo $consumer->consumer_address; ?></p>
                            </details>
                        </td>
                        <td><?php echo $consumer->consumer_name; ?></td>
                        <td><?php echo $consumer->consumer_meter_no; ?></td>
                        <td><?php echo $c_billing_month->current_reading; ?></td>
                        <td><?php
                        if($billing_month->status==1){
                        if ($c_billing_month->consumer_monthly_bill_id <= 0) { ?>
                            <button onclick="get_meter_reading_form('0', <?php echo $consumer->consumer_id; ?>)"
                                class="btn round-button btn-danger  btn-sm "><i class="fa fa-plus"></i></button>
                            <?php } else { ?>
                            <button
                                onclick="get_meter_reading_form('<?php echo $c_billing_month->consumer_monthly_bill_id ?>', <?php echo $consumer->consumer_id; ?>)"
                                class="btn round-button btn-success btn-sm "><i class="fa fa-edit"></i></button>
                            <?php } 
                            }?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

 <div style="background-color: white;">
 
    <div>

        <script>
        function get_meter_reading_form(consumer_monthly_bill_id, consumer_id) {
            $.ajax({
                    method: "POST",
                    url: "<?php echo site_url(ADMIN_DIR . 'consumer_monthly_bills/get_comsumer_monthly_bill_form'); ?>",
                    data: {
                        consumer_monthly_bill_id: consumer_monthly_bill_id,
                        consumer_id: consumer_id,
                        billing_month_id: <?php echo $billing_month_id; ?>
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
            $('#datatable').DataTable({

                paging: false,
                title: title,
                "order": [],
                searching: true,
                buttons: [],
            });
        });
        </script>
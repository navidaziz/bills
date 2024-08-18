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
                    <a
                        href="<?php echo site_url(ADMIN_DIR . $this->session->userdata("role_homepage_uri")); ?>"><?php echo $this->lang->line('Home'); ?></a>
                </li>
                <li>
                    <i class="fa fa-table"></i>
                    <a
                        href="<?php echo site_url(ADMIN_DIR . "billing_months/view/"); ?>"><?php echo $this->lang->line('Billing Months'); ?></a>
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

                <div class="col-md-6">

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
                <h4><i class="fa fa-bell"></i> <?php echo $title; ?></h4>
                <!--<div class="tools">
            
				<a href="#box-config" data-toggle="modal" class="config">
					<i class="fa fa-cog"></i>
				</a>
				<a href="javascript:;" class="reload">
					<i class="fa fa-refresh"></i>
				</a>
				<a href="javascript:;" class="collapse">
					<i class="fa fa-chevron-up"></i>
				</a>
				<a href="javascript:;" class="remove">
					<i class="fa fa-times"></i>
				</a>
				

			</div>-->
            </div>
            <div class="box-body">



                <div class="table-responsive">
                    <table class="table table-bordered" id="billing_months">
                        <thead>
                            <tr>
                                <th></th>
                                <th>#</th>
                                <th>Billing Month</th>
                                <th>Meter Reading Start</th>
                                <th>Meter Reading End</th>
                                <th>Billing Issue Date</th>
                                <th>Billing Due Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                $count=1;
                $query = "SELECT * FROM billing_months";
                $rows = $this->db->query($query)->result();
                foreach ($rows as $row) { ?>
                            <tr>
                                <td><a href="<?php echo site_url(ADMIN_DIR . 'billing_months/delete_billing_months/' . $row->billing_month_id); ?>"
                                        onclick="return confirm('Are you sure? you want to delete the record.')">Delete</a>
                                </td>
                                <td><?php echo $count++ ?></td>
                                <td><?php echo $row->billing_month; ?></td>
                                <td><?php echo $row->meter_reading_start; ?></td>
                                <td><?php echo $row->meter_reading_end; ?></td>
                                <td><?php echo $row->billing_issue_date; ?></td>
                                <td><?php echo $row->billing_due_date; ?></td>
                                <td>
                                    <?php
                                        if ($row->status == 1) {
                                            echo '<span class="label label-success">Active</span>';
                                        } else {
                                            echo '<span class="label label-danger">Closed</span>';
                                        }
                                        ?>
                                </td>
                                <td><button
                                        onclick="get_billing_month_form('<?php echo $row->billing_month_id; ?>')">Edit
                                        <botton>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <?php 
                                    
                             $query = "SELECT * FROM billing_months WHERE status=1";
                $billing_month = $this->db->query($query)->row();
                
                                    $query="SELECT COUNT(*) as total FROM `consumers`
                                            WHERE date(`consumers`.`date_of_registration`) <= ?;";
                                    $consumer_till_now = $this->db->query($query,array($billing_month->billing_month."-1"))->row()->total; 
                                    ?>
                    <?php 

                                    $query="SELECT COUNT(*) as total FROM `consumers` as c 
                                            RIGHT JOIN consumer_monthly_bills as cmb ON(cmb.consumer_id = c.consumer_id)
                                            WHERE date(`c`.`date_of_registration`) <= ?
                                            AND cmb.billing_month_id = ?;";
                                    $reading_till_now = $this->db->query($query,array($billing_month->billing_month."-1", $billing_month->billing_month_id))->row()->total; 
                                    //$billing_month->billing_due_date>date('Y-m-d') and
                                    ?>


                    <div style="text-align: center;">
                        <?php if( $reading_till_now>=$consumer_till_now){ ?>
                        <button onclick="get_billing_month_form('0')" class="btn btn-primary">Add Record</button>

                        <?php }else{ ?>
                        <div class="alert alert-danger">
                            Previous meter reading is not complete yet. The option to add monthly billing will be
                            available once the meter reading entry is completed. Thank you.
                        </div>
                        <?php }?>
                    </div>
                </div>
                <script>
                function get_billing_month_form(billing_month_id) {
                    $.ajax({
                            method: "POST",
                            url: "<?php echo site_url(ADMIN_DIR . 'billing_months/get_billing_month_form'); ?>",
                            data: {
                                billing_month_id: billing_month_id
                            },
                        })
                        .done(function(respose) {
                            $('#modal').modal('show');
                            $('#modal_title').html('Billing Months');
                            $('#modal_body').html(respose);
                        });
                }
                </script>
            </div>



        </div>
    </div>
    <!-- /MESSENGER -->
</div>
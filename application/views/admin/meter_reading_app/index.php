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
                <h4><i class="fa fa-bell"></i> <?php echo $title; ?></h4>

            </div>
            <div class="box-body">

                <div class="table-responsive">
                    <?php $query = "SELECT * FROM `billing_months` WHERE status=1";
                    $billing_months = $this->db->query($query)->result();
                    ?>


                    <table class="table table-bordered">
                        <thead>
                            <tr>

                                <th><?php echo $this->lang->line('billing_month'); ?></th>
                                <th><?php echo $this->lang->line('meter_reading_start'); ?></th>
                                <th><?php echo $this->lang->line('meter_reading_end'); ?></th>
                                <th><?php echo $this->lang->line('billing_issue_date'); ?></th>
                                <th><?php echo $this->lang->line('billing_due_date'); ?></th>
                                <th><?php echo $this->lang->line('Action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($billing_months as $billing_month) : ?>

                                <tr>


                                    <td>
                                        <?php echo $billing_month->billing_month; ?>
                                    </td>
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
                                        <a class="llink llink-view" href="<?php echo site_url(ADMIN_DIR . "meter_reading_app/view_consumers_list/" . $billing_month->billing_month_id . "/" . $this->uri->segment(4)); ?>"><i class="fa fa-eye"></i> </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>


                </div>


            </div>

        </div>
    </div>
    <!-- /MESSENGER -->
</div>
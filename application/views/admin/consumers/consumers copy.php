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

                <div class="col-md-6">
                    <div class="pull-right">
                        <a class="btn btn-primary btn-sm" href="<?php echo site_url(ADMIN_DIR . "consumers/add"); ?>"><i class="fa fa-plus"></i> <?php echo $this->lang->line('New'); ?></a>
                        <a class="btn btn-danger btn-sm" href="<?php echo site_url(ADMIN_DIR . "consumers/trashed"); ?>"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('Trash'); ?></a>
                    </div>
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

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo $this->lang->line('consumer_cnic'); ?></th>
                                <th><?php echo $this->lang->line('consumer_name'); ?></th>
                                <th><?php echo $this->lang->line('consumer_father_name'); ?></th>
                                <th><?php echo $this->lang->line('consumer_contact_no'); ?></th>
                                <th><?php echo $this->lang->line('consumer_address'); ?></th>
                                <th><?php echo $this->lang->line('consumer_meter_no'); ?></th>
                                <th><?php echo $this->lang->line('date_of_registration'); ?></th>
                                <th><?php echo $this->lang->line('tariff_type'); ?></th>
                                <th><?php echo $this->lang->line('Status'); ?></th>
                                <th><?php echo $this->lang->line('Action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 1;
                            foreach ($consumers as $consumer) : ?>

                                <tr>

                                    <td>
                                        <?php echo $count++; ?>
                                    </td>

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
                                        <?php echo $consumer->tariff_type; ?>
                                    </td>
                                    <td>
                                        <?php echo status($consumer->status,  $this->lang); ?>
                                        <?php

                                        //set uri segment
                                        if (!$this->uri->segment(4)) {
                                            $page = 0;
                                        } else {
                                            $page = $this->uri->segment(4);
                                        }

                                        if ($consumer->status == 0) {
                                            echo "<a href='" . site_url(ADMIN_DIR . "consumers/publish/" . $consumer->consumer_id . "/" . $page) . "'> &nbsp;" . $this->lang->line('Publish') . "</a>";
                                        } elseif ($consumer->status == 1) {
                                            echo "<a href='" . site_url(ADMIN_DIR . "consumers/draft/" . $consumer->consumer_id . "/" . $page) . "'> &nbsp;" . $this->lang->line('Draft') . "</a>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a class="llink llink-view" href="<?php echo site_url(ADMIN_DIR . "consumers/view_consumer/" . $consumer->consumer_id . "/" . $this->uri->segment(4)); ?>"><i class="fa fa-eye"></i> </a>
                                        <a class="llink llink-edit" href="<?php echo site_url(ADMIN_DIR . "consumers/edit/" . $consumer->consumer_id . "/" . $this->uri->segment(4)); ?>"><i class="fa fa-pencil-square-o"></i></a>
                                        <a class="llink llink-trash" href="<?php echo site_url(ADMIN_DIR . "consumers/trash/" . $consumer->consumer_id . "/" . $this->uri->segment(4)); ?>"><i class="fa fa-trash-o"></i></a>
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
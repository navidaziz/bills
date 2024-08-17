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

                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            document.title = "consumers (Date:<?php echo date('d-m-Y h:m:s') ?>)";
                            $("#datatable").DataTable({
                                "processing": true,
                                "serverSide": true,
                                "ajax": {
                                    "url": "<?php echo base_url(ADMIN_DIR . "consumers/consumers"); ?>",
                                    "type": "POST"
                                },
                                "columns": [{
                                        "data": null,
                                        "render": function(data, type, row, meta) {
                                            return meta.row + meta.settings._iDisplayStart + 1; // Start index from 1
                                        }
                                    },

                                    {
                                        "data": "consumer_cnic"
                                    },

                                    {
                                        "data": "consumer_name"
                                    },

                                    {
                                        "data": "consumer_father_name"
                                    },

                                    {
                                        "data": "consumer_contact_no"
                                    },

                                    {
                                        "data": "consumer_address"
                                    },

                                    {
                                        "data": "consumer_meter_no"
                                    },

                                    {
                                        "data": "date_of_registration"
                                    },


                                    {
                                        "data": null,
                                        "render": function(data, type, row) {
                                            return '<a class="llink llink-view" href="<?php echo site_url(ADMIN_DIR . "consumers/trash/"); ?>' + row.consumer_id + '/' + '" onclick="return confirm(\'Are you sure? you want to delete the record.\')"><i class="fa fa-trash-o"></i></a><span style="margin-left: 10px;"></span>' +
                                                '<a class="llink llink-view" href="<?php echo site_url(ADMIN_DIR . "consumers/view_consumer/"); ?>' + row.consumer_id + '/' + '"><i class="fa fa-eye"></i></a><span style="margin-left: 10px;"></span>' +
                                                '<a class="llink llink-edit" href="<?php echo site_url(ADMIN_DIR . "consumers/edit/"); ?>' + row.consumer_id + '/' + '"><i class="fa fa-pencil-square-o"></i></a>';
                                        }
                                    }

                                ],
                                "lengthMenu": [
                                    [15, 25, 50, -1],
                                    [15, 25, 50, "All"]
                                ],
                                "order": [
                                    [0, "asc"]
                                ],
                                "searching": true,
                                "paging": true,
                                "info": true,
                                dom: "Bfrtip",

                                buttons: ["excel", "pageLength"]
                            });
                        });
                    </script>




                </div>


            </div>

        </div>
    </div>
    <!-- /MESSENGER -->
</div>
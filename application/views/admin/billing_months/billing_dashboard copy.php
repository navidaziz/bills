<div class="row">
    <div class="col-sm-12">
        <div class="page-header">
            <!-- STYLER -->

            <!-- /STYLER -->

            <!-- /BREADCRUMBS -->
            <div class="row">

                <div class="col-md-3">
                    <!-- BREADCRUMBS -->
                    <ul class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>

                            <a href="<?php echo site_url($this->session->userdata("role_homepage_uri")); ?>"><?php echo $this->lang->line('Home'); ?></a>
                        </li>

                        <li><?php echo $title; ?></li>
                    </ul>
                    <div class="clearfix">

                        <h3 class="content-title pull-left"><?php echo $title ?></h3>
                    </div>
                    <div class="description"> <?php echo $description; ?></div>
                </div>

                <div class="col-md-9">

                </div>

            </div>


        </div>
    </div>
</div>





<?php $query = "SELECT billing_month as billing_year FROM `billing_months` GROUP BY billing_year";
$billing_years = $this->db->query($query)->result();

?>
<div class="row" style="margin-top:-25px;">
    <div class="col-md-12" style="text-align: left;">
        <strong>Billing Year: </strong>
        <select onchange="reloadPage()" id="filter_year" class="form-control" style="width: 120px; display:inline !important">
            <?php
            foreach ($billing_years as $billing_year) { ?>
                <option <?php if ($billing_year->billing_year == $filter_year) { ?>selected <?php } ?> value="<?php echo $billing_year->billing_year; ?>?date=<?php echo $billing_year->billing_year; ?>"><?php echo $billing_year->billing_year; ?></option>
            <?php } ?>
        </select>

    </div>

    <div class="box border blue">
        <div class="box-title">
            <h4><i class="fa fa-money"></i> Year: 2024</h4>
        </div>
        <div class="box-body">
            <div class="tabbable header-tabs">
                <ul class="nav nav-tabs">

                    <?php

                    $months = array();
                    // Print each month and year
                    for ($i = 1; $i <= 12; $i++) {

                        $months[] =  $filter_year . "-" . $i . "-1";
                    }
                    rsort($months)
                    ?>


                    <?php
                    foreach ($months as $index => $month) {
                    ?>
                        <li <?php if (date('y-m', strtotime($filter_month)) == date('y-m', strtotime($month))) {
                                echo ' class="active" ';
                            } ?>>

                            <a href="<?php echo site_url(ADMIN_DIR . "expenses/index/" . $billing_year->billing_year) ?>?date=<?php echo date('Y-m-d', strtotime($month)); ?>" contenteditable="false" style="cursor: pointer; padding: 7px 8px;">
                                <span class="hidden-inline-mobile"><?php echo date('M, y', strtotime($month)); ?></span></a>
                        </li>
                    <?php } ?>




                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="box_tab3">
                        <!-- TAB 1 -->
                        <div class="row">
                            <div class="col-md-12">


                                <div class="table-responsive" style=" overflow-x:auto;">




                                </div>


                            </div>

                        </div>
                        <hr class="margin-bottom-0">

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>





<script>
    title = "Expenses";
    $(document).ready(function() {
        $('#db_table').DataTable({
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
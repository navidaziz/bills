<!-- PAGE HEADER-->
<style>
.list-group-item.active {
    border-left-color: #D1322C;
    border-left-width: 15px;
}

.list-group-item.deactive {
    border-left-color: #96AE5F;
    border-left-width: 15px;
}
</style>
<div class="row">
    <div class="col-sm-12">
        <div class="page-header">

            <ul class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a
                        href="<?php echo site_url($this->session->userdata("role_homepage_uri")); ?>"><?php echo $this->lang->line('Home'); ?></a>
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

<div>
    <?php 
     
    $query = "SELECT * FROM `billing_months`  order BY billing_month_id DESC LIMIT 12";
    $billing_months = $this->db->query($query)->result();
    ?>

    <!-- Search Input -->
    <div style="margin-bottom:5px"><input type="text" id="searchInput" class="form-control"
            placeholder="Search for months..." style="">
    </div>
    <ul class="list-group" id="billingMonthsList">
        <?php foreach ($billing_months as $billing_month) : ?>

        <li
            class="list-group-item success<?php if($billing_month->status==1){?> active <?php }else{?> deactive <?php } ?>">
            <a
                href="<?php echo site_url(ADMIN_DIR . "meter_reading_app/view_consumers_list/" . $billing_month->billing_month_id . "/" . $this->uri->segment(4)); ?>">
                <table width="100%">
                    <tr>
                        <th style="font-size:15px">
                            <?php echo date('F, Y',strtotime($billing_month->billing_month."-1")); ?> M. Readings</th>
                        <th style="text-align:right; font-size:9px">Last Date:
                            <?php echo date('d M, Y',strtotime($billing_month->meter_reading_end)); ?> </th>
                    </tr>
                </table>
            </a>
        </li>

        <?php endforeach; ?>
    </ul>
</div>

<!-- jQuery for Search Functionality -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $("#searchInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#billingMonthsList li").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
</script>
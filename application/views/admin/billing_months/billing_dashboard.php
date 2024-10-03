<?php $query = "SELECT * FROM billing_months WHERE billing_month = '" . $BillingMonth . "'";
$billing_month = $this->db->query($query)->row();
function validateMobileNumber($mobileNumber) {
    // Remove any spaces, dashes, or special characters
    $mobileNumber = preg_replace('/[^\d]/', '', $mobileNumber);

    // Check if the number starts with 03, 3, or 923
    if (preg_match('/^(03|3|923)\d{8,9}$/', $mobileNumber)) {
        // Normalize the mobile number to start with 923
        if (substr($mobileNumber, 0, 2) === '03') {
            $mobileNumber = '92' . substr($mobileNumber, 1);
        } elseif (substr($mobileNumber, 0, 1) === '3') {
            $mobileNumber = '923' . substr($mobileNumber, 1);
        }

        return $mobileNumber; // Return the valid mobile number
    } else {
        return false; // Invalid mobile number
    }
}
?>

<div class="row">
    <div class="col-sm-12">
        <div class="page-header">
            <!-- /STYLER -->
            <!-- BREADCRUMBS -->
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
                <div class="col-md-4">
                    <div class="clearfix">
                        <h3 class="content-title pull-left"><?php echo $title; ?></h3>
                    </div>
                    <div class="description"><?php echo $description; ?></div>
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
                                <th>Meter Reading Summary</th>

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
                                <td>
                                    <?php 
                                    $query="SELECT COUNT(*) as total FROM `consumers`
                                            WHERE date(`consumers`.`date_of_registration`) <= ?;";
                                    $consumer_till_now = $this->db->query($query,array($billing_month->billing_month."-1"))->row()->total; 
                                    ?>
                                    Consumers Upto <?php echo date("d M, Y", strtotime($billing_month->billing_month."-1")) ?> Total: <?php echo $consumer_till_now;?> <br />
                                <?php 

                                    $query="SELECT COUNT(*) as total FROM `consumers` as c 
                                            RIGHT JOIN consumer_monthly_bills as cmb ON(cmb.consumer_id = c.consumer_id)
                                            WHERE date(`c`.`date_of_registration`) <= ?
                                            AND cmb.billing_month_id = ?;";
                                    $reading_till_now = $this->db->query($query,array($billing_month->billing_month."-1", $billing_month->billing_month_id))->row()->total; 
                                    ?>
                                    M. Reading Complete  <?php echo $reading_till_now ?>  / <?php echo $consumer_till_now;?>
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
<style>
.box .header-tabs .nav-tabs>li.active a,
.box .header-tabs .nav-tabs>li.active a:after,
.box .header-tabs .nav-tabs>li.active a:before {
    background: #90EE8F;
    z-index: 3;
    color: black;
    font-weight: bold;
}

.box .header-tabs .nav-tabs>li a,
.box .header-tabs .nav-tabs>li a:after,
.box .header-tabs .nav-tabs>li a:before {
    background: #86B8E1;
    z-index: 3;
    color: black;
    font-weight: bold;
}
</style>
<style>
.round-button {
    border-radius: 10px;
    padding: 1px;
    width: 20px;
    height: 20px;
}
</style>
<!-- PAGE MAIN CONTENT -->
<div class="row">


    <div class="col-md-12">
        <div class="box border blue">
            <div class="box-title">
                <h4><i class="fa fa-money"></i> Consumer List</h4>
            </div>
            <div class="box-body">
                <div class="tabbable header-tabs">

                    <ul class="nav nav-tabs">

                        <?php

                        $months = array();
                        // Print each month and year
                        for ($i = 1; $i <= 12; $i++) {
                            $months[] = $filter_year . "-" . str_pad($i, 2, "0", STR_PAD_LEFT) . "-1";
                        }
                        rsort($months);
                        ?>


                        <?php
                        foreach ($months as $index => $month) {
                        ?>
                        <li <?php if ($filter_month == date('m', strtotime($month))) {
                                    echo ' class="active" ';
                                } ?>>

                            <a href="<?php echo site_url(ADMIN_DIR . "billing_months/index") ?>?filter_year=<?php echo $filter_year; ?>&filter_month=<?php echo date('m', strtotime($month)); ?>"
                                contenteditable="false" style="cursor: pointer; padding: 7px 8px;">
                                <span
                                    class="hidden-inline-mobile"><?php echo date('M, y', strtotime($month)); ?></span></a>
                        </li>
                        <?php } ?>


                        <li><?php $query = "SELECT LEFT(billing_month, 4)  as billing_year FROM `billing_months` GROUP BY billing_year";
                            $billing_years = $this->db->query($query)->result();
                            ?>
                            <select onchange="reloadPage()" id="filter_year" class="form-control"
                                style="width: 120px; display:inline !important; margin-right:30px; height:30px">
                                <?php
                                foreach ($billing_years as $billing_year) { ?>
                                <option <?php if ($billing_year->billing_year == $filter_year) { ?> selected <?php } ?>
                                    value="?filter_year=<?php echo $billing_year->billing_year; ?>">
                                    <?php echo $billing_year->billing_year; ?></option>
                                <?php } ?>
                            </select>
                            <script>
                            function reloadPage() {
                                var year = document.getElementById("filter_year").value;
                                window.location.href = year;
                            }
                            </script>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="box_tab3">
                            <!-- TAB 1 -->
                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    if ($billing_month) {
                                    ?>

                                    <div class="table-responsive" style=" overflow-x:auto;">

                                        <table class="table table-bordered table_small" id="monthly_bill">
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

                                                    <th>Reading Date</th>
                                                    <th>Last Reading</th>
                                                    <th>Current Reading</th>
                                                    <th>Unit Cosumed</th>
                                                    <th>Rate</th>
                                                    <th>Total</th>
                                                    <th>Monthly SC</th>
                                                    <th>Tax(%)</th>
                                                    <th>Tax Rs</th>
                                                    <th>Arrears</th>
                                                    <th>Payable Within Due Date</th>
                                                    <th>Fine</th>
                                                    <th>Payable After Due Date</th>
                                                    <th>Paid</th>
                                                    <th>Dues</th>
                                                    <th class='notexport'>M. Reading</th>
                                                    <th class='notexport'>View</th>
                                                    <th class='notexport'>Print</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                    $count = 1;
                                                    $query = "SELECT consumers.*, tariffs.tariff_type FROM consumers 
                                                INNER JOIN tariffs on(tariffs.tariff_id = consumers.tariff_id)
                                                WHERE consumers.status=1";
                                                    $consumers = $this->db->query($query)->result();

                                                    foreach ($consumers as $consumer) : 
                                                    if ($billing_month) {
                                                                $query = "SELECT * FROM consumer_monthly_bills
                                                                WHERE  billing_month_id = '" . $billing_month->billing_month_id . "'
                                                                AND consumer_id = '" . $consumer->consumer_id . "'";
                                                                $row = $this->db->query($query)->row();
                                                            } else {
                                                                $row = NULL;
                                                            }
                                                    ?>

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
                                                        <?php echo validateMobileNumber($consumer->consumer_contact_no); ?>
                                                        <?php if($row and validateMobileNumber($consumer->consumer_contact_no)){ ?>
                                                       <a href="https://web.whatsapp.com/send?phone=<?php echo validateMobileNumber($consumer->consumer_contact_no); ?>&text=<?php echo urlencode('Download you electricity bill: ' . site_url('billing_months/print_billing_month/' . $billing_month->billing_month_id . '/' . $consumer->consumer_id . '/' . $row->consumer_monthly_bill_id)); ?> Thanks." target="_blank" id="whatsappLink">
    <i style="color:green" class="fa fa-whatsapp" aria-hidden="true"></i>
</a>

<?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $consumer->consumer_address; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $consumer->consumer_meter_no; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo date("d M, y", strtotime($consumer->date_of_registration)); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $consumer->tariff_type; ?>
                                                    </td>

                                                    <?php
                                                            
                                                            if ($row) {
                                                            ?>


                                                    <td><?php echo date("d M, y", strtotime($row->reading_date)); ?>
                                                    </td>
                                                    <td><?php echo $row->last_reading; ?></td>
                                                    <td><?php echo $row->current_reading; ?></td>
                                                    <td><?php echo $row->unit_cosumed; ?></td>
                                                    <td><?php echo $row->rate; ?></td>
                                                    <td><?php echo $row->total; ?></td>
                                                    <td><?php echo $row->monthly_service_charges; ?></td>
                                                    <td><?php echo $row->tax_per; ?>%</td>
                                                    <td><?php echo $row->tax_rs; ?></td>
                                                    <td><?php echo $row->last_month_arrears; ?></td>
                                                    <td><?php echo $row->payable_within_due_date; ?></td>
                                                    <td><?php echo $row->late_deposit_fine; ?></td>
                                                    <td><?php echo $row->payable_after_due_date; ?></td>
                                                    <td><?php echo $row->paid; ?></td>
                                                    <td><?php echo $row->dues; ?></td>
                                                    <?php } else { ?>
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

                                                    <?php } ?>
                                                    <td class='notexport'>
                                                        <?php if ($row) { ?>
                                                        <button class="btn round-button btn-success  btn-sm "
                                                            onclick="get_comsumer_monthly_bill_form(<?php echo $row->consumer_monthly_bill_id ?>, '<?php echo $billing_month->billing_month_id ?>', <?php echo $consumer->consumer_id; ?>)"><i
                                                                class="fa fa-edit"></i></botton>
                                                            <?php } else { ?>
                                                            <button class="btn round-button btn-danger  btn-sm "
                                                                onclick="get_comsumer_monthly_bill_form('0', '<?php echo $billing_month->billing_month_id ?>', <?php echo $consumer->consumer_id; ?>)"><i
                                                                    class="fa fa-plus"></i></botton>

                                                                <?php } ?>
                                                    </td>
                                                    <td class='notexport'>
                                                        <?php if ($row) { ?>
                                                        <a
                                                            href="<?php echo site_url(ADMIN_DIR . "billing_months/view_billing_month/" . $billing_month->billing_month_id . "/" . $consumer->consumer_id . "/" . $row->consumer_monthly_bill_id); ?>"><button
                                                                class="btn round-button btn-warning  btn-sm "><i
                                                                    class="fa fa-eye"></i></button> </a>
                                                        <?php } ?>

                                                    </td>
                                                    <td class='notexport'>
                                                        <?php if ($row) { ?>
                                                        <a target="_blank"
                                                            href="<?php echo site_url(ADMIN_DIR . "billing_months/print_billing_month/" . $billing_month->billing_month_id . "/" . $consumer->consumer_id . "/" . $row->consumer_monthly_bill_id); ?>"><button
                                                                class="btn round-button btn-primary  btn-sm "><i
                                                                    class="fa fa-print"></i></button> </a>
                                                        <?php } ?>

                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>



                                    </div>

                                    <?php } else { ?>
                                    <div style="text-align: center;">
                                        <h1>Please Add Billing Month For
                                            <?php echo date("M, Y", strtotime($BillingMonth . "-1")); ?></h1>
                                        <div>
                                            <a class="btn btn-primary btn-sm"
                                                href="<?php echo site_url(ADMIN_DIR . "billing_months/add"); ?>"><i
                                                    class="fa fa-plus"></i> Create Billing Month For
                                                <?php echo date("M, Y", strtotime($BillingMonth . "-1")); ?></a>
                                        </div>
                                    </div>
                                   
                                    <?php } ?>
                                </div>

                            </div>
                            <hr class="margin-bottom-0">

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /MESSENGER -->
</div>


<script>
function get_comsumer_monthly_bill_form(consumer_monthly_bill_id, billing_month_id, consumer_id) {
    $.ajax({
            method: "POST",
            url: "<?php echo site_url(ADMIN_DIR . 'consumer_monthly_bills/get_comsumer_monthly_bill_form'); ?>",
            data: {
                consumer_monthly_bill_id: consumer_monthly_bill_id,
                consumer_id: consumer_id,
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
title = "Consumers Bills <?php echo $description . " Date: " . date("d-m-y h:m:s"); ?>";
$(document).ready(function() {
    $('#monthly_bill').DataTable({
        dom: 'Bfrtip',
        paging: false,
        title: title,
        "order": [],
        searching: true,
        buttons: [

            {
                extend: 'print',
                title: title,
                orientation: 'landscape',
                exportOptions: {
                    columns: ':not(.notexport)'
                }
            },
            {
                extend: 'excelHtml5',
                title: title,
                exportOptions: {
                    columns: ':not(.notexport)'
                }

            },
            {
                extend: 'pdfHtml5',
                title: title,
                // pageSize: {
                //     width: 1000, // Width in points (12 inches)
                //     height: 800 // Height in points (18 inches)
                // },
                exportOptions: {
                    columns: ':not(.notexport)'
                },
                orientation: 'landscape',
                customize: function(doc) {
                    var tableHeader = doc.content[1].table.headerRows ? doc.content[1].table
                        .body[0] : null;

                    // Minimize padding and margins
                    doc.pageMargins = [10, 10, 10, 10]; // Set all margins to 10 units

                    // Adjust the font size for the entire document
                    doc.defaultStyle.fontSize = 4; // Reduce overall font size

                    // Adjust the header font size and make them bold
                    if (tableHeader) {
                        tableHeader.forEach(function(headerCell) {
                            headerCell.fontSize = 4; // Set header font size
                            headerCell.bold = true; // Make headers bold
                        });
                    }

                    // Autofit the table to the page width
                    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1)
                        .join('*').split('');

                    // Optional: Remove table borders if needed and minimize padding
                    doc.content[1].layout = {
                        paddingTop: function() {
                            return 2;
                        },
                        paddingBottom: function() {
                            return 2;
                        },
                        paddingLeft: function() {
                            return 2;
                        },
                        paddingRight: function() {
                            return 2;
                        },
                        hLineWidth: function() {
                            return 0;
                        }, // Hide horizontal lines
                        vLineWidth: function() {
                            return 0;
                        } // Hide vertical lines
                    };
                }
            }


        ]
    });
});
</script>
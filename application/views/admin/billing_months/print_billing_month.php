<html lang="en">

<head>
    <meta charset="utf-16">

    <meta name="keywords"
        content="iescobill, mepcobill, pescobill, hescobill, sepcobill, qescobill, gepcobill, fescobill, tescobill">
    <meta name="description" content="Consumer electricity bills">

    <title>BILL</title>


    <style>
    html {
        scroll-behavior: smooth;
    }

    body {
        -webkit-print-color-adjust: exact;
        text-align: center;
        font-family: sans-serif, arial;
        color: #78578e;
    }

    .content {
        color: Black;
    }

    .maincontent {
        /*width: 730pt;*/
        width: 753pt;
        min-width: 920px;
        margin: 10pt auto;
        border: 1px solid #78578e;
        height: auto;
        overflow: hidden;
    }

    .maincontentnf {
        width: 50%;
        /* min-width : 920px;*/
        margin-left: 300px;
        border: 4px solid #78578e;
        height: 100%;
        overflow: hidden;
        position: absolute;
    }

    .innercontentnf {
        padding-top: 300px;
        width: 100%;
        height: 100%;
    }

    h1 {
        margin: 0;
        /*height: 20px;*/
    }

    h2 {
        margin-top: 0;
        margin-left: 50px;
    }

    .zeroMargin {
        margin: 0pt;
    }

    h3 {
        margin: 0;
        color: blue;
    }

    h4 {
        margin: 5px 5px;
        font-size: 11px;
    }

    .headp {
        margin: 0;
        margin-left: 50px;
    }

    span {
        font-size: small;
    }

    .header {
        width: 100%;
        height: 70pt;
        display: inline block;
        float: left;
    }

    .headerimg {
        width: 15%;
        /* margin-top:19px;*/
        float: left;
        position: relative;
        height: 100%;
    }

    .heading {
        float: left;
        /*position:relative;*/
        padding: 0;
        width: 85%;
        height: 100%;
    }

    .maintable {
        width: 100%;
        table-layout: fixed;
        height: auto;
        border-top: 1px solid #78578e;
        font-family: sans-serif;
        border-collapse: collapse;
        font-size: .8;
        -moz-box-sizing: border-box;

    }

    .nestable1 {
        width: 100%;
        height: 44px;
        border-spacing: 0px;
    }

    .border-rb {
        border-right: 1px solid #78578e;
        border-bottom: 1px solid #78578e;
    }

    .border-r {
        border-right: 1px solid #78578e;
    }

    .border-b {
        border-bottom: 1px solid #78578e;
    }

    .border-t {
        border-top: 1px solid #78578e;
    }

    .border-rt {
        border-top: 1px solid #78578e;
        border-right: 1px solid #78578e;
    }

    .border-tb {
        border-top: 1px solid #78578e;
        border-bottom: 1px solid #78578e;
    }

    .nesttable3 {
        border-collapse: collapse;
        width: 100%;
        height: 96px;
        border-spacing: 0px;
        -moz-box-sizing: border-box;
    }

    .nested4 {
        border-collapse: collapse;
        width: 100%;
        height: 248pt;
    }



    .fontsize {
        font-family: sans-serif;
        font-size: .9em;
    }

    .nested5 {
        border-collapse: collapse;
        width: 100%;
        height: 100%;
        border-spacing: 0px;
        padding-top: 0;
        -moz-box-sizing: border-box;
    }

    .nested6 {
        border-collapse: collapse;
        width: 100%;
        height: 100%;
        border-spacing: 0px;
        -moz-box-sizing: border-box;
    }

    .nested7 {
        border-collapse: collapse;
        width: 100%;
        border-spacing: 0px;
        padding-top: 0;
        -moz-box-sizing: border-box;
    }

    .nested8 {
        border-collapse: collapse;
        width: 100%;
        height: 450px;
        border-spacing: 0px;
        padding-top: 0;
        -moz-box-sizing: border-box;
    }

    .nestedwidth1 {
        background-color: #EBFA48;
        width: 25%;
    }

    .nestedtdwidth {
        width: 25%;
    }

    .nestedtd2width {
        width: 50%;
    }

    .footer1 {
        width: 100%;
        height: 270px;
        float: left;
    }

    .footerimg {
        width: 15%;
        /* margin-top:19px;*/
        float: left;
        position: relative;
        height: 20%;
        margin-top: 2px;
    }

    .footertext {
        float: right;
        width: 85%;
        height: 20%;
    }

    .billno {
        float: right;
    }

    .footerconsumerid {
        height: 20px;
        border: 1px solid #78578e;
        width: 40%;
        float: right;
        margin-right: 100px;
    }

    .footercontent {
        margin-top: 180px;
        border: 1px solid #78578e;
        width: 95%;
        height: 70px;
        margin-left: 20px;
    }

    .display-none {
        display: none !important;
    }

    /******************* COLORS **********************/
    .color-red {
        color: red;
    }

    .color-black {
        color: #161414;
    }

    /*******************  STYLES FOR POPUP MODAL **********************/

    button {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    /* Style for the modal */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Style for the modal content */
    .modal-content {
        background-color: #fefefe;
        margin: 10% auto;
        /* 10% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 40%;
        /* Adjust width to reduce popup size */
        max-height: 70%;
        /* Add max-height to add scroll bar if content overflows */
        overflow-y: auto;
        /* Add vertical scroll bar if content overflows */
        border-radius: 5px;
    }

    /* Style for the close button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
    </style>
</head>

<body contenteditable="false" cz-shortcut-listen="true">


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

    <div class="maincontent fontsize">
        <table style="width:100%">
            <tr>
                <td><img id="logo_image"
                        src="<?php echo site_url("assets/uploads/" . $system_global_settings[0]->sytem_admin_logo); ?>"
                        alt="<?php echo $system_global_settings[0]->system_title ?>"
                        title="<?php echo $system_global_settings[0]->system_title ?>" style="idth: 200px !important;
    float: left;
    width: 50px !important;
    height: 50px;
    padding: 10px;" /></td>
                <td style="text-align:center">
                    <h1>
                        <h2><?php echo $system_global_settings[0]->system_title ?> -
                            <?php echo $system_global_settings[0]->system_sub_title ?></h2>
                        <h5>Address:<?php echo $system_global_settings[0]->address ?></h5>

                    </h1>
                </td>
                <td> <small>
                        Email: <?php echo $system_global_settings[0]->email_address ?><br />
                        Phone: <?php echo $system_global_settings[0]->phone_number ?><br />
                        Mobile: <?php echo $system_global_settings[0]->mobile_number ?><br />
                        Fax: <?php echo $system_global_settings[0]->fax_number ?><br />

                    </small></td>
            </tr>
        </table>

        <table class="maintable" cellpadding="0" cellspacing="0">
            <tbody>
                <tr class="font-size" style="width: 100%;">
                    <td class="border-rb">
                        <h4>CONNECTION DATE</h4>
                    </td>
                    <td class="border-rb">
                        <h4>CONSUMER ID</h4>
                    </td>
                    <td class="border-rb">
                        <h4>BILL NO.</h4>
                    </td>
                    <td class="border-rb">
                        <h4>BILL MONTH</h4>
                    </td>
                    <td class="border-rb">
                        <h4>READING DATE </h4>
                    </td>
                    <td class="border-rb">
                        <h4>ISSUE DATE</h4>
                    </td>
                    <td class="border-b" style="color: Red;">
                        <h4>DUE DATE</h4>
                    </td>
                </tr>
                <tr class="font-size" style="width: 100%;">
                    <td class="border-rb" style="width: 206px">
                        <h4><?php echo date("d M, Y", strtotime($consumer->date_of_registration)); ?></h4>
                    </td>
                    <td class="border-rb">
                        <h4><?php echo $consumer->consumer_id; ?></h4>
                    </td>
                    <td class="border-rb" style="width: 53px">

                        <h4><?php echo $billing_month->billing_month_id; ?></h4>

                    </td>
                    <td class="border-rb" style="width: 129px">
                        <h4><?php echo date("M, Y", strtotime($billing_month->billing_month."-1")); ?></h4>
                    </td>
                    <td class="border-rb" style="width: 157px">
                        <h4><?php echo date("d M, Y", strtotime($row->reading_date)); ?></h4>
                    </td>
                    <td class="border-rb" style="width: 104px">
                        <h4><?php echo date("d M, Y", strtotime($billing_month->billing_issue_date)); ?></h4>
                    </td>
                    <td class="border-b" style="color: Red;">
                        <h4><?php echo date("d M, Y", strtotime($billing_month->billing_due_date)); ?></h4>
                    </td>
                </tr>


            </tbody>
        </table>

        <table style="width:100%">
            <tr>
                <td>
                    <table class="nes ted4" style="text-align:left">

                        <tbody>

                            <tr>
                                <th><?php echo $this->lang->line('consumer_cnic'); ?></th>
                                <td>
                                    <?php echo $consumer->consumer_cnic; ?>
                                </td>
                            </tr>
                            <tr>
                                <th><?php echo $this->lang->line('consumer_name'); ?></th>
                                <td>
                                    <?php echo $consumer->consumer_name; ?>
                                </td>
                            </tr>
                            <tr>
                                <th><?php echo $this->lang->line('consumer_father_name'); ?></th>
                                <td>
                                    <?php echo $consumer->consumer_father_name; ?>
                                </td>

                            </tr>
                            <tr>
                                <th><?php echo $this->lang->line('consumer_contact_no'); ?></th>
                                <td>
                                    <?php echo $consumer->consumer_contact_no; ?>
                                </td>

                            </tr>
                            <tr>
                                <th><?php echo $this->lang->line('consumer_address'); ?></th>
                                <td>
                                    <?php echo $consumer->consumer_address; ?>
                                </td>
                            </tr>
                            <tr>
                                <th><?php echo $this->lang->line('Status'); ?></th>
                                <td>
                                    <?php echo status($consumer->status); ?>
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </td>
                <td>
                    <table class="nested6 ">
                        <tbody>
                            <tr style="margin-top: -1px; height: 25px">
                                <td class="border-b " style="width: 25%;">
                                    <h4>MONTH</h4>
                                </td>
                                <td class="border-b" style="width: 25%;">
                                    <h4>UNITS</h4>
                                </td>
                                <td class="border-b" style="width: 25%;">
                                    <h4>BILL</h4>
                                </td>
                                <td class="border-b" style="width: 25%;">
                                    <h4>PAYMENT</h4>
                                </td>
                            </tr>
                            <?php 
                        
                        
                        
// Explode the billing month to get the year and month separately
$billingMonth = explode('-', $billing_month->billing_month);

$by = $billingMonth[0];
$bm = $billingMonth[1]-1;

// Initialize an array to store the previous 12 months
$previousMonths = [];

// Loop to get the previous 12 months
for ($i = 0; $i < 13; $i++) {
    // Create a DateTime object for the current billing month
    $currentDate = DateTime::createFromFormat('Y-m', $by . '-' . $bm);

    // Subtract the number of months based on the loop index
    $currentDate->modify("-$i months");
    $month = $currentDate->format('Y-m');
    $query = "SELECT `consumer_monthly_bills`.* 
          FROM `consumer_monthly_bills`
          INNER JOIN billing_months ON (billing_months.billing_month_id = `consumer_monthly_bills`.`billing_month_id`)
          WHERE billing_months.billing_month = '".$month."'
          AND `consumer_monthly_bills`.`consumer_id` = '".$consumer->consumer_id."'";

$m_bill = $this->db->query($query)->row();

    ?>
                            <tr style="height: 17px" class="content">
                                <td class="border-r">
                                    <?php echo $currentDate->format('M y'); ?>
                                </td>
                                <?php if($m_bill){ ?>
                                <td class="border-r">
                                    <?php echo $m_bill->unit_cosumed; ?>
                                </td>
                                <td class="border-r">
                                    <?php echo $m_bill->payable; ?>
                                </td>
                                <td>
                                    <?php echo $m_bill->paid; ?>
                                </td>
                                <?php }else{ ?>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <?php } ?>
                            </tr>
                            <?php }

// Now you can use the $previousMonths array in your HTML
?>




                        </tbody>
                    </table>
                </td>
                <td>
                    <table>
                        <tr>
                            <td class="border-r">
                                <h4>METER NO</h4>
                            </td>
                            <td class="border-r">
                                <h4>PREVIOUS READING</h4>
                            </td>
                            <td class="border-r">
                                <h4>PRESENT READING</h4>
                            </td>
                            <td class="border-r">
                                <h4>UNITS</h4>
                            </td>
                            <td class="border-r">
                                <h4>TARIFF</h4>
                            </td>
                            <td>
                                <h4>TOTAL</h4>
                            </td>
                        </tr>
                        <tr class="content">
                            <td class="border-r">
                                <?php echo $row->meter_number; ?><br>
                            </td>
                            <td class="border-r">
                                <?php echo $row->last_reading; ?><br>
                            </td>
                            <td class="border-r">
                                <?php echo $row->current_reading; ?><br>
                            </td>
                            <td class="border-r">
                                <?php echo $row->unit_cosumed; ?><br>
                            </td>
                            <td class="border-r">
                                <?php echo $row->rate; ?><br>
                            </td>
                            <td>
                                <?php echo $row->total; ?><br>
                            </td>
                        </tr>

                    </table>
                    <table class="nested7">
                        <tbody>
                            <tr class="fontsize" style="height: 28px; background-color: #7ADEFF; text-align: center">
                                <td colspan="4" class="border-b" style="font-size: 16px">
                                    <b>TOTAL CHARGES</b>
                                </td>
                            </tr>
                            <tr class="fontsize" style="height: 24px;">
                                <td class="border-rb nestedtd2width" style="background-color: #7ADEFF;">
                                    <b>ARREAR</b>
                                </td>
                                <td colspan="3" class="border-b  nestedtd2width content">
                                    <?php echo $row->last_month_arrears; ?>
                                </td>
                            </tr>
                            <tr class="fontsize" style="height: 24px;">
                                <td class="border-rb nestedtd2width" style="background-color: #7ADEFF;">
                                    <b>CURRENT BILL</b>
                                </td>
                                <td colspan="3" class="border-b  nestedtd2width content">
                                    <?php echo $row->total; ?>
                                </td>
                            </tr>
                            <tr class="fontsize" style="height: 24px;">
                                <td class="border-rb nestedtd2width" style="background-color: #7ADEFF;">
                                    <b>TAXES <?php echo $row->tax_per ?>%

                                    </b>
                                </td>
                                <td colspan="3" class="border-b  nestedtd2width content">
                                    <?php echo $row->tax_rs; ?><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="border-rb nestedtd2width" style="background-color: #7ADEFF;">
                                    <b>
                                        MONTHLY SERVICE CHARGES

                                    </b>
                                    <br>
                                </td>
                                <td colspan="3" class="border-b  nestedtd2width content">
                                    <?php echo $row->monthly_service_charges; ?>
                                    <br>
                                </td>
                            </tr>

                            <tr class="fontsize" style="height: 24px;">
                                <td class="border-rb nestedtd2width" style="color: Red; background-color: #7ADEFF">
                                    <b>PAYABLE WITHIN DUE DATE</b>
                                </td>
                                <td colspan="3" class="border-b nestedtd2width content">
                                    <?php echo $row->payable_within_due_date; ?>

                                    <br>
                                    <span></span>
                                </td>
                            </tr>
                            <tr class="fontsize" style="height: 24px;">
                                <td class="border-rb nestedtd2width" style="background-color: #7ADEFF;">
                                    <b>L.P.SURCHARGE</b>
                                </td>
                                <td colspan="3" class="border-b  nestedtd2width content">
                                    <?php echo ($row->payable_after_due_date-$row->payable_within_due_date); ?>
                                </td>
                            </tr>
                            <tr class="fontsize" style="height: 24px;">
                                <td class="border-rb nestedtd2width" style="color: Red; background-color: #7ADEFF">
                                    <b>PAYABLE AFTER DUE DATE</b>
                                </td>
                                <td colspan="3" class="border-b  nestedtd2width content">
                                    <?php echo $row->payable_after_due_date; ?>

                                    <br>
                                    <span> </span>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                </td>
            </tr>
        </table>


        <div class="border-b" style="padding:10px">
            -----------------------------------------------------CUT
            HERE---------------------------------------------------&#9986;
        </div>
        <div class="heade rtable fontsize">
            <div>

                <div style=" display: inline-block">
                    <table style="width:100%">
                        <tr>
                            <td>
                                <table
                                    style=" width: 120px; margin-right: 20px; float: right; border-collapse: collapse; text-align: center">
                                    <tbody>
                                        <tr>
                                            <td class="border-rb border-t"
                                                style="border-left: 1px solid #78578e; color: #78578e;">
                                                <h4>CONSUMER ID</h4>
                                            </td>
                                            <td class="border-rb border-t content">
                                                <?php echo $consumer->consumer_id; ?>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <h2><?php echo $system_global_settings[0]->system_title ?> -
                                    <?php echo $system_global_settings[0]->system_sub_title ?></h2>

                            <td>
                                <table
                                    style="width: 120px; margin-right: 20px; float: right; border-collapse: collapse; text-align: center">
                                    <tbody>
                                        <tr>
                                            <td class="border-rb border-t"
                                                style="border-left: 1px solid #78578e; color: #78578e;">
                                                <h4>BILL NO.</h4>
                                            </td>
                                            <td class="border-rb border-t content">
                                                <?php echo $billing_month->billing_month_id; ?>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <div
                                    style="display: inline-block; border: 1px solid #1a75ff; color: #1a75ff; padding: 20px; border-radius: 100%; width: 50px;">
                                    <small>PAID STAMP</small>
                                </div>
                            </td>
                        </tr>
                    </table>

                </div>




            </div>



            <div style="width: 98%; margin: 0 auto 10px;">
                <table style="text-align: center; width: 100%; border-collapse: collapse;">
                    <tbody>
                        <tr style="height: 30px;">
                            <td class="border-rb border-t" style="width: 25%; color: #78578e;">
                                <h4>CONSUMER NAME</h4>
                            </td>
                            <td class="border-rb border-t"
                                style="width: 15%; color: #78578e; border-left: 1px solid #78578e;">
                                <h4>BILL MONTH</h4>
                            </td>
                            <td class="border-rb border-t" style="width: 15%; color: #78578e;">
                                <h4>DUE DATE</h4>
                            </td>

                            <td class="border-rb border-t" style="width: 25%; color: red">
                                <h4>PAYABLE WITHIN DUE DATE</h4>
                            </td>
                            <td class="border-b border-t border-r content" style="width: 20%;">
                                <?php echo $row->payable_within_due_date; ?>
                                <br>
                                <span></span>
                            </td>
                        </tr>
                        <tr style="height: 40px;">
                            <td class="border-rb content"
                                style="width: 15%; text-align: center; border-left: 1px solid #78578e;">
                                <?php echo $consumer->consumer_name; ?>
                            </td>
                            <td class="border-rb content" style="width: 15%; text-align: center;">
                                <?php echo date("M, Y", strtotime($billing_month->billing_month."-1")); ?>
                            </td>
                            <td class="font-size border-rb content" style="width: 25%; text-align: Center;">
                                <?php echo date("d M, Y", strtotime($billing_month->billing_due_date)); ?>
                            </td>
                            <td class="border-rb" style="width: 25%; color: red;">
                                <h4>PAYABLE AFTER DUE DATE</h4>
                            </td>
                            <td class="font-size border-rb border-r content" style="width: 15%;">
                                <?php echo $row->payable_after_due_date; ?>


                                <br>
                                <span></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


    </div>



    <div></div>
</body>

</html>
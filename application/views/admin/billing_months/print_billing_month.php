<html lang="en">
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
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="keywords" content="">
    <meta name="description" content="">
    
    <title><?php echo $consumer->consumer_name; ?></title>
    
    <!-- Open Graph Tags -->
    <meta property="og:title" content="<?php echo $consumer->consumer_name; ?>" />
    <meta property="og:description" content="Electricity Bill for Month <?php echo date("M, Y", strtotime($billing_month->billing_month."-1")); ?>" />
    <!-- <meta property="og:image" content="<?php echo site_url('assets/images/electricity_bill.png'); ?>" /> Path to your image -->
    <meta property="og:url" content="<?php echo current_url(); ?>" /> <!-- The URL of your page -->
    
<link rel="stylesheet" type="text/css" href="<?php echo site_url("assets/" . ADMIN_DIR . "css/bill.css"); ?>" />
</head>

<body contenteditable="false" cz-shortcut-listen="true">


    

    <div class="maincontent fontsize">
        <table style="width:100%; margin-top: 50px; margin-bottom: 20px;">
            <tr>
                <td><img id="logo_image"
                        src="<?php echo site_url("assets/uploads/" . $system_global_settings[0]->sytem_admin_logo); ?>"
                        alt="<?php echo $system_global_settings[0]->system_title ?>"
                        title="<?php echo $system_global_settings[0]->system_title ?>" style="
                        float: left;
                        width: 80px !important;
                        height: 80px;
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
<br />
<br />
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
                <td style="paddin:10px !important">
                    <table class="nested6">
                        <tbody>
                            <tr style="height: 25px" class="border-rb">
                                <td class="border-rb" style="width: 25%;">
                                    <h4>MONTH</h4>
                                </td>
                                <td class="border-rb" style="width: 25%;">
                                    <h4>UNITS</h4>
                                </td>
                                <td class="border-rb" style="width: 25%;">
                                    <h4>BILL</h4>
                                </td>
                                <td class="border-rb" style="width: 25%;">
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
                                <td class="border-rb">
                                    <?php echo $currentDate->format('M y'); ?>
                                </td>
                                <?php if($m_bill){ ?>
                                <td class="border-rb">
                                    <?php echo $m_bill->unit_cosumed; ?>
                                </td>
                                <td class="border-rb">
                                    <?php echo $m_bill->payable; ?>
                                </td>
                                <td class="border-rb">
                                    <?php echo $m_bill->paid; ?>
                                </td>
                                <?php }else{ ?>
                                <td class="border-rb">0</td>
                                <td class="border-rb">0</td>
                                <td class="border-rb">0</td>
                                <?php } ?>
                            </tr>
                            <?php }

// Now you can use the $previousMonths array in your HTML
                            ?>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <br />
                    <br />
                    <table class="nested6" style="width:100%">
                        <tr>
                            <td>
                                <h4>METER NO</h4>
                            </td>
                            <td>
                                <h4>PREVIOUS READING</h4>
                            </td>
                            <td>
                                <h4>PRESENT READING</h4>
                            </td>
                            <td>
                                <h4>UNITS</h4>
                            </td>
                            <td>
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
                    <br />
                    <br />
                                </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
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

<br /> <br /><br />
        <div class="border-b" style="padding:10px">
            -----------------------------------------------------CUT
            HERE---------------------------------------------------&#9986;
             <br /> <br /><br />
        </div>
       
        <div class="heade rtable fontsize">

        <h5>Office Copy</h5>
            <div>

                <div style=" display: inline-block">
                    <table style="width:100%">
                        <tr>
                            
                            <td>
                               <table style="width:100%; margin-top: 50px; margin-bottom: 20px;">
            <tr>
                <td><img id="logo_image"
                        src="<?php echo site_url("assets/uploads/" . $system_global_settings[0]->sytem_admin_logo); ?>"
                        alt="<?php echo $system_global_settings[0]->system_title ?>"
                        title="<?php echo $system_global_settings[0]->system_title ?>" style="
                        float: left;
                        width: 80px !important;
                        height: 80px;
                        padding: 10px;" /></td>
                <td style="text-align:center">
                    <h1>
                        <h2><?php echo $system_global_settings[0]->system_title ?> -
                            <?php echo $system_global_settings[0]->system_sub_title ?></h2>
                        <h5>Address:<?php echo $system_global_settings[0]->address ?></h5>

                    </h1>
                </td>
                
            </tr>
        </table>

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

<br />
<br />

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
                <br />
<br />
<br />
<br />
<p style="text-align:center"><small>Software Desing and Developed by Navid Aziz 0324-4424424</small></p>
            </div>
        </div>


    </div>



    <div></div>
</body>

</html>
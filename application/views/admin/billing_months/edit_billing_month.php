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
                <li>
                    <i class="fa fa-table"></i>
                    <a href="<?php echo site_url(ADMIN_DIR . "billing_months/view/"); ?>"><?php echo $this->lang->line('Billing Months'); ?></a>
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
                        <a class="btn btn-primary btn-sm" href="<?php echo site_url(ADMIN_DIR . "billing_months/add"); ?>"><i class="fa fa-plus"></i> <?php echo $this->lang->line('New'); ?></a>
                        <a class="btn btn-danger btn-sm" href="<?php echo site_url(ADMIN_DIR . "billing_months/trashed"); ?>"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('Trash'); ?></a>
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

                <?php
                $edit_form_attr = array("class" => "form-horizontal");
                echo form_open_multipart(ADMIN_DIR . "billing_months/update_data/$billing_month->billing_month_id", $edit_form_attr);
                ?>
                <?php echo form_hidden("billing_month_id", $billing_month->billing_month_id); ?>

                <div class="form-group">

                    <?php
                    $label = array(
                        "class" => "col-md-2 control-label",
                        "style" => "",
                    );
                    echo form_label($this->lang->line('billing_month'), "billing_month", $label);      ?>

                    <div class="col-md-8">
                        <?php

                        $date = array(
                            "type"          =>  "month",
                            "name"          =>  "billing_month",
                            "id"            =>  "billing_month",
                            "class"         =>  "form-control",
                            "style"         =>  "", "required"      => "required", "title"         =>  $this->lang->line('billing_month'),
                            "value"         =>  set_value("billing_month", $billing_month->billing_month),
                            "placeholder"   =>  $this->lang->line('billing_month')
                        );
                        echo  form_input($date);
                        ?>
                        <?php echo form_error("billing_month", "<p class=\"text-danger\">", "</p>"); ?>
                    </div>



                </div>

                <div class="form-group">

                    <?php
                    $label = array(
                        "class" => "col-md-2 control-label",
                        "style" => "",
                    );
                    echo form_label($this->lang->line('meter_reading_start'), "meter_reading_start", $label);      ?>

                    <div class="col-md-8">
                        <?php

                        $date = array(
                            "type"          =>  "date",
                            "name"          =>  "meter_reading_start",
                            "id"            =>  "meter_reading_start",
                            "class"         =>  "form-control",
                            "style"         =>  "", "required"      => "required", "title"         =>  $this->lang->line('meter_reading_start'),
                            "value"         =>  set_value("meter_reading_start", $billing_month->meter_reading_start),
                            "placeholder"   =>  $this->lang->line('meter_reading_start')
                        );
                        echo  form_input($date);
                        ?>
                        <?php echo form_error("meter_reading_start", "<p class=\"text-danger\">", "</p>"); ?>
                    </div>



                </div>

                <div class="form-group">

                    <?php
                    $label = array(
                        "class" => "col-md-2 control-label",
                        "style" => "",
                    );
                    echo form_label($this->lang->line('meter_reading_end'), "meter_reading_end", $label);      ?>

                    <div class="col-md-8">
                        <?php

                        $date = array(
                            "type"          =>  "date",
                            "name"          =>  "meter_reading_end",
                            "id"            =>  "meter_reading_end",
                            "class"         =>  "form-control",
                            "style"         =>  "", "required"      => "required", "title"         =>  $this->lang->line('meter_reading_end'),
                            "value"         =>  set_value("meter_reading_end", $billing_month->meter_reading_end),
                            "placeholder"   =>  $this->lang->line('meter_reading_end')
                        );
                        echo  form_input($date);
                        ?>
                        <?php echo form_error("meter_reading_end", "<p class=\"text-danger\">", "</p>"); ?>
                    </div>



                </div>

                <div class="form-group">

                    <?php
                    $label = array(
                        "class" => "col-md-2 control-label",
                        "style" => "",
                    );
                    echo form_label($this->lang->line('billing_issue_date'), "billing_issue_date", $label);      ?>

                    <div class="col-md-8">
                        <?php

                        $date = array(
                            "type"          =>  "date",
                            "name"          =>  "billing_issue_date",
                            "id"            =>  "billing_issue_date",
                            "class"         =>  "form-control",
                            "style"         =>  "", "required"      => "required", "title"         =>  $this->lang->line('billing_issue_date'),
                            "value"         =>  set_value("billing_issue_date", $billing_month->billing_issue_date),
                            "placeholder"   =>  $this->lang->line('billing_issue_date')
                        );
                        echo  form_input($date);
                        ?>
                        <?php echo form_error("billing_issue_date", "<p class=\"text-danger\">", "</p>"); ?>
                    </div>



                </div>

                <div class="form-group">

                    <?php
                    $label = array(
                        "class" => "col-md-2 control-label",
                        "style" => "",
                    );
                    echo form_label($this->lang->line('billing_due_date'), "billing_due_date", $label);      ?>

                    <div class="col-md-8">
                        <?php

                        $date = array(
                            "type"          =>  "date",
                            "name"          =>  "billing_due_date",
                            "id"            =>  "billing_due_date",
                            "class"         =>  "form-control",
                            "style"         =>  "", "required"      => "required", "title"         =>  $this->lang->line('billing_due_date'),
                            "value"         =>  set_value("billing_due_date", $billing_month->billing_due_date),
                            "placeholder"   =>  $this->lang->line('billing_due_date')
                        );
                        echo  form_input($date);
                        ?>
                        <?php echo form_error("billing_due_date", "<p class=\"text-danger\">", "</p>"); ?>
                    </div>



                </div>

                <div class="col-md-offset-2 col-md-10">
                    <?php
                    $submit = array(
                        "type"  =>  "submit",
                        "name"  =>  "submit",
                        "value" =>  $this->lang->line('Update'),
                        "class" =>  "btn btn-primary",
                        "style" =>  ""
                    );
                    echo form_submit($submit);
                    ?>



                    <?php
                    $reset = array(
                        "type"  =>  "reset",
                        "name"  =>  "reset",
                        "value" =>  $this->lang->line('Reset'),
                        "class" =>  "btn btn-default",
                        "style" =>  ""
                    );
                    echo form_reset($reset);
                    ?>
                </div>
                <div style="clear:both;"></div>

                <?php echo form_close(); ?>

            </div>

        </div>
    </div>
    <!-- /MESSENGER -->
</div>
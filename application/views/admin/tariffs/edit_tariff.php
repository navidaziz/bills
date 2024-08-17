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
                    <a href="<?php echo site_url(ADMIN_DIR . "tariffs/view/"); ?>"><?php echo $this->lang->line('Tariffs'); ?></a>
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
                        <a class="btn btn-primary btn-sm" href="<?php echo site_url(ADMIN_DIR . "tariffs/add"); ?>"><i class="fa fa-plus"></i> <?php echo $this->lang->line('New'); ?></a>
                        <a class="btn btn-danger btn-sm" href="<?php echo site_url(ADMIN_DIR . "tariffs/trashed"); ?>"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('Trash'); ?></a>
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
                echo form_open_multipart(ADMIN_DIR . "tariffs/update_data/$tariff->tariff_id", $edit_form_attr);
                ?>
                <?php echo form_hidden("tariff_id", $tariff->tariff_id); ?>

                <div class="form-group">

                    <?php
                    $label = array(
                        "class" => "col-md-2 control-label",
                        "style" => "",
                    );
                    echo form_label($this->lang->line('tariff_type'), "tariff_type", $label);      ?>

                    <div class="col-md-8">
                        <?php

                        $text = array(
                            "type"          =>  "text",
                            "name"          =>  "tariff_type",
                            "id"            =>  "tariff_type",
                            "class"         =>  "form-control",
                            "style"         =>  "", "required"      => "required", "title"         =>  $this->lang->line('tariff_type'),
                            "value"         =>  set_value("tariff_type", $tariff->tariff_type),
                            "placeholder"   =>  $this->lang->line('tariff_type')
                        );
                        echo  form_input($text);
                        ?>
                        <?php echo form_error("tariff_type", "<p class=\"text-danger\">", "</p>"); ?>
                    </div>



                </div>

                <div class="form-group">

                    <?php
                    $label = array(
                        "class" => "col-md-2 control-label",
                        "style" => "",
                    );
                    echo form_label($this->lang->line('tariff'), "tariff", $label);      ?>

                    <div class="col-md-8">
                        <?php

                        $number = array(
                            "type"          =>  "number",
                            "name"          =>  "tariff",
                            "id"            =>  "tariff",
                            "class"         =>  "form-control",
                            "style"         =>  "",
                            "step" => "any",
                            "required"      => "required",
                            "title"         =>  $this->lang->line('tariff'),
                            "value"         =>  set_value("tariff", $tariff->tariff),
                            "placeholder"   =>  $this->lang->line('tariff')
                        );
                        echo  form_input($number);
                        ?>
                        <?php echo form_error("tariff", "<p class=\"text-danger\">", "</p>"); ?>
                    </div>



                </div>

                <div class="form-group">

                    <?php
                    $label = array(
                        "class" => "col-md-2 control-label",
                        "style" => "",
                    );
                    echo form_label($this->lang->line('monthly_service_charges'), "monthly_service_charges", $label);      ?>

                    <div class="col-md-8">
                        <?php

                        $number = array(
                            "type"          =>  "number",
                            "name"          =>  "monthly_service_charges",
                            "id"            =>  "monthly_service_charges",
                            "class"         =>  "form-control",
                            "style"         =>  "", "required"      => "required", "title"         =>  $this->lang->line('monthly_service_charges'),
                            "value"         =>  set_value("monthly_service_charges", $tariff->monthly_service_charges),
                            "placeholder"   =>  $this->lang->line('monthly_service_charges')
                        );
                        echo  form_input($number);
                        ?>
                        <?php echo form_error("monthly_service_charges", "<p class=\"text-danger\">", "</p>"); ?>
                    </div>



                </div>

                <div class="form-group">

                    <?php
                    $label = array(
                        "class" => "col-md-2 control-label",
                        "style" => "",
                    );
                    echo form_label($this->lang->line('tax'), "tax", $label);      ?>

                    <div class="col-md-8">
                        <?php

                        $number = array(
                            "type"          =>  "number",
                            "name"          =>  "tax",
                            "id"            =>  "tax",
                            "class"         =>  "form-control",
                            "style"         =>  "", "required"      => "required", "title"         =>  $this->lang->line('tax'),
                            "value"         =>  set_value("tax", $tariff->tax),
                            "placeholder"   =>  $this->lang->line('tax')
                        );
                        echo  form_input($number);
                        ?>
                        <?php echo form_error("tax", "<p class=\"text-danger\">", "</p>"); ?>
                    </div>



                </div>

                <div class="form-group">

                    <?php
                    $label = array(
                        "class" => "col-md-2 control-label",
                        "style" => "",
                    );
                    echo form_label($this->lang->line('late_deposit_fine'), "late_deposit_fine", $label);      ?>

                    <div class="col-md-8">
                        <?php

                        $number = array(
                            "type"          =>  "number",
                            "name"          =>  "late_deposit_fine",
                            "id"            =>  "late_deposit_fine",
                            "class"         =>  "form-control",
                            "style"         =>  "", "required"      => "required", "title"         =>  $this->lang->line('late_deposit_fine'),
                            "value"         =>  set_value("late_deposit_fine", $tariff->late_deposit_fine),
                            "placeholder"   =>  $this->lang->line('late_deposit_fine')
                        );
                        echo  form_input($number);
                        ?>
                        <?php echo form_error("late_deposit_fine", "<p class=\"text-danger\">", "</p>"); ?>
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
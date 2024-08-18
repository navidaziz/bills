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
                $add_form_attr = array("class" => "form-horizontal");
                echo form_open_multipart(ADMIN_DIR . "billing_months/save_data", $add_form_attr);
                ?>

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
                            "style"         =>  "",
                            "required"      => "required",
                            "title"         =>  $this->lang->line('billing_month'),
                            "value"         =>  set_value("billing_month"),
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
                            "value"         =>  set_value("meter_reading_start"),
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
                            "value"         =>  set_value("meter_reading_end"),
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
                            "value"         =>  set_value("billing_issue_date"),
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
                            "value"         =>  set_value("billing_due_date"),
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
                        "value" =>  $this->lang->line('Save'),
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

                <br />
                  <div class="table-responsive">

                    <table class="table table-bordered">
                        <thead>
                            <tr>

                                <th><?php echo $this->lang->line('billing_month'); ?></th>
                                <th><?php echo $this->lang->line('meter_reading_start'); ?></th>
                                <th><?php echo $this->lang->line('meter_reading_end'); ?></th>
                                <th><?php echo $this->lang->line('billing_issue_date'); ?></th>
                                <th><?php echo $this->lang->line('billing_due_date'); ?></th>
                                <th><?php echo $this->lang->line('Status'); ?></th>
                                <th><?php echo $this->lang->line('Action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $query="SELECT * FROM billing_months";
                            $billing_months = $this->db->query($query)->result();
                            foreach ($billing_months as $billing_month): ?>

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
                                        <?php echo status($billing_month->status,  $this->lang); ?>
                                        <?php

                                        //set uri segment
                                        if (!$this->uri->segment(4)) {
                                            $page = 0;
                                        } else {
                                            $page = $this->uri->segment(4);
                                        }

                                        if ($billing_month->status == 0) {
                                            echo "<a href='" . site_url(ADMIN_DIR . "billing_months/publish/" . $billing_month->billing_month_id . "/" . $page) . "'> &nbsp;" . $this->lang->line('Publish') . "</a>";
                                        } elseif ($billing_month->status == 1) {
                                            echo "<a href='" . site_url(ADMIN_DIR . "billing_months/draft/" . $billing_month->billing_month_id . "/" . $page) . "'> &nbsp;" . $this->lang->line('Draft') . "</a>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a class="llink llink-view" href="<?php echo site_url(ADMIN_DIR . "billing_months/view_billing_month/" . $billing_month->billing_month_id . "/" . $this->uri->segment(4)); ?>"><i class="fa fa-eye"></i> </a>
                                        <a class="llink llink-edit" href="<?php echo site_url(ADMIN_DIR . "billing_months/edit/" . $billing_month->billing_month_id . "/" . $this->uri->segment(4)); ?>"><i class="fa fa-pencil-square-o"></i></a>
                                        <a class="llink llink-trash" href="<?php echo site_url(ADMIN_DIR . "billing_months/trash/" . $billing_month->billing_month_id . "/" . $this->uri->segment(4)); ?>"><i class="fa fa-trash-o"></i></a>
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


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
					<a href="<?php echo site_url(ADMIN_DIR.$this->session->userdata("role_homepage_uri")); ?>"><?php echo $this->lang->line('Home'); ?></a>
				</li><li>
				<i class="fa fa-table"></i>
				<a href="<?php echo site_url(ADMIN_DIR."consumers/view/"); ?>"><?php echo $this->lang->line('Consumers'); ?></a>
			</li><li><?php echo $title; ?></li>
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
                        <a class="btn btn-primary btn-sm" href="<?php echo site_url(ADMIN_DIR."consumers/add"); ?>"><i class="fa fa-plus"></i> <?php echo $this->lang->line('New'); ?></a>
                        <a class="btn btn-danger btn-sm" href="<?php echo site_url(ADMIN_DIR."consumers/trashed"); ?>"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('Trash'); ?></a>
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
                $add_form_attr = array("class" => "form-horizontal");
                echo form_open_multipart(ADMIN_DIR."consumers/save_data", $add_form_attr);
            ?>
            
            <div class="form-group">
            
                <?php
                    $label = array(
                        "class" => "col-md-2 control-label",
                        "style" => "",
                    ); echo form_label($this->lang->line('consumer_cnic'), "consumer_cnic", $label);      ?>

                <div class="col-md-8">
                <?php
                    
                    $text = array(
                        "type"          =>  "text",
                        "name"          =>  "consumer_cnic",
                        "id"            =>  "consumer_cnic",
                        "class"         =>  "form-control",
                        "style"         =>  "","required"	  => "required","title"         =>  $this->lang->line('consumer_cnic'),
                        "value"         =>  set_value("consumer_cnic"),
                        "placeholder"   =>  $this->lang->line('consumer_cnic')
                    );
                    echo  form_input($text);
                ?>
                <?php echo form_error("consumer_cnic", "<p class=\"text-danger\">", "</p>"); ?>
                </div>
                
                
                
            </div>
    
            <div class="form-group">
            
                <?php
                    $label = array(
                        "class" => "col-md-2 control-label",
                        "style" => "",
                    ); echo form_label($this->lang->line('consumer_name'), "consumer_name", $label);      ?>

                <div class="col-md-8">
                <?php
                    
                    $text = array(
                        "type"          =>  "text",
                        "name"          =>  "consumer_name",
                        "id"            =>  "consumer_name",
                        "class"         =>  "form-control",
                        "style"         =>  "","required"	  => "required","title"         =>  $this->lang->line('consumer_name'),
                        "value"         =>  set_value("consumer_name"),
                        "placeholder"   =>  $this->lang->line('consumer_name')
                    );
                    echo  form_input($text);
                ?>
                <?php echo form_error("consumer_name", "<p class=\"text-danger\">", "</p>"); ?>
                </div>
                
                
                
            </div>
    
            <div class="form-group">
            
                <?php
                    $label = array(
                        "class" => "col-md-2 control-label",
                        "style" => "",
                    ); echo form_label($this->lang->line('consumer_father_name'), "consumer_father_name", $label);      ?>

                <div class="col-md-8">
                <?php
                    
                    $text = array(
                        "type"          =>  "text",
                        "name"          =>  "consumer_father_name",
                        "id"            =>  "consumer_father_name",
                        "class"         =>  "form-control",
                        "style"         =>  "","required"	  => "required","title"         =>  $this->lang->line('consumer_father_name'),
                        "value"         =>  set_value("consumer_father_name"),
                        "placeholder"   =>  $this->lang->line('consumer_father_name')
                    );
                    echo  form_input($text);
                ?>
                <?php echo form_error("consumer_father_name", "<p class=\"text-danger\">", "</p>"); ?>
                </div>
                
                
                
            </div>
    
            <div class="form-group">
            
                <?php
                    $label = array(
                        "class" => "col-md-2 control-label",
                        "style" => "",
                    ); echo form_label($this->lang->line('consumer_contact_no'), "consumer_contact_no", $label);      ?>

                <div class="col-md-8">
                <?php
                    
                    $number = array(
                        "type"          =>  "number",
                        "name"          =>  "consumer_contact_no",
                        "id"            =>  "consumer_contact_no",
                        "class"         =>  "form-control",
                        "style"         =>  "","required"	  => "required","title"         =>  $this->lang->line('consumer_contact_no'),
                        "value"         =>  set_value("consumer_contact_no"),
                        "placeholder"   =>  $this->lang->line('consumer_contact_no')
                    );
                    echo  form_input($number);
                ?>
                <?php echo form_error("consumer_contact_no", "<p class=\"text-danger\">", "</p>"); ?>
                </div>
                
                
                
            </div>
    
            <div class="form-group">
            
                <?php
                    $label = array(
                        "class" => "col-md-2 control-label",
                        "style" => "",
                    );
                   echo form_label($this->lang->line('consumer_address'), "consumer_address", $label);
                ?>

                <div class="col-md-8">
                <?php
                    
                    $textarea = array(
                        "name"          =>  "consumer_address",
                        "id"            =>  "consumer_address",
                        "class"         =>  "form-control",
                        "style"         =>  "",
                        "title"         =>  $this->lang->line('consumer_address'),"required"	  => "required",
                        "rows"          =>  "",
                        "cols"          =>  "",
                        "value"         => set_value("consumer_address"),
                        "placeholder"   =>  $this->lang->line('consumer_address')
                    );
                    echo form_textarea($textarea);
                ?>
                <?php echo form_error("consumer_address", "<p class=\"text-danger\">", "</p>"); ?>
                </div>
                
            </div>
    
            <div class="form-group">
            
                <?php
                    $label = array(
                        "class" => "col-md-2 control-label",
                        "style" => "",
                    ); echo form_label($this->lang->line('consumer_meter_no'), "consumer_meter_no", $label);      ?>

                <div class="col-md-8">
                <?php
                    
                    $number = array(
                        "type"          =>  "number",
                        "name"          =>  "consumer_meter_no",
                        "id"            =>  "consumer_meter_no",
                        "class"         =>  "form-control",
                        "style"         =>  "","required"	  => "required","title"         =>  $this->lang->line('consumer_meter_no'),
                        "value"         =>  set_value("consumer_meter_no"),
                        "placeholder"   =>  $this->lang->line('consumer_meter_no')
                    );
                    echo  form_input($number);
                ?>
                <?php echo form_error("consumer_meter_no", "<p class=\"text-danger\">", "</p>"); ?>
                </div>
                
                
                
            </div>
    
            <div class="form-group">
            
                <?php
                    $label = array(
                        "class" => "col-md-2 control-label",
                        "style" => "",
                    ); echo form_label($this->lang->line('date_of_registration'), "date_of_registration", $label);      ?>

                <div class="col-md-8">
                <?php
                    
                    $date = array(
                        "type"          =>  "date",
                        "name"          =>  "date_of_registration",
                        "id"            =>  "date_of_registration",
                        "class"         =>  "form-control",
                        "style"         =>  "","required"	  => "required","title"         =>  $this->lang->line('date_of_registration'),
                        "value"         =>  set_value("date_of_registration"),
                        "placeholder"   =>  $this->lang->line('date_of_registration')
                    );
                    echo  form_input($date);
                ?>
                <?php echo form_error("date_of_registration", "<p class=\"text-danger\">", "</p>"); ?>
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
            
        </div>
		
	</div>
	</div>
	<!-- /MESSENGER -->
</div>

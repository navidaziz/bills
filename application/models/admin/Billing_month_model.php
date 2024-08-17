<?php if(!defined('BASEPATH')) exit('Direct access not allowed!');

class Billing_month_model extends MY_Model{
    
    public function __construct(){
        
        parent::__construct();
        $this->table = "billing_months";
        $this->pk = "billing_month_id";
        $this->status = "status";
        $this->order = "order";
    }
	
 public function validate_form_data(){
	 $validation_config = array(
            
                        array(
                            "field"  =>  "billing_month",
                            "label"  =>  "Billing Month",
                            "rules"  =>  "required"
                        ),
                        
                        array(
                            "field"  =>  "meter_reading_start",
                            "label"  =>  "Meter Reading Start",
                            "rules"  =>  "required"
                        ),
                        
                        array(
                            "field"  =>  "meter_reading_end",
                            "label"  =>  "Meter Reading End",
                            "rules"  =>  "required"
                        ),
                        
                        array(
                            "field"  =>  "billing_issue_date",
                            "label"  =>  "Billing Issue Date",
                            "rules"  =>  "required"
                        ),
                        
                        array(
                            "field"  =>  "billing_due_date",
                            "label"  =>  "Billing Due Date",
                            "rules"  =>  "required"
                        ),
                        
            );
	 //set and run the validation
        $this->form_validation->set_rules($validation_config);
	 return $this->form_validation->run();
	 
	 }	

public function save_data($image_field= NULL){
	$inputs = array();
            
                    $inputs["billing_month"]  =  $this->input->post("billing_month");
                    
                    $inputs["meter_reading_start"]  =  $this->input->post("meter_reading_start");
                    
                    $inputs["meter_reading_end"]  =  $this->input->post("meter_reading_end");
                    
                    $inputs["billing_issue_date"]  =  $this->input->post("billing_issue_date");
                    
                    $inputs["billing_due_date"]  =  $this->input->post("billing_due_date");
                    
	return $this->billing_month_model->save($inputs);
	}	 	

public function update_data($billing_month_id, $image_field= NULL){
	$inputs = array();
            
                    $inputs["billing_month"]  =  $this->input->post("billing_month");
                    
                    $inputs["meter_reading_start"]  =  $this->input->post("meter_reading_start");
                    
                    $inputs["meter_reading_end"]  =  $this->input->post("meter_reading_end");
                    
                    $inputs["billing_issue_date"]  =  $this->input->post("billing_issue_date");
                    
                    $inputs["billing_due_date"]  =  $this->input->post("billing_due_date");
                    
	return $this->billing_month_model->save($inputs, $billing_month_id);
	}	
	
    //----------------------------------------------------------------
 public function get_billing_month_list($where_condition=NULL, $pagination=TRUE, $public = FALSE){
		$data = (object) array();
		$fields = array("billing_months.*");
		$join_table = array();
		if(!is_null($where_condition)){ $where = $where_condition; }else{ $where = ""; }
		
		if($pagination){
				//configure the pagination
	        $this->load->library("pagination");
			
			if($public){
					$config['per_page'] = 10;
					$config['uri_segment'] = 3;
					$this->billing_month_model->uri_segment = $this->uri->segment(3);
					$config["base_url"]  = base_url($this->uri->segment(1)."/".$this->uri->segment(2));
				}else{
					$this->billing_month_model->uri_segment = $this->uri->segment(4);
					$config["base_url"]  = base_url(ADMIN_DIR.$this->uri->segment(2)."/".$this->uri->segment(3));
					}
			$config["total_rows"] = $this->billing_month_model->joinGet($fields, "billing_months", $join_table, $where, true);
	        $this->pagination->initialize($config);
	        $data->pagination = $this->pagination->create_links();
			$data->billing_months = $this->billing_month_model->joinGet($fields, "billing_months", $join_table, $where);
			return $data;
		}else{
			return $this->billing_month_model->joinGet($fields, "billing_months", $join_table, $where, FALSE, TRUE);
		}
		
	}

public function get_billing_month($billing_month_id){
	
		$fields = array("billing_months.*");
		$join_table = array();
		$where = "billing_months.billing_month_id = $billing_month_id";
		
		return $this->billing_month_model->joinGet($fields, "billing_months", $join_table, $where, FALSE, TRUE);
		
	}
	
	


}


	


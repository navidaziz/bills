<?php if(!defined('BASEPATH')) exit('Direct access not allowed!');

class Tariff_model extends MY_Model{
    
    public function __construct(){
        
        parent::__construct();
        $this->table = "tariffs";
        $this->pk = "tariff_id";
        $this->status = "status";
        $this->order = "order";
    }
	
 public function validate_form_data(){
	 $validation_config = array(
            
                        array(
                            "field"  =>  "tariff_type",
                            "label"  =>  "Tariff Type",
                            "rules"  =>  "required"
                        ),
                        
                        array(
                            "field"  =>  "tariff",
                            "label"  =>  "Tariff",
                            "rules"  =>  "required"
                        ),
                        
                        array(
                            "field"  =>  "monthly_service_charges",
                            "label"  =>  "Monthly Service Charges",
                            "rules"  =>  "required"
                        ),
                        
                        array(
                            "field"  =>  "tax",
                            "label"  =>  "Tax",
                            "rules"  =>  "required"
                        ),
                        
                        array(
                            "field"  =>  "late_deposit_fine",
                            "label"  =>  "Late Deposit Fine",
                            "rules"  =>  "required"
                        ),
                        
            );
	 //set and run the validation
        $this->form_validation->set_rules($validation_config);
	 return $this->form_validation->run();
	 
	 }	

public function save_data($image_field= NULL){
	$inputs = array();
            
                    $inputs["tariff_type"]  =  $this->input->post("tariff_type");
                    
                    $inputs["tariff"]  =  $this->input->post("tariff");
                    
                    $inputs["monthly_service_charges"]  =  $this->input->post("monthly_service_charges");
                    
                    $inputs["tax"]  =  $this->input->post("tax");
                    
                    $inputs["late_deposit_fine"]  =  $this->input->post("late_deposit_fine");
                    
	return $this->tariff_model->save($inputs);
	}	 	

public function update_data($tariff_id, $image_field= NULL){
	$inputs = array();
            
                    $inputs["tariff_type"]  =  $this->input->post("tariff_type");
                    
                    $inputs["tariff"]  =  $this->input->post("tariff");
                    
                    $inputs["monthly_service_charges"]  =  $this->input->post("monthly_service_charges");
                    
                    $inputs["tax"]  =  $this->input->post("tax");
                    
                    $inputs["late_deposit_fine"]  =  $this->input->post("late_deposit_fine");
                    
	return $this->tariff_model->save($inputs, $tariff_id);
	}	
	
    //----------------------------------------------------------------
 public function get_tariff_list($where_condition=NULL, $pagination=TRUE, $public = FALSE){
		$data = (object) array();
		$fields = array("tariffs.*");
		$join_table = array();
		if(!is_null($where_condition)){ $where = $where_condition; }else{ $where = ""; }
		
		if($pagination){
				//configure the pagination
	        $this->load->library("pagination");
			
			if($public){
					$config['per_page'] = 10;
					$config['uri_segment'] = 3;
					$this->tariff_model->uri_segment = $this->uri->segment(3);
					$config["base_url"]  = base_url($this->uri->segment(1)."/".$this->uri->segment(2));
				}else{
					$this->tariff_model->uri_segment = $this->uri->segment(4);
					$config["base_url"]  = base_url(ADMIN_DIR.$this->uri->segment(2)."/".$this->uri->segment(3));
					}
			$config["total_rows"] = $this->tariff_model->joinGet($fields, "tariffs", $join_table, $where, true);
	        $this->pagination->initialize($config);
	        $data->pagination = $this->pagination->create_links();
			$data->tariffs = $this->tariff_model->joinGet($fields, "tariffs", $join_table, $where);
			return $data;
		}else{
			return $this->tariff_model->joinGet($fields, "tariffs", $join_table, $where, FALSE, TRUE);
		}
		
	}

public function get_tariff($tariff_id){
	
		$fields = array("tariffs.*");
		$join_table = array();
		$where = "tariffs.tariff_id = $tariff_id";
		
		return $this->tariff_model->joinGet($fields, "tariffs", $join_table, $where, FALSE, TRUE);
		
	}
	
	


}


	


<?php if(!defined('BASEPATH')) exit('Direct access not allowed!');

class Consumer_model extends MY_Model{
    
    public function __construct(){
        
        parent::__construct();
        $this->table = "consumers";
        $this->pk = "consumer_id";
        $this->status = "status";
        $this->order = "order";
    }
	
 public function validate_form_data(){
	 $validation_config = array(
            
                        array(
                            "field"  =>  "consumer_cnic",
                            "label"  =>  "Consumer Cnic",
                            "rules"  =>  "required"
                        ),
                        
                        array(
                            "field"  =>  "consumer_name",
                            "label"  =>  "Consumer Name",
                            "rules"  =>  "required"
                        ),
                        
                        array(
                            "field"  =>  "consumer_father_name",
                            "label"  =>  "Consumer Father Name",
                            "rules"  =>  "required"
                        ),
                        
                        array(
                            "field"  =>  "consumer_contact_no",
                            "label"  =>  "Consumer Contact No",
                            "rules"  =>  "required"
                        ),
                        
                        array(
                            "field"  =>  "consumer_address",
                            "label"  =>  "Consumer Address",
                            "rules"  =>  "required"
                        ),
                        
                        array(
                            "field"  =>  "consumer_meter_no",
                            "label"  =>  "Consumer Meter No",
                            "rules"  =>  "required"
                        ),
                        
                        array(
                            "field"  =>  "tariff_id",
                            "label"  =>  "Tariff Id",
                            "rules"  =>  "required"
                        ),
                        
                        array(
                            "field"  =>  "date_of_registration",
                            "label"  =>  "Date Of Registration",
                            "rules"  =>  "required"
                        ),
                        
            );
	 //set and run the validation
        $this->form_validation->set_rules($validation_config);
	 return $this->form_validation->run();
	 
	 }	

public function save_data($image_field= NULL){
	$inputs = array();
            
                    $inputs["consumer_cnic"]  =  $this->input->post("consumer_cnic");
                    
                    $inputs["consumer_name"]  =  $this->input->post("consumer_name");
                    
                    $inputs["consumer_father_name"]  =  $this->input->post("consumer_father_name");
                    
                    $inputs["consumer_contact_no"]  =  $this->input->post("consumer_contact_no");
                    
                    $inputs["consumer_address"]  =  $this->input->post("consumer_address");
                    
                    $inputs["consumer_meter_no"]  =  $this->input->post("consumer_meter_no");
                    
                    $inputs["tariff_id"]  =  $this->input->post("tariff_id");
                    
                    $inputs["date_of_registration"]  =  $this->input->post("date_of_registration");
                    
	return $this->consumer_model->save($inputs);
	}	 	

public function update_data($consumer_id, $image_field= NULL){
	$inputs = array();
            
                    $inputs["consumer_cnic"]  =  $this->input->post("consumer_cnic");
                    
                    $inputs["consumer_name"]  =  $this->input->post("consumer_name");
                    
                    $inputs["consumer_father_name"]  =  $this->input->post("consumer_father_name");
                    
                    $inputs["consumer_contact_no"]  =  $this->input->post("consumer_contact_no");
                    
                    $inputs["consumer_address"]  =  $this->input->post("consumer_address");
                    
                    $inputs["consumer_meter_no"]  =  $this->input->post("consumer_meter_no");
                    
                    $inputs["tariff_id"]  =  $this->input->post("tariff_id");
                    
                    $inputs["date_of_registration"]  =  $this->input->post("date_of_registration");
                    
	return $this->consumer_model->save($inputs, $consumer_id);
	}	
	
    //----------------------------------------------------------------
 public function get_consumer_list($where_condition=NULL, $pagination=TRUE, $public = FALSE){
		$data = (object) array();
		$fields = array("consumers.*"
                , "tariffs.tariff_type"
            );
		$join_table = array(
            "tariffs" => "tariffs.tariff_id = consumers.tariff_id",
        );
		if(!is_null($where_condition)){ $where = $where_condition; }else{ $where = ""; }
		
		if($pagination){
				//configure the pagination
	        $this->load->library("pagination");
			
			if($public){
					$config['per_page'] = 10;
					$config['uri_segment'] = 3;
					$this->consumer_model->uri_segment = $this->uri->segment(3);
					$config["base_url"]  = base_url($this->uri->segment(1)."/".$this->uri->segment(2));
				}else{
					$this->consumer_model->uri_segment = $this->uri->segment(4);
					$config["base_url"]  = base_url(ADMIN_DIR.$this->uri->segment(2)."/".$this->uri->segment(3));
					}
			$config["total_rows"] = $this->consumer_model->joinGet($fields, "consumers", $join_table, $where, true);
	        $this->pagination->initialize($config);
	        $data->pagination = $this->pagination->create_links();
			$data->consumers = $this->consumer_model->joinGet($fields, "consumers", $join_table, $where);
			return $data;
		}else{
			return $this->consumer_model->joinGet($fields, "consumers", $join_table, $where, FALSE, TRUE);
		}
		
	}

public function get_consumer($consumer_id){
	
		$fields = array("consumers.*"
                , "tariffs.tariff_type"
            );
		$join_table = array(
            "tariffs" => "tariffs.tariff_id = consumers.tariff_id",
        );
		$where = "consumers.consumer_id = $consumer_id";
		
		return $this->consumer_model->joinGet($fields, "consumers", $join_table, $where, FALSE, TRUE);
		
	}
	
	


}


	


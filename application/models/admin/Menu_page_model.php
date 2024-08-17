<?php if(!defined('BASEPATH')) exit('Direct access not allowed!');

class Menu_page_model extends MY_Model{
    
    public function __construct(){
        
        parent::__construct();
        $this->table = "menu_pages";
        $this->pk = "menu_page_id";
        $this->status = "status";
        $this->order = "order";
    }
	
 public function validate_form_data(){
	 $validation_config = array(
            
                        array(
                            "field"  =>  "page_id",
                            "label"  =>  "Page Id",
                            "rules"  =>  "required"
                        ),
                        
            );
	 //set and run the validation
        $this->form_validation->set_rules($validation_config);
	 return $this->form_validation->run();
	 
	 }	

public function save_data($image_field= NULL){
	$inputs = array();
            
                    $inputs["page_id"]  =  $this->input->post("page_id");
                    
	return $this->menu_page_model->save($inputs);
	}	 	

public function update_data($menu_page_id, $image_field= NULL){
	$inputs = array();
            
                    $inputs["page_id"]  =  $this->input->post("page_id");
                    
	return $this->menu_page_model->save($inputs, $menu_page_id);
	}	
	
    //----------------------------------------------------------------
 public function get_menu_page_list($where_condition=NULL, $pagination=TRUE, $public = FALSE){
		$data = (object) array();
		$fields = array("menu_pages.*"
                , "pages.page_name"
            );
		$join_table = array(
            "pages" => "pages.PAGE_ID = menu_pages.PAGE_ID",
        );
		if(!is_null($where_condition)){ $where = $where_condition; }else{ $where = ""; }
		
		if($pagination){
				//configure the pagination
	        $this->load->library("pagination");
			
			if($public){
					$config['per_page'] = 10;
					$config['uri_segment'] = 3;
					$this->menu_page_model->uri_segment = $this->uri->segment(3);
					$config["base_url"]  = base_url($this->uri->segment(1)."/".$this->uri->segment(2));
				}else{
					$this->menu_page_model->uri_segment = $this->uri->segment(4);
					$config["base_url"]  = base_url(ADMIN_DIR.$this->uri->segment(2)."/".$this->uri->segment(3));
					}
			$config["total_rows"] = $this->menu_page_model->joinGet($fields, "menu_pages", $join_table, $where, true);
	        $this->pagination->initialize($config);
	        $data->pagination = $this->pagination->create_links();
			$data->menu_pages = $this->menu_page_model->joinGet($fields, "menu_pages", $join_table, $where);
			return $data;
		}else{
			return $this->menu_page_model->joinGet($fields, "menu_pages", $join_table, $where, FALSE, TRUE);
		}
		
	}

public function get_menu_page($menu_page_id){
	
		$fields = array("menu_pages.*"
                , "pages.page_name"
            );
		$join_table = array(
            "pages" => "pages.PAGE_ID = menu_pages.PAGE_ID",
        );
		$where = "menu_pages.menu_page_id = $menu_page_id";
		
		return $this->menu_page_model->joinGet($fields, "menu_pages", $join_table, $where, FALSE, TRUE);
		
	}
	
	


}


	


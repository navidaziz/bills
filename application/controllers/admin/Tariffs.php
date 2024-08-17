<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
        
class Tariffs extends Admin_Controller{
    
    /**
     * constructor method
     */
    public function __construct(){
        
        parent::__construct();
        $this->load->model("admin/tariff_model");
		$this->lang->load("tariffs", 'english');
		$this->lang->load("system", 'english');
        //$this->output->enable_profiler(TRUE);
    }
    //---------------------------------------------------------------
    
    
    /**
     * Default action to be called
     */ 
    public function index(){
        $main_page=base_url().ADMIN_DIR.$this->router->fetch_class()."/view";
  		redirect($main_page); 
    }
    //---------------------------------------------------------------


	
    /**
     * get a list of all items that are not trashed
     */
    public function view(){
		
        $where = "`tariffs`.`status` IN (0, 1) ";
		$data = $this->tariff_model->get_tariff_list($where);
		 $this->data["tariffs"] = $data->tariffs;
		 $this->data["pagination"] = $data->pagination;
		 $this->data["title"] = $this->lang->line('Tariffs');
		$this->data["view"] = ADMIN_DIR."tariffs/tariffs";
		$this->load->view(ADMIN_DIR."layout", $this->data);
    }
    //-----------------------------------------------------
    
    /**
     * get single record by id
     */
    public function view_tariff($tariff_id){
        
        $tariff_id = (int) $tariff_id;
        
        $this->data["tariffs"] = $this->tariff_model->get_tariff($tariff_id);
        $this->data["title"] = $this->lang->line('Tariff Details');
		$this->data["view"] = ADMIN_DIR."tariffs/view_tariff";
        $this->load->view(ADMIN_DIR."layout", $this->data);
    }
    //-----------------------------------------------------
    
    /**
     * get a list of all trashed items
     */
    public function trashed(){
	
        $where = "`tariffs`.`status` IN (2) ";
		$data = $this->tariff_model->get_tariff_list($where);
		 $this->data["tariffs"] = $data->tariffs;
		 $this->data["pagination"] = $data->pagination;
		 $this->data["title"] = $this->lang->line('Trashed Tariffs');
		$this->data["view"] = ADMIN_DIR."tariffs/trashed_tariffs";
        $this->load->view(ADMIN_DIR."layout", $this->data);
    }
    //-----------------------------------------------------
    
    /**
     * function to send a user to trash
     */
    public function trash($tariff_id, $page_id = NULL){
        
        $tariff_id = (int) $tariff_id;
        
        
        $this->tariff_model->changeStatus($tariff_id, "2");
        $this->session->set_flashdata("msg_success", $this->lang->line("trash_msg_success"));
        redirect(ADMIN_DIR."tariffs/view/".$page_id);
    }
    
    /**
      * function to restor tariff from trash
      * @param $tariff_id integer
      */
     public function restore($tariff_id, $page_id = NULL){
        
        $tariff_id = (int) $tariff_id;
        
        
        $this->tariff_model->changeStatus($tariff_id, "1");
        $this->session->set_flashdata("msg_success", $this->lang->line("restore_msg_success"));
        redirect(ADMIN_DIR."tariffs/trashed/".$page_id);
     }
     //---------------------------------------------------------------------------
    
    /**
      * function to draft tariff from trash
      * @param $tariff_id integer
      */
     public function draft($tariff_id, $page_id = NULL){
        
        $tariff_id = (int) $tariff_id;
        
        
        $this->tariff_model->changeStatus($tariff_id, "0");
        $this->session->set_flashdata("msg_success", $this->lang->line("draft_msg_success"));
        redirect(ADMIN_DIR."tariffs/view/".$page_id);
     }
     //---------------------------------------------------------------------------
    
    /**
      * function to publish tariff from trash
      * @param $tariff_id integer
      */
     public function publish($tariff_id, $page_id = NULL){
        
        $tariff_id = (int) $tariff_id;
        
        
        $this->tariff_model->changeStatus($tariff_id, "1");
        $this->session->set_flashdata("msg_success", $this->lang->line("publish_msg_success"));
        redirect(ADMIN_DIR."tariffs/view/".$page_id);
     }
     //---------------------------------------------------------------------------
    
    /**
      * function to permanently delete a Tariff
      * @param $tariff_id integer
      */
     public function delete($tariff_id, $page_id = NULL){
        
        $tariff_id = (int) $tariff_id;
        //$this->tariff_model->changeStatus($tariff_id, "3");
        
		$this->tariff_model->delete(array( 'tariff_id' => $tariff_id));
        $this->session->set_flashdata("msg_success", $this->lang->line("delete_msg_success"));
        redirect(ADMIN_DIR."tariffs/trashed/".$page_id);
     }
     //----------------------------------------------------
    
	 
	 
     /**
      * function to add new Tariff
      */
     public function add(){
		
        $this->data["title"] = $this->lang->line('Add New Tariff');$this->data["view"] = ADMIN_DIR."tariffs/add_tariff";
        $this->load->view(ADMIN_DIR."layout", $this->data);
     }
     //--------------------------------------------------------------------
     public function save_data(){
	  if($this->tariff_model->validate_form_data() === TRUE){
		  
		  $tariff_id = $this->tariff_model->save_data();
          if($tariff_id){
				$this->session->set_flashdata("msg_success", $this->lang->line("add_msg_success"));
                redirect(ADMIN_DIR."tariffs/edit/$tariff_id");
            }else{
                
                $this->session->set_flashdata("msg_error", $this->lang->line("msg_error"));
                redirect(ADMIN_DIR."tariffs/add");
            }
        }else{
			$this->add();
			}
	 }


     /**
      * function to edit a Tariff
      */
     public function edit($tariff_id){
		 $tariff_id = (int) $tariff_id;
        $this->data["tariff"] = $this->tariff_model->get($tariff_id);
		  
        $this->data["title"] = $this->lang->line('Edit Tariff');$this->data["view"] = ADMIN_DIR."tariffs/edit_tariff";
        $this->load->view(ADMIN_DIR."layout", $this->data);
     }
     //--------------------------------------------------------------------
	 
	 public function update_data($tariff_id){
		 
		 $tariff_id = (int) $tariff_id;
       
	   if($this->tariff_model->validate_form_data() === TRUE){
		  
		  $tariff_id = $this->tariff_model->update_data($tariff_id);
          if($tariff_id){
                
                $this->session->set_flashdata("msg_success", $this->lang->line("update_msg_success"));
                redirect(ADMIN_DIR."tariffs/edit/$tariff_id");
            }else{
                
                $this->session->set_flashdata("msg_error", $this->lang->line("msg_error"));
                redirect(ADMIN_DIR."tariffs/edit/$tariff_id");
            }
        }else{
			$this->edit($tariff_id);
			}
		 
		 }
	 
     
    /**
     * get data as a json array 
     */
    public function get_json(){
				$where = array("status" =>1);
				$where[$this->uri->segment(3)]= $this->uri->segment(4);
				$data["tariffs"] = $this->tariff_model->getBy($where, false, "tariff_id" );
				$j_array[]=array("id" => "", "value" => "tariff");
				foreach($data["tariffs"] as $tariff ){
					$j_array[]=array("id" => $tariff->tariff_id, "value" => "");
					}
					echo json_encode($j_array);
			
       
    }
    //-----------------------------------------------------
    
}        

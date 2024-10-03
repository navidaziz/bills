<?php if (!defined('BASEPATH')) exit('Direct access not allowed!');

class Public_Controller extends MY_Controller
{

	public $controller_name = "";
	public $method_name = "";

	public function __construct()
	{

		parent::__construct();
		$this->load->helper("my_functions");
		$this->load->model("admin/system_global_setting_model");
		
		$this->lang->load("system", 'english');

        $this->load->model("system_global_setting_model");
        $system_global_setting_id = 1;
        $fields = $fields = array("*");
        $join_table = $join_table = array();
        $where = "system_global_setting_id = $system_global_setting_id";
        $this->data["system_global_settings"] = $this->system_global_setting_model->joinGet($fields, "system_global_settings", $join_table, $where, false, true);


		$this->data['page_description'] = "Page Description";
		$this->data['page_title'] = "Page Name";
		//var_dump($this->data["menu_pages"]);	

	}
}

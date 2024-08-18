<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Meter_reading_app extends Admin_Controller
{

    /**
     * constructor method
     */
    public function __construct()
    {

        parent::__construct();
        $this->load->model("admin/billing_month_model");
        $this->lang->load("billing_months", 'english');
        $this->lang->load("system", 'english');
        //$this->output->enable_profiler(TRUE);
    }
    //---------------------------------------------------------------


    /**
     * Default action to be called
     */
    public function index()
    {
        $this->data["title"] = 'Meter Reading App';
        $this->data["view"] = ADMIN_DIR . "meter_reading_app/index";
        $this->load->view(ADMIN_DIR . "layout", $this->data);
    }


    public function view_consumers_list($billing_month_id)
    {
        $this->data['billing_month_id'] = $billing_month_id = (int) $billing_month_id;
        $query = "SELECT * FROM `billing_months` 
                  WHERE billing_month_id='" . $billing_month_id . "'";
        $this->data['billing_month'] = $billing_month = $this->db->query($query)->row();

        $this->data["description"] = 'Meter Reading for Month: ' . date("M, Y", strtotime($billing_month->billing_month));
        $this->data["title"] ="Consumers List";
        $this->data["view"] = ADMIN_DIR . "meter_reading_app/consumers_list";
        $this->load->view(ADMIN_DIR . "layout", $this->data);
    }




    // private function get_inputs()
    // {
    //     $input["consumer_monthly_bill_id"] = $this->input->post("consumer_monthly_bill_id");
    //     $input["consumer_id"] = $consumer_id = (int) $this->input->post("consumer_id");
    //     $query = "SELECT consumer_meter_no FROM `consumers` WHERE consumer_id='" . $consumer_id . "'";
    //     $consumer = $this->db->query($query)->row();
    //     $input["meter_no"] = $consumer->consumer_meter_no;
    //     $input["billing_month_id"] = $billing_month_id  =  (int) $this->input->post("billing_month_id");

    //     //current tariff.....................................................
    //     $query = "SELECT * FROM `tariffs` WHERE status=1";
    //     $tariff = $this->db->query($query)->row();
    //     $input["rate"] = $tariff->tariff;
    //     $input["monthly_service_charges"] = $tariff->monthly_service_charges;
    //     $input["taxs"] = $tariff->tax;
    //     //current tariff end ................................................

    //     $query = "SELECT billing_month
    //     FROM `billing_months` 
    //     WHERE status=1
    //     AND billing_month_id = '" . $billing_month_id . "'";
    //     $current_billing = $this->db->query($query)->row();
    //     //list($current_billing_year, $current_billing_month) = explode('-', $current_billing->billing_month);
    //     $current_billing_date = DateTime::createFromFormat('Y-m', $current_billing->billing_month);
    //     $current_billing_date->modify('-1 month');
    //     $previous_billing_month = $current_billing_date->format('Y-m');
    //     $query = "SELECT cmb.current_reading, cmb.last_month_arrears, cmb.dues 
    //     FROM `consumer_monthly_bills` as cmb
    //     INNER JOIN billing_months  as bm ON(bm.billing_month_id = cmb.billing_month_id)
    //     WHERE cmb.consumer_id=1 
    //     AND bm.billing_month = '" . $previous_billing_month . "';";
    //     $previous_month_record = $this->db->query($query)->row();
    //     if ($previous_month_record) {
    //         $input["last_reading"] = $previous_month_record->current_reading;
    //         $input["last_month_arrears"] = $previous_month_record->last_month_arrears;
    //         $input["dues"] = $previous_month_record->dues;
    //     } else {
    //         $input["last_reading"] = 0;
    //         $input["last_month_arrears"] = 0;
    //         $input["dues"] = 0;
    //     }


    //     $input["current_reading"] = $this->input->post("current_reading");
    //     $input["reading_date"] = $this->input->post("reading_date");
    //     $input["unit_cosumed"] = $input["current_reading"] - $input["last_reading"];


    //     $inputs =  (object) $input;
    //     return $inputs;
    // }

    // public function get_meter_reading_form()
    // {

    //     $consumer_monthly_bill_id = (int) $this->input->post("consumer_monthly_bill_id");

    //     if ($consumer_monthly_bill_id == 0) {

    //         $input = $this->get_inputs();
    //     } else {
    //         $query = "SELECT * FROM 
    //         consumer_monthly_bills 
    //         WHERE consumer_monthly_bill_id = $consumer_monthly_bill_id";
    //         $input = $this->db->query($query)->row();
    //     }
    //     $this->data["input"] = $input;
    //     $this->load->view(ADMIN_DIR . "meter_reading_app/meter_reading_form", $this->data);
    // }

    // public function add_monthly_meter_reading()
    // {
    //     $this->form_validation->set_rules("consumer_id", "Consumer Id", "required");
    //     $this->form_validation->set_rules("billing_month_id", "Billing Month Id", "required");
    //     $this->form_validation->set_rules("last_reading", "Last Reading", "required");
    //     $this->form_validation->set_rules("current_reading", "Current Reading", "required");
    //     $this->form_validation->set_rules("reading_date", "Reading Date", "required");


    //     if ($this->form_validation->run() == FALSE) {
    //         echo '<div class="alert alert-danger">' . validation_errors() . "</div>";
    //         exit();
    //     } else {
    //         $inputs = $this->get_inputs();
    //         $inputs->created_by = $this->session->userdata("userId");
    //         $consumer_monthly_bill_id = (int) $this->input->post("consumer_monthly_bill_id");
    //         if ($consumer_monthly_bill_id == 0) {
    //             $this->db->insert("consumer_monthly_bills", $inputs);
    //         } else {
    //             $this->db->where("consumer_monthly_bill_id", $consumer_monthly_bill_id);
    //             $inputs->last_updated = date('Y-m-d H:i:s');
    //             $this->db->update("consumer_monthly_bills", $inputs);
    //         }
    //         echo "success";
    //     }
    // }
}

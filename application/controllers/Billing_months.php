<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Billing_months extends Public_Controller
{

    /**
     * constructor method
     */
    public function __construct()
    {

        parent::__construct();
        $this->load->model("admin/billing_month_model");
        $this->load->model("admin/consumer_model");

        $this->lang->load("billing_months", 'english');
        $this->lang->load("consumers", 'english');
        $this->lang->load("system", 'english');
        //$this->output->enable_profiler(TRUE);
    }
    

    public function print_billing_month($billing_month_id, $consumer_id, $consumer_monthly_bill_id)
    {

        $billing_month_id = (int) $billing_month_id;
        $consumer_id = (int) $consumer_id;

        $this->data['consumer_id'] = $consumer_id;
        $consumer_monthly_bill_id = (int) $consumer_monthly_bill_id;


        $this->data['consumer_monthly_bill_id'] = $consumer_monthly_bill_id;

        $this->data['consumer'] = $this->consumer_model->get_consumer($consumer_id)[0];

        $this->data["billing_months"] = $this->billing_month_model->get_billing_month($billing_month_id);
        $this->data["billing_month"] = $this->data["billing_months"][0];

        $this->load->view(ADMIN_DIR . "billing_months/print_billing_month", $this->data);
    }
   
}
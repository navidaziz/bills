<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Consumer_monthly_bills extends Admin_Controller
{

    /**
     * constructor method
     */
    public function __construct()
    {

        parent::__construct();
        $this->load->model("admin/consumer_model");
        $this->lang->load("consumers", 'english');
        $this->lang->load("system", 'english');
        //$this->output->enable_profiler(TRUE);
    }


    private function get_inputs()
    {
        $input["consumer_monthly_bill_id"] = $this->input->post("consumer_monthly_bill_id");
        $input["billing_month_id"] = $billing_month_id  = (int) $this->input->post("billing_month_id");
        $input["consumer_id"] = $consumer_id  = (int) $this->input->post("consumer_id");

        $query = "SELECT consumer_meter_no, tariff_id FROM `consumers` WHERE consumer_id='" . $consumer_id . "'";
        $consumer = $this->db->query($query)->row();
        $input["meter_number"] = $consumer->consumer_meter_no;
        $input["tariff_id"] = $consumer->tariff_id;

        //current tariff.....................................................
        $query = "SELECT * FROM `tariffs` WHERE tariff_id= '" . $consumer->tariff_id . "'";
        $tariff = $this->db->query($query)->row();
        $input["rate"] = $tariff->tariff;
        $input["monthly_service_charges"] = $tariff->monthly_service_charges;
        $input["tax_per"] = $tariff->tax;
        $input["late_deposit_fine"] = $tariff->late_deposit_fine;


        $query = "SELECT billing_month
        FROM `billing_months` 
        WHERE status=1
        AND billing_month_id = '" . $billing_month_id . "'";
        $current_billing = $this->db->query($query)->row();
        if ($current_billing) {
            //list($current_billing_year, $current_billing_month) = explode('-', $current_billing->billing_month);
            $current_billing_date = DateTime::createFromFormat('Y-m', $current_billing->billing_month);
            $current_billing_date->modify('-1 month');
            $previous_billing_month = $current_billing_date->format('Y-m');
        } else {
            $previous_billing_month = 0;
        }

        $query = "SELECT cmb.consumer_monthly_bill_id 
        FROM `consumer_monthly_bills` as cmb
        INNER JOIN billing_months  as bm ON(bm.billing_month_id = cmb.billing_month_id)
        WHERE cmb.consumer_id= '" . $consumer_id . "'
        AND bm.billing_month = '" . $previous_billing_month . "';";
        $previous_consumermonthlybill = $this->db->query($query)->row();
        if ($previous_consumermonthlybill) {
            $query = "UPDATE `consumer_monthly_bills` SET `dues`= (payable_after_due_date-paid), status=0 
                  WHERE consumer_monthly_bill_id = '" . $previous_consumermonthlybill->consumer_monthly_bill_id . "'  ";
            $this->db->query($query);
        } else {
        }

        $query = "SELECT cmb.current_reading, cmb.last_month_arrears, cmb.dues 
        FROM `consumer_monthly_bills` as cmb
        INNER JOIN billing_months  as bm ON(bm.billing_month_id = cmb.billing_month_id)
        WHERE cmb.consumer_id= '" . $consumer_id . "'
        AND bm.billing_month = '" . $previous_billing_month . "';";

        $previous_month_record = $this->db->query($query)->row();
        if ($previous_month_record) {
            $input["last_reading"] = $previous_month_record->current_reading;
            $input["last_month_arrears"] = $previous_month_record->dues;
        } else {
            $input["last_reading"] = $this->input->post("last_reading");
            if($this->input->post("last_month_arrears")){
            $input["last_month_arrears"] = $this->input->post("last_month_arrears");
            }else{
               $input["last_month_arrears"] = 0; 
            }
        }

        $input["reading_date"] = $this->input->post("reading_date");
        $input["current_reading"] = $this->input->post("current_reading");
        $input["unit_cosumed"] = 0;
        $input["total"] = 0;
        $input["tax_rs"] = 0;

        $input["payable_within_due_date"] = 0;
        $input["payable_after_due_date"] = 0;
        $input["payable"] = 0;
        $input["paid"] = 0;
        $input["dues"] = 0;
        $inputs =  (object) $input;




        return $inputs;
    }

    public function get_comsumer_monthly_bill_form()
    {

        $consumer_monthly_bill_id = (int) $this->input->post("consumer_monthly_bill_id");

        if ($consumer_monthly_bill_id == 0) {
            $input = $this->get_inputs();
        } else {
            $query = "SELECT * FROM 
            consumer_monthly_bills 
            WHERE consumer_monthly_bill_id = $consumer_monthly_bill_id";
            $input = $this->db->query($query)->row();
        }
        $this->data["input"] = $input;
        $this->load->view(ADMIN_DIR . "consumer_monthly_bills/get_comsumer_monthly_bill_form", $this->data);
    }


    public function add_comsumer_monthly_bill()
    {
        $this->form_validation->set_rules("current_reading", "Current Reading", "required");
        $this->form_validation->set_rules("reading_date", "Reading Date", "required");




        if ($this->form_validation->run() == FALSE) {
            echo '<div class="alert alert-danger">' . validation_errors() . "</div>";
            exit();
        } else {




            $inputs = $this->get_inputs();



            if ($inputs->current_reading <= $inputs->last_reading) {
                echo '<div class="alert alert-danger">Meter Reading Error: The current reading must be greater than or equal to the previous reading (' . $inputs->last_reading . ')</div>';
                exit();
            }
            $inputs->created_by = $this->session->userdata("userId");
            $consumer_monthly_bill_id = (int) $this->input->post("consumer_monthly_bill_id");

            if ($consumer_monthly_bill_id == 0) {
                //check duplicate entery
                $query="SELECT COUNT(*) as total FROM consumer_monthly_bills 
                WHERE billing_month_id = ? AND consumer_id = ?";
                $duplicate = $this->db->query($query, array($inputs->billing_month_id, $inputs->consumer_id))->row()->total;
                if($duplicate>0){
                echo '<div class="alert alert-danger">Data Already Added. Refresh and Update Data</div>';
                exit(); 
                }
                $this->db->insert("consumer_monthly_bills", $inputs);
                $consumer_monthly_bill_id = $this->db->insert_id();
            } else {
                $this->db->where("consumer_monthly_bill_id", $consumer_monthly_bill_id);
                $inputs->last_updated = date('Y-m-d H:i:s');
                $this->db->update("consumer_monthly_bills", $inputs);
            }




            $query = "SELECT * FROM consumer_monthly_bills  
                      WHERE consumer_monthly_bill_id ='" . $consumer_monthly_bill_id . "'";
            $consumer_monthly_bill = $this->db->query($query)->row();

            //update record........
            $unit_cosumed = $consumer_monthly_bill->current_reading - $consumer_monthly_bill->last_reading;
            $input["unit_cosumed"] = $unit_cosumed;
            $total = $unit_cosumed * $consumer_monthly_bill->rate;
            $input["total"] = $total;
            $consumer_monthly_bill->tax_per;
            $tax = $total * ($consumer_monthly_bill->tax_per / 100);
            $input["tax_rs"] = $tax;
            $payable = $total + $consumer_monthly_bill->monthly_service_charges + $tax + $consumer_monthly_bill->last_month_arrears;
            $input["payable"] = $payable;
            $input["payable_within_due_date"] = $payable;
            $input["late_deposit_fine"] = $consumer_monthly_bill->late_deposit_fine;
            $input["payable_after_due_date"] = $payable + $consumer_monthly_bill->late_deposit_fine;

            $input["paid"] = 0;
            $input["dues"] = 0;

            $this->db->where("consumer_monthly_bill_id", $consumer_monthly_bill_id);
            $this->db->update("consumer_monthly_bills", $input);

            echo "success";
        }
    }

    public function delete_comsumer_monthly_bill($consumer_monthly_bill_id)
    {
        $consumer_monthly_bill_id = (int) $consumer_monthly_bill_id;
        $this->db->where("consumer_monthly_bill_id", $consumer_monthly_bill_id);
        $this->db->delete("consumer_monthly_bills");
        $requested_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
        redirect($requested_url);
    }

    // public function get_payments()
    // {

    //     $consumer_monthly_bill_id = (int) $this->input->post("consumer_monthly_bill_id");
    //     $this->data['consumer_monthly_bill_id'] = $consumer_monthly_bill_id;

    //     $this->load->view(ADMIN_DIR . "consumers/payments", $this->data);
    // }





}

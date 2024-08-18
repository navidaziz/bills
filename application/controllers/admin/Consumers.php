<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Consumers extends Admin_Controller
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
    //---------------------------------------------------------------


    /**
     * Default action to be called
     */
    public function index()
    {
        $main_page = base_url() . ADMIN_DIR . $this->router->fetch_class() . "/view";
        redirect($main_page);
    }
    //---------------------------------------------------------------



    /**
     * get a list of all items that are not trashed
     */
    public function view()
    {

        $where = "`consumers`.`status` IN (0, 1) ";
        $this->data["consumers"] = $this->consumer_model->get_consumer_list($where, false);
        //$this->data["consumers"] = $data->consumers;
        //$this->data["pagination"] = $data->pagination;
        $this->data["title"] = $this->lang->line('Consumers');
        $this->data["view"] = ADMIN_DIR . "consumers/consumers";
        $this->load->view(ADMIN_DIR . "layout", $this->data);
    }
    //-----------------------------------------------------

    /**
     * get single record by id
     */
    public function view_consumer($consumer_id)
    {

        $consumer_id = (int) $consumer_id;

        $this->data["consumer"] = $this->consumer_model->get_consumer($consumer_id)[0];
        $this->data["title"] = $this->lang->line('Consumer Details');
        $this->data["view"] = ADMIN_DIR . "consumers/view_consumer";
        $this->load->view(ADMIN_DIR . "layout", $this->data);
    }

    public function view_consumer_bill_detail($consumer_id, $consumer_monthly_bill_id)
    {

        $consumer_id = (int) $consumer_id;
        $this->data['consumer_id'] = $consumer_id;
        $consumer_monthly_bill_id = (int) $consumer_monthly_bill_id;
        $this->data['consumer_monthly_bill_id'] = $consumer_monthly_bill_id;

        $this->data["consumer"] = $this->consumer_model->get_consumer($consumer_id)[0];
        $this->data["title"] = $this->lang->line('Consumer Details');
        $this->data["view"] = ADMIN_DIR . "consumers/view_consumer_bill";
        $this->load->view(ADMIN_DIR . "layout", $this->data);
    }


    //-----------------------------------------------------

    /**
     * get a list of all trashed items
     */
    public function trashed()
    {

        $where = "`consumers`.`status` IN (2) ";
        $data = $this->consumer_model->get_consumer_list($where);
        $this->data["consumers"] = $data->consumers;
        $this->data["pagination"] = $data->pagination;
        $this->data["title"] = $this->lang->line('Trashed Consumers');
        $this->data["view"] = ADMIN_DIR . "consumers/trashed_consumers";
        $this->load->view(ADMIN_DIR . "layout", $this->data);
    }
    //-----------------------------------------------------

    /**
     * function to send a user to trash
     */
    public function trash($consumer_id, $page_id = NULL)
    {

        $consumer_id = (int) $consumer_id;


        $this->consumer_model->changeStatus($consumer_id, "2");
        $this->session->set_flashdata("msg_success", $this->lang->line("trash_msg_success"));
        redirect(ADMIN_DIR . "consumers/view/" . $page_id);
    }

    /**
     * function to restor consumer from trash
     * @param $consumer_id integer
     */
    public function restore($consumer_id, $page_id = NULL)
    {

        $consumer_id = (int) $consumer_id;


        $this->consumer_model->changeStatus($consumer_id, "1");
        $this->session->set_flashdata("msg_success", $this->lang->line("restore_msg_success"));
        redirect(ADMIN_DIR . "consumers/trashed/" . $page_id);
    }
    //---------------------------------------------------------------------------

    /**
     * function to draft consumer from trash
     * @param $consumer_id integer
     */
    public function draft($consumer_id, $page_id = NULL)
    {

        $consumer_id = (int) $consumer_id;


        $this->consumer_model->changeStatus($consumer_id, "0");
        $this->session->set_flashdata("msg_success", $this->lang->line("draft_msg_success"));
        redirect(ADMIN_DIR . "consumers/view/" . $page_id);
    }
    //---------------------------------------------------------------------------

    /**
     * function to publish consumer from trash
     * @param $consumer_id integer
     */
    public function publish($consumer_id, $page_id = NULL)
    {

        $consumer_id = (int) $consumer_id;


        $this->consumer_model->changeStatus($consumer_id, "1");
        $this->session->set_flashdata("msg_success", $this->lang->line("publish_msg_success"));
        redirect(ADMIN_DIR . "consumers/view/" . $page_id);
    }
    //---------------------------------------------------------------------------

    /**
     * function to permanently delete a Consumer
     * @param $consumer_id integer
     */
    public function delete($consumer_id, $page_id = NULL)
    {

        $consumer_id = (int) $consumer_id;
        //$this->consumer_model->changeStatus($consumer_id, "3");

        $this->consumer_model->delete(array('consumer_id' => $consumer_id));
        $this->session->set_flashdata("msg_success", $this->lang->line("delete_msg_success"));
        redirect(ADMIN_DIR . "consumers/trashed/" . $page_id);
    }
    //----------------------------------------------------



    /**
     * function to add new Consumer
     */
    public function add()
    {

        $this->data["tariffs"] = $this->consumer_model->getList("tariffs", "tariff_id", "tariff_type", $where = "`tariffs`.`status` IN (1) ");

        $this->data["title"] = $this->lang->line('Add New Consumer');
        $this->data["view"] = ADMIN_DIR . "consumers/add_consumer";
        $this->load->view(ADMIN_DIR . "layout", $this->data);
    }
    //--------------------------------------------------------------------
    public function save_data()
    {
        if ($this->consumer_model->validate_form_data() === TRUE) {

            $consumer_id = $this->consumer_model->save_data();
            if ($consumer_id) {
                $this->session->set_flashdata("msg_success", $this->lang->line("add_msg_success"));
                redirect(ADMIN_DIR . "consumers/edit/$consumer_id");
            } else {

                $this->session->set_flashdata("msg_error", $this->lang->line("msg_error"));
                redirect(ADMIN_DIR . "consumers/add");
            }
        } else {
            $this->add();
        }
    }


    /**
     * function to edit a Consumer
     */
    public function edit($consumer_id)
    {
        $consumer_id = (int) $consumer_id;
        $this->data["consumer"] = $this->consumer_model->get($consumer_id);

        $this->data["tariffs"] = $this->consumer_model->getList("tariffs", "tariff_id", "tariff_type", $where = "`tariffs`.`status` IN (1) ");

        $this->data["title"] = $this->lang->line('Edit Consumer');
        $this->data["view"] = ADMIN_DIR . "consumers/edit_consumer";
        $this->load->view(ADMIN_DIR . "layout", $this->data);
    }
    //--------------------------------------------------------------------

    public function update_data($consumer_id)
    {

        $consumer_id = (int) $consumer_id;

        if ($this->consumer_model->validate_form_data() === TRUE) {

            $consumer_id = $this->consumer_model->update_data($consumer_id);
            if ($consumer_id) {

                $this->session->set_flashdata("msg_success", $this->lang->line("update_msg_success"));
                redirect(ADMIN_DIR . "consumers/edit/$consumer_id");
            } else {

                $this->session->set_flashdata("msg_error", $this->lang->line("msg_error"));
                redirect(ADMIN_DIR . "consumers/edit/$consumer_id");
            }
        } else {
            $this->edit($consumer_id);
        }
    }


    
    //-----------------------------------------------------
    // public function delete_payment($payment_id)
    // {
    //     $query = "SELECT consumer_monthly_bill_id FROM payments WHERE payments.payment_id = '" . $payment_id . "'";
    //     $payment = $this->db->query($query)->row();
    //     $consumer_monthly_bill_id = $payment->consumer_monthly_bill_id;

    //     $payment_id = (int) $payment_id;
    //     $this->db->where("payment_id", $payment_id);
    //     $this->db->delete("payments");

    //     $this->db->query("
    //     UPDATE `consumer_monthly_bills`
    //     SET `paid` = (
    //     SELECT COALESCE(SUM(payments.amount_paid), 0)
    //     FROM payments
    //     WHERE payments.consumer_monthly_bill_id = `consumer_monthly_bills`.`consumer_monthly_bill_id`
    //     )
    //     WHERE `consumer_monthly_bills`.`consumer_monthly_bill_id` = $consumer_monthly_bill_id
    //     ");


    //     //calculate dues 
    //     $query = "SELECT MIN(payment_date) as p_date FROM payments WHERE payment_id = '" . $payment_id . "'";
    //     $first_payment = $this->db->query($query)->row();

    //     // SQL Query to get the bill details
    //     $query = "
    //     SELECT 
    //     billing_months.billing_due_date
    //     FROM consumer_monthly_bills
    //     INNER JOIN billing_months 
    //     ON billing_months.billing_month_id = consumer_monthly_bills.billing_month_id
    //     WHERE 
    //     consumer_monthly_bills.consumer_monthly_bill_id = ? ";
    //     $billing_due_date = $this->db->query($query, [$consumer_monthly_bill_id])->row()->billing_due_date;

    //     if ($first_payment->p_date <= $billing_due_date) {
    //         $query = "UPDATE `consumer_monthly_bills` SET `payable`= `payable_within_due_date` WHERE consumer_monthly_bill_id = ?";
    //         $this->db->query($query, [$consumer_monthly_bill_id]);
    //     } else {
    //         $query = "UPDATE `consumer_monthly_bills` SET `payable`= `payable_after_due_date` WHERE consumer_monthly_bill_id = ?";
    //         $this->db->query($query, [$consumer_monthly_bill_id]);
    //     }

    //     //calcualte due
    //     $query = "UPDATE `consumer_monthly_bills` SET `dues`= (`payable`-`paid`) WHERE consumer_monthly_bill_id = ?";
    //     $this->db->query($query, [$consumer_monthly_bill_id]);


    //     $consumer_monthly_bill_id = (int) $this->input->post('consumer_monthly_bill_id');



    //     $requested_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
    //     redirect($requested_url);
    // }

    // public function get_payments()
    // {
    //     $payment_id = (int) $this->input->post("payment_id");
    //     if ($payment_id == 0) {

    //         $input = $this->get_payment_inputs();
    //     } else {
    //         $query = "SELECT * FROM 
    //         payments 
    //         WHERE payment_id = $payment_id";
    //         $input = $this->db->query($query)->row();
    //     }
    //     $this->data["input"] = $input;
    //     $this->load->view(ADMIN_DIR . "consumers/payments", $this->data);
    // }

    // private function get_payment_inputs()
    // {
    //     $input["payment_id"] = $this->input->post("payment_id");
    //     $input["consumer_monthly_bill_id"] = $this->input->post("consumer_monthly_bill_id");
    //     $input["payment_date"] = $this->input->post("payment_date");
    //     $input["amount_paid"] = $this->input->post("amount_paid");
    //     $input["payment_method"] = $this->input->post("payment_method");
    //     $input["notes"] = $this->input->post("notes");
    //     $inputs =  (object) $input;
    //     return $inputs;
    // }

    // public function add_payment()
    // {
    //     $this->form_validation->set_rules("consumer_monthly_bill_id", "Consumer Monthly Bill Id", "required");
    //     $this->form_validation->set_rules("payment_date", "Payment Date", "required");
    //     $this->form_validation->set_rules("amount_paid", "Amount Paid", "required");
    //     $this->form_validation->set_rules("payment_method", "Payment Method", "required");
    //     $this->form_validation->set_rules("notes", "Notes", "required");

    //     $consumer_monthly_bill_id = $this->input->post('consumer_monthly_bill_id');

    //     if ($this->form_validation->run() == FALSE) {
    //         echo '<div class="alert alert-danger">' . validation_errors() . "</div>";
    //         exit();
    //     } else {
    //         $inputs = $this->get_payment_inputs();
    //         $inputs->created_by = $this->session->userdata("userId");
    //         $payment_id = (int) $this->input->post("payment_id");
    //         if ($payment_id == 0) {
    //             $this->db->insert("payments", $inputs);
    //             $payment_id = $this->db->insert_id();
    //         } else {
    //             $this->db->where("payment_id", $payment_id);
    //             $inputs->last_updated = date('Y-m-d H:i:s');
    //             $this->db->update("payments", $inputs);
    //         }

    //         $this->db->query("
    //         UPDATE `consumer_monthly_bills`
    //         SET `paid` = (
    //         SELECT COALESCE(SUM(payments.amount_paid), 0)
    //         FROM payments
    //         WHERE payments.consumer_monthly_bill_id = `consumer_monthly_bills`.`consumer_monthly_bill_id`
    //         )
    //         WHERE `consumer_monthly_bills`.`consumer_monthly_bill_id` = $consumer_monthly_bill_id
    //         ");

    //         //calculate dues 
    //         $query = "SELECT MIN(payment_date) as p_date FROM payments WHERE payment_id = '" . $payment_id . "'";
    //         $first_payment = $this->db->query($query)->row();

    //         // SQL Query to get the bill details
    //         $query = "
    //         SELECT 
    //         billing_months.billing_due_date
    //         FROM consumer_monthly_bills
    //         INNER JOIN billing_months 
    //         ON billing_months.billing_month_id = consumer_monthly_bills.billing_month_id
    //         WHERE 
    //         consumer_monthly_bills.consumer_monthly_bill_id = ? ";
    //         $billing_due_date = $this->db->query($query, [$consumer_monthly_bill_id])->row()->billing_due_date;

    //         if ($first_payment->p_date <= $billing_due_date) {
    //             $query = "UPDATE `consumer_monthly_bills` SET `payable`= `payable_within_due_date` WHERE consumer_monthly_bill_id = ?";
    //             $this->db->query($query, [$consumer_monthly_bill_id]);
    //         } else {
    //             $query = "UPDATE `consumer_monthly_bills` SET `payable`= `payable_after_due_date` WHERE consumer_monthly_bill_id = ?";
    //             $this->db->query($query, [$consumer_monthly_bill_id]);
    //         }

    //         //calcualte due
    //         $query = "UPDATE `consumer_monthly_bills` SET `dues`= (`payable`-`paid`) WHERE consumer_monthly_bill_id = ?";
    //         $this->db->query($query, [$consumer_monthly_bill_id]);


    //         $consumer_monthly_bill_id = (int) $this->input->post('consumer_monthly_bill_id');

    //         echo "success";
    //     }
    // }
}

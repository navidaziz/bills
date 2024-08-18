<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Billing_months extends Admin_Controller
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
    //---------------------------------------------------------------


    /**
     * Default action to be called
     */
    public function index()
    {
        // $main_page = base_url() . ADMIN_DIR . $this->router->fetch_class() . "/view";
        // redirect($main_page);
        $query = "SELECT billing_month FROM billing_months WHERE status=1";
        $billingmonth = $this->db->query($query)->row();
        $current_month = explode("-", $billingmonth->billing_month);
        if ($this->input->get('filter_year')) {
            $this->data['filter_year'] = $this->input->get('filter_year');
        } else {
            //$this->data['filter_year'] = date('Y');
            $this->data['filter_year'] = $current_month[0];
        }
        if ($this->input->get('filter_month')) {
            $this->data['filter_month'] = $this->input->get('filter_month');
        } else {
            //$this->data['filter_month'] = date('m');
            $this->data['filter_month'] = $current_month[1];
        }

        

        $billing_month = $this->data['filter_year'] . "-" . $this->data['filter_month'];
        $this->data['BillingMonth'] = $billing_month;

        $this->data["title"] = 'Monthly Billing Dashboard';
        $this->data["description"] = "For Month " . date('M, Y', strtotime($billing_month . "-01"));

        $this->data["view"] = ADMIN_DIR . "billing_months/billing_dashboard";
        $this->load->view(ADMIN_DIR . "layout", $this->data);
    }
    //---------------------------------------------------------------



    /**
     * get a list of all items that are not trashed
     */
    public function view()
    {
        $this->index();
    }
    //-----------------------------------------------------

    /**
     * get single record by id
     */
    public function view_billing_month($billing_month_id, $consumer_id, $consumer_monthly_bill_id)
    {

        $billing_month_id = (int) $billing_month_id;
        $consumer_id = (int) $consumer_id;

        $this->data['consumer_id'] = $consumer_id;
        $consumer_monthly_bill_id = (int) $consumer_monthly_bill_id;


        $this->data['consumer_monthly_bill_id'] = $consumer_monthly_bill_id;

        $this->data["consumer"] = $this->consumer_model->get_consumer($consumer_id)[0];

        $this->data["billing_months"] = $this->billing_month_model->get_billing_month($billing_month_id);
        $this->data["billing_month"] = $this->data["billing_months"][0];

        $this->data["title"] = $this->lang->line('Billing Month Details');
        $this->data["description"] = $this->lang->line('Billing Month Details');
        $this->data["view"] = ADMIN_DIR . "billing_months/view_billing_month";
        $this->load->view(ADMIN_DIR . "layout", $this->data);
    }
    //-----------------------------------------------------

    /**
     * get a list of all trashed items
     */
    public function trashed()
    {

        $where = "`billing_months`.`status` IN (2) ";
        $data = $this->billing_month_model->get_billing_month_list($where);
        $this->data["billing_months"] = $data->billing_months;
        $this->data["pagination"] = $data->pagination;
        $this->data["title"] = $this->lang->line('Trashed Billing Months');
        $this->data["view"] = ADMIN_DIR . "billing_months/trashed_billing_months";
        $this->load->view(ADMIN_DIR . "layout", $this->data);
    }
    //-----------------------------------------------------

    /**
     * function to send a user to trash
     */
    public function trash($billing_month_id, $page_id = NULL)
    {

        $billing_month_id = (int) $billing_month_id;


        $this->billing_month_model->changeStatus($billing_month_id, "2");
        $this->session->set_flashdata("msg_success", $this->lang->line("trash_msg_success"));
        redirect(ADMIN_DIR . "billing_months/view/" . $page_id);
    }

    /**
     * function to restor billing_month from trash
     * @param $billing_month_id integer
     */
    public function restore($billing_month_id, $page_id = NULL)
    {

        $billing_month_id = (int) $billing_month_id;


        $this->billing_month_model->changeStatus($billing_month_id, "1");
        $this->session->set_flashdata("msg_success", $this->lang->line("restore_msg_success"));
        redirect(ADMIN_DIR . "billing_months/trashed/" . $page_id);
    }
    //---------------------------------------------------------------------------

    /**
     * function to draft billing_month from trash
     * @param $billing_month_id integer
     */
    public function draft($billing_month_id, $page_id = NULL)
    {

        $billing_month_id = (int) $billing_month_id;


        $this->billing_month_model->changeStatus($billing_month_id, "0");
        $this->session->set_flashdata("msg_success", $this->lang->line("draft_msg_success"));
        redirect(ADMIN_DIR . "billing_months/view/" . $page_id);
    }
    //---------------------------------------------------------------------------

    /**
     * function to publish billing_month from trash
     * @param $billing_month_id integer
     */
    public function publish($billing_month_id, $page_id = NULL)
    {

        $billing_month_id = (int) $billing_month_id;


        $this->billing_month_model->changeStatus($billing_month_id, "1");
        $this->session->set_flashdata("msg_success", $this->lang->line("publish_msg_success"));
        redirect(ADMIN_DIR . "billing_months/view/" . $page_id);
    }
    //---------------------------------------------------------------------------

    /**
     * function to permanently delete a Billing_month
     * @param $billing_month_id integer
     */
    public function delete($billing_month_id, $page_id = NULL)
    {

        $billing_month_id = (int) $billing_month_id;
        //$this->billing_month_model->changeStatus($billing_month_id, "3");

        $this->billing_month_model->delete(array('billing_month_id' => $billing_month_id));
        $this->session->set_flashdata("msg_success", $this->lang->line("delete_msg_success"));
        redirect(ADMIN_DIR . "billing_months/trashed/" . $page_id);
    }
    //----------------------------------------------------



    /**
     * function to add new Billing_month
     */
    public function add()
    {

        $this->data["title"] = $this->lang->line('Add New Billing Month');
        $this->data["view"] = ADMIN_DIR . "billing_months/add_billing_month";
        $this->load->view(ADMIN_DIR . "layout", $this->data);
    }
    //--------------------------------------------------------------------
    public function save_data()
    {
        if ($this->billing_month_model->validate_form_data() === TRUE) {

            $billing_month_id = $this->billing_month_model->save_data();
            if ($billing_month_id) {
                $this->session->set_flashdata("msg_success", $this->lang->line("add_msg_success"));
                redirect(ADMIN_DIR . "billing_months/edit/$billing_month_id");
            } else {

                $this->session->set_flashdata("msg_error", $this->lang->line("msg_error"));
                redirect(ADMIN_DIR . "billing_months/add");
            }
        } else {
            $this->add();
        }
    }


    /**
     * function to edit a Billing_month
     */
    public function edit($billing_month_id)
    {
        $billing_month_id = (int) $billing_month_id;
        $this->data["billing_month"] = $this->billing_month_model->get($billing_month_id);

        $this->data["title"] = $this->lang->line('Edit Billing Month');
        $this->data["view"] = ADMIN_DIR . "billing_months/edit_billing_month";
        $this->load->view(ADMIN_DIR . "layout", $this->data);
    }
    //--------------------------------------------------------------------

    public function update_data($billing_month_id)
    {

        $billing_month_id = (int) $billing_month_id;

        if ($this->billing_month_model->validate_form_data() === TRUE) {

            $billing_month_id = $this->billing_month_model->update_data($billing_month_id);
            if ($billing_month_id) {

                $this->session->set_flashdata("msg_success", $this->lang->line("update_msg_success"));
                redirect(ADMIN_DIR . "billing_months/edit/$billing_month_id");
            } else {

                $this->session->set_flashdata("msg_error", $this->lang->line("msg_error"));
                redirect(ADMIN_DIR . "billing_months/edit/$billing_month_id");
            }
        } else {
            $this->edit($billing_month_id);
        }
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



        //exit();

        
// $html='hi';


//             $pdf = new Tc_pdf();

//             // Set document information
//             $pdf->SetCreator(PDF_CREATOR);
//             $pdf->SetAuthor('Your Name');
//             $pdf->SetTitle('HTML to PDF Example');
//             $pdf->SetSubject('TCPDF Tutorial');

//             // Set default header and footer data
//             $pdf->SetHeaderData('', 0, 'HTML to PDF Example', 'Generated using TCPDF');
//             $pdf->setHeaderFont(Array('helvetica', '', 10));
//             $pdf->setFooterFont(Array('helvetica', '', 8));
//             $pdf->SetMargins(10, 10, 10);
//             $pdf->SetHeaderMargin(5);
//             $pdf->SetFooterMargin(10);

//             // Add a page
//             $pdf->AddPage();

//             // Set font
//             $pdf->SetFont('helvetica', '', 12);

           
//             // Output the HTML content
//             $pdf->writeHTML($html, true, false, true, false, '');

//             // Close and output PDF document
//             $pdf->Output('example.pdf', 'I');
        }
  private function get_billing_month_inputs(){
            $input["billing_month_id"] = $this->input->post("billing_month_id");
            $input["billing_month"] = $this->input->post("billing_month");
            $input["meter_reading_start"] = $this->input->post("meter_reading_start");
            $input["meter_reading_end"] = $this->input->post("meter_reading_end");
            $input["billing_issue_date"] = $this->input->post("billing_issue_date");
            $input["billing_due_date"] = $this->input->post("billing_due_date");
            $inputs =  (object) $input;
        return $inputs;
        }

        public function get_billing_month_form(){
        $billing_month_id = (int) $this->input->post("billing_month_id");
        if ($billing_month_id == 0) {
            
        $input = $this->get_billing_month_inputs();
           } else {
            $query = "SELECT * FROM 
            billing_months 
            WHERE billing_month_id = $billing_month_id";
            $input = $this->db->query($query)->row();
            }
            $this->data["input"] = $input;
            $this->load->view(ADMIN_DIR . "billing_months/get_billing_month_form", $this->data);
            }

            public function add_billing_month()
        {
            $this->form_validation->set_rules("billing_month", "Billing Month", "required");
                $this->form_validation->set_rules("meter_reading_start", "Meter Reading Start", "required");
                $this->form_validation->set_rules("meter_reading_end", "Meter Reading End", "required");
                $this->form_validation->set_rules("billing_issue_date", "Billing Issue Date", "required");
                $this->form_validation->set_rules("billing_due_date", "Billing Due Date", "required");
                
            if ($this->form_validation->run() == FALSE) {
                echo '<div class="alert alert-danger">' . validation_errors() . "</div>";
                exit();
            } else {


                $query = "SELECT billing_month FROM billing_months WHERE status=1";
                $active_month = $this->db->query($query)->row()->billing_month;
                $billing_month = $this->input->post('billing_month');

                // Calculate the next month after the active month
                $next_month = date("Y-m", strtotime($active_month . " +1 month"));

                // Check if the billing month is exactly equal to the next month
                if ($billing_month == $next_month) {
                    // Code to add the billing month to the database or perform the desired action
                    echo "Billing month is valid and added successfully.";
                } else {
                    echo "Billing month must be exactly one month after the active month (" . date("M, Y", strtotime($active_month)) . ").";
                }






                $inputs = $this->get_billing_month_inputs();
         $inputs->created_by = $this->session->userdata("userId");
        $billing_month_id = (int) $this->input->post("billing_month_id");
                if ($billing_month_id == 0) {
                    $this->db->insert("billing_months", $inputs);

                } else {
                    $this->db->where("billing_month_id", $billing_month_id); 
                    $inputs->last_updated = date('Y-m-d H:i:s');
                    $this->db->update("billing_months", $inputs);
                }
                echo "success";
            }
        }
    
    
}

<?php
class Customers extends Controller {

    public function __construct()
        {

        }

    public function ajax($what)
        {
        switch($what)
            {
            case 'search_customer':
                $customer = new Customer;

                $search_name = trim($_POST['search_name']);

                $found_customers = $customer->search($search_name);

                echo json_encode($found_customers);
                return;
                break;
            }
        }

    public function form($customer_id = 0)
        {
        $data = [];

        $branch = new Branch;
        $data['branches'] = $branch->list_all();

        $customer_info = [
          'customer_id' => 0,
          'first_name' => '',
          'last_name' => '',
          'branch_name' => '',
          'branch_id' => 0,
          'balance' => 0.00,
          'phone' => '',
          'address' => ''
        ];

        $customer = new Customer;

        if(!empty($customer_id))
            {
            $customer_info = $customer->info($customer_id);
            }

        $data['customer_info'] = $customer_info;

        $this->view("customers/form", $data);
        }

    public function index($customer_id = 0)
        {
        $data = [];

        $customer = new Customer();

        if(empty($customer_id))
            {
            $data['customers'] = $customer->list_all();

            $this->view("customers/index", $data);
            }
        else
            {
            $customer_info = $customer->info($customer_id);

            if(empty($customer_info))
                {
                flash('error_not_found', 'No customer found, please try again', 'alert alert-danger');
                redirect('customers');
                }

            $data['customer_info'] = $customer_info;

            $this->view("customers/info", $data);
            }
        }

    public function submit($what)
        {
        if(empty($_POST))
            {
            die("nothing submitted");
            }

        switch($what)
            {
            case 'edit':
                $customer_id = $_POST['customer_id'];

                $customer = new Customer;
                $customer_info = $customer->edit($customer_id, $_POST);

                flash('success_saved', 'Success! Customer has been saved');
                redirect('customers/' . $customer_info['customer_id']);
                break;

            case 'transfer':
                $from_customer_id = $_POST['from_person_id'];
                $to_customer_id = $_POST['to_person_id'];
                $amount = $_POST['amount'];

                if(empty($amount) || $amount < 0)
                    {
                    flash('error_amount', 'Transfer aborted, amount must be a positive number.', 'alert alert-danger');
                    redirect('customers/transfer/' . $from_customer_id);
                    }

                $customer = new Customer;
                $customer->transfer_money($from_customer_id, ($amount * -1));
                $customer->transfer_money($to_customer_id, $amount);

                flash('success_transfer', 'Success! ' . number_format($amount, 2) . ' was sent!');
                redirect('customers/' . $from_customer_id);
                break;
            }
        }

    public function transfer($customer_id)
        {
        $customer = new Customer();

        $data = [];

        $data['customer_info'] = $customer->info($customer_id);

        $this->view("customers/transfer", $data);
        }

}

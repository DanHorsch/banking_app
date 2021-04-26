<?php

class Report {

    private $db;

    public function __construct()
        {
        $this->db = new Database;
        }

    public function run_report($filters)
        {
        $where_query = $this->set_where_query($filters);

        $this->db->query('
select branch.*, count(customer.branch_id) as total_customers, sum(customer.balance) as total_balance, max(customer.balance) as highest_balance
from
branch_tbl as branch
left join
customer_tbl as customer
on
customer.branch_id = branch.branch_id
group by
branch.branch_id
' . $where_query . '
order by
' . $filters["sort_by"] . ' ' . $filters["sort_dir"] . '
        ');

        $branches = $this->db->result_set();

        return $branches;
        }

    public function set_filters($values)
        {
        $filters = [
          "sort_by" => "name",
          "sort_dir" => "desc",
          "min_customers" => 0,
          "max_customers" => 0,
          "min_balance" => 0,
          "max_balance" => 0
        ];

        foreach($values as $key => $value)
            {
            if(array_key_exists($key, $filters) && !empty($value))
                {
                $filters[$key] = $value;
                }
            }

        if($filters['max_customers'] <= $filters['min_customers'])
            {
            $filters['max_customers'] = "";
            }

        if($filters['max_balance'] <= $filters['min_balance'])
            {
            $filters['max_balance'] = "";
            }

        return $filters;
        }

    private function set_where_query($filters)
        {
        $query = "";

        if(
            empty($filters['min_customers'])
            && empty($filters['max_customers'])
            && empty($filters['min_balance'])
            && empty($filters['max_balance'])
            )
            {
            return $query;
            }

        $customer_query = "";
        $balance_query = "";

        // set balance query
        if(!empty($filters['max_balance']))
            {
            $balance_query = "sum(customer.balance) between " . $filters['min_balance'] . ' and ' . $filters['max_balance'];
            }
        else if(!empty($filters['min_balance']))
            {
            $balance_query = "sum(customer.balance) >= " . $filters['min_balance'];
            }

        // set customer query
        if(!empty($filters['max_customers']))
            {
            $customer_query = "count(customer.branch_id) between " . $filters['min_customers'] . ' and ' . $filters['max_customers'];
            }
        else if(!empty($filters['min_customers']))
            {
            $customer_query = "count(customer.branch_id) >= " . $filters['min_customers'];
            }

        // build query
        if(empty($customer_query) && empty($balance_query))
            {
            $query = "";
            }
        else if(!empty($customer_query) && !empty($balance_query))
            {
            $query = ' having (' . $customer_query . ') and (' . $balance_query . ') ';
            }
        else
            {
            $query = ' having ' . $customer_query . $balance_query . ' ';
            }

        return $query;
        }

} // end of class

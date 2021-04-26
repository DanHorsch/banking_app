<?php

class Customer {

    private $db;

    public function __construct()
        {
        $this->db = new Database;
        }

    public function edit($customer_id, $values)
        {
        if(empty($customer_id))
            {
            $this->db->query('
insert into
customer_tbl
(created_stamp)
values
(:created_stamp)
            ');

            $this->db->bind(':created_stamp', date('Y-m-d H:i:s'));
            $this->db->execute();

            $customer_id = $this->db->insert_id();
            }

        foreach($values as $key => $value)
            {
            switch($key)
                {
                case 'first_name':
                case 'last_name':
                case 'balance':
                case 'branch_id':
                case 'address':
                case 'phone':
                    $this->db->query('
update
customer_tbl
set ' . $key . ' = :value
where
customer_id = :customer_id
                    ');

                    $this->db->bind(':value', $value);
                    $this->db->bind(':customer_id', $customer_id);

                    $this->db->execute();
                }
            }

        return $this->info($customer_id);
        }

    public function info($customer_id)
        {
        $this->db->query('
select customer_tbl.*, branch_tbl.name as branch_name
from
customer_tbl
left join
branch_tbl
on customer_tbl.branch_id = branch_tbl.branch_id
where
customer_tbl.customer_id = :customer_id
        ');

        $this->db->bind(':customer_id', $customer_id);

        $customer = $this->db->result_single();

        return $customer;
        }

    public function list_all($branch_id = 0)
        {
        if(empty($branch_id))
            {
            $this->db->query('
select customer_tbl.*, branch_tbl.name as branch_name
from
customer_tbl
left join
branch_tbl
on customer_tbl.branch_id = branch_tbl.branch_id
order by
created_stamp desc
limit 50
            ');
            }
        else
            {
            $this->db->query('
select customer_tbl.*, branch_tbl.name as branch_name
from
customer_tbl
left join
branch_tbl
on customer_tbl.branch_id = branch_tbl.branch_id
where
branch_id = :branch_id
order by
created_stamp desc
limit 50
            ');

            $this->db->bind(':branch_id', $branch_id);
            }

        $customers = $this->db->result_set();

        return $customers;
        }

    public function search($search_name)
        {
        $search_name = "%" . $search_name . "%";

        $this->db->query('
select *
from
customer_tbl
where
concat(first_name, " ", last_name)
like :search_name
or
last_name
like
:search_name
        ');

        $this->db->bind(':search_name', $search_name);

        $customers = $this->db->result_set();

        return $customers;
        }

    public function transfer_money($customer_id, $amount)
        {
        $this->db->query('
update
customer_tbl
set
balance = balance + :amount
where
customer_id = :customer_id
        ');

        $this->db->bind(':amount', $amount);
        $this->db->bind(':customer_id', $customer_id);

        $this->db->execute();

        return true;
        }

} // end of class

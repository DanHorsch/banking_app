<?php

class Branch {

    private $db;

    public function __construct()
        {
        $this->db = new Database;
        }

    public function edit($branch_id, $values)
        {
        if(empty($branch_id))
            {
            $this->db->query('
insert into
branch_tbl
(created_stamp)
values
(:created_stamp)
            ');

            $this->db->bind(':created_stamp', date('Y-m-d H:i:s'));
            $this->db->execute();

            $branch_id = $this->db->insert_id();
            }

        foreach($values as $key => $value)
            {
            switch($key)
                {
                case 'name':
                case 'icon_class':
                case 'address':
                case 'phone':
                    $this->db->query('
update
branch_tbl
set ' . $key . ' = :value
where
branch_id = :branch_id
                    ');

                    $this->db->bind(':value', $value);
                    $this->db->bind(':branch_id', $branch_id);

                    $this->db->execute();
                }
            }

        return $this->info($branch_id);
        }

    public function edit_location($location_id, $values)
        {
        if(empty($location_id))
            {
            $this->db->query('
insert into
location_tbl
(created_stamp)
values
(:created_stamp)
            ');

            $this->db->bind(':created_stamp', date('Y-m-d H:i:s'));
            $this->db->execute();

            $location_id = $this->db->insert_id();
            }

        foreach($values as $key => $value)
            {
            switch($key)
                {
                case 'title':
                case 'address':
                case 'phone':
                case 'branch_id':
                    $this->db->query('
update
location_tbl
set ' . $key . ' = :value
where
location_id = :location_id
                    ');

                    $this->db->bind(':value', $value);
                    $this->db->bind(':location_id', $location_id);

                    $this->db->execute();
                }
            }

        return true;
        }

    public function info($branch_id)
        {
        $this->db->query('
select *
from
branch_tbl
where
branch_id = :branch_id
        ');

        $this->db->bind(':branch_id', $branch_id);

        $branch = $this->db->result_single();

        return $branch;
        }

    public function list_all()
        {
        $this->db->query('
select *
from
branch_tbl
order by
created_stamp desc
        ');

        $branches = $this->db->result_set();

        return $branches;
        }

    public function locations($branch_id)
        {
        $this->db->query('
select *
from
location_tbl
where
branch_id = :branch_id
        ');

        $this->db->bind(':branch_id', $branch_id);

        $locations = $this->db->result_set();

        return $locations;
        }

} // end of class

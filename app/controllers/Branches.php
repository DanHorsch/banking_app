<?php
class Branches extends Controller {

    public function __construct()
        {

        }

    public function index($branch_id = 0)
        {
        $data = [];

        $branch = new Branch();

        if(empty($branch_id))
            {
            $data['branches'] = $branch->list_all();

            $this->view("branches/index", $data);
            }
        else
            {
            $branch_info = $branch->info($branch_id);

            if(empty($branch_info))
                {
                flash('error_not_found', 'No branch found, please try again', 'alert alert-danger');
                redirect('branches');
                }

            $data['bank_icons'] = bank_icons();
            $data['branch_info'] = $branch_info;
            $data['locations'] = $branch->locations($branch_info['branch_id']);

            $this->view("branches/info", $data);
            }
        }

    public function form($branch_id = 0)
        {
        $data = [];

        $data['bank_icons'] = bank_icons();

        $branch_info = [
          'branch_id' => 0,
          'name' => '',
          'phone' => '',
          'address' => '',
          'icon_class' => 'fas fa-chess-pawn'
        ];

        $branch = new Branch;

        if(!empty($branch_id))
            {
            $branch_info = $branch->info($branch_id);
            }

        $data['branch_info'] = $branch_info;

        $this->view("branches/form", $data);
        }

    public function location_form($branch_id)
        {
        $data = [];

        $location_info = [
          'branch_id' => $branch_id,
          'title' => '',
          'address' => '',
          'phone' => ''
        ];

        $data['location_info'] = $location_info;

        $this->view("branches/location_form", $data);
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
                $branch_id = $_POST['branch_id'];

                $branch = new Branch;
                $branch_info = $branch->edit($branch_id, $_POST);

                flash('success_saved', 'Success! Branch has been saved');
                redirect('branches/' . $branch_info['branch_id']);
                break;

            case 'edit_location':
                $branch_id = $_POST['branch_id'];
                $location_id = 0; // only adding branches and not editing for now

                if(empty($branch_id))
                    {
                    flash('error_not_found', 'Error: unable to save location...no branch associated', 'alert alert-danger');
                    redirect('branches');
                    }

                $branch = new Branch;
                $branch->edit_location($location_id, $_POST);

                flash('success_saved', 'Success! Location has been added');
                redirect('branches/' . $branch_id);
                break;
            }
        }
}

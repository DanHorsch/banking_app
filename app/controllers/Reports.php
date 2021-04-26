<?php
class Reports extends Controller {

    public function __construct()
        {

        }

    public function index()
        {
        $data = [];

        $report = new Report;

        $requested_filters = array();

        if(!empty($_POST))
            {
            $requested_filters = $_POST;
            }

        $data['filters'] = $report->set_filters($requested_filters);

        $data['branches'] = $report->run_report($data['filters']);

        $this->view("reports/index", $data);
        }

}

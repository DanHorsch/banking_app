<?php
// whatever controllers we make should
// have its own folder in views. Easier to keep track of
class Pages extends Controller {

    public function __construct()
        {

        }

    public function about()
        {
        $data = [
          "title" => "About Traversy MVC",
          "description" => "An app that to share posts with other users"
        ];
        
        $this->view("pages/about", $data);
        }

    public function index()
        {
        $data = [
          "title" => "Welcome",
          "description" => "A simple PHP MVC Framework built with the Traversy MVC Tutorial."
        ];

        $this->view("pages/index", $data);
        }

} // end of class

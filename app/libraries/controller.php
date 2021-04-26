<?php
// Makes it so the other controllers can load
// models and views (they will extend this class)
// all classes should be capitalized
class Controller {

    //load model
    public function model($model)
        {
        require_once '../app/models/' . $model . '.php';

        return new $model();
        }

    // load view
    // the view should have its own subfolder of the
    // controller that its being called from
    public function view($view, $data = [])
        {
        // check for view file
        if(file_exists('../app/views/' . $view . '.php'))
            {
            require_once '../app/views/includes/header.php';
            require_once '../app/views/' . $view . '.php';
            require_once '../app/views/includes/footer.php';
            }
        else
            {
            die('View doesnt not exist');
            }
        }

} // end of class

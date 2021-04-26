<?php
// app core class
// creates url and loads core controller
// url formate - /controller/method/params

class Core {

    // Defaults for controller if not specified
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
        {
        $url = $this->getUrl();

        // look in controllers for first value
        if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php'))
            {
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
            }

        // require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';

        // instantiate controller class
        // default id ------ $pages = new Pages
        $this->currentController = new $this->currentController;

        // check for second part of url
        if(isset($url[1]))
            {
            if(method_exists($this->currentController, $url[1]))
                {
                $this->currentMethod = $url[1];
                unset($url[1]);
                }
            }

        // set the rest of the url values as params
        $this->params = $url ? array_values($url) : [];

        // call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }

    // htaccess is passing url get var
    public function getUrl()
        {
        if(isset($_GET['url']))
            {
            $url = rtrim($_GET['url'], "/");
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);
            return $url;
            }
        }

} // end of class

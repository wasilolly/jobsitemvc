<?php 

class Core{
    protected $currentController = 'JobsController';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->getUrl();
        var_dump($url);
        //Look in the controller file for the url param namesake
        if (isset($url[0])){
            if(file_exists('../app/controllers/'.ucwords($url[0]).'Controller.php')){
                $this->currentController = ucwords($url[0]).'Controller';
                unset($url[0]);
            }
        }
        var_dump($url);

        require_once '../app/controllers/'.$this->currentController.'.php';
        $this->currentController = new $this->currentController;

        //Look for method in controller class
        if(isset($url[1])){
            if(method_exists($this->currentController,$url[1])){
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }
        $this->params = $url ? array_values($url) : [];
        call_user_func([$this->currentController, $this->currentMethod]);
    }

    public function getUrl()
    {
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            //Break the url into an array
            $url = explode('/',$url);
            return $url;
        }
    }
}
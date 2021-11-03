<?php 

class Core{
    protected $currentController = 'pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->getUrl();
        //Look in the controller file for the url param namesake
        if(file_exists('../app/controllers/'.ucwords($url[0]).'Controllers.php')){
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }
        require_once '../app/controllers/'.$this->currentController.'Controllers.php';
        $this->currentController = new $this->currentController;

        //Look for method in controller class
        if(isset($url[1])){
            if(method_exists($this->currentController,$url[1])){
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->currentController, $this->currentMethod],$this->params,);

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
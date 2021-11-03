<?php

class Controller
{
    public $layout = 'main';

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }

    public function view($view, $data = [])
    {
        if (file_exists('../app/views/' . $view . '.php')) {
            echo $this->render($view, $data);
             
        } else {
            die('View does not exist');
        }
    }

    public function render($view, $data)
    {
        return str_replace('{{content}}', $this->getViewContents($view, $data), $this->getLayoutContents());
    }
    protected function getLayoutContents(){
        ob_start();
        require_once '../app/views/layouts/' . $this->layout . '.php';
        $layoutContents = ob_get_contents();
        ob_end_clean();
        return $layoutContents;
    }

    protected function getViewContents($view, $data){
        ob_start();
        require_once '../app/views/' . $view . '.php';
        foreach ($data as $key => $value) {
            $$key = $value;
        }
        $viewContents = ob_get_contents();
        ob_end_clean();      
        return $viewContents;
    }

}

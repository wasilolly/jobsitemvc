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
            $renderView = new View;
            $renderView  = $renderView->render($view,$data);
            echo $renderView;
             
        } else {
            die('View does not exist');
        }
    }
}

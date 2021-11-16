<?php

class Controller
{

    public function model($model)
    {
        require_once APPROOT.'/models/' . $model . '.php';
    }

    public function view($view, $data = [])
    {
        if (file_exists(APPROOT.'/views/' . $view . '.php')) {
            $renderView = new View;
            $renderView  = $renderView->render($view,$data);
            echo $renderView;
             
        } else {
            redirect(URLROOT,'Page does not exist','error');
        }
    }
}

<?php 

class View{

    public function render($view, $data)
    {
        $viewContents = $this->getViewContents($view, $data);
        return str_replace('{{content}}',  $this->getLayoutContents(), $viewContents);
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

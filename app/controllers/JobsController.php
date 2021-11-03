<?php 

class JobsController extends Controller{

    public function __construct()
    {
        $this->jobModel = $this->model('Job');
    }

    public function index(){
        //$users = $this->userModel->getUsers();
        $data = [
            'title' => 'Job page',
            
        ];
        $this->view('jobs/index', $data);
    }

    public function create(){
        
        
    }

    public function edit(){
        
    }

    
}
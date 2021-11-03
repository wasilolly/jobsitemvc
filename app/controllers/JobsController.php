<?php 

class JobsController extends Controller{

    public $job;
    
    public function __construct()
    {
        $this->job = $this->model('Job');
    }

    public function index(){
        $categories = $this->job->getCategories();
        $jobs = $this->job->getAllJobs();
        $data = [
            'title' => 'Job Index page',
            'categories' => $categories,    
            'jobs' => $jobs   
        ];
        $this->view('jobs/index', $data);
    }

    public function create(){
        $categories = $this->job->getCategories();
        $data = [
            'title' => 'Job Create page',
            'categories' => $categories
        ];
        $this->view('jobs/create', $data);
        
    }

    public function edit(){
        
    }

    
}
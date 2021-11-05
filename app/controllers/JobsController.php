<?php 

class JobsController extends Controller{

    public $job;
    
    public function __construct()
    {
        $this->model('Job');
        $this->job = new Job;
    }

    public function index(){
        if(isset($_GET['category'])){
            $categoryId = $_GET['category'];
            $jobs = $this->job->getByCategory($categoryId);
            $title = 'Category '.$this->job->getCategory($categoryId)->name;
        }else{
            $jobs = $this->job->getAllJobs();
            $title = 'Latest Jobs';
        }
        $categories = $this->job->getCategories();
        $data = [
            'title' => $title,
            'categories' => $categories,    
            'jobs' => $jobs   
        ];
        $this->view('jobs/index', $data);
    }

    public function create(){
        $categories = $this->job->getCategories();
        $data = [
            'title' => 'All Jobs',
            'categories' => $categories
        ];
        $this->view('jobs/create', $data);       
    }

    public function store(){
       $create = $this->job->insert($this->getData());
        if($create){
            redirect('index','New Job Listed!','success');
        }else{
            redirect('index','Something went wrong!','error');
        }  
    }

    public function job(){
        if(isset($_GET['id'])){
            $singleJob = $this->job->getJob($_GET['id']);            
        }else{
            $singleJob = $_SESSION['job'];
        }
        $data = [
            'job' => $singleJob
        ];  
        unset($_SESSION['job']);    
        $this->view('jobs/show', $data); 
    }

    public function edit(){
        if(isset($_GET['id'])){
            $singleJob = $this->job->getJob($_GET['id']);
            $categories = $this->job->getCategories();
            $data = [
                'job' => $singleJob,
                'categories' => $categories
            ];
        }   
        $this->view('jobs/edit', $data);
    }

    public function update(){
        $jobId = $_GET['id'];
        $this->job->update($jobId,$this->getData());
        $_SESSION['job'] = $this->job->getJob($_GET['id']);
        redirect('job','Job Updated!','success');
    }

    public function destroy(){
        if(isset($_POST['del_id'])){
            $delJob = $this->job->delete($_POST['del_id']);
        }
        if($delJob){
            redirect('index','Job Deleted!','success');
        }else{
            redirect('index','Something went wrong!','error');
        }  

    }

    public function getData(){
        if (isset($_POST['submit'])) {
            $data = array();
            $data['title'] = $_POST['title'];
            $data['salary'] = $_POST['salary'];
            $data['description'] = $_POST['description'];
            $data['contact'] = $_POST['contact'];
            $data['email'] = $_POST['email'];
            $data['company'] = $_POST['company'];
            $data['category_id'] = $_POST['category'];
            $data['location'] = $_POST['location'];
        }
        return $data;
    }
    
}
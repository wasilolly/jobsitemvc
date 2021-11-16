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
        $data = $this->getData();
        $data['user'] = $_SESSION['user'];
        $create = $this->job->insert($data);
        if($create){
            redirect(URLROOT,'New Job Listed!','success');
        }else{
            redirect(URLROOT.'jobs/create','Something went wrong!','error');
        }  
    }
    
    //show a single job
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
        redirect(URLROOT.'jobs/job','Job Updated!','success');
    }

    public function destroy(){
        if(isset($_POST['del_id'])){
            $delJob = $this->job->delete($_POST['del_id']);
        }
        if($delJob){
            redirect(URLROOT,'Job Deleted!','success');
        }else{
            redirect(URLROOT,'Something went wrong!','error');
        }  
    }

    public function apply(){
        $jobId = $_POST['id'];
        $target_dir = "../public/uploads/";
        $target_file = $target_dir.basename($_FILES["cv"]["name"]);
        move_uploaded_file($_FILES['cv']['tmp_name'], $target_file);
        $data = $this->getData();
        $data['cv_path'] = $target_file;
        if($this->job->apply($jobId,$data)){
            redirect(URLROOT,'Applied successfully, we will be in touch!','success');
        }else{
            redirect(URLROOT,'Your application was not sent, please try again!','error');  
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
        }else if(isset($_POST['apply'])){
            $data = array();
            $data['name'] = $_POST['name'];
            $data['email'] = $_POST['email'];
        }else{
            return null;
        }
        return $data;
    }
    
}
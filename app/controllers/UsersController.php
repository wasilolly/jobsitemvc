<?php

class UsersController extends Controller
{

    public $userModel;

    public function __construct()
    {
        $this->model('user');
        $this->userModel = new User;
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $createUser = $this->userModel->insert($this->getData());
            if ($createUser) {
                redirect(URLROOT, 'Registered', 'success');
            } else {
                redirect(URLROOT.'/users/register', 'Something went wrong, please try again', 'error');
            }
        } else {
            $this->view('auth/register');
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $createUser = $this->userModel->login($this->getData());
            if (isset($createUser)) {
                $_SESSION['user'] = $createUser;                
                redirect(URLROOT, 'Logged in', 'success');
            } else {
                redirect(URLROOT.'/users/login', 'Your credentials not matched, please try again!', 'error');
            }
        } else {
            $this->view('auth/login');
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        redirect(URLROOT, 'Logged out', 'success');       
    }

    public function profile(){
        $this->view('auth/dashboard');
    }

    public function getData()
    {
        $data = array();
        if (isset($_POST['name'])) {
            $data['name'] = $_POST['name'];
        }
        $data['email'] = $_POST['email'];
        $data['password'] = $_POST['password'];
        return $data;
    }
}

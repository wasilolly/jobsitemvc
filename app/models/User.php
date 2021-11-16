<?php 
class User{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function insert(array $data)
    {
       $hashPass = password_hash($data['password'], PASSWORD_DEFAULT) ;
       $this->db->query("INSERT INTO users (name,  email, password)
                    VALUES (:name, :email, :password)");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $hashPass );

        if($this->db->execute())
        {
            $this->login($data);
            return true;
        } else{
            return false;
        }
    }


    public function login(array $data)
    {
        $this->db->query("SELECT * FROM  users WHERE email = :email");
        $this->db->bind(':email', $data['email']);

        $user = $this->db->single();
        if(isset($user)){
            if(password_verify($data['password'],$user->password)){
                $_SESSION['user'] = $user;                
                return true;
            }else{
                return false;
            }
        }
        return false;
    }

    public function getJobsApplicants(){
        $userId = $_SESSION['user']->id;
        //select all from applications where job_id = job_id from Jobs table where user_id = this user_id
        $this->db->query("SELECT applications.*, jobs.id AS jobId
                        FROM applications
                        INNER JOIN jobs 
                        ON jobs.id = applications.job_id
                        WHERE jobs.user_id = $userId
                        ORDER BY created_at DESC");   
        $results = $this->db->resultSet();
        return $results;
                       
    }

}
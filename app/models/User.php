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
                return $user;
            }
        }
        return null;
    }

}
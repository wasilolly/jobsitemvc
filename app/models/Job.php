<?php 

class Job{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getJobs()
    {
        echo 'Jobs Model to the db';
    }
}
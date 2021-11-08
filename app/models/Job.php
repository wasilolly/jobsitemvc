<?php
class Job
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllJobs()
    {
        $this->db->query("SELECT jobs.*, categories.name AS cname
                        FROM jobs
                        INNER JOIN categories 
                        ON jobs.category_id = categories.id
                        ORDER BY created_at DESC");
        $results = $this->db->resultSet();
        return $results;
    }

    public function getCategories()
    {
        $this->db->query("SELECT * FROM  categories");
        $results = $this->db->resultSet();
        return $results;
    }

    public function getByCategory($categoryId)
    {
        $this->db->query("SELECT jobs.*, categories.name AS cname
                        FROM jobs
                        INNER JOIN categories 
                        ON jobs.category_id = categories.id
                        WHERE jobs.category_id = $categoryId
                        ORDER BY created_at DESC");
        $results = $this->db->resultSet();
        return $results;
    }

    public function getCategory($categoryId)
    {
        $this->db->query("SELECT * FROM  categories WHERE id = :categoryId");
        $this->db->bind(':categoryId', $categoryId);

        $row = $this->db->single();
        return $row;
    }

    public function getJob($jobId)
    {
        $this->db->query("SELECT * FROM  jobs WHERE id = :jobId");
        $this->db->bind(':jobId', $jobId);

        $row = $this->db->single();
        return $row;
    }

    public function insert(array $data)
    {
        $this->db->query("INSERT INTO jobs (category_id, title, company, 
                    description, location, salary, contact, email)
                    VALUES (:category_id, :title, :company, :description, :location,
                    :salary, :contact, :email)");
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':company', $data['company']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':salary', $data['salary']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':contact', $data['contact']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($delId)
    {
        $this->db->query("DELETE FROM jobs WHERE id = $delId");

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($jobId, array $data)
    {
        $this->db->query("UPDATE jobs 
                    SET
                    category_id = :category_id, 
                    title = :title, 
                    company = :company, 
                    description = :description, 
                    location = :location, 
                    salary = :salary, 
                    contact = :contact, 
                    email = :email
                    WHERE id = $jobId");

        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind('company', $data['company']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':salary', $data['salary']);
        $this->db->bind('description', $data['description']);
        $this->db->bind(':contact', $data['contact']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function apply($jobId, array $data)
    {
        $this->db->query("INSERT INTO applications (job_id, name, email, cv_path)
        VALUES (:job_id, :name, :email, :cv_path)");
        $this->db->bind(':job_id', $jobId);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':cv_path', $data['cv_path']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

<?php

namespace App\Models;

use App\Services\DatabaseService;

class Project
{
    private $db;

    public function __construct()
    {
        $this->db = new DatabaseService();
    }

    public function create($data)
    {
        // Logic to create a new project in the database
        // Example: $this->db->insert('projects', $data);
    }

    public function getAll()
    {
        // Logic to retrieve all projects from the database
        // Example: return $this->db->select('projects');
    }

    public function getById($id)
    {
        // Logic to retrieve a project by its ID
        // Example: return $this->db->select('projects', ['id' => $id]);
    }

    public function update($id, $data)
    {
        // Logic to update a project in the database
        // Example: $this->db->update('projects', $data, ['id' => $id]);
    }

    public function delete($id)
    {
        // Logic to delete a project from the database
        // Example: $this->db->delete('projects', ['id' => $id]);
    }
}
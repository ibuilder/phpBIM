<?php

namespace App\Models;

use App\Services\DatabaseService;

class Clash
{
    private $db;

    public function __construct()
    {
        $this->db = new DatabaseService();
    }

    public function createClash($data)
    {
        // Logic to create a new clash in the database
        $query = "INSERT INTO clashes (screenshot, coordinates, company_a, company_b, comments) VALUES (?, ?, ?, ?, ?)";
        return $this->db->execute($query, [
            $data['screenshot'],
            $data['coordinates'],
            $data['company_a'],
            $data['company_b'],
            $data['comments']
        ]);
    }

    public function getClashes($filters = [])
    {
        // Logic to retrieve clashes from the database with optional filters
        $query = "SELECT * FROM clashes";
        // Add filtering logic based on $filters
        return $this->db->query($query);
    }

    public function getClashById($id)
    {
        // Logic to retrieve a specific clash by ID
        $query = "SELECT * FROM clashes WHERE id = ?";
        return $this->db->query($query, [$id]);
    }

    public function updateClash($id, $data)
    {
        // Logic to update an existing clash
        $query = "UPDATE clashes SET screenshot = ?, coordinates = ?, company_a = ?, company_b = ?, comments = ? WHERE id = ?";
        return $this->db->execute($query, [
            $data['screenshot'],
            $data['coordinates'],
            $data['company_a'],
            $data['company_b'],
            $data['comments'],
            $id
        ]);
    }

    public function deleteClash($id)
    {
        // Logic to delete a clash
        $query = "DELETE FROM clashes WHERE id = ?";
        return $this->db->execute($query, [$id]);
    }
}
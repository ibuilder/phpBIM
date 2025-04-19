<?php

namespace App\Models;

use App\Services\DatabaseService;

class IfcModel
{
    private $db;

    public function __construct()
    {
        $this->db = new DatabaseService();
    }

    public function createModel($projectId, $filePath)
    {
        // Logic to save the IFC model to the database
        $query = "INSERT INTO ifc_models (project_id, file_path) VALUES (?, ?)";
        return $this->db->execute($query, [$projectId, $filePath]);
    }

    public function getModelsByProject($projectId)
    {
        // Logic to retrieve all models for a specific project
        $query = "SELECT * FROM ifc_models WHERE project_id = ?";
        return $this->db->fetchAll($query, [$projectId]);
    }

    public function deleteModel($modelId)
    {
        // Logic to delete a specific IFC model
        $query = "DELETE FROM ifc_models WHERE id = ?";
        return $this->db->execute($query, [$modelId]);
    }

    public function getModelById($modelId)
    {
        // Logic to retrieve a specific IFC model by ID
        $query = "SELECT * FROM ifc_models WHERE id = ?";
        return $this->db->fetch($query, [$modelId]);
    }
}
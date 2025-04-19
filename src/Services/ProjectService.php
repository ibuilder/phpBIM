<?php

namespace App\Services;

use App\Models\Project;
use App\Models\IfcModel;
use App\Models\Clash;
use App\Services\DatabaseService;

class ProjectService
{
    protected $dbService;

    public function __construct()
    {
        $this->dbService = new DatabaseService();
    }

    public function createProject($data)
    {
        $project = new Project($data);
        return $this->dbService->insert('projects', $project->toArray());
    }

    public function getProjectById($id)
    {
        return $this->dbService->find('projects', $id);
    }

    public function getAllProjects()
    {
        return $this->dbService->getAll('projects');
    }

    public function updateProject($id, $data)
    {
        return $this->dbService->update('projects', $id, $data);
    }

    public function deleteProject($id)
    {
        return $this->dbService->delete('projects', $id);
    }

    public function addIfcModelToProject($projectId, $modelData)
    {
        $ifcModel = new IfcModel($modelData);
        $ifcModel->project_id = $projectId;
        return $this->dbService->insert('ifc_models', $ifcModel->toArray());
    }

    public function getIfcModelsByProjectId($projectId)
    {
        return $this->dbService->getAllByField('ifc_models', 'project_id', $projectId);
    }

    public function getClashReportsByProjectId($projectId)
    {
        return $this->dbService->getAllByField('clashes', 'project_id', $projectId);
    }
}
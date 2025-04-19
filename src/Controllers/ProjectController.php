<?php

namespace App\Controllers;

use App\Services\ProjectService;
use App\Services\DatabaseService;

class ProjectController
{
    protected $projectService;
    protected $databaseService;

    public function __construct()
    {
        $this->projectService = new ProjectService();
        $this->databaseService = new DatabaseService();
    }

    public function index()
    {
        $projects = $this->projectService->getAllProjects();
        include '../src/Views/projects/index.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'company_id' => $_POST['company_id'],
            ];
            $this->projectService->createProject($data);
            header('Location: /projects');
            exit();
        }
        include '../src/Views/projects/create.php';
    }

    public function show($id)
    {
        $project = $this->projectService->getProjectById($id);
        include '../src/Views/projects/show.php';
    }
}
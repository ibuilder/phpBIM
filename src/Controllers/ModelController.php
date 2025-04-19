<?php

namespace App\Controllers;

use App\Services\StorageService;
use App\Services\DatabaseService;
use App\Models\IfcModel;

class ModelController
{
    protected $storageService;
    protected $databaseService;

    public function __construct()
    {
        $this->storageService = new StorageService();
        $this->databaseService = new DatabaseService();
    }

    public function uploadModel()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $file = $_FILES['ifc_model'];
            $projectId = $_POST['project_id'];

            if ($this->storageService->uploadFile($file)) {
                $model = new IfcModel();
                $model->setProjectId($projectId);
                $model->setFilePath($file['name']);
                $this->databaseService->saveModel($model);
                header('Location: /models/log.php?success=Model uploaded successfully');
            } else {
                header('Location: /models/upload.php?error=Failed to upload model');
            }
        }
    }

    public function getModelLog()
    {
        return $this->databaseService->getAllModels();
    }

    public function deleteModel($modelId)
    {
        $model = $this->databaseService->getModelById($modelId);
        if ($model) {
            $this->storageService->deleteFile($model->getFilePath());
            $this->databaseService->deleteModel($modelId);
            header('Location: /models/log.php?success=Model deleted successfully');
        } else {
            header('Location: /models/log.php?error=Model not found');
        }
    }
}
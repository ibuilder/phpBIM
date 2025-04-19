<?php
// upload.php - Form for uploading a new BIM model

require_once '../../config/config.php';
require_once '../../src/Services/StorageService.php';
require_once '../../src/Services/ProjectService.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /public/index.php');
    exit();
}

$storageService = new StorageService();
$projectService = new ProjectService();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $modelFile = $_FILES['model_file'];
    $projectId = $_POST['project_id'];

    if ($modelFile['error'] === UPLOAD_ERR_OK) {
        $uploadResult = $storageService->uploadModel($modelFile, $projectId);
        if ($uploadResult) {
            $message = "Model uploaded successfully.";
        } else {
            $message = "Failed to upload model.";
        }
    } else {
        $message = "Error uploading file.";
    }
}

$projects = $projectService->getUserProjects($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/style.css">
    <title>Upload BIM Model</title>
</head>
<body>
    <div class="container">
        <h1>Upload BIM Model</h1>
        <?php if (isset($message)): ?>
            <div class="alert alert-info"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="project_id">Select Project:</label>
                <select name="project_id" id="project_id" class="form-control" required>
                    <?php foreach ($projects as $project): ?>
                        <option value="<?= htmlspecialchars($project['id']) ?>"><?= htmlspecialchars($project['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="model_file">Upload IFC Model:</label>
                <input type="file" name="model_file" id="model_file" class="form-control" accept=".ifc" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</body>
</html>
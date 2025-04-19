<?php
// show.php - Displays the details of a specific project

require_once '../../config/config.php';
require_once '../../src/Controllers/ProjectController.php';

$projectId = $_GET['id'] ?? null;
$projectController = new ProjectController();

if ($projectId) {
    $project = $projectController->getProjectById($projectId);
    $clashes = $projectController->getClashesByProjectId($projectId);
} else {
    // Handle case where project ID is not provided
    header('Location: index.php');
    exit;
}

include '../layouts/main.php';
?>

<div class="container">
    <h1><?php echo htmlspecialchars($project['name']); ?></h1>
    <p><?php echo htmlspecialchars($project['description']); ?></p>

    <h2>BIM Model</h2>
    <div id="model-viewer">
        <!-- Three.js model viewer will be initialized here -->
    </div>

    <h2>Clash Detection Reports</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Screenshot</th>
                <th>Coordinates</th>
                <th>Companies Involved</th>
                <th>Comments</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clashes as $clash): ?>
                <tr>
                    <td><img src="<?php echo htmlspecialchars($clash['screenshot']); ?>" alt="Clash Screenshot" width="100"></td>
                    <td><?php echo htmlspecialchars($clash['coordinates']); ?></td>
                    <td><?php echo htmlspecialchars($clash['companies']); ?></td>
                    <td><?php echo htmlspecialchars($clash['comments']); ?></td>
                    <td>
                        <a href="show.php?id=<?php echo $clash['id']; ?>" class="btn btn-info">View</a>
                        <a href="edit.php?id=<?php echo $clash['id']; ?>" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="create.php?project_id=<?php echo $projectId; ?>" class="btn btn-primary">Add Clash</a>
</div>

<script src="/js/viewer.js"></script>
<script>
    // Initialize the model viewer with the project's BIM model
    const modelPath = '<?php echo htmlspecialchars($project['model_path']); ?>';
    initModelViewer(modelPath);
</script>
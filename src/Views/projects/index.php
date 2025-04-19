<?php
require_once '../../config/config.php';
require_once '../../src/Controllers/ProjectController.php';

$projectController = new ProjectController();
$projects = $projectController->getAllProjects();

include '../layouts/main.php';
?>

<div class="container">
    <h1 class="mt-4">Projects</h1>
    <a href="create.php" class="btn btn-primary mb-3">Create New Project</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projects as $project): ?>
                <tr>
                    <td><?php echo htmlspecialchars($project['id']); ?></td>
                    <td><?php echo htmlspecialchars($project['name']); ?></td>
                    <td><?php echo htmlspecialchars($project['description']); ?></td>
                    <td>
                        <a href="show.php?id=<?php echo htmlspecialchars($project['id']); ?>" class="btn btn-info">View</a>
                        <a href="edit.php?id=<?php echo htmlspecialchars($project['id']); ?>" class="btn btn-warning">Edit</a>
                        <a href="delete.php?id=<?php echo htmlspecialchars($project['id']); ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
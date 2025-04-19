<?php
// This file displays the log of uploaded models.

require_once '../../config/config.php';
require_once '../../src/Services/DatabaseService.php';

$dbService = new DatabaseService();
$models = $dbService->getModels(); // Fetch models from the database

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIM Model Log</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="container">
        <h1>BIM Model Log</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Uploaded By</th>
                    <th>Date Uploaded</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($models as $model): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($model['id']); ?></td>
                        <td><?php echo htmlspecialchars($model['name']); ?></td>
                        <td><?php echo htmlspecialchars($model['uploaded_by']); ?></td>
                        <td><?php echo htmlspecialchars($model['date_uploaded']); ?></td>
                        <td>
                            <a href="/models/show.php?id=<?php echo htmlspecialchars($model['id']); ?>" class="btn btn-info">View</a>
                            <a href="/models/edit.php?id=<?php echo htmlspecialchars($model['id']); ?>" class="btn btn-warning">Edit</a>
                            <a href="/models/delete.php?id=<?php echo htmlspecialchars($model['id']); ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="/models/upload.php" class="btn btn-primary">Upload New Model</a>
    </div>
    <script src="/js/modelLog.js"></script>
</body>
</html>
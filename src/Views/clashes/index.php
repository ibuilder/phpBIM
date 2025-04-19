<?php
require_once '../../config/config.php';
require_once '../../src/Controllers/ClashController.php';

$clashController = new ClashController();
$clashes = $clashController->getAllClashes();

include '../layouts/main.php';
?>

<div class="container">
    <h1>Clash Detection Reports</h1>
    <a href="create.php" class="btn btn-primary mb-3">Add New Clash</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Coordinates</th>
                <th>Companies Involved</th>
                <th>Comments</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clashes as $clash): ?>
                <tr>
                    <td><?php echo htmlspecialchars($clash['id']); ?></td>
                    <td><?php echo htmlspecialchars($clash['coordinates']); ?></td>
                    <td><?php echo htmlspecialchars($clash['companies']); ?></td>
                    <td><?php echo htmlspecialchars($clash['comments']); ?></td>
                    <td>
                        <a href="show.php?id=<?php echo htmlspecialchars($clash['id']); ?>" class="btn btn-info">View</a>
                        <a href="edit.php?id=<?php echo htmlspecialchars($clash['id']); ?>" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
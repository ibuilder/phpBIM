<?php
// show.php - Displays the details of a specific clash

require_once '../../config/config.php';
require_once '../../src/Controllers/ClashController.php';

$clashController = new ClashController();
$clashId = $_GET['id'] ?? null;

if ($clashId) {
    $clash = $clashController->getClashById($clashId);
} else {
    // Handle case where clash ID is not provided
    header('Location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clash Details</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include '../layouts/main.php'; ?>

    <div class="container">
        <h1>Clash Details</h1>
        <?php if ($clash): ?>
            <div class="clash-details">
                <h2>Clash ID: <?php echo htmlspecialchars($clash['id']); ?></h2>
                <p><strong>Coordinates:</strong> <?php echo htmlspecialchars($clash['coordinates']); ?></p>
                <p><strong>Companies Involved:</strong> <?php echo htmlspecialchars($clash['companies']); ?></p>
                <p><strong>Comments:</strong> <?php echo htmlspecialchars($clash['comments']); ?></p>
                <img src="<?php echo htmlspecialchars($clash['screenshot']); ?>" alt="Clash Screenshot" class="img-fluid">
            </div>
        <?php else: ?>
            <p>No clash details found.</p>
        <?php endif; ?>
        <a href="edit.php?id=<?php echo htmlspecialchars($clashId); ?>" class="btn btn-primary">Edit Clash</a>
        <a href="index.php" class="btn btn-secondary">Back to Clash List</a>
    </div>

    <script src="/js/viewer.js"></script>
</body>
</html>
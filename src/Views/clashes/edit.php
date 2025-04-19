<?php
// edit.php - Form for editing an existing clash

require_once '../../config/config.php';
require_once '../../src/Controllers/ClashController.php';

$clashController = new ClashController();
$clashId = $_GET['id'] ?? null;

if ($clashId) {
    $clash = $clashController->getClashById($clashId);
} else {
    // Handle error: clash ID not provided
    header('Location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Clash</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include '../layouts/main.php'; ?>

    <div class="container">
        <h1>Edit Clash</h1>
        <form action="/src/Controllers/ClashController.php?action=update&id=<?php echo $clashId; ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="screenshot">Screenshot</label>
                <input type="file" name="screenshot" id="screenshot" class="form-control" accept="image/*">
            </div>
            <div class="form-group">
                <label for="coordinates">Coordinates</label>
                <input type="text" name="coordinates" id="coordinates" class="form-control" value="<?php echo htmlspecialchars($clash['coordinates']); ?>" required>
            </div>
            <div class="form-group">
                <label for="companies">Companies Involved</label>
                <input type="text" name="companies" id="companies" class="form-control" value="<?php echo htmlspecialchars($clash['companies']); ?>" required>
            </div>
            <div class="form-group">
                <label for="comments">Comments</label>
                <textarea name="comments" id="comments" class="form-control" rows="4"><?php echo htmlspecialchars($clash['comments']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Clash</button>
        </form>
    </div>

    <script src="/js/forms.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Clash</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include '../partials/_clashForm.php'; ?>

    <div class="container">
        <h1>Create Clash Report</h1>
        <form id="createClashForm" action="/api/clashes" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="screenshot">Upload Screenshot:</label>
                <input type="file" class="form-control" id="screenshot" name="screenshot" required>
            </div>
            <div class="form-group">
                <label for="coordinates">Coordinates in Model:</label>
                <input type="text" class="form-control" id="coordinates" name="coordinates" required>
            </div>
            <div class="form-group">
                <label for="companies">Companies Involved:</label>
                <input type="text" class="form-control" id="companies" name="companies" required>
            </div>
            <div class="form-group">
                <label for="comments">Comments:</label>
                <textarea class="form-control" id="comments" name="comments" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Clash</button>
        </form>
    </div>

    <script src="/js/forms.js"></script>
</body>
</html>
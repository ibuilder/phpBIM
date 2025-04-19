<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Project</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include '../layouts/main.php'; ?>

    <div class="container">
        <h1>Create New Project</h1>
        <form id="createProjectForm" action="/api/projects" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="projectName">Project Name</label>
                <input type="text" class="form-control" id="projectName" name="projectName" required>
            </div>
            <div class="form-group">
                <label for="projectDescription">Project Description</label>
                <textarea class="form-control" id="projectDescription" name="projectDescription" required></textarea>
            </div>
            <div class="form-group">
                <label for="ifcModel">Upload IFC Model</label>
                <input type="file" class="form-control-file" id="ifcModel" name="ifcModel" accept=".ifc" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Project</button>
        </form>
    </div>

    <script src="/js/forms.js"></script>
</body>
</html>
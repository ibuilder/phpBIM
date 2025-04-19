<form action="/models/upload" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="modelName">Model Name</label>
        <input type="text" class="form-control" id="modelName" name="modelName" required>
    </div>
    <div class="form-group">
        <label for="modelFile">Upload IFC Model</label>
        <input type="file" class="form-control-file" id="modelFile" name="modelFile" accept=".ifc" required>
    </div>
    <div class="form-group">
        <label for="projectId">Select Project</label>
        <select class="form-control" id="projectId" name="projectId" required>
            <!-- Options will be populated dynamically -->
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Upload Model</button>
</form>
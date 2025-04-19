<form id="clashForm" method="POST" action="/api/clashes" enctype="multipart/form-data">
    <div class="form-group">
        <label for="screenshot">Upload Screenshot:</label>
        <input type="file" class="form-control" id="screenshot" name="screenshot" required>
    </div>
    <div class="form-group">
        <label for="coordinates">Coordinates in Model:</label>
        <input type="text" class="form-control" id="coordinates" name="coordinates" placeholder="Enter coordinates" required>
    </div>
    <div class="form-group">
        <label for="companies">Companies Involved:</label>
        <select multiple class="form-control" id="companies" name="companies[]" required>
            <!-- Options will be populated dynamically from the database -->
        </select>
    </div>
    <div class="form-group">
        <label for="comments">Comments:</label>
        <textarea class="form-control" id="comments" name="comments" rows="3" placeholder="Enter comments for resolution"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit Clash</button>
</form>
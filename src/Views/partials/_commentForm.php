<form action="/api/comments" method="POST" id="commentForm">
    <div class="form-group">
        <label for="clashId">Clash ID</label>
        <input type="text" class="form-control" id="clashId" name="clashId" required>
    </div>
    <div class="form-group">
        <label for="commentText">Comment</label>
        <textarea class="form-control" id="commentText" name="commentText" rows="3" required></textarea>
    </div>
    <div class="form-group">
        <label for="userId">User ID</label>
        <input type="text" class="form-control" id="userId" name="userId" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit Comment</button>
</form>
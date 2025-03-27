<div class="container">
    <h2>Create Static Block</h2>
    
    <form action="{{ route('static-blocks.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="5" required></textarea>
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="status" value="1" checked>
                Active
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Create Block</button>
    </form>
</div>
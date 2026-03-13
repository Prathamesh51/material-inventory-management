<form action="{{ route('categories.update',$category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Category Name</label>
        <input type="text" name="name" class="form-control" value="{{ $category->name }}">
    </div>
    <button class="btn btn-success btn-sm">Update</button>
</form>
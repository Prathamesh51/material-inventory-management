@extends('layout.app')

@section('content')

<div class="container mt-4">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <h4>Add Category</h4>

    <form method="POST" action="{{ route('categories.store') }}">
        @csrf

        <div class="mb-3">
            <label>Category Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <button class="btn btn-success">Save</button>

    </form>

</div>

@endsection
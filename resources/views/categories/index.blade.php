@extends('layout.app')

@section('content')

<div class="container mt-4">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">
            Add Category
        </a>
    </div>

    <table class="table table-bordered table-stripped">
        <thead>
            <tr>
                <th scope="col">Sr.</th>
                <th scope="col">Category</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('materials.index',$category->id) }}" class="btn btn-sm btn-info">
                        Edit
                    </a>

                    <form action="{{ route('categories.destroy',$category->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>
@endsection
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
        <a href="{{ route('inward_quantities.create') }}" class="btn btn-primary mb-3">
            Add Material Transaction
        </a>
    </div>

    <table class="table table-bordered table-stripped">
        <thead>
            <tr>
                <th scope="col">Sr.</th>
                <th scope="col">Material</th>
                <th scope="col">Category</th>
                <th scope="col">Opening Balance</th>
                <th scope="col">Current Balance</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($materials as $material)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $material->name }}</td>
                <td>{{ $material->category->name }}</td>
                <td>{{ $material->opening_balance }}</td>
                <td>{{ $material->current_balance ?? $material->current_balance }}</td>
                <td>
                    <a href="{{ route('materials.edit', $material->id) }}" class="btn btn-sm btn-primary">Edit</a>
                </td>
                <td>
                    <form action="{{ route('materials.destroy', $material->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
    @endsection
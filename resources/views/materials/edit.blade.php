@extends('layout.app')

@section('content')

<div class="container mt-4">
    <center>
        <h2>Edit Material</h2>
    </center>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
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
    <form action="{{ route('materials.update',$material->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Material Name</label>
            <input type="text" name="name" class="form-control" value="{{ $material->name }}">
        </div>

        <div class="mb-3">
            <label>Opening Balance</label>
            <input type="number" name="opening_balance" class="form-control" step="0.01" value="{{ $material->opening_balance }}">

            <input type="hidden" name="category_id" value="{{ $material->category_id }}">
        </div>
        <input type="submit" class="btn btn-success btn-sm">

    </form>
</div>
@endsection
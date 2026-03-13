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
<h4>Add Material</h4>

<form method="POST" action="{{ route('materials.store') }}">

@csrf

<input type="hidden" name="category_id" value="{{ $categoryId }}">

<div class="mb-3">
<label>Material Name</label>
<input type="text" name="name" class="form-control">
</div>

<div class="mb-3">
<label>Opening Balance</label>
<input type="number" name="opening_balance" class="form-control" step="0.01">
</div>

<button class="btn btn-success">Save</button>

</form>

</div>

@endsection
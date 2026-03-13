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
    <center>
        <h2>Materials</h2>
    </center>
    @include('categories.edit')
    <br>
    <a href="{{ route('materials.create', $category->id) }}" class="btn btn-primary mb-3">
        Add Material
    </a>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>Sr</th>
                <th>Material</th>
                <th>Opening Balance</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            @foreach($materials as $material)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $material->name }}</td>
                <td>{{ $material->opening_balance }}</td>

                <td>
                    <a href="{{ route('materials.edit', $material->id) }}" class="btn btn-info btn-sm">Edit</a>
                    <form action="{{ route('materials.destroy',$material->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"  onclick="return confirm('Are you sure you want to delete this material?')">Delete</button>
                    </form>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection
@extends('layout.app')

@section('content')

<div class="container mt-4">

    <center>
        <h2>Add Inward / Outward Quantity</h2>
    </center>

    <!-- Form to save material transaction -->
    <form method="POST" action="{{ route('inward_quantities.store') }}">
        @csrf

        <!-- Category Dropdown -->
        <div class="mb-3">
            <label>Material Category *</label>
            <select name="category_id" id="category" class="form-control" required>
                <option value="">Select Category</option>

                @foreach($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Material Dropdown -->
        <div class="mb-3">
            <label>Material Name *</label>
            <select name="material_id" id="material" class="form-control" required>
                <option value="">Select Material</option>
            </select>
        </div>

        <!-- Date -->
        <div class="mb-3">
            <label>Date *</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <!-- Quantity -->
        <div class="mb-3">
            <label>Material Inward / Outward Quantity *</label>
            <input type="number" name="quantity" step="0.01" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">
            Save
        </button>

    </form>

</div>

@endsection


@section('scripts')

<script>
    // Convert categories data into JavaScript object
    let categories = {!! json_encode($categories) !!};

    // material dropdown based on selected category
    document.getElementById('category').addEventListener('change', function() {

        let categoryId = this.value;

        let materialDropdown = document.getElementById('material');

        // Reset dropdown
        materialDropdown.innerHTML = '<option value="">Select Material</option>';

        // Find selected category
        let selectedCategory = categories.find(cat => cat.id == categoryId);

        if (selectedCategory) {

            selectedCategory.materials.forEach(function(material) {

                let option = document.createElement("option");

                option.value = material.id;
                option.text = material.name;

                materialDropdown.appendChild(option);

            });

        }

    });
</script>

@endsection
@extends('layouts.adminLayout')

@section('content')

<div class="ms-content-wrapper">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-11 col-md-12">

            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb bg-white px-3 py-2 rounded shadow-sm">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.food.list') }}">Food</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Food Item</li>
                </ol>
            </nav>

            <h2 class="mb-4">Add Food Item</h2>

            <form method="POST" action="{{ route('admin.food.store') }}" enctype="multipart/form-data" novalidate>
                @csrf

                <div class="row">
                    <!-- Image Upload & Preview -->
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="image" class="font-weight-bold">Food Image</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                            @error('image')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="border rounded p-2 d-flex justify-content-center align-items-center" style="height: 280px; background-color: #fafafa;">
                            <img id="imagePreview" src="{{ asset('assets2/img/food-placeholder.png') }}" alt="Image Preview" class="img-fluid" style="max-height: 270px;">
                        </div>

                        <small class="form-text text-muted mt-2">Supported formats: JPG, PNG. Max size: 2MB.</small>
                    </div>

                    <!-- Form Fields -->
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="name" class="font-weight-bold">Food Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter food name" value="{{ old('name') }}" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="calories" class="font-weight-bold">Calories <span class="text-danger">*</span></label>
                                <input type="number" name="calories" id="calories" class="form-control @error('calories') is-invalid @enderror" placeholder="e.g. 250" value="{{ old('calories') }}" required>
                                @error('calories')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="protein" class="font-weight-bold">Protein (g) <span class="text-danger">*</span></label>
                                <input type="number" step="any" name="protein" id="protein" class="form-control @error('protein') is-invalid @enderror" placeholder="e.g. 16" value="{{ old('protein') }}" required>
                                @error('protein')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="fat" class="font-weight-bold">Fat (g) <span class="text-danger">*</span></label>
                                <input type="number" step="any" name="fat" id="fat" class="form-control @error('fat') is-invalid @enderror" placeholder="e.g. 10" value="{{ old('fat') }}" required>
                                @error('fat')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="carbs" class="font-weight-bold">Carbohydrates (g) <span class="text-danger">*</span></label>
                                <input type="number" step="any" name="carbs" id="carbs" class="form-control @error('carbs') is-invalid @enderror" placeholder="e.g. 30" value="{{ old('carbs') }}" required>
                                @error('carbs')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="serving_size" class="font-weight-bold">Serving Size</label>
                            <input type="text" name="serving_size" id="serving_size" class="form-control @error('serving_size') is-invalid @enderror" placeholder="e.g. 100g, 1 slice" value="{{ old('serving_size') }}">
                            @error('serving_size')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description" class="font-weight-bold">Description</label>
                            <textarea name="description" id="description" rows="6" class="form-control form-control-lg @error('description') is-invalid @enderror" placeholder="Enter detailed description here">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end gap-3 mt-4">
                            <button type="reset" class="btn btn-outline-warning px-4">Reset</button>
                            <button type="submit" class="btn btn-primary px-4">Save</button>
                        </div>

                    </div>
                </div>

            </form>

        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const preview = document.getElementById('imagePreview');
                preview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const preview = document.getElementById('imagePreview');
        preview.src = "{{ asset('assets2/img/food-placeholder.png') }}";
    });
</script>

@endsection
@extends('layouts.adminLayout')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="mb-0">Edit Food Item</h3>
        @if(session('success'))
        <div class="alert alert-success mb-0">
            {{ session('success') }}
        </div>
        @endif
    </div>
    <div class="card-body">
        <form action="{{ route('admin.food.update', $food->id) }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input value="{{ old('name', $food->name) }}" type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $food->description) }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="calories">Calories</label>
                    <input value="{{ old('calories', $food->calories) }}" type="number" id="calories" name="calories" class="form-control @error('calories') is-invalid @enderror" required>
                    @error('calories')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-3">
                    <label for="protein">Protein (g)</label>
                    <input value="{{ old('protein', $food->protein) }}" type="number" step="0.01" id="protein" name="protein" class="form-control @error('protein') is-invalid @enderror" required>
                    @error('protein')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-3">
                    <label for="fat">Fat (g)</label>
                    <input value="{{ old('fat', $food->fat) }}" type="number" step="0.01" id="fat" name="fat" class="form-control @error('fat') is-invalid @enderror" required>
                    @error('fat')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-3">
                    <label for="carbs">Carbs (g)</label>
                    <input value="{{ old('carbs', $food->carbs) }}" type="number" step="0.01" id="carbs" name="carbs" class="form-control @error('carbs') is-invalid @enderror" required>
                    @error('carbs')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="serving_size">Serving Size</label>
                <input value="{{ old('serving_size', $food->serving_size) }}" type="text" id="serving_size" name="serving_size" class="form-control @error('serving_size') is-invalid @enderror">
                @error('serving_size')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                @if($food->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $food->image) }}" alt="Current Image" style="max-width: 150px;" class="rounded">
                </div>
                @endif
                <input type="file" id="image" name="image" accept="image/*" class="form-control-file @error('image') is-invalid @enderror">
                @error('image')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Update Food</button>
            <a href="{{ route('admin.food.list') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
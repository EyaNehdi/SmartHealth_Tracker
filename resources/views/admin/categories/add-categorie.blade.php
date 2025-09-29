@extends('layouts.adminLayout')

@section('content')

<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.categories.list') }}">Categories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Category</li>
                </ol>
            </nav>
        </div>
        <div class="col-xl-12 col-md-12">
            <div class="ms-panel">
                <div class="ms-panel-header ms-panel-custome">
                    <h6>Add Category</h6>
                    <a href="{{ route('admin.categories.list') }}" class="ms-text-primary">Categories List</a>
                </div>
                <div class="ms-panel-body">
                    <form class="needs-validation" method="POST" action="{{ route('admin.categories.store') }}" novalidate>
                        @csrf

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="nom">Category Name</label>
                                <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" id="nom" placeholder="Enter Category Name" value="{{ old('nom') }}" required>
                                @error('nom')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Description">{{ old('description') }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button class="btn btn-warning mt-4 d-inline w-20" type="reset">Reset</button>
                        <button class="btn btn-primary mt-4 d-inline w-20" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

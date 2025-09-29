@extends('layouts.adminLayout')

@section('content')

<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.food.list') }}">Food</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Food Item</li>
                </ol>
            </nav>
        </div>
        <div class="col-xl-12 col-md-12">
            <div class="ms-panel">
                <div class="ms-panel-header ms-panel-custome">
                    <h6>Add Food Item</h6>
                    <a href="{{ route('admin.food.list') }}" class="ms-text-primary">Food Items List</a>
                </div>
                <div class="ms-panel-body">
                    <form class="needs-validation" method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data" novalidate>
                        @csrf

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="name"> Nom</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Food Name" value="{{ old('name') }}" required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="calories">Description</label>
                                <input type="number" name="calories" class="form-control @error('calories') is-invalid @enderror" id="calories" placeholder="Calories" value="{{ old('calories') }}" required>
                                @error('calories')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="protein">date_creation</label>
                                <input type="number" step="any" name="protein" class="form-control @error('protein') is-invalid @enderror" id="protein" placeholder="Protein" value="{{ old('protein') }}" required>
                                @error('protein')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="fat"> statut </label>
                                <input type="number" step="any" name="fat" class="form-control @error('fat') is-invalid @enderror" id="fat" placeholder="Fat" value="{{ old('fat') }}" required>
                                @error('fat')
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
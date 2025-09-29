@extends('layouts.adminLayout')

@section('content')

<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.produits.list') }}">Produits</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                </ol>
            </nav>
        </div>
        <div class="col-xl-12 col-md-12">
            <div class="ms-panel">
                <div class="ms-panel-header ms-panel-custome">
                    <h6>Edit Product</h6>
                    <a href="{{ route('admin.produits.list') }}" class="ms-text-primary">Products List</a>
                </div>
                <div class="ms-panel-body">
                    <form class="needs-validation" method="POST" action="{{ route('admin.produits.update', $produit->id) }}" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="nom">Product Name</label>
                                <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" id="nom" placeholder="Enter Product Name" value="{{ old('nom', $produit->nom) }}" required>
                                @error('nom')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="categorie_id">Category</label>
                                <select name="categorie_id" class="form-control @error('categorie_id') is-invalid @enderror" id="categorie_id" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $categorie)
                                        <option value="{{ $categorie->id }}" {{ (old('categorie_id', $produit->categorie_id) == $categorie->id) ? 'selected' : '' }}>{{ $categorie->nom }}</option>
                                    @endforeach
                                </select>
                                @error('categorie_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="prix">Price</label>
                                <input type="number" step="0.01" name="prix" class="form-control @error('prix') is-invalid @enderror" id="prix" placeholder="Price" value="{{ old('prix', $produit->prix) }}" required>
                                @error('prix')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="stock">Stock</label>
                                <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" id="stock" placeholder="Stock" value="{{ old('stock', $produit->stock) }}" required>
                                @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Description">{{ old('description', $produit->description) }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="image">Product Image</label>
                                @if($produit->image)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $produit->image) }}" alt="{{ $produit->nom }}" style="width:120px; height:120px; object-fit:cover; border-radius:5px;">
                                    </div>
                                @endif
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" accept="image/*">
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Leave blank to keep existing image</small>
                            </div>
                        </div>

                        <button class="btn btn-warning mt-4 d-inline w-20" type="reset">Reset</button>
                        <button class="btn btn-primary mt-4 d-inline w-20" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

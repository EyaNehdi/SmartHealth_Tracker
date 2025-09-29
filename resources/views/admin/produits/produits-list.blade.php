@extends('layouts.adminLayout')

@section('content')

<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="material-icons">home</i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                </ol>
            </nav>
        </div>

        <!-- Formulaire de recherche et tri -->
        <div class="col-md-12 mb-3">
            <form method="GET" action="{{ route('admin.produits.list') }}" class="form-inline">
                <input type="text" name="search" class="form-control mr-2" placeholder="Search product" value="{{ request('search') }}">
                
                <select name="sort" class="form-control mr-2">
                    <option value="">Sort by Price</option>
                    <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Low to High</option>
                    <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>High to Low</option>
                </select>

                <button type="submit" class="btn btn-primary">Apply</button>
            </form>
        </div>

        <!-- Liste des produits -->
        @forelse ($produits as $produit)
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="ms-card">
                <div class="ms-card-body">
                    <div class="media fs-14">
                        <div class="mr-2 align-self-center">
                            <img src="{{ $produit->image ? asset('storage/' . $produit->image) : asset('assets2/img/placeholder.png') }}" 
                                 alt="{{ $produit->nom }}" class="ms-img-round" style="width:80px; height:80px; object-fit:cover;">
                        </div>
                        <div class="media-body">
                            <h6>
                                {{ $produit->nom }}
                                @if($produit->stock == 0)
                                    <span class="badge badge-danger ml-2">Out of Stock</span>
                                @endif
                            </h6>
                            <p class="fs-12 my-1 text-disabled">{{ Str::limit($produit->description, 80) }}</p>
                            <p class="mb-0">Category: {{ $produit->categorie->nom ?? 'N/A' }}</p>
                            <p class="mb-0">Price: ${{ number_format($produit->prix, 2) }} | Stock: {{ $produit->stock }}</p>

                            <div class="dropdown float-right">
                                <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="ms-dropdown-list">
                                        <a class="media p-2" href="{{ route('admin.produits.show', $produit->id) }}">
                                            <div class="media-body"><span>View Details</span></div>
                                        </a>
                                        <a class="media p-2" href="{{ route('admin.produits.edit', $produit->id) }}">
                                            <div class="media-body"><span>Edit</span></div>
                                        </a>
                                        <form action="{{ route('admin.produits.destroy', $produit->id) }}" method="POST" class="media p-2" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link p-0 m-0">
                                                <div class="media-body"><span>Delete</span></div>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <p>No products available.</p>
        @endforelse

        <!-- Pagination -->
        <div class="col-md-12">
            {{ $produits->withQueryString()->links() }}
        </div>

    </div>
</div>

@endsection

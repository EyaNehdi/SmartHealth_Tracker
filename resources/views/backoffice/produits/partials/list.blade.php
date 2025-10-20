@if($produits->count() > 0)
<div class="row">
    @foreach ($produits as $produit)
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card shadow-sm h-100 border-0">
                {{-- Image --}}
                <div class="position-relative">
                    <img src="{{ $produit->image ? asset('storage/' . $produit->image) : asset('assets2/img/placeholder.png') }}" 
                         alt="{{ $produit->nom }}" 
                         class="card-img-top" 
                         style="height:200px; object-fit:cover; border-radius:8px 8px 0 0;">
                </div>

                {{-- Corps --}}
                <div class="card-body d-flex flex-column">
                    <h6 class="text-primary mb-1">{{ $produit->nom }}</h6>
                    <p class="text-muted mb-2">{{ Str::limit($produit->description, 70) }}</p>
                    <p class="mb-1"><strong>Catégorie:</strong> {{ $produit->categorie->nom ?? '—' }}</p>
                    <p class="mb-1"><strong>Prix:</strong> {{ number_format($produit->prix, 2) }} DT</p>
                    <p class="mb-3"><strong>Stock:</strong> {{ $produit->stock }}</p>

                    <div class="mt-auto d-flex justify-content-between">
                        <a href="{{ route('admin.produits.edit', $produit->id) }}" class="btn btn-sm btn-outline-primary">
                            <i class="material-icons align-middle fs-16">edit</i> Edit
                        </a>
                        <form action="{{ route('admin.produits.destroy', $produit->id) }}" method="POST" onsubmit="return confirm('Supprimer ce produit ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="material-icons align-middle fs-16">delete</i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="mt-4">
    {{ $produits->links('pagination::bootstrap-4') }}
</div>
@else
<div class="alert alert-info text-center mt-4">Aucun produit trouvé.</div>
@endif

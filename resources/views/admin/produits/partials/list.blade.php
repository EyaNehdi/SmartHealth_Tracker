<div id="products-grid" class="row">
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
                            <h6>{{ $produit->nom }}</h6>
                            <p class="fs-12 my-1 text-disabled">{{ Str::limit($produit->description, 80) }}</p>
                            <p class="mb-0">Category: {{ $produit->categorie->nom ?? 'N/A' }}</p>
                            <p class="mb-0">Price: ${{ number_format($produit->prix, 2) }} | Stock: {{ $produit->stock }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12"><p>No products available.</p></div>
    @endforelse
</div>

@if ($produits->lastPage() > 1)
<nav id="products-pagination" aria-label="Pagination">
    <ul class="pagination justify-content-center mt-3">
        <li class="page-item {{ $produits->onFirstPage() ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $produits->previousPageUrl() }}">Précédent</a>
        </li>

        @php
            $current = $produits->currentPage();
            $last = $produits->lastPage();
            $start = max($current - 2, 1);
            $end = min($start + 4, $last);
            if($end - $start < 4) { $start = max($end - 4, 1); }
        @endphp

        @for ($i = $start; $i <= $end; $i++)
            <li class="page-item {{ $current == $i ? 'active' : '' }}">
                <a class="page-link" href="{{ $produits->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        <li class="page-item {{ $produits->hasMorePages() ? '' : 'disabled' }}">
            <a class="page-link" href="{{ $produits->nextPageUrl() }}">Suivant</a>
        </li>
    </ul>
</nav>
@endif

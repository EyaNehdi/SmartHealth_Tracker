@extends('shared.layouts.backoffice')

@section('content')
<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}"><i class="material-icons">home</i> Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Produits</li>
                </ol>
            </nav>
        </div>

        {{-- 🔍 Filtres --}}
        <div class="col-12 mb-4">
            <div class="card p-3">
                <div class="form-inline flex-wrap">
                    <input id="search" class="form-control mr-2 mb-2" placeholder="🔎 Rechercher un produit...">
                    <select id="category" class="form-control mr-2 mb-2">
                        <option value="">Toutes les catégories</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->nom }}</option>
                        @endforeach
                    </select>
                    <select id="sort" class="form-control mb-2">
                        <option value="">Trier par...</option>
                        <option value="newest">Plus récents</option>
                        <option value="oldest">Plus anciens</option>
                        <option value="price_asc">Prix ↑</option>
                        <option value="price_desc">Prix ↓</option>
                        <option value="name_asc">Nom A→Z</option>
                        <option value="name_desc">Nom Z→A</option>
                    </select>
                </div>
            </div>
        </div>

        {{-- 🧩 Zone dynamique --}}
        <div class="col-12" id="products-container">
            @include('backoffice.produits.partials.list', ['produits' => $produits])
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('products-container');
    const searchInput = document.getElementById('search');
    const sortSelect = document.getElementById('sort');
    const categorySelect = document.getElementById('category');
    const baseUrl = "{{ route('admin.produits.list') }}";
    let debounceTimeout = null;
    let currentPage = 1;

    function getFilters() {
        return {
            search: searchInput.value.trim(),
            sort: sortSelect.value,
            category: categorySelect.value,
            page: currentPage
        };
    }

    async function fetchProducts() {
        const filters = getFilters();
        container.innerHTML = '<div class="text-center p-4">Chargement...</div>';

        try {
            const queryString = Object.entries(filters)
                .filter(([_, v]) => v)
                .map(([k,v]) => `${k}=${encodeURIComponent(v)}`)
                .join('&');

            const res = await fetch(baseUrl + '?' + queryString, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            });

            if (!res.ok) throw new Error('Erreur réseau');
            const data = await res.json();
            container.innerHTML = data.html || '<div class="alert alert-info">Aucun résultat</div>';
        } catch (err) {
            container.innerHTML = '<div class="alert alert-danger">Erreur: ' + err.message + '</div>';
            console.error(err);
        }
    }

    // 🔹 Recherche instantanée
    searchInput.addEventListener('input', () => {
        clearTimeout(debounceTimeout);
        debounceTimeout = setTimeout(() => { currentPage = 1; fetchProducts(); }, 200);
    });

    // 🔹 Changement tri ou catégorie
    [sortSelect, categorySelect].forEach(el => el.addEventListener('change', () => { currentPage = 1; fetchProducts(); }));

    // 🔹 Pagination AJAX
    container.addEventListener('click', function(e) {
        const a = e.target.closest('a.page-link');
        if (!a) return;
        e.preventDefault();
        const pageAttr = a.getAttribute('href').match(/page=(\d+)/);
        currentPage = pageAttr ? parseInt(pageAttr[1]) : 1;
        fetchProducts();
    });
});
</script>
@endsection

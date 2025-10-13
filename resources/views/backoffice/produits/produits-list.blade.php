@extends('shared.layouts.backoffice')

@section('content')
<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="material-icons">home</i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                </ol>
            </nav>
        </div>

        {{-- Filtres --}}
        <div class="col-12 mb-3">
            <div class="form-inline">
                <input id="search" class="form-control mr-2" placeholder="Recherche...">

                <select id="category" class="form-control mr-2">
                    <option value="">Toutes catégories</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->nom }}</option>
                    @endforeach
                </select>

                <select id="sort" class="form-control mr-2">
                    <option value="">Trier</option>
                    <option value="newest">Plus récents</option>
                    <option value="oldest">Plus anciens</option>
                    <option value="price_asc">Prix ↑</option>
                    <option value="price_desc">Prix ↓</option>
                    <option value="name_asc">Nom A→Z</option>
                    <option value="name_desc">Nom Z→A</option>
                </select>
            </div>
        </div>

        {{-- Container dynamique --}}
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

    function getFilters() {
        const filters = {};
        if (searchInput.value.trim()) filters.search = searchInput.value.trim();
        if (categorySelect.value) filters.category = categorySelect.value;
        if (sortSelect.value) filters.sort = sortSelect.value;
        return filters;
    }

    async function fetchProducts(pageUrl = null) {
        const filters = getFilters();
        const url = pageUrl || (baseUrl + '?' + new URLSearchParams(filters).toString());

        container.innerHTML = '<div class="text-center p-4">Chargement...</div>';

        try {
            const res = await fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
            if (!res.ok) throw new Error('Network response was not ok');
            const json = await res.json();
            container.innerHTML = json.html || '<div class="alert alert-info">Aucun résultat</div>';
        } catch (err) {
            container.innerHTML = '<div class="alert alert-danger">Erreur: ' + err.message + '</div>';
            console.error(err);
        }
    }

    // 🔹 Recherche instantanée avec debounce
    searchInput.addEventListener('input', function() {
        clearTimeout(debounceTimeout);
        debounceTimeout = setTimeout(() => fetchProducts(), 300);
    });

    // 🔹 Tri et catégorie instantané
    [sortSelect, categorySelect].forEach(el => el.addEventListener('change', () => fetchProducts()));

    // 🔹 Pagination AJAX
    container.addEventListener('click', function(e) {
        const a = e.target.closest('a.page-link');
        if (!a) return;
        e.preventDefault();
        const url = a.getAttribute('href');
        if (url) fetchProducts(url);
    });
});
</script>
@endsection

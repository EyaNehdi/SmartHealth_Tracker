{{-- resources/views/produits/partials/list.blade.php --}}
<div class="row g-4">
    @forelse($produits as $produit)
        <div class="col-md-6 col-xl-4">
            <div class="card product-card shadow-sm h-100 border-0">
                <!-- Image Container with Fixed Aspect Ratio -->
                <div class="product-image-wrapper position-relative overflow-hidden">
                    <img src="{{ $produit->image ? asset('storage/' . $produit->image) : Vite::asset('resources/assets/img/product_placeholder.png') }}"
                        class="card-img-top product-image" 
                        alt="{{ $produit->nom }}"
                        loading="lazy">
                    
                    <!-- Category Badge Overlay -->
                    <span class="badge bg-primary position-absolute top-0 start-0 m-3 px-3 py-2">
                        {{ $produit->categorie->nom ?? 'Catégorie' }}
                    </span>
                </div>

                <div class="card-body d-flex flex-column p-4">
                    <!-- Product Title -->
                    <h5 class="card-title product-title mb-3 fw-semibold">
                        {{ $produit->nom }}
                    </h5>
                    
                    <!-- Product Description -->
                    <p class="card-text text-muted mb-3 flex-grow-1 product-description">
                        {{ Str::limit($produit->description, 85) }}
                    </p>
                    
                    <!-- Price and Action Section -->
                    <div class="product-footer mt-auto pt-3 border-top">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="price-wrapper">
                                <span class="price-label text-muted small d-block">Prix</span>
                                <span class="price fw-bold fs-5 text-primary">
                                    {{ number_format($produit->prix, 2, ',', ' ') }} DT
                                </span>
                            </div>
                            <a href="{{ route('produits.show', $produit->id) }}" 
                               class="btn btn-primary btn-view px-4 py-2 rounded-pill">
                                <i class="fas fa-eye me-1"></i> Voir détails
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="empty-state text-center py-5">
                <i class="fas fa-box-open fa-4x text-muted mb-3"></i>
                <p class="text-muted fs-5">Aucun produit disponible pour le moment.</p>
            </div>
        </div>
    @endforelse
</div>

<!-- Pagination -->
<div class="mt-5 d-flex justify-content-center">
    {{ $produits->links() }}
</div>

<style>
/* Product Card Styles */
.product-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 12px;
    overflow: hidden;
}

.product-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15) !important;
}

/* Fixed Image Container */
.product-image-wrapper {
    position: relative;
    width: 100%;
    padding-top: 75%; /* 4:3 Aspect Ratio */
    background-color: #f8f9fa;
}

.product-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.product-card:hover .product-image {
    transform: scale(1.05);
}

/* Category Badge */
.product-image-wrapper .badge {
    font-size: 0.75rem;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    z-index: 10;
}

/* Product Title */
.product-title {
    font-size: 1.125rem;
    line-height: 1.4;
    color: #2c3e50;
    min-height: 3rem;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Product Description */
.product-description {
    font-size: 0.9rem;
    line-height: 1.6;
    min-height: 4.5rem;
}

/* Price Section */
.price-label {
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 0.25rem;
}

.price {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    line-height: 1;
}

/* Button Styles */
.btn-view {
    font-size: 0.875rem;
    font-weight: 600;
    transition: all 0.3s ease;
    white-space: nowrap;
}

.btn-view:hover {
    transform: translateX(3px);
}

/* Product Footer */
.product-footer {
    border-top-color: #e9ecef !important;
}

/* Empty State */
.empty-state i {
    opacity: 0.3;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .product-title {
        font-size: 1rem;
        min-height: 2.5rem;
    }
    
    .product-description {
        font-size: 0.85rem;
        min-height: 4rem;
    }
    
    .price {
        font-size: 1.125rem;
    }
    
    .btn-view {
        padding: 0.5rem 1rem !important;
        font-size: 0.8rem;
    }
}

/* Animation for cards loading */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.product-card {
    animation: fadeInUp 0.5s ease-out;
}

/* Stagger animation for multiple cards */
.col-md-6:nth-child(1) .product-card { animation-delay: 0.1s; }
.col-md-6:nth-child(2) .product-card { animation-delay: 0.2s; }
.col-md-6:nth-child(3) .product-card { animation-delay: 0.3s; }
.col-md-6:nth-child(4) .product-card { animation-delay: 0.4s; }
.col-md-6:nth-child(5) .product-card { animation-delay: 0.5s; }
.col-md-6:nth-child(6) .product-card { animation-delay: 0.6s; }
</style>
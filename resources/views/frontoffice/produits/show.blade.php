{{-- resources/views/produits/show.blade.php --}}
@extends('shared.layouts.frontoffice')

@section('page-title', 'Product Details - SmartHealth Tracker')

@section('content')
    <main class="main-area fix">

        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg"
            data-background="{{ Vite::asset('resources/assets/img/bg/sd_bg.html') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="breadcrumb__content text-center">
                            <h2 class="title">{{ $produit->nom }}</h2>
                            <nav class="breadcrumb">
                                <span><a href="{{ route('home') }}">Home</a></span>
                                <span class="breadcrumb-separator">|</span>
                                <span><a href="{{ route('produits.index') }}">Produits</a></span>
                                <span class="breadcrumb-separator">|</span>
                                <span>{{ $produit->nom }}</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- produit-details-area -->
        <section class="products-area section-py-150">
            <div class="container">
                <!-- Back Button -->
                <div class="row mb-4">
                    <div class="col-12">
                        <a href="{{ route('produits.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i>
                            Retour aux produits
                        </a>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <!-- Product Detail - Full Width -->
                    <div class="col-lg-10">
                        <div class="product-detail-wrapper">
                            <!-- Product Card -->
                            <div class="card product-detail-card shadow-sm border-0 mb-4">
                                <div class="row g-0">
                                    <!-- Product Image -->
                                    <div class="col-md-5">
                                        <div class="product-image-container position-relative">
                                            <img src="{{ $produit->image ? asset('storage/' . $produit->image) : Vite::asset('resources/assets/img/product_placeholder.png') }}"
                                                 class="product-detail-image w-100 h-100" 
                                                 alt="{{ $produit->nom }}"
                                                 id="mainImage">
                                            
                                            <!-- Category Badge -->
                                            <span class="badge bg-primary position-absolute top-0 end-0 m-3 px-3 py-2">
                                                {{ $produit->categorie->nom ?? 'Catégorie' }}
                                            </span>

                                            <!-- Zoom Icon -->
                                            <button class="btn btn-light btn-zoom position-absolute bottom-0 end-0 m-3" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#imageModal">
                                                <i class="fas fa-search-plus"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Product Info -->
                                    <div class="col-md-7">
                                        <div class="card-body d-flex flex-column h-100 p-4">
                                            <!-- Product Title -->
                                            <div class="mb-3">
                                                <h2 class="product-detail-title mb-2">{{ $produit->nom }}</h2>
                                                <div class="product-meta text-muted small">
                                                    <span class="me-3">
                                                        <i class="fas fa-tag me-1"></i>
                                                        Référence: #{{ str_pad($produit->id, 5, '0', STR_PAD_LEFT) }}
                                                    </span>
                                                </div>
                                            </div>

                                            <!-- Price Section -->
                                            <div class="price-section mb-4 p-3 bg-light rounded">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div>
                                                        <span class="price-label text-muted small d-block mb-1">Prix</span>
                                                        <span class="product-price fw-bold text-primary">
                                                            {{ number_format($produit->prix, 2, ',', ' ') }} <span class="fs-5">DT</span>
                                                        </span>
                                                    </div>
                                                    <div class="text-end">
                                                        <span class="badge bg-success px-3 py-2">
                                                            <i class="fas fa-check me-1"></i>En stock
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Description -->
                                            <div class="product-description mb-4 flex-grow-1">
                                                <h5 class="fw-semibold mb-3">
                                                    <i class="fas fa-align-left me-2"></i>Description
                                                </h5>
                                                <p class="text-muted">{{ $produit->description }}</p>
                                            </div>

                                            <!-- Product Info List -->
                                            <div class="product-info-list mb-4 p-3 bg-light rounded">
                                                <ul class="list-unstyled small mb-0">
                                                    <li class="mb-2 d-flex align-items-start">
                                                        <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                                                        <span>Livraison disponible</span>
                                                    </li>
                                                    <li class="mb-2 d-flex align-items-start">
                                                        <i class="fas fa-shield-alt text-primary me-2 mt-1"></i>
                                                        <span>Paiement sécurisé</span>
                                                    </li>
                                                    <li class="d-flex align-items-start">
                                                        <i class="fas fa-undo text-info me-2 mt-1"></i>
                                                        <span>Retour sous 14 jours</span>
                                                    </li>
                                                </ul>
                                            </div>

                                            <!-- Actions -->
                                            <div class="product-actions mt-auto">
                                                <div class="row g-2">
                                                    <div class="col-12 col-sm-6">
                                                      <button class="btn btn-primary btn-lg w-100 d-flex align-items-center justify-content-center add-to-panier-btn"
        data-id="{{ $produit->id }}" 
        data-nom="{{ $produit->nom }}" 
        data-prix="{{ $produit->prix }}" 
        data-image="{{ $produit->image ? asset('storage/' . $produit->image) : Vite::asset('resources/assets/img/product_placeholder.png') }}">
    <i class="fas fa-shopping-cart me-2"></i> Ajouter au panier
</button>


                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <a href="{{ route('produits.pdf', $produit->id) }}" 
                                                           class="btn btn-outline-danger btn-lg w-100 d-flex align-items-center justify-content-center">
                                                            <i class="fas fa-file-pdf me-2"></i>
                                                            Télécharger PDF
                                                        </a>
                                                    </div>
                                                </div>

                                                <!-- Secondary Actions -->
                                                <div class="row g-2 mt-2">
                                                    <div class="col-12">
                                                        <button class="btn btn-outline-secondary btn-lg w-100 d-flex align-items-center justify-content-center">
                                                            <i class="fas fa-heart me-2"></i>
                                                            Ajouter aux favoris
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Additional Information Tabs -->
                            <div class="card shadow-sm border-0">
                                <div class="card-body p-4">
                                    <ul class="nav nav-tabs border-0 mb-4" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active px-4" data-bs-toggle="tab" data-bs-target="#details">
                                                <i class="fas fa-info-circle me-2"></i>Détails
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link px-4" data-bs-toggle="tab" data-bs-target="#shipping">
                                                <i class="fas fa-shipping-fast me-2"></i>Livraison
                                            </button>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="details">
                                            <h5 class="mb-3">Informations détaillées</h5>
                                            <div class="table-responsive">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <td class="fw-semibold" style="width: 200px;">Catégorie</td>
                                                        <td>{{ $produit->categorie->nom ?? 'Non catégorisé' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-semibold">Prix</td>
                                                        <td>{{ number_format($produit->prix, 2, ',', ' ') }} DT</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-semibold">Référence</td>
                                                        <td>#{{ str_pad($produit->id, 5, '0', STR_PAD_LEFT) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-semibold">Disponibilité</td>
                                                        <td><span class="badge bg-success">En stock</span></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="shipping">
                                            <h5 class="mb-3">Informations de livraison</h5>
                                            <ul class="list-unstyled">
                                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Livraison standard: 3-5 jours ouvrables</li>
                                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Livraison express: 1-2 jours ouvrables</li>
                                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Livraison gratuite pour les commandes supérieures à 100 DT</li>
                                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Retrait en magasin disponible</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- produit-details-area-end -->
    </main>

    <!-- Image Zoom Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-0">
                    <img src="{{ $produit->image ? asset('storage/' . $produit->image) : Vite::asset('resources/assets/img/product_placeholder.png') }}"
                         class="w-100" alt="{{ $produit->nom }}">
                </div>
            </div>
        </div>
    </div>
<!-- Inclure SweetAlert2 dans ton layout ou ici -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const miniPanier = document.querySelector('.shop-mini-panier');
    const miniPanierItems = miniPanier.querySelector('.mini-panier-items');
    const miniPanierTotal = miniPanier.querySelector('.mini-panier-total');

    // Ajouter au panier
    document.querySelectorAll('.add-to-panier-btn').forEach(btn => {
        btn.addEventListener('click', function() {
    const data = {
        id: this.dataset.id, // garde le même type que côté PHP (string)
        nom: this.dataset.nom,
        prix: parseFloat(this.dataset.prix),
        image: this.dataset.image,
        _token: '{{ csrf_token() }}'
    };

    fetch('{{ route("panier.add") }}', {
        method: 'POST',
        headers: {'Content-Type':'application/json'},
        body: JSON.stringify(data)
    })
    .then(res => res.json())
    .then(panier => {
        renderPanier(panier);
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Produit ajouté au panier !',
            showConfirmButton: false,
            timer: 1200,
            toast: true
        });
    });
});

    });

    function renderPanier(panier) {
    miniPanierItems.innerHTML = '';
    let total = 0;

    panier.forEach(item => {
        const prix = parseFloat(item.prix); // <-- conversion en nombre
        total += prix * item.qty;
        const li = document.createElement('li');
        li.innerHTML = `
            <div style="display:flex; align-items:center; gap:10px;">
                <img src="${item.image}" width="50" style="border-radius:5px;">
                <div style="flex:1">
                    <span>${item.nom}</span><br>
                    <small>${prix.toFixed(2)} DT</small>  <!-- utilisation de prix converti -->
                    <div>
                        <button class="qty-decrease" data-id="${item.id}">-</button>
                        <span class="qty">${item.qty}</span>
                        <button class="qty-increase" data-id="${item.id}">+</button>
                    </div>
                </div>
                <button class="remove-item btn btn-sm btn-danger" data-id="${item.id}">&times;</button>
            </div>
        `;
        miniPanierItems.appendChild(li);
    });

    miniPanierTotal.textContent = total.toFixed(2);

    // Événements
    miniPanier.querySelectorAll('.qty-increase').forEach(btn => {
        btn.addEventListener('click', () => updateQty(btn.dataset.id, 1));
    });
    miniPanier.querySelectorAll('.qty-decrease').forEach(btn => {
        btn.addEventListener('click', () => updateQty(btn.dataset.id, -1));
    });
    miniPanier.querySelectorAll('.remove-item').forEach(btn => {
        btn.addEventListener('click', () => removeItem(btn.dataset.id));
    });
}


    function updateQty(id, change) {
        fetch('{{ route("panier.get") }}')
        .then(res => res.json())
        .then(panier => {
            const item = panier.find(i => i.id == id);
            if(!item) return;
            const data = { id: id, qty: Math.max(1, item.qty + change) };

            fetch('{{ route("panier.update") }}', {
                method:'POST',
                headers: {
                    'Content-Type':'application/json',
                    'Accept':'application/json',
                    'X-CSRF-TOKEN':'{{ csrf_token() }}'
                },
                body: JSON.stringify(data)
            })
            .then(res => res.json())
            .then(renderPanier);
        });
    }

    function removeItem(id) {
    const data = {id: id, _token: '{{ csrf_token() }}'};
    fetch('{{ route("panier.remove") }}', {
        method:'POST',
        headers:{'Content-Type':'application/json', 'Accept': 'application/json'},
        body: JSON.stringify(data)
    })
    .then(res => res.json())
    .then(panier => {
        renderPanier(panier);
        console.log("Panier après suppression :", panier); // debug
    });
}


    // Charger le panier au chargement
    fetch('{{ route("panier.get") }}')
    .then(res => res.json())
    .then(renderPanier);
});
</script>






    <style>
        /* Product Detail Card */
        .product-detail-card {
            border-radius: 12px;
            overflow: hidden;
        }

        /* Product Image */
        .product-image-container {
            background-color: #f8f9fa;
            min-height: 500px;
        }

        .product-detail-image {
            object-fit: cover;
            height: 100%;
        }

        .btn-zoom {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0.8;
            transition: all 0.3s ease;
        }

        .btn-zoom:hover {
            opacity: 1;
            transform: scale(1.1);
        }

        /* Product Title */
        .product-detail-title {
            font-size: 2rem;
            color: #2c3e50;
            font-weight: 600;
        }

        /* Price Section */
        .product-price {
            font-size: 2.25rem;
            letter-spacing: -0.5px;
        }

        /* Product Description */
        .product-description {
            line-height: 1.8;
        }

        /* Product Info List */
        .product-info-list {
            border: 1px solid #e0e0e0;
        }

        /* Action Buttons */
        .product-actions .btn {
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .product-actions .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.4);
        }

        .product-actions .btn-outline-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(220, 53, 69, 0.4);
        }

        .product-actions .btn-outline-secondary:hover {
            transform: translateY(-2px);
        }

        /* Tabs */
        .nav-tabs .nav-link {
            border: none;
            color: #6c757d;
            font-weight: 500;
            border-bottom: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .nav-tabs .nav-link:hover {
            color: #0d6efd;
            border-bottom-color: #0d6efd;
        }

        .nav-tabs .nav-link.active {
            color: #0d6efd;
            border-bottom-color: #0d6efd;
            background: transparent;
        }

        /* Badge Styles */
        .badge {
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .product-detail-title {
                font-size: 1.5rem;
            }

            .product-price {
                font-size: 1.75rem;
            }

            .product-image-container {
                min-height: 350px;
            }
        }

        @media (max-width: 576px) {
            .product-actions .btn {
                font-size: 0.9rem;
                padding: 0.625rem 1rem;
            }

            .product-image-container {
                min-height: 300px;
            }
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .product-detail-card {
            animation: fadeIn 0.5s ease-out;
        }

        /* Modal Image */
        .modal-body img {
            border-radius: 0 0 8px 8px;
        }

        /* Back Button */
        .btn-outline-secondary {
            transition: all 0.3s ease;
        }

        .btn-outline-secondary:hover {
            transform: translateX(-3px);
        }
    </style>
@endsection

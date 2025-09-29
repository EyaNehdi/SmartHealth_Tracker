{{-- resources/views/produits/index.blade.php --}}
<x-app-layout>
    <main class="main-area fix">

        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg"
            data-background="{{ Vite::asset('resources/assets/img/bg/sd_bg.html') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="breadcrumb__content text-center">
                            <h2 class="title">Magasin</h2>
                            <nav class="breadcrumb">
                                <span><a href="{{ route('home') }}">Home</a></span>
                                <span class="breadcrumb-separator">|</span>
                                <span>Produits</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section__bg-shape">
                <span class="bottom-shape"
                    data-background="{{ Vite::asset('resources/assets/img/bg/section_bg_shape02.svg') }}"></span>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- products-area -->
        <section class="products-area section-py-150">
            <div class="container">
                <div class="row">

                    <!-- Sidebar -->
                    <div class="col-lg-3 mb-4 mb-lg-0">
                        <aside class="sidebar">
                            <!-- Search -->
                            <div class="search-widget mb-4">
                                <div class="position-relative">
                                    <input type="text" id="searchInput" class="form-control form-control-lg ps-4"
                                        placeholder="Rechercher un produit...">
                                    <i class="fas fa-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                                </div>
                            </div>

                            <!-- Sort -->
                            <div class="sort-widget mb-4 p-3 bg-light rounded">
                                <h5 class="mb-3 fw-semibold">
                                    <i class="fas fa-sort-amount-down me-2"></i>Trier par
                                </h5>
                                <select id="sortSelect" class="form-select">
                                    <option value="newest">Plus récent</option>
                                    <option value="oldest">Plus ancien</option>
                                    <option value="price_asc">Prix croissant</option>
                                    <option value="price_desc">Prix décroissant</option>
                                    <option value="name_asc">Nom A-Z</option>
                                    <option value="name_desc">Nom Z-A</option>
                                </select>
                            </div>

                            <!-- Categories -->
                            <div class="categories-widget p-3 bg-light rounded">
                                <h5 class="mb-3 fw-semibold">
                                    <i class="fas fa-tags me-2"></i>Catégories
                                </h5>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2">
                                        <a href="#" class="category-link d-flex justify-content-between align-items-center text-decoration-none py-2 px-3 rounded transition"
                                           data-category="">
                                            <span>Toutes les catégories</span>
                                            <i class="fas fa-chevron-right small"></i>
                                        </a>
                                    </li>
                                    @foreach($categories as $category)
                                        <li class="mb-2">
                                            <a href="#" class="category-link d-flex justify-content-between align-items-center text-decoration-none py-2 px-3 rounded transition"
                                               data-category="{{ $category->id }}">
                                                <span>{{ $category->nom }}</span>
                                                <i class="fas fa-chevron-right small"></i>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                    </div>

                    <!-- Product Cards -->
                    <div class="col-lg-9">
                        <!-- Loading Spinner -->
                        <div id="loading-spinner" class="text-center py-5 d-none">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Chargement...</span>
                            </div>
                            <p class="mt-3 text-muted">Chargement des produits...</p>
                        </div>

                        <!-- Products Container -->
                        <div id="products-container">
                            @include('produits.partials.list')
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- products-area-end -->
    </main>

    {{-- JS AJAX intégré --}}
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const searchInput = document.getElementById("searchInput");
            const sortSelect = document.getElementById("sortSelect");
            const categoryLinks = document.querySelectorAll(".category-link");
            const productsContainer = document.getElementById("products-container");
            const loadingSpinner = document.getElementById("loading-spinner");

            let search = "";
            let sort = "newest";
            let category = "";
            let currentCategory = "";

            function showLoading() {
                loadingSpinner.classList.remove("d-none");
                productsContainer.style.opacity = "0.5";
            }

            function hideLoading() {
                loadingSpinner.classList.add("d-none");
                productsContainer.style.opacity = "1";
            }

            function updateActiveCategory() {
                categoryLinks.forEach(link => {
                    const linkCategory = link.getAttribute("data-category");
                    if (linkCategory === currentCategory) {
                        link.classList.add("active");
                    } else {
                        link.classList.remove("active");
                    }
                });
            }

            function fetchProducts(pageUrl = null) {
                showLoading();

                let url = pageUrl || "{{ route('produits.index') }}";
                let params = new URLSearchParams({
                    search,
                    sort,
                    category
                });

                fetch(url + "?" + params.toString(), {
                    headers: {
                        "X-Requested-With": "XMLHttpRequest"
                    }
                })
                .then(res => res.text())
                .then(html => {
                    productsContainer.innerHTML = html;
                    hideLoading();

                    // Scroll to top of products
                    productsContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });

                    // re-bind pagination links
                    productsContainer.querySelectorAll("a.page-link").forEach(link => {
                        link.addEventListener("click", e => {
                            e.preventDefault();
                            fetchProducts(link.getAttribute("href"));
                        });
                    });
                })
                .catch(err => {
                    console.error(err);
                    hideLoading();
                    productsContainer.innerHTML = '<div class="alert alert-danger">Une erreur est survenue lors du chargement des produits.</div>';
                });
            }

            // Search with debounce
            let searchTimeout;
            if (searchInput) {
                searchInput.addEventListener("input", e => {
                    clearTimeout(searchTimeout);
                    search = e.target.value;
                    searchTimeout = setTimeout(() => {
                        fetchProducts();
                    }, 500); // 500ms debounce
                });
            }

            // Sort
            if (sortSelect) {
                sortSelect.addEventListener("change", e => {
                    sort = e.target.value;
                    fetchProducts();
                });
            }

            // Categories
            if (categoryLinks) {
                categoryLinks.forEach(link => {
                    link.addEventListener("click", e => {
                        e.preventDefault();
                        category = link.getAttribute("data-category");
                        currentCategory = category;
                        updateActiveCategory();
                        fetchProducts();
                    });
                });
            }
        });
    </script>

    <style>
        /* Sidebar Styles */
        .sidebar {
            position: sticky;
            top: 20px;
        }

        .search-widget input {
            padding-left: 2.5rem !important;
        }

        .sort-widget,
        .categories-widget {
            border: 1px solid #e0e0e0;
        }

        /* Category Links */
        .category-link {
            color: #495057;
            transition: all 0.3s ease;
            background-color: transparent;
        }

        .category-link:hover {
            background-color: #e9ecef;
            color: #0d6efd;
            padding-left: 1rem !important;
        }

        .category-link.active {
            background-color: #0d6efd;
            color: white;
        }

        .category-link.active:hover {
            background-color: #0b5ed7;
        }

        .category-link i {
            transition: transform 0.3s ease;
        }

        .category-link:hover i {
            transform: translateX(3px);
        }

        /* Loading State */
        #products-container {
            transition: opacity 0.3s ease;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .sidebar {
                position: relative;
                top: 0;
            }
        }

        /* Smooth transitions */
        .transition {
            transition: all 0.3s ease;
        }

        /* Form Controls Enhancement */
        .form-control:focus,
        .form-select:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
        }
    </style>
</x-app-layout>
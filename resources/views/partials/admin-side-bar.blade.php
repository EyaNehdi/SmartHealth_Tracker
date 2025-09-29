<aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">
    <!-- Logo -->
    <div class="logo-sn ms-d-block-lg">
        <a class="pl-0 ml-0 text-center" href="#">
            <img src="{{ asset('assets2/img/medjestic-logo-216x62.png') }}" alt="logo">
        </a>
        <a href="#" class="text-center ms-logo-img-link">
            <img src="{{ asset('assets2/img/dashboard/doctor-3.jpg') }}" alt="profile">
        </a>
        <h5 class="text-center text-white mt-2">Dr.Samuel</h5>
        <h6 class="text-center text-white mb-3">Admin</h6>
    </div>

    <!-- Navigation -->
    <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">
        <!-- Store (Placeholder) -->
        <li class="menu-item">
            <a href="#" class="has-chevron disabled" tabindex="-1" aria-disabled="true">
                <span><i class="fas fa-store"></i>Store <small>(Coming Soon)</small></span>
            </a>
        </li>

        {{-- Food --}}
        @php
        $isFoodActive = request()->routeIs('admin.food.add') || request()->routeIs('admin.food.list');
        @endphp
        <li class="menu-item">
            <a href="#" class="has-chevron {{ $isFoodActive ? 'active' : '' }}"
                data-toggle="collapse" data-target="#food"
                aria-expanded="{{ $isFoodActive ? 'true' : 'false' }}"
                aria-controls="food">
                <span><i class="fas fa-utensils"></i>Food</span>
            </a>
            <ul id="food" class="collapse {{ $isFoodActive ? 'show' : '' }}" data-parent="#side-nav-accordion">
                <li>
                    <a href="{{ route('admin.food.add') }}" class="{{ request()->routeIs('admin.food.add') ? 'active' : '' }}">
                        <i class="fas fa-plus-circle"></i> Add Food Item
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.food.list') }}" class="{{ request()->routeIs('admin.food.list') ? 'active' : '' }}">
                        <i class="fas fa-list"></i> Food Items List
                    </a>
                </li>
            </ul>
        </li>

        {{-- Categories --}}
        @php
        $isCategoryActive = request()->routeIs('admin.categories.add') || request()->routeIs('admin.categories.list');
        @endphp
        <li class="menu-item">
            <a href="#" class="has-chevron {{ $isCategoryActive ? 'active' : '' }}"
                data-toggle="collapse" data-target="#categories"
                aria-expanded="{{ $isCategoryActive ? 'true' : 'false' }}"
                aria-controls="categories">
                <span><i class="fas fa-tags"></i>Categories</span>
            </a>
            <ul id="categories" class="collapse {{ $isCategoryActive ? 'show' : '' }}" data-parent="#side-nav-accordion">
                <li>
                    <a href="{{ route('admin.categories.add') }}" class="{{ request()->routeIs('admin.categories.add') ? 'active' : '' }}">
                        <i class="fas fa-plus-circle"></i> Add Category
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.categories.list') }}" class="{{ request()->routeIs('admin.categories.list') ? 'active' : '' }}">
                        <i class="fas fa-list"></i> Categories List
                    </a>
                </li>
            </ul>
        </li>

        {{-- Produits --}}
        @php
        $isProduitActive = request()->routeIs('admin.produits.add') || request()->routeIs('admin.produits.list');
        @endphp
        <li class="menu-item">
            <a href="#" class="has-chevron {{ $isProduitActive ? 'active' : '' }}"
                data-toggle="collapse" data-target="#produits"
                aria-expanded="{{ $isProduitActive ? 'true' : 'false' }}"
                aria-controls="produits">
                <span><i class="fas fa-box"></i>Produits</span>
            </a>
            <ul id="produits" class="collapse {{ $isProduitActive ? 'show' : '' }}" data-parent="#side-nav-accordion">
                <li>
                    <a href="{{ route('admin.produits.add') }}" class="{{ request()->routeIs('admin.produits.add') ? 'active' : '' }}">
                        <i class="fas fa-plus-circle"></i> Add Produit
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.produits.list') }}" class="{{ request()->routeIs('admin.produits.list') ? 'active' : '' }}">
                        <i class="fas fa-list"></i> Produits List
                    </a>
                </li>
            </ul>
        </li>

        <!-- Event (Placeholder) -->
        <li class="menu-item">
            <a href="#" class="has-chevron disabled" tabindex="-1" aria-disabled="true">
                <span><i class="fas fa-calendar-alt"></i>Event <small>(Coming Soon)</small></span>
            </a>
        </li>

        <!-- Activité (Placeholder) -->
        <li class="menu-item">
            <a href="#" class="has-chevron disabled" tabindex="-1" aria-disabled="true">
                <span><i class="fas fa-running"></i>Activité <small>(Coming Soon)</small></span>
            </a>
        </li>

        <!-- Objectif (Placeholder) -->
        <li class="menu-item">
            <a href="#" class="has-chevron disabled" tabindex="-1" aria-disabled="true">
                <span><i class="fas fa-bullseye"></i>Objectif <small>(Coming Soon)</small></span>
            </a>
        </li>
    </ul>
</aside>

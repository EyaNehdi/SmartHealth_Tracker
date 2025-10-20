<!-- Enhanced Sidebar with Better Visual Hierarchy -->
<aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">
    <!-- Logo Section -->
    <div class="logo-sn ms-d-block-lg">
        <a class="pl-0 ml-0 text-center" href="{{ route('admin.adminPanel') }}">
            <img src="{{ Vite::asset('resources/assets/img/logo/logo02.svg') }}" alt="logo" class="sidebar-logo">
        </a>
        <div class="user-profile-section">


            <h2 class="text-center text-white mb-3 user-role">Admin</h2>
        </div>
    </div>

    <!-- Navigation Menu -->
    <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="{{ route('admin.adminPanel') }}" class="menu-link {{ request()->routeIs('admin.adminPanel') ? 'active' : '' }}">
                <span class="menu-icon">
                    <i class="material-icons">dashboard</i>
                </span>
                <span class="menu-text">Dashboard</span>
            </a>
        </li>

        <!-- Store (Placeholder) -->
        <li class="menu-item disabled">
            <a href="#" class="menu-link disabled" tabindex="-1" aria-disabled="true">
                <span class="menu-icon">
                    <i class="fas fa-store"></i>
                </span>
                <span class="menu-text">Store</span>
                <span class="menu-badge">Coming Soon</span>
            </a>
        </li>

        <!-- Food Management -->
        @php
        $isFoodActive = request()->routeIs('admin.food.add') || request()->routeIs('admin.food.list') || request()->routeIs('admin.food.edit') || request()->routeIs('admin.food.show');
        @endphp
        <li class="menu-item has-submenu">
            <a href="#" class="menu-link {{ $isFoodActive ? 'active' : '' }} has-chevron"
                data-toggle="collapse" data-target="#food"
                aria-expanded="{{ $isFoodActive ? 'true' : 'false' }}"
                aria-controls="food">
                <span class="menu-icon">
                    <i class="fas fa-utensils"></i>
                </span>
                <span class="menu-text">Food Management</span>
                <span class="menu-chevron">
                    <i class="fas fa-chevron-down"></i>
                </span>
            </a>
            <ul id="food" class="submenu collapse {{ $isFoodActive ? 'show' : '' }}" data-parent="#side-nav-accordion">
                <li class="submenu-item">
                    <a href="{{ route('admin.food.list') }}" class="submenu-link {{ request()->routeIs('admin.food.list') ? 'active' : '' }}">
                        <span class="submenu-icon">
                            <i class="fas fa-list"></i>
                        </span>
                        <span class="submenu-text">Food Items</span>
                    </a>
                </li>
                <li class="submenu-item">
                    <a href="{{ route('admin.food.add') }}" class="submenu-link {{ request()->routeIs('admin.food.add') ? 'active' : '' }}">
                        <span class="submenu-icon">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="submenu-text">Add Food Item</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Meals Management -->
        @php
        $isMealActive = request()->routeIs('admin.meals.list') || request()->routeIs('admin.meals.create') || request()->routeIs('admin.meals.edit') || request()->routeIs('admin.meals.show');
        @endphp
        <li class="menu-item has-submenu">
            <a href="#" class="menu-link {{ $isMealActive ? 'active' : '' }} has-chevron"
                data-toggle="collapse" data-target="#meals"
                aria-expanded="{{ $isMealActive ? 'true' : 'false' }}"
                aria-controls="meals">
                <span class="menu-icon">
                    <i class="fas fa-clipboard-list"></i>
                </span>
                <span class="menu-text">Meals Management</span>
                <span class="menu-chevron">
                    <i class="fas fa-chevron-down"></i>
                </span>
            </a>
            <ul id="meals" class="submenu collapse {{ $isMealActive ? 'show' : '' }}" data-parent="#side-nav-accordion">
                <li class="submenu-item">
                    <a href="{{ route('admin.meals.list') }}" class="submenu-link {{ request()->routeIs('admin.meals.list') ? 'active' : '' }}">
                        <span class="submenu-icon">
                            <i class="fas fa-list"></i>
                        </span>
                        <span class="submenu-text">Meals List</span>
                    </a>
                </li>
                <li class="submenu-item">
                    <a href="{{ route('admin.meals.create') }}" class="submenu-link {{ request()->routeIs('admin.meals.create') ? 'active' : '' }}">
                        <span class="submenu-icon">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="submenu-text">Create Meal</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Challenges Management -->
        @php
        $isChallengeActive = request()->routeIs('admin.challenges.index') || request()->routeIs('admin.challenges.create');
        @endphp
        <li class="menu-item has-submenu">
            <a href="#" class="menu-link {{ $isChallengeActive ? 'active' : '' }} has-chevron"
                data-toggle="collapse" data-target="#challenges"
                aria-expanded="{{ $isChallengeActive ? 'true' : 'false' }}"
                aria-controls="challenges">
                <span class="menu-icon">
                    <i class="fas fa-trophy"></i>
                </span>
                <span class="menu-text">Challenges Management</span>
                <span class="menu-chevron">
                    <i class="fas fa-chevron-down"></i>
                </span>
            </a>
            <ul id="challenges" class="submenu collapse {{ $isChallengeActive ? 'show' : '' }}" data-parent="#side-nav-accordion">
                <li class="submenu-item">
                    <a href="{{ route('admin.challenges.index') }}" class="submenu-link {{ request()->routeIs('admin.challenges.index') ? 'active' : '' }}">
                        <span class="submenu-icon">
                            <i class="fas fa-list"></i>
                        </span>
                        <span class="submenu-text">Challenges List</span>
                    </a>
                </li>
                <li class="submenu-item">
                    <a href="{{ route('admin.backoffice.challenges.add') }}" class="submenu-link {{ request()->routeIs('admin.challenges.create') ? 'active' : '' }}">
                        <span class="submenu-icon">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="submenu-text">Create Challenge</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Categories Management -->
        @php
        $isCategoryActive = request()->routeIs('admin.categories.*');
        @endphp
        <li class="menu-item has-submenu">
            <a href="#" class="menu-link {{ $isCategoryActive ? 'active' : '' }} has-chevron"
                data-toggle="collapse" data-target="#categories"
                aria-expanded="{{ $isCategoryActive ? 'true' : 'false' }}"
                aria-controls="categories">
                <span class="menu-icon">
                    <i class="fas fa-tags"></i>
                </span>
                <span class="menu-text">Categories</span>
                <span class="menu-chevron">
                    <i class="fas fa-chevron-down"></i>
                </span>
            </a>
            <ul id="categories" class="submenu collapse {{ $isCategoryActive ? 'show' : '' }}" data-parent="#side-nav-accordion">
                <li class="submenu-item">
                    <a href="{{ route('admin.categories.list') }}" class="submenu-link {{ request()->routeIs('admin.categories.list') ? 'active' : '' }}">
                        <span class="submenu-icon">
                            <i class="fas fa-list"></i>
                        </span>
                        <span class="submenu-text">Categories List</span>
                    </a>
                </li>
                <li class="submenu-item">
                    <a href="{{ route('admin.categories.add') }}" class="submenu-link {{ request()->routeIs('admin.categories.add') ? 'active' : '' }}">
                        <span class="submenu-icon">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="submenu-text">Add Category</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Equipment Management -->
        @php
        $isEquipmentActive = request()->routeIs('admin.equipments.*');
        @endphp
        <li class="menu-item has-submenu">
            <a href="#" class="menu-link {{ $isEquipmentActive ? 'active' : '' }} has-chevron"
                data-toggle="collapse" data-target="#equipments"
                aria-expanded="{{ $isEquipmentActive ? 'true' : 'false' }}"
                aria-controls="equipments">
                <span class="menu-icon">
                    <i class="fas fa-dumbbell"></i>
                </span>
                <span class="menu-text">Equipment</span>
                <span class="menu-chevron">
                    <i class="fas fa-chevron-down"></i>
                </span>
            </a>
            <ul id="equipments" class="submenu collapse {{ $isEquipmentActive ? 'show' : '' }}" data-parent="#side-nav-accordion">
                <li class="submenu-item">
                    <a href="{{ route('admin.equipments.list') }}" class="submenu-link {{ request()->routeIs('admin.equipments.list') ? 'active' : '' }}">
                        <span class="submenu-icon">
                            <i class="fas fa-list"></i>
                        </span>
                        <span class="submenu-text">Equipment List</span>
                    </a>
                </li>
                <li class="submenu-item">
                    <a href="{{ route('admin.equipments.create') }}" class="submenu-link {{ request()->routeIs('admin.equipments.create') ? 'active' : '' }}">
                        <span class="submenu-icon">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="submenu-text">Add Equipment</span>
                    </a>
                </li>
            </ul>
        </li>



          {{-- Activities Management --}}
@php
$isActivityActive = request()->routeIs('admin.activities.*');
@endphp

<li class="menu-item has-submenu">
    <a href="#" class="menu-link {{ $isActivityActive ? 'active' : '' }} has-chevron"
        data-toggle="collapse" data-target="#activities"
        aria-expanded="{{ $isActivityActive ? 'true' : 'false' }}"
        aria-controls="activities">
        <span class="menu-icon">
            <i class="fas fa-running"></i>
        </span>
        <span class="menu-text">Activities</span>
        <span class="menu-chevron">
            <i class="fas fa-chevron-down"></i>
        </span>
    </a>
    <ul id="activities" class="submenu collapse {{ $isActivityActive ? 'show' : '' }}" data-parent="#side-nav-accordion">
        <li class="submenu-item">
            <a href="{{ route('admin.activities.index') }}" class="submenu-link {{ request()->routeIs('admin.activities.index') ? 'active' : '' }}">
                <span class="submenu-icon">
                    <i class="fas fa-list"></i>
                </span>
                <span class="submenu-text">Activities List</span>
            </a>
        </li>
        <li class="submenu-item">
            <a href="{{ route('admin.activities.create') }}" class="submenu-link {{ request()->routeIs('admin.activities.create') ? 'active' : '' }}">
                <span class="submenu-icon">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="submenu-text">Add Activity</span>
            </a>
        </li>
    </ul>
</li>

        {{-- Events Management --}}
        @php
        $isEventActive = request()->routeIs('admin.events.*');
        $isTypeEventActive = request()->routeIs('admin.type_events.*');
        @endphp
        <li class="menu-item has-submenu">
            <a href="#" class="menu-link {{ $isEventActive || $isTypeEventActive ? 'active' : '' }} has-chevron"
                data-toggle="collapse" data-target="#events"
                aria-expanded="{{ $isEventActive || $isTypeEventActive ? 'true' : 'false' }}"
                aria-controls="events">
                <span class="menu-icon">
                    <i class="fas fa-calendar-alt"></i>
                </span>
                <span class="menu-text">Events</span>
                <span class="menu-chevron">
                    <i class="fas fa-chevron-down"></i>
                </span>
            </a>
            <ul id="events" class="submenu collapse {{ $isEventActive || $isTypeEventActive ? 'show' : '' }}" data-parent="#side-nav-accordion">
                <li class="submenu-item">
                    <a href="{{ route('admin.events.index') }}" class="submenu-link {{ request()->routeIs('admin.events.index') ? 'active' : '' }}">
                        <span class="submenu-icon">
                            <i class="fas fa-list"></i>
                        </span>
                        <span class="submenu-text">Events List</span>
                    </a>
                </li>
                <li class="submenu-item">
                    <a href="{{ route('admin.events.create') }}" class="submenu-link {{ request()->routeIs('admin.events.create') ? 'active' : '' }}">
                        <span class="submenu-icon">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="submenu-text">Create Event</span>
                    </a>
                </li>
                <li class="submenu-item">
                    <a href="{{ route('admin.type_events.index') }}" class="submenu-link {{ request()->routeIs('admin.type_events.*') ? 'active' : '' }}">
                        <span class="submenu-icon">
                            <i class="fas fa-cog"></i>
                        </span>
                        <span class="submenu-text">Event Types</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Products Management -->
        @php
        $isProductActive = request()->routeIs('admin.produits.*');
        @endphp
        <li class="menu-item has-submenu">
            <a href="#" class="menu-link {{ $isProductActive ? 'active' : '' }} has-chevron"
                data-toggle="collapse" data-target="#products"
                aria-expanded="{{ $isProductActive ? 'true' : 'false' }}"
                aria-controls="products">
                <span class="menu-icon">
                    <i class="fas fa-box"></i>
                </span>
                <span class="menu-text">Products</span>
                <span class="menu-chevron">
                    <i class="fas fa-chevron-down"></i>
                </span>
            </a>
            <ul id="products" class="submenu collapse {{ $isProductActive ? 'show' : '' }}" data-parent="#side-nav-accordion">
                <li class="submenu-item">
                    <a href="{{ route('admin.produits.list') }}" class="submenu-link {{ request()->routeIs('admin.produits.list') ? 'active' : '' }}">
                        <span class="submenu-icon">
                            <i class="fas fa-list"></i>
                        </span>
                        <span class="submenu-text">Products List</span>
                    </a>
                </li>
                <li class="submenu-item">
                    <a href="{{ route('admin.produits.add') }}" class="submenu-link {{ request()->routeIs('admin.produits.add') ? 'active' : '' }}">
                        <span class="submenu-icon">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="submenu-text">Add Product</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Divider -->
        <li class="menu-divider"></li>

        <!-- Logout -->
        <li class="menu-item logout-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" class="menu-link logout-link">
                    <span class="menu-icon">
                        <i class="material-icons">exit_to_app</i>
                    </span>
                    <span class="menu-text">Logout</span>
                </a>
            </form>
        </li>
    </ul>
</aside>

<!-- Simplified Sidebar Styles -->
<style>
    /* Sidebar Logo */
    .sidebar-logo {
        max-width: 160px;
        height: auto;
        margin-bottom: 1rem;
        filter: brightness(0) invert(1);
    }

    /* User Profile Section */
    .user-profile-section {
        padding: 1rem 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        margin-bottom: 1rem;
    }

    .user-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        border: 2px solid rgba(255, 255, 255, 0.2);
        transition: var(--transition);
    }

    .user-name {
        font-size: 0.9rem;
        font-weight: 600;
        margin: 0.5rem 0 0.25rem 0;
    }

    .user-role {
        font-size: 0.8rem;
        opacity: 0.8;
        margin: 0;
    }

    /* Menu Divider */
    .menu-divider {
        height: 1px;
        background-color: rgba(255, 255, 255, 0.1);
        margin: 1rem 1.5rem;
        list-style: none;
    }

    /* Logout Item */
    .logout-item {
        margin-top: auto;
        padding-top: 1rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .logout-link {
        color: rgba(255, 255, 255, 0.7);
    }

    .logout-link:hover {
        background-color: rgba(255, 0, 0, 0.1);
        color: #ff6b6b;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .side-nav {
            width: 280px;
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }

        .side-nav.show {
            transform: translateX(0);
        }
    }
</style>

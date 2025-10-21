<!-- Enhanced Sidebar with Clean White Design -->
<aside id="ms-side-nav" class="sh-sidebar ms-aside-scrollable ms-aside-left">
    <!-- Logo Section -->
    <div class="sh-sidebar__brand">
        <a class="text-center d-block" href="{{ route('admin.adminPanel') }}">
            <h2 class="sh-sidebar__brand-title">SmartHealth</h2>
        </a>
        <div class="sh-sidebar__toggle">
            <button id="sh-sidebar-toggle" class="sh-btn" type="button" title="Toggle sidebar">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <div class="sh-user">
            <a href="#" class="d-inline-block">
                <img src="{{ asset('assets2/img/dashboard/doctor-3.jpg') }}" alt="profile" class="sh-user__avatar">
            </a>
            <h5 class="sh-user__name">{{ Auth::user()->name ?? 'Admin' }}</h5>
            <h6 class="sh-user__role">Admin</h6>
        </div>
    </div>

    <!-- Navigation Menu -->
    <ul class="sh-menu" id="side-nav-accordion">
        <!-- Dashboard -->
        <li class="sh-menu__item">
            <a href="{{ route('admin.adminPanel') }}" data-page="admin.adminPanel" class="sh-link {{ request()->routeIs('admin.adminPanel') ? 'is-active' : '' }}">
                <span class="sh-link__icon"><i class="material-icons">dashboard</i></span>
                <span class="sh-link__text">Dashboard</span>
            </a>
        </li>

        <!-- Store (Disabled) -->
        <li class="sh-menu__item">
            <a href="#" class="sh-link disabled" tabindex="-1" aria-disabled="true" data-page="store.disabled">
                <span class="sh-link__icon"><i class="fas fa-store"></i></span>
                <span class="sh-link__text">Store</span>
            </a>
        </li>

        {{-- Food & Meals Management --}}
        @php
        $isFoodMealsActive = request()->routeIs('admin.food-meals.*') ||
        request()->routeIs('admin.food.*') ||
        request()->routeIs('admin.meals.*') ||
        request()->routeIs('admin.meal-plans.*');
        @endphp

        <li class="sh-menu__item">
            <a href="#" class="sh-link {{ $isFoodMealsActive ? 'is-active' : '' }}" data-target="#food-meals" aria-expanded="{{ $isFoodMealsActive ? 'true' : 'false' }}">
                <span class="sh-link__icon"><i class="fas fa-utensils"></i></span>
                <span class="sh-link__text">Food & Meals</span>
                <span class="sh-link__chev"><i class="fas fa-chevron-down"></i></span>
            </a>
            <ul id="food-meals" class="sh-submenu {{ $isFoodMealsActive ? 'is-open' : '' }}">
                <li>
                    <a href="{{ route('admin.food.list') }}" data-page="admin.food.list" class="sh-submenu__link {{ request()->routeIs('admin.food.list') ? 'is-active' : '' }}">
                        <span class="sh-link__icon"><i class="fas fa-apple-alt"></i></span>
                        <span class="sh-link__text">Food Items</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.meals.list') }}" data-page="admin.meals.list" class="sh-submenu__link {{ request()->routeIs('admin.meals.list') ? 'is-active' : '' }}">
                        <span class="sh-link__icon"><i class="fas fa-clipboard-list"></i></span>
                        <span class="sh-link__text">Meals List</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.meal-plans.list') }}" data-page="admin.meal-plans.list" class="sh-submenu__link {{ request()->routeIs('admin.meal-plans.list') ? 'is-active' : '' }}">
                        <span class="sh-link__icon"><i class="fas fa-calendar-alt"></i></span>
                        <span class="sh-link__text">Meal Plans</span>
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

        <li class="sh-menu__item">
            <a href="#" class="sh-link {{ $isCategoryActive ? 'is-active' : '' }}" data-target="#categories" aria-expanded="{{ $isCategoryActive ? 'true' : 'false' }}">
                <span class="sh-link__icon"><i class="fas fa-tags"></i></span>
                <span class="sh-link__text">Categories</span>
                <span class="sh-link__chev"><i class="fas fa-chevron-down"></i></span>
            </a>
            <ul id="categories" class="sh-submenu {{ $isCategoryActive ? 'is-open' : '' }}">
                <li>
                    <a href="{{ route('admin.categories.list') }}" data-page="admin.categories.list" class="sh-submenu__link {{ request()->routeIs('admin.categories.list') ? 'is-active' : '' }}">
                        <span class="sh-link__icon"><i class="fas fa-list"></i></span>
                        <span class="sh-link__text">Categories List</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.categories.add') }}" data-page="admin.categories.add" class="sh-submenu__link {{ request()->routeIs('admin.categories.add') ? 'is-active' : '' }}">
                        <span class="sh-link__icon"><i class="fas fa-plus"></i></span>
                        <span class="sh-link__text">Add Category</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Equipment Management -->
        @php
        $isEquipmentActive = request()->routeIs('admin.equipments.*');
        @endphp

        <li class="sh-menu__item">
            <a href="#" class="sh-link {{ $isEquipmentActive ? 'is-active' : '' }}" data-target="#equipments" aria-expanded="{{ $isEquipmentActive ? 'true' : 'false' }}">
                <span class="sh-link__icon"><i class="fas fa-dumbbell"></i></span>
                <span class="sh-link__text">Equipment</span>
                <span class="sh-link__chev"><i class="fas fa-chevron-down"></i></span>
            </a>
            <ul id="equipments" class="sh-submenu {{ $isEquipmentActive ? 'is-open' : '' }}">
                <li>
                    <a href="{{ route('admin.equipments.list') }}" data-page="admin.equipments.list" class="sh-submenu__link {{ request()->routeIs('admin.equipments.list') ? 'is-active' : '' }}">
                        <span class="sh-link__icon"><i class="fas fa-list"></i></span>
                        <span class="sh-link__text">Equipment List</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.equipments.create') }}" data-page="admin.equipments.create" class="sh-submenu__link {{ request()->routeIs('admin.equipments.create') ? 'is-active' : '' }}">
                        <span class="sh-link__icon"><i class="fas fa-plus"></i></span>
                        <span class="sh-link__text">Add Equipment</span>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Events Management --}}
        @php
        $isEventActive = request()->routeIs('admin.events.*');
        $isTypeEventActive = request()->routeIs('admin.type_events.*');
        @endphp

        <li class="sh-menu__item">
            <a href="#" class="sh-link {{ $isEventActive || $isTypeEventActive ? 'is-active' : '' }}" data-target="#events" aria-expanded="{{ $isEventActive || $isTypeEventActive ? 'true' : 'false' }}">
                <span class="sh-link__icon"><i class="fas fa-calendar-alt"></i></span>
                <span class="sh-link__text">Events</span>
                <span class="sh-link__chev"><i class="fas fa-chevron-down"></i></span>
            </a>
            <ul id="events" class="sh-submenu {{ $isEventActive || $isTypeEventActive ? 'is-open' : '' }}">
                <li>
                    <a href="{{ route('admin.events.index') }}" data-page="admin.events.index" class="sh-submenu__link {{ request()->routeIs('admin.events.index') ? 'is-active' : '' }}">
                        <span class="sh-link__icon"><i class="fas fa-list"></i></span>
                        <span class="sh-link__text">Events List</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.events.create') }}" data-page="admin.events.create" class="sh-submenu__link {{ request()->routeIs('admin.events.create') ? 'is-active' : '' }}">
                        <span class="sh-link__icon"><i class="fas fa-plus"></i></span>
                        <span class="sh-link__text">Create Event</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.type_events.index') }}" data-page="admin.type_events.index" class="sh-submenu__link {{ request()->routeIs('admin.type_events.*') ? 'is-active' : '' }}">
                        <span class="sh-link__icon"><i class="fas fa-cog"></i></span>
                        <span class="sh-link__text">Event Types</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Products Management -->
        @php
        $isProductActive = request()->routeIs('admin.produits.*');
        @endphp

        <li class="sh-menu__item">
            <a href="#" class="sh-link {{ $isProductActive ? 'is-active' : '' }}" data-target="#products" aria-expanded="{{ $isProductActive ? 'true' : 'false' }}">
                <span class="sh-link__icon"><i class="fas fa-box"></i></span>
                <span class="sh-link__text">Products</span>
                <span class="sh-link__chev"><i class="fas fa-chevron-down"></i></span>
            </a>
            <ul id="products" class="sh-submenu {{ $isProductActive ? 'is-open' : '' }}">
                <li>
                    <a href="{{ route('admin.produits.list') }}" class="sh-submenu__link {{ request()->routeIs('admin.produits.list') ? 'is-active' : '' }}">
                        <span class="sh-link__icon"><i class="fas fa-list"></i></span>
                        <span class="sh-link__text">Products List</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.produits.add') }}" class="sh-submenu__link {{ request()->routeIs('admin.produits.add') ? 'is-active' : '' }}">
                        <span class="sh-link__icon"><i class="fas fa-plus"></i></span>
                        <span class="sh-link__text">Add Product</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Divider -->
        <li class="sh-divider"></li>

        <!-- Logout -->
        <li class="sh-menu__item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" class="sh-link">
                    <span class="sh-link__icon"><i class="material-icons">exit_to_app</i></span>
                    <span class="sh-link__text">Logout</span>
                </a>
            </form>
        </li>
    </ul>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('ms-side-nav');
    const toggleBtn = document.getElementById('sidebar-collapse-toggle');
    const submenuTriggers = sidebar.querySelectorAll('.menu-link[data-toggle="collapse"]');
    const submenuLists = sidebar.querySelectorAll('.submenu');

    // Toggle collapse/expand of sidebar
    if (toggleBtn) {
        toggleBtn.addEventListener('click', function() {
            document.body.classList.toggle('compact-sidebar');
            const isCompact = document.body.classList.contains('compact-sidebar');
            localStorage.setItem('compactSidebar', isCompact);
        });
    }

    // On load, apply saved compact state
    const savedCompact = localStorage.getItem('compactSidebar') === 'true';
    if (savedCompact) {
        document.body.classList.add('compact-sidebar');
    }

    // Submenu toggle with one-open-at-a-time behavior (CSS handles visibility)
    submenuTriggers.forEach((trigger) => {
        trigger.addEventListener('click', function(e) {
            e.preventDefault();
            // If compact, expand to full first
            if (document.body.classList.contains('compact-sidebar')) {
                document.body.classList.remove('compact-sidebar');
            }
            const targetSel = this.getAttribute('data-target');
            const target = document.querySelector(targetSel);
            const isOpen = target.classList.contains('show');

            // Close all others
            sidebar.querySelectorAll('.submenu.show').forEach(ul => {
                if (ul !== target) {
                    ul.classList.remove('show');
                    const otherLink = sidebar.querySelector(`.menu-link[data-target="#${ul.id}"]`);
                    if (otherLink) otherLink.setAttribute('aria-expanded', 'false');
                }
            });

            // Toggle current
            if (isOpen) {
                target.classList.remove('show');
                this.setAttribute('aria-expanded', 'false');
                this.classList.remove('active');
            } else {
                target.classList.add('show');
                this.setAttribute('aria-expanded', 'true');
                this.classList.add('active');
            }
        });
    });

    // Active state highlighting by data-page (server already adds classes, this enhances parent)
    const activeSubmenuLink = sidebar.querySelector('.submenu-link.active');
    if (activeSubmenuLink) {
        const submenu = activeSubmenuLink.closest('.submenu');
        if (submenu && !submenu.classList.contains('show')) submenu.classList.add('show');
        const parentTrigger = sidebar.querySelector(`.menu-link[data-target="#${submenu.id}"]`);
        if (parentTrigger) {
            parentTrigger.classList.add('active');
            parentTrigger.setAttribute('aria-expanded', 'true');
        }
    }

    // Clicking icons when collapsed expands and opens submenu
    sidebar.addEventListener('click', function(e) {
        if (document.body.classList.contains('compact-sidebar')) {
            const iconBtn = e.target.closest('.menu-icon');
            const parentItem = e.target.closest('.menu-item');
            if (iconBtn && parentItem) {
                document.body.classList.remove('compact-sidebar');
                const trigger = parentItem.querySelector('.menu-link[data-toggle="collapse"]');
                if (trigger) setTimeout(() => trigger.click(), 0);
            }
        }
    });
});
</script>
</aside>

<!-- Sidebar styles moved to resources/css/sidebar.css -->
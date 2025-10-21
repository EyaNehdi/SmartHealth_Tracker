<!-- Enhanced Header with Quick Actions Search -->
<header class="ms-header ms-header-primary">
    <div class="ms-header-container">
        <div class="ms-header-left">
            <div class="ms-logo">
                <a class="ms-logo-link" href="{{ route('admin.adminPanel') }}">
                    <span class="ms-logo-text">SmartHealth</span>
                </a>
            </div>
            <div class="ms-toggler ms-toggler-left ms-toggler-primary" data-toggle="slideDown" data-target="#ms-side-nav">
                <span class="ms-toggler-bar bg-primary"></span>
                <span class="ms-toggler-bar bg-primary"></span>
                <span class="ms-toggler-bar bg-primary"></span>
            </div>
        </div>

        <div class="ms-header-right">
            <div class="ms-header-menu">
                <div class="ms-header-menu-left">
                    <div class="ms-header-search">
                        <form class="ms-header-search-form" id="search-form">
                            <input class="ms-header-search-input"
                                   type="text"
                                   placeholder="Quick actions (e.g., 'create meal', 'view food')..."
                                   name="q"
                                   id="search-input"
                                   autocomplete="off">
                            <button class="ms-header-search-btn" type="button">
                                <i class="flaticon-magnifying-glass"></i>
                            </button>
                            <div class="search-dropdown" id="search-dropdown">
                                <!-- Search results will be populated here -->
                            </div>
                        </form>
                    </div>
                </div>

                <div class="ms-header-menu-right">
                    <div class="ms-header-user">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="ms-user-img ms-img-round" src="{{ asset('assets2/img/dashboard/doctor-3.jpg') }}" alt="people">
                                <span class="ms-user-name">{{ Auth::user()->name ?? 'Admin' }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right user-dropdown">
                                <li class="ms-dropdown-list">
                                    <a class="media p-2" href="{{ route('profile.edit') }}">
                                        <i class="fas fa-user"></i>
                                        <div class="media-body">
                                            <span>Profile</span>
                                        </div>
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="media p-2" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                            <i class="fas fa-sign-out-alt"></i>
                                            <div class="media-body">
                                                <span>Logout</span>
                                            </div>
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

    <!-- Interactive Settings Panel -->
    <div class="ms-settings-toggle" id="settings-toggle">
        <i class="flaticon-gear"></i>
    </div>

    <!-- Enhanced Search Styles -->
    <style>
        .search-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            margin-top: 8px;
            max-height: 400px;
            overflow-y: auto;
            display: none;
            z-index: 1000;
        }

        .search-dropdown.show {
            display: block;
        }

        .search-result {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            cursor: pointer;
            transition: background-color 0.2s ease;
            border-bottom: 1px solid #f0f0f0;
        }

        .search-result:last-child {
            border-bottom: none;
        }

        .search-result:hover,
        .search-result.active {
            background-color: #f8f9fa;
        }

        .search-result.no-hover {
            cursor: default;
            background-color: white !important;
        }

        .search-result-icon {
            font-size: 24px;
            margin-right: 12px;
            min-width: 30px;
            text-align: center;
        }

        .search-result-content {
            flex: 1;
        }

        .search-result-title {
            font-weight: 600;
            color: #2c3e50;
            font-size: 14px;
            margin-bottom: 2px;
        }

        .search-result-description {
            font-size: 12px;
            color: #7f8c8d;
        }

        .ms-header-search {
            position: relative;
        }

        .ms-header-search-form {
            position: relative;
            width: 100%;
        }

        /* Scrollbar styling for search dropdown */
        .search-dropdown::-webkit-scrollbar {
            width: 6px;
        }

        .search-dropdown::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .search-dropdown::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }

        .search-dropdown::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>

    <!-- Settings Modal -->
    <div class="settings-modal-overlay" id="settings-modal-overlay">
        <div class="settings-modal" id="settings-modal">
            <div class="settings-modal-header">
                <h4 class="settings-modal-title">
                    <i class="fas fa-cog"></i>
                    Settings
                </h4>
                <button class="settings-modal-close" id="settings-modal-close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="settings-modal-body">
                <div class="settings-section">
                    <h5 class="settings-section-title">Theme Settings</h5>
                    <div class="settings-item">
                        <div class="settings-item-content">
                            <span class="settings-item-label">Dark Mode</span>
                            <span class="settings-item-description">Switch between light and dark themes</span>
                        </div>
                        <label class="ms-switch">
                            <input type="checkbox" id="dark-mode-toggle">
                            <span class="ms-switch-slider round"></span>
                        </label>
                    </div>
                </div>

                <div class="settings-section">
                    <h5 class="settings-section-title">Layout Settings</h5>
                    <div class="settings-item">
                        <div class="settings-item-content">
                            <span class="settings-item-label">Compact Sidebar</span>
                            <span class="settings-item-description">Reduce sidebar width for more content space</span>
                        </div>
                        <label class="ms-switch">
                            <input type="checkbox" id="compact-sidebar-toggle">
                            <span class="ms-switch-slider round"></span>
                        </label>
                    </div>
                </div>

                <div class="settings-section">
                    <h5 class="settings-section-title">Keyboard Shortcuts</h5>
                    <div class="shortcuts-list">
                        <div class="shortcut-item">
                            <kbd>Ctrl</kbd> + <kbd>K</kbd>
                            <span>Focus Search</span>
                        </div>
                        <div class="shortcut-item">
                            <kbd>Esc</kbd>
                            <span>Close Panels</span>
                        </div>
                        <div class="shortcut-item">
                            <kbd>Ctrl</kbd> + <kbd>D</kbd>
                            <span>Toggle Dark Mode</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Overlays -->
<div class="ms-aside-overlay ms-overlay-left ms-toggler" data-target="#ms-side-nav" data-toggle="slideLeft"></div>
<div class="ms-aside-overlay ms-overlay-right ms-toggler" data-target="#ms-recent-activity" data-toggle="slideRight"></div>
<div class="sidebar-overlay" id="sidebar-overlay"></div>

<!-- Search and Settings JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Quick Actions Search functionality
    const searchInput = document.getElementById('search-input');
    const searchDropdown = document.getElementById('search-dropdown');
    const searchForm = document.getElementById('search-form');
    let searchTimeout;

    // Quick action commands for the app
    const quickActions = [
        // Food Management
        { title: 'Add Food', keywords: ['add food', 'create food', 'new food'], url: '{{ route("admin.food.add") }}', icon: '🍎', category: 'Food' },
        { title: 'View Food Items', keywords: ['view food', 'list food', 'food items', 'see food'], url: '{{ route("admin.food.list") }}', icon: '🍎', category: 'Food' },
        
        // Meals Management
        { title: 'Create Meal', keywords: ['create meal', 'add meal', 'new meal'], url: '{{ route("admin.meals.create") }}', icon: '🍽️', category: 'Meals' },
        { title: 'View Meals', keywords: ['view meals', 'list meals', 'see meals', 'meals'], url: '{{ route("admin.meals.list") }}', icon: '🍽️', category: 'Meals' },
        
        // Meal Plans Management
        { title: 'Create Meal Plan', keywords: ['create meal plan', 'add meal plan', 'new meal plan'], url: '{{ route("admin.meal-plans.create") }}', icon: '📅', category: 'Meal Plans' },
        { title: 'View Meal Plans', keywords: ['view meal plans', 'list meal plans', 'meal plans'], url: '{{ route("admin.meal-plans.list") }}', icon: '📅', category: 'Meal Plans' },
        
        // Categories Management
        { title: 'Add Category', keywords: ['add category', 'create category', 'new category'], url: '{{ route("admin.categories.add") }}', icon: '📂', category: 'Categories' },
        { title: 'View Categories', keywords: ['view categories', 'list categories', 'categories'], url: '{{ route("admin.categories.list") }}', icon: '📂', category: 'Categories' },
        
        // Equipment Management
        { title: 'Add Equipment', keywords: ['add equipment', 'create equipment', 'new equipment'], url: '{{ route("admin.equipments.create") }}', icon: '🏋️', category: 'Equipment' },
        { title: 'View Equipment', keywords: ['view equipment', 'list equipment', 'equipment'], url: '{{ route("admin.equipments.list") }}', icon: '🏋️', category: 'Equipment' },
        
        // Products Management
        { title: 'Add Product', keywords: ['add product', 'create product', 'new product'], url: '{{ route("admin.produits.add") }}', icon: '🛍️', category: 'Products' },
        { title: 'View Products', keywords: ['view products', 'list products', 'products'], url: '{{ route("admin.produits.list") }}', icon: '🛍️', category: 'Products' },
        
        // Events Management
        { title: 'Create Event', keywords: ['create event', 'add event', 'new event'], url: '{{ route("admin.events.create") }}', icon: '📆', category: 'Events' },
        { title: 'View Events', keywords: ['view events', 'list events', 'events'], url: '{{ route("admin.events.index") }}', icon: '📆', category: 'Events' },
        
        // Challenges Management
        { title: 'Add Challenge', keywords: ['add challenge', 'create challenge', 'new challenge'], url: '{{ route("admin.backoffice.challenges.add") }}', icon: '🎯', category: 'Challenges' },
        { title: 'View Challenges', keywords: ['view challenges', 'list challenges', 'challenges'], url: '{{ route("admin.challenges.index") }}', icon: '🎯', category: 'Challenges' },
        
        // Activities Management
        { title: 'Create Activity', keywords: ['create activity', 'add activity', 'new activity'], url: '{{ route("admin.activities.create") }}', icon: '⚡', category: 'Activities' },
        { title: 'View Activities', keywords: ['view activities', 'list activities', 'activities'], url: '{{ route("admin.activities.index") }}', icon: '⚡', category: 'Activities' },
        
        // Dashboard
        { title: 'Dashboard', keywords: ['dashboard', 'home', 'main'], url: '{{ route("admin.adminPanel") }}', icon: '🏠', category: 'Navigation' }
    ];

    // Search input handler
    searchInput.addEventListener('input', function() {
        const query = this.value.toLowerCase().trim();

        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            if (query.length > 1) {
                performSearch(query);
            } else {
                hideSearchDropdown();
            }
        }, 200);
    });

    // Focus search on input
    searchInput.addEventListener('focus', function() {
        if (this.value.trim().length > 1) {
            performSearch(this.value.toLowerCase().trim());
        }
    });

    // Hide dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (!searchForm.contains(e.target)) {
            hideSearchDropdown();
        }
    });

    // Keyboard navigation
    searchInput.addEventListener('keydown', function(e) {
        const results = searchDropdown.querySelectorAll('.search-result');
        const activeResult = searchDropdown.querySelector('.search-result.active');

        if (e.key === 'ArrowDown') {
            e.preventDefault();
            if (activeResult) {
                activeResult.classList.remove('active');
                const next = activeResult.nextElementSibling;
                if (next && next.classList.contains('search-result')) {
                    next.classList.add('active');
                    next.scrollIntoView({ block: 'nearest' });
                } else {
                    results[0]?.classList.add('active');
                    results[0]?.scrollIntoView({ block: 'nearest' });
                }
            } else {
                results[0]?.classList.add('active');
            }
        } else if (e.key === 'ArrowUp') {
            e.preventDefault();
            if (activeResult) {
                activeResult.classList.remove('active');
                const prev = activeResult.previousElementSibling;
                if (prev && prev.classList.contains('search-result')) {
                    prev.classList.add('active');
                    prev.scrollIntoView({ block: 'nearest' });
                } else {
                    results[results.length - 1]?.classList.add('active');
                    results[results.length - 1]?.scrollIntoView({ block: 'nearest' });
                }
            } else {
                results[results.length - 1]?.classList.add('active');
            }
        } else if (e.key === 'Enter') {
            e.preventDefault();
            if (activeResult) {
                activeResult.click();
            }
        } else if (e.key === 'Escape') {
            hideSearchDropdown();
            searchInput.blur();
        }
    });

    function performSearch(query) {
        const results = quickActions.filter(action => 
            action.keywords.some(keyword => keyword.includes(query)) ||
            action.title.toLowerCase().includes(query) ||
            action.category.toLowerCase().includes(query)
        );

        displaySearchResults(results);
    }

    function displaySearchResults(results) {
        if (results.length === 0) {
            searchDropdown.innerHTML = '<div class="search-result no-hover"><div class="search-result-title">No actions found</div><div class="search-result-description">Try searching for "create meal", "view food", etc.</div></div>';
        } else {
            searchDropdown.innerHTML = results.map(result => `
                <div class="search-result" data-url="${result.url}">
                    <div class="search-result-icon">${result.icon}</div>
                    <div class="search-result-content">
                        <div class="search-result-title">${result.title}</div>
                        <div class="search-result-description">${result.category}</div>
                    </div>
                </div>
            `).join('');

            // Add click handlers
            searchDropdown.querySelectorAll('.search-result').forEach(result => {
                result.addEventListener('click', function() {
                    const url = this.dataset.url;
                    if (url) {
                        window.location.href = url;
                    }
                });
                
                // Add hover effect
                result.addEventListener('mouseenter', function() {
                    searchDropdown.querySelectorAll('.search-result').forEach(r => r.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        }

        searchDropdown.classList.add('show');
    }

    function hideSearchDropdown() {
        searchDropdown.classList.remove('show');
        searchDropdown.querySelectorAll('.search-result').forEach(r => r.classList.remove('active'));
    }

    // Settings modal functionality
    const settingsToggle = document.getElementById('settings-toggle');
    const settingsModal = document.getElementById('settings-modal');
    const settingsModalOverlay = document.getElementById('settings-modal-overlay');
    const settingsModalClose = document.getElementById('settings-modal-close');
    const darkModeToggle = document.getElementById('dark-mode-toggle');
    const compactSidebarToggle = document.getElementById('compact-sidebar-toggle');

    // Load saved preferences
    loadPreferences();

    settingsToggle.addEventListener('click', function() {
        settingsModalOverlay.classList.add('show');
        document.body.style.overflow = 'hidden';
    });

    settingsModalClose.addEventListener('click', function() {
        settingsModalOverlay.classList.remove('show');
        document.body.style.overflow = '';
    });

    settingsModalOverlay.addEventListener('click', function(e) {
        if (e.target === settingsModalOverlay) {
            settingsModalOverlay.classList.remove('show');
            document.body.style.overflow = '';
        }
    });

    // Dark mode toggle
    darkModeToggle.addEventListener('change', function() {
        const isDark = this.checked;
        document.documentElement.setAttribute('data-theme', isDark ? 'dark' : 'light');
        localStorage.setItem('darkMode', isDark);
    });

    // Compact sidebar toggle
    compactSidebarToggle.addEventListener('change', function() {
        const isCompact = this.checked;
        document.body.classList.toggle('compact-sidebar', isCompact);
        localStorage.setItem('compactSidebar', isCompact);
    });

    function loadPreferences() {
        // Load dark mode preference
        const darkMode = localStorage.getItem('darkMode') === 'true';
        darkModeToggle.checked = darkMode;
        document.documentElement.setAttribute('data-theme', darkMode ? 'dark' : 'light');

        // Load compact sidebar preference
        const compactSidebar = localStorage.getItem('compactSidebar') === 'true';
        compactSidebarToggle.checked = compactSidebar;
        if (compactSidebar) {
            document.body.classList.add('compact-sidebar');
        }
    }

    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        // Ctrl + K to focus search
        if (e.ctrlKey && e.key === 'k') {
            e.preventDefault();
            searchInput.focus();
        }

        // Ctrl + D to toggle dark mode
        if (e.ctrlKey && e.key === 'd') {
            e.preventDefault();
            darkModeToggle.checked = !darkModeToggle.checked;
            darkModeToggle.dispatchEvent(new Event('change'));
        }

        // Escape to close panels
        if (e.key === 'Escape') {
            settingsModalOverlay.classList.remove('show');
            document.body.style.overflow = '';
            hideSearchDropdown();
        }
    });

    // Mobile sidebar toggle
    const sidebarToggle = document.querySelector('.ms-toggler-left');
    const sidebar = document.getElementById('ms-side-nav');
    const sidebarOverlay = document.getElementById('sidebar-overlay');

    if (sidebarToggle && sidebar) {
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('show');
            sidebarOverlay.classList.toggle('show');
        });

        sidebarOverlay.addEventListener('click', function() {
            sidebar.classList.remove('show');
            sidebarOverlay.classList.remove('show');
        });
    }

    // collapse button handler lives in sidebar partial
});
</script>

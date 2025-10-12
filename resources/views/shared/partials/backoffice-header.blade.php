<!-- Enhanced Header with Functional Search -->
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
                                   placeholder="Search..." 
                                   name="q" 
                                   id="search-input"
                                   autocomplete="off">
                            <button class="ms-header-search-btn" type="submit">
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
    // Search functionality
    const searchInput = document.getElementById('search-input');
    const searchDropdown = document.getElementById('search-dropdown');
    const searchForm = document.getElementById('search-form');
    let searchTimeout;

    // Mock search data - replace with actual API calls
    const searchData = {
        'food': [
            { title: 'Grilled Chicken', description: 'High protein food item', url: '{{ route("admin.food.list") }}' },
            { title: 'Salmon Fillet', description: 'Omega-3 rich fish', url: '{{ route("admin.food.list") }}' },
            { title: 'Quinoa Bowl', description: 'Complete protein grain', url: '{{ route("admin.food.list") }}' }
        ],
        'meal': [
            { title: 'Breakfast Bowl', description: 'Healthy morning meal', url: '{{ route("admin.meals.list") }}' },
            { title: 'Lunch Salad', description: 'Light afternoon meal', url: '{{ route("admin.meals.list") }}' },
            { title: 'Dinner Plate', description: 'Evening meal', url: '{{ route("admin.meals.list") }}' }
        ],
        'category': [
            { title: 'Protein Foods', description: 'High protein category', url: '{{ route("admin.categories.list") }}' },
            { title: 'Vegetables', description: 'Fresh vegetables', url: '{{ route("admin.categories.list") }}' },
            { title: 'Grains', description: 'Whole grain foods', url: '{{ route("admin.categories.list") }}' }
        ],
        'equipment': [
            { title: 'Treadmill', description: 'Cardio equipment', url: '{{ route("admin.equipments.list") }}' },
            { title: 'Dumbbells', description: 'Strength training', url: '{{ route("admin.equipments.list") }}' }
        ]
    };

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
        }, 300);
    });

    // Search form submission
    searchForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const query = searchInput.value.trim();
        if (query) {
            // Navigate to search results page or perform action
            window.location.href = `{{ route('admin.adminPanel') }}?search=${encodeURIComponent(query)}`;
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
                if (next) {
                    next.classList.add('active');
                } else {
                    results[0]?.classList.add('active');
                }
            } else {
                results[0]?.classList.add('active');
            }
        } else if (e.key === 'ArrowUp') {
            e.preventDefault();
            if (activeResult) {
                activeResult.classList.remove('active');
                const prev = activeResult.previousElementSibling;
                if (prev) {
                    prev.classList.add('active');
                } else {
                    results[results.length - 1]?.classList.add('active');
                }
            } else {
                results[results.length - 1]?.classList.add('active');
            }
        } else if (e.key === 'Enter') {
            e.preventDefault();
            if (activeResult) {
                activeResult.click();
            } else {
                searchForm.dispatchEvent(new Event('submit'));
            }
        } else if (e.key === 'Escape') {
            hideSearchDropdown();
            searchInput.blur();
        }
    });

    function performSearch(query) {
        const results = [];
        
        // Search through all data
        Object.keys(searchData).forEach(category => {
            searchData[category].forEach(item => {
                if (item.title.toLowerCase().includes(query) || 
                    item.description.toLowerCase().includes(query)) {
                    results.push({ ...item, category });
                }
            });
        });

        displaySearchResults(results);
    }

    function displaySearchResults(results) {
        if (results.length === 0) {
            searchDropdown.innerHTML = '<div class="search-result"><div class="search-result-title">No results found</div></div>';
        } else {
            searchDropdown.innerHTML = results.map(result => `
                <div class="search-result" data-url="${result.url}">
                    <div class="search-result-title">${result.title}</div>
                    <div class="search-result-description">${result.description} • ${result.category}</div>
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
            settingsPanel.classList.remove('show');
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
});
</script>

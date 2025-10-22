@extends('shared.layouts.frontoffice')

@section('page-title', 'Nos Repas - SmartHealth Tracker')

@section('content')
    <main class="main-area fix">

        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg"
            data-background="{{ Vite::asset('resources/assets/img/bg/sd_bg.html') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="breadcrumb__content text-center">
                            <h2 class="title">Nos Repas</h2>
                            <nav class="breadcrumb">
                                <span><a href="{{ route('home') }}">Home</a></span>
                                <span class="breadcrumb-separator">|</span>
                                <span>Repas</span>
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

        <!-- meals-area -->
        <section class="meals-area section-py-150">
            <div class="container">
                <div class="row">

                    <!-- Sidebar -->
                    <div class="col-lg-3 mb-4 mb-lg-0">
                        <aside class="sidebar">
                            @auth
                            <!-- Create Meal Button -->
                            <div class="create-widget mb-4">
                                <a href="{{ route('meals.front.create') }}" class="btn btn-success w-100 btn-lg">
                                    <i class="fas fa-plus-circle me-2"></i>Créer un repas
                                </a>
                            </div>
                            @endauth

                            <!-- Search -->
                            <div class="search-widget mb-4">
                                <form method="GET" action="{{ route('meals.front.index') }}">
                                    <div class="position-relative">
                                        <input type="text" name="search" class="form-control form-control-lg ps-4"
                                            placeholder="Rechercher un repas..." value="{{ request('search') }}">
                                        <i class="fas fa-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                                    </div>
                                </form>
                            </div>

                            @auth
                            <!-- Filter by Ownership/Saved -->
                            <div class="filter-widget mb-4">
                                <h5 class="widget-title">Mes repas</h5>
                                <form method="GET" action="{{ route('meals.front.index') }}" id="ownership-form">
                                    <input type="hidden" name="search" value="{{ request('search') }}">
                                    <input type="hidden" name="calories_min" value="{{ request('calories_min') }}">
                                    <input type="hidden" name="calories_max" value="{{ request('calories_max') }}">
                                    @foreach(request('meal_times', []) as $mt)
                                        <input type="hidden" name="meal_times[]" value="{{ $mt }}">
                                    @endforeach
                                    
                                    <div class="form-check mb-2">
                                        <input class="form-check-input filter-radio" type="radio" 
                                               name="filter" value="" id="filter_all"
                                               {{ !request('filter') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="filter_all">
                                            Tous les repas
                                        </label>
                                    </div>
                                    
                                    <div class="form-check mb-2">
                                        <input class="form-check-input filter-radio" type="radio" 
                                               name="filter" value="owned" id="filter_owned"
                                               {{ request('filter') === 'owned' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="filter_owned">
                                            <i class="fas fa-user me-1"></i>Mes créations
                                        </label>
                                    </div>
                                    
                                    <div class="form-check mb-2">
                                        <input class="form-check-input filter-radio" type="radio" 
                                               name="filter" value="saved" id="filter_saved"
                                               {{ request('filter') === 'saved' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="filter_saved">
                                            <i class="fas fa-heart me-1"></i>Mes favoris
                                        </label>
                                    </div>
                                </form>
                            </div>
                            @endauth

                            <!-- Filter by Meal Time -->
                            <div class="filter-widget mb-4">
                                <h5 class="widget-title">Moment du repas</h5>
                                <form method="GET" action="{{ route('meals.front.index') }}" id="meal-time-form">
                                    <input type="hidden" name="search" value="{{ request('search') }}">
                                    <input type="hidden" name="calories_min" value="{{ request('calories_min') }}">
                                    <input type="hidden" name="calories_max" value="{{ request('calories_max') }}">
                                    
                                    @php
                                        $mealTimes = ['breakfast' => 'Petit-déjeuner', 'lunch' => 'Déjeuner', 'dinner' => 'Dîner', 'snack' => 'Collation'];
                                        $selectedMealTimes = request('meal_times', []);
                                    @endphp
                                    
                                    @foreach($mealTimes as $value => $label)
                                        <div class="form-check mb-2">
                                            <input class="form-check-input meal-time-checkbox" type="checkbox" 
                                                   name="meal_times[]" value="{{ $value }}" 
                                                   id="meal_time_{{ $value }}"
                                                   {{ in_array($value, $selectedMealTimes) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="meal_time_{{ $value }}">
                                                {{ $label }}
                                            </label>
                                        </div>
                                    @endforeach
                                </form>
                            </div>

                            <!-- Filter by Calories -->
                            <div class="filter-widget mb-4">
                                <h5 class="widget-title">Calories</h5>
                                <form method="GET" action="{{ route('meals.front.index') }}" id="calories-form">
                                    <input type="hidden" name="search" value="{{ request('search') }}">
                                    @foreach($selectedMealTimes as $mt)
                                        <input type="hidden" name="meal_times[]" value="{{ $mt }}">
                                    @endforeach
                                    
                                    <div class="row g-2 mb-2">
                                        <div class="col-6">
                                            <input type="number" name="calories_min" class="form-control" 
                                                   placeholder="Min" value="{{ request('calories_min') }}" min="0">
                                        </div>
                                        <div class="col-6">
                                            <input type="number" name="calories_max" class="form-control" 
                                                   placeholder="Max" value="{{ request('calories_max') }}" min="0">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-primary w-100">Appliquer</button>
                                </form>
                            </div>

                            <!-- Clear Filters -->
                            <div class="text-center">
                                <a href="{{ route('meals.front.index') }}" class="btn btn-outline-secondary w-100">
                                    <i class="fas fa-times-circle me-1"></i> Réinitialiser les filtres
                                </a>
                            </div>
                        </aside>
                    </div>

                    <!-- Meals Grid -->
                    <div class="col-lg-9">
                        <div id="meals-grid">
                            @include('frontoffice.meals._grid', ['meals' => $meals])
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- meals-area-end -->

    </main>
@endsection

@push('frontoffice-scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    let searchTimeout;
    const gridContainer = document.getElementById('meals-grid');
    const searchInput = document.querySelector('input[name="search"]');
    const mealTimeCheckboxes = document.querySelectorAll('.meal-time-checkbox');
    const caloriesMinInput = document.querySelector('input[name="calories_min"]');
    const caloriesMaxInput = document.querySelector('input[name="calories_max"]');
    const caloriesForm = document.getElementById('calories-form');
    const filterRadios = document.querySelectorAll('.filter-radio');
    
    // Function to get selected meal times
    function getSelectedMealTimes() {
        return Array.from(mealTimeCheckboxes)
            .filter(cb => cb.checked)
            .map(cb => cb.value);
    }

    // Function to get selected filter
    function getSelectedFilter() {
        const selected = Array.from(filterRadios).find(r => r.checked);
        return selected ? selected.value : '';
    }
    
    // Function to load meals with filters
    function loadMeals() {
        const params = new URLSearchParams();
        
        if (searchInput.value) {
            params.append('search', searchInput.value);
        }
        
        const selectedMealTimes = getSelectedMealTimes();
        selectedMealTimes.forEach(mt => {
            params.append('meal_times[]', mt);
        });
        
        if (caloriesMinInput.value) {
            params.append('calories_min', caloriesMinInput.value);
        }
        if (caloriesMaxInput.value) {
            params.append('calories_max', caloriesMaxInput.value);
        }

        const filterValue = getSelectedFilter();
        if (filterValue) {
            params.append('filter', filterValue);
        }
        
        // Show loading state
        gridContainer.style.opacity = '0.5';
        
        fetch(`{{ route('meals.front.index') }}?${params.toString()}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            gridContainer.innerHTML = html;
            gridContainer.style.opacity = '1';
            
            // Update URL without page reload
            const newUrl = params.toString() ? 
                `{{ route('meals.front.index') }}?${params.toString()}` : 
                `{{ route('meals.front.index') }}`;
            window.history.pushState({}, '', newUrl);
            
            // Re-attach handlers
            attachPaginationHandlers();
            attachSaveHandlers();
        })
        .catch(error => {
            console.error('Error loading meals:', error);
            gridContainer.style.opacity = '1';
        });
    }
    
    // Real-time search with debouncing
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(loadMeals, 500);
    });
    
    // Auto-submit when meal time checkbox is changed
    mealTimeCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            loadMeals();
        });
    });

    // Auto-submit when filter radio changes
    filterRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            loadMeals();
        });
    });
    
    // Calories filter form submission
    caloriesForm.addEventListener('submit', function(e) {
        e.preventDefault();
        loadMeals();
    });
    
    // Save/Unsave functionality
    function attachSaveHandlers() {
        const saveButtons = gridContainer.querySelectorAll('.meal-save-btn');
        
        saveButtons.forEach(btn => {
            // Remove any existing listeners by cloning
            const newBtn = btn.cloneNode(true);
            btn.parentNode.replaceChild(newBtn, btn);
            
            newBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                const mealId = this.dataset.mealId;
                const isSaved = this.classList.contains('saved');
                const url = isSaved ? 
                    `/repas/${mealId}/retirer` : 
                    `/repas/${mealId}/sauvegarder`;
                const method = isSaved ? 'DELETE' : 'POST';
                
                fetch(url, {
                    method: method,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Toggle saved class
                        this.classList.toggle('saved');
                        
                        // Update button text and icon
                        const icon = this.querySelector('i');
                        if (this.classList.contains('saved')) {
                            icon.className = 'fas fa-check me-1';
                            this.innerHTML = '<i class="fas fa-check me-1"></i>Sauvegardé';
                        } else {
                            icon.className = 'fas fa-utensils me-1';
                            this.innerHTML = '<i class="fas fa-utensils me-1"></i>Commençons à cuisiner';
                        }
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    }
    
    // Handle pagination clicks
    function attachPaginationHandlers() {
        const paginationLinks = gridContainer.querySelectorAll('.pagination a');
        paginationLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const url = new URL(this.href);
                const page = url.searchParams.get('page');
                
                const params = new URLSearchParams();
                if (searchInput.value) params.append('search', searchInput.value);
                
                const selectedMealTimes = getSelectedMealTimes();
                selectedMealTimes.forEach(mt => params.append('meal_times[]', mt));
                
                if (caloriesMinInput.value) params.append('calories_min', caloriesMinInput.value);
                if (caloriesMaxInput.value) params.append('calories_max', caloriesMaxInput.value);

                const filterValue = getSelectedFilter();
                if (filterValue) params.append('filter', filterValue);

                if (page) params.append('page', page);
                
                gridContainer.style.opacity = '0.5';
                
                fetch(`{{ route('meals.front.index') }}?${params.toString()}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(html => {
                    gridContainer.innerHTML = html;
                    gridContainer.style.opacity = '1';
                    window.scrollTo({ top: gridContainer.offsetTop - 100, behavior: 'smooth' });
                    attachPaginationHandlers();
                    attachSaveHandlers();
                })
                .catch(error => {
                    console.error('Error:', error);
                    gridContainer.style.opacity = '1';
                });
            });
        });
    }
    
    // Initial attachments
    attachPaginationHandlers();
    attachSaveHandlers();
});
</script>
@endpush

@push('frontoffice-styles')
<!-- Load dedicated save button styles -->
@vite('resources/css/frontoffice-save-buttons.css')

<style>
#meals-grid {
    transition: opacity 0.3s ease;
}

.meal-card {
    border: 1px solid #e0e0e0;
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.3s ease;
    background: white;
    min-height: 100%;
}

.meal-card:hover {
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transform: translateY(-5px);
}

/* Equal height cards */
.row.g-4 {
    display: flex;
    flex-wrap: wrap;
}

.row.g-4 > [class*='col-'] {
    display: flex;
}

.meal-card-image {
    position: relative;
    width: 100%;
    height: 220px;
    overflow: hidden;
}

.meal-card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: relative;
    z-index: 1;
}

.meal-time-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    padding: 8px 14px;
    font-size: 12px;
    font-weight: 600;
    text-transform: capitalize;
    z-index: 10;
    backdrop-filter: blur(8px);
    border: 2px solid rgba(255, 255, 255, 0.3);
}

.meal-card-title {
    font-size: 17px;
    min-height: 48px; /* Ensure consistent height for 2 lines max */
}

.meal-card-title a {
    color: #2c3e50;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s ease;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}

.meal-card-title a:hover {
    color: #3498db;
}

.meal-card-description {
    font-size: 14px;
    line-height: 1.5;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    max-height: 42px; /* 1.5 line-height * 14px font-size * 2 lines */
    min-height: 42px; /* Keep consistent height */
}

.meal-card-stats {
    padding-top: 10px;
    border-top: 1px solid #f0f0f0;
}

.stat-item i {
    font-size: 18px;
    margin-bottom: 5px;
}

.stat-item small {
    font-size: 12px;
    color: #666;
}

.sidebar {
    background: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.widget-title {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 15px;
    color: #2c3e50;
}

.filter-widget {
    padding-bottom: 15px;
    border-bottom: 1px solid #f0f0f0;
}

.filter-widget:last-of-type {
    border-bottom: none;
}

/* Create button styling */
.create-widget .btn {
    background: linear-gradient(135deg, #27ae60 0%, #229954 100%);
    border: none;
    font-weight: 600;
    box-shadow: 0 4px 15px rgba(39, 174, 96, 0.3);
}

.create-widget .btn:hover {
    background: linear-gradient(135deg, #229954 0%, #27ae60 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(39, 174, 96, 0.4);
}

/* Badge styling */
.badge-sm {
    font-size: 11px;
    padding: 4px 8px;
}

/* Action buttons styling */
.meal-card-actions .btn-sm {
    padding: 6px 12px;
    font-size: 13px;
}

/* Better spacing */
.gap-2 {
    gap: 0.5rem !important;
}

/* Condensed card body */
.meal-card-body {
    padding: 1rem !important;
}

.meal-card-stats {
    margin-bottom: 1rem !important;
}

/* Compact stats */
.stat-item small {
    font-size: 11px;
}

.stat-item i {
    font-size: 16px;
}
</style>
@endpush


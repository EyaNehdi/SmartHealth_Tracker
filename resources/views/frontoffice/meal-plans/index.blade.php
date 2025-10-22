@extends('shared.layouts.frontoffice')

@section('page-title', 'Plans de Repas - SmartHealth Tracker')

@section('content')
    <main class="main-area fix">

        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg"
            data-background="{{ Vite::asset('resources/assets/img/bg/sd_bg.html') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="breadcrumb__content text-center">
                            <h2 class="title">Plans de Repas</h2>
                            <nav class="breadcrumb">
                                <span><a href="{{ route('home') }}">Home</a></span>
                                <span class="breadcrumb-separator">|</span>
                                <span>Plans de Repas</span>
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

        <!-- meal-plans-area -->
        <section class="meal-plans-area section-py-150">
            <div class="container">
                <div class="row">

                    <!-- Sidebar -->
                    <div class="col-lg-3 mb-4 mb-lg-0">
                        <aside class="sidebar">
                            @auth
                            <!-- Create Meal Plan Button -->
                            <div class="create-widget mb-4">
                                <a href="{{ route('meal-plans.front.create') }}" class="btn btn-success w-100 btn-lg">
                                    <i class="fas fa-plus-circle me-2"></i>Créer un plan de repas
                                </a>
                            </div>
                            @endauth

                            <!-- Search -->
                            <div class="search-widget mb-4">
                                <form method="GET" action="{{ route('meal-plans.front.index') }}">
                                    <div class="position-relative">
                                        <input type="text" name="search" class="form-control form-control-lg ps-4"
                                            placeholder="Rechercher un plan..." value="{{ request('search') }}">
                                        <i class="fas fa-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                                    </div>
                                </form>
                            </div>

                            @auth
                            <!-- Filter by Ownership/Saved -->
                            <div class="filter-widget mb-4">
                                <h5 class="widget-title">Mes plans</h5>
                                <form method="GET" action="{{ route('meal-plans.front.index') }}" id="ownership-plan-form">
                                    <input type="hidden" name="search" value="{{ request('search') }}">
                                    <input type="hidden" name="min_days" value="{{ request('min_days') }}">
                                    <input type="hidden" name="max_days" value="{{ request('max_days') }}">
                                    
                                    <div class="form-check mb-2">
                                        <input class="form-check-input filter-plan-radio" type="radio" 
                                               name="filter" value="" id="filter_plan_all"
                                               {{ !request('filter') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="filter_plan_all">
                                            Tous les plans
                                        </label>
                                    </div>
                                    
                                    <div class="form-check mb-2">
                                        <input class="form-check-input filter-plan-radio" type="radio" 
                                               name="filter" value="owned" id="filter_plan_owned"
                                               {{ request('filter') === 'owned' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="filter_plan_owned">
                                            <i class="fas fa-user me-1"></i>Mes créations
                                        </label>
                                    </div>
                                    
                                    <div class="form-check mb-2">
                                        <input class="form-check-input filter-plan-radio" type="radio" 
                                               name="filter" value="saved" id="filter_plan_saved"
                                               {{ request('filter') === 'saved' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="filter_plan_saved">
                                            <i class="fas fa-heart me-1"></i>Mes favoris
                                        </label>
                                    </div>
                                </form>
                            </div>
                            @endauth

                            <!-- Filter by Days -->
                            <div class="filter-widget mb-4">
                                <h5 class="widget-title">Durée</h5>
                                <form method="GET" action="{{ route('meal-plans.front.index') }}" id="days-form">
                                    <input type="hidden" name="search" value="{{ request('search') }}">
                                    
                                    <div class="row g-2 mb-2">
                                        <div class="col-6">
                                            <input type="number" name="min_days" class="form-control" 
                                                   placeholder="Min" value="{{ request('min_days') }}" min="1">
                                        </div>
                                        <div class="col-6">
                                            <input type="number" name="max_days" class="form-control" 
                                                   placeholder="Max" value="{{ request('max_days') }}" min="1">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-primary w-100">Appliquer</button>
                                </form>
                            </div>

                            <!-- Info Box -->
                            <div class="info-box p-3 bg-light rounded">
                                <h6 class="mb-2"><i class="fas fa-info-circle text-primary me-2"></i>À propos</h6>
                                <p class="small text-muted mb-0">
                                    Découvrez nos plans de repas conçus pour vous aider à atteindre vos objectifs nutritionnels.
                                </p>
                            </div>

                            <!-- Clear Filters -->
                            <div class="text-center mt-3">
                                <a href="{{ route('meal-plans.front.index') }}" class="btn btn-outline-secondary w-100">
                                    <i class="fas fa-times-circle me-1"></i> Réinitialiser
                                </a>
                            </div>
                        </aside>
                    </div>

                    <!-- Meal Plans Grid -->
                    <div class="col-lg-9">
                        <div id="meal-plans-grid">
                            @include('frontoffice.meal-plans._grid', ['mealPlans' => $mealPlans])
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- meal-plans-area-end -->

    </main>
@endsection

@push('frontoffice-scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    let searchTimeout;
    const gridContainer = document.getElementById('meal-plans-grid');
    const searchInput = document.querySelector('input[name="search"]');
    const minDaysInput = document.querySelector('input[name="min_days"]');
    const maxDaysInput = document.querySelector('input[name="max_days"]');
    const daysForm = document.getElementById('days-form');
    const filterPlanRadios = document.querySelectorAll('.filter-plan-radio');

    // Function to get selected filter
    function getSelectedFilter() {
        const selected = Array.from(filterPlanRadios).find(r => r.checked);
        return selected ? selected.value : '';
    }
    
    // Function to load meal plans with filters
    function loadMealPlans() {
        const params = new URLSearchParams();
        
        if (searchInput.value) {
            params.append('search', searchInput.value);
        }
        if (minDaysInput.value) {
            params.append('min_days', minDaysInput.value);
        }
        if (maxDaysInput.value) {
            params.append('max_days', maxDaysInput.value);
        }

        const filterValue = getSelectedFilter();
        if (filterValue) {
            params.append('filter', filterValue);
        }
        
        // Show loading state
        gridContainer.style.opacity = '0.5';
        
        fetch(`{{ route('meal-plans.front.index') }}?${params.toString()}`, {
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
                `{{ route('meal-plans.front.index') }}?${params.toString()}` : 
                `{{ route('meal-plans.front.index') }}`;
            window.history.pushState({}, '', newUrl);
            
            // Re-attach handlers
            attachPaginationHandlers();
            attachSaveHandlers();
        })
        .catch(error => {
            console.error('Error loading meal plans:', error);
            gridContainer.style.opacity = '1';
        });
    }
    
    // Real-time search with debouncing
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(loadMealPlans, 500);
    });
    
    // Days filter form submission
    daysForm.addEventListener('submit', function(e) {
        e.preventDefault();
        loadMealPlans();
    });

    // Auto-submit when filter radio changes
    filterPlanRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            loadMealPlans();
        });
    });
    
    // Save/Unsave functionality
    function attachSaveHandlers() {
        const saveButtons = gridContainer.querySelectorAll('.meal-plan-save-btn');
        
        saveButtons.forEach(btn => {
            // Remove any existing listeners by cloning
            const newBtn = btn.cloneNode(true);
            btn.parentNode.replaceChild(newBtn, btn);
            
            newBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                const mealPlanId = this.dataset.mealPlanId;
                const isSaved = this.classList.contains('saved');
                const url = isSaved ? 
                    `/plans-de-repas/${mealPlanId}/retirer` : 
                    `/plans-de-repas/${mealPlanId}/sauvegarder`;
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
                            icon.className = 'fas fa-bookmark me-1';
                            this.innerHTML = '<i class="fas fa-bookmark me-1"></i>Sauvegarder le plan';
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
                if (minDaysInput.value) params.append('min_days', minDaysInput.value);
                if (maxDaysInput.value) params.append('max_days', maxDaysInput.value);

                const filterValue = getSelectedFilter();
                if (filterValue) params.append('filter', filterValue);
                
                if (page) params.append('page', page);
                
                gridContainer.style.opacity = '0.5';
                
                fetch(`{{ route('meal-plans.front.index') }}?${params.toString()}`, {
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
#meal-plans-grid {
    transition: opacity 0.3s ease;
}

.meal-plan-card {
    border: 1px solid #e0e0e0;
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.3s ease;
    background: white;
    min-height: 100%;
}

.meal-plan-card:hover {
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

.meal-plan-card-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    min-height: 200px;
}

.meal-plan-title {
    color: white;
    font-weight: 600;
    font-size: 18px;
    min-height: 44px; /* Ensure consistent height for 2 lines max */
    display: -webkit-box;
    -webkit-line-clamp: 2;
    line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}

.meal-plan-description {
    color: rgba(255, 255, 255, 0.9);
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

.meal-plan-card-body {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.meal-plan-stats {
    padding-top: 10px;
    border-top: 1px solid #f0f0f0;
}

.stat-row {
    font-size: 14px;
}

.meal-plan-goals {
    padding: 12px;
    background: #f8f9fa;
    border-radius: 8px;
    border-left: 3px solid #3498db;
}

.meal-plan-goals p {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    max-height: 36px; /* 1.5 line-height * 12px small font * 2 lines */
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

.info-box {
    border-left: 3px solid #3498db;
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
.badges-group {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 4px;
}

/* Action buttons styling */
.meal-plan-actions .btn-sm {
    padding: 6px 12px;
    font-size: 13px;
}

/* Better spacing */
.gap-2 {
    gap: 0.5rem !important;
}

/* Condensed card body */
.meal-plan-card-body {
    padding: 1rem !important;
}

.meal-plan-card-header {
    padding: 1rem !important;
}

/* Compact stats */
.stat-row {
    font-size: 13px;
}
</style>
@endpush


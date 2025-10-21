@extends('shared.layouts.backoffice')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="enhanced-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.adminPanel') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Food Items</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-0">Food Items Management</h1>
            <div class="action-buttons">
                <a href="{{ route('admin.food.add') }}" class="btn-action primary">
                    Add Food Item
                </a>
                <a href="{{ route('admin.adminPanel') }}" class="btn-action secondary">
                    Dashboard
                </a>
            </div>
        </div>
    </div>

    <!-- Search and Filter Bar -->
    <div class="content-module mb-4">
        <div class="module-body">
            <div class="search-container">
                <!-- Real-time Search -->
                <div class="search-section">
                    <div class="form-group-enhanced">
                        <label for="search" class="form-label-enhanced">
                            <i class="fas fa-search me-2"></i>Search Food Items
                        </label>
                        <div class="input-wrapper">
                            <input type="text" 
                                   id="search" 
                                   name="search" 
                                   value="{{ request('search') }}" 
                                   class="form-control-enhanced" 
                                   placeholder="Type to search food items..."
                                   autocomplete="off">
                            <div class="search-loading" id="search-loading" style="display: none;">
                                <i class="fas fa-spinner fa-spin"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Nutrition Range Filters -->
                <div class="filters-section meals-filters">
                    <h6 class="filters-title">
                        <i class="fas fa-filter me-2"></i>Nutrition Filters
                    </h6>
                    
                    <div class="row g-3">
                        <!-- Calories Range -->
                        <div class="col-md-3">
                            <div class="form-group-enhanced">
                                <label class="form-label-enhanced">Calories Range</label>
                                <div class="range-container">
                                    <div class="range-display">
                                        <span id="calories_range_display">{{ request('calories_min', 0) }} - {{ request('calories_max', 1000) }} cal</span>
                                    </div>
                                    <div class="dual-range-slider">
                                        <div class="range-track"></div>
                                        <div class="range-progress" id="calories_progress"></div>
                                        <input type="range" id="calories_min_slider" class="range-slider-input min-slider" 
                                               min="0" max="1000" value="{{ request('calories_min', 0) }}">
                                        <input type="range" id="calories_max_slider" class="range-slider-input max-slider" 
                                               min="0" max="1000" value="{{ request('calories_max', 1000) }}">
                                        <input type="hidden" id="calories_min" name="calories_min" value="{{ request('calories_min', 0) }}">
                                        <input type="hidden" id="calories_max" name="calories_max" value="{{ request('calories_max', 1000) }}">
                                    </div>
                                    <div class="range-ticks" id="calories_ticks"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Protein Range -->
                        <div class="col-md-3">
                            <div class="form-group-enhanced">
                                <label class="form-label-enhanced">Protein Range (g)</label>
                                <div class="range-container">
                                    <div class="range-display">
                                        <span id="protein_range_display">{{ request('protein_min', 0) }} - {{ request('protein_max', 100) }}g</span>
                                    </div>
                                    <div class="dual-range-slider">
                                        <div class="range-track"></div>
                                        <div class="range-progress" id="protein_progress"></div>
                                        <input type="range" id="protein_min_slider" class="range-slider-input min-slider" 
                                               min="0" max="100" value="{{ request('protein_min', 0) }}" step="0.1">
                                        <input type="range" id="protein_max_slider" class="range-slider-input max-slider" 
                                               min="0" max="100" value="{{ request('protein_max', 100) }}" step="0.1">
                                        <input type="hidden" id="protein_min" name="protein_min" value="{{ request('protein_min', 0) }}">
                                        <input type="hidden" id="protein_max" name="protein_max" value="{{ request('protein_max', 100) }}">
                                    </div>
                                    <div class="range-ticks" id="protein_ticks"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Fat Range -->
                        <div class="col-md-3">
                            <div class="form-group-enhanced">
                                <label class="form-label-enhanced">Fat Range (g)</label>
                                <div class="range-container">
                                    <div class="range-display">
                                        <span id="fat_range_display">{{ request('fat_min', 0) }} - {{ request('fat_max', 50) }}g</span>
                                    </div>
                                    <div class="dual-range-slider">
                                        <div class="range-track"></div>
                                        <div class="range-progress" id="fat_progress"></div>
                                        <input type="range" id="fat_min_slider" class="range-slider-input min-slider" 
                                               min="0" max="50" value="{{ request('fat_min', 0) }}" step="0.1">
                                        <input type="range" id="fat_max_slider" class="range-slider-input max-slider" 
                                               min="0" max="50" value="{{ request('fat_max', 50) }}" step="0.1">
                                        <input type="hidden" id="fat_min" name="fat_min" value="{{ request('fat_min', 0) }}">
                                        <input type="hidden" id="fat_max" name="fat_max" value="{{ request('fat_max', 50) }}">
                                    </div>
                                    <div class="range-ticks" id="fat_ticks"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Carbs Range -->
                        <div class="col-md-3">
                            <div class="form-group-enhanced">
                                <label class="form-label-enhanced">Carbs Range (g)</label>
                                <div class="range-container">
                                    <div class="range-display">
                                        <span id="carbs_range_display">{{ request('carbs_min', 0) }} - {{ request('carbs_max', 100) }}g</span>
                                    </div>
                                    <div class="dual-range-slider">
                                        <div class="range-track"></div>
                                        <div class="range-progress" id="carbs_progress"></div>
                                        <input type="range" id="carbs_min_slider" class="range-slider-input min-slider" 
                                               min="0" max="100" value="{{ request('carbs_min', 0) }}" step="0.1">
                                        <input type="range" id="carbs_max_slider" class="range-slider-input max-slider" 
                                               min="0" max="100" value="{{ request('carbs_max', 100) }}" step="0.1">
                                        <input type="hidden" id="carbs_min" name="carbs_min" value="{{ request('carbs_min', 0) }}">
                                        <input type="hidden" id="carbs_max" name="carbs_max" value="{{ request('carbs_max', 100) }}">
                                    </div>
                                    <div class="range-ticks" id="carbs_ticks"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Filter Actions -->
                    <div class="filter-actions">
                        <button type="button" id="apply-filters" class="btn-action primary">
                            <i class="fas fa-filter me-2"></i>Apply Filters
                        </button>
                        <button type="button" id="clear-filters" class="btn-action secondary">
                            <i class="fas fa-times me-2"></i>Clear All
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Food Items Grid -->
    @include('backoffice.food.partials.food-grid')
</div>
@endsection

@push('backoffice-scripts')
<style>
    /* Professional Food Card Styling */
    .food-card {
        border: 1px solid #e8e9ea;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        background: #ffffff;
        overflow: hidden;
    }

    .food-card:hover {
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
        transform: translateY(-2px);
        border-color: #d1d5db;
    }

    .card-img-container {
        height: 200px;
        overflow: hidden;
        background: #f8f9fa;
        position: relative;
    }

    .card-img-top {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .food-card:hover .card-img-top {
        transform: scale(1.05);
    }

    .card-img-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        color: #6c757d;
    }

    .card-img-placeholder i {
        font-size: 3rem;
        opacity: 0.6;
    }

    .card-body {
        padding: 1.5rem;
    }

    .card-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #1f2937;
        line-height: 1.3;
    }

    .card-text {
        font-size: 0.875rem;
        color: #6b7280;
        line-height: 1.5;
    }

    .badge {
        background: #6c757d !important;
        color: #ffffff;
        font-size: 0.75rem;
        padding: 0.35rem 0.65rem;
        border-radius: 6px;
        font-weight: 500;
    }

    .nutrition-info {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 1rem;
    }

    .nutrition-item {
        text-align: center;
        padding: 0.5rem;
    }

    .nutrition-value {
        font-size: 1.1rem;
        font-weight: 700;
        color: #1f2937;
        line-height: 1;
        margin-bottom: 0.25rem;
    }

    .nutrition-label {
        font-size: 0.75rem;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 500;
    }

    /* Action Buttons Styling */
    .card-actions {
        margin-top: auto;
        padding-top: 0.5rem;
    }

    .card-actions .btn {
        border-radius: 6px;
        font-size: 0.875rem;
        font-weight: 500;
        padding: 0.5rem 0.75rem;
        transition: all 0.2s ease;
        text-align: center;
        white-space: nowrap;
    }

    .card-actions .btn-outline-primary {
        color: #3b82f6;
        border-color: #3b82f6;
        background: transparent;
    }

    .card-actions .btn-outline-primary:hover {
        background: #3b82f6;
        border-color: #3b82f6;
        color: #ffffff;
    }

    .card-actions .btn-outline-secondary {
        color: #6b7280;
        border-color: #d1d5db;
        background: transparent;
    }

    .card-actions .btn-outline-secondary:hover {
        background: #6b7280;
        border-color: #6b7280;
        color: #ffffff;
    }

    .card-actions .btn-outline-danger {
        color: #dc2626;
        border-color: #fca5a5;
        background: transparent;
    }

    .card-actions .btn-outline-danger:hover {
        background: #dc2626;
        border-color: #dc2626;
        color: #ffffff;
    }

    /* Ensure form doesn't break flex layout */
    .card-actions form {
        margin: 0;
    }

    /* Responsive adjustments */
    @media (max-width: 576px) {
        .card-actions .btn {
            width: 100%;
            display: block;
        }
    }

    @media (max-width: 768px) {
        .card-img-container {
            height: 180px;
        }

        .card-body {
            padding: 1.25rem;
        }

        .nutrition-info {
            padding: 0.75rem;
        }

        .card-actions .btn {
            font-size: 0.8125rem;
            padding: 0.45rem 0.5rem;
        }
    }

    /* Empty state styling */
    .empty-state {
        text-align: center;
        padding: 3rem 1rem;
        color: #6b7280;
    }

    .empty-state i {
        font-size: 3rem;
        color: #d1d5db;
        margin-bottom: 1rem;
    }

    .empty-state h3 {
        color: #374151;
        margin-bottom: 0.5rem;
    }

    .empty-state p {
        margin-bottom: 1.5rem;
    }

    /* Action Buttons Container */
    .action-buttons-container {
        display: flex;
        gap: 0.5rem;
        overflow-x: auto;
        padding-bottom: 0.25rem;
        scrollbar-width: thin;
        scrollbar-color: #cbd5e0 transparent;
    }

    .action-buttons-container::-webkit-scrollbar {
        height: 4px;
    }

    .action-buttons-container::-webkit-scrollbar-track {
        background: transparent;
    }

    .action-buttons-container::-webkit-scrollbar-thumb {
        background-color: #cbd5e0;
        border-radius: 2px;
    }

    .action-btn {
        flex-shrink: 0;
        white-space: nowrap;
        min-width: fit-content;
    }

    .action-btn-form {
        flex-shrink: 0;
    }

    /* Search Container Styling */
    .search-container {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 0.75rem;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        border: 1px solid #dee2e6;
    }

    .search-section {
        margin-bottom: 1.5rem;
    }

    .filters-section {
        border-top: 1px solid #dee2e6;
        padding-top: 1rem;
    }

    .filters-title {
        color: #495057;
        font-weight: 600;
        margin-bottom: 1rem;
        font-size: 1rem;
    }

    /* Form Group Enhanced Styling */
    .form-group-enhanced {
        margin-bottom: 1rem;
        position: relative;
    }

    .form-label-enhanced {
        display: block;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
        letter-spacing: 0.01em;
    }

    .input-wrapper {
        position: relative;
        width: 100%;
    }

    .form-control-enhanced {
        display: block;
        width: 100%;
        padding: 0.625rem 0.875rem;
        font-size: 0.9375rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1.5px solid #ced4da;
        border-radius: 0.375rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .form-control-enhanced:focus {
        color: #495057;
        background-color: #fff;
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.15);
    }

    .search-loading {
        position: absolute;
        right: 0.75rem;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
    }

    /* moved slider styles to resources/css/meals-filters.css */

    /* Clickable Title Styling */
    .clickable-title {
        transition: all 0.2s ease;
        text-decoration: underline !important;
        color: #007bff !important;
    }

    .clickable-title:hover {
        color: #0056b3 !important;
        text-decoration: underline !important;
        transform: translateY(-1px);
    }

    .clickable-title:active {
        color: #004085 !important;
        transform: translateY(0);
    }

    /* Filter Actions */
    .filter-actions {
        display: flex;
        gap: 0.75rem;
        justify-content: center;
        margin-top: 0.75rem;
        padding-top: 0.5rem;
        border-top: 1px solid #dee2e6;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .search-container {
            padding: 1rem;
        }

        .range-inputs {
            flex-direction: column;
            gap: 0.25rem;
        }

        .range-separator {
            display: none;
        }

        .filter-actions {
            flex-direction: column;
        }

        .action-buttons-container {
            justify-content: center;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // AJAX Search functionality
    const searchInput = document.getElementById('search');
    const searchLoading = document.getElementById('search-loading');
    let searchTimeout;

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            const query = this.value.trim();
            
            if (query.length >= 2) {
                searchLoading.style.display = 'block';
                searchTimeout = setTimeout(() => {
                    performSearch(query);
                }, 300); // 300ms delay for better UX
            } else if (query.length === 0) {
                // Clear search and reload all items
                performSearch('');
            }
        });
    }

    function performSearch(query) {
        const url = new URL(window.location.href);
        url.searchParams.set('search', query);
        
        fetch(url.toString(), {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'text/html',
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(html => {
            // Parse the response and update the food items grid
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const newGrid = doc.querySelector('.row.g-4');
            const currentGrid = document.querySelector('.row.g-4');
            
            if (newGrid && currentGrid) {
                currentGrid.innerHTML = newGrid.innerHTML;
            }
            
            searchLoading.style.display = 'none';
        })
        .catch(error => {
            console.error('Search error:', error);
            searchLoading.style.display = 'none';
            // Fallback to page reload
            window.location.href = url.toString();
        });
    }

    // Dual Range slider functionality
    const sliders = ['calories', 'protein', 'fat', 'carbs'];
    
    sliders.forEach(nutrient => {
        const minSlider = document.getElementById(`${nutrient}_min_slider`);
        const maxSlider = document.getElementById(`${nutrient}_max_slider`);
        const minInput = document.getElementById(`${nutrient}_min`);
        const maxInput = document.getElementById(`${nutrient}_max`);
        const display = document.getElementById(`${nutrient}_range_display`);
        
        if (minSlider && maxSlider && minInput && maxInput && display) {
            // Render ticks (0/25/50/75/100)
            renderTicks(nutrient);
            // Initialize progress bar
            updateProgress(nutrient);
            // Update min slider
            minSlider.addEventListener('input', function() {
                const minValue = parseFloat(this.value);
                const maxValue = parseFloat(maxSlider.value);
                
                // Ensure min doesn't exceed max
                if (minValue >= maxValue) {
                    maxSlider.value = minValue;
                    maxInput.value = minValue;
                }
                
                minInput.value = minValue;
                updateRangeDisplay(nutrient, minValue, parseFloat(maxSlider.value));
                updateProgress(nutrient);
            });
            
            // Update max slider
            maxSlider.addEventListener('input', function() {
                const maxValue = parseFloat(this.value);
                const minValue = parseFloat(minSlider.value);
                
                // Ensure max doesn't go below min
                if (maxValue <= minValue) {
                    minSlider.value = maxValue;
                    minInput.value = maxValue;
                }
                
                maxInput.value = maxValue;
                updateRangeDisplay(nutrient, parseFloat(minSlider.value), maxValue);
                updateProgress(nutrient);
            });
            
            // Initialize display
            updateRangeDisplay(nutrient, parseFloat(minSlider.value), parseFloat(maxSlider.value));
            updateProgress(nutrient);
        }
    });
    
    function renderTicks(nutrient) {
        const ticksContainer = document.getElementById(`${nutrient}_ticks`);
        const minSlider = document.getElementById(`${nutrient}_min_slider`);
        const max = parseFloat(minSlider?.max ?? '100');
        if (!ticksContainer) return;
        ticksContainer.innerHTML = '';
        const positions = [0, 25, 50, 75, 100];
        positions.forEach((pct, idx) => {
            const tick = document.createElement('div');
            tick.className = `tick ${idx % 2 === 0 ? 'major' : ''}`;
            tick.style.left = `${pct}%`;
            ticksContainer.appendChild(tick);
            const label = document.createElement('div');
            label.className = 'tick-label';
            label.style.left = `${pct}%`;
            label.textContent = Math.round((pct / 100) * max);
            ticksContainer.appendChild(label);
        });
    }

    function updateProgress(nutrient) {
        const minSlider = document.getElementById(`${nutrient}_min_slider`);
        const maxSlider = document.getElementById(`${nutrient}_max_slider`);
        const progress = document.getElementById(`${nutrient}_progress`);
        if (!minSlider || !maxSlider || !progress) return;
        const min = parseFloat(minSlider.min);
        const max = parseFloat(minSlider.max);
        const minVal = Math.min(parseFloat(minSlider.value), parseFloat(maxSlider.value));
        const maxVal = Math.max(parseFloat(minSlider.value), parseFloat(maxSlider.value));
        const left = ((minVal - min) / (max - min)) * 100;
        const right = ((maxVal - min) / (max - min)) * 100;
        progress.style.left = `${left}%`;
        progress.style.width = `${right - left}%`;
    }

    function updateRangeDisplay(nutrient, min, max) {
        const display = document.getElementById(`${nutrient}_range_display`);
        const unit = nutrient === 'calories' ? 'cal' : 'g';
        if (display) {
            display.textContent = `${min.toFixed(1)} - ${max.toFixed(1)} ${unit}`;
        }
    }

    // Filter actions
    const applyFiltersBtn = document.getElementById('apply-filters');
    const clearFiltersBtn = document.getElementById('clear-filters');
    
    if (applyFiltersBtn) {
        applyFiltersBtn.addEventListener('click', function() {
            applyFilters(true);
        });
    }
    
    if (clearFiltersBtn) {
        clearFiltersBtn.addEventListener('click', function() {
            clearFilters(true);
        });
    }
    
    function applyFilters(async = false) {
        const url = new URL(window.location.href);
        
        // Clear existing filter params
        ['calories_min', 'calories_max', 'protein_min', 'protein_max', 
         'fat_min', 'fat_max', 'carbs_min', 'carbs_max'].forEach(param => {
            url.searchParams.delete(param);
        });
        
        // Add current filter values
        sliders.forEach(nutrient => {
            const minInput = document.getElementById(`${nutrient}_min`);
            const maxInput = document.getElementById(`${nutrient}_max`);
            
            if (minInput && minInput.value && parseFloat(minInput.value) > parseFloat(minInput.getAttribute('min') ?? '0')) {
                url.searchParams.set(`${nutrient}_min`, minInput.value);
            }
            if (maxInput && maxInput.value && parseFloat(maxInput.value) < parseFloat(document.getElementById(`${nutrient}_max_slider`)?.max ?? maxInput.value)) {
                url.searchParams.set(`${nutrient}_max`, maxInput.value);
            }
        });
        if (!async) {
            window.location.href = url.toString();
            return;
        }
        fetch(url.toString(), { method: 'GET', headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'text/html' } })
        .then(r => r.text())
        .then(html => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const newGrid = doc.querySelector('.row.g-4');
            const currentGrid = document.querySelector('.row.g-4');
            if (newGrid && currentGrid) {
                currentGrid.innerHTML = newGrid.innerHTML;
                window.history.pushState({}, '', url.toString());
            } else {
                window.location.href = url.toString();
            }
        })
        .catch(() => window.location.href = url.toString());
    }
    
    function clearFilters(async = false) {
        const url = new URL(window.location.href);
        
        // Clear all filter params
        ['search', 'calories_min', 'calories_max', 'protein_min', 'protein_max', 
         'fat_min', 'fat_max', 'carbs_min', 'carbs_max'].forEach(param => {
            url.searchParams.delete(param);
        });
        
        // Reset form inputs
        if (searchInput) searchInput.value = '';
        
        sliders.forEach(nutrient => {
            const minSlider = document.getElementById(`${nutrient}_min_slider`);
            const maxSlider = document.getElementById(`${nutrient}_max_slider`);
            const minInput = document.getElementById(`${nutrient}_min`);
            const maxInput = document.getElementById(`${nutrient}_max`);
            
            if (minSlider) minSlider.value = minSlider.min;
            if (maxSlider) maxSlider.value = maxSlider.max;
            if (minInput) minInput.value = minSlider.min;
            if (maxInput) maxInput.value = maxSlider.max;
            
            updateRangeDisplay(nutrient, parseFloat(minSlider.min), parseFloat(maxSlider.max));
        });
        
        if (!async) {
            window.location.href = url.toString();
            return;
        }
        fetch(url.toString(), { method: 'GET', headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'text/html' } })
        .then(r => r.text())
        .then(html => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const newGrid = doc.querySelector('.row.g-4');
            const currentGrid = document.querySelector('.row.g-4');
            if (newGrid && currentGrid) {
                currentGrid.innerHTML = newGrid.innerHTML;
                window.history.pushState({}, '', url.toString());
            } else {
                window.location.href = url.toString();
            }
        })
        .catch(() => window.location.href = url.toString());
    }

    // Handle clickable titles
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('clickable-title')) {
            const url = e.target.getAttribute('data-url');
            if (url) {
                window.location.href = url;
            }
        }
    });
});
</script>
@endpush
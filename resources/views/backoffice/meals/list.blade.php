@extends('shared.layouts.backoffice')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="enhanced-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.adminPanel') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Meals</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-0">Meals Management</h1>
            <div class="action-buttons">
                <a href="{{ route('admin.meals.create') }}" class="btn-action primary">
                    Create Meal
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
                            <i class="fas fa-search me-2"></i>Search Meals
                        </label>
                        <div class="input-wrapper">
                    <input type="text" 
                                   id="search" 
                           name="search" 
                           value="{{ request('search') }}" 
                                   class="form-control-enhanced" 
                                   placeholder="Type to search meals..."
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
                        <i class="fas fa-filter me-2"></i>Meal Filters
                    </h6>
                    
                    <div class="row g-3">
                        <!-- Meal Time Filter -->
                        <div class="col-md-6">
                            <div class="form-group-enhanced">
                                <label class="form-label-enhanced">Meal Time</label>
                                <div class="filter-container">
                                    <div class="filter-options">
                                        <label class="filter-toggle">
                                            <input type="checkbox" name="meal_times[]" value="breakfast" 
                                                   {{ in_array('breakfast', request('meal_times', [])) ? 'checked' : '' }}>
                                            <span class="toggle-label">Breakfast</span>
                                        </label>
                                        <label class="filter-toggle">
                                            <input type="checkbox" name="meal_times[]" value="lunch" 
                                                   {{ in_array('lunch', request('meal_times', [])) ? 'checked' : '' }}>
                                            <span class="toggle-label">Lunch</span>
                                        </label>
                                        <label class="filter-toggle">
                                            <input type="checkbox" name="meal_times[]" value="dinner" 
                                                   {{ in_array('dinner', request('meal_times', [])) ? 'checked' : '' }}>
                                            <span class="toggle-label">Dinner</span>
                                        </label>
                                        <label class="filter-toggle">
                                            <input type="checkbox" name="meal_times[]" value="snack" 
                                                   {{ in_array('snack', request('meal_times', [])) ? 'checked' : '' }}>
                                            <span class="toggle-label">Snack</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Calories Range -->
                        <div class="col-md-3">
                            <div class="form-group-enhanced">
                                <label class="form-label-enhanced">Calories Range</label>
                                <div class="range-container">
                                    <div class="range-display">
                                        <span id="calories_range_display">{{ request('calories_min', 0) }} - {{ request('calories_max', 2000) }} cal</span>
                                    </div>
                                    <div class="dual-range-slider">
                                        <div class="range-track"></div>
                                        <div class="range-progress" id="calories_progress"></div>
                                        <input type="range" id="calories_min_slider" class="range-slider-input min-slider" 
                                               min="0" max="2000" value="{{ request('calories_min', 0) }}">
                                        <input type="range" id="calories_max_slider" class="range-slider-input max-slider" 
                                               min="0" max="2000" value="{{ request('calories_max', 2000) }}">
                                        <input type="hidden" id="calories_min" name="calories_min" value="{{ request('calories_min', 0) }}">
                                        <input type="hidden" id="calories_max" name="calories_max" value="{{ request('calories_max', 2000) }}">
                                    </div>
                                    <div class="range-ticks" id="calories_ticks"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Preparation Time Range -->
                        <div class="col-md-3">
                            <div class="form-group-enhanced">
                                <label class="form-label-enhanced">Prep Time Range (min)</label>
                                <div class="range-container">
                                    <div class="range-display">
                                        <span id="prep_time_range_display">{{ request('prep_time_min', 0) }} - {{ request('prep_time_max', 120) }} min</span>
                                    </div>
                                    <div class="dual-range-slider">
                                        <div class="range-track"></div>
                                        <div class="range-progress" id="prep_time_progress"></div>
                                        <input type="range" id="prep_time_min_slider" class="range-slider-input min-slider" 
                                               min="0" max="120" value="{{ request('prep_time_min', 0) }}">
                                        <input type="range" id="prep_time_max_slider" class="range-slider-input max-slider" 
                                               min="0" max="120" value="{{ request('prep_time_max', 120) }}">
                                        <input type="hidden" id="prep_time_min" name="prep_time_min" value="{{ request('prep_time_min', 0) }}">
                                        <input type="hidden" id="prep_time_max" name="prep_time_max" value="{{ request('prep_time_max', 120) }}">
                                    </div>
                                    <div class="range-ticks" id="prep_time_ticks"></div>
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

    <!-- Meals Grid -->
    @include('backoffice.meals.partials.meals-grid')
</div>
@endsection

@push('backoffice-scripts')
<style>
    /* Professional Meal Card Styling */
    .meal-card {
        border: 1px solid #e8e9ea;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        background: #ffffff;
        overflow: hidden;
    }

    .meal-card:hover {
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

    .meal-card:hover .card-img-top {
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
        margin-bottom: 0.75rem;
        line-height: 1.3;
    }

    .card-text {
        font-size: 0.875rem;
        color: #6b7280;
        line-height: 1.5;
        margin-bottom: 1rem;
    }

    .meal-time-badge {
        margin-bottom: 0.75rem;
    }

    .meal-time-badge .badge {
        background: #e0f2fe;
        color: #0369a1;
        font-size: 0.75rem;
        padding: 0.4rem 0.75rem;
        border-radius: 6px;
        font-weight: 500;
    }

    .meal-tags {
        margin-bottom: 1rem;
    }

    .tag {
        display: inline-block;
        background: #f3f4f6;
        color: #374151;
        font-size: 0.7rem;
        padding: 0.3rem 0.6rem;
        border-radius: 4px;
        margin-right: 0.5rem;
        margin-bottom: 0.25rem;
        font-weight: 500;
    }

    .tag-more {
        display: inline-block;
        background: #e5e7eb;
        color: #6b7280;
        font-size: 0.7rem;
        padding: 0.3rem 0.6rem;
        border-radius: 4px;
        font-weight: 500;
    }

    .nutrition-info {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 1rem;
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

    .meal-details {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 1rem;
    }

    .detail-item {
        text-align: center;
        padding: 0.5rem;
    }

    .detail-value {
        font-size: 1rem;
        font-weight: 600;
        color: #1f2937;
        line-height: 1;
        margin-bottom: 0.25rem;
    }

    .detail-label {
        font-size: 0.75rem;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 500;
    }

    .card-actions {
        margin-top: auto;
    }

    .btn-group .btn {
        border-radius: 6px;
        font-size: 0.875rem;
        font-weight: 500;
        padding: 0.5rem 0.75rem;
        transition: all 0.2s ease;
    }

    .btn-outline-primary {
        color: #3b82f6;
        border-color: #3b82f6;
    }

    .btn-outline-primary:hover {
        background: #3b82f6;
        border-color: #3b82f6;
        color: #ffffff;
    }

    .btn-outline-secondary {
        color: #6b7280;
        border-color: #d1d5db;
    }

    .btn-outline-secondary:hover {
        background: #6b7280;
        border-color: #6b7280;
        color: #ffffff;
    }

    .btn-outline-danger {
        color: #dc2626;
        border-color: #fca5a5;
    }

    .btn-outline-danger:hover {
        background: #dc2626;
        border-color: #dc2626;
        color: #ffffff;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .card-img-container {
            height: 180px;
        }
        
        .card-body {
            padding: 1.25rem;
        }
        
        .nutrition-info,
        .meal-details {
            padding: 0.75rem;
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
        padding-top: 1.5rem;
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

    /* Filter Container Styling */
    .filter-container {
        background: #fff;
        border-radius: 0.5rem;
        padding: 1rem;
        border: 1px solid #e9ecef;
    }

    .filter-options {
        display: flex;
        flex-wrap: wrap;
        gap: 0.75rem;
    }

    .filter-toggle {
        display: flex;
        align-items: center;
        cursor: pointer;
        padding: 0.5rem 0.75rem;
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 0.375rem;
        transition: all 0.2s ease;
        user-select: none;
    }

    .filter-toggle:hover {
        background: #e9ecef;
        border-color: #ced4da;
    }

    .filter-toggle input[type="checkbox"] {
        margin-right: 0.5rem;
        transform: scale(1.1);
    }

    .filter-toggle input[type="checkbox"]:checked + .toggle-label {
        color: #007bff;
        font-weight: 600;
    }

    .filter-toggle:has(input:checked) {
        background: #e3f2fd;
        border-color: #007bff;
    }

    .toggle-label {
        font-size: 0.875rem;
        color: #495057;
        transition: color 0.2s ease;
    }

    /* Dual Range Slider */
    .dual-range-slider {
        position: relative;
        margin-bottom: 0.5rem;
        height: 20px;
    }

    .range-slider-input {
        position: absolute;
        width: 100%;
        height: 6px;
        border-radius: 3px;
        background: transparent;
        outline: none;
        -webkit-appearance: none;
        appearance: none;
        pointer-events: none;
    }

    .range-slider-input::-webkit-slider-track {
        height: 6px;
        border-radius: 3px;
        background: #e9ecef;
    }

    .range-slider-input::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #007bff;
        cursor: pointer;
        border: 2px solid #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        pointer-events: all;
        position: relative;
        z-index: 2;
    }

    .range-slider-input::-moz-range-track {
        height: 6px;
        border-radius: 3px;
        background: #e9ecef;
        border: none;
    }

    .range-slider-input::-moz-range-thumb {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #007bff;
        cursor: pointer;
        border: 2px solid #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        pointer-events: all;
    }

    .min-slider::-webkit-slider-thumb {
        background: #28a745;
    }

    .max-slider::-webkit-slider-thumb {
        background: #dc3545;
    }

    .min-slider::-moz-range-thumb {
        background: #28a745;
    }

    .max-slider::-moz-range-thumb {
        background: #dc3545;
    }

    .range-container {
        background: #fff;
        border-radius: 0.5rem;
        padding: 1rem;
        border: 1px solid #e9ecef;
    }

    .range-display {
        text-align: center;
        font-size: 0.875rem;
        color: #6c757d;
        font-weight: 500;
        margin-bottom: 0.5rem;
    }

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
        margin-top: 1.5rem;
        padding-top: 1rem;
        border-top: 1px solid #dee2e6;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .search-container {
            padding: 1rem;
        }

        .filter-options {
            flex-direction: column;
            gap: 0.5rem;
        }

        .filter-toggle {
            justify-content: center;
        }

        .filter-actions {
            flex-direction: column;
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
                }, 300);
            } else if (query.length === 0) {
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
            window.location.href = url.toString();
        });
    }

    // Dual Range slider functionality
    const sliders = ['calories', 'prep_time'];
    
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
        let unit = '';
        if (nutrient === 'calories') unit = 'cal';
        else if (nutrient === 'protein') unit = 'g';
        else if (nutrient === 'prep_time') unit = 'min';
        
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
        
        // Clear existing filter params - properly handle array parameters
        ['meal_times', 'calories_min', 'calories_max', 'prep_time_min', 'prep_time_max'].forEach(param => {
            // For array parameters, remove all instances
            if (param === 'meal_times') {
                url.searchParams.delete('meal_times[]');
            } else {
                url.searchParams.delete(param);
            }
        });
        
        // Add meal times - only add checked ones
        const mealTimeCheckboxes = document.querySelectorAll('input[name="meal_times[]"]:checked');
        mealTimeCheckboxes.forEach(checkbox => {
            url.searchParams.append('meal_times[]', checkbox.value);
        });
        
        // Add range values
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
        
        // Clear all filter params - properly handle array parameters
        ['search', 'meal_times', 'calories_min', 'calories_max', 'prep_time_min', 'prep_time_max'].forEach(param => {
            if (param === 'meal_times') {
                url.searchParams.delete('meal_times[]');
            } else {
                url.searchParams.delete(param);
            }
        });
        
        if (searchInput) searchInput.value = '';
        
        // Reset checkboxes
        document.querySelectorAll('input[name="meal_times[]"]').forEach(checkbox => {
            checkbox.checked = false;
        });
        
        // Reset sliders
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
            updateProgress(nutrient);
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
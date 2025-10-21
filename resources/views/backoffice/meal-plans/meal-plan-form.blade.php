@extends('shared.layouts.backoffice')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="enhanced-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.adminPanel') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.meal-plans.list') }}">Meal Plans</a></li>
                <li class="breadcrumb-item active">{{ isset($mealPlan) ? 'Edit Meal Plan' : 'Create Meal Plan' }}</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-0">{{ isset($mealPlan) ? 'Edit Meal Plan' : 'Create Meal Plan' }}</h1>
            <div class="action-buttons">
                <a href="{{ route('admin.meal-plans.list') }}" class="btn-action secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to List
                </a>
            </div>
        </div>
    </div>

    <!-- Form Module -->
    <div class="form-module">
        <div class="module-header">
            <h3 class="module-title">Meal Plan Information</h3>
        </div>
        <div class="module-body">
            <form method="POST"
                action="{{ isset($mealPlan) ? route('admin.meal-plans.update', $mealPlan) : route('admin.meal-plans.store') }}"
                novalidate>
                @csrf
                @if(isset($mealPlan))
                @method('PUT')
                @endif

                <div class="row">
                    <!-- Basic Information -->
                    <div class="col-md-6">
                        <div class="form-group-enhanced">
                            <label for="name" class="form-label-enhanced">
                                Plan Name <span class="required-indicator">*</span>
                            </label>
                            <div class="input-wrapper">
                                <input type="text"
                                    name="name"
                                    id="name"
                                    class="form-control-enhanced @error('name') is-invalid @enderror"
                                    placeholder="Enter meal plan name"
                                    value="{{ old('name', $mealPlan->name ?? '') }}"
                                    required>
                                @error('name')
                                <div class="error-message">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7 0C3.13 0 0 3.13 0 7C0 10.87 3.13 14 7 14C10.87 14 14 10.87 14 7C14 3.13 10.87 0 7 0ZM7.7 10.5H6.3V9.1H7.7V10.5ZM7.7 7.7H6.3V3.5H7.7V7.7Z" fill="currentColor" />
                                    </svg>
                                    <span>{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group-enhanced">
                            <label for="description" class="form-label-enhanced">Description</label>
                            <div class="input-wrapper">
                                <textarea name="description"
                                    id="description"
                                    rows="4"
                                    class="form-control-enhanced @error('description') is-invalid @enderror"
                                    placeholder="Describe this meal plan...">{{ old('description', $mealPlan->description ?? '') }}</textarea>
                                @error('description')
                                <div class="error-message">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7 0C3.13 0 0 3.13 0 7C0 10.87 3.13 14 7 14C10.87 14 14 10.87 14 7C14 3.13 10.87 0 7 0ZM7.7 10.5H6.3V9.1H7.7V10.5ZM7.7 7.7H6.3V3.5H7.7V7.7Z" fill="currentColor" />
                                    </svg>
                                    <span>{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Settings -->
                    <div class="col-md-6">
                        <div class="form-group-enhanced">
                            <label for="total_days" class="form-label-enhanced">
                                Total Days <span class="required-indicator">*</span>
                            </label>
                            <div class="input-wrapper">
                                <input type="number"
                                    name="total_days"
                                    id="total_days"
                                    class="form-control-enhanced @error('total_days') is-invalid @enderror"
                                    placeholder="Enter number of days"
                                    value="{{ old('total_days', $mealPlan->total_days ?? '') }}"
                                    min="1"
                                    max="365"
                                    required>
                                <div class="form-hint">Number of days in this meal plan (1-365)</div>
                                @error('total_days')
                                <div class="error-message">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7 0C3.13 0 0 3.13 0 7C0 10.87 3.13 14 7 14C10.87 14 14 10.87 14 7C14 3.13 10.87 0 7 0ZM7.7 10.5H6.3V9.1H7.7V10.5ZM7.7 7.7H6.3V3.5H7.7V7.7Z" fill="currentColor" />
                                    </svg>
                                    <span>{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group-enhanced">
                            <div class="form-check-enhanced">
                                <input type="checkbox"
                                    name="is_active"
                                    id="is_active"
                                    class="form-check-input-enhanced"
                                    value="1"
                                    {{ old('is_active', $mealPlan->is_active ?? true) ? 'checked' : '' }}>
                                <label for="is_active" class="form-check-label-enhanced">
                                    Active Plan
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Meal Assignment Grid -->
                <div class="meals-selection-section" 
                     data-meals="{{ json_encode($meals) }}"
                     data-meal-times="{{ json_encode(['breakfast', 'snack', 'lunch', 'dinner']) }}"
                     data-meal-time-labels="{{ json_encode(['Breakfast', 'Snack', 'Lunch', 'Dinner']) }}"
                     @if(isset($mealPlan))
                     data-assignments="{{ json_encode($mealPlan->assignments->mapWithKeys(function($assignment) {
                         return [$assignment->day_number . '_' . $assignment->meal_time => [
                             'meal_id' => $assignment->meal_id,
                             'meal_name' => $assignment->meal->name
                         ]];
                     })) }}"
                     @endif>
                    <div class="section-header">
                        <h5 class="section-title">Meal Assignments</h5>
                        <div class="section-actions">
                            <button type="button" id="generate-grid-btn" class="btn-action secondary">
                                <i class="fas fa-table me-2"></i>Generate Grid
                            </button>
                        </div>
                    </div>

                    <!-- Meal Assignment Grid -->
                    <div id="meal-assignment-grid" class="meal-assignment-grid" style="display: none;">
                        <!-- Grid will be generated here -->
                    </div>

                    <!-- Available Meals Section -->
                    <div class="available-meals-section">
                        <h6 class="subsection-title">Available Meals</h6>
                    <div class="meal-search-container">
                        <div class="form-group-enhanced">
                            <label for="meal-search" class="form-label-enhanced">Search Meals</label>
                            <div class="search-input-group">
                                <input type="text"
                                    id="meal-search"
                                    class="form-control-enhanced"
                                    placeholder="Search meals by name or description...">
                                <div class="search-icon">
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                        <div id="meals-grid" class="meals-grid">
                            @foreach($meals as $meal)
                            <div class="meal-card" 
                                 data-meal-id="{{ $meal->id }}" 
                                 data-meal-name="{{ strtolower($meal->name) }}" 
                                 data-meal-description="{{ strtolower($meal->description) }}">
                                <div class="meal-card-header">
                                    <div class="meal-info">
                                        <h6 class="meal-name">{{ $meal->name }}</h6>
                                        <p class="meal-description">{{ Str::limit($meal->description, 60) }}</p>
                                    </div>
                                    @if($meal->meal_time)
                                    <span class="meal-time-badge">{{ ucfirst($meal->meal_time) }}</span>
                                    @endif
                                </div>
                                <div class="meal-card-body">
                                    <div class="meal-nutrition">
                                        <span class="nutrition-item">{{ $meal->total_calories ?? 0 }} cal</span>
                                        <span class="nutrition-item">{{ $meal->total_protein ?? 0 }}g protein</span>
                                    </div>
                                    <div class="meal-actions">
                                        <button type="button" class="btn-add-meal" data-meal-id="{{ $meal->id }}">
                                            <i class="fas fa-plus me-1"></i>Select for Assignment
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="module-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="form-hint">
                            All fields marked with <span class="required-indicator">*</span> are required.
                        </div>
                        <div class="action-buttons">
                            @if(isset($mealPlan))
                            <button type="reset" class="btn-action secondary">
                                <i class="fas fa-undo me-2"></i>Reset
                            </button>
                            @endif
                            <button type="submit" class="btn-action primary">
                                <i class="fas fa-save me-2"></i>{{ isset($mealPlan) ? 'Update Meal Plan' : 'Create Meal Plan' }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('backoffice-styles')
@vite('resources/css/meal-plan-forms.css')
@endpush

@push('backoffice-scripts')
@vite('resources/js/meal-plan-form.js')
@endpush
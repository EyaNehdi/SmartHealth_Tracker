@extends('shared.layouts.frontoffice')

@section('page-title', 'Modifier le Plan de Repas - SmartHealth Tracker')

@section('content')
    <main class="main-area fix">

        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg"
            data-background="{{ Vite::asset('resources/assets/img/bg/sd_bg.html') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="breadcrumb__content text-center">
                            <h2 class="title">Modifier le Plan de Repas</h2>
                            <nav class="breadcrumb">
                                <span><a href="{{ route('home') }}">Home</a></span>
                                <span class="breadcrumb-separator">|</span>
                                <span><a href="{{ route('meal-plans.front.index') }}">Plans de Repas</a></span>
                                <span class="breadcrumb-separator">|</span>
                                <span><a href="{{ route('meal-plans.front.show', $mealPlan->id) }}">{{ $mealPlan->name }}</a></span>
                                <span class="breadcrumb-separator">|</span>
                                <span>Modifier</span>
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

        <!-- meal-plan-edit-area -->
        <section class="meal-plan-edit-area section-py-150">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="meal-plan-form-container">
                            <!-- Form Header -->
                            <div class="form-header text-center mb-5">
                                <h3 class="form-title">Modifier votre plan de repas</h3>
                                <p class="form-subtitle text-muted">Mettez à jour les informations de votre plan</p>
                            </div>

                            <!-- Form -->
                            <form method="POST" action="{{ route('meal-plans.front.update', $mealPlan->id) }}" 
                                  class="meal-plan-form" 
                                  novalidate>
                                @csrf
                                @method('PUT')

                                @php
                                    $existingAssignments = $mealPlan->assignments->mapWithKeys(function($assignment) {
                                        return [$assignment->day_number . '_' . $assignment->meal_time => [
                                            'meal_id' => $assignment->meal_id,
                                            'meal_name' => $assignment->meal->name,
                                            'total_calories' => $assignment->meal->total_calories
                                        ]];
                                    });
                                @endphp

                                <!-- Basic Information Section -->
                                <div class="form-section">
                                    <div class="section-header">
                                        <h4 class="section-title">
                                            <i class="fas fa-info-circle text-primary me-2"></i>
                                            Informations du plan
                                        </h4>
                                    </div>
                                    
                                    <div class="section-body">
                                        <div class="row g-4">
                                            <!-- Plan Name -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name" class="form-label">
                                                        Nom du plan <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" 
                                                           id="name" 
                                                           name="name" 
                                                           class="form-control @error('name') is-invalid @enderror" 
                                                           value="{{ old('name', $mealPlan->name) }}" 
                                                           placeholder="Ex: Plan Détox 7 Jours"
                                                           required>
                                                    @error('name')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Total Days -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="total_days" class="form-label">
                                                        Durée du plan (jours) <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="number" 
                                                           id="total_days" 
                                                           name="total_days" 
                                                           class="form-control @error('total_days') is-invalid @enderror" 
                                                           value="{{ old('total_days', $mealPlan->total_days) }}" 
                                                           placeholder="Ex: 7"
                                                           min="1" 
                                                           max="365"
                                                           required>
                                                    @error('total_days')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Description -->
                                        <div class="form-group mt-4">
                                            <label for="description" class="form-label">
                                                Description du plan
                                            </label>
                                            <textarea id="description" 
                                                      name="description" 
                                                      class="form-control @error('description') is-invalid @enderror" 
                                                      rows="3" 
                                                      placeholder="Décrivez votre plan de repas, ses objectifs, ses bienfaits...">{{ old('description', $mealPlan->description) }}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Meal Assignment Section -->
                                <div class="form-section">
                                    <div class="section-header">
                                        <h4 class="section-title">
                                            <i class="fas fa-calendar-week text-success me-2"></i>
                                            Planning des repas
                                        </h4>
                                        <p class="section-subtitle">Modifiez l'organisation de vos repas par jour et par moment</p>
                                    </div>
                                    
                                    <div class="section-body">
                                        <!-- Meal Assignment Grid -->
                                        <div class="meal-assignment-container">
                                            <div class="assignment-controls mb-4">
                                                <div class="row g-3">
                                                    <div class="col-md-12">
                                                        <button type="button" id="generate-grid-btn" class="btn btn-outline-primary w-100">
                                                            <i class="fas fa-table me-2"></i>Générer la grille
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Meal Assignment Grid -->
                                            <div id="meal-assignment-grid" class="meal-assignment-grid" style="display: none;">
                                                <!-- Grid will be generated here -->
                                            </div>

                                            <!-- Available Meals Section -->
                                            <div class="available-meals-section">
                                                <h6 class="subsection-title">Repas disponibles</h6>
                                                <div class="meal-search-container">
                                                    <div class="form-group">
                                                        <label for="meal-search" class="form-label">Rechercher des repas</label>
                                                        <input type="text"
                                                            id="meal-search"
                                                            class="form-control"
                                                            placeholder="Rechercher des repas par nom ou description...">
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
                                                            <span class="meal-time-badge">{{ config("meal_times.labels.{$meal->meal_time}") }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="meal-card-body">
                                                            <div class="meal-nutrition">
                                                                <span class="nutrition-item">{{ $meal->total_calories ?? 0 }} cal</span>
                                                                <span class="nutrition-item">{{ $meal->total_protein ?? 0 }}g protein</span>
                                                            </div>
                                                            <div class="meal-actions">
                                                                <button type="button" class="btn-add-meal" data-meal-id="{{ $meal->id }}">
                                                                    <i class="fas fa-plus me-1"></i>Sélectionner pour assignation
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <!-- Hidden inputs for assignments -->
                                            <div id="assignment-inputs"></div>

                                            @error('assignments')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Form Actions -->
                                <div class="form-actions">
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <a href="{{ route('meal-plans.front.show', $mealPlan->id) }}" class="btn btn-outline-secondary w-100">
                                                <i class="fas fa-eye me-2"></i>Voir le plan
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="{{ route('meal-plans.front.index') }}" class="btn btn-outline-secondary w-100">
                                                <i class="fas fa-arrow-left me-2"></i>Annuler
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-primary w-100">
                                                <i class="fas fa-save me-2"></i>Mettre à jour
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- meal-plan-edit-area-end -->

    </main>
@endsection

@php
    $existingAssignments = $mealPlan->assignments->mapWithKeys(function($assignment) {
        return [$assignment->day_number . '_' . $assignment->meal_time => [
            'meal_id' => $assignment->meal_id,
            'meal_name' => $assignment->meal->name
        ]];
    });
    
    $oldAssignments = old('assignments', []);
    $allAssignments = $existingAssignments->toArray();
    
    foreach($oldAssignments as $assignment) {
        $key = $assignment['day_number'] . '_' . $assignment['meal_time'];
        $allAssignments[$key] = [
            'meal_id' => $assignment['meal_id'],
            'meal_name' => $assignment['meal_name'] ?? 'Unknown Meal'
        ];
    }
    
    $mealTimes = config('meal_times.values');
    $mealTimeLabels = config('meal_times.labels');
@endphp

@push('frontoffice-scripts')
<script>
let selectedMeal = null;
let selectedMealIds = new Set();
// Initialize data from server
let mealAssignments = JSON.parse('{!! addslashes(json_encode($allAssignments)) !!}');
let mealTimes = JSON.parse('{!! addslashes(json_encode($mealTimes)) !!}');
let mealTimeLabels = JSON.parse('{!! addslashes(json_encode($mealTimeLabels)) !!}');

// Generate meal assignment grid
function generateMealGrid() {
    const totalDays = parseInt(document.getElementById('total_days').value) || 1;
    
    const grid = document.getElementById('meal-assignment-grid');
    grid.style.display = 'block';
    
    let gridHtml = '<div class="table-responsive">';
    gridHtml += '<table class="grid-table">';
    gridHtml += '<thead>';
    gridHtml += '<tr>';
    gridHtml += '<th class="day-header">Jour</th>';
    
    mealTimes.forEach(mealTime => {
        gridHtml += `<th class="meal-time-header">${mealTimeLabels[mealTime]}</th>`;
    });
    gridHtml += '</tr>';
    gridHtml += '</thead>';
    gridHtml += '<tbody>';
    
    for (let day = 1; day <= totalDays; day++) {
        gridHtml += '<tr>';
        gridHtml += `<td class="day-header">Jour ${day}</td>`;
        
        mealTimes.forEach(mealTime => {
            const key = `${day}_${mealTime}`;
            const assignment = mealAssignments[key];
            
            gridHtml += `<td class="meal-cell" data-day="${day}" data-meal-time="${mealTime}">`;
            if (assignment) {
                gridHtml += `<div class="assigned-meal">`;
                gridHtml += `<span class="meal-name">${assignment.meal_name}</span>`;
                gridHtml += `<button type="button" class="btn-remove-assignment" onclick="removeMealAssignment('${key}')">&times;</button>`;
                gridHtml += `</div>`;
            } else {
                gridHtml += `<div class="empty-slot" onclick="selectMealSlot('${day}', '${mealTime}')">`;
                gridHtml += `<i class="fas fa-plus"></i>`;
                gridHtml += `</div>`;
            }
            gridHtml += `</td>`;
        });
        gridHtml += '</tr>';
    }
    
    gridHtml += '</tbody>';
    gridHtml += '</table>';
    gridHtml += '</div>';
    grid.innerHTML = gridHtml;
    
    updateAssignmentInputs();
}

// Select meal slot for assignment
function selectMealSlot(day, mealTime) {
    if (!selectedMeal) {
        alert('Veuillez d\'abord sélectionner un repas dans la section "Repas disponibles"');
        return;
    }
    
    const key = `${day}_${mealTime}`;
    mealAssignments[key] = {
        meal_id: selectedMeal.id,
        meal_name: selectedMeal.name
    };
    
    // Update grid
    generateMealGrid();
    
    // Reset selection
    selectedMeal = null;
    document.querySelectorAll('.meal-card').forEach(card => card.classList.remove('selected'));
}

// Remove meal assignment
function removeMealAssignment(key) {
    delete mealAssignments[key];
    generateMealGrid();
}

// Update hidden inputs for form submission
function updateAssignmentInputs() {
    const container = document.getElementById('assignment-inputs');
    container.innerHTML = '';
    
    // Only create inputs for assignments with valid meal_id
    let index = 0;
    Object.keys(mealAssignments).forEach(key => {
        const [day, mealTime] = key.split('_');
        const assignment = mealAssignments[key];
        
        // Only create inputs for assignments with valid meal_id
        if (assignment && assignment.meal_id && assignment.meal_id.trim() !== '') {
            const inputHtml = `
                <input type="hidden" name="assignments[${index}][day_number]" value="${day}">
                <input type="hidden" name="assignments[${index}][meal_time]" value="${mealTime}">
                <input type="hidden" name="assignments[${index}][meal_id]" value="${assignment.meal_id}">
            `;
            container.insertAdjacentHTML('beforeend', inputHtml);
            index++;
        }
    });
    
    // Don't add empty input - let the controller handle empty assignments
}

// Meal search functionality
document.getElementById('meal-search').addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    document.querySelectorAll('.meal-card').forEach(card => {
        const mealName = card.getAttribute('data-meal-name').toLowerCase();
        const mealDescription = card.getAttribute('data-meal-description').toLowerCase();
        if (mealName.includes(searchTerm) || mealDescription.includes(searchTerm)) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
});

// Meal selection
document.querySelectorAll('.meal-card').forEach(card => {
    card.addEventListener('click', function() {
        // Remove previous selection
        document.querySelectorAll('.meal-card').forEach(c => c.classList.remove('selected'));
        
        // Add selection to clicked card
        this.classList.add('selected');
        selectedMeal = {
            id: this.getAttribute('data-meal-id'),
            name: this.querySelector('.meal-name').textContent
        };
    });
});

// Generate grid button
document.getElementById('generate-grid-btn').addEventListener('click', function() {
    generateMealGrid();
});

// Validate meal assignments before form submission
function validateMealAssignments() {
    const totalDays = parseInt(document.getElementById('total_days').value) || 1;
    const daysWithoutMeals = [];
    
    // Check each day for at least one meal
    for (let day = 1; day <= totalDays; day++) {
        let hasMeal = false;
        Object.keys(mealAssignments).forEach(key => {
            const [assignmentDay, mealTime] = key.split('_');
            if (parseInt(assignmentDay) === day && mealAssignments[key] && mealAssignments[key].meal_id) {
                hasMeal = true;
            }
        });
        
        if (!hasMeal) {
            daysWithoutMeals.push(day);
        }
    }
    
    return daysWithoutMeals;
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    // Auto-generate grid if total_days is set
    const totalDaysInput = document.getElementById('total_days');
    if (totalDaysInput.value) {
        generateMealGrid();
    }
    
    // Generate grid when total_days changes
    totalDaysInput.addEventListener('change', function() {
        if (this.value) {
            generateMealGrid();
        }
    });
    
    // Add form validation
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const daysWithoutMeals = validateMealAssignments();
            
            if (daysWithoutMeals.length > 0) {
                e.preventDefault();
                
                let message;
                if (daysWithoutMeals.length === 1) {
                    message = `Day ${daysWithoutMeals[0]} must have at least one meal assigned.`;
                } else {
                    message = `Days ${daysWithoutMeals.join(', ')} must have at least one meal assigned.`;
                }
                
                alert(message);
                return false;
            }
        });
    });
});
</script>
@endpush

@push('frontoffice-styles')
<!-- Load dedicated form styles -->
@vite('resources/css/frontoffice-forms.css')
@vite('resources/css/meal-plan-forms.css')
@endpush
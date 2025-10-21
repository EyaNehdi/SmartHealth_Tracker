@extends('shared.layouts.frontoffice')

@section('page-title', $mealPlan->name . ' - SmartHealth Tracker')

@section('content')
    <main class="main-area fix">

        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg"
            data-background="{{ Vite::asset('resources/assets/img/bg/sd_bg.html') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="breadcrumb__content text-center">
                            <h2 class="title">{{ $mealPlan->name }}</h2>
                            <nav class="breadcrumb">
                                <span><a href="{{ route('home') }}">Home</a></span>
                                <span class="breadcrumb-separator">|</span>
                                <span><a href="{{ route('meal-plans.front.index') }}">Plans de Repas</a></span>
                                <span class="breadcrumb-separator">|</span>
                                <span>{{ $mealPlan->name }}</span>
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

        <!-- meal-plan-details-area -->
        <section class="meal-plan-details-area section-py-150">
            <div class="container">
                <!-- Plan Overview -->
                <div class="row mb-5">
                    <div class="col-lg-8">
                        <div class="plan-overview bg-white p-4 rounded shadow-sm">
                            <h3 class="mb-3">À propos de ce plan</h3>
                            <p class="text-muted mb-4">{{ $mealPlan->description }}</p>
                            
                            @if($mealPlan->goals)
                                <div class="plan-goals p-3 bg-light rounded mb-3">
                                    <h5 class="mb-2"><i class="fas fa-bullseye text-primary me-2"></i>Objectifs</h5>
                                    <p class="mb-0">{{ $mealPlan->goals }}</p>
                                </div>
                            @endif

                            @if($mealPlan->dietary_restrictions)
                                <div class="plan-restrictions p-3 bg-light rounded">
                                    <h5 class="mb-2"><i class="fas fa-list-check text-warning me-2"></i>Restrictions alimentaires</h5>
                                    <p class="mb-0">{{ $mealPlan->dietary_restrictions }}</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="plan-stats bg-white p-4 rounded shadow-sm">
                            <h4 class="mb-4 text-center">Statistiques du Plan</h4>
                            
                            <div class="stat-item d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-calendar-alt text-primary me-3 fa-lg"></i>
                                    <span>Durée</span>
                                </div>
                                <strong>{{ $mealPlan->total_days }} jours</strong>
                            </div>

                            <div class="stat-item d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-utensils text-success me-3 fa-lg"></i>
                                    <span>Total repas</span>
                                </div>
                                <strong>{{ $mealPlan->assignments->count() }}</strong>
                            </div>

                            @php
                                $avgCaloriesPerDay = 0;
                                if ($mealPlan->total_days > 0) {
                                    $totalCalories = $mealPlan->assignments->sum(function($assignment) {
                                        return $assignment->meal->total_calories ?? 0;
                                    });
                                    $avgCaloriesPerDay = $totalCalories / $mealPlan->total_days;
                                }
                            @endphp

                            @if($avgCaloriesPerDay > 0)
                                <div class="stat-item d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-fire text-danger me-3 fa-lg"></i>
                                        <span>Cal. moy/jour</span>
                                    </div>
                                    <strong>{{ number_format($avgCaloriesPerDay) }} kcal</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Weekly Schedule -->
                <div class="row">
                    <div class="col-12">
                        <div class="weekly-schedule bg-white p-4 rounded shadow-sm">
                            <h3 class="mb-4"><i class="fas fa-calendar-week text-primary me-2"></i>Planning des Repas</h3>
                            
                            @php
                                $mealsByDay = $mealPlan->assignments->groupBy('day_number')->sortKeys();
                            @endphp

                            @if($mealsByDay->count() > 0)
                                @foreach($mealsByDay as $dayNumber => $assignments)
                                    <div class="day-section mb-4">
                                        <div class="day-header bg-primary text-white p-3 rounded-top">
                                            <h5 class="mb-0">
                                                <i class="fas fa-calendar-day me-2"></i>Jour {{ $dayNumber }}
                                            </h5>
                                        </div>
                                        
                                        <div class="day-meals p-3 border border-top-0 rounded-bottom">
                                            <div class="row g-3">
                                                @foreach($assignments->sortBy('meal_time') as $assignment)
                                                    <div class="col-md-6 col-lg-4">
                                                        <div class="meal-card-mini p-3 bg-light rounded h-100">
                                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                                <span class="badge bg-info text-capitalize">
                                                                    @switch($assignment->meal_time)
                                                                        @case('breakfast')
                                                                            Petit-déjeuner
                                                                            @break
                                                                        @case('lunch')
                                                                            Déjeuner
                                                                            @break
                                                                        @case('dinner')
                                                                            Dîner
                                                                            @break
                                                                        @case('snack')
                                                                            Collation
                                                                            @break
                                                                        @default
                                                                            {{ $assignment->meal_time }}
                                                                    @endswitch
                                                                </span>
                                                                
                                                                @if($assignment->meal->image)
                                                                    <img src="{{ asset('storage/' . $assignment->meal->image) }}" 
                                                                         alt="{{ $assignment->meal->name }}" 
                                                                         class="meal-thumb rounded"
                                                                         width="50" height="50">
                                                                @endif
                                                            </div>
                                                            
                                            <h6 class="mb-2">
                                                <a href="{{ route('meals.front.show', $assignment->meal->id) }}" 
                                                   class="text-decoration-none text-dark">
                                                    {{ $assignment->meal->name }}
                                                </a>
                                            </h6>
                                                            
                                                            <div class="meal-stats-mini d-flex justify-content-between text-muted small">
                                                                <span>
                                                                    <i class="fas fa-fire text-danger"></i>
                                                                    {{ number_format($assignment->meal->total_calories) }} cal
                                                                </span>
                                                                <span>
                                                                    <i class="fas fa-drumstick-bite text-primary"></i>
                                                                    {{ number_format($assignment->meal->total_protein) }}g
                                                                </span>
                                                            </div>

                                            <div class="mt-2">
                                                <a href="{{ route('meals.front.show', $assignment->meal->id) }}" 
                                                   class="btn btn-sm btn-outline-primary w-100">
                                                    Voir le repas
                                                </a>
                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i>
                                    Aucun repas n'a encore été ajouté à ce plan.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Back Button -->
                <div class="row mt-5">
                    <div class="col-12">
                        <a href="{{ route('meal-plans.front.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Retour aux plans de repas
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- meal-plan-details-area-end -->

    </main>
@endsection

@push('frontoffice-styles')
<style>
.plan-overview,
.plan-stats,
.weekly-schedule {
    border: 1px solid #e0e0e0;
}

.plan-goals,
.plan-restrictions {
    border-left: 3px solid #3498db;
}

.plan-restrictions {
    border-left-color: #f39c12;
}

.stat-item {
    font-size: 15px;
}

.day-section {
    transition: all 0.3s ease;
}

.day-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.meal-card-mini {
    transition: all 0.3s ease;
    border: 1px solid #e0e0e0;
}

.meal-card-mini:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    background-color: #fff !important;
}

.meal-card-mini h6 a:hover {
    color: #3498db !important;
}

.meal-thumb {
    object-fit: cover;
    border: 2px solid white;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.meal-stats-mini {
    padding-top: 8px;
    border-top: 1px solid #dee2e6;
}
</style>
@endpush


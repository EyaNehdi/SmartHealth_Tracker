<div class="meal-plans-result-info mb-4 d-flex justify-content-between align-items-center">
    <p class="mb-0">
        <strong>{{ $mealPlans->total() }}</strong> plan(s) de repas disponible(s)
    </p>
</div>

@if($mealPlans->count() > 0)
    <div class="row g-4">
        @foreach($mealPlans as $mealPlan)
            <div class="col-md-6 col-lg-4">
                <div class="meal-plan-card h-100 d-flex flex-column">
                    <div class="meal-plan-card-header position-relative">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="badges-group">
                                <span class="badge bg-success mb-1">Actif</span>
                                @auth
                                    @if($mealPlan->created_by == Auth::id())
                                        <span class="badge bg-success">
                                            <i class="fas fa-check-circle me-1"></i>Possédé
                                        </span>
                                    @endif
                                @endauth
                            </div>
                            <span class="badge bg-primary">{{ $mealPlan->total_days }} jours</span>
                        </div>
                        
                        <h4 class="meal-plan-title mb-2">{{ $mealPlan->name }}</h4>
                        
                        <p class="meal-plan-description mb-0">
                            {{ $mealPlan->description }}
                        </p>
                    </div>
                    
                    <div class="meal-plan-card-body flex-grow-1 d-flex flex-column">
                        <!-- Stats -->
                        <div class="meal-plan-stats mb-4 flex-grow-1">
                            <div class="stat-row d-flex justify-content-between mb-2">
                                <span class="text-muted">
                                    <i class="fas fa-utensils me-2"></i>Repas
                                </span>
                                <strong>{{ $mealPlan->assignments->count() }}</strong>
                            </div>
                            
                            @php
                                $avgCalories = $mealPlan->assignments->avg(function($assignment) {
                                    return $assignment->meal->total_calories ?? 0;
                                });
                            @endphp
                            
                            @if($avgCalories)
                                <div class="stat-row d-flex justify-content-between mb-2">
                                    <span class="text-muted">
                                        <i class="fas fa-fire me-2"></i>Cal. moy/repas
                                    </span>
                                    <strong>{{ number_format($avgCalories) }} kcal</strong>
                                </div>
                            @endif
                        </div>

                        <!-- Goals -->
                        @if($mealPlan->goals)
                            <div class="meal-plan-goals mb-3">
                                <h6 class="mb-2"><i class="fas fa-bullseye me-2 text-primary"></i>Objectifs</h6>
                                <p class="small text-muted mb-0">{{ $mealPlan->goals }}</p>
                            </div>
                        @endif
                        
                        <div class="meal-plan-actions mt-auto">
                            <a href="{{ route('meal-plans.front.show', $mealPlan->id) }}" 
                               class="btn btn-primary w-100 mb-2">
                                Voir le plan
                            </a>
                            
                            @auth
                                @php
                                    $isSaved = $mealPlan->isSavedBy(Auth::id());
                                    $isOwned = $mealPlan->created_by == Auth::id();
                                @endphp
                                
                                @if($isOwned)
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('meal-plans.front.edit', $mealPlan->id) }}" 
                                           class="btn btn-outline-warning flex-fill btn-sm">
                                            <i class="fas fa-edit"></i> Modifier
                                        </a>
                                        <form action="{{ route('meal-plans.front.destroy', $mealPlan->id) }}" 
                                              method="POST" 
                                              class="flex-fill"
                                              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce plan ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger w-100 btn-sm">
                                                <i class="fas fa-trash"></i> Supprimer
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <button class="btn btn-outline-secondary w-100 meal-plan-save-btn {{ $isSaved ? 'saved' : '' }}" 
                                            data-meal-plan-id="{{ $mealPlan->id }}">
                                        @if($isSaved)
                                            <i class="fas fa-check me-1"></i>Sauvegardé
                                        @else
                                            <i class="fas fa-bookmark me-1"></i>Sauvegarder le plan
                                        @endif
                                    </button>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-5">
        {{ $mealPlans->links() }}
    </div>
@else
    <div class="alert alert-info text-center">
        <i class="fas fa-info-circle me-2"></i>
        Aucun plan de repas disponible pour le moment.
    </div>
@endif


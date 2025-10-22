<div class="meals-result-info mb-4 d-flex justify-content-between align-items-center">
    <p class="mb-0">
        <strong>{{ $meals->total() }}</strong> repas trouvé(s)
    </p>
</div>

@if($meals->count() > 0)
    <div class="row g-4">
        @foreach($meals as $meal)
            <div class="col-md-6 col-lg-4">
                <div class="meal-card h-100 d-flex flex-column">
                    <div class="meal-card-image position-relative" style="height: 200px; overflow: hidden;">
                        @if($meal->image)
                            <img src="{{ asset('storage/' . $meal->image) }}" 
                                 alt="{{ $meal->name }}" 
                                 class="w-100 h-100"
                                 style="object-fit: cover;">
                        @else
                            <img src="{{ Vite::asset('resources/assets/img/blog/blog_img01.jpg') }}" 
                                 alt="{{ $meal->name }}" 
                                 class="w-100 h-100"
                                 style="object-fit: cover;">
                        @endif
                        
                        <span class="meal-time-badge badge bg-primary position-absolute" style="top: 10px; left: 10px;">
                            {{ ucfirst($meal->meal_time) }}
                        </span>

                        @auth
                            @php
                                $isOwned = $meal->created_by == Auth::id();
                            @endphp
                            
                            @if($isOwned)
                                <span class="badge bg-success position-absolute" style="top: 10px; right: 10px;">
                                    <i class="fas fa-check-circle me-1"></i>Possédé
                                </span>
                            @endif
                        @endauth
                    </div>
                    
                    <div class="meal-card-body flex-grow-1 d-flex flex-column">
                        <div class="meal-card-header-info mb-3">
                            <h5 class="meal-card-title mb-2">
                                <a href="{{ route('meals.front.show', $meal->id) }}">{{ $meal->name }}</a>
                            </h5>
                        </div>
                        
                        <p class="meal-card-description text-muted mb-3">
                            {{ $meal->description }}
                        </p>
                        
                        <div class="meal-card-stats d-flex justify-content-between mb-3 pt-2 border-top">
                            <div class="stat-item text-center">
                                <i class="fas fa-fire text-danger"></i>
                                <small class="d-block">{{ number_format($meal->total_calories) }} cal</small>
                            </div>
                            <div class="stat-item text-center">
                                <i class="fas fa-drumstick-bite text-primary"></i>
                                <small class="d-block">{{ number_format($meal->total_protein) }}g prot</small>
                            </div>
                            <div class="stat-item text-center">
                                <i class="fas fa-clock text-success"></i>
                                <small class="d-block">{{ $meal->preparation_time }} min</small>
                            </div>
                        </div>
                        
                        <div class="meal-card-actions mt-auto">
                            <a href="{{ route('meals.front.show', $meal->id) }}" 
                               class="btn btn-primary w-100 mb-2">
                                Voir le repas
                            </a>
                            
                            @auth
                                @php
                                    $isSaved = $meal->isSavedBy(Auth::id());
                                    $isOwned = $meal->created_by == Auth::id();
                                @endphp
                                
                                @if($isOwned)
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('meals.front.edit', $meal->id) }}" 
                                           class="btn btn-outline-warning flex-fill btn-sm">
                                            <i class="fas fa-edit"></i> Modifier
                                        </a>
                                        <form action="{{ route('meals.front.destroy', $meal->id) }}" 
                                              method="POST" 
                                              class="flex-fill"
                                              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce repas ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger w-100 btn-sm">
                                                <i class="fas fa-trash"></i> Supprimer
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <button class="btn btn-outline-secondary w-100 meal-save-btn {{ $isSaved ? 'saved' : '' }}" 
                                            data-meal-id="{{ $meal->id }}">
                                        @if($isSaved)
                                            <i class="fas fa-check me-1"></i>Sauvegardé
                                        @else
                                            <i class="fas fa-utensils me-1"></i>Commençons à cuisiner
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
        {{ $meals->links() }}
    </div>
@else
    <div class="alert alert-info text-center">
        <i class="fas fa-info-circle me-2"></i>
        Aucun repas trouvé. Essayez de modifier vos filtres.
    </div>
@endif


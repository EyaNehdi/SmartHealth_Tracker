<!-- Meals Grid -->
@if($meals->count() > 0)
    <div class="row g-4">
        @foreach($meals as $meal)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card meal-card h-100">
                    <!-- Meal Image -->
                    <div class="card-img-container">
                        @if($meal->image)
                            <img src="{{ Storage::url($meal->image) }}" 
                                 alt="{{ $meal->name }}" 
                                 class="card-img-top">
                        @else
                            <div class="card-img-placeholder">
                                <i class="fas fa-utensils"></i>
                            </div>
                        @endif
                    </div>

                    <!-- Card Body -->
                    <div class="card-body d-flex flex-column">
                        <!-- Meal Info - Condensed Header -->
                        <div class="meal-info mb-3">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title mb-0 flex-grow-1 me-2 clickable-title" 
                                    data-url="{{ route('admin.meals.show', $meal) }}"
                                    style="cursor: pointer; text-decoration: underline; color: #007bff;">{{ $meal->name }}</h5>
                                @if($meal->meal_time)
                                    <span class="badge text-white text-nowrap" 
                                          style="background-color: #6c757d;">{{ ucfirst($meal->meal_time) }}</span>
                                @endif
                            </div>
                            <p class="card-text text-muted mb-0">{{ Str::limit($meal->description, 100) }}</p>
                            
                            <!-- Tags -->
                            @if($meal->tags && count($meal->tags) > 0)
                                <div class="meal-tags mt-2">
                                    @foreach(array_slice($meal->tags, 0, 2) as $tag)
                                        <span class="tag">{{ $tag }}</span>
                                    @endforeach
                                    @if(count($meal->tags) > 2)
                                        <span class="tag-more">+{{ count($meal->tags) - 2 }}</span>
                                    @endif
                                </div>
                            @endif
                        </div>

                        <!-- Nutrition Info -->
                        <div class="nutrition-info mb-3 flex-grow-1">
                            <div class="row g-2">
                                <div class="col-6">
                                    <div class="nutrition-item">
                                        <div class="nutrition-value">{{ $meal->total_calories }}</div>
                                        <div class="nutrition-label">Calories</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="nutrition-item">
                                        <div class="nutrition-value">{{ $meal->total_protein }}g</div>
                                        <div class="nutrition-label">Protein</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="nutrition-item">
                                        <div class="nutrition-value">{{ $meal->total_fat }}g</div>
                                        <div class="nutrition-label">Fat</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="nutrition-item">
                                        <div class="nutrition-value">{{ $meal->total_carbs }}g</div>
                                        <div class="nutrition-label">Carbs</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Meal Details -->
                        <div class="meal-details mb-3">
                            <div class="row g-2">
                                <div class="col-6">
                                    <div class="detail-item">
                                        <div class="detail-value">{{ $meal->preparation_time ?? 'N/A' }} min</div>
                                        <div class="detail-label">Prep Time</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="detail-item">
                                        <div class="detail-value">{{ $meal->foodItems->count() }}</div>
                                        <div class="detail-label">Food Items</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons - Horizontal Scroll -->
                        <div class="card-actions mt-auto">
                            <div class="action-buttons-container">
                                <a href="{{ route('admin.meals.show', $meal) }}"
                                    class="btn btn-outline-primary btn-sm action-btn">
                                    <i class="fas fa-eye me-1"></i>View
                                </a>
                                <a href="{{ route('admin.meals.edit', $meal) }}"
                                    class="btn btn-outline-secondary btn-sm action-btn">
                                    <i class="fas fa-edit me-1"></i>Edit
                                </a>
                                <form method="POST" action="{{ route('admin.meals.destroy', $meal) }}"
                                    class="action-btn-form" onsubmit="return confirm('Are you sure you want to delete this meal?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm action-btn">
                                        <i class="fas fa-trash me-1"></i>Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    @if($meals->hasPages())
        <div class="row mt-4">
            <div class="col-12">
                <nav aria-label="Meals pagination">
                    <div class="d-flex justify-content-center">
                        {{ $meals->appends(request()->query())->links() }}
                    </div>
                </nav>
            </div>
        </div>
    @endif
@else
    <div class="content-module">
        <div class="empty-state">
            <i class="fas fa-clipboard-list"></i>
            <h3>No Meals Found</h3>
            <p>Start by creating your first meal by combining food items.</p>
            <a href="{{ route('admin.meals.create') }}" class="btn-action primary">
                Create First Meal
            </a>
        </div>
    </div>
@endif

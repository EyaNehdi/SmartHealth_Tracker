<!-- Meal Plans Grid -->
@if($mealPlans->count() > 0)
    <div class="row g-4">
        @foreach($mealPlans as $mealPlan)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card meal-plan-card h-100">
                    <!-- Card Header -->
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0 clickable-title" 
                            data-url="{{ route('admin.meal-plans.show', $mealPlan) }}"
                            style="cursor: pointer; text-decoration: underline; color: #007bff;">{{ $mealPlan->name }}</h5>
                        <form method="POST" action="{{ route('admin.meal-plans.toggle-active', $mealPlan) }}" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" 
                                    class="btn btn-sm {{ $mealPlan->is_active ? 'btn-outline-danger' : 'btn-outline-success' }}" 
                                    title="{{ $mealPlan->is_active ? 'Deactivate' : 'Activate' }}">
                                {{ $mealPlan->is_active ? 'Deactivate' : 'Activate' }}
                            </button>
                        </form>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body d-flex flex-column">
                        <!-- Description -->
                        @if($mealPlan->description)
                            <div class="meal-plan-description mb-3">
                                <p class="card-text">{{ Str::limit($mealPlan->description, 120) }}</p>
                            </div>
                        @endif

                        <!-- Plan Details -->
                        <div class="plan-details mb-3">
                            <div class="row g-2">
                                <div class="col-6">
                                    <div class="detail-item">
                                        <div class="detail-value">{{ $mealPlan->total_days }}</div>
                                        <div class="detail-label">Days</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="detail-item">
                                        <div class="detail-value">{{ $mealPlan->assignments->count() }}</div>
                                        <div class="detail-label">Meals</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Meals Preview -->
                        @if($mealPlan->assignments->count() > 0)
                            <div class="meals-preview mb-3 flex-grow-1">
                                <h6 class="meals-preview-title">Meals in this plan:</h6>
                                <div class="meals-list">
                                    @foreach($mealPlan->assignments->take(3) as $assignment)
                                        <div class="meal-item">
                                            @if($assignment->meal->image)
                                                <img src="{{ Storage::url($assignment->meal->image) }}" 
                                                     alt="{{ $assignment->meal->name }}" 
                                                     class="meal-thumbnail">
                                            @else
                                                <div class="meal-thumbnail-placeholder">
                                                    <i class="fas fa-utensils"></i>
                                                </div>
                                            @endif
                                            <div class="meal-info">
                                                <div class="meal-name">{{ $assignment->meal->name }}</div>
                                                <div class="meal-time">{{ ucfirst($assignment->meal_time) }} - Day {{ $assignment->day_number }}</div>
                                            </div>
                                            <div class="meal-calories">{{ $assignment->meal->total_calories }} cal</div>
                                        </div>
                                    @endforeach
                                    @if($mealPlan->assignments->count() > 3)
                                        <div class="meals-more">
                                            <small>+{{ $mealPlan->assignments->count() - 3 }} more meals</small>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif

                        <!-- Action Buttons - Horizontal Scroll -->
                        <div class="card-actions mt-auto">
                            <div class="action-buttons-container">
                                <a href="{{ route('admin.meal-plans.show', $mealPlan) }}"
                                    class="btn btn-outline-primary btn-sm action-btn">
                                    <i class="fas fa-eye me-1"></i>View
                                </a>
                                <a href="{{ route('admin.meal-plans.edit', $mealPlan) }}"
                                    class="btn btn-outline-secondary btn-sm action-btn">
                                    <i class="fas fa-edit me-1"></i>Edit
                                </a>
                                <form method="POST" action="{{ route('admin.meal-plans.destroy', $mealPlan) }}"
                                    class="action-btn-form" onsubmit="return confirm('Are you sure you want to delete this meal plan?')">
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
    @if($mealPlans->hasPages())
        <div class="row mt-4">
            <div class="col-12">
                <nav aria-label="Meal plans pagination">
                    <div class="d-flex justify-content-center">
                        {{ $mealPlans->appends(request()->query())->links() }}
                    </div>
                </nav>
            </div>
        </div>
    @endif
@else
    <div class="content-module">
        <div class="empty-state">
            <i class="fas fa-calendar-alt"></i>
            <h3>No Meal Plans Found</h3>
            <p>Create meal plans to organize your meals by schedule.</p>
            <a href="{{ route('admin.meal-plans.create') }}" class="btn-action primary">
                Create First Meal Plan
            </a>
        </div>
    </div>
@endif

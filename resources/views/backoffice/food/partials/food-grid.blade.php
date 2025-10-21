<!-- Food Items Grid -->
@if($foods->count() > 0)
<div class="row g-4">
    @foreach($foods as $food)
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card food-card h-100">
            <!-- Food Image -->
            <div class="card-img-container">
                @if($food->image)
                <img src="{{ Storage::url($food->image) }}"
                    alt="{{ $food->name }}"
                    class="card-img-top">
                @else
                <div class="card-img-placeholder">
                    <i class="fas fa-apple-alt"></i>
                </div>
                @endif
            </div>

            <!-- Card Body -->
            <div class="card-body d-flex flex-column">
                <!-- Food Info - Condensed Header -->
                <div class="food-info mb-3">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="card-title mb-0 flex-grow-1 me-2 clickable-title" 
                            data-url="{{ route('admin.food.show', $food) }}"
                            style="cursor: pointer; text-decoration: underline; color: #007bff;">{{ $food->name }}</h5>
                        <span class="badge bg-secondary text-nowrap">{{ $food->formatted_serving_size ?? 'N/A' }}</span>
                    </div>
                    <p class="card-text text-muted mb-0">{{ Str::limit($food->description, 100) }}</p>
                </div>

                <!-- Nutrition Info -->
                <div class="nutrition-info mb-3 flex-grow-1">
                    <div class="row g-2">
                        <div class="col-6">
                            <div class="nutrition-item">
                                <div class="nutrition-value">{{ $food->calories }}</div>
                                <div class="nutrition-label">Calories</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="nutrition-item">
                                <div class="nutrition-value">{{ $food->protein }}g</div>
                                <div class="nutrition-label">Protein</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="nutrition-item">
                                <div class="nutrition-value">{{ $food->fat }}g</div>
                                <div class="nutrition-label">Fat</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="nutrition-item">
                                <div class="nutrition-value">{{ $food->carbs }}g</div>
                                <div class="nutrition-label">Carbs</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons - Horizontal Scroll -->
                <div class="card-actions mt-auto">
                    <div class="action-buttons-container">
                        <a href="{{ route('admin.food.show', $food) }}"
                            class="btn btn-outline-primary btn-sm action-btn">
                            <i class="fas fa-eye me-1"></i>View
                        </a>
                        <a href="{{ route('admin.food.edit', $food) }}"
                            class="btn btn-outline-secondary btn-sm action-btn">
                            <i class="fas fa-edit me-1"></i>Edit
                        </a>
                        <form method="POST" action="{{ route('admin.food.destroy', $food) }}"
                            class="action-btn-form" onsubmit="return confirm('Are you sure you want to delete this food item?')">
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
@if($foods->hasPages())
<div class="row mt-4">
    <div class="col-12">
        <nav aria-label="Food items pagination">
            <div class="d-flex justify-content-center">
                {{ $foods->appends(request()->query())->links() }}
            </div>
        </nav>
    </div>
</div>
@endif
@else
<div class="content-module">
    <div class="empty-state">
        <i class="fas fa-apple-alt"></i>
        <h3>No Food Items Found</h3>
        <p>Start by adding some food items to your database.</p>
        <a href="{{ route('admin.food.add') }}" class="btn-action primary">
            Add First Food Item
        </a>
    </div>
</div>
@endif

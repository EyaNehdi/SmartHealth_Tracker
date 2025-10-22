@extends('shared.layouts.backoffice')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="enhanced-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.adminPanel') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.meals.list') }}">Meals</a></li>
                <li class="breadcrumb-item active">{{ $meal->name }}</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-0">{{ $meal->name }}</h1>
            <div class="action-buttons">
                <a href="{{ route('admin.meals.edit', $meal) }}" class="btn-action primary">
                    Edit Meal
                </a>
                <a href="{{ route('admin.meals.list') }}" class="btn-action secondary">
                    Back to List
                </a>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Main Meal Information -->
        <div class="col-lg-8">
            <div class="content-module">
                <div class="module-header">
                    <h3 class="module-title">Meal Information</h3>
                </div>
                <div class="module-body">
                    <div class="row">
                        <!-- Meal Image -->
                        @if($meal->image)
                        <div class="col-md-4 text-center mb-3 mb-md-0">
                            <img src="{{ Storage::url($meal->image) }}" 
                                 alt="{{ $meal->name }}" 
                                 class="img-fluid rounded shadow-sm meal-image">
                        </div>
                        @endif
                        
                        <!-- Meal Details -->
                        <div class="{{ $meal->image ? 'col-md-8' : 'col-12' }}">
                            @if(!$meal->image)
                            <h4 class="mb-3">{{ $meal->name }}</h4>
                            @endif
                            
                            @if($meal->description)
                                <p class="text-muted mb-4">{{ $meal->description }}</p>
                            @endif

                            <!-- Meal Details List -->
                            <ul class="list-group list-group-flush shadow-sm rounded">
                                <li class="list-group-item d-flex justify-content-between">
                                    <strong>Meal Time:</strong>
                                    <span class="badge bg-info">{{ ucfirst($meal->meal_time ?? 'Not specified') }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <strong>Preparation Time:</strong>
                                    <span>{{ $meal->formatted_preparation_time }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <strong>Total Calories:</strong>
                                    <span class="text-primary fw-bold">{{ number_format($meal->total_calories, 1) }} kcal</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <strong>Total Protein:</strong>
                                    <span class="text-success fw-bold">{{ number_format($meal->total_protein, 1) }} g</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <strong>Total Fat:</strong>
                                    <span class="text-warning fw-bold">{{ number_format($meal->total_fat, 1) }} g</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <strong>Total Carbs:</strong>
                                    <span class="text-info fw-bold">{{ number_format($meal->total_carbs, 1) }} g</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <strong>Food Items Count:</strong>
                                    <span>{{ $meal->foodItems->count() }} items</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <strong>Created:</strong>
                                    <span>{{ $meal->created_at->format('M d, Y') }}</span>
                                </li>
                            </ul>

                            <!-- Tags -->
                            @if($meal->tags && count($meal->tags) > 0)
                                <div class="mt-3">
                                    <strong class="text-muted">Tags:</strong>
                                    <div class="mt-2">
                                        @foreach($meal->tags as $tag)
                                            <span class="badge bg-secondary me-1">{{ $tag }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <!-- Notes -->
                            @if($meal->notes)
                                <div class="mt-3">
                                    <strong class="text-muted">Notes:</strong>
                                    <p class="mt-2 text-muted">{{ $meal->notes }}</p>
                                </div>
                            @endif

                            <!-- Recipe Information -->
                            @if($meal->recipe_description || $meal->recipe_attachment)
                                <div class="mt-3">
                                    <strong class="text-muted">Recipe Information:</strong>
                                    @if($meal->recipe_description)
                                        <div class="mt-2">
                                            <p class="text-muted">{{ $meal->recipe_description }}</p>
                                        </div>
                                    @endif
                                    @if($meal->recipe_attachment)
                                        <div class="mt-2">
                                            @if(filter_var($meal->recipe_attachment, FILTER_VALIDATE_URL))
                                                <a href="{{ $meal->recipe_attachment }}" target="_blank" class="btn-action primary">
                                                    View Recipe Link
                                                </a>
                                            @else
                                                <a href="{{ Storage::url($meal->recipe_attachment) }}" target="_blank" class="btn-action primary">
                                                    Download Recipe
                                                </a>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions Sidebar -->
        <div class="col-lg-4">
            <div class="content-module">
                <div class="module-header">
                    <h3 class="module-title">Quick Actions</h3>
                </div>
                <div class="module-body">
                    <div class="d-grid gap-3">
                        <a href="{{ route('admin.meals.edit', $meal) }}" class="btn-action-outline primary">
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit Meal Details
                        </a>
                        <a href="{{ route('admin.meals.edit', $meal) }}" class="btn-action-outline success">
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Food Items
                        </a>
                        <a href="{{ route('admin.meals.list') }}" class="btn-action-outline secondary">
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Back to Meals List
                        </a>
                        <form method="POST" action="{{ route('admin.meals.destroy', $meal) }}" 
                              onsubmit="return confirm('Are you sure you want to delete this meal?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-action-outline danger w-100">
                                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Delete Meal
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Nutritional Summary -->
            <div class="content-module mt-4">
                <div class="module-header">
                    <h3 class="module-title">Nutritional Summary</h3>
                </div>
                <div class="module-body">
                    <div class="nutrition-summary">
                        <div class="nutrition-item">
                            <div class="nutrition-value text-primary">{{ number_format($meal->total_calories, 0) }}</div>
                            <div class="nutrition-label">Calories</div>
                        </div>
                        <div class="nutrition-item">
                            <div class="nutrition-value text-success">{{ number_format($meal->total_protein, 1) }}g</div>
                            <div class="nutrition-label">Protein</div>
                        </div>
                        <div class="nutrition-item">
                            <div class="nutrition-value text-warning">{{ number_format($meal->total_fat, 1) }}g</div>
                            <div class="nutrition-label">Fat</div>
                        </div>
                        <div class="nutrition-item">
                            <div class="nutrition-value text-info">{{ number_format($meal->total_carbs, 1) }}g</div>
                            <div class="nutrition-label">Carbs</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ingredients Management Section -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="content-module">
                <div class="module-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="module-title">Food Items</h3>
                        <a href="{{ route('admin.meals.edit', $meal) }}" class="btn-action-outline primary">
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Manage Food Items
                        </a>
                    </div>
                </div>
                <div class="module-body">
                    @if($meal->foodItems->count() > 0)
                        <div class="food-items-list">
                            @foreach($meal->foodItems as $foodItem)
                            <div class="food-item-card">
                                <div class="food-item-info">
                                    <div class="food-item-name">{{ $foodItem->name }}</div>
                                    <div class="food-item-quantity">{{ $foodItem->pivot->quantity }} {{ $foodItem->pivot->unit ?? 'g' }}</div>
                                    <div class="food-item-nutrition">
                                        {{ number_format($foodItem->calories * ($foodItem->pivot->quantity / 100), 1) }} cal | 
                                        {{ number_format($foodItem->protein * ($foodItem->pivot->quantity / 100), 1) }}g protein | 
                                        {{ number_format($foodItem->fat * ($foodItem->pivot->quantity / 100), 1) }}g fat | 
                                        {{ number_format($foodItem->carbs * ($foodItem->pivot->quantity / 100), 1) }}g carbs
                                    </div>
                                </div>
                                <div class="food-item-actions">
                                    <form method="POST" action="{{ route('admin.meals.remove-ingredient', [$meal, $foodItem]) }}" 
                                          onsubmit="return confirm('Remove {{ $foodItem->name }} from this meal?')" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-remove-food-item">
                                            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="empty-state">
                            <svg width="48" height="48" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="text-muted">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                            <h4>No Food Items Added</h4>
                            <p>Start by adding food items to this meal.</p>
                            <a href="{{ route('admin.meals.edit', $meal) }}" class="btn-action-outline primary">
                                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Add First Food Item
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('backoffice-scripts')
<style>
    .meal-image {
        max-height: 300px;
        object-fit: cover;
    }

    .nutrition-summary {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1rem;
        padding: 1rem;
        background: #f8f9fa;
        border-radius: 8px;
    }

    .nutrition-item {
        text-align: center;
    }

    .nutrition-value {
        font-size: 1.2rem;
        font-weight: 700;
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

    /* Outline Button Styles */
    .btn-action-outline {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        border: 2px solid;
        border-radius: 0.5rem;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.2s ease;
        width: 100%;
        font-size: 0.875rem;
    }

    .btn-action-outline.primary {
        color: #007bff;
        border-color: #007bff;
        background: transparent;
    }

    .btn-action-outline.primary:hover {
        color: white;
        background: #007bff;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
    }

    .btn-action-outline.success {
        color: #28a745;
        border-color: #28a745;
        background: transparent;
    }

    .btn-action-outline.success:hover {
        color: white;
        background: #28a745;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(40, 167, 69, 0.3);
    }

    .btn-action-outline.secondary {
        color: #6c757d;
        border-color: #6c757d;
        background: transparent;
    }

    .btn-action-outline.secondary:hover {
        color: white;
        background: #6c757d;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
    }

    .btn-action-outline.danger {
        color: #dc3545;
        border-color: #dc3545;
        background: transparent;
    }

    .btn-action-outline.danger:hover {
        color: white;
        background: #dc3545;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
    }

    /* Food Items List */
    .food-items-list {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .food-item-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1rem;
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 0.5rem;
        transition: all 0.2s ease;
    }

    .food-item-card:hover {
        background: #e9ecef;
        transform: translateY(-1px);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .food-item-info {
        flex: 1;
    }

    .food-item-name {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.25rem;
        font-size: 1rem;
    }

    .food-item-quantity {
        font-size: 0.875rem;
        color: #6c757d;
        margin-bottom: 0.25rem;
    }

    .food-item-nutrition {
        font-size: 0.8rem;
        color: #9ca3af;
        line-height: 1.3;
    }

    .food-item-actions {
        margin-left: 1rem;
    }

    .btn-remove-food-item {
        background: #dc3545;
        color: white;
        border: none;
        border-radius: 0.375rem;
        width: 36px;
        height: 36px;
        cursor: pointer;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-remove-food-item:hover {
        background: #c82333;
        transform: scale(1.05);
    }

    .empty-state {
        text-align: center;
        padding: 3rem 1rem;
        color: #6c757d;
    }

    .empty-state svg {
        margin-bottom: 1rem;
    }

    .empty-state h4 {
        margin-bottom: 0.5rem;
        color: #495057;
    }

    .empty-state p {
        margin-bottom: 1.5rem;
    }

    @media (max-width: 768px) {
        .nutrition-summary {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .food-item-card {
            flex-direction: column;
            text-align: center;
            gap: 1rem;
        }
        
        .food-item-actions {
            margin-left: 0;
        }
    }
</style>
@endpush

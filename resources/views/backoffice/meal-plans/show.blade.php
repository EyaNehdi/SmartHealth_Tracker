@extends('shared.layouts.backoffice')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="enhanced-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.adminPanel') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.meal-plans.list') }}">Meal Plans</a></li>
                <li class="breadcrumb-item active">{{ $mealPlan->name }}</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-0">{{ $mealPlan->name }}</h1>
            <div class="action-buttons">
                <a href="{{ route('admin.meal-plans.list') }}" class="btn-action secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to List
                </a>
                <a href="{{ route('admin.meal-plans.edit', $mealPlan) }}" class="btn-action primary">
                    <i class="fas fa-edit me-2"></i>Edit Meal Plan
                </a>
            </div>
        </div>
    </div>

    <!-- Meal Plan Details -->
    <div class="row">
        <!-- Basic Information -->
        <div class="col-md-4">
            <div class="info-card">
                <div class="card-header">
                    <h5 class="card-title">Plan Information</h5>
                </div>
                <div class="card-body">
                    <div class="info-item">
                        <label class="info-label">Name</label>
                        <span class="info-value">{{ $mealPlan->name }}</span>
                    </div>
                    
                    @if($mealPlan->description)
                    <div class="info-item">
                        <label class="info-label">Description</label>
                        <span class="info-value">{{ $mealPlan->description }}</span>
                    </div>
                    @endif
                    
                    <div class="info-item">
                        <label class="info-label">Total Days</label>
                        <span class="info-value">{{ $mealPlan->total_days }} days</span>
                    </div>
                    
                    <div class="info-item">
                        <label class="info-label">Status</label>
                        <span class="info-value">
                            @if($mealPlan->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </span>
                    </div>
                    
                    <div class="info-item">
                        <label class="info-label">Created By</label>
                        <span class="info-value">{{ $mealPlan->user->name ?? 'Unknown' }}</span>
                    </div>
                    
                    <div class="info-item">
                        <label class="info-label">Created At</label>
                        <span class="info-value">{{ $mealPlan->created_at->format('M d, Y') }}</span>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="info-card mt-4">
                <div class="card-header">
                    <h5 class="card-title">Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.meal-plans.edit', $mealPlan) }}" class="btn-action-outline">
                            <i class="fas fa-edit me-2"></i>Edit Meal Plan
                        </a>
                        <form method="POST" action="{{ route('admin.meal-plans.destroy', $mealPlan) }}" 
                              onsubmit="return confirm('Are you sure you want to delete this meal plan?')" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-action-outline w-100">
                                <i class="fas fa-trash me-2"></i>Delete Meal Plan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Meal Plan Schedule -->
        <div class="col-md-8">
            <div class="info-card">
                <div class="card-header">
                    <h5 class="card-title">Meal Plan Schedule</h5>
                    <div class="card-actions">
                        <span class="badge bg-info">{{ $mealPlan->assignments->count() }} meals total</span>
                    </div>
                </div>
                <div class="card-body">
                    @if($mealPlan->assignments->count() > 0)
                        @php
                            $assignmentsByDay = $mealPlan->assignments->groupBy('day_number');
                        @endphp
                        
                        @for($day = 1; $day <= $mealPlan->total_days; $day++)
                            <div class="day-section">
                                <div class="day-header">
                                    <h6 class="day-title">Day {{ $day }}</h6>
                                </div>
                                
                                <div class="day-meals" id="day-{{ $day }}-meals">
                                    @if(isset($assignmentsByDay[$day]) && count($assignmentsByDay[$day]) > 0)
                                        @foreach($assignmentsByDay[$day] as $assignment)
                                            <div class="day-meal-item">
                                                <div class="day-meal-info">
                                                    <div class="day-meal-name">{{ $assignment->meal->name }}</div>
                                                    <div class="day-meal-time">{{ ucfirst($assignment->meal_time) }}</div>
                                                    <div class="day-meal-nutrition">
                                                        <small class="text-muted">
                                                            {{ $assignment->meal->total_calories ?? 0 }} cal | 
                                                            {{ $assignment->meal->total_protein ?? 0 }}g protein
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="empty-day">
                                            <i class="fas fa-utensils me-2"></i>No meals assigned to this day
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endfor
                    @else
                        <div class="empty-state">
                            <div class="empty-state-icon">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <h5 class="empty-state-title">No Meals Assigned</h5>
                            <p class="empty-state-text">This meal plan doesn't have any meals assigned yet.</p>
                            <a href="{{ route('admin.meal-plans.edit', $mealPlan) }}" class="btn-action primary">
                                <i class="fas fa-plus me-2"></i>Add Meals to Plan
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('backoffice-styles')
<!-- Enhanced meal plan show page styles are now loaded via Vite -->
@endpush

@push('backoffice-scripts')
<script>

</script>
@endpush

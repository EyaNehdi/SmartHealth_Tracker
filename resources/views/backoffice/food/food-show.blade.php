@extends('shared.layouts.backoffice')

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="mb-0">{{ $food->name }} Details</h3>
        <div>
            <a href="{{ route('admin.food.list') }}" class="btn btn-outline-secondary btn-sm mr-2" title="Back to Food List">
                <i class="fas fa-arrow-left"></i> Back to List
            </a>
            <a href="{{ route('admin.food.edit', $food->id) }}" class="btn btn-primary btn-sm" title="Edit Food Item">
                <i class="fas fa-edit"></i> Edit
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            @if($food->image)
            <div class="col-md-4 text-center mb-3 mb-md-0">
                <img src="{{ asset('storage/' . $food->image) }}" alt="{{ $food->name }}" class="img-fluid rounded shadow-sm" style="max-height: 250px; object-fit: cover;">
            </div>
            @endif
            <div class="{{ $food->image ? 'col-md-8' : 'col-12' }}">
                @if(!$food->image)
                <h4 class="mb-3">{{ $food->name }}</h4>
                @endif
                <p class="text-muted mb-4">{{ $food->description ?: 'No description available.' }}</p>

                <ul class="list-group list-group-flush shadow-sm rounded">
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Calories:</strong>
                        <span>{{ $food->calories ?? 'N/A' }} kcal</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Protein:</strong>
                        <span>{{ $food->protein ?? 'N/A' }} g</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Fat:</strong>
                        <span>{{ $food->fat ?? 'N/A' }} g</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Carbohydrates:</strong>
                        <span>{{ $food->carbs ?? 'N/A' }} g</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Serving Size:</strong>
                        <span>{{ $food->serving_size ?? 'N/A' }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

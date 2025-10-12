@php
$currentPage = request()->get('page', 1);
$perPage = 5;
$foodItems = $meal->foodItems;
$totalItems = $foodItems->count();
$totalPages = ceil($totalItems / $perPage);
$currentPage = max(1, min($currentPage, $totalPages));
$offset = ($currentPage - 1) * $perPage;
$paginatedItems = $foodItems->slice($offset, $perPage);
@endphp

<div class="food-items-list">
    @foreach($paginatedItems as $index => $food)
    <div class="food-item">
        <div class="food-image-wrapper">
            <img src="{{ $food->image ? asset('storage/' . $food->image) : asset('assets/placeholder.png') }}"
                alt="{{ $food->name }}"
                class="food-image">
        </div>
        <div class="food-info">
            <div class="food-name">{{ $food->name }}</div>
            <div class="food-quantity">Quantity: {{ $food->pivot->quantity }} {{ $food->pivot->unit ?? '' }}</div>
        </div>
    </div>
    @endforeach
</div>

@if($totalPages > 1)
<div class="pagination-controls">
    <div class="pagination-buttons">
        <button class="btn-page" data-page="{{ $currentPage - 1 }}" {{ $currentPage <= 1 ? 'disabled' : '' }}>
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: inline-block; vertical-align: middle;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Previous
        </button>

        <span class="pagination-info">Page {{ $currentPage }} of {{ $totalPages }}</span>

        <button class="btn-page" data-page="{{ $currentPage + 1 }}" {{ $currentPage >= $totalPages ? 'disabled' : '' }}>
            Next
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: inline-block; vertical-align: middle;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>
    </div>
</div>
@endif

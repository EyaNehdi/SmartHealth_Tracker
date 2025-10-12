@extends('shared.layouts.backoffice')

@section('content')
<style>
    .meal-details-wrapper {
        padding: 2rem 0;
        max-width: 1200px;
        margin: 0 auto;
    }

    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: #6c757d;
        text-decoration: none;
        font-size: 0.95rem;
        margin-bottom: 1.5rem;
        transition: color 0.2s ease;
    }

    .back-button:hover {
        color: #495057;
    }

    .meal-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }

    .meal-header {
        padding: 2rem;
        border-bottom: 1px solid #e9ecef;
    }

    .meal-title-row {
        display: flex;
        justify-content: space-between;
        align-items: start;
        gap: 1.5rem;
        margin-bottom: 1rem;
    }

    .meal-title {
        font-size: 1.75rem;
        font-weight: 600;
        color: #212529;
        margin: 0;
    }

    .action-buttons {
        display: flex;
        gap: 0.75rem;
        flex-shrink: 0;
    }

    .btn-action {
        padding: 0.625rem 1.25rem;
        border: none;
        border-radius: 6px;
        font-size: 0.875rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        white-space: nowrap;
    }

    .btn-edit {
        background: #48bb78;
        color: white;
    }

    .btn-edit:hover {
        background: #38a169;
        color: white;
    }

    .btn-delete {
        background: #f56565;
        color: white;
    }

    .btn-delete:hover {
        background: #e53e3e;
    }

    .meal-type-tag {
        display: inline-block;
        padding: 0.5rem 1rem;
        background: #f0f2ff;
        color: #667eea;
        border-radius: 6px;
        font-size: 0.875rem;
        font-weight: 500;
    }

    .meal-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
        padding: 2rem;
    }

    .content-left {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .info-section {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .info-label {
        font-size: 0.875rem;
        font-weight: 600;
        color: #6c757d;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .info-text {
        font-size: 1rem;
        color: #495057;
        line-height: 1.6;
    }

    .image-container {
        width: 100%;
        height: 400px;
        border-radius: 8px;
        overflow: hidden;
        background: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .no-image {
        color: #adb5bd;
        font-size: 0.95rem;
    }

    .food-items-section {
        grid-column: 1 / -1;
        padding-top: 1rem;
        border-top: 1px solid #e9ecef;
    }

    .section-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #212529;
        margin-bottom: 1.25rem;
    }

    .food-items-list {
        display: grid;
        gap: 0.75rem;
        margin-bottom: 1.5rem;
    }

    .food-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background: #f8f9fa;
        border-radius: 8px;
        transition: background 0.2s ease;
    }

    .food-item:hover {
        background: #e9ecef;
    }

    .food-image-wrapper {
        width: 48px;
        height: 48px;
        border-radius: 8px;
        overflow: hidden;
        background: #f8f9fa;
        flex-shrink: 0;
    }

    .food-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .food-info {
        flex: 1;
    }

    .food-name {
        font-weight: 500;
        color: #212529;
        margin-bottom: 0.25rem;
    }

    .food-quantity {
        font-size: 0.875rem;
        color: #6c757d;
    }

    .pagination-controls {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 1rem;
        margin-top: 1.5rem;
    }

    .pagination-info {
        font-size: 0.875rem;
        color: #6c757d;
    }

    .pagination-buttons {
        display: flex;
        gap: 0.5rem;
    }

    .btn-page {
        padding: 0.5rem 1rem;
        background: white;
        border: 1px solid #dee2e6;
        border-radius: 6px;
        color: #495057;
        font-size: 0.875rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .btn-page:hover:not(:disabled) {
        background: #667eea;
        border-color: #667eea;
        color: white;
    }

    .btn-page:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .empty-state {
        text-align: center;
        padding: 2rem;
        color: #adb5bd;
    }

    @media (max-width: 992px) {
        .meal-content {
            grid-template-columns: 1fr;
        }

        .image-container {
            height: 300px;
        }
    }

    @media (max-width: 768px) {
        .meal-details-wrapper {
            padding: 1rem 0;
        }

        .meal-title-row {
            flex-direction: column;
        }

        .action-buttons {
            width: 100%;
        }

        .btn-action {
            flex: 1;
            justify-content: center;
        }

        .meal-title {
            font-size: 1.5rem;
        }

        .image-container {
            height: 250px;
        }
    }
</style>

<div class="meal-details-wrapper">
    <div class="container-fluid">
        <a href="{{ route('admin.meals.list') }}" class="back-button">
            <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Meals
        </a>

        <div class="meal-card">
            <!-- Header Section -->
            <div class="meal-header">
                <div class="meal-title-row">
                    <div>
                        <h1 class="meal-title">{{ $meal->name }}</h1>
                        <span class="meal-type-tag">{{ ucfirst($meal->meal_type ?? 'N/A') }}</span>
                    </div>
                    <div class="action-buttons">
                        <a href="{{ route('admin.meals.edit', $meal->id) }}" class="btn-action btn-edit">
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit
                        </a>
                        <form action="{{ route('admin.meals.destroy', $meal->id) }}" method="POST" style="display: inline-block; margin: 0;" onsubmit="return confirm('Delete {{ addslashes($meal->name) }}?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-action btn-delete">
                                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Content Section -->
            <div class="meal-content">
                <div class="content-left">
                    @if($meal->description)
                    <div class="info-section">
                        <div class="info-label">Description</div>
                        <div class="info-text">{{ $meal->description }}</div>
                    </div>
                    @endif

                    @if($meal->notes)
                    <div class="info-section">
                        <div class="info-label">Notes</div>
                        <div class="info-text">{{ $meal->notes }}</div>
                    </div>
                    @endif
                </div>

                <div>
                    <div class="image-container">
                        @if($meal->image)
                        <img src="{{ asset('storage/' . $meal->image) }}" alt="{{ $meal->name }}">
                        @else
                        <div class="no-image">No image available</div>
                        @endif
                    </div>
                </div>

                <!-- Food Items Section -->
                <div class="food-items-section">
                    <h3 class="section-title">Food Items ({{ $meal->foodItems->count() }})</h3>
                    @if($meal->foodItems->count())
                    <div id="food-items-container">
                        @include('backoffice.meals.partials.food-items-list', ['meal' => $meal])
                    </div>
                    @else
                    <div class="empty-state">
                        <p>No food items added to this meal.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('food-items-container');

        if (!container) return;

        container.addEventListener('click', function(e) {
            const button = e.target.closest('.btn-page');
            if (!button || button.disabled) return;

            const page = button.dataset.page;

            container.querySelectorAll('.btn-page').forEach(btn => btn.disabled = true);

            fetch('{{ route("admin.meals.show", $meal->id) }}?page=' + page, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(html => {
                    container.innerHTML = html;
                })
                .catch(error => {
                    console.error('Error loading food items:', error);
                    container.querySelectorAll('.btn-page').forEach(btn => btn.disabled = false);
                });
        });
    });
</script>
@endsection

@extends('layouts.adminLayout')

@section('content')
<style>
    .meals-dashboard {
        background: #f8f9fa;
        min-height: 100vh;
        padding: 2rem 0;
    }

    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        padding: 0 1rem;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .header-left h2 {
        margin: 0;
        font-size: 1.75rem;
        font-weight: 600;
        color: #212529;
    }

    .header-left p {
        margin: 0.25rem 0 0 0;
        color: #6c757d;
        font-size: 0.95rem;
    }

    .btn-add-meal {
        padding: 0.75rem 1.5rem;
        background: #667eea;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 0.95rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        box-shadow: 0 2px 4px rgba(102, 126, 234, 0.2);
    }

    .btn-add-meal:hover {
        background: #5568d3;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(102, 126, 234, 0.3);
    }

    .search-section {
        background: white;
        padding: 1.5rem;
        border-radius: 12px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        margin-bottom: 1.5rem;
    }

    .search-wrapper {
        position: relative;
        max-width: 500px;
    }

    .search-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
        pointer-events: none;
    }

    #search-input {
        padding: 0.75rem 1rem 0.75rem 2.75rem;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        width: 100%;
    }

    #search-input:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
        outline: none;
    }

    .table-container {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .meals-table {
        margin: 0;
        width: 100%;
    }

    .meals-table thead {
        background: #f8f9fa;
        border-bottom: 2px solid #e9ecef;
    }

    .meals-table thead th {
        padding: 1.25rem 1rem;
        font-weight: 600;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #495057;
        border: none;
    }

    .meals-table tbody tr {
        transition: all 0.2s ease;
        border-bottom: 1px solid #f1f3f5;
    }

    .meals-table tbody tr:hover {
        background: #f8f9fa;
        transform: translateY(-1px);
    }

    .meals-table tbody td {
        padding: 1rem;
        vertical-align: middle;
        color: #495057;
    }

    .meal-image-wrapper {
        position: relative;
        width: 70px;
        height: 70px;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .meal-image-wrapper:hover {
        transform: scale(1.05);
    }

    .meal-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .meal-name {
        font-weight: 500;
        font-size: 1rem;
        color: #212529;
    }

    .meal-type-badge {
        display: inline-block;
        padding: 0.4rem 0.9rem;
        border-radius: 20px;
        font-size: 0.875rem;
        font-weight: 500;
        background: #e7f3ff;
        color: #0066cc;
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
        align-items: center;
        flex-wrap: wrap;
    }

    .btn-custom {
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 6px;
        font-size: 0.875rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        white-space: nowrap;
    }

    .btn-view {
        background: #667eea;
        color: white;
    }

    .btn-view:hover {
        background: #5568d3;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(102, 126, 234, 0.3);
    }

    .btn-edit {
        background: #48bb78;
        color: white;
    }

    .btn-edit:hover {
        background: #38a169;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(72, 187, 120, 0.3);
    }

    .btn-delete {
        background: #f56565;
        color: white;
    }

    .btn-delete:hover {
        background: #e53e3e;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(245, 101, 101, 0.3);
    }

    .empty-state {
        text-align: center;
        padding: 3rem 1rem;
        color: #6c757d;
    }

    .empty-state svg {
        width: 80px;
        height: 80px;
        margin-bottom: 1rem;
        opacity: 0.5;
    }

    @media (max-width: 768px) {
        .dashboard-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .header-left h2 {
            font-size: 1.5rem;
        }

        .btn-add-meal {
            width: 100%;
            justify-content: center;
        }

        .action-buttons {
            flex-direction: column;
            align-items: stretch;
        }

        .btn-custom {
            width: 100%;
        }

        .meals-table {
            font-size: 0.875rem;
        }

        .meal-image-wrapper {
            width: 60px;
            height: 60px;
        }
    }
</style>

<div class="meals-dashboard">
    <div class="container-fluid">
        <!-- Dashboard Header -->
        <div class="dashboard-header">
            <div class="header-left">
                <h2>🍽️ Meals Management</h2>
                <p>Manage and organize your meal database</p>
            </div>
            <a href="{{ route('admin.meals.create') }}" class="btn-add-meal">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add New Meal
            </a>
        </div>

        <!-- Search Section -->
        <div class="search-section">
            <div class="search-wrapper">
                <svg class="search-icon" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input type="text" id="search-input" class="form-control" placeholder="Search meals by name or type...">
            </div>
        </div>

        <!-- Table Container -->
        <div class="table-container">
            <table class="meals-table table">
                <thead>
                    <tr>
                        <th style="width: 100px;">Image</th>
                        <th>Meal Name</th>
                        <th style="width: 180px;">Type</th>
                        <th style="width: 280px;">Actions</th>
                    </tr>
                </thead>
                <tbody id="meals-table-body">
                    @include('admin.meals.partials.meals-table-rows', ['meals' => $meals])
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    const searchInput = document.getElementById('search-input');
    let debounceTimer;

    searchInput.addEventListener('input', function() {
        const query = this.value;

        // Debounce search to avoid excessive requests
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(() => {
            fetch(`{{ route('admin.meals.list') }}?search=${encodeURIComponent(query)}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(html => {
                    document.getElementById('meals-table-body').innerHTML = html;
                })
                .catch(error => {
                    console.error('Error loading meals:', error);
                    document.getElementById('meals-table-body').innerHTML =
                        '<tr><td colspan="4" class="text-center text-danger">Error loading meals. Please try again.</td></tr>';
                });
        }, 300);
    });
</script>

@endsection
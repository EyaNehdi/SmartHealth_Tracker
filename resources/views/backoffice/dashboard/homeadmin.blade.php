@extends('shared.layouts.backoffice')

@section('content')

<!-- Enhanced Dashboard with Modular Design -->
<div class="enhanced-breadcrumb">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.adminPanel') }}"><i class="material-icons">home</i> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>
</div>

<!-- Stats Overview -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon primary">
            <i class="fas fa-utensils"></i>
        </div>
        <div class="stat-value">156</div>
        <div class="stat-label">Food Items</div>
        <div class="stat-change positive">
            <i class="fas fa-arrow-up"></i> +12% from last month
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon success">
            <i class="fas fa-clipboard-list"></i>
        </div>
        <div class="stat-value">89</div>
        <div class="stat-label">Meals Created</div>
        <div class="stat-change positive">
            <i class="fas fa-arrow-up"></i> +8% from last month
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon warning">
            <i class="fas fa-dumbbell"></i>
        </div>
        <div class="stat-value">24</div>
        <div class="stat-label">Equipment Items</div>
        <div class="stat-change negative">
            <i class="fas fa-arrow-down"></i> -3% from last month
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon danger">
            <i class="fas fa-calendar-alt"></i>
        </div>
        <div class="stat-value">12</div>
        <div class="stat-label">Upcoming Events</div>
        <div class="stat-change positive">
            <i class="fas fa-arrow-up"></i> +5 new this week
        </div>
    </div>
</div>

<!-- Main Content Grid -->
<div class="content-grid-2">
    <!-- Recent Activities -->
    <div class="content-module">
        <div class="module-header">
            <h3 class="module-title">
                <i class="fas fa-history"></i>
                Recent Activities
            </h3>
        </div>
        <div class="module-body">
            <div class="activity-list">
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-plus text-success"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-title">New food item added</div>
                        <div class="activity-description">Grilled Chicken Breast added to database</div>
                        <div class="activity-time">2 hours ago</div>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-edit text-primary"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-title">Meal updated</div>
                        <div class="activity-description">Breakfast Bowl recipe modified</div>
                        <div class="activity-time">4 hours ago</div>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-calendar text-warning"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-title">Event scheduled</div>
                        <div class="activity-description">Nutrition Workshop scheduled for next week</div>
                        <div class="activity-time">1 day ago</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="module-footer">
            <a href="#" class="btn-action primary">View All Activities</a>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="content-module">
        <div class="module-header">
            <h3 class="module-title">
                <i class="fas fa-bolt"></i>
                Quick Actions
            </h3>
        </div>
        <div class="module-body">
            <div class="quick-actions-grid">
                <a href="{{ route('admin.food.add') }}" class="quick-action-card">
                    <div class="quick-action-icon">
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="quick-action-title">Add Food Item</div>
                    <div class="quick-action-description">Add new food to database</div>
                </a>
                <a href="{{ route('admin.meals.create') }}" class="quick-action-card">
                    <div class="quick-action-icon">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <div class="quick-action-title">Create Meal</div>
                    <div class="quick-action-description">Create new meal plan</div>
                </a>
                <a href="{{ route('admin.events.create') }}" class="quick-action-card">
                    <div class="quick-action-icon">
                        <i class="fas fa-calendar-plus"></i>
                    </div>
                    <div class="quick-action-title">Schedule Event</div>
                    <div class="quick-action-description">Schedule new event</div>
                </a>
                <a href="{{ route('admin.equipments.create') }}" class="quick-action-card">
                    <div class="quick-action-icon">
                        <i class="fas fa-dumbbell"></i>
                    </div>
                    <div class="quick-action-title">Add Equipment</div>
                    <div class="quick-action-description">Add new equipment</div>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Data Tables Section -->
<div class="content-module">
    <div class="module-header">
        <h3 class="module-title">
            <i class="fas fa-table"></i>
            Recent Data Overview
        </h3>
        <div class="action-buttons">
            <button class="btn-action primary">
                <i class="fas fa-download"></i>
                Export Data
            </button>
            <button class="btn-action success">
                <i class="fas fa-sync"></i>
                Refresh
            </button>
        </div>
    </div>
    <div class="module-body">
        <div class="enhanced-table">
            <table class="table">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span class="badge badge-primary">Food</span></td>
                        <td>Grilled Salmon</td>
                        <td><span class="badge badge-success">Active</span></td>
                        <td>2 hours ago</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-action primary">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-action danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="badge badge-success">Meal</span></td>
                        <td>Breakfast Bowl</td>
                        <td><span class="badge badge-success">Active</span></td>
                        <td>4 hours ago</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-action primary">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-action danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="badge badge-warning">Event</span></td>
                        <td>Nutrition Workshop</td>
                        <td><span class="badge badge-warning">Scheduled</span></td>
                        <td>1 day ago</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-action primary">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-action danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Additional Styles for Dashboard -->
<style>
    .activity-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .activity-item {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        padding: 1rem;
        background: #f8f9fa;
        border-radius: var(--border-radius);
        transition: var(--transition);
    }

    .activity-item:hover {
        background: #e9ecef;
        transform: translateX(4px);
    }

    .activity-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.125rem;
        box-shadow: var(--shadow-sm);
    }

    .activity-content {
        flex: 1;
    }

    .activity-title {
        font-weight: 600;
        color: var(--dark-color);
        margin-bottom: 0.25rem;
    }

    .activity-description {
        color: #6b7280;
        font-size: 0.875rem;
        margin-bottom: 0.25rem;
    }

    .activity-time {
        color: #9ca3af;
        font-size: 0.75rem;
    }

    .quick-actions-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
    }

    .quick-action-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 1.5rem;
        background: #f8f9fa;
        border-radius: var(--border-radius);
        text-decoration: none;
        color: var(--dark-color);
        transition: var(--transition);
        border: 2px solid transparent;
    }

    .quick-action-card:hover {
        background: #e9ecef;
        transform: translateY(-4px);
        box-shadow: var(--shadow-md);
        border-color: var(--primary-color);
        text-decoration: none;
        color: var(--dark-color);
    }

    .quick-action-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: #fff;
        margin-bottom: 1rem;
    }

    .quick-action-title {
        font-weight: 600;
        margin-bottom: 0.5rem;
        text-align: center;
    }

    .quick-action-description {
        font-size: 0.875rem;
        color: #6b7280;
        text-align: center;
    }

    .badge {
        padding: 0.25rem 0.75rem;
        border-radius: 1rem;
        font-size: 0.75rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .badge-primary {
        background-color: var(--primary-color);
        color: #fff;
    }

    .badge-success {
        background-color: var(--success-color);
        color: #fff;
    }

    .badge-warning {
        background-color: var(--warning-color);
        color: #fff;
    }

    .badge-danger {
        background-color: var(--danger-color);
        color: #fff;
    }

    /* Dark mode adjustments */
    [data-theme="dark"] .activity-item {
        background-color: var(--dark-color);
    }

    [data-theme="dark"] .activity-item:hover {
        background-color: #4a5568;
    }

    [data-theme="dark"] .quick-action-card {
        background-color: var(--dark-color);
    }

    [data-theme="dark"] .quick-action-card:hover {
        background-color: #4a5568;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .quick-actions-grid {
            grid-template-columns: 1fr;
        }

        .activity-item {
            flex-direction: column;
            text-align: center;
        }

        .activity-icon {
            align-self: center;
        }
    }
</style>
@endsection

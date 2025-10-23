@push('backoffice-scripts')
<style>
    /* Form Group Enhanced Styling */
    .form-group-enhanced {
        margin-bottom: 1.25rem;
        position: relative;
    }

    .form-label-enhanced {
        display: block;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
        letter-spacing: 0.01em;
    }

    .required-indicator {
        color: #dc3545;
        font-weight: 700;
        margin-left: 2px;
    }

    /* Input Wrapper for proper alignment */
    .input-wrapper {
        position: relative;
        width: 100%;
    }

    /* Enhanced Form Controls */
    .form-control-enhanced {
        display: block;
        width: 100%;
        padding: 0.625rem 0.875rem;
        font-size: 0.9375rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1.5px solid #ced4da;
        border-radius: 0.375rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .form-control-enhanced:focus {
        color: #495057;
        background-color: #fff;
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.15);
    }

    .form-control-enhanced::placeholder {
        color: #a0aec0;
        opacity: 1;
    }

    /* Invalid state styling */
    .form-control-enhanced.is-invalid {
        border-color: #dc3545;
        padding-right: calc(1.5em + 0.75rem);
        background-image: none;
    }

    .form-control-enhanced.is-invalid:focus {
        border-color: #dc3545;
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.15);
    }

    /* Error Message Styling */
    .error-message {
        display: flex;
        align-items: flex-start;
        gap: 0.5rem;
        margin-top: 0.5rem;
        padding: 0.5rem 0.75rem;
        background-color: #fff5f5;
        border-left: 3px solid #dc3545;
        border-radius: 0.25rem;
        font-size: 0.8125rem;
        color: #dc3545;
        line-height: 1.4;
        animation: slideDown 0.2s ease-out;
    }

    .error-message svg {
        flex-shrink: 0;
        margin-top: 0.125rem;
        color: #dc3545;
    }

    .error-message span {
        flex: 1;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Form Hint Styling */
    .form-hint {
        display: block;
        margin-top: 0.375rem;
        font-size: 0.8125rem;
        color: #6c757d;
        line-height: 1.4;
    }

    /* Select Dropdown Enhancement */
    select.form-control-enhanced {
        padding-right: 2.5rem;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 0.75rem center;
        background-size: 16px 12px;
        appearance: none;
    }

    /* Textarea specific styling */
    textarea.form-control-enhanced {
        resize: vertical;
        min-height: 100px;
    }

    /* File input specific styling */
    input[type="file"].form-control-enhanced {
        padding: 0.5rem 0.75rem;
        line-height: 1.5;
    }

    input[type="file"].form-control-enhanced::file-selector-button {
        padding: 0.375rem 0.75rem;
        margin: -0.5rem -0.75rem;
        margin-inline-end: 0.75rem;
        color: #495057;
        background-color: #e9ecef;
        pointer-events: none;
        border-color: inherit;
        border-style: solid;
        border-width: 0;
        border-inline-end-width: 1px;
        border-radius: 0;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out,
            border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    /* Image Preview Container */
    .image-preview-container {
        border: 2px dashed #dee2e6;
        border-radius: 0.5rem;
        padding: 1rem;
        text-align: center;
        background: #f8f9fa;
        margin-top: 1rem;
        min-height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: border-color 0.2s ease;
    }

    .image-preview-container:hover {
        border-color: #adb5bd;
    }

    .image-preview {
        max-width: 100%;
        max-height: 180px;
        border-radius: 0.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        object-fit: cover;
    }

    /* Food Items Section */
    .food-items-section {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 0.5rem;
        padding: 1.5rem;
        margin: 1.5rem 0;
        border: 1px solid #dee2e6;
    }

    .food-items-title {
        color: #495057;
        margin-bottom: 1.25rem;
        font-weight: 600;
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .food-items-title::before {
        content: '';
        width: 4px;
        height: 1.25rem;
        background: linear-gradient(180deg, #007bff 0%, #0056b3 100%);
        border-radius: 2px;
    }

    /* Food Search Grid */
    .food-search-container {
        background: white;
        border-radius: 0.5rem;
        padding: 1rem;
        margin-bottom: 1rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .food-search-input {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1.5px solid #ced4da;
        border-radius: 0.375rem;
        font-size: 0.9375rem;
        margin-bottom: 1rem;
    }

    .food-search-input:focus {
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.15);
    }

    .food-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 0.75rem;
        max-height: 300px;
        overflow-y: auto;
        border: 1px solid #dee2e6;
        border-radius: 0.375rem;
        padding: 0.75rem;
        background: #f8f9fa;
    }

    .food-item-card {
        background: white;
        border: 1px solid #dee2e6;
        border-radius: 0.375rem;
        padding: 0.75rem;
        cursor: pointer;
        transition: all 0.2s ease;
        position: relative;
    }

    .food-item-card:hover {
        border-color: #80bdff;
        box-shadow: 0 2px 4px rgba(0, 123, 255, 0.1);
    }

    .food-item-card.selected {
        border-color: #28a745;
        background-color: #f8fff9;
    }

    .food-item-card.disabled {
        opacity: 0.5;
        cursor: not-allowed;
        background-color: #f8f9fa;
    }

    .food-item-name {
        font-weight: 600;
        font-size: 0.875rem;
        color: #2c3e50;
        margin-bottom: 0.25rem;
    }

    .food-item-nutrition {
        font-size: 0.75rem;
        color: #6c757d;
        line-height: 1.3;
    }

    .food-item-check {
        position: absolute;
        top: 0.5rem;
        right: 0.5rem;
        color: #28a745;
        font-size: 1rem;
    }

    .food-item-already-added {
        position: absolute;
        top: 0.5rem;
        right: 0.5rem;
        color: #dc3545;
        font-size: 0.75rem;
        background: #fff5f5;
        padding: 0.25rem 0.5rem;
        border-radius: 0.25rem;
        border: 1px solid #f5c6cb;
    }

    /* Selected Food Items */
    .selected-food-items {
        margin-top: 1rem;
    }

    .selected-food-item {
        background: white;
        border: 1px solid #dee2e6;
        border-radius: 0.375rem;
        padding: 1rem;
        margin-bottom: 0.75rem;
        display: grid;
        grid-template-columns: 2fr 1fr auto;
        gap: 1rem;
        align-items: center;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }

    .selected-food-info {
        display: flex;
        flex-direction: column;
    }

    .selected-food-name {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.25rem;
    }

    .selected-food-nutrition {
        font-size: 0.75rem;
        color: #6c757d;
    }

    .quantity-unit-group {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .quantity-input {
        padding: 0.5rem 0.75rem;
        border: 1.5px solid #ced4da;
        border-radius: 0.375rem;
        font-size: 0.875rem;
        flex: 1;
    }

    .quantity-input:focus {
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.15);
    }

    .unit-display {
        padding: 0.5rem 0.75rem;
        background: #f8f9fa;
        border: 1.5px solid #ced4da;
        border-radius: 0.375rem;
        font-size: 0.875rem;
        color: #6c757d;
        font-weight: 500;
        min-width: 60px;
        text-align: center;
    }

    .btn-remove-food {
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
        font-size: 1.25rem;
    }

    .btn-remove-food:hover {
        background: #c82333;
        transform: scale(1.05);
    }

    .btn-add-food {
        background: #28a745;
        color: white;
        border: none;
        border-radius: 0.375rem;
        padding: 0.75rem 1.5rem;
        font-size: 0.875rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        margin-top: 1rem;
    }

    .btn-add-food:hover {
        background: #218838;
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(40, 167, 69, 0.3);
    }

    .btn-add-food:disabled {
        background: #6c757d;
        cursor: not-allowed;
        transform: none;
        box-shadow: none;
    }

    /* Module Footer */
    .module-footer {
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 2px solid #e9ecef;
    }

    .module-footer .d-flex {
        display: flex !important;
        justify-content: space-between !important;
        align-items: center !important;
        width: 100%;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .module-footer .form-hint {
        margin: 0 !important;
        flex: 1 1 auto;
    }

    .action-buttons {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .form-group-enhanced {
            margin-bottom: 1rem;
        }

        .food-grid {
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        }

        .selected-food-item {
            grid-template-columns: 1fr;
            gap: 0.75rem;
        }

        .quantity-unit-group {
            flex-direction: column;
            gap: 0.5rem;
        }

        .unit-display {
            min-width: auto;
        }

        .btn-remove-food {
            width: 100%;
            margin-top: 0.5rem;
        }

        .module-footer .d-flex {
            flex-direction: column;
            align-items: stretch !important;
        }

        .action-buttons {
            width: 100%;
            justify-content: stretch;
        }

        .action-buttons button,
        .action-buttons a {
            flex: 1;
        }
    }

    /* Focus visible for accessibility */
    .form-control-enhanced:focus-visible {
        outline: 2px solid #007bff;
        outline-offset: 2px;
    }

    /* Prevent layout shift */
    .input-wrapper {
        min-height: calc(1.5em + 1.25rem + 2px);
    }

    /* Number input styling */
    input[type="number"].form-control-enhanced::-webkit-inner-spin-button,
    input[type="number"].form-control-enhanced::-webkit-outer-spin-button {
        height: auto;
    }
</style>
@endpush

<div class="container-fluid">
    <!-- Page Header -->
    <div class="enhanced-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.adminPanel') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.meals.list') }}">Meals</a></li>
                <li class="breadcrumb-item active">{{ isset($meal) ? 'Edit Meal' : 'Add Meal' }}</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-0">{{ isset($meal) ? 'Edit Meal' : 'Add Meal' }}</h1>
            <div class="action-buttons">
                <a href="{{ route('admin.meals.list') }}" class="btn-action secondary">
                    Back to List
                </a>
            </div>
        </div>
    </div>

    <!-- Form Module -->
    <div class="form-module">
        <div class="module-header">
            <h3 class="module-title">Meal Information</h3>
        </div>
        <div class="module-body">
            <form method="POST" action="{{ isset($meal) ? route('admin.meals.update', $meal->id) : route('admin.meals.store') }}" enctype="multipart/form-data" novalidate>
                @csrf
                @if(isset($meal))
                @method('PUT')
                @endif

                <div class="row">
                    <!-- Image Upload Section -->
                    <div class="col-md-4">
                        <div class="form-group-enhanced">
                            <label for="image" class="form-label-enhanced">
                                Meal Image
                            </label>
                            <div class="input-wrapper">
                                <input type="file"
                                    class="form-control-enhanced @error('image') is-invalid @enderror"
                                    id="image"
                                    name="image"
                                    accept="image/*"
                                    onchange="previewImage(event)">
                                @error('image')
                                <div class="error-message">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7 0C3.13 0 0 3.13 0 7C0 10.87 3.13 14 7 14C10.87 14 14 10.87 14 7C14 3.13 10.87 0 7 0ZM7.7 10.5H6.3V9.1H7.7V10.5ZM7.7 7.7H6.3V3.5H7.7V7.7Z" fill="currentColor" />
                                    </svg>
                                    <span>{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <div class="form-hint">Supported formats: JPG, PNG. Max size: 2MB.</div>
                        </div>

                        <!-- Image Preview -->
                        <div class="image-preview-container">
                            <img id="imagePreview"
                                src="{{ isset($meal) && $meal->image ? asset('storage/' . $meal->image) : asset('assets2/img/food-placeholder.png') }}"
                                alt="Image Preview"
                                class="image-preview">
                        </div>
                    </div>

                    <!-- Form Fields -->
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group-enhanced">
                                    <label for="name" class="form-label-enhanced">
                                        Meal Name <span class="required-indicator">*</span>
                                    </label>
                                    <div class="input-wrapper">
                                        <input type="text"
                                            name="name"
                                            id="name"
                                            class="form-control-enhanced @error('name') is-invalid @enderror"
                                            placeholder="Enter meal name"
                                            value="{{ old('name', $meal->name ?? '') }}"
                                            required>
                                        @error('name')
                                        <div class="error-message">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 0C3.13 0 0 3.13 0 7C0 10.87 3.13 14 7 14C10.87 14 14 10.87 14 7C14 3.13 10.87 0 7 0ZM7.7 10.5H6.3V9.1H7.7V10.5ZM7.7 7.7H6.3V3.5H7.7V7.7Z" fill="currentColor" />
                                            </svg>
                                            <span>{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-enhanced">
                                    <label for="meal_time" class="form-label-enhanced">
                                        Meal Time <span class="required-indicator">*</span>
                                    </label>
                                    <div class="input-wrapper">
                                        <select name="meal_time"
                                            id="meal_time"
                                            class="form-control-enhanced @error('meal_time') is-invalid @enderror"
                                            required>
                                            <option value="">Select meal time</option>
                                            @foreach(config('meal_times.values') as $value)
                                                <option value="{{ $value }}" {{ old('meal_time', $meal->meal_time ?? '') == $value ? 'selected' : '' }}>
                                                    {{ config("meal_times.labels.{$value}") }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('meal_time')
                                        <div class="error-message">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 0C3.13 0 0 3.13 0 7C0 10.87 3.13 14 7 14C10.87 14 14 10.87 14 7C14 3.13 10.87 0 7 0ZM7.7 10.5H6.3V9.1H7.7V10.5ZM7.7 7.7H6.3V3.5H7.7V7.7Z" fill="currentColor" />
                                            </svg>
                                            <span>{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-enhanced">
                                    <label for="preparation_time" class="form-label-enhanced">
                                        Preparation Time (minutes)
                                    </label>
                                    <div class="input-wrapper">
                                        <input type="number"
                                            name="preparation_time"
                                            id="preparation_time"
                                            class="form-control-enhanced @error('preparation_time') is-invalid @enderror"
                                            placeholder="e.g. 30"
                                            value="{{ old('preparation_time', $meal->preparation_time ?? '') }}"
                                            min="0"
                                            max="1440">
                                        @error('preparation_time')
                                        <div class="error-message">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 0C3.13 0 0 3.13 0 7C0 10.87 3.13 14 7 14C10.87 14 14 10.87 14 7C14 3.13 10.87 0 7 0ZM7.7 10.5H6.3V9.1H7.7V10.5ZM7.7 7.7H6.3V3.5H7.7V7.7Z" fill="currentColor" />
                                            </svg>
                                            <span>{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group-enhanced">
                            <label for="description" class="form-label-enhanced">
                                Meal Description
                            </label>
                            <div class="input-wrapper">
                                <textarea name="description"
                                    id="description"
                                    rows="3"
                                    class="form-control-enhanced @error('description') is-invalid @enderror"
                                    placeholder="Describe the meal, its flavors, benefits, and general information...">{{ old('description', $meal->description ?? '') }}</textarea>
                                @error('description')
                                <div class="error-message">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7 0C3.13 0 0 3.13 0 7C0 10.87 3.13 14 7 14C10.87 14 14 10.87 14 7C14 3.13 10.87 0 7 0ZM7.7 10.5H6.3V9.1H7.7V10.5ZM7.7 7.7H6.3V3.5H7.7V7.7Z" fill="currentColor" />
                                    </svg>
                                    <span>{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <div class="form-hint">General description of the meal, its taste, nutritional benefits, etc.</div>
                        </div>

                        <div class="form-group-enhanced">
                            <label for="recipe_description" class="form-label-enhanced">
                                Recipe Instructions
                            </label>
                            <div class="input-wrapper">
                                <textarea name="recipe_description"
                                    id="recipe_description"
                                    rows="6"
                                    class="form-control-enhanced @error('recipe_description') is-invalid @enderror"
                                    placeholder="Step-by-step cooking instructions and preparation details...">{{ old('recipe_description', $meal->recipe_description ?? '') }}</textarea>
                                @error('recipe_description')
                                <div class="error-message">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7 0C3.13 0 0 3.13 0 7C0 10.87 3.13 14 7 14C10.87 14 14 10.87 14 7C14 3.13 10.87 0 7 0ZM7.7 10.5H6.3V9.1H7.7V10.5ZM7.7 7.7H6.3V3.5H7.7V7.7Z" fill="currentColor" />
                                    </svg>
                                    <span>{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <div class="form-hint">Detailed cooking steps, techniques, and preparation instructions.</div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-enhanced">
                                    <label for="recipe_attachment" class="form-label-enhanced">
                                        Recipe File Attachment
                                    </label>
                                    <div class="input-wrapper">
                                        <input type="file"
                                            name="recipe_attachment"
                                            id="recipe_attachment"
                                            class="form-control-enhanced @error('recipe_attachment') is-invalid @enderror"
                                            accept=".pdf,.doc,.docx,.txt">
                                        @error('recipe_attachment')
                                        <div class="error-message">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 0C3.13 0 0 3.13 0 7C0 10.87 3.13 14 7 14C10.87 14 14 10.87 14 7C14 3.13 10.87 0 7 0ZM7.7 10.5H6.3V9.1H7.7V10.5ZM7.7 7.7H6.3V3.5H7.7V7.7Z" fill="currentColor" />
                                            </svg>
                                            <span>{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-hint">PDF, DOC, DOCX, TXT files. Max size: 10MB.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-enhanced">
                                    <label for="tags" class="form-label-enhanced">
                                        Tags
                                    </label>
                                    <div class="input-wrapper">
                                        <input type="text"
                                            name="tags"
                                            id="tags"
                                            class="form-control-enhanced @error('tags') is-invalid @enderror"
                                            placeholder="vegan, gluten-free, keto, spicy..."
                                            value="{{ old('tags', isset($meal) && $meal->tags ? implode(', ', $meal->tags) : '') }}">
                                        @error('tags')
                                        <div class="error-message">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 0C3.13 0 0 3.13 0 7C0 10.87 3.13 14 7 14C10.87 14 14 10.87 14 7C14 3.13 10.87 0 7 0ZM7.7 10.5H6.3V9.1H7.7V10.5ZM7.7 7.7H6.3V3.5H7.7V7.7Z" fill="currentColor" />
                                            </svg>
                                            <span>{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-hint">Comma-separated tags for categorization (e.g., vegan, gluten-free, keto).</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group-enhanced">
                            <label for="notes" class="form-label-enhanced">
                                Additional Notes
                            </label>
                            <div class="input-wrapper">
                                <textarea name="notes"
                                    id="notes"
                                    rows="2"
                                    class="form-control-enhanced @error('notes') is-invalid @enderror"
                                    placeholder="Any additional notes, tips, variations, or special considerations...">{{ old('notes', $meal->notes ?? '') }}</textarea>
                                @error('notes')
                                <div class="error-message">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7 0C3.13 0 0 3.13 0 7C0 10.87 3.13 14 7 14C10.87 14 14 10.87 14 7C14 3.13 10.87 0 7 0ZM7.7 10.5H6.3V9.1H7.7V10.5ZM7.7 7.7H6.3V3.5H7.7V7.7Z" fill="currentColor" />
                                    </svg>
                                    <span>{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <div class="form-hint">Extra notes, cooking tips, ingredient substitutions, or serving suggestions.</div>
                        </div>
                    </div>
                </div>

                <!-- Food Items Section -->
                <div class="food-items-section">
                    <h5 class="food-items-title">
                        Food Items
                    </h5>

                    <!-- Food Search and Selection -->
                    <div class="food-search-container">
                        <input type="text" 
                               id="foodSearch" 
                               class="food-search-input" 
                               placeholder="Search for food items...">
                        
                        <div class="food-grid" id="foodGrid">
                            @foreach($foodItems as $food)
                            <div class="food-item-card" 
                                 data-food-id="{{ $food->id }}" 
                                 data-food-name="{{ $food->name }}"
                                 data-food-calories="{{ $food->calories }}"
                                 data-food-protein="{{ $food->protein }}"
                                 data-food-fat="{{ $food->fat }}"
                                 data-food-carbs="{{ $food->carbs }}"
                                 data-food-serving-size="{{ $food->serving_size }}"
                                 data-food-serving-type="{{ $food->serving_type }}">
                                <div class="food-item-name">{{ $food->name }}</div>
                                <div class="food-item-nutrition">
                                    {{ $food->calories }} cal | {{ $food->protein }}g protein | {{ $food->fat }}g fat | {{ $food->carbs }}g carbs
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Selected Food Items -->
                    <div class="selected-food-items" id="selectedFoodItems">
                        @php
                        $existingFoodItems = old('food_items', isset($meal) ? $meal->foodItems->map(function($item) {
                            return [
                                'food_id' => $item->id,
                                'food_name' => $item->name,
                                'quantity' => $item->pivot->quantity,
                                'unit' => $item->pivot->unit,
                                'calories' => $item->calories,
                                'protein' => $item->protein,
                                'fat' => $item->fat,
                                'carbs' => $item->carbs,
                            ];
                        })->toArray() : []);
                        
                        // Handle old form data that might not have food_name
                        if (old('food_items') && !isset($existingFoodItems[0]['food_name'])) {
                            $existingFoodItems = [];
                        }
                        @endphp

                        @foreach($existingFoodItems as $index => $fi)
                        <div class="selected-food-item" data-food-id="{{ $fi['food_id'] }}">
                            <div class="selected-food-info">
                                <div class="selected-food-name">{{ $fi['food_name'] ?? 'Unknown Food' }}</div>
                                <div class="selected-food-nutrition">
                                    {{ $fi['calories'] ?? 0 }} cal | {{ $fi['protein'] ?? 0 }}g protein | {{ $fi['fat'] ?? 0 }}g fat | {{ $fi['carbs'] ?? 0 }}g carbs
                                </div>
                            </div>
                            <div class="quantity-unit-group">
                                <input type="number" 
                                       step="any" 
                                       name="food_items[{{ $index }}][quantity]" 
                                       class="quantity-input" 
                                       placeholder="Quantity" 
                                       value="{{ $fi['quantity'] ?? '' }}"
                                       required>
                                <span class="unit-display">{{ $fi['unit'] ?? 'g' }}</span>
                            </div>
                            <input type="hidden" name="food_items[{{ $index }}][food_id]" value="{{ $fi['food_id'] }}">
                            <input type="hidden" name="food_items[{{ $index }}][unit]" value="{{ $fi['unit'] ?? 'g' }}">
                            <button type="button" class="btn-remove-food" onclick="removeFoodItem(this)">&times;</button>
                        </div>
                        @endforeach
                    </div>

                    <button type="button" id="addSelectedFood" class="btn-add-food" disabled>
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add Selected Food Item
                    </button>
                </div>

                <!-- Form Actions -->
                <div class="module-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="form-hint">
                            All fields marked with <span class="required-indicator">*</span> are required.
                        </div>
                        <div class="action-buttons">
                            @if(!isset($meal))
                            <button type="reset" class="btn-action secondary">
                                Reset
                            </button>
                            @endif
                            <button type="submit" class="btn-action primary">
                                {{ isset($meal) ? 'Update Meal' : 'Save Meal' }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let selectedFoodItem = null;
    let selectedFoodIds = new Set();

    // Initialize selected food IDs from existing items
    document.querySelectorAll('.selected-food-item').forEach(item => {
        const foodId = item.getAttribute('data-food-id');
        if (foodId) {
            selectedFoodIds.add(foodId);
        }
    });

    // Update food grid to show already added items
    function updateFoodGrid() {
        document.querySelectorAll('.food-item-card').forEach(card => {
            const foodId = card.getAttribute('data-food-id');
            if (selectedFoodIds.has(foodId)) {
                card.classList.add('disabled');
                card.innerHTML = card.innerHTML.replace('</div>', '<div class="food-item-already-added">Already Added</div></div>');
            } else {
                card.classList.remove('disabled');
                card.innerHTML = card.innerHTML.replace('<div class="food-item-already-added">Already Added</div>', '');
            }
        });
    }

    // Food search functionality
    document.getElementById('foodSearch').addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        document.querySelectorAll('.food-item-card').forEach(card => {
            const foodName = card.getAttribute('data-food-name').toLowerCase();
            if (foodName.includes(searchTerm)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });

    // Food item selection
    document.querySelectorAll('.food-item-card').forEach(card => {
        card.addEventListener('click', function() {
            if (this.classList.contains('disabled')) {
                return;
            }

            // Remove previous selection
            document.querySelectorAll('.food-item-card').forEach(c => c.classList.remove('selected'));
            
            // Add selection to clicked card
            this.classList.add('selected');
            selectedFoodItem = {
                id: this.getAttribute('data-food-id'),
                name: this.getAttribute('data-food-name'),
                calories: this.getAttribute('data-food-calories'),
                protein: this.getAttribute('data-food-protein'),
                fat: this.getAttribute('data-food-fat'),
                carbs: this.getAttribute('data-food-carbs'),
                servingSize: this.getAttribute('data-food-serving-size'),
                servingType: this.getAttribute('data-food-serving-type')
            };

            // Enable add button
            document.getElementById('addSelectedFood').disabled = false;
        });
    });

    // Add selected food item
    document.getElementById('addSelectedFood').addEventListener('click', function() {
        if (!selectedFoodItem) return;

        const container = document.getElementById('selectedFoodItems');
        const index = container.querySelectorAll('.selected-food-item').length;

        const foodItemHtml = `
            <div class="selected-food-item" data-food-id="${selectedFoodItem.id}">
                <div class="selected-food-info">
                    <div class="selected-food-name">${selectedFoodItem.name}</div>
                    <div class="selected-food-nutrition">
                        ${selectedFoodItem.calories} cal | ${selectedFoodItem.protein}g protein | ${selectedFoodItem.fat}g fat | ${selectedFoodItem.carbs}g carbs
                    </div>
                </div>
                <div class="quantity-unit-group">
                    <input type="number" 
                           step="any" 
                           name="food_items[${index}][quantity]" 
                           class="quantity-input" 
                           placeholder="Quantity" 
                           required>
                    <span class="unit-display">${selectedFoodItem.servingType || 'g'}</span>
                </div>
                <input type="hidden" name="food_items[${index}][food_id]" value="${selectedFoodItem.id}">
                <input type="hidden" name="food_items[${index}][unit]" value="${selectedFoodItem.servingType || 'g'}">
                <button type="button" class="btn-remove-food" onclick="removeFoodItem(this)">&times;</button>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', foodItemHtml);

        // Add to selected IDs
        selectedFoodIds.add(selectedFoodItem.id);

        // Reset selection
        selectedFoodItem = null;
        document.querySelectorAll('.food-item-card').forEach(c => c.classList.remove('selected'));
        this.disabled = true;

        // Update grid
        updateFoodGrid();
    });

    // Remove food item
    function removeFoodItem(button) {
        const foodItem = button.closest('.selected-food-item');
        const foodId = foodItem.getAttribute('data-food-id');
        
        // Remove from selected IDs
        selectedFoodIds.delete(foodId);
        
        // Remove from DOM
        foodItem.remove();
        
        // Update grid
        updateFoodGrid();
        
        // Renumber remaining items
        renumberFoodItems();
    }

    // Renumber food items for proper form submission
    function renumberFoodItems() {
        const container = document.getElementById('selectedFoodItems');
        container.querySelectorAll('.selected-food-item').forEach((item, index) => {
            item.querySelector('input[name*="[quantity]"]').setAttribute('name', `food_items[${index}][quantity]`);
            item.querySelector('input[name*="[unit]"]').setAttribute('name', `food_items[${index}][unit]`);
            item.querySelector('input[name*="[food_id]"]').setAttribute('name', `food_items[${index}][food_id]`);
        });
    }

    // Image preview functionality
    function previewImage(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const file = input.files[0];

            // Validate file type
            if (!file.type.match('image.*')) {
                alert('Please select a valid image file.');
                input.value = '';
                return;
            }

            // Validate file size (2MB)
            if (file.size > 2 * 1024 * 1024) {
                alert('Image size must be less than 2MB.');
                input.value = '';
                return;
            }

            const reader = new FileReader();

            reader.onload = function(e) {
                const preview = document.getElementById('imagePreview');
                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            reader.onerror = function() {
                alert('Error reading file. Please try again.');
            };

            reader.readAsDataURL(file);
        }
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        updateFoodGrid();
    });
</script>

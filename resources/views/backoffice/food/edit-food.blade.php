@extends('shared.layouts.backoffice')

@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fas fa-check-circle me-2"></i>
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="container-fluid">
    <!-- Page Header -->
    <div class="enhanced-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.adminPanel') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.food.list') }}">Food Items</a></li>
                <li class="breadcrumb-item active">Edit Food Item</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-0">Edit Food Item</h1>
            <div class="action-buttons">
                <a href="{{ route('admin.food.show', $food) }}" class="btn-action secondary">
                    View Details
                </a>
                <a href="{{ route('admin.food.list') }}" class="btn-action secondary">
                    Back to List
                </a>
            </div>
        </div>
    </div>

    <!-- Form Module -->
    <div class="form-module">
        <div class="module-header">
            <h3 class="module-title">Food Item Information</h3>
        </div>
        <div class="module-body">
            <form method="POST" action="{{ route('admin.food.update', $food) }}" enctype="multipart/form-data" novalidate>
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Image Upload Section -->
                    <div class="col-md-4">
                        <div class="form-group-enhanced">
                            <label for="image" class="form-label-enhanced">
                                Food Image
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
                                 src="{{ $food->image ? Storage::url($food->image) : asset('assets2/img/food-placeholder.png') }}" 
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
                                        Food Name <span class="required-indicator">*</span>
                                    </label>
                                    <div class="input-wrapper">
                                        <input type="text"
                                            name="name"
                                            id="name"
                                            class="form-control-enhanced @error('name') is-invalid @enderror"
                                            placeholder="Enter food name"
                                            value="{{ old('name', $food->name) }}"
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
                            <div class="col-md-4">
                                <div class="form-group-enhanced">
                                    <label for="serving_size" class="form-label-enhanced">
                                        Serving Size <span class="required-indicator">*</span>
                                    </label>
                                    <div class="input-wrapper">
                                        <input type="number"
                                            name="serving_size"
                                            id="serving_size"
                                            class="form-control-enhanced @error('serving_size') is-invalid @enderror"
                                            placeholder="e.g. 100"
                                            value="{{ old('serving_size', $food->serving_size) }}"
                                            min="1"
                                            required>
                                        @error('serving_size')
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
                            <div class="col-md-4">
                                <div class="form-group-enhanced">
                                    <label for="serving_type" class="form-label-enhanced">
                                        Serving Type <span class="required-indicator">*</span>
                                    </label>
                                    <div class="input-wrapper">
                                        <select name="serving_type"
                                            id="serving_type"
                                            class="form-control-enhanced @error('serving_type') is-invalid @enderror"
                                            required>
                                            <option value="">Select serving type</option>
                                            @php
                                                $currentServingType = old('serving_type', $food->serving_type);
                                                $isCustomType = !in_array($currentServingType, array_keys(\App\Models\FoodItem::getServingTypes()));
                                            @endphp
                                            @foreach(\App\Models\FoodItem::getServingTypes() as $key => $label)
                                            <option value="{{ $key }}" {{ $currentServingType == $key ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                            @endforeach
                                            @if($isCustomType)
                                            <option value="other" selected>Other ({{ $currentServingType }})</option>
                                            @endif
                                        </select>
                                        @error('serving_type')
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
                            <div class="col-md-4">
                                <div class="form-group-enhanced">
                                    <label for="calories" class="form-label-enhanced">
                                        Calories <span class="required-indicator">*</span>
                                    </label>
                                    <div class="input-wrapper">
                                        <input type="number"
                                            name="calories"
                                            id="calories"
                                            class="form-control-enhanced @error('calories') is-invalid @enderror"
                                            placeholder="e.g. 250"
                                            value="{{ old('calories', $food->calories) }}"
                                            required>
                                        @error('calories')
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

                        <!-- Custom Serving Type Field -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-enhanced">
                                    <label for="custom_serving_type" class="form-label-enhanced">
                                        Custom Serving Type
                                    </label>
                                    <div class="input-wrapper">
                                        <input type="text"
                                            name="custom_serving_type"
                                            id="custom_serving_type"
                                            class="form-control-enhanced @error('custom_serving_type') is-invalid @enderror"
                                            placeholder="e.g. handful, portion"
                                            value="{{ old('custom_serving_type', $isCustomType ? $currentServingType : '') }}"
                                            pattern="[a-zA-Z\s]+"
                                            title="Only letters and spaces allowed">
                                        @error('custom_serving_type')
                                        <div class="error-message">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 0C3.13 0 0 3.13 0 7C0 10.87 3.13 14 7 14C10.87 14 14 10.87 14 7C14 3.13 10.87 0 7 0ZM7.7 10.5H6.3V9.1H7.7V10.5ZM7.7 7.7H6.3V3.5H7.7V7.7Z" fill="currentColor" />
                                            </svg>
                                            <span>{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-hint">Only letters and spaces allowed</div>
                                </div>
                            </div>
                        </div>

                        <!-- Nutrition Information -->
                        <div class="nutrition-section">
                            <h5 class="nutrition-title">
                                Nutritional Information (per serving)
                            </h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group-enhanced">
                                        <label for="protein" class="form-label-enhanced">
                                            Protein (g) <span class="required-indicator">*</span>
                                        </label>
                                        <div class="input-wrapper">
                                            <input type="number"
                                                step="0.1"
                                                name="protein"
                                                id="protein"
                                                class="form-control-enhanced @error('protein') is-invalid @enderror"
                                                placeholder="e.g. 16.5"
                                                value="{{ old('protein', $food->protein) }}"
                                                required>
                                            @error('protein')
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
                                <div class="col-md-4">
                                    <div class="form-group-enhanced">
                                        <label for="fat" class="form-label-enhanced">
                                            Fat (g) <span class="required-indicator">*</span>
                                        </label>
                                        <div class="input-wrapper">
                                            <input type="number"
                                                step="0.1"
                                                name="fat"
                                                id="fat"
                                                class="form-control-enhanced @error('fat') is-invalid @enderror"
                                                placeholder="e.g. 10.2"
                                                value="{{ old('fat', $food->fat) }}"
                                                required>
                                            @error('fat')
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
                                <div class="col-md-4">
                                    <div class="form-group-enhanced">
                                        <label for="carbs" class="form-label-enhanced">
                                            Carbohydrates (g) <span class="required-indicator">*</span>
                                        </label>
                                        <div class="input-wrapper">
                                            <input type="number"
                                                step="0.1"
                                                name="carbs"
                                                id="carbs"
                                                class="form-control-enhanced @error('carbs') is-invalid @enderror"
                                                placeholder="e.g. 30.8"
                                                value="{{ old('carbs', $food->carbs) }}"
                                                required>
                                            @error('carbs')
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
                        </div>

                        <div class="form-group-enhanced">
                            <label for="description" class="form-label-enhanced">
                                Description
                            </label>
                            <div class="input-wrapper">
                                <textarea name="description"
                                    id="description"
                                    rows="4"
                                    class="form-control-enhanced @error('description') is-invalid @enderror"
                                    placeholder="Enter detailed description of the food item...">{{ old('description', $food->description) }}</textarea>
                                @error('description')
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

                <!-- Form Actions -->
                <div class="module-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="form-hint">
                            All fields marked with <span class="required-indicator">*</span> are required.
                        </div>
                        <div class="action-buttons">
                            <button type="submit" class="btn-action primary">
                                Update Food Item
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

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

    /* Nutrition Section */
    .nutrition-section {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 0.5rem;
        padding: 1.5rem;
        margin: 1.5rem 0;
        border: 1px solid #dee2e6;
    }

    .nutrition-title {
        color: #495057;
        margin-bottom: 1.25rem;
        font-weight: 600;
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .nutrition-title::before {
        content: '';
        width: 4px;
        height: 1.25rem;
        background: linear-gradient(180deg, #007bff 0%, #0056b3 100%);
        border-radius: 2px;
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

<script>
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
    
</script>
@endpush
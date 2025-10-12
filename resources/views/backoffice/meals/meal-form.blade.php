<style>
    .meal-form-container {
        background: #f8f9fa;
        min-height: 100vh;
        padding: 2rem 0;
    }

    .form-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        padding: 0 1rem;
    }

    .form-header h3 {
        margin: 0;
        font-size: 1.75rem;
        font-weight: 600;
        color: #212529;
    }

    .form-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .form-section {
        padding: 2rem;
        border-bottom: 1px solid #e9ecef;
    }

    .form-section:last-child {
        border-bottom: none;
    }

    .section-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #212529;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        font-weight: 500;
        color: #495057;
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }

    .form-group label .optional {
        color: #6c757d;
        font-weight: 400;
        font-size: 0.875rem;
    }

    .form-control,
    .form-select {
        padding: 0.75rem 1rem;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        width: 100%;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
        outline: none;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 100px;
    }

    .image-preview {
        margin-top: 1rem;
        padding: 1rem;
        background: #f8f9fa;
        border-radius: 8px;
        display: inline-block;
    }

    .image-preview img {
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .file-input-wrapper {
        position: relative;
    }

    .form-control-file {
        padding: 0.75rem 1rem;
        border: 2px dashed #e9ecef;
        border-radius: 8px;
        background: #f8f9fa;
        width: 100%;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .form-control-file:hover {
        border-color: #667eea;
        background: #f0f2ff;
    }

    .food-items-section {
        background: #f8f9fa;
        padding: 1.5rem;
        border-radius: 8px;
    }

    .food-item-row {
        background: white;
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        display: grid;
        grid-template-columns: 2fr 1fr 1fr auto;
        gap: 1rem;
        align-items: start;
    }

    .food-item-column {
        display: flex;
        flex-direction: column;
    }

    .food-item-column label {
        font-size: 0.8rem;
        font-weight: 500;
        color: #6c757d;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-remove-food {
        background: #f56565;
        color: white;
        border: none;
        border-radius: 6px;
        width: 36px;
        height: 36px;
        cursor: pointer;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        margin-top: 1.5rem;
    }

    .btn-remove-food:hover {
        background: #e53e3e;
        transform: scale(1.05);
    }

    .btn-add-food {
        background: #48bb78;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 0.75rem 1.5rem;
        font-size: 0.95rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        margin-top: 1rem;
    }

    .btn-add-food:hover {
        background: #38a169;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(72, 187, 120, 0.3);
    }

    .form-actions {
        display: flex;
        gap: 1rem;
        padding: 2rem;
        background: #f8f9fa;
        flex-wrap: wrap;
    }

    .btn-submit {
        background: #667eea;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 0.875rem 2rem;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-submit:hover {
        background: #5568d3;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(102, 126, 234, 0.3);
    }

    .btn-cancel {
        background: #6c757d;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 0.875rem 2rem;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-cancel:hover {
        background: #5a6268;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
    }

    .text-danger {
        color: #f56565;
        font-size: 0.875rem;
        margin-top: 0.25rem;
        display: block;
    }

    .invalid-feedback {
        color: #f56565;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }

    @media (max-width: 768px) {
        .food-item-row {
            grid-template-columns: 1fr;
        }

        .btn-remove-food {
            margin-top: 0;
            width: 100%;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn-submit,
        .btn-cancel {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class="meal-form-container">
    <div class="container-fluid">
        <div class="form-header">
            <h3>{{ isset($meal) ? '✏️ Edit Meal' : '➕ Create New Meal' }}</h3>
        </div>

        <div class="form-card">
            <form action="{{ isset($meal) ? route('admin.meals.update', $meal->id) : route('admin.meals.store') }}"
                enctype="multipart/form-data"
                method="POST">
                @csrf
                @if(isset($meal))
                @method('PUT')
                @endif

                <!-- Basic Information Section -->
                <div class="form-section">
                    <div class="section-title">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Basic Information
                    </div>

                    <div class="form-group">
                        <label for="name">Meal Name</label>
                        <input type="text"
                            name="name"
                            id="name"
                            class="form-control"
                            value="{{ old('name', $meal->name ?? '') }}"
                            placeholder="e.g., Grilled Chicken Salad"
                            required>
                        @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="form-group">
                        <label for="meal_type">Meal Type</label>
                        <select name="meal_type" id="meal_type" class="form-control form-select" required>
                            <option value="">Select Meal Type</option>
                            <option value="Breakfast" {{ old('meal_type', $meal->meal_type ?? '') == 'Breakfast' ? 'selected' : '' }}>Breakfast</option>
                            <option value="Lunch" {{ old('meal_type', $meal->meal_type ?? '') == 'Lunch' ? 'selected' : '' }}>Lunch</option>
                            <option value="Dinner" {{ old('meal_type', $meal->meal_type ?? '') == 'Dinner' ? 'selected' : '' }}>Dinner</option>
                            <option value="Snack" {{ old('meal_type', $meal->meal_type ?? '') == 'Snack' ? 'selected' : '' }}>Snack</option>
                        </select>
                        @error('meal_type')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description <span class="optional">(optional)</span></label>
                        <textarea name="description"
                            id="description"
                            class="form-control"
                            placeholder="Describe the meal, its taste, or preparation method...">{{ old('description', $meal->description ?? '') }}</textarea>
                        @error('description')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="form-group">
                        <label for="notes">Notes <span class="optional">(optional)</span></label>
                        <textarea name="notes"
                            id="notes"
                            class="form-control"
                            placeholder="Any additional notes or special instructions...">{{ old('notes', $meal->notes ?? '') }}</textarea>
                        @error('notes')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                </div>

                <!-- Image Section -->
                <div class="form-section">
                    <div class="section-title">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Meal Image
                    </div>

                    <div class="form-group">
                        @if(isset($meal) && $meal->image)
                        <div class="image-preview">
                            <img src="{{ asset('storage/' . $meal->image) }}"
                                alt="{{ $meal->name }}"
                                style="max-width: 300px; max-height: 300px; display: block;">
                        </div>
                        @endif
                        <div class="file-input-wrapper">
                            <input type="file"
                                id="image"
                                name="image"
                                accept="image/*"
                                class="form-control-file @error('image') is-invalid @enderror">
                        </div>
                        @error('image')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Food Items Section -->
                <div class="form-section">
                    <div class="section-title">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Food Items
                    </div>

                    <div class="food-items-section">
                        <div id="food-items-container">
                            @php
                            $existingFoodItems = old('food_items', isset($meal) ? $meal->foodItems->map(function($item) {
                            return [
                            'food_id' => $item->id,
                            'quantity' => $item->pivot->quantity,
                            'unit' => $item->pivot->unit,
                            ];
                            })->toArray() : []);
                            @endphp

                            @foreach($existingFoodItems as $index => $fi)
                            <div class="food-item-row">
                                <div class="food-item-column">
                                    <label>Food Item</label>
                                    <select name="food_items[{{ $index }}][food_id]" class="form-control form-select" required>
                                        <option value="">Select Food Item</option>
                                        @foreach($foodItems as $food)
                                        <option value="{{ $food->id }}" {{ $food->id == $fi['food_id'] ? 'selected' : '' }}>
                                            {{ $food->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="food-item-column">
                                    <label>Quantity</label>
                                    <input type="number"
                                        step="any"
                                        name="food_items[{{ $index }}][quantity]"
                                        class="form-control"
                                        placeholder="0.00"
                                        value="{{ $fi['quantity'] }}"
                                        required>
                                </div>
                                <div class="food-item-column">
                                    <label>Unit</label>
                                    <input type="text"
                                        name="food_items[{{ $index }}][unit]"
                                        class="form-control"
                                        placeholder="g, ml, cup..."
                                        value="{{ $fi['unit'] }}">
                                </div>
                                <button type="button" class="btn-remove-food remove-food-item">&times;</button>
                            </div>
                            @endforeach

                            @if(count($existingFoodItems) === 0)
                            <div class="food-item-row">
                                <div class="food-item-column">
                                    <label>Food Item</label>
                                    <select name="food_items[0][food_id]" class="form-control form-select" required>
                                        <option value="">Select Food Item</option>
                                        @foreach($foodItems as $food)
                                        <option value="{{ $food->id }}">{{ $food->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="food-item-column">
                                    <label>Quantity</label>
                                    <input type="number"
                                        step="any"
                                        name="food_items[0][quantity]"
                                        class="form-control"
                                        placeholder="0.00"
                                        required>
                                </div>
                                <div class="food-item-column">
                                    <label>Unit</label>
                                    <input type="text"
                                        name="food_items[0][unit]"
                                        class="form-control"
                                        placeholder="g, ml, cup...">
                                </div>
                                <button type="button" class="btn-remove-food remove-food-item">&times;</button>
                            </div>
                            @endif
                        </div>

                        <button type="button" id="add-food-item" class="btn-add-food">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Food Item
                        </button>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <button type="submit" class="btn-submit">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        {{ isset($meal) ? 'Update Meal' : 'Create Meal' }}
                    </button>
                    <a href="{{ route('admin.meals.list') }}" class="btn-cancel">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('add-food-item').addEventListener('click', function() {
        const container = document.getElementById('food-items-container');
        const index = container.querySelectorAll('.food-item-row').length;

        const row = document.createElement('div');
        row.classList.add('food-item-row');
        row.innerHTML = `
            <div class="food-item-column">
                <label>Food Item</label>
                <select name="food_items[${index}][food_id]" class="form-control form-select" required>
                    <option value="">Select Food Item</option>
                    @foreach($foodItems as $food)
                    <option value="{{ $food->id }}">{{ $food->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="food-item-column">
                <label>Quantity</label>
                <input type="number" 
                       step="any" 
                       name="food_items[${index}][quantity]" 
                       class="form-control" 
                       placeholder="0.00" 
                       required>
            </div>
            <div class="food-item-column">
                <label>Unit</label>
                <input type="text" 
                       name="food_items[${index}][unit]" 
                       class="form-control" 
                       placeholder="g, ml, cup...">
            </div>
            <button type="button" class="btn-remove-food remove-food-item">&times;</button>
        `;

        container.appendChild(row);

        row.querySelector('.remove-food-item').addEventListener('click', function() {
            row.remove();
        });
    });

    document.querySelectorAll('.remove-food-item').forEach(btn => {
        btn.addEventListener('click', function() {
            this.closest('.food-item-row').remove();
        });
    });
</script>

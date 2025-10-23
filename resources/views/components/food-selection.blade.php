{{-- Food Selection Component --}}
{{-- Usage: @include('components.food-selection', ['foodItems' => $foodItems, 'existingFoodItems' => $existingFoodItems, 'errorKey' => 'food_items']) --}}

<div class="food-items-section">
    <h5 class="food-items-title">
        <i class="fas fa-apple-alt text-success me-2"></i>
        Ingrédients
    </h5>

    <!-- Food Search and Selection -->
    <div class="food-search-container">
        <input type="text" 
               id="foodSearch" 
               class="food-search-input" 
               placeholder="Rechercher des ingrédients...">
        
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
        @if(isset($existingFoodItems) && count($existingFoodItems) > 0)
            @foreach($existingFoodItems as $index => $fi)
            <div class="selected-food-item" data-food-id="{{ $fi['food_id'] }}">
                <div class="selected-food-info">
                    <div class="selected-food-name">{{ $fi['food_name'] ?? 'Ingrédient inconnu' }}</div>
                    <div class="selected-food-nutrition">
                        {{ $fi['calories'] ?? 0 }} cal | {{ $fi['protein'] ?? 0 }}g protein | {{ $fi['fat'] ?? 0 }}g fat | {{ $fi['carbs'] ?? 0 }}g carbs
                    </div>
                </div>
                <div class="quantity-unit-group">
                    <input type="number" 
                           step="any" 
                           name="food_items[{{ $index }}][quantity]" 
                           class="quantity-input" 
                           placeholder="Quantité" 
                           value="{{ $fi['quantity'] ?? '' }}"
                           required>
                    <span class="unit-display">{{ $fi['unit'] ?? 'g' }}</span>
                </div>
                <input type="hidden" name="food_items[{{ $index }}][food_id]" value="{{ $fi['food_id'] }}">
                <input type="hidden" name="food_items[{{ $index }}][unit]" value="{{ $fi['unit'] ?? 'g' }}">
                <button type="button" class="btn-remove-food" onclick="removeFoodItem(this)">&times;</button>
            </div>
            @endforeach
        @endif
    </div>

    <button type="button" id="addSelectedFood" class="btn-add-food" disabled>
        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Ajouter l'ingrédient sélectionné
    </button>

    @if(isset($errorKey) && $errors->has($errorKey))
        <div class="text-danger mt-2">{{ $errors->first($errorKey) }}</div>
    @endif
</div>

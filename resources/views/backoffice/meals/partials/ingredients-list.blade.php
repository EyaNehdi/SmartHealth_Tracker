@foreach($meal->foodItems as $foodItem)
    <div class="ingredient-item">
        <!-- Food Item Image -->
        @if($foodItem->image)
            <img src="{{ Storage::url($foodItem->image) }}" 
                 alt="{{ $foodItem->name }}" 
                 class="ingredient-image">
        @else
            <div class="ingredient-image-placeholder">
                <i class="fas fa-apple-alt"></i>
            </div>
        @endif

        <!-- Food Item Information -->
        <div class="ingredient-info">
            <div class="ingredient-name">{{ $foodItem->name }}</div>
            <div class="ingredient-quantity">
                {{ $foodItem->pivot->quantity }} {{ $foodItem->pivot->unit }}
                @if($foodItem->serving_size)
                    <span class="text-muted">(serving: {{ $foodItem->serving_size }})</span>
                @endif
            </div>
            <div class="ingredient-nutrition">
                @php
                    // Calculate nutritional contribution using the same logic as the Meal model
                    $quantity = $foodItem->pivot->quantity;
                    $unit = $foodItem->pivot->unit;
                    $servingSize = $foodItem->serving_size ?: '100g';
                    
                    // Parse serving size
                    $servingAmount = preg_match('/(\d+(?:\.\d+)?)\s*([a-zA-Z]+)/', strtolower($servingSize), $matches) 
                        ? ['amount' => (float) $matches[1], 'unit' => $matches[2]]
                        : ['amount' => 100, 'unit' => 'g'];
                    
                    // Convert to grams (simplified)
                    $unitConversions = [
                        'g' => 1, 'kg' => 1000, 'oz' => 28.35, 'lb' => 453.59,
                        'ml' => 1, 'l' => 1000, 'cup' => 240, 'cups' => 240,
                        'tbsp' => 15, 'tsp' => 5, 'piece' => 50, 'pieces' => 50
                    ];
                    
                    $convertedQuantity = ($unitConversions[strtolower($unit)] ?? 1) * $quantity;
                    $convertedServingAmount = ($unitConversions[strtolower($servingAmount['unit'])] ?? 1) * $servingAmount['amount'];
                    $multiplier = $convertedQuantity / $convertedServingAmount;
                    
                    $calories = round($foodItem->calories * $multiplier, 1);
                    $protein = round($foodItem->protein * $multiplier, 1);
                    $fat = round($foodItem->fat * $multiplier, 1);
                    $carbs = round($foodItem->carbs * $multiplier, 1);
                @endphp
                {{ $calories }} cal • {{ $protein }}g protein • {{ $fat }}g fat • {{ $carbs }}g carbs
            </div>
        </div>

        <!-- Actions -->
        <div class="ingredient-actions">
            <button type="button" class="btn-edit-ingredient" 
                    onclick="editIngredient({{ $foodItem->id }}, '{{ $foodItem->name }}', {{ $foodItem->pivot->quantity }}, '{{ $foodItem->pivot->unit }}')">
                Edit
            </button>
            <button type="button" class="btn-remove-ingredient" 
                    data-food-id="{{ $foodItem->id }}">
                Remove
            </button>
        </div>
    </div>
@endforeach

@if($meal->foodItems->count() == 0)
    <div class="empty-state">
        <i class="fas fa-apple-alt"></i>
        <h3>No Ingredients Added</h3>
        <p>Start by adding food items to this meal.</p>
        <button type="button" class="btn-action primary" data-bs-toggle="modal" data-bs-target="#addIngredientModal">
            Add First Ingredient
        </button>
    </div>
@endif
